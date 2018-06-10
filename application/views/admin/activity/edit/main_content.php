 <!-- Main content -->
    <section class="content">
       <div class="row">
      <div class="col-md-12">
      <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Şehir Fırsatı Düzenle </h3>
            </div>
            <div class="align-middle">
            <!-- /.box-header -->
        <?php foreach ($result as $row) : ?>
            <!-- form start -->
             <form action="<?php echo base_url('activity_controller/update_activity_controller');?>" enctype= "multipart/form-data" method="post" class="form-horizontal">
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
                     <img src="<?php echo base_url($row->etkinlik_tmb);?>" class="img-thumbnail">

                    <p class="text-blue">Mevcut resmi değiştirmiyecekseniz seçim yapmayınız.</p>
                  </div>
                </div>

                


                
               <div class="form-group">
                  <label class="col-sm-2 control-label">Firma Adı</label>
                  <div class="col-sm-3">
                    <select class="form-control" name="firma_id">
                      <?php foreach(get_firma() as $value){ 
                      if ($value->firma_id==$row->firma_id) 
                        {;?>
                      <option selected value="<?php echo $value->firma_id;?>"><?php echo $value->firma_adi;?></option>
                        <?php }else{ ; ?>
                      <option value="<?php echo $value->firma_id;?>"><?php echo $value->firma_adi;?></option>
                      <?php }}; ?>
                    </select>
                  </div>
                  <?php echo form_error('firma_id'); ?>
               </div>

               <div class="form-group">
                  <label class="col-sm-2 control-label">Etkinlik Adı</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control"  name="etkinlik_adi"  value="<?php echo ($row->etkinlik_adi);?>">
                    <?php echo form_error('etkinlik_adi'); ?>
                    <input type="hidden" name="etkinlik_id" value="<?php echo ($row->etkinlik_id);?>">
                  </div>
                  
                </div>

                 <div class="form-group">
                  <label class="col-sm-2 control-label">Etkinlik Mekan Adı</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control"  name="etkinlik_mekanadi" value="<?php echo ($row->etkinlik_mekanadi);?>" > 
                    <?php echo form_error('etkinlik_mekanadi'); ?> 
                  </div>
                </div>


                <div class="form-group">
                  <label class="col-sm-2 control-label">Adres</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control"  name="etkinlik_adres" value="<?php echo ($row->etkinlik_adres);?>" >
                    <?php echo form_error('etkinlik_adres'); ?>
                  </div>
                  
                </div>

              
                <div class="form-group">
                  <label class="col-sm-2 control-label">Etkinlik Tipi</label>
                  <div class="col-sm-3">
                    <select class="form-control" name="etkinliktip_id">
                      <?php foreach(get_etkinliktip() as $value){ 
                      if ($value->etkinliktip_id==$row->etkinliktip_id) 
                        {;?>
                      <option selected value="<?php echo $value->etkinliktip_id;?>"><?php echo $value->etkinliktip_adi;?></option>
                        <?php }else{ ; ?>
                      <option value="<?php echo $value->etkinliktip_id;?>"><?php echo $value->etkinliktip_adi;?></option>
                      <?php }}; ?>
                    </select>
                  </div>
                  <?php echo form_error('etkinliktip_id'); ?>
               </div>




              <div class="form-group">
                  <label class="col-sm-2 control-label">İl Adı</label>
                  <div class="col-sm-3">
                    <select class="form-control" name="il_id">
                      <?php foreach(get_il() as $value){ 
                      if ($value->CityID==$row->il_id) 
                        {;?>
                      <option selected value="<?php echo $value->CityID;?>"><?php echo $value->CityName;?></option>
                        <?php }else{ ; ?>
                      <option value="<?php echo $value->CityID;?>"><?php echo $value->CityName;?></option>
                      <?php }}; ?>
                    </select>
                  </div>
                  <?php echo form_error('il_id'); ?>
               </div>

              

                <div class="form-group">
                  <label class="col-sm-2 control-label">Telefon</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control"  name="etkinlik_telefon"  value="<?php echo ($row->etkinlik_telefon);?>">
                    <?php echo form_error('etkinlik_telefon'); ?> 
                  </div>
                  
                </div>


                <div class="form-group">
                  <label class="col-sm-2 control-label">Web Adresi</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control"  name="etkinlik_url"  value="<?php echo ($row->etkinlik_url);?>"  >
                    <?php echo form_error('etkinlik_url'); ?>
                  </div>
                </div>

              
                <div class="form-group">
                  <label class="col-sm-2 control-label">Başlangıç Tarihi</label>
                  <div class="col-sm-2">
                    <input type="date" class="form-control"  name="etkinlik_baslangictarih" value="<?php echo ($row->etkinlik_baslangictarih);?>">
                    <?php echo form_error('etkinlik_baslangictarih'); ?>
                  </div>

                  <label class="col-sm-2 control-label">Saati</label>
                  <div class="col-sm-2">
                    <input type="time" class="form-control"  name="etkinlik_saati" value="<?php echo ($row->etkinlik_saati);?>">
                    <?php echo form_error('etkinlik_saati'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Bitiş Tarihi</label>
                  <div class="col-sm-2">
                    <input type="date" class="form-control"  name="etkinlik_bitistarih" value="<?php echo ($row->etkinlik_bitistarih);?>">
                    <?php echo form_error('etkinlik_bitistarih'); ?>
                  </div>
                </div>
            

                <div class="form-group">
                  <label class="col-sm-2 control-label">Etkinlik Fiyat</label>
                  <div class="col-sm-2">
                    <input type="text" class="currency"  name="etkinlik_fiyat" value="<?php echo ($row->etkinlik_fiyat);?>" >
                    <?php echo form_error('etkinlik_fiyat'); ?>
                  </div>
                
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Etkinlik Görüntüleme</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control"  name="etkinlik_goruntuleme" value="<?php echo ($row->etkinlik_goruntuleme);?>"  >
                    <?php echo form_error('etkinlik_goruntuleme'); ?> 
                  </div>
                </div>


                <div class="form-group">
                  <label class="col-sm-2 control-label">Anahtar Kelimeler</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control"  name="etkinlik_keyword" value="<?php echo ($row->etkinlik_keyword);?>" >
                    <?php echo form_error('etkinlik_keyword'); ?> 
                  </div>
                </div>

                
                <div class="form-group">
                  <label class="col-sm-2 control-label">Etkinlik Detayları</label>
                  <div class="col-sm-8">
                    <textarea name="etkinlik_detay" id="editor1" rows="8" cols="100"><?php echo ($row->etkinlik_detay);?></textarea>
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
             <?php endforeach;?>
             </div>
         </div>
          </div>
         </div>
    </section>
    <div class="clearfix"></div> 
    <!-- /.content -->
    