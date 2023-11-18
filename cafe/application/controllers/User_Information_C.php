<?

class User_information_C extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_Information_M');
    }

    public function index()
    {
        $this->layout->custom_view('User_information_V');
    }
}
?>