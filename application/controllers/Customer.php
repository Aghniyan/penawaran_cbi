<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends CI_Controller {
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
  
  public function json_customer()
  {
    $data = $this->m_customer->get_data();
    echo(json_encode($data));
  }
	public function index()
	{
    $data_session = $this->data_session();
    if ($this->session->has_userdata('name')) {
      $data['customer'] = $this->m_customer->get_data();
      if ($data_session['level']=='admin') {
        $this->load->view('_partials/header');
        $this->load->view('_partials/sidebar',$data_session);
        $this->load->view('customer/customer',$data);
        $this->load->view('_partials/footer');
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

  public function add()
	{
    $data_session = $this->data_session();
    if ($this->session->has_userdata('name')) {
      if ($data_session['level']=='admin') {
        $this->load->view('_partials/header');
        $this->load->view('_partials/sidebar',$data_session);
        $this->load->view('customer/customer_add');
        $this->load->view('_partials/footer');
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

  public function insert()
	{
    $data_session = $this->data_session();
    if ($this->session->has_userdata('name')) {
      if ($data_session['level']=='admin') {
        $id = html_escape($this->input->post('id_customer'));
        $customer_name = html_escape($this->input->post('name'));
        $company = html_escape($this->input->post('company'));
        $address = html_escape($this->input->post('address'));
        $email = html_escape($this->input->post('email'));
        $phone = html_escape($this->input->post('phone'));
        $whatsapp = html_escape($this->input->post('whatsapp'));
        $this->form_validation->set_rules('name','customer Name','required');
        $this->form_validation->set_rules('address','Address','required');
        $this->form_validation->set_rules('email','Email','required|valid_email');
        $this->form_validation->set_rules('phone','Phone','required');
        if($this->form_validation->run() == true){
          
          $data = [
            'id_customer'=>$id,
            'customer_name'=>$customer_name,
            'company'=>$company,
            'address'=>$address,
            'email'=>$email,
            'phone'=>$phone,
            'whatsapp'=>$whatsapp
          ];
          
          if($this->m_customer->insert($data)){
            $this->session->set_flashdata('message',$this->messages->message_insert(1));
            redirect(base_url('customer'));
          } else {
            $this->session->set_flashdata('message',$this->messages->message_insert(0));
            redirect(base_url('customer_add'));
          }
        } else {
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
      $where=['id_customer'=>$id];
      $data['customer'] = $this->m_customer->get_data($where);
      if ($data_session['level']=='admin') {
        $this->load->view('_partials/header');
        $this->load->view('_partials/sidebar',$data_session);
        $this->load->view('customer/customer_edit',$data);
        $this->load->view('_partials/footer');
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

  
  public function update()
	{
    $data_session = $this->data_session();
    if ($this->session->has_userdata('name')) {
      if ($data_session['level']=='admin') {
        $id = html_escape($this->input->post('id_customer'));
        $customer_name = html_escape($this->input->post('name'));
        $company = html_escape($this->input->post('company'));
        $address = html_escape($this->input->post('address'));
        $email = html_escape($this->input->post('email'));
        $phone = html_escape($this->input->post('phone'));
        $whatsapp = html_escape($this->input->post('whatsapp'));
        $this->form_validation->set_rules('name','customer Name','required');
        $this->form_validation->set_rules('address','Address','required');
        $this->form_validation->set_rules('email','Email','required|valid_email');
        $this->form_validation->set_rules('phone','Phone','required');
        if($this->form_validation->run() == true){
          
          $data = [
            'id_customer'=>$id,
            'customer_name'=>$customer_name,
            'company'=>$company,
            'address'=>$address,
            'email'=>$email,
            'phone'=>$phone,
            'whatsapp'=>$whatsapp
          ];
          
          if($this->m_customer->update($data)){
            $this->session->set_flashdata('message',$this->messages->message_update(1));
            redirect(base_url('customer'));
          } else {
            $this->session->set_flashdata('message',$this->messages->message_update(0));
            redirect(base_url('customer_add'));
          }
        } else {
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

  public function delete($id)
  {
    $where = ['id_customer'=>$id];
    if ($this->m_customer->delete($where)) {
      $this->session->set_flashdata('message',$this->messages->message_delete(1));
      redirect(base_url('customer'));
    } else {
      $this->session->set_flashdata('message',$this->messages->message_delete(0));
      redirect(base_url('customer'));
    }
  }
}
