<?
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Members extends CI_Controller {

    public function __construct()
    {
      parent::__construct();
      $this->load->helper( array('form', 'url') );
      $this->load->library(['form_validation', 'session']);
      $this->load->database();
    }

    public function join()
    {
      $this->load->view('login/join');
    }
    
    public function store()
    {
      $this->form_validation->set_rules('email', 'Email', 'required');
      $this->form_validation->set_rules('password', 'Password', 'required');

      if($this->form_validation->run() == FALSE){
        $this->load->view('login/join');
      } else {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $data = array(
          'email' => $email,
          'password' => hash('sha256', $password)
        );

        $this->db->insert('members', $data);

        $sess_data = array('email' => $email);

        $this->session->set_userdata($sess_data);
        redirect('members/list');
      }
    }

    public function list()
    {
      // 페이지네이션
      $this->load->library('pagination');

      $config['base_url'] = '/crud/members/list/';      
      $config['total_rows'] = $this->db->query('SELECT email FROM members')->num_rows();
      $config['per_page'] = '3';
      $config['uri_segment'] = '3'; // base url 칸 수에 따라 조정

      $this->pagination->initialize($config);

      $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;

      $data['pages'] = $this->pagination->create_links();

      $data['list'] = $this->db->query('SELECT * FROM members ORDER BY idx DESC LIMIT '. $page .', '. $config['per_page'])->result();

      $this->load->view('login/list', $data);
    }

    public function login()
    {
      if($this->session->userdata('email')) {
        redirect('/');
      }
      
      $this->form_validation->set_rules('email', 'Email', 'required');
      $this->form_validation->set_rules('password', 'Password', 'required');

      if($this->form_validation->run() == FALSE)
      {
        $this->load->view('login/login');        
      } else {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $members = $this->db->get_where('members', ['email' => $email])->row();
        
        if(!$members) {
          echo "멤버가 존재하지 않습니다.";
          echo "<script>console.log('멤버가 존재하지 않습니다.')</script>";
          echo "<script>alert('멤버가 존재하지 않습니다.')</script>";
        }

        if(!hash('sha256', $password) == $members->password) {
          echo "잘못된 계정 정보 입니다. 다시 입력해 주세요.";
          echo "<script>console.log('잘못된 계정 정보 입니다. 다시 입력해 주세요.')</script>";
          echo "<script>alert('잘못된 계정 정보 입니다. 다시 입력해 주세요.')</script>";
        }

        $data = array(
          'email' => $members->email
        );

        $this->session->set_userdata($data);
        redirect('/');

      }
    }

    public function logout()
    {
      $this->session->sess_destroy();
      redirect('/members/login');
    }

  }

?>