 <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
        
           <?php echo $this->session->flashdata('login_error'); ?>
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Keşfet Kategori Listesi</h3>
              <a href="<?php echo base_url('categoryexplore_controller/add_category_page_controller');?>"><button type="submit" class="btn btn-primary pull-right"><i class="fa fa-plus"></i>  Ekle</button></a>
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
                  <td><?php echo $row->kategori_adi ?></td>
                   <td><input
                      class="toggle_check"
                      data-on="Aktif"
                      data-onstyle="success"
                      data-off="Pasif"
                      data-offstyle="warning"
                      type="checkbox"
                      dataID="<?php echo $row->kategori_id; ?>"
                      dataURL="<?php echo base_url('categoryexplore_controller/isActive_set');?>"
                      <?php echo ($row->kategori_isActive==1)?"checked":"";?>
                  ></td>


                   <td class="center">
                    <a href="<?php echo base_url('categoryexplore_controller/edit_category_controller/'.$row->kategori_id.'');?>" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                    <a class="btn btn-danger" onclick="return sor()" href="<?php echo base_url('categoryexplore_controller/delete_category_controller/'.$row->kategori_id.'') ?>"><i class="fa fa-trash-o"></i></a>

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

    <script language="javascript">
     function sor(){
         if(confirm("Kayıt Siliniyor, Onaylıyormusunuz?")){}
        else{ return false; }
      }
</script>