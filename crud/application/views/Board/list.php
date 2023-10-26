리스트

<table border="1">
  <tr>
    <th>제목</th>
    <th>작성일</th>
    <th>관리</th>
  </tr>

  <?
    foreach ($list as $ls) {
  ?>

  <tr>
    <td><?=$ls->title;?></td>
    <td><?=$ls->regdate;?></td>
    <td>
      <a href="/crud/board/show/<?=$ls->idx;?>">View</a>
      <a href="/crud/board/edit/<?=$ls->idx;?>">Edit</a>
      <a href="/crud/board/delete/<?=$ls->idx;?>">Delete</a>
    </td>
  </tr>

  <?
    }
  ?>


</table>


<a href="/crud">홈</a>
<a href="/crud/board/create">글쓰기</a>