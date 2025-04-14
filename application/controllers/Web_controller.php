<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Web_controller extends CI_Controller
{
  public function __construct()
  { 
    parent::__construct();
    date_default_timezone_set("Asia/Kolkata"); 
    $this->load->model('web_model');   
    $this->load->model('admin_model');   
    $this->load->model('common_model');   
    $this->load->model('web_model');   
    $this->load->library('TransactionResponse'); 

  } 

  public function get_slider()
  {
    $slider_data=$this->common_model->fetchDataDESC('tbl_slider','slider_id');
    if($slider_data) 
    {  
      $json = array("json_data"=>$slider_data);
      echo json_encode($json);
    }
    else
    {
      $json = array("json_data"=>"Data Not Available.");
      echo json_encode($json);
    } 
  }

  public function app_sign_in()
  {
    $data = json_decode(file_get_contents('php://input'),true);
    $username=(isset($data['username']) && !empty($data['username']))?$data['username']:'';
    $password=(isset($data['password']) && !empty($data['password']))?$data['password']:'';

    $user_data = $this->web_model->user_login($username,$password);
    if($user_data)
    {
      $json = array("status" => true,"msg"=>"Login Successfully","user_data"=>$user_data);
    }
    else
    {
      $json = array("status" => false,"msg"=>"Invalid User");
    }
    echo json_encode($json);
  }

  /*public function app_sign_in()
  {
    $data = json_decode(file_get_contents('php://input'),true);
    $username=(isset($data['username']) && !empty($data['username']))?$data['username']:'';
    $password=(isset($data['password']) && !empty($data['password']))?$data['password']:'';

    $user_data = $this->web_model->user_login($username,$password);
   
        // check membership validity
        if($user_data->membership_status=='Active') {

          $day = $user_data->membership_validity;
          $date1 = strtotime($user_data->membership_from);

          $date2 = strtotime("+".$day." day", $date1);
          $form_date=date('d-m-Y', $date2);
          $to_date=date('d-m-Y');          

          if($form_date >= $to_date) { 
            //echo 'hi';
            $data=array('membership_status'=>'Deactive');
            $result=$this->common_model->updateDetails('tbl_customer','customer_id',$user_data->customer_id,$data);
          }
        }

    if($user_data)
    {
      $json = array("status" => true,"msg"=>"Login Successfully","user_data"=>$user_data);
    }
    else
    {
      $json = array("status" => false,"msg"=>"Invalid User");
    }
    echo json_encode($json);
  }*/

  public function app_sign_up()
  {
    $data = json_decode(file_get_contents('php://input'),true);
    $f_name=(isset($data['f_name']) && !empty($data['f_name']))?$data['f_name']:'';
    $m_name=(isset($data['m_name']) && !empty($data['m_name']))?$data['m_name']:'';
    $l_name=(isset($data['l_name']) && !empty($data['l_name']))?$data['l_name']:'';
    $email_id=(isset($data['email_id']) && !empty($data['email_id']))?$data['email_id']:'';
    $mobile_no=(isset($data['mobile_no']) && !empty($data['mobile_no']))?$data['mobile_no']:'';
    $profile_for=(isset($data['profile_for']) && !empty($data['profile_for']))?$data['profile_for']:'';
    $dob=(isset($data['dob']) && !empty($data['dob']))?$data['dob']:'';
    $gender=(isset($data['gender']) && !empty($data['gender']))?$data['gender']:'';
    if($gender==0)
    {
      $gender='Male';
    }
    else
    {
      $gender='Female';
    }
    $password=(isset($data['password']) && !empty($data['password']))?$data['password']:'';
    $confirm_password=(isset($data['confirm_password']) && !empty($data['confirm_password']))?$data['confirm_password']:'';
    $otp = mt_rand(1000, 9999);
    if(isset($dob) && !empty($dob)) {$dob1=date('Y-m-d',strtotime($dob)); } else {$dob1='0000-00-00'; }

    $email_data = $this->common_model->selectDetailsWhr('tbl_customer','email',$email_id);
    $email_data1 = $this->common_model->selectDetailsWhr('tbl_customer','mobile',$mobile_no);
    $data['cust_data'] = $this->common_model->fetchDataDESClimit('tbl_customer','customer_id','1');
    if(isset($data['cust_data']) && !empty($data['cust_data']))
    {
        $cust_id=$data['cust_data'][0]->customer_id+1;
    }
    else
    {
       $cust_id=1; 
    }
    $sh='SH';    
    $random = rand(10000,99999);
    $profile_code=$sh.$cust_id.$random;

    $data = array('profile_code'=>$profile_code,'f_name'=>$f_name,'m_name'=>$m_name,'l_name'=>$l_name,'email'=>$email_id,'mobile'=>$mobile_no,'password'=>$password,'otp'=>$otp,'profile_for'=>$profile_for,'dob'=>$dob1,'gender'=>$gender);
    if((isset($email_data) && !empty($email_data)) || (isset($email_data1) && !empty($email_data1)))
    {
      $json = array("status" => false,"msg"=>"User Already Register With Us.");
    }
    else
    {
      if($password==$confirm_password)
      {
        $result =  $this->common_model->addData('tbl_customer',$data);
        if($result)
        {
          $userdata =$this->common_model->selectDetailsWhr('tbl_customer','customer_id',$result);
          //$message = 'Hi '.$userdata->f_name.' Welcome to Shivbandhan. Your OTP is '.$otp;
          $message = "Dear User,
Your one time password is : $otp.
Thank You,
Team Shivbandhan.";
          $template_id='1207165839071359752';
          sendSms($userdata->mobile,$message,$template_id);
          $json = array("status" => true,"msg"=>"Register Successfully","user_data"=>$userdata);
        }
        else
        {
          $json = array("status" => false,"msg"=>"Error While Registering.");
        }
      }
      else
      {
        $json = array("status" => false,"msg"=>"You Enterd Wrong Password");
      }
    }
    echo json_encode($json);
  }

  public function app_sign_up_new()
  {
    $data = json_decode(file_get_contents('php://input'),true);
    $f_name=(isset($data['f_name']) && !empty($data['f_name']))?$data['f_name']:'';
    $m_name=(isset($data['m_name']) && !empty($data['m_name']))?$data['m_name']:'';
    $l_name=(isset($data['l_name']) && !empty($data['l_name']))?$data['l_name']:'';
    $email_id=(isset($data['email_id']) && !empty($data['email_id']))?$data['email_id']:'';
    $mobile_no=(isset($data['mobile_no']) && !empty($data['mobile_no']))?$data['mobile_no']:'';
    $profile_for=(isset($data['profile_for']) && !empty($data['profile_for']))?$data['profile_for']:'';
    $community_id=(isset($data['community_id']) && !empty($data['community_id']))?$data['community_id']:'';
    $dob=(isset($data['dob']) && !empty($data['dob']))?$data['dob']:'';
    $gender=(isset($data['gender']) && !empty($data['gender']))?$data['gender']:'';
    if($gender==0)
    {
      $gender='Male';
    }
    else
    {
      $gender='Female';
    }
    $password=(isset($data['password']) && !empty($data['password']))?$data['password']:'';
    $confirm_password=(isset($data['confirm_password']) && !empty($data['confirm_password']))?$data['confirm_password']:'';
    $otp = mt_rand(1000, 9999);
    if(isset($dob) && !empty($dob)) {$dob1=date('Y-m-d',strtotime($dob)); } else {$dob1='0000-00-00'; }

    $email_data = $this->common_model->selectDetailsWhr('tbl_customer','email',$email_id);
    $email_data1 = $this->common_model->selectDetailsWhr('tbl_customer','mobile',$mobile_no);
    $data['cust_data'] = $this->common_model->fetchDataDESClimit('tbl_customer','customer_id','1');
    if(isset($data['cust_data']) && !empty($data['cust_data']))
    {
        $cust_id=$data['cust_data'][0]->customer_id+1;
    }
    else
    {
       $cust_id=1; 
    }
    $sh='SH';    
    $random = rand(10000,99999);
    $profile_code=$sh.$cust_id.$random;

    $data = array('profile_code'=>$profile_code,'f_name'=>$f_name,'m_name'=>$m_name,'l_name'=>$l_name,'email'=>$email_id,'mobile'=>$mobile_no,'password'=>$password,'otp'=>$otp,'profile_for'=>$profile_for,'community'=>$community_id,'dob'=>$dob1,'gender'=>$gender);
    if((isset($email_data) && !empty($email_data)) || (isset($email_data1) && !empty($email_data1)))
    {
      $json = array("status" => false,"msg"=>"User Already Register With Us.");
    }
    else
    {
      if($password==$confirm_password)
      {
        $result =  $this->common_model->addData('tbl_customer',$data);
        if($result)
        {
          $userdata =$this->common_model->selectDetailsWhr('tbl_customer','customer_id',$result);
          //$message = 'Hi '.$userdata->f_name.' Welcome to Shivbandhan. Your OTP is '.$otp;
          $message = "Dear User,
Your one time password is : $otp.
Thank You,
Team Shivbandhan.";
$template_id='1207165839071359752';
          sendSms($userdata->mobile,$message,$template_id);
          $json = array("status" => true,"msg"=>"Register Successfully","user_data"=>$userdata);
        }
        else
        {
          $json = array("status" => false,"msg"=>"Error While Registering.");
        }
      }
      else
      {
        $json = array("status" => false,"msg"=>"You Enterd Wrong Password");
      }
    }
    echo json_encode($json);
  }

  public function resend_otp()
  {
    $data = json_decode(file_get_contents('php://input'),true);
    $user_id=(isset($data['user_id']) && !empty($data['user_id']))?$data['user_id']:'';
    $user_data = $this->common_model->selectDetailsWhr("tbl_customer","customer_id",$user_id);
    $otp = mt_rand(1000, 9999);
    $data = array('otp'=>$otp);
    if($user_data)
    {
       $result=$this->common_model->updateDetails('tbl_customer','customer_id',$user_id,$data);
        if($result)
        {
            //$message = 'Hi '.$user_data->f_name.' Welcome to Shivbandhan. Your OTP is '.$otp;
            $message = "Dear User,
Your one time password is : $otp.
Thank You,
Team Shivbandhan.";
$template_id='1207165839071359752';
            sendSms($user_data->mobile,$message,$template_id);
            $json = array("status" => true,"msg"=>"OTP Send Successfully");
        }
        else
        {
           $json = array("status" => false,"msg"=>"Error While Sending OTP.");
        }
        echo json_encode($json);
    }
    else
    {
      $json = array("status" => false,"msg"=>"Not A Valid User.");
    }
  }

  public function get_user_details()
  {
      $data = json_decode(file_get_contents('php://input'),true);  
      $user_id=(isset($data['user_id']) && !empty($data['user_id']))?$data['user_id']:'';
      if($user_id)
      {
        $single_user_data=$this->admin_model->fetch_customer_details($user_id);  
          
        $json = array("json_data"=>$single_user_data);
        echo json_encode($json);
      }
      else
      {
        $json = array("json_data"=>"user ID not set.");
        echo json_encode($json);
      } 
  }

  public function get_all_details()
  {
    $profile_data=$this->common_model->fetchDataDESC('tbl_profile','profile_id');
    $rashi_data=$this->common_model->fetchDataDESC('tbl_rashi','rashi_id');
    $cast_data=$this->common_model->fetchDataDESC('tbl_cast','cast_id');
    $sub_cast_data=$this->common_model->fetchDataDESC('tbl_sub_cast','sub_cast_id');
    $charan_data=$this->common_model->fetchDataDESC('tbl_charan','charan_id');
    $mangal_data=$this->common_model->fetchDataDESC('tbl_mangal','mangal_id');
    $community_data=$this->common_model->fetchDataDESC('tbl_community','community_id');
    $complexion_data=$this->common_model->fetchDataDESC('tbl_complexion','complexion_id');
    $education_data=$this->common_model->fetchDataDESC('tbl_education','education_id');
    $gan_data=$this->common_model->fetchDataDESC('tbl_gan','gan_id');
    $marital_data=$this->common_model->fetchDataDESC('tbl_marital','marital_id');
    $nadi_data=$this->common_model->fetchDataDESC('tbl_nadi','nadi_id');
    $nakshtra_data=$this->common_model->fetchDataDESC('tbl_nakshtra','nakshtra_id');
    
    $json = array("profile_data"=>$profile_data,"rashi_data"=>$rashi_data,"cast_data"=>$cast_data,"sub_cast_data"=>$sub_cast_data,"charan_data"=>$charan_data,"mangal_data"=>$mangal_data,"community_data"=>$community_data,"nakshtra_data"=>$nakshtra_data,"complexion_data"=>$complexion_data,"education_data"=>$education_data,"gan_data"=>$gan_data,"marital_data"=>$marital_data,"nadi_data"=>$nadi_data,);
    echo json_encode($json);
  }

  public function get_profile_details()
  {
    $profile_data=$this->common_model->fetchDataDESC('tbl_profile','profile_id');
    if($profile_data) 
    {  
      $json = array("profile_data"=>$profile_data,);
      echo json_encode($json);
    }
    else
    {
      $json = array("json_data"=>"Data Not Available.");
      echo json_encode($json);
    } 
  }

  public function get_rashi_details()
  {
    $rashi_data=$this->common_model->fetchDataDESC('tbl_rashi','rashi_id');
    if($rashi_data) 
    {  
      $json = array("json_data"=>$rashi_data);
      echo json_encode($json);
    }
    else
    {
      $json = array("json_data"=>"Data Not Available.");
      echo json_encode($json);
    } 
  }

  public function get_cast_details()
  {
    $cast_data=$this->common_model->fetchDataDESC('tbl_cast','cast_id');
    if($cast_data) 
    {  
      $json = array("json_data"=>$cast_data);
      echo json_encode($json);
    }
    else
    {
      $json = array("json_data"=>"Data Not Available.");
      echo json_encode($json);
    } 
  }

  public function get_sub_cast_details()
  {
    $sub_cast_data=$this->common_model->fetchDataDESC('tbl_sub_cast','sub_cast_id');
    if($sub_cast_data) 
    {  
      $json = array("json_data"=>$sub_cast_data);
      echo json_encode($json);
    }
    else
    {
      $json = array("json_data"=>"Data Not Available.");
      echo json_encode($json);
    } 
  }

  public function get_charan_details()
  {
    $charan_data=$this->common_model->fetchDataDESC('tbl_charan','charan_id');
    if($charan_data) 
    {  
      $json = array("json_data"=>$charan_data);
      echo json_encode($json);
    }
    else
    {
      $json = array("json_data"=>"Data Not Available.");
      echo json_encode($json);
    } 
  }

  public function get_mangal_details()
  {
    $mangal_data=$this->common_model->fetchDataDESC('tbl_mangal','mangal_id');
    if($mangal_data) 
    {  
      $json = array("json_data"=>$mangal_data);
      echo json_encode($json);
    }
    else
    {
      $json = array("json_data"=>"Data Not Available.");
      echo json_encode($json);
    } 
  }

  public function get_city_details()
  {
    $city_data=$this->common_model->fetchDataDESC('tbl_city','city_id');
    if($city_data) 
    {  
      $json = array("json_data"=>$city_data);
      echo json_encode($json);
    }
    else
    {
      $json = array("json_data"=>"Data Not Available.");
      echo json_encode($json);
    } 
  }

  public function get_community_details()
  {
    $community_data=$this->common_model->fetchDataDESC('tbl_community','community_id');
    if($community_data) 
    {  
      $json = array("json_data"=>$community_data);
      echo json_encode($json);
    }
    else
    {
      $json = array("json_data"=>"Data Not Available.");
      echo json_encode($json);
    } 
  }

  public function get_complexion_details()
  {
    $complexion_data=$this->common_model->fetchDataDESC('tbl_complexion','complexion_id');
    if($complexion_data) 
    {  
      $json = array("json_data"=>$complexion_data);
      echo json_encode($json);
    }
    else
    {
      $json = array("json_data"=>"Data Not Available.");
      echo json_encode($json);
    } 
  }

  public function get_education_details()
  {
    $education_data=$this->common_model->fetchDataDESC('tbl_education','education_id');
    if($education_data) 
    {  
      $json = array("json_data"=>$education_data);
      echo json_encode($json);
    }
    else
    {
      $json = array("json_data"=>"Data Not Available.");
      echo json_encode($json);
    } 
  }

  public function get_gan_details()
  {
    $gan_data=$this->common_model->fetchDataDESC('tbl_gan','gan_id');
    if($gan_data) 
    {  
      $json = array("json_data"=>$gan_data);
      echo json_encode($json);
    }
    else
    {
      $json = array("json_data"=>"Data Not Available.");
      echo json_encode($json);
    } 
  }

  public function get_marital_details()
  {
    $marital_data=$this->common_model->fetchDataDESC('tbl_marital','marital_id');
    if($marital_data) 
    {  
      $json = array("json_data"=>$marital_data);
      echo json_encode($json);
    }
    else
    {
      $json = array("json_data"=>"Data Not Available.");
      echo json_encode($json);
    } 
  }

  public function get_nadi_details()
  {
    $nadi_data=$this->common_model->fetchDataDESC('tbl_nadi','nadi_id');
    if($nadi_data) 
    {  
      $json = array("json_data"=>$nadi_data);
      echo json_encode($json);
    }
    else
    {
      $json = array("json_data"=>"Data Not Available.");
      echo json_encode($json);
    } 
  }

  public function get_nakshtra_details()
  {
    $nakshtra_data=$this->common_model->fetchDataDESC('tbl_nakshtra','nakshtra_id');
    if($nakshtra_data) 
    {  
      $json = array("json_data"=>$nakshtra_data);
      echo json_encode($json);
    }
    else
    {
      $json = array("json_data"=>"Data Not Available.");
      echo json_encode($json);
    } 
  }

  public function update_user()
  {
    $data = json_decode(file_get_contents('php://input'),true);
    $id=(isset($data['user_id']) && !empty($data['user_id']))?$data['user_id']:'';
    $stepNum=(isset($data['stepNum']) && !empty($data['stepNum']))?$data['stepNum']:'';
    $f_name=(isset($data['f_name']) && !empty($data['f_name']))?$data['f_name']:'';
    $m_name=(isset($data['m_name']) && !empty($data['m_name']))?$data['m_name']:'';
    $l_name=(isset($data['l_name']) && !empty($data['l_name']))?$data['l_name']:'';
    $email=(isset($data['email']) && !empty($data['email']))?$data['email']:'';
    $mobile=(isset($data['mobile']) && !empty($data['mobile']))?$data['mobile']:'';
    $dob=(isset($data['dob']) && !empty($data['dob']))?$data['dob']:'';
    $marital_status=(isset($data['marital_status']) && !empty($data['marital_status']))?$data['marital_status']:'';
    $caste=(isset($data['caste']) && !empty($data['caste']))?$data['caste']:'';
    $sub_caste=(isset($data['sub_caste']) && !empty($data['sub_caste']))?$data['sub_caste']:'';
    $height=(isset($data['height']) && !empty($data['height']))?$data['height']:'';
    $weight=(isset($data['weight']) && !empty($data['weight']))?$data['weight']:'';
    $blood_group=(isset($data['blood_group']) && !empty($data['blood_group']))?$data['blood_group']:'';
    $complexion=(isset($data['complexion']) && !empty($data['complexion']))?$data['complexion']:'';
    $physical_disability=(isset($data['physical_disability']) && !empty($data['physical_disability']))?$data['physical_disability']:'';
    $lens=(isset($data['lens']) && !empty($data['lens']))?$data['lens']:'';

    $rashi=(isset($data['rashi']) && !empty($data['rashi']))?$data['rashi']:'';
    $nakshtra=(isset($data['nakshtra']) && !empty($data['nakshtra']))?$data['nakshtra']:'';
    $charan=(isset($data['charan']) && !empty($data['charan']))?$data['charan']:'';
    $gan=(isset($data['gan']) && !empty($data['gan']))?$data['gan']:'';
    $nadi=(isset($data['nadi']) && !empty($data['nadi']))?$data['nadi']:'';
    $mangal=(isset($data['mangal']) && !empty($data['mangal']))?$data['mangal']:'';
    $birth_place=(isset($data['birth_place']) && !empty($data['birth_place']))?$data['birth_place']:'';
    $birth_time=(isset($data['birth_time']) && !empty($data['birth_time']))?$data['birth_time']:'';
    $gotra=(isset($data['gotra']) && !empty($data['gotra']))?$data['gotra']:'';

    $education=(isset($data['education']) && !empty($data['education']))?$data['education']:'';
    $occupation_city=(isset($data['occupation_city']) && !empty($data['occupation_city']))?$data['occupation_city']:'';
    $education_specification=(isset($data['education_specification']) && !empty($data['education_specification']))?$data['education_specification']:'';
    $occupation=(isset($data['occupation']) && !empty($data['occupation']))?$data['occupation']:'';
    $income=(isset($data['income']) && !empty($data['income']))?$data['income']:'';

    $document_no=(isset($data['document_no']) && !empty($data['document_no']))?$data['document_no']:'';
    $phone=(isset($data['phone']) && !empty($data['phone']))?$data['phone']:'';
    $phone1=(isset($data['phone1']) && !empty($data['phone1']))?$data['phone1']:'';
    $permanant_address=(isset($data['permanant_address']) && !empty($data['permanant_address']))?$data['permanant_address']:'';
    $residence_address=(isset($data['residence_address']) && !empty($data['residence_address']))?$data['residence_address']:'';

    $father=(isset($data['father']) && !empty($data['father']))?$data['father']:'';
    $father_full_name=(isset($data['father_full_name']) && !empty($data['father_full_name']))?$data['father_full_name']:'';
    $mother=(isset($data['mother']) && !empty($data['mother']))?$data['mother']:'';
    $parent_residence_city=(isset($data['parent_residence_city']) && !empty($data['parent_residence_city']))?$data['parent_residence_city']:'';
    $brothers=(isset($data['brothers']) && !empty($data['brothers']))?$data['brothers']:'';
    $married_brothers=(isset($data['married_brothers']) && !empty($data['married_brothers']))?$data['married_brothers']:'';
    $sisters=(isset($data['sisters']) && !empty($data['sisters']))?$data['sisters']:'';
    $married_sisters=(isset($data['married_sisters']) && !empty($data['married_sisters']))?$data['married_sisters']:'';
    $relative_surname=(isset($data['relative_surname']) && !empty($data['relative_surname']))?$data['relative_surname']:'';
    $parent_occupation=(isset($data['parent_occupation']) && !empty($data['parent_occupation']))?$data['parent_occupation']:'';
    $mama_surname=(isset($data['mama_surname']) && !empty($data['mama_surname']))?$data['mama_surname']:'';
    $native_city=(isset($data['native_city']) && !empty($data['native_city']))?$data['native_city']:'';
    $native_district=(isset($data['native_district']) && !empty($data['native_district']))?$data['native_district']:'';
    $family_wealth=(isset($data['family_wealth']) && !empty($data['family_wealth']))?$data['family_wealth']:'';
    $any_intercast_marriage=(isset($data['any_intercast_marriage']) && !empty($data['any_intercast_marriage']))?$data['any_intercast_marriage']:'';
    $relation_cast=(isset($data['relation_cast']) && !empty($data['relation_cast']))?$data['relation_cast']:'';

    $expected_mangal=(isset($data['expected_mangal']) && !empty($data['expected_mangal']))?$data['expected_mangal']:'';
    $expected_cast=(isset($data['expected_cast']) && !empty($data['expected_cast']))?$data['expected_cast']:'';
    $preffered_city=(isset($data['preffered_city']) && !empty($data['preffered_city']))?$data['preffered_city']:'';
    $age_difference=(isset($data['age_difference']) && !empty($data['age_difference']))?$data['age_difference']:'';
    $expected_height=(isset($data['expected_height']) && !empty($data['expected_height']))?$data['expected_height']:'';
    $divorcee=(isset($data['divorcee']) && !empty($data['divorcee']))?$data['divorcee']:'';
    $expected_education=(isset($data['expected_education']) && !empty($data['expected_education']))?$data['expected_education']:'';
    $expected_income_per_annum=(isset($data['expected_income_per_annum']) && !empty($data['expected_income_per_annum']))?$data['expected_income_per_annum']:'';
    $rand_no='';
    $base64=(isset($data['user_photo']) && !empty($data['user_photo']))?$data['user_photo']:'';
    if($base64)
    {
      $rand_no = 'user_'.(rand(10,1000));
      $rand_no=$rand_no.'.jpg';
      $path='./uploads/customer_photo/'.$rand_no;
      $decoded = base64_decode($base64);
      file_put_contents($path,$decoded);
    }
    
    if(isset($dob) && !empty($dob)) {$dob1=date('Y-m-d',strtotime($dob)); } else {$dob1='0000-00-00'; }
    $cur_date=date('Y-m-d H:i:s');

    $data = array('f_name'=>$f_name,'m_name'=>$m_name,'l_name'=>$l_name,'email'=>$email,'mobile'=>$mobile,'dob'=>$dob1,'marital_status'=>$marital_status,'caste'=>$caste,'sub_caste'=>$sub_caste,'height'=>$height,'weight'=>$weight,'blood_group'=>$blood_group,'complexion'=>$complexion,'physical_disability'=>$physical_disability,'lens'=>$lens,'rashi'=>$rashi,'nakshtra'=>$nakshtra,'charan'=>$charan,'gan'=>$gan,'nadi'=>$nadi,'mangal'=>$mangal,'birth_place'=>$birth_place,'birth_time'=>$birth_time,'gotra'=>$gotra,'education'=>$education,'occupation_city'=>$occupation_city,'education_specification'=>$education_specification,'occupation'=>$occupation,'income'=>$income,'document_no'=>$document_no,'phone'=>$phone,'phone1'=>$phone1,'permanant_address'=>$permanant_address,'residence_address'=>$residence_address,'father'=>$father,'father_full_name'=>$father_full_name,'mother'=>$mother,'parent_residence_city'=>$parent_residence_city,'brothers'=>$brothers,'married_brothers'=>$married_brothers,'sisters'=>$sisters,'married_sisters'=>$married_sisters,'mama_surname'=>$mama_surname,'relative_surname'=>$relative_surname,'parent_occupation'=>$parent_occupation,'native_city'=>$native_city,'native_district'=>$native_district,'family_wealth'=>$family_wealth,'any_intercast_marriage'=>$any_intercast_marriage,'relation_cast'=>$relation_cast,'expected_mangal'=>$expected_mangal,'expected_cast'=>$expected_cast,'preffered_city'=>$preffered_city,'age_difference'=>$age_difference,'expected_height'=>$expected_height,'divorcee'=>$divorcee,'expected_education'=>$expected_education,'expected_income_per_annum'=>$expected_income_per_annum,'customer_photo'=>$rand_no,'form_status'=>$stepNum,'created_by'=>$id,'form_status'=>$stepNum);

    $cust_data=$this->common_model->selectDetailsWhr('tbl_customer','customer_id',$id);
    if(isset($stepNum) && !empty($stepNum))
    {
        if(isset($id) && !empty($id) && ($id>0))
        {
            if($stepNum==1)
            {
                if(isset($cust_data) && !empty($cust_data) && $cust_data->form_status < 2)
                {
                    $data['form_status'] = '1';
                }
                $result = $this->common_model->updateDetails('tbl_customer','customer_id',$id,$data);
                $user_data=$this->common_model->selectDetailsWhr('tbl_customer','customer_id',$id);
                $json = array("status" => true,"msg"=>"Step 1 Details Saved Successfully","user_data"=>$user_data);
            }
            if($stepNum==2)
            {   
                
                if(isset($cust_data) && !empty($cust_data) && $cust_data->form_status < 3)
                {
                    $data['form_status'] = '2';
                }
                $result = $this->common_model->updateDetails('tbl_customer','customer_id',$id,$data);
                $user_data=$this->common_model->selectDetailsWhr('tbl_customer','customer_id',$id);
                $json = array("status" => true,"msg"=>"Step 2 Details Saved Successfully","user_data"=>$user_data);
            }
            if($stepNum==3)
            {
                if(isset($cust_data) && !empty($cust_data) && $cust_data->form_status < 4)
                {
                    $data['form_status'] = '3';
                }
                $result = $this->common_model->updateDetails('tbl_customer','customer_id',$id,$data);
                $user_data=$this->common_model->selectDetailsWhr('tbl_customer','customer_id',$id);
                $json = array("status" => true,"msg"=>"Step 3 Details Saved Successfully","user_data"=>$user_data);   
            }
            if($stepNum==4)
            {
                if(isset($cust_data) && !empty($cust_data) && $cust_data->form_status < 5)
                {
                    $data['form_status'] = '4';
                }
                $result = $this->common_model->updateDetails('tbl_customer','customer_id',$id,$data);
                $user_data=$this->common_model->selectDetailsWhr('tbl_customer','customer_id',$id);
                $json = array("status" => true,"msg"=>"Step 4 Details Saved Successfully","user_data"=>$user_data);
            }
            if($stepNum==5)
            {
                
                if(isset($cust_data) && !empty($cust_data) && $cust_data->form_status < 6)
                {
                    $data['form_status'] = '5';
                }
                $result = $this->common_model->updateDetails('tbl_customer','customer_id',$id,$data);
                $user_data=$this->common_model->selectDetailsWhr('tbl_customer','customer_id',$id);
                $json = array("status" => true,"msg"=>"Step 5 Details Saved Successfully","user_data"=>$user_data);
            }
            if($stepNum==6)
            {
                $data['form_status'] = '6';
                $result = $this->common_model->updateDetails('tbl_customer','customer_id',$id,$data);
                $user_data=$this->common_model->selectDetailsWhr('tbl_customer','customer_id',$id);
                $json = array("status" => true,"msg"=>"Step 6 Details Saved Successfully","user_data"=>$user_data);
            }
            else
            {
                if($result)  
                {
                  $user_data=$this->common_model->selectDetailsWhr('tbl_customer','customer_id',$id);
                  $json = array("status" => true,"msg"=>" Details Saved Successfully","user_data"=>$user_data);
                }
                else
                { 
                  $json = array("status" => false,"msg"=>"Error While Saving Details.");
                }
            }               
        }
        else
        {
            $json = array("status" => false,"msg"=>"Not a Valid User.");
        }   
    }
    else
    {
        $json = array("status" => false,"msg"=>"Not a Valid User.");
    }
    echo json_encode($json);
  }
  public function upload_image_profile()
  {
   /*$data = json_decode(file_get_contents('php://input'),true);
    echo $user_id=(isset($data['user_id']) && !empty($data['user_id']))?$data['user_id']:'';
    echo $customer_photo=(isset($data['user_photo']) && !empty($data['user_photo']))?$data['user_photo']:''; */
    $user_id= $this->input->post('user_id');
     $customer_photo= $this->input->post('user_photo');
    //print_r($_FILES);
    $customer_photo='';
    $error='';
    if(isset($_FILES['user_photo']['name']))//Code for to take image from form and check isset
    {
      $customer_photo=$_FILES['user_photo']['name']; //here [] name attribute
      $customer_photo_Img = array('upload_path' =>'./uploads/customer_photo/',
             'fieldname' => 'user_photo',
             'encrypt_name' => TRUE,        
             'overwrite' => FALSE,
             'allowed_types' => 'png|PNG|jpg|JPG|jpeg|JPEG' );
      $customer_photo_img = $this->imageupload->image_upload($customer_photo_Img);
      $error= $this->upload->display_errors();
      if(isset($customer_photo_img) && !empty($customer_photo_img))
      {
        $empData = $this->upload->data(); 
        $customer_photo = $empData['file_name'];
      }
    }
   $data = array('customer_photo'=>$customer_photo);
   $result = $this->common_model->updateDetails('tbl_customer','customer_id',$user_id,$data);
    if(isset($result) && !empty($result))
    {
      $json = array("status" => true,"msg"=>"Image Uploaded Successfully");
    }
    else
    {
      $json = array("status" => false,"msg"=>"Error While Uploading Image.");
    }
    echo json_encode($json);
  }

  public function get_privacy()
  {
    $privacy_data=$this->common_model->fetchDataDESC('tbl_privacy','privacy_id');
    if($privacy_data) 
    {  
      $json = array("json_data"=>$privacy_data);
      echo json_encode($json);
    }
    else
    {
      $json = array("json_data"=>"Data Not Available.");
      echo json_encode($json);
    } 
  }

  public function get_term_condition()
  {
    $term_condition_data=$this->common_model->fetchDataDESC('tbl_terms_condition','term_condition_id');
    if($term_condition_data) 
    {  
      $json = array("json_data"=>$term_condition_data);
      echo json_encode($json);
    }
    else
    {
      $json = array("json_data"=>"Data Not Available.");
      echo json_encode($json);
    } 
  }

  public function save_contact_us()
  {
    $data = json_decode(file_get_contents('php://input'),true);
    $yourname=(isset($data['yourname']) && !empty($data['yourname']))?$data['yourname']:'';
    $phone=(isset($data['phone']) && !empty($data['phone']))?$data['phone']:'';
    $email=(isset($data['email']) && !empty($data['email']))?$data['email']:'';
    $subject=(isset($data['subject']) && !empty($data['subject']))?$data['subject']:'';
    $message=(isset($data['message']) && !empty($data['message']))?$data['message']:'';

    $data = array('contact_name'=>$yourname,'contact_phone'=>$phone,'contact_email'=>$email,'contact_subject'=>$subject,'contact_message'=>$message);
    $result =  $this->common_model->addData('tbl_contact',$data);

    if(isset($result) && !empty($result))
    {
      $json = array("status" => true,"msg"=>"Contact Details Saved Successfully.");
    }
    else
    {
      $json = array("status" => false,"msg"=>"Error While Saving Details.");
    }
    echo json_encode($json);
  }

  public function app_forgot_pass()
  {
    $data = json_decode(file_get_contents('php://input'),true);
    $mobile=(isset($data['email']) && !empty($data['email']))?$data['email']:'';
    
    $password=mt_rand(100000,999999);

    $userData = $this->common_model->selectDetailsWhr('tbl_customer','mobile',$mobile);
    if(isset($userData) && !empty($userData))
    {   
        $user_id=$userData->customer_id;

        $user_data=array('password'=>$password);
        if($userData->email)
        {
           $email=$userData->email;
        }
        else
        {
            $email='';
        }
        //$message= 'Dear User Your Shivbandhan New Password is : '.$password;
        $message = "Dear User,
Your one time password is : $password.
Thank You,
Team Shivbandhan.";
        $template_id='1207165839071359752';
        sendSms($mobile, $message,$template_id);
            
        $result=$this->admin_model->forgot_pass1($user_data,$password,$user_id,$email);     

        if($result)
        {
            $json = array("status" => true,"msg"=>"New Password Send Your Registered Mobile No.");
        }
        else
        {
            $json = array("status" => false,"msg"=>" Error...! While Sending  Password.");
        }
    }
    else
    {
      $json = array("status" => false,"msg"=>"Invalid User");         
    } 
    echo json_encode($json);
  }

  public function app_save_pramotion()
  {
    
    $data = json_decode(file_get_contents('php://input'),true);
    $pramotion_data=(isset($data['dtProducts']) && !empty($data['dtProducts']))?$data['dtProducts']:'';
    for ($i=0; $i < count($pramotion_data); $i++) 
    {
      $ProductName=$pramotion_data[$i]['ProductName'];
      $ContactName=$pramotion_data[$i]['ContactName'];
      $MobileNumber1=$pramotion_data[$i]['MobileNumber1'];
      $MobileNumber2=$pramotion_data[$i]['MobileNumber2'];
      $ContactStateName=$pramotion_data[$i]['ContactStateName'];
      $ContactDistrictCountryName=$pramotion_data[$i]['ContactDistrictCountyName'];
      $ContactCityName=$pramotion_data[$i]['ContactCityName'];
      $ContactAreaName=$pramotion_data[$i]['ContactAreaName'];
      $ContactAddress1=$pramotion_data[$i]['ContactAddress1'];
      $ContactNumber=$pramotion_data[$i]['ContactNumber'];
      $ProfileTypeName=$pramotion_data[$i]['ProfileTypeName'];

      $pramotion_data1=array('product_name'=>$ProductName, 'contact_name'=>$ContactName, 'mobile_no'=>$MobileNumber1, 'alt_mobile_no'=>$MobileNumber2, 'contact_state_name'=>$ContactStateName, 'contact_district_country_name'=>$ContactDistrictCountryName, 'contact_city_name'=>$ContactCityName, 'contact_area_name'=>$ContactAreaName, 'contact_address'=>$ContactAddress1, 'contact_no'=>$ContactNumber, 'profile_type'=>$ProfileTypeName);
      
      $pr_data = $this->common_model->selectDetailsWhr('tbl_pramotion','mobile_no',$MobileNumber1);
      
      if(isset($pr_data) && !empty($pr_data))
      {
        $result = $this->common_model->updateDetails('tbl_pramotion','pramotion_id',$pr_data->pramotion_id,$pramotion_data1);
      }
      else
      {
        $result=$this->common_model->addData('tbl_pramotion',$pramotion_data1);
      }
    }
    if(isset($result) && !empty($result))
    {
      $json = array("status" => true,"msg"=>"Pramotion Details Saved Successfully.");
    }
    else
    {
      $json = array("status" => false,"msg"=>"Error While Saving Details.");
    }
    echo json_encode($json);
  }



  public function app_save_calling()
  {
    
    $data = json_decode(file_get_contents('php://input'),true);
    $calling_data1=(isset($data['data']) && !empty($data['data']))?$data['data']:'';
    $calling_data=(isset($calling_data1['DtMembers']) && !empty($calling_data1['DtMembers']))?$calling_data1['DtMembers']:'';

    for ($i=0; $i < count($calling_data); $i++) 
    {
      $full_name = $calling_data[$i]['FirstName'] .' '. $calling_data[$i]['LastName'];
      $birth_date = $calling_data[$i]['BirthYear'].'-'. $calling_data[$i]['BirthMonth'].'-'. $calling_data[$i]['BirthDay'];
      $city=$calling_data[$i]['CityName'];
      $state=$calling_data[$i]['StateName'];
      $email_id=$calling_data[$i]['SecondaryEmail1'];
      $mobile_no=$calling_data[$i]['MobilePhoneNumber'];
      $phone_no=$calling_data[$i]['PhoneNumber'];
      $caste=$calling_data[$i]['CasteName'];
      $sub_caste=$calling_data[$i]['SubCasteNameOther'];
      $Profession=$calling_data[$i]['Profession'];

      if(isset($birth_date) && !empty($birth_date)) {$birth_date1=date('Y-m-d',strtotime($birth_date)); } else {$birth_date1='0000-00-00'; }

      $arr_data = array('full_name'=>$full_name, 'birth_date'=>$birth_date1, 'city'=>$city, 'state'=>$state, 'email_id'=>$email_id, 'mobile_no'=>$mobile_no, 'phone_no'=>$phone_no, 'caste'=>$caste, 'sub_caste'=>$sub_caste, 'Profession'=>$Profession, 'created_on'=>date('Y-m-d') );
      
      $arr_check_data = $this->common_model->selectDetailsWhr('tbl_calling_details','mobile_no',$mobile_no);
      
      if(isset($arr_check_data) && !empty($arr_check_data))
      {
        $result = $this->common_model->updateDetails('tbl_calling_details','calling_id',$arr_check_data->calling_id,$arr_data);
      }
      else
      {
        $result=$this->common_model->addData('tbl_calling_details',$arr_data);
      }
    }

    if(isset($result) && !empty($result))
    {
      $json = array("status" => true,"msg"=>"Calling Details Saved Successfully.");
    }
    else
    {
      $json = array("status" => false,"msg"=>"Error While Saving Details.");
    }
    echo json_encode($json);
  }



  public function app_get_membership()
  {
    header('Content-Type: application/json');
    $membership_data=$this->common_model->fetchDataDESC('tbl_membership','membership_id');
    if($membership_data) 
    {  
      $json = array("json_data"=>$membership_data);
      echo json_encode($json);
    }
    else
    {
      $json = array("json_data"=>"Data Not Available.");
      echo json_encode($json);
    } 
  }

  public function app_verify_otp()
  {
      $data = json_decode(file_get_contents('php://input'),true);
      $customer_id=(isset($data['user_id']) && !empty($data['user_id']))?$data['user_id']:'';
      $otp=(isset($data['otp']) && !empty($data['otp']))?$data['otp']:'';

      $otp_data = $this->common_model->selectDetailsWhr('tbl_customer','customer_id',$customer_id);
      if(isset($otp_data) && !empty($otp_data) && $otp_data->otp==$otp)
      {
          $message = 'Hi '.$otp_data->f_name.' '.$otp_data->l_name.' Thank you for register your profile. SHIVBANDHAN Download app now : https://bit.ly/2BHSHXs ';
          $template_id = '';
          sendSms($otp_data->mobile,$message,$template_id);

          $data = array('status'=>'verified');
          $result=$this->common_model->updateDetails('tbl_customer','customer_id',$customer_id,$data);
          if($result)
          {
            $json = array("status" => true,"msg"=>"OTP Verified Successfully.");
          }
          else
          {
             $json = array("status" => false,"msg"=>"Invalid User");   
           }
      }
      else
      {
          $json = array("status" => false,"msg"=>"Invalid User");   
      }
      echo json_encode($json);
  }

  public function app_block_user()
  {
      $data = json_decode(file_get_contents('php://input'),true);
      $request_user_id=(isset($data['request_user_id']) && !empty($data['request_user_id']))?$data['request_user_id']:'';
      $block_user_id=(isset($data['block_user_id']) && !empty($data['block_user_id']))?$data['block_user_id']:'';
      if((isset($request_user_id) && !empty($request_user_id)) && (isset($block_user_id) && !empty($block_user_id)) )
      {
          $req=$this->common_model->selectMultiwhere('tbl_request','requested_by','requested_to',$block_user_id,$request_user_id);
          if(isset($req) && !empty($req))
          {
            $json = array("status" => false,"msg"=>"User Already Blocked.");
          }
          else
          {
            $req2=$this->common_model->selectMultiwhere('tbl_block_request','request_user_id','block_user_id',$request_user_id,$block_user_id);
            if($req2)
            {
                $data = array('request_user_id'=>$request_user_id,'block_user_id'=>$block_user_id,'created_by'=>$request_user_id);
                $a_id=$req2->request_id;
                $result=$this->common_model->updateDetails('tbl_block_request','request_id',$a_id,$data);
            }
            else
            {
                $data = array('request_user_id'=>$request_user_id,'block_user_id'=>$block_user_id,'created_by'=>$request_user_id);
                $result=$this->common_model->addData('tbl_block_request',$data);
            }
            if($result)
            {
              $req1=$this->common_model->selectMultiwhere('tbl_request','requested_by','requested_to',$block_user_id,$request_user_id);
               if($req1)
               {
                    $r_id=$req1->request_id;
                    $data1=array('status'=>'Block');
                    $result1=$this->common_model->updateDetails('tbl_request','request_id',$r_id,$data1);
                    $json = array("status" => true,"msg"=>"User Blocked Successfully.");

               }
               else
               {
                  $data1=array('requested_by'=>$block_user_id,'requested_to'=>$request_user_id,'status'=>'Block');
                  $data1['created_by']=$block_user_id;
                  $data1['modified_by']=$request_user_id;
                  $data1['created_on']=date('Y-m-d H:i:s');
                  $result1 =  $this->common_model->addData('tbl_request',$data1);

                  $json = array("status" => true,"msg"=>"User Blocked Successfully.");
               }
            }
            else
            {
              $json = array("status" => false,"msg"=>"Invalid User");   
            }
          }
      }
      else
      {
          $json = array("status" => false,"msg"=>"Invalid User");   
      }
      echo json_encode($json);
  }

    /*public function app_profile_matches()
  {
      $data = json_decode(file_get_contents('php://input'),true);
      $user_id=(isset($data['user_id']) && !empty($data['user_id']))?$data['user_id']:'';
      if(isset($user_id) && !empty($user_id))
      {  
        $user_data = $this->common_model->selectDetailsWhr('tbl_customer','customer_id',$user_id);
        $gend=$user_data->gender;
        if($gend=='Male')
        {
          $gend='Female';
        }
        else
        {
          $gend='Male';
        }
        //$matches_data=$this->common_model->selectAllWhr('tbl_customer','gender',$gend);
        $matches_data=$this->web_model->fetch_quick_search1($gend);
        if(isset($matches_data) && !empty($matches_data))
        {
            $prod_cnt=count($matches_data);
            for($i=0;$i<$prod_cnt;$i++)
            {
              $customer_id=$matches_data[$i]->customer_id;
              $fav_data=$this->common_model->selectMultiwhere('tbl_favourite','favourite_by','favourite_to',$user_id,$customer_id);
              $req_data=$this->common_model->selectMultiwhere('tbl_request','requested_by','requested_to',$user_id,$customer_id);
              $block_data=$this->admin_model->chk_block($user_id,$customer_id);
                $matches_data[$i]->is_fav=(isset($fav_data) && !empty($fav_data))?'Y':'N';
                $matches_data[$i]->fav_id=(isset($fav_data->favourite_id) && !empty($fav_data->favourite_id))?$fav_data->favourite_id:'0';
                $matches_data[$i]->is_req=(isset($req_data) && !empty($req_data))?'Y':'N';
                $matches_data[$i]->req_status=(isset($req_data->status) && !empty($req_data->status))?$req_data->status:'-';
                $matches_data[$i]->is_block=(isset($block_data) && !empty($block_data))?'Y':'N';
            }
        } 
        if(isset($matches_data) && !empty($matches_data))
        {
          $json = array("json_data"=>$matches_data);
        }
        else
        {
          $json = array("json_data"=>"Data Not Available.");
        }
      }
      else
      {
        $json = array("status" => false,"msg"=>"Invalid User");   
      }
      echo json_encode($json);
  }*/

  /*by user cast wise search record with genders*/
  public function app_profile_matches()
  {
      $data = json_decode(file_get_contents('php://input'),true);
      $user_id=(isset($data['user_id']) && !empty($data['user_id']))?$data['user_id']:'';
      if(isset($user_id) && !empty($user_id))
      {  
        $user_data = $this->web_model->get_cust_details($user_id);

        $cast_name = $user_data->cast_name;
        $expected_cast = $user_data->expected_cast;
        
        $gend=$user_data->gender;
        
        if($gend=='Male')
        {
          $gend='Female';
        }
        else
        {
          $gend='Male';
        }
        //$matches_data=$this->common_model->selectAllWhr('tbl_customer','gender',$gend);
        if($expected_cast==760 || $expected_cast==313){
        $matches_data=$this->web_model->fetch_quick_search_all_profile($gend);
        }else{
        $matches_data=$this->web_model->fetch_quick_search1($gend,$cast_name);
        }
        if(isset($matches_data) && !empty($matches_data))
        {
            $prod_cnt=count($matches_data);
            for($i=0;$i<$prod_cnt;$i++)
            {
              $customer_id=$matches_data[$i]->customer_id;
              $fav_data=$this->common_model->selectMultiwhere('tbl_favourite','favourite_by','favourite_to',$user_id,$customer_id);
              $req_data=$this->common_model->selectMultiwhere('tbl_request','requested_by','requested_to',$user_id,$customer_id);
              $block_data=$this->admin_model->chk_block($user_id,$customer_id);
                $matches_data[$i]->is_fav=(isset($fav_data) && !empty($fav_data))?'Y':'N';
                $matches_data[$i]->fav_id=(isset($fav_data->favourite_id) && !empty($fav_data->favourite_id))?$fav_data->favourite_id:'0';
                $matches_data[$i]->is_req=(isset($req_data) && !empty($req_data))?'Y':'N';
                $matches_data[$i]->req_status=(isset($req_data->status) && !empty($req_data->status))?$req_data->status:'-';
                $matches_data[$i]->is_block=(isset($block_data) && !empty($block_data))?'Y':'N';
            }
        } 
        if(isset($matches_data) && !empty($matches_data))
        {
          $json = array("json_data"=>$matches_data);
        }
        else
        {
          $json = array("json_data"=>"Data Not Available.");
        }
      }
      else
      {
        $json = array("status" => false,"msg"=>"Invalid User");   
      }
      echo json_encode($json);
  }

  public function app_send_request()
  {  
      $data = json_decode(file_get_contents('php://input'),true);
      $user_id=(isset($data['user_id']) && !empty($data['user_id']))?$data['user_id']:'';
      $r_user_id=(isset($data['r_user_id']) && !empty($data['r_user_id']))?$data['r_user_id']:'';
      $data=array('requested_by'=>$user_id,'requested_to'=>$r_user_id);
      if((isset($user_id) && !empty($user_id)) && (isset($r_user_id) && !empty($r_user_id)) )
      {
        $req=$this->common_model->selectMultiwhere('tbl_request','requested_by','requested_to',$user_id,$r_user_id);
        if(isset($req) && !empty($req))
        {
          $json = array("status" => false,"msg"=>"Already Request has been Send.");
        }
        else
        {
            $data['created_by']=$user_id;
            $data['created_on']=date('Y-m-d H:i:s');
            $result =  $this->common_model->addData('tbl_request',$data);
            if($result)
            {
                $userdata =$this->common_model->selectDetailsWhr('tbl_customer','customer_id',$user_id);
                $userdata1 =$this->common_model->selectDetailsWhr('tbl_customer','customer_id',$r_user_id);
                $message = 'Dear '.$userdata1->profile_code.', You have received new profile request please check '.$userdata->profile_code.' Download App : https://bit.ly/2BHSHXs';
                $template_id='';
                sendSms($userdata1->mobile,$message,$template_id);

                $json = array("status" => true,"msg"=>"Request Send Successfully.");
            }
            else
            { 
              $json = array("status" => false,"msg"=>"While Sending Request.");
            } 
        }
      }
      else
      {
       $json = array("status" => false,"msg"=>"Invalid User");   
      }
      echo json_encode($json);
  }

  public function app_sent_request()
  {
    $data = json_decode(file_get_contents('php://input'),true);
    $user_id=(isset($data['user_id']) && !empty($data['user_id']))?$data['user_id']:'';
    if(isset($user_id) && !empty($user_id))
    { 
      $request_sent_data=$this->admin_model->sent_request($user_id);
      if($request_sent_data) 
      {  
        $json = array("json_data"=>$request_sent_data);
      }
      else
      {
        $json = array("json_data"=>"Data Not Available.");
      } 
    }
    else
    {
      $json = array("status" => false,"msg"=>"Invalid User");   
    }
    echo json_encode($json);
  }

  public function remove_profile_pic()
  {
    $data = json_decode(file_get_contents('php://input'),true);
    $user_id=(isset($data['user_id']) && !empty($data['user_id']))?$data['user_id']:'';
    if(isset($user_id) && !empty($user_id))
    { 
      $data=array('customer_photo'=>'','modified_by'=>$user_id);
      $result=$this->common_model->updateDetails('tbl_customer','customer_id',$user_id,$data);
      if($result) 
      {  
        $json = array("status" => True,"msg"=>"Profile image Removed Successfully.");
      }
      else
      {
        $json = array("json_data"=>"Invalid User.");
      } 
    }
    else
    {
      $json = array("status" => false,"msg"=>"Invalid User");   
    }
    echo json_encode($json);
  }

  public function app_pending_request()
  {
    $data = json_decode(file_get_contents('php://input'),true);
    $user_id=(isset($data['user_id']) && !empty($data['user_id']))?$data['user_id']:'';
    if(isset($user_id) && !empty($user_id))
    { 
      $request_pending_data=$this->admin_model->fetch_request($user_id,'Pending');
      if($request_pending_data) 
      {  
        $json = array("json_data"=>$request_pending_data);
      }
      else
      {
        $json = array("json_data"=>"Data Not Available.");
      } 
    }
    else
    {
      $json = array("status" => false,"msg"=>"Invalid User");   
    }
    echo json_encode($json);
  }

  public function app_rejected_request()
  {
    $data = json_decode(file_get_contents('php://input'),true);
    $user_id=(isset($data['user_id']) && !empty($data['user_id']))?$data['user_id']:'';
    if(isset($user_id) && !empty($user_id))
    { 
      $request_rejected_data=$this->admin_model->fetch_rjected_request($user_id,'Rejected');
      if($request_rejected_data) 
      {  
        $json = array("json_data"=>$request_rejected_data);
      }
      else
      {
        $json = array("json_data"=>"Data Not Available.");
      } 
    }
    else
    {
      $json = array("status" => false,"msg"=>"Invalid User");   
    }
    echo json_encode($json);
  }

  public function app_accepted_request()
  {
    $data = json_decode(file_get_contents('php://input'),true);
    $user_id=(isset($data['user_id']) && !empty($data['user_id']))?$data['user_id']:'';
    if(isset($user_id) && !empty($user_id))
    { 
      $request_accepted_data=$this->admin_model->fetch_accepted_request($user_id,'Accepted');
      if($request_accepted_data) 
      {  
        $json = array("json_data"=>$request_accepted_data);
      }
      else
      {
        $json = array("json_data"=>"Data Not Available.");
      } 
    }
    else
    {
      $json = array("status" => false,"msg"=>"Invalid User");   
    }
    echo json_encode($json);
  }

  public function app_accept_request()
  {
      $data = json_decode(file_get_contents('php://input'),true);
     // print_r($data);
      $user_id=(isset($data['user_id']) && !empty($data['user_id']))?$data['user_id']:'';
      $request_id=(isset($data['request_id']) && !empty($data['request_id']))?$data['request_id']:'';
      $data=array('status'=>'Accepted','modified_by'=>$user_id);
      if((isset($user_id) && !empty($user_id)) && (isset($request_id) && !empty($request_id)))
      {
        $result=$this->common_model->updateDetails('tbl_request','request_id',$request_id,$data);

        if($result)
        {
            $template_id='';
          $userdata =$this->common_model->selectDetailsWhr('tbl_customer','customer_id',$user_id);
          $userdata1 =$this->common_model->selectDetailsWhr('tbl_customer','customer_id',$request_id);
          $message = 'Dear '.$userdata1->profile_code.', Your Request has been approved by '.$userdata->profile_code.' More details please login and start conversion. Download App : https://bit.ly/2BHSHXs';
            sendSms($userdata1->mobile,$message,$template_id);

          $json = array("status" => true,"msg"=>"Request Accepted Successfully");
        }
        else
        {
          $json = array("status" => false,"msg"=>" Error.! While Accepting Request"); 
        }
      }
      else
      {
        $json = array("status" => false,"msg"=>"Invalid User");   
      }
      echo json_encode($json);
  }

  public function app_blocked_request()
  {
    $data = json_decode(file_get_contents('php://input'),true);
    $user_id=(isset($data['user_id']) && !empty($data['user_id']))?$data['user_id']:'';
    if(isset($user_id) && !empty($user_id))
    { 
      $request_accepted_data=$this->admin_model->fetch_blocked_request($user_id,'Block');
      if($request_accepted_data) 
      {  
        $json = array("json_data"=>$request_accepted_data);
      }
      else
      {
        $json = array("json_data"=>"Data Not Available.");
      } 
    }
    else
    {
      $json = array("status" => false,"msg"=>"Invalid User");   
    }
    echo json_encode($json);
  }

  public function app_my_order_history()
  {
    $data = json_decode(file_get_contents('php://input'),true);
    $user_id=(isset($data['user_id']) && !empty($data['user_id']))?$data['user_id']:'';
    if(isset($user_id) && !empty($user_id))
    { 
      $order_data=$this->common_model->selectAllWhr('tbl_payment_details','customer_id',$user_id);
      if($order_data) 
      {  
        $json = array("json_data"=>$order_data);
      }
      else
      {
        $json = array("json_data"=>"Data Not Available.");
      } 
    }
    else
    {
      $json = array("status" => false,"msg"=>"Invalid User");   
    }
    echo json_encode($json);
  }

  public function app_block_request()
  {
      $data = json_decode(file_get_contents('php://input'),true);
     // print_r($data);
      $user_id=(isset($data['user_id']) && !empty($data['user_id']))?$data['user_id']:'';
      $request_id=(isset($data['request_id']) && !empty($data['request_id']))?$data['request_id']:'';
      $data=array('status'=>'Block','modified_by'=>$user_id);
      if((isset($user_id) && !empty($user_id)) && (isset($request_id) && !empty($request_id)))
      {
        $result=$this->common_model->updateDetails('tbl_request','request_id',$request_id,$data);

        if($result)
        {
          $json = array("status" => true,"msg"=>"Request Blocked Successfully");
        }
        else
        {
          $json = array("status" => false,"msg"=>" Error.! While Blocking Request"); 
        }
      }
      else
      {
        $json = array("status" => false,"msg"=>"Invalid User");   
      }
      echo json_encode($json);
  }

  public function app_unblock_request()
  {
      $data = json_decode(file_get_contents('php://input'),true);
     // print_r($data);
      $user_id=(isset($data['user_id']) && !empty($data['user_id']))?$data['user_id']:'';
      $request_id=(isset($data['request_id']) && !empty($data['request_id']))?$data['request_id']:'';
      $data=array('status'=>'Pending','modified_by'=>$user_id);
      if((isset($user_id) && !empty($user_id)) && (isset($request_id) && !empty($request_id)))
      {
        $result=$this->common_model->updateDetails('tbl_request','request_id',$request_id,$data);

        if($result)
        {
          $json = array("status" => true,"msg"=>"Request Unblock Successfully");
        }
        else
        {
          $json = array("status" => false,"msg"=>" Error.! While Unblocking Request"); 
        }
      }
      else
      {
        $json = array("status" => false,"msg"=>"Invalid User");   
      }
      echo json_encode($json);
  }

  public function app_add_favourite()
  {  
    $data = json_decode(file_get_contents('php://input'),true);
    $user_id=(isset($data['user_id']) && !empty($data['user_id']))?$data['user_id']:'';
    $favourite_id=(isset($data['favourite_id']) && !empty($data['favourite_id']))?$data['favourite_id']:'';
    if((isset($user_id) && !empty($user_id)) && (isset($favourite_id) && !empty($favourite_id)))
    {
      $data=array('favourite_by'=>$user_id,'favourite_to'=>$favourite_id);
      $req=$this->common_model->selectMultiwhere('tbl_favourite','favourite_by','favourite_to',$user_id,$favourite_id);
      if(isset($req) && !empty($req))
      {
         $json = array("status" => false,"msg"=>"Already Added in favourite List.");
      }
      else
      {
          $data['created_by']=$user_id;
          $data['created_on']=date('Y-m-d H:i:s');
          $result =  $this->common_model->addData('tbl_favourite',$data);
          if($result)
          {
              $json = array("status" => true,"msg"=>"Added to favourite Successfully.");
          }
          else
          {
             $json = array("status" => false,"msg"=>"Data Not Available.");
          } 
      }
    }
    else
    {
      $json = array("status" => false,"msg"=>"Invalid User");   
    }
    echo json_encode($json);
  }

  public function app_my_favourite()
  {
    $data = json_decode(file_get_contents('php://input'),true);
    $user_id=(isset($data['user_id']) && !empty($data['user_id']))?$data['user_id']:'';
    if(isset($user_id) && !empty($user_id))
    { 
      $favourite_data=$this->admin_model->my_favourite($user_id);
      if($favourite_data) 
      {  
        $json = array("json_data"=>$favourite_data);
      }
      else
      {
        $json = array("json_data"=>"Data Not Available.");
      } 
    }
    else
    {
      $json = array("status" => false,"msg"=>"Invalid User");   
    }
    echo json_encode($json);
  }

  public function app_change_pass()
  {
    $data = json_decode(file_get_contents('php://input'),true);
    $user_id=(isset($data['user_id']) && !empty($data['user_id']))?$data['user_id']:'';
    $curr_pass=(isset($data['curr_pass']) && !empty($data['curr_pass']))?$data['curr_pass']:'';
    $new_pass=(isset($data['new_pass']) && !empty($data['new_pass']))?$data['new_pass']:'';
    if(isset($user_id) && !empty($user_id))
    {
      $data['custData'] = $this->common_model->selectDetailsWhr('tbl_customer','customer_id',$user_id);
      $user_pass=$data['custData']->password;
      if($user_pass==$curr_pass)
      {
        $user_data=array('password'=>$new_pass);
          
        $result=$this->common_model->updateDetails('tbl_customer','customer_id',$user_id,$user_data);
        
        if($result)
        {
          $json = array("status" => true,"msg"=>"Password Changed Successfully."); 
        }
        else
        {
          $json = array("status" => false,"msg"=>"Error While Changing Password."); 
        }
      }
      else
      {
        $json = array("status" => false,"msg"=>"Invalid Current Password"); 
      }
    }
    else
    {
      $json = array("status" => false,"msg"=>"Invalid User");   
    }
    echo json_encode($json);   
  }

  public function app_quick_search()
  {
      $data = json_decode(file_get_contents('php://input'),true);
      $user_id=(isset($data['user_id']) && !empty($data['user_id']))?$data['user_id']:'';
      $caste=(isset($data['caste']) && !empty($data['caste']))?$data['caste']:'';
      $age_from=(isset($data['age_from']) && !empty($data['age_from']))?$data['age_from']:'';
      $age_to=(isset($data['age_to']) && !empty($data['age_to']))?$data['age_to']:'';
      $is_photo_visible=(isset($data['is_photo_visible']) && !empty($data['is_photo_visible']))?$data['is_photo_visible']:'';
      $marital_status=(isset($data['marital_status']) && !empty($data['marital_status']))?$data['marital_status']:'';
      if(isset($user_id) && !empty($user_id))
      {  
        $user_data = $this->common_model->selectDetailsWhr('tbl_customer','customer_id',$user_id);
        $gend=$user_data->gender;
        if($gend=='Male')
        {
          $gend='Female';
        }
        else
        {
          $gend='Male';
        }
        if((isset($caste) && !empty($caste)) || (isset($age_from) && !empty($age_from)) || (isset($age_to) && !empty($age_to)) || (isset($is_photo_visible) && !empty($is_photo_visible)) || (isset($marital_status) && !empty($marital_status)))
        {
          $matches_data=$this->web_model->fetch_quick_search($caste,$age_from,$age_to,$is_photo_visible,$marital_status);
          if(isset($matches_data) && !empty($matches_data))
          {
              $prod_cnt=count($matches_data);
            for($i=0;$i<$prod_cnt;$i++)
            {
              $customer_id=$matches_data[$i]->customer_id;
              $fav_data=$this->common_model->selectMultiwhere('tbl_favourite','favourite_by','favourite_to',$user_id,$customer_id);
              $req_data=$this->common_model->selectMultiwhere('tbl_request','requested_by','requested_to',$user_id,$customer_id);
                $matches_data[$i]->is_fav=(isset($fav_data) && !empty($fav_data))?'Y':'N';
                $matches_data[$i]->fav_id=(isset($fav_data->favourite_id) && !empty($fav_data->favourite_id))?$fav_data->favourite_id:'0';
                $matches_data[$i]->is_req=(isset($req_data) && !empty($req_data))?'Y':'N';
                $matches_data[$i]->req_status=(isset($req_data->status) && !empty($req_data->status))?$req_data->status:'-';
                $block_data=$this->admin_model->chk_block($user_id,$customer_id);
                $matches_data[$i]->is_block=(isset($block_data) && !empty($block_data))?'Y':'N';
            }
          } 
        }
        else
        {
          $matches_data=$this->web_model->fetch_quick_search1($gend);
          if(isset($matches_data) && !empty($matches_data))
          {
              $prod_cnt=count($matches_data);
            for($i=0;$i<$prod_cnt;$i++)
            {
              $customer_id=$matches_data[$i]->customer_id;
              $fav_data=$this->common_model->selectMultiwhere('tbl_favourite','favourite_by','favourite_to',$user_id,$customer_id);
              $req_data=$this->common_model->selectMultiwhere('tbl_request','requested_by','requested_to',$user_id,$customer_id);
                $matches_data[$i]->is_fav=(isset($fav_data) && !empty($fav_data))?'Y':'N';
                $matches_data[$i]->fav_id=(isset($fav_data->favourite_id) && !empty($fav_data->favourite_id))?$fav_data->favourite_id:'0';
                $matches_data[$i]->is_req=(isset($req_data) && !empty($req_data))?'Y':'N';
                $matches_data[$i]->req_status=(isset($req_data->status) && !empty($req_data->status))?$req_data->status:'-';
                $block_data=$this->admin_model->chk_block($user_id,$customer_id);
                $matches_data[$i]->is_block=(isset($block_data) && !empty($block_data))?'Y':'N';
            }
          } 
        }
        
        if(isset($matches_data) && !empty($matches_data))
        {
          $json = array("json_data"=>$matches_data);
        }
        else
        {
          $json = array("json_data"=>"Data Not Available.");
        }
      }
      else
      {
        $json = array("status" => false,"msg"=>"Invalid User");   
      }
      echo json_encode($json);
  }

  public function app_search_by_profile_code()
  {
      $data = json_decode(file_get_contents('php://input'),true);
      $user_id=(isset($data['user_id']) && !empty($data['user_id']))?$data['user_id']:'';
      $profile_code=(isset($data['profile_code']) && !empty($data['profile_code']))?$data['profile_code']:'';
      if((isset($user_id) && !empty($user_id)) && (isset($profile_code) && !empty($profile_code)))
      {  
        $matches_data=$this->web_model->fetch_quick_search_by_id($profile_code);
        
        if(isset($matches_data) && !empty($matches_data))
        {
            $prod_cnt=count($matches_data);
              for($i=0;$i<$prod_cnt;$i++)
              {
                $customer_id=$matches_data[$i]->customer_id;
                $fav_data=$this->common_model->selectMultiwhere('tbl_favourite','favourite_by','favourite_to',$user_id,$customer_id);
                $req_data=$this->common_model->selectMultiwhere('tbl_request','requested_by','requested_to',$user_id,$customer_id);
                  $matches_data[$i]->is_fav=(isset($fav_data) && !empty($fav_data))?'Y':'N';
                  $matches_data[$i]->fav_id=(isset($fav_data->favourite_id) && !empty($fav_data->favourite_id))?$fav_data->favourite_id:'0';
                  $matches_data[$i]->is_req=(isset($req_data) && !empty($req_data))?'Y':'N';
                  $matches_data[$i]->req_status=(isset($req_data->status) && !empty($req_data->status))?$req_data->status:'-';
                  $block_data=$this->admin_model->chk_block($user_id,$customer_id);
                  $matches_data[$i]->is_block=(isset($block_data) && !empty($block_data))?'Y':'N';
              }
              
          $json = array("json_data"=>$matches_data);
        }
        else
        {
          $json = array("json_data"=>"Data Not Available.");
        }
      }
      else
      {
        $json = array("status" => false,"msg"=>"Invalid User");   
      }
      echo json_encode($json);
  }

  public function app_advance_search()
  {
      $data = json_decode(file_get_contents('php://input'),true);
      $user_id=(isset($data['user_id']) && !empty($data['user_id']))?$data['user_id']:'';
      $birth_year_from=(isset($data['birth_year_from']) && !empty($data['birth_year_from']))?$data['birth_year_from']:'';
      $birth_year_to=(isset($data['birth_year_to']) && !empty($data['birth_year_to']))?$data['birth_year_to']:'';
      $education=(isset($data['education']) && !empty($data['education']))?$data['education']:'';
      $district1=(isset($data['district1']) && !empty($data['district1']))?$data['district1']:'';
      $district2=(isset($data['district2']) && !empty($data['district2']))?$data['district2']:'';
      $district3=(isset($data['district3']) && !empty($data['district3']))?$data['district3']:'';
      $height_from=(isset($data['height_from']) && !empty($data['height_from']))?$data['height_from']:'';
      $height_to=(isset($data['height_to']) && !empty($data['height_to']))?$data['height_to']:'';
      $manglic=(isset($data['manglic']) && !empty($data['manglic']))?$data['manglic']:'';
      $photo=(isset($data['photo']) && !empty($data['photo']))?$data['photo']:'';
      if(isset($user_id) && !empty($user_id))
      {  
        $user_data = $this->common_model->selectDetailsWhr('tbl_customer','customer_id',$user_id);
        $gend=$user_data->gender;
        if($gend=='Male')
        {
          $gend='Female';
        }
        else
        {
          $gend='Male';
        }
        if((isset($birth_year_to) && !empty($birth_year_to)) || (isset($birth_year_to) && !empty($birth_year_to)) || (isset($education) && !empty($education))  || (isset($district1) && !empty($district1)) || (isset($district2) && !empty($district2)) || (isset($district3) && !empty($district3)) || (isset($height_from) && !empty($height_from)) || (isset($height_to) && !empty($height_to))  || (isset($manglic) && !empty($manglic)) || (isset($photo) && !empty($photo)))
        {
            $matches_data = $this->web_model->fetch_advance_search($birth_year_from,$birth_year_to,$education,$district1,$district2,$district3,$height_from,$height_to,$manglic,$photo);
            if(isset($matches_data) && !empty($matches_data))
            {
                  $prod_cnt=count($matches_data);
              for($i=0;$i<$prod_cnt;$i++)
              {
                $customer_id=$matches_data[$i]->customer_id;
                $fav_data=$this->common_model->selectMultiwhere('tbl_favourite','favourite_by','favourite_to',$user_id,$customer_id);
                $req_data=$this->common_model->selectMultiwhere('tbl_request','requested_by','requested_to',$user_id,$customer_id);
                  $matches_data[$i]->is_fav=(isset($fav_data) && !empty($fav_data))?'Y':'N';
                  $matches_data[$i]->fav_id=(isset($fav_data->favourite_id) && !empty($fav_data->favourite_id))?$fav_data->favourite_id:'0';
                  $matches_data[$i]->is_req=(isset($req_data) && !empty($req_data))?'Y':'N';
                  $matches_data[$i]->req_status=(isset($req_data->status) && !empty($req_data->status))?$req_data->status:'-';
                  $block_data=$this->admin_model->chk_block($user_id,$customer_id);
                $matches_data[$i]->is_block=(isset($block_data) && !empty($block_data))?'Y':'N';
              }
            } 
        }
        else
        {
          $matches_data=$this->web_model->fetch_quick_search1($gend);
          if(isset($matches_data) && !empty($matches_data))
          {
              $prod_cnt=count($matches_data);
            for($i=0;$i<$prod_cnt;$i++)
            {
              $customer_id=$matches_data[$i]->customer_id;
              $fav_data=$this->common_model->selectMultiwhere('tbl_favourite','favourite_by','favourite_to',$user_id,$customer_id);
              $req_data=$this->common_model->selectMultiwhere('tbl_request','requested_by','requested_to',$user_id,$customer_id);
                $matches_data[$i]->is_fav=(isset($fav_data) && !empty($fav_data))?'Y':'N';
                $matches_data[$i]->fav_id=(isset($fav_data->favourite_id) && !empty($fav_data->favourite_id))?$fav_data->favourite_id:'0';
                $matches_data[$i]->is_req=(isset($req_data) && !empty($req_data))?'Y':'N';
                $matches_data[$i]->req_status=(isset($req_data->status) && !empty($req_data->status))?$req_data->status:'-';
                $block_data=$this->admin_model->chk_block($user_id,$customer_id);
                $matches_data[$i]->is_block=(isset($block_data) && !empty($block_data))?'Y':'N';
            }
          } 
        }
        
        if(isset($matches_data) && !empty($matches_data))
        {
          $json = array("json_data"=>$matches_data);
        }
        else
        {
          $json = array("json_data"=>"Data Not Available.");
        }
      }
      else
      {
        $json = array("status" => false,"msg"=>"Invalid User");   
      }
      echo json_encode($json);
  }

  public function app_remove_fav()
  {
      $data = json_decode(file_get_contents('php://input'),true);
     // print_r($data);
      $user_id=(isset($data['user_id']) && !empty($data['user_id']))?$data['user_id']:'';
      $favourite_id=(isset($data['favourite_id']) && !empty($data['favourite_id']))?$data['favourite_id']:'';
      $data=array('display'=>'N','modified_by'=>$user_id);
      if((isset($user_id) && !empty($user_id)) && (isset($favourite_id) && !empty($favourite_id)))
      {
        $result=$this->common_model->updateDetails('tbl_favourite','favourite_id',$favourite_id,$data);

        if($result)
        {
          $json = array("status" => true,"msg"=>"favourite Removed Successfully");
        }
        else
        {
          $json = array("status" => false,"msg"=>" Error.! While Removing favourite"); 
        }
      }
      else
      {
        $json = array("status" => false,"msg"=>"Invalid User");   
      }
      echo json_encode($json);
  }

  public function app_reject_request()
  {
      $data = json_decode(file_get_contents('php://input'),true);
     // print_r($data);
      $user_id=(isset($data['user_id']) && !empty($data['user_id']))?$data['user_id']:'';
      $request_id=(isset($data['request_id']) && !empty($data['request_id']))?$data['request_id']:'';
      $data=array('status'=>'Rejected','modified_by'=>$user_id);
      if((isset($user_id) && !empty($user_id)) && (isset($request_id) && !empty($request_id)))
      {
        $result=$this->common_model->updateDetails('tbl_request','request_id',$request_id,$data);

        if($result)
        {

          $json = array("status" => true,"msg"=>"Request Rejected Successfully");
        }
        else
        {
          $json = array("status" => false,"msg"=>" Error.! While Rejecting Request"); 
        }
      }
      else
      {
        $json = array("status" => false,"msg"=>"Invalid User");   
      }
      echo json_encode($json);
  }

  public function app_success_payment()
  { 
      $data = json_decode(file_get_contents('php://input'),true);
     // print_r($data);
      $user_id=(isset($data['user_id']) && !empty($data['user_id']))?$data['user_id']:'';
      $membership_amt=(isset($data['membership_amt']) && !empty($data['membership_amt']))?$data['membership_amt']:'';
      $membership_id=(isset($data['membership_id']) && !empty($data['membership_id']))?$data['membership_id']:'';
      $payment_status=(isset($data['payment_status']) && !empty($data['payment_status']))?$data['payment_status']:'';
      if((isset($user_id) && !empty($user_id)) && (isset($membership_amt) && !empty($membership_amt)) && (isset($membership_id) && !empty($membership_id)) && (isset($payment_status) && !empty($payment_status)))
      {

        $data['membership_data'] = $this->common_model->selectDetailsWhr('tbl_membership','membership_id',$membership_id);
        $plan=$data['membership_data']->membership_plan_name;
        $membership_validity=$data['membership_data']->membership_validity;
        $data['cust_data'] = $this->common_model->selectDetailsWhr('tbl_customer','customer_id',$user_id);
        $mobile=$data['cust_data']->mobile;
        $email=$data['cust_data']->email;
        //mss
        $customer_id=$data['cust_data']->customer_id;
        //mss
        $customer_name=$data['cust_data']->f_name.' '.$data['cust_data']->m_name.' '.$data['cust_data']->l_name;
        $cur_date=date('Y-m-d');
        $transaction_id=$this->generateRandomString();
        $data = array('customer_id'=> $user_id,'customer_name'=> $customer_name,'mobile'=> $mobile,'email'=> $email,'membership_amt'=> $membership_amt,'membership_plan'=> $plan,'pay_type'=>'Online','membership_validity'=>$membership_validity,'payment_mode'=>'online','transcation_id'=>$transaction_id,'payment_status'=>$payment_status);


        $data1 = array('membership_status'=> 'Active','membership_from'=> $cur_date,'membership_validity'=> $membership_validity,'membership_id'=>$membership_id,'membership_name'=>$plan,'membership_amt'=>$membership_amt,'transcation_id'=>$transaction_id);

        $result1 =  $this->admin_model->save_membership_using_api($data,$data1,$customer_id);

        $template_id='';
        $transcation_data1 = $this->common_model->selectDetailsWhr('tbl_customer','customer_id',$user_id);
        $mobile=$transcation_data1->mobile;
        $email=$transcation_data1->email;
        $customer_name=$transcation_data1->f_name.' '.$transcation_data1->m_name.' '.$transcation_data1->l_name;
        $message='Hi '.$customer_name.' Thank you for choosing Shivbandhan Matrimony. Your Package'.$transcation_data1->membership_name.' has been activated. Plase Download our app : https://bit.ly/2BHSHXs ';
        sendSms($mobile, $message,$template_id);
        if($email)
        {
            $data['cust_data'] = $this->admin_model->fetch_invoice_details($result1);
            $pdfname = 'Invoice';
            $html=$this->load->view('admin/invoice',$data,TRUE);
            $pdf_name=$this->report_creation->Save_pdf($html,'./uploads/pdf/invoice'.date('d-m-Y'));
            $this->load->library('email_sent');
            $subject = 'Invoice Details';                   
            $msg_body="Dear Sir/Mam,<br/><br/> Thank you for choosing Shivbandhan Matrimony LPP.  <br/><br/><br/>";
            $alt_msg = 'Invoice Details';
            $data=array('subject'=>$subject,'msg_body'=>$msg_body,'alt_msg'=>$alt_msg,'attachement'=>$pdf_name);
            $email_id[]=array('email_id'=>$email); 
            $result=$this->email_sent->mail_sent($data,$email_id);
        }
        $json = array("status" => true,"msg"=>"Payment Done Successfully.");
      }
      else
      {
        $json = array("status" => false,"msg"=>"Invalid User");   
      }
      echo json_encode($json);
  }

  public function generateRandomString()
  {   
      $day=date ("d");
      $month=date ("m");
      $year=date ("Y");
      $time=time();
      $dmyt=$day+$month+$year+$time;    
      $random = rand(0,10000000);  
      $dmtran= $dmyt+$random;
      $unique=  uniqid();
      $dmtun = $dmtran.$unique;
      $mdun = strtoupper(md5($dmtran.$dmtun));
      $uniqueString = substr($mdun, 5, -15); // getting 12 character length code.
      return $uniqueString;
  }

  public function app_cancel_request()
  {
      $data = json_decode(file_get_contents('php://input'),true);
     // print_r($data);
      $user_id=(isset($data['user_id']) && !empty($data['user_id']))?$data['user_id']:'';
      $request_id=(isset($data['request_id']) && !empty($data['request_id']))?$data['request_id']:'';
      $data=array('display'=>'N','modified_by'=>$user_id);
      if((isset($user_id) && !empty($user_id)) && (isset($request_id) && !empty($request_id)))
      {
        $result=$this->common_model->updateDetails('tbl_request','request_id',$request_id,$data);

        if($result)
        {

          $json = array("status" => true,"msg"=>"Request Cancelled Successfully");
        }
        else
        {
          $json = array("status" => false,"msg"=>" Error.! While Cancelling Request"); 
        }
      }
      else
      {
        $json = array("status" => false,"msg"=>"Invalid User");   
      }
      echo json_encode($json);
  }
public function view_user_details_new()
  {
      $data = json_decode(file_get_contents('php://input'),true);  
      $user_id=(isset($data['user_id']) && !empty($data['user_id']))?$data['user_id']:'';
      $view_user_id=(isset($data['view_user_id']) && !empty($data['view_user_id']))?$data['view_user_id']:'';
      if($user_id)
      {
        //$webcustomerDetails = $this->web_model->getOtherCustomerDetailsById($view_user_id);
        $webcustomerDetails=$this->admin_model->fetch_customer_details($view_user_id);  
        if(isset($webcustomerDetails) && !empty($webcustomerDetails) && !empty($webcustomerDetails))
        {
            $checkUserMatual = $this->web_model->checkUserMatual($user_id,$view_user_id);
            if(isset($checkUserMatual) && !empty($checkUserMatual)){
               $ismutual = 'yes'; 
            }else{
                $ismutual = 'no';
            }
            $checkUserMemership = $this->web_model->checkUserMemberShipStatus($user_id);
            //print_r($checkUserMemership);
            if(isset($checkUserMemership) && !empty($checkUserMemership)){
               $ismember = $checkUserMemership; 
               $is_member=$ismember;
            }else{
                $is_member = 'Deactive';
            }
        $webcustomerDetails->ismutual=$ismutual;
        $webcustomerDetails->ismembership=$is_member;
        $json = array("json_data"=>$webcustomerDetails);
        }else{
        $json = array("status" => false,"msg"=>"Invalid User");   
        }
      }else{
          
        $json = array("status" => false,"msg"=>"Invalid User");   
      }
      echo json_encode($json);
  }
  public function app_chat_details()
  {
    $data = json_decode(file_get_contents('php://input'),true);
    $customer_id=(isset($data['user_id']) && !empty($data['user_id']))?$data['user_id']:'';
    $cust_id=(isset($data['c_user_id']) && !empty($data['c_user_id']))?$data['c_user_id']:'';
    if(isset($customer_id) && !empty($customer_id))
    { 
      $cust_data = $this->common_model->selectDetailsWhr('view_custoer','customer_id',$cust_id);
      $chat_details_data = $this->admin_model->fetch_chat_data($customer_id,$cust_id);
      $chat_details_data1 = $this->admin_model->fetch_chat_data1($customer_id,$cust_id);
      if((isset($chat_details_data) && !empty($chat_details_data)) || (isset($chat_details_data1) && !empty($chat_details_data1)))
      {
        if(isset($chat_details_data1) && !empty($chat_details_data1))
        {
          $chat_details=array_merge($chat_details_data,$chat_details_data1);
          $chat_details1 = json_decode(json_encode($chat_details), true);
          function compareByName($a, $b) 
          {
            return strcmp($a["inbox_id"], $b["inbox_id"]);
          }
           usort($chat_details1,'compareByName');
           //$data['chat_details']=$chat_details;
           //print_r($chat_details1);
           $json = array("json_data"=>$chat_details1,"cust_data"=>$cust_data);
        }
        else
        {
          $chat_details = $this->admin_model->fetch_chat_data($customer_id,$cust_id);
          $json = array("json_data"=>$chat_details,"cust_data"=>$cust_data);
        }
      }
      else
      {
        $json = array("json_data"=>"Data Not Available.");
      } 
    }
    else
    {
      $json = array("status" => false,"msg"=>"Invalid User");   
    }
    echo json_encode($json);
  }

  public function app_save_chat_details()
  {
      $data = json_decode(file_get_contents('php://input'),true);
     // print_r($data);
      $user_id=(isset($data['user_id']) && !empty($data['user_id']))?$data['user_id']:'';
      $c_user_id=(isset($data['c_user_id']) && !empty($data['c_user_id']))?$data['c_user_id']:'';
      $messae=(isset($data['messae']) && !empty($data['messae']))?$data['messae']:'';
      $cur_date=date('Y-m-d H:i:s');
      $data=array('send_by'=>$user_id,'send_to'=>$c_user_id,'messae'=>$messae,'created_by'=>$user_id,'created_on'=>$cur_date);
      if((isset($user_id) && !empty($user_id)) && (isset($c_user_id) && !empty($c_user_id)) && (isset($messae) && !empty($messae)))
      {
        $result=$this->common_model->addData('tbl_inbox',$data);

        if($result)
        {
          $json = array("status" => true,"msg"=>"Chat Saved Successfully");
        }
        else
        {
          $json = array("status" => false,"msg"=>" Error.! While Saving Chat"); 
        }
      }
      else
      {
        $json = array("status" => false,"msg"=>"Invalid User");   
      }
      echo json_encode($json);
  }

  public function app_inbox_details()
  {
      $data = json_decode(file_get_contents('php://input'),true);
      $user_id=(isset($data['user_id']) && !empty($data['user_id']))?$data['user_id']:'';
      if((isset($user_id) && !empty($user_id)))
      {
        $inbox_data1=$this->admin_model->fetch_inbox1($user_id);
        $inbox_data2=$this->admin_model->fetch_inbox2($user_id);
        if((isset($inbox_data1) && !empty($inbox_data1)) && (isset($inbox_data2) && !empty($inbox_data2)))
        {
            $inbox_details=array_merge($inbox_data1,$inbox_data2);
            $inbox_details1 = json_decode(json_encode($inbox_details), true);
            function compareByName($a, $b) 
            {
              return strcmp($a["modified_on"], $b["modified_on"]);
            }
            usort($inbox_details1,'compareByName');
            arsort($inbox_details1);
            $tempArr = array_unique(array_column($inbox_details1, 'profile_code'));
            $inbox_details1=array_intersect_key($inbox_details1, $tempArr);
        }
        elseif(isset($inbox_data1) && !empty($inbox_data1))
        {
           $inbox_details1=$this->admin_model->fetch_inbox1($user_id);
           $tempArr = array_unique(array_column($inbox_details1, 'profile_code'));
            $inbox_details1=array_intersect_key($inbox_details1, $tempArr);
        }
        elseif(isset($inbox_data2) && !empty($inbox_data2))
        {
           $inbox_details1=$this->admin_model->fetch_inbox2($user_id);
           $tempArr = array_unique(array_column($inbox_details1, 'profile_code'));
            $inbox_details1=array_intersect_key($inbox_details1, $tempArr);
        }
        //print_r($inbox_details1);
       
        if(isset($inbox_details1) && !empty($inbox_details1))
        {
          $json = array("json_data"=>$inbox_details1);
        }
        else
        {
          $json = array("json_data"=>"Data Not Available.");
        }
      }
      else
      {
        $json = array("status" => false,"msg"=>"Invalid User");   
      }
      echo json_encode($json);
  }
  public function app_confirm()
  {
      $this->load->view('site/app_success');
  }
  public function app_failure()
  {
      $this->load->view('site/app_failure');
  }

  public function app_accepted_by_other()
  {
    $data = json_decode(file_get_contents('php://input'),true);
    $user_id=(isset($data['user_id']) && !empty($data['user_id']))?$data['user_id']:'';
    if(isset($user_id) && !empty($user_id))
    { 
      $accepted_request_data_by_user=$this->admin_model->fetch_accepted_request1($user_id,'Accepted');
      if($accepted_request_data_by_user) 
      {  
        $json = array("json_data"=>$accepted_request_data_by_user);
      }
      else
      {
        $json = array("json_data"=>"Data Not Available.");
      } 
    }
    else
    {
      $json = array("status" => false,"msg"=>"Invalid User");   
    }
    echo json_encode($json);
  }
  
  public function upload_image_profile1()
  {
    $user_id= $this->input->post('user_id');
    $customer_photo1= $this->input->post('user_photo1');
    $customer_photo1='';
    $error='';
    if(isset($_FILES['user_photo1']['name']))
    {
      $customer_photo1=$_FILES['user_photo1']['name']; 
      $customer_photo_Img1 = array('upload_path' =>'./uploads/customer_photo/',
             'fieldname' => 'user_photo1',
             'encrypt_name' => TRUE,        
             'overwrite' => FALSE,
             'allowed_types' => 'png|PNG|jpg|JPG|jpeg|JPEG' );
      $customer_photo_img1 = $this->imageupload->image_upload($customer_photo_Img1);
      $error= $this->upload->display_errors();
      if(isset($customer_photo_img1) && !empty($customer_photo_img1))
      {
        $empData = $this->upload->data(); 
        $customer_photo1 = $empData['file_name'];
      }
    }
   $data = array('customer_photo1'=>$customer_photo1);
   $result = $this->common_model->updateDetails('tbl_customer','customer_id',$user_id,$data);
    if(isset($result) && !empty($result))
    {
      $json = array("status" => true,"msg"=>"Image Uploaded Successfully");
    }
    else
    {
      $json = array("status" => false,"msg"=>"Error While Uploading Image.");
    }
    echo json_encode($json);
  }
  public function app_fetch_notice()
  {
    header('Content-Type: application/json');
    $notice_data=$this->common_model->fetchDataASC('tbl_news','news_id');
    
    if($notice_data) 
    {  
        
      $json = array("json_data"=>$notice_data);
      echo json_encode($json);
    }
    else
    {
      $json = array("json_data"=>"Data Not Available.");
      echo json_encode($json);
    } 
  }

  public function app_payment() { 
      $data = json_decode(file_get_contents('php://input'),true);
    
      $user_id=(isset($data['user_id']) && !empty($data['user_id']))?$data['user_id']:'';
      $membership_id=(isset($data['membership_id']) && !empty($data['membership_id']))?$data['membership_id']:'';
      $membership_amt=(isset($data['membership_amt']) && !empty($data['membership_amt']))?$data['membership_amt']:'';
      
      if((isset($user_id) && !empty($user_id)) && (isset($membership_amt) && !empty($membership_amt)) && (isset($membership_id) && !empty($membership_id))) {

        $data['membership_data'] = $this->common_model->selectDetailsWhr('tbl_membership','membership_id',$membership_id);
        $plan=$data['membership_data']->membership_plan_name;
        $membership_validity=$data['membership_data']->membership_validity;
        $data['cust_data'] = $this->common_model->selectDetailsWhr('tbl_customer','customer_id',$user_id);
        $mobile = $data['cust_data']->mobile;
        $email = $data['cust_data']->email;
        //mss
        $customer_id = $data['cust_data']->customer_id;
        //mss
        $customer_name = $data['cust_data']->f_name.' '.$data['cust_data']->m_name.' '.$data['cust_data']->l_name;
        $cur_date = date('Y-m-d');
        $transaction_id = $this->generateRandomString();

        $data = array('customer_id'=> $user_id,'customer_name'=> $customer_name,'mobile'=> $mobile,'email'=> $email,'membership_amt'=> $membership_amt,'membership_plan'=> $plan,'pay_type'=>'Online','membership_validity'=>$membership_validity,'payment_mode'=>'online','transcation_id'=>$transaction_id);


        $data1 = array('membership_status'=> 'Active','membership_from'=> $cur_date,'membership_validity'=> $membership_validity,'membership_id'=>$membership_id,'membership_name'=>$plan,'membership_amt'=>$membership_amt,'transcation_id'=>$transaction_id);


        $this->session->set_userdata('customer_details_data',$data1);

        $this->session->set_userdata('customer_data',$data);

        $this->load->library('Payumoney_lib');

        $this->payumoney_lib->app_online($customer_name,$data); 

      }
  }


  public function app_response() {

    $transactionResponse = new TransactionResponse();
    $transactionResponse->setRespHashKey("dffb6d0bd719603e0e");

    //$transactionResponse->setRespHashKey("KEYRESP123657234");

    if($transactionResponse->validateResponse($_POST)){

      if ($_POST['f_code'] == 'Ok') {
        
        redirect(base_url()."app_confirm");

      } else {

        redirect(base_url()."app_failure");

      }


    } else {

      echo "Invalid Signature";

    }

  }



}