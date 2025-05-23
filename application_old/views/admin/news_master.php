<!DOCTYPE html>
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8">
<title>Shivbandh | News</title>
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
					News
				</li>
			</ul>
			<!-- END PAGE BREADCRUMB -->
			<!-- BEGIN PAGE CONTENT INNER -->
			<div class="portlet box green">
				<div class="portlet-title">
					<div class="caption">
						<i class="icon-note"></i>News
					</div>
				</div>
				<div class="portlet-body form">
					<form action="save_news_master" enctype="multipart/form-data" id="save_news_master"  method="post" class="horizontal-form">
						<div class="form-body">						 
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label class="control-label"> News <span class="require" aria-required="true" style="color:red">*</span></label>		
										<div class="input-icon right">
											<i class="fa"></i>
											<textarea class="form-control"  rows="3" cols="10" name="news"  placeholder="News"><?php echo(isset($single_news_data->news_desc) && !empty($single_news_data->news_desc))?$single_news_data->news_desc:''?></textarea>
										</div>												
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label"> From Date<span class="require" aria-required="true" style="color:red">*</span></label>
										<div class="input-group date  date1"  data-date-format="dd-mm-yyyy">
											<input type="text" name="from_date"  class="form-control " value="<?php echo(isset($single_news_data->from_date) && !empty($single_news_data->from_date))?date('d-M-Y',strtotime($single_news_data->from_date)):''?>" readonly>
											<span class="input-group-btn">
												<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
											</span>
										</div>
									</div> 
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label class="control-label"> To Date<span class="require" aria-required="true" style="color:red">*</span></label>
										<div class="input-group date  date1"  data-date-format="dd-mm-yyyy">
											<input type="text" name="to_date"  class="form-control " value="<?php echo(isset($single_news_data->to_date) && !empty($single_news_data->to_date))?date('d-M-Y',strtotime($single_news_data->to_date)):''?>" readonly>
											<span class="input-group-btn">
												<button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
											</span>
										</div>
									</div> 
								</div>
							</div>
							<div class="form-actions right">
								<button type="button" class="btn default clearData"> Clear</button>							
								<button type="submit" class="btn blue common_save"  rel="<?php echo (isset($single_news_data->news_id) && !empty($single_news_data->news_id))?$single_news_data->news_id:'';?>"><i class="fa fa-check"></i> <?php echo (isset($single_news_data->news_id) && !empty($single_news_data->news_id))?'Update':'Save';?>
								</button>
							</div>
						</form>
					</div>
				</div>
			</div>	

			<?php if(isset($news_data) && !empty($news_data))
			{ ?> 
				<div class="portlet box green">
					<div class="portlet-title">
						<div class="caption">
							<i class="icon-list"></i>News
						</div> 
					</div> 
					<div class="portlet-body">
						<table class="table table-striped table-bordered table-hover masterTable" >
							<thead>
								<tr class="heading">
									<th scope="col">Sr.no</th>
									<th scope="col"> News</th>
									<th scope="col">From Date</th>
									<th scope="col">To Date</th>
									<th style="text-align:center;">Action</th>
								</tr>
							</thead>
							<tbody> 
								<?php $i = 1;
								foreach ($news_data as $key) { ?>
									<tr class="odd gradeX">
										<td><?php echo $i++;?></td>
											<td><?php echo (isset($key->news_desc) && !empty($key->news_desc))?$key->news_desc:'-'; ?></td>
											<td><?php echo (isset($key->from_date) && !empty($key->from_date))?date('d-M-Y',strtotime($key->from_date)):'-'; ?></td>
											<td><?php echo (isset($key->to_date) && !empty($key->to_date))?date('d-M-Y',strtotime($key->to_date)):'-'; ?></td>
											<td style="text-align:center;" align="8%">
												<span style="cursor: pointer;" class="tooltips editRecord"  rev="edit_news_master" rel="<?php echo(isset($key->news_id) && !empty($key->news_id))?$key->news_id:''?>" data-original-title="Edit Record" data-placement="top">
													<i class="fa fa-edit"></i>
												</span>
												<span style="cursor: pointer;" class="tooltips deleteRecord"  rev="delete_news_master" rel="<?php echo(isset($key->news_id) && !empty($key->news_id))?$key->news_id:''?>" data-original-title="Delete Record" data-placement="top">
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