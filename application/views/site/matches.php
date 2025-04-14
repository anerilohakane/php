<?php 

$customer_id = $this->session->userdata('customer_id');

$mem_data = $this->common_model->selectDetailsWhr('tbl_customer','customer_id',$customer_id); 

if(!isset($customer_id) && empty($customer_id))

{  redirect('site_logout'); }?>

<!DOCTYPE html>

<html lang="en">

<head>

<title>Shivbandhan | Quick Result</title>

<meta content="width=device-width, initial-scale=1.0" name="viewport" />



<link href="<?php echo base_url();?>assets/site1/css/bootstrap.min.css" rel="stylesheet" type="text/css"/> <!-- bootstrap css -->

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

 /* #register-model

  {

    z-index: 999999999 !important;

  }*/

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

        <h2 class="banner-heading">Matches</h2>

        <div class="breadcrumb-block">

          <ol class="breadcrumb">

            <li><a href="<?php echo base_url();?>">Home</a></li>

            <li class="active">Matches</li>

          </ol>

        </div>

      </div>

    </div>

  </section>

  <section class="main-container" style="background-color: rgb(230, 230, 230);">

    <div class="container">

      <div class="section text-center">

        <h3 class="section-heading" style="margin-top: -70px;">Shivbandhan Matches Details</h3>

      </div>

      <div class="vendor-profile-listing-block">

        <div class="row">

          <?php if(isset($matches_profile) && !empty($matches_profile))

          { 

            foreach ($matches_profile as $key) 

            {  

              $block_data=$this->admin_model->chk_block($key->customer_id,$customer_id);



              if(empty($block_data))

              {

                if(isset($key->dob) && !empty($key->dob))

                {

                 $userDob = (isset($key->dob) && !empty($key->dob))?$key->dob:'';

                 $dob = new DateTime($userDob);

                 $now = new DateTime();

                 $difference = $now->diff($dob);

                 $age = $difference->y;

                } ?>

                  <div class="col-md-3 col-sm-6">

                    <div class="feature-block bline" >

                      <div class="feature-img">

                      <!-- <?php if($mem_data->membership_status=='Active')

                      {?>



                        <a href="<?php echo base_url();?>profile_details/<?php echo (isset($key->customer_id) && !empty($key->customer_id))?$key->customer_id:'';?>"><img src="<?php echo base_url();?>uploads/customer_photo/<?php echo (isset($key->customer_photo) && !empty($key->customer_photo))?$key->customer_photo:'user.png';?>"  class="img-responsive " alt="profile"  style="border-radius: 150px; padding: 5px; height: 100px; width: 100px; margin-left: 70px;" ></a>

                      <?php } 

                      else

                      { ?>

                          <a href="javascript:void(0);"><img src="<?php echo base_url();?>uploads/customer_photo/<?php echo (isset($key->customer_photo) && !empty($key->customer_photo))?$key->customer_photo:'user.png';?>"  class="img-responsive block" alt="profile" style="border-radius: 150px; padding: 5px; height: 135px; width: 135px; margin-left: 60px;" ></a>

                      <?php } ?> -->

                      <a href="<?php echo base_url();?>profile_details/<?php echo (isset($key->customer_id) && !empty($key->customer_id))?$key->customer_id:'';?>"><img src="<?php echo base_url();?>uploads/customer_photo/<?php echo (isset($key->customer_photo) && !empty($key->customer_photo))?$key->customer_photo:'user.png';?>"  class="img-responsive " alt="profile"  style="border-radius: 150px; padding: 5px; height: 100px; width: 100px; margin-left: 70px;" ></a>

                      </div><!-- 

                      <div class="tags tags-clr-one">Featured</div> -->

                      <div class="feature-dtl" style="margin-top: -30px; height: 225px;">

                        <h6 class="feature-heading"><i class="fa fa-id-card" aria-hidden="true" ></i>  <?php echo (isset($key->profile_code) && !empty($key->profile_code))?$key->profile_code:'';?> <i class="fa fa-user" aria-hidden="true" style="margin-left: 10px;"></i>  <?php echo (isset($key->profile_name) && !empty($key->profile_name))?$key->profile_name:'Not Specified';?></h6>

                        <h6 class="feature-heading"> Caste: <?php echo (isset($key->cast_name) && !empty($key->cast_name))?$key->cast_name:'Not Specified';?> </h6> <h6 class="feature-heading"> Height : <?php echo (isset($key->height) && !empty($key->height))?$key->height:'Not Specified';?> </h6> <h6 class="feature-heading"> Age : <?php echo (isset($age) && !empty($age))?$age.' Yrs':'0 Yrs';?> </h6><h6 class="feature-heading"> Education : <?php echo (isset($key->education_name) && !empty($key->education_name))?$key->education_name:'Not Specified';?> </h6>

                        <h6 class="feature-heading"><i class="fa fa-map-marker" aria-hidden="true"></i> <?php echo (isset($key->native_city_name) && !empty($key->native_city_name))?$key->native_city_name:'Not Specified';?> </h6>

                      </div>

                      <div class="row">

                        <div class="col-xs-12" style="margin-top: -20px; margin-bottom: -20px;">

                          <div class="feature-vendor">

                            <a href="javascript:void(0);"><i class="fa fa-comments-o <?php if($mem_data->membership_status!='Active'){echo 'block';}?>" aria-hidden="true" title="Chat" style="font-size: 25px; padding: 15px; margin-left: -10px;"></i></a>

                            <a href="javascript:void(0);" class=" <?php echo((isset($mem_data->membership_status) && !empty($mem_data->membership_status)) && ($mem_data->membership_status=='Active'))?'send_request':'block'?> " rel="<?php echo(isset($key->customer_id) && !empty($key->customer_id))?$key->customer_id:''?>" rev="send_request"><i class="fa fa-phone " aria-hidden="true" title="Request" style="font-size: 25px; padding: 15px;"></i></a>

                            <a href="javascript:void(0);" class="<?php echo((isset($mem_data->membership_status) && !empty($mem_data->membership_status)) && ($mem_data->membership_status=='Active'))?'send_request':'block'?>" rel="<?php echo(isset($key->customer_id) && !empty($key->customer_id))?$key->customer_id:''?>" rev="add_favourite"><i class="fa fa-star <?php if($mem_data->membership_status!='Active'){echo 'block';}?>" aria-hidden="true" title="Favourite" style="font-size: 25px; padding: 15px;"></i></a>

                            <a href="javascript:void(0);" class="<?php echo((isset($mem_data->membership_status) && !empty($mem_data->membership_status)) && ($mem_data->membership_status=='Active'))?'send_request':'block'?>" rel="<?php echo(isset($key->customer_id) && !empty($key->customer_id))?$key->customer_id:''?>" rev="block_user_details"><i class="fa fa-ban " aria-hidden="true" title="Block" style="font-size: 25px; padding: 15px;"></i></a>

                          </div>

                        </div>

                      </div>

                    </div>

                  </div>

                <?php }

              }

          }

          else

          { ?>

              <center><img src="<?php echo base_url();?>images/index.jpg" style="width: 200px;height: 200px;margin-top: 50px; opacity: 0.20;"><br><h3><b style="color: rgb(206, 206, 206);">No Record Found...!</b></h3></center>

          <?php } ?>

          

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