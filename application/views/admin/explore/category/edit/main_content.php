 <!-- Main content -->
    <section class="content">
      <div class="col-md-12">
      <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Keşfet Kategori Düzenle</h3>
            </div>
            <!-- /.box-header -->
          <?php echo $this->session->flashdata('login_error'); ?>
           <?php foreach ($result as $row) : ?>
            <!-- form start -->
            <form action="<?php echo base_url('categoryexplore_controller/update_category_controller'); ?>" method="post" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Kategori Adı</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control"  value="<?php echo ($row->kategori_adi) ?>" name="kategori_adi">
                   <?php echo form_error('kategori_adi'); ?>
                    <input type="hidden" name="id" value="<?php echo ($row->kategori_id) ?>">

                  </div>
                </div>
                
              </div>
                
              <!-- /.box-body -->
              <div class="box-footer">
                <a class="btn btn-warning" href="<?php echo base_url('categoryexplore_controller'); ?>">Vazgeç</a>
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