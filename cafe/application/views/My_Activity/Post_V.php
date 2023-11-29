<!-- 베이스 -->
<div class="p-1 md:p-5 flex flex-col gap-0 text-gray-50">

  <!-- 메인 -->
  <div class="bg-[#2f2f2f] flex flex-col md:flex-row gap-0 border border-[#4f4f4f] rounded shadow-2xl min-h-[1000px]">

    <!-- 사이드 -->
    <? $this->load->view('/my_activity/side_v');?>

    <!-- 컨텐츠 -->
    <div class="flex flex-col justify-between gap-10 p-5 w-full">
      
      <!-- 해당 게시판 최근 리스트 -->
      <div class="bg-[#2f2f2f] w-full p-1 rounded flex flex-col gap-5 shadow-inner overflow-x-auto">
        <table class="text-gray-50 text-center whitespace-nowrap">
          <thead class="text-sm bg-[#3f3f3f] h-10">
            <th class="">ID</th>
            <th class="">분류</th>
            <th class="w-[40%]">제목</th>
            <!-- <th class="">작성자</th> -->
            <th class="">작성날짜</th>
            <th class="">추천</th>
            <th class="">비추천</th>
            <th class="">조회수</th>
            <th class="">신고</th>
          </thead>
          <tbody class="">

          <? if (!empty($post)) { foreach($post as $li) : ?>
            <tr class="border-b border-[#4f4f4f]">
              <td class="p-2"><?= $li->idx ?></td>
              <td class="p-2"><?= $li->board_type ?></td>
              <td class="text-left">
                <a href="/freeboard/<?= $li->idx ?>" class="flex gap-2">
                  <p class="bg-red-500 rounded-full px-2 py-1 text-xs <?= $li->hit > 100 ? '' : 'hidden' ?>">
                    인기
                  </p>
                  <p class="bg-[#4f4f4f] rounded-full px-2 py-1 text-xs <?= $li->group_order > 0 ? '' : 'hidden' ?>">
                    답글
                  </p>
                  <?= $li->title ?>
                  <span class="text-[#9f9f9f]">
                    <!-- 댓글 개수 -->
                    <?= empty($post_comment) ? "(0)" : ($post_comment) ?>
                  </span>
                </a>
              </td>
              <!-- <td><?= $li->user_id ?></td> -->
              <td class="tracking-wide">
                <?= (empty($li->regdate) ? '-' : date("Y-m-d") == substr($li->regdate, 0, 10)) ? substr($li->regdate, 10, 6) : substr($li->regdate, 0, 10); ?>
              </td>
              <td>
                <?= $li->hit ?>
              </td>
              <td>
                <?= $li->hit ?>
              </td>
              <td>
                <?= $li->hit ?>
              </td>
              <td>
                <?= $li->hit ?>
              </td>
            </tr>
          <? endforeach; } else { ?>
            <!-- <p>데이터가 없습니다</p> -->
          <? } ?>

          </tbody>
        </table>
        
        <div class="<?= empty($post) ? 'inline-block' : 'hidden' ?> text-center">
          <p>데이터가 없습니다</p>
        </div>

      </div>

      <div>
        <?= $links; ?>
      </div>
      
    </div>

  </div>

</div>