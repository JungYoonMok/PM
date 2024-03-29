<title>카페 | <?= $post->title ?></title>
<!-- 토스트 에디터 -->
<link rel="stylesheet" href="https://uicdn.toast.com/editor/latest/toastui-editor.min.css" />
<script src="https://uicdn.toast.com/editor/latest/toastui-editor-all.min.js"></script>
<link rel="stylesheet" href="/assets/toast_dark_theme.css">

<!-- 메인 틀 -->
<div class="flex duration-200 bg-[#3f3f3f] text-gray-50 w-full relative">

  <!-- 메인 베이스 -->
  <div class="flex flex-col justify-between w-full h-full">

    <!-- 메인 -->
    <div class="md:mb-20 w-full p-1 mt-4 md:mt-0 md:p-5 flex flex-col gap-5 drop-shadow-2xl">

      <!-- 수정하기, 이전, 다음, 목록 -->
      <div class="flex justify-between place-items-center gap-3 opacity-90 whitespace-nowrap overflow-x-auto overflow-y-hidden">

        <div>
          <div class="<?= $this->session->userdata('user_id') == $post->user_id ? '' : 'hidden' ?> flex gap-1">
            <a href="/<?= $post->board_type ?>/update/<?= $post->idx ?>">
              <p class="bg-[#1f1f1f] duration-200 hover:bg-[#2f2f2f] border border-[#4f4f4f] px-3 py-[9px] rounded">
                수정하기
              </p>
            </a>
            <button
              onclick="post_delete(<?= $post->idx ?>)"
              class="cursor-pointer bg-[#1f1f1f] duration-200 hover:bg-[#2f2f2f] border border-[#4f4f4f] px-3 py-2 rounded">
              삭제하기
            </button>
          </div>
        </div>

        <div class="flex gap-1">
          <? if (isset($prev)): ?>
            <a title="이전글 - <?= $prev->group_order == 0 ? '' : '[답글] ' ?><?= mb_strimwidth($prev->title, 0, 25, " ..") ?>" href="/<?= $this->uri->segment(1)?>/<?= $prev->idx?>" class="bg-[#1f1f1f] duration-200 hover:bg-[#2f2f2f] border border-[#4f4f4f] px-3 py-2 rounded">
              이전글
            </a>
          <? endif; ?>
          <? if (isset($next)): ?>
            <a title="다음글 - <?= $next->group_order == 0 ? '' : '[답글] ' ?><?= mb_strimwidth($next->title, 0, 25, " ..") ?>" href="/<?= $this->uri->segment(1)?>/<?= $next->idx?>" class="bg-[#1f1f1f] duration-200 hover:bg-[#2f2f2f] border border-[#4f4f4f] px-3 py-2 rounded">
              다음글
            </a>
          <? endif; ?>
          <a href="/<?= $this->uri->segment(1) ?>/list" class="bg-[#1f1f1f] duration-200 hover:bg-[#2f2f2f] border border-[#4f4f4f] px-3 py-2 rounded">
            목록
          </a>
        </div>
      </div>

      <div class="bg-[#2f2f2f] p-5 flex flex-col gap-5 border border-[#4f4f4f] rounded">

        <!-- 게시글 타입, 제목, 작성날짜-->
        <div class="flex flex-col md:flex-row gap-3 md:gap-0 justify-between">
          <div class="flex gap-5 place-items-center">
            <span class="material-symbols-outlined">
              location_on
            </span>
            <a class="hover:underline duration-200" href="/<?= $post->board_type ?>/list">
              <?= ($post->board_type == 'notice' ? '공지사항' : ($post->board_type == 'freeboard' ? '자유게시판' : ($post->board_type == 'hellow' ? '가입인사' : 'what?' ) ) ) ?>
            </a>
            <p>〉</p>
            <button class="flex gap-2 font-bold text-lg duration-200 hover:translate-y-1" onclick=location.reload(true);>
              <p class="<?= $post->group_order == 0 ? 'hidden' : ''?> bg-[#4f4f4f] rounded px-2">
                RE:
              </p>
              <p>
                <?= htmlspecialchars($post->title) ?>
              </p>
            </button>
          </div>
          <div class="flex place-items-center gap-3 opacity-80 text-sm">
            <span class="material-symbols-outlined">
              <?= date("Y-m-d") == substr($post->regdate, 0, 10) ? 'schedule' : 'edit_calendar'; ?>
            </span>
            <p class=""><?= date("Y-m-d") == substr($post->regdate, 0, 10) ? substr($post->regdate, 10, 6) : substr($post->regdate, 0, 16); ?></p>
          </div>
        </div>

        <!-- 구분선 -->
        <div class="border-b border-[#4f4f4f]"></div>

        <!-- 컨텐츠 -->
        <div class="flex flex-col gap-5">

          <!-- 작성자 및 게시글 정보 -->
          <div class="flex flex-col md:flex-row gap-3 md:gap-0 justify-between place-items-center border md:border-none shadow-xl md:shadow-none border-[#4f4f4f] rounded py-3">

            <div class="md:border border-[#5f5f5f] px-5 py-2 rounded md:rounded-r-2xl md:shadow-lg">
              <div class="w-full flex gap-10 md:gap-5 place-content-start">
                <? if ($user->user_profile == '' || null) : ?>
                  <p class="material-symbols-outlined text-5xl text-[#9f9f9f] flex place-items-center justify-center">
                    person
                  </p>
                <? else : ?>
                  <img width="100%" src="/uploads/<?= $user->user_profile ?>"
                    class="material-symbols-outlined rounded-[50%] w-16 h-16 text-[#9f9f9f] duration-200">
                  </img>
                <? endif ?>
                <div class="<?= empty($user->user_memo) ? 'place-items-center justify-center' : '' ?> flex flex-col gap-1">
                  <div class="flex gap-2 place-items-center">
                    <p class="text-sm px-2 py-0.5 bg-[#3f3f3f] rounded border border-[#4f4f4f]">
                      Lv.<?= $level_converter['level'] ?>
                    </p>
                    <a href="#" class="hover:underline hover:opacity-80 duration-200">
                      <?= $user->user_nickname; ?>
                      ( <?= $post->user_id; ?> )
                    </a>
                  </div>
                  <div class="max-w-[300px]">
                    <p class="text-sm">
                      <?= mb_strimwidth($user->user_memo, 0, 40, ' ..') ?>
                    </p>
                  </div>
                </div>
              </div>
            </div>

            <div class="flex text-gray-300 overflow-x-auto overflow-y-hidden md:flex-nowrap md:whitespace-nowrap gap-5 text-xs md:text-sm bg-[#3f3f3f] md:bg-[#2f2f2f] px-5 md:px-0 py-2 md:py-0 rounded md:rounded-none">
              <div class="flex place-items-center gap-2">
                <span class="material-symbols-outlined text-[20px] md:text-[20px]">
                  visibility
                </span>
                <p><?= $hit->hit; ?></p>
              </div>
              <div class="flex place-items-center gap-2">
                <span class="material-symbols-outlined text-[20px] md:text-[20px]">
                  chat_bubble
                </span>
                <p><?= $comment_count->cnt ?></p>
              </div>
              <div class="flex place-items-center gap-2">
                <span class="material-symbols-outlined text-[20px] md:text-[20px]">
                  thumb_up
                </span>
                <p><?= $like_count1->cnt ?></p>
              </div>
              <div class="flex place-items-center gap-2">
                <span class="material-symbols-outlined text-[20px] md:text-[20px]">
                  thumb_down
                </span>
                <p><?= $like_count2->cnt ?></p>
              </div>

              <input type="text" id="link" value="http://localhost/freeboard/<?= $post->idx; ?>" class="hidden" />
              <button onclick=CopyUrlToClipboard() class="flex place-items-center gap-2 hover:opacity-70 duration-200">
                <span class="material-symbols-outlined text-[20px] md:text-[20px]">
                  link
                </span>
                <p class="">URL 복사</p>
              </button>

            </div>
          </div>

          <!-- 게시글 내용 -->
          <div class="outline-none rounded w-full p-3 min-h-[500px]" name="contents">

            <!-- 출력 -->
            <div class="toast-custom-viewer text-white <?= $post->board_delete ? 'hidden' : ''?>">
            </div>
  
            <script>
              //전체(ALL)용 CDN을 사용할 경우
              const editor = toastui.Editor.factory({
                el : document.querySelector(".toast-custom-viewer"),
                viewer:true,
                theme: 'dark',
                initialValue : '<?= strpos($post->content, 'removed') ? '<strong class="text-xl flex mt-20 justify-center place-items-center duration-200 animate-pulse">⛑️ 관리자에 의해 차단되었습니다</strong>' : $post->content ?>',
              });
            </script>

            <div class="w-full <?= $post->board_delete ? '' : 'hidden'?>">
              <p class="p-3 bg-red-500 text-center rounded animate-pulse">
                해당 게시글은 삭제되었습니다.
              </p>
            </div>

          </div>

          <!-- 좋아요 및 싫어요 -->
          <div class="flex justify-center gap-5 py-5 opacity-80">
            <div class="text-center text-sm">
              <button
                onclick="like_up(<?= $post->idx ?>)"
                class="hover:-translate-y-2 hover:text-blue-400 material-symbols-outlined text-3xl w-16 h-16 rounded-[50%] duration-100">
                thumb_up
              </button>
              <p class='bg-[#3f3f3f] rounded p-1 <?= $like_value !== 'none' ? $like_value ? 'bg-blue-500' : '싫어요'  : '' ?>'>좋아요</p>
            </div>
            <div class="text-center text-sm">
              <button
              onclick="like_down(<?= $post->idx ?>)" 
              class="hover:translate-y-2 hover:text-red-400 material-symbols-outlined text-3xl w-16 h-16 rounded-[50%] duration-100">
              thumb_down
              </button>
              <p class='bg-[#3f3f3f] rounded p-1 <?= $like_value !== 'none' ? !$like_value ? 'bg-blue-500' : '싫어요'  : '' ?>'>싫어요</p>
              <!-- <?= $like_value ?> -->
            </div>
          </div>

          <!-- 첨부파일 관련 기능 -->
          <div class="flex flex-col text-sm gap-3 bg-[#3f3f3f] p-3 border border-[#4f4f4f] shadow-md <?= empty($file) ? 'hidden' : '' ?>">
            <div class="flex justify-between">
              <div class="flex gap-3 place-items-center duration-200">
                <span class="material-symbols-outlined">
                  download
                </span>
                <p>첨부파일 다운로드</p>
              </div>
              <p title="파일 첨부는 최대 5개입니다">
                <?= count($file) ?> / 5
              </p>
            </div>
            <div id="file_list" class="flex flex-col gap-3 bg-[#2f2f2f] rounded p-3 duration-200">
            <? foreach ($file as $file) : ?>
              <? if (!empty($file)) : ?>
                <div class="flex gap-3 place-items-center duration-200 px-3 hover:rounded hover:bg-[#3f3f3f]">
                  <span class="material-symbols-outlined -scale-x-100 opacity-50">
                    subdirectory_arrow_left
                  </span>
                  <div class="flex justify-between w-full">
                    <a href="/uploads/<?=$file->file_name ?>" download class="duration-200 hover:translate-x-3 flex gap-2 place-items-center">
                      <? if(empty($file->file_type)) :?>
                        <span class="material-symbols-outlined text-[#9f9f9f] text-4xl">
                          insert_drive_file
                        </span>
                      <? else :?>
                        <img src="/uploads/<?= $file->file_name ?>" width="100%" alt="img" class="w-10 h-10 rounded duration-200 hover:bg-[#1f1f1f] hover:border border-[#6f6f6f] hover:scale-[3.0]">
                      <? endif ?>
                      <p class="tracking-wider">
                        <?= $file->file_name ?>
                      </p>
                    </a>
                    <div class="flex place-items-center gap-3 text-xs text-[#8f8f8f] font-bold">

                      <? if(empty($file->file_type)) :?>

                      <? else :?>
                        <p class="duration-200 hidden md:inline-block">
                          <?= $file->width ?> x <?= $file->height ?>
                        </p>
                      <? endif ?>

                      <p class="hidden md:inline-block">
                      <?= empty($file->file_type) ? '' : '|' ?>
                      </p>
                      <p class="duration-200">
                        <?= $file->file_size ?> KB
                      </p>
                    </div>
                  </div>
                </div>
                <? else : ?>
                  <div>
                    <p>데이터가 없습니다</p>
                  </div>
                <? endif; ?>
              <? endforeach; ?>
              </div>
            </div>

          <!-- 작성자 프로필 -->
          <div class="border border-[#4f4f4f] p-3 rounded flex flex-col lg:flex-row gap-3 text-sm shadow-lg">

            <!-- 사용자 정보 -->
            <div class="flex flex-col gap-2 w-full whitespace-nowrap lg:w-[35%] <?= empty($user->user_memo) ? 'justify-center' : '' ?>">

              <div class="flex gap-2 place-items-center">

                <div class="relative drop-shadow-2xl flex rounded-[50%] place-content-center border border-gray-500 h-16 w-16 bg-[#3f3f3f]">
                  <? if (empty($user->user_profile)) : ?>
                    <p class="material-symbols-outlined text-5xl text-gray-400 flex place-items-center justify-center">
                      person
                    </p>
                  <? else : ?>
                    <img width="100%" src="/uploads/<?= $user->user_profile ?>"
                      class="material-symbols-outlined rounded-[50%] text-5xl w-full h-full text-gray-400 duration-200">
                    </img>
                  <? endif ?>
                </div>

                <div class="">
                  <p class="text-base"><?= $user->user_nickname ?> ( <?= $post->user_id ?> )</p>
                  <p>회원등급 : 지하계 / Level <?= $level_converter['level'] ?></p>
                </div>
              </div>

              <div class="bg-[#3f3f3f] px-3 py-4 rounded flex flex-col gap-2 border border-[#3f3f3f]">
                <div class="flex justify-between">
                  <input hidden name='post_user' id="post_user" type="text" value="<?= $post->user_id ?>"/>
                  <p>포인트 <?= $user_point ?></p>
                  <p>경험치 <?= $user_exp ?></p>
                </div>
                <div class="flex justify-between">
                  <p>[레벨 <?= $level_converter['level'] ?>] - 진행률</p>

                  <?
                    // 토탈 경험치 변수
                    $exp_per = substr((($level_converter['exp'] - $level_converter['previous_level_end_exp']) / ($level_converter['end_exp'] - $level_converter['previous_level_end_exp']) * 100), 0, 4);
                  ?>
                  
                  <p>
                    <?= $exp_per ?> %
                  </p>
                </div>
                <div class="w-full h-2 rounded-full bg-gray-600 duration-200">
                  <div 
                    class="h-2 rounded-full duration-200 hover:scale-105 
                    <?= ($exp_per > 90 ? 'bg-red-500' : 'bg-blue-500') ?>
                    <?= ($exp_per > 95 ? 'animate-pulse' : 'bg-blue-500') ?>
                    " 
                    style="width: <?= $exp_per ?>%">
                  </div>
                </div>
                <div class="flex justify-between">
                  <p>가입일</p>
                  <p><?= $user->regdate ?></p>
                </div>

                <div class="<?= empty($user->user_memo) ? 'hidden' : '' ?>">

                  <div class="border-b border-[#4f4f4f] mb-2"></div>

                  <div class="text-xs flex flex-col gap-1">
                    <p>자기소개</p>
                    <div class="px-2 py-3 rounded bg-[#2f2f2f]">
                      <?= mb_strimwidth($user->user_memo, 0, 50, ' ..') ?>
                    </div>
                  </div>

                </div>

              </div>

            </div>

            <div class="md:hidden border-b border-[#4f4f4f]"></div>

            <!-- 사용자 활동 -->
            <div class="flex p-3 rounded gap-5 md:justify-center md:place-items-center overflow-x-auto flex-col md:flex-row w-full">

              <div class="w-full whitespace-nowrap h-full flex flex-col gap-5">
                <p class="px-3 py-1 bg-[#3f3f3f] rounded">
                  작성자의 최근 게시글
                </p>
                <div class="flex flex-col gap-3 px-2">
                <? foreach( $get_post as $row ) : ?>
                  <div class="flex justify-between gap-3">
                    <div class="flex gap-1 place-items-center">
                      <span class="material-symbols-outlined -scale-x-100">
                        arrow_left
                      </span>
                      <a href="/<?= $row->board_type ?>/<?= $row->idx ?>" class="duration-200 hover:text-[#9f9f9f]">
                        <?= htmlspecialchars(mb_strimwidth($row->title, 0, 30, ' ..')) ?>
                      </a>
                    </div>
                    <div class="flex gap-1 place-items-center">
                      <span class="material-symbols-outlined text-sm">
                        schedule
                      </span>
                      <p>
                        <?= date("Y-m-d") == substr($row->regdate, 0, 10) ? substr($row->regdate, 10, 6) : substr($row->regdate, 0, 10); ?>
                      </p>
                    </div>
                  </div>
                <? endforeach ?>
                  <div class="<?= empty($get_post) ? '' : 'hidden' ?> relative">
                    <p class="flex justify-center place-items-center py-10">
                      데이터가 없습니다
                    </p>
                  </div>
                </div>
              </div>

              <div class="md:hidden border-b border-[#4f4f4f]"></div>

              <div class="w-full whitespace-nowrap h-full flex flex-col gap-5">
                <p class="px-3 py-1 bg-[#3f3f3f] rounded">
                  작성자의 최근 댓글
                </p>
                <div class="flex flex-col gap-3 px-2">
                <? foreach( $get_comment as $row ) : ?>
                  <div class="flex justify-between gap-3">
                    <div class="flex gap-1 place-items-center">
                      <span class="material-symbols-outlined -scale-x-100">
                        arrow_left
                      </span>
                      <a href="/freeboard/<?= $row->boards_idx ?>/#comments" class="duration-200 hover:text-[#9f9f9f]">
                        <?= strpos($row->content, 'removed') ? '⛑️ 관리자에 의해 차단' : htmlspecialchars(mb_strimwidth($row->content, 0, 30, ' ..')) ?>
                      </a>
                    </div>
                    <div class="flex gap-1 place-items-center">
                      <span class="material-symbols-outlined text-sm">
                        schedule
                      </span>
                      <p>
                        <?= date("Y-m-d") == substr($row->regdate, 0, 10) ? substr($row->regdate, 10, 6) : substr($row->regdate, 0, 10); ?>
                      </p>
                    </div>
                  </div>
                <? endforeach ?>
                  <div class="<?= empty($get_comment) ? '' : 'hidden' ?> relative">
                    <p class="flex justify-center place-items-center py-10">
                      데이터가 없습니다
                    </p>
                  </div>
                </div>
              </div>

            </div>

          </div>

          <!-- 구분선 댓글 달릴시 이동되는 구간 -->
          <div id="comments" class="border-b border-[#4f4f4f]"></div>

          <!-- 댓글 리스트 있을때 and 리플 -->
          <div class="flex flex-col duration-200 rounded-md gap-5 w-full <?= empty($comment) || !$post->board_comment ? 'hidden' : '' ?>">
            <? foreach ($comment as $com): ?>

              <div class="flex gap-3 text-sm w-full p-3 mb-8 duration-200 rounded">

                <!-- 답글일 경우 -->
                <div class="ml-[<?= 20 * $com -> depth - 1 ?>px;] flex justify-center place-items-center <?= $com->group_order !== '0' ? 'inline' : 'hidden' ?>">
                  <span id="reply_arrow<?= $com->idx ?>" class="material-symbols-outlined text-4xl rotate-180 -mt-16 ml-5 text-[#4f4f4f]">
                    arrow_top_left
                  </span>
                </div>

                <div class="flex gap-3 w-full ">
                  <!-- 작성자 -->
                  <div class="flex gap-3 relative">
                    <!-- 프로필 -->

                    <div class="relative drop-shadow-2xl flex rounded-[50%] place-content-center border border-gray-500 h-16 w-16 bg-[#3f3f3f]">
                      <? if (empty($com->user_profile)) : ?>
                        <p class="material-symbols-outlined text-5xl text-gray-400 flex place-items-center justify-center">
                          person
                        </p>
                      <? else : ?>
                        <img width="100%" src="/uploads/<?= $com->user_profile ?>"
                          class="material-symbols-outlined rounded-[50%] text-5xl w-full h-full text-gray-400 duration-200">
                        </img>
                      <? endif ?>
                    </div>
                    <div class="<?= $post->user_id == $com->user_id ? 'inline-block' : 'hidden' ?> absolute top-14 w-full">
                      <p class="text-xs text-center bg-blue-500 rounded px-1">
                        작성자
                      </p>
                    </div>
                  </div>

                  <!-- 댓글 -->
                  <div class="flex flex-col border border-[#4f4f4f] shadow-xl w-full rounded p-3 <?= ($post->user_id == $com->user_id) ? 'bg-[#2f2f2f]' : ''; ?>">
                    <!-- 아이디 -->
                    <div class="flex justify-between w-full px-1">
                      <div class="flex gap-1 place-items-center">
                        <a href="#" class="text-base hover:underline hover:opacity-80 duration-200">
                          <?= empty($com->user_id) ? null : $com->user_id; ?>
                        </a>
                        <p class="bg-[#4f4f4f] rounded px-1 py-0.5">
                          레벨 <?= $level_converter['level'] ?>
                        </p>
                      </div>
                      <div class="flex gap-2 text-sm text-[#8f8f8f] pr-2">
                        <p class="material-symbols-outlined text-md">
                          <?= date("Y-m-d") == substr($com->regdate, 0, 10) ? 'schedule' : 'today'; ?>                            
                        </p>
                        <p class="">
                          <?= date("Y-m-d") == substr($com->regdate, 0, 10) ? substr($com->regdate, 10, 6) : substr($com->regdate, 0, 10); ?>
                        </p>
                      </div>
                    </div>

                    <!-- 작성된 댓글 -->
                    <div class="duration-200">
                      <!-- 내용 -->
                      <div class="mt-3 rounded-tl-none rounded-xl <?= ($post->user_id == $com->user_id) ? '' : ''; ?>">
                        
                        <!-- 삭제된 댓글 -->
                        <p class="<?= $com -> delete_state ? 'inline-block' : 'hidden'; ?> text-md font-bold text-red-400 p-3">
                          작성자에 의해 삭제된 댓글입니다
                        </p>
                        
                        <p id="reply_value<?= $com->idx ?>" class="<?= $com->delete_state ? 'hidden' : '' ?> w-full h-full">
                          <?= strpos($com->content, 'removed') ? '⛑️ 관리자에 의해 차단' : htmlspecialchars($com->content) ?>
                          <!-- 리플 수정 -->
                          <div id="reply_update<?= $com->idx ?>" class="w-full flex flex-col gap-3  text-sm hidden duration-200">
                            <!-- 원본 글 및 수정할 내용 -->
                            <textarea id='comment_update_value<?= $com->idx ?>' class="text-white bg-[#2f2f2f] border border-[#4f4f4f] px-3 py-5 rounded w-full outline-none" rows="5"><?= empty($com->content) ? null : $com->content; ?></textarea>
                            <div class="flex flex-col md:flex-row gap-3 justify-between place-items-center">
                              <p class="text-xs duration-200">
                                - 수정 내용은 <span class="bg-blue-500 py-1 rounded">`수정 완료`</span> 버튼을 누르셔야 적용됩니다
                              </p>
                              <button id="reply_update_btn" onclick="comment_update(<?= $com->idx ?>)" class="bg-blue-500 outline-none w-full md:w-[40%] px-5 py-3 rounded">
                                수정 완료
                              </button>
                            </div>
                          </div>
                        </p>

                      </div>

                      <!-- 작성시간 및 답글쓰기 -->
                      <div class="flex rounded justify-between place-items-center text-sm text-gray-300 mt-1 whitespace-nowrap">

                        <div class="">
                          <button id='reply_btn<?= $com->idx ?>' class="<?= $this->session->userdata('user_id') && !$com->delete_state ? 'inline-block' : 'hidden' ?> font-bold hover:underline hover:opacity-80 duration-200" onclick='reply_btn(<?= $com->idx ?>)'>
                            답변 달기
                          </button>
                        </div>

                        <div class="flex gap-1 py-1 rounded <?= $this->session->userdata('user_id') && !$com->delete_state ? 'inline-block' : 'hidden' ?>">
                          <div class="<?= $com->user_id == $this->session->userdata('user_id') ? 'inline-block' : 'hidden' ?> flex gap-1">
                            <button id="btn-update<?= $com->idx ?>" onclick="reply_update(<?= $com->idx ?>)" class="hover:underline hover:underline-offset-4 px-2 py-1 rounded">
                              수정
                            </button>
                            <button onclick='comment_delete(<?= $com->idx ?>)' class="hover:underline hover:underline-offset-4 px-2 py-1 rounded">
                              삭제
                            </button>
                            <!-- <p class="text-[5px] py-1 text-[#5f5f5f]">
                              ●
                            </p> -->
                          </div>
                          <!-- <button onclick='comment_problem(<?= $com->idx ?>)' class="text-red-400 hover:underline hover:underline-offset-4 px-2 py-1 rounded">
                            신고
                          </button> -->
                        </div>

                      </div>

                    </div>

                  </div>

                </div>

              </div>

              <!-- 리플 작성 -->
              <div id="reply_onoff<?= $com->idx ?>" class="w-full rounded-md text-sm flex gap-5 py-3 pl-3 hidden">
                <div>
                  <div>
                    <span class="material-symbols-outlined">
                    subdirectory_arrow_right
                    </span>
                  </div>
                </div>
                <div class="w-full">
                  <!-- 댓글 메인 -->
                  <form action="/free_board_detail/reply_comment_create" method="post" class=" rounded p-3 drop-shadow-2xl border border-[#4f4f4f] bg-[#3f3f3f] flex flex-col gap-3">

                    <!-- 내용 -->
                    <div class="">
                      <input id='bd_id' name="board_id" type="number" hidden value="<?= $post->idx ?>"></input>
                      <input name="comment_id" type="number" hidden value="<?= $com->idx ?>"></input>
                      <input name="group_idx" type="number" hidden value="<?= $com->group_idx ?>"></input>
                      <input name="depth" type="number" hidden value="<?= $com->depth ?>"></input>

                      <input name="user_id" type="text" hidden value="<?= $this->session->userdata('user_id') ?>"></input>

                      <input name="group_order" type="number" hidden value="<?= $com->group_order ?>"></input>
                      <input id='post_user_id' name="post_user_id" type="text" hidden value="<?= $post->user_id ?>"></input>
                      <input name="board_type" type="text" hidden value="<?= $post->board_type ?>"></input>

                      <textarea id="reply_contents" value="<?= $com->idx ?>" name="reply_contents" placeholder="답변을 적어주세요" required cols="30" rows="5" class="w-full rounded duration-200 focus:bg-[#2f2f2f] bg-[#3f3f3f] p-3 outline-none"></textarea>
                    </div>

                    <!-- 기능 -->
                    <div class="flex gap-3 justify-between place-items-center">
                      <div>
                        <!-- 기능들 -->
                      </div>
                      <div class="">
                        <button type="submit"
                          class="outline-none duration-200 bg-[#2f2f2f] hover:bg-[#1f1f1f] border border-[#4f4f4f] px-5 py-3 rounded w-40">
                          답변 등록
                        </button>
                      </div>
                    </div>

                  </form>

                </div>
              </div>

            <? endforeach ?>
            
          </div>

          <!-- 댓글 리스트 없을때 -->
          <div class="flex justify-center bg-[#1f1f1f] p-5 border border-[#4f4f4f] <?= empty($comment) ? '' : 'hidden' ?>">
            <p>
              댓글이 존재하지 않습니다
            </p>
          </div>

          <!-- 페이지네이션 -->
          <div class="pagination <?= empty($links) ? 'hidden' : '' ?>">
            <?= $links; ?>
          </div>

          <!-- 댓글 작성 비허용 -->
          <div class="flex justify-center bg-[#1f1f1f] p-5 border border-[#4f4f4f] <?= !$post->board_comment ? 'inline' : 'hidden' ?>">
            <p>
              해당 게시글은 댓글 작성이 불가능합니다
            </p>
          </div>

          <!-- 비회원 알림 -->
          <div class="<?= $this->session->userdata('user_id') ? 'hidden' : '' ?> flex justify-center bg-[#1f1f1f] p-5 border border-[#4f4f4f]">
            <a href="/login" class="hover:underline hover:opacity-80 hover:animate-pulse duration-200">
              로그인한 회원만 댓글 등록이 가능합니다.
            </a>
          </div>

          <!-- 구분선 -->
          <div class="border-b border-[#4f4f4f]"></div>

          <!-- 댓글 작성 -->
          <div class="<?= $this->session->userdata('user_id') && $post->board_comment ? '' : 'hidden' ?> w-full drop-shadow-2xl text-sm flex flex-col gap-5 bg-[#1f1f1f] p-5 border border-[#4f4f4f]">
          
            <div class="flex flex-wrap justify-between">
              <div class="gap-5 flex">
                <p><?= htmlspecialchars($post->title) ?></p>
                <p> 〉</p>
                <p>댓글</p>
              </div>
              <div>
                <p class="text-gray-300">타인에게 상처주는 언행은 삼가해 주세요 : )</p>
              </div>
            </div>

            <!-- 구분선 -->
            <div class="border-b border-[#4f4f4f]"></div>

            <!-- 댓글 메인 -->
            <div class="flex flex-col gap-3">

              <!-- 내용 -->
              <div class="">
                <textarea id="contents" name="contents" placeholder="댓글을 적어주세요" required cols="30" rows="5"
                class="w-full rounded bg-[#2f2f2f] p-3 outline-none duration-200 hover:bg-[#3f3f3f] focus:bg-[#3f3f3f]"></textarea>
              </div>

              <!-- 기능 -->
              <div class="flex gap-3 justify-between place-items-center">
                <div>
                  <!-- <p>기능들</p> -->
                </div>
                <div class="">
                  <button id="comment_create_btn"
                    class="bg-[#3f3f3f] outline-none duration-200 hover:bg-[#2f2f2f] border border-[#4f4f4f] px-5 py-3 rounded w-40">
                    댓글 등록
                  </button>
                </div>
              </div>

            </div>

          </div>

        </div>

      </div>

      <!-- 글쓰기, 답글, 이전, 다음, 목록 -->
      <div class="flex justify-between gap-3 opacity-90">
        <div class="flex gap-2 <?= $this->session->userdata('user_id') ? '' : 'hidden' ?> ">
          <a href="/post_create/" class="bg-[#1f1f1f] duration-200 hover:bg-[#2f2f2f] border border-[#4f4f4f] px-3 py-2 rounded">
            글쓰기
          </a>
          <a href="/post_create_reply/<?= $post->idx?>" class="bg-[#1f1f1f] duration-200 hover:bg-[#2f2f2f] border border-[#4f4f4f] px-3 py-2 rounded">
            답글
          </a>
        </div>
        <div class="flex gap-1">
          <? if (isset($prev)): ?>
            <a title="이전글 - <?= $prev->group_order == 0 ? '' : '[답글] ' ?><?= htmlspecialchars(mb_strimwidth($prev->title, 0, 25, " ..")) ?>" href="/<?= $this->uri->segment(1)?>/<?= $prev->idx?>" class="bg-[#1f1f1f] duration-200 hover:bg-[#2f2f2f] border border-[#4f4f4f] px-3 py-2 rounded">
              이전글
            </a>
          <? endif; ?>
          <? if (isset($next)): ?>
            <a title="다음글 - <?= $next->group_order == 0 ? '' : '[답글] ' ?><?= htmlspecialchars(mb_strimwidth($next->title, 0, 25, " ..")) ?>" href="/<?= $this->uri->segment(1)?>/<?= $next->idx?>" class="bg-[#1f1f1f] duration-200 hover:bg-[#2f2f2f] border border-[#4f4f4f] px-3 py-2 rounded">
              다음글
            </a>
          <? endif; ?>
          <a href="/<?= $this->uri->segment(1) ?>/list" class="bg-[#1f1f1f] duration-200 hover:bg-[#2f2f2f] border border-[#4f4f4f] px-3 py-2 rounded">
            목록
          </a>
        </div>
      </div>

      <!-- 해당 게시판 최근 리스트 -->
      <div class="bg-[#2f2f2f] w-full p-1 rounded flex flex-col gap-5 shadow-inner overflow-x-auto">
        <table class="text-gray-50 text-center whitespace-nowrap">
          <thead class="text-sm bg-[#3f3f3f] h-10">
            <th class="">ID</th>
            <th class="w-full">제목</th>
            <th class="px-3">작성자</th>
            <th class="px-3">작성날짜</th>
            <th class="px-3">추천</th>
            <th class="px-3">비추천</th>
            <th class="px-3">조회수</th>
          </thead>
          <? foreach ($list as $li): ?>
            <tr class="border-b border-[#4f4f4f] text-sm">
              <td class="p-2 px-3">
                <?= $li->idx ?>
              </td>
              <td class="text-left px-3">
                <a href="/freeboard/<?= $li->idx ?>" class="flex gap-2">
                  <p class="bg-red-500 rounded-full px-2 py-1 text-xs <?= $li->hit > 100 ? '' : 'hidden' ?>">
                    인기
                  </p>
                  <p class="bg-[#4f4f4f] rounded-full px-2 py-1 text-xs <?= $li->group_order > 0 ? '' : 'hidden' ?>">
                    답글
                  </p>
                  <p>
                    <?= htmlspecialchars($li->title) ?>
                  </p>
                </a>
              </td>
              <td class="flex justify-center place-items-center gap-2 px-5">
                <img src="/uploads/<?= $li->profile ?>" alt="img" class="p-0.5 border border-[#4f4f4f] w-8 h-8 mt-1 rounded-[50%] <?= $li->profile ? '' : 'hidden'?>">
                <p class="material-symbols-outlined w-8 h-8 rounded-[50%] mt-1 p-0.5 text-gray-400 flex place-items-center justify-center <?= $li->profile ? 'hidden' : '' ?>">
                  person
                </p>
                <p>
                  <?= $li->nickname ?>
                </p>
              </td>
              <td class="px-3">
                <?= (date("Y-m-d") == substr($li->regdate, 0, 10)) ? substr($li->regdate, 11, 5) : substr($li->regdate, 5, 5); ?>
              </td>
              <td class="px-3"><?= $li->like_count ?></td>
              <td class="px-3"><?= $li->dislike_count ?></td>
              <td class="px-3"><?= $li->hit ?></td>
            </tr>
          <? endforeach ?>
        </table>
      </div>

    </div>
  <!-- 메인끝 -->

  </div>

