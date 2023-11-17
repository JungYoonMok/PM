<?
date_default_timezone_set('Asia/Seoul');
defined('BASEPATH') or exit('No direct script access allowed');

class Free_Board_Detail_M extends CI_Model
{

  public function __construct()
  {
    parent::__construct();
  }

  public function post_delete()
  {
    try {
      $idx = $this->input->post('idx');
      $this->db->where('idx', $idx);
      $this->db->update('boards', ['board_delete' => TRUE, 'delete_date' => date("Y-m-d H:i:s")]);
      return true;
    } catch (Exception $e) {
      log_message('error', '게시글 삭제 실패: ' . $this->db->error()['message']);
      return false;
    }
  }

  public function get($idx)
  {
    $board = $this->db->get_where('boards', ['idx' => $idx])->row();
    return $board;
  }

  public function get_comments($idx, $limit, $start)
  {
    $this->db->order_by('group_idx', 'asc');
    $this->db->order_by('group_order', 'asc');
    $this->db->limit($limit, $start);
    $comment = $this->db->get_where('boards_comment', ['boards_idx' => $idx ]) -> result();
    // $comment = $this->db->get_where('boards_comment', ['boards_idx' => $idx, 'delete_state' => FALSE ]) -> result();
    return $comment;
  }

  public function comments_create()
  {
    $data = [
      'boards_idx' => $this->input->post('board_id'),
      'content' => $this->input->post('contents'),
      'user_id' => $this->input->post('user_id'),
      'regdate' => date("Y-m-d H:i:s"),
      'depth' => 1, // 최상위 댓글은 깊이가 1
      'group_order' => 0 // 최상위 댓글의 순서는 0으로 시작
    ];

    $this->db->insert('boards_comment', $data);
    $insert_id = $this->db->insert_id();

    // 댓글의 group_idx를 댓글 자신의 idx로 설정합니다.
    $this->db->where('idx', $insert_id);
    $this->db->update('boards_comment', ['group_idx' => $insert_id]);
  }

  public function reply_create()
  {
    // POST 데이터로부터 필요한 정보를 가져옵니다.
    $board_id = $this->input->post('board_id');
    $parent_id = $this->input->post('comment_id'); // 상위 댓글 ID
    $group_idx = $this->input->post('group_idx'); // 상위 댓글의 group_idx
    $depth = $this->input->post('depth'); // 상위 댓글의 depth

    // 트랜잭션 시작
    $this->db->trans_start();

    // 현재 group_idx에 속한 댓글 중에서 가장 큰 group_order 값을 찾습니다.
    $this->db->select_max('group_order');
    $this->db->where('group_idx', $group_idx);
    $max_order = $this->db->get('boards_comment')->row()->group_order;

    // 새 대댓글의 group_order는 최대값보다 1 크게 설정합니다.
    $new_group_order = $max_order + 1;

    // 새 대댓글의 group_order를 위해 기존 댓글들의 group_order 값을 업데이트합니다.
    $this->db->set('group_order', 'group_order + 1', FALSE)
      ->where('group_idx', $group_idx)
      ->where('group_order >=', $new_group_order)
      ->update('boards_comment');

    // 새 대댓글 데이터를 준비합니다.
    $data = [
      'boards_idx' => $board_id,
      'group_idx' => $group_idx,
      'group_order' => $new_group_order,
      'depth' => $depth + 1, // 대댓글은 상위 댓글의 depth에서 1을 더해줍니다.
      'content' => $this->input->post('contents'),
      'user_id' => $this->input->post('user_id'),
      'regdate' => date("Y-m-d H:i:s")
    ];

    // 새 대댓글을 데이터베이스에 삽입합니다.
    $this->db->insert('boards_comment', $data);

    // 트랜잭션 상태를 확인하고 문제가 없으면 커밋합니다.
    if (!$this->db->trans_status()) {
      // 문제가 있으면 롤백합니다.
      $this->db->trans_rollback();
      // 여기에 에러 처리 로직을 추가할 수 있습니다.
      return false; // 에러 발생
    } else {
      // 문제가 없으면 커밋합니다.
      $this->db->trans_commit();
    }

    // 게시판 페이지로 리디렉션합니다.
    redirect("/freeboard/" . $board_id);
  }

