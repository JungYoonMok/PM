게시판 글 수정

<form name="bfpm" action="/crud/board/update/<?=$edit->idx;?>" method="post">
  
  <input type="hidden" name=_method value="PUT" />
  <table border="1">
    <tr>
      <th>제목</th>
      <td>
        <input type="text" name="title" value="<?=$edit->title;?>" />
      </td>
    </tr>
    <tr>
      <th>내용</th>
      <td>
        <textarea name="contens" rows="8"><?=$edit->contens;?></textarea>
      </td>
    </tr>
    <tr>
      <th colspan="2">
        <input type="submit" value=" 수정하기 ">
        <a href="/crud/board">목록</a>
      </th>
    </tr>
  </table>

</form>