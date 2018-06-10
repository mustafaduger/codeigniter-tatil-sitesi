 <!-- Main content -->
    <section class="content">
      <div class="col-md-12">
        <?php echo $this->session->flashdata('login_error'); ?>
      <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Firma Bilgileri Düzenle</h3>
            </div>
            <!-- /.box-header -->
              
            <!-- form start -->
            <form action="<?php echo base_url('firmsettings_controller/update_firmsettings_controller');?>" enctype= "multipart/form-data" method="post" class="form-horizontal">
              <div class="box-body">
                

                  <div class="form-group">
                      <label class="col-sm-2 control-label">Logo</label>
                      <div class="col-sm-6">
                         <img src="<?php echo base_url($result->logo);?>" class="profile-user-image image-responsive">
                        <p class="text-blue">Mevcut Logoyu değiştirmiyecekseniz seçim yapmayınız...</p>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">Yeni Logo Yükleme</label>
                      <div class="col-sm-3">
                        <input type="file" name="image" class="form-control">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">Firma Adı</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control"  name="firma_adi" value ="<?php echo $result->firma_adi;?>" > 
                        <?php echo form_error('firma_adi');?>
                        <input type="hidden" name="firma_id" value="<?php echo $result->firma_id;?>">
                      </div>
                        
                    </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">İlçe</label>
                  <div class="col-sm-3">
                    <select class="form-control" name="ilce" id="ilce">
                      <option value="">İlçe Seçiniz</option>
                      <?php foreach (get_ilce() as $value) {;?>
                        <option value="<?php echo $value->ilce_key?>"><?php echo $value->ilce_title; ?></option>
                      <?php } ?>
                    </select>
                    <?php echo form_error('ilce');?>
                  </div>
                  
               
                  <label class="col-sm-2 control-label">Mahalle</label>
                  <div class="col-sm-3">
                    <select class="form-control" name="mahalle" id="mahalle" disabled="">
                       <option value="">Mahalle Seçiniz</option>
                    </select>
                    <?php echo form_error('mahalle');?>
                  </div>
                  
               </div>


                <div class="form-group">
                  <label class="col-sm-2 control-label">Kategori</label>
                  <div class="col-sm-3">
                    <select class="form-control" name="firma_kategori_id" id="firma_kategori_id">
                      <option value="">Kategori Seçiniz</option>
                      <?php foreach(get_category() as $value){;?> 
                      <option value="<?php echo $value->kategori_id;?>"><?php echo $value->kategori_adi;?></option>
                      <?php } ?>
                    </select>
                    <?php echo form_error('firma_kategori_id'); ?>
                  </div>
                  

              
                  <label class="col-sm-2 control-label">Alt Kategori</label>
                  <div class="col-sm-3">
                    <select class="form-control" name="firma_altkategori_id" id="firma_altkategori_id" disabled="">
                       <option value="">Alt Kategori Seçiniz</option>
                    </select>
                    <?php echo form_error('firma_altkategori_id');?>
                  </div>
                  
               </div>

                    
                     <div class="form-group">
                      <label class="col-sm-2 control-label">Firma Yetkilisi</label>
                      <div class="col-sm-3">
                        <div>
                        <input type="text" class="form-control"  name="firma_yetkilisi" value ="<?php echo $result->firma_yetkilisi;?>" >

                      </div>
                          <?php echo form_error('firma_yetkilisi');?>  
                      </div>
                        
                      
                      <label class="col-sm-2 control-label">Yetkili Telefon</label>
                      <div class="col-sm-3">
                        <div>
                        <input type="text" class="form-control"  name="firma_tel" value ="<?php echo $result->firma_tel;?>" > 
                      </div>
                       <?php echo form_error('firma_tel');?>
                      </div>
                     
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">Firma Web Adresi</label>
                      <div class="col-sm-3">
                        <div>
                        <input type="text" class="form-control"  name="firma_url" value ="<?php echo $result->firma_url;?>" > 
                        </div>
                        <?php echo form_error('firma_url');?>
                      </div>
                        
                   
                      <label class="col-sm-2 control-label">Firma Mail Adresi</label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control"  name="firma_mail" value ="<?php echo $result->firma_mail;?>" readonly > 
                        
                      </div>
                       
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">GSM Numarası</label>
                      <div class="col-sm-3">
                        <div>
                        <input type="text" class="form-control"  name="firma_gsm" value ="<?php echo $result->firma_gsm;?>" >
                        </div>
                        <?php echo form_error('firma_gsm');?>
                      </div>
                        
                    
                      <label class="col-sm-2 control-label">Sabit Numara</label>
                      <div class="col-sm-3">
                        <div>
                        <input type="text" class="form-control"  name="firma_sabittel" value ="<?php echo $result->firma_sabittel;?>" >
                        </div>
                        <?php echo form_error('firma_sabittel');?>
                      </div>
                         
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">Fax Numarası</label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control"  name="firma_fax" value ="<?php echo $result->firma_fax;?>" > 
                        
                      </div>
                        
                    
                      <label class="col-sm-2 control-label">Whatsup Numarası</label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control"  name="firma_whatsupno" value ="<?php echo $result->firma_whatsupno;?>" > 
                        
                      </div>
                   
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">Facebook</label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control"  name="firma_facebook" value ="<?php echo $result->firma_facebook;?>" > 
                       
                      </div>
                   
                   
                      <label class="col-sm-2 control-label">Twitter</label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control"  name="firma_twitter" value ="<?php echo $result->firma_twitter;?>" > 
                        
                      </div>
                      
                    </div>

                    <div class="form-group">
                      <label class="col-sm-2 control-label">Instagram</label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control"  name="firma_instagram" value ="<?php echo $result->firma_instagram;?>" > 
                      </div>
                  
                  
                      <label class="col-sm-2 control-label">Google</label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control"  name="firma_google" value ="<?php echo $result->firma_google;?>" > 
                      </div>
                    
                    </div>
                    
                    
                   
                    
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Anahtar Kelimeler</label>
                      <div class="col-sm-8">
                        <div>
                        <input type="text" class="form-control"  name="firma_keywords" value ="<?php echo $result->firma_keywords;?>" >
                         </div>
                          <?php echo form_error('firma_keywords');?>
                      </div>
                      
                    </div> 

                    <div class="form-group">
                      <label class="col-sm-2 control-label">Açıklama</label>
                      <div class="col-sm-8">
                        <textarea name="firma_aciklama" id="editor1" rows="8" cols="80" ><?php echo $result->firma_aciklama;?></textarea>
                          
                      </div>
                      <?php echo form_error('firma_aciklama');?>
                    </div>

 
                    <div class="box-body">
                      <div class="row">
                        <label class="col-sm-2 control-label">Konum Bilgileri</label>
                        <?php echo form_error('location'); ?>
                        <div class="col-xs-6">
                          <input type="text" name="name" id="searchInput" class="form-control" style="width: 380px" >
                        </div>
                       <input type="hidden" name="lat" id="lat" value ="<?php echo $result->lat;?>">
                      <input type="hidden" name="lng" id="lng" value ="<?php echo $result->lng;?>">
                      <input type="hidden" name="location" id="location" value ="<?php echo $result->location;?>">
                      <div> </div>
                      <div id="map" class="" style="height: 400px;width: 700px"></div>
                      </div>
                    </div>
                    <!-- /.box-body -->
                  </div>
                  </div>
                </div>
                       
              </div>
                
              <!-- /.box-body -->
              <div class="box-footer">
               
                <button type="submit" class="btn btn-info pull-right">Kaydet</button>
              </div>
              <!-- /.box-footer -->
            </form>
             
         </div>
        </div>
        
    </section>
    <div class="clearfix"></div> 
    <!-- /.content -->
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8ubdyrUBKDluE9KN44PoybjLsO5UF-60&libraries=places&callback=initialize"
        async defer>
  </script>   
