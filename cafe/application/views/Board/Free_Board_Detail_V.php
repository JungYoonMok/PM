<title>카페 | <?= $post->title ?></title>

<!-- 메인 틀 -->
<div class="flex duration-200 bg-[#3f3f3f] text-gray-50 w-full relative">

  <!-- 메인 베이스 -->
  <div class="flex flex-col justify-between w-full h-full">

    <!-- 메인 -->
    <div class="md:mb-20 w-full p-5 flex flex-col gap-5 drop-shadow-2xl">

      <!-- 수정하기, 이전, 다음, 목록 -->
      <div class="flex justify-between gap-3 opacity-90">
        <div>
          <a href="#"
            class="<?= $this->session->userdata('user_id') ? '' : 'hidden' ?> bg-blue-500 duration-200 hover:bg-[#2f2f2f] border border-blue-400 px-3 py-2 rounded">수정하기</a>
        </div>
        <div>
          <a href="#"
            class="bg-[#1f1f1f] duration-200 hover:bg-[#2f2f2f] border border-gray-600 px-3 py-2 rounded">이전글</a>
          <a href="#"
            class="bg-[#1f1f1f] duration-200 hover:bg-[#2f2f2f] border border-gray-600 px-3 py-2 rounded">다음글</a>
          <a href="/freeboard"
            class="bg-[#1f1f1f] duration-200 hover:bg-[#2f2f2f] border border-gray-600 px-3 py-2 rounded">목록</a>
        </div>
      </div>

      <div class="bg-[#2f2f2f] p-5 flex flex-col gap-5 border border-gray-500 rounded">

        <!-- 게시글 타입, 제목, 작성날짜-->
        <div class="flex justify-between">
          <div class="flex gap-5  place-items-center">
            <span class="material-symbols-outlined">
              location_on
            </span>
            <a class="hover:underline duration-200" href="/freeboard">
              <?= $post->board_type ?>
            </a>
            <p>〉</p>
            <button class="font-bold text-lg duration-200 hover:translate-y-1"
              onclick=location.reload(true);><?= $post->title ?></button>
          </div>
          <div class="flex place-items-center gap-3 opacity-80 text-sm">
            <span class="material-symbols-outlined">
              edit_calendar
            </span>
            <p class=""><?= substr($post->regdate, 0, 16); ?></p>
          </div>
        </div>

        <!-- 구분선 -->
        <div class="border-b border-gray-500"></div>

        <!-- 컨텐츠 -->
        <div class="flex flex-col gap-5">

          <!-- 작성자 및 게시글 정보 -->
          <div class="flex justify-between place-items-center">
            <div class="w-full flex gap-3 place-content-start">
              <div
                class="relative drop-shadow-2xl flex rounded-[50%] place-content-center border border-gray-500 h-14 w-14 bg-[#3f3f3f]">
                <img width="100%" src="https://pds.saramin.co.kr/workenv-bg/202303/09/rr8njw_y8e6-w09k06_workenv-bg.png"
                  class="material-symbols-outlined rounded-[50%] text-5xl w-full h-full text-gray-400">
                </img>
              </div>
              <div>
                <a href="#" class="font-bold hover:underline hover:opacity-80 duration-200">
                  <?= $post->user_id; ?>(등급)
                </a>
                <div>
                  hi
                </div>
              </div>
            </div>
            <div class="flex gap-7 text-sm whitespace-nowrap">
              <div class="flex gap-2">
                <span class="material-symbols-outlined">
                  visibility
                </span>
                <p><?= $hit->hit; ?></p>
              </div>
              <div class="flex gap-2">
                <span class="material-symbols-outlined">
                  chat_bubble
                </span>
                <p><?= $comment_count->cnt ?></p>
              </div>
              <div class="flex gap-2">
                <span class="material-symbols-outlined">
                  thumb_up
                </span>
                <p><?= $like_count1->cnt ?></p>
              </div>
              <div class="flex gap-2">
                <span class="material-symbols-outlined">
                  thumb_down
                </span>
                <p><?= $like_count2->cnt ?></p>
              </div>
              <input type="text" id="link" value="http://localhost/freeboard/<?= $post->idx; ?>" class="hidden" />
              <button onclick=CopyUrlToClipboard() class="flex gap-2 hover:opacity-70 duration-200 hover:translate-y-1">
                <span class="material-symbols-outlined">
                  link
                </span>
                <p class="">URL 복사</p>
              </button>
            </div>
          </div>

          <!-- 게시글 내용 -->
          <div class="outline-none rounded w-full p-3" required name="contents" cols="30" rows="10">
            <p class="min-h-[500px]">
              <?= $post->content; ?>
            </p>
          </div>

          <!-- 좋아요 및 싫어요 -->
          <div class="flex justify-center gap-5 py-5 opacity-80">
            <div class="text-center text-sm">
              <button
                id='like_up' name='like_up' class="hover:-translate-y-1 material-symbols-outlined text-3xl hover:text-white hover:bg-[#3f3f3f] w-16 h-16 rounded-[50%] duration-100">
                thumb_up
              </button>
              <p class='bg-[#3f3f3f] rounded p-1'>좋아요</p>
            </div>
            <div class="text-center text-sm">
              <button
              id='like_down' name='like_down' class="hover:translate-y-1 material-symbols-outlined text-3xl hover:text-white hover:bg-[#3f3f3f] w-16 h-16 rounded-[50%] duration-100">
              thumb_down
            </button>
            <p class='bg-[#3f3f3f] rounded p-1'>싫어요</p>
            </div>
          </div>

          <!-- 첨부파일 -->
          <div class="flex duration-200 place-items-center p-3 gap-5 <?= empty($post->files) ? 'hidden' : $post->files ?>">
            <p>첨부파일</p>
            <div class="">

            </div>
          </div>

          <!-- 구분선 댓글 달릴시 이동되는 구간 -->
          <div id="comments" class="border-b border-gray-500"></div>

          <!-- 댓글 리스트 있을때 and 리플 -->
          <!-- <div id="commentsContainer" class="flex flex-col gap-5 <?= empty($comment) ? 'hidden' : '' ?>"> -->
          <div class="flex flex-col gap-1 w-full <?= empty($comment) ? 'hidden' : '' ?>">
            <? foreach ($comment as $com): ?>

              <div class="flex gap-3 text-sm w-full hover:translate-y-1 hover:bg-[#3f3f3f] p-3 duration-200 rounded">

                <!-- 답글일 경우 -->
                <div class="ml-[<?= 20 * $com -> depth - 1 ?>px;] flex justify-center place-items-center <?= $com->group_order !== '0' ? 'inline' : 'hidden' ?>">
                  <span class="material-symbols-outlined text-4xl rotate-180 mb-24 ml-5 text-[#4f4f4f]">
                    arrow_top_left
                  </span>
                </div>

                <div class="flex gap-3 w-full">
                  <!-- 작성자 -->
                  <div class="flex gap-3 relative">
                    <!-- 프로필 -->
                    <div class="drop-shadow-2xl flex rounded-[50%] place-content-center border border-gray-500 h-14 w-14 bg-[#3f3f3f]">
                      <img 
                        width="100%" src="https://pds.saramin.co.kr/workenv-bg/202303/09/rr8njw_y8e6-w09k06_workenv-bg.png"
                        class="material-symbols-outlined rounded-[50%] text-5xl w-full h-full text-gray-400">
                      </img>
                    </div>
                    <div class="<?= $post->user_id == $com->user_id ? 'inline-block' : 'hidden' ?> absolute top-12 w-full">
                      <p class="text-xs text-center bg-blue-500 rounded px-1">
                        작성자
                      </p>
                    </div>
                  </div>

                    <!-- 댓글 -->
                    <div class="flex flex-col gap-2 w-full">
                      <!-- <p>No: <?= $com->idx ?></p> -->
                      <!-- 아이디 -->
                      <div class="flex justify-between w-full px-1">
                        <div class="flex gap-1">
                          <a href="#" class="font-bold hover:underline hover:opacity-80 duration-200">
                            <?= empty($com->user_id) ? null : $com->user_id; ?>
                          </a>
                          <p>(등급)</p>
                        </div>
                        <p class="flex gap-2 text-xs place-items-center text-gray-400 pr-2">
                          <span class="material-symbols-outlined text-sm">
                            <?= date("Y-m-d") == substr($com->regdate, 0, 10) ? 'schedule' : 'today'; ?>                            
                          </span>
                          <span class="">
                            <?= (empty($com->regdate) ? '-' : date("Y-m-d") == substr($com->regdate, 0, 10)) ? substr($com->regdate, 10, 18) : substr($com->regdate, 0, 16); ?>
                          </span>
                        </p>
                      </div>

                    <!-- 작성된 댓글 -->
                    <div>
                      <!-- 내용 -->
                      <div class="shadow-xl py-5 px-5 rounded-tl-none rounded-xl <?= ($post->user_id == $com->user_id) ? 'border border-gray-500 opacity-80' : 'bg-[#3f3f3f] border border-gray-500'; ?>">
                        <?= empty($com->content) ? null : $com->content; ?>
                      </div>

                      <!-- 작성시간 및 답글쓰기 -->
                      <div class="flex justify-between py-1 place-items-center text-sm text-gray-300 mt-3 whitespace-nowrap px-3">

                        <div class="opacity-80">
                          <button id='reply_btn' class="<?= $this->session->userdata('user_id') ? 'inline-block' : 'hidden' ?> font-bold hover:underline hover:opacity-80 duration-200" onclick='reply_btn(<?= $com->idx ?>)'>
                            답변 달기
                          </button>
                        </div>

                        <div class="bg-[#3f3f3f] px-3 py-1 rounded <?= $this->session->userdata('user_id') ? 'inline-block' : 'hidden' ?> flex gap-3">
                          <div class="<?= $com->user_id == $this->session->userdata('user_id') ? 'inline-block' : 'hidden' ?> flex gap-3">
                            <button onclick='#' class="hover:underline hover:underline-offset-4 px-2 py-1 rounded">
                              수정
                            </button>
                            <button onclick='#' class="hover:underline hover:underline-offset-4 px-2 py-1 rounded">
                              삭제
                            </button>
                            <p class="text-[5px] py-1 text-[#5f5f5f]">
                              ●
                            </p>
                          </div>
                          <button onclick='#' class="text-red-400 hover:underline hover:underline-offset-4 px-2 py-1 rounded">
                            신고
                          </button>
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
                      <input name="comment_id" type="number" hidden value="<?= $com->idx ?>"></input>
                      <input name="group_idx" type="number" hidden value="<?= $com->group_idx ?>"></input>
                      <input name="group_order" type="number" hidden value="<?= $com->group_order ?>"></input>
                      <input name="depth" type="number" hidden value="<?= $com->depth ?>"></input>

                      <input id='bd_id' name="board_id" type="number" hidden value="<?= $post->idx ?>"></input>
                      <input name="board_type" type="text" hidden value="<?= $post->board_type ?>"></input>
                      <input name="user_id" type="text" hidden value="<?= $this->session->userdata('user_id') ?>"></input>

                      <textarea name="contents" placeholder="답변을 적어주세요" required cols="30" rows="5" class="w-full rounded duration-200 focus:bg-[#2f2f2f] bg-[#3f3f3f] p-3 outline-none"></textarea>
                    </div>

                    <!-- 기능 -->
                    <div class="flex gap-3 justify-between place-items-center">
                      <div>
                        기능들
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

          <!-- 뷰에서 페이지네이션 링크 출력 -->
          <!-- <div class="<?= empty($comment) ? 'hidden' : '' ?> my-5"> -->
          <div class="my-5">
            <?= $links; ?>
          </div>

          <!-- 댓글 리스트 없을때 -->
          <div
            class="flex justify-center bg-[#1f1f1f] p-5 border border-gray-500 <?= empty($comment) ? 'inline' : 'hidden' ?>">
            <p>
              댓글이 존재하지 않습니다
            </p>
          </div>

          <!-- 비회원 알림 -->
          <div
            class="<?= $this->session->userdata('user_id') ? 'hidden' : '' ?> flex justify-center bg-[#1f1f1f] p-5 border border-gray-500">
            <a href="/login" class="hover:underline hover:opacity-80 hover:animate-pulse duration-200">
              로그인한 회원만 댓글 등록이 가능합니다.
            </a>
          </div>

          <!-- 구분선 -->
          <div class="border-b border-gray-500"></div>

          <!-- 댓글 작성 -->
          <div class="<?= $this->session->userdata('user_id') ? '' : 'hidden' ?> w-full drop-shadow-2xl text-sm flex flex-col gap-5 bg-[#1f1f1f] p-5 border border-gray-500">
          
            <div class="flex justify-between">
              <div class="gap-5 flex">
                <p><?= $post->title ?></p>
                <p> 〉</p>
                <p>댓글</p>
              </div>
              <div>
                <p class="text-gray-300">타인에게 상처주는 언행은 삼가해 주세요 : )</p>
              </div>
            </div>

            <!-- 구분선 -->
            <div class="border-b border-gray-500"></div>

            <!-- 댓글 메인 -->
            <form id="test" action="/free_board_detail/comment_create" method="post" class="flex flex-col gap-3">

              <!-- 내용 -->
              <div>
                <input name="board_id" type="number" hidden value="<?= $post->idx ?>"></input>
                <input name="board_type" type="text" hidden value="<?= $post->board_type ?>"></input>
                <input name="user_id" type="text" hidden value="<?= $this->session->userdata('user_id') ?>"></input>
                <textarea name="contents" placeholder="댓글을 적어주세요" required cols="30" rows="5"
                  class="w-full rounded bg-[#2f2f2f] p-3 outline-none"></textarea>
              </div>

              <!-- 기능 -->
              <div class="flex gap-3 justify-between place-items-center">
                <div>
                  기능들
                </div>
                <div class="">
                  <button type="submit"
                    class="bg-[#3f3f3f] outline-none duration-200 hover:bg-[#2f2f2f] border border-gray-600 px-5 py-3 rounded w-40">
                    댓글 등록
                  </button>
                </div>
              </div>

            </form>

          </div>

        </div>

      </div>

      <!-- 글쓰기, 답글, 이전, 다음, 목록 -->
      <div class="flex justify-between gap-3 opacity-90">
        <div class="flex gap-2 <?= $this->session->userdata('user_id') ? '' : 'hidden' ?> ">
          <a href="/free_board_create_c/" class="bg-[#1f1f1f] duration-200 hover:bg-[#2f2f2f] border border-gray-600 px-3 py-2 rounded">
            글쓰기
          </a>
          <a href="#" class="bg-[#1f1f1f] duration-200 hover:bg-[#2f2f2f] border border-gray-600 px-3 py-2 rounded">
            답글
          </a>
        </div>
        <div class="flex gap-2">
          <a href="#" class="bg-[#1f1f1f] duration-200 hover:bg-[#2f2f2f] border border-gray-600 px-3 py-2 rounded">
            이전글
          </a>
          <a href="#" class="bg-[#1f1f1f] duration-200 hover:bg-[#2f2f2f] border border-gray-600 px-3 py-2 rounded">
            다음글
          </a>
          <a href="/freeboard"
            class="bg-[#1f1f1f] duration-200 hover:bg-[#2f2f2f] border border-gray-600 px-3 py-2 rounded">
            목록
          </a>
        </div>
      </div>

      <!-- 해당 게시판 최근 리스트 -->
      <div class="bg-[#2f2f2f] border w-full border-gray-500 p-5 rounded flex flex-col gap-5 drop-shadow-2xl">
        <table class="text-gray-50 text-center">
          <th>번호</th>
          <th>ID</th>
          <th>분류</th>
          <th>제목</th>
          <th>작성자</th>
          <th>작성날짜</th>
          <? $numCount = 0; ?>
          <? foreach ($list as $li): ?>
            <tr class="border-b border-gray-500">
              <td class="p-2">
                <?= $numCount += 1 ?>
              </td>
              <td class="p-2"><?= $li->idx ?></td>
              <td class="p-2"><?= $li->board_type ?></td>
              <td class="text-left">
                <a href="/freeboard/<?= $li->idx ?>">
                  <?= $li->title ?>
                </a>
              </td>
              <td><?= $li->user_id ?></td>
              <td class=""><?= $li->regdate ?></td>
            </tr>
          <? endforeach ?>
        </table>
      </div>

    </div>
    <!-- 메인끝 -->

  </div>

</div>

<script src='/javascript/board/board_detail.js'></script>