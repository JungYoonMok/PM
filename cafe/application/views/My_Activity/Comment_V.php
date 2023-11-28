<!-- 베이스 -->
<div class="p-1 md:p-5 flex flex-col text-gray-50">

  <!-- 메인 -->
  <div class="bg-[#2f2f2f] flex flex-col md:flex-row border border-[#4f4f4f] rounded shadow-2xl min-h-[1000px]">

    <!-- 사이드 -->
    <? $this->load->view('/my_activity/side_v'); ?>

    <!-- 컨텐츠 -->
    <div class="text-gray-50 p-5 w-full flex flex-col gap-3">

      <div class="flex justify-between">
        <p>내가 작성한 댓글</p>
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
              <div
                class="relative border-b duration-200 hover:-translate-y-1 shadow-md hover:shadow-2xl border-gray-500 bg-[#3f3f3f] rounded p-3 flex flex-col gap-3">

                <!-- 작성일 -->
                <div class="text-right flex justify-between text-sm mb-5">
                  <p class="absolute left-0 px-2 py-1 bg-[#2f2f2f] rounded-br rounded-tl top-0">
                    <?= $li->idx ?>
                  </p>
                  <p class="absolute right-0 px-2 py-1 bg-[#2f2f2f] rounded-bl rounded-tr top-0">
                    <?= (empty($li->regdate) ? '-' : date("Y-m-d") == substr($li->regdate, 0, 10)) ? substr($li->regdate, 10, 6) : substr($li->regdate, 0, 10); ?>
                  </p>
                </div>

                <!-- 댓글 내용 -->
                <div class="text-left">
                  <?= $li->content ?>
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