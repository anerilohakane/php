<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Authentication
{
 
	function _construct() 
	{
	    $CI =& get_instance();
	    $CI->load->database('database');
		$CI->load->library("session");
	}
	
	function chk_login()
	{
		$CI =& get_instance();
		$user = $CI->session->userdata('user');
		return ($user) ? $user : false;
	}

	function login($username,$password,$tbl)
	{
		$CI =& get_instance();
		$condition = array('user_name' => $username, 'user_pass' => $password);
		$CI->db->where($condition);
    	$query = $CI->db->get_where('tbl_userinfo');

		if($query->num_rows()!=1)
		{
			return false;
		}
		else     
		{
			
			$CI->session->set_userdata("user",'admin');
			$CI->session->set_userdata("admin_user_id",$query->row()->user_id);	 
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
		$CI->session->unset_userdata("user");
		$CI->session->unset_userdata("admin_user_id");
		
		$CI->session->unset_userdata("user_id");
		$CI->session->unset_userdata("user_role");		
		$CI->session->unset_userdata("user_fname");
		$CI->session->unset_userdata("user_lname");
		$CI->session->unset_userdata("user_mobile");
		$CI->session->unset_userdata("user_email");				 
		$CI->session->unset_userdata("user_name");
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
?>
