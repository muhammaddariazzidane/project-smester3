<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    logged();
  }
  public function index()
  {
    $data['user'] = $this->UserModel->getUsername();
    $data['title'] = "My Profile";
    $this->load->view('templates/header', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('user/index', $data);
    $this->load->view('templates/footer');
  }
  public function profile()
  {

    $data['user'] = $this->UserModel->getUsername();
    $data['title'] = "Dashboard";
    $this->load->view('templates/header', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('user/profile', $data);
    $this->load->view('templates/footer');
  }
  public function edit()
  {
    $data['user'] = $this->UserModel->getUsername();
    $data['title'] = "Edit Profile";

    $this->form_validation->set_rules('username', 'Username', 'required|trim');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('user/edit', $data);
      $this->load->view('templates/footer');
    } else {
      $name = $this->input->post('username');
      $email = $this->input->post('email');

      $upload_image = $_FILES['image']['name'];
      if ($upload_image) {
        $config['allowed_types'] = 'gif|png|jpg|jpeg';
        $config['max_size'] = '100000';
        $config['upload_path'] = './assets/img/profile';
        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image')) {
          $old_image = $data['user']['image'];
          if ($old_image != 'default.jpg') {
            unlink(FCPATH . 'assets/img/profile/' . $old_image);
          }

          $new_image = $this->upload->data('file_name');
          $this->db->set('image', $new_image);
        } else {
          echo $this->upload->display_error();
        }
      }

      $this->db->set('username', $name);
      $this->db->where('email', $email);
      $this->db->update('user');

      $this->session->set_flashdata('message', ' <div class="flex justify-center items-center m-1 mb-2 font-medium py-2 px-2 bg-white rounded-md text-green-100 bg-green-700 border border-green-300 ">
    <div slot="avatar">
    <i class="fas fa-check-circle mx-2 scale-110"></i>
    </div>
    <div class="text-xl font-normal  max-w-full flex-initial">
    Your profile has been updated</div> 
</div>');
      redirect('user');
    }
  }
  public function changePassword()
  {
    $data['user'] = $this->UserModel->getUsername();
    $data['title'] = "Change Password";
    $this->form_validation->set_rules('current_password', 'Current_password', 'required|trim');
    $this->form_validation->set_rules('new_password1', 'New_password1', 'required|trim|min_length[3]|matches[new_password2]');
    $this->form_validation->set_rules('new_password2', 'Confirm New password', 'required|trim|min_length[3]|matches[new_password1]');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('user/changepassword', $data);
      $this->load->view('templates/footer');
    } else {
      $current_password = $this->input->post('current_password');
      $new_password = $this->input->post('new_password1');
      if (!password_verify($current_password, $data['user']['password'])) {
        $this->session->set_flashdata('message', ' <div class="flex justify-center items-center m-1 mb-2 font-medium py-2 px-2 bg-white rounded-md text-red-100 bg-red-700 border border-red-300 ">
        <div slot="avatar">
        <i class="fas fa-fw fa-info-circle mx-2 scale-110"></i>
    </div>
      <div class="text-xl font-normal  max-w-full flex-initial">
      Wrong current password!</div>
  </div>');
        redirect('user/changepassword');
      } else {
        if ($current_password == $new_password) {
          $this->session->set_flashdata('message', ' <div class="flex justify-center items-center m-1 mb-2 font-medium py-2 px-2 bg-white rounded-md text-red-100 bg-yellow-500 border border-yellow-300 ">
          <div slot="avatar">
          <i class="fas fa-fw fa-info-circle mx-2 scale-110"></i>
      </div>
        <div class="text-xl font-normal  max-w-full flex-initial">
        gaboleh sama</div>
    </div>');
          redirect('user/changepassword');
        } else {
          $password_hash = password_hash($new_password, PASSWORD_DEFAULT);
          $this->UserModel->UpdatePassword($password_hash);
          $this->session->set_flashdata('message', '<div class="flex justify-center items-center m-1 mb-2 font-medium py-2 px-2 bg-white rounded-md text-green-100 bg-green-700 border border-green-300 ">
          <div slot="avatar">
              <i class="fas fa-check-circle mx-2 scale-110"></i>
          </div>
          <div class="text-xl font-normal  max-w-full flex-initial">
          Success Change Password</div> 
      </div>');
          redirect('user');
        }
      }
    }
  }
}
