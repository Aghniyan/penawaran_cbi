<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Quotation extends CI_Controller
{

  function data_session()
  {
    $photo = 'default.jpg';
    if ($this->session->userdata('photo') != '') {
      $photo = $this->session->userdata('photo');
    }
    $data['name'] = $this->session->userdata('name');
    $data['level'] = $this->session->userdata('level');
    $data['photo'] = $photo;
    return $data;
  }
  public function index()
  {
    $data_session = $this->data_session();
    if ($this->session->has_userdata('name')) {
      $data['quotation'] = $this->m_quotation->get_data();
      // var_dump($data);die();
      if ($data_session['level'] == 'admin') {
        $this->load->view('_partials/header');
        $this->load->view('_partials/sidebar', $data_session);
        $this->load->view('quotation/quotation', $data);
        $this->load->view('_partials/footer');
      } else if ($data_session['level'] == 'user') {
        $this->load->view('_partials/header');
        $this->load->view('_partials/sidebar_user', $data_session);
        $this->load->view('quotation/quotation', $data);
        $this->load->view('_partials/footer');
      } else {
        $this->session->set_flashdata('message', $this->messages->message_auth(2));
        redirect(base_url());
      }
    } else {
      $this->session->set_flashdata('message', $this->messages->message_auth(2));
      redirect(base_url());
    }
  }
  public function detail()
  {

    $data_session = $this->data_session();
    if ($this->session->has_userdata('name')) {
      $id = $this->input->get('id');
      // var_dump($id);
      $data['quotation'] = $this->m_quotation->get_data(['no_quotation' => $id]);
      $data['product'] = $this->m_quotation->get_product(['no_quotation' => $id]);
      // $data['gambar_product'] = $this->m_product->get_data_image();
      // var_dump($data['gambar_product']);die();
      if ($data_session['level'] == 'admin') {
        $this->load->view('_partials/header');
        $this->load->view('_partials/sidebar', $data_session);
        $this->load->view('quotation/quotation_detail', $data);
        $this->load->view('_partials/footer');
      } else if ($data_session['level'] == 'user') {
        $this->load->view('_partials/header');
        $this->load->view('_partials/sidebar_user', $data_session);
        $this->load->view('quotation/quotation_detail', $data);
        $this->load->view('_partials/footer');
      } else {
        $this->session->set_flashdata('message', $this->messages->message_auth(2));
        redirect(base_url());
      }
    } else {
      $this->session->set_flashdata('message', $this->messages->message_auth(2));
      redirect(base_url());
    }
  }

  public function search()
  {
    $data_session = $this->data_session();
    if ($this->session->has_userdata('name')) {
      $name = $this->input->post('name');
      $brand = $this->input->post('brand');
      $where = array();
      if (isset($name)) {
        // var_dump($this->input->post()); die();

        if (isset($brand)) {
          $where = [
            'product_name' => $name,
            'brand_id' => $brand
          ];
        } else {
          $where = [
            'product_name' => $name
          ];
        }
        // var_dump($where);die();
      }
      $data['product'] = $this->m_quotation->get_product($where);
      $data['brand'] = $this->m_brand->get_data();
      if ($data_session['level'] == 'user') {
        $this->load->view('_partials/header');
        $this->load->view('_partials/sidebar_user', $data_session);
        $this->load->view('quotation/quotation_search', $data);
        $this->load->view('_partials/footer');
      } else {
        $this->session->set_flashdata('message', $this->messages->message_auth(2));
        redirect(base_url());
      }
    } else {
      $this->session->set_flashdata('message', $this->messages->message_auth(2));
      redirect(base_url());
    }
  }

  public function add()
  {
    $referensi = array('From WA', 'From Email','Form Quotation Number :');
    $data_session = $this->data_session();
    if ($this->session->has_userdata('name')) {
      $product = $this->input->post('produk');
      $where = array();
      // var_dump($this->input->post());

      $data['product'] = $this->m_quotation->get_product_in('id_product',$product);
      $data['customer'] = $this->m_customer->get_data();
      $data['brand'] = $this->m_brand->get_data();
      $data['reference'] = $referensi; 
      // var_dump($referensi);die();
      if ($data_session['level'] == 'user') {
        $this->load->view('_partials/header');
        $this->load->view('_partials/sidebar_user', $data_session);
        $this->load->view('quotation/quotation_add', $data);
        $this->load->view('_partials/footer');
      } else {
        $this->session->set_flashdata('message', $this->messages->message_auth(2));
        redirect(base_url());
      }
    } else {
      $this->session->set_flashdata('message', $this->messages->message_auth(2));
      redirect(base_url());
    }
  }
}
