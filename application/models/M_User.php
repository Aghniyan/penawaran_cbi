<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_User extends CI_Model
{
  public function get_data($where = null)
  {
    $this->db->select('*');
    $this->db->from('users');
    $this->db->join('employees', 'users.employee_id = employees.id_employee');
    if ($where) {
      $this->db->where($where);
    } 
    return $this->db->get()->result();
  }

  public function get_last_data($key,$where = null)
  {
    $this->db->select('*');
    $this->db->from('users');
    $this->db->join('employees', 'users.employee_id = employees.id_employee');
    if ($where) {
      $this->db->where($where);
    } 
    $this->db->limit(1)->order_by($key,"DESC");
    return $this->db->get()->row();
  }

  public function insert($data)
  {
    $data_employee = [
      'id_employee'=>$data['id_employee'],
      'employee_name'=>$data['employee_name'],
      'nik'=>$data['nik'],
      'address'=>$data['address'],
      'email'=>$data['email'],
      'phone'=>$data['phone'],
      'whatsapp'=>$data['whatsapp'],
      'position'=>$data['position'],
      'photo'=>$data['photos']
    ];
    $this->db->insert('employees', $data_employee);
    $data_user = [
      'id_users'=>$data['id_users'],
      'employee_id'=>$data['id_employee'],
      'username'=>$data['username'],
      'password'=>$data['password'],
      'level'=>$data['level'],
      'status'=>$data['status']
    ];
    
    return $this->db->insert('users', $data_user); 
  }

  public function update_all($data)
  {
    $data_employee = [
      'employee_name'=>$data['employee_name'],
      'nik'=>$data['nik'],
      'address'=>$data['address'],
      'email'=>$data['email'],
      'phone'=>$data['phone'],
      'whatsapp'=>$data['whatsapp'],
      'position'=>$data['position'],
      'photo'=>$data['photos']
    ];
    $this->db->set($data_employee);
    $this->db->where('id_employee',$data['employee_id']);
    $this->db->update('employees');
    $data_user = [
      'employee_id'=>$data['employee_id'],
      'username'=>$data['username'],
      'level'=>$data['level']
    ];
    $this->db->set($data_user);
    $this->db->where('employee_id',$data['employee_id']);
    return $this->db->update('users');
  }

  public function update($data)
  {
    $this->db->set($data);
    $this->db->where('id_users',$data['id_users']);
    $this->db->update('users');
  }

  public function delete($where)
  {
    $this->db->where($where);
    return $this->db->delete('users');
  }
}

