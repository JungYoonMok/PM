<!-- 베이스 -->
<div class="p-1 md:p-5 flex flex-col text-gray-50">

  <!-- 메인 -->
  <div class="bg-[#2f2f2f] flex flex-col md:flex-row border border-[#4f4f4f] rounded shadow-2xl min-h-[1000px]">

    <!-- 사이드 -->
    <? $this->load->view('/my_activity/side_v'); ?>

    <!-- 컨텐츠 -->
    <div class="text-gray-50 p-5 w-full flex flex-col gap-3">

      <div class="flex justify-between">
        <p>경험치 및 포인트 지급 내역</p>
        <p>
          <?= empty($exp_point_total) ? "0" : $exp_point_total ?> 건
        </p>
      </div>

      <!-- 구분선 -->
      <div class="border-b border-gray-500"></div>

      <!-- 메인 -->
      <div class="flex flex-col justify-between gap-10 h-full">

        <div class="flex flex-col gap-3">
          <? if (!empty($exp_point_log)) {
            foreach ($exp_point_log as $li): ?>
            <div class="flex flex-col text-sm gap-2 bg-[#3f3f3f] rounded p-3">
              <div class="flex justify-between bg-[#2f2f2f] rounded px-3 py-1">
                <div class="flex gap-3 place-items-center">
                  <p class="hidden md:inline-block text-sm text-[#9f9f9f]">
                    <?= $li->idx ?>
                  </p>
                  <p class="text-[#9f9f9f] hidden md:inline-block">|</p>
                  <p>
                    <?= $li->title ?>
                  </p>
                  <p class="text-[#9f9f9f]">|</p>
                  <p class="py-3">
                    <?= $li->content ?>
                  </p>
                </div>
                <div class="flex place-items-center">
                  <p>
                    <?= date("Y-m-d") == substr($li->regdate, 0, 10) ? substr($li->regdate, 10, 6) : substr($li->regdate, 0, 16); ?>
                  </p>
                </div>
              </div>
              <div class="flex justify-between gap-5 opacity-80">
                
                <div class="flex gap-5">
                  <div title="획득한 경험치" class="bg-[#2f2f2f] rounded px-3 py-1 flex gap-3 place-items-center">
                    <span class="material-symbols-outlined text-green-500">
                      expand_circle_up
                    </span>
                    <p>
                      <?= $li->exp ?> exp
                    </p>
                  </div>
                  <div title="획득한 포인트" class="bg-[#2f2f2f] rounded px-3 py-1 flex gap-3 place-items-center">
                    <span class="material-symbols-outlined text-yellow-500">
                      payments
                    </span>
                    <p>
                      <?= $li->point ?> point
                    </p> 
                  </div>
                </div>

                <div class="<?= date("Y-m-d") == substr($li->regdate, 0, 10) ? '' : 'hidden'; ?> flex place-items-center px-3 bg-[#2f2f2f] border border-[#4f4f4f]">
                  <p class="text-yellow-500 duration-200 animate-pulse">
                    New
                  </p>
                </div>

              </div>
            </div>
            <? endforeach;
          } else { ?>
            <!-- <p>데이터가 없습니다</p> -->
          <? } ?>

          <div class="<?= empty($exp_point_log) ? 'inline-block' : 'hidden' ?> text-center">
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