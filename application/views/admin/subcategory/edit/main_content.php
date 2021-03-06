 <!-- Main content -->
    <section class="content">
      <div class="col-md-12">
      <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Kategori Düzenle</h3>
            </div>
            <!-- /.box-header -->
           <?php foreach ($result as $row) : ?>
            <!-- form start -->
            <form action="<?php echo base_url('subcategory_controller/update_subcategory_controller'); ?>" method="post" class="form-horizontal">
              <div class="box-body">

                <div class="form-group">
                  <label class="col-sm-2 control-label">Kategori</label>
                  <div class="col-sm-3">
                    <select class="form-control" name="kategori_id">
                      <?php foreach(get_category() as $value){ 
                      if ($value->kategori_id==$row->kategori_id) 
                        {;?>
                      <option selected value="<?php echo $value->kategori_id;?>"><?php echo $value->kategori_adi;?></option>
                        <?php }else{ ; ?>
                      <option value="<?php echo $value->kategori_id;?>"><?php echo $value->kategori_adi;?></option>
                      <?php }}; ?>
                    </select>
                  </div>
                  <?php echo form_error('category_id'); ?>
               </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Alt Kategori Adı</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control"  value="<?php echo ($row->altkategori_adi) ?>" name="altkategori_adi">
                   
                    <input type="hidden" name="id" value="<?php echo ($row->altkategori_id) ?>">

                  </div>
                </div>
                
              </div>
                
              <!-- /.box-body -->
              <div class="box-footer">
                <a class="btn btn-warning" href="<?php echo base_url('category_controller'); ?>">Vazgeç</a>
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