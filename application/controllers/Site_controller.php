<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Site_controller extends CI_Controller {	



	public function __construct()

  	{ 

	    parent::__construct();       

	    date_default_timezone_set("Asia/Kolkata"); 

	    $value = base_url();

	    $this->load->library("email_sent");

	    $this->load->model('common_model');

	    $this->load->model('admin_model');

	    $this->load->library('Report_creation');

        $this->load->library('TransactionResponse');

	    setcookie("shivbandh",$value, time()+3600*24,'/'); 

	    ini_set('memory_limit', '1024M');

	    ini_set('max_execution_time', 2000); 

  	} 





     public function demo()

    {

       $this->load->view('site/demo');

    }



    public function index()

    {

        $data['customer_id'] = $this->session->userdata('customer_id');

        $data['slider_data'] = $this->common_model->fetchDataDESC('tbl_slider','slider_id');

        $data['profile_for'] = $this->common_model->fetchDataDESC('tbl_profile','profile_id');

        $data['community_for'] = $this->common_model->fetchDataDESC('tbl_community','community_id');

        $data['success_story_data'] = $this->common_model->fetchDataDESC('tbl_success_story','success_story_id');

        $data['inspiral_data'] = $this->common_model->fetchDataDESC('tbl_inspiral','inspiral_id');

        $data['news_data'] = $this->admin_model->news_data();

        $this->load->view('site/index',$data);

    }



    public function register()

    {
      
        $f_name = $this->input->post('f_name');

        $m_name = $this->input->post('m_name');

        $l_name = $this->input->post('l_name');

        $email_id = $this->input->post('email_id');

        $mobile_no = $this->input->post('mobile_no');

        $profile_for = $this->input->post('profile_for');

        $community_for = $this->input->post('community_for');

        $term_condition = $this->input->post('term_condition');

        $dob = $this->input->post('dob');

        $gender = $this->input->post('gender');

        $password = $this->input->post('password');



        $confirm_password = $this->input->post('confirm_password');

        $otp = mt_rand(1000, 9999);

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

        //$random=substr($random, 3, -12);

        $profile_code=$sh.$cust_id.$random;



        if(isset($dob) && !empty($dob)) {$dob1=date('Y-m-d',strtotime($dob)); } else {$dob1='0000-00-00'; }

        $email_data = $this->common_model->selectDetailsWhr('tbl_customer','email',$email_id);

        $email_data1 = $this->common_model->selectDetailsWhr('tbl_customer','mobile',$mobile_no);

        $data = array('profile_code'=>$profile_code,'f_name'=>$f_name,'m_name'=>$m_name,'l_name'=>$l_name,'email'=>$email_id,'mobile'=>$mobile_no,'password'=>$password,'otp'=>$otp,'profile_for'=>$profile_for,'community'=>$community_for,'dob'=>$dob1,'gender'=>$gender,'term_condition'=>$term_condition);

        //print_r($data);

        if((isset($email_data1) && !empty($email_data1)))

        {

            $this->json->jsonReturn(array(

                'valid'=>FALSE,

                'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> User Already Registered With Us..!</div>',

                'no_popup'=>'no_popup'

            ));

        }

        else

        {

            if($password==$confirm_password)

            {

                $result =  $this->common_model->addData('tbl_customer',$data);

                if($result)

                {

                    $userdata =$this->common_model->selectDetailsWhr('tbl_customer','customer_id',$result);

                   // $message = 'Hi '.$userdata->f_name.' Welcome to Shivbandhan. Your OTP is '.$otp;
                    $message = "Dear User,
Your one time password is : $otp.
Thank You,
Team Shivbandhan.";
                    $tempate_id = '1207165839071359752';
                    sendSms($userdata->mobile,$message,$tempate_id);



                    $this->session->set_userdata("customer_id",$userdata->customer_id);

                  $this->json->jsonReturn(array(  

                    'valid'=>TRUE,

                    'msg'=>'<div class="alert modify alert-success"><strong> Well Done !</strong> Registered Successfully..!</div>',

                    'redirect'=>base_url().'profile'



                  ));

                }

                else

                {

                  $this->json->jsonReturn(array(

                    'valid'=>FALSE,

                    'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Registering..!</div>'

                  ));

                }

            }

            else

            {

                $this->json->jsonReturn(array(

                    'valid'=>FALSE,

                    'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> You Entered Wrong Password..!</div>'

                )); 

            }

        }

    }

    public function site_login()

    {

        $email_id = $this->input->post('email_id');

        $password = $this->input->post('password');



       /* $email_id = '9146560712';

        $password = '123456';*/



        $email_data = $this->admin_model->site_login($email_id,$password);

        if(isset($email_data) && !empty($email_data))

        {

            $this->session->set_userdata("customer_id",$email_data->customer_id);

            $data['customer_data'] = $this->common_model->selectDetailsWhr('tbl_customer','customer_id',$email_data->customer_id);



            /*print_r($data['customer_data']);

            die();*/



            /*if($data['customer_data']->membership_status=='Active')

            {

                $day=$data['customer_data']->membership_validity;

                $date1 = strtotime($data['customer_data']->membership_from);



                $date2 = strtotime("+".$day." day", $date1);

                $form_date = date('d-m-Y', $date2);



                

                



                //$to_date = date('d-m-Y');

                

                $to_date = date('d-m-Y', strtotime("11-04-2019")); 



                echo $to_date;

                

                //die();



                //$new_date = date('d-m-Y', strtotime("+1 day"));



                if($to_date >= $form_date) {  

                    echo "string";          

                    die();

                    $data=array('membership_status'=>'Deactive');

                    $result=$this->common_model->updateDetails('tbl_customer','customer_id',$email_data->customer_id,$data);

                }

            }*/



            $this->json->jsonReturn(array(  

                'valid'=>TRUE,

                'msg'=>'<div class="alert modify alert-success"><strong> Well Done !</strong> Login Successfully..!</div>',

                'redirect'=>base_url().'matches'

            ));

        }

        else

        {

            $this->json->jsonReturn(array(

                'valid'=>FALSE,

                'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> You Entered Wrong Password..!</div>',

                'no_popup'=>'no_popup'

            )); 

        }

    }



    public function site_logout() 

    {

        $this->authentication->logout();     

        redirect('home');     

    } 

    /*matches search by user_id cast*/

    public function matches() {
        $user_id=$this->session->userdata('customer_id');
        $user_data = $this->web_model->get_cust_details($user_id);
        $cast_name = $user_data->cast_name;
        $gend = $user_data->gender;
        $expected_cast = $user_data->expected_cast;
        if($gend=='Male')

        {

          $gend='Female';

        }

        else

        {

          $gend='Male';

        }

        if($expected_cast==760 || $expected_cast==313){
        $data['matches_profile'] =$this->admin_model->fetch_quick_search_all_profile($gend,$user_id);
        }else{
        $data['matches_profile'] =$this->admin_model->fetch_quick_search1($gend,$cast_name,$user_id);
        }
        $this->load->view('site/matches',$data);

    }


    /*public function matches()   

    {

        $user_id=$this->session->userdata('customer_id');

        

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

         

        $data['matches_profile'] =$this->web_model->fetch_quick_search1($gend);

       // print_r($data['matches_profile']);

        $this->load->view('site/matches',$data);

    }*/



    public function profile()

    {

        $customer_id = $this->session->userdata('customer_id');

        $data['customer_data'] = $this->common_model->selectDetailsWhr('tbl_customer','customer_id',$customer_id);

        $data['profile_for'] = $this->common_model->fetchDataDESC('tbl_profile','profile_id');

        $data['community_for'] = $this->common_model->fetchDataDESC('tbl_community','community_id');

        $data['marital_status_data'] = $this->common_model->fetchDataDESC('tbl_marital','marital_id');

        $data['cast_data'] = $this->common_model->fetchDataDESC('tbl_cast','cast_id');

        $data['sub_cast_data'] = $this->common_model->fetchDataDESC('tbl_sub_cast','sub_cast_id');

        $data['complexion_data'] = $this->common_model->fetchDataDESC('tbl_complexion','complexion_id');

        $data['rashi_data'] = $this->common_model->fetchDataDESC('tbl_rashi','rashi_id');

        $data['nakshtra_data'] = $this->common_model->fetchDataDESC('tbl_nakshtra','nakshtra_id');

        $data['charan_data'] = $this->common_model->fetchDataDESC('tbl_charan','charan_id');

        $data['gan_data'] = $this->common_model->fetchDataDESC('tbl_gan','gan_id');

        $data['nadi_data'] = $this->common_model->fetchDataDESC('tbl_nadi','nadi_id');

        $data['mangal_data'] = $this->common_model->fetchDataDESC('tbl_mangal','mangal_id');

        $data['education_data'] = $this->common_model->fetchDataDESC('tbl_education','education_id');

        $data['city_data'] = $this->common_model->fetchDataDESC('tbl_city','city_id');

        $data['district_data'] = $this->common_model->fetchDataDESC('tbl_city','city_id');

        $data['favourite_data'] = $this->admin_model->my_favourite($customer_id);

        $data['incoming_request_data'] = $this->admin_model->fetch_request($customer_id,'Pending');

        $data['accepted_request_data'] = $this->admin_model->fetch_accepted_request($customer_id,'Accepted');

        $data['accepted_request_data_by_user'] = $this->admin_model->fetch_accepted_request1($customer_id,'Accepted');

        $data['rejected_request_data'] = $this->admin_model->fetch_rjected_request($customer_id,'Rejected');

        $data['blocked_request_data'] = $this->admin_model->fetch_blocked_request($customer_id,'Block');

        $data['sent_request_data'] = $this->admin_model->sent_request($customer_id);



        $inbox_data1=$this->admin_model->fetch_inbox1($customer_id);

        $inbox_data2=$this->admin_model->fetch_inbox2($customer_id);

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

           $inbox_details1=$this->admin_model->fetch_inbox1($customer_id);

           $tempArr = array_unique(array_column($inbox_details1, 'profile_code'));

            $inbox_details1=array_intersect_key($inbox_details1, $tempArr);

        }

        elseif(isset($inbox_data2) && !empty($inbox_data2))

        {

           $inbox_details1=$this->admin_model->fetch_inbox2($customer_id);

           $tempArr = array_unique(array_column($inbox_details1, 'profile_code'));

            $inbox_details1=array_intersect_key($inbox_details1, $tempArr);

        }



        $data['inbox_data']=$inbox_details1;

        $data['payment_history'] = $this->common_model->selectAllWhr('tbl_payment_details','customer_id',$customer_id);

        $this->load->view('site/profile',$data);

    }



    public function verify_mobile()

    {

        $customer_id = $this->session->userdata('customer_id'); 

        $otp = $this->input->post('otp');

        $email_data = $this->common_model->selectDetailsWhr('tbl_customer','customer_id',$customer_id);

        if(isset($email_data) && !empty($email_data) && $email_data->otp==$otp)

        {

            $message = 'Hi '.$email_data->f_name.' '.$email_data->l_name.' Thank you for register your profile. SHIVBANDHAN  Download app now : https://bit.ly/2BHSHXs ';
            $tempate_id = '';
            sendSms($email_data->mobile,$message,$tempate_id);



            $data = array('status'=>'verified');

            $result=$this->common_model->updateDetails('tbl_customer','customer_id',$customer_id,$data);

            $this->json->jsonReturn(array(  

                'valid'=>TRUE,

                'msg'=>'<div class="alert modify alert-success"><strong> Well Done !</strong> Mobile Verified Successfully..!</div>'

            ));

        }

        else

        {

            $this->json->jsonReturn(array(

                'valid'=>FALSE,

                'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> You Entered Wrong OTP..!</div>'

            )); 

        }

    }



    public function send_otp()

    {  

        $id=$this->input->post('id');

        $user_data = $this->common_model->selectDetailsWhr("tbl_customer","customer_id",$id);

        $otp = mt_rand(1000, 9999);

        $data = array('otp'=>$otp);

        $result=$this->common_model->updateDetails('tbl_customer','customer_id',$id,$data);

        if($result)

        {

            //$message = 'Hi '.$user_data->f_name.' Welcome to Shivbandhan. Your OTP is '.$otp;
            $message = "Dear User,
Your one time password is : $otp.
Thank You,
Team Shivbandhan.";
								$template_id='1207165839071359752';
                                //$result1=$this->admin_model->sendRegistrationEmails($email,$profile_code,$name,$otp,$mobile,$customer_photo);
								sendSms($user_data->mobile, $message ,$template_id);



            $this->json->jsonReturn(array(

                'valid'=>TRUE,

                'msg'=>'<div class="alert modify alert-success"><strong></strong> OTP Send Successfully!</div>'

            ));

        }

        else

        {

            $this->json->jsonReturn(array(

                'valid'=>FALSE,

                'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Sending OTP !</div>'

            ));

        }

    }



    public function send_contct_otp()

    {  

        $mob=$this->input->post('mob');

        $otp = mt_rand(1000, 9999);

        $this->session->set_userdata('otp',$otp);

        //$message = 'Welcome to Shivbandhan. Your OTP is '.$otp.' Please Verify OTP Before SUbmit Contact.';
        $message = "Dear User,
Your one time password is : $otp.
Thank You,
Team Shivbandhan.";
        $tempate_id = '1207165839071359752';
        sendSms($mob,$message,$tempate_id);

    }

    

    public function save_profile_details() 

    {

        $id = $this->input->post('id');

        $stepNum = $this->input->post('step');

        $f_name=$this->input->post('f_name');

        $m_name=$this->input->post('m_name');

        $l_name=$this->input->post('l_name');

        $email=$this->input->post('email');

        $mobile=$this->input->post('mobile');

        $dob=$this->input->post('dob');

        $marital_status=$this->input->post('marital_status');

        $no_of_childs=$this->input->post('no_of_childs');

        $community=$this->input->post('community');

        $caste=$this->input->post('caste');

        $sub_caste=$this->input->post('sub_caste');

        $height=$this->input->post('height');

        $weight=$this->input->post('weight');

        $blood_group=$this->input->post('blood_group');

        $complexion=$this->input->post('complexion');

        $physical_disability=$this->input->post('physical_disability');

        $lens=$this->input->post('lens');

        //step 2

        $rashi=$this->input->post('rashi');

        $nakshtra=$this->input->post('nakshtra');

        $charan=$this->input->post('charan');

        $gan=$this->input->post('gan');

        $nadi=$this->input->post('nadi');

        $mangal=$this->input->post('mangal');

        $birth_place=$this->input->post('birth_place');

        $birth_time=$this->input->post('birth_time');

        $gotra=$this->input->post('gotra');

        //step 3

        $education=$this->input->post('education');

        $occupation_city=$this->input->post('occupation_city');

        $education_specification=$this->input->post('education_specification');

        $occupation=$this->input->post('occupation');

        $income=$this->input->post('income');

        //step 4

        $document_no=$this->input->post('document_no');

        $phone=$this->input->post('phone');

        $phone1=$this->input->post('phone1');

        $permanant_address=$this->input->post('permanant_address');

        $residence_address=$this->input->post('residence_address');

        //step 5

        $father=$this->input->post('father');

        $father_full_name=$this->input->post('father_full_name');

        $mother=$this->input->post('mother');

        $parent_residence_city=$this->input->post('parent_residence_city');

        $brothers=$this->input->post('brothers');

        $married_brothers=$this->input->post('married_brothers');

        $sisters=$this->input->post('sisters');

        $married_sisters=$this->input->post('married_sisters');

        $relative_surname=$this->input->post('relative_surname');

        $parent_occupation=$this->input->post('parent_occupation');

        $mama_surname=$this->input->post('mama_surname');

        $native_city=$this->input->post('native_city');

        $native_district=$this->input->post('native_district');

        $family_wealth=$this->input->post('family_wealth');

        $any_intercast_marriage=$this->input->post('any_intercast_marriage');

        $relation_cast=$this->input->post('relation_cast');

        //step 6

        $expected_mangal=$this->input->post('expected_mangal');

        $expected_cast=$this->input->post('expected_cast');

        $preffered_city=$this->input->post('preffered_city');

        $age_difference=$this->input->post('age_difference');

        $expected_height=$this->input->post('expected_height');

        $divorcee=$this->input->post('divorcee');

        $expected_education=$this->input->post('expected_education');

        $expected_income_per_annum=$this->input->post('expected_income_per_annum');



        if(isset($preffered_city) && !empty($preffered_city))

        {

            $preffered_city=implode(",",$preffered_city);

        }



        if(isset($expected_education) && !empty($expected_education))

        {

            $expected_education=implode(",",$expected_education);

        }

        

        $customer_photo='';

        $error='';

        if(isset($_FILES['customer_photo']['name']))//Code for to take image from form and check isset

        {

          $customer_photo=$_FILES['customer_photo']['name']; //here [] name attribute

          $customer_photo_Img = array('upload_path' =>'./uploads/customer_photo/',

                 'fieldname' => 'customer_photo',

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

        else

        {

          $customer_photo=$this->input->post('hidden_customer_photo');

        }



        $customer_photo1='';

        $error1='';

        if(isset($_FILES['customer_photo1']['name']))//Code for to take image from form and check isset

        {

          $customer_photo1=$_FILES['customer_photo1']['name']; //here [] name attribute

          $customer_photo_Img1 = array('upload_path' =>'./uploads/customer_photo/',

                 'fieldname' => 'customer_photo1',

                 'encrypt_name' => TRUE,        

                 'overwrite' => FALSE,

                 'allowed_types' => 'png|PNG|jpg|JPG|jpeg|JPEG' );

          $customer_photo_img1 = $this->imageupload->image_upload($customer_photo_Img1);

          $error1= $this->upload->display_errors();

          if(isset($customer_photo_img1) && !empty($customer_photo_img1))

          {

            $empData1 = $this->upload->data(); 

            $customer_photo1 = $empData1['file_name'];

          }

        }

        else

        {

          $customer_photo1=$this->input->post('hidden_customer_photo1');

        }



        $biodata='';

        $error2='';

        if(isset($_FILES['biodata']['name']))//Code for to take image from form and check isset

        {

          $biodata=$_FILES['biodata']['name']; //here [] name attribute

          $biodata1 = array('upload_path' =>'./uploads/biodata/',

                 'fieldname' => 'biodata',

                 'encrypt_name' => TRUE,        

                 'overwrite' => FALSE,

                 'allowed_types' => '*' );

          $biodata1 = $this->imageupload->image_upload($biodata1);

          $error2= $this->upload->display_errors();

          if(isset($biodata1) && !empty($biodata1))

          {

            $empData2 = $this->upload->data(); 

            $biodata = $empData2['file_name'];

          }

        }

        else

        {

          $biodata=$this->input->post('hidden_biodata');

        }





        $cur_date=date('Y-m-d H:i:s');



        if(isset($dob) && !empty($dob)) {$dob1=date('Y-m-d H:i:s',strtotime($dob)); } else {$dob1='0000-00-00'; }

         $data = array('f_name'=>$f_name,'m_name'=>$m_name,'l_name'=>$l_name,'email'=>$email,'mobile'=>$mobile,'dob'=>$dob1,'marital_status'=>$marital_status,'no_of_childs'=>$no_of_childs,'community'=>$community,'caste'=>$caste,'sub_caste'=>$sub_caste,'height'=>$height,'weight'=>$weight,'blood_group'=>$blood_group,'complexion'=>$complexion,'physical_disability'=>$physical_disability,'lens'=>$lens,'rashi'=>$rashi,'nakshtra'=>$nakshtra,'charan'=>$charan,'gan'=>$gan,'nadi'=>$nadi,'mangal'=>$mangal,'birth_place'=>$birth_place,'birth_time'=>$birth_time,'gotra'=>$gotra,'education'=>$education,'occupation_city'=>$occupation_city,'education_specification'=>$education_specification,'occupation'=>$occupation,'income'=>$income,'document_no'=>$document_no,'phone'=>$phone,'phone1'=>$phone1,'permanant_address'=>$permanant_address,'residence_address'=>$residence_address,'father'=>$father,'father_full_name'=>$father_full_name,'mother'=>$mother,'parent_residence_city'=>$parent_residence_city,'brothers'=>$brothers,'married_brothers'=>$married_brothers,'sisters'=>$sisters,'married_sisters'=>$married_sisters,'relative_surname'=>$relative_surname,'mama_surname'=>$mama_surname,'parent_occupation'=>$parent_occupation,'native_city'=>$native_city,'native_district'=>$native_district,'family_wealth'=>$family_wealth,'any_intercast_marriage'=>$any_intercast_marriage,'relation_cast'=>$relation_cast,'expected_mangal'=>$expected_mangal,'expected_cast'=>$expected_cast,'preffered_city'=>$preffered_city,'age_difference'=>$age_difference,'expected_height'=>$expected_height,'divorcee'=>$divorcee,'expected_education'=>$expected_education,'expected_income_per_annum'=>$expected_income_per_annum,'customer_photo'=>$customer_photo,'customer_photo1'=>$customer_photo1,'biodata'=>$biodata,'form_status'=>$stepNum,'created_by'=>$id);



        $cust_data=$this->common_model->selectDetailsWhr('tbl_customer','customer_id',$id);

       // print_r($data);

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

                }

                if($stepNum==2)

                {   

                    

                    if(isset($cust_data) && !empty($cust_data) && $cust_data->form_status < 3)

                    {

                        $data['form_status'] = '2';

                    }

                    $result = $this->common_model->updateDetails('tbl_customer','customer_id',$id,$data);

                }

                if($stepNum==3)

                {

                    if(isset($cust_data) && !empty($cust_data) && $cust_data->form_status < 4)

                    {

                        $data['form_status'] = '3';

                    }

                    $result = $this->common_model->updateDetails('tbl_customer','customer_id',$id,$data);   

                }

                

                if($stepNum==4)

                {

                    if(isset($cust_data) && !empty($cust_data) && $cust_data->form_status < 5)

                    {

                        $data['form_status'] = '4';

                    }

                    $result = $this->common_model->updateDetails('tbl_customer','customer_id',$id,$data);

                }

                if($stepNum==5)

                {

                    

                    if(isset($cust_data) && !empty($cust_data) && $cust_data->form_status < 6)

                    {

                        $data['form_status'] = '5';

                    }

                    $result = $this->common_model->updateDetails('tbl_customer','customer_id',$id,$data);

                }

                if($stepNum==6)

                {

                    $data['form_status'] = '6';

                    $result = $this->common_model->updateDetails('tbl_customer','customer_id',$id,$data);

                    if($result)  

                    {

                        $this->json->jsonReturn(array(

                            'valid'=>TRUE,

                            'msg'=>'<div class="alert modify alert-success"><strong>Well Done!</strong> Profile Data Completed successfully!</div>',

                            'redirect'=>base_url().'membership_plan'

                        ));

                    }

                    else

                    {

                        $this->json->jsonReturn(array(

                            'valid'=>FALSE,

                            'msg'=>'<div class="alert modify alert-error"><strong>Error!</strong> While saving Profile Data. Please try again!</div>'                   

                        ));

                    }

                }

                else

                {

                    if($result)  

                    {

                        $this->json->jsonReturn(array(

                            'valid'=>TRUE,

                            'id'=>$id

                        ));

                    }

                    else

                    {

                        $this->json->jsonReturn(array(

                            'valid'=>FALSE                  

                        ));

                    }

                }               

            }

            else

            {

                $this->json->jsonReturn(array(

                    'valid'=>FALSE,

                    'msg'=>'<div class="alert modify alert-error"><strong>Error!</strong> Not a valid User!</div>'                   

                ));

            }   

        }

        else

        {

            $this->json->jsonReturn(array(

                    'valid'=>FALSE,

                    'msg'=>'<div class="alert modify alert-error"><strong>Error!</strong> Not a valid User!</div>'                   

                ));

        }

    }



    public function contact_us()

    {

        $data['profile_for'] = $this->common_model->fetchDataDESC('tbl_profile','profile_id');

        $this->load->view('site/contact_us',$data);

    }



    public function save_contact()

    {

        $otp1=$this->session->userdata('otp');

        $yourname = $this->input->post('yourname');

        $phone = $this->input->post('phone');

        $email = $this->input->post('email');

        $subject = $this->input->post('subject');

        $message = $this->input->post('message');

        $otp = $this->input->post('otp');

        if($otp1==$otp)

        {

           $data = array('contact_name'=>$yourname,'contact_phone'=>$phone,'contact_email'=>$email,'contact_subject'=>$subject,'contact_message'=>$message);

            $result =  $this->common_model->addData('tbl_contact',$data);

            if($result)

            {

              $this->json->jsonReturn(array(  

                'valid'=>TRUE,

                'msg'=>'<div class="alert modify alert-success"><strong></strong> We Will Contact Soon...!</div>'

              ));

            }

            else

            {

              $this->json->jsonReturn(array(

                'valid'=>FALSE,

                'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Sending Contact Details !</div>'

              ));

            } 

        }

        else

        {

           $this->json->jsonReturn(array(

                'valid'=>FALSE,

                'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> Please Enter Appropriate OTP !</div>',

                'no_popup'=>'no_popup'

              )); 

        }

    }



    public function save_subscribe()

    {

        $email_id = $this->input->post('email_id');

        $email_data = $this->common_model->selectDetailsWhr('tbl_subscribe','email',$email_id);

        $data = array('email'=>$email_id,);

        if(isset($email_data) && !empty($email_data))

        {

            $this->json->jsonReturn(array(

                'valid'=>FALSE,

                'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> Email Already Subscribed.. !</div>'

            ));

        }

        else

        {

            $result =  $this->common_model->addData('tbl_subscribe',$data);

            if($result)

            {

              $this->json->jsonReturn(array(  

                'valid'=>TRUE,

                'msg'=>'<div class="alert modify alert-success"><strong> Well Done !</strong> Subscribe Successfully...!</div>'

              ));

            }

            else

            {

              $this->json->jsonReturn(array(

                'valid'=>FALSE,

                'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Subscribe !</div>'

              ));

            }

        }

    }



    public function privacy_policy()

    {

        $data['privacy_policy'] = $this->common_model->selectDetailsWhr('tbl_privacy','privacy_id','1');

        $this->load->view('site/privacy_policy',$data);

    }



    public function term_condition_details()

    {

        $data['term_condition_details'] = $this->common_model->selectDetailsWhr('tbl_terms_condition','term_condition_id','1');

        $this->load->view('site/term_condition_details',$data);

    }



    public function site_forgot_pass()   

    {   

        $view = $this->load->view('site/site_forgot_password','',TRUE);

        $this->json->jsonReturn(array('view'=>$view));

    }

    

    public function save_site_forgot_pass()

    {

        $mobile=$this->input->post('mobile');

        $password=mt_rand(100000,999999);



        $userData = $this->common_model->selectDetailsWhr('tbl_customer','mobile',$mobile);

        if(isset($userData) && !empty($userData))

        {   

            $user_id=$userData->customer_id;

            if($userData->email)

            {

               $email=$userData->email;

            }

            else

            {

                $email='';

            }

            $user_data=array('password'=>$password);

            //$message= 'Der User Your Shivbandhan New Password is : '.$password;
            $message = "Dear User,
Your one time password is : $password.
Thank You,
Team Shivbandhan.";
            $tempate_id = '1207165839071359752';
            sendSms($mobile, $message,$tempate_id);

                

            $result=$this->admin_model->forgot_pass1($user_data,$password,$user_id,$email);     



            if($result)

            {

                $this->json->jsonReturn(array(

                    'valid'=>TRUE,

                    'msg'=>'<div class="alert modify alert-info"><strong></strong> New Password Send To Your Mobile NO!</div>'

                ));

            }

            else

            {

                $this->json->jsonReturn(array(

                    'valid'=>FALSE,

                    'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Password Sending On Mobile No.!</div>'

                ));

            }

        }

        else

        {

            $this->json->jsonReturn(array(

                'valid'=>FALSE,

                'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> You Enter Wrong Register Email id!</div>'

            ));         

        }       

    }



    public function membership_plan()

    {

        $data['membership_plan'] = $this->common_model->fetchDataASC('tbl_membership','membership_id');

        $this->load->view('site/membership',$data);

    }



    public function search_matches()   

    {

        $data['cast_data'] = $this->common_model->fetchDataASC('tbl_cast','cast_id');   

        $data['marital_data'] = $this->common_model->fetchDataASC('tbl_marital','marital_id');   

        $view = $this->load->view('site/search_matches',$data,TRUE);

        $this->json->jsonReturn(array('view'=>$view));

    }



    public function search_matches_by_id()   

    {

       $view = $this->load->view('site/search_matches_by_id','',TRUE);

        $this->json->jsonReturn(array('view'=>$view));

    }



    public function quick_result_by_profile()   

    {

        $profile_id = $this->input->post('profile_id');

        $data['matches_profile'] = $this->web_model->fetch_quick_search_by_id($profile_id);

        $this->load->view('site/quick_result',$data);

    }



    public function advance_search()   

    {

        $data['education_data'] = $this->common_model->fetchDataASC('tbl_education','education_id');   

        $data['district_data'] = $this->common_model->fetchDataASC('tbl_city','city_id');

        $view = $this->load->view('site/advance_search',$data,TRUE);

        $this->json->jsonReturn(array('view'=>$view));

    }





    public function quick_result()   

    {

        $user_id=$this->session->userdata('customer_id');

        $mangal = $this->input->post('mangal');

        $age_from = $this->input->post('age_from');

        $age_to = $this->input->post('age_to');

        $marital_status = $this->input->post('marital_status');

        $photo = $this->input->post('photo'); 



        //$user_data = $this->common_model->selectDetailsWhr('tbl_customer','customer_id',$user_id);
        $user_data = $this->web_model->get_cust_details($user_id);
        $cast_name = $user_data->cast_name;
        $gend = $user_data->gender;
        if($gend=='Male')

        {

          $gend='Female';

        }

        else

        {

          $gend='Male';

        }

         if((isset($caste) && !empty($caste)) || (isset($age_from) && !empty($age_from)) || (isset($age_to) && !empty($age_to))  || (isset($marital_status) && !empty($marital_status)) || (isset($photo) && !empty($photo)))

        {

            $data['matches_profile'] = $this->web_model->fetch_quick_search($mangal,$age_from,$age_to,$photo,$marital_status);  

        }

        else

        {

            $data['matches_profile'] =$this->web_model->fetch_quick_search1($gend,$cast_name,$user_id);

        }

        $this->load->view('site/quick_result',$data);

    }



    public function advance_result()   

    {

        $user_id=$this->session->userdata('customer_id');

        $birth_year_from = $this->input->post('birth_year_from');

        $birth_year_to = $this->input->post('birth_year_to');

        $education = $this->input->post('education');

        $district1 = $this->input->post('district1');

        $district2 = $this->input->post('district2');

        $district3 = $this->input->post('district3');

        $height_from = $this->input->post('height_from');

        $height_to = $this->input->post('height_to');

        $manglic = $this->input->post('manglic');

        $photo = $this->input->post('photo');



        //$user_data = $this->common_model->selectDetailsWhr('tbl_customer','customer_id',$user_id);
        $user_data = $this->web_model->get_cust_details($user_id);
        $cast_name = $user_data->cast_name;
        $gend = $user_data->gender;
        if($gend=='Male')

        {

          $gend='Female';

        }

        else

        {

          $gend='Male';

        }

        if((isset($birth_year_from) && !empty($birth_year_from)) || (isset($birth_year_to) && !empty($birth_year_to)) || (isset($education) && !empty($education))  || (isset($district1) && !empty($district1)) || (isset($district2) && !empty($district2)) || (isset($district3) && !empty($district3)) || (isset($height_from) && !empty($height_from)) || (isset($height_to) && !empty($height_to))  || (isset($manglic) && !empty($manglic)) || (isset($photo) && !empty($photo)))

        {

            $data['matches_profile'] = $this->web_model->fetch_advance_search($birth_year_from,$birth_year_to,$education,$district1,$district2,$district3,$height_from,$height_to,$manglic,$photo);

        }

        else

        {

            $data['matches_profile'] =$this->web_model->fetch_quick_search1($gend,$cast_name,$user_id);

        }

        $this->load->view('site/quick_result',$data);

    }



    public function profile_details()

    {

        $customer_id=$this->session->userdata('customer_id');

        $cust_id=$this->uri->segment(2);

        $data['customer_details_data'] = $this->admin_model->fetch_customer_details($cust_id);

        $data['requset_data'] = $this->admin_model->contact_show($customer_id,$cust_id);

        $this->load->view('site/profile_details',$data);

    }

    public function book_online($membership_id)
    { 
        if(isset($membership_id) && !empty($membership_id))
        {
            $customer_id=$this->session->userdata('customer_id');
    
            /*$membership_amt=$this->input->post('membership_amt');
    
            $membership_id=$this->input->post('membership_id');*/
    
            $membership_data = $this->common_model->selectDetailsWhr('tbl_membership','membership_id',$membership_id);
    
            $plan=$membership_data->membership_plan_name;
            $membership_validity=$membership_data->membership_validity;
            $membership_amount = $membership_data->total_amount;
    
            $cust_data = $this->common_model->selectDetailsWhr('tbl_customer','customer_id',$customer_id);
            $mobile=$cust_data->mobile;
            $email=$cust_data->email;
            $customer_name=$cust_data->f_name.' '.$cust_data->m_name.' '.$cust_data->l_name;
    
            $cur_date=date('Y-m-d');
    
            $transaction_id=$this->generateRandomString();
            $data = array('customer_id'=> $customer_id,'customer_name'=> $customer_name,'mobile'=> $mobile,'email'=> $email,'membership_amt'=> $membership_amount,'membership_plan'=> $plan,'pay_type'=>'Online','membership_validity'=>$membership_validity,'payment_mode'=>'online','transcation_id'=>$transaction_id);
            $data1 = array('membership_status'=> 'Active','membership_from'=> $cur_date,'membership_validity'=> $membership_validity,'membership_id'=>$membership_id,'membership_name'=>$plan,'membership_amt'=>$membership_amt,'transcation_id'=>$transaction_id);
            
            $this->session->set_userdata('customer_data',$data);
            $this->session->set_userdata('customer_details_data',$data1);
    
            $this->load->library('Payumoney_lib');
            $this->payumoney_lib->online($customer_name,$data); 
        }



        //$this->load->library('TransactionRequest');

        //$this->TransactionRequest->online($customer_name,$data); 

    }



    public function response() {

        $cust_id = $this->session->userdata('customer_id');

        $customer_data = $this->session->userdata('customer_data');

        $customer_details_data = $this->session->userdata('customer_details_data');



        $transactionResponse = new TransactionResponse();

        $transactionResponse->setRespHashKey("dffb6d0bd719603e0e");



        $status=$_POST["desc"];

        $txnid=$_POST["mer_txn"];



        if($transactionResponse->validateResponse($_POST)){

            if ($_POST['f_code'] == 'C' || $_POST['f_code'] == 'F') {

                

                echo "<center><h3>Your order status is ". $status .".</h3></center>";

                echo "<center><h4>Your transaction id for this transaction is ".$txnid.". You may try again by clicking <a href='".base_url()."membership_plan'>here</a>.</h4></center>";

                echo "<a></a>";  



            } else {



                $this->db->trans_start();

                $customer_data['payment_status']=$status;

                $result1 =  $this->admin_model->save_membership($customer_data,$customer_details_data);

                $result=$this->db->trans_complete();

                $transcation_data1 = $this->common_model->selectDetailsWhr('tbl_customer','customer_id',$cust_id);

                    $mobile=$transcation_data1->mobile;

                $email=$transcation_data1->email;

                $customer_name=$transcation_data1->f_name.' '.$transcation_data1->m_name.' '.$transcation_data1->l_name;

                $message='Hi '.$customer_name.' Thank you for choosing Shivbandhan Matrimony. Your Package '.$transcation_data1->membership_name.' has been activated. Plase Download our app : https://bit.ly/2BHSHXs ';
                $tempate_id = '';
                sendSms($mobile, $message,$tempate_id);

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

                $this->session->set_userdata('transcation_data1',$transcation_data1);

                $this->session->unset_userdata("customer_data");

                $this->session->unset_userdata("customer_details_data");

                $this->session->unset_userdata("membership_amt");

                $this->session->unset_userdata("membership_id");

                redirect(base_url()."confirm");

            }



        } else {

            echo "Invalid Transaction. Please try again";

        }

    }





    public function order_success()

    {

        $cust_id = $this->session->userdata('customer_id');

        $customer_data = $this->session->userdata('customer_data');

        $customer_details_data = $this->session->userdata('customer_details_data');



        $status=$_POST["status"];

        $firstname=$_POST["firstname"];

        $amount=$_POST["amount"];

        $txnid=$_POST["txnid"];

        $posted_hash=$_POST["hash"];

        $key=$_POST["key"];

        $productinfo=$_POST["productinfo"];

        $email=$_POST["email"];

        $salt="FY2RfUO92x";

        $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;

        $hash = hash("sha512", $retHashSeq);

        

        if ($hash != $posted_hash) 

        {

            echo "Invalid Transaction. Please try again";

        }

        else

        {

            $this->db->trans_start();

            $customer_data['payment_status']=$status;

            $result1 =  $this->admin_model->save_membership($customer_data,$customer_details_data);

            $result=$this->db->trans_complete();

            $transcation_data1 = $this->common_model->selectDetailsWhr('tbl_customer','customer_id',$cust_id);

                $mobile=$transcation_data1->mobile;

            $email=$transcation_data1->email;

            $customer_name=$transcation_data1->f_name.' '.$transcation_data1->m_name.' '.$transcation_data1->l_name;

            $message='Hi '.$customer_name.' Thank you for choosing Shivbandhan Matrimony. Your Package '.$transcation_data1->membership_name.' has been activated. Plase Download our app : https://bit.ly/2BHSHXs ';
            $tempate_id = '';
            sendSms($mobile, $message,$tempate_id);

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

            $this->session->set_userdata('transcation_data1',$transcation_data1);

            $this->session->unset_userdata("customer_data");

            $this->session->unset_userdata("customer_details_data");

            $this->session->unset_userdata("membership_amt");

            $this->session->unset_userdata("membership_id");

            redirect(base_url()."confirm"); 

        } 

    }



    public function order_failure()

    {

        $status=$_POST["status"];

        $firstname=$_POST["firstname"];

        $amount=$_POST["amount"];

        $txnid=$_POST["txnid"];

        $posted_hash=$_POST["hash"];

        $key=$_POST["key"];

        $productinfo=$_POST["productinfo"];

        $email=$_POST["email"];

        $salt="FY2RfUO92x";

        $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;

        $hash = hash("sha512", $retHashSeq);          

        if ($hash != $posted_hash) {

           echo "Invalid Transaction. Please try again";

        }

        else {

            echo "<center><h3>Your order status is ". $status .".</h3></center>";

            echo "<center><h4>Your transaction id for this transaction is ".$txnid.". You may try again by clicking <a href='".base_url()."membership_plan'>here</a>.</h4></center>";

            echo "<a></a>";                  

        } 

    }

  

    public function confirm()      

    { 

        $this->load->view('site/confirm');

    }



     //sub admin payment integration

    

    public function do_payment()

    { 

        /*$customer_id=$this->session->userdata('customer_id');

        $membership_amt=$this->input->post('membership_amt');

        $membership_id=$this->input->post('membership_id');*/



        $cust_id=$this->uri->segment(2);

        $membership_id=$this->uri->segment(3);

        $membership_amt=$this->uri->segment(4);

        $user_id=$this->session->userData("user_id");



        $this->session->set_userdata('cst_id',$cust_id);

        $customer_id = $this->session->userdata('cst_id');



        $data['membership_data'] = $this->common_model->selectDetailsWhr('tbl_membership','membership_id',$membership_id);

        $plan=$data['membership_data']->membership_plan_name;

        $membership_validity=$data['membership_data']->membership_validity;

        $data['cust_data'] = $this->common_model->selectDetailsWhr('tbl_customer','customer_id',$customer_id);

        $mobile=$data['cust_data']->mobile;

        $email=$data['cust_data']->email;

        $customer_name=$data['cust_data']->f_name.' '.$data['cust_data']->m_name.' '.$data['cust_data']->l_name;

        $cur_date=date('Y-m-d');

        

        $transaction_id=$this->generateRandomString();

        $data = array('customer_id'=> $customer_id,'customer_name'=> $customer_name,'mobile'=> $mobile,'email'=> $email,'membership_amt'=> $membership_amt,'membership_plan'=> $plan,'pay_type'=>'Online','membership_validity'=>$membership_validity,'payment_mode'=>'online','transcation_id'=>$transaction_id,'user_id'=>$user_id);



        $data1 = array('membership_status'=> 'Active','membership_from'=> $cur_date,'membership_validity'=> $membership_validity,'membership_id'=>$membership_id,'membership_name'=>$plan,'membership_amt'=>$membership_amt,'transcation_id'=>$transaction_id);



        $this->session->set_userdata('customer_data_cst',$data);

        $this->session->set_userdata('customer_details_data_cst',$data1);



        $this->load->library('Payumoney_lib');

        $this->payumoney_lib->do_onlinePayment($customer_name,$data); 

    }



    public function do_order_success()

    {



        $cust_id = $this->session->userdata('cst_id');

        $customer_data = $this->session->userdata('customer_data_cst');

        $customer_details_data = $this->session->userdata('customer_details_data_cst');



        $status=$_POST["status"];

        $firstname=$_POST["firstname"];

        $amount=$_POST["amount"];

        $txnid=$_POST["txnid"];

        $posted_hash=$_POST["hash"];

        $key=$_POST["key"];

        $productinfo=$_POST["productinfo"];

        $email=$_POST["email"];

        $salt="FY2RfUO92x";

        $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;

        $hash = hash("sha512", $retHashSeq);

        

        if ($hash != $posted_hash) 

        {

            echo "Invalid Transaction. Please try again";

        }

        else

        {

            $this->db->trans_start();

           $customer_data['payment_status']=$status;

            $result1 =  $this->admin_model->save_membership_by_sub_admin($customer_data,$customer_details_data);

            $result=$this->db->trans_complete();

            $transcation_data1 = $this->common_model->selectDetailsWhr('tbl_customer','customer_id',$cust_id);

            

            $mobile=$transcation_data1->mobile;

            $email=$transcation_data1->email;



            $customer_name=$transcation_data1->f_name.' '.$transcation_data1->m_name.' '.$transcation_data1->l_name;



            $message='Hi '.$customer_name.' Thank you for choosing Shivbandhan Matrimony. Your Package '.$transcation_data1->membership_name.' has been activated. Plase Download our app : https://bit.ly/2BHSHXs ';
            $tempate_id = '';
            sendSms($mobile, $message,$tempate_id);



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

            $this->session->set_userdata('transcation_data1_cst',$transcation_data1);

            $this->session->unset_userdata("customer_data_cst");

            $this->session->unset_userdata("customer_details_data_cst");

            //$this->session->unset_userdata("membership_amt");

            //$this->session->unset_userdata("membership_id");

            $this->session->unset_userdata("cst_id");

            redirect(base_url()."do_confirm"); 

        } 

    }



    public function do_order_failure()

    {

        $status=$_POST["status"];

        $firstname=$_POST["firstname"];

        $amount=$_POST["amount"];

        $txnid=$_POST["txnid"];

        $posted_hash=$_POST["hash"];

        $key=$_POST["key"];

        $productinfo=$_POST["productinfo"];

        $email=$_POST["email"];

        $salt="FY2RfUO92x";

        $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;

        $hash = hash("sha512", $retHashSeq);          

        if ($hash != $posted_hash) {

           echo "Invalid Transaction. Please try again";

        }

        else {

            echo "<center><h3>Your order status is ". $status .".</h3></center>";

            echo "<center><h4>Your transaction id for this transaction is ".$txnid.". You may try again by clicking <a href='".base_url()."payment_details'>here</a>.</h4></center>";

            echo "<a></a>";                  

        } 

    }



    public function do_confirm()      

    { 

        $this->load->view('sub_admin/do_confirm');

    }



    // end sub admin payment integration



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



    public function send_request()

    {  

        $customer_id=$this->session->userdata('customer_id');

        $id=$this->input->post('id');

        $data=array('requested_by'=>$customer_id,'requested_to'=>$id);

        $req=$this->common_model->selectMultiwhere('tbl_request','requested_by','requested_to',$customer_id,$id);

        if(isset($req) && !empty($req))

        {

            $this->json->jsonReturn(array(

                'valid'=>FALSE,

                'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> Already Request has been Send. !</div>'

            ));

        }

        else

        {

            $data['created_by']=$customer_id;

            $data['created_on']=date('Y-m-d H:i:s');

            $result =  $this->common_model->addData('tbl_request',$data);

            if($result)

            {

                $userdata =$this->common_model->selectDetailsWhr('tbl_customer','customer_id',$customer_id);

                $userdata1 =$this->common_model->selectDetailsWhr('tbl_customer','customer_id',$id);

                $message = 'Dear '.$userdata1->profile_code.', You have received new profile request please check '.$userdata->profile_code.' Download App : https://bit.ly/2BHSHXs';
                $tempate_id = '';
                sendSms($userdata1->mobile,$message,$tempate_id);



                $this->json->jsonReturn(array(

                    'valid'=>TRUE,

                    'msg'=>'<div class="alert modify alert-success"><strong></strong> Request Send Successfully!</div>'

                ));

            }

            else

            {

                $this->json->jsonReturn(array(

                    'valid'=>FALSE,

                    'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Sending Request !</div>'

                ));

            } 

        }

    }



    public function add_favourite()

    {  

        $customer_id=$this->session->userdata('customer_id');

        $id=$this->input->post('id');

        $data=array('favourite_by'=>$customer_id,'favourite_to'=>$id);

        $req=$this->common_model->selectMultiwhere('tbl_favourite','favourite_by','favourite_to',$customer_id,$id);

        if(isset($req) && !empty($req))

        {

            $this->json->jsonReturn(array(

                'valid'=>FALSE,

                'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> Already In Favourite List. !</div>'

            ));

        }

        else

        {

            $data['created_by']=$customer_id;

            $data['created_on']=date('Y-m-d H:i:s');

            $result =  $this->common_model->addData('tbl_favourite',$data);

            if($result)

            {

                $this->json->jsonReturn(array(

                    'valid'=>TRUE,

                    'msg'=>'<div class="alert modify alert-success"><strong></strong> Added In Favourite List Successfully!</div>'

                ));

            }

            else

            {

                $this->json->jsonReturn(array(

                    'valid'=>FALSE,

                    'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Adding in Favourite List !</div>'

                ));

            } 

        }

    }



    public function delete_favourite()

    {

        $customer_id=$this->session->userdata('customer_id');

        $id=$this->input->post('id');

        $data=array('display'=>'N','modified_by'=>$customer_id);

        $result=$this->common_model->updateDetails('tbl_favourite','favourite_id',$id,$data);



        if($result)

        {

          $this->json->jsonReturn(array(

              'valid'=>TRUE,

              'msg'=>'<div class="alert modify alert-success"><strong></strong> My Favourite Details Remove Successfully!</div>'

          ));

        }

        else

        {

          $this->json->jsonReturn(array(

              'valid'=>FALSE,

              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Removing My Favourite Details !</div>'

          ));

        }

    }



    public function accept_request()

    {

        $customer_id=$this->session->userdata('customer_id');

        $id=$this->input->post('id');

        $data=array('status'=>'Accepted','modified_by'=>$customer_id);

        $result=$this->common_model->updateDetails('tbl_request','request_id',$id,$data);



        if($result)

        {

            $userdata =$this->common_model->selectDetailsWhr('tbl_customer','customer_id',$customer_id);

            $userdata1 =$this->common_model->selectDetailsWhr('tbl_customer','customer_id',$id);

            $message = 'Dear '.$userdata1->profile_code.', Your Request has been approved by '.$userdata->profile_code.' More details please login and start conversion. Download App : https://bit.ly/2BHSHXs';
            $tempate_id = '';
            sendSms($userdata1->mobile,$message,$tempate_id);



          $this->json->jsonReturn(array(

              'valid'=>TRUE,

              'msg'=>'<div class="alert modify alert-success"><strong></strong> Request Details Accepted Successfully!</div>'

          ));

        }

        else

        {

          $this->json->jsonReturn(array(

              'valid'=>FALSE,

              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Accepting Request Details !</div>'

          ));

        }

    }



    public function reject_request()

    {

        $customer_id=$this->session->userdata('customer_id');

        $id=$this->input->post('id');

        $data=array('status'=>'Rejected','modified_by'=>$customer_id);

        $result=$this->common_model->updateDetails('tbl_request','request_id',$id,$data);



        if($result)

        {

          $this->json->jsonReturn(array(

              'valid'=>TRUE,

              'msg'=>'<div class="alert modify alert-success"><strong></strong> Request Details Remove Successfully!</div>'

          ));

        }

        else

        {

          $this->json->jsonReturn(array(

              'valid'=>FALSE,

              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Rejecting Request Details !</div>'

          ));

        }

    }



    public function cancel_request()

    {

        $customer_id=$this->session->userdata('customer_id');

        $id=$this->input->post('id');

        $data=array('display'=>'N','modified_by'=>$customer_id);

        $result=$this->common_model->updateDetails('tbl_request','request_id',$id,$data);



        if($result)

        {

          $this->json->jsonReturn(array(

              'valid'=>TRUE,

              'msg'=>'<div class="alert modify alert-success"><strong></strong> Request Details Cancelled Successfully!</div>'

          ));

        }

        else

        {

          $this->json->jsonReturn(array(

              'valid'=>FALSE,

              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Cancelling Request Details !</div>'

          ));

        }

    }



    public function change_site_pass()

    {

        $customer_id=$this->session->userdata('customer_id');

        $cur_password=trim($this->input->post('current_pass'));

        $password=trim($this->input->post('new_pass'));



        $data['custData'] = $this->common_model->selectDetailsWhr('tbl_customer','customer_id',$customer_id);

        $user_pass=$data['custData']->password;

        if($user_pass==$cur_password)

        {

          $user_data=array('password'=>$password);

            

          $result=$this->common_model->updateDetails('tbl_customer','customer_id',$customer_id,$user_data);

          

          if($result)

          {

            $this->json->jsonReturn(array(

              'valid'=>TRUE,

              'msg'=>'<div class="alert modify alert-info"><strong></strong> Password Updated Successfully!</div>'

            ));

          }

          else

          {

            $this->json->jsonReturn(array(

              'valid'=>FALSE,

              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Updating Password !</div>'

            ));

          }

        }

        else

        {

          $this->json->jsonReturn(array(

            'valid'=>FALSE,

            'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> Invalid Current Password!</div>'

          ));     

        }   

    }

    /*function compareByName($a, $b) 

    {

      return strcmp($a["inbox_id"], $b["inbox_id"]);

    }*/

    public function chat_details()

    {

        $customer_id=$this->session->userdata('customer_id');

        $cust_id=$this->uri->segment(2);

        $data['cust_data'] = $this->common_model->selectDetailsWhr('view_custoer','customer_id',$cust_id);

        $chat_details_data = $this->admin_model->fetch_chat_data($customer_id,$cust_id);

        $chat_details_data1 = $this->admin_model->fetch_chat_data1($customer_id,$cust_id);

        if(isset($chat_details_data1) && !empty($chat_details_data1))

        {

           $chat_details=array_merge($chat_details_data,$chat_details_data1);

           $chat_details = json_decode(json_encode($chat_details), true);

           function compareByName($a, $b) 

            {

              return strcmp($a["inbox_id"], $b["inbox_id"]);

            }

           usort($chat_details,'compareByName');

           $data['chat_details']=$chat_details;

           //$chat_details=usort($chat_details,'inbox_id');

           //$chat_details=ksort($chat_details);

           //$myArray[] = (object) array($chat_details);

           //print_r($chat_details);

        }

        else

        {

            $chat_details= $this->admin_model->fetch_chat_data($customer_id,$cust_id);

             $data['chat_details'] = json_decode(json_encode($chat_details), true);

        }

        

        $this->load->view('site/chat_details',$data);

    }



    public function save_chat()

    {

        $customer_id=$this->session->userdata('customer_id');

        $messae=trim($this->input->post('messae'));

        $cust_id=$this->input->post('cust_id');

        $cur_date=date('Y-m-d :i:s');

         $data = array('send_by'=>$customer_id,'send_to'=>$cust_id,'messae'=>$messae,'created_on'=>$cur_date,'created_by'=>$customer_id);

        $result=$this->common_model->addData('tbl_inbox',$data);

        if($result)

        {

            $this->json->jsonReturn(array(

              'valid'=>TRUE,

              'msg'=>'<div class="alert modify alert-info"><strong></strong> Messae Send Successfully!</div>'

            ));

        }

        else

        {

            $this->json->jsonReturn(array(

              'valid'=>FALSE,

              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Sending Messae !</div>'

            ));

        } 

    }



    public function block_user_details()

    {

        $customer_id=$this->session->userdata('customer_id');

        $id=$this->input->post('id');

        

        $req=$this->common_model->selectMultiwhere('tbl_request','requested_by','requested_to',$id,$customer_id);

        if(isset($req) && !empty($req))

        {

            $this->json->jsonReturn(array(

              'valid'=>FALSE,

              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong>  Already User Blocked !</div>'

            ));

        }

        else

        {

            $req2=$this->common_model->selectMultiwhere('tbl_block_request','request_user_id','block_user_id',$customer_id,$id);

            if($req2)

            {

                $a_id=$req2->request_id;

                $result=$this->common_model->updateDetails('tbl_block_request','request_id',$a_id,$data);

            }

            else

            {

                $data = array('request_user_id'=>$customer_id,'block_user_id'=>$id,'created_by'=>$customer_id);

                $result=$this->common_model->addData('tbl_block_request',$data);

            }

            if($result)

            {

               $req1=$this->common_model->selectMultiwhere('tbl_request','requested_by','requested_to',$id,$customer_id);

               if($req1)

               {

                    $r_id=$req1->request_id;

                    $data1=array('status'=>'Block');

                    $result1=$this->common_model->updateDetails('tbl_request','request_id',$r_id,$data1);

               }

               else

               {

                   $data1=array('requested_by'=>$id,'requested_to'=>$customer_id,'status'=>'Block');

                   $data1['created_by']=$id;

                   $data1['modified_by']=$customer_id;

                   $data1['created_on']=date('Y-m-d H:i:s');

                   $result1 =  $this->common_model->addData('tbl_request',$data1);

               }

               

               if($result1)

               {

                    $this->json->jsonReturn(array(

                      'valid'=>TRUE,

                      'msg'=>'<div class="alert modify alert-success"><strong></strong> User Blocked Successfully!</div>'

                    )); 

                }

                else

                {

                    $this->json->jsonReturn(array(

                          'valid'=>FALSE,

                          'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Blocking User !</div>'

                    ));

                }

            }

        }

    }



    public function user_img_details()   

    {

        $cust_id=$this->input->post('id');

        $data['cust_data'] = $this->common_model->selectDetailsWhr('view_custoer','customer_id',$cust_id);

        $view = $this->load->view('site/user_img_details',$data,TRUE);

        $this->json->jsonReturn(array('view'=>$view));

    }



}