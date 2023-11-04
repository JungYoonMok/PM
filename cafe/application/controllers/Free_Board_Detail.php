<?

  class Free_board_Detail extends CI_Controller
  {

    public function __construct() {
      parent::__construct();

      $this->load->model('Free_Board_M', 'FBM');
    }
    
    public function show($idx)
    {
      $data['detail'] = $this->FBM->get($idx);

      $this->load->view('board/free_board_detail', $data);
    }

  }

?>