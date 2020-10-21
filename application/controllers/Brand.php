<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Brand extends CI_Controller {

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
    if (!empty($data_session)) {
      $data['brand'] = $this->m_brand->get_data();
      if ($data_session['level']=='admin') {
        $this->load->view('_partials/header');
        $this->load->view('_partials/sidebar',$data_session);
        $this->load->view('brand/brand',$data);
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
    if (!empty($data_session)) {
      if ($data_session['level']=='admin') {
        $this->load->view('_partials/header');
        $this->load->view('_partials/sidebar',$data_session);
        $this->load->view('brand/brand_add');
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
    $this->form_validation->set_rules('name','Brand Name','required');
    if($this->form_validation->run() == true){
      $brand_name = html_escape($this->input->post('name'));
      $address    = html_escape($this->input->post('address'));
      $foto       = $_FILES['foto'];
      if ($foto=='') {
        $logo = null;
      } else {
        $config['upload_path']  = './assets/images/brands';
        $config['allowed_types'] = 'jpg|png|gif|jpeg';

        $this->load->library('upload',$config);
        if (!$this->upload->do_upload('foto')) {
          echo "upload Gagal"; 
        } else {
          $logo = $this->upload->data('file_name');
        }
      }

      $data = [
        'brand_name'=>$brand_name,
        'address'=>$address,
        'logo'=>$logo
      ];
      
      if($this->m_brand->insert($data)){
        $this->session->set_flashdata('message',$this->messages->message_insert(1));
        redirect(base_url('brand'));
      } else {
        $this->session->set_flashdata('message',$this->messages->message_insert(0));
        redirect(base_url('brand/add'));
      }
    }else{
      $this->add();
    }    
  }

  public function edit($id)
  {
    $data_session = $this->data_session();
    if (!empty($data_session)) {
      $where =['id_brand'=>$id];
      $data['brand'] = $this->m_brand->get_data($where);
      if ($data_session['level']=='admin') {
        $this->load->view('_partials/header');
        $this->load->view('_partials/sidebar',$data_session);
        $this->load->view('brand/brand_edit',$data);
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
    $id         =  $this->input->post('id');
    $brand_name =  $this->input->post('name');
    $address    = $this->input->post('address');
    $logo    = $this->input->post('logo');
    $foto       = $_FILES['foto'];
    print_r($this->input->post());
    if ($foto=='') {} else {
      $config['upload_path']  = './assets/images/brands';
      $config['allowed_types'] = 'jpg|png|gif|jpeg';

      $this->load->library('upload',$config);
      if (!$this->upload->do_upload('foto')) {
        echo "upload Gagal"; 
      } else {
        $logo = $this->upload->data('file_name');
      }
    }

    $data = [
      'id_brand'=>$id,
      'brand_name'=>$brand_name,
      'address'=>$address,
      'logo'=>$logo
    ];
    print_r($data);
    if($this->m_brand->update($data)){
      $this->session->set_flashdata('message',$this->messages->message_update(1));
      redirect(base_url('brand'));
    } else {
      $this->session->set_flashdata('message',$this->messages->message_update(0));
      redirect(base_url('brand/edit/'.$id));
    }
  }

  public function delete($id)
  {
    $where = ['id_brand'=>$id];
    if ($this->m_brand->delete($where)) {
      $this->session->set_flashdata('message',$this->messages->message_delete(1));
      redirect(base_url('brand'));
    } else {
      $this->session->set_flashdata('message',$this->messages->message_delete(0));
      redirect(base_url('brand'));
    }
  }
}
