<?
date_default_timezone_set('Asia/Seoul');
defined('BASEPATH') OR exit('No direct script access allowed');

class Free_Board_View_M extends CI_Model {

  public function __construct() {
    parent::__construct();
  }

  public function get($idx) {
    $board = $this->db->get_where('boards', [ 'idx' => $idx ] )->row();
    return $board;
  }

  public function get_user($id) {
    $board = $this->db->get_where('members', [ 'user_id' => $id ] )->row();
    return $board;
  }

  public function GetBoardList($limit, $start) {
    $this->db->select('boards.*,');
    $this->db->select('(SELECT COUNT(*) FROM board_like WHERE like_type = 1 AND boards_idx = boards.idx) as like_count', FALSE);
    $this->db->select('(SELECT COUNT(*) FROM board_like WHERE like_type = 0 AND boards_idx = boards.idx) as dislike_count', FALSE);
    $this->db->select('(SELECT COUNT(*) FROM boards as reply WHERE reply.group_idx = boards.idx AND reply.group_order > 0) as reply_count', FALSE);
    $this->db->select('(SELECT COUNT(*) FROM upload_file WHERE boards_idx = boards.idx) as file', FALSE);
    $this->db->select('(SELECT user_profile FROM members WHERE user_id = boards.user_id) as profile', FALSE);
    $this->db->where('board_type', 'freeboard');
    $this->db->where('group_order', '0'); // 답글이 아닌 경우 제외
    $this->db->order_by('idx', 'desc');
    $this->db->limit($limit, $start);
    
    $query = $this->db->get('boards');
    
    return $query->result();
  }
  
  public function GetBoardTotal() {
    $result = $this->db->query("SELECT idx FROM boards WHERE board_type = 'freeboard' ;")->num_rows();
    return $result;
  }

  public function search($type, $search_text, $limit, $start) {
    $this->db->select('boards.*,');
    $this->db->select('(SELECT COUNT(*) FROM board_like WHERE like_type = 1 AND boards_idx = boards.idx) as like_count', FALSE);
    $this->db->select('(SELECT COUNT(*) FROM board_like WHERE like_type = 0 AND boards_idx = boards.idx) as dislike_count', FALSE);
    // $this->db->select('(SELECT COUNT(*) FROM boards WHERE group_idx = boards.idx) as reply_count', FALSE); // 'reply_table'과 'parent_idx'는 답글 테이블과 컬럼명에 따라 변경 필요
    // $this->db->where('board_type', 'freeboard');
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
    $this->db->where('group_order', '0');
    // 결과 반환
    $query = $this->db->get();
    return $query->result();
  }

  public function get_replies($parent_idx) {
    // 추천 비추천 카운트
    $this->db->select('boards.*,');
    $this->db->select('(SELECT COUNT(*) FROM board_like WHERE like_type = 1 AND boards_idx = boards.idx) as like_count', FALSE);
    $this->db->select('(SELECT COUNT(*) FROM board_like WHERE like_type = 0 AND boards_idx = boards.idx) as dislike_count', FALSE);
    $this->db->select('(SELECT COUNT(*) FROM upload_file WHERE boards_idx = boards.idx) as file', FALSE);
    $this->db->select('(SELECT user_profile FROM members WHERE user_id = boards.user_id) as profile', FALSE);
    
    $this->db->where('group_order >', '0');
    $this->db->where('group_idx', $parent_idx);
    $query = $this->db->get('boards'); // 'reply_table'는 답글을 저장하는 테이블 이름
    return $query->result_array();
  }

}

?>