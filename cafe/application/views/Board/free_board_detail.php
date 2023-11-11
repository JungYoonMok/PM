<title>카페 | <?=$post->title?></title>

<!-- 메인 틀 -->
<div class="flex duration-200 bg-[#3f3f3f] text-gray-50 w-full relative">

  <!-- 메인 베이스 -->
  <div class="flex flex-col justify-between w-full h-full">

    <!-- 메인 -->
    <div class="md:mb-20 w-full p-5 flex flex-col gap-5 drop-shadow-2xl">

      <!-- 수정하기, 이전, 다음, 목록 -->
      <div class="flex justify-between gap-3 opacity-90">
        <div>
          <a href="#" class="bg-blue-500 duration-200 hover:bg-[#2f2f2f] border border-blue-400 px-3 py-2 rounded">수정하기</a>
        </div>
        <div>
          <a href="#" class="bg-[#1f1f1f] duration-200 hover:bg-[#2f2f2f] border border-gray-600 px-3 py-2 rounded">이전글</a>
          <a href="#" class="bg-[#1f1f1f] duration-200 hover:bg-[#2f2f2f] border border-gray-600 px-3 py-2 rounded">다음글</a>
          <a href="/freeboard" class="bg-[#1f1f1f] duration-200 hover:bg-[#2f2f2f] border border-gray-600 px-3 py-2 rounded">목록</a>
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
              <?=$post->board_type?>
            </a>
            <p>〉</p>
            <button class="font-bold text-lg duration-200 hover:translate-y-1" onclick=location.reload(true);><?=$post->title?></button>
          </div>
          <div class="flex place-items-center gap-3 opacity-80 text-sm">
            <span class="material-symbols-outlined">
              edit_calendar
            </span>
            <p class=""><?=substr($post->regdate, 0, 16);?></p>
          </div>
        </div>

        <!-- 구분선 -->
        <div class="border-b border-gray-500"></div>

        <!-- 컨텐츠 -->
        <div class="flex flex-col gap-5">

            <!-- 작성자 -->
            <div class="flex justify-between place-items-center">
              <div class="w-full flex gap-3 place-content-start">
                <div class="relative drop-shadow-2xl flex rounded-[50%] place-content-center border border-gray-500 h-14 w-14 bg-[#3f3f3f]">
                  <img 
                    width="100%"
                    src="https://pds.saramin.co.kr/workenv-bg/202303/09/rr8njw_y8e6-w09k06_workenv-bg.png"
                    class="material-symbols-outlined rounded-[50%] text-5xl w-full h-full text-gray-400">
                  </img>
                </div>
                <div>
                  <a href="#" class="font-bold hover:underline hover:opacity-80 duration-200">
                    <!-- <?=$post->user_id;?>(등급) -->
                    Duckey (등급)
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
                  <p>139</p>
                </div>
                <div class="flex gap-2">
                  <span class="material-symbols-outlined">
                    chat_bubble
                  </span>
                  <p>8</p>
                </div>
                <div class="flex gap-2">
                  <span class="material-symbols-outlined">
                    thumb_up
                  </span>
                  <p>
                    22
                  </p>
                </div>
                <div class="flex gap-2">
                  <span class="material-symbols-outlined">
                    thumb_down
                  </span>
                  <p>1</p>
                </div>
                <input type="text" id="link" value="http://localhost/freeboard/<?=$post->idx;?>" class="hidden"/>
                <button onclick=urlCopy() class="flex gap-2 hover:opacity-70 duration-200 hover:translate-y-1">
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
                <?=$post->content;?>
              </p>
            </div>

            <!-- 좋아요 및 싫어요 -->
            <div class="flex justify-center gap-5 py-5 opacity-80">
              <div>
                <button class="duration-200 hover:-translate-y-1 material-symbols-outlined text-3xl hover:text-white hover:bg-[#1f1f1f] w-16 h-16 rounded-[50%] duration-200">
                  thumb_up
                </button>
              </div>
              <div>
                <button class="duration-200 hover:translate-y-1 material-symbols-outlined text-3xl hover:text-white hover:bg-[#1f1f1f] w-16 h-16 rounded-[50%] duration-200">
                  thumb_down
                </button>
              </div>
            </div>

            <!-- 첨부파일 -->
            <div class="flex duration-200 place-items-center p-3 gap-5 <?= empty($post->files) ? 'hidden' : $post->files ?>">
              <p>첨부파일</p>
              <div class="">
                <?= $post->files ?>
              </div>
            </div>

            <!-- 구분선 댓글 달릴시 이동되는 구간 -->
            <div id="comments" class="border-b border-gray-500"></div>
            
            <!-- 댓글 리스트 있을때 and 리플 -->
            <!-- <div id="commentsContainer" class="flex flex-col gap-5 <?= empty($comment) ? 'hidden' : '' ?>"> -->
            <div class="flex flex-col gap-5 <?= empty($comment) ? 'hidden' : '' ?>">
              <? foreach($comment as $com): ?>
                
                <div class="flex gap-3 text-sm whitespace-nowrap">
                
                  <!-- 답글일 경우 -->
                  <div class="lg:ml-[<?= (20 * ($com->depth - 1)) ?>px;] flex justify-center place-items-center <?=$com->group_order !== '0' ? 'inline' : 'hidden'?>">
                    <span class="material-symbols-outlined text-4xl rotate-180 mb-10 ml-5 text-[#4f4f4f]">
                      arrow_top_left
                    </span>
                  </div>

                  <!-- 작성자 -->
                  <div class="flex gap-3">
                    <div class="relative drop-shadow-2xl flex rounded-[50%] place-content-center border border-gray-500 h-14 w-14 bg-[#3f3f3f]">
                      <img 
                        width="100%"
                        src="https://pds.saramin.co.kr/workenv-bg/202303/09/rr8njw_y8e6-w09k06_workenv-bg.png"
                        class="material-symbols-outlined rounded-[50%] text-5xl w-full h-full text-gray-400">
                      </img>
                    </div>
                    <!-- 아이디 -->
                      <div>
                        <a href="#" class="font-bold hover:underline hover:opacity-80 duration-200">
                          <?= empty($com->user_id) ? null : $com->user_id; ?>
                        </a>
                        <p>No: <?=$com->idx?></p>
                      </div>
                    </div>

                    <!-- 작성된 댓글 -->
                    <div class="flex flex-col shadow-xl py-3 px-5 rounded-tl-none rounded rounded-bl-xl <?= $com->user_id !== 'Duckey' ? 'border border-yellow-500' : 'bg-[#3f3f3f] border border-gray-500'; ?>">

                      <!-- 내용 -->
                      <div class="">
                        <?= empty($com->content) ? null : $com->content; ?>
                      </div>

                      <!-- 작성시간 및 답글쓰기 -->
                      <div class="text-sm gap-9 flex mt-5 justify-between gap-3 opacity-80 text-gray-300 whitespace-nowrap">
                        <p class="-mr-3">
                          <?= empty($com->regdate) ? null : substr($com->regdate, 0, 16); ?>
                        </p>
                        <button class="hover:underline hover:opacity-80 duration-200" onclick='reply_btn(<?=$com->idx?>)'>
                          리플 작성
                        </button>
                      </div>
                      
                    </div>
                    
                  </div>

                  <!-- 리플 작성 -->
                  <div id="reply_onoff<?=$com->idx?>" class="w-full text-sm flex flex-col gap-5 bg-[#1f1f1f] p-5 border border-gray-500 hidden">
                    <div class="flex justify-between">
                      <div class="flex gap-5 flex">
                        <p><?=$com->content?></p>
                        <p> 〉</p>
                        <p>리플 작성</p>
                      </div>
                      <div>
                        <p class="text-gray-300">타인에게 상처주는 언행은 삼가해 주세요 : )</p>
                      </div>
                    </div>

                    <!-- 구분선 -->
                    <div class="border-b border-gray-500"></div>

                    <!-- 댓글 메인 -->
                    <form action="/free_board_detail/reply_comment_create" method="post" class="flex flex-col gap-3">

                      <!-- 내용 -->
                      <div>
                        <input name="comment_id" type="number" hidden value="<?=$com->idx?>"></input>
                        <input name="group_idx" type="number" hidden value="<?=$com->group_idx?>"></input>
                        <input name="group_order" type="number" hidden value="<?=$com->group_order?>"></input>
                        <input name="depth" type="number" hidden value="<?=$com->depth?>"></input>

                        <input name="board_id" type="number" hidden value="<?=$post->idx?>"></input>
                        <input name="board_type" type="text" hidden value="<?=$post->board_type?>"></input>
                        <input name="user_id" type="text" hidden value="Duckey"></input>
                        <textarea name="contents" required cols="30" rows="5" class="w-full rounded bg-[#2f2f2f] p-3 outline-none"></textarea>
                      </div>

                      <!-- 기능 -->
                      <div class="flex gap-3 justify-between place-items-center">
                        <div>
                          기능들
                        </div>
                        <div class="">
                          <button type="submit" class="bg-[#3f3f3f] outline-none duration-200 hover:bg-[#2f2f2f] border border-gray-600 px-5 py-3 rounded w-40">
                            리플 등록
                          </button>
                        </div>
                      </div>

                    </form>

                  </div>

              <? endforeach ?>

            </div>

            <!-- 뷰에서 페이지네이션 링크 출력 -->
            <div class="<?= empty($comment) ? 'hidden' : '' ?> my-5">
              <?= $links; ?> 
            </div>

            <!-- 댓글 리스트 없을때 -->
            <div class="flex justify-center bg-[#1f1f1f] p-5 border border-gray-500 <?= empty($comment) ? 'inline' : 'hidden' ?>">
              <p>
                댓글이 존재하지 않습니다
              </p>
            </div>

            <!-- 비회원 알림 -->
            <div class="flex justify-center bg-[#1f1f1f] p-5 border border-gray-500">
              <a href="/login" class="hover:underline hover:opacity-80 hover:animate-pulse duration-200">
                로그인한 회원만 댓글 등록이 가능합니다.
              </a>
            </div>

            <!-- 댓글 작성 -->
            <div class="w-full text-sm flex flex-col gap-5 bg-[#1f1f1f] p-5 border border-gray-500">
              <div class="flex justify-between">
                <div class="flex gap-5 flex">
                  <p><?=$post->title?></p>
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
                  <input name="board_id" type="number" hidden value="<?=$post->idx?>"></input>
                  <input name="board_type" type="text" hidden value="<?=$post->board_type?>"></input>
                  <input name="user_id" type="text" hidden value="Duckey"></input>
                  <textarea name="contents" required cols="30" rows="5" class="w-full rounded bg-[#2f2f2f] p-3 outline-none"></textarea>
                </div>

                <!-- 기능 -->
                <div class="flex gap-3 justify-between place-items-center">
                  <div>
                    기능들
                  </div>
                  <div class="">
                    <button type="submit" class="bg-[#3f3f3f] outline-none duration-200 hover:bg-[#2f2f2f] border border-gray-600 px-5 py-3 rounded w-40">
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
        <div>
          <a href="#" class="bg-[#1f1f1f] duration-200 hover:bg-[#2f2f2f] border border-gray-600 px-3 py-2 rounded">
            글쓰기
          </a>
          <a href="#" class="bg-[#1f1f1f] duration-200 hover:bg-[#2f2f2f] border border-gray-600 px-3 py-2 rounded">
            답글
          </a>
        </div>
        <div>
          <a href="#" class="bg-[#1f1f1f] duration-200 hover:bg-[#2f2f2f] border border-gray-600 px-3 py-2 rounded">
            이전글
          </a>
          <a href="#" class="bg-[#1f1f1f] duration-200 hover:bg-[#2f2f2f] border border-gray-600 px-3 py-2 rounded">
            다음글
          </a>
          <a href="/freeboard" class="bg-[#1f1f1f] duration-200 hover:bg-[#2f2f2f] border border-gray-600 px-3 py-2 rounded">
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
          <?$numCount = 0;?>
          <?foreach($list as $li):?>
            <tr class="border-b border-gray-500">
              <td class="p-2">
                <?=$numCount += 1?>
              </td>
              <td class="p-2"><?=$li->idx?></td>
              <td class="p-2"><?=$li->board_type?></td>
              <td class="text-left">
                <a href="/freeboard/<?=$li->idx?>">
                  <?=$li->title?>
                </a>
              </td>
              <td><?=$li->user_id?></td>
              <td class=""><?=$li->regdate?></td>
            </tr>
          <?endforeach?>
        </table>
      </div>
      
    </div>
    <!-- 메인끝 -->

  </div>

</div>

<script>

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

  function reply_btn(num)
  {
    let reply = document.getElementById('reply_onoff' + num); 
    document.getElementById('reply_onoff' + num).classList.remove('hidden');
    if(reply.getElementById === 'open'){
      reply.getElementById = 'close';
      document.getElementById('reply_onoff' + num).classList.remove('inline');
      document.getElementById('reply_onoff' + num).className += ' hidden';
    } else {
      reply.getElementById = 'open';

      document.getElementById('reply_onoff' + num).className += ' inline';
    }
  }
</script>