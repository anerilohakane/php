<!DOCTYPE html>
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8">
<title>Shivbandh | Membership</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport">
<meta content="" name="description">
<meta content="" name="author">
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME STYLES -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css"/>
<link href="<?php echo base_url();?>assets/global/css/components-md.css" id="style_components" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/global/css/plugins-md.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/admin/layout3/css/layout.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/admin/layout3/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color">
<link href="<?php echo base_url();?>assets/admin/layout3/css/custom.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/css/datepicker3.css"/>
 <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/bootstrap-summernote/summernote.css">
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="<?php echo base_url(); ?>uploads/favicon.png"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: visibility "page-header-menu-fixed" class to set the mega menu fixed  -->
<!-- DOC: visibility "page-header-top-fixed" class to set the top menu fixed  -->
<body class="page-md">
<?php $this->load->view('common/header'); ?>
<!-- BEGIN PAGE CONTAINER -->
<div class="page-container">
	<!-- BEGIN PAGE HEAD -->
	
	<!-- END PAGE HEAD -->
	<!-- BEGIN PAGE CONTENT -->
	<div class="page-content">
		<div class="container">
			<!-- BEGIN PAGE BREADCRUMB -->
			<ul class="page-breadcrumb breadcrumb">
				<li>
					<a href="<?php echo base_url(); ?>admin">Home</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					Membership
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="portlet box green">
				<div class="portlet-title">
					<div class="caption">
						<i class="icon-note"></i>Membership
					</div>
					<div class="tools">
						<a href="javascript:;" class="collapse">
						</a>
						<a href="javascript:;" class="reload">
						</a>
					</div>
				</div>
				<div class="portlet-body form">
					<form action="save_membership" enctype="multipart/form-data" id="save_membership"  method="post" class="horizontal-form">
						<div class="form-body">						 
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label"> Name<span class="required">*</span></label>
										<div class="input-icon right">
                      						<i class="fa"></i>
											<input type="text" class="form-control " name="name" value="<?php echo(isset($single_membership_data->membership_plan_name) && !empty($single_membership_data->membership_plan_name))?$single_membership_data->membership_plan_name:''?>" placeholder=" Name">
										</div>
									</div>
								</div>
								<!-- <div class="col-md-8">
									<div class="form-group">
										<label class="control-label"> Description<span class="required">*</span></label>
										<div class="input-icon right">
                      						<i class="fa"></i>
											<input type="text" class="form-control " name="desc" value="<?php echo(isset($single_membership_data->membership_description) && !empty($single_membership_data->membership_description))?$single_membership_data->membership_description:''?>" placeholder=" Description">
										</div>
									</div>
								</div> -->
								<div class="col-md-8">
									<div class="form-group">
										<label class="control-label">Description</label>
										<!-- <textarea id="desc" rows="2" name="desc" class="form-control input-sm" placeholder="Type Your Description..." tabindex=""><?php echo (isset($single_membership_data->membership_description) && !empty($single_membership_data->membership_description))?$single_membership_data->membership_description:'';?></textarea> -->
										<textarea class="form-control summernote" placeholder=" Description" rows="6" name="desc"><?php echo(isset($single_membership_data->membership_description) && !empty($single_membership_data->membership_description))?$single_membership_data->membership_description:''?></textarea>
									</div>
								</div>

							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label"> Amount<span class="required">*</span></label>
										<div class="input-icon right">
                      						<i class="fa"></i>
											<input type="text" class="form-control cal_gst amount"  name="amount" value="<?php echo(isset($single_membership_data->membership_amount) && !empty($single_membership_data->membership_amount))?$single_membership_data->membership_amount:''?>" placeholder=" Amount">
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label"> GST (in % )<span class="required">*</span></label>
										<div class="input-icon right">
                      						<i class="fa"></i>
											<input type="text" class="form-control cal_gst gst" name="gst" value="<?php echo(isset($single_membership_data->gst) && !empty($single_membership_data->gst))?$single_membership_data->gst:'0'?>" placeholder=" GST In % Only">
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label"> Final Amount<span class="required">*</span></label>
										<div class="input-icon right">
                      						<i class="fa"></i>
											<input type="text" class="form-control final_price" name="final_amount" value="<?php echo(isset($single_membership_data->total_amount) && !empty($single_membership_data->total_amount))?$single_membership_data->total_amount:''?>" placeholder=" Final Amount" readonly>
										</div>
									</div>
								</div>
								<div class="col-md-3">
									<div class="form-group">
										<label class="control-label"> Validity (in Day's)<span class="required">*</span></label>
										<div class="input-icon right">
                      						<i class="fa"></i>
											<input type="text" class="form-control " name="validity" value="<?php echo(isset($single_membership_data->membership_validity) && !empty($single_membership_data->membership_validity))?$single_membership_data->membership_validity:''?>" placeholder=" Validity (ex: 1)">
										</div>
									</div>
								</div>
							</div>
							<div class="form-actions right">
								<button type="button" class="btn default clearData"> Clear</button>							
								<button type="submit" class="btn blue common_save"  rel="<?php echo (isset($single_membership_data->membership_id) && !empty($single_membership_data->membership_id))?$single_membership_data->membership_id:'';?>"><i class="fa fa-check"></i> <?php echo (isset($single_membership_data->membership_id) && !empty($single_membership_data->membership_id))?'Update':'Save';?>
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<?php if(isset($membership_data) && !empty($membership_data))
			{ ?> 
				<div class="portlet box green">
					<div class="portlet-title">
						<div class="caption">
							<i class="icon-list"></i>Membership  
						</div> 
					</div> 
					<div class="portlet-body">
						<table class="table table-striped table-bordered table-hover masterTable" >
							<thead>
								<tr class="heading">
									<th scope="col">Sr.no</th>
									<th scope="col"> Name</th>
									<th scope="col"> Description</th>
									<th scope="col">Amount</th>
									<th scope="col">GST</th>
									<th scope="col">Final Amount</th>
									<th scope="col">Validity (in Day's)</th>
									<th style="text-align:center;">Action</th>
								</tr>
							</thead>
							<tbody> 
								<?php $i = 1;
								foreach ($membership_data as $key) { ?>
									<tr class="odd gradeX">
										<td><?php echo $i++;?></td>
										<td><?php echo (isset($key->membership_plan_name) && !empty($key->membership_plan_name))?$key->membership_plan_name:'-'; ?></td>
										<td><?php echo (isset($key->membership_description) && !empty($key->membership_description))?$key->membership_description:'-'; ?></td>
										<td><?php echo (isset($key->membership_amount) && !empty($key->membership_amount))?$key->membership_amount:'0'; ?></td>
										<td><?php echo (isset($key->gst) && !empty($key->gst))?$key->gst:'0'; ?></td>
										<td><?php echo (isset($key->total_amount) && !empty($key->total_amount))?$key->total_amount:'0'; ?></td>
										<td><?php echo (isset($key->membership_validity) && !empty($key->membership_validity))?$key->membership_validity:'0'; ?></td>
										<td style="text-align:center;" align="8%">
											<span style="cursor: pointer;" class="tooltips editRecord"  rev="edit_membership" rel="<?php echo(isset($key->membership_id) && !empty($key->membership_id))?$key->membership_id:''?>" data-original-title="Edit Record" data-placement="top">
												<i class="fa fa-edit"></i>
											</span>
											<span style="cursor: pointer;" class="tooltips deleteRecord"  rev="delete_membership" rel="<?php echo(isset($key->membership_id) && !empty($key->membership_id))?$key->membership_id:''?>" data-original-title="Delete Record" data-placement="top">
												<i class="fa fa-trash-o"></i>
											</span>
										</td>  
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			<?php } ?>	
		</div>
	</div>
	<!-- END PAGE CONTENT -->
</div>
<!-- END PAGE CONTAINER -->
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
<script src="<?php echo base_url();?>assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/select2/select2.min.js"></script>
<script src="<?php echo base_url();?>assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/admin/layout3/scripts/layout.js" type="text/javascript"></script>
<!-- Addaed by me -->
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<script src="<?php echo base_url()?>assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/additional-methods.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/jquery-validation/lib/jquery.form.js"></script>
<script src="<?php echo base_url();?>assets/admin/pages/scripts/table-advanced.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url();?>assets/global/plugins/bootstrap-summernote/summernote.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>js/common.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {    
   	// initiate layout and plugins
   	Metronic.init(); // init metronic core components
	Layout.init(); // init current layout
	$('.summernote').summernote({height: 200});
   	TableAdvanced.init();

});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>