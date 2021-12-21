<link rel="stylesheet" href="<?php echo base_url('assets/backend/js/select2/select2-bootstrap.css');?>">
<link rel="stylesheet" href="<?php echo base_url('assets/backend/js/select2/select2.css');?>">
<link rel="stylesheet" href="<?php echo base_url('assets/backend/js/selectboxit/jquery.selectBoxIt.css');?>">

	<!-- Bottom Scripts -->
<script src="<?php echo base_url('assets/backend/js/gsap/main-gsap.js');?>"></script>
<script src="<?php echo base_url('assets/backend/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js');?>"></script>
<script src="<?php echo base_url('assets/backend/js/bootstrap.js');?>"></script>
<script src="<?php echo base_url('assets/backend/js/joinable.js');?>"></script>
<script src="<?php echo base_url('assets/backend/js/resizeable.js');?>"></script>
<script src="<?php echo base_url('assets/backend/js/neon-api.js');?>"></script>
<script src="<?php echo base_url('assets/backend/js/toastr.js');?>"></script>
<script src="<?php echo base_url('assets/backend/js/jquery.validate.min.js');?>"></script>
<script src="<?php echo base_url('assets/backend/js/fullcalendar/fullcalendar.min.js');?>"></script>
<script src="<?php echo base_url('assets/backend/js/bootstrap-datepicker.js');?>"></script>
<script src="<?php echo base_url('assets/backend/js/bootstrap-timepicker.min.js');?>"></script>
<script src="<?php echo base_url('assets/backend/js/fileinput.js');?>"></script>

<script type="text/javascript" src="<?php echo base_url('assets/backend/js/datatable/js/jquery.dataTables.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/backend/js/datatable/js/dataTables.bootstrap.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/backend/js/datatable/buttons/js/dataTables.buttons.js');?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/backend/js/datatable/buttons/js/buttons.bootstrap.js');?>"></script>

<script src="<?php echo base_url('assets/backend/js/select2/select2.min.js');?>"></script>
<script src="<?php echo base_url('assets/backend/js/selectboxit/jquery.selectBoxIt.min.js');?>"></script>

<script src="<?php echo base_url('assets/backend/js/neon-calendar.js');?>"></script>
<script src="<?php echo base_url('assets/backend/js/neon-chat.js');?>"></script>
<script src="<?php echo base_url('assets/backend/js/neon-custom.js');?>"></script>
<script src="<?php echo base_url('assets/backend/js/neon-demo.js');?>"></script>

<script src="<?php echo base_url('assets/backend/js/wysihtml5/wysihtml5-0.4.0pre.min.js');?>"></script>
<script src="<?php echo base_url('assets/backend/js/wysihtml5/bootstrap-wysihtml5.js');?>"></script>
<script src="<?php echo base_url('assets/backend/js/dropzone/dropzone.js');?>"></script>
<script src="<?php echo base_url('assets/backend/js/daterangepicker/moment.min.js');?>"></script>
<script src="<?php echo base_url('assets/backend/js/daterangepicker/daterangepicker.js');?>"></script>
<script src="https://cdn.ckeditor.com/4.12.1/standard/ckeditor.js"></script>
<script src="<?php echo base_url('assets/backend/js/bootstrap-tagsinput.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/backend/js/typeahead.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/backend/js/jquery.multi-select.js'); ?>"></script>
<script src="<?php echo base_url('assets/backend/js/jquery.multi-select.js'); ?>"></script>
<script src="<?php echo base_url('assets/backend/js/icheck/icheck.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/backend/js/bootstrap-colorpicker.min.js'); ?>"></script>


<!-- SHOW TOASTR NOTIFIVATION -->
<?php if ($this->session->flashdata('flash_message') != ""):?>
<script type="text/javascript">
	toastr.success('<?php echo $this->session->flashdata("flash_message");?>');
</script>
<?php endif;?>

<?php if ($this->session->flashdata('error_message') != ""):?>
<script type="text/javascript">
	toastr.error('<?php echo $this->session->flashdata("error_message");?>');
</script>
<?php endif;?>

<!-- Toastr and alert notifications scripts -->
<script type="text/javascript">
function notify(message) {
  toastr.error(message);
}

function success_notify(message) {
  toastr.success(message);
}

function error_notify(message) {
  toastr.error(message);
}
</script>

<script src="<?php echo base_url('assets/backend/js/font-awesome-icon-picker/fontawesome-iconpicker.min.js'); ?>" charset="utf-8"></script>
<script src="<?php echo base_url('assets/frontend/js/bootstrap-tagsinput.min.js');?>" charset="utf-8"></script>
<script src="<?php echo base_url('assets/backend/js/ui/component.fileupload.js');?>" charset="utf-8"></script>
<script src="<?php echo site_url('assets/backend/js/custom.js');?>"></script>

<!-- Dashboard chart's data is coming from this file -->
<?php include 'admin/dashboard-chart.php'; ?>


<!---  DATA TABLE EXPORT CONFIGURATIONS -->
<script type="text/javascript">

	jQuery(document).ready(function($)
	{
		var datatable = $("#table_export").dataTable();
	});
  $(function() {
   $('.icon-picker').iconpicker();
 });
</script>
