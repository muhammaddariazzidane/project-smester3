<?php

function logged()
{
  $check = get_instance();
  if (!$check->session->userdata('email')) {
    redirect('auth');
  } else {
    $role_id = $check->session->userdata('role_id');
    $menu = $check->uri->segment(1);

    $queryCheck = $check->db->get_where('user_menu', ['menu' => $menu])->row_array();
    $menu_id = $queryCheck['id'];
    

    $accesUser = $check->db->get_where('user_access_menu', [
      'role_id' => $role_id,
      'menu_id' => $menu_id,
    ]);
    if ($accesUser->num_rows() < 1) {
      redirect('auth/block');
    }
  }
  
}
