<?
date_default_timezone_set('Asia/Seoul');
defined('BASEPATH') OR exit('No direct script access allowed');

class Free_Board_Create_M extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  public function create()
  {
    // form action 에서 name 값이 동일한 입력 값을 data 변수에 저장
    $data = [
      'board_type' => $this->input->post('board_type'),
      'title' => $this->input->post('title'),
      'content' => $this->input->post('contents'),
      'regdate' => date("Y-m-d H:i:s")
    ];

    $result = $this->db->insert('boards', $data);
    return $result;
  }

}

?>