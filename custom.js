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

      


  })

