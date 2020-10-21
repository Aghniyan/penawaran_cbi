<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Quotation extends CI_Model
{
  public function get_data($where = null)
  {
    $this->db->select('*');
    $this->db->from('quotations');
    $this->db->join('customers', 'quotations.customer_id = customers.id_customer');
    $this->db->join('status', 'quotations.status_id = status.id_status');
    if ($where) {
      $this->db->where($where);
    }
    return $this->db->get()->result();
  }
  public function get_product($where)
  {
    $this->db->select('*');
    $this->db->from('products');
    $this->db->join('brands', 'brands.id_brand = products.brand_id');
    if ($where) {
      $this->db->like($where);
    }
    $this->db->where('status = 1');
    return $this->db->get()->result();
  }
  public function get_product_in($key, $where)
  {
    $this->db->select('*');
    $this->db->from('products');
    $this->db->join('brands', 'brands.id_brand = products.brand_id');
    $this->db->where('status = 1');
    $this->db->where_in($key,$where);
    return $this->db->get()->result();
  }

  public function get_last_data($key, $where = null)
  {
    $this->db->select('*');
    $this->db->from('quotations');
    $this->db->join('employees', 'quotations.employee_id = employees.id_employee');
    if ($where) {
      $this->db->where($where);
    }
    $this->db->limit(1)->order_by($key, "DESC");
    return $this->db->get()->row();
  }

  public function update($data)
  {
    $this->db->set($data);
    $this->db->where('no_quotation', $data['no_quotation']);
    $this->db->update('quotations');
  }

  public function delete($where)
  {
    $this->db->where($where);
    return $this->db->delete('quotations');
  }
}
