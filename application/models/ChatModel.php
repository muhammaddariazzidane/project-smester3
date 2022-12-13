<?php
defined('BASEPATH') or exit('No direct script access allowed');


class ChatModel extends CI_Model
{
  public function getAllChat()
  {
    return $this->db->order_by('id', 'DESC')->get('chat')->result_array();
  }
  public function createMessage()
  {
    $data = [
      'message' => $this->input->post('message', true),
      'author' => $this->session->userdata('email'),
    ];
    $this->db->insert('chat', $data);
  }
}
