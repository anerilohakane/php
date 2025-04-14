<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Report_controller extends CI_Controller {	

	public function __construct()
  	{ 
	    parent::__construct();       
	    date_default_timezone_set("Asia/Kolkata"); 
	    $value = base_url();
	    $this->load->library("email_sent");
	    $this->load->model('common_model');
	    $this->load->model('admin_model');
	    $this->load->library('Report_creation');
	    setcookie("shivbandh",$value, time()+3600*24,'/'); 
	    ini_set('memory_limit', '1024M');
	    ini_set('max_execution_time', 2000); 
  	} 
    

    public function transcation_details()
    {
        $user_id = $this->session->userData("user_id");
        $user_role = $this->session->userData("user_role");

        if ($user_role == 7) {

          $data['transcation_data'] = $this->common_model->selectAllWhrDsc('tbl_payment_details','user_id',$user_id);
        } else  {

          $data['transcation_data'] = $this->common_model->fetchDataDESC('tbl_payment_details','payment_id');

        }

      $this->load->view('report/transcation_history',$data); 
    }

    public function get_transcation_history()
    {
      $user_id = $this->session->userData("user_id");
      $user_role = $this->session->userData("user_role");

      $fromDate=$this->input->post('val1');
      $fromDate=date('Y-m-d',strtotime($fromDate));
      $toDate=$this->input->post('val2');
      $toDate=date('Y-m-d',strtotime($toDate));
      $data['url']='print_transcation_report/'.$fromDate.'/'.$toDate; 

      if($fromDate=='1970-01-01')
      {
        $fromDate='';
      }

      if($toDate=='1970-01-01')
      {
        $toDate='';
      }
      
      if ($user_role == 7) {

        $data['transcation_data'] = $this->admin_model->get_transcation_history_by_sub_admin($fromDate,$toDate,$user_id);

      } else {

        $data['transcation_data'] = $this->admin_model->get_transcation_history($fromDate,$toDate);

      }

      $this->load->view('report/transcation_history_view',$data);
    }

    public function print_transcation_report()
    {

      $user_id = $this->session->userData("user_id");
      $user_role = $this->session->userData("user_role");


      $fromDate=$this->uri->segment(2);
      $toDate=$this->uri->segment(3);
      $this->load->library('excel');
      $fromDate=date('Y-m-d',strtotime($fromDate));
      $toDate=date('Y-m-d',strtotime($toDate));
      if($fromDate=='1970-01-01')
      {
        $fromDate='';
      }

      if($toDate=='1970-01-01')
      {
        $toDate='';
      }

      if ($user_role == 7) {

        $transcation_data = $this->admin_model->get_transcation_history_by_sub_admin($fromDate,$toDate,$user_id);
      
      } else {
        
        $transcation_data = $this->admin_model->get_transcation_history($fromDate,$toDate);

      }
      $this->excel->print_transcation_report($transcation_data);
    }

    public function franchise_details()
    {
        $data['transcation_data'] = $this->common_model->fetchDataDESC('tbl_payment_details','payment_id');
        $data['franchise_list'] = $this->common_model->selectAllWhrDsc('tbl_userinfo','role_id',7);
  
        $this->load->view('report/franchise_history',$data); 
    }


    public function get_franchise_history()
    {

      $fromDate=$this->input->post('val1');
      $fromDate=date('Y-m-d',strtotime($fromDate));
      $toDate=$this->input->post('val2');
      $toDate=date('Y-m-d',strtotime($toDate));

      $status=$this->input->post("status");


      //$data['url']='print_franchise_report/'.$fromDate.'/'.$toDate.'/'.$status;

      if($fromDate=='1970-01-01')
      {
        $fromDate='';
      }

      if($toDate=='1970-01-01')
      {
        $toDate='';
      } 

      $data['transcation_data'] = $this->admin_model->get_franchise_history($fromDate,$toDate,$status);

      $data['total_transcation_data'] = $this->admin_model->get_franchise_history_total_calulate($fromDate,$toDate,$status);

      $this->load->view('report/franchise_history_view',$data);
    }

}