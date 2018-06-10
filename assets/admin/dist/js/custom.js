$(document).ready(function () {
    $('.toggle_check').bootstrapToggle();
    $('.toggle_check').change(function(){
      var isActive   =$(this).prop('checked');
      var id=$(this).attr('dataID');
      var base_url=$(this).attr('dataURL');
      $.post(base_url,{id:id,isActive:isActive},function(response){});
    })
    
    $('.sidebar-menu').tree()

    $('.currency').mask('000.000.000.000.000,00', {reverse: true});

    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })

    $(".removeBtn").click(function () {
        var dataURL = $(this).attr("dataURL");
        var  remove = bootbox.confirm("Silmek istiyor musunuz ?", function(result) {
            if (result == true) {
                window.location.href = dataURL;
            }
        });
    });

    $('#ilce').on('change', function(){
                var ilce_key = $(this).val();
                if(ilce_key == '')
                {
                    $('#mahalle').prop('disabled', true);
                }
                else
                {
                    $('#mahalle').prop('disabled', false);
                    $.ajax({
                        url:base_url+"/explorecontent_controller/get_mahalle/"+ilce_key,
                        type: "POST",
                        data: {'ilce_key' : ilce_key},
                        dataType: 'json',
                        success: function(data){
                           $('#mahalle').html(data);
                        },
                        error: function(){
                            alert('Error occur...!!');
                        }
                    });
                }
           });


           $('#firma_kategori_id').on('change', function(){
                var kategori_id = $(this).val();
                if(kategori_id == '')
                {
                    $('#firma_altkategori_id').prop('disabled', true);
                }
                else
                {
                    $('#firma_altkategori_id').prop('disabled', false);
                    $.ajax({
                        url:base_url+"subcategory_controller/get_subcategory/"+kategori_id,
                        type: "POST",
                        data: {'kategori_id' : kategori_id},
                        dataType: 'json',
                        success: function(data){
                           $('#firma_altkategori_id').html(data);
                        },
                        error: function(){
                            alert('Hata oluştu...!!');
                        }
                    });
                }
           });  
      


    $('.select2').select2()



    CKEDITOR.replace( 'editor1', {
    customConfig: ''
      });


    


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

    
    $('[data-mask]').inputmask()

      
      function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: {lat: 41.015137, lng: 28.979530},
          zoom: 13
        });
        var input = /** @type {!HTMLInputElement} */(
            document.getElementById('pac-input'));

        var types = document.getElementById('type-selector');
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(types);

        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);

        var infowindow = new google.maps.InfoWindow();
        var marker = new google.maps.Marker({
          map: map,
          anchorPoint: new google.maps.Point(0, -29)
        });

        autocomplete.addListener('place_changed', function() {
          infowindow.close();
          marker.setVisible(false);
          var place = autocomplete.getPlace();
          if (!place.geometry) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert("No details available for input: '" + place.name + "'");
            return;
          }

          // If the place has a geometry, then present it on a map.
          if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
          } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);  // Why 17? Because it looks good.
          }
          marker.setIcon(/** @type {google.maps.Icon} */({
            url: place.icon,
            size: new google.maps.Size(71, 71),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(35, 35)
          }));
          marker.setPosition(place.geometry.location);
          marker.setVisible(true);
var item_Lat =place.geometry.location.lat();
var item_Lng= place.geometry.location.lng();
var item_Location = place.formatted_address;
//alert("Lat= "+item_Lat+"_____Lang="+item_Lng+"_____Location="+item_Location);
$("#lat").val(item_Lat);
$("#lng").val(item_Lng);
$("#location").val(item_Location);



          var address = '';
          if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
          }

          infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
          infowindow.open(map, marker);
        });

        // Sets a listener on a radio button to change the filter type on Places
        
      }


  })

