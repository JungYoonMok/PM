리스트

<table border="1">
  <tr>
    <th>ID</th>
    <th>제목</th>
    <th>작성일</th>
    <th>관리</th>
  </tr>

  <?
    foreach ($list as $ls) {
  ?>

  <tr>
    <td><?=$ls->idx;?></td>
    <td><?=$ls->title;?></td>
    <td><?=$ls->regdate;?></td>
    <td>
      <a href="/crud/board/show/<?=$ls->idx;?>">상세</a>
      <a href="/crud/board/edit/<?=$ls->idx;?>">수정</a>
      <a href="/crud/board/delete/<?=$ls->idx;?>">삭제</a>
    </td>
  </tr>

  <?
    }
  ?>

  <tr>
    <th colspan="3">
      <?=$pages;?>
    </th>
  </tr>

</table>


<a href="/crud">홈</a>
<a href="/crud/board/create">글쓰기</a>