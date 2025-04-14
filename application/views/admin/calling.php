<!DOCTYPE html>
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8">
<title>Shivbandh | Calling</title>
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
					 Calling Data
				</li>
			</ul>
			<?php if(isset($calling_data) && !empty($calling_data))
			{ ?> 
				<div class="portlet box green">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-gift"></i>Calling Data
						</div> 
						<!-- <div class="actions pull-right">
			           	 	<a href="javascript:void(0);" class="btn btn-primary btn-sm popup_save" rev="sms"><i class="fa fa-envelope" style="font-size: 15px; margin-right: 5px;"></i>Send SMS</a>
			        	</div> -->
					</div> 
					<div class="portlet-body">
						<table class="table table-striped table-bordered table-hover masterTable" >
							<thead>
								<tr class="heading">
									<th scope="col">Sr.no</th>
									<th scope="col"> Full Name</th>	
									<th scope="col"> Birth Date</th>	
									<th scope="col"> City</th>
									<th scope="col"> State </th>	
									<!-- <th scope="col"> Email Id</th>	 -->
									<th scope="col"> Mobile No</th>
									<th scope="col"> Phone No</th>
									<th scope="col"> Caste</th>
									<th scope="col"> Sub Caste</th>
									<th scope="col"> Education</th>
									<th scope="col"> Action</th>
								</tr>
							</thead>
							<tbody> 
								<?php $i = 1;
								foreach ($calling_data as $key) { ?>
									<tr class="odd gradeX">
										<td><?php echo $i++;?></td>


										<td><?php echo (isset($key->full_name) && !empty($key->full_name))?$key->full_name:'-'; ?></td>
										<td><?php echo (isset($key->birth_date) && !empty($key->birth_date))?date('d-M-Y',strtotime($key->birth_date)):' -'; ?> </td>
										<td><?php echo (isset($key->city) && !empty($key->city))?$key->city:'-'; ?></td>
										<td><?php echo (isset($key->state) && !empty($key->state))?$key->state:'-'; ?></td>
										<!-- <td><?php echo (isset($key->email_id) && !empty($key->email_id))?$key->email_id:'-'; ?></td> -->
										<td><?php echo (isset($key->mobile_no) && !empty($key->mobile_no))?$key->mobile_no:'-'; ?></td>
										<td><?php echo (isset($key->phone_no) && !empty($key->phone_no))?$key->phone_no:'-'; ?></td>
										<td><?php echo (isset($key->caste) && !empty($key->caste))?$key->caste:'-'; ?></td>
										<td><?php echo (isset($key->sub_caste) && !empty($key->sub_caste))?$key->sub_caste:'-'; ?></td>
										<td><?php echo (isset($key->profession) && !empty($key->profession))?$key->profession:'-'; ?></td>

										<td style="text-align:center;">
											<span style="cursor: pointer;" class="tooltips deleteRecord" rel="<?php echo(isset($key->calling_id) && !empty($key->calling_id))?$key->calling_id:''?>" rev="calling_send_sms" title="Send App Link">
												<i class="fa fa-envelope" style="color: #26a69a;"></i>
											</span>	&nbsp;&nbsp;&nbsp;

											<?php if ($key->status==1) { ?>
												<span style="cursor: pointer;" class="tooltips deleteRecord" rel="<?php echo(isset($key->calling_id) && !empty($key->calling_id))?$key->calling_id:''?>" rev="calling_status_not_intrested" title="Intrested"><i class="fa fa-heart" style="color: red;"></i>
												</span>
											<?php } else { ?>
												<span style="cursor: pointer;" class="tooltips deleteRecord" rel="<?php echo(isset($key->calling_id) && !empty($key->calling_id))?$key->calling_id:''?>" rev="calling_status_intrested" title="Not Intrested"><i class="fa fa-heart-o" style="color: red;"></i>
												</span>
											<?php } ?>
																				
										</td>  
									</tr>
										
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