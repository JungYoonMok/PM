<?
date_default_timezone_set('Asia/Seoul');
defined('BASEPATH') or exit('No direct script access allowed');

class Register_M extends CI_Model {

  public function __construct() {
    parent::__construct();
  }

  public function register() {
    $nickName = $this->input->post('nName');
    $ID = $this->input->post('id');
    $Name = $this->input->post('name');
    $Frofile = ""; // 나중에 구현

    $Password_1 = $this->input->post('password_1');
    $Password_2 = $this->input->post('password_2');

    $Phone_1 = "010";
    $Phone_2 = $this->input->post('phone_2');
    $Phone_3 = $this->input->post('phone_3');

    $Email = $this->input->post('email');
    $Memo = $this->input->post('memo');
    
    // 비밀번호 일치 여부를 확인
    if ($Password_1 !== $Password_2) {
      // 비밀번호가 일치하지 않을 경우, 클라이언트에 오류 메시지를 반환하고 함수 종료
      echo json_encode(['state' => false, 'message' => '비밀번호가 일치하지 않습니다.']);
      return; // 이후 코드 실행 방지
    }

    // 비밀번호 암호화
    $hashed_password = password_hash($Password_1, PASSWORD_DEFAULT);

    $data = [
      'user_nickname' => $nickName,
      'user_id' => $ID,
      'user_name' => $Name,
      'user_password' => $hashed_password,
      'user_phone' => $Phone_1 . "-" . $Phone_2 . "-" . $Phone_3,
      'user_email' => $Email,
      'user_memo' => $Memo,
      'user_profile' => $Frofile,
      'regdate' => date("Y-m-d H:i:s")
    ];

    $result = $this->db->insert('members', $data);
    if ($result) {
      return ['state' => true, 'message' => '회원가입 성공'];
    } else {
      // 데이터베이스 오류 로그를 남기고, 일반적인 오류 메시지 반환
      log_message('error', '회원가입 실패: ' . $this->db->error()['message']);
      return ['state' => false, 'message' => '회원가입 실패'];
    }
  }

  // 유저 아이디 중복 체크
  public function userid_check($ID, $phone, $email) {

    // 빈 값 체크
    if (empty($ID) || empty($email) || empty($phone)) {
      return ['status' => false, 'message' => '아이디, 이메일, 연락처를 확인해주세요'];
    }

    // 아이디 중복 검사
    if ($this->db->get_where('members', ['user_id' => $ID])->num_rows() > 0) {
      return ['status' => false, 'message' => '아이디가 이미 존재합니다'];
    }

    // 휴대폰 번호 중복 검사
    if ($this->db->get_where('members', ['user_phone' => $phone])->num_rows() > 0) {
      return ['status' => false, 'message' => '휴대폰 번호가 이미 존재합니다'];
    }

    // 이메일 중복 검사
    if ($this->db->get_where('members', ['user_email' => $email])->num_rows() > 0) {
      return ['status' => false, 'message' => '이메일이 이미 존재합니다'];
    }

    return ['status' => true];
  }
}

?>