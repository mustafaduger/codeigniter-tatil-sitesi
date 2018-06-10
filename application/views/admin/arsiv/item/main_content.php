 <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
        
           <?php echo $this->session->flashdata('login_error'); ?>
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Ürün Listesi</h3>
              <a href="<?php echo base_url('item_controller/add_item_page_controller');?>"><button type="submit" class="btn btn-primary pull-right"><i class="fa fa-plus"></i>  Ekle</button></a>
            </div>

            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.No</th>
                  <th>Ürün Adı</th>
                  <th>Ürün Resmi</th>
                  <th>Fiyatı</th>
                  <th>Marka</th>
                  <th>Kategori</th>
                  
                  <th style="width: 100px;">İşlemler</th>
                </tr>
                </thead>
                <tbody>
               
                <?php $num=1;foreach ($result as $row) : ?>
                <tr>
                  <td><?php echo $num++; ?></td>
                  <td><?php echo $row->item_name ?></td>
                  <td><img class="profile-user-img img-responsive" src="<?php echo $row->image;?>"></td>
                  <td><?php echo $row->price ?></td>
                  <td><?php echo $row->brand_name ?></td>
                  <td><?php echo $row->category_name ?></td>
                  
                  <td>
                  <a href="<?php echo base_url('item_controller/edit_item_controller/'.$row->item_id.'');?>"><button type="submit" class="btn btn-info">Düzenle</button></a>
                   <a href="<?php echo base_url('item_controller/delete_item_controller/'.$row->item_id.'');?>"><button type="submit" class="btn btn-danger">Sil</button></a>
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