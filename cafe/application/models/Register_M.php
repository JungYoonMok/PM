<?
date_default_timezone_set('Asia/Seoul');
defined('BASEPATH') or exit('No direct script access allowed');

class Register_M extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  public function register()
  {
    $nickName = $this->input->post('nName');
    $ID = $this->input->post('id');
    $Name = $this->input->post('name');
    $Frofile = "없음"; // 나중에 구현

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
      'user_frofile' => $Frofile,
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
  public function userid_check($ID) {
    if (empty($ID)) {
      return false;
    }

    // 쿼리 빌더를 사용하여 중복 아이디 체크
    $query = $this->db->get_where('members', ['user_id' => $ID]);
    // 타입과 값이 0인지
    return $query->num_rows() === 0;

  }
}

?>