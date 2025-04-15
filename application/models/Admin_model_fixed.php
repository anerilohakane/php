<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Admin_model extends CI_Model
{
    public function today_reg()
    {
        $query=$this->db->query("SELECT DATE(created_at) as reg_date, count(created_at) as cnt FROM tbl_customer WHERE display='Y'  GROUP BY DATE(created_at) order by reg_date DESC  limit 10 ");
        if($query->num_rows()>0)
        {
           return $query->result();
        }else
        {
            return array();
        }
    }
} 