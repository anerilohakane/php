<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="utf-8">
		<title>Shivbandh| Admin Dashboard </title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta content="width=device-width, initial-scale=1" name="viewport">
		<meta content="" name="description">
		<meta content="" name="author">
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url();?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url();?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url();?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url();?>assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url();?>assets/global/plugins/jqvmap/jqvmap/jqvmap.css" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url();?>assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url();?>assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
		<link href="<?php echo base_url();?>assets/global/css/components-md.css" id="style_components" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url();?>assets/global/css/plugins-md.css" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url();?>assets/admin/layout3/css/layout.css" rel="stylesheet" type="text/css">
		<link href="<?php echo base_url();?>assets/admin/layout3/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color">
		<link href="<?php echo base_url();?>assets/admin/layout3/css/custom.css" rel="stylesheet" type="text/css">
		<link rel="shortcut icon" href="<?php echo base_url(); ?>uploads/favicon.png"/>
	</head>
	<body class="page-md">
		<?php $this->load->view('common/header'); ?>
			<div class="page-container">
				<div class="page-content">

			<?php
				$user_id=$this->session->userdata('user_id');
				$user_role=$this->session->userdata('user_role');

				if($user_role!=7)
				{ 
			?>
					<div class="container">
						<ul class="page-breadcrumb breadcrumb">
							<li>
								<a href="#">Home</a><i class="fa fa-circle"></i>
							</li>
							<li class="active">
								 Dashboard
							</li>
						</ul>
						<div class="row margin-top-10">
							<div class="col-md-6 col-sm-12">
								<div class="portlet light" style="height:420px;">
									<div class="portlet-title">
										<div class="caption caption-md">
											<i class="icon-bar-chart theme-font hide"></i>
											<span class="caption-subject theme-font bold uppercase">Today's Registration</span>
										</div>
									</div>
									<div id="today_reg" style="width: 100%; height: 300px;"></div>
								</div>
							</div>
							<div class="col-md-6 col-sm-12">
								<div class="portlet light" style=" height:420px;">
									<div class="portlet-title">
										<div class="caption caption-md">
											<i class="icon-bar-chart theme-font hide"></i>
											<span class="caption-subject theme-font bold uppercase">Payment Status</span>
											<span class="caption-helper hide">weekly stats...</span>
										</div>
									</div>
									<div class="portlet-body">
									<div id="Payment_status" style="width:100%; height:300px;"></div>
									</div>
								</div>
							</div>
						</div>
						<div class="row margin-top-10">
							<div class="col-md-6 col-sm-12">
								<div class="portlet light" style="height:420px;">
									<div class="portlet-title">
										<div class="caption caption-md">
											<i class="icon-bar-chart theme-font hide"></i>
											<span class="caption-subject theme-font bold uppercase">User Activity</span>
										</div>
									</div>
									<div class="portlet-body">
										<div class="scroller" style="height: 305px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
											<div class="general-item-list">
												<?php if(isset($notification_data) && !empty($notification_data))
												{
													foreach ($notification_data as $key) 
													{  	$date1=date_create();
				                                        $date2=date_create((isset($key->not_date) && !empty($key->not_date))?$key->not_date:'');
				                                        $diff=date_diff($date1,$date2); 
				                                        $days=$diff->format("%a");
				                                        $hour= $diff->format('%h'); ?>
														<div class="item">
															<?php if($key->tbl=='customer')
															{?>
																<div class="item-head">
																	<div class="item-details">
																		<img class="item-pic" src="<?php echo base_url();?>uploads/customer_photo/<?php echo(isset($key->photo) && !empty($key->photo))?$key->photo:'user.png'?>" style="height: 35px; width: 35px;">
																		<span class="item-name primary-link"><?php echo(isset($key->name) && !empty($key->name))?$key->name:''; ?></span>
																		<span class="item-label"><?php echo ($days<1)?$hour.' Hours':$days.' Days'; ?>  ago</span>
																	</div>
																	<span class="item-status"><span class="badge badge-empty badge-success"></span> New User</span>
																</div>
																<div class="item-body">
																	 <?php echo(isset($key->name) && !empty($key->name))?$key->name:''; ?> Created New Account to Shivbandhan On Dated <?php echo(isset($key->not_date) && !empty($key->not_date) && $key->not_date!='0000-00-00')?date('d-m-Y',strtotime($key->not_date)):'00-00-0000'; ?> .With Credential Mobile no <?php echo(isset($key->mobile) && !empty($key->mobile))?$key->mobile:''; ?> And Email Id <?php echo(isset($key->email) && !empty($key->email))?$key->email:''; ?>.
																</div>
				 											<?php }
															else
															{?>
																<div class="item-head">
																	<div class="item-details">
																		<img class="item-pic" src="<?php echo base_url();?>uploads/customer_photo/<?php echo 'user.png'; ?>" style="height: 35px; width: 35px;">
																		<span class="item-name primary-link"><?php echo $key->name; ?></span>
																		<span class="item-label"><?php echo ($days<1)?$hour.' Hours':$days.' Days'; ?>  ago</span>
																	</div>
																	<span class="item-status"><span class="badge badge-empty badge-warning"></span> Payment</span>
																</div>
																<div class="item-body">
																	<?php echo $key->name; ?> Buy Membership With Shivbandhan As Amount RS.<?php echo(isset($key->photo) && !empty($key->photo))?$key->photo:''; ?> , Which Package name is <?php echo(isset($key->email) && !empty($key->email))?$key->email:''; ?> .
																</div>
															<?php } ?>
														</div>
													<?php }
												} ?>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6 col-sm-12">
								<div class="portlet light" style="height: 420px;">
									<div class="portlet-title">
										<div class="caption caption-md">
											<i class="icon-bar-chart theme-font hide"></i>
											<span class="caption-subject theme-font bold uppercase">User Details</span>
										</div>
									</div>
									<div class="portlet-body">
										<div id="category_wise_user" style="width:100%; height:350px;"></div>
									</div>
								</div>
							</div>
						</div>
					</div>

				<?php } else { ?>

					<div class="container">
						<div class="row">
							<!-- <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12"> -->
							<div class="col-md-6 col-sm-6 ">
								<a class="dashboard-stat dashboard-stat-light green-haze" href="<?php echo base_url();?>task">
									<div class="visual"> <i class="fa fa-shopping-cart"></i> </div>
									<div class="details">
										<div class="number">
											<?php echo (isset($user_register) && !empty($user_register))?count($user_register):'0'; ?>
										</div>
										<div class="desc"> Member Register </div>
									</div>
								</a>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6 col-sm-6 ">
								<div class="portlet light" style="height:420px;">
									<div class="portlet-title">
										<div class="caption caption-md">
											<i class="icon-bar-chart theme-font hide"></i>
											<span class="caption-subject theme-font bold uppercase">User Activity</span>
										</div>
									</div>
									<div class="portlet-body">
										<div class="scroller" style="height: 305px;" data-always-visible="1" data-rail-visible1="0" data-handle-color="#D7DCE2">
											<div class="general-item-list">
												<?php if(isset($notification_data_new) && !empty($notification_data_new))
												{
													foreach ($notification_data_new as $key) 
													{  	$date1=date_create();
				                                        $date2=date_create((isset($key->not_date) && !empty($key->not_date))?$key->not_date:'');
				                                        $diff=date_diff($date1,$date2); 
				                                        $days=$diff->format("%a");
				                                        $hour= $diff->format('%h'); ?>
														<div class="item">
															<?php if($key->tbl=='customer')
															{?>
																<div class="item-head">
																	<div class="item-details">
																		<img class="item-pic" src="<?php echo base_url();?>uploads/customer_photo/<?php echo(isset($key->photo) && !empty($key->photo))?$key->photo:'user.png'?>" style="height: 35px; width: 35px;">
																		<span class="item-name primary-link"><?php echo(isset($key->name) && !empty($key->name))?$key->name:''; ?></span>
																		<span class="item-label"><?php echo ($days<1)?$hour.' Hours':$days.' Days'; ?>  ago</span>
																	</div>
																	<span class="item-status"><span class="badge badge-empty badge-success"></span> New User</span>
																</div>
																<div class="item-body">
																	 <?php echo(isset($key->name) && !empty($key->name))?$key->name:''; ?> Created New Account to Shivbandhan On Dated <?php echo(isset($key->not_date) && !empty($key->not_date) && $key->not_date!='0000-00-00')?date('d-m-Y',strtotime($key->not_date)):'00-00-0000'; ?> .With Credential Mobile no <?php echo(isset($key->mobile) && !empty($key->mobile))?$key->mobile:''; ?> And Email Id <?php echo(isset($key->email) && !empty($key->email))?$key->email:''; ?>.
																</div>
				 											<?php }
															else
															{?>
																<div class="item-head">
																	<div class="item-details">
																		<img class="item-pic" src="<?php echo base_url();?>uploads/customer_photo/<?php echo 'user.png'; ?>" style="height: 35px; width: 35px;">
																		<span class="item-name primary-link"><?php echo $key->name; ?></span>
																		<span class="item-label"><?php echo ($days<1)?$hour.' Hours':$days.' Days'; ?>  ago</span>
																	</div>
																	<span class="item-status"><span class="badge badge-empty badge-warning"></span> Payment</span>
																</div>
																<div class="item-body">
																	<?php echo $key->name; ?> Buy Membership With Shivbandhan As Amount RS.<?php echo(isset($key->photo) && !empty($key->photo))?$key->photo:''; ?> , Which Package name is <?php echo(isset($key->email) && !empty($key->email))?$key->email:''; ?> .
																</div>
															<?php } ?>
														</div>
													<?php }
												} ?>
											</div>
										</div>
									</div>
								</div>
							</div>


							<div class="col-md-6 col-sm-12">
								<div class="portlet light" style=" height:420px;">
									<div class="portlet-title">
										<div class="caption caption-md">
											<i class="icon-bar-chart theme-font hide"></i>
											<span class="caption-subject theme-font bold uppercase">Payment Status</span>
											<span class="caption-helper hide">weekly stats...</span>
										</div>
									</div>
									<div class="portlet-body">
									<div id="Payment_status_new" style="width:100%; height:300px;"></div>
									</div>
								</div>
							</div>


						</div>

					</div>






				<?php } ?>

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
		<script src="<?php echo base_url();?>assets/global/plugins/morris/morris.min.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/global/plugins/morris/raphael-min.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>

		<script src="<?php echo base_url();?>assets/global/scripts/metronic.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/admin/layout3/scripts/layout.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/admin/layout3/scripts/demo.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/admin/pages/scripts/index3.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/additional-methods.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/jquery-validation/lib/jquery.form.js"></script>
		
		<script src="<?php echo base_url();?>assets/global/plugins/amcharts/amcharts/amcharts.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/global/plugins/amcharts/amcharts/serial.js" type="text/javascript"></script>
		<script src="<?php echo base_url();?>assets/global/plugins/amcharts/amcharts/pie.js" type="text/javascript"></script>
		<script src="<?php echo base_url(); ?>js/common.js"></script>
		<script>
			jQuery(document).ready(function() {    
			   Metronic.init(); // init metronic core componets
			   Layout.init(); // init layout
			   Demo.init(); // init demo(theme settings page)
			   Tasks.initDashboardWidget(); // init tash dashboard widget
			});
			<?php
			if(isset($today_reg) && !empty($today_reg))
			{ 
				$color=array("#FF0F00",  "#FF9E01", "#F8FF01", "#B0DE09", "#04D215", "#0D8ECF", "#0D52D1", "#2A0CD0", "#8A0CCF", "#CD0D74");
				$i=0; ?>
				var chart = AmCharts.makeChart("today_reg", {
				    "theme": "none",
				    "type": "serial",
					"startDuration": 2,
				    "dataProvider": [
					    <?php foreach ($today_reg as $key) 
					    { ?>
						    {
						        "reg_date": "<?php echo(isset($key->reg_date) && !empty($key->reg_date))?date('d M',strtotime($key->reg_date)):''?>",
						        "cnt": "<?php echo(isset($key->cnt) && !empty($key->cnt))?$key->cnt:''?>",
						        "color": "<?php echo $color[$i]; ?>"
						    },
						<?php $i++; } ?>
					],
				    "valueAxes": [{
				        "position": "left",
				        "axisAlpha":1 
				    }],
				    "graphs": [{
				        "balloonText": "[[category]]: <b>[[value]]</b>",
				        "colorField": "color",
				        "fillAlphas": 0.85,
				        "lineAlpha": 0.1,
				        "type": "column",
				        "topRadius":1,
				        "valueField": "cnt"
				    }],
				    "depth3D": 40,
					"angle": 30,
				    "chartCursor": {
				        "categoryBalloonEnabled": true,
				        "cursorAlpha": 0,
				        "zoomable": false
				    }, 
				    "abelsEnabled": false,  
				    "categoryField": "reg_date",
				    "categoryAxis": {
				        "gridPosition": "start",
				        "labelRotation": 20,
				        "axisAlpha":1
				    }

				},0);
			<?php } ?>
			<?php if(isset($daily_payment) && !empty($daily_payment))
			{ ?>
				var chart = AmCharts.makeChart("Payment_status", {
				    "type": "serial",
				    "theme": "light",
				    "legend": {
				        "useGraphSettings": true
				    },
				    "dataProvider": [
				    <?php foreach($daily_payment AS $key)
					{ ?>
				        {
					      "pay_date": "<?php echo (isset($key->pay_date) && !empty($key->pay_date))?date('d M',strtotime($key->pay_date)):''?>",
					      "online": "<?php echo (isset($key->online_totle) && !empty($key->online_totle))?$key->online_totle:''; ?>",
					      "offline": "<?php echo (isset($key->offline_totle) && !empty($key->offline_totle))?$key->offline_totle:''; ?>",
					      "total": "<?php echo $key->online_totle+$key->offline_totle; ?>"
					    },
				    <?php } ?>],
				    "valueAxes": [{
				        "axisAlpha": 0,
				        "dashLength": 5,
				        "gridCount": 10,
				        "position": "left",
				        "title": "Amount"
				    }],
				    "startDuration": 0.5,
				    "graphs": [{
				        "balloonText": "Online Payment [[category]]: [[value]]",
				        "bullet": "round",
				        "title": "Online Payment",
				        "valueField": "online",
						"fillAlphas": 0
				    }, {
				        "balloonText": "Offline Payment [[category]]: [[value]]",
				        "bullet": "round",
				        "title": "Offline Payment",
				        "valueField": "offline",
						"fillAlphas": 0
				    }, {
				        "balloonText": "Total Payment [[category]]: [[value]]",
				        "bullet": "round",
				        "title": "Total Payment",
				        "valueField": "total",
						"fillAlphas": 0
				    }],
				    "chartCursor": {
				        "cursorAlpha": 0,
				        "zoomable": false
				    },
				    "categoryField": "pay_date",
				    "categoryAxis": {
				        "gridPosition": "start",
				        "axisAlpha": 0,
				        "labelRotation": 20,
				        "fillAlpha": 0.05,
				        "fillColor": "#001000",
				        "gridAlpha": 0
				    }
				});
			<?php } ?>
			<?php if(isset($category_wise_user) && !empty($category_wise_user))
			{ ?>
				var chart = AmCharts.makeChart( "category_wise_user", {
				  "type": "pie",
				  "theme": "light",
				  "dataProvider": [ 
				  	<?php foreach($category_wise_user AS $key)
					{ ?>
				        {
					      "city": "<?php echo (isset($key->gender) && !empty($key->gender))?$key->gender:''; ?>",
					      "cnt": <?php echo (isset($key->cnt) && !empty($key->cnt))?$key->cnt:'0'; ?>
					    },
				    <?php } ?>
				  ],
				  "valueField": "cnt",
				  "titleField": "city",
				  "outlineAlpha": 0.5,
				  "startDuration" : 1,
				  "depth3D": 15,
				  "radius":"30%",
				  "startEffect" : "elastic",
				  "innerRadius": "25%",
				  "balloonText": "[[title]]<br><span style='font-size:10px'><b>[[value]]</b> ([[percents]]%)</span>",
				  "angle": 10
				} );
			<?php } ?>


			//sub admin
			<?php if(isset($daily_payment_new) && !empty($daily_payment_new))
			{ ?>
				var chart = AmCharts.makeChart("Payment_status_new", {
				    "type": "serial",
				    "theme": "light",
				    "legend": {
				        "useGraphSettings": true
				    },
				    "dataProvider": [
				    <?php foreach($daily_payment_new AS $key)
					{ ?>
				        {
					      "pay_date": "<?php echo (isset($key->pay_date) && !empty($key->pay_date))?date('d M',strtotime($key->pay_date)):''?>",
					      "online": "<?php echo (isset($key->online_totle) && !empty($key->online_totle))?$key->online_totle:''; ?>",
					      "offline": "<?php echo (isset($key->offline_totle) && !empty($key->offline_totle))?$key->offline_totle:''; ?>",
					      "total": "<?php echo $key->online_totle+$key->offline_totle; ?>"
					    },
				    <?php } ?>],
				    "valueAxes": [{
				        "axisAlpha": 0,
				        "dashLength": 5,
				        "gridCount": 10,
				        "position": "left",
				        "title": "Amount"
				    }],
				    "startDuration": 0.5,
				    "graphs": [{
				        "balloonText": "Online Payment [[category]]: [[value]]",
				        "bullet": "round",
				        "title": "Online Payment",
				        "valueField": "online",
						"fillAlphas": 0
				    }, {
				        "balloonText": "Offline Payment [[category]]: [[value]]",
				        "bullet": "round",
				        "title": "Offline Payment",
				        "valueField": "offline",
						"fillAlphas": 0
				    }, {
				        "balloonText": "Total Payment [[category]]: [[value]]",
				        "bullet": "round",
				        "title": "Total Payment",
				        "valueField": "total",
						"fillAlphas": 0
				    }],
				    "chartCursor": {
				        "cursorAlpha": 0,
				        "zoomable": false
				    },
				    "categoryField": "pay_date",
				    "categoryAxis": {
				        "gridPosition": "start",
				        "axisAlpha": 0,
				        "labelRotation": 20,
				        "fillAlpha": 0.05,
				        "fillColor": "#001000",
				        "gridAlpha": 0
				    }
				});
			<?php } ?>
		</script>
	</body>
</html>