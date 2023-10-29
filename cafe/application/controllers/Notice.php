<?

  class Notice extends CI_Controller
  {

    public function index()
    {
      $this->load->view('header');
      $this->load->view('notice');
      $this->load->view('footer');
    }

  }

?>