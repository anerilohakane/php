<?php defined('BASEPATH') OR exit('No direct script access allowed');



class Admin_model extends CI_Model {



    public function forgot_pass1($user_data,$password,$user_id,$email)

    {

        $this->load->library('email_sent'); 

        $this->db->trans_start();

        $this->db->where('customer_id', $user_id); 

        $result = $this->db->update('tbl_customer', $user_data); 

        $datavalue["password"]=$password; 

        if(isset($email) && !empty($email))

        {

            $subject = 'Shivbandhan Forgot Password';

            $msg_body=$this->load->view("mailer/new_pass",$datavalue,true);

            $alt_msg = 'Shivbandhan Forgot Password'; 

            $data=array('subject'=>$subject,'msg_body'=>$msg_body,'alt_msg'=>$alt_msg); $email_id[]=array('email_id'=>$email); 

            $result1=$this->email_sent->mail_sent($data,$email_id); 

        }

        

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

	

    public function active_fetch_customer()

    {

        $query=$this->db->query("SELECT tc.*,tf.profile_name FROM tbl_customer tc left join tbl_profile tf on tf.profile_id=tc.profile_for WHERE  tc.display ='Y' AND user_status='Active'  order by tc.customer_id desc");



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



    public function fetch_customer_email()

    {

        $query=$this->db->query("SELECT tc.* FROM tbl_customer tc WHERE  tc.display ='Y' order by tc.customer_id desc");



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



    public function block_fetch_customer()

    {

        $query=$this->db->query("SELECT tc.*,tf.profile_name FROM tbl_customer tc left join tbl_profile tf on tf.profile_id=tc.profile_for WHERE  tc.display ='Y' AND user_status='Block'  order by tc.customer_id desc");



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



    public function active_fetch_customer_by_sub_admin($user_id)

    {

        $query=$this->db->query("SELECT tc.*,tf.profile_name FROM tbl_customer tc left join tbl_profile tf on tf.profile_id=tc.profile_for WHERE  tc.display ='Y' AND user_status='Active' and tc.user_id=? order by tc.customer_id desc",array($user_id));



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



    public function block_fetch_customer_by_sub_admin($user_id)

    {

        $query=$this->db->query("SELECT tc.*,tf.profile_name FROM tbl_customer tc left join tbl_profile tf on tf.profile_id=tc.profile_for WHERE  tc.display ='Y' AND user_status='Block' and tc.user_id=? order by tc.customer_id desc",array($user_id));



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

    

    public function fetch_customer_details($cust_id)

    {   

        $query=$this->db->query("SELECT tc.*,c.community_name,tf.profile_name,tm.marital_name,tca.cast_name,tsc.sub_cast_name,tx.complexion_name,tr.rashi_name,tn.nakshtra_name,tch.charan_name,tg.gan_name,tna.nadi_name,tma.mangal_name,te.education_name,toc.city_name as occupation_city_name,tpc.city_name as parent_residence_city_name,tnc.city_name as native_district_name,tnc1.city_name as native_city_name,tec.cast_name as expected_cast_name,/*tee.education_name as expected_education_name,*/GROUP_CONCAT(DISTINCT tecc.city_name) AS preffered_city_name, GROUP_CONCAT(DISTINCT tee.education_name) AS expected_education_name,tem.mangal_name as expected_mangal_name FROM tbl_customer tc left join tbl_profile tf on tf.profile_id=tc.profile_for left join tbl_marital tm on tm.marital_id=tc.marital_status left join tbl_community c on c.community_id=tc.community left join tbl_cast tca on tca.cast_id=tc.caste left join tbl_sub_cast tsc on tsc.sub_cast_id=tc.sub_caste left join tbl_complexion tx on tx.complexion_id=tc.complexion left join tbl_rashi tr on tr.rashi_id=tc.rashi left join tbl_nakshtra tn on tn.nakshtra_id=tc.nakshtra  left join tbl_charan tch on tch.charan_id=tc.charan left join tbl_gan tg on tg.gan_id=tc.gan left join tbl_nadi tna on tna.nadi_id=tc.nadi left join tbl_mangal tma on tma.mangal_id=tc.mangal  left join tbl_education te on te.education_id=tc.education left join tbl_city toc on toc.city_id=tc.occupation_city left join tbl_city tpc on tpc.city_id=tc.parent_residence_city left join tbl_city tnc on tnc.city_id=tc.native_district left join tbl_city tnc1 on tnc1.city_id=tc.native_city left join tbl_cast tec on tec.cast_id=tc.expected_cast /*left join tbl_education tee on tee.education_id=tc.expected_education*/ left join tbl_city tecc on FIND_IN_SET(tecc.city_id,tc.preffered_city) left join tbl_education tee on FIND_IN_SET(tee.education_id,tc.expected_education) left join tbl_mangal tem on tem.mangal_id=tc.expected_mangal WHERE  tc.display ='Y' AND tc.customer_id=$cust_id ");



        if($query->num_rows()==1)

        {

            return $query->row();

        }

        else

        {

            return false;

        }

    }



    public function fetch_sms_data()

    {

        $query=$this->db->query("SELECT * FROM tbl_pramotion WHERE display ='Y' AND sms_status='Not Send' order by pramotion_id asc limit 100");



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



    public function accepted_request()

    {

        $query=$this->db->query("SELECT tbr.*,tc1.f_name as r_fname,tc1.l_name as r_lname,tc1.profile_code as r_profile_code,tc2.f_name as b_fname,tc2.l_name as b_lname,tc2.profile_code as b_profile_code FROM tbl_block_request tbr left join tbl_customer tc1 on tc1.customer_id=tbr.request_user_id left join tbl_customer tc2 on tc2.customer_id=tbr.block_user_id WHERE  tbr.display ='Y' AND tbr.status='Accepted'  order by tbr.request_id desc");



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

    

    public function decline_request()

    {

        $query=$this->db->query("SELECT tbr.*,tc1.f_name as r_fname,tc1.l_name as r_lname,tc1.profile_code as r_profile_code,tc2.f_name as b_fname,tc2.l_name as b_lname,tc2.profile_code as b_profile_code FROM tbl_block_request tbr left join tbl_customer tc1 on tc1.customer_id=tbr.request_user_id left join tbl_customer tc2 on tc2.customer_id=tbr.block_user_id WHERE  tbr.display ='Y' AND tbr.status='Decline'  order by tbr.request_id desc");



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



    public function matches_profile($mangal,$marital_status,$photo,$age_from,$age_to)

    {  

        if((isset($mangal) && !empty($mangal)) && (isset($marital_status) && !empty($marital_status)) && (isset($photo) && !empty($photo)) )

        {

            $query=$this->db->query("SELECT tc.*,tf.profile_name,tm.marital_name,tca.cast_name,tsc.sub_cast_name,tx.complexion_name,tr.rashi_name,tn.nakshtra_name,tch.charan_name,tg.gan_name,tna.nadi_name,tma.mangal_name,te.education_name,toc.city_name as occupation_city_name,tpc.city_name as parent_residence_city_name,tnc.city_name as native_district_name,tnc1.city_name as native_city_name,tec.cast_name as expected_cast_name,tee.education_name as expected_education_name,GROUP_CONCAT(DISTINCT tecc.city_name) AS preffered_city_name,tem.mangal_name as expected_mangal_name FROM tbl_customer tc left join tbl_profile tf on tf.profile_id=tc.profile_for left join tbl_marital tm on tm.marital_id=tc.marital_status left join tbl_cast tca on tca.cast_id=tc.caste left join tbl_sub_cast tsc on tsc.sub_cast_id=tc.sub_caste left join tbl_complexion tx on tx.complexion_id=tc.complexion left join tbl_rashi tr on tr.rashi_id=tc.rashi left join tbl_nakshtra tn on tn.nakshtra_id=tc.nakshtra  left join tbl_charan tch on tch.charan_id=tc.charan left join tbl_gan tg on tg.gan_id=tc.gan left join tbl_nadi tna on tna.nadi_id=tc.nadi left join tbl_mangal tma on tma.mangal_id=tc.mangal  left join tbl_education te on te.education_id=tc.education left join tbl_city toc on toc.city_id=tc.occupation_city left join tbl_city tpc on tpc.city_id=tc.parent_residence_city left join tbl_city tnc on tnc.city_id=tc.native_district left join tbl_city tnc1 on tnc1.city_id=tc.native_city left join tbl_cast tec on tec.cast_id=tc.expected_cast left join tbl_education tee on tee.education_id=tc.expected_education left join tbl_city tecc on FIND_IN_SET(tecc.city_id,tc.preffered_city) left join tbl_mangal tem on tem.mangal_id=tc.expected_mangal WHERE  tc.display ='Y' AND tc.caste=$mangal AND tc.marital_status=$marital_status AND tc.customer_photo IS NOT NULL   group by tc.customer_id",array($mangal,$marital_status,$photo,$age_from,$age_to));

        }

        else

        {

            $query=$this->db->query("SELECT tc.*,tf.profile_name,tm.marital_name,tca.cast_name,tsc.sub_cast_name,tx.complexion_name,tr.rashi_name,tn.nakshtra_name,tch.charan_name,tg.gan_name,tna.nadi_name,tma.mangal_name,te.education_name,toc.city_name as occupation_city_name,tpc.city_name as parent_residence_city_name,tnc.city_name as native_district_name,tnc1.city_name as native_city_name,tec.cast_name as expected_cast_name,tee.education_name as expected_education_name,GROUP_CONCAT(DISTINCT tecc.city_name) AS preffered_city_name,tem.mangal_name as expected_mangal_name FROM tbl_customer tc left join tbl_profile tf on tf.profile_id=tc.profile_for left join tbl_marital tm on tm.marital_id=tc.marital_status left join tbl_cast tca on tca.cast_id=tc.caste left join tbl_sub_cast tsc on tsc.sub_cast_id=tc.sub_caste left join tbl_complexion tx on tx.complexion_id=tc.complexion left join tbl_rashi tr on tr.rashi_id=tc.rashi left join tbl_nakshtra tn on tn.nakshtra_id=tc.nakshtra  left join tbl_charan tch on tch.charan_id=tc.charan left join tbl_gan tg on tg.gan_id=tc.gan left join tbl_nadi tna on tna.nadi_id=tc.nadi left join tbl_mangal tma on tma.mangal_id=tc.mangal  left join tbl_education te on te.education_id=tc.education left join tbl_city toc on toc.city_id=tc.occupation_city left join tbl_city tpc on tpc.city_id=tc.parent_residence_city left join tbl_city tnc on tnc.city_id=tc.native_district left join tbl_city tnc1 on tnc1.city_id=tc.native_city left join tbl_cast tec on tec.cast_id=tc.expected_cast left join tbl_education tee on tee.education_id=tc.expected_education left join tbl_city tecc on FIND_IN_SET(tecc.city_id,tc.preffered_city) left join tbl_mangal tem on tem.mangal_id=tc.expected_mangal WHERE  tc.display ='Y'   group by tc.customer_id");

        }

        

        //echo $this->db->last_query();



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

    public function matche_profile($mangal)

    {  

        $query=$this->db->query("SELECT tc.*,tf.profile_name,tm.marital_name,tca.cast_name,tsc.sub_cast_name,tx.complexion_name,tr.rashi_name,tn.nakshtra_name,tch.charan_name,tg.gan_name,tna.nadi_name,tma.mangal_name,te.education_name,toc.city_name as occupation_city_name,tpc.city_name as parent_residence_city_name,tnc.city_name as native_district_name,tnc1.city_name as native_city_name,tec.cast_name as expected_cast_name,tee.education_name as expected_education_name,GROUP_CONCAT(DISTINCT tecc.city_name) AS preffered_city_name,tem.mangal_name as expected_mangal_name FROM tbl_customer tc left join tbl_profile tf on tf.profile_id=tc.profile_for left join tbl_marital tm on tm.marital_id=tc.marital_status left join tbl_cast tca on tca.cast_id=tc.caste left join tbl_sub_cast tsc on tsc.sub_cast_id=tc.sub_caste left join tbl_complexion tx on tx.complexion_id=tc.complexion left join tbl_rashi tr on tr.rashi_id=tc.rashi left join tbl_nakshtra tn on tn.nakshtra_id=tc.nakshtra  left join tbl_charan tch on tch.charan_id=tc.charan left join tbl_gan tg on tg.gan_id=tc.gan left join tbl_nadi tna on tna.nadi_id=tc.nadi left join tbl_mangal tma on tma.mangal_id=tc.mangal  left join tbl_education te on te.education_id=tc.education left join tbl_city toc on toc.city_id=tc.occupation_city left join tbl_city tpc on tpc.city_id=tc.parent_residence_city left join tbl_city tnc on tnc.city_id=tc.native_district left join tbl_city tnc1 on tnc1.city_id=tc.native_city left join tbl_cast tec on tec.cast_id=tc.expected_cast left join tbl_education tee on tee.education_id=tc.expected_education left join tbl_city tecc on FIND_IN_SET(tecc.city_id,tc.preffered_city) left join tbl_mangal tem on tem.mangal_id=tc.expected_mangal WHERE  tc.display ='Y' AND tc.profile_code=? group by tc.customer_id",array($mangal));

        //echo $this->db->last_query();



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

    public function category_wise_user()

    {

        $query= $this->db->query("SELECT gender, count(customer_id) as cnt FROM tbl_customer  WHERE display='Y' GROUP BY gender ");

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

    public function today_reg()

    {

        $query=$this->db->query("SELECT DATE(created_on) as reg_date, count(created_on) as cnt FROM tbl_customer WHERE display='Y'  GROUP BY DATE(created_on) order by reg_date DESC  limit 10 ");

        if($query->num_rows()>0)

        {

           return $query->result();

        }else

        {

            return null;

        }

    }



    public function daily_payment()

    {

        $query=$this->db->query("SELECT DATE(created_on) as pay_date, SUM(CASE WHEN pay_type='Online' THEN membership_amt ELSE 0 END) as 'online_totle', SUM(CASE WHEN pay_type='offline' THEN membership_amt ELSE 0 END) as 'offline_totle' FROM tbl_payment_details WHERE display='Y' GROUP BY DATE(created_on) order by pay_date desc  limit 10 ");

        if($query->num_rows()>0)

        {

           return $query->result();

        }else

        {

            return null;

        }

    } 



    public function daily_payment_by_sub_admin($user_id)

    {

        $query=$this->db->query("SELECT DATE(created_on) as pay_date, SUM(CASE WHEN pay_type='Online' THEN membership_amt ELSE 0 END) as 'online_totle', SUM(CASE WHEN pay_type='offline' THEN membership_amt ELSE 0 END) as 'offline_totle' FROM tbl_payment_details WHERE display='Y' and user_id=? GROUP BY DATE(created_on) order by pay_date desc  limit 10 ",array($user_id));

        if($query->num_rows()>0)

        {

           return $query->result();

        }else

        {

            return null;

        }

    }



    public function save_membership_using_api($customer_data,$customer_details_data,$customer_id)

    {

        $this->db->trans_start();

        //$customer_id = $this->session->userdata('customer_id');

        $this->db->insert('tbl_payment_details',$customer_data);

        $payment_id= $this->db->insert_id();

        if(isset($customer_details_data) && !empty($customer_details_data))

        {

            $this->db->where('customer_id', $customer_id)->update('tbl_customer', $customer_details_data);

        }

        $query=$this->db->trans_complete(); 

        if($query)

        {

            return $payment_id;

        }

        else

        {

            return false;

        }           

    }



    public function save_membership($customer_data,$customer_details_data)

    {

        $this->db->trans_start();

        $customer_id = $this->session->userdata('customer_id');

        $this->db->insert('tbl_payment_details',$customer_data);

        $payment_id= $this->db->insert_id();

        if(isset($customer_details_data) && !empty($customer_details_data))

        {

            $this->db->where('customer_id', $customer_id)->update('tbl_customer', $customer_details_data);

        }

        $query=$this->db->trans_complete(); 

        if($query)

        {

            return $payment_id;

        }

        else

        {

            return false;

        }           

    }



    public function save_membership_by_sub_admin($customer_data,$customer_details_data)

    {

        $this->db->trans_start();

        $customer_id = $this->session->userdata('cst_id');

        $this->db->insert('tbl_payment_details',$customer_data);

        $payment_id= $this->db->insert_id();

        if(isset($customer_details_data) && !empty($customer_details_data))

        {

            $this->db->where('customer_id', $customer_id)->update('tbl_customer', $customer_details_data);

        }

        $query=$this->db->trans_complete(); 

        if($query)

        {

            return $payment_id;

        }

        else

        {

            return false;

        }           

    }



    public function fetch_invoice_details($customer_id)

    {   

        $query=$this->db->query("SELECT tpd. *,tc.profile_code,tc.permanant_address,tm.membership_amount AS membership_amt1,tm.gst,tm.total_amount,tm.membership_description FROM tbl_payment_details tpd left join tbl_customer tc on tc.customer_id=tpd.customer_id left join tbl_membership tm on tm.membership_id=tc.membership_id WHERE  tpd.display ='Y' AND tpd.payment_id=$customer_id ");



        if($query->num_rows()==1)

        {

            return $query->row();

        }

        else

        {

            return false;

        }

    }



    public function get_transcation_history($fromDate,$toDate)

    {

        $whr='';

        if($fromDate)$whr=$whr.'DATE_FORMAT(tpd.created_on,"%Y-%m-%d") >="'.$fromDate.'" AND '; 

        if($toDate)$whr=$whr.'DATE_FORMAT(tpd.created_on,"%Y-%m-%d") <="'.$toDate.'" AND '; 

        

        $query=$this->db->query("SELECT tpd.*,tc.gender,tc.profile_code from tbl_payment_details tpd left join tbl_customer tc on tc.customer_id=tpd.customer_id WHERE $whr tpd.display = 'Y' order by tpd.payment_id desc");

        //echo $this->db->last_query();

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



    public function get_franchise_history($fromDate,$toDate,$status)

    {

        $whr='';

        if($fromDate)$whr=$whr.'DATE_FORMAT(tpd.created_on,"%Y-%m-%d") >="'.$fromDate.'" AND '; 

        if($toDate)$whr=$whr.'DATE_FORMAT(tpd.created_on,"%Y-%m-%d") <="'.$toDate.'" AND ';

        if($status)$whr=$whr.'tpd.user_id="'.$status.'" AND ';

        

        $query=$this->db->query("SELECT tpd.*,tc.gender,tc.profile_code from tbl_payment_details tpd left join tbl_customer tc on tc.customer_id=tpd.customer_id WHERE $whr tpd.display = 'Y' order by tpd.payment_id desc");

        //echo $this->db->last_query();

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



    public function get_franchise_history_total_calulate($fromDate,$toDate,$status)

    {

        $whr='';

        if($fromDate)$whr=$whr.'DATE_FORMAT(tpd.created_on,"%Y-%m-%d") >="'.$fromDate.'" AND '; 

        if($toDate)$whr=$whr.'DATE_FORMAT(tpd.created_on,"%Y-%m-%d") <="'.$toDate.'" AND ';

        if($status)$whr=$whr.'tpd.user_id="'.$status.'" AND ';

        

        $query=$this->db->query("SELECT SUM(tpd.membership_amt) as total_amount from tbl_payment_details tpd left join tbl_customer tc on tc.customer_id=tpd.customer_id WHERE $whr tpd.display = 'Y' order by tpd.payment_id desc");

        //echo $this->db->last_query();

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



    public function get_transcation_history_by_sub_admin($fromDate,$toDate,$user_id)

    {

        $whr='';

        if($fromDate)$whr=$whr.'DATE_FORMAT(tpd.created_on,"%Y-%m-%d") >="'.$fromDate.'" AND '; 

        if($toDate)$whr=$whr.'DATE_FORMAT(tpd.created_on,"%Y-%m-%d") <="'.$toDate.'" AND '; 

        

        $query=$this->db->query("SELECT tpd.*,tc.gender,tc.profile_code from tbl_payment_details tpd left join tbl_customer tc on tc.customer_id=tpd.customer_id WHERE $whr tpd.display = 'Y' and tpd.user_id=? order by tpd.payment_id desc",array($user_id));

        //echo $this->db->last_query();

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



    public function fetch_request($customer_id,$status)

    {  

        

        $query=$this->db->query("SELECT tr1.*,tc.* FROM tbl_request tr1 left join view_custoer tc on tc.customer_id=tr1.requested_by  WHERE  tr1.display ='Y' AND tr1.requested_to=? AND tr1.status=? ",array($customer_id,$status));

        

        //echo $this->db->last_query();



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



    public function fetch_rjected_request($customer_id,$status)

    {  

        

        $query=$this->db->query("SELECT tr1.*,tc.* FROM tbl_request tr1 left join view_custoer tc on tc.customer_id=tr1.requested_by  WHERE  tr1.display ='Y' AND tr1.modified_by=? AND tr1.status=? ",array($customer_id,$status));

        

        //echo $this->db->last_query();



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



    public function fetch_accepted_request($customer_id,$status)

    {  

        

        $query=$this->db->query("SELECT tr1.*,tc.* FROM tbl_request tr1 left join view_custoer tc on tc.customer_id=tr1.requested_by  WHERE  tr1.display ='Y' AND tr1.modified_by=? AND tr1.status=? ",array($customer_id,$status));

        

        //echo $this->db->last_query();



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

    public function fetch_accepted_request1($customer_id,$status)

    {  

        

        $query=$this->db->query("SELECT tr1.*,tc.* FROM tbl_request tr1 left join view_custoer tc on tc.customer_id=tr1.requested_by  WHERE  tr1.display ='Y' AND tr1.requested_to=? AND tr1.status=? ",array($customer_id,$status));

        

        //echo $this->db->last_query();



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



    public function fetch_blocked_request($customer_id,$status)

    {  

        

        $query=$this->db->query("SELECT tr1.*,tc.* FROM tbl_request tr1 left join view_custoer tc on tc.customer_id=tr1.requested_by  WHERE  tr1.display ='Y' AND tr1.modified_by=? AND tr1.status=? ",array($customer_id,$status));

        

        //echo $this->db->last_query();



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



    public function chk_block($user_id,$customer_id)

    {  

        

        $query=$this->db->query("SELECT * FROM tbl_request WHERE display ='Y' AND modified_by=? AND status='Block' AND requested_by=? AND requested_to=$user_id ",array($user_id,$customer_id));

        

        //echo $this->db->last_query();



        if($query->num_rows()==1)

        {

            return $query->row();

        }

        else

        {

            return false;

        }

    }



    public function my_favourite($customer_id)

    {  

        

        $query=$this->db->query("SELECT tf.*,tc.* FROM tbl_favourite tf left join view_custoer tc on tc.customer_id=tf.favourite_to  WHERE  tf.display ='Y' AND tf.favourite_by=?  ",array($customer_id));

        

        //echo $this->db->last_query();



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



    public function contact_show($customer_id,$cust_id)

    {  

        $query=$this->db->query("SELECT * FROM tbl_request  WHERE  display ='Y' AND  status='Accepted' AND requested_by=? AND requested_to=?  ",array($customer_id,$cust_id));

        

        if($query->num_rows()==1)

        {

            return $query->row();

        }

        else

        {

            return false;

        }

    }



    public function sent_request($customer_id)

    {  

        

        $query=$this->db->query("SELECT tr1.*,tc.* FROM tbl_request tr1 left join view_custoer tc on tc.customer_id=tr1.requested_to  WHERE  tr1.display ='Y' and tr1.status='Pending' AND tr1.created_by=?  ",array($customer_id));

        

        //echo $this->db->last_query();



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



    public function site_login($email_id,$password)

    {  

        $query=$this->db->query("SELECT * FROM view_custoer  WHERE  display ='Y' AND  user_status='Active'  AND (mobile=?) AND password=? ",array($email_id,$password));

        //echo $this->db->last_query();

        if($query->num_rows()==1)

        {

            return $query->row();

        }

        else

        {

            return false;

        }

    }



    public function fetch_chat_data($customer_id,$cust_id)

    {  

        $query=$this->db->query("SELECT * FROM tbl_inbox  WHERE  display ='Y' AND  send_by=?  AND send_to=? ",array($customer_id,$cust_id));

        

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

    public function fetch_chat_data1($customer_id,$cust_id)

    {  

        $query=$this->db->query("SELECT * FROM tbl_inbox  WHERE  display ='Y' AND  send_to=?  AND send_by=? ",array($customer_id,$cust_id));

        

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



    public function fetch_inbox($customer_id)

    {  

        $query=$this->db->query("SELECT tbi.*,tv.f_name,tv.m_name,tv.l_name,tv.profile_code,tv.customer_photo FROM `tbl_inbox` as tbi left join view_custoer tv on (IF(tbi.send_by = $customer_id, tbi.send_to, tbi.send_by)) = tv.customer_id where (tbi.send_by=$customer_id or tbi.send_to=$customer_id) group by tbi.send_by,tbi.send_to   ORDER BY tbi.inbox_id desc");

        

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



    public function fetch_inbox1($customer_id)

    {  

        $query=$this->db->query("SELECT x.*,vw.f_name,vw.m_name,vw.l_name,vw.profile_code,vw.customer_photo,vw.customer_id FROM(SELECT * FROM tbl_inbox  where display='Y' and send_by=? ORDER BY modified_on desc) as x left join view_custoer as vw on vw.customer_id=x.send_to group by send_to",array($customer_id));

        

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



    public function fetch_inbox2($customer_id)

    {  

        $query=$this->db->query("SELECT x.*,vw.f_name,vw.m_name,vw.l_name,vw.profile_code,vw.customer_photo,vw.customer_id FROM(SELECT * FROM tbl_inbox  where display='Y' and send_to=? ORDER BY modified_on desc) as x left join view_custoer as vw on vw.customer_id=x.send_by group by send_by",array($customer_id));

        

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



    public function news_data()

    {

        $query=$this->db->query("SELECT * FROM tbl_news WHERE (DATE(to_date)>= CURDATE() OR DATE(to_date)='0000-00-00') AND DATE(from_date)<= CURDATE() AND display='Y' ");

    

        if($query)

        {

            if($query->num_rows()>0)

            {

                foreach($query->result() as $key)

                {

                    $data[]=$key;

                }

                return $data;

            }

            else

            {

                return false;

            }

        }

    }

    public function fetch_quick_search1($gend,$cast_name,$user_id)
    {
        $query=$this->db->query("SELECT * from view_custoer as vc  WHERE  vc.display = 'Y' AND vc.visibility='Visible' AND vc.user_status='Active' AND vc.gender=? AND vc.cast_name=? order by vc.customer_id DESC",array($gend,$cast_name));        

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
}



