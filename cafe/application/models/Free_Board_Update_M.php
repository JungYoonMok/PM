<?
date_default_timezone_set('Asia/Seoul');
defined('BASEPATH') OR exit('No direct script access allowed');

class Free_Board_Update_M extends CI_Model {

  public function __construct() {
    parent::__construct();
  }

  public function get($idx) {
    $this->db->where('idx', $idx);
    $result = $this->db->get('boards')->row();
    return $result;
  }

  public function post_update($idx, $data) {
    try {
      $this->db->where('idx', $idx);
      $this->db->update('boards', $data);
      return true;
    } catch (Exception $e) {
      log_message('error', '게시글 수정 실패: ' . $this->db->error()['message']);
      return false;
    }
  }

  public function get_file($idx) {
    $board = $this->db->get_where('upload_file', ['boards_idx' => $idx]);
    return $board->result();
  }

  public function insert_file($data) {
    $result = $this->db->insert('upload_file', $data);
    if($result) {
      
      return TRUE;
    } else {
      log_message('error', '게시글 등록 실패: ' . $this->db->error()['message']);
      return FALSE;
    }
  }

  public function file_delete($idx) {
    $this->db->where('boards_idx', $idx);
    // $this->db->where('file_name', $file_name);
    // $this->db->where('full_path', $full_path);
    $result = $this->db->delete('upload_file');
    if($result) {
      return TRUE;
    } else {
      log_message('error', '파일 삭제 실패: ' . $this->db->error()['message']);
      return FALSE;
    }
  }

}

?>