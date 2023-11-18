<?
date_default_timezone_set('Asia/Seoul');
defined('BASEPATH') OR exit('No direct script access allowed');

class Free_Board_View_M extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  public function get($idx)
  {
    $board = $this->db->get_where('boards', [ 'idx' => $idx ] )->row();
    return $board;
  }

  public function GetBoardList()
  {
    $result = $this->db->query("SELECT * FROM boards WHERE board_type = '자유게시판' ;")->result();
    return $result;
  }
  
  public function GetBoardTotal()
  {
    $result = $this->db->query("SELECT idx FROM boards WHERE board_type = '자유게시판' ;")->num_rows();
    return $result;
  }

}

?>