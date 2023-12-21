<?
date_default_timezone_set('Asia/Seoul');
defined('BASEPATH') OR exit('No direct script access allowed');

class Free_Board_Create_M extends CI_Model {

  public function __construct() {
    parent::__construct();

    $this->load->model('common/user_point_exp_m');
  }

  public function board_get($idx) {
    $this->db->where('idx', $idx);
    $result = $this->db->get('boards')->row();
    if($result) {
      return $result;
    } else {
      log_message('error', '게시글 조회 실패: ' . $this->db->error()['message']);
      return FALSE;
    }
  }

  public function insert_file($data) {
    $result = $this->db->insert('upload_file', $data);
    if($result) {
      
      return TRUE;
    } else {
      log_message('error', '게시글 등록 실패: ' . $this->db->error()['message']);
      return FALSE;
    }
  }

  public function create($data) {
    $result = $this->db->insert('boards', $data);
    if($result) {
      $last_id = $this->db->insert_id();
      // 게시글의 group_idx를 댓글 자신의 idx로 설정합니다.
      $this->db->where('idx', $last_id);
      $this->db->update('boards', ['group_idx' => $last_id]);

      // 포인트 및 경험치 지급
      $this->user_point_exp_m->point_exp_add('활동 포인트 지급', $last_id.'번 게시글 작성');

      return ['state' => TRUE, 'data' => $data, 'last_id' => $last_id ];
    } else {
      log_message('error', '게시글 등록 실패: ' . $this->db->error()['message']);
      return FALSE;
    }
  }

  public function create_reply($post_data) {
    // POST 데이터로부터 필요한 정보를 가져옵니다.
    // $board_id = $this->input->post('board_id');
    // $group_idx = $this->input->post('group_idx'); // 상위 댓글의 group_idx
    // $depth = $this->input->post('depth'); // 상위 댓글의 depth
    // $board_id = $post_data['board_id'];
    $board_id = $post_data['group_idx'];
    $group_idx = $post_data['group_idx'];
    $depth = $post_data['depth'];

    // 트랜잭션 시작
    $this->db->trans_start();

    // 현재 group_idx에 속한 댓글 중에서 가장 큰 group_order 값을 찾습니다.
    $this->db->select_max('group_order');
    $this->db->where('group_idx', $group_idx);
    $max_order = $this->db->get('boards')->row()->group_order;

    // 새 대댓글의 group_order는 최대값보다 1 크게 설정합니다.
    $new_group_order = $max_order + 1;

    // 새 대댓글의 group_order를 위해 기존 댓글들의 group_order 값을 업데이트합니다.
    $this->db->set('group_order', 'group_order + 1', FALSE)
      ->where('group_idx', $group_idx)
      ->where('group_order >=', $new_group_order)
      ->update('boards');

    // 새 대댓글 데이터를 준비합니다.
    // 'boards_idx' => $board_id,
    // 'group_idx' => $group_idx,
    $data = [
      'group_idx' => $board_id,
      'group_order' => $new_group_order,
      'depth' => $depth + 1, // 대댓글은 상위 댓글의 depth에서 1을 더해줍니다.
      'board_type' => $post_data['board_type'], // 리플이 아닐 땐 post_type
      'title' => $this->input->post('post_title'),
      'content' => $post_data['content'],
      'user_id' => $this->session->userdata('user_id'),
      'board_state' => $this->input->post('post_open'),
      'board_comment' => $this->input->post('comment_open'),
      // 'file_path' => $post_data['file_path'] ?? '-', // 파일 경로 추가
      'regdate' => date("Y-m-d H:i:s")
    ];

    // 새 대댓글을 데이터베이스에 삽입합니다.
    $this->db->insert('boards', $data);
    $last_id = $this->db->insert_id();

    // 트랜잭션 상태를 확인하고 문제가 없으면 커밋합니다.
    if (!$this->db->trans_status()) {
      // 문제가 있으면 롤백합니다.
      $this->db->trans_rollback();
      // 여기에 에러 처리 로직을 추가할 수 있습니다.
      log_message('error', '답글 등록 오류: ' . $this->db->error()['message']);
      return false; // 에러 발생
    } else {
      // 문제가 없으면 커밋합니다.
      $this->db->trans_commit();

      // 포인트 및 경험치 지급
      $this->user_point_exp_m->point_exp_add('활동 포인트 지급', $data['group_idx'].'번 게시글의 답글 작성');
      return ['state' => TRUE, 'data' => $data, 'last_id' => $last_id ];
    }
  }

}

?>