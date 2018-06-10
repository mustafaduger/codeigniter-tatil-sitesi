 <!-- Main content -->
    <section class="content">
      <div class="col-md-12">
      <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Alt Özellik Düzenle</h3>
            </div>
            <!-- /.box-header -->
           <?php foreach ($result as $row) : ?>
            <!-- form start -->
            <form action="<?php echo base_url('subproperty_controller/update_subproperty_controller'); ?>" method="post" class="form-horizontal">
              <div class="box-body">

                

                <div class="form-group">
                  <label class="col-sm-2 control-label">Alt Özellik Adı</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control"  value="<?php echo ($row->altozellik_adi) ?>" name="altozellik_adi">
                   
                    <input type="hidden" name="id" value="<?php echo ($row->altozellik_id) ?>">
                    <input type="hidden" name="ozellik_id" value="<?php echo ($row->ozellik_id) ?>">

                  </div>
                </div>
                
              </div>
                
              <!-- /.box-body -->
              <div class="box-footer">
                <a class="btn btn-warning" href="<?php echo base_url('subproperty_controller/subpropertymain_controller/'.$row->ozellik_id.'');?>">Vazgeç</a>
                <button type="submit" class="btn btn-info pull-right">Kaydet</button>
              </div>
              <!-- /.box-footer -->
            </form>
             <?php endforeach;?>
         </div>
          </div>
         
    </section>
    <div class="clearfix"></div> 
    <!-- /.content -->