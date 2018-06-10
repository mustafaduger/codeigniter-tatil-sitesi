<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Explorereadmoreview_controller extends CI_Controller {
	public function __construct()
        {
        		parent::__construct();
           		/*if ($this->session->userdata('logged_in') ==FALSE) {
                 redirect('auth/login');
              }*/

           		$this->load->model('explorecontent_model');
           		$this->load->model('commentview_model');
                
        }
	
	public function index()
	{
		
		//$data['result']=$this->category_model->getAll_category();
		$this->load->view('front/explore/readmore/explore_readmore');
		
	}

	public function explorereadmoreviewById($id)
	{
		$data['row']=$this->explorecontent_model->edit_explorecontentview($id);
		
		$data['comments'] = $this->show_tree($id);
		$this->load->view('front/explore/readmore/explore_readmore',$data);

	}

	function add_comment($kesfet_id)
    {

        // get a post id based on news id
        //$data['news'] = $this->explorecontent_model->get_one($kesfet_id);

        //set validation rules
        $this->form_validation->set_rules('comment_name', 'Name', 'required|trim|htmlspecialchars');
        $this->form_validation->set_rules('comment_email', 'Email', 'required|valid_email|trim|htmlspecialchars');
        $this->form_validation->set_rules('comment_body', 'comment_body', 'required|trim|htmlspecialchars');
        if ($this->form_validation->run() == FALSE) {
            // if not valid load comments
            $this->session->set_flashdata('error_msg', validation_errors());
            redirect("explorereadmoreview_controller/explorereadmoreviewById/$kesfet_id");
        } else {
            //if valid send comment to admin to tak approve
            $this->commentview_model->add_new_comment();
            $this->session->set_flashdata('error_msg', 'Yorumunuz onay bekliyor.');
            redirect("explorereadmoreview_controller/explorereadmoreviewById/$kesfet_id");
        }
    }


	function show_tree($kesfet_id)
    {
        // create array to store all comments ids
        $store_all_id = array();
        // get all parent comments ids by using news id
        $id_result = $this->commentview_model->tree_all($kesfet_id);
        // loop through all comments to save parent ids $store_all_id array
        foreach ($id_result as $comment_id) {
            array_push($store_all_id, $comment_id['parent_id']);
        }
        // return all hierarchical tree data from in_parent by sending
        //  initiate parameters 0 is the main parent,news id, all parent ids

        return  $this->in_parent(0,$kesfet_id, $store_all_id);
    }


    function in_parent($in_parent,$kesfet_id,$store_all_id) {
        // this variable to save all concatenated html
        $html = "";
        
        // build hierarchy  html structure based on ul li (parent-child) nodes
       if (in_array($in_parent,$store_all_id)) {
            $result = $this->commentview_model->tree_by_parent($kesfet_id,$in_parent);
            
            $html .=  $in_parent == 0 ? "<ul>" : "<ul>";
            
            foreach ($result as $re) {
                $html .= "<li><div class='avatar'><i class='icon-comment-empty'></i></div>
            <div class='comment_info'>Gönderen
            <a>".$re['comment_name']."</a><span>|</span>
            ".date("d.m.Y", $re['comment_created'])."<span>|</span> <a href='#comment_form' class='reply' id='" . $re['comment_id'] . "'>Cevapla </a></div>
                
                <p>".$re['comment_body']."</p>
            
            ";
                $html .=$this->in_parent($re['comment_id'],$kesfet_id, $store_all_id);
                $html .= "</li>";
            }
            $html .=  "</ul>";
        }

        return $html;
    }

	
	

	
	
}

?>