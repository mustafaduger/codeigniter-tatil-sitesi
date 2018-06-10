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
             <form action="<?php echo base_url('opportunity_controller/update_opportunity_controller');?>" enctype= "multipart/form-data" method="post" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                
                  <label class="col-sm-2 control-label">Resim</label>
                  <div class="col-sm-3">
                    <input type="file" name="image" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Mevcut Resim</label>
                  <div class="col-sm-4">
                     <img src="<?php echo base_url($row->firsat_tmb);?>" class="img-thumbnail">

                    <p class="text-blue">Mevcut resmi değiştirmiyecekseniz seçim yapmayınız.</p>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Fırsat Adı</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control"  name="firsat_adi"  value="<?php echo ($row->firsat_adi);?>"> 
                    <input type="hidden" name="firsat_id" value="<?php echo ($row->firsat_id);?>">
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
                    <input type="text" class="form-control"  name="firsat_telefon"  value="<?php echo ($row->firsat_telefon);?>"> 
                  </div>
                  
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Adres</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control"  name="firsat_adres"  value="<?php echo ($row->firsat_adres);?>"> 
                  </div>
                  
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Web Adresi</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control"  name="firsat_url"  value="<?php echo ($row->firsat_url);?>"  > 
                  </div>
                </div>

              
                <div class="form-group">
                  <label class="col-sm-2 control-label">Başlangıç Tarihi</label>
                  <div class="col-sm-2">
                    <input type="date" class="form-control"  name="firsat_baslangictarih" value="<?php echo ($row->firsat_baslangictarih);?>">
                  </div>

                  <label class="col-sm-2 control-label">Saati</label>
                  <div class="col-sm-2">
                    <input type="time" class="form-control"  name="firsat_saati" value="<?php echo ($row->firsat_saati);?>">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Bitiş Tarihi</label>
                  <div class="col-sm-2">
                    <input type="date" class="form-control"  name="firsat_bitistarih" value="<?php echo ($row->firsat_bitistarih);?>">
                  </div>
                </div>
            

                <div class="form-group">
                  <label class="col-sm-2 control-label">Fiyat Eski</label>
                  <div class="col-sm-2">
                    <input type="text" class="currency"  name="firsat_fiyateski" value="<?php echo ($row->firsat_fiyateski);?>" > 
                  </div>
                
                  <label class="col-sm-2 control-label">Fiyat Yeni</label>
                  <div class="col-sm-2">
                    <input type="text" class="currency"  name="firsat_fiyatyeni" value="<?php echo ($row->firsat_fiyatyeni);?>"  > 
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Fırsat Görüntüleme</label>
                  <div class="col-sm-2">
                    <input type="text" class="form-control"  name="firsat_goruntuleme" value="<?php echo ($row->firsat_goruntuleme);?>"  > 
                  </div>
                </div>


                <div class="form-group">
                  <label class="col-sm-2 control-label">Anahtar Kelimeler</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control"  name="firsat_keyword" value="<?php echo ($row->firsat_keyword);?>" > 
                  </div>
                </div>

                
                <div class="form-group">
                  <label class="col-sm-2 control-label">Fırsat Detay</label>
                  <div class="col-sm-8">
                    <textarea name="firsat_detay" id="editor1" rows="8" cols="100"><?php echo ($row->firsat_keyword);?></textarea>
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
             <?php endforeach;?>
             </div>
         </div>
          </div>
         </div>
    </section>
    <div class="clearfix"></div> 
    <!-- /.content -->
    <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker();
            });
    </script>