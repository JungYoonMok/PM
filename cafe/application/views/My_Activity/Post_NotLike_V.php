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
            <th class="px-3">ID</th>
            <th class="px-3">분류</th>
            <th class="px-3 w-full">제목</th>
            <th class="px-3">작성날짜</th>
            <th class="px-3">조회수</th>
          </thead>
          
          <? if (!empty($post_notlike)) : ?> 
            <? foreach($post_notlike as $li) : ?>
              <tbody class="duration-200 hover:bg-[#4f4f4f]">
            <tr class="border-b border-[#4f4f4f]">
              <td class="p-2">
                <?= (date("Y-m-d") == substr($li->regdate, 0, 10)) ? '<p class="text-blue-400 px-2 py-0.5 rounded text-sm">new</p>' : $li->idx ?>
              </td>
              <td class="p-2">
                <?= ($li->board_type == 'notice' ? '공지사항' : ($li->board_type == 'freeboard' ? '자유게시판' : ($li->board_type == 'hellow' ? '가입인사' : '' ) ) ) ?>
              </td>
              <td class="flex mt-1.5">
                <a href="/freeboard/<?= $li->idx ?>" class="flex place-items-center gap-1">
                  <p class="bg-red-500 rounded-full px-2 py-1 text-xs <?= $li->hit > 100 ? '' : 'hidden' ?>">
                    인기
                  </p>
                  <p class="bg-[#4f4f4f] rounded-full px-2 py-1 text-xs <?= $li->group_order > 0 ? '' : 'hidden' ?>">
                    답글
                  </p>
                  <p class="">
                    <?= mb_strimwidth($li->title, 0, 50, ' ..') ?>
                    <div class="">
                      <span class="material-symbols-outlined text-[16px] <?= strpos($li->content, '<img') ? '' : 'hidden' ?>">
                        <?= strpos($li->content, '<img') ? 'image' : '' ?>
                      </span>
                      <span class="material-symbols-outlined text-[16px] <?= $li->file > 0 ? '' : 'hidden' ?>">
                        <?= $li->file > 0 ? 'attachment' : '' ?>
                      </span>
                    </div>
                  </p>
                  <a href="/freeboard/<?= $li->idx ?>/#comments" class="underline-offset-4 duration-200 hover:underline decoration-2 text-[#9f9f9f] <?= $li->comment_count == 0 ? 'hidden' : '' ?>">
                    (<?= $li->comment_count ?? 0 ?>)
                  </a>
                  <p class="text-[#9f9f9f] <?= $li->reply_count == 0 ? 'hidden' : '' ?>">
                    답글<?= $li->reply_count ?? 0 ?>
                  </p>
                </a>
              </td>
              <td class="tracking-wide">
                <?= (date("Y-m-d") == substr($li->regdate, 0, 10)) ? substr($li->regdate, 10, 6) : substr($li->regdate, 5, 6); ?>
              </td>
              <td>
                <?= $li->hit ?>
              </td>
            </tr>
          </tbody>
            <? endforeach; ?>
            <? endif; ?>
        </table>
        
        <div class="<?= empty($post_notlike) ? 'inline-block' : 'hidden' ?> text-center">
          <p>데이터가 없습니다</p>
        </div>

      </div>

      <div>
        <?= $links; ?>
      </div>
      
    </div>

  </div>

</div>