<?

  class Layout
  {
    public function __construct()
    {
      $this->obj = &get_instance(); // ci 코어 가져오기
    }

    function test_view($view = "", $page_view_data = array())
    {

      $layout_view_data = array(
        "contents" => $this->obj->load->view($view, $page_view_data, true),
        // "is_side" => $is_side
      );

      $this->obj->load->view("/layouts/main_layout_view", $layout_view_data);
    }
  }

?>