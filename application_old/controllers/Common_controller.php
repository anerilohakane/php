<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Common_controller extends CI_Controller {	

	public function __construct()
    { 
        parent::__construct();
        $this->clear_cache();  
        $this->load->model('common_model'); 
        $this->load->model('sub_admin_model'); 
        $value = base_url();
		setcookie("shivbandh",$value, time()+3600*24,'/');           
        ini_set('memory_limit', '1024M');
        ini_set('max_execution_time', 2000);       
    }    
	
	public function clear_cache()
    {
        $this->output->set_header("Cache-Control: no-store, no-cache, must-revalidate, no-transform, max-age=0, post-check=0, pre-check=0");
        $this->output->set_header("Pragma: no-cache");
    }

    public function dashboard()
	{
		$user_id=$this->session->userData("user_id");
        $user_role=$this->session->userData("user_role");		
		$msg = 'ProjectMsg';
		$key = 'ProjectKey';
		$value = base_url();
		setcookie("sales",$value, time()+3600*24,'/');
		if($this->authentication->logged_in()==FALSE)
		{			
		 	$data['key_string'] = $this->encrypt->encode($msg, $key);
		 	$this->session->set_userdata("secret_key", $data['key_string']);
		 	$data['title']="Admin Login";
			$this->load->view("common/login_page",$data);
		}
		else
		{   
			$data['category_wise_user']=$this->admin_model->category_wise_user();
			$data['today_reg'] = $this->admin_model->today_reg();
			$data['daily_payment']=$this->admin_model->daily_payment();
			$data['notification_data'] = $this->common_model->fetchDataDESC('view_notification','not_date');	

			//for sub admin
			$data['user_register'] = $this->common_model->selectAllWhrDsc('tbl_customer','user_id',$user_id);  
			$data['notification_data_new'] = $this->common_model->selectAllWhrDsc('view_notification','user_id',$user_id);  
			$data['daily_payment_new']=$this->admin_model->daily_payment_by_sub_admin($user_id);
			
			$this->load->view('common/dashboard',$data);
		}		

		//$this->load->view('common/dashboard',$data);
	}

	public function admin_load() 
	{		
		$user_id=$this->session->userData("user_id");
        $user_role=$this->session->userData("user_role");
		$msg = 'ProjectMsg';
		$key = 'ProjectKey';
		$data['key_string'] = $this->encrypt->encode($msg, $key);
		$secretkey = $this->encrypt->encode($msg, $key);
		$this->session->set_userdata("secret_key", $data['key_string']);			
		
		$state=$this->authentication->logged_in();		
		if($state==false)
		{		
			$this->load->view('common/login_page',$data); 	
		}				
		else if($state==true)
		{
			$id=$this->input->post('id');
			$data['category_wise_user']=$this->admin_model->category_wise_user();
			$data['today_reg'] = $this->admin_model->today_reg();
			$data['daily_payment']=$this->admin_model->daily_payment();
			$data['notification_data'] = $this->common_model->fetchDataDESC('view_notification','not_date');

			//$data['user_register'] = $this->sub_admin_model->user_register_by_sub_admin($user_id);

			/*$data['user_register'] = $this->common_model->selectMultiDataFor('tbl_userinfo','user_id','role_id',$user_id, $user_role);  */

			//for sub admin
			$data['user_register'] = $this->common_model->selectAllWhrDsc('tbl_customer','user_id',$user_id);  
			$data['notification_data_new'] = $this->common_model->selectAllWhrDsc('view_notification','user_id',$user_id);  

			$data['daily_payment_new']=$this->admin_model->daily_payment_by_sub_admin($user_id);


			//$data['notification_data_new'] = $this->common_model->selectMultiDataFor('view_notification','user_id','role_id',$user_id, $user_role);  

			//sub_admin data 

			$this->load->view('common/dashboard',$data);

		}
		else 
		{
			redirect('admin_user');	
		}
	}	
 	
	public function admin_login() 
	{		
		//echo "hii";
		$secretkey = $this->session->userdata('secret_key');
		$a=$this->input->post('key');
		$pass=$this->input->post('password');
		$login=$this->input->post('username');
		if (isset($a) && $a==$secretkey)
		{
			$valid = false;
			if (!isset($login) or strlen($login) == 0)
			{
				$error = 'Please enter your user name.';
			}
			elseif (!isset($pass) or strlen($pass) == 0)
			{
				$error = 'Please enter your password.';
			}
			else
			{
				$valid['state']=$this->authentication->chklogin($login,$pass);
				if (!$valid['state'])
					$error = 'Wrong user/password, please try again.';
			}
 
			$ajax = (isset($_SERVER['HTTP_X_REQUESTED_WITH']) and strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest');

			if ($valid['state']==true)
			{				
    			if ($ajax)
				{					
					$data=array(
						'valid' => TRUE,
						'msg'=>"Please Wait, We Will Redirect You Soon...",
						'redirect' => base_url().'admin_user'
					);
					$this->json->jsonReturn($data);					
				}
				else
				{					
					$this->logout();
					redirect('admin_user');
				}					
			}
			else
			{
				if ($ajax)
				{
					$data=array(
						'valid' => FALSE,
						'msg' => $error
					);
					$this->json->jsonReturn($data);
				}
			}
		}
		else
		{
			$this->load->view('common/login_page');
		}		
    }

    function admin_logout()	
	{
		$this->authentication->logout();	 
		redirect('admin_user');		
	} 

	
	public function change_pass()   
    {   
        $view = $this->load->view('common/change_password','',TRUE);
        $this->json->jsonReturn(array('view'=>$view));
    }
    
    public function save_password_chang()
  	{
	    $user_id=$this->session->userdata('user_id');
	    if(!isset($user_id) && empty($user_id))
	    { 
	      $user_id=$this->session->userdata('admin_user_id');
	    }
	    $cur_password=trim($this->input->post('current_pass'));
	    $current_pass= md5(sha1(md5($cur_password))); 

	    $password=trim($this->input->post('new_pass'));
	    $new_pass= md5(sha1(md5($password))); 

	    $data['userData'] = $this->common_model->selectDetailsWhr('tbl_userinfo','user_id',$user_id);
	    $user_pass=$data['userData']->user_pass;
	    $user_email_id=$data['userData']->user_email;
	    if($user_pass==$current_pass)
	    {
	      $user_data=array('user_pass'=>$new_pass);
	        
	      $result=$this->common_model->updateDetails('tbl_userinfo','user_id',$user_id,$user_data);
	      if($result)
	        {
	            $datavalue["new_pass"]=$password;
	           // $datavalue["fundraiser"]=$fundraiser;    
	                            
	            $subject = 'FNF change password';
	            $msg_body=$this->load->view("mailer/change_pass",$datavalue,true);
	            $alt_msg = 'FNF change password';                  
	            $data1=array('subject'=>$subject,'msg_body'=>$msg_body,'alt_msg'=>$alt_msg);             
	            $email_id[]=array('email_id'=>$user_email_id); 
	            $message = 'Change Password';
	            $mail_result=$this->email_sent->mail_sent($data1,$email_id); 
	            unset($email_id);   
	            //sendSms($mobile_no, $message);
	        }
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

    public function save_forgot_pass()
	{
		$email=$this->input->post('email');
		$password=mt_rand(100000,999999);
		$new_pass= md5(sha1(md5($password)));

		$userData = $this->common_model->selectDetailsWhr('tbl_userinfo','user_email',$email);
		if(isset($userData) && !empty($userData))
		{ 	
			$user_id=$userData->user_id;

			$user_data=array('user_pass'=>$new_pass);
			
				
			$result=$this->common_model->forgot_pass($user_data,$password,$user_id,$email);		

			if($result)
			{
				$this->json->jsonReturn(array(
					'valid'=>TRUE,
					'msg'=>'<div class="alert modify alert-info"><strong></strong> New Password Send To Your Register Email Id!</div>'
				));
			}
			else
			{
				$this->json->jsonReturn(array(
					'valid'=>FALSE,
					'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Password Sending On Email id!</div>'
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

	public function role()
	{
		$data['role_data'] = $this->common_model->fetchDataASC('tbl_role','role_id');
		$this->load->view('common/role',$data);
	} 

	public function save_role() 
	{
		$id = $this->input->post('id');
		$role_name = $this->input->post('role_name');
		$role_desc = $this->input->post('role_desc');
		$data = array('role_name'=>$role_name,'role_desc'=>$role_desc);
		
		if(isset($id) && !empty($id) && ($id>0)) 
		{
	        $result = $this->common_model->updateDetails('tbl_role','role_id',$id,$data);
			if($result)  
			{
				$this->json->jsonReturn(array(
					'valid'=>TRUE,
					'msg'=>'<div class="alert modify alert-success"><strong></strong>Role Details Updated Successfully!</div>'
				));
			}
			else
			{
				$this->json->jsonReturn(array(
					'valid'=>FALSE,
					'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Updating Role Details !</div>'
				));
			}
		}
		else
		{ 			
			$result =  $this->common_model->addData('tbl_role',$data);
			if($result)
			{
				$this->json->jsonReturn(array(  
					'valid'=>TRUE,
					'msg'=>'<div class="alert modify alert-success"><strong></strong> Role Details Saved Successfully!</div>'
				));
			}
			else
			{
				$this->json->jsonReturn(array(
					'valid'=>FALSE,
					'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Saving Role Details !</div>'
				));
			}
		} 
	}  

	public function edit_role()
	{
		$id = $this->input->post('id'); 		
		$data['single_role'] = $this->common_model->selectDetailsWhr('tbl_role','role_id',$id);
        $this->load->view('common/role',$data); 
	} 

	public function delete_role()
	{  
		$id=$this->input->post('id');
      	$data=array('display'=>'N');
        $result=$this->common_model->updateDetails('tbl_role','role_id',$id,$data);
  
        if($result)
        {
            $this->json->jsonReturn(array(
                'valid'=>TRUE,
                'msg'=>'<div class="alert modify alert-success"><strong></strong> Role Details Remove Successfully!</div>'
            ));
        }
        else
        {
            $this->json->jsonReturn(array(
                'valid'=>FALSE,
                'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Removing Role Details !</div>'
            ));
        }
	}

	public function add_user()
	{
		$user_id=$this->session->userData("user_id");
        $user_role=$this->session->userData("user_role");
        if($user_role==1)
        {
        	$data['role_data'] = $this->common_model->fetchDataASC('tbl_role','role_id');
			$data['user_data'] = $this->common_model->alljoin2tbl('tbl_userinfo','tbl_role','role_id');
        }
        else
        {
        	$data['role_data'] = $this->common_model->selectAllWhr('tbl_role','role_id','3');
			$data['user_data'] = $this->common_model->alljoin2tbl_whr('tbl_userinfo','tbl_role','role_id','created_by',$user_id);
        }
		
		$this->load->view('common/add_user',$data);
	} 

	public function save_user() 
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


		$current_date=date("Y-m-d");
		if(isset($id) && !empty($id) && ($id>0)) 
		{
			$data = array('user_fname'=>$user_fname, 'user_lname'=>$user_lname, 'role_id'=>$role_id,'user_email'=>$user_email,'user_name'=>$user_name, 'user_mobile'=>$user_mobile,'modified_by'=>$user_id, 'address'=>$address, 'address_landmark'=>$address_landmark, 'address_state'=>$address_state, 'address_city'=>$address_city, 'address_pincode'=>$address_pincode);
	        $result = $this->common_model->updateDetails('tbl_userinfo','user_id',$id,$data);
			if($result)  
			{
				$this->json->jsonReturn(array(
					'valid'=>TRUE,
					'msg'=>'<div class="alert modify alert-success"><strong></strong>User Details Updated Successfully!</div>'
				));
			}
			else
			{
				$this->json->jsonReturn(array(
					'valid'=>FALSE,
					'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Updating User Details !</div>'
				));
			}
		}
		else
		{ 			
			$data = array('user_fname'=>$user_fname, 'user_lname'=>$user_lname,'role_id'=>$role_id,'user_email'=>$user_email,'user_name'=>$user_name,'user_pass'=>$user_pass,'user_mobile'=>$user_mobile,'address'=>$address, 'address_landmark'=>$address_landmark, 'address_state'=>$address_state, 'address_city'=>$address_city, 'address_pincode'=>$address_pincode,'created_by'=>$user_id,'created_on'=>$current_date);
			$result =  $this->common_model->addData('tbl_userinfo',$data);
			if($result)
			{
				$this->json->jsonReturn(array(  
					'valid'=>TRUE,
					'msg'=>'<div class="alert modify alert-success"><strong></strong> User Details Saved Successfully!</div>'
				));
			}
			else
			{
				$this->json->jsonReturn(array(
					'valid'=>FALSE,
					'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Saving User Details !</div>'
				));
			}
		} 
	}  

	public function edit_user()
	{
		$id = $this->input->post('id'); 		
		$data['single_user'] = $this->common_model->selectDetailsWhr('tbl_userinfo','user_id',$id);
		$data['role_data'] = $this->common_model->fetchDataASC('tbl_role','role_id');

        $this->load->view('common/add_user',$data); 
	} 

	public function delete_user()
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

	public function role_management()
    {
    	$data['roleMasterData']=$this->common_model->fetchDataASC('tbl_role','role_name');
        $this->load->view('common/role_management',$data);
    }
	
	public function fetch_role_config()
    {
    	$emp_id=$this->input->post();
    	$data['menu_data']=$data['category']=$this->common_model->menu_list1($emp_id);
    	$view=$this->load->view('common/prev_table',$data,true);
        $this->json->jsonReturn(array(
				'valid'=>true,
				'view'=>$view
				));
	}

	public function save_role_config()
    {
    	$user_id=$this->input->post('name_of_employee');
    	$submenu=$this->input->post('submenu');
    	$result = $this->common_model->save_role_config($user_id,$submenu);
    	if($result)
    	{
	    	$this->json->jsonReturn(array(
            'valid'=>TRUE,
            'msg'=>'<div class="alert modify alert-success"><strong>Well Done!</strong> Role configuration saved successfully!</div>'
        	));
	    }else
	    {
	    	$this->json->jsonReturn(array(
            'valid'=>TRUE,
            'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While saving role configuration details.</div>'
        	));
	    }	
	}

	public function country()
	{
		$data['country_data'] = $this->common_model->fetchDataASC('tbl_country','country_id');
		$this->load->view("common/country",$data);
	}

	public function save_country() 
	{
		$id = $this->input->post('id');
		$country_name = $this->input->post('country_name');
		$country_desc = $this->input->post('desc');
		$currency = $this->input->post('currency');
		$exchange_rate = $this->input->post('exchange_rate');
		$user_id=$this->session->userData("user_id");
		$current_date=date("Y-m-d");	
		
		if(isset($id) && !empty($id) && ($id>0)) 
		{
			$data = array('country_name'=>$country_name,'country_desc'=>$country_desc,'currency'=>$currency,'exchange_rate'=>$exchange_rate,"modified_by"=>$user_id);
			$result = $this->common_model->updateDetails('tbl_country','country_id',$id,$data);
			if($result)  
			{
				$this->json->jsonReturn(array(
					'valid'=>TRUE,
					'msg'=>'<div class="alert modify alert-success"><strong></strong>Country Details Updated Successfully!</div>'
				));
			}
			else
			{
				$this->json->jsonReturn(array(
					'valid'=>FALSE,
					'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Updating Country Details !</div>'
				));
			}
		}
		else
		{ 			
			$data = array('country_name'=>$country_name,'country_desc'=>$country_desc,'currency'=>$currency,'exchange_rate'=>$exchange_rate,"created_by"=>$user_id,"created_on"=>$current_date);
			$result =  $this->common_model->addData('tbl_country',$data);
			if($result)
			{
				$this->json->jsonReturn(array(  
					'valid'=>TRUE,
					'msg'=>'<div class="alert modify alert-success"><strong></strong> Country Details Saved Successfully!</div>'
				));
			}
			else
			{
				$this->json->jsonReturn(array(
					'valid'=>FALSE,
					'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Saving Country Details !</div>'
				));
			}
		} 
	} 

	public function edit_country()
	{
		$id = $this->input->post('id'); 
		$data['singleCountryData'] = $this->common_model->selectDetailsWhr('tbl_country','country_id',$id);
		$this->load->view('common/country',$data); 
	} 

	public function delete_country()
	{  
		$id=$this->input->post('id');
        $data=array('display'=>'N');
        $result=$this->common_model->updateDetails('tbl_country','country_id',$id,$data);
  
        if($result)
        {
            $this->json->jsonReturn(array(
                'valid'=>TRUE,
                'msg'=>'<div class="alert modify alert-success"><strong></strong> Country Details Remove Successfully!</div>'
            ));
        }
        else
        {
            $this->json->jsonReturn(array(
                'valid'=>FALSE,
                'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Removing Country Details !</div>'
            ));
        }
	}

	public function state()
	{
		$data['countryData'] = $this->common_model->fetchDataASC('tbl_country','country_id');
		$data['state_data'] = $this->common_model->alljoin2tbl("tbl_state","tbl_country","country_id");
		$this->load->view('common/state',$data);
	} 

	public function save_state() 
	{
		$id = $this->input->post('id');
		$country_name = $this->input->post('country_name');
		$state_name = $this->input->post('state_name');
		$state_desc = $this->input->post('desc');		
		$user_id=$this->session->userData("user_id");
		$current_date=date("Y-m-d");

		if(isset($id) && !empty($id) && ($id>0)) 
		{
	       $data = array('country_id'=>$country_name,'state_name'=>$state_name,'state_desc'=>$state_desc,'modified_by'=>$user_id);
	        $result = $this->common_model->updateDetails('tbl_state','state_id',$id,$data);
			if($result)  
			{
				$this->json->jsonReturn(array(
					'valid'=>TRUE,
					'msg'=>'<div class="alert modify alert-success"><strong></strong>State Details Updated Successfully!</div>'
				));
			}
			else
			{
				$this->json->jsonReturn(array(
					'valid'=>FALSE,
					'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Updating State Details !</div>'
				));
			}
		}
		else
		{ 
			$data = array('country_id'=>$country_name,'state_name'=>$state_name,'state_desc'=>$state_desc,'created_by'=>$user_id,'created_on'=>$current_date);
			$result =  $this->common_model->addData('tbl_state',$data);
			if($result)
			{
				$this->json->jsonReturn(array(  
					'valid'=>TRUE,
					'msg'=>'<div class="alert modify alert-success"><strong></strong> State Details Saved Successfully!</div>'
				));
			}
			else
			{
				$this->json->jsonReturn(array(
					'valid'=>FALSE,
					'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Saving State Details !</div>'
				));
			}
		} 
	} 

	public function edit_state()
	{
		$id = $this->input->post('id'); 
		$data['countryData'] = $this->common_model->fetchDataASC('tbl_country','country_id');
		$data['singleStateData'] = $this->common_model->selectDetailsWhr('tbl_state','state_id',$id);
		$this->load->view('common/state',$data); 
	}

	public function delete_state()
	{  
		$id=$this->input->post('id');
        $data=array('display'=>'N');
        $result=$this->common_model->updateDetails('tbl_state','state_id',$id,$data);
  
        if($result)
        {
            $this->json->jsonReturn(array(
                'valid'=>TRUE,
                'msg'=>'<div class="alert modify alert-success"><strong></strong> State Details Remove Successfully!</div>'
            ));
        }
        else
        {
            $this->json->jsonReturn(array(
                'valid'=>FALSE,
                'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Removing State Details !</div>'
            ));
        }
	}

	public function city()
	{
		$data['countryData'] = $this->common_model->fetchDataASC('tbl_country','country_id');
		$data['city_data'] = $this->common_model->fetchAllCity();
		$this->load->view('common/city',$data);
	} 

	public function save_city() 
	{
		$id = $this->input->post('id');
		$state_name = $this->input->post('state_name');
		$country_name = $this->input->post('country_name');
		$city_name = $this->input->post('city_name');
		$city_desc = $this->input->post('desc');
		$user_id=$this->session->userData("user_id");
		$current_date=date("Y-m-d");		
		if(isset($id) && !empty($id) && ($id>0)) 
		{	        
			$data = array('country_id'=>$country_name,'state_id'=>$state_name,'city_name'=>$city_name,'city_desc'=>$city_desc,"modified_by"=>$user_id);
	        $result = $this->common_model->updateDetails('tbl_city','city_id',$id,$data);
			if($result)  
			{
				$this->json->jsonReturn(array(
					'valid'=>TRUE,
					'msg'=>'<div class="alert modify alert-success"><strong></strong>City Details Updated Successfully!</div>'
				));
			}
			else
			{
				$this->json->jsonReturn(array(
					'valid'=>FALSE,
					'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Updating City Details !</div>'
				));
			}
		}
		else
		{ 			
			
			$data = array('country_id'=>$country_name,'state_id'=>$state_name,'city_name'=>$city_name,'city_desc'=>$city_desc,"created_on"=>$current_date,"created_by"=>$user_id);		
			$result =  $this->common_model->addData('tbl_city',$data);
			if($result)
			{
				$this->json->jsonReturn(array(  
					'valid'=>TRUE,
					'msg'=>'<div class="alert modify alert-success"><strong></strong> City Details Saved Successfully!</div>'
				));
			}
			else
			{
				$this->json->jsonReturn(array(
					'valid'=>FALSE,
					'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Saving City Details !</div>'
				));
			}
		} 
	}  

	public function edit_city()
	{
		$id = $this->input->post('id'); 
		
		$data['countryData'] = $this->common_model->fetchDataASC('tbl_country','country_id');
		$data['singleCityData'] = $this->common_model->selectDetailsWhr('tbl_city','city_id',$id);
        $country=$data['singleCityData']->country_id;
		$data['stateData'] = $this->common_model->selectAllWhr('tbl_state','country_id',$country);
		$this->load->view('common/city',$data); 
	} 

	public  function delete_city()
	{  
		$id=$this->input->post('id');
        $tblname = 'tbl_city'; 
		$uniqueField = 'city_id';       
        $data=array('display'=>'N');
        $result=$this->common_model->updateDetails($tblname,$uniqueField,$id,$data);
  
        if($result)
        {
            $this->json->jsonReturn(array(
                'valid'=>TRUE,
                'msg'=>'<div class="alert modify alert-success"><strong></strong> City Details Remove Successfully!</div>'
            ));
        }
        else
        {
            $this->json->jsonReturn(array(
                'valid'=>FALSE,
                'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Removing City Details !</div>'
            ));
        }
	}

	public function state_by_country()
    {
        $id = $this->input->post('id');
        $state_data = $this->common_model->selectAllWhr('tbl_state','country_id',$id);
       //	echo $this->db->last_query();
        $cnt = '<option value="">Select State</option>';
        if(isset($state_data) && !empty($state_data))
        {
            foreach ($state_data as $key)  
            {
                $cnt = $cnt.'<option value="'.$key->state_id.'">'.$key->state_name.'</option>';
            }
        }       
        $this->json->jsonReturn($cnt);
    }

    public function city_by_state()
    {
        $id = $this->input->post('id');
        $city_data = $this->common_model->selectAllWhr('tbl_city','state_id',$id);
        $cnt = '<option value="">Select City</option>';
        if(isset($city_data) && !empty($city_data))
        {
            foreach ($city_data as $key)  
            {
                $cnt = $cnt.'<option value="'.$key->city_id.'">'.$key->city_name.'</option>';
            }
        }       
        $this->json->jsonReturn($cnt);
    }

}
