<?

class Main_model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  public function GetBoardList()
  {
    $this->load->database();
    $result = $this->db->query('SELECT * FROM freeboard')->result();
    $this->db->close();

    return $result;
  }

  public function GetBoardTotal()
  {
    $this->load->database();
    $result = $this->db->query('SELECT idx FROM freeboard')->num_rows();
    return $result;
  }
}


?>