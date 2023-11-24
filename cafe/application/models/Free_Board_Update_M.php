<?
date_default_timezone_set('Asia/Seoul');
defined('BASEPATH') OR exit('No direct script access allowed');

class Free_Board_Update_M extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  public function get($idx)
  {
    $this->db->where('idx', $idx);
    $result = $this->db->get('boards')->row();
    return $result;
  }

  public function post_update($idx, $data)
  {
    try {
      $this->db->where('idx', $idx);
      $this->db->update('boards', $data);
      return true;
    } catch (Exception $e) {
      log_message('error', '게시글 수정 실패: ' . $this->db->error()['message']);
      return false;
    }

    // $result = $this->db->insert('boards', $this->db->escape_str($data));
    // if($result) {
    //   return [ 'state' => TRUE, 'message' => '게시글 수정 성공' ];
    // } else {
    //   log_message('error', '게시글 수정 실패: ' . $this->db->error()['message']);
    //   return [ 'state' => FALSE, 'message' => '게시글 수정 실패' ];
    // }
  }

}

?>