<?
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Seoul');

  class My_Activity_C extends CI_Controller {
    public function __construct() {
      parent::__construct();
      $this->load->model('My_Activity_M');
    }

    public function index() {
      $data['list'] = $this->My_Activity_M->get_all_boards();

      $this->layout->custom_view('My_Activity_V', $data);
    }

  }

?>