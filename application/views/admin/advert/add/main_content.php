 <!-- Main content -->
    <section class="content">
      <div class="row">
      <div class="col-md-12">
      <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Reklam Ekle</h3>
            </div>
            <!-- /.box-header -->
       
            <!-- form start -->
            <form action="<?php echo base_url('advert_controller/add_advert_controller');?>" enctype= "multipart/form-data" method="post" class="form-horizontal">
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
                  <label class="col-sm-2 control-label">Reklam Başlık</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control"  name="reklam_adi"  >
                      <?php echo form_error('reklam_adi'); ?>
                     
                  </div>
                </div>
                             
                <div class="form-group">
                  <label class="col-sm-2 control-label">Gösterim Konumu</label>
                  <div class="col-sm-3">
                    <select class="form-control" name="reklamyeri_id">
                      <option >Konum Seçiniz</option>
                      <?php foreach (get_reklamyeri() as $value) {;?>
                        <option value="<?php echo $value->reklamyeri_id;?>"><?php echo $value->reklamyeri_adi; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <?php echo form_error('reklamyeri_id'); ?>
               </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Başlangıç Tarihi</label>
                  <div class="col-sm-2">
                    <input type="date" class="form-control"  name="reklam_baslangictarih">
                    <?php echo form_error('reklam_baslangictarih'); ?>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Bitiş Tarihi</label>
                  <div class="col-sm-2">
                    <input type="date" class="form-control"  name="reklam_bitistarih">
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
         </div>
          </div>
        </div>
    </section>
    <div class="clearfix"></div> 
    <!-- /.content -->

