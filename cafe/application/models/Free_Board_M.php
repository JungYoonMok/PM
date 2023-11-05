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
      $comment = $this->db->get_where('freeboard_comments', [ 'board_id' => $idx ] )->result();
      return $comment;
    }

    public function comments_create()
    {
      // form action 에서 name 값이 동일한 입력 값을 data 변수에 저장
      $data = [
        'board_id' => $this->input->post('board_id'),
        'board_type' => $this->input->post('board_type'),
        'contents' => $this->input->post('contents'),
        'user_id' => $this->input->post('user_id'),
        'regdate' => date("Y-m-d H:i:s")
      ];

      $result = $this->db->insert('freeboard_comments', $data);
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
        'contents' => $this->input->post('contents'),
        'regdate' => date("Y-m-d H:i:s")
      ];

      $result = $this->db->insert('freeboard', $data);
      return $result;
    }

    public function get($idx)
    {
      $board = $this->db->get_where('freeboard', [ 'idx' => $idx ] )->row();
      return $board;
    }

    public function update()
    {

    }
    
  
    public function GetBoardList()
    {
      $this->load->database();
      $result = $this->db->query('SELECT * FROM freeboard')->result();
      $this->db->close();
      
      return $result;
    }
    
    public function GetBoardTotal()
    {
      $this->load->database();
      $result = $this->db->query('SELECT idx FROM freeboard')->num_rows();
      $this->db->close();
      
      return $result;
    }

  }

?>