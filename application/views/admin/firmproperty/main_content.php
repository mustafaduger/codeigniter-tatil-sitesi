 <!-- Main content -->
    <section class="content">
     <div class="row">
      <div class="col-md-12 ">
        <?php echo $this->session->flashdata('login_error'); ?>
       
          <div class="box box-info" >
            <div class="box-header with-border">
              <h3 class="box-title">Firma Özelikleri Düzenle</h3>
            </div>
           <!-- /.box-header -->
           
                <!-- form start -->
                <form action="<?php echo base_url('firmproperty_controller/update_firmproperty_controller');?>" enctype= "multipart/form-data" method="post" class="form-horizontal">
                  <div class="box-body">
                      <div class="form-group">
                            <label class="col-sm-2 control-label"></label>
                            <div class="col-sm-12">
                               <?php foreach (get_property_ByCategoryId($result) as $value) {?>
                                                                         
                                <div class="form-group">
                                      <label class="col-sm-2 control-label text-info"><?php echo $value->ozellik_adi; ?></label>
                                  <div class="col-sm-12">
                                    <ul class="checkbox-grid">
                                    <?php foreach (get_subpropertyproperty_Id($value->ozellik_id) as $key) :?>
                                      <li>
                                      <input type="checkbox" name="firmaozellik_metin_adi[]" value="<?php echo $key->altozellik_adi ?>"><?php echo $key->altozellik_adi ?>
                                      </li>
                                   <?php endforeach;?>
                                   </ul>
                                  </div>
                                </div>
                                <?php };?>
                           </div>
                           <input type="hidden" name="firm_id" value="">
                         </div>
                  </div>
                  <!-- /.box-body -->
                  <div class="box-footer">
                     <button type="submit" class="btn btn-info pull-right">Güncelle</button>
                  </div>                
                  <!-- /.box-footer -->
                </form>
         
           
           </div>
           
         </div>
        </div>
 
    </section>
    <div class="clearfix"></div> 
    <!-- /.content -->


              