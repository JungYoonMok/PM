<!-- 베이스 -->
<div class="p-5 flex flex-col gap-0 text-gray-50">

  <!-- 메인 -->
  <div class="bg-[#2f2f2f] flex gap-0 border border-[#4f4f4f] rounded shadow-2xl h-[1000px]">

    <!-- 사이드 -->
    <div class="p-5 flex flex-col gap-3 border-r border-dashed border-[#4f4f4f]">

      <div class="flex gap-3 whitespace-nowrap px-3 py-4 border border-[#4f4f4f] bg-[#3f3f3f] rounded hover:bg-[#4f4f4f] duration-200">
        <span class="material-symbols-outlined">
          edit
        </span>
        <p>작성글</p>
      </div>
      <div class="flex gap-3 whitespace-nowrap px-3 py-4 border border-[#4f4f4f] bg-[#3f3f3f] rounded hover:bg-[#4f4f4f] duration-200">
        <span class="material-symbols-outlined">
          chat_paste_go
        </span>
        <p>작성 댓글</p>
      </div>
      <div class="flex gap-3 whitespace-nowrap px-3 py-4 border border-[#4f4f4f] bg-[#3f3f3f] rounded hover:bg-[#4f4f4f] duration-200">
        <span class="material-symbols-outlined">
          rate_review
        </span>
        <p>댓글단 글</p>
      </div>
      <div class="flex gap-3 whitespace-nowrap px-3 py-4 border border-[#4f4f4f] bg-[#3f3f3f] rounded hover:bg-[#4f4f4f] duration-200">
        <span class="material-symbols-outlined">
          thumb_up
        </span>
        <p>좋아요한 글</p>
      </div>
      <div class="flex gap-3 whitespace-nowrap px-3 py-4 border border-[#4f4f4f] bg-[#3f3f3f] rounded hover:bg-[#4f4f4f] duration-200">
        <span class="material-symbols-outlined">
          thumb_down
        </span>
        <p>싫요한 글</p>
      </div>
      <div class="flex gap-3 whitespace-nowrap px-3 py-4 border border-[#4f4f4f] bg-[#3f3f3f] rounded hover:bg-[#4f4f4f] duration-200">
        <span class="material-symbols-outlined">
          scan_delete
        </span>
        <p>삭제한 게시글</p>
      </div>

    </div>

    <!-- 구분선 -->
    <!-- <div class="border-b mt-2 border-gray-500 -rotate-90"></div> -->

    <!-- 컨텐츠 -->
    <div class="p-5 w-full border-l border-[#4f4f4f] border-dashed">
      
      <!-- 해당 게시판 최근 리스트 -->
      <div class="bg-[#2f2f2f] w-full p-1 rounded flex flex-col gap-5 shadow-inner">
        <table class="text-gray-50 text-center whitespace-nowrap">
          <!-- <th class="">번호</th> -->
          <thead class="text-sm bg-[#3f3f3f] h-10">
            <th class="">ID</th>
            <th class="">분류</th>
            <th class="w-[40%]">제목</th>
            <th class="">작성자</th>
            <th class="">작성날짜</th>
          </thead>
          <? $numCount = 0; ?>
          <? foreach ($list as $li): ?>
            <tbody class="">
              <tr class="border-b border-gray-500">
                <!-- <td class="p-2">
                  <?= $numCount += 1 ?>
                </td> -->
                <td class="p-2"><?= $li->idx ?></td>
                <td class="p-2"><?= $li->board_type ?></td>
                <td class="text-left">
                  <a href="/freeboard/<?= $li->idx ?>">
                    <?= $li->title ?>
                  </a>
                </td>
                <td><?= $li->user_id ?></td>
                <td class="tracking-wide">
                  <!-- <?= $li->regdate ?> -->
                  <?= (empty($li->regdate) ? '-' : date("Y-m-d") == substr($li->regdate, 0, 10)) ? substr($li->regdate, 10, 6) : substr($li->regdate, 0, 16); ?>
                </td>
              </tr>
            </tbody>
          <? endforeach ?>
        </table>
      </div>
      
    </div>

  </div>

</div>