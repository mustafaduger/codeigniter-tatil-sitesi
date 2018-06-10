 <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
        


        <?php if ($message): ?>
          <div class="alert alert-success alert-dismissible">
         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
               <div id="infoMessage"><?php echo $message;?></div> 
         </div>  
        <?php endif ?>

        

        
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Üye Listesi</h3>
              <a href="<?php echo base_url('auth/create_user_view');?>"><button type="submit" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Üye Ekle</button></a>
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
               
                <?php $num=1; foreach ($users as $user): ?>
                <tr>
                  <td><?php echo $num++; ?></td>
                  <td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
                  <td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
                  <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
                  <td>
                      <?php foreach ($user->groups as $group):?>
                      <?php echo anchor("auth/edit_group/".$group->id, htmlspecialchars($group->name,ENT_QUOTES,'UTF-8')) ;?><br/>
                      <?php endforeach?>
                  </td>         
                <td><?php echo ($user->active) ? anchor("auth/deactivate/".$user->id, lang('index_active_link')) : anchor("auth/activate/". $user->id, lang('index_inactive_link'));?></td>

                  
                  <td class="center">
                    <a href="<?php echo base_url('auth/edit_user_view/'.$user->id.'');?>" class="btn btn-info"><i class="fa fa-pencil"></i></a>
                    <a href="<?php echo base_url('auth/delete_user/'.$user->id.'');?>" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                  </td>                  
                 

                </tr>
               <?php endforeach;?>
                </tbody>

                
              </table>
              <p><?php echo anchor('auth/create_group', lang('index_create_group_link'))?></p>
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

    