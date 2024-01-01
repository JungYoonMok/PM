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
            <div class="">
              <div class="">
                
              </div>
            </div>

              <p>
                <?= $li->idx ?>
                <?= $li->title ?>
                <?= $li->content ?>
                <?= $li->exp ?>
                <?= $li->point ?>
                <?= $li->members_user_id ?>
                <?= $li->regdate ?>
              </p>

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