<?
defined('BASEPATH') OR exit('No direct script access allowed');

class Members extends CI_Controller {
  public function __construct()
  {
    parent::__construct();
    $this->load->helper( array('from', 'url') );
    $this->load->library(['form_validation', 'session']);
    $this->load->database();
  }

  public function join()
  {
    $this->load->view('login/join');
  }
}
?>