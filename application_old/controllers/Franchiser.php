<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Franchiser extends CI_Controller {	

	public function __construct()
  	{ 
	    parent::__construct();       
	    date_default_timezone_set("Asia/Kolkata"); 
	    $value = base_url();
	    $this->load->library("email_sent");
	    $this->load->model('common_model');
	    $this->load->model('admin_model');
	    $this->load->model('sub_admin_model');
	    $this->load->library('Report_creation');
	    setcookie("shivbandh",$value, time()+3600*24,'/'); 
	    ini_set('memory_limit', '1024M');
	    ini_set('max_execution_time', 2000); 
  	} 
    

    public function franchiser_registration() {
    	$user_id = $this->session->userData("user_id");
        $user_role = $this->session->userData("user_role");

    	$data['role_data'] = $this->common_model->selectAllWhr('tbl_role','role_id','7');
        $data['slider_data'] = $this->common_model->fetchDataDESC('tbl_slider','slider_id');

        $data['user_data'] = $this->sub_admin_model->fetch_user_data($user_id);

        $this->load->view('sub_admin/add_franchiser_registration',$data);

    }

    public function save_franchiser_registration() 
	{
		$id = $this->input->post('id');
		$user_fname=$this->input->post('user_fname');
		$user_lname=$this->input->post('user_lname');
		$role_id=$this->input->post('role_id');
		$user_email=$this->input->post('user_email');
		$user_mobile=$this->input->post('user_mobile');	
		$user_name=$this->input->post("user_email");		
		$user_id=$this->session->userData("user_id");
		$user_pass1=$this->input->post("user_pass");		
		$user_pass	=md5(sha1(md5($user_pass1)));
		$address=$this->input->post('address');	
		$address_landmark=$this->input->post('address_landmark');	
		$address_state=$this->input->post('address_state');	
		$address_city=$this->input->post('address_city');	
		$address_pincode=$this->input->post('address_pincode');	

		$pan_card_no=$this->input->post('pan_card_no');	
		$gst_no=$this->input->post('gst_no');	
		$tan_no=$this->input->post('tan_no');

		$full_name = $user_fname . ' '. $user_lname;


		//upload document

		$document=$this->input->post('document');

        $document='';
        $error='';
        if(isset($_FILES['document']['name']))//Code for to take image from form and check isset
        {
          $user_photo=$_FILES['document']['name']; //here [] name attribute
          $user_photo_Img = array('upload_path' =>'./uploads/document/',
                 'fieldname' => 'document',
                 'encrypt_name' => FALSE,        
                 'overwrite' => FALSE,
                 'allowed_types' => 'pdf|PDF' );
          $user_photo_Img = $this->imageupload->image_upload($user_photo_Img);
          $error= $this->upload->display_errors();
          if(isset($user_photo_Img) && !empty($user_photo_Img))
          {
            $userData = $this->upload->data(); 
            $document = $userData['file_name'];
          }
        }
        else
        {
          $document=$this->input->post('hidden_document');
        }

		
		$current_date=date("Y-m-d");
		if(isset($id) && !empty($id) && ($id>0)) 
		{
			$data = array('user_fname'=>$user_fname, 'user_lname'=>$user_lname, 'role_id'=>$role_id,'user_email'=>$user_email,'user_name'=>$user_name, 'user_mobile'=>$user_mobile,'modified_by'=>$user_id, 'address'=>$address, 'address_landmark'=>$address_landmark, 'address_state'=>$address_state, 'address_city'=>$address_city, 'address_pincode'=>$address_pincode, 'pan_card_no'=>$pan_card_no, 'gst_no'=>$gst_no, 'tan_no'=>$tan_no, 'document'=>$document);

	        $result = $this->common_model->updateDetails('tbl_userinfo','user_id',$id,$data);

			if($result)  
			{
				$this->json->jsonReturn(array(
					'valid'=>TRUE,
					'msg'=>'<div class="alert modify alert-success"><strong></strong>Franchiser User Details Updated Successfully!</div>'
				));
			}
			else
			{
				$this->json->jsonReturn(array(
					'valid'=>FALSE,
					'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Updating Franchiser User Details !</div>'
				));
			}
		}
		else
		{ 			
			$data = array('user_fname'=>$user_fname, 'user_lname'=>$user_lname,'role_id'=>$role_id,'user_email'=>$user_email,'user_name'=>$user_name,'user_pass'=>$user_pass,'user_mobile'=>$user_mobile,'address'=>$address, 'address_landmark'=>$address_landmark, 'address_state'=>$address_state, 'address_city'=>$address_city, 'address_pincode'=>$address_pincode, 'pan_card_no'=>$pan_card_no, 'gst_no'=>$gst_no, 'tan_no'=>$tan_no,'document'=>$document,'created_by'=>$user_id,'created_on'=>$current_date);

			$result =  $this->common_model->addData('tbl_userinfo',$data);

			$message = 'Dear '.$full_name.' Welcome to Shivbandhan. Your User Name is '.$user_name .' and Password is '. $user_pass1;

          	sendSms($user_mobile,$message);

			if($result)
			{
				$this->json->jsonReturn(array(  
					'valid'=>TRUE,
					'msg'=>'<div class="alert modify alert-success"><strong></strong> Franchiser User Details Saved Successfully!</div>'
				));
			}
			else
			{
				$this->json->jsonReturn(array(
					'valid'=>FALSE,
					'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Saving Franchiser User Details !</div>'
				));
			}
		} 
	}


	public function edit_franchiser_registration()
	{
		$id = $this->input->post('id'); 		
		$data['single_user'] = $this->common_model->selectDetailsWhr('tbl_userinfo','user_id',$id);
		//$data['role_data'] = $this->common_model->fetchDataASC('tbl_role','role_id');
		$data['role_data'] = $this->common_model->selectAllWhr('tbl_role','role_id','7');


        $this->load->view('sub_admin/add_franchiser_registration',$data);
	} 

	public function delete_franchiser_registration()
	{  
		$id=$this->input->post('id');
        $data=array('display'=>'N');
        $result=$this->common_model->updateDetails('tbl_userinfo','user_id',$id,$data);
  
        if($result)
        {
            $this->json->jsonReturn(array(
                'valid'=>TRUE,
                'msg'=>'<div class="alert modify alert-success"><strong></strong> User Details Remove Successfully!</div>'
            ));
        }
        else
        {
            $this->json->jsonReturn(array(
                'valid'=>FALSE,
                'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Removing User Details !</div>'
            ));
        }
	}	


	public function member_registration() {
		/*$customer_id = $this->uri->segment(2);
        $data['customer_data'] = $this->common_model->selectDetailsWhr('tbl_customer','customer_id',$customer_id);*/
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

        //$data['mode_data'] = $this->common_model->fetchDataASC('tbl_pay_mode','payment_id');

        $this->load->view('sub_admin/member_registration',$data);
	}


	public function save_member_register() {

		$user_id=$this->session->userData("user_id");

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

        $full_name = $f_name . ' '. $l_name;


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
        
        $data = array('profile_code'=>$profile_code,'f_name'=>$f_name,'m_name'=>$m_name,'l_name'=>$l_name,'email'=>$email_id,'mobile'=>$mobile_no,'password'=>$password,'otp'=>$otp,'profile_for'=>$profile_for,'community'=>$community_for,'dob'=>$dob1,'gender'=>$gender,'term_condition'=>$term_condition,'user_id'=>$user_id);
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
                	//send user name and Password
                	$message1 = 'Hi, '.$full_name.' Welcome to Shivbandhan. Your User Name is '.$mobile_no .' and Password is '. $password;

          			sendSms($mobile_no,$message1);

          			//send otp
                    $userdata =$this->common_model->selectDetailsWhr('tbl_customer','customer_id',$result);
                    $message = 'Hi, '.$userdata->f_name.' Welcome to Shivbandhan. Your OTP is '.$otp;
                    sendSms($userdata->mobile,$message);

                 	$id = $this->session->set_userdata("customer_id",$userdata->customer_id);

                  	$this->json->jsonReturn(array(  
	                    'valid'=>TRUE,
	                    'msg'=>'<div class="alert modify alert-success"><strong> Well Done !</strong> Registered Successfully..!</div>',
	                    'redirect'=>base_url().'update_user_details/'.$result

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


    public function payment_details() {
    	$user_id=$this->session->userData("user_id");
        $user_role=$this->session->userData("user_role");

        if ($user_role==7) {
        
        	$data['customer_data'] = $this->common_model->selectAllWhrDsc('tbl_customer','user_id',$user_id);  

        	$data['payment_data'] = $this->common_model->selectAllWhrDsc('tbl_payment_details','user_id',$user_id);  
        
        	//print_r($data['payment_data']);

        } else {

    		$data['customer_data'] = $this->common_model->fetchDataDESC('tbl_customer','customer_id');
    	}

        $data['membership_data'] = $this->common_model->fetchDataDESC('tbl_membership','membership_id');
        
        $this->load->view('sub_admin/payment_details',$data);
    }


    public function franchise_request() {

        $user_id=$this->session->userData("user_id");
        $data['franchise_cust_list'] = $this->common_model->selectAllWhrDsc('tbl_customer','user_id',$user_id); 
        $data['customer_list'] = $this->common_model->fetchDataDESC('tbl_customer','customer_id');
        
        $this->load->view('sub_admin/franchise_request',$data);
    }


    public function save_franchise_request() {
        $user_id=$this->session->userData("user_id");
        $id = $this->input->post('id');
        $request_from=$this->input->post('request_from');
        $request_to=$this->input->post('request_to');
        $remark = $this->input->post('remark');

        $data = array('requested_by'=>$request_from,'requested_to'=>$request_to,'remark'=>$remark,);
        
        if(isset($id) && !empty($id) && ($id>0)) 
        {
          $data['modified_by']=$user_id;
          $result = $this->common_model->updateDetails('tbl_request_franchise','franchise_req_id  ',$id,$data);
          if($result)  
          {
            $this->json->jsonReturn(array(
              'valid'=>TRUE,
              'msg'=>'<div class="alert modify alert-success"><strong></strong>News Details Updated Successfully!</div>'
            ));
          }
          else
          {
            $this->json->jsonReturn(array(
              'valid'=>FALSE,
              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Updating News Details !</div>'
            ));
          }
        }
        else
        {       
          $data['created_by']=$user_id;
          $data['created_on']=date('Y-m-d H:i:s');  
          $result =  $this->common_model->addData('tbl_request_franchise',$data);
          
          if($result)
          {
            $this->json->jsonReturn(array(  
              'valid'=>TRUE,
              'msg'=>'<div class="alert modify alert-success"><strong></strong> Request Send Successfully!</div>',
              'redirect'=>base_url().'franchise_request_status'
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


    public function franchise_request_status() {

        $user_id = $this->session->userData("user_id");
        $data['user_role'] = $this->session->userData("user_role");

        if ($data['user_role']==7) {

            $data['franchise_request_pending'] = $this->sub_admin_model->get_franchise_request_pending();

            $data['franchise_request_accepted'] = $this->sub_admin_model->get_franchise_request_accepted();

        } else {

            $data['franchise_request_pending'] = $this->sub_admin_model->get_franchise_request_pending();

            $data['franchise_request_accepted'] = $this->sub_admin_model->get_franchise_request_accepted();            
        }

        $this->load->view('sub_admin/franchise_request_status',$data);
    }

    public function franchise_accepted_request() {  
        $id=$this->input->post('id');
        $data=array('status'=>'Accepted');
        $result=$this->common_model->updateDetails('tbl_request_franchise','franchise_req_id',$id,$data);
        if($result)
        {
            $this->json->jsonReturn(array(
                'valid'=>TRUE,
                'msg'=>'<div class="alert modify alert-success"><strong></strong> Request Accepted  Successfully!</div>'
            ));
        }
        else
        {
            $this->json->jsonReturn(array(
                'valid'=>FALSE,
                'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Request Accepted!</div>'
            ));
        }
    }

    public function franchise_rejected_request() {  
        $id=$this->input->post('id');
        $data=array('status'=>'Rejected');
        $result=$this->common_model->updateDetails('tbl_request_franchise','franchise_req_id',$id,$data);
        if($result)
        {
            $this->json->jsonReturn(array(
                'valid'=>TRUE,
                'msg'=>'<div class="alert modify alert-success"><strong></strong> Request Rejected  Successfully!</div>'
            ));
        }
        else
        {
            $this->json->jsonReturn(array(
                'valid'=>FALSE,
                'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Request Decline  !</div>'
            ));
        }
       
    }

    public function delete_franchise_req()
    {
        $id=$this->input->post('id');
        $data=array('display'=>'N');
        $result=$this->common_model->updateDetails('tbl_request_franchise','franchise_req_id',$id,$data);

        if($result)
        {
          $this->json->jsonReturn(array(
              'valid'=>TRUE,
              'msg'=>'<div class="alert modify alert-success"><strong></strong> Your Sending Request Remove Successfully!</div>'
          ));
        }
        else
        {
          $this->json->jsonReturn(array(
              'valid'=>FALSE,
              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Removing Your Sending Request!</div>'
          ));
        }
    }

    public function franchise_profile_send_mail() {
        $id=$this->input->post('id');
        $send_id=$this->input->post('send_id');

        $data['cust_data'] = $this->admin_model->fetch_customer_details($id);

        $arr_data = $this->common_model->selectAllWhrDsc('tbl_customer','customer_id',$send_id);

        $email = $arr_data[0]->email;
        $pdfname1 = $arr_data[0]->f_name.' '.$arr_data[0]->l_name.' Bio-data '.date('d-m-Y');

        //$this->load->view("admin/biodata",$data);
        
        if($data['cust_data'])
        {
            $this->load->library('email_sent');
            
            $pdfname = $data['cust_data']->f_name.' '.$data['cust_data']->l_name.' Bio-data '.date('d-m-Y');
            $html=$this->load->view('admin/biodata',$data,TRUE);
            $pdf_name=$this->report_creation->Save_pdf($html,'./uploads/franchise/'.$pdfname);
            
            $ad_email='mohasin.codepixsolution@gmail.com';
            $subject = 'Regarding Bio-Data Details';                   
            $msg_body="Dear Sir/Mam,<br/><br/> Please go Through Below Bio-Data Details  <br/><br/><br/>";
            $alt_msg = 'Bio-Data Details';
            $data=array('subject'=>$subject,'msg_body'=>$msg_body,'alt_msg'=>$alt_msg,'attachement'=>$pdf_name);
           
            $email_id[]=array('email_id'=>$email); 
            $email_id[]=array('email_id'=>$ad_email); 
            $result=$this->email_sent->mail_sent($data,$email_id);

            $this->json->jsonReturn(array(
                'valid'=>TRUE,
                'msg'=>'<div class="alert modify alert-success"><strong></strong>  Bio-Data Details Send Successfully!</div>'
            ));
        }
        else
        {
            $this->json->jsonReturn(array(
                'valid'=>FALSE,
                'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Sending Bio-Data Details !</div>'
            ));
        }

       /* $html=$this->load->view("admin/biodata",$data,TRUE);
        $this->report_creation->create_pdf_landscape($html,$pdfname);*/
    }



}
?>