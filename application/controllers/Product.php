<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
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
      $data['product_0'] = $this->m_product->get_data(['status'=>0]);
      $data['product_1'] = $this->m_product->get_data(['status'=>1]);
      if ($data_session['level']=='admin') {
        $this->load->view('_partials/header');
        $this->load->view('_partials/sidebar',$data_session);
        $this->load->view('product/product',$data);
        $this->load->view('_partials/footer');
      } else if ($data_session['level']=='user') {
        $this->load->view('_partials/header');
        $this->load->view('_partials/sidebar_user',$data_session);
        $this->load->view('product/product',$data);
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

	public function detail($id)
	{
    $data_session = $this->data_session();
    if ($this->session->has_userdata('name')) {
      $data['product'] = $this->m_product->get_data(['id_product'=>$id]);
      $data['image'] = $this->m_product->get_data_image(['product_id'=>$id])->result();
      // var_dump($data['image']);
      if ($data_session['level']=='admin' or $data_session['level']=='user'  ) {
        $this->load->view('_partials/header');
        $level = ($data_session['level']=='admin') ? 'sidebar' : 'sidebar_user' ;
        $this->load->view('_partials/'.$level,$data_session);
        $this->load->view('product/product_detail',$data);
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
      $data['brand'] = $this->m_brand->get_data();
      $data['category'] = $this->m_category->get_data();
      if ($data_session['level']=='admin') {
        $this->load->view('_partials/header');
        $this->load->view('_partials/sidebar',$data_session);
        $this->load->view('product/product_add',$data);
        $this->load->view('_partials/footer');
      } else if ($data_session['level']=='user') {
        $this->load->view('_partials/header');
        $this->load->view('_partials/sidebar_user',$data_session);
        $this->load->view('product/product_add',$data);
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
  public function edit($id)
	{
    $data_session = $this->data_session();
    if ($this->session->has_userdata('name')) {
      $data['product'] = $this->m_product->get_data(['id_product'=>$id]);
      $data['brand'] = $this->m_brand->get_data();
      $data['category'] = $this->m_category->get_data();
      $data['image'] = $this->m_product->get_data_image(['product_id'=>$id])->result();
      if ($data_session['level']=='admin') {
        $this->load->view('_partials/header');
        $this->load->view('_partials/sidebar',$data_session);
        $this->load->view('product/product_edit',$data);
        $this->load->view('_partials/footer');
      } else if ($data_session['level']=='user') {
        $this->load->view('_partials/header');
        $this->load->view('_partials/sidebar_user',$data_session);
        $this->load->view('product/product_edit',$data);
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
  public function add_image()
  {
    $data_session = $this->data_session();
    if ($this->session->has_userdata('name')) {
      if ($data_session['level']=='admin') {
          $foto       = $_FILES['files'];
          $data_image = array();
          if ($foto=='') {
            $logo = null;
          } else {
            $id_product = $this->input->post('id');
            $filesCount = count($_FILES['files']['name']);
            for ($i = 0; $i < $filesCount; $i++) {
              $_FILES['file']['name']     = $_FILES['files']['name'][$i];
              $_FILES['file']['type']     = $_FILES['files']['type'][$i];
              $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
              $_FILES['file']['error']     = $_FILES['files']['error'][$i];
              $_FILES['file']['size']     = $_FILES['files']['size'][$i];
              $config['upload_path']  = './assets/images/products';
              $config['allowed_types'] = 'jpg|png|gif|jpeg';
              $config['file_name']     = $_FILES['files']['name'][$i];
              $config['overwrite']     = true;

              $this->load->library('upload',$config);
              $this->upload->initialize($config);
              if (!$this->upload->do_upload('file')) {
                echo "upload Gagal";
              } else {
                $data_image[$i]['product_id'] = $id_product;
                $data_image[$i]['file'] = $this->upload->data('file_name');
              }
            }
          }
          if($this->m_product->insert_subimage($data_image)){
            $this->session->set_flashdata('message',$this->messages->message_insert(1));
            redirect(base_url('product/detail/'.$id_product));
          } else {
            $this->session->set_flashdata('message',$this->messages->message_insert(0));
            redirect(base_url('product/detail/'.$id_product));
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
  public function insert()
	{
    $data_session = $this->data_session();
    if ($this->session->has_userdata('name')) {
      if ($data_session['level']=='admin' or $data_session['level']=='user') {
        $this->form_validation->set_rules('name','Product Name','required');
        $this->form_validation->set_rules('purchase','Purchase Price','required');
        $this->form_validation->set_rules('selling','Selling Price','required');
        if($this->form_validation->run() == true){
          $id = $this->get_next_id('id_product');
          $product_name = html_escape($this->input->post('name'));
          $brand        = html_escape($this->input->post('brand'));
          $category     = html_escape($this->input->post('category'));
          $type         = html_escape($this->input->post('type'));
          $fungsi       = html_escape($this->input->post('fungsi'));
          $purchase     = html_escape($this->input->post('purchase'));
          $selling      = html_escape($this->input->post('selling'));
          $spec         = $this->input->post('spec');
          $foto         = $_FILES['files'];
          $data_image   = array();
          if (empty($foto)) {
            $logo = null;
          } else {
            $id_product = $id;
            $filesCount = count($_FILES['files']['name']);
            for ($i = 0; $i < $filesCount; $i++) {
              $_FILES['file']['name']     = $_FILES['files']['name'][$i];
              $_FILES['file']['type']     = $_FILES['files']['type'][$i];
              $_FILES['file']['tmp_name'] = $_FILES['files']['tmp_name'][$i];
              $_FILES['file']['error']    = $_FILES['files']['error'][$i];
              $_FILES['file']['size']     = $_FILES['files']['size'][$i];
              $config['upload_path']      = './assets/images/products';
              $config['allowed_types']    = 'jpg|png|gif|jpeg';
              $config['file_name']        = $_FILES['files']['name'][$i];
              $config['overwrite']        = true;

              $this->load->library('upload',$config);
              $this->upload->initialize($config);
              if (!$this->upload->do_upload('file')) {
                 echo "upload Gagal";
              } else {
                $data_image[$i]['product_id'] = $id_product;
                $data_image[$i]['file'] = $this->upload->data('file_name');
              }
            }
          }
          $data = [
            'id_product'=>$id,
            'product_name'=>$product_name,
            'brand_id'=>$brand,
            'category_id'=>$category,
            'type'=>$type,
            'info'=>$fungsi,
            'purchase_price'=>$purchase,
            'selling_price'=>$selling,
            'spec'=>$spec
          ];
          // var_dump($data_image);
          if($this->m_product->insert($data)){
            if ($data_image!=null) {
              $this->m_product->insert_subimage($data_image);
            }
            $this->session->set_flashdata('message',$this->messages->message_insert(1));
            redirect(base_url('product'));
          } else {
            $this->session->set_flashdata('message',$this->messages->message_insert(0));
            redirect(base_url('product/add'));
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

  public function update()
	{
    $data_session = $this->data_session();
    if ($this->session->has_userdata('name')) {
      if ($data_session['level']=='admin' or $data_session['level']=='user') {
        $this->form_validation->set_rules('name','Product Name','required');
        if($this->form_validation->run() == true){
          $id = html_escape($this->input->post('id_product'));
          $product_name = html_escape($this->input->post('name'));
          $brand    = html_escape($this->input->post('brand'));
          $category    = html_escape($this->input->post('category'));
          $type    = html_escape($this->input->post('type'));
          $fungsi    = html_escape($this->input->post('fungsi'));
          $purchase    = html_escape($this->input->post('purchase'));
          $selling    = html_escape($this->input->post('selling'));
          $spec    = $this->input->post('spec');
          
          $data = [
            'id_product'=>$id,
            'product_name'=>$product_name,
            'brand_id'=>$brand,
            'category_id'=>$category,
            'type'=>$type,
            'info'=>$fungsi,
            'purchase_price'=>$purchase,
            'selling_price'=>$selling,
            'spec'=>$spec
          ];
          if($this->m_product->update($data)){
            $this->session->set_flashdata('message',$this->messages->message_insert(1));
            redirect(base_url('product/detail/'.$id));
          } else {
            $this->session->set_flashdata('message',$this->messages->message_insert(0));
            redirect(base_url('product/add'));
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

  public function change_status($id,$id2)
	{
    // var_dump($id . ' - '. $id2);die();
    $data_session = $this->data_session();
    if ($this->session->has_userdata('name')) {
      if ($data_session['level']=='admin') {
        $data = [
          'id_product'=>$id,
          'status' =>$id2
        ];
        // var_dump($this->m_product->update($data));die();
        if($this->m_product->update($data)){
          $this->session->set_flashdata('message',$this->messages->message_update(1));
          redirect(base_url('product'));
        } else {
          $this->session->set_flashdata('message',$this->messages->message_update(0));
          redirect(base_url('product'));
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
    $where = ['id_product'=>$id];
    if ($this->m_product->delete($where)) {
      $this->session->set_flashdata('message',$this->messages->message_delete(1));
      redirect(base_url('product'));
    } else {
      $this->session->set_flashdata('message',$this->messages->message_delete(0));
      redirect(base_url('product'));
    }
  }
  public function delete_image($id,$idp)
  {
    $where = ['id'=>$id];
    if ($this->m_product->delete_image($where)) {
      $this->session->set_flashdata('message',$this->messages->message_delete(1));
      redirect(base_url('product/detail/'.$idp));
    } else {
      $this->session->set_flashdata('message',$this->messages->message_delete(0));
      redirect(base_url('product/detail/'.$idp));
    }
  }

  public function category()
  {
    $data_session = $this->data_session();
    if ($this->session->has_userdata('name')) {
      $data['category']=$this->m_category->get_data();
      if ($data_session['level']=='admin') {
        $this->load->view('_partials/header');
        $this->load->view('_partials/sidebar',$data_session);
        $this->load->view('category/category',$data);
        $this->load->view('_partials/footer');
      } else if ($data_session['level']=='user') {
        $this->load->view('_partials/header');
        $this->load->view('_partials/sidebar_user',$data_session);
        $this->load->view('category/category',$data);
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

  public function category_add()
  {
    $data_session = $this->data_session();
    if ($this->session->has_userdata('name')) {
      if ($data_session['level']=='admin') {
        $this->load->view('_partials/header');
        $this->load->view('_partials/sidebar',$data_session);
        $this->load->view('category/category_add');
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

  public function category_insert()
  {
    $this->form_validation->set_rules('name','Category Name','required');
    if($this->form_validation->run() == true){
      $category_name = html_escape($this->input->post('name'));
      
      $data = [
        'category_name'=>$category_name
      ];
      
      if($this->m_category->insert($data)){
        $this->session->set_flashdata('message',$this->messages->message_insert(1));
        redirect(base_url('product/category'));
      } else {
        $this->session->set_flashdata('message',$this->messages->message_insert(0));
        redirect(base_url('product/category_add'));
      }
    } else {
      $this->category_add();
    }
  }

  public function category_edit($id)
  {
    $data_session = $this->data_session();
    if ($this->session->has_userdata('name')) {
      $where = ['category_id'=>$id];
      $data['category']=$this->m_category->get_data($where);
      if ($data_session['level']=='admin') {
        $this->load->view('_partials/header');
        $this->load->view('_partials/sidebar',$data_session);
        $this->load->view('category/category_edit',$data);
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

  public function category_update()
  {
    
    $id = html_escape($this->input->post('category_id'));
    $category_name = html_escape($this->input->post('name'));
    $this->form_validation->set_rules('name','Category Name','required');
    if($this->form_validation->run() == true){
      
      $data = [
        'category_id'=>$id,
        'category_name'=>$category_name
      ];
      
      if($this->m_category->update($data)){
        $this->session->set_flashdata('message',$this->messages->message_update(1));
        redirect(base_url('product/category'));
      } else {
        $this->session->set_flashdata('message',$this->messages->message_update(0));
        redirect(base_url('product/category_edit'));
      }
    } else {
      $this->category_edit($id);
    }
  }

  public function category_delete($id)
  {
    $where = ['category_id'=>$id];
    if ($this->m_category->delete($where)) {
      $this->session->set_flashdata('message',$this->messages->message_delete(1));
      redirect(base_url('product/category'));
    } else {
      $this->session->set_flashdata('message',$this->messages->message_delete(0));
      redirect(base_url('product/category'));
    }
  }
  
  public function get_next_id($key)
  {
    $data=$this->m_product->get_last_data($key,null);
    if ($key =='id_product') {
      $next_id = (int)$data->id_product;
      $next_id++;
      if ($next_id<10 && $next_id>0) {
        $id = '000'.$next_id;
      } else if ($next_id<100 && $next_id>=10) {
        $id = '00'.$next_id;
      } else if ($next_id<1000 && $next_id>=100) {
        $id = '0'.$next_id;
      }
    }     
    // var_dump($next_id);
    return $id;
  }
}
