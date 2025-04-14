<!DOCTYPE html>
<html lang="en">
<head>
<title>Shivbandhan | Contact Us</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport" />

<link href="<?php echo base_url();?>assets/site1/css/bootstrap.min.css" rel="stylesheet" type="text/css"/> <!-- bootstrap css -->

<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/site/revolution/css/settings.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/site/revolution/css/layers.css">
<link href="<?php echo base_url();?>assets/site1/css/font-awesome.min.css" rel="stylesheet" type="text/css"/> <!-- fontawesome css -->
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
<body>
<!-- preloader --> 
  
  <?php $this->load->view('site/header');?>
  <section id="page-banner" class="page-banner" style="background-image: url('assets/site1/images/banner.jpg');"> 
    
    <div class="container">
      <div class="banner-dtl text-center">
        <h2 class="banner-heading">Contact Us</h2>
        <div class="breadcrumb-block">
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>">Home</a></li>
            <li class="active">Contact Us</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <section class="main-container">
    <div class="container">
      <div class="section text-center">
        <h3 class="section-heading">Shivbandhan  Contact Details</h3>
      </div>
      <div class="row">
        <div class="col-md-4 col-sm-6">
          <div class="contact-us-block">
            <div class="contact-us-icon"> 
              <img src="<?php echo base_url();?>assets/site1/images/contact-us/contact-icon-1.png" class="img-responsive" alt="contact-icon">
            </div>
            <div class="contact-us-dtl text-center">
              <h6 class="contact-heading" >Our Address</h6>
              <div class="contact-sub-heading" style="width: 350px; margin-left: -80px;">SHIVBANDHAN MATRIMONY LLP <br> 
              Registered office: Sadgurukrupa Aprt, <br/>F No- 403, S.No- 36,Katraj Bypass Road, Near D Mart, Ambegaon Bk, Pune- 411046 , Maharashtra, India


</div>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-6">
          <div class="contact-us-block">
            <div class="contact-us-icon"> 
              <img src="<?php echo base_url();?>assets/site1/images/contact-us/contact-icon-2.png" class="img-responsive" alt="contact-icon">
            </div>
            <div class="contact-us-dtl text-center" style="width: 260px; margin-left: -40px;">
              <h6 class="contact-heading" >Call Us</h6>
              <a href="javascript:void(0);">Head Office: +91-8888438693</a><br>
              <a href="javascript:void(0);">+91-8888438694</a><br>
              <a href="javascript:void(0);"> Akluj Branch: +91-8888438601</a>
            </div>
          </div>
        </div>
        <div class="col-md-4 col-sm-6">
          <div class="contact-us-block">
            <div class="contact-us-icon"> 
              <img src="<?php echo base_url();?>assets/site1/images/contact-us/contact-icon-3.png" class="img-responsive" alt="contact-icon">
            </div>
            <div class="contact-us-dtl text-center" style="margin-left: -20px;">
              <h6 class="contact-heading">Mail Us</h6>
              <a href="javascript:void(0)">info@shivbandhan.com </a>
              <a href="javascript:void(0)">support@shivbandhan.com </a>
              <a href="javascript:void(0)"> shivbandhanmaratha@gmail.com </a>
            </div>
          </div>
        </div>
      </div>
      <div class="mt100">
        <div class="section text-center">
          <h3 class="section-heading">Feel Free To Contact Us</h3>
        </div>
        <div class="contact-form form-group">
          <form id="save_contact" action="save_contact" method="post">
            <div class="row">
              <div class="col-sm-6">
                <input type="text" class="form-control" name="yourname" id="name" placeholder="YOUR NAME *" required/>
                <input type="text" class="form-control sendotp1" rel="" rev="send_contct_otp" name="phone" id="phone" placeholder="YOUR PHONE" required/>
                <input type="text" class="form-control otp"  name="otp" id="otp" placeholder="Enter OTP" style="display: none" required/>
              </div>
              <div class="col-sm-6">
                <input type="email" class="form-control" name="email" id="email" placeholder="YOUR EMAIL ADDRESS *" required/>
                <input type="text" class="form-control" name="subject" id="subject" placeholder="SUBJECT"/>
              </div>
            </div>
            <textarea name="message" id="message" class="form-control" placeholder="YOUR MESSAGE *"></textarea>
            <div class="message-button text-center">
              <button type="submit" class="btn btn-pink common_save">Send Message</button>
            </div>
          </form>
        </div>
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