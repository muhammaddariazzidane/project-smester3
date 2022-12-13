<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    logged();
  }
  public function index()
  {
    $data['user'] = $this->UserModel->getUsername();
    $data['users'] = $this->db->get_where('user', ['role_id' => 2])->num_rows();
    $data['admin'] = $this->db->get_where('user', ['role_id' => 1])->num_rows();
    $data['sb'] = $this->db->get_where('user_sub_menu')->num_rows();
    $data['submenu'] = $this->AdminModel->getSubmenu();
    $data['menu'] = $this->AdminModel->getMenu();
    $data['title'] = "Dashboard";

    $this->load->view('templates/header', $data);
    $this->load->view('templates/topbar', $data);
    $this->load->view('templates/sidebar', $data);
    $this->load->view('admin/index', $data);
    $this->load->view('templates/footer');
  }
  public function addsubmenu()
  {
    $data['user'] = $this->UserModel->getUsername();
    $data['title'] = "Dashboard";
    $data['submenu'] = $this->AdminModel->getSubmenu();
    $data['menu'] = $this->AdminModel->getMenu();

    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('menu_id', 'Menu', 'required');
    $this->form_validation->set_rules('url', 'URL', 'required');
    $this->form_validation->set_rules('icon', 'Icon', 'required');

    if ($this->form_validation->run() == false) {

      $this->load->view('templates/header', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('admin/index', $data);
      $this->load->view('templates/footer');
    } else {
      $this->AdminModel->addsubmenu();
      $this->session->set_flashdata('message', '<div class="flex justify-center items-center m-1 mb-2 font-medium py-2 px-2 bg-white rounded-md text-green-100 bg-green-700 border border-green-300 ">
      <div slot="avatar">
          <i class="fas fa-check-circle mx-2 scale-110"></i>
      </div>
      <div class="text-xl font-normal  max-w-full flex-initial">
      Success add menu</div> 
  </div>');
      redirect('admin');
    }
  }
  public function editsubmenu($id)
  {
    $data['user'] = $this->UserModel->getUsername();
    $data['title'] = "Edit Menu";
    $data['submenu'] = $this->AdminModel->getSubmenu();
    $data['menu'] = $this->AdminModel->getMenu();
    $data['sm'] = $this->AdminModel->getSubMenuById($id);

    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('menu_id', 'Menu', 'required');
    $this->form_validation->set_rules('url', 'URL', 'required');
    $this->form_validation->set_rules('icon', 'Icon', 'required');

    if ($this->form_validation->run() == false) {
      $this->load->view('templates/header', $data);
      $this->load->view('templates/topbar', $data);
      $this->load->view('templates/sidebar', $data);
      $this->load->view('admin/editmenu', $data);
      $this->load->view('templates/footer');
    } else {
      $this->AdminModel->updateSubmenu();
      $this->session->set_flashdata('message', '  <div class="flex justify-center items-center m-1 mb-2 font-medium py-2 px-2 bg-white rounded-md text-green-100 bg-green-700 border border-green-300 ">
      <div slot="avatar">
          <i class="fas fa-check-circle mx-2 scale-110"></i>
      </div>
      <div class="text-xl font-normal  max-w-full flex-initial">
      Success edit menu</div> 
  </div>');
      redirect('admin');
    }
  }
  public function deletesubmenu($id)
  {
    $this->AdminModel->deleteSubmenu($id);
    $this->session->set_flashdata('message', '<div class="flex justify-center items-center m-1 mb-2 font-medium py-2 px-2 bg-white rounded-md text-green-100 bg-green-700 border border-green-300 ">
    <div slot="avatar">
        <i class="fas fa-check-circle mx-2 scale-110"></i>
    </div>
    <div class="text-xl font-normal  max-w-full flex-initial">
    Success delete menu</div> 
</div>');

    redirect('admin');
  }
}
