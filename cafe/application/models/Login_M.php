<?
date_default_timezone_set('Asia/Seoul');
defined('BASEPATH') or exit('No direct script access allowed');

class Login_M extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
    $this->load->database();
  }

  // hash 없는거
  // public function check_login($username, $password) {
  //   $this->db->where('user_id', $username);
  //   $this->db->where('user_password', $password); // 실제로는 해시 처리 필요
  //   $query = $this->db->get('members');
  //   return ($query->num_rows() == 1) ? $query->row_array() : false;
  // }

  // hash 있는거
  public function check_login($username, $password)
  {
    $this->db->where('user_id', $username);
    $query = $this->db->get('members');

    if ($query->num_rows() == 1) {
      $user = $query->row_array();
      if (password_verify($password, $user['user_password'])) {
        return $user; // 로그인 성공
      }
    }
    return false; // 로그인 실패
  }

}

?>