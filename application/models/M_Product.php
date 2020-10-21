<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Product extends CI_Model
{
  public function get_data($where = null)
  {
    $this->db->select('*');
    $this->db->from('products');
    $this->db->join('category', 'products.category_id = category.category_id');
    $this->db->join('brands', 'products.brand_id = brands.id_brand');
    if ($where) {
      $this->db->where($where);
    } 
    return $this->db->get()->result();
  }
  public function get_data_image($where = null)
  {
    $this->db->select('*');
    $this->db->from('product_images');
    if ($where) {
      $this->db->where($where);
    } 
    return $this->db->get();
  }

  public function get_last_data($key,$where = null)
  {
    $this->db->select('*');
    $this->db->from('products');
    if ($where) {
      $this->db->where($where);
    } 
    $this->db->limit(1)->order_by($key,"DESC");
    return $this->db->get()->row();
  }

  public function insert($data)
  {
    return $this->db->insert('products', $data); 
  }
  public function insert_subimage($data)
  {
    return $this->db->insert_batch('product_images', $data);
  }

  public function update($data)
  {
    $this->db->set($data);
    $this->db->where('id_product',$data['id_product']);
    return $this->db->update('products');
  }

  public function delete($where)
  {
    $this->db->where($where);
    return $this->db->delete('products');
  }
  public function delete_image($where)
  {
    $this->db->where($where);
    return $this->db->delete('product_images');
  }
}

