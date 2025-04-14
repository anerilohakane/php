<!DOCTYPE html>
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8">
<title>Shivbandhan| Payment</title>
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
<!-- END PAGE LEVEL PLUGIN STYLES -->
<!-- BEGIN PAGE STYLES -->
<link href="<?php echo base_url();?>assets/global/css/components-md.css" id="style_components" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/css/datepicker3.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css"/>
<!-- END PAGE STYLES -->
<!-- BEGIN THEME STYLES -->
<!-- DOC: To use 'rounded corners' style just load 'components-rounded.css' stylesheet instead of 'components.css' in the below style tag -->
<link href="<?php echo base_url();?>assets/global/css/components-md.css" id="style_components" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/global/css/plugins-md.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/admin/layout3/css/layout.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/admin/layout3/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color">
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
	<div class="page-content">
		<div class="container">
			<!-- BEGIN PAGE BREADCRUMB -->
			<ul class="page-breadcrumb breadcrumb">
				<li>
					<a href="<?php echo base_url(); ?>admin_user">Home</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					Payment
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="row form">
			    <div class="col-md-12">
			        <div class="portlet box green ">
			            <div class="portlet-title">
			                <div class="caption">
			                    <i class="fa fa-gift"></i>Payment
			                </div>
			            </div>
			            <div class="portlet-body form">
			               	<form action="save_payment_details" enctype="multipart/form-data" id="save_payment_details"  method="post" class="horizontal-form">
			            		<div class="form-body">
			            			<div class="row">								
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Select Profile<span class="require" aria-required="true" style="color:red">*</span></label>
												<div class="input-icon ">          						
													<select class="form-control select2me customer fetch_km" name="customer">
														<option value="">Select Profile</option>
														<?php if(isset($customer_data) && !empty($customer_data))
														{
															foreach ($customer_data as $key) 
															{ ?>
																<option value="<?php echo $key->customer_id?>" <?php echo (isset($single_task->customer_id) && !empty($single_task->customer_id) && ($single_task->customer_id==$key->customer_id))?'selected="selected"':'';?>><?php echo $key->f_name.' '.$key->l_name.' ( '.$key->profile_code.' ) ';?></option>
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
												<label class="control-label">Profile Code<span class="require" aria-required="true">*</span></label>
												<div class="input-icon right">
		                      						<i class="fa"></i>
													<input type="hidden" class="form-control input-sm customer_id" name="customer_id" value="<?php echo(isset($single_po->vendor_id) && !empty($single_po->vendor_id))?$single_po->vendor_id:''?>" placeholder="Enter Full Name" readonly>
													<input type="text" class="form-control input-sm profile_code" name="profile_code" value="<?php echo(isset($single_po->vendor_name) && !empty($single_po->vendor_name))?$single_po->vendor_name:''?>" placeholder="Enter Full Name" readonly>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Full Name<span class="require" aria-required="true">*</span></label>
												<div class="input-icon right">
		                      						<i class="fa"></i>
													<input type="text" class="form-control input-sm name" name="name" value="<?php echo(isset($single_po->vendor_name) && !empty($single_po->vendor_name))?$single_po->vendor_name:''?>" placeholder="Enter Full Name" readonly>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Mobile Number<span class="require" aria-required="true">*</span></label>
												<div class="input-icon right">
		                      						<i class="fa"></i>
													<input type="text" class="form-control input-sm mobile" name="mobile" value="<?php echo(isset($single_po->vendor_mobile) && !empty($single_po->vendor_mobile))?$single_po->vendor_mobile:''?>" placeholder="Enter Mobile Number" readonly>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Email<span class="require" aria-required="true">*</span></label>
												<div class="input-icon right">
		                      						<i class="fa"></i>
													<input type="text" class="form-control input-sm email" name="email" value="<?php echo(isset($single_po->vendor_email) && !empty($single_po->vendor_email))?$single_po->vendor_email:''?>" placeholder="Enter email Id" readonly>
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Gender<span class="require" aria-required="true">*</span></label>
												<div class="input-icon right">
		                      						<i class="fa"></i>
													<input type="text" class="form-control input-sm gender" name="gender" value="<?php echo(isset($single_po->vendor_email) && !empty($single_po->vendor_email))?$single_po->vendor_email:''?>" placeholder="Enter email Id" readonly>
												</div>
											</div>
										</div>
									</div>
									<h3>
										Payment Details
									</h3>
									<div class="row">								
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Membership Plan<span class="require" aria-required="true" style="color:red">*</span></label>
												<div class="input-icon ">          						
													<select class="form-control select2me membership_plan input-sm" name="mmbership">
														<option value="">Select Profile</option>
														<?php if(isset($membership_data) && !empty($membership_data))
														{
															foreach ($membership_data as $key) 
															{ ?>
																<option value="<?php echo $key->membership_id?>" <?php echo (isset($single_task->customer_id) && !empty($single_task->customer_id) && ($single_task->customer_id==$key->customer_id))?'selected="selected"':'';?>><?php echo $key->membership_plan_name;?></option>
															<?php }															
														} ?>														
													</select>
												</div>
											</div> 
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Amount<span class="require" aria-required="true">*</span></label>
												<div class="input-icon right">
		                      						<i class="fa"></i>
													<input type="hidden" class="form-control input-sm membership_id" name="membership_id" value="" placeholder="Enter membership id" readonly="">
													<input type="hidden" class="form-control input-sm membership_plan" name="membership_plan" value="" placeholder="Enter membership plan" readonly="">
													<input type="text" class="form-control input-sm amount" name="amount" value="" placeholder="Enter Amount" readonly="">
												</div>
											</div>
										</div>
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Validity (day's)<span class="require" aria-required="true">*</span></label>
												<div class="input-icon right">
		                      						<i class="fa"></i>
													<input type="text" class="form-control input-sm validity" name="validity" value="" placeholder="Enter validity" readonly="">
												</div>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">Payment Mode<span class="require" aria-required="true" style="color:red">*</span></label>
												<div class="input-icon ">          						
													<select class="form-control select2me check input-sm" name="payment_mode">				
														<option value="cash"> CASH</option>					
														<option value="online"> ONLINE</option>
													</select>
												</div>
											</div> 
										</div>
									</div>
		                        </div>
			                    <div class="form-actions right">
									<button type="button" class="btn default cancel" title="Click To Cancel"> Cancel</button>							
									<button type="submit" class="btn green common_save" title="Click To Save" rel="<?php echo(isset($single_customer->customer_id) && !empty($single_customer->customer_id))?$single_customer->customer_id:''?>"><i class="fa fa-check"></i><?php if(isset($single_customer->customer_id) && !empty($single_customer->customer_id)) {echo 'Update';} else { echo 'Pay Now'; }?></button>
								</div>
			                </form>
			            </div>
			        </div>

			        <?php if(isset($payment_data) && !empty($payment_data))
					{ ?> 
						<div class="portlet box green">
							<div class="portlet-title">
								<div class="caption">
									<i class="fa fa-gift"></i>Payment Details
								</div> 
							</div> 
							<div class="portlet-body">
								<table class="table table-striped table-bordered table-hover masterTable" >
									<thead>
										<tr class="heading">
											<th scope="col">Sr.no</th>
											<th scope="col">Name</th>
											<th scope="col">Mobile</th>
											<th scope="col">Email</th>
											<th scope="col"> Mode</th>	
											<th scope="col"> Membership Plan</th>	
											<th scope="col"> Date</th>	
											<th scope="col"> Validity</th>
											<th scope="col"> Amount</th>								
											<!-- <th scope="col"> Payment Status</th> -->
											<!-- <th style="text-align:center;">Action</th> -->
										</tr>
									</thead>
									<tbody> 
										<?php $i = 1;
										foreach ($payment_data as $key) { ?>
											<tr class="odd gradeX">
												<td><?php echo $i++;?></td>
												<td><?php echo isset($key->customer_name) && !empty($key->customer_name)?$key->customer_name:'-'; ?></td>
												<td><?php echo isset($key->mobile) && !empty($key->mobile)?$key->mobile:'-'; ?></td>
												<td><?php echo isset($key->email) && !empty($key->email)?$key->email:'-'; ?></td>
												<td><?php echo (isset($key->payment_mode) && !empty($key->payment_mode))?$key->payment_mode:''; ?></td>

												<td><?php echo (isset($key->membership_plan) && !empty($key->membership_plan))?$key->membership_plan:''; ?></td>
												<td><?php echo (isset($key->created_on) && !empty($key->created_on))?date('d-m-Y',strtotime($key->created_on)):''; ?></td>
												<td><?php echo (isset($key->membership_validity) && !empty($key->membership_validity))?$key->membership_validity:''; ?></td>
												<td><?php echo (isset($key->membership_amt) && !empty($key->membership_amt))?$key->membership_amt:''; ?></td>	

												<!-- <?php if ($key->payment_status == 'Success') { ?>
													
													<td style="color: green;"><b><?php echo (isset($key->payment_status) && !empty($key->payment_status))?$key->payment_status:''; ?></b></td>
												<?php } else { ?>	

													<td style="color: red;"><b><?php echo (isset($key->payment_status) && !empty($key->payment_status))?$key->payment_status:''; ?></b></td>

												<?php } ?> -->

												<!-- <td style="text-align:center;" align="8%">
													<span style="cursor: pointer;" class="tooltips deleteRecord" rel="<?php echo(isset($key->task_id) && !empty($key->task_id))?$key->task_id:''?>" rev="delete_task" title="Delete Record">
														<i class="fa fa-trash-o"></i>
													</span>            
												</td> -->
												  
											</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
					<?php } ?>
			    </div>
			</div>
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