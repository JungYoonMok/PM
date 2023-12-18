<?
date_default_timezone_set('Asia/Seoul');
defined('BASEPATH') or exit('No direct script access allowed');

class Login_C extends CI_Controller {

  public function __construct() {
    parent::__construct();
    $this->load->model('login_M', 'login_model');
  }

  public function index() {
    // 세션에 로그인 상태일 때
    if($this->session->userdata('user_id') && $this->session->userdata('login') == TRUE){
      redirect('/');
    } else {
      $this->layout->custom_view('login_V');
    }
  }

  public function login() {
    $form_config = [
      [
        'field' => 'username',
        // 'field' => 'user_id',
        'label' => '아이디',
        'rules' => 'required|min_length[4]|max_length[10]|alpha_numeric',
        'errors' => [
          'required' => '아이디를 입력해 주세요',
          'min_length' => '아이디는 최소 4자 이상 입력해 주세요',
          'max_length' => '아이디는 최대 10자 이하 입력해 주세요',
          'alpha_numeric' => '아이디는 영문과 숫자만 입력해 주세요'
        ]
      ],
      [
        'field' => 'password',
        // 'field' => 'user_pw',
        'label' => '비밀번호',
        'rules' => 'required|min_length[6]|max_length[20]',
        'errors' => [
          'required' => '비밀번호를 입력해 주세요',
          'min_length' => '비밀번호는 최소 6자 이상 입력해 주세요',
          'max_length' => '비밀번호는 최대 20자 이하 입력해 주세요'
        ]
      ]
    ];
    $this->form_validation->set_rules($form_config);

    $username = $this->input->post('username');
    $password = $this->input->post('password');

    if($this->form_validation->run() == TRUE){
      
      $user = $this->login_model->check_login($username, $password);
      if ($user) {

        // 마지막 로그인 시간 업데이트
        $this->login_model->last_login_logout($username, 'login');

        $data = $this->login_model->userInfo($username);
        
        //로그인 성공시 session 생성 및 저장
        $user_data = [
          'user_name' => $data['user_name'],
          'user_nickname' => $data['user_nickname'],
          'user_profile' => $data['user_profile'],
          'user_email' => $data['user_email'],
          'user_phone' => $data['user_phone'],
          'user_memo' => $data['user_memo'],
          'user_id' => $data['user_id'],
          // 'user_password' => $data['user_password'],
          'last_login' => $data['last_login'],
          'last_logout' => $data['last_logout'],
          'regdate' => $data['regdate'],
          'login' => TRUE
        ];
        
        $this->session->set_userdata($user_data);

        echo json_encode([ 'state' => true, 'message' => '로그인 성공' ]);
      } else {
        echo json_encode([ 
          'state' => false,
          'message' => '로그인 정보를 다시 확인해 주세요',
          'detail' => '아이디 또는 비밀번호가 일치하지 않습니다'
        ]);
      }
      
    } else {
      echo json_encode([ 
        'state' => false,
        'message' => '폼검증 실패',
        'detail' => validation_errors()
      ]);
    }
  }
  
  // 로그아웃 처리
  public function logout() {
    // 마지막 로그아웃 시간 업데이트
    $ID = $this->session->userdata('user_id');
    $this->login_model->last_login_logout($ID, 'logout');

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
    return;
  }
}
?>