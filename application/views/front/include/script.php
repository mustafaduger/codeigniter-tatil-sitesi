<!-- Common scripts -->
<script src="<?php echo base_url('assets/front/');?>js/jquery-2.2.4.min.js"></script>
<script src="<?php echo base_url('assets/front/');?>js/common_scripts_min.js"></script>
<script src="<?php echo base_url('assets/front/');?>js/functions.js"></script>
<script type='text/javascript'>
    $(function () {
        $("a.reply").click(function () {
            var id = $(this).attr("id");
            $("#parent_id").attr("value", id);
            $("#name").focus();
        });
    });
</script>
 <!-- Specific scripts -->
