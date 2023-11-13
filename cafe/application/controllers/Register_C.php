<?

class Register_C extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('register_M', 'register_model');
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
      $this->layout->custom_view('register_V', $ssData);
    }
  }

  // 회원가입
  public function register()
  {
    // 폼 벨리데이션으로 폼의 필수값을 지정
    // $this->form_validation->set_rules('nickname', 'NickName', 'required');
    // $this->form_validation->set_rules('user_id', 'ID', 'required');
    // $this->form_validation->set_rules('user_name', 'Name', 'required');
    $this->form_validation->set_rules('user_password_1', 'Password', 'required|matches[user_password_2]');
    $this->form_validation->set_rules('user_password_2', 'Password Check', 'required');
    // $this->form_validation->set_rules('user_phone_2', 'Phone_2', 'required');
    // $this->form_validation->set_rules('user_phone_3', 'Phone_3', 'required');
    // $this->form_validation->set_rules('user_email', 'Email', 'required|valid_email');

    if ($this->form_validation->run()) {
      // 유저 아이디 중복 체크
      if ($this->register_model->userid_check($this->input->post('user_id'))) {
        $this->register_model->register();
      } else {
        echo $this->input->post('UserID') . " 아이디가 이미 존재합니다";
      }
    } else {
      echo "정보 검증 실패";
    }
  }

}

?>