 <!-- Main content -->
    <section class="content">
     <?php foreach ($result as $row) : ?>
<div class="col-md-3">
  <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url() ?>assets/admin/dist/img/user4-128x128.jpg" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo ($row->firma_adi) ?></h3>
                          
             <!--  <p class="text-muted text-center">Software Engineer</p> -->

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Konum</b> 
                  <div class="pull-right">
                    <div class="rating-input">
                      <?php for ($i=0; $i <5 ; $i++) {?> 
                        <i class="<?php echo $i<$row->yorum_konum  ? 'glyphicon glyphicon-star' : 'glyphicon glyphicon-star-empty'; ?>"></i>
                      <?php } ?> 
                    </div>
                    </div>
                </li>

                <li class="list-group-item">
                  <b>Servis</b> 
                  <div class="pull-right">
                    <div class="rating-input">
                      <?php for ($i=0; $i <5 ; $i++) {?> 
                        <i class="<?php echo $i<$row->yorum_servis  ? 'glyphicon glyphicon-star' : 'glyphicon glyphicon-star-empty'; ?>"></i>
                      <?php } ?> 
                    </div>
                </li>

                <li class="list-group-item">
                  <b>Fiyat</b> 
                  <div class="pull-right">
                    <div class="rating-input">
                      <?php for ($i=0; $i <5 ; $i++) {?> 
                        <i class="<?php echo $i<$row->yorum_fiyat  ? 'glyphicon glyphicon-star' : 'glyphicon glyphicon-star-empty'; ?>"></i>
                      <?php } ?> 
                    </div>
                </li>

                <li class="list-group-item">
                  <b>Kalite</b> 
                  <div class="pull-right">
                    <div class="rating-input">
                      <?php for ($i=0; $i <5 ; $i++) {?> 
                        <i class="<?php echo $i<$row->yorum_kalite  ? 'glyphicon glyphicon-star' : 'glyphicon glyphicon-star-empty'; ?>"></i>
                      <?php } ?> 
                    </div>
                </li>

                
              </ul>

             
            </div>
            <!-- /.box-body -->
          </div>
</div>

<div class="col-md-9">
      <div class="box box-info">

            <div class="box-header with-border">
              <h3 class="box-title">Mesaj Bilgileri </h3>
            </div>

        

            
                  <!-- /.box-header -->
              
                  <!-- form start -->
                  <form action="<?php echo base_url('comment_controller/update_comment_controller');?>" enctype= "multipart/form-data" method="post" class="form-horizontal">
                    <div class="box-body">
                     
                   

                     <div class="form-group">
                        <label class="col-sm-2 control-label">Gönderen:</label>

                        <div class="col-sm-3">
                          <p class="form-control-static"><?php echo ($row->yorum_adsoyad);?></p> 
                          <input type="hidden" name="comment_id" value="<?php echo ($row->yorum_id) ?>">
                        </div>
                        
                      </div>
                      
                      <div class="form-group">
                         <label class="col-sm-2 control-label">Tarih:</label>

                        <div class="col-sm-3">
                          <p class="form-control-static"><?php echo ($row->yorum_createdDate);?></p> 
                        </div>
                       </div>

                       

                      <div class="form-group">
                        <label class="col-sm-2 control-label">Yorum İçerik</label>
                        <div class="col-sm-6">
                          <textarea name="yorum_icerik" rows="8" cols="80"><?php echo $row->yorum_icerik;?></textarea>
                          <?php echo form_error('yorum_icerik'); ?>
                        </div>
                      </div>
                    </div> 


            <!-- /.box-body -->
           
            <!-- /.box-footer -->
    
              <!-- /.box-body -->
              <div class="box-footer">
                <a class="btn btn-warning" href="<?php echo base_url('comment_controller'); ?>">Vazgeç</a>
                <button type="submit" class="btn btn-info pull-right">Kaydet</button>
              </div>
              <!-- /.box-footer -->
            </form>
             <?php endforeach;?>
          </div>
       </div>
    </section>
    <div class="clearfix"></div> 
    <!-- /.content -->
    <script>
      $('some_id').rating({
  clearable: false
});
    </script>