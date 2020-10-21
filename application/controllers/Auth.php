<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function index()
	{
    if ($this->session->userdata('name')!='') {
      redirect(base_url('dashboard'));
    }
		$this->load->view('auth/login');
  }
  
  public function check_login()
  {
    // var_dump($_POST);
    $this->form_validation->set_rules('username', 'Username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'required');
    if($this->form_validation->run() == true){
      $where = [
        'username'=>html_escape($this->input->post('username')),
        'password'=>sha1($this->input->post('password'))
      ];
      $data['user'] = $this->m_user->get_data($where);
      print_r($data);
      if ($data['user']==null) {
        $this->session->set_flashdata('message',$this->messages->message_auth(0));
        redirect(base_url());
      } else {
        if ($data['user'][0]->status=='0') {
          $this->session->set_flashdata('message',$this->messages->message_auth(4));
          redirect(base_url());
        } else {
          $session_data = [
            'name' => $data['user'][0]->employee_name,
            'username' => $data['user'][0]->username,
            'photo' => $data['user'][0]->photo,
            'level' => $data['user'][0]->level
          ];
          $this->session->set_userdata($session_data);
          redirect(base_url('dashboard'));
        }
      }
    } else {
        $this->index();
    }
  }

  public function logout()
  {
    $session_data = [
      'name' => '',
      'username' => '',
      'photo' => '',
      'level' => ''
    ];

    $this->session->unset_userdata($session_data);
    $this->session->sess_destroy();
    $this->session->set_flashdata('message',$this->messages->message_auth(3));
    redirect(base_url());
  }
}
