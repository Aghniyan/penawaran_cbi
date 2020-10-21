<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_Category extends CI_Model
{
  public function get_data($where = null)
  {
    $this->db->select('*');
    $this->db->from('category');
    if ($where) {
      $this->db->where($where);
    } 
    $result = $this->db->get();
    return $result->result();
  }

  public function insert($data)
  {
    return $this->db->insert('category', $data);
  }

  public function update($data)
  {
    $this->db->set($data);
    $this->db->where('category_id',$data['category_id']);
    return $this->db->update('category');
  }

  public function delete($where)
  {
    $this->db->where($where);
    return $this->db->delete('category');
  }
}

