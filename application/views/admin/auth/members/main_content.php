 <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
        


        <?php echo $this->session->flashdata('flash_message'); ?>

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Üye Listesi</h3>
              <a href="<?php echo base_url('auth/membersregister_controller');?>"><button type="submit" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Üye Ekle</button></a>
            </div>

            
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>S.No</th>
                  <th>Adı</th>
                  <th>Soyadı</th>
                  <th>Mail Adresi</th>
                  <th>Grup</th>
                  <th>Durum</th>
                  <th>İşlemler</th>
                  
                </tr>
                </thead>

                <tbody>
               
                <?php $num=1; foreach ($result as $user): ?>
                <tr>
                  <td><?php echo $num++; ?></td>
                  <td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
                  <td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
                  <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
                  <td><?php echo htmlspecialchars($user->name,ENT_QUOTES,'UTF-8');?></td>
                           
                <td><input
                      class="toggle_check"
                      data-on="Aktif"
                      data-onstyle="success"
                      data-off="Pasif"
                      data-offstyle="warning"
                      type="checkbox"
                      dataID="<?php echo $user->id; ?>"
                      dataURL="<?php echo base_url('auth/isActive_set');?>"
                      <?php echo ($user->status==1)?"checked":"";?>
                  ></td> 

                  
                  <td class="center">
                    <a href="<?php echo base_url('auth/membersedit_controller/'.$user->id.'');?>" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                    

                    <a class="btn btn-danger" onclick="return sor()" href="<?php echo base_url('auth/deletemember/'.$user->id.'') ?>"><i class="fa fa-trash-o"></i></a>
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
    