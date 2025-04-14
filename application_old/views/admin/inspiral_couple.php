<!DOCTYPE html>
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8">
<title>Shivbandh | Inspiral Couple</title>
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
					Inspiral Couple
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="portlet box green">
				<div class="portlet-title">
					<div class="caption">
						<i class="icon-note"></i>Inspiral Couple
					</div>
					<div class="tools">
						<a href="javascript:;" class="collapse">
						</a>
						<a href="javascript:;" class="reload">
						</a>
					</div>
				</div>
				<div class="portlet-body form">
					<form action="save_inspiral_couple" enctype="multipart/form-data" id="save_inspiral_couple"  method="post" class="horizontal-form">
						<div class="form-body">
							<!-- Course Details -->							 
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label"> Name<span class="required">*</span></label>
										<div class="input-icon right">
                      						<i class="fa"></i>
											<input type="text" class="form-control " name="name" value="<?php echo(isset($single_inspiral_data->name) && !empty($single_inspiral_data->name))?$single_inspiral_data->name:''?>" placeholder=" Name">
										</div>
									</div>
								</div>
								<div class="col-md-6 " ">
                                    <div class="form-group">
                                        <label class="control-label">Date<span class="require" aria-required="true" style="color:red">*</span></label>
                                        <div class=" ">
                                            <input type="text"  id="" class="form-control findage mask_date2   date1"  name="date" data-date-format="dd-mm-yyyy" value="<?php echo(isset($single_inspiral_data->date) && !empty($single_inspiral_data->date))?date('d-M-Y',strtotime($single_inspiral_data->date)):''?>" placeholder="Enter Date" readonly="">
                                        </div>
                                    </div>
                                </div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
									<label class="control-label">Image Upload<span class="required">*</span></label> 
	                            	<div class="form-group last">
										<div class="input-icon right">
	                                    	<?php if(isset($single_inspiral_data->photo) && !empty($single_inspiral_data->photo)) 
											{ 
	                                          	$path = './uploads/inspiral/'. $single_inspiral_data->photo;  ?>
										 		<div class="fileinput fileinput-exists" data-provides="fileinput">
										 			<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
														<img src="<?php echo base_url(); ?>images/noimage.png" alt=""/>
													</div>
													<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
													<?php if(file_exists($path))
													{ ?>
														<img src="<?php echo $path; ?>" alt=""/>	
													<?php }	?>
													</div>
			                                   		<input type="hidden" value="<?php echo (isset($single_inspiral_data->photo) && !empty($single_inspiral_data->photo))?$single_inspiral_data->photo:''?>" name="hidden_inspiral_photo" accept="image/*">
													<div>
														<span class="btn default btn-file">
														<span class="fileinput-new">
														Select image </span>
														<span class="fileinput-exists">
														Change </span>
														<input type="file" accept="image/*" name="inspiral_photo">
														</span>
														<a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput">
														Remove </a>
													</div>
												</div>
												 													
										 	<?php }
											else
											{ ?>
												<div class="fileinput fileinput-new" data-provides="fileinput">
													<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
														<img src="<?php echo base_url(); ?>images/noimage.png" alt=""/>
													</div>
													<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
													</div>
													<div>
														<span class="btn default btn-file">
														<span class="fileinput-new">
														Select image </span>
														<span class="fileinput-exists">
														Change </span>
														<input type="file" accept="image/*" name="inspiral_photo">
														</span>
														<a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput">
														Remove </a>
													</div>
												</div>
											<?php } ?>
										</div>
										<span class="help-block" style="color:#d44;">Note: Upload Inspiral Couple image </span>
									</div>
	                            	</div>
	                            </div>
								
							</div>
						<div class="form-actions right">
							<button type="button" class="btn default clearData"> Clear</button>							
							<button type="submit" class="btn blue common_save"  rel="<?php echo (isset($single_inspiral_data->inspiral_id) && !empty($single_inspiral_data->inspiral_id))?$single_inspiral_data->inspiral_id:'';?>"><i class="fa fa-check"></i> <?php echo (isset($single_inspiral_data->inspiral_id) && !empty($single_inspiral_data->inspiral_id))?'Update':'Save';?>
							</button>
						</div>
					</form>
				</div>
			</div>
			</div>	

			<?php if(isset($inspiral_data) && !empty($inspiral_data))
			{ ?> 
				<div class="portlet box green">
					<div class="portlet-title">
						<div class="caption">
							<i class="icon-list"></i>Success Story 
						</div> 
					</div> 
					<div class="portlet-body">
						<table class="table table-striped table-bordered table-hover masterTable" >
							<thead>
								<tr class="heading">
									<th scope="col">Sr.no</th>
									<th scope="col"> Name</th>
									<th scope="col">Image</th>
									<th scope="col">Date</th>
									<th style="text-align:center;">Action</th>
								</tr>
							</thead>
							<tbody> 
								<?php $i = 1;
								foreach ($inspiral_data as $key) { ?>
									<tr class="odd gradeX">
										<td><?php echo $i++;?></td>
											<td><?php echo $key->name; ?></td>
											<td>
												<?php if(isset($key->photo) && !empty($key->photo)){ 
													 $path = './uploads/inspiral/'. $key->photo;  
														if(file_exists($path))
														{ ?>
															<p class="form-row form-row-first address-field validate-required" id="billing_city_field" style="text-align:center;">																			
																<img src='<?php echo base_url();?><?php echo $path; ?>' width='150px' height="100px" />
															</p>
														<?php } ?>
												<?php } ?>
											</td>
											<td><?php echo (isset($key->date) && !empty($key->date))?date('Y-m-d',strtotime($key->date)):'-'; ?></td>
											<td style="text-align:center;" align="8%">
												<span style="cursor: pointer;" class="tooltips editRecord"  rev="edit_inspiral_couple" rel="<?php echo(isset($key->inspiral_id) && !empty($key->inspiral_id))?$key->inspiral_id:''?>" data-original-title="Edit Record" data-placement="top">
													<i class="fa fa-edit"></i>
												</span>
												<span style="cursor: pointer;" class="tooltips deleteRecord"  rev="delete_inspiral_couple" rel="<?php echo(isset($key->inspiral_id) && !empty($key->inspiral_id))?$key->inspiral_id:''?>" data-original-title="Delete Record" data-placement="top">
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