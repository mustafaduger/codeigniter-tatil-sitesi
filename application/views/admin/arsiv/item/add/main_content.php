 <!-- Main content -->
    <section class="content">
      <div class="col-md-12">
      <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Ürün Ekle</h3>
            </div>
            <!-- /.box-header -->
       
            <!-- form start -->
            <form action="<?php echo base_url('item_controller/add_item_controller');?>" enctype= "multipart/form-data" method="post" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label class="col-sm-2 control-label">Ürün Adı</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control"  name="item_name" value ="<?php echo $this->input->post("item_name");?>" > 
                  </div>
                  <?php echo form_error('item_name'); ?>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label">Fiyatı</label>
                  <div class="col-sm-6">
                    <input id="price" type="text" class="form-control"  name="price"  onkeypress="return isNumberKey(event)" value ="<?php echo $this->input->post("price");?>">
                  </div>
                  <?php echo form_error('price'); ?>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label">Açıklama</label>
                  <div class="col-sm-6">
                    <textarea name="description"  rows="8" cols="80" ><?php echo $this->input->post("description");?></textarea>
                  </div>
                  <?php echo form_error('description'); ?>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Marka</label>
                  <div class="col-sm-3">
                    <select class="form-control" name="brand_id">
                      <option >Marka Seçiniz</option>
                      <?php foreach ($brand as $value) {;?>
                        <option value="<?php echo $value->id ?>"><?php echo $value->brand_name; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <?php echo form_error('brand_id'); ?>
               </div>
               
                 <div class="form-group">
                  <label class="col-sm-2 control-label">Kategori</label>
                  <div class="col-sm-3">
                    <select class="form-control" name="category_id">
                      <option >Kategori Seçiniz</option>
                      <?php foreach ($category as $value) {;?>
                        <option value="<?php echo $value->id ?>"><?php echo $value->category_name; ?></option>
                      <?php } ?>
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
            <div class="col-md-12 pd-10"> 
      
            
                
              <!-- /.box-body -->
              <div class="box-footer">
                <a class="btn btn-warning" href="<?php echo base_url('item_controller'); ?>">Vazgeç</a>
                <button type="submit" class="btn btn-info pull-right">Kaydet</button>
              </div>
              <!-- /.box-footer -->
            </form>
         </div>
          </div>
         
    </section>
    <div class="clearfix"></div> 
    <!-- /.content -->
    <script type="text/javascript">
     function isNumberKey(evt)
      {
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode != 46 && charCode > 31 
        && (charCode < 48 || charCode > 57))
        return false;
        return true;
      }  
      
      
      function isNumericKey(evt)
      {
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode != 46 && charCode > 31 
        && (charCode < 48 || charCode > 57))
        return true;
        return false;
      } 

    </script>