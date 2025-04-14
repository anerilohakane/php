<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Common_model extends CI_Model {



public function fetchDataASC($table_name, $asc_by_col_name) {
        $this->db->select('*')->from($table_name)->where('display', 'Y')->order_by($asc_by_col_name, "asc"); 
        $qry = $this->db->get();

        if($qry->num_rows()>0) {
            foreach ($qry->result() as $row) {
                $tbl_data[]=$row;
            } 
            return $tbl_data;
        } else {
            return false;
        }
    } 

    public function fetchDataDESC($table_name, $asc_by_col_name) {
        $this->db->select('*')->from($table_name)->where('display', 'Y')->order_by($asc_by_col_name, "DESC"); 
        $qry = $this->db->get(); 
        if($qry->num_rows()>0) {
            foreach ($qry->result() as $row) {
                $tbl_data[]=$row; 
            } 
            return $tbl_data; 
        } else {
            return false; 
        } 
    } 

    public function fetchDataDESClimit($table_name, $dsc_by_col_name, $limit) {
        $this->db->select('*')->from($table_name)->where('display', 'Y')->order_by($dsc_by_col_name, "DESC")->limit($limit);
        $qry = $this->db->get(); 
        if($qry->num_rows()>0) {
            foreach ($qry->result() as $row) {
                $tbl_data[]=$row; 
            } 
            return $tbl_data; 
        } else {
            return false; 
        } 
    } 

    public function fetchDataASClimit($table_name, $asc_by_col_name, $limit) {
        $this->db->select('*')->from($table_name)->where('display', 'Y')->order_by($asc_by_col_name, "ASC")->limit($limit); 
        $qry = $this->db->get(); 
        if($qry->num_rows()>0) {
            foreach ($qry->result() as $row) {
                $tbl_data[]=$row; 
            } 
            return $tbl_data; 
        } else {
            return false; 
        } 
    } 

    public function addData($tablename,$data) {
        $query = $this->db->insert($tablename,$data); 
        $user_id = $this->db->insert_id(); 
        if($query) {
            return $user_id; 
        } else {
            return false; 
        } 
    } 

    public function updateDetails($tblname,$where,$condition,$data) {
        $this->db->where($where, $condition);
        $query = $this->db->update($tblname, $data); 
        return $query; 
    } 

    public function SaveMultiData($tablename,$data) {
        $query=$this->db->insert_batch($tablename,$data); 
        if($query) {
            return true; 
        } else {
            return false; 
        } 
    }

    public function selectDetailsWhr($tblname,$where,$condition) {
        $this->db->where($where,$condition); 
        $query = $this->db->get($tblname); 
        if($query->num_rows()== 1) {
            return $query->row(); 
        } else {
            return false; 
        } 
    } 

    public function selectAllWhr($tblname,$where,$condition) {
        $this->db->where($where,$condition); 
        $this->db->where('display','Y'); 
        $query = $this->db->get($tblname); 
        if($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $tbl_data[]=$row; 
            } 
            return $tbl_data; 
        } else {
            return false; 
        } 
    } 

    public function selectAllWhrDsc($tblname,$where,$condition) {
        $this->db->where($where,$condition)->where('display','Y')->order_by($dsc,"DESC");
        $query = $this->db->get($tblname); 
        if($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $tbl_data[]=$row; 
            } 
            return $tbl_data; 
        } else {
            return false; 
        } 
    } 

    public function selectMultiDataFor($tblname,$where1,$where2,$condition1,$condition2) {
        $this->db->where($where1,$condition1); 
        $this->db->where($where2,$condition2); 
        $this->db->where('display','Y'); 
        $query = $this->db->get($tblname); 
        if($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $tbl_data[]=$row; 
            } 
            return $tbl_data; 
        } else {
            return false; 
        } 
    } 

    public function selectMultiwhere($tblname,$where1,$where2,$condition1,$condition2) {
        $this->db->where($where1,$condition1); 
        $this->db->where($where2,$condition2); 
        $this->db->where('display','Y'); 
        $query = $this->db->get($tblname); 
        if($query->num_rows()== 1) {
            return $query->row(); 
        } else {
            return false; 
        } 
    } 

    public function singlejoin2tbl($tbl1,$tbl2,$where,$condition,$id) {
        $query=$this->db->query("SELECT * from $tbl1 tbl1 left join $tbl2 tbl2 on tbl1.$where=tbl2.$where where tbl1.$condition=$id AND tbl1.display='Y' AND tbl2.display='Y'"); 
        if($query->num_rows()==1) {
            return $query->row(); 
        } else {
            return false; 
        } 
    } 

    public function alljoin2tbl($tbl1,$tbl2,$where) {
        $query=$this->db->query("SELECT * from $tbl1 tbl1 left join $tbl2 tbl2 on tbl1.$where=tbl2.$where where  tbl1.display='Y' AND tbl2.display='Y'"); 
        if($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $tbl_data[]=$row; 
            } 
            return $tbl_data; 
        } else {
            return false; 
        } 
    } 

    public function alljoin2tbl_whr($tbl1,$tbl2,$where,$condition,$id) {
        $query=$this->db->query("SELECT * from $tbl1 tbl1 left join $tbl2 tbl2 on tbl1.$where=tbl2.$where where tbl1.$condition=? AND tbl1.display='Y' AND tbl2.display='Y'",array($id));
        if($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $tbl_data[]=$row; 
            } 
            return $tbl_data; 
        } else {
            return false; 
        } 
    } 

    public function fetchAllCity() {
        $q = $this->db->query("SELECT tct.*, tc.country_name, ts.state_name FROM tbl_city tct JOIN tbl_country tc ON tct.country_id=tc.country_id JOIN tbl_state ts ON tct.state_id=ts.state_id WHERE tct.display='Y'"); 
        if($q->num_rows()>0) {
            foreach ($q->result() as $key) {
                $data[]=$key; 
            } 
            return $data; 
        } else {
            return false; 
        } 
    }

    public function menu_list($user_id)
	{
	    $query=$this->db->query("SELECT * FROM tbl_menu where display='Y'");
	    if($query->num_rows()>0)
	     {
	        $data=array();
	        foreach($query->result() as $key)
	        {
	            $array_data['menu']=$key;
	            $menu_id=$key->menu_id;
	            $subquery=$this->db->query("SELECT s.*,if(isnull(p.user_id),'N','Y') prev FROM tbl_submenu s left join tbl_priviledges p on p.user_id=? and p.submenu_id=s.submenu_id where s.menu_id=? and s.display='Y' having prev='Y' ORDER BY s.submenu_id ASC",array($user_id,$menu_id));
	            if($subquery->num_rows()>0)
	            {
	                $array_data['submenu']=$subquery->result();
	                $data[]=$array_data;
	            }else
	            {
	                $array_data['submenu']=null;
	            }
	        }
	     }else
	     {
	        return null;
	     }
	    return $data;
	}

	public function menu_list1($user_id)
	{
	    $query=$this->db->query("SELECT * FROM tbl_menu where display='Y'");
	    if($query->num_rows()>0)
	     {
	        $data=array();
	        foreach($query->result() as $key)
	        {
	            $array_data['menu']=$key;
	            $menu_id=$key->menu_id;
	            $subquery=$this->db->query("SELECT s.*,if(isnull(p.user_id),'N','Y') prev FROM tbl_submenu s left join tbl_priviledges p on p.user_id=? and p.submenu_id=s.submenu_id where s.menu_id=? and s.display='Y' ",array($user_id,$menu_id));
	            if($subquery->num_rows()>0)
	            {
	                $array_data['submenu']=$subquery->result();
	                $data[]=$array_data;
	            }else
	            {
	                $array_data['submenu']=null;
	            }
	        }
	     }else
	     {
	        return null;
	     }
	    return $data;
	}

	public function save_role_config($user_id,$submenu)
	{
		$this->db->trans_start();
	    $this->db->where('user_id',$user_id);
	    $this->db->delete('tbl_priviledges');
	    if(isset($submenu) && !empty($submenu))
	    {
	        foreach ($submenu as $key) 
	        {
	            $this->db->insert('tbl_priviledges',array('submenu_id'=>$key,'user_id'=>$user_id));
	        }
	    }

	    $query=$this->db->trans_complete(); 

	    if($query)
	    {
	        return true; 
	    }
	    else
	    {
	        return false;
	    }
	}

	public function update_batch($tablename,$data,$id)
	{
	    $query=$this->db->update_batch($tablename,$data,$id);

	    if($query)
	    {
	        return true;
	    }
	    else
	    {
	        return false;
	    }
	}

	public function forgot_pass($user_data,$password,$user_id,$email) 
	{
	    $this->load->library('email_sent'); 
	    $this->db->trans_start(); 
	    $this->db->where('user_id', $user_id); 
	    $query = $this->db->update('tbl_userinfo', $user_data); 
	    $datavalue["password"]=$password; 
	    $subject = 'Dhara Water Corporation Forgot Password'; 
	    $msg_body=$this->load->view("mailer/new_pass",$datavalue,true); 
	    $alt_msg = 'Dhara Water Corporation Forgot Password'; 
	    $data=array('subject'=>$subject,'msg_body'=>$msg_body,'alt_msg'=>$alt_msg); 
	    $email_id[]=array('email_id'=>$email); 
	    $result=$this->email_sent->mail_sent($data,$email_id); 
	    //echo $this->db->last_query();
	    if($result) 
	    {
	        $query=$this->db->trans_complete(); 
	        if($query) 
	        {
	            return true; 
	        } 
	        else 
	        {
	            return false; 
	        } 
	    } 
	    else 
	    {
	        return false; 
	    } 
	}


	public function duplicate($id,$p_key,$tbl,$where,$value) {
		if (empty($value)) {return FALSE; } 
		$query=$this->db->query("SELECT COUNT(*) AS numrows FROM $tbl WHERE $where = ? AND $p_key != ? AND display='Y'",array($value,$id)); 
		if($query->num_rows()==1) {
			return $query->row(); 
		} else {
			return false; 
		} 
	} 


	public function multi_duplicate($id,$p_key,$tbl,$ck_value,$where,$value1,$where1,$value2,$where2,$value3,$where3) {
		if (empty($ck_value)) {
			return FALSE; 
		} 
		
		$whr=''; 
		
		if($where1)
			$whr=$whr.$where1.'='.$value1.' AND '; 

		if($where2)
			$whr=$whr.$where2.'='.$value2.' AND '; 

		if($where3)
			$whr=$whr.$where3.'='.$value3.' AND '; 

		$query=$this->db->query("SELECT COUNT(*) AS numrows FROM $tbl WHERE $where = ? AND $p_key != ? AND $whr display='Y'",array($ck_value,$id)); 

		if($query->num_rows()==1) {
			return $query->row(); 
		} else {
			return false; 
		} 
	} 



	public function selectAllWhrlimit($tblname,$where,$condition,$limit) {
		$this->db->where($where,$condition);
		$this->db->where('display','Y')->limit($limit); 
		$query = $this->db->get($tblname); 
		if($query->num_rows() > 0) {
		 	foreach ($query->result() as $row) {
		 		$tbl_data[]=$row; 
		 	} 
		 	return $tbl_data; 
		} else {
		 	return false; 
		} 
	} 


	public function forgot_pass_site($user_data,$password,$user_id,$email) {
		$this->load->library('email_sent'); 
		$this->db->trans_start(); 
		$this->db->where('inst_id', $user_id); 
		$query = $this->db->update('tbl_institute', $user_data); 
		$datavalue["password"]=$password; 
		$subject = 'MSCEIA Forgot Password'; 
		$msg_body=$this->load->view("mailer/new_pass",$datavalue,true); 
		$alt_msg = 'MSCEIA Forgot Password'; 
		$data=array('subject'=>$subject,'msg_body'=>$msg_body,'alt_msg'=>$alt_msg); 
		$email_id[]=array('email_id'=>$email); 
		$result=$this->email_sent->mail_sent($data,$email_id); 

		if($result) {
			$query=$this->db->trans_complete(); 
			if($query) {
				return true; 
			} else {
				return false; 
			} 
		} else {
			return false; 
		} 
	} 







}