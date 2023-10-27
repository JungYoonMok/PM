<?

  class Topic_model extends CI_Model
  {

    function __construct()
    {
      parent::__construct();
    }

    function gets()
    {
      // SQL문을 통해 가져온 data를 객체형태로 리턴
      return $this->db->query("SELECT * FROM boards;")->result();
    }

    function get($topic_id)
    {
      // 결과가 한행이라면 row 메소드를 사용
      return $this->db->get_where('boards', array('id' => $topic_id))->row();
    }
  }

?>