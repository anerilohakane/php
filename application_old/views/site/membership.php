<?php 
$customer_id = $this->session->userdata('customer_id'); ?> 
<!DOCTYPE html>
<html lang="en">
<head>
<title>Shivbandhan | Membership</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport" />

<link href="<?php echo base_url();?>assets/site1/css/bootstrap.min.css" rel="stylesheet" type="text/css"/> <!-- bootstrap css -->
<link href="<?php echo base_url();?>assets/site1/css/font-awesome.min.css" rel="stylesheet" type="text/css"/> <!-- fontawesome css -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/site/revolution/css/settings.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/site/revolution/css/layers.css">
<link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet"> <!-- google fonts -->
<link href="<?php echo base_url();?>assets/site1/css/menumaker.css" rel="stylesheet" type="text/css"/> <!-- menu css -->
<link href="<?php echo base_url();?>assets/site1/css/owl.carousel.css" rel="stylesheet" type="text/css"/> <!-- owl carousel css -->
<link href="<?php echo base_url();?>assets/site1/css/magnific-popup.css" rel="stylesheet" type="text/css"/> <!-- magnify popup css -->
<link href="<?php echo base_url();?>assets/global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/site1/css/flaticon.css" rel="stylesheet" type="text/css"/> <!-- flaticon css -->
<link href="<?php echo base_url();?>assets/site1/css/style.css" rel="stylesheet" type="text/css"/> <!-- custom css -->
<link href="<?php echo base_url();?>assets/site1/css/stucture.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/css/datepicker3.css"/>
 <!-- stucture css -->
<link href="<?php echo base_url();?>uploads/favicon.png" rel="icon" type="image/x-icon"/>
<style type="text/css">
 .modal-backdrop
  {
    z-index: 0 !important;
  }
</style>
<!-- end theme style -->
</head>
<!-- end head -->
<!--body start-->
<body style="background-color: #e6e6e6">
<!-- preloader --> 
  
  <?php $this->load->view('site/header');?>
  <section id="page-banner" class="page-banner" style="background-image: url('assets/site1/images/banner.jpg');"> 
    <div class="container">
      <div class="banner-dtl text-center">
        <h2 class="banner-heading">Membership</h2>
        <div class="breadcrumb-block">
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>">Home</a></li>
            <li class="active">Membership</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <section id="pricing-table" class="pricing-table-main-block">
    <div class="container" >
      <div class="row">
        <?php if(isset($membership_plan) && !empty($membership_plan))
        { 
          foreach ($membership_plan as $key ) 
          { ?>
              <div class="col-md-4 col-sm-6">
                <div class="pricing-table-block">
                  <div class="pricing-table-img-section">
                    <img src="<?php echo  base_url();?>assets/site1/images/pricing-table/pricing-table-1.jpg" class="img-responsive" alt="pricing-table-img">
                    <div class="overlay-bg"></div>
                    <div class="pricing-table-dtl">
                      <h3 class="pricing-table-heading"><?php echo(isset($key->membership_plan_name) && !empty($key->membership_plan_name))?$key->membership_plan_name:'';?></h3>
                      <div class="pricing-table-price"><i class="fa fa-inr"></i> <?php echo(isset($key->total_amount) && !empty($key->total_amount))?$key->total_amount:'0';?><span>/<?php echo(isset($key->membership_validity) && !empty($key->membership_validity))?$key->membership_validity.'days':'';?></span></div>
                    </div>
                  </div>
                  <div class="pricing-table-list">
                      <?php echo(isset($key->membership_description) && !empty($key->membership_description))?$key->membership_description:'';?>
                    <div class="pricing-table-btn">
                      <?php if(isset($customer_id) && !empty($customer_id))
                      { ?>
                      <form action="javascript:void(0);"  method="post" id="pay_online" >
                        <input type="hidden" name="membership_amt" value="<?php echo(isset($key->total_amount) && !empty($key->total_amount))?$key->total_amount:'0';?>">
                        <input type="hidden" name="membership_id" value="<?php echo(isset($key->membership_id) && !empty($key->membership_id))?$key->membership_id:'';?>">
                        <a href="javascript:void(0);" rel="<?php echo(isset($key->total_amount) && !empty($key->total_amount))?$key->total_amount:'0';?>" rev="<?php echo(isset($key->membership_id) && !empty($key->membership_id))?$key->membership_id:'';?>"  class="btn btn-default pay_online">Pay Now</a>
                      </form>
                      <?php } else 
                      { ?>
                        <a href="javascript:void(0);" data-toggle="modal" data-target="#login-model" class="btn btn-default">Pay Now</a>.
                      <?php } ?>
                    </div>
                  </div>
                </div>
              </div>
          <?php }

        } ?>
      </div>
    </div>
  </section>
  <?php $this->load->view('site/footer');?>
<!-- jquery -->
<script type="text/javascript" src="<?php echo base_url();?>assets/site1/js/jquery.min.js"></script>  <!-- jquery library js -->
<script type="text/javascript" src="<?php echo base_url();?>assets/site1/js/bootstrap.min.js"></script> <!-- bootstrap js -->
<script type="text/javascript" src="<?php echo base_url();?>assets/site1/js/owl.carousel.js"></script> <!-- owl carousel js -->
<script type="text/javascript" src="<?php echo base_url();?>assets/site1/js/jquery.ajaxchimp.js"></script> <!-- mail chimp js -->
<script type="text/javascript" src="<?php echo base_url();?>assets/site1/js/smooth-scroll.js"></script> <!-- smooth scroll js -->
<script type="text/javascript" src="<?php echo base_url();?>assets/site1/js/jquery.magnific-popup.min.js"></script> <!-- magnify popup js --> 
<script type="text/javascript" src="<?php echo base_url();?>assets/site1/js/waypoints.min.js"></script> <!-- facts count js required for jquery.counterup.js file -->
<script type="text/javascript" src="<?php echo base_url();?>assets/site1/js/jquery.counterup.js"></script> <!-- facts count js-->
<script type="text/javascript" src="<?php echo base_url();?>assets/site1/js/menumaker.js"></script> <!-- menu js--> 
<script type="text/javascript" src="<?php echo base_url();?>assets/site1/js/jquery.share-tooltip.js"></script> <!-- share tooltip js--> 
<script type="text/javascript" src="<?php echo base_url();?>assets/site1/js/price-slider.js"></script> <!-- price slider / filter js-->
<script type="text/javascript" src="<?php echo base_url();?>assets/site1/js/theme.js"></script> <!-- custom js --> 
<script src="<?php echo base_url();?>assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/additional-methods.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/jquery-validation/lib/jquery.form.js"></script>

<script src="<?php echo base_url();?>assets/global/scripts/metronic.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>js/common.js"></script>   
<!-- end jquery -->
</body>
<script>
jQuery(document).ready(function() {    
    // initiate layout and plugins
    Metronic.init(); 

});
</script>
<!--body end -->

<!-- Mirrored from thegenius.co/html/weddlist/version-1/contact-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Dec 2018 12:26:22 GMT -->
</html>