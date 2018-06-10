 <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
        
           <?php echo $this->session->flashdata('login_error'); ?>
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Yorum Listesi</h3>
              
            </div>

            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.No</th>
                  <th>Gönderen</th>
                  <th>Firma Adı</th>
                  <th>Değerlendirme</th>
                  <th>Tarih</th>
                  <th>Durum</th>
                  <th style="width: 100px;">İşlemler</th>
                </tr>
                </thead>
                <tbody>
               
                <?php $num=1;foreach ($result as $row) : ?>
                <tr>
                  <td><?php echo $num++; ?></td>
                  <td><?php echo $row->yorum_adsoyad?></td>
                  <td><?php echo $row->firma_adi?></td>
                  <td><?php echo $row->yorum_puan?></td>
                  <td><?php echo $row->yorum_createdDate ?></td>
                  <td><input
                      class="toggle_check"
                      data-on="Aktif"
                      data-onstyle="success"
                      data-off="Pasif"
                      data-offstyle="warning"
                      type="checkbox"
                      dataID="<?php echo $row->yorum_id; ?>"
                      dataURL="<?php echo base_url('comment_controller/isActive_set');?>"
                      <?php echo ($row->yorum_isActive==1)?"checked":"";?>
                  ></td>

                   <td class="center">
                    <a href="<?php echo base_url('comment_controller/edit_comment_controller/'.$row->yorum_id.'');?>" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                  
                    <a class="btn btn-danger" onclick="return sor()" href="<?php echo base_url('comment_controller/delete_comment_controller/'.$row->yorum_id.'') ?>"><i class="fa fa-trash-o"></i></a>
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