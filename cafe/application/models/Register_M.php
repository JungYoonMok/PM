<?
date_default_timezone_set('Asia/Seoul');
defined('BASEPATH') OR exit('No direct script access allowed');

  class Register_M extends CI_Model{

    public function __construct()
    {
      parent::__construct();
    }

    public function register()
    {
      $idx = $this->input->post('comment_id');
      $board_id = $this->input->post('board_id');
      $board_ceontent = $this->input->post('contents');
      $group_idx = $this->input->post('group_idx');
      $group_order = $this->input->post('group_order');
      $depth = $this->input->post('depth');
      $user_id = $this->input->post('user_id');

      $data = [
        'boards_idx' => $board_id,
        'group_idx' => $idx." +1",
        'group_order' => '0',
        'depth' => '1',
        'content' => $board_ceontent,
        'user_id' => $user_id,
        'regdate' => date("Y-m-d H:i:s")
      ];
      
      $this->db->insert('boards_comment', $data);
    }

  }

?>