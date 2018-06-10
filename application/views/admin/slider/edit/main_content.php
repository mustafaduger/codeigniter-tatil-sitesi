 <!-- Main content -->
    <section class="content">
      <div class="col-md-12">
      <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Slider Düzenle </h3>
            </div>
            <div class="align-middle">
            <!-- /.box-header -->
        <?php foreach ($result as $row) : ?>
            <!-- form start -->
            <form action="<?php echo base_url('slider_controller/update_slider_controller');?>" enctype= "multipart/form-data" method="post" class="form-horizontal">
              <div class="box-body">
               
               <div class="form-group">
                  <label class="col-sm-2 control-label">Slider Adı</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control"  name="slider_name" value ="<?php echo ($row->slider_name);?>" > 
                    <input type="hidden" name="slider_id" value="<?php echo ($row->slider_id) ?>">
                  </div>
                  
                </div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label">Slider URL</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control"  name="slider_url"  value ="<?php echo ($row->slider_url);?>">
                  </div>
                 
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Slider Sıra</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control"  name="slider_sira"  value ="<?php echo ($row->slider_sira);?>">
                  </div>
                 
                </div>
                
                

                 <div class="form-group">
                
                  <label class="col-sm-2 control-label">Slider Resim</label>
                  <div class="col-sm-3">
                    <input type="file" name="image" class="form-control">
                  </div>
                </div>

                 <div class="form-group">
                  <label class="col-sm-2 control-label">Mevcut Resim</label>
                  <div class="col-sm-4">
                     <img src="<?php echo base_url($row->slider_tmb);?>" class="img-thumbnail">

                    <p class="text-blue">Mevcut Slider resmini değiştirmiyecekseniz seçim yapmayınız...</p>
                  </div>

                </div>

              <!-- /.box-body -->
              <div class="box-footer">
                <a class="btn btn-warning" href="<?php echo base_url('slider_controller'); ?>">Vazgeç</a>
                <button type="submit" class="btn btn-info pull-right">Kaydet</button>
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
    