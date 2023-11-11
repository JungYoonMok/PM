<?
date_default_timezone_set('Asia/Seoul');
defined('BASEPATH') OR exit('No direct script access allowed');

include('./password.php');

  class Login_M extends CI_Model{

    public function __construct()
    {
      parent::__construct();
      $this->load->database();
    }

    public function get_data_from_db() {
      $query = $this->db->get('members');

      // 결과를 배열로 반환
      return $query->result_array();
    }
    
    public function user($user_id) {
      $query1 = $this->db->get('members');
      $query2 = $this->db->get_where('members', array( 'user_id' => $user_id ) );

      // 결과를 배열로 반환
      return $query2->result_array();
    }

    public function verify_login($username, $password) {
      // 데이터베이스에서 사용자 정보 가져오기 (예시: users 테이블 사용)
      $query = $this->db->get_where('members', array('user_id' => $username));

      if ($query->num_rows() > 0) {
        $user = $query->row_array();

        // 비밀번호 검증 (예시: password_verify 함수 사용)
        if (password_verify($password, $user['user_password'])) {
          $result = array('status' => 'success', 'message' => '로그인 성공');
        } else {
          $result = array('status' => 'error', 'message' => '비밀번호가 일치하지 않습니다.');
        }
      } else {
        $result = array('status' => 'error', 'message' => '사용자를 찾을 수 없습니다.');
      }

      return $result;
    }

    public function authenticate($username, $password) {
      // 사용자 인증 로직을 구현합니다.
      // 실제로는 비밀번호 해싱 및 데이터베이스에서의 확인이 필요합니다.
      // 여기서는 간단한 예시로 사용자가 존재하면 사용자 정보를 반환합니다.
      $user = $this->db->where('user_id', $username)->where('user_password', $password)->get('members')->row_array();

      return $user;
    }

    public function verify_member($user_id, $user_password) {
      $this->db->where('user_id', $user_id);
      $this->db->where('user_password', $user_password);
      // $this->db->where('user_password', md5($user_pw)); // 비밀번호는 해시 처리
      $query = $this->db->get('members');

      if ($query->row() == 1) {
          return true; // 사용자 찾음
      } else {
          return false; // 사용자 없음
      }
    }

  }

?>