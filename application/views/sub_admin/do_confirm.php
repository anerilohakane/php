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
          Payment Success
        </li>
      </ul>
      <!-- END PAGE BREADCRUMB -->
      <!-- BEGIN PAGE CONTENT INNER -->
      <div class="row form">
          <div class="col-md-12">
              <div class="portlet box green ">
                  <div class="portlet-title">
                      <div class="caption">
                          <i class="fa fa-gift"></i>Payment Success
                      </div>
                  </div>
                  <div class="portlet-body form">
                      <form action="save_payment_details" enctype="multipart/form-data" id="save_payment_details"  method="post" class="horizontal-form">
                      <div class="form-body">

                        <!-- <div class="row">               
                          <div class="col-md-12 ">
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
                        </div> -->


                        <div class="row">
                          <div class="col-md-2"></div>
                          <?php 

                              $transcation_data1_cst = $this->session->userdata('transcation_data1_cst');

                          ?>
                          <div class="col-md-8">
                            <div class="form-group">
                              <p style="font-size: 16px; font-weight: 700; color: green;">Thank You.&nbsp;&nbsp;&nbsp;<?php echo isset($transcation_data1_cst->f_name) && !empty($transcation_data1_cst->f_name)?$transcation_data1_cst->f_name.' '.$transcation_data1_cst->m_name.' '.$transcation_data1_cst->l_name:'' ; ?>&nbsp;&nbsp;&nbsp; Your Payment Has Been Successfully.  </p>
                              <p>Package Name:-  <b><?php echo isset($transcation_data1_cst->membership_name) && !empty($transcation_data1_cst->membership_name)?$transcation_data1_cst->membership_name:'' ; ?></b></p>
                               <p>Package Amount:-  <b><?php echo isset($transcation_data1_cst->membership_amt) && !empty($transcation_data1_cst->membership_amt)?$transcation_data1_cst->membership_amt:'' ; ?></b></p>
                              <p>Transction ID:-  <b><?php echo isset($transcation_data1_cst->transcation_id) && !empty($transcation_data1_cst->transcation_id)?$transcation_data1_cst->transcation_id:'' ; ?></b></p>
                              <p>Total Amount:- <b><?php echo isset($transcation_data1_cst->membership_amt) && !empty($transcation_data1_cst->membership_amt)?$transcation_data1_cst->membership_amt:'' ; ?></b></p>
                              <p>Deposite Date:- <b><?php echo isset($transcation_data1_cst->modified_on) && !empty($transcation_data1_cst->modified_on)?date('d-m-Y',strtotime($transcation_data1_cst->modified_on)):'' ; ?></b></p>
                            </div> 
                            <div class="row">
                              <div class="col-md-offset-3 col-md-9">
                                <a href="<?php echo base_url();?>admin_user" style="color: orangered;"><i class="fa fa-reply-all"></i> Go To Back</a>
                              </div>
                            </div>                  
                          </div>

                          <div class="col-md-2"></div>
                        </div>

                      </div>

                      </form>
                  </div>
              </div>

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