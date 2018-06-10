 <!-- Main content -->
    <section class="content">
      <div class="col-md-12">
      <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Haber Ekle</h3>
            </div>
            <!-- /.box-header -->
       
            <!-- form start -->
            <form action="<?php echo base_url('news_controller/add_news_controller');?>" enctype= "multipart/form-data" method="post" class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                
                  <label class="col-sm-2 control-label">Haber Resim</label>
                  <div class="col-sm-3">
                    <input type="file" name="image" class="form-control">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Haber Başlık</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control"  name="news_title"  > 
                  </div>
                  
                </div>
                
              

               <div class="form-group">
                  <label class="col-sm-2 control-label">Tarih</label>
                  <div class="col-sm-3">
                    <input type="date" class="form-control"  name="news_date">
                  </div>
                
                  <label class="col-sm-2 control-label">Saat</label>
                  <div class="col-sm-3">
                    <input type="time" class="form-control"  name="news_time">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Haber İçerik</label>
                  <div class="col-sm-8">
                    <textarea  name="news_detail" id="editor1" rows="8" cols="100"></textarea>
                  </div>
                </div>
           
                <div class="form-group">
                  <label class="col-sm-2 control-label">Haber Anahtar Kelimeler</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control"  name="news_keyword"  > 
                  </div>
                  
                </div>
            
                
              <!-- /.box-body -->
              <div class="box-footer">
                <a class="btn btn-warning" href="<?php echo base_url('news_controller'); ?>">Vazgeç</a>
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
      
      //CKEDITOR.replace( 'editor1' );
    </script>
