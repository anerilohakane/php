<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sub_admin_model extends CI_Model {

 
    public function fetch_user_data($id) {
        $query=$this->db->query("SELECT u.*,r.role_name FROM tbl_userinfo as u LEFT JOIN tbl_role r on r.role_id = u.role_id WHERE u.display ='Y' and u.created_by=? and u.role_id = 7 group by u.user_id order by user_id DESC ",array($id));

        if($query->num_rows()>0)
        {
            foreach ($query->result() as $row)
            {
                $tbl_data[]=$row;
            }
            return $tbl_data;
        }
        else
        {
            return false;
        }
    }

    public function get_franchise_request_pending()
    {
        $query=$this->db->query("SELECT fr.*,tc1.f_name as r_fname,tc1.l_name as r_lname,tc1.profile_code as r_profile_code,tc2.f_name as t_fname,tc2.l_name as t_lname,tc2.profile_code as t_profile_code FROM tbl_request_franchise fr left join tbl_customer tc1 on tc1.customer_id=fr.requested_by left join tbl_customer tc2 on tc2.customer_id=fr.requested_to WHERE fr.display ='Y' AND fr.status='Pending' order by fr.franchise_req_id desc");

        if($query->num_rows()>0)
        {
            foreach ($query->result() as $row)
            {
                $tbl_data[]=$row;
            }
            return $tbl_data;
        }
        else
        {
            return false;
        }
    }

    public function get_franchise_request_accepted()
    {
        $query=$this->db->query("SELECT fr.*,tc1.f_name as r_fname,tc1.l_name as r_lname,tc1.profile_code as r_profile_code,tc2.f_name as t_fname,tc2.l_name as t_lname,tc2.profile_code as t_profile_code FROM tbl_request_franchise fr left join tbl_customer tc1 on tc1.customer_id=fr.requested_by left join tbl_customer tc2 on tc2.customer_id=fr.requested_to WHERE  fr.display ='Y' AND fr.status='Accepted'  order by fr.franchise_req_id desc");

        if($query->num_rows()>0)
        {
            foreach ($query->result() as $row)
            {
                $tbl_data[]=$row;
            }
            return $tbl_data;
        }
        else
        {
            return false;
        }
    }



}