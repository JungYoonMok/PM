<?
defined('BASEPATH') or exit('No direct script access allowed');

class Login_C extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('login_M', 'login_model');
    // $this->load->library('session');
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
      'user_lastlogin' => $this->session->userdata('lastlogin'),
      'user_lastlogout' => $this->session->userdata('lastlogout'),
      'regdate' => $this->session->userdata('regdate'),
      'login' => TRUE
    ];

    $this->layout->custom_view('login_V', $ssData);
  }

  public function login()
  {
    $this->form_validation->set_rules('username', '아이디', 'required');
    $this->form_validation->set_rules('password', '비밀번호', 'required');

    $username = $this->input->post('username');
    $password = $this->input->post('password');

    if($this->form_validation->run() == TRUE){
      
      $user = $this->login_model->check_login($username, $password);
      if ($user) 
      {
        
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
          'user_lastlogin' => $data['lastlogin'],
          'user_lastlogout' => $data['lastlogout'],
          'regdate' => $data['regdate'],
          'login' => TRUE
        ];
        
        $this->session->set_userdata($user_data);
        
        echo json_encode([ 'status' => true, 'message' => '로그인 성공' ]);
      } else {
        echo json_encode([ 'status' => false, 'message' => '로그인 실패' ]);
      }
      
    } else {
      echo json_encode([ 'status' => false, 'message' => '폼검증 실패', 'detail' => '아이디와 비밀번호를 확인해 주세요' ]);
    }

  }

}
?>