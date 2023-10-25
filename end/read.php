<?
  include('link.php');
  //$link = mysqli_connect('localhost', 'root', '', 'crud');
  $sql = 'SELECT * FROM gradeinfo;';
  $result = mysqli_query($link, $sql);
?>

<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>성적</title>
  <script type="text/javascript">
    function update(id, name, python, java, c, etc){
      document.getElementById('update_id').value = id;
      document.getElementById('update_name').value = name;
      document.getElementById('update_python').value = python;
      document.getElementById('update_java').value = java;
      document.getElementById('update_c').value = c;
      document.getElementById('update_etc').value = etc;
    }

    // 상세보기 함수
    function detail(dt) {
      document.getElementById('detail_').value = dt;
    }
  </script>

  <!-- 헤더 인클루드 -->
  <!-- <? include('header.php') ?> -->

</head>
<body>

  <div style="margin-top : 200px;">
    <table border="1" style="margin : 0 auto;">
      <tr style='background-color: #D8D8D8; text-align : content;'>
        <td style='width : 70px;'>ID</td>
        <td style='width : 70px;'>이름</td>
        <td style='width : 70px;'>파이썬</td>
        <td style='width : 70px;'>자바</td>
        <td style='width : 70px;'>C/C#</td>
        <td style='width : 70px;'>ETC</td>
        <td style='width : 70px;'>수정</td>
        <td style='width : 70px;'>삭제</td>
        <td style='width : 70px;'>상세</td>
      </tr>

    <?
      while($row = mysqli_fetch_array($result)) {
        $filtered = array(
          'id' => htmlspecialchars($row['id']),
          'name' => htmlspecialchars($row['name']),
          'python' => htmlspecialchars($row['python']),
          'java' => htmlspecialchars($row['java']),
          'c' => htmlspecialchars($row['c']),
          'etc' => htmlspecialchars($row['etc'])
        );
    ?>

    <tr style='text-align : center;'>
      <td><?=$filtered['id']?></td>
      <td><?=$filtered['name']?></td>
      <td><?=$filtered['python']?></td>
      <td><?=$filtered['java']?></td>
      <td><?=$filtered['c']?></td>
      <td><?=$filtered['etc']?></td>
      <td>
        <input type="button" name='' value='수정' 
        onclick="update(
          '<?=$filtered['id']?>',
          '<?=$filtered['name']?>',
          '<?=$filtered['python']?>',
          '<?=$filtered['java']?>',
          '<?=$filtered['c']?>',
          '<?=$filtered['etc']?>'
        )">
      </td>
      <td>                 
        <form action="process_delete.php" method="post">
          <input type="hidden" name="id" value="<?=$filtered['id']?>">
          <input type="submit" value="삭제">
        </form>
      </td>
      <td>
      <input type="button" name='' value='보기' 
        onclick="update(
          '<?=$filtered['id']?>',
          '<?=$filtered['name']?>',
          '<?=$filtered['python']?>',
          '<?=$filtered['java']?>',
          '<?=$filtered['c']?>',
          '<?=$filtered['etc']?>'
        )">
      </td>
    </tr>
    <?
      }
    ?>
    </table>
  </div>

  <!-- 상세보기 -->
  <div>
    <div style="margin-top : 10px; margin-bottom : 5px; text-align : center;">
      <input type="text" name="dt" id="detail_" cols="30" rows="10" value="hi"></input>
    </div>
  </div>

  <table style="margin: 0 auto;">
    <tr>
      <td>
        <div style="border : 1px solid black; width : 150px; height : 210px;">
          <form action="process_create.php" method="post">
            <table border="1" style="margin : 0 auto;">
              <caption>성적입력</caption>
              <tr>
                <td>이름</td>
                <td><input style="width : 50px" type="text" name="name"></td>
              </tr>
              <tr>
                <td>파이썬</td>
                <td><input style="width : 50px" type="text" name="python"></td>
              </tr>
              <tr>
                <td>자바</td>
                <td><input style="width : 50px" type="text" name="java"></td>
              </tr>
              <tr>
                <td>C/C#</td>
                <td><input style="width : 50px" type="text" name="c"></td>
              </tr>
              <tr>
                <td>ETC</td>
                <td><input style="width : 50px" type="text" name="etc"></td>
              </tr>
            </table>
            <div style="text-align : center; margin-top : 10px">
              <input type="submit" value="성적입력">
            </div>
          </form>
        </div>
      </td>
      <td>
        <div style="border : 1px solid black; width : 150px; height : 210px;">
          <form class="" action="process_update.php" method="post">
            <table border="1" style="margin : 0 auto;">
              <caption>성적수정</caption>
              <input type="hidden" name="id" id="update_id" value="">
              <tr>
                <td>이름</td>
                <td>
                  <input style="width : 50px;" type="text" name="name" id="update_name" value="">
                </td>
              </tr>
              <tr>
                <td>파이썬</td>
                <td>
                  <input style="width : 50px;" type="text" name="python" id="update_python" value="">
                </td>
              </tr>
              <tr>
                <td>자바</td>
                <td>
                  <input style="width : 50px;" type="text" name="java" id="update_java" value="">
                </td>
              </tr>
              <tr>
                <td>C/C#</td>
                <td>
                  <input style="width : 50px;" type="text" name="c" id="update_c" value="">
                </td>
              </tr>
              <tr>
                <td>ETC</td>
                <td>
                  <input style="width : 50px;" type="text" name="etc" id="update_etc" value="">
                </td>
              </tr>
            </table>
            <div style="text-align : center; margin-top : 10px;">
              <input type="submit" value="성적수정">
            </div>
          </form>
        </div>
      </td>
    </tr>
  </table>

</body>
</html>