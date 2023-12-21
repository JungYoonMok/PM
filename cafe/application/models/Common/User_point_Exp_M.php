<?
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Seoul');

class user_point_exp_M extends CI_Model {

  public function __construct() {
    parent::__construct();
  }

  public function point_exp_add($title, $content) {
    // 데이터 유효성 검사
    if (empty($title) || empty($content)) {
      // 적절한 오류 처리
      return false;
    }

    // 데이터 준비
    $data = array(
      'title' => $title,
      'content' => $content,
      'point' => rand(1, 50),
      'exp' => rand(1, 150),
      'members_user_id' => $this->session->userdata('user_id'),
      'regdate' => date("Y-m-d H:i:s")
    );

    // 데이터베이스 삽입
    $this->db->insert('point_exp_log', $data);

    // 삽입 성공 여부 반환
    return ($this->db->affected_rows() != 1) ? false : true;
  }

}

?>