</div>

<!-- <script src="/javascript/board/board_detail.js"></script> -->

<script>
    // ajax 게시글 등록
    function like_up($idx){
    // if(!confirm('좋아요를 누르시겠습니까? (변경은 불가능합니다)')) {
    //   return;
    // }
    $.ajax({
      url: '/free_board_detail_c/board_like',
      type: 'post',
      dataType: 'json',
      data: { 
        boards_idx: $idx,
        like_type: '1',
      },
      success: response => {
        if(response.state) {
          alert(response.message);
          location.reload();
        } else {
          alert(response.message);
          $('#error_txt').text(response.message); // 에러 메시지 출력
        }
      },
      error: ( response, s, e ) => {
        console.log('에러', response, s, e);
      }
    });
  };

  function like_down($idx){
    // if(!confirm('싫어요를 누르시겠습니까? (변경은 불가능합니다)')) {
    //   return;
    // }
    $.ajax({
      url: '/free_board_detail_c/board_like',
      type: 'post',
      dataType: 'json',
      data: { 
        boards_idx: $idx,
        like_type: '0',
      },
      success: response => {
        if(response.state) {
          alert(response.message);
          location.reload();
        } else {
          alert(response.message);
          $('#error_txt').text(response.message); // 에러 메시지 출력
        }
      },
      error: ( response, s, e ) => {
        console.log('에러', response, s, e);
      }
    });
  };
  
