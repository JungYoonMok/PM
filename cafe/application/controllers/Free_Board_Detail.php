<?
date_default_timezone_set('Asia/Seoul');
defined('BASEPATH') OR exit('No direct script access allowed');

  class Free_board_Detail extends CI_Controller
  {

    public function __construct() {
      parent::__construct();

      $this->load->model('Free_Board_M', 'FBM');
      $this->load->library('form_validation');
    }
    
    public function show($idx)
    {
      $data['post'] = $this->FBM->get($idx);
      $data['comment'] = $this->FBM->get_comments($idx);

      // $data['list'] = $this->db->query('SELECT * FROM freeboard')->result();
      $data['list'] = $this->db->get_where('boards', [ 'board_type' => '자유게시판' ] )->result();
      // $data['list'] = $this->db->get_where('freeboard', [ 'board_type' => $this->FBM->comment_board_type() ] )->result();

      $this->load->view('board/free_board_detail', $data);
    }

    public function comment_create()
    {
      // 폼 벨리데이션으로 폼의 필수값을 지정
      $this->form_validation->set_rules('board_id', 'Board_id', 'required');
      $this->form_validation->set_rules('board_type', 'Board_type', 'required');
      $this->form_validation->set_rules('contents', 'Contents', 'required');
      $this->form_validation->set_rules('user_id', 'User_id', 'required');

      if($this->form_validation->run())
      {
        // board 라는 별칭 안에 store를 실행
        $this->FBM->comments_create();
        // 정상적이면 리다이렉트 실행
        redirect("/freeboard//".$this->input->post('board_id'));
      } else {
        echo "Board Create Error..";
        // $this->db->_error_message();
        // echo $this->db->_error_number(); 
      }
    }
    
    public function reply_comment_create()
    {
      // $this->FBM->comments_create();
      $this->FBM->reply_create();
    }

  }

?>