 <!-- Main content -->
    <section class="content">
      <div class="col-md-12">
      <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Slider Ekle</h3>
            </div>
            <!-- /.box-header -->
       
            <!-- form start -->
            <form action="<?php echo base_url('slider_controller/add_slider_controller');?>" enctype= "multipart/form-data" method="post" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Slider Adı</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control"  name="slider_name" value ="<?php echo $this->input->post("slider_name");?>" > 
                  </div>
                  
                </div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label">Slider URL</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control"  name="slider_url"  value ="<?php echo $this->input->post("slider_url");?>">
                  </div>
                 
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Slider Sıra</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control"  name="slider_sira"  value ="<?php echo $this->input->post("slider_sira");?>">
                  </div>
                 
                </div>
                
                

                 <div class="form-group">
                
                  <label class="col-sm-2 control-label">Slider Resim</label>
                  <div class="col-sm-3">
                    <input type="file" name="image" class="form-control">
                  </div>
                </div>
           
      
            
                
              <!-- /.box-body -->
              <div class="box-footer">
                <a class="btn btn-warning" href="<?php echo base_url('item_controller'); ?>">Vazgeç</a>
                <button type="submit" class="btn btn-info pull-right">Kaydet</button>
              </div>
              <!-- /.box-footer -->
            </form>
         </div>
          </div>
         
    </section>
    <div class="clearfix"></div> 
    <!-- /.content -->
    

    </script>