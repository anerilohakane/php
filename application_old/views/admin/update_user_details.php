<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title>Shivbandhan | Update User Details</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
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
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/css/datepicker3.css"/>
<link rel="shortcut icon" href="<?php echo base_url(); ?>uploads/favicon.png"/>
</head>
<body>
<?php $this->load->view('common/header'); ?>
<div class="page-container">
	<div class="page-head">
	</div>
	<div class="page-content">
		<div class="container">
			<ul class="page-breadcrumb breadcrumb">
				<li>
					<a href="<?php echo base_url();?>">Home</a><i class="fa fa-circle"></i>
				</li>
				<li class="active">
					 Update User Details
				</li>
			</ul>
			<div class="row form">
				<div class="col-md-12">
					<div class="portlet box green" id="form_wizard_1">
	                <div class="portlet-title">
		                <div class="caption">
		                  <span class="caption-subject bold uppercase">
		                  <i class="fa fa-user"></i> Profile Details  - <span class="step-title">Step 1 of 6 </span>
		                  </span>
		                  <span class="pull-right">
		                  	<b style="margin-left: 650px;"><i class="fa fa-credit-card"></i> </i><?php echo(isset($customer_data->profile_code) && !empty($customer_data->profile_code))?$customer_data->profile_code:''?></b>
		                  </span>
		                </div>
	                </div>
	                <div class="portlet-body ">
		                <form action="javascript:;" data-url="save_profile_details1" class="horizontal-form" id="submit_form" method="POST">
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
					                            <div class="col-md-12">
					                               <div class="row">
						                                <div class="col-md-4">
						                                  <div class="form-group">
						                                    <label class="control-label">First Name<span class="require" aria-required="true" style="color:red">*</span></label>
						                                    <div class="input-icon right">
						                                      <i class="fa"></i>
						                                      <input  type="text" class="form-control " name="f_name" value="<?php echo(isset($customer_data->f_name) && !empty($customer_data->f_name))?$customer_data->f_name:''?>" placeholder="First Name" >
						                                      <input type="hidden" name="step" value="1">
						                                    </div>
						                                  </div>
						                                </div>
						                                <div class="col-md-4">
						                                  <div class="form-group">
						                                    <label class="control-label">Middle Name <span class="require" aria-required="true" style="color:red">*</span></label>
						                                    <div class="input-icon right">
						                                      <i class="fa"></i>
						                                      <input  type="text" class="form-control " name="m_name" value="<?php echo(isset($customer_data->m_name) && !empty($customer_data->m_name))?$customer_data->m_name:''?>" placeholder="Middle Name" >
						                                    </div>
						                                  </div>
						                                </div>
						                                <div class="col-md-4">
						                                  <div class="form-group">
						                                    <label class="control-label">Last Name <span class="require" aria-required="true" style="color:red">*</span></label>
						                                    <div class="input-icon right">
						                                      <i class="fa"></i>
						                                      <input  type="text" class="form-control " name="l_name" value="<?php echo(isset($customer_data->l_name) && !empty($customer_data->l_name))?$customer_data->l_name:''?>" placeholder="Last Name" >
						                                    </div>
						                                  </div>
						                                </div>
						                                <div class="col-md-4">
						                                  <div class="form-group">
						                                    <label class="control-label">Email <span class="require" aria-required="true" style="color:red">*</span></label>
						                                    <div class="input-icon right">
						                                      <i class="fa"></i>
						                                      <input  type="text" class="form-control " name="email" value="<?php echo(isset($customer_data->email) && !empty($customer_data->email))?$customer_data->email:''?>" placeholder="Email Id" >
						                                    </div>
						                                  </div>
						                                </div>
						                                <div class="col-md-4">
						                                  <div class="form-group">
						                                    <label class="control-label">Mobile <span class="require" aria-required="true" style="color:red">*</span></label>
						                                    <div class="input-icon right">
						                                      <i class="fa"></i>
						                                      <input  type="text" class="form-control " name="mobile" value="<?php echo(isset($customer_data->mobile) && !empty($customer_data->mobile))?$customer_data->mobile:''?>" placeholder="Mobile No" >
						                                    </div>
						                                  </div>
						                                </div>
						                                <div class="col-md-4">
						                                  <div class="form-group">
						                                    <label class="control-label">Date Of Birth <span class="require" aria-required="true" style="color:red">*</span></label>
						                                    <div class="input-icon right">
						                                      <i class="fa"></i>
						                                      <input  type="text" class="form-control " name="dob" value="<?php echo(isset($customer_data->dob) && !empty($customer_data->dob))?date('d-m-Y',strtotime($customer_data->dob)):''?>" placeholder="Date Of Birth" >
						                                    </div>
						                                  </div>
						                                </div>


						                                <div class="col-md-4">
						                                  <div class="form-group">
						                                    <label class="control-label">Marital Status<span class="require" aria-required="true" style="color:red">*</span></label>
						                                    <div class=" "> 
						                                      <select class="form-control select2me mode " name="marital_status1">
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


						                                <!-- <div class="col-md-4">
															<div class="form-group">
																<label class="control-label">Payment Mode<span class="required" aria-required="true">*</span></label>
																<select class="form-control select_box  mode" id="payment_mode" name="payment_mode">
																	<option>Select</option>
																	<?php  if(isset($mode_data) && !empty($mode_data))
																	{
																		foreach ($mode_data as $row) 
																		{ ?>
																			<option value="<?php echo $row->payment_id; ?>" <?php echo (isset($single_transcation_data->payment_mode) && !empty($single_transcation_data->payment_mode) && ($single_transcation_data->payment_mode==$row->payment_id))?'selected="selected"':''; ?> > <?php echo $row->mode; ?> </option>
																		<?php } 
																	}?>
																</select>
															</div>
														</div> -->

														<div class="col-md-4 bank" style="<?php echo (isset($customer_data->marital_status) && !empty($customer_data->marital_status) && ($customer_data->marital_status!='3') && ($customer_data->marital_status!='4') && ($customer_data->marital_status!='7'))?'display: block':'display: none';?>">
															<div class="form-group">
																<label class="control-label">No. Of Childs<span class="required" aria-required="true">*</span></label>
																<select class="form-control select_box " id="no_of_childs" name="no_of_childs">

																	<option>Select</option>
																	<option value="0" selected>0</option>
																	<?php
																	    for ($i=1; $i<=5; $i++)
																	    {
																	?>
																        <!-- <option value="<?php echo $i;?>"><?php echo $i;?></option> -->

																        <option value="<?php echo(isset($i) && !empty($i))?$i:''; ?>"  <?php echo (isset($customer_data->no_of_childs) && !empty($customer_data->no_of_childs) && ($customer_data->no_of_childs==$i))?'selected="selected"':''; ?>><?php echo(isset($i) && !empty($i))?$i:''; ?></option>
																    <?php
																	    }
																	?>
																</select>
															</div>
														</div>

														<div class="col-md-4">
	                                                      <div class="form-group">
	                                                        <label class="control-label">Community<span class="require" aria-required="true" style="color:red">*</span></label>
	                                                        <div class=" ">
	                                                          <select class="form-control select2me " name="community">
	                                                            <option value="">select</option>
	                                                            <?php if(isset($community_for) && !empty($community_for))
	                                                            {
	                                                              foreach ($community_for as $key) 
	                                                              { ?>
	                                                                <option value="<?php echo $key->community_id?>" <?php echo (isset($customer_data->community) && !empty($customer_data->community) && ($customer_data->community==$key->community_id))?'selected="selected"':'';?>><?php echo $key->community_name;?></option>
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
						                                      <select class="form-control select2me " name="caste1">
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
						                                    <!-- <div class=" "> 
						                                      <select class="form-control select2me " name="sub_caste1">
						                                        <option value="">select</option>
						                                        <?php if(isset($sub_cast_data) && !empty($sub_cast_data))
						                                        {
						                                          foreach ($sub_cast_data as $key) 
						                                          { ?>
						                                            <option value="<?php echo $key->sub_cast_id?>" <?php echo (isset($customer_data->sub_caste) && !empty($customer_data->sub_caste) && ($customer_data->sub_caste==$key->sub_cast_id))?'selected="selected"':'';?>><?php echo $key->sub_cast_name;?></option>
						                                          <?php }                             
						                                        } ?>                            
						                                      </select>
						                                    </div> -->

						                                    <div class="input-icon right">
						                                      <i class="fa"></i>
						                                      <input  type="text" class="form-control " name="sub_caste1" value="<?php echo(isset($customer_data->sub_caste) && !empty($customer_data->sub_caste))?$customer_data->sub_caste:''?>" placeholder="Sub Caste" >
						                                    </div>

						                                  </div> 
						                                </div>
						                                <div class="col-md-4">
						                                  <div class="form-group">
						                                    <label class="control-label">Height <span class="require" aria-required="true" style="color:red">*</span></label>
						                                    <div class="input-icon right">
						                                      <i class="fa"></i>
						                                      <input  type="text" class="form-control " name="height1" value="<?php echo(isset($customer_data->height) && !empty($customer_data->height))?$customer_data->height:''?>" placeholder=" Enter Height (ex: 5.5 )" >
						                                    </div>
						                                  </div>
						                                </div>
						                                <div class="col-md-4">
						                                  <div class="form-group">
						                                    <label class="control-label">Weight <span class="require" aria-required="true" style="color:red">*</span></label>
						                                    <div class="input-icon right">
						                                      <i class="fa"></i>
						                                      <input  type="text" class="form-control " name="weight1" value="<?php echo(isset($customer_data->weight) && !empty($customer_data->weight))?$customer_data->weight:''?>" placeholder="Enter Weight (EX 40)" >
						                                    </div>
						                                  </div>
						                                </div>
						                                <div class="col-md-4">
						                                  <div class="form-group">
						                                    <label class="control-label">Blood Group <span class="require" aria-required="true" style="color:red">*</span></label>
						                                    <div class="input-icon right">
						                                      <i class="fa"></i>
						                                      <input  type="text" class="form-control " name="blood_group1" value="<?php echo(isset($customer_data->blood_group) && !empty($customer_data->blood_group))?$customer_data->blood_group:''?>" placeholder="Enter Blood Group (EX O+)" >
						                                    </div>
						                                  </div>
						                                </div>
						                                <div class="col-md-4">
						                                  <div class="form-group">
						                                    <label class="control-label">Complexion<span class="require" aria-required="true" style="color:red">*</span></label>
						                                    <div class=" "> 
						                                      <select class="form-control select2me " name="complexion1">
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
						                                      <select class="form-control select2me " name="physical_disability1">
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
						                                      <select class="form-control select2me " name="lens1">
						                                        <option value="">select</option>
						                                        <option value="Yes" <?php echo (isset($customer_data->lens) && !empty($customer_data->lens) && ($customer_data->lens=='Yes'))?'selected="selected"':'';?>>Yes</option>
						                                        <option value="No" <?php echo (isset($customer_data->lens) && !empty($customer_data->lens) && ($customer_data->physical_disability=='No'))?'selected="selected"':'';?>>No</option>
						                                                                   
						                                      </select>
						                                    </div>
						                                  </div> 
						                                </div>
					                              	</div>
					                            </div>
				                           </div>
				                           <div class="row">
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
					                                            <input type="hidden" class="hidden_emp" value="<?php echo (isset($customer_data->customer_photo) && !empty($customer_data->customer_photo))?$customer_data->customer_photo:''?>" name="hidden_customer_photo" id="textfield1" accept="image/*">
					                                        <div>
					                                          <span class="btn default btn-file">
					                                          <span class="fileinput-new">
					                                          Select image </span>
					                                          <span class="fileinput-exists">
					                                          Change </span>
					                                          <input type="file" accept="image/*" name="customer_photo">
					                                          </span>
					                                          <a href="javascript:;" class="btn red fileinput-exists remove_image" data-dismiss="fileinput" onclick="ClearFields1();">
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
					                                            <a href="javascript:;" class="btn red fileinput-exists " data-dismiss="fileinput"> Remove </a>
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
					                            <div class="col-md-3">
                                                   <div class="col-md-12">
                                                      <div class="form-group">
                                                        <label class="control-label">Photo<span class="required">*</span></label><br>
                                                        <?php if(isset($customer_data->customer_photo1) && !empty($customer_data->customer_photo1))
                                                        { 
                                                          $path1 = 'uploads/customer_photo/'. $customer_data->customer_photo1;  
                                                          if (file_exists($path1)) {?>
                                                          <div class="fileinput fileinput-exists" data-provides="fileinput">
                                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                                              <img src="<?php echo base_url(); ?>uploads/customer_photo/<?php echo (isset($customer_data->customer_photo1) && !empty($customer_data->customer_photo1))?$customer_data->customer_photo1:'user.png'?>" alt=""/>  
                                                            </div>
                                                                <input type="hidden" class="hidden_emp" value="<?php echo (isset($customer_data->customer_photo1) && !empty($customer_data->customer_photo1))?$customer_data->customer_photo1:''?>" name="hidden_customer_photo1" id="textfield2"accept="image/*" >
                                                            <div>
                                                              <span class="btn default btn-file">
                                                              <span class="fileinput-new">
                                                              Select image </span>
                                                              <span class="fileinput-exists">
                                                              Change </span>
                                                              <input type="file" accept="image/*" name="customer_photo1">
                                                              </span>
                                                              <a href="javascript:;" class="btn red fileinput-exists remove_image" data-dismiss="fileinput" onclick="ClearFields2();">
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
                                                                    <input type="file" name="customer_photo1" accept="image/*" > </span>
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
                                                                    <input type="file" name="customer_photo1" accept="image/*" > </span>
                                                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                            </div>
                                                          </div>         
                                                        <?php } ?>
                                                        <span class="help-block" style="color:#d44;">(Note-Max size of file should not exceed than 1mb and file type is JPG or PNG )</span>
                                                      </div>
                                                   </div>
                                                </div>
                                                <div class="col-md-3">
                                                   <div class="col-md-12">
                                                      <div class="form-group">
                                                        <label class="control-label">Upload Biodata<span class="required">*</span></label><br>
                                                        <?php if(isset($customer_data->biodata) && !empty($customer_data->biodata))
                                                        { 
                                                          $path2 = 'uploads/biodata/'. $customer_data->biodata;  
                                                          if (file_exists($path2)) {?>
                                                          <div class="fileinput fileinput-exists" data-provides="fileinput">
                                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                                                              <!-- <img src="<?php echo base_url(); ?>uploads/biodata/<?php echo (isset($customer_data->biodata) && !empty($customer_data->biodata))?$customer_data->biodata:''?>" alt=""/> --> 
                                                              <i class="fa fa-file-o" style="font-size: 15px;"></i> 
                                                            </div>
                                                                <input type="hidden" class="hidden_emp" value="<?php echo (isset($customer_data->biodata) && !empty($customer_data->biodata))?$customer_data->biodata:''?>" name="hidden_biodata" id="textfield3"accept="*">
                                                            <div>
                                                              <span class="btn default btn-file">
                                                              <span class="fileinput-new">
                                                              Select File </span>
                                                              <span class="fileinput-exists">
                                                              Change </span>
                                                              <input type="file" accept="*" name="biodata">
                                                              </span>
                                                              <a href="javascript:;" class="btn red fileinput-exists remove_file" data-dismiss="fileinput" onclick="ClearFields3();">
                                                              Remove </a>
                                                            </div>
                                                          </div>                                 
                                                        <?php } else
                                                        { ?>
                                                          <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+file" alt="" /> </div>
                                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                            <div>
                                                                <span class="btn default btn-file">
                                                                    <span class="fileinput-new"> Select File </span>
                                                                    <span class="fileinput-exists"> Change </span>
                                                                    <input type="file" name="biodata" accept="*" > </span>
                                                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                            </div>
                                                          </div>         
                                                        <?php } }
                                                        else
                                                        { ?>
                                                          <div class="fileinput fileinput-new" data-provides="fileinput">
                                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                                <img src="http://www.placehold.it/200x150/EFEFEF/AAAAAA&amp;text=no+file" alt="" /> </div>
                                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"> </div>
                                                            <div>
                                                                <span class="btn default btn-file">
                                                                    <span class="fileinput-new"> Select File </span>
                                                                    <span class="fileinput-exists"> Change </span>
                                                                    <input type="file" name="biodata" accept="*" > </span>
                                                                <a href="javascript:;" class="btn red fileinput-exists" data-dismiss="fileinput"> Remove </a>
                                                            </div>
                                                          </div>         
                                                        <?php } ?>
                                                        <span class="help-block" style="color:#d44;">(Note-Max size of file should not exceed than 1mb and file type is pdf or doc )</span>
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
							                                      <select class="form-control select2me " name="rashi1">
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
						                                      <select class="form-control select2me " name="nakshtra1">
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
						                                      <select class="form-control select2me " name="charan1">
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
						                                      <select class="form-control select2me " name="gan1">
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
						                                      <select class="form-control select2me " name="nadi1">
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
						                                      <select class="form-control select2me " name="mangal1">
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
						                                      <input  type="text" class="form-control " name="birth_place1" value="<?php echo(isset($customer_data->birth_place) && !empty($customer_data->birth_place))?$customer_data->birth_place:''?>" placeholder=" Enter Birth Place" >
						                                    </div>
						                                  </div>
						                                </div>
						                                <div class="col-md-4">
						                                  <div class="form-group">
						                                    <label class="control-label">Birth Time <span class="require" aria-required="true" style="color:red">*</span></label>
						                                    <div class="input-icon right">
						                                      <i class="fa"></i>
						                                      <input  type="text" class="form-control " name="birth_time1" value="<?php echo(isset($customer_data->birth_time) && !empty($customer_data->birth_time))?$customer_data->birth_time:''?>" placeholder=" Enter Birth Time " >
						                                    </div>
						                                  </div>
						                                </div>
						                                <div class="col-md-4">
						                                  <div class="form-group">
						                                    <label class="control-label">Gotra/Devak <span class="require" aria-required="true" style="color:red">*</span></label>
						                                    <div class="input-icon right">
						                                      <i class="fa"></i>
						                                      <input  type="text" class="form-control " name="gotra1" value="<?php echo(isset($customer_data->gotra) && !empty($customer_data->gotra))?$customer_data->gotra:''?>" placeholder=" Enter Gotra" >
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
					                                      <select class="form-control select2me " name="education1">
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
					                                      <select class="form-control select2me " name="occupation_city1">
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
					                                      <input  type="text" class="form-control " name="education_specification1" value="<?php echo(isset($customer_data->education_specification) && !empty($customer_data->education_specification))?$customer_data->education_specification:''?>" placeholder=" Enter Education Specification" >
					                                      <input type="hidden" name="step" value="3">
					                                    </div>
					                                  </div>
					                                </div>
					                                <div class="col-md-4">
					                                  <div class="form-group">
					                                    <label class="control-label">Occupation <span class="require" aria-required="true" style="color:red">*</span></label>
					                                    <div class="input-icon right">
					                                      <i class="fa"></i>
					                                      <input  type="text" class="form-control " name="occupation1" value="<?php echo(isset($customer_data->occupation) && !empty($customer_data->occupation))?$customer_data->occupation:''?>" placeholder=" Enter Occupation" >
					                                    </div>
					                                  </div>
					                                </div>
					                                
					                                <div class="col-md-4">
					                                  <div class="form-group">
					                                    <label class="control-label">Income <span class="require" aria-required="true" style="color:red">*</span></label>
					                                    <div class="input-icon right">
					                                      <i class="fa"></i>
					                                      <input  type="text" class="form-control " name="income1" value="<?php echo(isset($customer_data->income) && !empty($customer_data->income))?$customer_data->income:''?>" placeholder=" Enter income in PA (EX: 100000)" >
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
					                                      <input  type="text" class="form-control " name="document_no1" value="<?php echo(isset($customer_data->document_no) && !empty($customer_data->document_no))?$customer_data->document_no:''?>" placeholder=" Enter PAN/AAdhar/Passport NO" >
					                                      <input type="hidden" name="step" value="4">
					                                    </div>
					                                  </div>
					                                </div>
					                                <div class="col-md-4">
					                                  <div class="form-group">
					                                    <label class="control-label">Phone I <span class="require" aria-required="true" style="color:red">*</span></label>
					                                    <div class="input-icon right">
					                                      <i class="fa"></i>
					                                      <input  type="text" class="form-control " name="phone1" value="<?php echo(isset($customer_data->phone) && !empty($customer_data->phone))?$customer_data->phone:''?>" placeholder=" Enter Phone No" >
					                                    </div>
					                                  </div>
					                                </div>
					                                <div class="col-md-4">
					                                  <div class="form-group">
					                                    <label class="control-label">Phone II <span class="require" aria-required="true" style="color:red">*</span></label>
					                                    <div class="input-icon right">
					                                      <i class="fa"></i>
					                                      <input  type="text" class="form-control " name="phone11" value="<?php echo(isset($customer_data->phone1) && !empty($customer_data->phone1))?$customer_data->phone1:''?>" placeholder=" Enter Phone No" >
					                                    </div>
					                                  </div>
					                                </div>
					                                <div class="col-md-6">
					                                   <label for="firstname" >Permanant Address <span class="require" aria-required="true" >*</span></label>
					                                   <textarea id="desc" rows="3" name="permanant_address1" class="form-control input-sm" placeholder="Type Your address..." tabindex=""><?php echo (isset($customer_data->permanant_address) && !empty($customer_data->permanant_address))?$customer_data->permanant_address:'';?></textarea>        
					                               </div>
					                               <div class="col-md-6">
					                                   <label for="firstname" >Residence Address <span class="require" aria-required="true" >*</span></label>
					                                   <textarea id="desc" rows="3" name="residence_address1" class="form-control input-sm" placeholder="Type Your address..." tabindex=""><?php echo (isset($customer_data->residence_address) && !empty($customer_data->residence_address))?$customer_data->residence_address:'';?></textarea>        
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
					                                      <select class="form-control select2me " name="father1">
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
					                                      <input  type="text" class="form-control " name="father_full_name1" value="<?php echo(isset($customer_data->father_full_name) && !empty($customer_data->father_full_name))?$customer_data->father_full_name:''?>" placeholder=" Enter Full Name " >
					                                      <input type="hidden" name="step" value="5">
					                                    </div>
					                                  </div>
					                                </div>
					                                <div class="col-md-6">
					                                  <div class="form-group">
					                                    <label class="control-label">Mother<span class="require" aria-required="true" style="color:red">*</span></label>
					                                    <div class=" "> 
					                                      <select class="form-control select2me " name="mother1">
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
					                                      <select class="form-control select2me " name="parent_residence_city1">
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
					                                      <select class="form-control select2me " name="brothers1">
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
					                                      <select class="form-control select2me " name="married_brothers1">
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
					                                      <select class="form-control select2me " name="sisters1">
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
					                                      <select class="form-control select2me " name="married_sisters1">
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
					                                      <select class="form-control select2me " name="native_district1">
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
					                                      <select class="form-control select2me " name="native_city1">
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
					                                      <input  type="text" class="form-control " name="relative_surname1" value="<?php echo(isset($customer_data->relative_surname) && !empty($customer_data->relative_surname))?$customer_data->relative_surname:''?>" placeholder=" Enter Relative Surname" >
					                                    </div>
					                                  </div>
					                                </div>
					                                <div class="col-md-6">
					                                  <div class="form-group">
					                                    <label class="control-label">Parent Occupation<span class="require" aria-required="true" style="color:red">*</span></label>
					                                    <div class="input-icon right">
					                                      <i class="fa"></i>
					                                      <input  type="text" class="form-control " name="parent_occupation1" value="<?php echo(isset($customer_data->parent_occupation) && !empty($customer_data->parent_occupation))?$customer_data->parent_occupation:''?>" placeholder=" Enter Parent Occupation" >
					                                    </div>
					                                  </div>
					                                </div>
					                                <div class="col-md-6">
					                                  <div class="form-group">
					                                    <label class="control-label">Mama Surname<span class="require" aria-required="true" style="color:red">*</span></label>
					                                    <div class="input-icon right">
					                                      <i class="fa"></i>
					                                      <input  type="text" class="form-control " name="mama_surname1" value="<?php echo(isset($customer_data->mama_surname) && !empty($customer_data->mama_surname))?$customer_data->mama_surname:''?>" placeholder=" Enter Mama Surname" >
					                                    </div>
					                                  </div>
					                                </div>
					                                <div class="col-md-6">
					                                  <div class="form-group">
					                                    <label class="control-label">Family Wealth<span class="require" aria-required="true" style="color:red">*</span></label>
					                                    <div class="input-icon right">
					                                      <i class="fa"></i>
					                                      <input  type="text" class="form-control " name="family_wealth1" value="<?php echo(isset($customer_data->family_wealth) && !empty($customer_data->family_wealth))?$customer_data->family_wealth:''?>" placeholder=" Enter Family Wealth" >
					                                    </div>
					                                  </div>
					                                </div>
					                                <div class="col-md-6">
					                                  <div class="form-group">
					                                    <label class="control-label">Any Intercast Marriage In Core Family<span class="require" aria-required="true" style="color:red">*</span></label>
					                                    <div class=" "> 
					                                      <select class="form-control select2me " name="any_intercast_marriage1">
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
					                                      <input  type="text" class="form-control " name="relation_cast1" value="<?php echo(isset($customer_data->relation_cast) && !empty($customer_data->relation_cast))?$customer_data->relation_cast:''?>" placeholder=" Enter Relation/Cast" >
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
					                                        <select class="form-control select2me " name="expected_mangal1">
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
					                                        <select class="form-control select2me " name="expected_cast1">
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
					                                      <select class="form-control select2me " name=" preffered_city1[] " data-placeholder="Choose preffered city" multiple>
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
					                                      <select class="form-control select2me " name="age_difference1">
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
					                                <!-- <div class="col-md-6">
					                                    <div class="form-group">
					                                      <label class="control-label">Expecteed Education<span class="require" aria-required="true" style="color:red">*</span></label>
					                                      <div class=" "> 
					                                        <select class="form-control select2me " name="expected_education1"  multiple>
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
					                                </div> -->

					                                <div class="col-md-6">
					                                  <div class="form-group">
					                                    <label class="control-label">Expecteed Education<span class="require" aria-required="true" style="color:red">*</span></label>
					                                      <div class=" "> 
					                                        <select class="form-control select2me " name="expected_education1[]" data-placeholder="Choose Expecteed Education" multiple>
					                                          <option value="">select</option>
					                                        <?php if(isset($education_data) && !empty($education_data))
					                                        {
					                                          foreach($education_data AS $key)
					                                          { 
					                                            $flag=0;
					                                            if(isset($customer_data->expected_education) && !empty($customer_data->expected_education))
					                                            {
					                                              
					                                              $preffered_city=explode(',',$customer_data->expected_education);
					                                              foreach ($preffered_city as $row) {
					                                                if($row==$key->education_id)
					                                                {
					                                                  $flag=1;
					                                                  break;
					                                                }
					                                              }
					                                            } ?>
					                                            <option value="<?php echo $key->education_id?>" <?php echo ($flag)?'selected="selected"':'';?>><?php echo $key->education_name;?></option>
					                                          <?php } 
					                                        }?>
					                                      </select>
					                                    </div>
					                                  </div> 
					                                </div>

					                                <div class="col-md-6">
					                                  <div class="form-group">
					                                    <div class="radio-list" >
					                                      <label>Divorcee<span class="require" aria-required="true" style="color:red">*</span></label>
					                                      <label class="radio-inline">
					                                        <input type="radio" name="divorcee1" id="male" value="Yes"   <?php echo (isset($customer_data->divorcee) && !empty($customer_data->divorcee) && ($customer_data->divorcee=='Yes'))?'selected="selected"':'';?>> Yes 
					                                      </label>
					                                      <label class="radio-inline">
					                                        <input type="radio" name="divorcee1" id="female" value="No" <?php echo(!isset($employee_data->divorcee))?'checked':'' ?> <?php echo (isset($customer_data->divorcee) && !empty($customer_data->divorcee) && ($customer_data->divorcee=='No'))?'selected="selected"':'';?>> No
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
					                                      <input  type="text" class="form-control " name="expected_height1" value="<?php echo(isset($customer_data->expected_height) && !empty($customer_data->expected_height))?$customer_data->expected_height:''?>" placeholder=" Expected Height (eg 5.6)" >
					                                      <input type="hidden" name="step" value="6">
					                                    </div>
					                                  </div>
					                                </div>
					                                <div class="col-md-6">
					                                  <div class="form-group">
					                                    <label class="control-label">Expected Income Per Annum <span class="require" aria-required="true" style="color:red">*</span></label>
					                                    <div class="input-icon right">
					                                      <i class="fa"></i>
					                                      <input  type="text" class="form-control " name="expected_income_per_annum1" value="<?php echo(isset($customer_data->expected_income_per_annum) && !empty($customer_data->expected_income_per_annum))?$customer_data->expected_income_per_annum:''?>" placeholder=" Expected Income (eg 300000)" >
					                                    </div>
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
			                </div>
		                </form>
	                </div>
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
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/jquery.validate.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/additional-methods.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>
<script src="<?php echo base_url();?>assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/admin/layout3/scripts/layout.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/admin/layout3/scripts/demo.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/admin/pages/scripts/form-wizard.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.form.js"></script>
<script src="<?php echo base_url();?>assets/admin/pages/scripts/table-advanced.js"></script>
<script src="<?php echo base_url()?>assets/global/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js"></script>
<script src="<?php echo base_url();?>js/common.js"></script>
<script>
jQuery(document).ready(function() { 
	$(".mask_date2").inputmask("d-m-y", {
        "placeholder": "dd-mm-yyyy",
         autoUnmask: false              
    });
   
   Metronic.init(); // init metronic core components
Layout.init(); // init current layout
Demo.init(); // init demo features
   FormWizard.init();
   TableAdvanced.init();
});


function ClearFields1() {

     document.getElementById("textfield1").value = "";
}

function ClearFields2() {

     document.getElementById("textfield2").value = "";
}

function ClearFields3() {

     document.getElementById("textfield3").value = "";
}
</script>
</body>
</html>