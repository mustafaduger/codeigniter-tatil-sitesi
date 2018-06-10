 <!-- Main content -->
    <section class="content">
       <div class="row">
      <div class="col-md-12">
      <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Reklam Düzenle </h3>
            </div>
            <div class="align-middle">
            <!-- /.box-header -->
        <?php foreach ($result as $row) : ?>
            <!-- form start -->
             <form action="<?php echo base_url('advert_controller/update_advert_controller');?>" enctype= "multipart/form-data" method="post" class="form-horizontal">
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
                     <img src="<?php echo base_url($row->reklam_tmb);?>" class="img-thumbnail">

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
                  <label class="col-sm-2 control-label">Reklam Başlık</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control"  name="reklam_adi" value="<?php echo ($row->reklam_adi);?>" >
                     <?php echo form_error('reklam_adi'); ?> 
                    <input type="hidden" name="reklam_id" value="<?php echo($row->reklam_id) ?>">

                  </div>
                </div>


               <div class="form-group">
                  <label class="col-sm-2 control-label">Gösterim Konumu</label>
                  <div class="col-sm-3">
                    <select class="form-control" name="reklamyeri_id">
                      <?php foreach(get_reklamyeri() as $value){ 
                      if ($value->reklamyeri_id==$row->reklamyeri_id) 
                        {;?>
                      <option selected value="<?php echo $value->reklamyeri_id;?>"><?php echo $value->reklamyeri_adi;?></option>
                        <?php }else{ ; ?>
                      <option value="<?php echo $value->reklamyeri_id;?>"><?php echo $value->reklamyeri_adi;?></option>
                      <?php }}; ?>
                    </select>
                  </div>
                  <?php echo form_error('reklamyeri_id'); ?>
               </div>

              
                <div class="form-group">
                  <label class="col-sm-2 control-label">Başlangıç Tarihi</label>
                  <div class="col-sm-2">
                    <input type="date" class="form-control"  name="reklam_baslangictarih" value="<?php echo ($row->reklam_baslangictarih);?>">
                     <?php echo form_error('reklam_baslangictarih'); ?>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label">Bitiş Tarihi</label>
                  <div class="col-sm-2">
                    <input type="date" class="form-control"  name="reklam_bitistarih" value="<?php echo ($row->reklam_bitistarih);?>">
                    <?php echo form_error('reklam_bitistarih'); ?>
                  </div>
                </div>
                      
              </div>           
              <!-- /.box-body -->
              <div class="box-footer">
                <a class="btn btn-warning" href="<?php echo base_url('advert_controller'); ?>">Vazgeç</a>
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
    