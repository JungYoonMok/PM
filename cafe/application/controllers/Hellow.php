<?
defined('BASEPATH') OR exit('No direct script access allowed');

  class Hellow extends CI_Controller
  {

    public function __construct()
    {
      parent::__construct();
    }

    public function index()
    {
      $this->load->model('hellow_model');
      $data['list'] = $this->hellow_model->GetBoardList();
      $data['total'] = $this->hellow_model->GetBoardTotal();
      
      $this->load->view('header');
      $this->load->view('board/hellow_board', $data);
      $this->load->view('footer');
    }

  }

?>