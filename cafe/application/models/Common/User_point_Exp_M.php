<?
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Seoul');

class user_point_exp_M extends CI_Model {

  public function __construct() {
    parent::__construct();
  }

  public function point_exp_add($title, $content) {
    $this->db->insert('point_exp_log', [
      'title' => $title,
      'content' => $content,
      'point' => rand(1, 50),
      'exp' => rand(1, 150),
      'members_user_id' => $this->session->userdata('user_id'),
      'regdate' => date("Y-m-d H:i:s")
    ]);
  }

}

?>