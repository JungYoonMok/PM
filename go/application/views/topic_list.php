<ul>
  <?
    foreach($topics as $entry){
  ?>

  <li>
    <a href="/go/topic/get/<?=$entry->idx?>"><?=$entry->title?></a>
  </li>

  <?}?>
</ul>