 <!-- Main content -->
    <section class="content">
      <div class="col-md-12">
      <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Marka Ekle</h3>
            </div>
            <!-- /.box-header -->
           <?php echo $this->session->flashdata('login_error'); ?>
            <!-- form start -->
            <form action="<?php echo base_url('brand_controller/add_brand_controller'); ?>" method="post" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Marka Adı</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control"  name="brand_name" placeholder="Marka Adı">
                    <?php echo form_error('brand_name'); ?>
                   
                  </div>
                </div>
                
              </div>
                
              <!-- /.box-body -->
              <div class="box-footer">
                <a class="btn btn-warning" href="<?php echo base_url('brand_controller'); ?>">Vazgeç</a>
                <button type="submit" class="btn btn-info pull-right">Kaydet</button>
              </div>
              <!-- /.box-footer -->
            </form>
         </div>
          </div>
         
    </section>
    <div class="clearfix"></div> 
    <!-- /.content -->