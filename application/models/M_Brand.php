<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Brand extends CI_Model
{
  public function get_data($where = null)
  {
    $this->db->select('*');
    $this->db->from('brands');
    if ($where) {
      $this->db->where($where);
    } 
    $result = $this->db->get();
    return $result->result();
  }

  public function insert($data)
  {
    return $this->db->insert('brands', $data);
  }

  public function update($data)
  {
    $this->db->set($data);
    $this->db->where('id_brand',$data['id_brand']);
    return $this->db->update('brands');
  }

  public function delete($where)
  {
    $this->db->where($where);
    return $this->db->delete('brands');
  }
}

