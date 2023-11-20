<?
defined('BASEPATH') OR exit('No direct script access allowed');
date_default_timezone_set('Asia/Seoul');

class Find_Account_C extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->model('Find_Account_M');
  }

  public function index()
  {
    $this->layout->custom_view('Find_Account_V');
  }

  public function find_id()
  {
    $data = array(
      'user_name' => $this->input->post('name', TRUE),
      'user_phone' => $this->input->post('phone', TRUE)
    );

    $result = $this->Find_Account_M->find_id($data);

    if($result) {
      echo json_encode([ 'state' => TRUE, 'message' => '해당하는 계정을 찾았습니다', 'data' => $result->user_id ]);
    } else {
      echo json_encode([ 'state' => FALSE, 'message' => '해당하는 계정이 없습니다' ]);
    }
  }
}

?>