 <!-- Main content -->
    <section class="content">
      <div class="row">
      <div class="col-md-12">
      <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Etkinlik Ekle</h3>
            </div>
            <!-- /.box-header -->
       
            <!-- form start -->
            <form action="<?php echo base_url('activity_controller/add_activity_controller');?>" enctype= "multipart/form-data" method="post" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                 <label class="col-sm-2 control-label">Resim</label>
                  <div class="col-sm-3">
                    <input type="file" name="image" class="form-control">
                    <?php echo form_error('image'); ?>
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
                  <label class="col-sm-2 control-label">Etkinlik Adı</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control"  name="etkinlik_adi"  > 
                    <?php echo form_error('etkinlik_adi'); ?>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label">Etkinlik Mekan Adı</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control"  name="etkinlik_mekanadi"  >
                    <?php echo form_error('etkinlik_mekanadi'); ?> 
                  </div>
                </div>


                <div class="form-group">
                  <label class="col-sm-2 control-label">Adres</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control"  name="etkinlik_adres"  >
                    <?php echo form_error('etkinlik_adres'); ?>
                  </div>
                  
                </div>

              
             
                <div class="form-group">
                  <label class="col-sm-2 control-label">Etkinlik Tipi</label>
                  <div class="col-sm-3">
                    <select class="form-control" name="etkinliktip_id">
                      <option >Etkinlik Tipi Seçiniz</option>
                      <?php foreach (get_etkinliktip() as $value) {;?>
                        <option value="<?php echo $value->etkinliktip_id;?>"><?php echo $value->etkinliktip_adi; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <?php echo form_error('etkinliktip_id'); ?>
               </div>

               <div class="form-group">
                  <label class="col-sm-2 control-label">Etkinlik İl Adı</label>
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
                    <input type="text" name="etkinlik_telefon" class="form-control">
                    <?php echo form_error('etkinlik_telefon'); ?>

                     <!-- <input type="text" name="etkinlik_telefon" class="form-control" data-inputmask='"mask": "(999) 999 9999"' data-mask>  -->
                  </div>
                  
                </div>

                

                <div class="form-group">
                  <label class="col-sm-2 control-label">Web Adresi</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control"  name="etkinlik_url"  >
                    <?php echo form_error('etkinlik_url'); ?>
               </div>
                  </div>
                </div>

              
                <div class="form-group">
                  <label class="col-sm-2 control-label">Başlangıç Tarihi</label>
                  <div class="col-sm-2">
                    <input type="date" class="form-control"  name="etkinlik_baslangictarih">
                    <?php echo form_error('etkinlik_baslangictarih'); ?>
                  </div>

                  <label class="col-sm-2 control-label">Saati</label>
                  <div class="col-sm-2">
                    <input type="time" class="form-control"  name="etkinlik_saati">
                    <?php echo form_error('etkinlik_saati'); ?>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Bitiş Tarihi</label>
                  <div class="col-sm-2">
                    <input type="date" class="form-control"  name="etkinlik_bitistarih">
                    <?php echo form_error('etkinlik_bitistarih'); ?>
                  </div>
                </div>
            

                <div class="form-group">
                  <label class="col-sm-2 control-label">Etkinlik Fiyat</label>
                  <div class="col-sm-2">
                    <input type="text" class="currency" name="etkinlik_fiyat">
                    <?php echo form_error('etkinlik_fiyat'); ?>
                  </div>
               
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Etkinlik Görüntüleme</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control"  name="etkinlik_goruntuleme"  >
                    <?php echo form_error('etkinlik_goruntuleme'); ?> 
                  </div>
                </div>


                <div class="form-group">
                  <label class="col-sm-2 control-label">Anahtar Kelimeler</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control"  name="etkinlik_keyword"  >
                    <?php echo form_error('etkinlik_keyword'); ?> 
                  </div>
                </div>

                
                <div class="form-group">
                  <label class="col-sm-2 control-label">Etkinlik Detayları</label>
                  <div class="col-sm-8">
                    <textarea name="etkinlik_detay" id="editor1" rows="8" cols="100"></textarea>
                    <?php echo form_error('etkinlik_detay'); ?>
                  </div>
                </div>
           
                  </div>           
              <!-- /.box-body -->
              <div class="box-footer">
                <a class="btn btn-warning" href="<?php echo base_url('activity_controller'); ?>">Vazgeç</a>
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