function post_delete($idx){

  if('<?= $post->user_id ?>' != '<?= $this->session->userdata('user_id') ?>') {
    alert('작성자만 삭제할 수 있습니다.');
    return;
  }

  if(!confirm('게시글을 삭제 하시겠습니까?')){
    return;
  }
  $.ajax({
    url: '/free_board_detail_c/post_delete',
    type: 'post',
    dataType: 'json',
    data: { 
      idx: $idx,
      boards_idx: $('#bd_id').val(),
    },
    success: response => {
      if(response.state) {
        location.reload();
      } else {
        alert(response.message);
        // console.log(response);
        // $('#error_txt').text(response.message); // 에러 메시지 출력
      }
    },
    error: ( response, s, e ) => {
      console.log('에러', response);
      console.log('에러', s);
      console.log('에러', e);
    }
  });

};

// 댓글 등록
$('#comment_create_btn').on('click', function(e) {
  e.preventDefault(); // 기본 제출 이벤트 방지

  if($('#contents').val().length < 5) { // 게시글 내용
    alert('댓글 내용은 5자 이상 작성해주세요.');
    return;
  }

  if($('#contents').val().length > 150 ) { // 게시글 내용
    alert('댓글 내용은 150자 이상 입력할 수 없습니다.');
    return;
  }

  // AJAX 요청
  $.ajax({
    url: '/free_board_detail/comment_create', // 댓글 생성 URL
    type: 'POST',
    data: {
      board_id: '<?= $post->idx ?>',
      board_type: '<?= $post->board_type ?>',
      user_id: '<?= $this->session->userdata('user_id') ?>',
      contents: $('#contents').val(),
    }, // 폼 데이터 직렬화
    success: function(response) {
      // 성공 시 UI 업데이트
      location.reload();
      // 댓글 리스트에 새 댓글을 추가하는 코드
      },
    error: function(xhr, status, error) {
      // 에러 처리
      alert('댓글 추가에 실패했습니다.');
    }
    });
  });

