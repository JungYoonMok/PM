<?
  date_default_timezone_set('Asia/Seoul');
  defined('BASEPATH') OR exit('No direct script access allowed');

  class Free_Board_View extends CI_Controller
  {

    public function __construct()
    {
      parent::__construct();
    }
    
    public function index()
    {
      $this->load->model('Free_Board_M', 'FBM');
      $data['list'] = $this->FBM->GetBoardList();
      $data['total'] = $this->FBM->GetBoardTotal();
      
      // $this->load->view('header');
      $this->load->view('board/free_board_view', $data);
      // $this->load->view('footer');
    }

  }
?>