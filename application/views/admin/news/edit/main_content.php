 <!-- Main content -->
    <section class="content">
      <div class="col-md-12">
      <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Haber Düzenle </h3>
            </div>
            <div class="align-middle">
            <!-- /.box-header -->
        <?php foreach ($result as $row) : ?>
            <!-- form start -->
            <form action="<?php echo base_url('news_controller/update_news_controller');?>" enctype= "multipart/form-data" method="post" class="form-horizontal">
              <div class="box-body">
               
               <div class="form-group">
                
                  <label class="col-sm-2 control-label">Haber Resim</label>
                  <div class="col-sm-3">
                    <input type="file" name="image" class="form-control">
                  </div>
                </div>

                 <div class="form-group">
                  <label class="col-sm-2 control-label">Mevcut Resim</label>
                  <div class="col-sm-4">
                     <img src="<?php echo base_url($row->news_tmb);?>" class="img-thumbnail">

                    <p class="text-blue">Mevcut Haber resmini değiştirmiyecekseniz seçim yapmayınız...</p>
                  </div>

                </div>

               <div class="form-group">
                  <label class="col-sm-2 control-label">Haber Başlık</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control"  name="news_title" value ="<?php echo ($row->news_title);?>" > 
                    <input type="hidden" name="news_id" value="<?php echo ($row->news_id) ?>">
                  </div>
                  
                </div>
                
                <div class="form-group">
                  <label class="col-sm-2 control-label">Tarih</label>
                  <div class="col-sm-3">
                    <input type="date" class="form-control"  name="news_date" value="<?php echo ($row->news_date) ?>">
                  </div>
                
                  <label class="col-sm-2 control-label">Saat</label>
                  <div class="col-sm-3">
                    <input type="time" class="form-control"  name="news_time" value="<?php echo ($row->news_time) ?>">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Haber İçerik</label>
                  <div class="col-sm-6">
                    <textarea name="news_detail" id="editor1" rows="8" cols="100"><?php echo $row->news_detail;?></textarea>
                  </div>
                </div>

                            
                <div class="form-group">
                  <label class="col-sm-2 control-label">Haber Anahtar Kelimeler</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control"  name="news_keyword" value="<?php echo ($row->news_keyword) ?>" > 
                  </div>
                  
                </div>
                 

              <!-- /.box-body -->
              <div class="box-footer">
                <a class="btn btn-warning" href="<?php echo base_url('news_controller'); ?>">Vazgeç</a>
                <button type="submit" class="btn btn-info pull-right">Kaydet</button>
              </div>
              <!-- /.box-footer -->
            </form>
             <?php endforeach;?>
             </div>
         </div>
          </div>
         
    </section>
    <div class="clearfix"></div> 
    <!-- /.content -->
    <script type="text/javascript">
            $(function () {
                $('#datetimepicker1').datetimepicker();
            });
    </script>