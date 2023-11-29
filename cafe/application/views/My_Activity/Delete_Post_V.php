<!-- 베이스 -->
<div class="p-1 md:p-5 flex flex-col gap-0 text-gray-50">

  <!-- 메인 -->
  <div class="bg-[#2f2f2f] flex flex-col md:flex-row gap-0 border border-[#4f4f4f] rounded shadow-2xl min-h-[1000px]">

    <!-- 사이드 -->
    <? $this->load->view('/my_activity/side_v');?>

    <!-- 컨텐츠 -->
    <div class="p-5 w-full flex flex-col gap-10 justify-between">
      
      <!-- 해당 게시판 최근 리스트 -->
      <div class="bg-[#2f2f2f] w-full p-1 rounded flex flex-col overflow-x-auto gap-5 shadow-inner">
        <table class="text-gray-50 text-center whitespace-nowrap">
          <!-- <th class="">번호</th> -->
          <thead class="text-sm bg-[#3f3f3f] h-10">
            <th class="">ID</th>
            <th class="">분류</th>
            <th class="w-[40%]">제목</th>
            <!-- <th class="">작성자</th> -->
            <th class="">작성날짜</th>
            <th class="">삭제날짜</th>
            <th class="">추천</th>
            <th class="">비추천</th>
            <th class="">조회수</th>
            <th class="">신고</th>
          </thead>
          <tbody class="">

          <? if (!empty($delete_post)) { foreach($delete_post as $li) : ?>
            <tr class="border-b border-gray-500">
                <td class="p-2"><?= $li->idx ?></td>
                <td class="p-2"><?= $li->board_type ?></td>
                <td class="text-left">
                  <?= $li->title ?>
                </td>
                <!-- <td><?= $li->user_id ?></td> -->
                <td class="tracking-wide">
                  <?= (empty($li->regdate) ? '-' : date("Y-m-d") == substr($li->regdate, 0, 10)) ? substr($li->regdate, 10, 6) : substr($li->regdate, 0, 10); ?>
                </td>
                <td class="tracking-wide">
                  <?= (empty($li->delete_date) ? '-' : date("Y-m-d") == substr($li->delete_date, 0, 10)) ? substr($li->delete_date, 10, 6) : substr($li->delete_date, 0, 10); ?>
                </td>
                <td><?= $li->hit ?></td>
                <td><?= $li->hit ?></td>
                <td><?= $li->hit ?></td>
                <td><?= $li->hit ?></td>
              </tr>
          <? endforeach; } else { ?>
            <!-- <p>데이터가 없습니다</p> -->
          <? } ?>

          </tbody>
        </table>

        <div class="<?= empty($delete_post) ? 'inline-block' : 'hidden' ?> text-center">
          <p>데이터가 없습니다</p>
        </div>

      </div>

      <div>
        <?= $links; ?>
      </div>
      
    </div>

  </div>

</div>