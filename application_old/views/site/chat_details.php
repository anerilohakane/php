<?php 
$customer_id = $this->session->userdata('customer_id'); 
if((!isset($customer_id) && empty($customer_id)))
{
    redirect('site_logout');
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Shivbandhan | Chat Details</title>
<meta http-equiv="Refresh" content="30">
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
</style>
</head>
<body>
  <?php $this->load->view('site/header');?>
  <section class="main-container">
    <div class="container">
      <div class="row" style="background-color: rgb(230, 230, 230);  margin-top: -65px;">
        <div class="media-left">
          <a href="javascript:void(0);"><img src="<?php echo base_url();?>uploads/customer_photo/<?php echo (isset($cust_data->customer_photo) && !empty($cust_data->customer_photo))?$cust_data->customer_photo:'user.png';?>"  class="img-responsive " alt="profile" style="border-radius: 150px; padding: 5px; height: 65px; width: 65px;" ></a>
        </div>
        <div class="media-body">
          <div class="date" style="padding: 8px;"><?php echo isset($cust_data->f_name)&& !empty($cust_data->f_name)?$cust_data->f_name.' '.$cust_data->m_name.' '.$cust_data->l_name:'';?></div>
          <div class="date" style="padding-left: 8px;"><?php echo isset($cust_data->profile_code)&& !empty($cust_data->profile_code)?$cust_data->profile_code:'';?></div>
        </div>
      </div>
      <div class="row">
        <?php 

            $filcnt=count($chat_details);
            for($i=0;$i<$filcnt;$i++)
            { ?>
                    <div class="col-sm-6 col-md-12" style="<?php if($chat_details[$i]['created_by']==$customer_id) { echo "text-align: right"; } else{ echo "text-align:left";} ?>">  <span style="font-size: 20px;  padding: 50px;"><?php echo (isset($chat_details[$i]['messae']) && !empty($chat_details[$i]['messae']))?$chat_details[$i]['messae']:'-'; ?></span></div>
              
            <?php }

        
        /*else
        { ?>
          <center><img src="<?php echo base_url();?>images/index.jpg" style="width: 200px;height: 200px;margin-top: 50px; opacity: 0.20;"><br><h3><b style="color: rgb(206, 206, 206);">No Chat Found...!</b></h3></center>
        <?php }*/ ?>
      </div>
      <div class="row" style=" margin-top: 20px;">
        <div class="contact-form form-group">
          <form id="save_chat" action="save_chat" method="post">
            <div class="row">
              <div class="col-sm-10">
                <input type="text" class="form-control" name="messae" id="name" placeholder="Type Messae...." required/>
                <input type="hidden" class="form-control" name="cust_id" id="name" value="<?php echo isset($cust_data->customer_id)&& !empty($cust_data->customer_id)?$cust_data->customer_id:'';?>" required/>
              </div>
              <div class="col-sm-2">
                <button type="submit" class="btn btn-pink common_save">Send</button>
              </div>
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