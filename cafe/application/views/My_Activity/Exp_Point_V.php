<!-- 베이스 -->
<div class="p-1 md:p-5 flex flex-col text-gray-50">

  <!-- 메인 -->
  <div class="bg-[#2f2f2f] flex flex-col md:flex-row border border-[#4f4f4f] rounded shadow-2xl min-h-[1000px]">

    <!-- 사이드 -->
    <? $this->load->view('/my_activity/side_v'); ?>

    <!-- 컨텐츠 -->
    <div class="text-gray-50 p-5 w-full flex flex-col gap-3">

      <div class="flex justify-between">
        <p>경험치 및 포인트</p>
        <p>
          <?= empty($comment_total) ? "0" : $comment_total ?>개
        </p>
      </div>

      <!-- 구분선 -->
      <div class="border-b border-gray-500"></div>

      <!-- 메인 -->
      <div class="flex flex-col justify-between gap-10 h-full">

        <div class="flex flex-col gap-3">
          <? if (!empty($comment)) {
            foreach ($comment as $li): ?>
              <div class="relative border-b duration-200 hover:-translate-y-1 shadow-md hover:shadow-2xl border-gray-500 bg-[#3f3f3f] rounded p-3 flex flex-col gap-3">

                <!-- 작성일 -->
                <div class="text-right flex justify-between text-sm mb-5">
                  <p class="absolute left-0 px-2 py-1 bg-[#2f2f2f] rounded-br rounded-tl top-0">
                    <?= (date("Y-m-d") == substr($li->regdate, 0, 10)) ? '<p class="absolute left-0 px-2 py-1 bg-[#2f2f2f] rounded-br rounded-tl top-0 text-blue-400 rounded text-sm">new</p>' : $li->idx ?>
                  </p>
                  <p class="absolute right-0 px-2 py-1 bg-[#2f2f2f] rounded-bl rounded-tr top-0">
                    <?= (date("Y-m-d") == substr($li->regdate, 0, 10)) ? substr($li->regdate, 10, 6) : substr($li->regdate, 0, 10); ?>
                  </p>
                </div>

                <!-- 댓글 내용 -->
                <div class="flex flex-col gap-3">
                  <div class="flex place-items-center gap-2">
                    <a href="/<?= $li->board_type ?>/<?= $li->boards_idx ?>">
                      <?= $li->title ?>
                    </a>
                    <a href="/<?= $li->board_type ?>/<?= $li->boards_idx ?>/#comments" class="underline-offset-4 duration-200 hover:underline decoration-2 text-[#9f9f9f] <?= $li->comment_count == 0 ? 'hidden' : '' ?>">
                      (<?= $li->comment_count ?? 0 ?>)
                    </a>
                    <p class="text-[#9f9f9f] <?= $li->reply_count == 0 ? 'hidden' : '' ?>">
                      답글<?= $li->reply_count ?? 0 ?>
                    </p>
                  </div>
                  <div class="flex gap-2 place-items-center w-full">
                    <span class="material-symbols-outlined -scale-x-100 text-[#9f9f9f]">
                      subdirectory_arrow_left
                    </span>
                    <p class="px-3 py-2 rounded w-full bg-[#2f2f2f]">
                      <a href="/<?= $li->board_type ?>/<?= $li->boards_idx ?>/#comments">
                        <?= $li->content ?>
                      </a>
                    </p>
                  </div>
                </div>

              </div>
            <? endforeach;
          } else { ?>
            <!-- <p>데이터가 없습니다</p> -->
          <? } ?>

          <div class="<?= empty($comment) ? 'inline-block' : 'hidden' ?> text-center">
            <p>데이터가 없습니다</p>
          </div>

        </div>


        <div>
          <?= $links; ?>
        </div>

      </div>

    </div>

  </div>

</div>