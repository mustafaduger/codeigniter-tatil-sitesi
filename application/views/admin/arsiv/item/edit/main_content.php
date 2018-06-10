 <!-- Main content -->
    <section class="content">
      <div class="col-md-12">
      <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Ürün Düzenle </h3>
            </div>
            <!-- /.box-header -->
        <?php foreach ($result as $row) : ?>
            <!-- form start -->
            <form action="<?php echo base_url('item_controller/update_item_controller');?>" enctype= "multipart/form-data" method="post" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Ürün Adı</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control"  name="item_name" value ="<?php echo $row->item_name;?>" > 
                    <input type="hidden" name="item_id" value="<?php echo $row->item_id;?>">
                  </div>
                  <?php echo form_error('item_name'); ?>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label">Fiyatı</label>
                  <div class="col-sm-6">
                    <input id="price" type="text" class="form-control"  name="price"  onkeypress="return isNumberKey(event)" value ="<?php echo $row->price;?>">
                  </div>
                  <?php echo form_error('price'); ?>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label">Açıklama</label>
                  <div class="col-sm-6">
                    <textarea name="description"  rows="8" cols="80" ><?php echo $row->description;?></textarea>
                  </div>
                  <?php echo form_error('description'); ?>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Marka</label>
                  <div class="col-sm-3">
                    <select class="form-control" name="brand_id">
                      <?php foreach($brand as $brand){ 
                      if ($brand->id==$row->brand_id) 
                        {;?>
                      <option selected value="<?php echo $brand->id;?>"><?php echo $brand->brand_name;?></option>
                        <?php }else{ ; ?>
                      <option value="<?php echo $brand->id;?>"><?php echo $brand->brand_name;?></option>
                      <?php }}; ?>
                    </select>
                  </div>
                  <?php echo form_error('brand_id'); ?>
               </div>
               
                 <div class="form-group">
                  <label class="col-sm-2 control-label">Kategori</label>
                  <div class="col-sm-3">
                    <select class="form-control" name="category_id">
                      <?php foreach($category as $category){ 
                      if ($category->id==$row->category_id) 
                        {;?>
                      <option selected value="<?php echo $category->id;?>"><?php echo $category->category_name;?></option>
                        <?php }else{ ; ?>
                      <option value="<?php echo $category->id;?>"><?php echo $category->category_name;?></option>
                      <?php }}; ?>
                    </select>
                  </div>
                  <?php echo form_error('category_id'); ?>
               </div>

                 <div class="form-group">
                
                  <label class="col-sm-2 control-label">Ürün Resim</label>
                  <div class="col-sm-3">
                    <input type="file" name="image" class="form-control">
                  </div>
                </div>

                 <div class="form-group">
                  <label class="col-sm-2 control-label">Mevcut Resim</label>
                  <div class="col-sm-6">
                     <img src="<?php echo base_url($row->tmb);?>" class="profile-user-image image-responsive">

                    <p class="text-blue">Mevcut haber resmini değiştirmiyecekseniz seçim yapmayınız...</p>
                  </div>

                </div>

              <!-- /.box-body -->
              <div class="box-footer">
                <a class="btn btn-warning" href="<?php echo base_url('item_controller'); ?>">Vazgeç</a>
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
    