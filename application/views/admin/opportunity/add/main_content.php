 <!-- Main content -->
    <section class="content">
      <div class="row">
      <div class="col-md-12">
      <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Şehir Fırsatı Ekle</h3>
            </div>
            <!-- /.box-header -->
       
            <!-- form start -->
            <form action="<?php echo base_url('opportunity_controller/add_opportunity_controller');?>" enctype= "multipart/form-data" method="post" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                 <label class="col-sm-2 control-label">Resim</label>
                  <div class="col-sm-3">
                    <input type="file" name="image" class="form-control">
                    <?php echo form_error('image'); ?>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Fırsat Adı</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control"  name="firsat_adi"  >
                    <?php echo form_error('firsat_adi'); ?> 
                  </div>
                </div>
                
                
              
             
                <div class="form-group">
                  <label class="col-sm-2 control-label">Firma Adı</label>
                  <div class="col-sm-3">
                    <select class="form-control" name="firma_id">
                      <option >Firma Seçiniz</option>
                      <?php foreach (get_firma() as $value) {;?>
                        <option value="<?php echo $value->firma_id;?>"><?php echo $value->firma_adi; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <?php echo form_error('firma_id'); ?>
               </div>

               <div class="form-group">
                  <label class="col-sm-2 control-label">İl Adı</label>
                  <div class="col-sm-3">
                    <select class="form-control" name="il_id">
                      <option >İl Seçiniz</option>
                      <?php foreach (get_il() as $value) {;?>
                        <option value="<?php echo $value->CityID;?>"><?php echo $value->CityName; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <?php echo form_error('il_id'); ?>
               </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Telefon</label>
                  <div class="col-sm-3">
                     <input type="text" name="firsat_telefon" class="form-control" data-inputmask='"mask": "(999) 999 9999"' data-mask>
                     <?php echo form_error('firsat_telefon'); ?> 
                  </div>
                  
                </div>

                

                <div class="form-group">
                  <label class="col-sm-2 control-label">Adres</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control"  name="firsat_adres"  >
                    <?php echo form_error('firsat_adres'); ?> 
                  </div>
                  
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Web Adresi</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control"  name="firsat_url"  >
                    <?php echo form_error('firsat_url'); ?> 
                  </div>
                </div>

              
                <div class="form-group">
                  <label class="col-sm-2 control-label">Başlangıç Tarihi</label>
                  <div class="col-sm-2">
                    <input type="date" class="form-control"  name="firsat_baslangictarih">
                    <?php echo form_error('firsat_baslangictarih'); ?>
                  </div>

                  <label class="col-sm-2 control-label">Saati</label>
                  <div class="col-sm-2">
                    <input type="time" class="form-control"  name="firsat_saati">
                    <?php echo form_error('firsat_saati'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Bitiş Tarihi</label>
                  <div class="col-sm-2">
                    <input type="date" class="form-control"  name="firsat_bitistarih">
                    <?php echo form_error('firsat_bitistarih'); ?>
                  </div>
                </div>
            

                <div class="form-group">
                  <label class="col-sm-2 control-label">Fiyat Eski</label>
                  <div class="col-sm-2">
                    <input type="text" class="currency" name="firsat_fiyateski">
                    <?php echo form_error('firsat_fiyateski'); ?>
                    
                  </div>
                
                  <label class="col-sm-2 control-label">Fiyat Yeni</label>
                  <div class="col-sm-2">
                    <input type="text" class="currency" name="firsat_fiyatyeni">
                    <?php echo form_error('firsat_fiyatyeni'); ?>
                    
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Fırsat Görüntüleme</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control"  name="firsat_goruntuleme"  >
                    <?php echo form_error('firsat_goruntuleme'); ?> 
                  </div>
                </div>


                <div class="form-group">
                  <label class="col-sm-2 control-label">Anahtar Kelimeler</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control"  name="firsat_keyword"  >
                    <?php echo form_error('firsat_keyword'); ?> 
                  </div>
                </div>

                
                <div class="form-group">
                  <label class="col-sm-2 control-label">Fırsat Detay</label>
                  <div class="col-sm-8">
                    <textarea name="firsat_detay" id="editor1" rows="8" cols="100"></textarea>
                    <?php echo form_error('firsat_detay'); ?>
                  </div>
                </div>
           
                  </div>           
              <!-- /.box-body -->
              <div class="box-footer">
                <a class="btn btn-warning" href="<?php echo base_url('opportunity_controller'); ?>">Vazgeç</a>
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

