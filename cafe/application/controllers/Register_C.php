<?

  class Register_C extends CI_Controller
  {

    public function index()
    {

      $this->load->view('header');
      $this->load->view('register_V');

      $this->load->library('form_validation');
      $this->load->model('register_M', 'r_m');
      
    }

    public function register()
    {
      // 폼 벨리데이션으로 폼의 필수값을 지정
      $this->form_validation->set_rules('board_type', 'Board_type', 'required');
      $this->form_validation->set_rules('title', 'Title', 'required');
      $this->form_validation->set_rules('contents', 'Contents', 'required');

      if($this->form_validation->run())
      {
        // board 라는 별칭 안에 store를 실행
        $this->r_m->register();
        // 정상적이면 리다이렉트 실행
        redirect('/login');
      } else {
        echo "Board Create Error..";
        // $this->db->_error_message();
        // echo $this->db->_error_number(); 
      }
    }

  }

?>