<?
defined('BASEPATH') or exit('No direct script access allowed');

class Login_C extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->library('layout');
    $this->load->model('login_M', 'login_model');
  }

  public function index()
  {
    $this->layout->custom_view('login_V');
  }

  public function login()
  {
    // $hashed_password = password_hash($Password_1, PASSWORD_DEFAULT);
    // $password = $this->input->post('password'); // 실제로는 해시 처리 필요

    $username = $this->input->post('username');
    $password = password_hash($this->input->post('password'), PASSWORD_DEFAULT);
    
    $user = $this->login_model->check_login($username, $password);
    if ($user) {
      echo json_encode(['status' => true, 'message' => '로그인 성공']);
    } else {
      echo json_encode(['status' => false, 'message' => '로그인 실패']);
    }
  }

  public function check_login($username, $password)
  {
    $this->db->where('username', $username);
    $query = $this->db->get('users');

    if ($query->num_rows() == 1) {
      $user = $query->row_array();
      if (password_verify($password, $user['password'])) {
        return $user; // 로그인 성공
      }
    }
    return false; // 로그인 실패
  }

}
?>