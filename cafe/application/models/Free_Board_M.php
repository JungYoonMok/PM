<?
date_default_timezone_set('Asia/Seoul');
defined('BASEPATH') OR exit('No direct script access allowed');

class Free_Board_M extends CI_Model
{

  public function __construct()
  {
    parent::__construct();

    $this->load->database();
    $this->load->helper('url');
  }

  public function get_comments($idx, $limit, $start)
  {
    $this->db->order_by('group_idx', 'asc');
    $this->db->order_by('group_order', 'asc');
    $this->db->limit($limit, $start);
    $comment = $this->db->get_where('boards_comment', [ 'boards_idx' => $idx ] )->result();
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

  public function reply_create() {
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
    if ( ! $this->db->trans_status()) {
      // 문제가 있으면 롤백합니다.
      $this->db->trans_rollback();
      // 여기에 에러 처리 로직을 추가할 수 있습니다.
      return false; // 에러 발생
    } else {
      // 문제가 없으면 커밋합니다.
      $this->db->trans_commit();
    }

    // 게시판 페이지로 리디렉션합니다.
    redirect("/freeboard/".$board_id);
  }

  public function comment_board_type()
  {
    return $this->input->post('board_type');
  }

  public function create()
  {
    // form action 에서 name 값이 동일한 입력 값을 data 변수에 저장
    $data = [
      'board_type' => $this->input->post('board_type'),
      'title' => $this->input->post('title'),
      'content' => $this->input->post('contents'),
      'regdate' => date("Y-m-d H:i:s")
    ];

    $result = $this->db->insert('boards', $data);
    return $result;
  }

  public function get($idx)
  {
    $board = $this->db->get_where('boards', [ 'idx' => $idx ] )->row();
    return $board;
  }

  public function update()
  {

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
    $this->db->close();
    
    return $result;
  }

}

?>