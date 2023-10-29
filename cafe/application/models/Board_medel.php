<?

class Board_medel extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  public function GetMembers()
  {
    $this->load->database();
    $result = $this->db->query('SELECT * FROM boards')->result();
    $this->db->close();

    return $result;
  }

}


?>