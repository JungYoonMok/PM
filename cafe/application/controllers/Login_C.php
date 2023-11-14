<?
defined('BASEPATH') or exit('No direct script access allowed');

class Login_C extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('login_M', 'login_model');
  }

  public function index()
  {
    // 세션 데이터를 뷰 페이지로 전달
    $ssData = [
      'user_name' => $this->session->userdata('user_name'),
      'user_nickname' => $this->session->userdata('user_nickname'),
      'user_frofile' => $this->session->userdata('user_frofile'),
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
      $this->layout->custom_view('login_V', $ssData);
    }
  }

  public function login()
  {
    $this->form_validation->set_rules('username', '아이디', 'required');
    $this->form_validation->set_rules('password', '비밀번호', 'required');

    $username = $this->input->post('username');
    $password = $this->input->post('password');

    if($this->form_validation->run() == TRUE){
      
      $user = $this->login_model->check_login($username, $password);
      if ($user) {

        // 마지막 로그인 시간 업데이트
        $ID = $this->input->post('username');
        $this->login_model->last_login_logout($ID, 'login');

        $data = $this->login_model->userInfo($username);
        
        //로그인 성공시 session 생성 및 저장
        $user_data = [
          'user_name' => $data['user_name'],
          'user_nickname' => $data['user_nickname'],
          'user_frofile' => $data['user_frofile'],
          'user_email' => $data['user_email'],
          'user_phone' => $data['user_phone'],
          'user_memo' => $data['user_memo'],
          'user_id' => $data['user_id'],
          'last_login' => $data['last_login'],
          'last_logout' => $data['last_logout'],
          'regdate' => $data['regdate'],
          'login' => TRUE
        ];
        
        $this->session->set_userdata($user_data);

        echo json_encode([ 'state' => true, 'message' => '로그인 성공' ]);
      } else {
        echo json_encode([ 'state' => false, 'message' => '로그인 정보를 다시 확인해 주세요' ]);
      }
      
    } else {
      echo json_encode([ 'state' => false, 'message' => '폼검증 실패', 'detail' => '아이디와 비밀번호를 확인해 주세요' ]);
    }
  }
  
  // 로그아웃 처리
  public function logout()
  {
    // 마지막 로그아웃 시간 업데이트
    $ID = $this->session->userdata('user_id');
    $this->login_model->last_login_logout($ID, 'logout');

    try {
      $this->session->unset_userdata('user_name');
      $this->session->unset_userdata('user_nickname');
      $this->session->unset_userdata('user_frofile');
      $this->session->unset_userdata('user_email');
      $this->session->unset_userdata('user_phone');
      $this->session->unset_userdata('user_memo');
      $this->session->unset_userdata('user_id');
      $this->session->unset_userdata('last_login');
      $this->session->unset_userdata('last_logout');
      $this->session->unset_userdata('regdate');
      $this->session->unset_userdata('login');

      session_destroy();

      echo json_encode([ 'state' => true, 'message' => '로그아웃 처리 성공' ]);
    } catch (Exception $e) {
      echo json_encode([ 'state' => false, 'message' => '로그아웃 처리 실패', 'Erorr: ' => $e.message ]);
    }
  }

}
?>