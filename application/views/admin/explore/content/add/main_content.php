 <!-- Main content -->
    <section class="content">
      <div class="col-md-12">
      <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Keşfet İçerik Ekle</h3>
            </div>
            <!-- /.box-header -->
      
            <!-- form start -->
            <form action="<?php echo base_url('explorecontent_controller/add_explorecontent_controller');?>" enctype= "multipart/form-data" method="post" class="form-horizontal">
              <div class="box-body">
                

                <div class="form-group">
                 <label class="col-sm-2 control-label">Resim</label>
                  <div class="col-sm-3">
                    <input type="file" name="image" class="form-control">
                    <?php echo form_error('image'); ?>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-2 control-label">Kategori</label>
                  <div class="col-sm-3">
                    <select class="form-control" name="kesfet_kategoriid">
                      <option >Kategori Seçiniz</option>
                      <?php foreach (get_categoryexplore() as $value) {;?>
                        <option value="<?php echo $value->kategori_id?>"><?php echo $value->kategori_adi; ?></option>
                      <?php } ?>
                    </select>
                  </div>
                  <?php echo form_error('kesfet_kategoriid');?>
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
                  </div>
                  <?php echo form_error('ilce');?>
               </div>

               <div class="form-group">
                  <label class="col-sm-2 control-label">Mahalle</label>
                  <div class="col-sm-3">
                    <select class="form-control" name="mahalle" id="mahalle" disabled="">
                       <option value="">Mahalle Seçiniz</option>
                    </select>
                  </div>
                  <?php echo form_error('mahalle');?>
               </div>

               

                <div class="form-group">
                  <label class="col-sm-2 control-label">Başlık</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control"  name="kesfet_title"  >
                    <?php echo form_error('kesfet_title'); ?>
                  </div>
                  
                </div>
      
              
                <div class="form-group">
                  <label class="col-sm-2 control-label">İçerik</label>
                  <div class="col-sm-8">
                    <textarea name="kesfet_detail" id="editor1" rows="8" cols="80"></textarea>
                    <?php echo form_error('kesfet_detail'); ?>
                  </div>
                </div>
           
                
                <div class="form-group">
                  <label class="col-sm-2 control-label">Anahtar Kelimeler</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control"  name="kesfet_keyword"  >
                    <?php echo form_error('kesfet_keyword'); ?>
                  </div>
                  
                </div>


              <div class="col-md-12">
                <div class="form-group">
                 <div class="box box-solid">
                   <!--  <div class="box-header with-border">
                      <h3 class="box-title">Konum Bilgileri</h3>
                    </div> -->
                    <div class="box-body">
                      <div class="row">
                        <label class="col-sm-2 control-label">Konum Bilgileri</label>
                        <?php echo form_error('location'); ?>
                        <div class="col-xs-6">
                          <input type="text" name="name" id="searchInput" class="form-control" style="width: 380px" >
                        </div>
                       <input type="hidden" name="lat" id="lat" value="">
                      <input type="hidden" name="lng" id="lng">
                      <input type="hidden" name="location" id="location">
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
                <a class="btn btn-warning" href="<?php echo base_url('explorecontent_controller'); ?>">Vazgeç</a>
                <button type="submit" class="btn btn-info pull-right">Kaydet</button>
              </div>
              <!-- /.box-footer -->
            </form>
         </div>
          </div>
        
    </section>
    <div class="clearfix"></div> 
    <!-- /.content -->
    
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyA8ubdyrUBKDluE9KN44PoybjLsO5UF-60&libraries=places&callback=initialize"
        async defer></script>