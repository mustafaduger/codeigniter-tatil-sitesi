 <!-- Main content -->
    <section class="content">
      <div class="col-md-12">
      <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Marka Düzenle</h3>
            </div>
            <!-- /.box-header -->
           <?php foreach ($result as $row) : ?>
            <!-- form start -->
            <form action="<?php echo base_url('brand_controller/update_brand_controller'); ?>" method="post" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Marka Adı</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control"  value="<?php echo ($row->brand_name) ?>" name="brand_name">
                   
                    <input type="hidden" name="id" value="<?php echo ($row->id) ?>">

                  </div>
                </div>
                
              </div>
                
              <!-- /.box-body -->
              <div class="box-footer">
                <a class="btn btn-warning" href="<?php echo base_url('brand_controller'); ?>">Vazgeç</a>
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