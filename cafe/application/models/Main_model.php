<?
date_default_timezone_set('Asia/Seoul');
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_model extends CI_Model
{

  public function __construct()
  {
    parent::__construct();

    $this->load->database();
  }

  public function GetBoardList()
  {
    $result = $this->db->query('SELECT * FROM boards')->result();
    $this->db->close();
    
    return $result;
  }
  
  public function GetBoardTotal()
  {
    $result = $this->db->query('SELECT idx FROM boards')->num_rows();
    $this->db->close();

    return $result;
  }
}


?>