<?
  include('link.php');

  $sql = "SELECT * FROM gradeinfo;";
  $result = mysqli_query($link, $sql);

  if(!$result) {
    echo '<h4>실패</h4>';
  } else {
    // echo 
    //   "<script>
    //     alert('메시지창 테스트');
    //   </script>";
    echo '<h4>성공</h4>';
  }
?>