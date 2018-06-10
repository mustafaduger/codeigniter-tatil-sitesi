 <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
        
           <?php echo $this->session->flashdata('login_error'); ?>
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Reklam Listesi</h3>
              <a href="<?php echo base_url('advert_controller/add_advert_page_controller');?>"><button type="submit" class="btn btn-primary pull-right"><i class="fa fa-plus"></i>  Ekle</button></a>
            </div>

            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.No</th>
                  <th>Reklam Başlık</th>
                  <th>Konum</th>
                  <th>Başlangıç Tarihi</th>
                  <th>Bitiş Tarihi</th>
                  <th>Durum</th>
                  <th style="width: 100px;">İşlemler</th>
                </tr>
                </thead>
                <tbody>
               
                <?php $num=1;foreach ($result as $row) : ?>
                <tr>
                  <td><?php echo $num++; ?></td>
                  <td><?php echo $row->reklam_adi ?></td>
                  <td><?php echo $row->reklamyeri_adi ?></td>
                  <td><?php echo date('d-m-Y',strtotime($row->reklam_baslangictarih)) ?></td>
                  <td><?php echo date('d-m-Y',strtotime($row->reklam_bitistarih)) ?></td>
                  
                  <td>
                    
                    <input
                      class="toggle_check"
                     
                      data-on="Aktif"
                      data-onstyle="success"
                      data-off="Pasif"
                      data-offstyle="warning"
                      type="checkbox"
                      dataID="<?php echo $row->reklam_id; ?>"
                      dataURL="<?php echo base_url('advert_controller/isActive_set');?>"
                      <?php echo ($row->reklam_isActive==1)?"checked":"";?>>
                    
                    </td>                 
                  <td class="center">
                    <a href="<?php echo base_url('advert_controller/edit_advert_controller/'.$row->reklam_id.'');?>" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                    

                    <a class="btn btn-danger " onclick="return sor()" href="<?php echo base_url('advert_controller/delete_advert_controller/'.$row->reklam_id.'') ?>"><i class="fa fa-trash-o"></i></a>

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