// 댓글 수정
function comment_update($idx){
  $.ajax({
    url: '/free_board_detail_c/reply_update',
    type: 'post',
    dataType: 'json',
    data: { 
      idx: $idx,
      boards_idx: $('#bd_id').val(),
      content: $('#comment_update_value' + $idx).val(),
    },
    success: response => {
      if(response.state) {
        location.reload();
      } else {
        alert(response.message);
      }
    },
    error: ( response, s, e ) => {
      console.log('에러', response, s, e);
    }
  });
};

// 댓글 삭제
function comment_delete($idx){

  // console.log($('#pui').val());
  // console.log($('#pusi').val());

  // if($('#pcui').val() != $('#pusi').val()) {
  //   alert('작성자만 삭제할 수 있습니다.');
  //   return;
  // }

  if(!confirm('댓글을 삭제 하시겠습니까?')) {
    return;
  }
  $.ajax({
    url: '/free_board_detail_c/reply_delete',
    type: 'post',
    dataType: 'json',
    data: { 
      idx: $idx,
    },
    success: response => {
      if(response.state) {
        location.reload();
      } else {
        alert(response.message);
        // console.log(response);
        // $('#error_txt').text(response.message); // 에러 메시지 출력
      }
    },
    error: ( response, s, e ) => {
      console.log('에러', response, s, e);
    }
  });
};

