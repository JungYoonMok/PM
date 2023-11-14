<?
date_default_timezone_set('Asia/Seoul');
defined('BASEPATH') OR exit('No direct script access allowed');

class Free_Board_Create_M extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  public function create($data)
  {
    $result = $this->db->insert('boards', $this->db->escape_str($data));
    if($result) {
      return [ 'state' => TRUE, 'message' => '게시글 등록 성공' ];
    } else {
      log_message('error', '게시글 등록 실패: ' . $this->db->error()['message']);
      return [ 'state' => FALSE, 'message' => '게시글 등록 실패' ];
    }
  }

}

?>