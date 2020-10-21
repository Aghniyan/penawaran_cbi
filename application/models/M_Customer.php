<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Customer extends CI_Model
{
  public function get_data($where = null)
  {
    $this->db->select('*');
    $this->db->from('customers');
    if ($where) {
      $this->db->where($where);
    } 
    $result = $this->db->get();
    return $result->result();
  }

  public function insert($data)
  {
    return $this->db->insert('customers', $data);
  }

  public function update($data)
  {
    $this->db->set($data);
    $this->db->where('id_customer',$data['id_customer']);
    return $this->db->update('customers');
  }

  public function delete($where)
  {
    $this->db->where($where);
    return $this->db->delete('customers');
  }
}

