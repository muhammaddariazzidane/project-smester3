<?php
defined('BASEPATH') or exit('No direct script access allowed');


// class MenuModel extends CI_Model
// {
  // public function getSubmenu() 
  // {
  //   // params $keyword = null
  //   // if ($keyword) {
  //   //   $this->db->like('menu', $keyword);
  //   // }else{
  //   //   echo "ewh";
  //   // }

  //   $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
  //   FROM `user_sub_menu` JOIN `user_menu`
  //   ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
  //   ";
  //   return $this->db->query($query)->result_array();
  // }
  // public function getMenu()
  // {
  //   return $this->db->get('user_menu')->result_array();
  // }
  // public function addsubmenu()
  // {
  //   $data = [
  //     'title' => $this->input->post('title'),
  //     'menu_id' => $this->input->post('menu_id'),
  //     'url' => $this->input->post('url'),
  //     'icon' => $this->input->post('icon'),
  //     'is_active' => $this->input->post('is_active')
  //   ];
  //   $this->db->insert('user_sub_menu', $data);
  // }
  // public function getSubMenuById($id)
  // {
  //   return $this->db->get_where('user_sub_menu', ['id' => $id])->row_array();
  // }
  // public function updateSubmenu()
  // {
  //   $data = [
  //     'title' => $this->input->post('title'),
  //     'menu_id' => $this->input->post('menu_id'),
  //     'url' => $this->input->post('url'),
  //     'icon' => $this->input->post('icon'),
  //     'is_active' => $this->input->post('is_active')
  //   ];
  //   $this->db->where('id', $this->input->post('id'));
  //   $this->db->update('user_sub_menu', $data);
  // }
  // public function deleteSubmenu($id)
  // {
  //   $this->db->delete('user_sub_menu', ['id' => $id]);
  // }
// }