<div style="position : relative; width : 400px; height : 300px; margin : auto;">
  <div style="position : absolute; margin : 0 auto; top : 50%; left : 100%; transform: translate(-50%, -50%); width : 700px; height : 0px;">
    <table border="1">
      <tr>
        <th style="padding : 10px;">제목</th>
        <td style="padding : 10px;"><?=$view->title;?></td>
      </tr>
      <tr>
        <th style="padding : 10px;">내용</th>
        <td style="padding : 10px;"><?=$view->contens;?></td>
      </tr>
      <tr>
        <th style="padding : 10px;">파일</th>
        <td style="padding : 10px;">
          <?
            if($view->file) {
              echo "<img src='/crud/uploads/".$view->file."' width='200' />";
            }
          ?>
        </td>
      </tr>
      <tr>
        <th style="padding : 10px;">작성일</th>
        <td style="padding : 10px;"><?=$view->regdate;?></td>
      </tr>
      <tr>
        <th colspan="2" style="padding : 10px;">
          <a href="/crud/board">목록</a>
        </th>
      </tr>
    </table>
  </div>
</div>