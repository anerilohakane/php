<!DOCTYPE html>
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8">
<title>Shivbandh| Franchiser User</title>
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
<link href="<?php echo base_url();?>assets/admin/layout3/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color">
<link href="<?php echo base_url();?>assets/admin/layout3/css/custom.css" rel="stylesheet" type="text/css">
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="<?php echo base_url(); ?>uploads/favicon.png"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/css/datepicker3.css"/>
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
					Member Register
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="portlet box green">
				<div class="portlet-title">
					<div class="caption">
						<i class="fa fa-gift"></i>Member Register
					</div>
				</div>
				<div class="portlet-body form">
					<form action="save_member_register" enctype="multipart/form-data" id="save_member_register"  method="post" class="horizontal-form">
						<div class="form-body">
							<h3 class="form-section">Member Register</h3>

							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">Profile For<span class="require" aria-required="true" style="color:red">*</span></label>
										<div class="input-icon ">          						
											<select class="form-control select2me" name="profile_for">
												<option value="">select</option>
												<?php if(isset($profile_for) && !empty($profile_for))
												{
													foreach ($profile_for as $key) 
													{ ?>
														<!-- <option value="<?php echo $key->role_id?>" selected <?php echo (isset($single_user->role_id) && !empty($single_user->role_id) && ($single_user->role_id==$key->role_id))?'selected="selected"':'';?>><?php echo $key->role_name;?></option> -->

														<option value="<?php echo $key->profile_id?>" ><?php echo $key->profile_name;?></option>
													<?php }															
												} ?>														
											</select>
										</div>
									</div> 
								</div>
							</div>

							<div class="row">								
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">First Name<span class="require" aria-required="true" style="color:red">*</span></label>
										<div class="input-icon right">
                      						<i class="fa"></i>
											<input type="text" class="form-control " name="f_name" id="reg_fname"" value="<?php echo(isset($single_user->user_fname) && !empty($single_user->user_fname))?$single_user->user_fname:''?>" placeholder="First name">
										</div>
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">Middle Name<span class="require" aria-required="true" style="color:red">*</span></label>
										<div class="input-icon right">
                      						<i class="fa"></i>
											<input type="text" class="form-control " name="m_name" id="reg_mname" value="<?php echo(isset($single_user->user_lname) && !empty($single_user->user_lname))?$single_user->user_lname:''?>" placeholder="Last name">
										</div>
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">Last Name<span class="require" aria-required="true" style="color:red">*</span></label>
										<div class="input-icon right">
                      						<i class="fa"></i>
											<input type="text" class="form-control " name="l_name" id="reg_lmname" value="<?php echo(isset($single_user->user_lname) && !empty($single_user->user_lname))?$single_user->user_lname:''?>" placeholder="Last name">
										</div>
									</div>
								</div>
							</div>

							<div class="row">

								<div class="col-md-4">
									<div class="radio-list" style="text-align: left;margin-bottom: 30px;">
			                          <label>Gender<span class="require" aria-required="true" style="color:red">*</span></label>
			                          <label class="radio-inline">
			                            <input style="margin-left: 10px; margin-top: 20px;" type="radio" name="gender" id="male" class="gender" value="Male"   > Male 
			                          </label>
			                          <label class="radio-inline">
			                            <input style="margin-left: 20px; margin-top: 20px;" type="radio" name="gender" id="female" class="gender" value="Female" > Female
			                          </label>
			                        </div>
			                    </div>

			                    <div class="col-md-4">
									<div class="form-group">
										<label class="control-label">Community For<span class="require" aria-required="true" style="color:red">*</span></label>
										<div class="input-icon ">          						
											<select class="form-control select2me" name="community_for">
												<option value="">select</option>
												<?php if(isset($community_for) && !empty($community_for))
												{
													foreach ($community_for as $key) 
													{ ?>
														<option value="<?php echo $key->community_id?>" ><?php echo $key->community_name;?></option>
													<?php }															
												} ?>														
											</select>
										</div>
									</div> 
								</div>

								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label">Email<span class="require" aria-required="true" style="color:red">*</span></label>
										<div class="input-icon right">
                      						<i class="fa"></i>
											<input type="text" class="form-control " name="email_id" value="<?php echo(isset($single_user->user_email) && !empty($single_user->user_email))?$single_user->user_email:''?>" placeholder="User Email">
										</div>
									</div>
								</div>
								
							</div>
												
							<div class="row">
			                    <div class="col-md-6">
									<div class="form-group">
										<label class="control-label">Mobile<span class="require" aria-required="true" style="color:red">*</span></label>
										<div class="input-icon right">
                      						<i class="fa"></i>
											<input type="text" class="form-control " name="mobile_no" value="<?php echo(isset($single_user->user_mobile) && !empty($single_user->user_mobile))?$single_user->user_mobile:''?>" placeholder="User Mobile">
										</div>
									</div>
								</div>

								<div class="col-md-6">
									<div class="form-group">
							            <label for="email" >Date Of Birth <span class="require" aria-required="true" style="color:red">*</span></label>
							            
							            <div class="input-group date  date2" data-date-end-date="0d" data-date-format="dd-mm-yyyy">

							            	<input type="text" id="dob" name="dob" class="form-control" id="address" value="<?php echo(isset($single_user->date) && !empty($single_user->date))?date('d-M-Y',strtotime($single_user->date)):''?>" readonly placeholder="Date Of Birth">
					                        <span class="input-group-btn">
					                            <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
					                        </span>
					                    </div>
					          		</div>
					          	</div>									
							</div>


							<input type="hidden" value="Yes" id="term_condition" name='term_condition'>

							<?php if(!isset($single_user) && empty($single_user))
							{ ?>
								<div class="row" >
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Password<span class="require" aria-required="true" style="color:red">*</span></label>
											<div class="input-icon right">
	                      						<i class="fa"></i>
												<input type="Password" class="form-control" name="password" id="reg_password" value="" placeholder="Password">
											</div>
										</div> 
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">Confirm Password<span class="require" aria-required="true" style="color:red">*</span></label>
											<div class="input-icon right">
	                      						<i class="fa"></i>
												<input type="Password" class="form-control" name="confirm_password" id="reg_confirm-password" value="" placeholder="Confirm Password">
											</div>
										</div>
									</div>									
								</div>
							<?php }	?>
							
						</div>
						<div class="form-actions right">
							<button type="button" class="btn default cancel" title="Click To Cancel"> Cancel</button>							
							<button type="submit" class="btn green common_save" title="Click To Save" rel="<?php echo(isset($single_user->user_id) && !empty($single_user->user_id))?$single_user->user_id:''?>"><i class="fa fa-check"></i><?php if(isset($single_user->user_id) && !empty($single_user->user_id)) {echo 'Update';} else { echo 'Save'; }?></button>
						</div>
					</form>
				</div>
			</div>	
			<?php if(isset($user_data) && !empty($user_data))
			{ ?> 
				<div class="portlet box green">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-gift"></i>User Master table
						</div> 
					</div> 
					<div class="portlet-body">
						<table class="table table-striped table-bordered table-hover masterTable" >
							<thead>
								<tr class="heading">
									<th scope="col">Sr.no</th>
									<th scope="col">First Name</th>
									<th scope="col">Last Name</th>
									<th scope="col">Role</th>
									<th scope="col">Email</th>
									<th scope="col">Mobile</th>	
									<th scope="col">Address</th>
									<th scope="col">Pan Card No</th>
									<th scope="col">GSTIN No</th>
									<th scope="col">TAN No</th>
									<th scope="col">Documents</th>
									<th style="text-align:center;">Action</th>
								</tr>
							</thead>
							<tbody> 
								<?php $i = 1;
								foreach ($user_data as $key) { ?>
									<tr class="odd gradeX">
										<td><?php echo $i++;?></td>
										<td><?php echo $key->user_fname; ?></td>
										<td><?php echo $key->user_lname; ?></td>
										<td><?php echo $key->role_name; ?></td>
										<td><?php echo $key->user_email; ?></td>
										<td><?php echo $key->user_mobile; ?></td>																					
										<td><?php echo $key->address; ?> <?php echo $key->address_landmark; ?><br><?php echo $key->address_state; ?>,<br><?php echo $key->address_city; ?>-<?php echo $key->address_pincode; ?></td>	

										<td><?php echo $key->pan_card_no; ?></td>
										<td><?php echo $key->gst_no; ?></td>
										<td><?php echo $key->tan_no; ?></td>

										<td>
											<a href="<?php echo base_url();?>uploads/document/<?php echo isset($key->document) && !empty($key->document)?$key->document:'-'; ?>" class="tooltips" data-title="View File">

												<?php if(isset($key->document) && !empty($key->document)) { ?>
													<i class="fa fa-file-pdf-o" style="font-size: 30px; margin-top: 15px; color: red;" aria-hidden="true"></i>
												<?php } else { echo "-"; }?>
											</a>
										</td>																			

										<td style="text-align:center;" align="8%">
											<?php if (isset($key->role_id) && !empty($key->role_id) && $key->role_id!='1') 
											{ ?>
												<span style="cursor: pointer;" class="tooltips editRecord" rel="<?php echo(isset($key->user_id) && !empty($key->user_id))?$key->user_id:''?>" rev="edit_franchiser_registration" title="Edit Record">
													<i class="fa fa-edit"></i>
												</span>
												<span style="cursor: pointer;" class="tooltips deleteRecord" rel="<?php echo(isset($key->user_id) && !empty($key->user_id))?$key->user_id:''?>" rev="delete_franchiser_registration" title="Delete Record">
													<i class="fa fa-trash-o"></i>
												</span>	
											<?php } else {	echo $key->role_name; } ?>																			
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