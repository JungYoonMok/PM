<?

  class Register_C extends CI_Controller
  {

    public function __construct()
    {
      parent::__construct();
      $this->load->library('layout');
      $this->load->library('form_validation');
      $this->load->model('register_M', 'r_m');
      $this->load->helper('url');
    }

    public function index()
    {
      $this->layout->custom_view('register_V');
    }

    public function register()
    {
      // 폼 벨리데이션으로 폼의 필수값을 지정
      $this->form_validation->set_rules('nickname', 'NickName', 'required');
      $this->form_validation->set_rules('user_id', 'ID', 'required');
      $this->form_validation->set_rules('user_name', 'Name', 'required');
      $this->form_validation->set_rules('user_password_1', 'Password', 'required|matches[user_password_2]');
      $this->form_validation->set_rules('user_password_2', 'Password Check', 'required');
      $this->form_validation->set_rules('user_phone_1', 'Phone_1', 'required');
      $this->form_validation->set_rules('user_phone_2', 'Phone_2', 'required');
      $this->form_validation->set_rules('user_phone_3', 'Phone_3', 'required');
      $this->form_validation->set_rules('user_email', 'Email', 'required|valid_email');

      if($this->form_validation->run())
      {
        $this->r_m->register();
        redirect('/login');
      } else {
        // echo "정보 검증 실패.";
        $this->form_validation->set_message('error_message',  '폼 검증 실패.');
      }
    }

  }

?>