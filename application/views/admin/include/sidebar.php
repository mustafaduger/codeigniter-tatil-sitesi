<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('assets/admin') ?>/dist/img/icologo.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><h4><?php echo $this->session->userdata('firstName');?></h4></p>
          <!-- <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
        </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header text-aqua text-center" style="font-size: 17px;">MENU</li>
        <li>
          <a href="<?php echo base_url('admin_controller') ?>">
            <i class="fa fa-dashboard"></i> <span>Ana Sayfa</span>
          </a>
          
        </li>

        <li class="header text-red text-center" style="font-size: 17px;">Yönetici</li>
      

       <li class="treeview">
          <a href="#">
            <i class="fa fa-sitemap"></i> <span>Kategori/Özellik</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('category_controller') ?>"><i class="fa fa-circle-o"></i> Kategoriler</a></li>
            <li><a href="<?php echo base_url('subcategory_controller') ?>"><i class="fa fa-circle-o"></i> Alt Kategoriler</a></li>
            <li><a href="<?php echo base_url('property_controller') ?>"><i class="fa fa-circle-o"></i>Özellikler</a></li>
          </ul>
      </li> 

       <li><a href="<?php echo base_url('auth/members_controller') ?>"><i class="fa fa-users"></i> <span>Üyelik İşlemleri</span></a></li>
       <li><a href="<?php echo base_url('firmoperation_controller') ?>"><i class="fa  fa-object-group"></i> <span>Firma İşlemleri</span></a></li>
       <li><a href="<?php echo base_url('comment_controller') ?>"><i class="fa fa-commenting-o"></i> <span>Yorumlar</span></a></li>
       <li><a href=""><i class="fa fa-file-text-o"></i> <span>E-Bülten</span></a></li>
       <li class="treeview">
          <a href="#">
            <i class="fa fa-shopping-cart"></i> <span>Sipariş İşlemleri</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Üyelik Tipi</a></li>
            <li><a href="<?php echo base_url('advert_controller');?>"><i class="fa fa-circle-o"></i> Reklam</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Etkinlik</a></li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Şehir Fırsatı</a></li>
          </ul>
             </li> 

       <li><a href="#"><i class="fa fa-money"></i> <span>Ödemeler</span></a></li>
       

        <li class="treeview">
          <a href="#">
            <i class="fa fa-file"></i> <span>Sayfalar</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
          
         

            <li><a href="<?php echo base_url('about_controller') ?>"><i class="fa fa-circle-o"></i> <span>Hakkımızda</span></a></li>
            <li><a href="<?php echo base_url('news_controller') ?>"><i class="fa fa-circle-o"></i> <span>Haberler</span></a></li>
            <li><a href="<?php echo base_url('slider_controller') ?>"><i class="fa fa-picture-o"></i> <span>Slider</span></a></li>
          </ul>
        </li>
         <li class="treeview">
          <a href="#">
            <i class="fa fa-tripadvisor"></i> <span>Keşfet</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url('categoryexplore_controller');?>"><i class="fa fa-circle-o"></i> Kategori</a></li>
            <li><a href="<?php echo base_url('explorecontent_controller');?>"><i class="fa fa-circle-o"></i> İçerik</a></li>
            <li><a href=""><i class="fa fa-circle-o"></i> Yorumlar</a></li>
            
          </ul>
        </li>

          <li class="treeview">
          <a href="#">
            <i class="fa fa-indent"></i> <span>Blog Yönetimi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href=""><i class="fa fa-circle-o"></i> Kategori</a></li>
            <li><a href=""><i class="fa fa-circle-o"></i> İçerik</a></li>
            
          </ul>
        </li>
        
        <li><a href="<?php echo base_url('settings_controller') ?>"><i class="fa fa-gears"></i> <span>Ayarlar</span></a></li>    

      <li class="header text-green text-center" style="font-size: 17px;">Kurumsal</li>

      <li><a href="<?php echo base_url('firmsettings_controller/firmsettingsadmin_controller') ?>"><i class="fa fa-refresh"></i> <span>Bilgi Güncelleme</span></a></li>
      <li><a href="<?php echo base_url('firmproperty_controller') ?>"><i class="fa fa-list-alt"></i> <span>Firma Özellikler</span></a></li>

      <li><a href="<?php echo base_url('advert_controller');?>"><i class="fa fa-google-wallet"></i> <span>Reklam</span></a></li>
      <li><a href="<?php echo base_url('activity_controller') ?>"><i class="fa fa-music"></i> <span>Etkinlik</span></a></li>
      <li><a href="<?php echo base_url('opportunity_controller') ?>"><i class="fa fa-diamond"></i> <span>Şehir Fırsatı</span></a></li>
          <!-- <li class="treeview">
          <a href="#">
            <i class="fa fa-indent"></i> <span>Sipariş İşlemleri</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href=""><i class="fa fa-circle-o"></i> Üyelik Tipi</a></li>
            <li><a href=""><i class="fa fa-circle-o"></i> Reklam</a></li>
            <li><a href=""><i class="fa fa-circle-o"></i> Etkinlik</a></li>
            <li><a href=""><i class="fa fa-circle-o"></i> Şehir Fırsatı</a></li>
          </ul>
             </li>     
           -->
       <li><a href="#"><i class="fa fa-key"></i> <span>Şifre Değiştirme</span></a></li>

        <li><a href="<?php echo base_url('images_controller') ?>"><i class="fa fa-file-image-o"></i> <span>Fotoğraflar</span></a></li>
        <li><a href="#"><i class="fa  fa-commenting-o"></i> <span>Yorumlar</span></a></li>
        <li><a href="#"><i class="fa fa fa-envelope-o"></i> <span>Mesajlar</span></a></li>
        <li><a href="#"><i class="fa fa-star-o"></i> <span>Favoriler</span></a></li>
        

        
        
        <li class="header">İŞLEMLER</li>
        <li><a href="<?php echo base_url('auth/logout') ?>"><i class="fa fa-circle-o text-red"></i> <span>Çıkış Yap</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Siteye Git</span></a></li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
