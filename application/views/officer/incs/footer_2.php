
	<a href="#" id="scroll-to-top" class="hidden-print"><i class="fa fa-chevron-up"></i></a>
	
	<!-- Logout confirmation -->
	<div class="custom-popup width-10" id="logoutConfirm">
		<div class="padding-md">
			<h4 class="m-top-none"> Do you want to logout?</h4>
		</div>

		<div class="text-center">
			<a class="btn btn-success m-right-sm" href="<?php echo base_url("welcome/logout"); ?>">Logout</a>
			<a class="btn btn-danger logoutConfirm_close">Cancel</a>
		</div>
	</div>
	
<!-- Datatable -->
	<link href="<?php echo base_url() ?>assets/css/jquery.dataTables_themeroller.css" rel="stylesheet">
	<script src="<?php echo base_url() ?>assets/js/jquery-1.10.2.min.js"></script>
	
	<!-- Bootstrap -->
    <script src="<?php echo base_url() ?>assets/bootstrap/js/bootstrap.min.js"></script>
   
	<!-- Parsley -->
	<script src="<?php echo base_url() ?>assets/js/parsley.min.js"></script>
	
	<!-- Modernizr -->
	<script src='<?php echo base_url() ?>assets/js/modernizr.min.js'></script>
	
	<!-- Pace -->
	<script src='<?php echo base_url() ?>assets/js/pace.min.js'></script>
	
	<!-- Popup Overlay -->
	<script src='<?php echo base_url() ?>assets/js/jquery.popupoverlay.min.js'></script>
	
	<!-- Slimscroll -->
	<script src='<?php echo base_url() ?>assets/js/jquery.slimscroll.min.js'></script>
	
	<!-- Cookie -->
	<script src='<?php echo base_url() ?>assets/js/jquery.cookie.min.js'></script>

	<!-- Perfect -->
	<script src="<?php echo base_url() ?>assets/js/app/app_wizard.js"></script>
	<script src="<?php echo base_url() ?>assets/js/app/app.js"></script>


	<!-- Datatable -->
<script src='<?php echo base_url() ?>assets/js/jquery.dataTables.min.js'></script>	


<script>
$(function	()	{
$('#dataTable').dataTable( {
"bJQueryUI": true,
"sPaginationType": "full_numbers"
});

$('#chk-all').click(function()	{
if($(this).is(':checked'))	{
$('#responsiveTable').find('.chk-row').each(function()	{
$(this).prop('checked', true);
$(this).parent().parent().parent().addClass('selected');
});
}
else	{
$('#responsiveTable').find('.chk-row').each(function()	{
$(this).prop('checked' , false);
$(this).parent().parent().parent().removeClass('selected');
});
}
});
});
</script>

	
  </body>

<!-- Mirrored from endlesstheme.com/Perfect_Admin/form_wizard.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Jun 2019 21:38:15 GMT -->
</html>























