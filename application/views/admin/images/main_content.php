 <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
        
           <?php echo $this->session->flashdata('login_error'); ?>
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Fotoğraf Listesi</h3>
                
              <div class="pull-right">
                
              </div>
              <div class="pull-right" style="color: white;">blaa</div>
              <div class="pull-right">
                <input
                      class="toggle_check"
                      data-on="Aktif"
                      data-onstyle="success"
                      data-off="Pasif"
                      data-offstyle="warning"
                      type="checkbox"
                      dataID="<?php echo $row->resim_id; ?>"
                      dataURL="<?php echo base_url('images_controller/isActive_set');?>"
                      <?php echo ($row->resim_isActive==1)?"checked":"";?>>
              </div>
            </div>

            <!-- /.box-header -->
            <div class="box-body">
              <table  class="table table-bordered">
                <thead>
                <tr>
                  <th style= "width:10px">S.No</th>
                  <th class="middle">Fotoğraf</th>
                  <th>Gösterim Yeri</th>
                  <th>İşlemler</th>
                 </tr>
                </thead>
                <tbody>
              
               
                <tr>
                  <td> 1 </td>
                  <td>
                    <?php if (is_null($row->resim_list)) {?>
                    <?php echo "Resim yüklü değil" ?>
                    <?php }else{ ?>
                    <img class="profile-user-img img-responsive" src="<?php echo $row->resim_list?>">
                    <?php } ?>
                  </td>

                  <td>Liste Sayfası Resmi</td>

                  <td style="width: 20%;"><a href="<?php echo base_url('images_controller/imageslist_controller');?>"><button type="submit" class="btn btn-primary pull-left"><i class="fa fa-pencil"></i>Güncelle</button></a>
                  </td>
                  
                  </tr>
                <tr>
                  <td>2</td>
                  <td>
                    <?php if (is_null($row->resim_ust)) {?>
                    <?php echo "Resim yüklü değil" ?>
                    <?php }else{ ?>
                    <img class="profile-user-img img-responsive" src="<?php echo $row->resim_ust?>">
                    <?php } ?>
                  </td>
                  <td>Ana Sayfa Üst Resmi</td>
                  <td style="width: 20%;"><a href="<?php echo base_url('images_controller/imagesupper_controller');?>"><button type="submit" class="btn btn-primary pull-left"><i class="fa fa-pencil"></i>Güncelle</button></a>
                  </td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>
                    <?php if (is_null($row->resim_tanitim1)) {?>
                    <?php echo "Resim yüklü değil" ?>
                    <?php }else{ ?>
                    <img class="profile-user-img img-responsive" src="<?php echo $row->resim_tanitim1;?>"><br>
                    <img class="profile-user-img img-responsive" src="<?php echo $row->resim_tanitim2;?>"><br>
                    <img class="profile-user-img img-responsive" src="<?php echo $row->resim_tanitim3;?>"><br>
                    <img class="profile-user-img img-responsive" src="<?php echo $row->resim_tanitim4;?>"><br>
                    <img class="profile-user-img img-responsive" src="<?php echo $row->resim_tanitim5;?>"><br>
                    <?php } ?>
                    
                  </td>
                  <td>Tanıtım Resimleri</td>
                  <td style="width: 20%;"><a href="<?php echo base_url('images_controller/imagespromotion_controller');?>"><button type="submit" class="btn btn-primary pull-left"><i class="fa fa-pencil"></i>Güncelle</button></a>
                  </td>
                </tr>
               
                            
             
                </tbody>
                
              </table>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

<script language="javascript">
     function sor(){
         if(confirm("Kayıt Siliniyor, Onaylıyormusunuz?")){}
        else{ return false; }
      }
</script>

