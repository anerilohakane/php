<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
<meta charset="utf-8">
<title>Shivbandhan | Transcation History</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport">
<meta content="" name="description">
<meta content="" name="author">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/select2/select2.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
<link href="<?php echo base_url();?>assets/global/css/components-md.css" id="style_components" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/global/css/plugins-md.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/admin/layout3/css/layout.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/admin/layout3/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color">
<link href="<?php echo base_url();?>assets/admin/layout3/css/custom.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/css/datepicker3.css"/>
<link rel="shortcut icon" href="<?php echo base_url(); ?>images/mail/fnf.png">
</head>
<body class="page-md">
<?php $this->load->view('common/header'); ?>
<div class="page-container">
	<div class="page-content">
		<div class="container">
			<ul class="page-breadcrumb breadcrumb">
				<li>
					<a href="<?php echo base_url(); ?>admin_user">Home</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 Transcation History
				</li>
			</ul>
			<div class="row">
				<div class="col-md-12">
					<div class="portlet box green">
						<div class="portlet-title">
							<div class="caption">
								<i class="fa fa-gift"></i>Transcation History
							</div>
						</div>
						<div class="portlet-body form">
							<div class="form-body">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">From Date<span class="require" aria-required="true" style="color:red">*</span></label>
											<div class="input-group date date1" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
												<input type="text" name="fromDate" class="form-control val1 fetch_date_report" data-url="get_transcation_history" readonly >												<span class="input-group-btn">
													<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
												</span>
											</div>
										</div> 
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="control-label">To Date<span class="require" aria-required="true" style="color:red">*</span></label>
											<div class="input-group date date1" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
												<input type="text" name="toDate" class="form-control val2 fetch_date_report" data-url="get_transcation_history" readonly >
												<span class="input-group-btn">
												<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
												</span>
											</div>
										</div> 
									</div>
								</div>
							</div>
							<div class="form-actions right">
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="report_div">
				<div class="portlet box green">
					<div class="portlet-title">
						<div class="caption">
							<i class="fa fa-gift"></i>Transcation History
						</div> 
						<div class="actions pull-right">
				            <a href="<?php echo (isset($url) && !empty($url))?$url:'print_transcation_report/0/0' ; ?>" class="btn btn-primary btn-sm"><i class="fa fa-print"></i>Print</a>
				        </div>
					</div> 
					<div class="portlet-body">
						<table class="table table-striped table-bordered table-hover masterTable" >
							<thead>
								<tr class="heading">
									<th scope="col">Sr.no</th>
									<th scope="col"> Name</th>	
									<th scope="col"> Transcation id</th>	
									<th scope="col"> Mode</th>	
									<th scope="col"> Membership Plan</th>	
									<th scope="col"> Date</th>	
									<th scope="col"> Validity</th>
									<th scope="col"> Amount</th>
									<th scope="col"> Action</th>
								</tr>
							</thead>
							<tbody> 
								<?php if(isset($transcation_data ) && !empty($transcation_data ))
								{ $i = 1;
									foreach ($transcation_data as $key) 
									{ ?>
										<tr class="odd gradeX">
											<td><?php echo $i++;?></td>
											<td><?php echo (isset($key->customer_name) && !empty($key->customer_name))?$key->customer_name:''; ?></td>
											<td><?php echo (isset($key->transcation_id) && !empty($key->transcation_id))?$key->transcation_id:''; ?></td>
											<td><?php echo (isset($key->payment_mode) && !empty($key->payment_mode))?$key->payment_mode:''; ?></td>
											<td><?php echo (isset($key->membership_plan) && !empty($key->membership_plan))?$key->membership_plan:''; ?></td>
											<td><?php echo (isset($key->created_on) && !empty($key->created_on))?date('d-m-Y',strtotime($key->created_on)):''; ?></td>
											<td><?php echo (isset($key->membership_validity) && !empty($key->membership_validity))?$key->membership_validity:''; ?></td>
											<td><?php echo (isset($key->membership_amt) && !empty($key->membership_amt))?$key->membership_amt:''; ?></td>
											<td>
												<a class="" href="<?php echo base_url(); ?>download_invoice/<?php echo (isset($key->payment_id) && !empty($key->payment_id))?$key->payment_id:''; ?>"><i class="fa fa-download" style="font-size: 30px;margin-left: 30px; color: green;" data-original-title="Bio-data" data-placement="top"></i> </a>
											</td>
										</tr>
									<?php } 
								}?>
							</tbody>
						</table>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
<?php $this->load->view('common/footer');?>
<script src="<?php echo base_url();?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/select2/select2.min.js"></script>
<script src="<?php echo base_url();?>assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/admin/layout3/scripts/layout.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<script src="<?php echo base_url();?>assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>

<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/admin/pages/scripts/table-advanced.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/additional-methods.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/jquery-validation/lib/jquery.form.js"></script>
<script src="<?php echo base_url(); ?>js/common.js"></script>
<script>
jQuery(document).ready(function() {    
   	// initiate layout and plugins
   	Metronic.init(); // init metronic core components
	Layout.init(); // init current layout
	TableAdvanced.init();

});
</script>
</body>
</html>