<?
  include('link.php');
  //$link = mysqli_connect('localhost', 'root', '', 'crud');

  $filtered = array(
    'name' => mysqli_real_escape_string($link, $_POST['name']),
    'python' => mysqli_real_escape_string($link, $_POST['python']),
    'java' => mysqli_real_escape_string($link, $_POST['java']),
    'c' => mysqli_real_escape_string($link, $_POST['c']),
    'etc' => mysqli_real_escape_string($link, $_POST['etc'])
  );

  $sql = "
    INSERT INTO gradeinfo
      (name, python, java, c, etc)
      VALUES (
        '{$filtered['name']}',
        '{$filtered['python']}',
        '{$filtered['java']}',
        '{$filtered['c']}',
        '{$filtered['etc']}'
      )
  ";

  $result = mysqli_query($link, $sql);
  
  if($result === false){
    echo '장하는 과정에서 문제가 생겼습니다.';
  } else {
    header('Location: ../read.php');
  }

?>