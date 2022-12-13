<?php
defined('BASEPATH') or exit('No direct script access allowed');


class UserModel extends CI_Model
{
  public function getUsername()
  {
    return $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
  }
  public function UpdatePassword($password_hash)
  {
    $this->db->set('password', $password_hash);
    $this->db->where('email', $this->session->userdata('email'));
    $this->db->update('user');
  }
}
