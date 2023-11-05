<?
  date_default_timezone_set('Asia/Seoul');
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Free_Board_Create extends CI_Controller {

    public function __construct()
    {
      parent::__construct();
      $this->load->library('form_validation');

      // 불러옴과 동시에 별칭 지정 Board_create_model -> board
      $this->load->model('Free_Board_M', 'FBM');
    }
    
    public function index()
    {
      $this->load->view('board/free_board_create');
    }

    public function create()
    {
      // 폼 벨리데이션으로 폼의 필수값을 지정
      $this->form_validation->set_rules('board_type', 'Board_type', 'required');
      $this->form_validation->set_rules('title', 'Title', 'required');
      $this->form_validation->set_rules('contents', 'Contents', 'required');

      if($this->form_validation->run())
      {
        // board 라는 별칭 안에 store를 실행
        $this->FBM->create();
        // 정상적이면 리다이렉트 실행
        redirect('/free_board_list');
      } else {
        echo "Board Create Error..";
        // $this->db->_error_message();
        // echo $this->db->_error_number(); 
      }
    }

  }
?>