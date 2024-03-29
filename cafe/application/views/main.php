<!-- 메인 틀 -->
<div id="base" class="duration-200 bg-[#3f3f3f] text-gray-50">

  <!-- 메인 베이스 -->
  <div class="flex flex-col w-full">

    <!-- <a href="#" class="p-5 m-5 flex place-items-center border border-[#4f4f4f] shadow-lg gap-2 duration-200 bg-[#2f2f2f] rounded-full hover:bg-[#1f1f1f]">
      <span class="material-symbols-outlined text-lime-500 animate-bounce shadow-2xl text-3xl">
        adb
      </span>
      <p>인지중인 버그 및 오류 현황</p>
    </a> -->

    <!-- 이미지 배너 및 스와이프 -->
    <!-- <div class="border border-[#4f4f4f] bg-[#2f2f2f] drop-shadow-xl mx-1 md:mx-5 mb-5 md:mb-0 p-10 rounded-md ">
      <div class="animate-pulse flex space-x-4">
        <div class="rounded-full bg-[#5f5f5f] h-14 w-14"></div>
        <div class="flex-1 space-y-6 py-1">
          <div class="h-2 bg-[#5f5f5f] rounded"></div>
          <div class="space-y-3">
            <div class="grid grid-cols-3 gap-4">
              <div class="h-2 bg-[#5f5f5f] rounded col-span-2"></div>
              <div class="h-2 bg-[#5f5f5f] rounded col-span-1"></div>
            </div>
            <div class="h-2 bg-[#5f5f5f] rounded"></div>
          </div>
        </div>
      </div>
    </div> -->

    <!-- 메인 -->
    <div class="w-full p-1 md:p-5 flex flex-col gap-5">

      <!-- 최근게시글 -->
      <div class="w-full drop-shadow-xl">
        <div class="flex bg-[#1f1f1f] rounded-t-xl drop-shadow-2xl items-center place-content-between">
          <div class="opacity-90 p-3 flex w-full justify-between">
            <div class="flex gap-2 place-items-center">
              <span class="material-symbols-outlined text-[20px]">
                newspaper
              </span>
              <h2>최근 게시글</h2>
            </div>
            <p class="text-[#9f9f9f] text-sm <?= empty($board_list) ? 'hidden' : '' ?>">
              모든 게시글 <?= $total_notice + $total_freeboard + $total_hellow?>개
            </p>
          </div>
        </div>

        <div class="bg-[#2f2f2f] w-full border border-[#4f4f4f] rounded flex flex-col gap-5 shadow-inner overflow-x-auto ">
          <table class="text-gray-50 text-center whitespace-nowrap min-w-[500px]">
            <thead class="text-sm font-[s-core2] bg-[#3f3f3f] h-10 <?= empty($board_list) ? 'hidden' : '' ?>">
              <th class="">
                ID
              </th>
              <th class="">
                분류
              </th>
              <th class="w-full">
                제목
              </th>
              <th class="px-3">
                <span title="게시글 작성자" class="material-symbols-outlined text-[20px]">
                  person
                </span>
              </th>
              <th class="px-3">
                <span title="게시글 작성 날짜" class="material-symbols-outlined text-[20px]">
                  calendar_month
                </span>
              </th>
              <th class="px-3">
                <span title="추천, 비추천 합계" class="material-symbols-outlined text-[20px]">
                  thumbs_up_down
                </span>
              </th>
              <th class="px-3">
                <span title="조회수" class="material-symbols-outlined text-[20px]">
                  visibility
                </span>
              </th>
            </thead>
            <? foreach ($board_list as $li): ?>
              <tbody class="duration-200 hover:bg-[#4f4f4f]">
                <tr class="border-b border-[#4f4f4f] text-sm">
                  <td class="px-3 md:px-5 py-3">
                    <?= $li->idx ?>
                  </td>
                  <td class="px-3 md:px-5 py-3">
                    <?= ($li->board_type == 'notice' ? '공지사항' : ($li->board_type == 'freeboard' ? '자유게시판' : ($li->board_type == 'hellow' ? '가입인사' : '' ) ) ) ?>
                  </td>
                  <td class="text-left duration-150 hover:scale-[0.98]">
                    <a href="/<?= $li->board_type?>/<?= $li->idx ?>" class="flex gap-2 place-items-center">
                      <p class="bg-red-500 rounded-full px-2 py-1 text-xs <?= $li->hit > 50 ? '' : 'hidden' ?>">
                        인기
                      </p>
                      <p class="bg-[#4f4f4f] rounded-full px-2 py-1 text-xs <?= $li->group_order > 0 ? '' : 'hidden' ?>">
                        답글
                      </p>
                      <p class="">
                        <?= htmlspecialchars($li->title) ?>
                      </p>
                      <div class="">
                        <span class="material-symbols-outlined text-[16px]">
                          <?= strpos($li->content, '<img') ? 'image' : '' ?>
                        </span>
                        <span class="material-symbols-outlined text-[16px]">
                          <?= $li->file > 0 ? 'attachment' : '' ?>
                        </span>
                      </div>
                    </a>
                  </td>
                  <td class="px-3 flex gap-2 mx-auto justify-center place-items-center text-center">
                    <img src="/uploads/<?= $li->profile ?>" alt="img" class="p-0.5 border border-[#4f4f4f] w-8 h-8 mt-1 rounded-[50%] <?= $li->profile ? '' : 'hidden'?>">
                    <p class="material-symbols-outlined w-8 h-8 p-0.5 rounded-[50%] mt-1 text-gray-400 flex place-items-center justify-center <?= $li->profile ? 'hidden' : '' ?>">
                      person
                    </p>
                    <p class="tracking-wider mt-1">
                      <?= $li->nickname ?>
                    </p>
                  </td>
                  <td class="px-3">
                    <?= (date("Y-m-d") == substr($li->regdate, 0, 10)) ? substr($li->regdate, 11, 5) : substr($li->regdate, 5, 5); ?>
                  </td>
                  <td class="px-3 <?= ($li->like_count - $li->dislike_count) < 0 ? 'text-red-400' : '' ?>"><?= $li->like_count - $li->dislike_count ?></td>
                  <td class="px-3"><?= $li->hit?></td>
                </tr>
              </tbody>
            <? endforeach ?>
          </table>
          <div class="<?= empty($board_list) ? '' : 'hidden' ?> relative">
            <p class="flex justify-center place-items-center py-20">
              데이터가 없습니다
            </p>
          </div>
        </div>
      </div>
      
      <div class="flex-row lg:flex w-full gap-5">
        <!-- 공지사항 -->
        <div class="w-full drop-shadow-xl">
          <div class="flex bg-[#1f1f1f] rounded mb-3 drop-shadow-2xl items-center place-content-between">
            <div class="opacity-90 p-3 flex justify-between w-full gap-1">
              <div class="flex gap-2 place-items-center">
                <span class="material-symbols-outlined text-[20px]">
                  notifications
                </span>
                <h2>공지사항</h2>
              </div>
              <p class="text-[#9f9f9f] text-sm <?= empty($board_notice) ? 'hidden' : '' ?>">
                모든 게시글 <?= $total_notice ?>개
              </p>
            </div>
          </div>

          <div class="bg-[#2f2f2f] w-full border border-[#4f4f4f] rounded flex flex-col gap-5 shadow-inner overflow-x-auto">
            <table class="text-gray-50 text-center whitespace-nowrap min-w-[500px]">
              <thead class="text-sm bg-[#3f3f3f] h-10 <?= empty($board_notice) ? 'hidden' : '' ?>">
                <th class="w-full">
                  제목
                </th>
                <th class="px-3">
                  <span title="게시글 작성자" class="material-symbols-outlined text-[20px]">
                    person
                  </span>
                </th>
                <th class="px-3">
                  <span title="게시글 작성 날짜" class="material-symbols-outlined text-[20px]">
                    calendar_month
                  </span>
                </th>
                <th class="px-3">
                  <span title="추천, 비추천 합계" class="material-symbols-outlined text-[20px]">
                    thumbs_up_down
                  </span>
                </th>
                <th class="px-3">
                  <span title="조회수" class="material-symbols-outlined text-[20px]">
                    visibility
                  </span>
                </th>
              </thead>
              <? foreach ($board_notice as $li): ?>
                <tbody class="duration-200 hover:bg-[#4f4f4f]">
                  <tr class="border-b border-[#4f4f4f] text-sm">
                    
                    <td class="pl-3 text-left duration-150 hover:scale-[0.98]">
                      <a href="/<?= $li->board_type?>/<?= $li->idx ?>" class="flex gap-2 place-items-center">
                        <p class="bg-red-500 rounded-full px-2 py-1 text-xs <?= $li->hit > 100 ? '' : 'hidden' ?>">
                          인기
                        </p>
                        <p class="bg-[#4f4f4f] rounded-full px-2 py-1 text-xs <?= $li->group_order > 0 ? '' : 'hidden' ?>">
                          답글
                        </p>
                        <p class="">
                          <?= htmlspecialchars(mb_strimwidth($li->title,0, 40, ' ..')) ?>
                        </p>
                        <div>
                          <span class="material-symbols-outlined text-[16px]">
                            <?= strpos($li->content, '<img') ? 'image' : '' ?>
                          </span>
                          <span class="material-symbols-outlined text-[16px]">
                            <?= $li->file > 0 ? 'attachment' : '' ?>
                          </span>
                        </div>
                      </a>
                    </td>
                    <td class="px-3 flex gap-2 justify-center place-items-center text-center">
                      <img src="/uploads/<?= $li->profile ?>" alt="img" class="p-0.5 border border-[#4f4f4f] w-8 h-8 mt-1 rounded-[50%] <?= $li->profile ? '' : 'hidden'?>">
                      <p class="material-symbols-outlined w-8 h-8 p-0.5 rounded-[50%] mt-1 text-gray-400 flex place-items-center justify-center <?= $li->profile ? 'hidden' : '' ?>">
                        person
                      </p>
                      <p class="mt-1">
                        <?= mb_strimwidth($li->nickname,0, 10, ' ..') ?>
                      </p>
                    </td>
                    <td class="px-3">
                      <?= (date("Y-m-d") == substr($li->regdate, 0, 10)) ? substr($li->regdate, 11, 5) : substr($li->regdate, 5, 5); ?>
                    </td>
                    <td class="px-3 <?= ($li->like_count - $li->dislike_count) < 0 ? 'text-red-400' : '' ?>"><?= $li->like_count - $li->dislike_count ?></td>
                    <td class="px-3"><?= $li->hit?></td>
                  </tr>
                </tbody>
              <? endforeach ?>
            </table>
            <div class="<?= empty($board_notice) ? '' : 'hidden' ?> relative">
              <p class="flex justify-center place-items-center py-20">
                데이터가 없습니다
              </p>
            </div>
          </div>
        </div>

        <!-- 최근 댓글 -->
        <div class="w-full mt-5 lg:mt-0 drop-shadow-xl">
          <div class="flex bg-[#1f1f1f] rounded mb-3 drop-shadow-2xl items-center place-content-between">
            <div class="opacity-90 p-3 flex justify-between w-full gap-1">
              <div class="flex gap-2 place-items-center">
                <span class="material-symbols-outlined text-[20px]">
                  chat_bubble
                </span>
                <h2>최근 댓글</h2>
              </div>
              <p class="text-[#9f9f9f] text-sm <?= empty($get_comment) ? 'hidden' : '' ?>">
                모든 댓글 <?= $total_comment ?>개
              </p>
            </div>
          </div>

          <div class="bg-[#2f2f2f] w-full border border-[#4f4f4f] rounded flex flex-col gap-5 shadow-inner overflow-x-auto">
            <table class="text-gray-50 text-center whitespace-nowrap">
              <thead class="text-sm bg-[#3f3f3f] h-10 <?= empty($get_comment) ? 'hidden' : '' ?>">
                <th class="w-full">댓글</th>
                <th class="">
                  <span title="댓글 작성자" class="material-symbols-outlined text-[20px] px-3">
                    person
                  </span>
                </th>
                <th class="">
                  <span title="댓글 작성 날짜" class="material-symbols-outlined text-[20px] px-3">
                    calendar_month
                  </span>
                </th>
              </thead>
              <? foreach ($get_comment as $li): ?>
                <tbody class="duration-200 hover:bg-[#4f4f4f]">
                  <tr class="border-b border-[#4f4f4f] text-sm">
                    
                    <td class="pl-3 text-left duration-150 hover:scale-[0.98]">
                      <a href="/<?= $li->board_type?>/<?= $li->boards_idx ?>/#comments" class="flex gap-2 place-items-center">
                        <span class="material-symbols-outlined text-[20px]">
                          chat_bubble
                        </span>
                        <p class="">
                          <?= htmlspecialchars(mb_strimwidth($li->content,0, 40, ' ..')) ?>
                        </p>
                      </a>
                    </td>
                    <td class="px-3 flex gap-2 justify-center place-items-center text-center">
                      <img src="/uploads/<?= $li->profile ?>" alt="img" class="p-0.5 border border-[#4f4f4f] w-8 h-8 mt-1 rounded-[50%] <?= $li->profile ? '' : 'hidden'?>">
                      <p class="material-symbols-outlined w-8 h-8 rounded-[50%] mt-1 p-0.5 text-gray-400 flex place-items-center justify-center <?= $li->profile ? 'hidden' : '' ?>">
                        person
                      </p>
                      <p class="mt-1">
                        <?= mb_strimwidth($li->nickname,0, 10, ' ..') ?>
                      </p>
                    </td>
                    <td class="px-3">
                      <?= (date("Y-m-d") == substr($li->regdate, 0, 10)) ? substr($li->regdate, 11, 5) : substr($li->regdate, 5, 5); ?>
                    </td>
                  </tr>
                </tbody>
              <? endforeach ?>
            </table>
            <div class="<?= empty($get_comment) ? '' : 'hidden' ?> relative">
              <p class="flex justify-center place-items-center py-20">
                데이터가 없습니다
              </p>
            </div>
          </div>
        </div>
      </div>

      <!-- 자유게시판, 가입인사 -->
      <div class="flex-row lg:flex w-full gap-5">
        <!-- 자유게시판 -->
        <div class="w-full drop-shadow-xl">
          <div class="flex bg-[#1f1f1f] rounded mb-3 drop-shadow-2xl items-center place-content-between">
            <div class="opacity-90 p-3 flex justify-between w-full gap-1">
              <div class="flex gap-2 place-items-center">
                <span class="material-symbols-outlined text-[20px]">
                  post
                </span>
                <h2>자유게시판</h2>
              </div>
              <p class="text-[#9f9f9f] text-sm <?= empty($board_freeboard) ? 'hidden' : '' ?>">
                모든 게시글 <?= $total_freeboard ?>개
              </p>
            </div>
          </div>

          <div class="bg-[#2f2f2f] w-full border border-[#4f4f4f] rounded flex flex-col gap-5 shadow-inner overflow-x-auto">
            <table class="text-gray-50 text-center whitespace-nowrap min-w-[500px]">
              <thead class="text-sm bg-[#3f3f3f] h-10 <?= empty($board_freeboard) ? 'hidden' : '' ?>">
                <th class="w-full">제목</th>
                <th class="px-3">
                  <span title="게시글 작성자" class="material-symbols-outlined text-[20px]">
                    person
                  </span>
                </th>
                <th class="px-3">
                  <span title="게시글 작성 날짜" class="material-symbols-outlined text-[20px]">
                    calendar_month
                  </span>
                </th>
                <th class="px-3">
                  <span title="추천, 비추천 합계" class="material-symbols-outlined text-[20px]">
                    thumbs_up_down
                  </span>
                </th>
                <th class="px-3">
                  <span title="조회수" class="material-symbols-outlined text-[20px]">
                    visibility
                  </span>
                </th>
              </thead>
              <? foreach ($board_freeboard as $li): ?>
                <tbody class="duration-200 hover:bg-[#4f4f4f]">
                  <tr class="border-b border-[#4f4f4f] text-sm">
                    
                    <td class="pl-3 text-left duration-150 hover:scale-[0.98]">
                      <a href="/<?= $li->board_type?>/<?= $li->idx ?>" class="flex gap-2 place-items-center">
                        <p class="bg-red-500 rounded-full px-2 py-1 text-xs <?= $li->hit > 100 ? '' : 'hidden' ?>">
                          인기
                        </p>
                        <p class="bg-[#4f4f4f] rounded-full px-2 py-1 text-xs <?= $li->group_order > 0 ? '' : 'hidden' ?>">
                          답글
                        </p>
                        <p class="">
                          <?= htmlspecialchars(mb_strimwidth($li->title,0, 40, ' ..')) ?>
                        </p>
                        <div>
                          <span class="material-symbols-outlined text-[16px]">
                            <?= strpos($li->content, '<img') ? 'image' : '' ?>
                          </span>
                          <span class="material-symbols-outlined text-[16px]">
                            <?= $li->file > 0 ? 'attachment' : '' ?>
                          </span>
                        </div>
                      </a>
                    </td>
                    <td class="px-3 flex gap-2 justify-center place-items-center text-center">
                      <img src="/uploads/<?= $li->profile ?>" alt="img" class="p-0.5 border border-[#4f4f4f] w-8 h-8 mt-1 rounded-[50%] <?= $li->profile ? '' : 'hidden'?>">
                      <p class="material-symbols-outlined w-8 h-8 p-0.5 rounded-[50%] mt-1 text-gray-400 flex place-items-center justify-center <?= $li->profile ? 'hidden' : '' ?>">
                        person
                      </p>
                      <p class="mt-1">
                        <?= mb_strimwidth($li->nickname,0, 10, ' ..') ?>
                      </p>
                    </td>
                    <td class="px-3">
                      <?= (date("Y-m-d") == substr($li->regdate, 0, 10)) ? substr($li->regdate, 11, 5) : substr($li->regdate, 5, 5); ?>
                    </td>
                    <td class="px-3 <?= ($li->like_count - $li->dislike_count) < 0 ? 'text-red-400' : '' ?>"><?= $li->like_count - $li->dislike_count ?></td>
                    <td class="px-3"><?= $li->hit?></td>
                  </tr>
                </tbody>
              <? endforeach ?>
            </table>
            <div class="<?= empty($board_freeboard) ? '' : 'hidden' ?> relative">
              <p class="flex justify-center place-items-center py-20">
                데이터가 없습니다
              </p>
            </div>
          </div>
        </div>

        <!-- 가입인사 -->
        <div class="w-full mt-5 lg:mt-0 drop-shadow-xl">
          <div class="flex bg-[#1f1f1f] rounded mb-3 drop-shadow-2xl items-center place-content-between">
            <div class="opacity-90 p-3 flex justify-between w-full gap-1">
              <div class="flex gap-2 place-items-center">
                <span class="material-symbols-outlined text-[20px]">
                  front_hand
                </span>
                <h2>가입인사</h2>
              </div>
              <p class="text-[#9f9f9f] text-sm <?= empty($board_hellow) ? 'hidden' : '' ?>">
                모든 게시글 <?= $total_hellow?>개
              </p>
            </div>
          </div>

          <div class="bg-[#2f2f2f] w-full border border-[#4f4f4f] rounded flex flex-col gap-5 shadow-inner overflow-x-auto">
            <table class="text-gray-50 text-center whitespace-nowrap min-w-[500px]">
              <thead class="text-sm bg-[#3f3f3f] h-10 <?= empty($board_hellow) ? 'hidden' : '' ?>">
                <th class="w-full">
                  제목
                </th>
                <th class="px-3">
                  <span title="게시글 작성자" class="material-symbols-outlined text-[20px]">
                    person
                  </span>
                </th>
                <th class="px-3">
                  <span title="게시글 작성 날짜" class="material-symbols-outlined text-[20px]">
                    calendar_month
                  </span>
                </th>
                <th class="px-3">
                  <span title="추천, 비추천 합계" class="material-symbols-outlined text-[20px]">
                    thumbs_up_down
                  </span>
                </th>
                <th class="px-3">
                  <span title="조회수" class="material-symbols-outlined text-[20px]">
                    visibility
                  </span>
                </th>
              </thead>
              <? foreach ($board_hellow as $li): ?>
                <tbody class="duration-200 hover:bg-[#4f4f4f]">
                  <tr class="border-b border-[#4f4f4f] text-sm">
                    
                    <td class="pl-3 text-left duration-150 hover:scale-[0.98]">
                      <a href="/<?= $li->board_type?>/<?= $li->idx ?>" class="flex gap-2 place-items-center">
                        <p class="bg-red-500 rounded-full px-2 py-1 text-xs <?= $li->hit > 100 ? '' : 'hidden' ?>">
                          인기
                        </p>
                        <p class="bg-[#4f4f4f] rounded-full px-2 py-1 text-xs <?= $li->group_order > 0 ? '' : 'hidden' ?>">
                          답글
                        </p>
                        <p class="">
                          <?= htmlspecialchars(mb_strimwidth($li->title,0, 40, ' ..')) ?>
                        </p>
                        <div>
                          <span class="material-symbols-outlined text-[16px]">
                            <?= strpos($li->content, '<img') ? 'image' : '' ?>
                          </span>
                          <span class="material-symbols-outlined text-[16px]">
                            <?= $li->file > 0 ? 'attachment' : '' ?>
                          </span>
                        </div>
                      </a>
                    </td>
                    <td class="px-3 flex gap-2 justify-center place-items-center text-center">
                      <img src="/uploads/<?= $li->profile ?>" alt="img" class="p-0.5 border border-[#4f4f4f] w-8 h-8 mt-1 rounded-[50%] <?= $li->profile ? '' : 'hidden'?>">
                      <p class="material-symbols-outlined w-8 h-8 p-0.5 rounded-[50%] mt-1 text-gray-400 flex place-items-center justify-center <?= $li->profile ? 'hidden' : '' ?>">
                        person
                      </p>
                      <p class="mt-1">
                        <?= mb_strimwidth($li->nickname,0, 10, ' ..') ?>
                      </p>
                    </td>
                    <td class="px-3">
                      <?= (date("Y-m-d") == substr($li->regdate, 0, 10)) ? substr($li->regdate, 11, 5) : substr($li->regdate, 5, 5); ?>
                    </td>
                    <td class="px-3 <?= ($li->like_count - $li->dislike_count) < 0 ? 'text-red-400' : '' ?>"><?= $li->like_count - $li->dislike_count ?></td>
                    <td class="px-3"><?= $li->hit?></td>
                  </tr>
                </tbody>
              <? endforeach ?>
            </table>
            <div class="<?= empty($board_hellow) ? '' : 'hidden' ?> relative">
              <p class="flex justify-center place-items-center py-20">
                데이터가 없습니다
              </p>
            </div>
          </div>
        </div>
      </div>

    </div>
    
  </div>

</div>