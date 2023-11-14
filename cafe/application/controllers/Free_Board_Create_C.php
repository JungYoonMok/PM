<?
  date_default_timezone_set('Asia/Seoul');
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Free_Board_Create_C extends CI_Controller {

    public function __construct()
    {
      parent::__construct();
      $this->load->model('Free_Board_Create_M', 'FBM');
    }
    
    public function index()
    {
      $this->layout->custom_view('board/free_board_create_v');
    }

    public function create()
    {
      // 폼 벨리데이션으로 폼의 필수값을 지정
      $this->form_validation->set_rules('post_type', 'Post_Type', 'required');
      $this->form_validation->set_rules('post_title', 'Post_Title', 'required');
      $this->form_validation->set_rules('post_value', 'Post_Value', 'required');
      $this->form_validation->set_rules('post_open', 'Post_Value', 'required');
      $this->form_validation->set_rules('comment_open', 'Post_Value', 'required');

      // 세션 체크
      if(!$this->session->userdata('user_id')) {
        return [ 'state' => FALSE, 'message' => '로그인이 필요합니다' ];
      }

      $data = [
        'board_type' => $this->input->post('post_type'),
        'title' => $this->input->post('post_title'),
        'content' => $this->input->post('post_value'),
        'user_id' => $this->session->userdata('user_id'),
        'board_state' => $this->input->post('post_open'),
        'board_comment' => $this->input->post('comment_open'),
        'regdate' => date("Y-m-d H:i:s")
      ];

      if($this->form_validation->run())
      {
        $this->FBM->create($data);
        echo json_encode([ 'state' => TRUE, 'message' => '게시글 등록을 성공했습니다' ]);
        // redirect('/freeboard');
      } else {
        // 데이터베이스 오류 로그를 남기고, 일반적인 오류 메시지 반환
        log_message('error', '게시글 등록 실패: ' . $this->db->error()['message']);
        echo json_encode([ 'state' => FALSE, 'message' => '게시글 등록을 실패했습니다' ]);
      }
    }

  }
?>