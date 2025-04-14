<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_controller extends CI_Controller {	

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
    

    public function slider_master()
    {
        $data['slider_data'] = $this->common_model->fetchDataDESC('tbl_slider','slider_id');
        $this->load->view('admin/slider_master',$data);
    }

    public function save_slider_master()
    {
        $id = $this->input->post('id');
        $slider_name = $this->input->post('slider_name');
        $slider_desc = $this->input->post('slider_desc');
        
        $visibility=$this->input->post('visibility');
        $user_id=$this->session->userData("user_id");
        $logo='';
        $error='';
        if(isset($_FILES['slider_photo']['name']))//Code for to take image from form and check isset
        {
          $logo=$_FILES['slider_photo']['name']; //here [] name attribute
          $logoImg = array('upload_path' =>'./uploads/slider_photos/',
                   'fieldname' => 'slider_photo',
                     'encrypt_name' => FALSE,        
                     'overwrite' => FALSE,
                   'allowed_types' => 'png|PNG|jpg|JPG|jpeg|JPEG' );
          $logo_img = $this->imageupload->image_upload($logoImg);
          $error= $this->upload->display_errors();
          if(isset($logo_img) && !empty($logo_img))
          {
            $logoData = $this->upload->data();      
            $logo = $logoData['file_name'];
          }
        }
        else
        {
          $logo=$this->input->post('hidden_slider_photo');
        }
        $data = array('slider_name'=>$slider_name,'slider_photo'=>$logo,'slider_desc'=>$slider_desc,'visibility'=>$visibility);
        if($error)
        {
          $this->json->jsonReturn(array(
            'valid'=>FALSE,
            'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> File type is not allowed !</div>'
          ));
        }
        else
        {
          if(isset($id) && !empty($id) && ($id>0)) 
          {
            $data['modi_by']=$user_id;
            $result = $this->common_model->updateDetails('tbl_slider','slider_id',$id,$data);
            if($result)  
            {
              $this->json->jsonReturn(array(
                'valid'=>TRUE,
                'msg'=>'<div class="alert modify alert-success"><strong></strong>Slider Details Updated Successfully!</div>'
              ));
            }
            else
            {
              $this->json->jsonReturn(array(
                'valid'=>FALSE,
                'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Updating Slider Details !</div>'
              ));
            }
          }
          else
          {       
            $data['created_by']=$user_id;
            $data['created_on']=date('Y-m-d H:i:s');  
            $result =  $this->common_model->addData('tbl_slider',$data);
            
            if($result)
            {
              $this->json->jsonReturn(array(  
                'valid'=>TRUE,
                'msg'=>'<div class="alert modify alert-success"><strong></strong> Slider Details Saved Successfully!</div>'
              ));
            }
            else
            {
              $this->json->jsonReturn(array(
                'valid'=>FALSE,
                'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Saving Slider Details !</div>'
              ));
            }
          } 
        } 
    }

    public function edit_slider_master()
    {
        $id = $this->input->post('id'); 
        $data['single_slider_data'] = $this->common_model->selectDetailsWhr('tbl_slider','slider_id',$id);
        //print_r($data);
        $this->load->view('admin/slider_master',$data);
    }

    public function delete_slider_master()
    {
        $id=$this->input->post('id');
        $data=array('display'=>'N');
        $result=$this->common_model->updateDetails('tbl_slider','slider_id',$id,$data);

        if($result)
        {
          $this->json->jsonReturn(array(
              'valid'=>TRUE,
              'msg'=>'<div class="alert modify alert-success"><strong></strong> Slider Details Remove Successfully!</div>'
          ));
        }
        else
        {
          $this->json->jsonReturn(array(
              'valid'=>FALSE,
              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Removing Slider Details !</div>'
          ));
        }
    }

    public function profile_master()
    {
        $data['profile_data'] = $this->common_model->fetchDataDESC('tbl_profile','profile_id');
        $this->load->view('admin/profile_master',$data);
    }

    public function save_profile_master()
    {
        $id = $this->input->post('id');
        $user_id=$this->session->userData("user_id");
        $profile_name = $this->input->post('profile_name');
        $profile_desc = $this->input->post('profile_desc');
        
        
        $data = array('profile_name'=>$profile_name,'profile_desc'=>$profile_desc);
        
        if(isset($id) && !empty($id) && ($id>0)) 
        {
          $data['modified_by']=$user_id;
          $result = $this->common_model->updateDetails('tbl_profile','profile_id',$id,$data);
          if($result)  
          {
            $this->json->jsonReturn(array(
              'valid'=>TRUE,
              'msg'=>'<div class="alert modify alert-success"><strong></strong>Profile Details Updated Successfully!</div>'
            ));
          }
          else
          {
            $this->json->jsonReturn(array(
              'valid'=>FALSE,
              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Updating Profile Details !</div>'
            ));
          }
        }
        else
        {       
          $data['created_by']=$user_id;
          $data['created_on']=date('Y-m-d H:i:s');  
          $result =  $this->common_model->addData('tbl_profile',$data);
          
          if($result)
          {
            $this->json->jsonReturn(array(  
              'valid'=>TRUE,
              'msg'=>'<div class="alert modify alert-success"><strong></strong> Profile Details Saved Successfully!</div>'
            ));
          }
          else
          {
            $this->json->jsonReturn(array(
              'valid'=>FALSE,
              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Saving Profile Details !</div>'
            ));
          }
        } 
    }

    public function edit_profile_master()
    {
        $id = $this->input->post('id'); 
        $data['single_profile_data'] = $this->common_model->selectDetailsWhr('tbl_profile','profile_id',$id);
        //print_r($data);
        $this->load->view('admin/profile_master',$data);
    }

    public function delete_profile_master()
    {
        $id=$this->input->post('id');
        $data=array('display'=>'N');
        $result=$this->common_model->updateDetails('tbl_profile','profile_id',$id,$data);

        if($result)
        {
          $this->json->jsonReturn(array(
              'valid'=>TRUE,
              'msg'=>'<div class="alert modify alert-success"><strong></strong> Profile Details Remove Successfully!</div>'
          ));
        }
        else
        {
          $this->json->jsonReturn(array(
              'valid'=>FALSE,
              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Removing Profile Details !</div>'
          ));
        }
    }

    public function cast_master()
    {
        $data['cast_data'] = $this->common_model->fetchDataDESC('tbl_cast','cast_id');
        $this->load->view('admin/cast_master',$data);
    }

    public function save_cast_master()
    {
        $id = $this->input->post('id');
        $user_id=$this->session->userData("user_id");
        $cast_name = $this->input->post('cast_name');
        $cast_desc = $this->input->post('cast_desc');
        
        
        $data = array('cast_name'=>$cast_name,'cast_desc'=>$cast_desc);
        
        if(isset($id) && !empty($id) && ($id>0)) 
        {
          $data['modified_by']=$user_id;
          $result = $this->common_model->updateDetails('tbl_cast','cast_id',$id,$data);
          if($result)  
          {
            $this->json->jsonReturn(array(
              'valid'=>TRUE,
              'msg'=>'<div class="alert modify alert-success"><strong></strong>Cast Details Updated Successfully!</div>'
            ));
          }
          else
          {
            $this->json->jsonReturn(array(
              'valid'=>FALSE,
              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Updating Cast Details !</div>'
            ));
          }
        }
        else
        {       
          $data['created_by']=$user_id;
          $data['created_on']=date('Y-m-d H:i:s');  
          $result =  $this->common_model->addData('tbl_cast',$data);
          
          if($result)
          {
            $this->json->jsonReturn(array(  
              'valid'=>TRUE,
              'msg'=>'<div class="alert modify alert-success"><strong></strong> Cast Details Saved Successfully!</div>'
            ));
          }
          else
          {
            $this->json->jsonReturn(array(
              'valid'=>FALSE,
              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Saving Cast Details !</div>'
            ));
          }
        } 
    }

    public function edit_cast_master()
    {
        $id = $this->input->post('id'); 
        $data['single_cast_data'] = $this->common_model->selectDetailsWhr('tbl_cast','cast_id',$id);
        //print_r($data);
        $this->load->view('admin/cast_master',$data);
    }

    public function delete_cast_master()
    {
        $id=$this->input->post('id');
        $data=array('display'=>'N');
        $result=$this->common_model->updateDetails('tbl_cast','cast_id',$id,$data);

        if($result)
        {
          $this->json->jsonReturn(array(
              'valid'=>TRUE,
              'msg'=>'<div class="alert modify alert-success"><strong></strong> Cast Details Remove Successfully!</div>'
          ));
        }
        else
        {
          $this->json->jsonReturn(array(
              'valid'=>FALSE,
              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Removing Cast Details !</div>'
          ));
        }
    }

    public function sub_cast_master()
    {
        $data['cast_data'] = $this->common_model->fetchDataDESC('tbl_cast','cast_id');
        $data['sub_cast'] = $this->common_model->alljoin2tbl('tbl_sub_cast','tbl_cast','cast_id');
        $this->load->view('admin/sub_cast_master',$data);
    }

    public function save_sub_cast_master()
    {
        $id = $this->input->post('id');
        $user_id=$this->session->userData("user_id");
        $cast_name = $this->input->post('cast_name');
        $sub_cast_name = $this->input->post('sub_cast_name');
        $sub_cast_desc = $this->input->post('sub_cast_desc');
        
        
        $data = array('cast_id'=>$cast_name,'sub_cast_name'=>$sub_cast_name,'sub_cast_desc'=>$sub_cast_desc);
        
        if(isset($id) && !empty($id) && ($id>0)) 
        {
          $data['modified_by']=$user_id;
          $result = $this->common_model->updateDetails('tbl_sub_cast','sub_cast_id',$id,$data);
          if($result)  
          {
            $this->json->jsonReturn(array(
              'valid'=>TRUE,
              'msg'=>'<div class="alert modify alert-success"><strong></strong>Sub Cast Details Updated Successfully!</div>'
            ));
          }
          else
          {
            $this->json->jsonReturn(array(
              'valid'=>FALSE,
              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Updating Sub Cast Details !</div>'
            ));
          }
        }
        else
        {       
          $data['created_by']=$user_id;
          $data['created_on']=date('Y-m-d H:i:s');  
          $result =  $this->common_model->addData('tbl_sub_cast',$data);
          
          if($result)
          {
            $this->json->jsonReturn(array(  
              'valid'=>TRUE,
              'msg'=>'<div class="alert modify alert-success"><strong></strong> Sub Cast Details Saved Successfully!</div>'
            ));
          }
          else
          {
            $this->json->jsonReturn(array(
              'valid'=>FALSE,
              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Saving Sub Cast Details !</div>'
            ));
          }
        } 
    }

    public function edit_sub_cast_master()
    {
        $id = $this->input->post('id'); 
        $data['single_sub_cast_data'] = $this->common_model->selectDetailsWhr('tbl_sub_cast','sub_cast_id',$id);
        $data['cast_data'] = $this->common_model->fetchDataASC('tbl_cast','cast_id');
        //print_r($data);
        $this->load->view('admin/sub_cast_master',$data);
    }

    public function delete_sub_cast_master()
    {
        $id=$this->input->post('id');
        $data=array('display'=>'N');
        $result=$this->common_model->updateDetails('tbl_sub_cast','sub_cast_id',$id,$data);

        if($result)
        {
          $this->json->jsonReturn(array(
              'valid'=>TRUE,
              'msg'=>'<div class="alert modify alert-success"><strong></strong> Sub Cast Details Remove Successfully!</div>'
          ));
        }
        else
        {
          $this->json->jsonReturn(array(
              'valid'=>FALSE,
              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Removing Sub Cast Details !</div>'
          ));
        }
    }

    public function rashi_master()
    {
        $data['rashi_data'] = $this->common_model->fetchDataDESC('tbl_rashi','rashi_id');
        $this->load->view('admin/rashi_master',$data);
    }

    public function save_rashi_master()
    {
        $id = $this->input->post('id');
        $user_id=$this->session->userData("user_id");
        $rashi_name = $this->input->post('rashi_name');
        $rashi_desc = $this->input->post('rashi_desc');
        
        
        $data = array('rashi_name'=>$rashi_name,'rashi_desc'=>$rashi_desc);
        
        if(isset($id) && !empty($id) && ($id>0)) 
        {
          $data['modified_by']=$user_id;
          $result = $this->common_model->updateDetails('tbl_rashi','rashi_id',$id,$data);
          if($result)  
          {
            $this->json->jsonReturn(array(
              'valid'=>TRUE,
              'msg'=>'<div class="alert modify alert-success"><strong></strong>Rashi Details Updated Successfully!</div>'
            ));
          }
          else
          {
            $this->json->jsonReturn(array(
              'valid'=>FALSE,
              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Updating Rashi Details !</div>'
            ));
          }
        }
        else
        {       
          $data['created_by']=$user_id;
          $data['created_on']=date('Y-m-d H:i:s');  
          $result =  $this->common_model->addData('tbl_rashi',$data);
          
          if($result)
          {
            $this->json->jsonReturn(array(  
              'valid'=>TRUE,
              'msg'=>'<div class="alert modify alert-success"><strong></strong> Rashi Details Saved Successfully!</div>'
            ));
          }
          else
          {
            $this->json->jsonReturn(array(
              'valid'=>FALSE,
              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Saving Rashi Details !</div>'
            ));
          }
        } 
    }

    public function edit_rashi_master()
    {
        $id = $this->input->post('id'); 
        $data['single_rashi_data'] = $this->common_model->selectDetailsWhr('tbl_rashi','rashi_id',$id);
        //print_r($data);
        $this->load->view('admin/rashi_master',$data);
    }

    public function delete_rashi_master()
    {
        $id=$this->input->post('id');
        $data=array('display'=>'N');
        $result=$this->common_model->updateDetails('tbl_rashi','rashi_id',$id,$data);

        if($result)
        {
          $this->json->jsonReturn(array(
              'valid'=>TRUE,
              'msg'=>'<div class="alert modify alert-success"><strong></strong> Rashi Details Remove Successfully!</div>'
          ));
        }
        else
        {
          $this->json->jsonReturn(array(
              'valid'=>FALSE,
              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Removing Rashi Details !</div>'
          ));
        }
    }

    public function marital_master()
    {
        $data['marital_data'] = $this->common_model->fetchDataDESC('tbl_marital','marital_id');
        $this->load->view('admin/marital_master',$data);
    }

    public function save_marital_master()
    {
        $id = $this->input->post('id');
        $user_id=$this->session->userData("user_id");
        $marital_name = $this->input->post('marital_name');
        $marital_desc = $this->input->post('marital_desc');
        
        
        $data = array('marital_name'=>$marital_name,'marital_desc'=>$marital_desc);
        
        if(isset($id) && !empty($id) && ($id>0)) 
        {
          $data['modified_by']=$user_id;
          $result = $this->common_model->updateDetails('tbl_marital','marital_id',$id,$data);
          if($result)  
          {
            $this->json->jsonReturn(array(
              'valid'=>TRUE,
              'msg'=>'<div class="alert modify alert-success"><strong></strong>Marital Details Updated Successfully!</div>'
            ));
          }
          else
          {
            $this->json->jsonReturn(array(
              'valid'=>FALSE,
              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Updating Marital Details !</div>'
            ));
          }
        }
        else
        {       
          $data['created_by']=$user_id;
          $data['created_on']=date('Y-m-d H:i:s');  
          $result =  $this->common_model->addData('tbl_marital',$data);
          
          if($result)
          {
            $this->json->jsonReturn(array(  
              'valid'=>TRUE,
              'msg'=>'<div class="alert modify alert-success"><strong></strong> Marital Details Saved Successfully!</div>'
            ));
          }
          else
          {
            $this->json->jsonReturn(array(
              'valid'=>FALSE,
              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Saving Marital Details !</div>'
            ));
          }
        } 
    }

    public function edit_marital_master()
    {
        $id = $this->input->post('id'); 
        $data['single_marital_data'] = $this->common_model->selectDetailsWhr('tbl_marital','marital_id',$id);
        //print_r($data);
        $this->load->view('admin/marital_master',$data);
    }

    public function delete_marital_master()
    {
        $id=$this->input->post('id');
        $data=array('display'=>'N');
        $result=$this->common_model->updateDetails('tbl_marital','marital_id',$id,$data);

        if($result)
        {
          $this->json->jsonReturn(array(
              'valid'=>TRUE,
              'msg'=>'<div class="alert modify alert-success"><strong></strong> Marital Details Remove Successfully!</div>'
          ));
        }
        else
        {
          $this->json->jsonReturn(array(
              'valid'=>FALSE,
              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Removing Marital Details !</div>'
          ));
        }
    }

    public function charan_master()
    {
        $data['charan_data'] = $this->common_model->fetchDataDESC('tbl_charan','charan_id');
        $this->load->view('admin/charan_master',$data);
    }

    public function save_charan_master()
    {
        $id = $this->input->post('id');
        $user_id=$this->session->userData("user_id");
        $charan_name = $this->input->post('charan_name');
        $charan_desc = $this->input->post('charan_desc');
        
        
        $data = array('charan_name'=>$charan_name,'charan_desc'=>$charan_desc);
        
        if(isset($id) && !empty($id) && ($id>0)) 
        {
          $data['modified_by']=$user_id;
          $result = $this->common_model->updateDetails('tbl_charan','charan_id',$id,$data);
          if($result)  
          {
            $this->json->jsonReturn(array(
              'valid'=>TRUE,
              'msg'=>'<div class="alert modify alert-success"><strong></strong>Charan Details Updated Successfully!</div>'
            ));
          }
          else
          {
            $this->json->jsonReturn(array(
              'valid'=>FALSE,
              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Updating Charan Details !</div>'
            ));
          }
        }
        else
        {       
          $data['created_by']=$user_id;
          $data['created_on']=date('Y-m-d H:i:s');  
          $result =  $this->common_model->addData('tbl_charan',$data);
          
          if($result)
          {
            $this->json->jsonReturn(array(  
              'valid'=>TRUE,
              'msg'=>'<div class="alert modify alert-success"><strong></strong> Charan Details Saved Successfully!</div>'
            ));
          }
          else
          {
            $this->json->jsonReturn(array(
              'valid'=>FALSE,
              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Saving Charan Details !</div>'
            ));
          }
        } 
    }

    public function edit_charan_master()
    {
        $id = $this->input->post('id'); 
        $data['single_charan_data'] = $this->common_model->selectDetailsWhr('tbl_charan','charan_id',$id);
        //print_r($data);
        $this->load->view('admin/charan_master',$data);
    }

    public function delete_charan_master()
    {
        $id=$this->input->post('id');
        $data=array('display'=>'N');
        $result=$this->common_model->updateDetails('tbl_charan','charan_id',$id,$data);

        if($result)
        {
          $this->json->jsonReturn(array(
              'valid'=>TRUE,
              'msg'=>'<div class="alert modify alert-success"><strong></strong> Charan Details Remove Successfully!</div>'
          ));
        }
        else
        {
          $this->json->jsonReturn(array(
              'valid'=>FALSE,
              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Removing Charan Details !</div>'
          ));
        }
    }

    public function nakshtra_master()
    {
        $data['nakshtra_data'] = $this->common_model->fetchDataDESC('tbl_nakshtra','nakshtra_id');
        $this->load->view('admin/nakshtra_master',$data);
    }

    public function save_nakshtra_master()
    {
        $id = $this->input->post('id');
        $user_id=$this->session->userData("user_id");
        $nakshtra_name = $this->input->post('nakshtra_name');
        $nakshtra_desc = $this->input->post('nakshtra_desc');
        
        
        $data = array('nakshtra_name'=>$nakshtra_name,'nakshtra_desc'=>$nakshtra_desc);
        
        if(isset($id) && !empty($id) && ($id>0)) 
        {
          $data['modified_by']=$user_id;
          $result = $this->common_model->updateDetails('tbl_nakshtra','nakshtra_id',$id,$data);
          if($result)  
          {
            $this->json->jsonReturn(array(
              'valid'=>TRUE,
              'msg'=>'<div class="alert modify alert-success"><strong></strong>Nakshtra Details Updated Successfully!</div>'
            ));
          }
          else
          {
            $this->json->jsonReturn(array(
              'valid'=>FALSE,
              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Updating Nakshtra Details !</div>'
            ));
          }
        }
        else
        {       
          $data['created_by']=$user_id;
          $data['created_on']=date('Y-m-d H:i:s');  
          $result =  $this->common_model->addData('tbl_nakshtra',$data);
          
          if($result)
          {
            $this->json->jsonReturn(array(  
              'valid'=>TRUE,
              'msg'=>'<div class="alert modify alert-success"><strong></strong> Nakshtra Details Saved Successfully!</div>'
            ));
          }
          else
          {
            $this->json->jsonReturn(array(
              'valid'=>FALSE,
              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Saving Nakshtra Details !</div>'
            ));
          }
        } 
    }

    public function edit_nakshtra_master()
    {
        $id = $this->input->post('id'); 
        $data['single_nakshtra_data'] = $this->common_model->selectDetailsWhr('tbl_nakshtra','nakshtra_id',$id);
        //print_r($data);
        $this->load->view('admin/nakshtra_master',$data);
    }

    public function delete_nakshtra_master()
    {
        $id=$this->input->post('id');
        $data=array('display'=>'N');
        $result=$this->common_model->updateDetails('tbl_nakshtra','nakshtra_id',$id,$data);

        if($result)
        {
          $this->json->jsonReturn(array(
              'valid'=>TRUE,
              'msg'=>'<div class="alert modify alert-success"><strong></strong> Nakshtra Details Remove Successfully!</div>'
          ));
        }
        else
        {
          $this->json->jsonReturn(array(
              'valid'=>FALSE,
              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Removing Nakshtra Details !</div>'
          ));
        }
    }

    public function gan_master()
    {
        $data['gan_data'] = $this->common_model->fetchDataDESC('tbl_gan','gan_id');
        $this->load->view('admin/gan_master',$data);
    }

    public function save_gan_master()
    {
        $id = $this->input->post('id');
        $user_id=$this->session->userData("user_id");
        $gan_name = $this->input->post('gan_name');
        $gan_desc = $this->input->post('gan_desc');
        
        
        $data = array('gan_name'=>$gan_name,'gan_desc'=>$gan_desc);
        
        if(isset($id) && !empty($id) && ($id>0)) 
        {
          $data['modified_by']=$user_id;
          $result = $this->common_model->updateDetails('tbl_gan','gan_id',$id,$data);
          if($result)  
          {
            $this->json->jsonReturn(array(
              'valid'=>TRUE,
              'msg'=>'<div class="alert modify alert-success"><strong></strong>Gan Details Updated Successfully!</div>'
            ));
          }
          else
          {
            $this->json->jsonReturn(array(
              'valid'=>FALSE,
              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Updating Gan Details !</div>'
            ));
          }
        }
        else
        {       
          $data['created_by']=$user_id;
          $data['created_on']=date('Y-m-d H:i:s');  
          $result =  $this->common_model->addData('tbl_gan',$data);
          
          if($result)
          {
            $this->json->jsonReturn(array(  
              'valid'=>TRUE,
              'msg'=>'<div class="alert modify alert-success"><strong></strong> Gan Details Saved Successfully!</div>'
            ));
          }
          else
          {
            $this->json->jsonReturn(array(
              'valid'=>FALSE,
              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Saving Gan Details !</div>'
            ));
          }
        } 
    }

    public function edit_gan_master()
    {
        $id = $this->input->post('id'); 
        $data['single_gan_data'] = $this->common_model->selectDetailsWhr('tbl_gan','gan_id',$id);
        //print_r($data);
        $this->load->view('admin/gan_master',$data);
    }

    public function delete_gan_master()
    {
        $id=$this->input->post('id');
        $data=array('display'=>'N');
        $result=$this->common_model->updateDetails('tbl_gan','gan_id',$id,$data);

        if($result)
        {
          $this->json->jsonReturn(array(
              'valid'=>TRUE,
              'msg'=>'<div class="alert modify alert-success"><strong></strong> Gan Details Remove Successfully!</div>'
          ));
        }
        else
        {
          $this->json->jsonReturn(array(
              'valid'=>FALSE,
              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Removing Gan Details !</div>'
          ));
        }
    }

    public function nadi_master()
    {
        $data['nadi_data'] = $this->common_model->fetchDataDESC('tbl_nadi','nadi_id');
        $this->load->view('admin/nadi_master',$data);
    }

    public function save_nadi_master()
    {
        $id = $this->input->post('id');
        $user_id=$this->session->userData("user_id");
        $nadi_name = $this->input->post('nadi_name');
        $nadi_desc = $this->input->post('nadi_desc');
        
        
        $data = array('nadi_name'=>$nadi_name,'nadi_desc'=>$nadi_desc);
        
        if(isset($id) && !empty($id) && ($id>0)) 
        {
          $data['modified_by']=$user_id;
          $result = $this->common_model->updateDetails('tbl_nadi','nadi_id',$id,$data);
          if($result)  
          {
            $this->json->jsonReturn(array(
              'valid'=>TRUE,
              'msg'=>'<div class="alert modify alert-success"><strong></strong>Nadi Details Updated Successfully!</div>'
            ));
          }
          else
          {
            $this->json->jsonReturn(array(
              'valid'=>FALSE,
              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Updating Nadi Details !</div>'
            ));
          }
        }
        else
        {       
          $data['created_by']=$user_id;
          $data['created_on']=date('Y-m-d H:i:s');  
          $result =  $this->common_model->addData('tbl_nadi',$data);
          
          if($result)
          {
            $this->json->jsonReturn(array(  
              'valid'=>TRUE,
              'msg'=>'<div class="alert modify alert-success"><strong></strong> Nadi Details Saved Successfully!</div>'
            ));
          }
          else
          {
            $this->json->jsonReturn(array(
              'valid'=>FALSE,
              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Saving Nadi Details !</div>'
            ));
          }
        } 
    }

    public function edit_nadi_master()
    {
        $id = $this->input->post('id'); 
        $data['single_nadi_data'] = $this->common_model->selectDetailsWhr('tbl_nadi','nadi_id',$id);
        //print_r($data);
        $this->load->view('admin/nadi_master',$data);
    }

    public function delete_nadi_master()
    {
        $id=$this->input->post('id');
        $data=array('display'=>'N');
        $result=$this->common_model->updateDetails('tbl_nadi','nadi_id',$id,$data);

        if($result)
        {
          $this->json->jsonReturn(array(
              'valid'=>TRUE,
              'msg'=>'<div class="alert modify alert-success"><strong></strong> Nadi Details Remove Successfully!</div>'
          ));
        }
        else
        {
          $this->json->jsonReturn(array(
              'valid'=>FALSE,
              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Removing Nadi Details !</div>'
          ));
        }
    }

    public function mangal_master()
    {
        $data['mangal_data'] = $this->common_model->fetchDataDESC('tbl_mangal','mangal_id');
        $this->load->view('admin/mangal_master',$data);
    }

    public function save_mangal_master()
    {
        $id = $this->input->post('id');
        $user_id=$this->session->userData("user_id");
        $mangal_name = $this->input->post('mangal_name');
        $mangal_desc = $this->input->post('mangal_desc');
        
        
        $data = array('mangal_name'=>$mangal_name,'mangal_desc'=>$mangal_desc);
        
        if(isset($id) && !empty($id) && ($id>0)) 
        {
          $data['modified_by']=$user_id;
          $result = $this->common_model->updateDetails('tbl_mangal','mangal_id',$id,$data);
          if($result)  
          {
            $this->json->jsonReturn(array(
              'valid'=>TRUE,
              'msg'=>'<div class="alert modify alert-success"><strong></strong>Mangal Details Updated Successfully!</div>'
            ));
          }
          else
          {
            $this->json->jsonReturn(array(
              'valid'=>FALSE,
              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Updating Mangal Details !</div>'
            ));
          }
        }
        else
        {       
          $data['created_by']=$user_id;
          $data['created_on']=date('Y-m-d H:i:s');  
          $result =  $this->common_model->addData('tbl_mangal',$data);
          
          if($result)
          {
            $this->json->jsonReturn(array(  
              'valid'=>TRUE,
              'msg'=>'<div class="alert modify alert-success"><strong></strong> Mangal Details Saved Successfully!</div>'
            ));
          }
          else
          {
            $this->json->jsonReturn(array(
              'valid'=>FALSE,
              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Saving Mangal Details !</div>'
            ));
          }
        } 
    }

    public function edit_mangal_master()
    {
        $id = $this->input->post('id'); 
        $data['single_mangal_data'] = $this->common_model->selectDetailsWhr('tbl_mangal','mangal_id',$id);
        //print_r($data);
        $this->load->view('admin/mangal_master',$data);
    }

    public function delete_mangal_master()
    {
        $id=$this->input->post('id');
        $data=array('display'=>'N');
        $result=$this->common_model->updateDetails('tbl_mangal','mangal_id',$id,$data);

        if($result)
        {
          $this->json->jsonReturn(array(
              'valid'=>TRUE,
              'msg'=>'<div class="alert modify alert-success"><strong></strong> Mangal Details Remove Successfully!</div>'
          ));
        }
        else
        {
          $this->json->jsonReturn(array(
              'valid'=>FALSE,
              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Removing Mangal Details !</div>'
          ));
        }
    }

    public function complexion_master()
    {
        $data['complexion_data'] = $this->common_model->fetchDataDESC('tbl_complexion','complexion_id');
        $this->load->view('admin/complexion_master',$data);
    }

    public function save_complexion_master()
    {
        $id = $this->input->post('id');
        $user_id=$this->session->userData("user_id");
        $complexion_name = $this->input->post('complexion_name');
        $complexion_desc = $this->input->post('complexion_desc');
        
        
        $data = array('complexion_name'=>$complexion_name,'complexion_desc'=>$complexion_desc);
        
        if(isset($id) && !empty($id) && ($id>0)) 
        {
          $data['modified_by']=$user_id;
          $result = $this->common_model->updateDetails('tbl_complexion','complexion_id',$id,$data);
          if($result)  
          {
            $this->json->jsonReturn(array(
              'valid'=>TRUE,
              'msg'=>'<div class="alert modify alert-success"><strong></strong>Mangal Details Updated Successfully!</div>'
            ));
          }
          else
          {
            $this->json->jsonReturn(array(
              'valid'=>FALSE,
              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Updating Mangal Details !</div>'
            ));
          }
        }
        else
        {       
          $data['created_by']=$user_id;
          $data['created_on']=date('Y-m-d H:i:s');  
          $result =  $this->common_model->addData('tbl_complexion',$data);
          
          if($result)
          {
            $this->json->jsonReturn(array(  
              'valid'=>TRUE,
              'msg'=>'<div class="alert modify alert-success"><strong></strong> Complexion Details Saved Successfully!</div>'
            ));
          }
          else
          {
            $this->json->jsonReturn(array(
              'valid'=>FALSE,
              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Saving Complexion Details !</div>'
            ));
          }
        } 
    }

    public function edit_complexion_master()
    {
        $id = $this->input->post('id'); 
        $data['single_complexion_data'] = $this->common_model->selectDetailsWhr('tbl_complexion','complexion_id',$id);
        //print_r($data);
        $this->load->view('admin/complexion_master',$data);
    }

    public function delete_complexion_master()
    {
        $id=$this->input->post('id');
        $data=array('display'=>'N');
        $result=$this->common_model->updateDetails('tbl_complexion','complexion_id',$id,$data);

        if($result)
        {
          $this->json->jsonReturn(array(
              'valid'=>TRUE,
              'msg'=>'<div class="alert modify alert-success"><strong></strong> Complexion Details Remove Successfully!</div>'
          ));
        }
        else
        {
          $this->json->jsonReturn(array(
              'valid'=>FALSE,
              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Removing Complexion Details !</div>'
          ));
        }
    }

    public function education_master()
    {
        $data['education_data'] = $this->common_model->fetchDataDESC('tbl_education','education_id');
        $this->load->view('admin/education_master',$data);
    }

    public function save_education_master()
    {
        $id = $this->input->post('id');
        $user_id=$this->session->userData("user_id");
        $education_name = $this->input->post('education_name');
        $education_desc = $this->input->post('education_desc');
        
        
        $data = array('education_name'=>$education_name,'education_desc'=>$education_desc);
        
        if(isset($id) && !empty($id) && ($id>0)) 
        {
          $data['modified_by']=$user_id;
          $result = $this->common_model->updateDetails('tbl_education','education_id',$id,$data);
          if($result)  
          {
            $this->json->jsonReturn(array(
              'valid'=>TRUE,
              'msg'=>'<div class="alert modify alert-success"><strong></strong>Education Details Updated Successfully!</div>'
            ));
          }
          else
          {
            $this->json->jsonReturn(array(
              'valid'=>FALSE,
              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Updating Education Details !</div>'
            ));
          }
        }
        else
        {       
          $data['created_by']=$user_id;
          $data['created_on']=date('Y-m-d H:i:s');  
          $result =  $this->common_model->addData('tbl_education',$data);
          
          if($result)
          {
            $this->json->jsonReturn(array(  
              'valid'=>TRUE,
              'msg'=>'<div class="alert modify alert-success"><strong></strong> Education Details Saved Successfully!</div>'
            ));
          }
          else
          {
            $this->json->jsonReturn(array(
              'valid'=>FALSE,
              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Saving Education Details !</div>'
            ));
          }
        } 
    }

    public function edit_education_master()
    {
        $id = $this->input->post('id'); 
        $data['single_education_data'] = $this->common_model->selectDetailsWhr('tbl_education','education_id',$id);
        //print_r($data);
        $this->load->view('admin/education_master',$data);
    }

    public function delete_education_master()
    {
        $id=$this->input->post('id');
        $data=array('display'=>'N');
        $result=$this->common_model->updateDetails('tbl_education','education_id',$id,$data);

        if($result)
        {
          $this->json->jsonReturn(array(
              'valid'=>TRUE,
              'msg'=>'<div class="alert modify alert-success"><strong></strong> Education Details Remove Successfully!</div>'
          ));
        }
        else
        {
          $this->json->jsonReturn(array(
              'valid'=>FALSE,
              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Removing Education Details !</div>'
          ));
        }
    }

    public function community_master()
    {
        $data['community_data'] = $this->common_model->fetchDataDESC('tbl_community','community_id');
        $this->load->view('admin/community_master',$data);
    }

    public function save_community_master()
    {
        $id = $this->input->post('id');
        $user_id=$this->session->userData("user_id");
        $community_name = $this->input->post('community_name');
        $community_desc = $this->input->post('community_desc');
        
        
        $data = array('community_name'=>$community_name,'community_desc'=>$community_desc);
        
        if(isset($id) && !empty($id) && ($id>0)) 
        {
          $data['modified_by']=$user_id;
          $result = $this->common_model->updateDetails('tbl_community','community_id',$id,$data);
          if($result)  
          {
            $this->json->jsonReturn(array(
              'valid'=>TRUE,
              'msg'=>'<div class="alert modify alert-success"><strong></strong>Community Details Updated Successfully!</div>'
            ));
          }
          else
          {
            $this->json->jsonReturn(array(
              'valid'=>FALSE,
              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Updating Community Details !</div>'
            ));
          }
        }
        else
        {       
          $data['created_by']=$user_id;
          $data['created_on']=date('Y-m-d H:i:s');  
          $result =  $this->common_model->addData('tbl_community',$data);
          
          if($result)
          {
            $this->json->jsonReturn(array(  
              'valid'=>TRUE,
              'msg'=>'<div class="alert modify alert-success"><strong></strong> Community Details Saved Successfully!</div>'
            ));
          }
          else
          {
            $this->json->jsonReturn(array(
              'valid'=>FALSE,
              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Saving Community Details !</div>'
            ));
          }
        } 
    }

    public function edit_community_master()
    {
        $id = $this->input->post('id'); 
        $data['single_community_data'] = $this->common_model->selectDetailsWhr('tbl_community','community_id',$id);
        //print_r($data);
        $this->load->view('admin/community_master',$data);
    }

    public function delete_community_master()
    {
        $id=$this->input->post('id');
        $data=array('display'=>'N');
        $result=$this->common_model->updateDetails('tbl_community','community_id',$id,$data);

        if($result)
        {
          $this->json->jsonReturn(array(
              'valid'=>TRUE,
              'msg'=>'<div class="alert modify alert-success"><strong></strong> Community Details Remove Successfully!</div>'
          ));
        }
        else
        {
          $this->json->jsonReturn(array(
              'valid'=>FALSE,
              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Removing Community Details !</div>'
          ));
        }
    }


    public function save_profile_details1() 
    {
        $id = $this->input->post('id');
        $stepNum = $this->input->post('step');
        $f_name=$this->input->post('f_name');
        $m_name=$this->input->post('m_name');
        $l_name=$this->input->post('l_name');
        $email=$this->input->post('email');
        $mobile=$this->input->post('mobile');
        $dob=$this->input->post('dob');
        $marital_status=$this->input->post('marital_status1');
        $no_of_childs=$this->input->post('no_of_childs');
        $community=$this->input->post('community');
        $caste=$this->input->post('caste1');
        $sub_caste=$this->input->post('sub_caste1');
        $height=$this->input->post('height1');
        $weight=$this->input->post('weight1');
        $blood_group=$this->input->post('blood_group1');
        $complexion=$this->input->post('complexion1');
        $physical_disability=$this->input->post('physical_disability1');
        $lens=$this->input->post('lens1');
        //step 2
        $rashi=$this->input->post('rashi1');
        $nakshtra=$this->input->post('nakshtra1');
        $charan=$this->input->post('charan1');
        $gan=$this->input->post('gan1');
        $nadi=$this->input->post('nadi1');
        $mangal=$this->input->post('mangal1');
        $birth_place=$this->input->post('birth_place1');
        $birth_time=$this->input->post('birth_time1');
        $gotra=$this->input->post('gotra1');
        //step 3
        $education=$this->input->post('education1');
        $occupation_city=$this->input->post('occupation_city1');
        $education_specification=$this->input->post('education_specification1');
        $occupation=$this->input->post('occupation1');
        $income=$this->input->post('income1');
        //step 4
        $document_no=$this->input->post('document_no1');
        $phone=$this->input->post('phone1');
        $phone1=$this->input->post('phone11');
        $permanant_address=$this->input->post('permanant_address1');
        $residence_address=$this->input->post('residence_address1');
        //step 5
        $father=$this->input->post('father1');
        $father_full_name=$this->input->post('father_full_name1');
        $mother=$this->input->post('mother1');
        $parent_residence_city=$this->input->post('parent_residence_city1');
        $brothers=$this->input->post('brothers1');
        $married_brothers=$this->input->post('married_brothers1');
        $sisters=$this->input->post('sisters1');
        $married_sisters=$this->input->post('married_sisters1');
        $relative_surname=$this->input->post('relative_surname1');
        $parent_occupation=$this->input->post('parent_occupation1');
        $mama_surname=$this->input->post('mama_surname1');
        $native_city=$this->input->post('native_city1');
        $native_district=$this->input->post('native_district1');
        $family_wealth=$this->input->post('family_wealth1');
        $any_intercast_marriage=$this->input->post('any_intercast_marriage1');
        $relation_cast=$this->input->post('relation_cast1');
        //step 6
        $expected_mangal=$this->input->post('expected_mangal1');
        $expected_cast=$this->input->post('expected_cast1');
        $preffered_city=$this->input->post('preffered_city1');
        $age_difference=$this->input->post('age_difference1');
        $expected_height=$this->input->post('expected_height1');
        $divorcee=$this->input->post('divorcee1');
        $expected_education=$this->input->post('expected_education1');
        $expected_income_per_annum=$this->input->post('expected_income_per_annum1');

        if(isset($preffered_city) && !empty($preffered_city))
        {
            $preffered_city=implode(",",$preffered_city);
        }

        if(isset($expected_education) && !empty($expected_education))
        {
            $expected_education=implode(",",$expected_education);
        }


        $customer_photo='';
        $error='';
        if(isset($_FILES['customer_photo']['name']))//Code for to take image from form and check isset
        {
          $customer_photo=$_FILES['customer_photo']['name']; //here [] name attribute
          $customer_photo_Img = array('upload_path' =>'./uploads/customer_photo/',
                 'fieldname' => 'customer_photo',
                 'encrypt_name' => TRUE,        
                 'overwrite' => FALSE,
                 'allowed_types' => 'png|PNG|jpg|JPG|jpeg|JPEG' );
          $customer_photo_img = $this->imageupload->image_upload($customer_photo_Img);
          $error= $this->upload->display_errors();
          if(isset($customer_photo_img) && !empty($customer_photo_img))
          {
            $empData = $this->upload->data(); 
            $customer_photo = $empData['file_name'];
          }
        }
        else
        {
          $customer_photo=$this->input->post('hidden_customer_photo');
        }
        $customer_photo1='';
        $error1='';
        if(isset($_FILES['customer_photo1']['name']))//Code for to take image from form and check isset
        {
          $customer_photo1=$_FILES['customer_photo1']['name']; //here [] name attribute
          $customer_photo_Img1 = array('upload_path' =>'./uploads/customer_photo/',
                 'fieldname' => 'customer_photo1',
                 'encrypt_name' => TRUE,        
                 'overwrite' => FALSE,
                 'allowed_types' => 'png|PNG|jpg|JPG|jpeg|JPEG' );
          $customer_photo_img1 = $this->imageupload->image_upload($customer_photo_Img1);
          $error1= $this->upload->display_errors();
          if(isset($customer_photo_img1) && !empty($customer_photo_img1))
          {
            $empData1 = $this->upload->data(); 
            $customer_photo1 = $empData1['file_name'];
          }
        }
        else
        {
          $customer_photo1=$this->input->post('hidden_customer_photo1');
        }

        $biodata='';
        $error2='';
        if(isset($_FILES['biodata']['name']))//Code for to take image from form and check isset
        {
          $biodata=$_FILES['biodata']['name']; //here [] name attribute
          $biodata1 = array('upload_path' =>'./uploads/biodata/',
                 'fieldname' => 'biodata',
                 'encrypt_name' => TRUE,        
                 'overwrite' => FALSE,
                 'allowed_types' => '*' );
          $biodata1 = $this->imageupload->image_upload($biodata1);
          $error2= $this->upload->display_errors();
          if(isset($biodata1) && !empty($biodata1))
          {
            $empData2 = $this->upload->data(); 
            $biodata = $empData2['file_name'];
          }
        }
        else
        {
          $biodata=$this->input->post('hidden_biodata');
        }
        $cur_date=date('Y-m-d H:i:s');

        if(isset($dob) && !empty($dob)) {$dob1=date('Y-m-d H:i:s',strtotime($dob)); } else {$dob1='0000-00-00'; }
         $data = array('f_name'=>$f_name,'m_name'=>$m_name,'l_name'=>$l_name,'email'=>$email,'mobile'=>$mobile,'dob'=>$dob1,'marital_status'=>$marital_status,'no_of_childs'=>$no_of_childs,'community'=>$community,'caste'=>$caste,'sub_caste'=>$sub_caste,'height'=>$height,'weight'=>$weight,'blood_group'=>$blood_group,'complexion'=>$complexion,'physical_disability'=>$physical_disability,'lens'=>$lens,'rashi'=>$rashi,'nakshtra'=>$nakshtra,'charan'=>$charan,'gan'=>$gan,'nadi'=>$nadi,'mangal'=>$mangal,'birth_place'=>$birth_place,'birth_time'=>$birth_time,'gotra'=>$gotra,'education'=>$education,'occupation_city'=>$occupation_city,'education_specification'=>$education_specification,'occupation'=>$occupation,'income'=>$income,'document_no'=>$document_no,'phone'=>$phone,'phone1'=>$phone1,'permanant_address'=>$permanant_address,'residence_address'=>$residence_address,'father'=>$father,'father_full_name'=>$father_full_name,'mother'=>$mother,'parent_residence_city'=>$parent_residence_city,'brothers'=>$brothers,'married_brothers'=>$married_brothers,'sisters'=>$sisters,'married_sisters'=>$married_sisters,'relative_surname'=>$relative_surname,'mama_surname'=>$mama_surname,'parent_occupation'=>$parent_occupation,'native_city'=>$native_city,'native_district'=>$native_district,'family_wealth'=>$family_wealth,'any_intercast_marriage'=>$any_intercast_marriage,'relation_cast'=>$relation_cast,'expected_mangal'=>$expected_mangal,'expected_cast'=>$expected_cast,'preffered_city'=>$preffered_city,'age_difference'=>$age_difference,'expected_height'=>$expected_height,'divorcee'=>$divorcee,'expected_education'=>$expected_education,'expected_income_per_annum'=>$expected_income_per_annum,'customer_photo'=>$customer_photo,'customer_photo1'=>$customer_photo1,'biodata'=>$biodata,'form_status'=>$stepNum,'created_by'=>$id);

        $cust_data=$this->common_model->selectDetailsWhr('tbl_customer','customer_id',$id);
       // print_r($data);
        if(isset($stepNum) && !empty($stepNum))
        {
            if(isset($id) && !empty($id) && ($id>0))
            {
                if($stepNum==1)
                {
                    if(isset($cust_data) && !empty($cust_data) && $cust_data->form_status < 2)
                    {
                        $data['form_status'] = '1';
                    }
                    $result = $this->common_model->updateDetails('tbl_customer','customer_id',$id,$data);
                }
                if($stepNum==2)
                {   
                    
                    if(isset($cust_data) && !empty($cust_data) && $cust_data->form_status < 3)
                    {
                        $data['form_status'] = '2';
                    }
                    $result = $this->common_model->updateDetails('tbl_customer','customer_id',$id,$data);
                }
                if($stepNum==3)
                {
                    if(isset($cust_data) && !empty($cust_data) && $cust_data->form_status < 4)
                    {
                        $data['form_status'] = '3';
                    }
                    $result = $this->common_model->updateDetails('tbl_customer','customer_id',$id,$data);   
                }
                
                if($stepNum==4)
                {
                    if(isset($cust_data) && !empty($cust_data) && $cust_data->form_status < 5)
                    {
                        $data['form_status'] = '4';
                    }
                    $result = $this->common_model->updateDetails('tbl_customer','customer_id',$id,$data);
                }
                if($stepNum==5)
                {
                    
                    if(isset($cust_data) && !empty($cust_data) && $cust_data->form_status < 6)
                    {
                        $data['form_status'] = '5';
                    }
                    $result = $this->common_model->updateDetails('tbl_customer','customer_id',$id,$data);
                }
                if($stepNum==6)
                {
                    $data['form_status'] = '6';
                    $result = $this->common_model->updateDetails('tbl_customer','customer_id',$id,$data);
                    if($result)  
                    {
                        $this->json->jsonReturn(array(
                            'valid'=>TRUE,
                            'msg'=>'<div class="alert modify alert-success"><strong>Well Done!</strong> Profile Data Completed successfully!</div>'
                        ));
                    }
                    else
                    {
                        $this->json->jsonReturn(array(
                            'valid'=>FALSE,
                            'msg'=>'<div class="alert modify alert-error"><strong>Error!</strong> While saving Profile Data. Please try again!</div>'                   
                        ));
                    }
                }
                else
                {
                    if($result)  
                    {
                        $this->json->jsonReturn(array(
                            'valid'=>TRUE,
                            'id'=>$id
                        ));
                    }
                    else
                    {
                        $this->json->jsonReturn(array(
                            'valid'=>FALSE                  
                        ));
                    }
                }               
            }
            else
            {
                $this->json->jsonReturn(array(
                    'valid'=>FALSE,
                    'msg'=>'<div class="alert modify alert-error"><strong>Error!</strong> Not a valid User!</div>'                   
                ));
            }   
        }
        else
        {
            $this->json->jsonReturn(array(
                    'valid'=>FALSE,
                    'msg'=>'<div class="alert modify alert-error"><strong>Error!</strong> Not a valid User!</div>'                   
                ));
        }
    }

    public function success_story()
    {
        $data['success_story_data'] = $this->common_model->fetchDataDESC('tbl_success_story','success_story_id');
        $this->load->view('admin/success_story',$data);
    }

    public function save_success_story()
    {
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $comment = $this->input->post('comment');
        
        $date=$this->input->post('date');
        $user_id=$this->session->userData("user_id");
        $logo='';
        $error='';
        if(isset($_FILES['success_story_photo']['name']))//Code for to take image from form and check isset
        {
          $logo=$_FILES['success_story_photo']['name']; //here [] name attribute
          $logoImg = array('upload_path' =>'./uploads/success_story/',
                   'fieldname' => 'success_story_photo',
                     'encrypt_name' => TRUE,        
                     'overwrite' => FALSE,
                   'allowed_types' => 'png|PNG|jpg|JPG|jpeg|JPEG' );
          $logo_img = $this->imageupload->image_upload($logoImg);
          $error= $this->upload->display_errors();
          if(isset($logo_img) && !empty($logo_img))
          {
            $logoData = $this->upload->data();      
            $logo = $logoData['file_name'];
          }
        }
        else
        {
          $logo=$this->input->post('hidden_success_story_photo');
        }
        if(isset($date) && !empty($date)) {$date1=date('Y-m-d',strtotime($date)); } else {$date1='0000-00-00'; }
        $data = array('name'=>$name,'photo'=>$logo,'comment'=>$comment,'date'=>$date1);
        if($error)
        {
          $this->json->jsonReturn(array(
            'valid'=>FALSE,
            'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> File type is not allowed !</div>'
          ));
        }
        else
        {
          if(isset($id) && !empty($id) && ($id>0)) 
          {
            $data['modified_by']=$user_id;
            $result = $this->common_model->updateDetails('tbl_success_story','success_story_id',$id,$data);
            if($result)  
            {
              $this->json->jsonReturn(array(
                'valid'=>TRUE,
                'msg'=>'<div class="alert modify alert-success"><strong></strong>Success Story Details Updated Successfully!</div>'
              ));
            }
            else
            {
              $this->json->jsonReturn(array(
                'valid'=>FALSE,
                'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Updating Success Story Details !</div>'
              ));
            }
          }
          else
          {       
            $data['created_by']=$user_id;
            $data['created_on']=date('Y-m-d H:i:s');  
            $result =  $this->common_model->addData('tbl_success_story',$data);
            
            if($result)
            {
              $this->json->jsonReturn(array(  
                'valid'=>TRUE,
                'msg'=>'<div class="alert modify alert-success"><strong></strong> Success Story Details Saved Successfully!</div>'
              ));
            }
            else
            {
              $this->json->jsonReturn(array(
                'valid'=>FALSE,
                'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Saving Success Story Details !</div>'
              ));
            }
          } 
        } 
    }

    public function edit_success_story()
    {
        $id = $this->input->post('id'); 
        $data['single_success_story_data'] = $this->common_model->selectDetailsWhr('tbl_success_story','success_story_id',$id);
        //print_r($data);
        $this->load->view('admin/success_story',$data);
    }

    public function delete_success_story()
    {
        $id=$this->input->post('id');
        $data=array('display'=>'N');
        $result=$this->common_model->updateDetails('tbl_success_story','success_story_id',$id,$data);

        if($result)
        {
          $this->json->jsonReturn(array(
              'valid'=>TRUE,
              'msg'=>'<div class="alert modify alert-success"><strong></strong> Success Story Details Remove Successfully!</div>'
          ));
        }
        else
        {
          $this->json->jsonReturn(array(
              'valid'=>FALSE,
              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Removing Success Story Details !</div>'
          ));
        }
    }

    public function inspiral_couple()
    {
        $data['inspiral_data'] = $this->common_model->fetchDataDESC('tbl_inspiral','inspiral_id');
        $this->load->view('admin/inspiral_couple',$data);
    }

    public function save_inspiral_couple()
    {
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        
        $date=$this->input->post('date');
        $user_id=$this->session->userData("user_id");
        $logo='';
        $error='';
        if(isset($_FILES['inspiral_photo']['name']))//Code for to take image from form and check isset
        {
          $logo=$_FILES['inspiral_photo']['name']; //here [] name attribute
          $logoImg = array('upload_path' =>'./uploads/inspiral/',
                   'fieldname' => 'inspiral_photo',
                     'encrypt_name' => TRUE,        
                     'overwrite' => FALSE,
                   'allowed_types' => 'png|PNG|jpg|JPG|jpeg|JPEG' );
          $logo_img = $this->imageupload->image_upload($logoImg);
          $error= $this->upload->display_errors();
          if(isset($logo_img) && !empty($logo_img))
          {
            $logoData = $this->upload->data();      
            $logo = $logoData['file_name'];
          }
        }
        else
        {
          $logo=$this->input->post('hidden_inspiral_photo');
        }
        if(isset($date) && !empty($date)) {$date1=date('Y-m-d',strtotime($date)); } else {$date1='0000-00-00'; }
        $data = array('name'=>$name,'photo'=>$logo,'date'=>$date1);
        if($error)
        {
          $this->json->jsonReturn(array(
            'valid'=>FALSE,
            'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> File type is not allowed !</div>'
          ));
        }
        else
        {
          if(isset($id) && !empty($id) && ($id>0)) 
          {
            $data['modified_by']=$user_id;
            $result = $this->common_model->updateDetails('tbl_inspiral','inspiral_id',$id,$data);
            if($result)  
            {
              $this->json->jsonReturn(array(
                'valid'=>TRUE,
                'msg'=>'<div class="alert modify alert-success"><strong></strong>Success Inspiral Details Updated Successfully!</div>'
              ));
            }
            else
            {
              $this->json->jsonReturn(array(
                'valid'=>FALSE,
                'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Updating Success Inspiral Details !</div>'
              ));
            }
          }
          else
          {       
            $data['created_by']=$user_id;
            $data['created_on']=date('Y-m-d H:i:s');  
            $result =  $this->common_model->addData('tbl_inspiral',$data);
            
            if($result)
            {
              $this->json->jsonReturn(array(  
                'valid'=>TRUE,
                'msg'=>'<div class="alert modify alert-success"><strong></strong> Success Inspiral Details Saved Successfully!</div>'
              ));
            }
            else
            {
              $this->json->jsonReturn(array(
                'valid'=>FALSE,
                'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Saving Success Inspiral Details !</div>'
              ));
            }
          } 
        } 
    }

    public function edit_inspiral_couple()
    {
        $id = $this->input->post('id'); 
        $data['single_inspiral_data'] = $this->common_model->selectDetailsWhr('tbl_inspiral','inspiral_id',$id);
        //print_r($data);
        $this->load->view('admin/inspiral_couple',$data);
    }

    public function delete_inspiral_couple()
    {
        $id=$this->input->post('id');
        $data=array('display'=>'N');
        $result=$this->common_model->updateDetails('tbl_inspiral','inspiral_id',$id,$data);

        if($result)
        {
          $this->json->jsonReturn(array(
              'valid'=>TRUE,
              'msg'=>'<div class="alert modify alert-success"><strong></strong> Success Inspiral Details Remove Successfully!</div>'
          ));
        }
        else
        {
          $this->json->jsonReturn(array(
              'valid'=>FALSE,
              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Removing Success Inspiral Details !</div>'
          ));
        }
    }

    public function contact()
    {
        $data['contact_data'] = $this->common_model->fetchDataDESC('tbl_contact','contact_id');
        $this->load->view('admin/contact',$data);
    }
    public function delete_contact()
    {
        $id=$this->input->post('id');
        $data=array('display'=>'N');
        $result=$this->common_model->updateDetails('tbl_contact','contact_id',$id,$data);

        if($result)
        {
          $this->json->jsonReturn(array(
              'valid'=>TRUE,
              'msg'=>'<div class="alert modify alert-success"><strong></strong> Contact Details Remove Successfully!</div>'
          ));
        }
        else
        {
          $this->json->jsonReturn(array(
              'valid'=>FALSE,
              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Removing Contact Details !</div>'
          ));
        }
    }
    public function subscribe()
    {
        $data['subscribe_data'] = $this->common_model->fetchDataDESC('tbl_subscribe','subscribe_id');
        $this->load->view('admin/subscribe',$data);
    }
    public function delete_subscribe()
    {
        $id=$this->input->post('id');
        $data=array('display'=>'N');
        $result=$this->common_model->updateDetails('tbl_subscribe','subscribe_id',$id,$data);

        if($result)
        {
          $this->json->jsonReturn(array(
              'valid'=>TRUE,
              'msg'=>'<div class="alert modify alert-success"><strong></strong> subscribe Details Remove Successfully!</div>'
          ));
        }
        else
        {
          $this->json->jsonReturn(array(
              'valid'=>FALSE,
              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Removing subscribe Details !</div>'
          ));
        }
    }

    public function user_details()
    {
        $user_id = $this->session->userData("user_id");
        $data['user_role'] = $this->session->userData("user_role");

        if ($data['user_role'] == 7) {

          $data['active_customer_data'] = $this->admin_model->active_fetch_customer_by_sub_admin($user_id);
          $data['block_customer_data'] = $this->admin_model->block_fetch_customer_by_sub_admin($user_id);
          
        } else {

          $data['active_customer_data'] = $this->admin_model->active_fetch_customer();
          $data['block_customer_data'] = $this->admin_model->block_fetch_customer();

        }
        $this->load->view('admin/user_details',$data);
    }
    public function view_user_details()
    {
        $cust_id=$this->uri->segment(2);
        $data['customer_details_data'] = $this->admin_model->fetch_customer_details($cust_id);
        $this->load->view('admin/view_user_details',$data);
    }

    public function update_user_details()
    {
        $customer_id = $this->uri->segment(2);
        $data['customer_data'] = $this->common_model->selectDetailsWhr('tbl_customer','customer_id',$customer_id);
        $data['profile_for'] = $this->common_model->fetchDataDESC('tbl_profile','profile_id');
        $data['community_for'] = $this->common_model->fetchDataDESC('tbl_community','community_id');
        $data['marital_status_data'] = $this->common_model->fetchDataDESC('tbl_marital','marital_id');
        $data['cast_data'] = $this->common_model->fetchDataDESC('tbl_cast','cast_id');
        $data['sub_cast_data'] = $this->common_model->fetchDataDESC('tbl_sub_cast','sub_cast_id');
        $data['complexion_data'] = $this->common_model->fetchDataDESC('tbl_complexion','complexion_id');
        $data['rashi_data'] = $this->common_model->fetchDataDESC('tbl_rashi','rashi_id');
        $data['nakshtra_data'] = $this->common_model->fetchDataDESC('tbl_nakshtra','nakshtra_id');
        $data['charan_data'] = $this->common_model->fetchDataDESC('tbl_charan','charan_id');
        $data['gan_data'] = $this->common_model->fetchDataDESC('tbl_gan','gan_id');
        $data['nadi_data'] = $this->common_model->fetchDataDESC('tbl_nadi','nadi_id');
        $data['mangal_data'] = $this->common_model->fetchDataDESC('tbl_mangal','mangal_id');
        $data['education_data'] = $this->common_model->fetchDataDESC('tbl_education','education_id');
        $data['city_data'] = $this->common_model->fetchDataDESC('tbl_city','city_id');
        $data['district_data'] = $this->common_model->fetchDataDESC('tbl_city','city_id');

        //$data['mode_data'] = $this->common_model->fetchDataASC('tbl_pay_mode','payment_id');

        $this->load->view('admin/update_user_details',$data);
    }

    public function term_condition()
    {
        $data['term_condition_data'] = $this->common_model->selectDetailsWhr('tbl_terms_condition','term_condition_id','1');
        $this->load->view('admin/term_condition',$data);
    }
    
    public function save_term_condition()
    {
        $id = $this->input->post('id');
        $user_id=$this->session->userData("user_id");
        $term_condition_desc = $this->input->post('term_condition_desc');
        
        
        $data = array('term_condition_desc'=>$term_condition_desc);
        
        if(isset($id) && !empty($id) && ($id>0)) 
        {
          $data['modified_by']=$user_id;
          $result = $this->common_model->updateDetails('tbl_terms_condition','term_condition_id',$id,$data);
          if($result)  
          {
            $this->json->jsonReturn(array(
              'valid'=>TRUE,
              'msg'=>'<div class="alert modify alert-success"><strong></strong>Terms & Condition Details Updated Successfully!</div>'
            ));
          }
          else
          {
            $this->json->jsonReturn(array(
              'valid'=>FALSE,
              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Updating Terms & Condition Details !</div>'
            ));
          }
        }
        else
        {       
          $data['created_by']=$user_id;
          $data['created_on']=date('Y-m-d H:i:s');  
          $result =  $this->common_model->addData('tbl_terms_condition',$data);
          
          if($result)
          {
            $this->json->jsonReturn(array(  
              'valid'=>TRUE,
              'msg'=>'<div class="alert modify alert-success"><strong></strong> Terms & Condition Details Saved Successfully!</div>'
            ));
          }
          else
          {
            $this->json->jsonReturn(array(
              'valid'=>FALSE,
              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Saving Terms & Condition Details !</div>'
            ));
          }
        } 
    }

    public function privacy()
    {
        $data['privacy_data'] = $this->common_model->selectDetailsWhr('tbl_privacy','privacy_id','1');
        $this->load->view('admin/privacy',$data);
    }

    public function save_privacy()
    {
        $id = $this->input->post('id');
        $user_id=$this->session->userData("user_id");
        $privacy_desc = $this->input->post('privacy_desc');
        
        
        $data = array('privacy_desc'=>$privacy_desc);
        
        if(isset($id) && !empty($id) && ($id>0)) 
        {
          $data['modified_by']=$user_id;
          $result = $this->common_model->updateDetails('tbl_privacy','privacy_id',$id,$data);
          if($result)  
          {
            $this->json->jsonReturn(array(
              'valid'=>TRUE,
              'msg'=>'<div class="alert modify alert-success"><strong></strong>Privacy Details Updated Successfully!</div>'
            ));
          }
          else
          {
            $this->json->jsonReturn(array(
              'valid'=>FALSE,
              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Updating Privacy Details !</div>'
            ));
          }
        }
        else
        {       
          $data['created_by']=$user_id;
          $data['created_on']=date('Y-m-d H:i:s');  
          $result =  $this->common_model->addData('tbl_privacy',$data);
          
          if($result)
          {
            $this->json->jsonReturn(array(  
              'valid'=>TRUE,
              'msg'=>'<div class="alert modify alert-success"><strong></strong> Privacy Details Saved Successfully!</div>'
            ));
          }
          else
          {
            $this->json->jsonReturn(array(
              'valid'=>FALSE,
              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Saving Privacy Details !</div>'
            ));
          }
        } 
    }
    public function membership()
    {
        $data['membership_data'] = $this->common_model->fetchDataDESC('tbl_membership','membership_id');
        $this->load->view('admin/membership',$data);
    }

    public function save_membership()
    {
        $id = $this->input->post('id');
        $user_id=$this->session->userData("user_id");
        $name = $this->input->post('name');
        $desc = $this->input->post('desc');
        $amount=$this->input->post('amount');
        $gst=$this->input->post('gst');
        $final_amount=$this->input->post('final_amount');
        $validity=$this->input->post('validity');
        
        $data = array('membership_plan_name'=>$name,'membership_description'=>$desc,'membership_amount'=>$amount,'gst'=>$gst,'total_amount'=>$final_amount,'membership_validity'=>$validity);
        
        if(isset($id) && !empty($id) && ($id>0)) 
        {
          $data['modified_by']=$user_id;
          $result = $this->common_model->updateDetails('tbl_membership','membership_id',$id,$data);
          if($result)  
          {
            $this->json->jsonReturn(array(
              'valid'=>TRUE,
              'msg'=>'<div class="alert modify alert-success"><strong></strong> Membership Details Updated Successfully!</div>'
            ));
          }
          else
          {
            $this->json->jsonReturn(array(
              'valid'=>FALSE,
              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Updating Membership Details !</div>'
            ));
          }
        }
        else
        {       
          $data['created_by']=$user_id;
          $data['created_on']=date('Y-m-d H:i:s');  
          $result =  $this->common_model->addData('tbl_membership',$data);
          
          if($result)
          {
            $this->json->jsonReturn(array(  
              'valid'=>TRUE,
              'msg'=>'<div class="alert modify alert-success"><strong></strong> Membership Details Saved Successfully!</div>'
            ));
          }
          else
          {
            $this->json->jsonReturn(array(
              'valid'=>FALSE,
              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Saving Membership Details !</div>'
            ));
          }
        } 
    }

    public function edit_membership()
    {
        $id = $this->input->post('id'); 
        $data['single_membership_data'] = $this->common_model->selectDetailsWhr('tbl_membership','membership_id',$id);
        $this->load->view('admin/membership',$data);
    }

    public function delete_membership()
    {
        $id=$this->input->post('id');
        $data=array('display'=>'N');
        $result=$this->common_model->updateDetails('tbl_membership','membership_id',$id,$data);

        if($result)
        {
          $this->json->jsonReturn(array(
              'valid'=>TRUE,
              'msg'=>'<div class="alert modify alert-success"><strong></strong> Membership Details Remove Successfully!</div>'
          ));
        }
        else
        {
          $this->json->jsonReturn(array(
              'valid'=>FALSE,
              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Removing Membership Details !</div>'
          ));
        }
    }

    public function calling_details()
    {
        $data['calling_data'] = $this->common_model->fetchDataDESC('tbl_calling_details','calling_id');
        $this->load->view('admin/calling',$data);
    }

    public function calling_send_sms()
    {
        $id=$this->input->post('id');

        $result = $this->common_model->selectAllWhr('tbl_calling_details','calling_id',$id);

        $full_name = $result[0]->full_name;
        $mobile_no = $result[0]->mobile_no;

        $mobile = substr($mobile_no, 3);

        $message='Hi '.$full_name.', SHIVBANDHAN – huge profile of Brides and Grooms, privacy and secure verified data, high success ratio- Register on www.shivbandhan.com or Download apps Now- https://bit.ly/2BHSHXs';
        
        sendSms($mobile, $message);

        if($result)
        {
          $this->json->jsonReturn(array(
              'valid'=>TRUE,
              'msg'=>'<div class="alert modify alert-success"><strong></strong> App Link Sending Successfully!</div>'
          ));
        }
        else
        {
          $this->json->jsonReturn(array(
              'valid'=>FALSE,
              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Sending App Link!</div>'
          ));
        }
    }

    public function calling_status_intrested()
    {
        $id=$this->input->post('id');
        $data=array('status'=>'1');
        $result=$this->common_model->updateDetails('tbl_calling_details','calling_id',$id,$data);

        if($result)
        {
          $this->json->jsonReturn(array(
              'valid'=>TRUE,
              'msg'=>'<div class="alert modify alert-success"><strong></strong> Status Updated Successfully!</div>'
          ));
        }
        else
        {
          $this->json->jsonReturn(array(
              'valid'=>FALSE,
              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Updating Status !</div>'
          ));
        }
    }

    public function calling_status_not_intrested()
    {
        $id=$this->input->post('id');
        $data=array('status'=>'0');
        $result=$this->common_model->updateDetails('tbl_calling_details','calling_id',$id,$data);

        if($result)
        {
          $this->json->jsonReturn(array(
              'valid'=>TRUE,
              'msg'=>'<div class="alert modify alert-success"><strong></strong> Status Updated Successfully!</div>'
          ));
        }
        else
        {
          $this->json->jsonReturn(array(
              'valid'=>FALSE,
              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Updating Status !</div>'
          ));
        }
    }

    public function pramotion_details()
    {
        $data['pramotion_data'] = $this->common_model->fetchDataDESC('tbl_pramotion','pramotion_id');
        $this->load->view('admin/pramotion',$data);
    }

    public function sms()   
    {   
      $data['pramo_data']=$this->admin_model->fetch_sms_data();
      $view = $this->load->view('admin/sms',$data,TRUE);
      $this->json->jsonReturn(array('view'=>$view));
    }

    public function send_sms()
    {
      $subject=$this->input->post('subject');
      $pramo_data=$this->admin_model->fetch_sms_data();
      //print_r($pramo_data);
      foreach ($pramo_data as $key)
      {
          if(isset($key->mobile_no) && !empty($key->mobile_no))
          {
            sendSms($key->mobile_no,$subject);
            $data= array('sms_status'=>'Send');
            $this->common_model->updateDetails('tbl_pramotion','pramotion_id',$key->pramotion_id,$data);        
          }
      }
    
      $this->json->jsonReturn(array(
          'valid'=>TRUE,
          'msg'=>'<div class="alert modify alert-success"><strong></strong>SMS Send Successfully!</div>'
      ));
    }

    public function promotion_emails()   
    {   
      $data['pramo_data']=$this->common_model->fetchDataDESC('tbl_customer','customer_id');
      $view = $this->load->view('admin/promotion_emails',$data,TRUE);
      $this->json->jsonReturn(array('view'=>$view));
    }

    public function send_promotion_emails() {
      $user_id=$this->session->userData("user_id");
      $subject=$this->input->post('subject');
      $content=$this->input->post('content');
      $redirect_url=$this->input->post('redirect_url');

      $email_array=array();
      $pramo_data=$this->admin_model->fetch_customer_email();

      foreach ($pramo_data as $key)
      {
          if(isset($key->email) && !empty($key->email)) {
           
            array_push($email_array,$key->email);
                    
          }
      }

      $logo='';
      $error='';
      if(isset($_FILES['promotion_photo']['name']))//Code for to take image from form and check isset
      {
        $logo=$_FILES['promotion_photo']['name']; //here [] name attribute
        $logoImg = array('upload_path' =>'./uploads/promotion_photo/',
                 'fieldname' => 'promotion_photo',
                   'encrypt_name' => TRUE,        
                   'overwrite' => FALSE,
                 'allowed_types' => 'png|PNG|jpg|JPG|jpeg|JPEG' );
        $logo_img = $this->imageupload->image_upload($logoImg);
        $error= $this->upload->display_errors();
        if(isset($logo_img) && !empty($logo_img))
        {
          $logoData = $this->upload->data();      
          $logo = $logoData['file_name'];
        }
      }

      $data = array('subject' => $subject, 'content' => $content, 'promotion_photo' => $logo, 'redirect_url' =>$redirect_url);

      $data['created_by']=$user_id;
      $data['created_on']=date('Y-m-d H:i:s');  
      $result = $this->common_model->addData('tbl_promotion_emails',$data);

      if ($result) {

        $this->load->library('email_sent');

        $arr_data['promotion_details'] = $this->common_model->selectAllWhr('tbl_promotion_emails','promotion_id',$result);
            
        $html=$this->load->view('admin/promotion_view',$arr_data,TRUE);

        //$subject1 = 'Regarding Promotion Email';                   
        //$msg_body="Dear Sir/Mam,<br/><br/> Please go Through Below Bio-Data Details  <br/><br/><br/>";
        $alt_msg = 'Promotion Email';
        $data=array('subject'=>$subject,'msg_body'=>$html,'alt_msg'=>$alt_msg);

        for($i=0;$i<count($email_array);$i++) {

          $email_id[]=array('email_id'=>$email_array[$i]);

        }

        $result1=$this->email_sent->mail_sent($data,$email_id);

        if($result1) {
          
          $this->json->jsonReturn(array(  
            'valid'=>TRUE,
            'msg'=>'<div class="alert modify alert-success"><strong></strong> Email Send Successfully!</div>'
          ));

        } else {

          $this->json->jsonReturn(array(
            'valid'=>FALSE,
            'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Sending Email!</div>'
          ));
        }

      } else {

        $this->json->jsonReturn(array(
          'valid'=>FALSE,
          'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Receving Data!</div>'
        ));

      }

    }

    public function pramotion_sms()   
    {   
      $data['pramo_data']=$this->common_model->fetchDataDESC('tbl_customer','customer_id');
      $view = $this->load->view('admin/pramotion_sms',$data,TRUE);
      $this->json->jsonReturn(array('view'=>$view));
    }

    public function send_pramotion_sms()
    {
      $subject=$this->input->post('subject');
      $pramo_data=$this->common_model->fetchDataDESC('tbl_customer','customer_id');
      //print_r($pramo_data);
      foreach ($pramo_data as $key)
      {
          if(isset($key->mobile) && !empty($key->mobile))
          {
            sendSms($key->mobile,$subject);
                    
          }
      }
    
      $this->json->jsonReturn(array(
          'valid'=>TRUE,
          'msg'=>'<div class="alert modify alert-success"><strong></strong>Pramotion SMS Send Successfully!</div>'
      ));
    }
    
    public function delete_customer_details()
    {  
        $id=$this->input->post('id');
        $data=array('display'=>'N');
        $result=$this->common_model->updateDetails('tbl_customer','customer_id',$id,$data);
        if($result)
        {
            $this->json->jsonReturn(array(
                'valid'=>TRUE,
                'msg'=>'<div class="alert modify alert-success"><strong></strong> Customer Details Remove Successfully!</div>'
            ));
        }
        else
        {
            $this->json->jsonReturn(array(
                'valid'=>FALSE,
                'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Removing Customer Details !</div>'
            ));
        }
    }

    public function block_customer_details()
    {  
        $id=$this->input->post('id');
        $data=array('user_status'=>'Block');
        $result=$this->common_model->updateDetails('tbl_customer','customer_id',$id,$data);
        if($result)
        {
            $this->json->jsonReturn(array(
                'valid'=>TRUE,
                'msg'=>'<div class="alert modify alert-success"><strong></strong> Block Customer Details Successfully!</div>'
            ));
        }
        else
        {
            $this->json->jsonReturn(array(
                'valid'=>FALSE,
                'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Blocking Customer Details !</div>'
            ));
        }
    }
    public function unblock_customer_details()
    {  
        $id=$this->input->post('id');
        $data=array('user_status'=>'Active');
        $result=$this->common_model->updateDetails('tbl_customer','customer_id',$id,$data);
        if($result)
        {
            $this->json->jsonReturn(array(
                'valid'=>TRUE,
                'msg'=>'<div class="alert modify alert-success"><strong></strong> Unblock Customer Details Successfully!</div>'
            ));
        }
        else
        {
            $this->json->jsonReturn(array(
                'valid'=>FALSE,
                'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Unblocking Customer Details !</div>'
            ));
        }
    }

    public function block_request()
    {
        $data['accepted_request_data'] = $this->admin_model->accepted_request();
        $data['decline_request_data'] = $this->admin_model->decline_request();
        $this->load->view('admin/block_request',$data);
    }

    public function decline_request()
    {  
        $id=$this->input->post('id');
        $data=array('status'=>'Decline');
        $result=$this->common_model->updateDetails('tbl_block_request','request_id',$id,$data);
        if($result)
        {
            $this->json->jsonReturn(array(
                'valid'=>TRUE,
                'msg'=>'<div class="alert modify alert-success"><strong></strong> Request Declined  Successfully!</div>'
            ));
        }
        else
        {
            $this->json->jsonReturn(array(
                'valid'=>FALSE,
                'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Request Decline  !</div>'
            ));
        }
    }

    public function accepted_request()
    {  
        $id=$this->input->post('id');
        $data=array('status'=>'Accepted');
        $result=$this->common_model->updateDetails('tbl_block_request','request_id',$id,$data);
        if($result)
        {
            $this->json->jsonReturn(array(
                'valid'=>TRUE,
                'msg'=>'<div class="alert modify alert-success"><strong></strong> Request Accepted  Successfully!</div>'
            ));
        }
        else
        {
            $this->json->jsonReturn(array(
                'valid'=>FALSE,
                'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Request Accepted  !</div>'
            ));
        }
    }

    public function download_biodata()    
    {
        $customer_id=$this->uri->segment(2);
        $data['cust_data'] = $this->admin_model->fetch_customer_details($customer_id);

        $pdfname = $data['cust_data']->f_name.' '.$data['cust_data']->l_name.' Bio-data ';
        //$this->load->view("admin/biodata",$data);
        $html=$this->load->view("admin/biodata",$data,TRUE);
        $this->report_creation->create_pdf_landscape($html,$pdfname);
    }

    public function transcation_details()
    {
        $data['transcation_data'] = $this->common_model->fetchDataDESC('tbl_payment_details','payment_id');
        $this->load->view('admin/transcation_details',$data);
    }

    public function download_invoice()    
    {
        $customer_id=$this->uri->segment(2);
        $data['cust_data'] = $this->admin_model->fetch_invoice_details($customer_id);
        $pdfname = 'Invoice';
        //$this->load->view("admin/invoice",$data);
        $html=$this->load->view("admin/invoice",$data,TRUE);
        $this->report_creation->create_pdf_landscape($html,$pdfname);
    }

    public function offline_payment()
    {
        $data['customer_data'] = $this->common_model->fetchDataDESC('tbl_customer','customer_id');
        $data['membership_data'] = $this->common_model->fetchDataDESC('tbl_membership','membership_id');
        $this->load->view('admin/offline_payment',$data);
    }

    public function fetch_customer()      
    {   
        $id=$this->input->post('id');
        $customerdata = $this->common_model->selectDetailsWhr('tbl_customer','customer_id',$id);
        $this->json->jsonReturn(array(
                    'valid'=>TRUE,
                    'name'=>$customerdata->f_name.' '.$customerdata->m_name.' '.$customerdata->l_name,
                    'mobile'=>$customerdata->mobile,
                    'email'=>$customerdata->email,
                    'profile_code'=>$customerdata->profile_code,
                    'gender'=>$customerdata->gender,
                    'customer_id'=>$id
        ));
    }
    public function fetch_membership()      
    {   
        $id=$this->input->post('id');
        $customerdata = $this->common_model->selectDetailsWhr('tbl_membership','membership_id',$id);
        $this->json->jsonReturn(array(
                    'valid'=>TRUE,
                    'name'=>$customerdata->membership_plan_name,
                    'amount'=>$customerdata->membership_amount,
                    'validity'=>$customerdata->membership_validity,
                    'membership_id'=>$id
        ));
    }

    public function save_offline_payment()
    {
        $user_id=$this->session->userData("user_id");
        $customer_id = $this->input->post('customer_id');
        $name = $this->input->post('name');
        $mobile = $this->input->post('mobile');
        $email = $this->input->post('email');
        $membership_id = $this->input->post('membership_id');
        $membership_plan=$this->input->post('membership_plan');
        $amount=$this->input->post('amount');
        $validity=$this->input->post('validity');
        $payment_mode=$this->input->post('payment_mode');
        $check_no=$this->input->post('check_no');
        $bank_name=$this->input->post('bank_name');
        $cur_date=date('Y-m-d H:i:s');

        $transaction_id=$this->generateRandomString();
        $data = array('customer_id'=> $customer_id,'customer_name'=> $name,'mobile'=> $mobile,'email'=> $email,'membership_amt'=> $amount,'membership_plan'=> $membership_plan,'pay_type'=>'Offline','membership_validity'=>$validity,'payment_mode'=>$payment_mode,'check_no'=>$check_no,'transcation_id'=>$transaction_id,'bank_name'=>$bank_name);
        $data1 = array('membership_status'=> 'Active','membership_from'=> $cur_date,'membership_validity'=> $validity,'membership_id'=>$membership_id,'membership_name'=>$membership_plan,'membership_amt'=>$amount,'transcation_id'=>$transaction_id);
        
        if(isset($id) && !empty($id) && ($id>0)) 
        {
          $data['modified_by']=$user_id;
          $result = $this->common_model->updateDetails('tbl_payment_details','payment_id',$id,$data);
          if($result)  
          {
            $this->json->jsonReturn(array(
              'valid'=>TRUE,
              'msg'=>'<div class="alert modify alert-success"><strong></strong> Payment Details Updated Successfully!</div>'
            ));
          }
          else
          {
            $this->json->jsonReturn(array(
              'valid'=>FALSE,
              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Updating Payment Details !</div>'
            ));
          }
        }
        else
        {       
          $data['created_by']=$user_id;
          $data1['created_by']=$user_id;
          $data['created_on']=$cur_date; 
          $this->db->trans_start(); 
          $result =  $this->common_model->addData('tbl_payment_details',$data);
          $pay_id=$result;
          $result = $this->common_model->updateDetails('tbl_customer','customer_id',$customer_id,$data1);
          $query=$this->db->trans_complete();
          if($query)
          {
                $transcation_data = $this->common_model->selectDetailsWhr('tbl_customer','customer_id',$customer_id);
                $mobile=$transcation_data->mobile;
                $email=$transcation_data->email;
                $customer_name=$transcation_data->f_name.' '.$transcation_data->m_name.' '.$transcation_data->l_name;
                $message='Hi '.$customer_name.' Thank you for choosing Shivbandhan Matrimony. Your Package'.$transcation_data->membership_name.' has been activated. Plase Download our app : https://goo.gl/Yv5icF ';
                sendSms($mobile, $message);
                if($email)
                {
                    $data['cust_data'] = $this->admin_model->fetch_invoice_details($pay_id);
                    $pdfname = 'Invoice';
                    $html=$this->load->view('admin/invoice',$data,TRUE);
                    $pdf_name=$this->report_creation->Save_pdf($html,'./uploads/pdf/invoice'.date('d-m-Y'));
                    $this->load->library('email_sent');
                    $subject = 'Invoice Details';                   
                    $msg_body="Dear Sir/Mam,<br/><br/> Thank you for choosing Shivbandhan Matrimony LPP.  <br/><br/><br/>";
                    $alt_msg = 'Invoice Details';
                    $data=array('subject'=>$subject,'msg_body'=>$msg_body,'alt_msg'=>$alt_msg,'attachement'=>$pdf_name);
                    $email_id[]=array('email_id'=>$email); 
                    $result=$this->email_sent->mail_sent($data,$email_id);
                }
            $this->json->jsonReturn(array(  
              'valid'=>TRUE,
              'msg'=>'<div class="alert modify alert-success"><strong></strong> Payment Details Saved Successfully!</div>'
            ));
          }
          else
          {
            $this->json->jsonReturn(array(
              'valid'=>FALSE,
              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Saving Payment Details !</div>'
            ));
          }
        } 
    }

    public function save_payment_details()
    {
        $user_id=$this->session->userData("user_id");
        $customer_id = $this->input->post('customer_id');
        $name = $this->input->post('name');
        $mobile = $this->input->post('mobile');
        $email = $this->input->post('email');
        $membership_id = $this->input->post('membership_id');
        $membership_plan=$this->input->post('membership_plan');
        $amount=$this->input->post('amount');
        $validity=$this->input->post('validity');
        $payment_mode=$this->input->post('payment_mode');
        $cur_date=date('Y-m-d H:i:s');

        /*if ($payment_mode=='cash') {

          $payment_status = 'Success';

        } else {

          $payment_status = 'Pending';

        }*/

        $transaction_id=$this->generateRandomString();
        $data = array('customer_id'=> $customer_id,'customer_name'=> $name,'mobile'=> $mobile,'email'=> $email,'membership_amt'=> $amount,'membership_plan'=> $membership_plan,'pay_type'=>'Offline','membership_validity'=>$validity,'payment_mode'=>$payment_mode,'transcation_id'=>$transaction_id/*,'payment_status'=>$payment_status*/);

        $data1 = array('membership_status'=> 'Active','membership_from'=> $cur_date,'membership_validity'=> $validity,'membership_id'=>$membership_id,'membership_name'=>$membership_plan,'membership_amt'=>$amount,'transcation_id'=>$transaction_id);
        
        if(isset($id) && !empty($id) && ($id>0)) 
        {
          $data['modified_by']=$user_id;
          $result = $this->common_model->updateDetails('tbl_payment_details','payment_id',$id,$data);
          if($result)  
          {
            $this->json->jsonReturn(array(
              'valid'=>TRUE,
              'msg'=>'<div class="alert modify alert-success"><strong></strong> Payment Details Updated Successfully!</div>'
            ));
          }
          else
          {
            $this->json->jsonReturn(array(
              'valid'=>FALSE,
              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Updating Payment Details !</div>'
            ));
          }
        }
        else
        {       
          $data['created_by']=$user_id;
          $data1['created_by']=$user_id;
          $data['created_on']=$cur_date;
          $data['user_id']=$user_id; 

          //$this->db->trans_start(); 


          if ($payment_mode == 'cash') {

            $result =  $this->common_model->addData('tbl_payment_details',$data);
            $pay_id=$result;
            
            $this->db->trans_start();
            $result = $this->common_model->updateDetails('tbl_customer','customer_id',$customer_id,$data1);
            $query=$this->db->trans_complete();

              if($query)
              {
                    $transcation_data = $this->common_model->selectDetailsWhr('tbl_customer','customer_id',$customer_id);
                    $mobile=$transcation_data->mobile;
                    $email=$transcation_data->email;
                    $customer_name=$transcation_data->f_name.' '.$transcation_data->m_name.' '.$transcation_data->l_name;
                    $message='Hi '.$customer_name.' Thank you for choosing Shivbandhan Matrimony. Your Package'.$transcation_data->membership_name.' has been activated. Plase Download our app : https://goo.gl/Yv5icF ';
                    sendSms($mobile, $message);
                    if($email)
                    {
                        $data['cust_data'] = $this->admin_model->fetch_invoice_details($pay_id);
                        $pdfname = 'Invoice';
                        $html=$this->load->view('admin/invoice',$data,TRUE);
                        $pdf_name=$this->report_creation->Save_pdf($html,'./uploads/pdf/invoice'.date('d-m-Y'));
                        $this->load->library('email_sent');
                        $subject = 'Invoice Details';                   
                        $msg_body="Dear Sir/Mam,<br/><br/> Thank you for choosing Shivbandhan Matrimony LPP.  <br/><br/><br/>";
                        $alt_msg = 'Invoice Details';
                        $data=array('subject'=>$subject,'msg_body'=>$msg_body,'alt_msg'=>$alt_msg,'attachement'=>$pdf_name);
                        $email_id[]=array('email_id'=>$email); 
                        $result=$this->email_sent->mail_sent($data,$email_id);
                    }
                $this->json->jsonReturn(array(  
                  'valid'=>TRUE,
                  'msg'=>'<div class="alert modify alert-success"><strong></strong> Payment Details Saved Successfully!</div>'
                ));
              }
              else
              {
                $this->json->jsonReturn(array(
                  'valid'=>FALSE,
                  'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Saving Payment Details !</div>'
                ));
              }

          } else {

            /*$this->json->jsonReturn(array(  
            'valid'=>TRUE,
            'msg'=>'<div class="alert modify alert-success"><strong></strong> Payment Details Saved Successfully please do the payment!</div>'
            ));*/

            $this->json->jsonReturn(array(  
                'valid'=>TRUE,
                'msg'=>'<div class="alert modify alert-success"><strong></strong> Continue... For the Payment!</div>',
                'redirect'=>base_url().'do_payment/'.$customer_id.'/'. $membership_id.'/'.$amount

            ));

        }

          /*$pay_id=$result;
 
          $result = $this->common_model->updateDetails('tbl_customer','customer_id',$customer_id,$data1);
          $query=$this->db->trans_complete();

          if($query)
          {
                $transcation_data = $this->common_model->selectDetailsWhr('tbl_customer','customer_id',$customer_id);
                $mobile=$transcation_data->mobile;
                $email=$transcation_data->email;
                $customer_name=$transcation_data->f_name.' '.$transcation_data->m_name.' '.$transcation_data->l_name;
                $message='Hi '.$customer_name.' Thank you for choosing Shivbandhan Matrimony. Your Package'.$transcation_data->membership_name.' has been activated. Plase Download our app : https://goo.gl/Yv5icF ';
                sendSms($mobile, $message);
                if($email)
                {
                    $data['cust_data'] = $this->admin_model->fetch_invoice_details($pay_id);
                    $pdfname = 'Invoice';
                    $html=$this->load->view('admin/invoice',$data,TRUE);
                    $pdf_name=$this->report_creation->Save_pdf($html,'./uploads/pdf/invoice'.date('d-m-Y'));
                    $this->load->library('email_sent');
                    $subject = 'Invoice Details';                   
                    $msg_body="Dear Sir/Mam,<br/><br/> Thank you for choosing Shivbandhan Matrimony LPP.  <br/><br/><br/>";
                    $alt_msg = 'Invoice Details';
                    $data=array('subject'=>$subject,'msg_body'=>$msg_body,'alt_msg'=>$alt_msg,'attachement'=>$pdf_name);
                    $email_id[]=array('email_id'=>$email); 
                    $result=$this->email_sent->mail_sent($data,$email_id);
                }
            $this->json->jsonReturn(array(  
              'valid'=>TRUE,
              'msg'=>'<div class="alert modify alert-success"><strong></strong> Payment Details Saved Successfully!</div>'
            ));
          }
          else
          {
            $this->json->jsonReturn(array(
              'valid'=>FALSE,
              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Saving Payment Details !</div>'
            ));
          }*/

        } 
    }

    public function generateRandomString()
    { 
        $day=date ("d");
        $month=date ("m");
        $year=date ("Y");
        $time=time();
        $dmyt=$day+$month+$year+$time;    
        $random = rand(0,10000000);  
        $dmtran= $dmyt+$random;
        $unique=  uniqid();
        $dmtun = $dmtran.$unique;
        $mdun = strtoupper(md5($dmtran.$dmtun));
        $uniqueString = substr($mdun, 5, -15); // getting 12 character length code.
        return $uniqueString;
    }

    public function user_visibility()
    {
        $data['visible_customer_data'] = $this->common_model->selectAllwhr('view_custoer','visibility','Visible');
        $data['invisible_customer_data'] = $this->common_model->selectAllwhr('view_custoer','visibility','Invisible');
        $this->load->view('admin/user_visibility_details',$data);
    }

    public function user_invisible()
    {  
        $id=$this->input->post('id');
        $data=array('visibility'=>'Invisible');
        $result=$this->common_model->updateDetails('tbl_customer','customer_id',$id,$data);
        if($result)
        {
            $this->json->jsonReturn(array(
                'valid'=>TRUE,
                'msg'=>'<div class="alert modify alert-success"><strong></strong> Customer Details Invisible Successfully!</div>'
            ));
        }
        else
        {
            $this->json->jsonReturn(array(
                'valid'=>FALSE,
                'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Invisibling Customer Details !</div>'
            ));
        }
    }

    public function user_visible()
    {  
        $id=$this->input->post('id');
        $data=array('visibility'=>'Visible');
        $result=$this->common_model->updateDetails('tbl_customer','customer_id',$id,$data);
        if($result)
        {
            $this->json->jsonReturn(array(
                'valid'=>TRUE,
                'msg'=>'<div class="alert modify alert-success"><strong></strong> Customer Details Visible Successfully!</div>'
            ));
        }
        else
        {
            $this->json->jsonReturn(array(
                'valid'=>FALSE,
                'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Visibling Customer Details !</div>'
            ));
        }
    }

    public function news_master()
    {
        $data['news_data'] = $this->common_model->fetchDataDESC('tbl_news','news_id');
        $this->load->view('admin/news_master',$data);
    }

    public function save_news_master()
    {
        $id = $this->input->post('id');
        $user_id=$this->session->userData("user_id");
        $news = $this->input->post('news');
        $from_date=$this->input->post('from_date');
        $to_date=$this->input->post('to_date');
        
        if(isset($from_date) && !empty($from_date)) {$from_date1=date('Y-m-d',strtotime($from_date)); } else {$from_date1='0000-00-00'; }
        if(isset($to_date) && !empty($to_date)) {$to_date1=date('Y-m-d',strtotime($to_date)); } else {$to_date1='0000-00-00'; }
        $data = array('news_desc'=>$news,'from_date'=>$from_date1,'to_date'=>$to_date1);
        
        if(isset($id) && !empty($id) && ($id>0)) 
        {
          $data['modified_by']=$user_id;
          $result = $this->common_model->updateDetails('tbl_news','news_id',$id,$data);
          if($result)  
          {
            $this->json->jsonReturn(array(
              'valid'=>TRUE,
              'msg'=>'<div class="alert modify alert-success"><strong></strong>News Details Updated Successfully!</div>'
            ));
          }
          else
          {
            $this->json->jsonReturn(array(
              'valid'=>FALSE,
              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Updating News Details !</div>'
            ));
          }
        }
        else
        {       
          $data['created_by']=$user_id;
          $data['created_on']=date('Y-m-d H:i:s');  
          $result =  $this->common_model->addData('tbl_news',$data);
          
          if($result)
          {
            $this->json->jsonReturn(array(  
              'valid'=>TRUE,
              'msg'=>'<div class="alert modify alert-success"><strong></strong> News Details Saved Successfully!</div>'
            ));
          }
          else
          {
            $this->json->jsonReturn(array(
              'valid'=>FALSE,
              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Saving News Details !</div>'
            ));
          }
        }  
    }

    public function edit_news_master()
    {
        $id = $this->input->post('id'); 
        $data['single_news_data'] = $this->common_model->selectDetailsWhr('tbl_news','news_id',$id);
        $this->load->view('admin/news_master',$data);
    }

    public function delete_news_master()
    {
        $id=$this->input->post('id');
        $data=array('display'=>'N');
        $result=$this->common_model->updateDetails('tbl_news','news_id',$id,$data);

        if($result)
        {
          $this->json->jsonReturn(array(
              'valid'=>TRUE,
              'msg'=>'<div class="alert modify alert-success"><strong></strong> News Details Remove Successfully!</div>'
          ));
        }
        else
        {
          $this->json->jsonReturn(array(
              'valid'=>FALSE,
              'msg'=>'<div class="alert modify alert-danger"><strong>Error!</strong> While Removing News Details !</div>'
          ));
        }
    }


}