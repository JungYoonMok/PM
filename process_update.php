<?
  include('link.php');
  //$link = mysqli_connect('localhost', 'root', '', 'crud');

  $filtered = array(
    'id' => mysqli_real_escape_string($link, $_POST['id']),
    'name' => mysqli_real_escape_string($link, $_POST['name']),
    'python' => mysqli_real_escape_string($link, $_POST['python']),
    'java' => mysqli_real_escape_string($link, $_POST['java']),
    'c' => mysqli_real_escape_string($link, $_POST['c']),
    'etc' => mysqli_real_escape_string($link, $_POST['etc'])
  );

  $sql = "
    UPDATE gradeinfo
    SET
      name='{$filtered['name']}',
      python='{$filtered['python']}',
      java='{$filtered['java']}',
      c='{$filtered['c']}'
      etc='{$filtered['etc']}'
    WHERE
      id='{$filtered['id']}';
  ";

  $result = mysqli_query($link, $sql);

  if ($result === false) {
    echo "저장하는 과정에서 문제가 생겼습니다.";
  } else {
    header('Location: ../read.php');
  }

?>