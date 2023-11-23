<?

  class Layout
  {
    public function __construct()
    {
      $this->obj = &get_instance(); // ci 코어 가져오기
      // $this->obj->load->model("user_model");
    }

    function custom_view($view = "", $page_view_data = array())
    {
      // 헤더에서 사용할 데이터 뽑기

      $header_view_data = array("title" => "안녕","user" => "윤목");

      //사이드에서 사용할 데이터 뽑기

      $layout_view_data = array(
        "contents" => $this->obj->load->view($view, $page_view_data, TRUE),
        "header"  => $this->obj->load->view('header',$header_view_data,TRUE),
      );

      $this->obj->load->view("/layouts/main_layout_view", $layout_view_data);
    }
  }

?>