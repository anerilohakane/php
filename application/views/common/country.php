<!DOCTYPE html>
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8">
<title>Shivbandh | Country</title>
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
					 Country Master
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="portlet box green">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-gift"></i>Country Master
					</div>
				</div>
				<div class="portlet-body form">
					<form action="save_country" enctype="multipart/form-data" id="save_country"  method="post" class="horizontal-form">
						<div class="form-body">
							<h3 class="form-section">Country Info</h3>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Country Name <span class="require" aria-required="true" style="color:red">*</span></label>
										<div class="input-icon right">
                      						<i class="fa"></i>
											<input type="text" class="form-control" name="country_name" <?php echo(isset($singleCountryData->country_id) && !empty($singleCountryData->country_id) && $singleCountryData->country_id=='2' )?'readonly':''?> value="<?php echo(isset($singleCountryData->country_name) && !empty($singleCountryData->country_name))?$singleCountryData->country_name:''?>" placeholder="country name">
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Currency Code </label>
										<div class="input-icon right">
											<i class="fa"></i>
											<input type="text" class="form-control " name="desc" value="<?php echo(isset($singleCountryData->country_desc) && !empty($singleCountryData->country_desc))?$singleCountryData->country_desc:''?>" placeholder="country desc">
										</div>
									</div>
								</div>
							</div>	
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label"> Currency</label>											
										<div class="input-icon right">
											<i class="fa"></i>
											<input type="text" class="form-control" name="currency" value="<?php echo (isset($singleCountryData->currency) && !empty($singleCountryData->currency))? htmlentities($singleCountryData->currency):''?>" />
										</div>												
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Exchange Rate</label>												
										<div class="input-icon right">
											<i class="fa"></i>
											<input type="text" class="form-control" name="exchange_rate" value="<?php echo (isset($singleCountryData->exchange_rate) && !empty($singleCountryData->exchange_rate))?$singleCountryData->exchange_rate:''?>"/>
											<span class="help-block">Rate with respect to 1 Rs.</span>
										</div>												
									</div>											
								</div>
							</div>
						</div>
						<div class="form-actions right">
							<button type="button" class="btn default cancel" title="Click To Cancel"> Cancel</button>							
							<button type="submit" class="btn green common_save" title="Click To Save" rel="<?php echo(isset($singleCountryData->country_id) && !empty($singleCountryData->country_id))?$singleCountryData->country_id:''?>"><i class="fa fa-check"></i><?php if(isset($singleCountryData->country_id) && !empty($singleCountryData->country_id)) {echo 'Update';} else { echo 'Save'; }?></button>
						</div>
					</form>
				</div>
			</div>	
			<?php if(isset($country_data) && !empty($country_data))
			{ ?> 
				<div class="portlet box green">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-gift"></i>Country Master table
						</div> 
					</div> 
					<div class="portlet-body">
						<table class="table table-striped table-bordered table-hover masterTable" >
							<thead>
								<tr class="heading">
									<th scope="col">Sr.no</th>
									<th scope="col">Country Name</th>	
									<th scope="col">Currency Code</th>
									<th scope="col">Currency</th>
									<th scope="col">Exchange Rate</th>
									<th style="text-align:center;">Action</th>
								</tr>
							</thead>
							<tbody> 
								<?php $i = 1;
								foreach ($country_data as $key) { ?>
									<tr class="odd gradeX">
										<td><?php echo $i++;?></td>
										<td><?php echo $key->country_name; ?></td>
										<td><?php echo $key->country_desc; ?></td>
										<td><?php echo $key->currency; ?></td>														
										<td><?php echo $key->exchange_rate; ?></td>														
										<td style="text-align:center;" align="8%">
											<?php if($key->country_id==1 )
											{
												echo 'Default Country';
											}
											else
											{ ?>
												<span style="cursor: pointer;" class="tooltips editRecord" rel="<?php echo(isset($key->country_id) && !empty($key->country_id))?$key->country_id:''?>" rev="edit_country" title="Edit Record">
													<i class="fa fa-edit"></i>
												</span>
												<span style="cursor: pointer;" class="tooltips deleteRecord" rel="<?php echo(isset($key->country_id) && !empty($key->country_id))?$key->country_id:''?>" rev="delete_country" title="Delete Record">
													<i class="fa fa-trash-o"></i>
												</span>
											<?php } ?> 										
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