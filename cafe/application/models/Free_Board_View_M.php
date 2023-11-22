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

  public function GetBoardList($limit, $start)
  {
    $this->db->order_by('idx', 'desc');
    $this->db->limit($limit, $start);
    $result = $this->db->get_where('boards', [ 'board_type' => '자유게시판' ] )->result();
    return $result;
  }
  
  public function GetBoardTotal()
  {
    $result = $this->db->query("SELECT idx FROM boards WHERE board_type = '자유게시판' ;")->num_rows();
    return $result;
  }

  public function search($start, $limit, $type, $search_text) {
    $this->db->order_by('idx', 'desc');
    $this->db->limit($limit, $start);

    $query = "SELECT * FROM boards WHERE board_type = '자유게시판' LIKE title = '%".$search_text."%' ;";
    // $query->result();
    return $this->db->query($query)->result();

    switch($type) {
      // case '게시글+댓글' :
      //   // $query = $this->db->get_where( 'boards', [ 'board_type' => '자유게시판', '' ] );
      //   $query = "SELECT * FROM boards WHERE board_type = '자유게시판' AND  title = %".$search_text."% ;";
      //   $this->db->query($query)->result();
      //   break;
      case '제목만' :
        $query = "SELECT * FROM boards WHERE board_type = '자유게시판' AND title = '%".$search_text."%' ;";
        // $query->result();
        $this->db->query($query)->result();
        break;
      // case '글작성자' :
      //   $query = $this->db->get_where( 'boards', [ 'board_type' => '자유게시판', '' ] );
      //   $query->result();
      //   break;
      // case '댓글내용' :
      //   $query = $this->db->get_where( 'boards', [ 'board_type' => '자유게시판', '' ] );
      //   $query->result();
      //   break;
      // case '댓글작성자' :
      //   $query = $this->db->get_where( 'boards', [ 'board_type' => '자유게시판', '' ] );
      //   $query->result();
      //   break;
    }
  }

}

?>