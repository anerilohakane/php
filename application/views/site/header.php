<?php 
$customer_id = $this->session->userdata('customer_id'); 
$asd=current_url();
$url1=explode('/',$asd);
$cnt= count($url1);?>
<div class="top-trans " style="position: fixed; width: 100%; z-index: 9;">
    <div class="top-nav-info top-nav-info-two">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 hidden-xs1">
            <div class="top-text"><a href="<?php echo base_url();?>"><img src="<?php echo base_url();?>uploads/favicon.png" style="height: 80px;  margin-left: -25px;" > </a></div>
          </div>
          <div class="col-sm-6 right-navbar-toggle">
            <button type="button" class="navbar-toggle collapsed">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <div class="top-detail text-right">
              <ul style="margin-top: 10px; margin-left: -250px;">
                <li><a href="<?php echo base_url();?>">Home</a></li>
                <?php if(isset($customer_id) && !empty($customer_id))
                {  if($cnt < 5)
                  {?>
                    <li><a class="popup_save1" rev="search_matches">Search</a></li>
                  <?php }?>
                  <li><a href="<?php echo base_url();?>matches" >My Matches</a></li>
                <?php }
                else
                { ?>
                    <li><a  data-toggle="modal" data-target="#login-model">Search</a></li>
                <?php } ?>
                <?php if(isset($customer_id) && !empty($customer_id))
                { ?>
                  <li><a href="<?php echo base_url();?>profile" >Profile</a></li>
                <?php }
                else
                {?>
                  <li><a href="" data-toggle="modal" data-target="#register-model">Register</a></li>

                <?php } ?>
                <li><a href="<?php echo base_url();?>membership_plan">Membership</a>
                </li>
                <li><a href="<?php echo base_url();?>contact_us" >Contact Us</a></li>
                <?php if(isset($customer_id) && !empty($customer_id))
                { $profile_data = $this->common_model->selectDetailsWhr('tbl_customer','customer_id',$customer_id);
                  ?>
                  <!-- <li><a href="<?php echo base_url();?>site_logout" >Logout</a></li> -->
                  <li>
                    <a href="<?php echo base_url();?>profile" class="" >
                    <span class="username username-hide-mobile"><?php echo (isset($profile_data->f_name) && !empty($profile_data->f_name))?'Welcome'.' '.$profile_data->f_name:'';?></span>
                      <img style="height: 55px; width: 55px;" alt="" class="img-circle" src="<?php echo base_url();?>uploads/customer_photo/<?php echo (isset($profile_data->customer_photo) && !empty($profile_data->customer_photo))?$profile_data->customer_photo:'user.png';?>">
                      
                    </a></li>
                    <li><a href="<?php echo base_url();?>site_logout" ><img style="height: 35px; width: 35px;" alt="" class="img-circle" src="<?php echo base_url();?>uploads/off.png"></a></li>
                <?php } 
                else{ ?>
                  <li><a data-toggle="modal" data-target="#login-model">Login</a></li>
                <?php } ?>  
                <!-- <li class="search-btn search-icon text-center">
                  <a href="javascript:void(0)"><i class="fa fa-search" aria-hidden="true"></i></a>
                </li> -->
              </ul>
            </div>
          </div>
        </div>
        <div class="search">
          <div class="container">
            <input type="search" class="search-box" placeholder="Search"/>
            <a href="" class="fa fa-times search-close"></a>
          </div>
        </div>
        <div class="modal fade login-model col-sm-12 col-xs-12" id="login-model" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title text-center">Login</h5>
              </div>
              <div class="modal-body login-model-body text-center">
                <form id="login-form" action="site_login" method="post">
                  <div class="form-group">
                    <input type="text" class="form-control" name="email_id" id="" placeholder="Enter Your Mobile No"/>
                    <input type="password" class="form-control" name="password" id="login_password" placeholder="Enter Your Password"/>
                  </div>
                  <button type="submit" class="btn btn-default common_save">Login</button><br>
                  <h4 style="margin-top: 10px;">Forgot your password ?</h4>
                  <p style="margin-top: -15px;"> no worries, click <a href="javascript:;" class="password_updation1" data-url="site_forgot_pass" style="color: rgb(156,21,25);"> here </a> to reset your password. </p> <hr style=" margin-top: -5px;">
                  <h4>Dont have account ? <a href="javascript:;" data-toggle="modal" data-target="#register-model" style="color: rgb(156,21,25);"> Sign Up  </a></h4>
                </form>
              </div>            
            </div>
          </div>
        </div>
        <div class="modal fade register-model col-sm-12 col-xs-12" id="register-model" role="dialog">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h5 class="modal-title text-center">Register</h5>
              </div>
              <div class="modal-body request-model-body text-center">
                <form id="register-form" action="register" method="post">
                  <div class="row">
                    <div class="form-group">
                      <select class="form-control select2me " name="profile_for" style="margin-bottom: 10px;">
                          <option value="">Profile For</option>
                          <?php if(isset($profile_for) && !empty($profile_for))
                          {
                            foreach ($profile_for as $key) 
                            { ?>
                              <option value="<?php echo $key->profile_id?>" ><?php echo $key->profile_name;?></option>
                            <?php }                             
                          } ?>                            
                      </select>
                      <div class="form-group">
                        <input type="text" class="form-control" name="f_name" id="reg_fname" placeholder="Enter First Name"/>
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" name="m_name" id="reg_mname" placeholder="Enter Middle Name"/>
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" name="l_name" id="reg_lmname" placeholder="Enter Last Name"/>
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" name="email_id"  placeholder="Enter Your Email"/>
                      </div>
                      <div class="form-group">
                        <input type="text" class="form-control" name="mobile_no" id="reg_mobile" placeholder="Enter Your Mobile"/>
                      </div>

                      <select class="form-control select2me " name="community_for" style="margin-bottom: 10px;">
                          <option value="">Community For</option>
                          <?php if(isset($community_for) && !empty($community_for))
                          {
                            foreach ($community_for as $key) 
                            { ?>
                              <option value="<?php echo $key->community_id?>" ><?php echo $key->community_name;?></option>
                            <?php }                             
                          } ?>                            
                      </select>
                      <div class="form-group">
                        <div class="radio-list" style="text-align: left;margin-bottom: 30px;">
                          <label>Gender<span class="require" aria-required="true" style="color:red">*</span></label>
                          <label class="radio-inline">
                            <input style="margin-left: 10px; margin-top: 20px;" type="radio" name="gender" id="male" class="gender" value="Male"   > Male 
                          </label>
                          <label class="radio-inline">
                            <input style="margin-left: 20px; margin-top: 20px;" type="radio" name="gender" id="female" class="gender" value="Female" > Female
                          </label>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="input-group date  date2" data-date-end-date="0d" data-date-format="dd-mm-yyyy">
                          <input type="text" id="from_date" name="dob"  class="form-control " value="<?php echo(isset($single_success_story_data->date) && !empty($single_success_story_data->date))?date('d-M-Y',strtotime($single_success_story_data->date)):''?>" readonly placeholder="Date Of Birth">
                          <span class="input-group-btn">
                            <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                          </span>
                        </div>
                      </div>
                      <div class="form-group">
                        <input type="password" class="form-control" name="password" id="reg_password" placeholder="Enter Your Password"/>
                      </div>
                      <div class="form-group">
                        <input type="password" class="form-control" name="confirm_password" id="reg_confirm-password" placeholder="Confirm Your Password"/>
                      </div>
                        <div class="form-group">
                            <span><input style="float: left; margin-top: -8px;" type="checkbox" value="Yes" id="term_condition" name='term_condition' class="term_condition" <?php echo(!isset($employee_data->gender))?'checked':'' ?> ></span><span style="float: left;margin-left: 10px;"> I accept <a href="<?php echo base_url();?>term_condition_details" target="_blank" style="color: rgb(156,21,25)">term & condition</a> </span>
                        </div> <br>
                        <small>Payments are processed through Atom Technologies Ltd, for more details visit- <a href="https://www.atomtech.in">www.atomtech.in</a></small>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-default common_save">Register</button>
                </form>
              </div>            
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>