  public function reply_update($data)
  {
    try {
      $this->db->where('idx', $data['idx']);
      $this->db->update('boards_comment', $data);
      return true;
    } catch (Exception $e) {
      log_message('error', '댓글 수정 실패: ' . $this->db->error()['message']);
      return false;
    }
  }

  public function reply_delete($idx)
  {
    try {
      $this->db->where('idx', $idx);
      $this->db->update('boards_comment', [ 'delete_state' => TRUE, 'delete_date' => date("Y-m-d H:i:s") ]);
      return true;
    } catch (Exception $e) {
      log_message('error', '댓글 삭제 실패: ' . $this->db->error()['message']);
      return false;
    }
  }

  public function comment_board_type()
  {
    return $this->input->post('board_type');
  }

  // 조회수 가져오기
  public function board_hit_get($idx){
    $comment = $this->db->get_where('boards', [ 'idx' => $idx ])->row();
    return $comment;
  }

  // 조회수 증가
  public function board_hit_plus($idx){
    // 조회수 가져오기
    $board_hit = $this->db->get_where('boards', [ 'idx' => $idx ])->row();
    // 가져온 값에 +1
    $this->db->where('idx', $idx);
    $this->db->update('boards', [ 'hit' => $board_hit->hit+1 ]);
  }

  // 댓글 개수 가져오기
  public function board_comment_count($idx){
    $this->db->select('idx, count(*) as cnt');
    $this->db->where('boards_idx', $idx);
    $query = $this->db->get('boards_comment')->row();
    return $query;
  }

  // 댓글 개수 가져오기 삭제된 댓글 제외(페이지네이션 전용)
  public function board_comment_count_pagination($idx){
    // 삭제 댓글 조회
    $comment = $this->db->get_where('boards_comment', [ 'boards_idx' => $idx, 'delete_state' => FALSE ])->row();

    $this->db->select('idx, count(*) as cnt');
    $this->db->where('boards_idx', $idx);
    $query = $this->db->get('boards_comment')->row();
    return $query;
  }

  // 좋아요 및 싫어요 개수 가져오기 업
  public function board_like_get1($idx){
    $this->db->select('idx, count(*) as cnt');
    $this->db->where('boards_idx', $idx);
    $this->db->where('like_type', TRUE);
    $query = $this->db->get('board_like')->row();
    return $query;
  }

  // 좋아요 및 싫어요 개수 가져오기 다운
  public function board_like_get2($idx){
    $this->db->select('idx, count(*) as cnt');
    $this->db->where('boards_idx', $idx);
    $this->db->where('like_type', FALSE);
    $query = $this->db->get('board_like')->row();
    return $query;
  }
  
  // 이미 좋아요 및 싫어요를 눌렀는지 확인
  public function board_like_check($data)
  {
    $check = $this->db->get_where('board_like', [ 'boards_idx' => $data['boards_idx'], 'user_id' => $data['user_id'] ] )->row();
    if($check) {
      return ['state' => false, 'message' => '이미 좋아요를 눌렀습니다.', 'data' => $check ];
    } else {
      return ['state' => true, 'message' => '정보가 없습니다.'];
    } 
  }

  // 좋아요 및 싫어요 결과 가져오기
  public function board_like_data($idx)
  {
    $board = $this->db->get_where('board_like', ['boards_idx' => $idx, 'user_id' => $this->session->userdata('user_id')])->row();
    return $board;
  }

  // 좋아요 및 싫어요
  public function board_like($data)
  {
    $result = $this -> db -> insert('board_like', $this->db->escape_str($data));
    if($result) {
      return [ 'state' => true, 'message' => '성공', 'type' => $data['like_type'] ];
    } else {
      log_message('error', '좋아요 실패: ' . $this->db->error()['message']);
      return [ 'state' => false, 'message' => '실패' ];
    }
  }

}

?>