// 댓글 신고
function comment_problem($idx){
  return alert('신고 기능은 구현 중입니다');
  $.ajax({
    url: '/free_board_detail_c/reply_problem',
    type: 'post',
    dataType: 'json',
    data: { 
      idx: $idx,
    },
    success: response => {
      if(response.state) {
        console.log(response);
        // location.reload();
      } else {
        console.log(response);
        $('#error_txt').text(response.message); // 에러 메시지 출력
      }
    },
    error: ( response, s, e ) => {
      console.log('에러', response, s, e);
    }
  });
};

// 댓글 등록시 댓글 화면으로 이동 (구분선쪽)
  // window.location = window.location.href.split('#')[0] + '#comments';

  // 댓글등록 ajax
  // 문서 준비가 끝나면 실행
  // $(document).ready(function() {
  //   // 댓글 폼 제출 이벤트 핸들러
  //   $('#test').on('submit', function(e) {
  //     e.preventDefault(); // 기본 제출 이벤트 방지

  //     // AJAX 요청
  //     $.ajax({
  //       url: '/free_board_detail/comment_create', // 댓글 생성 URL
  //       type: 'POST',
  //       data: $(this).serialize(), // 폼 데이터 직렬화
  //       success: function(response) {
  //         // 성공 시 UI 업데이트
  //         console.log('댓글이 추가되었습니다.');
  //         location.reload();
  //         // 댓글 리스트에 새 댓글을 추가하는 코드
  //         },
  //       error: function(xhr, status, error) {
  //         // 에러 처리
  //         console.error('댓글 추가에 실패했습니다.');
  //       }
  //       });
  //     });
  // });

  function reply_btn(num) {
    let reply = document.getElementById('reply_onoff' + num);
    document.getElementById('reply_onoff' + num).classList.remove('hidden');
    if (reply.getElementById === 'open') {
      reply.getElementById = 'close';
      document.getElementById('reply_onoff' + num).classList.remove('inline');
      document.getElementById('reply_onoff' + num).className += ' hidden';

      $("#reply_btn" + num).html('답변 달기');
    } else {
      reply.getElementById = 'open';
      document.getElementById('reply_onoff' + num).className += ' inline';

      $("#reply_btn" + num).html('답변 취소');
    }
  }

  function reply_update(num) {
    let reply = document.getElementById('reply_update' + num);
    document.getElementById('reply_update' + num).classList.remove('hidden');
    if (reply.getElementById === 'open') {
      reply.getElementById = 'close';
      document.getElementById('reply_update' + num).classList.remove('inline');
      document.getElementById('reply_update' + num).className += ' hidden';

      // 수정 버튼 클릭시
      document.getElementById('reply_value' + num).classList.remove('hidden');
      document.getElementById('reply_btn' + num).classList.remove('hidden');
      // document.getElementById('reply_arrow' + num).classList.remove('hidden');
      document.getElementById('reply_arrow' + num).classList.remove('mt-[-248px]');
      
      $("#btn-update" + num).html('수정');

    } else {
      reply.getElementById = 'open';
      document.getElementById('reply_update' + num).className += ' inline';
      
      // 수정 버튼 클릭시
      document.getElementById('reply_value' + num).className += ' hidden';
      document.getElementById('reply_btn' + num).className += ' hidden';
      // document.getElementById('reply_arrow' + num).className += ' hidden';
      document.getElementById('reply_arrow' + num).className += ' mt-[-248px]';
      $("#btn-update" + num).html('수정 취소');

      // 수정 버튼 클릭시 답글 창 닫기
      let reply2 = document.getElementById('reply_onoff' + num);
      reply2.getElementById = 'close';
      $("#reply_btn" + num).html('답변 달기');
      document.getElementById('reply_onoff' + num).className += ' hidden';
    }
  }

  // 주소복사
  function CopyUrlToClipboard(){
    var dummy   = document.createElement("input");
    var text    = location.href;
    // var text    = location.href;
    
    document.body.appendChild(dummy);
    dummy.value = text;
    dummy.select();
    document.execCommand("copy");
    document.body.removeChild(dummy);
    alert('url이 복사 되었습니다.');
  }
</script>