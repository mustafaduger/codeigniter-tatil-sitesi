 <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
        
           <?php echo $this->session->flashdata('login_error'); ?>
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Kategori Listesi</h3>
              <a href="<?php echo base_url('category_controller/add_category_page_controller');?>"><button type="submit" class="btn btn-primary pull-right"><i class="fa fa-plus"></i>  Ekle</button></a>
            </div>

            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.No</th>
                  <th>Kategori Adı</th>
                  <th>Durum</th>
                  <th style="width: 100px;">İşlemler</th>
                </tr>
                </thead>
                <tbody>
               
                <?php $num=1;foreach ($result as $row) : ?>
                <tr>
                  <td><?php echo $num++; ?></td>
                  <td><?php echo $row->title ?></td>
                  <td><input
                      class="toggle_check"
                      data-on="Aktif"
                      data-onstyle="success"
                      data-off="Pasif"
                      data-offstyle="danger"
                      type="checkbox"
                      dataID="<?php echo $row->id; ?>"
                      dataURL="<?php echo base_url('category_controller/isActive_set');?>"
                      <?php echo ($row->isActive==1)?"checked":"";?>
                  ></td>
                  
                  <td>
                  <a href="<?php echo base_url('category_controller/edit_category_controller/'.$row->id.'');?>"><button type="submit" class="btn btn-info">Düzenle</button></a>
                   <a href="<?php echo base_url('category_controller/delete_category_controller/'.$row->id.'');?>"><button type="submit" class="btn btn-danger">Sil</button></a>
                  </td>
                </tr>
               <?php endforeach;?>
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