<script>
      // This example requires the Places library. Include the libraries=places
      // parameter when you first load the API. For example:
      // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

function initialize() {
   var latlng = new google.maps.LatLng(41.015137,28.979530);
    var map = new google.maps.Map(document.getElementById('map'), {
      center: latlng,
      zoom: 13
    });
    var marker = new google.maps.Marker({
      map: map,
      position: latlng,
      draggable: true,
      anchorPoint: new google.maps.Point(0, -29)
   });
    var input = document.getElementById('searchInput');
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
    var geocoder = new google.maps.Geocoder();
    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);
    var infowindow = new google.maps.InfoWindow();   
    autocomplete.addListener('place_changed', function() {
        infowindow.close();
        marker.setVisible(false);
        var place = autocomplete.getPlace();
        if (!place.geometry) {
            window.alert("Autocomplete's returned place contains no geometry");
            return;
        }
  
        // If the place has a geometry, then present it on a map.
        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);
        }
       
        marker.setPosition(place.geometry.location);
        marker.setVisible(true);          
    
        bindDataToForm(place.formatted_address,place.geometry.location.lat(),place.geometry.location.lng());
        infowindow.setContent(place.formatted_address);
        infowindow.open(map, marker);
       
    });
    // this function will work on marker move event into map 
    google.maps.event.addListener(marker, 'dragend', function() {
        geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          if (results[0]) {        
              bindDataToForm(results[0].formatted_address,marker.getPosition().lat(),marker.getPosition().lng());
              infowindow.setContent(results[0].formatted_address);
              infowindow.open(map, marker);
          }
        }
        });
    });
}
        function bindDataToForm(address,lat,lng){
           document.getElementById('location').value = address;
           document.getElementById('lat').value = lat;
           document.getElementById('lng').value = lng;
        }
google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    