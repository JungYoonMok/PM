<?
date_default_timezone_set('Asia/Seoul');
defined('BASEPATH') OR exit('No direct script access allowed');

class Free_Board_View_M extends CI_Model
{

  public function __construct() {
    parent::__construct();
  }

  public function get($idx) {
    $board = $this->db->get_where('boards', [ 'idx' => $idx ] )->row();
    return $board;
  }

  public function GetBoardList($limit, $start) {
    $this->db->select('boards.*,');
    $this->db->select('(SELECT COUNT(*) FROM board_like WHERE like_type = 1 AND boards_idx = boards.idx) as like_count', FALSE);
    $this->db->select('(SELECT COUNT(*) FROM board_like WHERE like_type = 0 AND boards_idx = boards.idx) as dislike_count', FALSE);
    $this->db->where('board_type', '자유게시판');
    $this->db->order_by('idx', 'desc');
    $this->db->limit($limit, $start);
    $query = $this->db->get('boards');

    return $query->result();
  }
  
  public function GetBoardTotal() {
    $result = $this->db->query("SELECT idx FROM boards WHERE board_type = '자유게시판' ;")->num_rows();
    return $result;
  }

  public function search($type, $search_text, $limit, $start) {
    $this->db->select('boards.*,');
    $this->db->select('(SELECT COUNT(*) FROM board_like WHERE like_type = 1 AND boards_idx = boards.idx) as like_count', FALSE);
    $this->db->select('(SELECT COUNT(*) FROM board_like WHERE like_type = 0 AND boards_idx = boards.idx) as dislike_count', FALSE);
    // $this->db->where('board_type', '자유게시판');
    $this->db->from('boards');

    // 검색 타입에 따른 컬럼 설정
    switch ($type) {
      case '제목만':
        $this->db->like('title', $search_text);
        break;
      case '글작성자':
        $this->db->like('user_id', $search_text);
        break;
      // 기타 검색 타입들...
    }
    
    $this->db->order_by('idx', 'desc');
    $this->db->limit($limit, $start);
    // 결과 반환
    $query = $this->db->get();
    return $query->result();
  }

}

?>