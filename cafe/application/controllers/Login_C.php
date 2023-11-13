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
    $ssData = array(
      'user_id' => $this->session->userdata('user_id'),
      'username' => $this->session->userdata('username'),
      'login' => $this->session->userdata('login'),
    );

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

        //로그인 성공시 session 생성
        // 로그인 성공 후 사용자 정보를 가져오는 로직...
        $user_data = [
          'user_id' => 'test',
          'username' => 'Duckey',
          'login' => TRUE
        ];
        $this->session->set_userdata($user_data);

        $value = $this->session->userdata('userName'); // 세션에서 데이터 가져오기

        echo json_encode(['status' => true, 'message' => '로그인 성공', 'ss_user_id' => $this->session->userdata('user_id')]);
      } else {
        echo json_encode(['status' => false, 'message' => '로그인 실패', 'ss_user_id' => $this->session->userdata('user_id')]);
      }
      
    } else {
      echo json_encode(['status' => false, 'message' => '폼검증 실패', 'detail' => '아이디와 비밀번호를 확인해 주세요', 'ss_user_id' => $this->session->userdata('user_id')]);
    }
    // print_r($this->session->userdata());
  }

}
?>