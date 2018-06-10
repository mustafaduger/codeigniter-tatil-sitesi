 <!-- Main content -->
    <section class="content">
      <div class="col-md-12">
      <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Firma İşlemleri</h3>
            </div>
            <!-- /.box-header -->
           <?php echo $this->session->flashdata('login_error'); ?>
            <!-- form start -->

            <div class="box-body">
              <p class="font-weight-bold"><h3><?php echo $result->firma_adi ?></h3></p>
              <a href="<?php echo base_url('firmsettings_controller/firmsettingsadmin_controller/'.$result->firma_id.'');?>" class="btn btn-app">
                <i class="fa fa-refresh"></i> Bilgi Güncelleme
              </a>
              <a class="btn btn-app">
                <i class="fa fa-list-alt"></i> Firma Özellikler
              </a>
              <a href="<?php echo base_url('advert_controller/index/'.$result->firma_id.'');?>" class="btn btn-app">
                <i class="fa fa-google-wallet"></i> Reklam
              </a>
              <a class="btn btn-app">
                <i class="fa fa-music"></i> Etkinlik
              </a>
              <a class="btn btn-app">
                <i class="fa fa-diamond"></i> Şehir fırsatı
              </a>
                           
              <a class="btn btn-app">
                 <i class="fa fa-file-image-o"></i> Fotoğraflar
              </a>
              <a class="btn btn-app">
                  <i class="fa  fa-commenting-o"></i> Yorumlar
              </a>
              <a class="btn btn-app">
                  <i class="fa fa fa-envelope-o"></i> Mesajlar
              </a>
              <a class="btn btn-app">
                <i class="fa fa-star-o"></i> Favoriler
              </a>
              
            </div>
         </div>
          </div>


          <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="fa fa-envelope-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Messages</span>
              <span class="info-box-number">1,410</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-flag-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Bookmarks</span>
              <span class="info-box-number">410</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="fa fa-files-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Uploads</span>
              <span class="info-box-number">13,648</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-star-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Likes</span>
              <span class="info-box-number">93,139</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
</div>
         
    </section>
    <div class="clearfix"></div> 
    <!-- /.content -->