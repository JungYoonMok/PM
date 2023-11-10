<?
  class Login_C extends CI_Controller
  {
    public function __construct()
    {
      parent::__construct();
      $this->load->library('layout');
      $this->load->model('login_M');
    }

    public function index()
    {
      $this->layout->custom_view('login_V');
    }

    public function get_data() {
      $data = $this->login_M->get_data_from_db();

      // JSON 형식으로 데이터를 반환합니다.
      $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }
    
    public function user_data() {
      $user_id = $this->input->post('user_id');
      $data = $this->login_M->user($user_id);
      $this->login_M->user();

      // JSON 형식으로 데이터를 반환합니다.
      $this->output->set_content_type('application/json')->set_output(json_encode($data));
    }

    public function login() {
      $username = $this->input->post('user_id');
      $password = $this->input->post('user_pw');

      // 모델을 통해 로그인 검증
      $result = $this->login_M->verify_login($username, $password);

      // 로그인 결과를 클라이언트에게 전송
      $this->output->set_content_type('application/json')->set_output(json_encode($result));
    }

  }
?>