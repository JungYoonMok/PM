<div style="position : relative; width : 400px; height : 300px; margin : auto;">
  <div style="position : absolute; margin : 0 auto; top : 50%; left : 65%; transform: translate(-50%, -50%); width : 700px; height : 0px;">
    <table border="1">
      <tr>
        <th style="padding : 10px;">ID</th>
        <th style="padding : 10px;">제목</th>
        <th style="padding : 10px;">파일</th>
        <th style="padding : 10px;">작성일</th>
        <th style="padding : 10px;">관리</th>
      </tr>

      <?
        foreach ($list as $ls) {
      ?>

      <tr>
        <td style="padding : 10px;"><?=$ls->idx;?></td>
        <td style="padding : 10px;"><?=$ls->title;?></td>
        <td style="padding : 10px;">
          <?
            if($ls->file) {
              echo "<img src='./uploads/".$ls->file."' width='50' />";
            } else {
              echo "<p style='text-align : center;'>-</p>";
            }
          ?>
        </td>
        <td style="padding : 10px;"><?=$ls->regdate;?></td>
        <td style="padding : 10px;">
          <a href="/crud/board/show/<?=$ls->idx;?>">상세</a>
          <a href="/crud/board/edit/<?=$ls->idx;?>">수정</a>
          <a href="/crud/board/delete/<?=$ls->idx;?>">삭제</a>
        </td>
      </tr>

      <?
        }
      ?>

    </table  ble>

    <div>
      <div style="margin-top : 30px; margin-left : -150px; text-align : center;">
        <? echo $pages;?>
      </div>
    </div>

    <div style="margin-top : 20px">
      <a style="padding : 10px; background : #f3f3f3;" href="/crud">홈</a>
      <a style="padding : 10px; background : #f3f3f3;" href="/crud/board/create">글쓰기</a>
    </div>

  </div>
</div>