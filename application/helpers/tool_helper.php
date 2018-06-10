<?php 
function get_category()
{

    $CI = &get_instance();
    $CI->load->model("category_model");
    return $CI->category_model->getAll_category();
}

function get_subcategory()
{

    $CI = &get_instance();
    $CI->load->model("subcategory_model");
    return $CI->subcategory_model->getAll_subcategory();
}



function get_property()
{

    $CI = &get_instance();
    $CI->load->model("property_model");
    return $CI->property_model->getAll_property();
}

function get_propertyNameById($Id)
{

    $CI = &get_instance();
    $CI->load->model("property_model");
    return $CI->properties_model->get_propertyName($Id);
}

function get_property_ByCategoryId($Id)
{

    $CI = &get_instance();
    $CI->load->model("property_model");
    return $CI->property_model->get_propertyByCategoryId($Id);
}

function get_subpropertyproperty_Id($Id)
{

    $CI = &get_instance();
    $CI->load->model("subproperty_model");
    return $CI->subproperty_model->get_subpropertypropertyId($Id);
}




function get_firma()
{
    $CI = &get_instance();
    $CI->load->model("opportunity_model");
    return $CI->opportunity_model->getAll_firma();
}

function get_il()
{
    $CI = &get_instance();
    $CI->load->model("opportunity_model");
    return $CI->opportunity_model->getAll_il();
}

function get_ilce()
{
    $CI = &get_instance();
    $CI->load->model("opportunity_model");
    return $CI->opportunity_model->getAll_ilce();
}

function get_mahellebykey($ilce_key)
{
    $CI = &get_instance();
    $CI->load->model("opportunity_model");
    return $CI->opportunity_model->get_mahalle($ilce_key);
}

function get_etkinliktip()
{
    $CI = &get_instance();
    $CI->load->model("activity_model");
    return $CI->activity_model->getAll_etkinliktip();
}

function get_reklamyeri()
{
    $CI = &get_instance();
    $CI->load->model("advert_model");
    return $CI->advert_model->getAll_reklamyeri();
}

function get_Roles()
{
    $CI = &get_instance();
    $CI->load->model("auth_model");
    return $CI->auth_model->getAll_roles();
}

function get_categoryexplore()
{

    $CI = &get_instance();
    $CI->load->model("categoryexplore_model");
    return $CI->categoryexplore_model->getAll_category();
}

function get_categoryexploreview()
{

    $CI = &get_instance();
    $CI->load->model("categoryexplore_model");
    return $CI->categoryexplore_model->getAll_categoryActive();
}

function get_AllpropertyCategory()
{
    $CI = &get_instance();
    $CI->load->model("categoryexplore_model");
    return $CI->categoryexplore_model->getAll_category();
}


function get_AllexploreKeywords()
{
    $CI = &get_instance();
    //$array = array('name' => $name, 'title' => $title, 'status' => $status);

    $keywords=$CI->db->select('kesfet_keyword','DISTINCT')->from('tbl_kesfet')->where('kesfet_isActive',1)->get()->result_array();
    return $keywords;
}


























function get_room_properties()
{

    $CI = &get_instance();
    $CI->load->model("roomproperties_model");
    return $CI->roomproperties_model->get_all();
}

function get_room_extra_services($where = array())
{

    $CI = &get_instance();
    $CI->load->model("roomextraservices_model");
    return $CI->roomextraservices_model->get_all($where);
}

function item_image($id)
{
    $ci=& get_instance();

    $result=$ci->db->select('image')->from('items')->where('id',$id)->get()->row();
    return $result->image;
}

function item_tmb($id)
{
    $ci=& get_instance();

    $result=$ci->db->select('tmb')->from('items')->where('id',$id)->get()->row();
    return $result->tmb;
}




?>
