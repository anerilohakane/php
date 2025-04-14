<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8"/>
<title>Shivbandhan | User Details</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
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
<body class="page-md">
<?php $this->load->view('common/header'); ?>
<div class="page-container">
    <div class="page-head">
    <div class="page-content">
        <div class="container">
            <div class="row profile">
                <div class="col-md-12">
                    <div class="tabbable tabbable-custom tabbable-noborder ">
                        <ul class="nav nav-tabs">
                            <li class="active">
                                <a href="#tab_1_1" data-toggle="tab">
                                User Detail </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1_1">
                                <div class="row">
                                    <div class="col-md-3">
                                        <ul class="list-unstyled profile-nav">
                                            <li>
                                                <img class="popup_save1" rel="<?php echo(isset($customer_details_data->customer_id) && !empty($customer_details_data->customer_id))?$customer_details_data->customer_id:''?>" rev="user_img_details" data-title="User images"  src="<?php echo base_url(); ?>uploads/customer_photo/<?php echo(isset($customer_details_data->customer_photo) && !empty($customer_details_data->customer_photo))?$customer_details_data->customer_photo:'user.png'?>" class="img-responsive" alt="" style="margin-left: 20px;  height: 160px; width: 160px; border-radius: 80px;"/>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-8 profile-info">
                                        <h1><?php echo(isset($customer_details_data->l_name) && !empty($customer_details_data->l_name))?$customer_details_data->l_name:''?> <?php echo(isset($customer_details_data->f_name) && !empty($customer_details_data->f_name))?ucfirst(strtolower($customer_details_data->f_name)):''?> <?php echo(isset($customer_details_data->m_name) && !empty($customer_details_data->m_name))?ucfirst(strtolower($customer_details_data->m_name)):''?></h1><hr>
                                        <ul class="list-inline">
                                            <li>
                                                <i class="fa fa-credit-card"></i> </i> <?php echo(isset($customer_details_data->profile_code) && !empty($customer_details_data->profile_code))?$customer_details_data->profile_code:''?>
                                            </li>
                                            <li>
                                                <i class="fa fa-phone"></i> </i> <?php echo(isset($customer_details_data->mobile) && !empty($customer_details_data->mobile))?$customer_details_data->mobile:''?>
                                            </li>
                                            <li>
                                                <i class="fa fa-calendar"></i> <?php echo (isset($customer_details_data->dob) && !empty($customer_details_data->dob) &&  $customer_details_data->dob!='0000-00-00')?date('d M',strtotime($customer_details_data->dob)):''?>
                                            </li>
                                            <li>
                                                <i class="fa fa-tint"></i> <?php echo(isset($customer_details_data->blood_group) && !empty($customer_details_data->blood_group))?$customer_details_data->blood_group:''?> 
                                            </li>
                                        </ul>
                                        <hr>
                                        <a class="btn green hidden-print margin-bottom-5" href="<?php echo base_url(); ?>update_user_details/<?php echo (isset($customer_details_data->customer_id) && !empty($customer_details_data->customer_id))?$customer_details_data->customer_id:''; ?>">Edit Info<i class="fa fa-edit"></i> </a>
                                        <a class="" href="<?php echo base_url(); ?>download_biodata/<?php echo (isset($customer_details_data->customer_id) && !empty($customer_details_data->customer_id))?$customer_details_data->customer_id:''; ?>"><i class="fa fa-download" style="font-size: 35px;margin-left: 30px; color: red;" data-original-title="Bio-data" data-placement="top"></i> </a>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="tabbable-line tabbable-custom-profile">
                                            <ul class="nav nav-tabs">
                                                <li class="active">
                                                    <a href="#tab_1_11" data-toggle="tab">
                                                    ALL </a>
                                                </li>
                                                <li class="">
                                                    <a href="#tab_1_22" data-toggle="tab">
                                                    Personal Info </a>
                                                </li>
                                                <li>
                                                    <a href="#tab_1_33" data-toggle="tab">
                                                    Horoscope Info </a>
                                                </li>
                                                <li>
                                                    <a href="#tab_1_44" data-toggle="tab">
                                                    Educational Info </a>
                                                </li>
                                                <li>
                                                    <a href="#tab_1_55" data-toggle="tab">
                                                    Address Info </a>
                                                </li>
                                                <li>
                                                    <a href="#tab_1_66" data-toggle="tab">
                                                    Family Info </a>
                                                </li>
                                                <li>
                                                    <a href="#tab_1_77" data-toggle="tab">
                                                    Expectation </a>
                                                </li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="tab_1_11">
                                                    <div class="panel panel-success">
                                                        <div class="panel-heading">Personal Info</div>
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;First Name</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->f_name) && !empty($customer_details_data->f_name))?$customer_details_data->f_name:''?></span>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Middle Name</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->m_name) && !empty($customer_details_data->m_name))?$customer_details_data->m_name:''?></span>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Last name</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->l_name) && !empty($customer_details_data->l_name))?$customer_details_data->l_name:''?></span>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mobile</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->mobile) && !empty($customer_details_data->mobile))?$customer_details_data->mobile:''?></span>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date Of Birth</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->dob) && !empty($customer_details_data->dob))?date('d-m-Y',strtotime($customer_details_data->dob)):''?></span>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->email) && !empty($customer_details_data->email))?$customer_details_data->email:''?></span>
                                                                </div>

                                                                <div class="col-md-3">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Community</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->community_name) && !empty($customer_details_data->community_name))?$customer_details_data->community_name:''?></span>
                                                                </div>

                                                                <div class="col-md-3">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Caste</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->cast_name) && !empty($customer_details_data->cast_name))?$customer_details_data->cast_name:''?></span>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sub Caste</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->sub_caste) && !empty($customer_details_data->sub_caste))?$customer_details_data->sub_caste:''?></span>
                                                                </div>
                                                                
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Height</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->height) && !empty($customer_details_data->height))?$customer_details_data->height:''?></span>
                                                                </div>

                                                                <div class="col-md-3">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Marital Status </p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->marital_name) && !empty($customer_details_data->marital_name))?$customer_details_data->marital_name:''?></span>
                                                                </div>
                                                                <?php if (isset($customer_details_data->marital_status) && !empty($customer_details_data->marital_status) && ($customer_details_data->marital_status!='3') && ($customer_details_data->marital_status!='4') && ($customer_details_data->marital_status!='7')) { ?>

                                                                <div class="col-md-3">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No. Of Childs </p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->no_of_childs) && !empty($customer_details_data->no_of_childs))?$customer_details_data->no_of_childs:'0'?></span>
                                                                </div>

                                                            <?php  } ?>
                                                            </div>

                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Weight</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->weight) && !empty($customer_details_data->weight))?$customer_details_data->weight:''?></span>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Blood Group </p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->blood_group) && !empty($customer_details_data->blood_group))?$customer_details_data->blood_group:''?></span>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Complexion</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->complexion_name) && !empty($customer_details_data->complexion_name))?$customer_details_data->complexion_name:''?></span>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Physical Disabilities</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->physical_disability) && !empty($customer_details_data->physical_disability))?$customer_details_data->physical_disability:''?></span>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lens</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->lens) && !empty($customer_details_data->lens))?$customer_details_data->lens:''?></span>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-success">
                                                        <div class="panel-heading">Horoscope Info</div>
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rashi</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->rashi_name) && !empty($customer_details_data->rashi_name))?$customer_details_data->rashi_name:''?></span>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nakshtra </p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->nakshtra_name) && !empty($customer_details_data->nakshtra_name))?$customer_details_data->nakshtra_name:''?></span>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Charan</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->charan_name) && !empty($customer_details_data->charan_name))?$customer_details_data->charan_name:''?></span>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Gan</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->gan_name) && !empty($customer_details_data->gan_name))?$customer_details_data->gan_name:''?></span>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nadi</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->nadi_name) && !empty($customer_details_data->nadi_name))?$customer_details_data->nadi_name:''?></span>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mangal </p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->mangal_name) && !empty($customer_details_data->mangal_name))?$customer_details_data->mangal_name:''?></span>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Birth Place</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->birth_place) && !empty($customer_details_data->birth_place))?$customer_details_data->birth_place:''?></span>
                                                                </div>
                                                                 <div class="col-md-3">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Birth Time</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->birth_time) && !empty($customer_details_data->birth_time))?$customer_details_data->birth_time:''?></span>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Gotra/Devak</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->gotra) && !empty($customer_details_data->gotra))?$customer_details_data->gotra:''?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-success">
                                                        <div class="panel-heading">Educational Info</div>
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Education Area</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->education_name) && !empty($customer_details_data->education_name))?$customer_details_data->education_name:''?></span>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Occupation City </p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->occupation_city_name) && !empty($customer_details_data->occupation_city_name))?$customer_details_data->occupation_city_name:''?></span>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Educational Specification</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->education_specification) && !empty($customer_details_data->education_specification))?$customer_details_data->education_specification:''?></span>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Occupation</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->occupation) && !empty($customer_details_data->occupation))?$customer_details_data->occupation:''?></span>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Income </p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->income) && !empty($customer_details_data->income))?$customer_details_data->income:''?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-success">
                                                        <div class="panel-heading">Address Info</div>
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PAN/AAdhar/Passport NO</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->document_no) && !empty($customer_details_data->document_no))?$customer_details_data->document_no:''?></span>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Phone I</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->phone) && !empty($customer_details_data->phone))?$customer_details_data->phone:''?></span>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Phone II</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->phone1) && !empty($customer_details_data->phone1))?$customer_details_data->phone1:''?></span>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Permanant Address</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->permanant_address) && !empty($customer_details_data->permanant_address))?$customer_details_data->permanant_address:''?></span>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Residence Address</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->residence_address) && !empty($customer_details_data->residence_address))?$customer_details_data->residence_address:''?></span>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-success">
                                                        <div class="panel-heading">Family Info</div>
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Father</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->father) && !empty($customer_details_data->father))?$customer_details_data->father:''?></span>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Father Full Name</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->father_full_name) && !empty($customer_details_data->father_full_name))?$customer_details_data->father_full_name:''?></span>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mother</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->mother) && !empty($customer_details_data->mother))?$customer_details_data->mother:''?></span>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Parent Residence City</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->parent_residence_city_name) && !empty($customer_details_data->parent_residence_city_name))?$customer_details_data->parent_residence_city_name:''?></span>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Brothers</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->brothers) && !empty($customer_details_data->brothers))?$customer_details_data->brothers:'0'?></span>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Married Brothers</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->married_brothers) && !empty($customer_details_data->married_brothers))?$customer_details_data->married_brothers:'0'?></span>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sisters</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->sisters) && !empty($customer_details_data->sisters))?$customer_details_data->sisters:'0'?></span>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Married Sisters</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->married_sisters) && !empty($customer_details_data->married_sisters))?$customer_details_data->married_sisters:''?></span>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Native District</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->native_district_name) && !empty($customer_details_data->native_district_name))?$customer_details_data->native_district_name:''?></span>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Native City</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->native_city_name) && !empty($customer_details_data->native_city_name))?$customer_details_data->native_city_name:''?></span>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Family Wealth</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->family_wealth) && !empty($customer_details_data->family_wealth))?$customer_details_data->family_wealth:''?></span>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Relative Surname </p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->relative_surname) && !empty($customer_details_data->relative_surname))?$customer_details_data->relative_surname:''?></span>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Parent Occupation </p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->parent_occupation) && !empty($customer_details_data->parent_occupation))?$customer_details_data->parent_occupation:''?></span>
                                                                </div>
                                                                 <div class="col-md-2">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Mama Surname </p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->mama_surname) && !empty($customer_details_data->mama_surname))?$customer_details_data->mama_surname:''?></span>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Any Intercast Marriage In Core Family</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->any_intercast_marriage) && !empty($customer_details_data->any_intercast_marriage))?$customer_details_data->any_intercast_marriage:''?></span>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Relation/Cast</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->relation_cast) && !empty($customer_details_data->relation_cast))?$customer_details_data->relation_cast:''?></span>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                        </div>
                                                    </div>
                                                    <div class="panel panel-success">
                                                        <div class="panel-heading">Expectation</div>
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mangal</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->mangal_name) && !empty($customer_details_data->mangal_name))?$customer_details_data->mangal_name:''?></span>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Expected caste</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->expected_cast_name) && !empty($customer_details_data->expected_cast_name))?$customer_details_data->expected_cast_name:''?></span>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Preferred City</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->preffered_city_name) && !empty($customer_details_data->preffered_city_name))?$customer_details_data->preffered_city_name:''?></span>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Expected Age Difference</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->age_difference) && !empty($customer_details_data->age_difference))?$customer_details_data->age_difference:''?></span>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Expecteed Education</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->expected_education_name) && !empty($customer_details_data->expected_education_name))?$customer_details_data->expected_education_name:''?></span>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Divorcee</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->divorcee) && !empty($customer_details_data->divorcee))?$customer_details_data->divorcee:''?></span>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Expected Height</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->expected_height) && !empty($customer_details_data->expected_height))?$customer_details_data->expected_height:''?></span>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Expected Income Per Annum</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->expected_income_per_annum) && !empty($customer_details_data->expected_income_per_annum))?$customer_details_data->expected_income_per_annum:''?></span>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane " id="tab_1_22">
                                                    <div class="panel panel-success">
                                                        <div class="panel-heading">Personal Info</div>
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;First Name</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->f_name) && !empty($customer_details_data->f_name))?$customer_details_data->f_name:''?></span>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Middle Name</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->m_name) && !empty($customer_details_data->m_name))?$customer_details_data->m_name:''?></span>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Last name</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->l_name) && !empty($customer_details_data->l_name))?$customer_details_data->l_name:''?></span>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mobile</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->mobile) && !empty($customer_details_data->mobile))?$customer_details_data->mobile:''?></span>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date Of Birth</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->dob) && !empty($customer_details_data->dob))?date('d-m-Y',strtotime($customer_details_data->dob)):''?></span>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->email) && !empty($customer_details_data->email))?$customer_details_data->email:''?></span>
                                                                </div>

                                                                <div class="col-md-3">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Community</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->community_name) && !empty($customer_details_data->community_name))?$customer_details_data->community_name:''?></span>
                                                                </div>

                                                                <div class="col-md-3">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Caste</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->cast_name) && !empty($customer_details_data->cast_name))?$customer_details_data->cast_name:''?></span>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sub Caste</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->sub_caste) && !empty($customer_details_data->sub_caste))?$customer_details_data->sub_caste:''?></span>
                                                                </div>
                                                                
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Height</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->height) && !empty($customer_details_data->height))?$customer_details_data->height:''?></span>
                                                                </div>

                                                                <div class="col-md-3">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Marital Status </p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->marital_name) && !empty($customer_details_data->marital_name))?$customer_details_data->marital_name:''?></span>
                                                                </div>
                                                                <?php if (isset($customer_details_data->marital_status) && !empty($customer_details_data->marital_status) && ($customer_details_data->marital_status!='3') && ($customer_details_data->marital_status!='4') && ($customer_details_data->marital_status!='7')) { ?>

                                                                <div class="col-md-3">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;No. Of Childs </p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->no_of_childs) && !empty($customer_details_data->no_of_childs))?$customer_details_data->no_of_childs:'0'?></span>
                                                                </div>

                                                            <?php  } ?>
                                                            </div>
                                                            <hr>
                                                            
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Weight</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->weight) && !empty($customer_details_data->weight))?$customer_details_data->weight:''?></span>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Blood Group </p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->blood_group) && !empty($customer_details_data->blood_group))?$customer_details_data->blood_group:''?></span>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Complexion</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->complexion_name) && !empty($customer_details_data->complexion_name))?$customer_details_data->complexion_name:''?></span>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Physical Disabilities</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->physical_disability) && !empty($customer_details_data->physical_disability))?$customer_details_data->physical_disability:''?></span>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lens</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->lens) && !empty($customer_details_data->lens))?$customer_details_data->lens:''?></span>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane " id="tab_1_33">
                                                    <div class="panel panel-success">
                                                        <div class="panel-heading">Horoscope Info</div>
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rashi</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->rashi_name) && !empty($customer_details_data->rashi_name))?$customer_details_data->rashi_name:''?></span>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nakshtra </p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->nakshtra_name) && !empty($customer_details_data->nakshtra_name))?$customer_details_data->nakshtra_name:''?></span>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Charan</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->charan_name) && !empty($customer_details_data->charan_name))?$customer_details_data->charan_name:''?></span>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Gan</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->gan_name) && !empty($customer_details_data->gan_name))?$customer_details_data->gan_name:''?></span>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nadi</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->nadi_name) && !empty($customer_details_data->nadi_name))?$customer_details_data->nadi_name:''?></span>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mangal </p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->mangal_name) && !empty($customer_details_data->mangal_name))?$customer_details_data->mangal_name:''?></span>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Birth Place</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->birth_place) && !empty($customer_details_data->birth_place))?$customer_details_data->birth_place:''?></span>
                                                                </div>
                                                                 <div class="col-md-3">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Birth Time</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->birth_time) && !empty($customer_details_data->birth_time))?$customer_details_data->birth_time:''?></span>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Gotra/Devak</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->gotra) && !empty($customer_details_data->gotra))?$customer_details_data->gotra:''?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane " id="tab_1_44">
                                                    <div class="panel panel-success">
                                                        <div class="panel-heading">Educational Info</div>
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Education Area</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->education_name) && !empty($customer_details_data->education_name))?$customer_details_data->education_name:''?></span>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Occupation City </p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->occupation_city_name) && !empty($customer_details_data->occupation_city_name))?$customer_details_data->occupation_city_name:''?></span>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Educational Specification</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->education_specification) && !empty($customer_details_data->education_specification))?$customer_details_data->education_specification:''?></span>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Occupation</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->occupation) && !empty($customer_details_data->occupation))?$customer_details_data->occupation:''?></span>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Income </p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->income) && !empty($customer_details_data->income))?$customer_details_data->income:''?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane " id="tab_1_55">
                                                    <div class="panel panel-success">
                                                        <div class="panel-heading">Address Info</div>
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;PAN/AAdhar/Passport NO</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->document_no) && !empty($customer_details_data->document_no))?$customer_details_data->document_no:''?></span>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Phone I</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->phone) && !empty($customer_details_data->phone))?$customer_details_data->phone:''?></span>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Phone II</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->phone1) && !empty($customer_details_data->phone1))?$customer_details_data->phone1:''?></span>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Permanant Address</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->permanant_address) && !empty($customer_details_data->permanant_address))?$customer_details_data->permanant_address:''?></span>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Residence Address</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->residence_address) && !empty($customer_details_data->residence_address))?$customer_details_data->residence_address:''?></span>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane " id="tab_1_66">
                                                    <div class="panel panel-success">
                                                        <div class="panel-heading">Family Info</div>
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Father</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->father) && !empty($customer_details_data->father))?$customer_details_data->father:''?></span>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Father Full Name</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->father_full_name) && !empty($customer_details_data->father_full_name))?$customer_details_data->father_full_name:''?></span>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mother</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->mother) && !empty($customer_details_data->mother))?$customer_details_data->mother:''?></span>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Parent Residence City</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->parent_residence_city_name) && !empty($customer_details_data->parent_residence_city_name))?$customer_details_data->parent_residence_city_name:''?></span>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Brothers</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->brothers) && !empty($customer_details_data->brothers))?$customer_details_data->brothers:'0'?></span>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Married Brothers</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->married_brothers) && !empty($customer_details_data->married_brothers))?$customer_details_data->married_brothers:'0'?></span>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sisters</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->sisters) && !empty($customer_details_data->sisters))?$customer_details_data->sisters:'0'?></span>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;MArried Sisters</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->married_sisters) && !empty($customer_details_data->married_sisters))?$customer_details_data->married_sisters:''?></span>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Native District</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->native_district_name) && !empty($customer_details_data->native_district_name))?$customer_details_data->native_district_name:''?></span>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Native City</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->native_city_name) && !empty($customer_details_data->native_city_name))?$customer_details_data->native_city_name:''?></span>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Family Wealth</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->family_wealth) && !empty($customer_details_data->family_wealth))?$customer_details_data->family_wealth:''?></span>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Relative Surname </p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->relative_surname) && !empty($customer_details_data->relative_surname))?$customer_details_data->relative_surname:''?></span>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Parent Occupation </p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->parent_occupation) && !empty($customer_details_data->parent_occupation))?$customer_details_data->parent_occupation:''?></span>
                                                                </div>
                                                                 <div class="col-md-2">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Mama Surname </p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->mama_surname) && !empty($customer_details_data->mama_surname))?$customer_details_data->mama_surname:''?></span>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Any Intercast Marriage In Core Family</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->any_intercast_marriage) && !empty($customer_details_data->any_intercast_marriage))?$customer_details_data->any_intercast_marriage:''?></span>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Relation/Cast</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->relation_cast) && !empty($customer_details_data->relation_cast))?$customer_details_data->relation_cast:''?></span>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane " id="tab_1_77">
                                                    <div class="panel panel-success">
                                                        <div class="panel-heading">Expectation</div>
                                                        <div class="panel-body">
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Mangal</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->mangal_name) && !empty($customer_details_data->mangal_name))?$customer_details_data->mangal_name:''?></span>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Expected caste</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->expected_cast_name) && !empty($customer_details_data->expected_cast_name))?$customer_details_data->expected_cast_name:''?></span>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Preferred City</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->preffered_city_name) && !empty($customer_details_data->preffered_city_name))?$customer_details_data->preffered_city_name:''?></span>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Expected Age Difference</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->age_difference) && !empty($customer_details_data->age_difference))?$customer_details_data->age_difference:''?></span>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Expecteed Education</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->expected_education_name) && !empty($customer_details_data->expected_education_name))?$customer_details_data->expected_education_name:''?></span>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-md-2">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Divorcee</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->divorcee) && !empty($customer_details_data->divorcee))?$customer_details_data->divorcee:''?></span>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Expected Height</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->expected_height) && !empty($customer_details_data->expected_height))?$customer_details_data->expected_height:''?></span>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <p style="font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Expected Income Per Annum</p>
                                                                    <span style="color:#3C8DBC; font-weight: 600;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo(isset($customer_details_data->expected_income_per_annum) && !empty($customer_details_data->expected_income_per_annum))?$customer_details_data->expected_income_per_annum:''?></span>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--END TABS-->
                </div>
            </div>
            <!-- END PAGE CONTENT INNER -->
        </div>
    </div>
</div>
<?php $this->load->view('common/footer');?>
<div class="scroll-to-top">
    <i class="icon-arrow-up"></i>
</div>
<script src="<?php echo base_url();?>assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/jquery.cokie.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>
<script src="<?php echo base_url();?>assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/admin/layout3/scripts/layout.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/admin/layout3/scripts/demo.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>assets/global/plugins/bootbox/bootbox.min.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/jquery-validation/js/additional-methods.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/global/plugins/jquery-validation/lib/jquery.form.js"></script>
<script src="<?php echo base_url(); ?>js/common.js"></script>
<script>

jQuery(document).ready(function() { 
   Metronic.init(); // init metronic core components
Layout.init(); // init current layout
Demo.init(); // init demo features
});
</script>
</body>
</html>