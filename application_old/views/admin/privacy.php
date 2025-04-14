<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8"/>
	<title>Shivbandhan | Privacy</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<meta content="" name="description"/>
	<meta content="" name="author"/>
	<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css"/>
	<link href="<?php echo base_url();?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
	
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/select2/select2.css"/>
	<link href="<?php echo base_url();?>assets/global/plugins/bootstrap-multiselect/css/bootstrap-multiselect.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
	<link href="<?php echo base_url();?>assets/global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/global/css/components.css" id="style_components" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/global/css/plugins.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/admin/layout3/css/layout.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>assets/admin/layout3/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color">
	<link href="<?php echo base_url();?>assets/admin/layout3/css/custom.css" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url();?>js/croppic/assets/css/main.css" rel="stylesheet">
    <link href="<?php echo base_url();?>js/croppic/assets/css/croppic.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/bootstrap-summernote/summernote.css">
	<link rel="shortcut icon" href="favicon.ico"/>

</head>
<body>
	<?php $this->load->view('common/header'); ?>
		<div class="page-container">
			<div class="page-content">
				<div class="container">
					<ul class="page-breadcrumb breadcrumb">
						<li>
							<a href="<?php echo base_url();?>">Home</a><i class="fa fa-circle"></i>
						</li>
						<li>
							<a href="<?php echo base_url();?>add_product">Privacy</a>
							<i class="fa fa-circle"></i>
						</li>
						<li class="active">
							Privacy
						</li>
					</ul>
					<div class="row">
						<div class="col-md-12">
							<div class="portlet box green">
								<div class="portlet-title">
									<div class="caption">
										<i class="fa fa-gift"></i>Privacy
									</div>
									<div class="tools">
										<a href="javascript:;" class="collapse">
										</a>
										<a href="javascript:;" class="reload">
										</a>
									</div>
								</div>
								<div class="portlet-body form">
									<form action="save_privacy" enctype="multipart/form-data" id="save_privacy"  method="post" class="horizontal-form">
										<div class="form-body">
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<label class="control-label">Privacy</label>
														<div class="input-icon "><i class="fa"></i>
															<textarea class="form-control summernote" placeholder="Products Description" rows="6" name="privacy_desc"><?php echo(isset($privacy_data->privacy_desc) && !empty($privacy_data->privacy_desc))?$privacy_data->privacy_desc:''?></textarea>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="form-actions right">
											<button type="button" class="btn default">Cancel</button>
											<button type="submit" class="btn blue common_save" rel="<?php echo (isset($privacy_data->privacy_id) && !empty($privacy_data->privacy_id))?$privacy_data->privacy_id:'';?>"><i class="fa fa-check"></i> <?php echo (isset($privacy_data->privacy_id) && !empty($privacy_data->privacy_id))?'Update':'Save';?></button>
										</div>		
									</form>
								</div>
							</div>
						</div>
					</div>
					<!-- END PAGE CONTENT INNER -->
				</div>
			</div>
			<!-- END PAGE CONTENT -->
		</div>
	<?php $this->load->view('common/footer');?>
	<script src="<?php echo base_url();?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
	<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
	<script src="<?php echo base_url();?>assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/select2/select2.min.js"></script>
	<script src="<?php echo base_url()?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
	<!-- END CORE PLUGINS -->
	<script src="<?php echo base_url();?>assets/global/plugins/bootstrap-multiselect/js/bootstrap-multiselect.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/admin/pages/scripts/components-bootstrap-multiselect.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/global/scripts/metronic.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/admin/layout3/scripts/layout.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/admin/layout3/scripts/demo.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
	<script src="<?php echo base_url();?>assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="<?php echo base_url()?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/additional-methods.js"></script>
	<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/jquery-validation/lib/jquery.form.js"></script>
	<script src="<?php echo base_url();?>assets/global/plugins/bootstrap-summernote/summernote.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>assets/admin/pages/scripts/table-advanced.js"></script>
	<script src="<?php echo base_url();?>js/common.js" type="text/javascript"></script>
	<script src="<?php echo base_url();?>js/custom.js" type="text/javascript"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/croppic/croppic.js"></script>
	<script>
	      jQuery(document).ready(function() {    
	        	 Metronic.init(); // init metronic core components
				 Layout.init(); // init current layout
				$('.summernote').summernote({height: 200});
	            TableAdvanced.init();
	       });
	   </script>
</body>
<!-- END BODY -->
</html>