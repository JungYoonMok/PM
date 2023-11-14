<?
  date_default_timezone_set('Asia/Seoul');
  defined('BASEPATH') OR exit('No direct script access allowed');

class Free_Board_View_C extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('Free_Board_View_M', 'FBM');
    $this->load->library('layout');
  }
  
  public function index()
  {
    $data['list'] = $this->FBM->GetBoardList();
    $data['total'] = $this->FBM->GetBoardTotal();
    
    $this->layout->custom_view('board/free_board_view_v', $data);
  }

}
?>