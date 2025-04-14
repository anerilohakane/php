<?php 
$customer_id = $this->session->userdata('customer_id'); 
if((!isset($customer_id) && empty($customer_id)))
{
    redirect('site_logout');
} ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Shivbandhan | Profile</title>
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet" type="text/css" />
<link href="<?php echo base_url();?>assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput-typeahead.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
<link href="<?php echo base_url();?>assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/select2/select2.css"/>
<link href="<?php echo base_url();?>assets/global/css/components-rounded.css" id="style_components" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/global/css/plugins.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/admin/layout3/css/layout.css" rel="stylesheet" type="text/css">
<link href="<?php echo base_url();?>assets/admin/layout3/css/themes/default.css" rel="stylesheet" type="text/css" id="style_color">
<link href="<?php echo base_url();?>assets/admin/layout3/css/custom.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/css/datepicker3.css"/> <!-- stucture css -->
<link href="<?php echo base_url();?>assets/site1/css/menumaker.css" rel="stylesheet" type="text/css"/> <!-- menu css -->
<link href="<?php echo base_url();?>assets/site1/css/owl.carousel.css" rel="stylesheet" type="text/css"/> <!-- owl carousel css -->
<link href="<?php echo base_url();?>assets/site1/css/magnific-popup.css" rel="stylesheet" type="text/css"/> <!-- magnify popup css -->
<link href="<?php echo base_url();?>assets/site1/css/datepicker.css" rel="stylesheet" type="text/css"/> <!-- datepicker css -->
<link href="<?php echo base_url();?>assets/site1/css/flaticon.css" rel="stylesheet" type="text/css"/> <!-- flaticon css -->
<link href="<?php echo base_url();?>assets/site1/css/style.css" rel="stylesheet" type="text/css"/> <!-- custom css -->
<link href="<?php echo base_url();?>assets/site1/css/stucture.css" rel="stylesheet" type="text/css"/> <!-- stucture css -->
<link href="<?php echo base_url();?>uploads/favicon.png" rel="icon" type="image/x-icon"/>
<!-- end theme style -->
</head>
<!-- end head -->
<!--body start-->
<body>
  <?php $this->load->view('site/header');?>
  <section id="page-banner" class="page-banner" style="background-image: url('assets/site1/images/banner.jpg');"> 
    <div class="container">
      <div class="banner-dtl text-center">
        <h2 class="banner-heading">Profile</h2>
        <div class="breadcrumb-block">
          <ol class="breadcrumb">
            <li><a href="<?php echo base_url();?>">Home</a></li>
            <li class="active">Profile</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
