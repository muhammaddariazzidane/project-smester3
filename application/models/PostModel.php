<?php
defined('BASEPATH') or exit('No direct script access allowed');


class PostModel extends CI_Model
{
  public function getAllPost()
  {
    $query = "SELECT `post`.*,`categories`.`category` FROM `post` JOIN `categories` ON `post`.`id_category` = `categories`.`id` ORDER BY `post`.`id` DESC
";
    return $this->db->query($query)->result_array();
    // return $this->db->order_by('id', 'DESC')->get('post')->result_array();
  }
  public function getpostcook()
  {
    $query = "SELECT `post`.*,`categories`.`category` FROM `post` JOIN `categories` ON `post`.`id_category` = `categories`.`id` WHERE `post`.`id_category` = 1 ORDER BY `post`.`id` DESC
";
    return $this->db->query($query)->result_array();
    // return $this->db->order_by('id', 'DESC')->get('post')->result_array();
  }
  public function getpostdrink()
  {
    $query = "SELECT `post`.*,`categories`.`category` FROM `post` JOIN `categories` ON `post`.`id_category` = `categories`.`id` WHERE `post`.`id_category` = 2 ORDER BY `post`.`id` DESC
";
    return $this->db->query($query)->result_array();
    // return $this->db->order_by('id', 'DESC')->get('post')->result_array();
  }

  public function getCate()
  {
    return $this->db->get('categories')->result_array();
  }
  public function getPostById($id)
  {
    return $this->db->get_where('post', ['id' => $id])->row_array();
  }
  public function create()
  {
    $config['upload_path'] = './assets/img/posts/';
    $config['allowed_types']  = 'gif|jpg|png';
    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('photo')) {
      echo "no foto";
    } else {
      $photo = $this->upload->data();
      $photo = $photo['file_name'];
      $title = $this->input->post('title');
      $description = $this->input->post('description');
      $author = $this->session->userdata('email');
      $id_category = $this->input->post('id_category');

      $data = [
        'title' => $title,
        'description' => $description,
        'author' => $author,
        'id_category' => $id_category,
        'photo' => $photo,
      ];
      $this->db->insert('post', $data);
    }
  }
  public function update()
  {
    $id = $this->input->post('id');
    $config['upload_path'] = './assets/img/posts/';
    $config['allowed_types']  = 'gif|jpg|png';
    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('photo')) {
      $title = $this->input->post('title');
      $description = $this->input->post('description');
      $author = $this->session->userdata('email');
      $id_category = $this->input->post('id_category');

      $data = [
        'title' => $title,
        'description' => $description,
        'author' => $author,
        'id_category' => $id_category,
      ];
      $this->db->where('id', $id);
      $this->db->update('post', $data);
      $this->session->set_flashdata('message', '<div class="flex justify-center items-center m-1 mb-2 font-medium py-2 px-2 bg-white rounded-md text-green-100 bg-green-700 border border-green-300 ">
  <div slot="avatar">
      <i class="fas fa-check-circle mx-2 scale-110"></i>
  </div>
  <div class="text-xl font-normal  max-w-full flex-initial">
  Success update Post</div> 
</div>');
      redirect('post');
    } else {
      $photo = $this->upload->data();
      $photo = $photo['file_name'];
      $title = $this->input->post('title');
      $description = $this->input->post('description');
      $author = $this->session->userdata('email');
      $id_category = $this->input->post('id_category');

      $data = [
        'title' => $title,
        'description' => $description,
        'author' => $author,
        'id_category' => $id_category,
        'photo' => $photo,
      ];
      $this->db->where('id', $id);
      $this->db->update('post', $data);
    }
  }
  public function destroy($id)
  {
    $this->db->delete('post', ['id' => $id]);
  }
}
