<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
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
      $data['user'] = $this->m_user->get_data();
      if ($data_session['level']=='admin') {
        $this->load->view('_partials/header');
        $this->load->view('_partials/sidebar',$data_session);
        $this->load->view('user/user',$data);
        $this->load->view('_partials/footer');
      }  else {
        $this->session->set_flashdata('message',$this->messages->message_auth(2));
        redirect(base_url());
      }
    }
    else {
      $this->session->set_flashdata('message',$this->messages->message_auth(2));
      redirect(base_url());
    }
  }

	public function add()
	{
    $data_session = $this->data_session();
    if ($this->session->has_userdata('name')) {
      if ($data_session['level']=='admin') {
        $this->load->view('_partials/header');
        $this->load->view('_partials/sidebar',$data_session);
        $this->load->view('user/user_add');
        $this->load->view('_partials/footer');
      }  else {
        $this->session->set_flashdata('message',$this->messages->message_auth(2));
        redirect(base_url());
      }
    }
    else {
      $this->session->set_flashdata('message',$this->messages->message_auth(2));
      redirect(base_url());
    }
  }

  public function insert()
	{
    $data_session = $this->data_session();
    if ($this->session->has_userdata('name')) {
      if ($data_session['level']=='admin') {
        $this->form_validation->set_rules('name','Employee Name','required');
        $this->form_validation->set_rules('nik','NIK','required');
        $this->form_validation->set_rules('address','Address','required');
        $this->form_validation->set_rules('email','Email','required');
        $this->form_validation->set_rules('phone','Phone','required');
        $this->form_validation->set_rules('position','Position','required');
        $this->form_validation->set_rules('username','Username','required|is_unique[users.username]',
          array('is_unique'=>'This username already exists')
        );
        if($this->form_validation->run() == true){
          $employee_name  = html_escape($this->input->post('name'));
          $nik            = html_escape($this->input->post('nik'));
          $address        = html_escape($this->input->post('address'));
          $email          = html_escape($this->input->post('email'));
          $phone          = html_escape($this->input->post('phone'));
          $whatsapp       = html_escape($this->input->post('whatsapp'));
          $position       = html_escape($this->input->post('position'));
          $username       = html_escape($this->input->post('username'));
          $level          = html_escape($this->input->post('level'));
          $foto           = $_FILES['file'];
          // print_r($foto);die();
          if (empty($foto)) {
            $logo = null;
          } else {
            $config['upload_path']  = './assets/images/employee';
            $config['allowed_types'] = 'jpg|png|gif|jpeg';
    
            $this->load->library('upload',$config);
            if (!$this->upload->do_upload('file')) {
              echo "upload Gagal"; 
            } else {
              $logo = $this->upload->data('file_name');
            }
          }

          $data = [
            'id_employee'=>$this->get_next_id('id_employee'),
            'id_users'=>$this->get_next_id('id_users'),
            'employee_name'=>$employee_name,
            'nik'=>$nik,
            'address'=>$address,
            'email'=>$email,
            'phone'=>$phone,
            'whatsapp'=>$whatsapp,
            'position'=>$position,
            'username'=>$username,
            'password'=>sha1('user'),
            'level'=>$level,
            'status'=>0,
            'photos'=>$logo
          ];
          // var_dump($data);die();
          if($this->m_user->insert($data)){
            $this->session->set_flashdata('message',$this->messages->message_insert(1));
            redirect(base_url('user'));
          } else {
            $this->session->set_flashdata('message',$this->messages->message_insert(0));
            redirect(base_url('user/add'));
          }
        }else{
          $this->add();
        }
      } else {
        $this->session->set_flashdata('message',$this->messages->message_auth(2));
        redirect(base_url());
      }
    }
    else {
      $this->session->set_flashdata('message',$this->messages->message_auth(2));
      redirect(base_url());
    }
  }

  public function edit($id)
	{
    $data_session = $this->data_session();
    if ($this->session->has_userdata('name')) {
      $where = ['id_users'=>$id];
      $data['user'] = $this->m_user->get_data($where);
      if ($data_session['level']=='admin') {
        $this->load->view('_partials/header');
        $this->load->view('_partials/sidebar',$data_session);
        $this->load->view('user/user_edit',$data);
        $this->load->view('_partials/footer');
      }  else {
        $this->session->set_flashdata('message',$this->messages->message_auth(2));
        redirect(base_url());
      }
    }
    else {
      $this->session->set_flashdata('message',$this->messages->message_auth(2));
      redirect(base_url());
    }
  }

  public function change_status($id)
  {
    
    $user = $this->m_user->get_data(['id_users'=>$id]);
    if ($user[0]->status==0) {
      $status = 1;
    } else if ($user[0]->status==1){
      $status = 0;
    }
    $data = [
      'id_users'=>$id,
      'status' =>$status
    ];
    if($this->m_user->update($data)){
      $this->session->set_flashdata('message',$this->messages->message_update(1));
      redirect(base_url('user'));
    } else {
      $this->session->set_flashdata('message',$this->messages->message_update(0));
      redirect(base_url('user'));
    }
  }
  
  public function update()
	{
    $data_session = $this->data_session();
    if ($this->session->has_userdata('name')) {
      if ($data_session['level']=='admin') {
        $this->form_validation->set_rules('name','Brand Name','required');
        if($this->form_validation->run() == true){
          $id  = html_escape($this->input->post('id'));
          $employee_name  = html_escape($this->input->post('name'));
          $nik            = html_escape($this->input->post('nik'));
          $address        = html_escape($this->input->post('address'));
          $email          = html_escape($this->input->post('email'));
          $phone          = html_escape($this->input->post('phone'));
          $whatsapp       = html_escape($this->input->post('whatsapp'));
          $position       = html_escape($this->input->post('position'));
          $username       = html_escape($this->input->post('username'));
          $level          = html_escape($this->input->post('level'));
          $foto           = $_FILES['file'];
          // print_r($foto);die();
          if (empty($foto)) {
            $logo = null;
          } else {
            $config['upload_path']  = './assets/images/employee';
            $config['allowed_types'] = 'jpg|png|gif|jpeg';
    
            $this->load->library('upload',$config);
            if (!$this->upload->do_upload('file')) {
              echo "upload Gagal"; 
            } else {
              $logo = $this->upload->data('file_name');
            }
          }

          $data = [
            'employee_id'=>$id,
            'employee_name'=>$employee_name,
            'nik'=>$nik,
            'address'=>$address,
            'email'=>$email,
            'phone'=>$phone,
            'whatsapp'=>$whatsapp,
            'position'=>$position,
            'username'=>$username,
            'level'=>$level,
            'photos'=>$logo
          ];
          // print_r($this->m_user->update_all($data));die();
          if($this->m_user->update_all($data)){
            $this->session->set_flashdata('message',$this->messages->message_update(1));
            redirect(base_url('user'));
          } else {
            // echo $this->db->error();die();
            $this->session->set_flashdata('message',$this->messages->message_update(0).' Error: '.$this->db->error());
            redirect(base_url('user/edit/'.$id));
          }
        }else{
          $this->add();
        }
      } else {
        $this->session->set_flashdata('message',$this->messages->message_auth(2));
        redirect(base_url());
      }
    }
    else {
      $this->session->set_flashdata('message',$this->messages->message_auth(2));
      redirect(base_url());
    }
  }

  public function detail($id)
	{
    $data_session = $this->data_session();
    if ($this->session->has_userdata('name')) {
      $data['user']=$this->m_user->get_data(['id_users'=>$id]);
      if ($data_session['level']=='admin') {
        $this->load->view('_partials/header');
        $this->load->view('_partials/sidebar',$data_session);
        $this->load->view('user/user_detail',$data);
        $this->load->view('_partials/footer');
      }  else {
        $this->session->set_flashdata('message',$this->messages->message_auth(2));
        redirect(base_url());
      }
    }
    else {
      $this->session->set_flashdata('message',$this->messages->message_auth(2));
      redirect(base_url());
    }
  }

  public function get_next_id($key)
  {
    $data=$this->m_user->get_last_data($key,null);
    if ($key =='id_employee') {
      $next_id = (int)substr($data->id_employee,-3);
      $next_id++;
      if ($next_id<10 && $next_id>0) {
        $id = date('Y').date('m').'00'.$next_id;
      } else if ($next_id<100 && $next_id>=10) {
        $id = date('Y').date('m').'0'.$next_id;
      } else if ($next_id<1000 && $next_id>=100) {
        $id = date('Y').date('m').''.$next_id;
      }
    } else if ($key=='id_users') {
      $next_id = (int)$data->id_users;
      $id = $next_id+1;
    }
    
    // var_dump($next_id);
    return $id;
  }
}
