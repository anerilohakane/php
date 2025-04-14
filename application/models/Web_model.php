<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Web_model extends CI_Model {

    public function user_login($username,$password)
    {
        $query= $this->db->query("SELECT * FROM tbl_customer WHERE (mobile=?) AND password=? AND display='Y' AND user_status='Active' ", array($username,$password)); 
        if($query->num_rows()==1)
        {            
            return $query->row();
        }
        else
        {
            return false;
        }
    }

    public function get_category()
    {
        $query= $this->db->query("SELECT * FROM tbl_category  WHERE  display='Y' ");
        if($query->num_rows() > 0)
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
    public function checkUserMatual($user_id,$view_user_id) {
        $query=$this->db->query("SELECT * from tbl_request WHERE  tbl_request.status = 'Accepted' AND tbl_request.display = 'Y' AND ((tbl_request.requested_by='".$user_id."' AND tbl_request.requested_to='".$view_user_id."') OR (tbl_request.requested_by='".$view_user_id."' AND tbl_request.requested_to='".$user_id."')) order by tbl_request.request_id DESC");        
        if($query->num_rows() > 0)
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
    public function checkUserMemberShipStatus($user_id) {
        $query=$this->db->query("SELECT membership_status from view_custoer WHERE  customer_id='".$user_id."'");        
        if($query->num_rows() > 0)
        {
            return $query->row()->membership_status;
        }
        else
        {
            return false;
        }
    }
public function getOtherCustomerDetailsById($view_user_id)
    {
        $query=$this->db->query("SELECT * from view_custoer  WHERE customer_id='".$view_user_id."'");        
       if($query->num_rows() > 0)
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
    public function fetch_quick_search($caste,$age_from,$age_to,$is_photo_visible,$marital_status)
    {
        $whr='';        
        if($caste)$whr=$whr.'(caste) ="'.$caste.'" AND '; 
        if($age_from)$whr=$whr.'(age) >="'.$age_from.'" AND '; 
        if($age_to)$whr=$whr.'(age) <="'.$age_to.'" AND '; 
        if($is_photo_visible)$whr=$whr.'(customer_photo) !=" " AND '; 
        if($marital_status)$whr=$whr.'(marital_status) ="'.$marital_status.'" AND '; 

        $query=$this->db->query("SELECT * from view_custoer  WHERE $whr display = 'Y' AND visibility='Visible' AND user_status='Active' ");        
       //echo $this->last_query();
        if($query->num_rows() > 0)
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

    public function fetch_advance_search($birth_year_from,$birth_year_to,$education,$district1,$district2,$district3,$height_from,$height_to,$manglic,$photo)
    {
        $whr='';        
        if($birth_year_from)$whr=$whr.'(age) >="'.$birth_year_from.'" AND '; 
        if($birth_year_to)$whr=$whr.'(age) <="'.$birth_year_to.'" AND '; 
        if($education)$whr=$whr.'(education) ="'.$education.'" AND '; 
        if($district1)$whr=$whr.'(occupation_city) ="'.$district1.'" OR '; 
        if($district2)$whr=$whr.'(occupation_city) ="'.$district2.'" OR '; 
        if($district3)$whr=$whr.'(occupation_city) ="'.$district3.'" OR '; 
        if($photo)$whr=$whr.'(customer_photo) !=" " AND '; 
        if($height_from)$whr=$whr.'(height) >="'.$height_from.'" AND '; 
        if($height_to)$whr=$whr.'(height) <="'.$height_to.'" AND '; 
        if($manglic)$whr=$whr.'(mangal) ="'.$manglic.'" AND '; 

        $query=$this->db->query("SELECT * from view_custoer  WHERE $whr display = 'Y' AND visibility='Visible' AND user_status='Active' ");        
       //echo $this->last_query();
        if($query->num_rows() > 0)
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
public function fetch_quick_search_all_profile($gend,$user_id)
    {
        $query=$this->db->query("SELECT * from view_custoer as vc  WHERE  vc.display = 'Y' AND vc.visibility='Visible' AND vc.user_status='Active' AND vc.gender=? order by vc.customer_id DESC",array($gend));        

        //$query=$this->db->query("SELECT * from view_custoer as vc left join tbl_block_request tb on not find_in_set(vc.customer_id,tb.block_user_id) WHERE  vc.display = 'Y' AND vc.visibility='Visible' AND vc.user_status='Active' AND vc.gender=? AND vc.cast_name=? AND tb.request_user_id=?",array($gend,$cast_name,$user_id));

        if($query->num_rows() > 0)
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
    public function fetch_quick_search1($gend,$cast_name)
    {
        $query=$this->db->query("SELECT * from view_custoer  WHERE  display = 'Y' AND visibility='Visible' AND user_status='Active' AND gender=? AND cast_name=? order by customer_id DESC",array($gend,$cast_name));        
        if($query->num_rows() > 0)
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

    /*public function fetch_quick_search1($gend)
    {
        $query=$this->db->query("SELECT * from view_custoer  WHERE  display = 'Y' AND visibility='Visible' AND user_status='Active' AND gender=? ",array($gend));        
        if($query->num_rows() > 0)
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
    }*/

    public function fetch_quick_search_by_id($gend)
    {
        $query=$this->db->query("SELECT * from view_custoer  WHERE  display = 'Y' AND visibility='Visible' AND user_status='Active' AND profile_code=? ",array($gend));        
       //echo $this->last_query();
        if($query->num_rows() > 0)
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

    public function get_cust_details($user_id)
    {
        $query= $this->db->query("SELECT tc.*,tf.cast_name FROM tbl_customer as tc left join tbl_cast tf on tf.cast_id=tc.caste WHERE tc.display='Y' AND tc.customer_id=? ", array($user_id)); 

        if($query->num_rows()==1)
        {            
            return $query->row();
        }
        else
        {
            return false;
        }
    }
    
}