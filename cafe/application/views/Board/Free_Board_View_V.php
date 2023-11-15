<!-- 메인 틀 -->
<div id="base" class="flex duration-200 bg-[#3f3f3f] text-gray-50 w-full relative">

  <!-- 메인 베이스 -->
  <div class="flex flex-col justify-between w-full h-full">

    <!-- 메인 -->
    <div class="md:mb-20 w-full p-5 flex flex-col">

      <div class="bg-[#2f2f2f] mb-5 opacity-90 p-5 flex gap-1">
        <h2>자유게시판 - 등록</h2>
        <h2 class="font-bold animate-pulse"><?= $total ?></h2>
        <h2>건</h2>
      </div>

      <div class="bg-[#2f2f2f] border border-[#4f4f4f] w-full p-5 rounded flex flex-col gap-5 relative drop-shadow-2xl">
        <div class="">
          <table class="text-gray-50 w-full">
            <div class="">
              <th class="text-sm text-left pt-3">No.</th>
              <th class="text-sm text-left pt-3">글 번호</th>
              <th class="text-sm text-left pt-3 w-[30%]">제목</th>
              <th class="text-sm text-left pt-3">작성자</th>
              <th class="text-sm text-left pt-3">작성날짜</th>
              <th class="text-sm text-left pt-3">조회수</th>
              <th class="text-sm text-left pt-3">추천</th>
              <th class="text-sm text-left pt-3">비추천</th>
            </div>
            <? $board_count = 0; ?>
            <?foreach($list as $li):?>
              <tr class="border-b border-gray-500">
                <td class="p-2"><?= $board_count += 1; ?></td>
                <td class="p-2"><?= $li->idx ?></td>
                <td class="p-2">
                  <a href="/freeboard/<?= $li->idx ?>">
                    <?= $li -> title ?>
                  </a>
                </td>
                <td class="p-2"><?= $li -> user_id ?></td>
                <td class="p-2"><?= substr( $li -> regdate, 0, 10) ?></td>
                <td class="p-2"><?= '00' ?></td>
                <td class="p-2"><?= '00' ?></td>
                <td class="p-2"><?= '00' ?></td>
              </tr>
            <?endforeach?>
          </table>
        </div>
      </div>
      
    </div>
    <!-- 메인끝 -->

  </div>

</div>