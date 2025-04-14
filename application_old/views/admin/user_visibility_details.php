<!DOCTYPE html>
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8">
<title>Shivbandh | User Details</title>
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
<link href="<?php echo base_url();?>assets/global/css/components-md.css" id="style_components" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/global/css/plugins-md.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/admin/layout3/css/layout.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/admin/layout3/css/themes/purple-studio.css" rel="stylesheet" type="text/css" id="style_color">
<link href="<?php echo base_url();?>assets/admin/layout3/css/custom.css" rel="stylesheet" type="text/css">
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="<?php echo base_url(); ?>uploads/favicon.png"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-menu-fixed" class to set the mega menu fixed  -->
<!-- DOC: Apply "page-header-top-fixed" class to set the top menu fixed  -->
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
					<a href="<?php echo base_url(); ?>admin_user">Home</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 User Details
				</li>
			</ul>
			<?php if(isset($visible_customer_data) && !empty($visible_customer_data))
			{ ?> 
				<div class="portlet box green">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-gift"></i>Visible User Details
						</div> 
					</div> 
					<div class="portlet-body">
						<table class="table table-striped table-bordered table-hover masterTable" >
							<thead>
								<tr class="heading">
									<th scope="col">Sr.no</th>
									<th scope="col"> Profile Code</th>	
									<th scope="col"> Profile For</th>	
									<th scope="col"> Name</th>
									<th scope="col"> Phone</th>	
									<th scope="col"> Email</th>	
									<th scope="col"> DOB</th>	
									<th scope="col"> Status</th>
									<th scope="col"> Visibility</th>	
									<th scope="col"> Action</th>
								</tr>
							</thead>
							<tbody> 
								<?php $i = 1;
								foreach ($visible_customer_data as $key) { ?>
									<tr class="odd gradeX">
										<td><?php echo $i++;?></td>
										<td><?php echo (isset($key->profile_code) && !empty($key->profile_code))?$key->profile_code:''; ?></td>
										<td><?php echo (isset($key->profile_name) && !empty($key->profile_name))?$key->profile_name:''; ?></td>
										<td><?php echo (isset($key->f_name) && !empty($key->f_name))?$key->f_name.' '.$key->m_name.' '.$key->l_name:''; ?></td>
										<td><?php echo (isset($key->mobile) && !empty($key->mobile))?$key->mobile:''; ?></td>
										<td><?php echo (isset($key->email) && !empty($key->email))?$key->email:''; ?></td>
										<td><?php echo (isset($key->dob) && !empty($key->dob))?date('d-m-Y',strtotime($key->dob)):''; ?></td>
										<td><?php echo (isset($key->status) && !empty($key->status))?$key->status:''; ?></td>
										<td><?php echo (isset($key->visibility) && !empty($key->visibility))?$key->visibility:''; ?></td>
										<td align="center">
											 <a class="btn btn-success btn-xs " href="<?php echo base_url();?>view_user_details/<?php echo (isset($key->customer_id) && !empty($key->customer_id))?$key->customer_id:''; ?>"><i class="fa fa-search" aria-hidden="true"></i> View</a><br>

											<a class="btn btn-danger btn-xs deleteRecord" href="javascript:void(0);" style=" margin-top: 5px;" rev="user_invisible" rel="<?php echo(isset($key->customer_id) && !empty($key->customer_id))?$key->customer_id:''?>" data-original-title="Block Record" data-placement="top"> Invisible</a>
										</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			<?php } ?>	
			<?php if(isset($invisible_customer_data) && !empty($invisible_customer_data))
			{ ?> 
				<div class="portlet box green">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-gift"></i>Invisible User Details
						</div> 
					</div> 
					<div class="portlet-body">
						<table class="table table-striped table-bordered table-hover masterTable" >
							<thead>
								<tr class="heading">
									<th scope="col">Sr.no</th>
									<th scope="col"> Profile Code</th>	
									<th scope="col"> Profile For</th>	
									<th scope="col"> First Name</th>	
									<th scope="col"> Middle Name</th>	
									<th scope="col"> Last Name</th>	
									<th scope="col"> Phone</th>	
									<th scope="col"> Email</th>	
									<th scope="col"> DOB</th>	
									<th scope="col"> Status</th>
									<th scope="col"> Visibility</th>	
									<th scope="col"> Action</th>
								</tr>
							</thead>
							<tbody> 
								<?php $i = 1;
								foreach ($invisible_customer_data as $key) { ?>
									<tr class="odd gradeX">
										<td><?php echo $i++;?></td>
										<td><?php echo (isset($key->profile_code) && !empty($key->profile_code))?$key->profile_code:''; ?></td>
										<td><?php echo (isset($key->profile_name) && !empty($key->profile_name))?$key->profile_name:''; ?></td>
										<td><?php echo (isset($key->f_name) && !empty($key->f_name))?$key->f_name:''; ?></td>
										<td><?php echo (isset($key->m_name) && !empty($key->m_name))?$key->m_name:''; ?></td>
										<td><?php echo (isset($key->l_name) && !empty($key->l_name))?$key->l_name:''; ?></td>
										<td><?php echo (isset($key->mobile) && !empty($key->mobile))?$key->mobile:''; ?></td>
										<td><?php echo (isset($key->email) && !empty($key->email))?$key->email:''; ?></td>
										<td><?php echo (isset($key->dob) && !empty($key->dob))?date('d-m-Y',strtotime($key->dob)):''; ?></td>
										<td><?php echo (isset($key->status) && !empty($key->status))?$key->status:''; ?></td>
										<td><?php echo (isset($key->visibility) && !empty($key->visibility))?$key->visibility:''; ?></td>
										<td align="center">
											 <a class="btn btn-success btn-xs " href="<?php echo base_url();?>view_user_details/<?php echo (isset($key->customer_id) && !empty($key->customer_id))?$key->customer_id:''; ?>"><i class="fa fa-search" aria-hidden="true"></i> View</a><br>
											 
											<a  class="btn btn-primary btn-xs deleteRecord" style=" margin-top: 5px;" href="javascript:void(0);" rev="user_visible" rel="<?php echo(isset($key->customer_id) && !empty($key->customer_id))?$key->customer_id:''?>" data-original-title="Block Record" data-placement="top"> visible</a>
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

<script src="<?php echo base_url();?>assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/additional-methods.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/jquery-validation/lib/jquery.form.js"></script>
<script src="<?php echo base_url();?>assets/admin/pages/scripts/table-advanced.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js"></script>
<script src="<?php echo base_url(); ?>js/common.js"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {    
   	// initiate layout and plugins
   	Metronic.init(); // init metronic core components
	Layout.init(); // init current layout
   	TableAdvanced.init();

});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>