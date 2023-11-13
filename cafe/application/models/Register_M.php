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
    // $nickName = $this->input->post('nickname');
    $ID = $this->input->post('user_id');
    // $Name = $this->input->post('user_name');
    // $Frofile = "없음"; // 나중에 구현

    $Password_1 = $this->input->post('password_1');
    $Password_2 = $this->input->post('password_2');

    // $Phone_1 = "010";
    // $Phone_2 = $this->input->post('user_phone_2');
    // $Phone_3 = $this->input->post('user_phone_3');

    // $Email = $this->input->post('user_email');
    // $Memo = $this->input->post('user_memo');

    // 비밀번호 암호화
    $hashed_password = password_hash($Password_1, PASSWORD_DEFAULT);

    $data = [
      // 'user_name' => $Name,
      // 'user_nickname' => $nickName,
      // 'user_frofile' => $Frofile,
      // 'user_email' => $Email,
      // 'user_phone' => $Phone_1 . "-" . $Phone_2 . "-" . $Phone_3,
      // 'user_memo' => $Memo,
      'user_id' => $ID,
      'user_password' => $hashed_password,
      'regdate' => date("Y-m-d H:i:s")
    ];

    // 비밀번호 일치 여부를 확인
    if ($Password_1 !== $Password_2) {
      // 비밀번호가 일치하지 않을 경우, 클라이언트에 오류 메시지를 반환하고 함수 종료
      echo json_encode(['state' => false, 'message' => '비밀번호가 일치하지 않습니다.']);
      return; // 이후 코드 실행 방지
    }

    $result = $this->db->insert('members', $data);
    if ($result) {
      echo json_encode(['state' => true, 'message' => '회원가입 성공']);
    } else {
      echo json_encode(['state' => false, 'message' => '회원가입 실패']);
    }
    exit; // 추가 출력 방지
  }

  // 유저 아이디 중복 체크
  public function userid_check($ID) {
    if ($ID) {
      // $result = array();
      $sql = "SELECT user_id FROM members WHERE user_id = '" . $this->db->escape_str($ID) . "';";
      $result = $this->db->query($sql)->row();
      if ($result) {
        // $this->form_validation->set_message('userid_check', $ID . '은(는) 중복된 아이디 입니다.');
        return FALSE;
      } else {
        return TRUE;
      }
    } else {
      return FALSE;
    }
  }
}

?>