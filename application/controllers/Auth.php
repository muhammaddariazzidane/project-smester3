<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
  public function index()
  {
    if ($this->session->userdata('email')) {
      redirect('user');
    }

    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'required|trim');
    if ($this->form_validation->run() == false) {
      $data['title'] = "Login";
      $this->load->view('templates/auth_header.php', $data);
      $this->load->view('auth/login');
      $this->load->view('templates/auth_footer.php');
    } else {
      $this->AuthModel->login();
    }
  }
  public function register()
  {
    if ($this->session->userdata('email')) {
      redirect('user');
    }
    $this->form_validation->set_rules('username', 'Username', 'required|trim');
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
      'is_unique' => "This email has already registered"
    ]);
    $this->form_validation->set_rules('password1', 'Password1', 'required|trim|min_length[3]|matches[password2]', [
      'required' => 'The Password field is required.',
      'main_length' => 'password to short!',
      'matches' => 'password dont matches!',
    ]);
    $this->form_validation->set_rules('password2', 'Password2', 'required|trim|matches[password1]', [
      'required' => 'The Password field is required.',
    ]);

    if ($this->form_validation->run() == false) {
      $data['title'] = "Register";
      $this->load->view('templates/auth_header.php', $data);
      $this->load->view('auth/register');
      $this->load->view('templates/auth_footer.php');
    } else {
      $this->AuthModel->register();
    }
  }
  public function logout()
  {
    $this->AuthModel->logout();
  }
  public function block()
  {
    $data['title'] = "Blocked";
    $this->load->view('auth/block', $data);
  }
}
