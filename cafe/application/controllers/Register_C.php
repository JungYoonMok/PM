<?
date_default_timezone_set('Asia/Seoul');
defined('BASEPATH') or exit('No direct script access allowed');

class Register_C extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('register_M', 'register_model');
  }

  public function index() {
    // 세션 데이터를 뷰 페이지로 전달
    $ssData = [
      'user_name' => $this->session->userdata('user_name'),
      'user_nickname' => $this->session->userdata('user_nickname'),
      'user_profile' => $this->session->userdata('user_profile'),
      'user_email' => $this->session->userdata('user_email'),
      'user_phone' => $this->session->userdata('user_phone'),
      'user_memo' => $this->session->userdata('user_memo'),
      'user_id' => $this->session->userdata('user_id'),
      'last_login' => $this->session->userdata('last_login'),
      'last_logout' => $this->session->userdata('last_logout'),
      'regdate' => $this->session->userdata('regdate'),
      'login' => TRUE
    ];

    // 세션에 로그인 상태일 때
    if($ssData['user_id'] && $ssData['login'] == TRUE){
      redirect('/');
    } else {
      $this->layout->custom_view('register_V', $ssData);
    }
  }

  // 회원가입
  public function register() {
    // 폼 벨리데이션으로 폼의 필수값을 지정
    $this->form_validation->set_rules('nName', 'NickName', 'required');
    $this->form_validation->set_rules('id', 'ID', 'required');
    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('password_1', 'Password', 'required|matches[password_2]');
    $this->form_validation->set_rules('password_2', 'Password Check', 'required');
    $this->form_validation->set_rules('phone_1', 'Phone_1', 'required');
    $this->form_validation->set_rules('phone_2', 'Phone_2', 'required');
    $this->form_validation->set_rules('phone_3', 'Phone_3', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    // $this->form_validation->set_rules('memo', 'Memo', 'required');

    if ($this->form_validation->run()) {

      // 유저 아이디 중복 체크
      $user_id = $this->input->post('id');
      $user_check = $this->register_model->userid_check($user_id);

      if ($user_check) {
        // 모델의 register 함수 호출
        $response = $this->register_model->register();
        echo json_encode($response);
      } else {
        echo json_encode([ 'state' => FALSE, 'message' => '아이디가 이미 존재합니다' ]);
      }

    } else {
      // 폼 벨리데이션 실패 시 오류 메시지 반환
      echo json_encode([ 'state' => FALSE, 'message' => '정보 검증에 실패했습니다',  'detail' => '입력한 정보를 다시 확인해 주세요' ]);
    }
    exit; // 추가 출력 방지
  }

}

?>