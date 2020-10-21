<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
  function data_session()
  {
    $photo = 'default.jpg';
    if ($this->session->userdata('photo')!='') {
      $photo =$this->session->userdata('photo');
    } 
    $data['name'] = $this->session->userdata('name');
    $data['level'] = $this->session->userdata('level');
    $data['photo'] =$photo ;
    return $data;
  }
	public function index()
	{
    $data_session = $this->data_session();
    if ($this->session->has_userdata('name')) {
      if ($data_session['level']=='admin') {
        $this->load->view('_partials/header');
        $this->load->view('_partials/sidebar',$data_session);
        $this->load->view('dashboard/index');
        $this->load->view('_partials/footer');
      } else if ($data_session['level']=='user') {
        $this->load->view('_partials/header');
        $this->load->view('_partials/sidebar_user',$data_session);
        $this->load->view('dashboard/index_user');
        $this->load->view('_partials/footer');
      }  else {
        $this->session->set_flashdata('failed','<div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <i class="icon fas fa-ban"></i>  You Must Login First!
        </div>');
        redirect(base_url());
      }
    }
    else {
      $this->session->set_flashdata('failed','<div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <i class="icon fas fa-ban"></i>  You Must Login First!
    </div>');
      redirect(base_url());
    }
    
  }
  
}
