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
    $this->form_validation->set_rules('password_1', 'Password', 'required|matches[password_2]');
    $this->form_validation->set_rules('password_2', 'Password Check', 'required');
    // $this->form_validation->set_rules('user_phone_2', 'Phone_2', 'required');
    // $this->form_validation->set_rules('user_phone_3', 'Phone_3', 'required');
    // $this->form_validation->set_rules('user_email', 'Email', 'required|valid_email');

    if ($this->form_validation->run()) {
      // 유저 아이디 중복 체크
      $user_check = $this->register_model->userid_check($this->input->post('username'));
      if ($user_check) {
        // Model의 register 함수 호출 (여기서 비밀번호 일치 여부를 확인함)
        $this->register_model->register();
      } else {
        echo json_encode([ 'state' => FALSE, 'message' => '아이디가 이미 존재합니다' ]);
      }
    } else {
      // 폼 벨리데이션 실패 시 오류 메시지 반환
      echo json_encode([ 'state' => FALSE, 'message' => '정보 검증 실패!' ]);
    }
    exit; // 추가 출력 방지
  }

}

?>