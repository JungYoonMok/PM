<?
date_default_timezone_set('Asia/Seoul');
defined('BASEPATH') OR exit('No direct script access allowed');

  class Free_Board_M extends CI_Model
  {

    public function __construct()
    {
      parent::__construct();

      $this->load->database();
      $this->load->helper('url');
    }

    public function get_comments($idx)
    {
      $comment = $this->db->get_where('boards_comment', [ 'group_idx' => $idx ] )->result();
      return $comment;
    }

    public function comments_create()
    {
      // form action 에서 name 값이 동일한 입력 값을 data 변수에 저장
      $data = [
        'group_idx' => $this->input->post('board_id'),
        // 'board_type' => $this->input->post('board_type'),
        'content' => $this->input->post('contents'),
        'user_id' => $this->input->post('user_id'),
        'regdate' => date("Y-m-d H:i:s")
      ];

      $result = $this->db->insert('boards_comment', $data);
      return $result;
    }
    
    public function reply_comments_create()
    {
      // form action 에서 name 값이 동일한 입력 값을 data 변수에 저장
      $data = [
        'group_idx' => $this->input->post('board_id'),
        // 'board_type' => $this->input->post('board_type'),
        'content' => $this->input->post('contents'),
        'user_id' => $this->input->post('user_id'),
        'regdate' => date("Y-m-d H:i:s")
      ];

      $result = $this->db->insert('boards_comment', $data);
      return $result;
    }

    public function comment_board_type()
    {
      return $this->input->post('board_type');
    }

    public function create()
    {
      // form action 에서 name 값이 동일한 입력 값을 data 변수에 저장
      $data = [
        'board_type' => $this->input->post('board_type'),
        'title' => $this->input->post('title'),
        'content' => $this->input->post('contents'),
        'regdate' => date("Y-m-d H:i:s")
      ];

      $result = $this->db->insert('boards', $data);
      return $result;
    }

    public function get($idx)
    {
      $board = $this->db->get_where('boards', [ 'idx' => $idx ] )->row();
      return $board;
    }

    public function update()
    {

    }
    
  
    public function GetBoardList()
    {
      $this->load->database();
      $result = $this->db->query('SELECT * FROM boards')->result();
      $this->db->close();
      
      return $result;
    }
    
    public function GetBoardTotal()
    {
      $this->load->database();
      $result = $this->db->query('SELECT idx FROM boards')->num_rows();
      $this->db->close();
      
      return $result;
    }

  }

?>