<?
  class Topic extends CI_Controller
  {

    function __construct()
    {
      parent::__construct();

       //controller에서 DB 라이브러리 호출
      $this->load->database();

      // 모델 디렉토리 밑에 'topic_model.php'파일을 php가 읽어서 Topic_model class를 로드
      $this->load->model('topic_model');
    }

    public function index()
    {
      $this->load->view('header');

      // 해당 오브젝트에 접근해서 gets 메소드를 호출
      $topics = $this->topic_model->gets();
      // 가져온 data를 두번째 인자에 배열형태로 뷰에 전달
      $this->load->view('topic_list', array('topics' => $topics));

      $this->load->view('topic');
      $this->load->view('footer');
    }

    public function get($id)
    {
      $this->load->view('header');
      $data = array('id' => $id);
      $this->load->view('get', $data);
      $this->load->view('footer');
    }

  }
?>