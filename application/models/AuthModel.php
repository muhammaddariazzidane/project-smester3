<?php
defined('BASEPATH') or exit('No direct script access allowed');


class AuthModel extends CI_Model
{
  public function login()
  {
    $email = $this->input->post('email');
    $password = $this->input->post('password');
    $user = $this->db->get_where('user', ['email' => $email])->row_array();

    if ($user) {

      if ($user['is_active'] == 1) {
        if (password_verify($password, $user['password'])) {
          $data = [
            'email' => $user['email'],
            'role_id' => $user['role_id'],
          ];
          $this->session->set_userData($data);
          if ($user['role_id'] == 1) {
            redirect('admin');
          } else {
            redirect('home');
          }
        } else {

          $this->session->set_flashdata('message', ' <div class="flex justify-center items-center m-1 mb-2 font-medium py-2 px-2 bg-white rounded-md text-red-100 bg-red-700 border border-red-300 ">
      <div slot="avatar">
      <i class="fas fa-fw fa-info-circle mx-2 scale-110"></i></div>
    <div class="text-xl font-normal  max-w-full flex-initial">
    Wrong password!</div>
</div>');
          redirect('auth');
        }
      } else {

        $this->session->set_flashdata('message', ' <div class="flex justify-center items-center m-1 mb-2 font-medium py-2 px-2 bg-white rounded-md text-yellow-700 bg-yellow-100 border border-yellow-300 ">
        <div slot="avatar">
          <i class="fas fa-fw fa-info-circle mx-2 scale-110"></i>
        </div>
        <div class="text-xl font-normal  max-w-full flex-initial">
          Email has not been activated!</div>
      </div>');

        redirect('auth');
      }
    } else {
      $this->session->set_flashdata('message', ' <div class="flex justify-center items-center m-1 mb-2 font-medium py-2 px-2 bg-white rounded-md text-yellow-700 bg-yellow-100 border border-yellow-300 ">
      <div slot="avatar">
        <i class="fas fa-fw fa-info-circle mx-2 scale-110"></i>
      </div>
      <div class="text-xl font-normal  max-w-full flex-initial">
        Email is not registered!</div>
    </div>');
      redirect('auth');
    }
  }
  public function register()
  {
    $data = [
      'username' => htmlspecialchars($this->input->post('username', true)),
      'email' => htmlspecialchars($this->input->post('email', true)),
      'image' => 'default.jpg',
      'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
      'role_id' => 2,
      'is_active' => 1,
      'date_created' => time()
    ];
    $this->db->insert('user', $data);

    $this->session->set_flashdata('message', ' <div class="flex justify-center items-center m-1 mb-2 font-medium py-2 px-2 bg-white rounded-md text-green-100 bg-green-700 border border-green-300 ">
    <div slot="avatar">
    <i class="fas fa-check-circle mx-2 scale-110"></i>
    </div>
    <div class="text-xl font-normal  max-w-full flex-initial">
    Congratulation your account has been created, please login</div> 
</div>');
    redirect('auth');
  }
  public function logout()
  {
    $this->session->unset_userData('email');
    $this->session->unset_userData('role_id');

    $this->session->set_flashdata('message', ' <div class="flex justify-center items-center m-1 mb-2 font-medium py-2 px-2 bg-white rounded-md text-green-700 bg-green-100 border border-green-300 ">
        <div slot="avatar">
        <i class="fas fa-check-circle mx-2 scale-110"></i>
        </div>
        <div class="text-xl font-normal  max-w-full flex-initial">
        You have been logout!</div>
    </div>');
    redirect('auth');
  }
}
