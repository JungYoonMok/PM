게시판 글쓰기

<form name="bfpm" action="/crud/board/store" method="post">
  <table board="1">
    <tr>
      <th>제목</th>
      <td>
        <input type="text" name="title" value="">
      </td>
    </tr>
    <tr>
      <th>내용</th>
      <td>
        <textarea name="contens" rows="8"></textarea>
      </td>
    </tr>
    <tr>
      <th colspan="2">
        <input type="submit" value=" 저장 ">
      </th>
    </tr>
  </table>
</form>