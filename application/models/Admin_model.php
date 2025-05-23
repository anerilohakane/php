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

        $query=$this->db->query("SELECT DATE(created_at) as reg_date, count(created_at) as cnt FROM tbl_customer WHERE display='Y'  GROUP BY DATE(created_at) order by reg_date DESC  limit 10 ");

        if($query->num_rows()>0)

        {

           return $query->result();

        }else

        {

            return array();

        }

    }



    public function daily_payment()

    {

        $query=$this->db->query("SELECT DATE(created_on) as pay_date, SUM(membership_amt) as total_amount FROM tbl_payment_details WHERE display='Y' GROUP BY DATE(created_on) order by pay_date desc limit 10");

        if($query->num_rows()>0)

        {

           return $query->result();

        }else

        {

            return array();

        }

    } 



    public function daily_payment_by_sub_admin($user_id)

    {

        $query=$this->db->query("SELECT DATE(created_on) as pay_date, SUM(membership_amt) as total_amount FROM tbl_payment_details WHERE display='Y' and user_id=? GROUP BY DATE(created_on) order by pay_date desc limit 10 ",array($user_id));

        if($query->num_rows()>0)

        {

           return $query->result();

        }else

        {

            return array();

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
        $query=$this->db->query("SELECT tr1.*,tc.* FROM tbl_request tr1 left join view_custoer tc on tc.customer_id=tr1.requested_by  WHERE  tr1.display ='Y' AND tr1.modified_by=? AND tr1.status=? ",array($customer_id,$status));
        
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
        $query=$this->db->query("SELECT * FROM tbl_news WHERE display='Y' ORDER BY news_id DESC LIMIT 5");
        
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
            return array();
        }
    }

}


