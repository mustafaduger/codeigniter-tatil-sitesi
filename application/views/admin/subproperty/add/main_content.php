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

            <form action="<?php echo base_url('subproperty_controller/add_subproperty_controller'); ?>" method="post" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Alt Özellik Adı</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control"  name="altozellik_adi" placeholder="Alt Özellik Adı">
                    <?php echo form_error('altozellik_adi'); ?>
                    <input type="hidden" class="form-control"  name="ozellik_id" value="<?php echo $this->input->post('ozellik_id') ?>">
                </div>
               </div>


               <div class="form-group">
                  <label class="col-sm-2 control-label">Açıklama</label>
                  <div class="col-sm-6">
                  <div class="checkbox">
                    <label>
                      <input type="hidden"  name="altozellik_aciklama" value="0">
                      <input type="checkbox" name="altozellik_aciklama" class="icheckbox" value="1">
                    </label>
                  </div>
                  </div>
                 </div>
              </div>
                  
          
              <!-- /.box-body -->
              <div class="box-footer">
                <a class="btn btn-warning" href="<?php echo base_url('subproperty_controller/subpropertymain_controller/'.$this->input->post('ozellik_id').'');?>">Vazgeç</a>
                <button type="submit" class="btn btn-info pull-right">Kaydet</button>
              </div>
              <!-- /.box-footer -->
            </form>
         </div>
          </div>
         
    </section>
    <div class="clearfix"></div> 
    <!-- /.content -->