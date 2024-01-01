<?
date_default_timezone_set('Asia/Seoul');
defined('BASEPATH') or exit('No direct script access allowed');

class User_Information_M extends CI_Model {
  
  public function __construct() {
    parent::__construct();
  }

  public function user_last_login_logout($user_id, $type) {
    // $this->db->select('idx, title, group_order');
    $this->db->where('user_id', $user_id);
    $this->db->where('state', $type);
    $this->db->order_by('idx', 'desc');
    $this->db->limit(1);
    $data = $this->db->get('members_login_logout')->row();
    return $data;
  }

  public function user_data($id) {
    $user_data = $this->db->get_where('members', [ 'user_id' => $id ])->row();
    return $user_data;
  }

  public function profile_upload($file_data) {
    try {
      // 파일 업로드
      $this->db->insert('upload_file', $file_data);

      // 업로드한 파일로 수정
      $this->db->set('user_profile', $file_data['file_name']);
      $this->db->where('user_id', $this->session->userdata('user_id'));
      $this->db->update('members');
      
      return TRUE;
    } catch (Exception $e) {
      log_message('error', '프로필 사진 업로드 실패: ' . $e->getMessage());
      return FALSE;
    }
  }

  public function delete_profile($profileId) {
    $this->db->where('file_name', $profileId);
    return $this->db->delete('upload_file'); // 'upload_file'은 프로필 사진을 저장하는 테이블 이름
  }

  public function update_profile($userId, $profileId) {
    // 먼저 해당 프로필 사진의 파일명을 가져옵니다
    $this->db->select('file_name');
    $this->db->where('file_name', $profileId);
    $profile = $this->db->get('upload_file')->row();

    if ($profile) {
      // 사용자 정보를 업데이트합니다
      $this->db->set('user_profile', $profile->file_name);
      $this->db->where('user_id', $userId);
      return $this->db->update('members');
    }

    return FALSE;
  }

  public function user_profile_show($user_id) {
    $this->db->limit(50);
    $data = $this->db->get_where('upload_file', [ 'boards_idx' => '0', 'user_id' => $user_id ]);
    if($data->num_rows() > 0) {
      return $data->result();
    } else {
      return FALSE;
    }
  }

  public function update_nickname($data) {
    $this->db->where( 'user_id', $data['user_id'] );
    $this->db->update('members', [ 'user_nickname' => $data['user_nickname'] ]);

    if ($this->db->affected_rows() > 0) {
      return TRUE;
    } else {
      log_message('error', '닉네임 변경 실패: ' . $this->db->error()['message']);
      return FALSE;
    }
  }

  public function update_password($data) {
    $this->db->where( 'user_id', $data['user_id'] );
    $this->db->update('members', [ 'user_password' => password_hash($this->db->escape_str($data['user_password']), PASSWORD_DEFAULT) ]);

    if ($this->db->affected_rows() > 0) {
      return TRUE;
    } else {
      log_message('error', '닉네임 변경 실패: ' . $this->db->error()['message']);
      return FALSE;
    }
  }

  public function update_email($data) {
    $this->db->where( 'user_id', $data['user_id'] );
    $this->db->update('members', [ 'user_email' => $data['user_email'] ]);

    if ($this->db->affected_rows() > 0) {
      return TRUE;
    } else {
      log_message('error', '이메일 변경 실패: ' . $this->db->error()['message']);
      return FALSE;
    }
  }

  public function update_phone($data) {
    $this->db->where( 'user_id', $data['user_id'] );
    $this->db->update('members', [ 'user_phone' => $data['user_phone'] ]);

    if ($this->db->affected_rows() > 0) {
      return TRUE;
    } else {
      log_message('error', '연락처 변경 실패: ' . $this->db->error()['message']);
      return FALSE;
    }
  }

  public function update_memo($data) {
    $this->db->where( 'user_id', $data['user_id'] );
    $this->db->update('members', [ 'user_memo' => $data['user_memo'] ]);

    if ($this->db->affected_rows() > 0) {
      return TRUE;
    } else {
      log_message('error', '소개 변경 실패: ' . $this->db->error()['message']);
      return FALSE;
    }
  }

}

?>