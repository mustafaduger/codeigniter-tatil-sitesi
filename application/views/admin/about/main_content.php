 <!-- Main content -->
    <section class="content">
     <div class="row">
      <div class="col-md-12">
        <?php echo $this->session->flashdata('login_error'); ?>

          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Hakımızda Sayfası Düzenleme</h3>
            </div>
           <!-- /.box-header -->
        <?php foreach ($result as $row) : ?>
            <!-- form start -->
            <form action="<?php echo base_url('about_controller/update_about_controller');?>" enctype= "multipart/form-data" method="post" class="form-horizontal">
              <div class="box-body">

                
                <div class="form-group">
                  <label class="col-sm-2 control-label">Başlık</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control"  name="title" value ="<?php echo $row->title;?>" > 
                    <input type="hidden" name="id" value="<?php echo $row->id;?>">
                  </div>
       
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">İçerik</label>
                  <div class="col-sm-6">
                    <textarea name="contentabout" id="editor1" rows="8" cols="80"><?php echo $row->contentabout;?></textarea>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Video</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control"  name="video" value ="<?php echo $row->video;?>" > 
                  </div>
            
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Vizyon</label>
                  <div class="col-sm-6">
                    <textarea name="vision" id="vision" rows="8" cols="80"><?php echo $row->vision;?></textarea>
                  </div>
                </div>

                 <div class="form-group">
                  <label class="col-sm-2 control-label">Misyon</label>
                  <div class="col-sm-6">
                    <textarea name="vision" id="vision" rows="8" cols="80"><?php echo $row->vision;?></textarea> 
                  </div>
                 
                </div>

                

              <!-- /.box-body -->
              <div class="box-footer">
                
                <button type="submit" class="btn btn-info pull-right">Güncelle</button>
              </div>
              <!-- /.box-footer -->
            </form>
             <?php endforeach;?>
          </div>
      </div>
    </div>
      
    </section>
    <div class="clearfix"></div> 
    <!-- /.content -->
    