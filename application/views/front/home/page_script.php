<script src="<?php echo base_url('assets/front/');?>js/icheck.js"></script>
<script>
$('input').iCheck({
   checkboxClass: 'icheckbox_square-grey',
   radioClass: 'iradio_square-grey'
 });
 </script>
 <script src="<?php echo base_url('assets/front/');?>js/bootstrap-datepicker.js"></script>
 <script src="<?php echo base_url('assets/front/');?>js/bootstrap-timepicker.js"></script>
 <script>
  $('input.date-pick').datepicker('setDate', 'today');
  $('input.time-pick').timepicker({
    minuteStep: 15,
    showInpunts: false
})
  </script>
  <script src="<?php echo base_url('assets/front/');?>js/jquery.ddslick.js"></script>
   <script>
   $("select.ddslick").each(function(){
            $(this).ddslick({
                showSelectedHTML: true 
            });
        });
</script>