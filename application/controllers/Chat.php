<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Chat extends CI_Controller
{
  public function index()
  {
    $data['user'] = $this->UserModel->getUsername();
    $data['sb'] = $this->db->get_where('user_sub_menu')->num_rows();
    $data['submenu'] = $this->AdminModel->getSubmenu();
    $data['menu'] = $this->AdminModel->getMenu();
    $data['title'] = "Chat";
    $data['chat'] = $this->ChatModel->getAllChat();
    $this->form_validation->set_rules('message', 'Message', 'required');
    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('chat/index', $data);
      $this->load->view('templates/footer');
    } else {
      $this->ChatModel->createMessage();
      redirect('chat');
    }
  }
}
