<?
defined('BASEPATH') OR exit('No direct script access allowed');

class Member_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }

  public function GetMembers()
  {
    $this->load->database();
    $result = $this->db->query('SELECT * FROM gradeinfo;')->result();
    $this->db->close();

    return $result;
  }

  // private $members = array(
  //   '1' => 'Edward',
  //   '2' => 'Alex',
  //   '3' => 'John'
  // );

  // public function GetMembers()
  // {
  //   return $this->members;
  // }
}
?>