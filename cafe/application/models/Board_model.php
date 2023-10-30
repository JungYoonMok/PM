<?

class Board_model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  public function GetBoardList()
  {
    $this->load->database();
    $result = $this->db->query('SELECT * FROM boards')->result();
    $this->db->close();

    return $result;
  }

  public function GetBoardTotal()
  {
    $this->load->database();
    $result = $this->db->query('SELECT idx FROM boards')->num_rows();
    return $result;
  }
}


?>