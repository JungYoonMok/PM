<?
  class Login extends CI_Controller
  {
    public function __construct()
    {
      parent::__construct();
      $this->load->library('layout');
    }

    public function index()
    {
      $this->layout->custom_view('login');
    }

  }
  ?>