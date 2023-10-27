<table border="1">
  <tr>
    <th>제목</th>
    <td><?=$view->title;?></td>
  </tr>
  <tr>
    <th>내용</th>
    <td><?=$view->contens;?></td>
  </tr>
  <tr>
    <th>작성일</th>
    <td><?=$view->regdate;?></td>
  </tr>
  <tr>
    <th colspan="2">
      <a href="/crud/board">목록</a>
    </th>
  </tr>
</table>