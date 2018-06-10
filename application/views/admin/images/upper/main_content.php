 <!-- Main content -->
    <section class="content">
      <div class="col-md-12">
      <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Fotoğraf Düzenle </h3>
            </div>
            <div class="align-middle">
            <!-- /.box-header -->
        
            <!-- form start -->
            <form action="<?php echo base_url('images_controller/update_imagesupper_controller');?>" enctype= "multipart/form-data" method="post" class="form-horizontal">
              <div class="box-body">
               
               <div class="form-group">
                <label class="col-sm-2 control-label">Resim</label>
                  <div class="col-sm-3">
                    <input type="file" name="image" class="form-control">
                    <?php echo form_error('image'); ?>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Mevcut Resim</label>
                  <div class="col-sm-4">
                     <img src="<?php echo base_url($row->resim_ust);?>" class="img-thumbnail">
                    <p class="text-blue">Mevcut resmi değiştirmiyecekseniz seçim yapmayınız...</p>
                  </div>
                  <input type="hidden" name="resim_id" value="<?php echo  $row->resim_id?>">
                </div>
              </div>
              <!-- /.box-body -->
            </div>
              <!-- box-footer/. -->
              <div class="box-footer">
                <a class="btn btn-warning" href="<?php echo base_url('images_controller'); ?>">Vazgeç</a>
                <button type="submit" class="btn btn-info pull-right">Kaydet</button>
              </div>
              <!-- /.box-footer -->
            </form>
           
             </div>
         </div>
        </div>
         
    </section>
    <div class="clearfix"></div> 
    <!-- /.content -->
  