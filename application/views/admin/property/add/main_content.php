 <!-- Main content -->
    <section class="content">
      <div class="col-md-12">
      <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Özellik Ekle</h3>
            </div>
            <!-- /.box-header -->
           <?php echo $this->session->flashdata('login_error'); ?>
            <!-- form start -->

            <form action="<?php echo base_url('property_controller/add_property_controller'); ?>" method="post" class="form-horizontal">
              <div class="box-body">

                  <div class="form-group">
                  <label class="col-sm-2 control-label">Kategori</label>
                  <div class="col-sm-3">
                    <select class="form-control" name="kategori_id">
                      <option >Kategori Seçiniz</option>
                      <?php foreach (get_category() as $value) {;?>
                        <option value="<?php echo $value->kategori_id?>"><?php echo $value->kategori_adi; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <?php echo form_error('kategori_id'); ?>
                  
               </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Özellik Adı</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control"  name="ozellik_adi" placeholder="Özellik Adı">
                    <?php echo form_error('ozellik_adi'); ?>
                   
                  </div>
               </div>
                
              </div>
                  
          
              <!-- /.box-body -->
              <div class="box-footer">
                <a class="btn btn-warning" href="<?php echo base_url('property_controller'); ?>">Vazgeç</a>
                <button type="submit" class="btn btn-info pull-right">Kaydet</button>
              </div>
              <!-- /.box-footer -->
            </form>
         </div>
          </div>
         
    </section>
    <div class="clearfix"></div> 
    <!-- /.content -->