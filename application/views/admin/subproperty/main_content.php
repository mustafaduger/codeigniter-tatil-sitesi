 <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
       <?php echo $this->session->flashdata('login_error'); ?>
            
                       
           
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title"> Alt Ozellik Listesi</h3>
              <form action="<?php echo base_url('subproperty_controller/add_subproperty_page_controller'); ?>" method="post">

               
                  
                
                <input type="hidden" class="form-control"  name="ozellik_id" value="<?php echo $tempdata['ozellik_id'] ?>">
                

             
              <button type="submit" class="btn btn-primary pull-right"><i class="fa fa-plus"></i>Ekle</button>
               
              </form>
            </div>
            
            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.No</th>
                 <th>Özellik Adı</th>
                 <th>Alt Özellik Adı</th>
                  <th>Durum</th>
                  
                  
                  <th style="width: 100px;">İşlemler</th>
                </tr>
                </thead>
                <tbody>
               
                <?php $num=1;foreach ($result as $row) : ?>
                <tr>
                  <td><?php echo $num++; ?></td>
                  <td><?php echo $row->ozellik_adi ?></td>
                  <td><?php echo $row->altozellik_adi ?></td>
                  <td><input
                      class="toggle_check"
                      data-on="Aktif"
                      data-onstyle="success"
                      data-off="Pasif"
                      data-offstyle="warning"
                      type="checkbox"
                      dataID="<?php echo $row->altozellik_id; ?>"
                      dataURL="<?php echo base_url('subproperty_controller/isActive_set');?>"
                      <?php echo ($row->altozellik_isActive==1)?"checked":"";?>
                  ></td> 

                  <td class="center">
                    <a href="<?php echo base_url('subproperty_controller/edit_subproperty_controller/'.$row->altozellik_id.'');?>" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                   
                    <a class="btn btn-danger" onclick="return sor()" href="<?php echo base_url('subproperty_controller/delete_subproperty_controller/'.$row->altozellik_id.'') ?>"><i class="fa fa-trash-o"></i></a>

                  </td>


                 
                </tr>
               <?php endforeach;?>
                </tbody>
                
              </table>
                

            </div>
            <!-- /.box-body -->
                <div class="box-footer">
                <a class="btn btn-warning" href="<?php echo base_url('property_controller'); ?>">Vazgeç</a>
                
              </div>
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