<!-- end page banner -->
<!-- register page -->
  <?php if(isset($customer_data) && !empty($customer_data) && $customer_data->status=='unverified')
  { ?>
    <section id="register-page" class="register-main-block">
      <div class="container">
        <div class="row" style=" margin-top: -115px;">
          <div class="col-md-3">
          </div>
          <div class="col-md-6">
            <div class="register-block">
              <h3 class="register-heading text-center"> Verify Mobile</h3>
              <p>Dear <?php echo (isset($customer_data->f_name) && !empty($customer_data->f_name))?$customer_data->f_name.' '.$customer_data->l_name:'';?> OTP has been sent on <b><?php echo (isset($customer_data->mobile) && !empty($customer_data->mobile))?$customer_data->mobile:'';?></b></p>
              <div class="form-group">
                <form id="verify_mobile" action="verify_mobile" method="post">
                  <input type="text" id="otp" name="otp" class="form-control" placeholder="Enter OTP"/>
                  <button type="submit" class="btn btn-pink common_save ">Verify Now</button>
                  <button type="button" class="btn btn-pink sendotp"  rel="<?php echo(isset($customer_data->customer_id) && !empty($customer_data->customer_id))?$customer_data->customer_id:''?>" rev="send_otp">Resend OTP</button>
                </form>
                
              </div>
            </div>
          </div>
          <div class="col-md-3">
          </div>
        </div>
      </div>
    </section>
  <?php } 
  else
  { ?>
    <section  class="register-main-block" style="padding: 20px;">
      <div class="row profile">
          <div class="col-md-12">
              <div class="tabbable tabbable-custom tabbable-noborder ">
                  <ul class="nav nav-tabs">
                      <li class="active">
                          <a href="#tab_1_1" data-toggle="tab">
                         My Profile </a>
                      </li>
                      <li class="">
                          <a href="<?php echo((isset($customer_data->membership_status) && !empty($customer_data->membership_status)) && ($customer_data->membership_status=='Active'))?'#tab_1_2':''?>" class="<?php echo((isset($customer_data->membership_status) && !empty($customer_data->membership_status)) && ($customer_data->membership_status=='Active'))?'':'block'?>" data-toggle="tab">
                          Contact Request </a>
                      </li>
                      <li class="">
                          <a href="<?php echo((isset($customer_data->membership_status) && !empty($customer_data->membership_status)) && ($customer_data->membership_status=='Active'))?'#tab_1_3':''?>" class="<?php echo((isset($customer_data->membership_status) && !empty($customer_data->membership_status)) && ($customer_data->membership_status=='Active'))?'':'block'?>" data-toggle="tab">
                          My Favourite </a>
                      </li>
                      <li class="">
                          <a href="<?php echo((isset($customer_data->membership_status) && !empty($customer_data->membership_status)) && ($customer_data->membership_status=='Active'))?'#tab_1_4':''?>" class="<?php echo((isset($customer_data->membership_status) && !empty($customer_data->membership_status)) && ($customer_data->membership_status=='Active'))?'':'block'?>" data-toggle="tab">
                          Inbox </a>
                      </li>
                      <li class="">
                          <a href="#tab_1_5" data-toggle="tab">
                          Payment History </a>
                      </li>
                       <li class="">
                          <a href="#tab_1_6" data-toggle="tab">
                          Change Password </a>
                      </li>
                  </ul>
                  <div class="tab-content">
                      <div class="tab-pane active" id="tab_1_1">
                        <?php if(isset($customer_data) && !empty($customer_data) && $customer_data->status=='unverified')
                        { ?>
                          <section id="register-page" class="register-main-block">
                            <div class="container">
                              <div class="row" style=" margin-top: -115px;">
                                <div class="col-md-3">
                                </div>
                                <div class="col-md-6">
                                  <div class="register-block">
                                    <h3 class="register-heading text-center"> Verify Mobile</h3>
                                    <p>Dear <?php echo (isset($customer_data->f_name) && !empty($customer_data->f_name))?$customer_data->f_name.' '.$customer_data->l_name:'';?> OTP has been sent on <b><?php echo (isset($customer_data->mobile) && !empty($customer_data->mobile))?$customer_data->mobile:'';?></b></p>
                                    <div class="form-group">
                                      <form id="verify_mobile" action="verify_mobile" method="post">
                                        <input type="text" id="otp" name="otp" class="form-control" placeholder="Enter OTP"/>
                                        <button type="submit" class="btn btn-pink common_save ">Verify Now</button>
                                        <button type="button" class="btn btn-pink sendotp"  rel="<?php echo(isset($customer_data->customer_id) && !empty($customer_data->customer_id))?$customer_data->customer_id:''?>" rev="send_otp">Resend OTP</button>
                                      </form>
                                      
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-3">
                                </div>
                              </div>
                            </div>
                          </section>
                        <?php } 
                        else
                        { ?>
                          <section  class="register-main-block" style="padding: 20px;">
                            <div class="row form">
                              <div class="col-md-12">
                                <div class="portlet box red" id="form_wizard_1">
                                  <div class="portlet-title">
                                    <div class="caption">
                                      <span class="caption-subject bold uppercase">
                                      <i class="fa fa-user"></i> Profile Details  - <span class="step-title">Step 1 of 6 </span>
                                      </span>
                                      <span class="pull-right">
                                            <b style="margin-left: 770px;"><i class="fa fa-credit-card"></i> </i><?php echo(isset($customer_data->profile_code) && !empty($customer_data->profile_code))?$customer_data->profile_code:''?></b>
                                      </span>
                                    </div>
                                  </div>
                                  <div class="portlet-body ">
                                    <form action="javascript:;" data-url="save_profile_details" class="horizontal-form" id="submit_form" method="POST">
                                      <div class="form-wizard">
                                        <div class="form-body">
                                          <ul class="nav nav-pills nav-justified steps">
                                            <li>
                                              <a href="#tab1" data-toggle="tab" class="step active">
                                              <span class="number">
                                              1 </span>
                                              <span class="desc">
                                              <i class="fa fa-check"></i> Personal Info </span>
                                              </a>
                                            </li>
                                            <li>
                                              <a href="#tab2" data-toggle="tab" class="step ">
                                              <span class="number">
                                              2 </span>
                                              <span class="desc">
                                              <i class="fa fa-check"></i>Horoscope Info  </span>
                                              </a>
                                            </li>
                                            <li>
                                              <a href="#tab3" data-toggle="tab" class="step">
                                              <span class="number">
                                              3 </span>
                                              <span class="desc">
                                              <i class="fa fa-check"></i> Educational Info </span>
                                              </a>
                                            </li>
                                            <li>
                                              <a href="#tab4" data-toggle="tab" class="step">
                                              <span class="number">
                                              4 </span>
                                              <span class="desc">
                                              <i class="fa fa-check"></i> Address Info</span>
                                              </a>
                                            </li>
                                            <li>
                                              <a href="#tab5" data-toggle="tab" class="step">
                                              <span class="number">
                                              5 </span>
                                              <span class="desc">
                                              <i class="fa fa-check"></i> Family Info</span>
                                              </a>
                                            </li>
                                            <li>
                                              <a href="#tab6" data-toggle="tab" class="step">
                                              <span class="number">
                                              6 </span>
                                              <span class="desc">
                                              <i class="fa fa-check"></i> Expectation </span>
                                              </a>
                                            </li>
                                          </ul>
                                          <div id="bar" class="progress progress-striped" role="progressbar" style="height: 10px;">
                                            <div class="progress-bar progress-bar-success">
                                            </div>
                                          </div>
                                          <div class="tab-content">
                                            <div class="alert alert-danger display-none">
                                              <button class="close" data-dismiss="alert"></button>
                                              You have some form errors. Please check below.
                                            </div>
                                            <div class="alert alert-success display-none">
                                              <button class="close" data-dismiss="alert"></button>
                                              Your form validation is successful!
                                            </div>
                                            <div class="tab-pane active" id="tab1">
                                              <div class="row">
                                                <div class="col-md-9">
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <div class="form-group">
                                                        <label class="control-label">First Name<span class="require" aria-required="true" style="color:red">*</span></label>
                                                        <div class="input-icon right">
                                                          <i class="fa"></i>
                                                          <input  type="text" class="form-control " name="f_name" value="<?php echo(isset($customer_data->f_name) && !empty($customer_data->f_name))?$customer_data->f_name:''?>" placeholder="First Name" readonly>
                                                          <input type="hidden" name="step" value="1">
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                      <div class="form-group">
                                                        <label class="control-label">Middle Name <span class="require" aria-required="true" style="color:red">*</span></label>
                                                        <div class="input-icon right">
                                                          <i class="fa"></i>
                                                          <input  type="text" class="form-control " name="m_name" value="<?php echo(isset($customer_data->m_name) && !empty($customer_data->m_name))?$customer_data->m_name:''?>" placeholder="Middle Name" readonly>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                      <div class="form-group">
                                                        <label class="control-label">Last Name <span class="require" aria-required="true" style="color:red">*</span></label>
                                                        <div class="input-icon right">
                                                          <i class="fa"></i>
                                                          <input  type="text" class="form-control " name="l_name" value="<?php echo(isset($customer_data->l_name) && !empty($customer_data->l_name))?$customer_data->l_name:''?>" placeholder="Last Name" readonly>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                      <div class="form-group">
                                                        <label class="control-label">Email <span class="require" aria-required="true" style="color:red">*</span></label>
                                                        <div class="input-icon right">
                                                          <i class="fa"></i>
                                                          <input  type="text" class="form-control " name="email" value="<?php echo(isset($customer_data->email) && !empty($customer_data->email))?$customer_data->email:''?>" placeholder="Email Id" readonly>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                      <div class="form-group">
                                                        <label class="control-label">Mobile <span class="require" aria-required="true" style="color:red">*</span></label>
                                                        <div class="input-icon right">
                                                          <i class="fa"></i>
                                                          <input  type="text" class="form-control " name="mobile" value="<?php echo(isset($customer_data->mobile) && !empty($customer_data->mobile))?$customer_data->mobile:''?>" placeholder="Mobile No" readonly>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                      <div class="form-group">
                                                        <label class="control-label">Date Of Birth <span class="require" aria-required="true" style="color:red">*</span></label>
                                                        <div class="input-icon right">
                                                          <i class="fa"></i>
                                                          <input  type="text" class="form-control " name="dob" value="<?php echo(isset($customer_data->dob) && !empty($customer_data->dob))?date('d-m-Y',strtotime($customer_data->dob)):''?>" placeholder="Date Of Birth" readonly>
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                      <div class="form-group">
                                                        <label class="control-label">Marital Status<span class="require" aria-required="true" style="color:red">*</span></label>
                                                        <div class=" "> 
                                                          <select class="form-control select2me " name="marital_status">
                                                            <option value="">select</option>
                                                            <?php if(isset($marital_status_data) && !empty($marital_status_data))
                                                            {
                                                              foreach ($marital_status_data as $key) 
                                                              { ?>
                                                                <option value="<?php echo $key->marital_id?>" <?php echo (isset($customer_data->marital_status) && !empty($customer_data->marital_status) && ($customer_data->marital_status==$key->marital_id))?'selected="selected"':'';?>><?php echo $key->marital_name;?></option>
                                                              <?php }                             
                                                            } ?>                            
                                                          </select>
                                                        </div>
                                                      </div> 
                                                    </div>
                                                    <div class="col-md-4">
                                                      <div class="form-group">
                                                        <label class="control-label">Caste<span class="require" aria-required="true" style="color:red">*</span></label>
                                                        <div class=" "> 
                                                          <select class="form-control select2me " name="caste">
                                                            <option value="">select</option>
                                                            <?php if(isset($cast_data) && !empty($cast_data))
                                                            {
                                                              foreach ($cast_data as $key) 
                                                              { ?>
                                                                <option value="<?php echo $key->cast_id?>" <?php echo (isset($customer_data->caste) && !empty($customer_data->caste) && ($customer_data->caste==$key->cast_id))?'selected="selected"':'';?>><?php echo $key->cast_name;?></option>
                                                              <?php }                             
                                                            } ?>                            
                                                          </select>
                                                        </div>
                                                      </div> 
                                                    </div>
                                                    <div class="col-md-4">
                                                      <div class="form-group">
                                                        <label class="control-label">Sub Caste<span class="require" aria-required="true" style="color:red">*</span></label>
                                                        <div class=" "> 
                                                          <!-- <select class="form-control select2me " name="sub_caste">
                                                            <option value="">select</option>
                                                            <?php if(isset($sub_cast_data) && !empty($sub_cast_data))
                                                            {
                                                              foreach ($sub_cast_data as $key) 
                                                              { ?>
                                                                <option value="<?php echo $key->sub_cast_id?>" <?php echo (isset($customer_data->sub_caste) && !empty($customer_data->sub_caste) && ($customer_data->sub_caste==$key->sub_cast_id))?'selected="selected"':'';?>><?php echo $key->sub_cast_name;?></option>
                                                              <?php }                             
                                                            } ?>                            
                                                          </select> -->

                                                          <div class="input-icon right">
                                                            <i class="fa"></i>
                                                            <input  type="text" class="form-control " name="sub_caste" value="<?php echo(isset($customer_data->sub_caste) && !empty($customer_data->sub_caste))?$customer_data->sub_caste:''?>" placeholder="Sub Caste" >
                                                          </div>
                                                        </div>
                                                      </div> 
                                                    </div>
                                                    <div class="col-md-4">
                                                      <div class="form-group">
                                                        <label class="control-label">Height <span class="require" aria-required="true" style="color:red">*</span></label>
                                                        <div class="input-icon right">
                                                          <i class="fa"></i>
                                                          <input  type="text" class="form-control " name="height" value="<?php echo(isset($customer_data->height) && !empty($customer_data->height))?$customer_data->height:''?>" placeholder=" Enter Height (ex: 5.5 )" >
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                      <div class="form-group">
                                                        <label class="control-label">Weight <span class="require" aria-required="true" style="color:red">*</span></label>
                                                        <div class="input-icon right">
                                                          <i class="fa"></i>
                                                          <input  type="text" class="form-control " name="weight" value="<?php echo(isset($customer_data->weight) && !empty($customer_data->weight))?$customer_data->weight:''?>" placeholder="Enter Weight (EX 40)" >
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                      <div class="form-group">
                                                        <label class="control-label">Blood Group <span class="require" aria-required="true" style="color:red">*</span></label>
                                                        <div class="input-icon right">
                                                          <i class="fa"></i>
                                                          <input  type="text" class="form-control " name="blood_group" value="<?php echo(isset($customer_data->blood_group) && !empty($customer_data->blood_group))?$customer_data->blood_group:''?>" placeholder="Enter Blood Group (EX O+)" >
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                      <div class="form-group">
                                                        <label class="control-label">Complexion<span class="require" aria-required="true" style="color:red">*</span></label>
                                                        <div class=" "> 
                                                          <select class="form-control select2me " name="complexion">
                                                            <option value="">select</option>
                                                            <?php if(isset($complexion_data) && !empty($complexion_data))
                                                            {
                                                              foreach ($complexion_data as $key) 
                                                              { ?>
                                                                <option value="<?php echo $key->complexion_id?>" <?php echo (isset($customer_data->complexion) && !empty($customer_data->complexion) && ($customer_data->complexion==$key->complexion_id))?'selected="selected"':'';?>><?php echo $key->complexion_name;?></option>
                                                              <?php }                             
                                                            } ?>                            
                                                          </select>
                                                        </div>
                                                      </div> 
                                                    </div>
                                                    <div class="col-md-4">
                                                      <div class="form-group">
                                                        <label class="control-label">Physical Disabilities<span class="require" aria-required="true" style="color:red">*</span></label>
                                                        <div class=" "> 
                                                          <select class="form-control select2me " name="physical_disability">
                                                            <option value="">select</option>
                                                            <option value="Yes" <?php echo (isset($customer_data->physical_disability) && !empty($customer_data->physical_disability) && ($customer_data->physical_disability=='Yes'))?'selected="selected"':'';?>>Yes</option>
                                                            <option value="No" <?php echo (isset($customer_data->physical_disability) && !empty($customer_data->physical_disability) && ($customer_data->physical_disability=='No'))?'selected="selected"':'';?>>No</option>
                                                                                       
                                                          </select>
                                                        </div>
                                                      </div> 
                                                    </div>
                                                    <div class="col-md-4">
                                                      <div class="form-group">
                                                        <label class="control-label">Lens<span class="require" aria-required="true" style="color:red">*</span></label>
                                                        <div class=" "> 
                                                          <select class="form-control select2me " name="lens">
                                                            <option value="">select</option>
                                                            <option value="Yes" <?php echo (isset($customer_data->lens) && !empty($customer_data->lens) && ($customer_data->lens=='Yes'))?'selected="selected"':'';?>>Yes</option>
                                                            <option value="No" <?php echo (isset($customer_data->lens) && !empty($customer_data->lens) && ($customer_data->physical_disability=='No'))?'selected="selected"':'';?>>No</option>
                                                                                       
                                                          </select>
                                                        </div>
                                                      </div> 
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="col-md-3">
                                                  <div class="col-md-12">
                                                      <div class="form-group">
                                                        <label class="control-label">Photo<span class="required">*</span></label><br>
                                                        <?php if(isset($customer_data->customer_photo) && !empty($customer_data->customer_photo))
                                                        { 
                                                          $path = 'uploads/customer_photo/'. $customer_data->customer_photo;  
                                                          if (file_exists($path)) {?>
                                                          <div class="fileinput fileinput-exists" data-provides="fileinput">
                                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                                              <img src="<?php echo base_url(); ?>uploads/customer_photo/<?php echo (isset($customer_data->customer_photo) && !empty($customer_data->customer_photo))?$customer_data->customer_photo:'user.png'?>" alt=""/>  
                                                            </div>
                                                                <input type="hidden" class="hidden_emp" value="<?php echo (isset($customer_data->customer_photo) && !empty($customer_data->customer_photo))?$customer_data->customer_photo:''?>" name="hidden_customer_photo" accept="image/*">
                                                            <div>
                                                              <span class="btn default btn-file">
                                                              <span class="fileinput-new">
                                                              Select image </span>
                                                              <span class="fileinput-exists">
                                                              Change </span>
                                                              <input type="file" accept="image/*" name="customer_photo">
                                                              </span>
                                                              <a href="javascript:;" class="btn red fileinput-exists remove_image" data-dismiss="fileinput">
                                                              Remove </a>
                                                            </div>
                                                          </div>                                 
                                                        <?php } else
                                                        { ?>
                                                          <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                            <div>
                                                                <span class="btn default btn-file">
                                                                    <span class="fileinput-new"> Select image </span>
                                                                    <span class="fileinput-exists"> Change </span>
                                                                    <input type="file" name="customer_photo" accept="image/*" > </span>
                                                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                            </div>
                                                          </div>         
                                                        <?php } }
                                                        else
                                                        { ?>
                                                          <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+image" alt="" /> </div>
                                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                            <div>
                                                                <span class="btn default btn-file">
                                                                    <span class="fileinput-new"> Select image </span>
                                                                    <span class="fileinput-exists"> Change </span>
                                                                    <input type="file" name="customer_photo" accept="image/*" > </span>
                                                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                            </div>
                                                          </div>         
                                                        <?php } ?>
                                                        <span class="help-block" style="color:#d44;">(Note-Max size of file should not exceed than 1mb and file type is JPG or PNG )</span>
                                                      </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="tab-pane " id="tab2">
                                              <div class="row">
                                                <div class="col-md-12">
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <div class="form-group">
                                                        <label class="control-label">Rashi<span class="require" aria-required="true" style="color:red">*</span></label>
                                                        <div class=" "> 
                                                          <select class="form-control select2me " name="rashi">
                                                            <option value="">select</option>
                                                            <?php if(isset($rashi_data) && !empty($rashi_data))
                                                            {
                                                              foreach ($rashi_data as $key) 
                                                              { ?>
                                                                <option value="<?php echo $key->rashi_id?>" <?php echo (isset($customer_data->rashi) && !empty($customer_data->rashi) && ($customer_data->rashi==$key->rashi_id))?'selected="selected"':'';?>><?php echo $key->rashi_name;?></option>
                                                              <?php }                             
                                                            } ?>                            
                                                          </select>
                                                        </div>
                                                      </div> 
                                                    </div>
                                                    <div class="col-md-4">
                                                      <div class="form-group">
                                                        <label class="control-label">Nakshtra<span class="require" aria-required="true" style="color:red">*</span></label>
                                                        <div class=" "> 
                                                          <select class="form-control select2me " name="nakshtra">
                                                            <option value="">select</option>
                                                            <?php if(isset($nakshtra_data) && !empty($nakshtra_data))
                                                            {
                                                              foreach ($nakshtra_data as $key) 
                                                              { ?>
                                                                <option value="<?php echo $key->nakshtra_id?>" <?php echo (isset($customer_data->nakshtra) && !empty($customer_data->nakshtra) && ($customer_data->nakshtra==$key->nakshtra_id))?'selected="selected"':'';?>><?php echo $key->nakshtra_name;?></option>
                                                              <?php }                             
                                                            } ?>                            
                                                          </select>
                                                        </div>
                                                      </div> 
                                                    </div>
                                                    <div class="col-md-4">
                                                      <div class="form-group">
                                                        <label class="control-label">Charan<span class="require" aria-required="true" style="color:red">*</span></label>
                                                        <div class=" "> 
                                                          <select class="form-control select2me " name="charan">
                                                            <option value="">select</option>
                                                            <?php if(isset($charan_data) && !empty($charan_data))
                                                            {
                                                              foreach ($charan_data as $key) 
                                                              { ?>
                                                                <option value="<?php echo $key->charan_id?>" <?php echo (isset($customer_data->charan) && !empty($customer_data->charan) && ($customer_data->charan==$key->charan_id))?'selected="selected"':'';?>><?php echo $key->charan_name;?></option>
                                                              <?php }                             
                                                            } ?>                            
                                                          </select>
                                                        </div>
                                                      </div> 
                                                    </div>
                                                    <div class="col-md-4">
                                                      <div class="form-group">
                                                        <label class="control-label">Gan<span class="require" aria-required="true" style="color:red">*</span></label>
                                                        <div class=" "> 
                                                          <select class="form-control select2me " name="gan">
                                                            <option value="">select</option>
                                                            <?php if(isset($gan_data) && !empty($gan_data))
                                                            {
                                                              foreach ($gan_data as $key) 
                                                              { ?>
                                                                <option value="<?php echo $key->gan_id?>" <?php echo (isset($customer_data->gan) && !empty($customer_data->gan) && ($customer_data->gan==$key->gan_id))?'selected="selected"':'';?>><?php echo $key->gan_name;?></option>
                                                              <?php }                             
                                                            } ?>                            
                                                          </select>
                                                        </div>
                                                      </div> 
                                                    </div>
                                                    <div class="col-md-4">
                                                      <div class="form-group">
                                                        <label class="control-label">Nadi<span class="require" aria-required="true" style="color:red">*</span></label>
                                                        <div class=" "> 
                                                          <select class="form-control select2me " name="nadi">
                                                            <option value="">select</option>
                                                            <?php if(isset($nadi_data) && !empty($nadi_data))
                                                            {
                                                              foreach ($nadi_data as $key) 
                                                              { ?>
                                                                <option value="<?php echo $key->nadi_id?>" <?php echo (isset($customer_data->nadi) && !empty($customer_data->nadi) && ($customer_data->nadi==$key->nadi_id))?'selected="selected"':'';?>><?php echo $key->nadi_name;?></option>
                                                              <?php }                             
                                                            } ?>                            
                                                          </select>
                                                        </div>
                                                      </div> 
                                                    </div>
                                                    <div class="col-md-4">
                                                      <div class="form-group">
                                                        <label class="control-label">Mangal<span class="require" aria-required="true" style="color:red">*</span></label>
                                                        <div class=" "> 
                                                          <select class="form-control select2me " name="mangal">
                                                            <option value="">select</option>
                                                            <?php if(isset($mangal_data) && !empty($mangal_data))
                                                            {
                                                              foreach ($mangal_data as $key) 
                                                              { ?>
                                                                <option value="<?php echo $key->mangal_id?>" <?php echo (isset($customer_data->mangal) && !empty($customer_data->mangal) && ($customer_data->mangal==$key->mangal_id))?'selected="selected"':'';?>><?php echo $key->mangal_name;?></option>
                                                              <?php }                             
                                                            } ?>                            
                                                          </select>
                                                        </div>
                                                      </div> 
                                                    </div>
                                                    <div class="col-md-4">
                                                      <div class="form-group">
                                                        <label class="control-label">Birth Place <span class="require" aria-required="true" style="color:red">*</span></label>
                                                        <div class="input-icon right">
                                                          <i class="fa"></i>
                                                          <input  type="text" class="form-control " name="birth_place" value="<?php echo(isset($customer_data->birth_place) && !empty($customer_data->birth_place))?$customer_data->birth_place:''?>" placeholder=" Enter Birth Place" >
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                      <div class="form-group">
                                                        <label class="control-label">Birth Time (Ex 10.20 AM) <span class="require" aria-required="true" style="color:red">*</span></label>
                                                        <div class="input-icon right">
                                                          <i class="fa"></i>
                                                          <input  type="text" class="form-control " name="birth_time" value="<?php echo(isset($customer_data->birth_time) && !empty($customer_data->birth_time))?$customer_data->birth_time:''?>" placeholder=" Enter Birth Time (EX 10.20 AM) " >
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                      <div class="form-group">
                                                        <label class="control-label">Gotra/Devak <span class="require" aria-required="true" style="color:red">*</span></label>
                                                        <div class="input-icon right">
                                                          <i class="fa"></i>
                                                          <input  type="text" class="form-control " name="gotra" value="<?php echo(isset($customer_data->gotra) && !empty($customer_data->gotra))?$customer_data->gotra:''?>" placeholder=" Enter Gotra" >
                                                          <input type="hidden" name="step" value="2">
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="tab-pane " id="tab3">
                                              <div class="row">
                                                <div class="col-md-12">
                                                  <div class="row">
                                                    <div class="col-md-6">
                                                      <div class="form-group">
                                                        <label class="control-label">Education Area<span class="require" aria-required="true" style="color:red">*</span></label>
                                                        <div class=" "> 
                                                          <select class="form-control select2me " name="education">
                                                            <option value="">select</option>
                                                            <?php if(isset($education_data) && !empty($education_data))
                                                            {
                                                              foreach ($education_data as $key) 
                                                              { ?>
                                                                <option value="<?php echo $key->education_id?>" <?php echo (isset($customer_data->education) && !empty($customer_data->education) && ($customer_data->education==$key->education_id))?'selected="selected"':'';?>><?php echo $key->education_name;?></option>
                                                              <?php }                             
                                                            } ?>                            
                                                          </select>
                                                        </div>
                                                      </div> 
                                                    </div>
                                                    <div class="col-md-6">
                                                      <div class="form-group">
                                                        <label class="control-label">Occupation City<span class="require" aria-required="true" style="color:red">*</span></label>
                                                        <div class=" "> 
                                                          <select class="form-control select2me " name="occupation_city">
                                                            <option value="">select</option>
                                                            <?php if(isset($city_data) && !empty($city_data))
                                                            {
                                                              foreach ($city_data as $key) 
                                                              { ?>
                                                                <option value="<?php echo $key->city_id?>" <?php echo (isset($customer_data->occupation_city) && !empty($customer_data->occupation_city) && ($customer_data->occupation_city==$key->city_id))?'selected="selected"':'';?>><?php echo $key->city_name;?></option>
                                                              <?php }                             
                                                            } ?>                            
                                                          </select>
                                                        </div>
                                                      </div> 
                                                    </div>
                                                    <div class="col-md-4">
                                                      <div class="form-group">
                                                        <label class="control-label">Education Specification <span class="require" aria-required="true" style="color:red">*</span></label>
                                                        <div class="input-icon right">
                                                          <i class="fa"></i>
                                                          <input  type="text" class="form-control " name="education_specification" value="<?php echo(isset($customer_data->education_specification) && !empty($customer_data->education_specification))?$customer_data->education_specification:''?>" placeholder=" Enter Education Specification" >
                                                          <input type="hidden" name="step" value="3">
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                      <div class="form-group">
                                                        <label class="control-label">Occupation <span class="require" aria-required="true" style="color:red">*</span></label>
                                                        <div class="input-icon right">
                                                          <i class="fa"></i>
                                                          <input  type="text" class="form-control " name="occupation" value="<?php echo(isset($customer_data->occupation) && !empty($customer_data->occupation))?$customer_data->occupation:''?>" placeholder=" Enter Occupation" >
                                                        </div>
                                                      </div>
                                                    </div>
                                                    
                                                    <div class="col-md-4">
                                                      <div class="form-group">
                                                        <label class="control-label">Income <span class="require" aria-required="true" style="color:red">*</span></label>
                                                        <div class="input-icon right">
                                                          <i class="fa"></i>
                                                          <input  type="text" class="form-control " name="income" value="<?php echo(isset($customer_data->income) && !empty($customer_data->income))?$customer_data->income:''?>" placeholder=" Enter income in PA (EX: 100000)" >
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="tab-pane " id="tab4">
                                              <div class="row">
                                                <div class="col-md-12">
                                                  <div class="row">
                                                    <div class="col-md-4">
                                                      <div class="form-group">
                                                        <label class="control-label">PAN/AAdhar/Passport NO <span class="require" aria-required="true" style="color:red">*</span></label>
                                                        <div class="input-icon right">
                                                          <i class="fa"></i>
                                                          <input  type="text" class="form-control " name="document_no" value="<?php echo(isset($customer_data->document_no) && !empty($customer_data->document_no))?$customer_data->document_no:''?>" placeholder=" Enter PAN/AAdhar/Passport NO" >
                                                          <input type="hidden" name="step" value="4">
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                      <div class="form-group">
                                                        <label class="control-label">Phone I <span class="require" aria-required="true" style="color:red">*</span></label>
                                                        <div class="input-icon right">
                                                          <i class="fa"></i>
                                                          <input  type="text" class="form-control " name="phone" value="<?php echo(isset($customer_data->phone) && !empty($customer_data->phone))?$customer_data->phone:''?>" placeholder=" Enter Phone No" >
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                      <div class="form-group">
                                                        <label class="control-label">Phone II <span class="require" aria-required="true" style="color:red">*</span></label>
                                                        <div class="input-icon right">
                                                          <i class="fa"></i>
                                                          <input  type="text" class="form-control " name="phone1" value="<?php echo(isset($customer_data->phone1) && !empty($customer_data->phone1))?$customer_data->phone1:''?>" placeholder=" Enter Phone No" >
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                       <label for="firstname" >Permanant Address <span class="require" aria-required="true" aria-required="true">*</span></label>
                                                       <textarea id="desc" rows="3" name="permanant_address" class="form-control input-sm" placeholder="Type Your address..." tabindex=""><?php echo (isset($customer_data->permanant_address) && !empty($customer_data->permanant_address))?$customer_data->permanant_address:'';?></textarea>        
                                                   </div>
                                                   <div class="col-md-6">
                                                       <label for="firstname" >Residence Address <span class="require" aria-required="true" aria-required="true">*</span></label>
                                                       <textarea id="desc" rows="3" name="residence_address" class="form-control input-sm" placeholder="Type Your address..." tabindex=""><?php echo (isset($customer_data->residence_address) && !empty($customer_data->residence_address))?$customer_data->residence_address:'';?></textarea>        
                                                   </div>
                                                  </div>
                                                </div>
                                              </div>
                                              <hr>
                                            </div>
                                            <div class="tab-pane " id="tab5">
                                              <div class="row">
                                                <div class="col-md-12">
                                                  <div class="row">
                                                    <div class="col-md-6">
                                                      <div class="form-group">
                                                        <label class="control-label">Father<span class="require" aria-required="true" style="color:red">*</span></label>
                                                        <div class=" "> 
                                                          <select class="form-control select2me " name="father">
                                                            <option value="">select</option>
                                                            <option value="Yes" <?php echo (isset($customer_data->father) && !empty($customer_data->father) && ($customer_data->father=='Yes'))?'selected="selected"':'';?>>Yes</option>
                                                            <option value="No" <?php echo (isset($customer_data->father) && !empty($customer_data->father) && ($customer_data->father=='No'))?'selected="selected"':'';?>>No</option>
                                                          </select>
                                                        </div>
                                                      </div> 
                                                    </div>
                                                    <div class="col-md-6">
                                                      <div class="form-group">
                                                        <label class="control-label">Father Full Name<span class="require" aria-required="true" style="color:red">*</span></label>
                                                        <div class="input-icon right">
                                                          <i class="fa"></i>
                                                          <input  type="text" class="form-control " name="father_full_name" value="<?php echo(isset($customer_data->father_full_name) && !empty($customer_data->father_full_name))?$customer_data->father_full_name:''?>" placeholder=" Enter Full Name " >
                                                          <input type="hidden" name="step" value="5">
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                      <div class="form-group">
                                                        <label class="control-label">Mother<span class="require" aria-required="true" style="color:red">*</span></label>
                                                        <div class=" "> 
                                                          <select class="form-control select2me " name="mother">
                                                            <option value="">select</option>
                                                            <option value="Yes" <?php echo (isset($customer_data->mother) && !empty($customer_data->mother) && ($customer_data->mother=='Yes'))?'selected="selected"':'';?>>Yes</option>
                                                            <option value="No" <?php echo (isset($customer_data->mother) && !empty($customer_data->mother) && ($customer_data->mother=='No'))?'selected="selected"':'';?>>No</option>
                                                          </select>
                                                        </div>
                                                      </div> 
                                                    </div>
                                                    <div class="col-md-6">
                                                      <div class="form-group">
                                                        <label class="control-label">Parent Residence City<span class="require" aria-required="true" style="color:red">*</span></label>
                                                        <div class=" "> 
                                                          <select class="form-control select2me " name="parent_residence_city">
                                                            <option value="">select</option>
                                                            <?php if(isset($city_data) && !empty($city_data))
                                                            {
                                                              foreach ($city_data as $key) 
                                                              { ?>
                                                                <option value="<?php echo $key->city_id?>" <?php echo (isset($customer_data->parent_residence_city) && !empty($customer_data->parent_residence_city) && ($customer_data->parent_residence_city==$key->city_id))?'selected="selected"':'';?>><?php echo $key->city_name;?></option>
                                                              <?php }                             
                                                            } ?>                            
                                                          </select>
                                                        </div>
                                                      </div> 
                                                    </div>
                                                    <div class="col-md-6">
                                                      <div class="form-group">
                                                        <label class="control-label">Brothers<span class="require" aria-required="true" style="color:red">*</span></label>
                                                        <div class=" "> 
                                                          <select class="form-control select2me " name="brothers">
                                                            <option value="0" <?php echo (isset($customer_data->brothers) && !empty($customer_data->brothers) && ($customer_data->brothers=='0'))?'selected="selected"':'';?>>0</option>
                                                            <option value="1" <?php echo (isset($customer_data->brothers) && !empty($customer_data->brothers) && ($customer_data->brothers=='1'))?'selected="selected"':'';?>>1</option>
                                                            <option value="2" <?php echo (isset($customer_data->brothers) && !empty($customer_data->brothers) && ($customer_data->brothers=='2'))?'selected="selected"':'';?>>2</option>
                                                            <option value="3" <?php echo (isset($customer_data->brothers) && !empty($customer_data->brothers) && ($customer_data->brothers=='3'))?'selected="selected"':'';?>>3</option>
                                                            <option value="4" <?php echo (isset($customer_data->brothers) && !empty($customer_data->brothers) && ($customer_data->brothers=='4'))?'selected="selected"':'';?>>4</option>
                                                            <option value="5" <?php echo (isset($customer_data->brothers) && !empty($customer_data->brothers) && ($customer_data->brothers=='5'))?'selected="selected"':'';?>>5</option>
                                                            <option value="6" <?php echo (isset($customer_data->brothers) && !empty($customer_data->brothers) && ($customer_data->brothers=='6'))?'selected="selected"':'';?>>6</option>
                                                            <option value="7" <?php echo (isset($customer_data->brothers) && !empty($customer_data->brothers) && ($customer_data->brothers=='7'))?'selected="selected"':'';?>>7</option>
                                                            <option value="8" <?php echo (isset($customer_data->brothers) && !empty($customer_data->brothers) && ($customer_data->brothers=='8'))?'selected="selected"':'';?>>8</option>
                                                            <option value="9" <?php echo (isset($customer_data->brothers) && !empty($customer_data->brothers) && ($customer_data->brothers=='9'))?'selected="selected"':'';?>>9</option>
                                                            <option value="10" <?php echo (isset($customer_data->brothers) && !empty($customer_data->brothers) && ($customer_data->brothers=='10'))?'selected="selected"':'';?>>10</option>

                                                          </select>
                                                        </div>
                                                      </div> 
                                                    </div>
                                                    <div class="col-md-6">
                                                      <div class="form-group">
                                                        <label class="control-label">Married Brothers<span class="require" aria-required="true" style="color:red">*</span></label>
                                                        <div class=" "> 
                                                          <select class="form-control select2me " name="married_brothers">
                                                            <option value="0" <?php echo (isset($customer_data->married_brothers) && !empty($customer_data->married_brothers) && ($customer_data->married_brothers=='0'))?'selected="selected"':'';?>>0</option>
                                                            <option value="1" <?php echo (isset($customer_data->married_brothers) && !empty($customer_data->married_brothers) && ($customer_data->married_brothers=='1'))?'selected="selected"':'';?>>1</option>
                                                            <option value="2" <?php echo (isset($customer_data->married_brothers) && !empty($customer_data->married_brothers) && ($customer_data->married_brothers=='2'))?'selected="selected"':'';?>>2</option>
                                                            <option value="3" <?php echo (isset($customer_data->married_brothers) && !empty($customer_data->married_brothers) && ($customer_data->married_brothers=='3'))?'selected="selected"':'';?>>3</option>
                                                            <option value="4" <?php echo (isset($customer_data->married_brothers) && !empty($customer_data->married_brothers) && ($customer_data->married_brothers=='4'))?'selected="selected"':'';?>>4</option>
                                                            <option value="5" <?php echo (isset($customer_data->married_brothers) && !empty($customer_data->married_brothers) && ($customer_data->married_brothers=='5'))?'selected="selected"':'';?>>5</option>
                                                            <option value="6" <?php echo (isset($customer_data->married_brothers) && !empty($customer_data->married_brothers) && ($customer_data->married_brothers=='6'))?'selected="selected"':'';?>>6</option>
                                                            <option value="7" <?php echo (isset($customer_data->married_brothers) && !empty($customer_data->married_brothers) && ($customer_data->married_brothers=='7'))?'selected="selected"':'';?>>7</option>
                                                            <option value="8" <?php echo (isset($customer_data->married_brothers) && !empty($customer_data->married_brothers) && ($customer_data->married_brothers=='8'))?'selected="selected"':'';?>>8</option>
                                                            <option value="9" <?php echo (isset($customer_data->married_brothers) && !empty($customer_data->married_brothers) && ($customer_data->married_brothers=='9'))?'selected="selected"':'';?>>9</option>
                                                            <option value="10" <?php echo (isset($customer_data->married_brothers) && !empty($customer_data->married_brothers) && ($customer_data->married_brothers=='10'))?'selected="selected"':'';?>>10</option>
                                                          </select>
                                                        </div>
                                                      </div> 
                                                    </div>
                                                    <div class="col-md-6">
                                                      <div class="form-group">
                                                        <label class="control-label">Sisters<span class="require" aria-required="true" style="color:red">*</span></label>
                                                        <div class=" "> 
                                                          <select class="form-control select2me " name="sisters">
                                                            <option value="0" <?php echo (isset($customer_data->sisters) && !empty($customer_data->sisters) && ($customer_data->sisters=='0'))?'selected="selected"':'';?>>0</option>
                                                            <option value="1" <?php echo (isset($customer_data->sisters) && !empty($customer_data->sisters) && ($customer_data->sisters=='1'))?'selected="selected"':'';?>>1</option>
                                                            <option value="2" <?php echo (isset($customer_data->sisters) && !empty($customer_data->sisters) && ($customer_data->sisters=='2'))?'selected="selected"':'';?>>2</option>
                                                            <option value="3" <?php echo (isset($customer_data->sisters) && !empty($customer_data->sisters) && ($customer_data->sisters=='3'))?'selected="selected"':'';?>>3</option>
                                                            <option value="4" <?php echo (isset($customer_data->sisters) && !empty($customer_data->sisters) && ($customer_data->sisters=='4'))?'selected="selected"':'';?>>4</option>
                                                            <option value="5" <?php echo (isset($customer_data->sisters) && !empty($customer_data->sisters) && ($customer_data->sisters=='5'))?'selected="selected"':'';?>>5</option>
                                                            <option value="6" <?php echo (isset($customer_data->sisters) && !empty($customer_data->sisters) && ($customer_data->sisters=='6'))?'selected="selected"':'';?>>6</option>
                                                            <option value="7" <?php echo (isset($customer_data->sisters) && !empty($customer_data->sisters) && ($customer_data->sisters=='7'))?'selected="selected"':'';?>>7</option>
                                                            <option value="8" <?php echo (isset($customer_data->sisters) && !empty($customer_data->sisters) && ($customer_data->sisters=='8'))?'selected="selected"':'';?>>8</option>
                                                            <option value="9" <?php echo (isset($customer_data->sisters) && !empty($customer_data->sisters) && ($customer_data->sisters=='9'))?'selected="selected"':'';?>>9</option>
                                                            <option value="10" <?php echo (isset($customer_data->sisters) && !empty($customer_data->sisters) && ($customer_data->sisters=='10'))?'selected="selected"':'';?>>10</option>
                                                          </select>
                                                        </div>
                                                      </div> 
                                                    </div>
                                                    <div class="col-md-6">
                                                      <div class="form-group">
                                                        <label class="control-label">Married Sisters<span class="require" aria-required="true" style="color:red">*</span></label>
                                                        <div class=" "> 
                                                          <select class="form-control select2me " name="married_sisters">
                                                            <option value="0" <?php echo (isset($customer_data->married_sisters) && !empty($customer_data->married_sisters) && ($customer_data->married_sisters=='0'))?'selected="selected"':'';?>>0</option>
                                                            <option value="1" <?php echo (isset($customer_data->married_sisters) && !empty($customer_data->married_sisters) && ($customer_data->married_sisters=='1'))?'selected="selected"':'';?>>1</option>
                                                            <option value="2" <?php echo (isset($customer_data->married_sisters) && !empty($customer_data->married_sisters) && ($customer_data->married_sisters=='2'))?'selected="selected"':'';?>>2</option>
                                                            <option value="3" <?php echo (isset($customer_data->married_sisters) && !empty($customer_data->married_sisters) && ($customer_data->married_sisters=='3'))?'selected="selected"':'';?>>3</option>
                                                            <option value="4" <?php echo (isset($customer_data->married_sisters) && !empty($customer_data->married_sisters) && ($customer_data->married_brothers=='4'))?'selected="selected"':'';?>>4</option>
                                                            <option value="5" <?php echo (isset($customer_data->married_sisters) && !empty($customer_data->married_sisters) && ($customer_data->married_sisters=='5'))?'selected="selected"':'';?>>5</option>
                                                            <option value="6" <?php echo (isset($customer_data->married_sisters) && !empty($customer_data->married_sisters) && ($customer_data->married_sisters=='6'))?'selected="selected"':'';?>>6</option>
                                                            <option value="7" <?php echo (isset($customer_data->married_sisters) && !empty($customer_data->married_sisters) && ($customer_data->married_sisters=='7'))?'selected="selected"':'';?>>7</option>
                                                            <option value="8" <?php echo (isset($customer_data->married_sisters) && !empty($customer_data->married_sisters) && ($customer_data->married_sisters=='8'))?'selected="selected"':'';?>>8</option>
                                                            <option value="9" <?php echo (isset($customer_data->married_sisters) && !empty($customer_data->married_sisters) && ($customer_data->married_sisters=='9'))?'selected="selected"':'';?>>9</option>
                                                            <option value="10" <?php echo (isset($customer_data->married_sisters) && !empty($customer_data->married_sisters) && ($customer_data->married_sisters=='10'))?'selected="selected"':'';?>>10</option>
                                                          </select>
                                                        </div>
                                                      </div> 
                                                    </div>
                                                    <div class="col-md-6">
                                                      <div class="form-group">
                                                        <label class="control-label">Native District<span class="require" aria-required="true" style="color:red">*</span></label>
                                                        <div class=" "> 
                                                          <select class="form-control select2me " name="native_district">
                                                            <option value="">select</option>
                                                            <?php if(isset($district_data) && !empty($district_data))
                                                            {
                                                              foreach ($district_data as $key) 
                                                              { ?>
                                                                <option value="<?php echo $key->city_id?>" <?php echo (isset($customer_data->native_district) && !empty($customer_data->native_district) && ($customer_data->native_district==$key->city_id))?'selected="selected"':'';?>><?php echo $key->city_name;?></option>
                                                              <?php }                             
                                                            } ?>                            
                                                          </select>
                                                        </div>
                                                      </div> 
                                                    </div>
                                                    <div class="col-md-6">
                                                      <div class="form-group">
                                                        <label class="control-label">Native City<span class="require" aria-required="true" style="color:red">*</span></label>
                                                        <div class=" "> 
                                                          <select class="form-control select2me " name="native_city">
                                                            <option value="">select</option>
                                                            <?php if(isset($district_data) && !empty($district_data))
                                                            {
                                                              foreach ($district_data as $key) 
                                                              { ?>
                                                                <option value="<?php echo $key->city_id?>" <?php echo (isset($customer_data->native_city) && !empty($customer_data->native_city) && ($customer_data->native_city==$key->city_id))?'selected="selected"':'';?>><?php echo $key->city_name;?></option>
                                                              <?php }                             
                                                            } ?>                            
                                                          </select>
                                                        </div>
                                                      </div> 
                                                    </div>
                                                    <div class="col-md-6">
                                                      <div class="form-group">
                                                        <label class="control-label">Relative Surname<span class="require" aria-required="true" style="color:red">*</span></label>
                                                        <div class="input-icon right">
                                                          <i class="fa"></i>
                                                          <input  type="text" class="form-control " name="relative_surname" value="<?php echo(isset($customer_data->relative_surname) && !empty($customer_data->relative_surname))?$customer_data->relative_surname:''?>" placeholder=" Enter Relative Surname" >
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                      <div class="form-group">
                                                        <label class="control-label">Parent Occupation<span class="require" aria-required="true" style="color:red">*</span></label>
                                                        <div class="input-icon right">
                                                          <i class="fa"></i>
                                                          <input  type="text" class="form-control " name="parent_occupation" value="<?php echo(isset($customer_data->parent_occupation) && !empty($customer_data->parent_occupation))?$customer_data->parent_occupation:''?>" placeholder=" Enter Parent Occupation" >
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                      <div class="form-group">
                                                        <label class="control-label">Mama Surname<span class="require" aria-required="true" style="color:red">*</span></label>
                                                        <div class="input-icon right">
                                                          <i class="fa"></i>
                                                          <input  type="text" class="form-control " name="mama_surname" value="<?php echo(isset($customer_data->mama_surname) && !empty($customer_data->mama_surname))?$customer_data->mama_surname:''?>" placeholder=" Enter Mama Surname" >
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                      <div class="form-group">
                                                        <label class="control-label">Family Wealth<span class="require" aria-required="true" style="color:red">*</span></label>
                                                        <div class="input-icon right">
                                                          <i class="fa"></i>
                                                          <input  type="text" class="form-control " name="family_wealth" value="<?php echo(isset($customer_data->family_wealth) && !empty($customer_data->family_wealth))?$customer_data->family_wealth:''?>" placeholder=" Enter Family Wealth" >
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                      <div class="form-group">
                                                        <label class="control-label">Any Intercast Marriage In Core Family<span class="require" aria-required="true" style="color:red">*</span></label>
                                                        <div class=" "> 
                                                          <select class="form-control select2me " name="any_intercast_marriage">
                                                            <option value="">select</option>
                                                            <option value="Yes" <?php echo (isset($customer_data->any_intercast_marriage) && !empty($customer_data->any_intercast_marriage) && ($customer_data->any_intercast_marriage=='Yes'))?'selected="selected"':'';?>>Yes</option>
                                                            <option value="No" <?php echo (isset($customer_data->any_intercast_marriage) && !empty($customer_data->any_intercast_marriage) && ($customer_data->any_intercast_marriage=='No'))?'selected="selected"':'';?>>No</option>
                                                          </select>
                                                        </div>
                                                      </div> 
                                                    </div>
                                                    <div class="col-md-6">
                                                      <div class="form-group">
                                                        <label class="control-label">If Yes (Relation/Cast)<span class="require" aria-required="true" style="color:red">*</span></label>
                                                        <div class="input-icon right">
                                                          <i class="fa"></i>
                                                          <input  type="text" class="form-control " name="relation_cast" value="<?php echo(isset($customer_data->relation_cast) && !empty($customer_data->relation_cast))?$customer_data->relation_cast:''?>" placeholder=" Enter Relation/Cast" >
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                            <div class="tab-pane " id="tab6">
                                              <div class="row">
                                                <div class="col-md-12">
                                                  <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                          <label class="control-label">Mangal<span class="require" aria-required="true" style="color:red">*</span></label>
                                                          <div class=" "> 
                                                            <select class="form-control select2me " name="expected_mangal">
                                                              <option value="">select</option>
                                                              <?php if(isset($mangal_data) && !empty($mangal_data))
                                                              {
                                                                foreach ($mangal_data as $key) 
                                                                { ?>
                                                                  <option value="<?php echo $key->mangal_id?>" <?php echo (isset($customer_data->expected_mangal) && !empty($customer_data->expected_mangal) && ($customer_data->expected_mangal==$key->mangal_id))?'selected="selected"':'';?>><?php echo $key->mangal_name;?></option>
                                                                <?php }                             
                                                              } ?>                            
                                                            </select>
                                                          </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                          <label class="control-label">Expecteed caste<span class="require" aria-required="true" style="color:red">*</span></label>
                                                          <div class=" "> 
                                                            <select class="form-control select2me " name="expected_cast">
                                                              <option value="">select</option>
                                                              <?php if(isset($cast_data) && !empty($cast_data))
                                                              {
                                                                foreach ($cast_data as $key) 
                                                                { ?>
                                                                  <option value="<?php echo $key->cast_id?>" <?php echo (isset($customer_data->expected_cast) && !empty($customer_data->expected_cast) && ($customer_data->expected_cast==$key->cast_id))?'selected="selected"':'';?>><?php echo $key->cast_name;?></option>
                                                                <?php }                             
                                                              } ?>                            
                                                            </select>
                                                          </div>
                                                        </div> 
                                                    </div>
                                                    <!-- <div class="col-md-6">
                                                        <div class="form-group">
                                                          <label class="control-label">Preferred City<span class="require" aria-required="true" style="color:red">*</span></label>
                                                          <div class=" "> 
                                                            <select class="form-control select2me " name="preffered_city">
                                                              <option value="">select</option>
                                                              <?php if(isset($city_data) && !empty($city_data))
                                                              {
                                                                foreach ($city_data as $key) 
                                                                { ?>
                                                                  <option value="<?php echo $key->city_id?>" <?php echo (isset($customer_data->preffered_city) && !empty($customer_data->preffered_city) && ($customer_data->preffered_city==$key->city_id))?'selected="selected"':'';?>><?php echo $key->city_name;?></option>
                                                                <?php }                             
                                                              } ?>                            
                                                            </select>
                                                          </div>
                                                        </div> 
                                                    </div> -->
                                                    <div class="col-md-6">
                                                      <div class="form-group">
                                                        <label class="control-label">Preferred City<span class="require" aria-required="true" style="color:red">*</span></label>
                                                        <div class=" "> 
                                                          <select class="form-control select2me " name=" preffered_city[] " data-placeholder="Choose preffered city" multiple>
                                                            <option value="">Select City</option>
                                                            <?php if(isset($city_data) && !empty($city_data))
                                                            {
                                                              foreach($city_data AS $key)
                                                              { 
                                                                $flag=0;
                                                                if(isset($customer_data->preffered_city) && !empty($customer_data->preffered_city))
                                                                {
                                                                  
                                                                  $preffered_city=explode(',',$customer_data->preffered_city);
                                                                  foreach ($preffered_city as $row) {
                                                                    if($row==$key->city_id)
                                                                    {
                                                                      $flag=1;
                                                                      break;
                                                                    }
                                                                  }
                                                                } ?>
                                                                <option value="<?php echo $key->city_id?>" <?php echo ($flag)?'selected="selected"':'';?>><?php echo $key->city_name;?></option>
                                                              <?php } 
                                                            }?>
                                                          </select>
                                                        </div>
                                                      </div> 
                                                    </div>
                                                    <div class="col-md-6">
                                                      <div class="form-group">
                                                        <label class="control-label">Expected Age Difference<span class="require" aria-required="true" style="color:red">*</span></label>
                                                        <div class=" "> 
                                                          <select class="form-control select2me " name="age_difference">
                                                            <option value="">select</option>
                                                            <option value="0" <?php echo (isset($customer_data->age_difference) && !empty($customer_data->age_difference) && ($customer_data->age_difference=='0'))?'selected="selected"':'';?>>0</option>
                                                            <option value="1" <?php echo (isset($customer_data->age_difference) && !empty($customer_data->age_difference) && ($customer_data->age_difference=='1'))?'selected="selected"':'';?>>1</option>
                                                            <option value="2" <?php echo (isset($customer_data->age_difference) && !empty($customer_data->age_difference) && ($customer_data->age_difference=='2'))?'selected="selected"':'';?>>2</option>
                                                            <option value="3" <?php echo (isset($customer_data->age_difference) && !empty($customer_data->age_difference) && ($customer_data->age_difference=='3'))?'selected="selected"':'';?>>3</option>
                                                            <option value="4" <?php echo (isset($customer_data->age_difference) && !empty($customer_data->age_difference) && ($customer_data->age_difference=='4'))?'selected="selected"':'';?>>4</option>
                                                            <option value="5" <?php echo (isset($customer_data->age_difference) && !empty($customer_data->age_difference) && ($customer_data->age_difference=='5'))?'selected="selected"':'';?>>5</option>
                                                            <option value="6" <?php echo (isset($customer_data->age_difference) && !empty($customer_data->age_difference) && ($customer_data->age_difference=='6'))?'selected="selected"':'';?>>6</option>
                                                            <option value="7" <?php echo (isset($customer_data->age_difference) && !empty($customer_data->age_difference) && ($customer_data->age_difference=='7'))?'selected="selected"':'';?>>7</option>
                                                            <option value="8" <?php echo (isset($customer_data->age_difference) && !empty($customer_data->age_difference) && ($customer_data->age_difference=='8'))?'selected="selected"':'';?>>8</option>
                                                            <option value="9" <?php echo (isset($customer_data->age_difference) && !empty($customer_data->age_difference) && ($customer_data->age_difference=='9'))?'selected="selected"':'';?>>9</option>
                                                            <option value="10" <?php echo (isset($customer_data->age_difference) && !empty($customer_data->age_difference) && ($customer_data->age_difference=='10'))?'selected="selected"':'';?>>10</option>
                                                          </select>
                                                        </div>
                                                      </div> 
                                                    </div>
                                                     <div class="col-md-6">
                                                        <div class="form-group">
                                                          <label class="control-label">Expecteed Education<span class="require" aria-required="true" style="color:red">*</span></label>
                                                          <div class=" "> 
                                                            <select class="form-control select2me " name="expected_education">
                                                              <option value="">select</option>
                                                              <?php if(isset($education_data) && !empty($education_data))
                                                              {
                                                                foreach ($education_data as $key) 
                                                                { ?>
                                                                  <option value="<?php echo $key->education_id?>" <?php echo (isset($customer_data->expected_education) && !empty($customer_data->expected_education) && ($customer_data->expected_education==$key->education_id))?'selected="selected"':'';?>><?php echo $key->education_name;?></option>
                                                                <?php }                             
                                                              } ?>                            
                                                            </select>
                                                          </div>
                                                        </div> 
                                                    </div>
                                                    <div class="col-md-6">
                                                      <div class="form-group">
                                                        <div class="radio-list" >
                                                          <label>Divorcee<span class="require" aria-required="true" style="color:red">*</span></label>
                                                          <label class="radio-inline">
                                                            <input type="radio" name="divorcee" id="male" value="Yes"   <?php echo (isset($customer_data->divorcee) && !empty($customer_data->divorcee) && ($customer_data->divorcee=='Yes'))?'selected="selected"':'';?>> Yes 
                                                          </label>
                                                          <label class="radio-inline">
                                                            <input type="radio" name="divorcee" id="female" value="No" <?php echo(!isset($employee_data->divorcee))?'checked':'' ?> <?php echo (isset($customer_data->divorcee) && !empty($customer_data->divorcee) && ($customer_data->divorcee=='No'))?'selected="selected"':'';?>> No
                                                          </label>
                                                        </div>
                                                      </div>
                                                      <br>
                                                    </div>
                                                     <div class="col-md-6">
                                                      <div class="form-group">
                                                        <label class="control-label">Expected Height <span class="require" aria-required="true" style="color:red">*</span></label>
                                                        <div class="input-icon right">
                                                          <i class="fa"></i>
                                                          <input  type="text" class="form-control " name="expected_height" value="<?php echo(isset($customer_data->expected_height) && !empty($customer_data->expected_height))?$customer_data->expected_height:''?>" placeholder=" Expected Height (eg 5.6)" >
                                                          <input type="hidden" name="step" value="6">
                                                        </div>
                                                      </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                      <div class="form-group">
                                                        <label class="control-label">Expected Income Per Annum <span class="require" aria-required="true" style="color:red">*</span></label>
                                                        <div class="input-icon right">
                                                          <i class="fa"></i>
                                                          <input  type="text" class="form-control " name="expected_income_per_annum" value="<?php echo(isset($customer_data->expected_income_per_annum) && !empty($customer_data->expected_income_per_annum))?$customer_data->expected_income_per_annum:''?>" placeholder=" Expected Income (eg 300000)" >
                                                        </div>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                        <div class="form-actions right">
                                          <div class="row">
                                            <div class="col-md-offset-3 col-md-9">
                                              <a href="javascript:;" class="btn default button-previous">
                                              <i class="m-icon-swapleft"></i> Back </a>
                                              <a href="javascript:;" class="btn blue button-next" id="<?php echo  isset($customer_data->customer_id) && !empty($customer_data->customer_id)?$customer_data->customer_id :'0';?>">
                                              Continue <i class="m-icon-swapright m-icon-white"></i>
                                              </a>
                                              <a href="javascript:;" class="btn green button-submit"  id="<?php echo  isset($customer_data->customer_id) && !empty($customer_data->customer_id)?$customer_data->customer_id :'0';?>">
                                               <?php if(isset($customer_data->customer_id) && !empty($customer_data->customer_id))
                                                { 
                                                    echo 'Update';
                                                }
                                                else
                                                {
                                                    echo 'Submit';
                                                }?>
                                                <i class="m-icon-swapright m-icon-white"></i>
                                              </a>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </form>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </section>
                        <?php } ?>
                      </div>
                      <div class="tab-pane  " id="#tab_1_2">
                        <ul class="nav nav-tabs">
                          <li class="active">
                              <a href="#tab_2_1" data-toggle="tab">
                             Incoming Request </a>
                          </li>
                          <li class="">
                              <a href="#tab_2_2" data-toggle="tab">
                              Accepted Request </a>
                          </li>
                          <li class="">
                              <a href="#tab_2_3" data-toggle="tab">
                              Rejected Request </a>
                          </li>
                          <li class="">
                              <a href="#tab_2_4" data-toggle="tab">
                              Blocked Request </a>
                          </li>
                          <li class="">
                              <a href="#tab_2_5" data-toggle="tab">
                             Sent Request </a>
                          </li>
                        </ul>
                        <div class="tab-content">
                           <div class="tab-pane active" id="tab_2_1">
                              <?php if(isset($incoming_request_data) && !empty($incoming_request_data))
                              { ?> 
                                <div class="portlet box red">
                                  <div class="portlet-title">
                                    <div class="caption">
                                      <i class="fa fa-gift"></i>Incoming Request
                                    </div> 
                                  </div> 
                                  <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover masterTable" >
                                      <thead>
                                        <tr class="heading">
                                          <th scope="col">Sr.no</th>
                                          <th scope="col"> Photo</th>
                                          <th scope="col"> Profile Code</th>
                                          <th scope="col"> DOB</th> 
                                          <th scope="col"> Age</th> 
                                          <th scope="col"> Caste</th> 
                                          <th scope="col"> Marital Status</th> 
                                          <th scope="col"> Occupation</th> 
                                          <th scope="col"> Action</th>
                                        </tr>
                                      </thead>
                                      <tbody> 
                                        <?php $i = 1;
                                          foreach ($incoming_request_data as $key) { ?>
                                            <tr class="odd gradeX">
                                              <td><?php echo $i++;?></td>
                                              <td class="abc">
                                                <img style="width: 50px; height: 50px;" src="./uploads/customer_photo/<?php echo (isset($cust_data->customer_photo) && !empty($cust_data->customer_photo))?$cust_data->customer_photo:'user.png';?>">
                                              </td>
                                              <td><?php echo (isset($key->profile_code) && !empty($key->profile_code))?$key->profile_code:'-'; ?></td>
                                              <td><?php echo (isset($key->dob) && !empty($key->dob))?date('d-m-Y',strtotime($key->dob)):'-'; ?></td>
                                              <td><?php echo (isset($key->age) && !empty($key->age))?$key->age:'-'; ?></td>
                                              <td><?php echo (isset($key->cast_name) && !empty($key->cast_name))?$key->cast_name:'-'; ?></td>
                                              <td><?php echo (isset($key->marital_name) && !empty($key->marital_name))?$key->marital_name:'-'; ?></td>
                                              <td><?php echo (isset($key->occupation) && !empty($key->occupation))?$key->occupation:'-'; ?></td>
                                             <td align="center">
                                                 <a class="btn btn-success btn-xs " href="<?php echo base_url();?>profile_details/<?php echo (isset($key->customer_id) && !empty($key->customer_id))?$key->customer_id:'';?>"><i class="fa fa-search" aria-hidden="true"></i> View</a>
                                                <a class="btn btn-primary btn-xs tooltips send_request" rev="accept_request" rel="<?php echo(isset($key->request_id) && !empty($key->request_id))?$key->request_id:''?>" data-original-title="Delete Record" data-placement="top" href="javascript:void(0);"><i class="fa fa-check" aria-hidden="true"></i> Accept</a>
                                                <a class="btn btn-danger btn-xs tooltips send_request" rev="reject_request" rel="<?php echo(isset($key->request_id) && !empty($key->request_id))?$key->request_id:''?>" data-original-title="Delete Record" data-placement="top" href="javascript:void(0);"><i class="fa fa-check" aria-hidden="true"></i> Reject</a>
                                              </td>
                                            </tr>
                                          <?php } ?>
                                      </tbody>
                                    </table>
                                  </div>
                                </div>
                              <?php } 
                              else
                              { ?>
                                <center><img src="<?php echo base_url();?>images/index.jpg" style="width: 200px;height: 200px;margin-top: 50px; opacity: 0.20;"><br><h3><b style="color: rgb(206, 206, 206);">No Record Found...!</b></h3></center>
                              <?php } ?>
                           </div>
                           <div class="tab-pane " id="tab_2_2">
                              <?php if(isset($accepted_request_data) && !empty($accepted_request_data))
                              { ?> 
                                <div class="portlet box red">
                                  <div class="portlet-title">
                                    <div class="caption">
                                      <i class="fa fa-gift"></i>Accepted Request
                                    </div> 
                                  </div> 
                                  <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover masterTable" >
                                      <thead>
                                        <tr class="heading">
                                          <th scope="col">Sr.no</th>
                                          <th scope="col"> Photo</th>
                                          <th scope="col"> Profile Code</th>
                                          <th scope="col"> DOB</th> 
                                          <th scope="col"> Age</th> 
                                          <th scope="col"> Caste</th> 
                                          <th scope="col"> Marital Status</th> 
                                          <th scope="col"> Occupation</th> 
                                          <th scope="col"> Action</th>
                                        </tr>
                                      </thead>
                                      <tbody> 
                                        <?php $i = 1;
                                          foreach ($accepted_request_data as $key) { ?>
                                            <tr class="odd gradeX">
                                              <td><?php echo $i++;?></td>
                                              <td class="abc">
                                                <img style="width: 50px; height: 50px;" src="./uploads/customer_photo/<?php echo (isset($cust_data->customer_photo) && !empty($cust_data->customer_photo))?$cust_data->customer_photo:'user.png';?>">
                                              </td>
                                              <td><?php echo (isset($key->profile_code) && !empty($key->profile_code))?$key->profile_code:'-'; ?></td>
                                              <td><?php echo (isset($key->dob) && !empty($key->dob))?date('d-m-Y',strtotime($key->dob)):'-'; ?></td>
                                              <td><?php echo (isset($key->age) && !empty($key->age))?$key->age:'-'; ?></td>
                                              <td><?php echo (isset($key->cast_name) && !empty($key->cast_name))?$key->cast_name:'-'; ?></td>
                                              <td><?php echo (isset($key->marital_name) && !empty($key->marital_name))?$key->marital_name:'-'; ?></td>
                                              <td><?php echo (isset($key->occupation) && !empty($key->occupation))?$key->occupation:'-'; ?></td>
                                             <td align="center">
                                                 <a class="btn btn-success btn-xs " href="<?php echo base_url();?>profile_details/<?php echo (isset($key->customer_id) && !empty($key->customer_id))?$key->customer_id:'';?>"><i class="fa fa-search" aria-hidden="true"></i> View</a>
                                                <a class="btn btn-danger btn-xs tooltips send_request" rev="reject_request" rel="<?php echo(isset($key->request_id) && !empty($key->request_id))?$key->request_id:''?>" data-original-title="Delete Record" data-placement="top" href="javascript:void(0);"><i class="fa fa-check" aria-hidden="true"></i> Reject</a>
                                                 <a class="btn btn-primary btn-xs tooltips " href="<?php echo base_url();?>chat_details/<?php echo (isset($key->customer_id) && !empty($key->customer_id))?$key->customer_id:'';?>" target="_blank"><i class="fa fa-comments-o" aria-hidden="true"></i> Chat</a>
                                              </td>
                                            </tr>
                                          <?php } ?>
                                      </tbody>
                                    </table>
                                  </div>
                                </div>
                              <?php } 
                              else
                              { ?>
                                <center><img src="<?php echo base_url();?>images/index.jpg" style="width: 200px;height: 200px;margin-top: 50px; opacity: 0.20;"><br><h3><b style="color: rgb(206, 206, 206);">No Record Found...!</b></h3></center>
                              <?php } ?>
                           </div>
                           <div class="tab-pane " id="tab_2_3">
                              <?php if(isset($rejected_request_data) && !empty($rejected_request_data))
                              { ?> 
                                <div class="portlet box red">
                                  <div class="portlet-title">
                                    <div class="caption">
                                      <i class="fa fa-gift"></i>Rejected Request
                                    </div> 
                                  </div> 
                                  <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover masterTable" >
                                      <thead>
                                        <tr class="heading">
                                          <th scope="col">Sr.no</th>
                                          <th scope="col"> Photo</th>
                                          <th scope="col"> Profile Code</th>
                                          <th scope="col"> DOB</th> 
                                          <th scope="col"> Age</th> 
                                          <th scope="col"> Caste</th> 
                                          <th scope="col"> Marital Status</th> 
                                          <th scope="col"> Occupation</th> 
                                          <th scope="col"> Action</th>
                                        </tr>
                                      </thead>
                                      <tbody> 
                                        <?php $i = 1;
                                          foreach ($rejected_request_data as $key) { ?>
                                            <tr class="odd gradeX">
                                              <td><?php echo $i++;?></td>
                                              <td class="abc">
                                                <img style="width: 50px; height: 50px;" src="./uploads/customer_photo/<?php echo (isset($cust_data->customer_photo) && !empty($cust_data->customer_photo))?$cust_data->customer_photo:'user.png';?>">
                                              </td>
                                              <td><?php echo (isset($key->profile_code) && !empty($key->profile_code))?$key->profile_code:'-'; ?></td>
                                              <td><?php echo (isset($key->dob) && !empty($key->dob))?date('d-m-Y',strtotime($key->dob)):'-'; ?></td>
                                              <td><?php echo (isset($key->age) && !empty($key->age))?$key->age:'-'; ?></td>
                                              <td><?php echo (isset($key->cast_name) && !empty($key->cast_name))?$key->cast_name:'-'; ?></td>
                                              <td><?php echo (isset($key->marital_name) && !empty($key->marital_name))?$key->marital_name:'-'; ?></td>
                                              <td><?php echo (isset($key->occupation) && !empty($key->occupation))?$key->occupation:'-'; ?></td>
                                             <td align="center">
                                                 <a class="btn btn-success btn-xs " href="<?php echo base_url();?>profile_details/<?php echo (isset($key->customer_id) && !empty($key->customer_id))?$key->customer_id:'';?>"><i class="fa fa-search" aria-hidden="true"></i> View</a>
                                                <a class="btn btn-primary btn-xs tooltips send_request" rev="accept_request" rel="<?php echo(isset($key->request_id) && !empty($key->request_id))?$key->request_id:''?>" data-original-title="Delete Record" data-placement="top" href="javascript:void(0);"><i class="fa fa-check" aria-hidden="true"></i> Accept</a>
                                              </td>
                                            </tr>
                                          <?php } ?>
                                      </tbody>
                                    </table>
                                  </div>
                                </div>
                              <?php } 
                              else
                              { ?>
                                <center><img src="<?php echo base_url();?>images/index.jpg" style="width: 200px;height: 200px;margin-top: 50px; opacity: 0.20;"><br><h3><b style="color: rgb(206, 206, 206);">No Record Found...!</b></h3></center>
                              <?php } ?>
                           </div>
                           <div class="tab-pane " id="tab_2_4">
                              <?php if(isset($blocked_request_data) && !empty($blocked_request_data))
                              { ?> 
                                <div class="portlet box red">
                                  <div class="portlet-title">
                                    <div class="caption">
                                      <i class="fa fa-gift"></i>Blocked Request
                                    </div> 
                                  </div> 
                                  <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover masterTable" >
                                      <thead>
                                        <tr class="heading">
                                          <th scope="col">Sr.no</th>
                                          <th scope="col"> Photo</th>
                                          <th scope="col"> Profile Code</th>
                                          <th scope="col"> DOB</th> 
                                          <th scope="col"> Age</th> 
                                          <th scope="col"> Caste</th> 
                                          <th scope="col"> Marital Status</th> 
                                          <th scope="col"> Occupation</th> 
                                          <th scope="col"> Action</th>
                                        </tr>
                                      </thead>
                                      <tbody> 
                                        <?php $i = 1;
                                          foreach ($blocked_request_data as $key) { ?>
                                            <tr class="odd gradeX">
                                              <td><?php echo $i++;?></td>
                                              <td class="abc">
                                                <img style="width: 50px; height: 50px;" src="./uploads/customer_photo/<?php echo (isset($cust_data->customer_photo) && !empty($cust_data->customer_photo))?$cust_data->customer_photo:'user.png';?>">
                                              </td>
                                              <td><?php echo (isset($key->profile_code) && !empty($key->profile_code))?$key->profile_code:'-'; ?></td>
                                              <td><?php echo (isset($key->dob) && !empty($key->dob))?date('d-m-Y',strtotime($key->dob)):'-'; ?></td>
                                              <td><?php echo (isset($key->age) && !empty($key->age))?$key->age:'-'; ?></td>
                                              <td><?php echo (isset($key->cast_name) && !empty($key->cast_name))?$key->cast_name:'-'; ?></td>
                                              <td><?php echo (isset($key->marital_name) && !empty($key->marital_name))?$key->marital_name:'-'; ?></td>
                                              <td><?php echo (isset($key->occupation) && !empty($key->occupation))?$key->occupation:'-'; ?></td>
                                             <td align="center">
                                                 <a class="btn btn-success btn-xs " href="<?php echo base_url();?>profile_details/<?php echo (isset($key->customer_id) && !empty($key->customer_id))?$key->customer_id:'';?>"><i class="fa fa-search" aria-hidden="true"></i> View</a>
                                                <a class="btn btn-primary btn-xs tooltips send_request" rev="accept_request" rel="<?php echo(isset($key->request_id) && !empty($key->request_id))?$key->request_id:''?>" data-original-title="Delete Record" data-placement="top" href="javascript:void(0);"><i class="fa fa-check" aria-hidden="true"></i> Accept</a>
                                              </td>
                                            </tr>
                                          <?php } ?>
                                      </tbody>
                                    </table>
                                  </div>
                                </div>
                              <?php } 
                              else
                              { ?>
                                <center><img src="<?php echo base_url();?>images/index.jpg" style="width: 200px;height: 200px;margin-top: 50px; opacity: 0.20;"><br><h3><b style="color: rgb(206, 206, 206);">No Record Found...!</b></h3></center>
                              <?php } ?>
                           </div>
                           <div class="tab-pane " id="tab_2_5">
                              <?php if(isset($sent_request_data) && !empty($sent_request_data))
                              { ?> 
                                <div class="portlet box red">
                                  <div class="portlet-title">
                                    <div class="caption">
                                      <i class="fa fa-gift"></i>Sent Request
                                    </div> 
                                  </div> 
                                  <div class="portlet-body">
                                    <table class="table table-striped table-bordered table-hover masterTable" >
                                      <thead>
                                        <tr class="heading">
                                          <th scope="col">Sr.no</th>
                                          <th scope="col"> Photo</th>
                                          <th scope="col"> Profile Code</th>
                                          <th scope="col"> DOB</th> 
                                          <th scope="col"> Age</th> 
                                          <th scope="col"> Caste</th> 
                                          <th scope="col"> Marital Status</th> 
                                          <th scope="col"> Occupation</th> 
                                          <th scope="col"> Action</th>
                                        </tr>
                                      </thead>
                                      <tbody> 
                                        <?php $i = 1;
                                          foreach ($sent_request_data as $key) { ?>
                                            <tr class="odd gradeX">
                                              <td><?php echo $i++;?></td>
                                              <td class="abc">
                                                <img style="width: 50px; height: 50px;" src="./uploads/customer_photo/<?php echo (isset($cust_data->customer_photo) && !empty($cust_data->customer_photo))?$cust_data->customer_photo:'user.png';?>">
                                              </td>
                                              <td><?php echo (isset($key->profile_code) && !empty($key->profile_code))?$key->profile_code:'-'; ?></td>
                                              <td><?php echo (isset($key->dob) && !empty($key->dob))?date('d-m-Y',strtotime($key->dob)):'-'; ?></td>
                                              <td><?php echo (isset($key->age) && !empty($key->age))?$key->age:'-'; ?></td>
                                              <td><?php echo (isset($key->cast_name) && !empty($key->cast_name))?$key->cast_name:'-'; ?></td>
                                              <td><?php echo (isset($key->marital_name) && !empty($key->marital_name))?$key->marital_name:'-'; ?></td>
                                              <td><?php echo (isset($key->occupation) && !empty($key->occupation))?$key->occupation:'-'; ?></td>
                                             <td align="center">
                                                 <a class="btn btn-success btn-xs " href="<?php echo base_url();?>profile_details/<?php echo (isset($key->customer_id) && !empty($key->customer_id))?$key->customer_id:'';?>"><i class="fa fa-search" aria-hidden="true"></i> View</a>
                                                <a class="btn btn-primary btn-xs tooltips send_request" rev="cancel_request" rel="<?php echo(isset($key->request_id) && !empty($key->request_id))?$key->request_id:''?>" data-original-title="Delete Record" data-placement="top" href="javascript:void(0);"><i class="fa fa-check" aria-hidden="true"></i> Cancel</a>
                                              </td>
                                            </tr>
                                          <?php } ?>
                                      </tbody>
                                    </table>
                                  </div>
                                </div>
                              <?php } 
                              else
                              { ?>
                                <center><img src="<?php echo base_url();?>images/index.jpg" style="width: 200px;height: 200px;margin-top: 50px; opacity: 0.20;"><br><h3><b style="color: rgb(206, 206, 206);">No Record Found...!</b></h3></center>
                              <?php } ?>
                           </div>
                        </div>
                      </div>
                      <div class="tab-pane " id="tab_1_3">
                        <?php if(isset($favourite_data) && !empty($favourite_data))
                        { ?> 
                          <div class="portlet box red">
                            <div class="portlet-title">
                              <div class="caption">
                                <i class="fa fa-gift"></i>Favourite List
                              </div> 
                            </div> 
                            <div class="portlet-body">
                              <table class="table table-striped table-bordered table-hover masterTable" >
                                <thead>
                                  <tr class="heading">
                                    <th scope="col">Sr.no</th>
                                    <th scope="col"> Profile Code</th>
                                    <th scope="col"> DOB</th> 
                                    <th scope="col"> Age</th> 
                                    <th scope="col"> Caste</th> 
                                    <th scope="col"> Marital Status</th> 
                                    <th scope="col"> Occupation</th> 
                                    <th scope="col"> Action</th>
                                  </tr>
                                </thead>
                                <tbody> 
                                  <?php $i = 1;
                                    foreach ($favourite_data as $key) { ?>
                                      <tr class="odd gradeX">
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo (isset($key->profile_code) && !empty($key->profile_code))?$key->profile_code:'-'; ?></td>
                                        <td><?php echo (isset($key->dob) && !empty($key->dob))?date('d-m-Y',strtotime($key->dob)):'-'; ?></td>
                                        <td><?php echo (isset($key->age) && !empty($key->age))?$key->age:'-'; ?></td>
                                        <td><?php echo (isset($key->cast_name) && !empty($key->cast_name))?$key->cast_name:'-'; ?></td>
                                        <td><?php echo (isset($key->marital_name) && !empty($key->marital_name))?$key->marital_name:'-'; ?></td>
                                        <td><?php echo (isset($key->occupation) && !empty($key->occupation))?$key->occupation:'-'; ?></td>

                                       <td align="center">
                                           <a class="btn btn-success btn-xs " href="<?php echo base_url();?>profile_details/<?php echo (isset($key->customer_id) && !empty($key->customer_id))?$key->customer_id:'';?>"><i class="fa fa-search" aria-hidden="true"></i> View</a>
                                           <a class="btn btn-danger btn-xs tooltips send_request" rev="delete_favourite" rel="<?php echo(isset($key->favourite_id) && !empty($key->favourite_id))?$key->favourite_id:''?>" data-original-title="Delete Record" data-placement="top" href="javascript:void(0);"><i class="fa fa-trash-o" aria-hidden="true"></i> Remove</a>
                                        </td>
                                      </tr>
                                    <?php } ?>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        <?php } 
                        else
                        { ?>
                          <center><img src="<?php echo base_url();?>images/index.jpg" style="width: 200px;height: 200px;margin-top: 50px; opacity: 0.20;"><br><h3><b style="color: rgb(206, 206, 206);">No Record Found...!</b></h3></center>
                        <?php } ?>
                      </div>
                      <div class="tab-pane " id="tab_1_4">
                        <?php if(isset($chatting_data) && !empty($chatting_data))
                        { 
                          foreach ($variable as $key) 
                          { ?>
                             <div class="row" style="background-color: rgb(230, 230, 230);  margin-top: -65px;">
                                <div class="media-left">
                                  <a href="javascript:void(0);"><img src="<?php echo base_url();?>uploads/customer_photo/<?php echo (isset($key->customer_photo) && !empty($key->customer_photo))?$key->customer_photo:'user.png';?>"  class="img-responsive " alt="profile" style="border-radius: 150px; padding: 5px; height: 65px; width: 65px;" ></a>
                                </div>
                                <div class="media-body">
                                  <div class="date" style="padding: 8px;"><?php echo isset($key->f_name)&& !empty($key->f_name)?$key->f_name.' '.$key->m_name.' '.$key->l_name:'';?></div>
                                  <div class="date" style="padding-left: 8px;"><?php echo isset($key->profile_code)&& !empty($key->profile_code)?$key->profile_code:'';?></div>
                                </div>
                              </div>
                          <?php }
                        }
                        else
                        { ?>
                          <center><img src="<?php echo base_url();?>images/index.jpg" style="width: 200px;height: 200px;margin-top: 50px; opacity: 0.20;"><br><h3><b style="color: rgb(206, 206, 206);">No Record Found...!</b></h3></center>
                        <?php } ?>
                      </div>
                      <div class="tab-pane " id="tab_1_5">
                        <?php if(isset($payment_history) && !empty($payment_history))
                        { ?>
                          <div class="portlet box red">
                            <div class="portlet-title">
                              <div class="caption">
                                <i class="fa fa-gift"></i>Payent History  
                              </div> 
                            </div> 
                            <div class="portlet-body">
                              <table class="table table-striped table-bordered table-hover masterTable" >
                                <thead>
                                  <tr class="heading">
                                    <th scope="col">Sr.no</th>
                                    <th scope="col"> Transcation id</th> 
                                    <th scope="col"> Package</th>
                                    <th scope="col"> Amount</th> 
                                    <th scope="col"> Pay Mode</th> 
                                    <th scope="col"> Validity</th>
                                    <th scope="col"> Date</th>
                                    <th scope="col"> Expiry Date</th>
                                  </tr>
                                </thead>
                                <tbody> 
                                  <?php $i = 1;
                                    foreach ($payment_history as $key) { 
                                        $day=$key->membership_validity;
                                        $date = strtotime($key->created_on);
                                        $date = strtotime("+".$day." day", $date);
                                        $date1=date('d-m-Y', $date);?>
                                      <tr class="odd gradeX">
                                        <td><?php echo $i++;?></td>
                                        <td><?php echo (isset($key->transcation_id) && !empty($key->transcation_id))?$key->transcation_id:''; ?></td>
                                        <td><?php echo (isset($key->membership_plan) && !empty($key->membership_plan))?$key->membership_plan:''; ?></td>
                                        <td><?php echo (isset($key->membership_amt) && !empty($key->membership_amt))?$key->membership_amt:'0'; ?></td>
                                        <td><?php echo (isset($key->pay_type) && !empty($key->pay_type))?$key->pay_type:''; ?></td>
                                        <td><?php echo (isset($key->membership_validity) && !empty($key->membership_validity))?$key->membership_validity.' days':'0 days'; ?></td>
                                        <td><?php echo (isset($key->created_on) && !empty($key->created_on))?date('d-m-Y',strtotime($key->created_on)):''; ?></td>
                                        <td><?php echo (isset($date1) && !empty($date1))?$date1:''; ?></td>
                                      </tr>
                                    <?php } ?>
                                </tbody>
                              </table>
                            </div>
                          </div>
                        <?php }
                        else
                        { ?>
                          <center><img src="<?php echo base_url();?>images/index.jpg" style="width: 200px;height: 200px;margin-top: 50px; opacity: 0.20;"><br><h3><b style="color: rgb(206, 206, 206);">No Record Found...!</b></h3></center>
                        <?php } ?>
                      </div>
                      <div class="tab-pane " id="tab_1_6">
                        <form action="change_site_pass"  id="change_site_pass" class="form-horizontal " method="post">
                          <div class="form-body">  
                            <div class="row">
                              <div class="col-md-10">
                                <div class="form-group">
                                  <label class="control-label col-md-5">Your current Password
                                  </label>
                                  <div class="col-md-6">
                                    <div class="input-icon right">
                                      <i class="fa"></i>
                                      <input type="password" class="form-control password" name="current_pass" placeholder="your current password" value="<?php echo (isset($singleCountry->country_desc) && !empty($singleCountry->country_desc))?$singleCountry->country_desc:''?>"/>
                                    </div>
                                  </div>
                                  <div class="col-md-1"><a href="javascript:void(0);" class="btn btn-icon-only default"><i class="fa fa-eye show_pass"></i></a></div>
                                </div>                      
                              </div>
                            </div>  
                            <div class="row">
                              <div class="col-md-10">
                                <div class="form-group">
                                  <label class="control-label col-md-5">New Password
                                  </label>
                                  <div class="col-md-6">
                                    <div class="input-icon right">
                                      <i class="fa"></i>
                                      <input type="password"  class="form-control password" id="new_pass" name="new_pass" placeholder="New Password" value="<?php echo (isset($singleCountry->country_desc) && !empty($singleCountry->country_desc))?$singleCountry->country_desc:''?>"/>
                                    </div>
                                  </div>
                                   <div class="col-md-1"><a href="javascript:void(0);" class="btn btn-icon-only default"><i class="fa fa-eye show_pass"></i></a></div>
                                </div>                      
                              </div>
                            </div>                 
                            <div class="row">
                              <div class="col-md-10">
                                <div class="form-group">
                                  <label class="control-label col-md-5">Confirm New Password
                                  </label>
                                  <div class="col-md-6">
                                    <div class="input-icon right">
                                      <i class="fa"></i>
                                      <input type="password" class="form-control password" name="confirm_pass" placeholder="Confirm New Password" value="<?php echo (isset($singleCountry->country_desc) && !empty($singleCountry->country_desc))?$singleCountry->country_desc:''?>"/>
                                    </div>
                                  </div>
                                   <div class="col-md-1"><a href="javascript:void(0);" class="btn btn-icon-only default"><i class="fa fa-eye show_pass"></i></a></div>
                                </div>                      
                              </div>
                            </div>
                            <div class="form-actions right" style="float: right; margin-right: 260px;">
                            <button type="button" class="btn default cancel" title="Click To Cancel"> Cancel</button>             
                            <button type="submit" class="btn green common_save" title="Click To Save" rel="<?php echo(isset($single_user->user_id) && !empty($single_user->user_id))?$single_user->user_id:''?>"><i class="fa fa-check"></i><?php if(isset($single_user->user_id) && !empty($single_user->user_id)) {echo 'Update';} else { echo 'Save'; }?></button>
                          </div>
                          </div>

                        </form> 
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
        <?php } ?>
  <?php $this->load->view('site/footer');?>
