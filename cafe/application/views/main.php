<!-- 메인 틀 -->
<div id="base" class="duration-200 h-full bg-[#3f3f3f] text-gray-50">

  <!-- 메인 베이스 -->
  <div class="flex flex-col w-full h-full">

    <div>
      <p></p>
    </div>

    <!-- 이미지 배너 및 스와이프 -->
    <!-- <div class="border border-[#5f5f5f] bg-[#2f2f2f] drop-shadow-xl mx-1 md:mx-5 mb-5 md:mb-0 mt-5 p-10 rounded-md ">
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
            <h2>최근 게시글</h2>
            <p><?= $total_freeboard ?></p>
          </div>
        </div>

        <div class="bg-[#2f2f2f] w-full p-1 rounded flex flex-col gap-5 shadow-inner overflow-x-auto ">
          <table class="text-gray-50 text-center whitespace-nowrap min-w-[500px]">
            <thead class="text-sm bg-[#3f3f3f] h-10">
              <th class="">
                ID
              </th>
              <th class="">
                분류
              </th>
              <th class="max-w-[40%] md:max-w-[50%] w-full">
                제목
              </th>
              <th class="">
                <span title="게시글 작성자" class="material-symbols-outlined">
                  person
                </span>
              </th>
              <th class="">
                <span title="게시글 작성 날짜" class="material-symbols-outlined">
                  calendar_month
                </span>
              </th>
              <th class="">
                <span title="추천, 비추천 합계" class="material-symbols-outlined">
                  thumbs_up_down
                </span>
              </th>
              <th class="">
                <span title="조회수" class="material-symbols-outlined">
                  visibility
                </span>
              </th>
            </thead>
            <? foreach ($board_list as $li): ?>
              <tr class="border-b border-[#4f4f4f] text-sm">
                <td class="p-2 py-3">
                  <?= $li->idx ?>
                </td>
                <td class="p-2 py-3">
                  <?= ($li->board_type == 'freeboard' ? '자유게시판' : ($li->board_type == 'freeboard' ? '자유게시판' : ($li->board_type == 'freeboard' ? '자유게시판' : '' ) ) ) ?>
                </td>
                <td class="text-left duration-150 hover:scale-[0.98]">
                  <a href="/<?= $li->board_type?>/<?= $li->idx ?>" class="flex gap-2">
                    <p class="bg-red-500 rounded-full px-2 py-1 text-xs <?= $li->hit > 100 ? '' : 'hidden' ?>">
                      인기
                    </p>
                    <p class="bg-[#4f4f4f] rounded-full px-2 py-1 text-xs <?= $li->group_order > 0 ? '' : 'hidden' ?>">
                      답글
                    </p>
                    <p class="">
                      <?= $li->title ?>
                    </p>
                    <div>
                      <span class="material-symbols-outlined text-sm">
                        <?= strpos($li->content, '<img') ? 'image' : '' ?>
                      </span>
                      <span class="material-symbols-outlined text-sm">
                        <?= $li->file > 0 ? 'attachment' : '' ?>
                      </span>
                    </div>
                  </a>
                </td>
                <td class="flex gap-1 mx-auto justify-center place-items-center text-center">
                  <img src="/uploads/<?= $li->profile ?>" alt="img" class="w-10 rounded-[50%] <?= $li->profile ? '' : 'hidden'?>">
                  <p class="material-symbols-outlined text-2xl text-gray-400 flex place-items-center justify-center <?= $li->profile ? 'hidden' : '' ?>">
                    person
                  </p>
                  <p>
                    <?= $li->user_id ?>
                  </p>
                </td>
                <td class="">
                  <?= (empty($li->regdate) ? '-' : date("Y-m-d") == substr($li->regdate, 5, 5)) ? substr($li->regdate, 10, 6) : substr($li->regdate, 5, 5); ?>
                </td>
                <td><?= $li->like_count - $li->dislike_count ?></td>
                <td><?= $li->hit?></td>
              </tr>
            <? endforeach ?>
          </table>
        </div>
      </div>
      
      <!-- 최근 게시물, 최근 댓글 -->
      <div class="flex-row lg:flex w-full gap-5">
        <!-- 공지사항 -->
        <div class="w-full drop-shadow-xl">
          <div class="flex bg-[#1f1f1f] rounded mb-3 drop-shadow-2xl items-center place-content-between">
            <div class="opacity-90 p-3 flex gap-1">
              <h2>공지사항</h2>
            </div>
          </div>

          <div class="bg-[#2f2f2f] w-full p-1 rounded flex flex-col gap-5 shadow-inner overflow-x-auto">
            <table class="text-gray-50 text-center whitespace-nowrap min-w-[500px]">
              <thead class="text-sm bg-[#3f3f3f] h-10">
                <th class="">
                  ID
                </th>
                <th class="max-w-[40%] md:max-w-[50%] w-full">
                  제목
                </th>
                <th class="">
                  <span title="게시글 작성자" class="material-symbols-outlined">
                    person
                  </span>
                </th>
                <th class="">
                  <span title="게시글 작성 날짜" class="material-symbols-outlined">
                    calendar_month
                  </span>
                </th>
                <th class="">
                  <span title="추천, 비추천 합계" class="material-symbols-outlined">
                    thumbs_up_down
                  </span>
                </th>
                <th class="">
                  <span title="조회수" class="material-symbols-outlined">
                    visibility
                  </span>
                </th>
              </thead>
              <? foreach ($board_list as $li): ?>
                <tr class="border-b border-[#4f4f4f] text-sm">
                  <td class="p-2 py-3">
                    <?= $li->idx ?>
                  </td>
                  
                  <td class="text-left duration-150 hover:scale-[0.98]">
                    <a href="/<?= $li->board_type?>/<?= $li->idx ?>" class="flex gap-2">
                      <p class="bg-red-500 rounded-full px-2 py-1 text-xs <?= $li->hit > 100 ? '' : 'hidden' ?>">
                        인기
                      </p>
                      <p class="bg-[#4f4f4f] rounded-full px-2 py-1 text-xs <?= $li->group_order > 0 ? '' : 'hidden' ?>">
                        답글
                      </p>
                      <p class="">
                        <?= $li->title ?>
                      </p>
                      <div>
                        <span class="material-symbols-outlined text-sm">
                          <?= strpos($li->content, '<img') ? 'image' : '' ?>
                        </span>
                        <span class="material-symbols-outlined text-sm">
                          <?= $li->file > 0 ? 'attachment' : '' ?>
                        </span>
                      </div>
                    </a>
                  </td>
                  <td class="flex gap-1 justify-center place-items-center text-center">
                    <img src="/uploads/<?= $li->profile ?>" alt="img" class="w-10 rounded-[50%] <?= $li->profile ? '' : 'hidden'?>">
                    <p class="material-symbols-outlined text-2xl text-gray-400 flex place-items-center justify-center <?= $li->profile ? 'hidden' : '' ?>">
                      person
                    </p>
                    <p>
                      <?= $li->user_id ?>
                    </p>
                  </td>
                  <td class="">
                    <?= (empty($li->regdate) ? '-' : date("Y-m-d") == substr($li->regdate, 5, 5)) ? substr($li->regdate, 10, 6) : substr($li->regdate, 5, 5); ?>
                  </td>
                  <td><?= $li->like_count - $li->dislike_count ?></td>
                  <td><?= $li->hit?></td>
                </tr>
              <? endforeach ?>
            </table>
          </div>
        </div>

        <!-- 최근 댓글 -->
        <div class="w-full drop-shadow-xl">
          <div class="flex bg-[#1f1f1f] rounded mb-3 drop-shadow-2xl items-center place-content-between">
            <div class="opacity-90 p-3 flex gap-1">
              <h2>최근 댓글</h2>
            </div>
          </div>

          <div class="bg-[#2f2f2f] w-full p-1 rounded flex flex-col gap-5 shadow-inner overflow-x-auto">
            <table class="text-gray-50 text-center whitespace-nowrap">
              <thead class="text-sm bg-[#3f3f3f] h-10">
                <th class="">ID</th>
                <th class="w-[50%]">제목</th>
                <th class="">
                  <span title="게시글 작성자" class="material-symbols-outlined">
                    person
                  </span>
                </th>
                <th class="">
                  <span title="게시글 작성 날짜" class="material-symbols-outlined">
                    calendar_month
                  </span>
                </th>
                <th class="">
                  <span title="추천, 비추천 합계" class="material-symbols-outlined">
                    thumbs_up_down
                  </span>
                </th>
                <th class="">
                  <span title="조회수" class="material-symbols-outlined">
                    visibility
                  </span>
                </th>
                <th class="">
                  <span title="신고 수" class="material-symbols-outlined">
                    e911_emergency
                  </span>
                </th>
              </thead>
              <? foreach ($board_list as $li): ?>
                <tr class="border-b border-[#4f4f4f] text-sm">
                  <td class="p-2 py-3"><?= $li->idx ?></td>
                  
                  <td class="text-left duration-150 hover:scale-[0.98]">
                    <a href="/<?= $li->board_type?>/<?= $li->idx ?>" class="flex gap-2">
                      <p class="bg-red-500 rounded-full px-2 py-1 text-xs <?= $li->hit > 100 ? '' : 'hidden' ?>">
                        인기
                      </p>
                      <p class="bg-[#4f4f4f] rounded-full px-2 py-1 text-xs <?= $li->group_order > 0 ? '' : 'hidden' ?>">
                        답글
                      </p>
                      <p class="">
                        <?= $li->title ?>
                      </p>
                      <div>
                        <span class="material-symbols-outlined text-sm">
                          <?= strpos($li->content, '<img') ? 'image' : '' ?>
                        </span>
                        <span class="material-symbols-outlined text-sm">
                          <?= $li->file > 0 ? 'attachment' : '' ?>
                        </span>
                      </div>
                    </a>
                  </td>
                  <td class="flex gap-1 justify-center place-items-center text-center">
                    <img src="/uploads/<?= $li->profile ?>" alt="img" class="w-10 rounded-[50%] <?= $li->profile ? '' : 'hidden'?>">
                    <p class="material-symbols-outlined text-2xl text-gray-400 flex place-items-center justify-center <?= $li->profile ? 'hidden' : '' ?>">
                      person
                    </p>
                    <p>
                      <?= $li->user_id ?>
                    </p>
                  </td>
                  <td class="">
                    <?= (empty($li->regdate) ? '-' : date("Y-m-d") == substr($li->regdate, 5, 5)) ? substr($li->regdate, 10, 6) : substr($li->regdate, 5, 5); ?>
                  </td>
                  <td><?= $li->like_count - $li->dislike_count ?></td>
                  <td><?= $li->hit?></td>
                  <td>0</td>
                </tr>
              <? endforeach ?>
            </table>
          </div>
        </div>
      </div>

      <!-- 자유게시판, 가입인사 -->
      <div class="flex-row lg:flex w-full gap-5">
        <!-- 자유게시판 -->
        <div class="w-full drop-shadow-xl">
          <div class="flex bg-[#1f1f1f] rounded mb-3 drop-shadow-2xl items-center place-content-between">
            <div class="opacity-90 p-3 flex gap-1">
              <h2>자유게시판</h2>
            </div>
          </div>

          <div class="bg-[#2f2f2f] w-full p-1 rounded flex flex-col gap-5 shadow-inner overflow-x-auto">
            <table class="text-gray-50 text-center whitespace-nowrap min-w-[500px]">
              <thead class="text-sm bg-[#3f3f3f] h-10">
                <th class="">ID</th>
                <th class="max-w-[40%] md:max-w-[50%] w-full">제목</th>
                <th class="">
                  <span title="게시글 작성자" class="material-symbols-outlined">
                    person
                  </span>
                </th>
                <th class="">
                  <span title="게시글 작성 날짜" class="material-symbols-outlined">
                    calendar_month
                  </span>
                </th>
                <th class="">
                  <span title="추천, 비추천 합계" class="material-symbols-outlined">
                    thumbs_up_down
                  </span>
                </th>
                <th class="">
                  <span title="조회수" class="material-symbols-outlined">
                    visibility
                  </span>
                </th>
              </thead>
              <? foreach ($board_list as $li): ?>
                <tr class="border-b border-[#4f4f4f] text-sm">
                  <td class="p-2 py-3"><?= $li->idx ?></td>
                  
                  <td class="text-left duration-150 hover:scale-[0.98]">
                    <a href="/<?= $li->board_type?>/<?= $li->idx ?>" class="flex gap-2">
                      <p class="bg-red-500 rounded-full px-2 py-1 text-xs <?= $li->hit > 100 ? '' : 'hidden' ?>">
                        인기
                      </p>
                      <p class="bg-[#4f4f4f] rounded-full px-2 py-1 text-xs <?= $li->group_order > 0 ? '' : 'hidden' ?>">
                        답글
                      </p>
                      <p class="">
                        <?= $li->title ?>
                      </p>
                      <div>
                        <span class="material-symbols-outlined text-sm">
                          <?= strpos($li->content, '<img') ? 'image' : '' ?>
                        </span>
                        <span class="material-symbols-outlined text-sm">
                          <?= $li->file > 0 ? 'attachment' : '' ?>
                        </span>
                      </div>
                    </a>
                  </td>
                  <td class="flex gap-1 justify-center place-items-center text-center">
                    <img src="/uploads/<?= $li->profile ?>" alt="img" class="w-10 rounded-[50%] <?= $li->profile ? '' : 'hidden'?>">
                    <p class="material-symbols-outlined text-2xl text-gray-400 flex place-items-center justify-center <?= $li->profile ? 'hidden' : '' ?>">
                      person
                    </p>
                    <p>
                      <?= $li->user_id ?>
                    </p>
                  </td>
                  <td class="">
                    <?= (empty($li->regdate) ? '-' : date("Y-m-d") == substr($li->regdate, 5, 5)) ? substr($li->regdate, 10, 6) : substr($li->regdate, 5, 5); ?>
                  </td>
                  <td><?= $li->like_count - $li->dislike_count ?></td>
                  <td><?= $li->hit?></td>
                </tr>
              <? endforeach ?>
            </table>
          </div>
        </div>

        <!-- 가입인사 -->
        <div class="w-full drop-shadow-xl">
          <div class="flex bg-[#1f1f1f] rounded mb-3 drop-shadow-2xl items-center place-content-between">
            <div class="opacity-90 p-3 flex gap-1">
              <h2>가입인사</h2>
            </div>
          </div>

          <div class="bg-[#2f2f2f] w-full p-1 rounded flex flex-col gap-5 shadow-inner overflow-x-auto">
            <table class="text-gray-50 text-center whitespace-nowrap min-w-[500px]">
              <thead class="text-sm bg-[#3f3f3f] h-10">
                <th class="">
                  ID
                </th>
                <th class="max-w-[40%] md:max-w-[50%] w-full">
                  제목
                </th>
                <th class="">
                  <span title="게시글 작성자" class="material-symbols-outlined">
                    person
                  </span>
                </th>
                <th class="">
                  <span title="게시글 작성 날짜" class="material-symbols-outlined">
                    calendar_month
                  </span>
                </th>
                <th class="">
                  <span title="추천, 비추천 합계" class="material-symbols-outlined">
                    thumbs_up_down
                  </span>
                </th>
                <th class="">
                  <span title="조회수" class="material-symbols-outlined">
                    visibility
                  </span>
                </th>
              </thead>
              <? foreach ($board_list as $li): ?>
                <tr class="border-b border-[#4f4f4f] text-sm">
                  <td class="p-2 py-3"><?= $li->idx ?></td>
                  
                  <td class="text-left duration-150 hover:scale-[0.98]">
                    <a href="/<?= $li->board_type?>/<?= $li->idx ?>" class="flex gap-2">
                      <p class="bg-red-500 rounded-full px-2 py-1 text-xs <?= $li->hit > 100 ? '' : 'hidden' ?>">
                        인기
                      </p>
                      <p class="bg-[#4f4f4f] rounded-full px-2 py-1 text-xs <?= $li->group_order > 0 ? '' : 'hidden' ?>">
                        답글
                      </p>
                      <p class="">
                        <?= $li->title ?>
                      </p>
                      <div>
                        <span class="material-symbols-outlined text-sm">
                          <?= strpos($li->content, '<img') ? 'image' : '' ?>
                        </span>
                        <span class="material-symbols-outlined text-sm">
                          <?= $li->file > 0 ? 'attachment' : '' ?>
                        </span>
                      </div>
                    </a>
                  </td>
                  <td class="flex gap-1 justify-center place-items-center text-center">
                    <img src="/uploads/<?= $li->profile ?>" alt="img" class="w-10 rounded-[50%] <?= $li->profile ? '' : 'hidden'?>">
                    <p class="material-symbols-outlined text-2xl text-gray-400 flex place-items-center justify-center <?= $li->profile ? 'hidden' : '' ?>">
                      person
                    </p>
                    <p>
                      <?= $li->user_id ?>
                    </p>
                  </td>
                  <td class="">
                    <?= (empty($li->regdate) ? '-' : date("Y-m-d") == substr($li->regdate, 5, 5)) ? substr($li->regdate, 10, 6) : substr($li->regdate, 5, 5); ?>
                  </td>
                  <td><?= $li->like_count - $li->dislike_count ?></td>
                  <td><?= $li->hit?></td>
                </tr>
              <? endforeach ?>
            </table>
          </div>
        </div>
      </div>

    </div>
    
  </div>

</div>