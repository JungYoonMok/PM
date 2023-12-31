<?
date_default_timezone_set('Asia/Seoul');
defined('BASEPATH') or exit('No direct script access allowed');

class Login_M extends CI_Model {

  public function __construct() {
    parent::__construct();
  }

  // 로그인 성공시 사용자 정보 가져오기
  public function userInfo($ID) {
    $this->db->select('*');
    $this->db->from('members');
    $this->db->where('user_id', $this->db->escape_str($ID));
    $query = $this->db->get();
    
    return $query->row_array();
  }
  public function check_login($username, $password) {
    $username_S = $this->db->escape_str($username);
    $password_S = $this->db->escape_str($password);

    $this->db->where('user_id', $username_S);
    $query = $this->db->get('members');
  
    if ($query->num_rows() == 1) {
      $user = $query->row_array();
      if (password_verify($password_S, $user['user_password'])) 
      {
        return $user; // 로그인 성공
      } else {
        // 비밀번호가 일치하지 않는 경우
        error_log('Password does not match');
      }
    } else {
      // 사용자 이름이 데이터베이스에 없는 경우
      error_log('User not found');
    }
    return false; // 로그인 실패
  }

  // 마지막 로그인 시간 업데이트
  public function last_login_logout($ID, $STATE = '') {
    $this->db->set($STATE === 'login' ? 'last_login' : 'last_logout', date("Y-m-d H:i:s"));
    $this->db->where('user_id', $this->db->escape_str($ID));
    $this->db->update('members');

    // 로그인 기록
    if($STATE === 'login') {
      $this->db->insert('members_login_logout', [
        'log' => $ID.'님이 로그인 하셨습니다',
        'state' => 'login',
        'ip' => $this->input->ip_address(),
        'user_id' => $this->db->escape_str($ID),
        'regdate' => date("Y-m-d H:i:s"),
      ]);
    } else {
      $this->db->insert('members_login_logout', [
        'log' => $ID.'님이 로그아웃 하셨습니다',
        'state' => 'logout',
        'ip' => $this->input->ip_address(),
        'user_id' => $this->db->escape_str($ID),
        'regdate' => date("Y-m-d H:i:s"),
      ]);
    }
  }

}

?>