<script src="<?php echo base_url();?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<!-- site -->
<script type="text/javascript" src="<?php echo base_url();?>assets/site1/js/owl.carousel.js"></script> <!-- owl carousel js -->
<script type="text/javascript" src="<?php echo base_url();?>assets/site1/js/jquery.ajaxchimp.js"></script> <!-- mail chimp js -->
<script type="text/javascript" src="<?php echo base_url();?>assets/site1/js/smooth-scroll.js"></script> <!-- smooth scroll js -->
<script type="text/javascript" src="<?php echo base_url();?>assets/site1/js/jquery.magnific-popup.min.js"></script> <!-- magnify popup js --> 
<script type="text/javascript" src="<?php echo base_url();?>assets/site1/js/waypoints.min.js"></script> <!-- facts count js required for jquery.counterup.js file -->
<script type="text/javascript" src="<?php echo base_url();?>assets/site1/js/jquery.counterup.js"></script> <!-- facts count js-->
<script type="text/javascript" src="<?php echo base_url();?>assets/site1/js/menumaker.js"></script> <!-- menu js--> 
<script type="text/javascript" src="<?php echo base_url();?>assets/site1/js/jquery.share-tooltip.js"></script> <!-- share tooltip js--> 
<script type="text/javascript" src="<?php echo base_url();?>assets/site1/js/price-slider.js"></script> <!-- price slider / filter js-->
<script type="text/javascript" src="<?php echo base_url();?>assets/site1/js/bootstrap-datepicker.js"></script> <!-- datepicker js-->
<script type="text/javascript" src="<?php echo base_url();?>assets/site1/js/theme.js"></script> 
<!-- end Site -->

<script src="<?php echo base_url();?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>
<script src="<?php echo base_url();?>assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/admin/layout3/scripts/layout.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/admin/layout3/scripts/demo.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/admin/pages/scripts/form-wizard.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/additional-methods.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/jquery-validation/lib/jquery.form.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.form.js"></script>
<script src="<?php echo base_url();?>assets/admin/pages/scripts/table-advanced.js"></script>
<script src="<?php echo base_url()?>assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

<script src="<?php echo base_url();?>js/common.js"></script>
<script>
jQuery(document).ready(function() { 
   
   Metronic.init(); // init metronic core components
   Layout.init(); // init current layout
Demo.init(); // init demo features
   FormWizard.init();
   TableAdvanced.init();
});
</script>
<!-- end jquery -->
</body>
<!--body end -->

<!-- Mirrored from thegenius.co/html/weddlist/version-1/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 19 Dec 2018 12:26:14 GMT -->
</html>