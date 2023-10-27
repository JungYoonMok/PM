회원 리스트 화면

<table border="1">
  <tr>
    <th>ID</th>
    <th>email</th>
    <th>가입일</th>
    <th>관리</th>
  </tr>

  <?
    foreach ($list as $ls) {
  ?>

  <tr>
    <td><?=$ls->idx;?></td>
    <td><?=$ls->email;?></td>
    <td><?=$ls->regdate;?></td>
    <td>
      <a href="/crud/members/show/<?=$ls->idx;?>">상세</a>
      <a href="/crud/members/edit/<?=$ls->idx;?>">수정</a>
      <a href="/crud/members/delete/<?=$ls->idx;?>">삭제</a>
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
<a href="/crud/members/join">회원가입</a>