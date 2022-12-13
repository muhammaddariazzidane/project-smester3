<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
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
    $data['submenuhome'] = $this->AdminModel->getSubmenuhome();
    $data['menu'] = $this->AdminModel->getMenu();
    $data['title'] = "Homepage";
    $data['posts'] = $this->PostModel->getAllPost();
    $data['categ'] = $this->db->get('categories')->result_array();

    $this->load->view('templates/home_header', $data);
    $this->load->view('home/index', $data);
    $this->load->view('templates/home_footer');
  }
  public function cook()
  {
    $data['user'] = $this->UserModel->getUsername();
    $data['submenuhome'] = $this->AdminModel->getSubmenuhome();
    $data['menu'] = $this->AdminModel->getMenu();
    $data['title'] = "Homepage";
    $data['posts'] = $this->PostModel->getpostcook();
    // $data['posts'] = $this->db->order_by('id', 'DESC')->get_where('post', ['id_category' => 1])->result_array();
    $data['categ'] = $this->db->get('categories')->result_array();

    $this->load->view('templates/home_header', $data);
    $this->load->view('category/cook', $data);
    $this->load->view('templates/home_footer');
  }
  public function drink()
  {
    $data['user'] = $this->UserModel->getUsername();
    $data['submenuhome'] = $this->AdminModel->getSubmenuhome();
    $data['menu'] = $this->AdminModel->getMenu();
    $data['title'] = "Homepage";
    $data['posts'] = $this->PostModel->getpostdrink();
    // $data['posts'] = $this->db->order_by('id', 'DESC')->get_where('post', ['id_category' => 1])->result_array();
    $data['categ'] = $this->db->get('categories')->result_array();

    $this->load->view('templates/home_header', $data);
    $this->load->view('category/cook', $data);
    $this->load->view('templates/home_footer');
  }
  public function detailpost($id)
  {
    $data['user'] = $this->UserModel->getUsername();
    $data['submenuhome'] = $this->AdminModel->getSubmenuhome();
    $data['menu'] = $this->AdminModel->getMenu();
    $data['title'] = "Detail Post";
    $data['posts'] = $this->PostModel->getAllPost();


    $data['cate'] = $this->PostModel->getCate();
    $data['pid'] = $this->PostModel->getPostById($id);

    $this->load->view('templates/home_header', $data);
    $this->load->view('post/detailpost', $data);
    $this->load->view('templates/home_footer');
  }
}
