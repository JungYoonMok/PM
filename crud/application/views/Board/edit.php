<div style="position : relative; width : 400px; height : 300px; margin : auto;">
  <div style="position : absolute; margin : 0 auto; top : 50%; left : 100%; transform: translate(-50%, -50%); width : 700px; height : 0px;">
    <form name="bfpm" action="/crud/board/update/<?=$edit->idx;?>" method="post">
    <input type="hidden" name=_method value="PUT" />
      <table border="1">
        <tr>
          <th style="padding : 10px;">제목</th>
          <td>
            <input type="text" name="title" value="<?=$edit->title;?>" />
          </td>
        </tr>
        <tr>
          <th style="padding : 10px;">내용</th>
          <td>
            <textarea name="contens" rows="8"><?=$edit->contens;?></textarea>
          </td>
        </tr>
        <tr>
          <th colspan="2">
            <input type="submit" value=" 수정하기 " style="padding : 10px; background : #f3f3f3; border : none; cursor : pointer">
            <a href="/crud/board" style="padding : 10px;">목록</a>
          </th>
        </tr>
      </table>
    </div>
  </div>

</form>