<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Post extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    if (!$this->session->userdata('email')) {
      redirect('auth');
    }
  }
  public function index()
  {

    $data['user'] = $this->UserModel->getUsername();
    $data['submenu'] = $this->AdminModel->getSubmenu();
    $data['menu'] = $this->AdminModel->getMenu();
    $data['title'] = "My Post";
    $data['posts'] = $this->PostModel->getAllPost();
    $data['categ'] = $this->db->get('categories')->result_array();

    $this->load->view('templates/header', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('post/index', $data);
    $this->load->view('templates/footer');
  }
  public function addpost()
  {
    $data['user'] = $this->UserModel->getUsername();
    $data['submenu'] = $this->AdminModel->getSubmenu();
    $data['menu'] = $this->AdminModel->getMenu();
    $data['title'] = "My Post";
    $data['posts'] = $this->PostModel->getAllPost();

    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('description', 'Description', 'required');
    $this->form_validation->set_rules('id_category', 'Category', 'required');

    if ($this->form_validation->run() == false) {

      $this->load->view('templates/header', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('post/index', $data);
      $this->load->view('templates/footer');
    } else {
      $this->PostModel->create();
      $this->session->set_flashdata('message', '<div class="flex justify-center items-center m-1 mb-2 font-medium py-2 px-2 bg-white rounded-md text-green-100 bg-green-700 border border-green-300 ">
      <div slot="avatar">
          <i class="fas fa-check-circle mx-2 scale-110"></i>
      </div>
      <div class="text-xl font-normal  max-w-full flex-initial">
      Success Create Post</div> 
  </div>');
      redirect('post');
    }
  }
  public function editpost($id)
  {
    $data['user'] = $this->UserModel->getUsername();
    $data['submenu'] = $this->AdminModel->getSubmenu();
    $data['menu'] = $this->AdminModel->getMenu();
    $data['title'] = "Edit Post";
    $data['posts'] = $this->PostModel->getAllPost();
    $data['cate'] = $this->PostModel->getCate();
    $data['pid'] = $this->PostModel->getPostById($id);

    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('description', 'Description', 'required');
    $this->form_validation->set_rules('id_category', 'Category', 'required');

    if ($this->form_validation->run() == false) {

      $this->load->view('templates/header', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('post/editpost', $data);
      $this->load->view('templates/footer');
    } else {
      $this->PostModel->update();
      $this->session->set_flashdata('message', '<div class="flex justify-center items-center m-1 mb-2 font-medium py-2 px-2 bg-white rounded-md text-green-100 bg-green-700 border border-green-300 ">
      <div slot="avatar">
      <i class="fas fa-check-circle mx-2 scale-110"></i>
      </div>
      <div class="text-xl font-normal  max-w-full flex-initial">
      Success update Post</div> 
      </div>');
      redirect('post');
    }
  }
  public function deletepost($id)
  {
    $this->PostModel->destroy($id);
    $this->session->set_flashdata('message', '<div class="flex justify-center items-center m-1 mb-2 font-medium py-2 px-2 bg-white rounded-md text-green-100 bg-green-700 border border-green-300 ">
    <div slot="avatar">
        <i class="fas fa-check-circle mx-2 scale-110"></i>
    </div>
    <div class="text-xl font-normal  max-w-full flex-initial">
    Success Delete Post</div> 
</div>');
    redirect('post');
  }
}
