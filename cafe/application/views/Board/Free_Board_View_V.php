<!-- 메인 틀 -->
<div id="base" class="flex duration-200 bg-[#3f3f3f] text-gray-50 w-full relative">
<input id="seg" type="text" value="<?= $this->uri->segment(1) ?>" hidden>
  <!-- 메인 베이스 -->
  <div class="flex flex-col justify-between w-full">

    <!-- 메인 -->
    <div class="gap-3 w-full p-1 md:p-5 flex flex-col">

      <div class="flex flex-col gap-5">

        <!-- 상단 정보 및 정보 -->
        <div class="bg-[#2f2f2f] border shadow-2xl border-[#4f4f4f] opacity-90 p-5 flex flex-col gap-5">

          <div class="flex gap-1">
            <p>
              <?= 
              ($this->uri->segment(1) == 'notice' ? '공지사항' :
              ($this->uri->segment(1) == 'freeboard' ? '자유게시판' :
              ($this->uri->segment(1) == 'hellow' ? '가입인사' :
              '어디지? 어딜까' ) ) );
              ?>
              - 전체 게시물</p>
            <p id='total_value' class="font-bold animate-pulse"></p>
            <p>개</p>
          </div>

          <div class="<?= $this->uri->segment(1) == 'notice' ? 'hidden' : '' ?> border border-[#4f4f4f] p-3 rounded bg-[#1f1f1f]">
            <p>
            <?= $this->uri->segment(1) == 'freeboard' ? '자유로운 소통의 공간입니다, 악의적인 글은 삼가해 주세요 😉' : '' ?>
            <?= $this->uri->segment(1) == 'hellow' ? '가입인사를 나누는 공간입니다, 악의적인 글은 삼가해 주세요 😉' : '' ?>
            </p>
          </div>

        </div>
        <!-- 공지사항 -->
        <? if($this->uri->segment(1) != 'notice') : ?>
          
          <div class="
          <?= $this->uri->segment(1) == 'notice' ? 'hidden' : '' ?> 
          bg-[#2f2f2f] border shadow-2xl border-[#4f4f4f] hover:border-[#3f3f3f] opacity-90 flex flex-col duration-200 hover:bg-[#1f1f1f]
          ">
            <div class="flex gap-3 place-items-center py-3 px-5 bg-[#1f1f1f] rounded-b-xl border-b border-[#4f4f4f]">
              <span class="material-symbols-outlined duration-200">
                notifications
              </span>
              <div class="flex justify-between w-full">
                <p>공지사항</p>
                <a href="/notice/list" class="flex gap-2 place-items-center duration-200 hover:translate-x-1 active:translate-x-2">
                  <p>더보기</p>
                  <span class="material-symbols-outlined text-[20px]">
                    arrow_forward_ios
                  </span>
                </a>
              </div>
            </div>
              
            <div class="text-gray-50 w-full py-6 p-5 px-2 lg:justify-center relative flex gap-3 overflow-x-auto overflow-y-auto">
            <? foreach ($notice_list as $li) : ?>
              <a href="/<?= $li->board_type?>/<?= $li->idx?>" class="
              flex hover:bg-[#2f2f2f] active:-translate-y-2 flex-col justify-between shadow-xl hover:shadow-lg hover:shadow-[#2f2f2f] hover:rounded-none w-full max-w-[300px] min-w-[250px] xl:min-w-min h-full min-h-[150px] gap-3 bg-[#0f0f0f] border border-[#4f4f4f] p-3 rounded duration-200 hover:translate-y-1
              ">
  
                <div class="flex gap-3 text-sm">
                  <p class="duration-200 hover:text-white">
                    <?= htmlspecialchars(mb_strimwidth($li->title, 0, 70, ' ..')) ?>
                  </p>
                </div>
                
                <div class="flex flex-col text-sm">
  
                  <!-- 구분선 -->
                  <div class="border-b border-gray-500 place-items-center"></div>
  
                  <div class="flex justify-around place-items-center mt-2">
                    <p class="bg-red-500 text-sm rounded px-2 py-0.5 border border-[#3f3f3f]">
                      공지
                    </p>
                    <div class="flex gap-2 justify-between place-items-center">
                      <img src="/uploads/<?= $li->profile ?>" alt="img" class="p-0.5 border border-[#4f4f4f] w-8 h-8 mt-1 rounded-[50%] <?= $li -> profile ? '' : 'hidden'?>">
                      <p class="material-symbols-outlined w-8 h-8 p-0.5 rounded-[50%] mt-1 text-gray-400 flex place-items-center justify-center <?= $li -> profile ? 'hidden' : '' ?>">
                        person
                      </p>
                      <p class="tracking-wider">
                        <?= $li->nickname ?>
                      </p>
                    </div>
                    <p>
                      <?= (date("Y-m-d") == substr($li->regdate, 0, 10)) ? substr($li->regdate, 11, 5) : substr($li->regdate, 5, 5); ?>
                    </p>
                  </div>
  
                </div>
  
              </a>
            <? endforeach; ?>
            </div>
  
            <!-- 데이터 없을시 -->
            <div class="<?= empty($notice_list) ? '' : 'hidden' ?> relative">
              <p class="flex justify-center place-items-center py-10">
                데이터가 없습니다
              </p>
            </div>
  
          </div>
          
        <? endif ?>

        <!-- 상단 메뉴 -->
        <div class="flex gap-3 md:gap-0 flex-col md:flex-row justify-between place-items-center">

          <a href="/post_create" class="
          flex justify-center gap-5 border w-full md:w-min outline-none hover:rounded-none border-[#4f4f4f] whitespace-nowrap py-4 px-20 rounded hover:bg-[#2f2f2f] duration-200 bg-[#1f1f1f]
          ">
            <span class="material-symbols-outlined text-[#9f9f9f]">
              post_add
            </span>
            <p>글쓰기</p>
          </a>

          <div class="flex w-full md:w-min gap-1 place-items-center">

            <!-- 새로고침 -->
            <div class="bg-[#1f1f1f] rounded border border-[#4f4f4f] text-center hover:bg-[#2f2f2f] duration-200 hover:rounded-none">
              <button id="refresh_btn" title="화면을 초기 설정으로 새로고침합니다" class="material-symbols-outlined duration-200 hover:animate-spin py-4 px-5">
                refresh
              </button>
            </div>

            <!-- 게시글 제한 -->
            <div class="flex w-full md:w-max gap-5 bg-[#1f1f1f] px-5 py-3 hover:bg-[#2f2f2f] duration-200 place-items-center hover:rounded-none whitespace-nowrap rounded border border-[#4f4f4f]">
              <p class="text-[#9f9f9f] cursor-default">게시글</p>
              <p class="text-[#4f4f4f] cursor-default">|</p>
              <select id='list_limit' name='list_limit' title="리스트에 몇 개의 게시글을 표시할까요 ?" class="hover:rounded-none duration-200 cursor-pointer outline-none w-full text-whith rounded bg-[#1f1f1f] p-1 px-2 hover:bg-[#0f0f0f]">
                <option value="5">5 개</option>
                <option value="10">10 개</option>
                <option value="20">20 개</option>
                <option value="30">30 개</option>
              </select>
            </div>

            <!-- 순서 -->
            <div class="flex w-full md:w-max gap-5 bg-[#1f1f1f] px-5 py-3 hover:bg-[#2f2f2f] duration-200 place-items-center hover:rounded-none whitespace-nowrap rounded border border-[#4f4f4f]">
              <p class="text-[#9f9f9f] cursor-default">순서</p>
              <p class="text-[#4f4f4f] cursor-default">|</p>
              <select id='list_type' name='list_type' title="게시글의 순서를 어떻게 보여드릴까요 ?" class="hover:rounded-none duration-200 w-full cursor-pointer outline-none  text-whith rounded bg-[#1f1f1f] p-1 px-2 hover:bg-[#0f0f0f]">
                <option disabled >내림차 순서</option>
                <option value="new">최신순</option>
                <option value="old">오래된 순</option>
                <option value="hit">조회수 순</option>
                <option value="like">좋아요 순</option>
                <option value="dislike">싫어요 순</option>
                <option value="reply">답글 순</option>
                <option value="comment">댓글 순</option>
              </select>
            </div>

          </div>

        </div>

      </div>
      
      <div class="bg-[#2f2f2f] border border-[#4f4f4f] w-full p-5 rounded flex flex-col gap-5 relative drop-shadow-2xl">
        <!-- 검색 기능 -->
        <div class="flex flex-col md:flex-row gap-5 md:gap-2">

          <!-- 게시글, 댓글 -->
          <select id='search_type' name='search_type' class="
          outline-none w-full md:max-w-[20%] text-whith rounded bg-[#1f1f1f] p-3 h-12 border border-[#4f4f4f] hover:bg-[#2f2f2f] focus:bg-[#0f0f0f] focus:rounded-none duration-200 cursor-pointer
          ">
            <option value="제목만">제목만</option>
            <option value="아이디">아이디</option>
          </select>

          <!-- 검색어 -->
          <form class="flex flex-col md:flex-row w-full gap-2">

            <div class="relative w-full">
              <p class="material-symbols-outlined absolute top-3 left-3 text-gray-500 cursor-default">
                search
              </p>
              <input id="search_text" name="search_text" type="text" placeholder="검색어를 입력해주세요" class="
              pl-12 w-full outline-none text-whith rounded bg-[#1f1f1f] p-3 border border-[#4f4f4f] hover:bg-[#2f2f2f] focus:bg-[#0f0f0f] focus:rounded-none duration-200
              ">
            </div>

            <!-- 검색버튼 -->
            <button type="submit" id="search_btn" name="search_btn" class="w-full md:w-[30%] border outline-none border-[#4f4f4f] py-3 rounded hover:bg-[#0f0f0f] duration-200 bg-[#1f1f1f] hover:rounded-none">
              검색
            </button>

          </form>
        </div>

        <!-- 구분선 -->
        <div class="border-b border-gray-500"></div>

        <div class="min-h-[700px]">
          <div class="text-gray-50 w-full relative">
            <div id="table" class="flex flex-col gap-5"></div>
          </div>

          <!-- 데이터 없을시 -->
          <div class="<?= empty($list) ? '' : 'hidden' ?> relative">
            <p class="flex justify-center place-items-center py-10">
              데이터가 없습니다
            </p>
          </div>

        </div>

        <!-- 페이지네이션 -->
        <div class="pagination">
          <?= $links; ?>
        </div>
        
      </div>

    </div>
    <!-- 메인끝 -->

  </div>

</div>

<script src="/javascript/board/board_view.js"></script>

<script>

$(document).ready(function() {

  // AJAX 요청 성공 시 호출되는 함수
  function updateTableWithFetchedData(list, links) {
  // 테이블의 tbody 요소를 선택
  var tableBody = $('#table');
  // 기존의 내용을 비움
  tableBody.empty();

  // 가져온 데이터로 테이블의 새로운 행을 만듦
  $.each(list, function(i, li) {
    var dateToShow = (new Date(li.regdate).toDateString() === new Date().toDateString()) 
                      ? li.regdate.substr(11, 5) 
                      : li.regdate.substr(0, 10);
      tableBody.append(`
      <div class="
      ${(li.board_state == true && li.board_delete == false) ? '' : 'opacity-80' }
      ">
      
        <div class="relative
        border border-[#4f4f4f] duration-200 rounded shadow-md hover:shadow-xl p-2 flex flex-col gap-3
        ${(li.board_state == true && li.board_delete == false) ? 'bg-[#1f1f1f] hover:bg-[#2f2f2f]' : 'bg-[#2f2f2f] '}
        ">
          
          <div class="absolute top-0 text-center w-full ${(new Date(li.regdate).toDateString() === new Date().toDateString()) ? '' : 'hidden'}">
            <p class="flex place-content-center justify-center">
              <span class="bg-[#3f3f3f] px-10 py-0 rounded-b-2xl duration-200 border border-[#5f5f5f] border-t-0">
                new
              </span>
            </p>
          </div>

          <div class="flex justify-between place-items-center">
          
            <div class="flex gap-1 place-items-center py-2 bg-[#1f1f1f] px-2 rounded rounded-r-2xl">

              <div class="mr-2 w-12 h-8 text-sm rounded-[25%] bg-[#2f2f2f] flex justify-center place-items-center">
                <p class="">
                  ${li.idx}
                </p>
              </div>

              <img src="/uploads/${li.profile}" alt="img" class="rounded-[50%] border border-[#4f4f4f] w-10 h-10 ${li.profile ? '' : 'hidden'}">
              <p class="material-symbols-outlined text-4xl text-gray-400 flex place-items-center justify-center ${li.profile ? 'hidden' : ''}">
                person
              </p>

              <p class="text-sm tracking-wider">
                ${li.nickname}
              </p>
            </div>

            <div class="p-2 flex gap-2 text-sm text-[#9f9f9f] place-items-center">
              <span class="material-symbols-outlined text-[20px]">
                schedule
              </span>
              <p>
                ${dateToShow}
              </p>
            </div>
            
          </div>
          <a href="${(li.board_state == true && `'` + li.user_id + `'`  == '<?= $this->session->userdata('user_id') ?>') ? `/${li.board_type}/${li.idx}` : `/${li.board_type}/${li.idx}` }" 
          class="
          w-full flex gap-1 duration-200 hover:text-white hover:translate-y-1
          ">

            <div class="flex gap-2">

              <div class="wrap ${li.board_state == true && 'hidden'}">
                <span class="material-symbols-outlined duration-200 hover:opacity-80 animate-pulse text-[#9f9f9f]">
                  preview_off
                </span>
                <div class="tooltip text-sm shadow-2xl">게시글 비공개</div>
              </div>

              <div class="wrap ${li.board_comment == true && 'hidden'}">
                <span class="material-symbols-outlined duration-200 hover:opacity-80 animate-pulse text-[#9f9f9f]">
                  speaker_notes_off
                </span>
                <div class="tooltip text-sm shadow-2xl">댓글 작성 비허용</div>
              </div>

              <div class="wrap ${li.board_delete == false && 'hidden'}">
                <span class="material-symbols-outlined duration-200 hover:opacity-80 animate-pulse text-[#9f9f9f]">
                  delete
                </span>
                <div class="tooltip text-sm shadow-2xl">게시글 삭제된 상태</div>
              </div>

            </div>

            <p class="">
              ${$("<div>").text(li.title).html()}
            </p>

            <div class="text-[#9f9f9f]">
              <span class="material-symbols-outlined">
                ${li.content.indexOf('<img') != -1 ? 'image' : ''}
              </span>
              <span class="material-symbols-outlined">
                ${li.file > 0 ? 'attachment' : ''}
              </span>
            </div>
          
          </a>

          <div class="flex justify-between duration-200">

            <div class="flex text-xs font-[s-core6] duration-200 text-[#9f9f9f] place-items-center">

              <a href="/${li.board_type}/${li.idx}/#comments" class="flex place-items-center duration-200 hover:text-white">
                <div class="flex gap-2">
                  <span class="material-symbols-outlined text-[20px]">
                    chat_bubble
                  </span>
                  <p>${li.comment_count}</p>
                </div>
              </a>

              <div class="pl-3 pr-1">|</div>

              <div class="flex place-items-center">
                <div class="p-2 flex gap-2 duration-200 place-items-center">
                  <span class="material-symbols-outlined text-[20px]">
                    visibility
                  </span>
                  <p>
                    ${li.hit}
                  </p>
                </div>

                <div class="p-2 flex gap-2 place-items-center">
                  <span class="material-symbols-outlined text-[20px]">
                    thumbs_up_down
                  </span>
                  <p class="text-md ${li.like_count - li.dislike_count < 0 ? 'text-red-400' : ''}">
                    ${li.like_count - li.dislike_count}
                  </p>
                </div>
              </div>

            </div>

            <div class="${li.reply_count > 0 ? '' : 'hidden'} p-2 flex duration-200 gap-2 place-items-center">
              <span id="reply_icon${li.idx}" class="material-symbols-outlined duration-200 -rotate-180 text-[#9f9f9f]">
                reply
              </span>
              <button id="post_reply_show_btn" value="${li.idx}" class="hover:-translate-x-1 decoration-2 hover:opacity-80 duration-200 hover:underline flex gap-1">
                <p id="post_reply_text${li.idx}">
                  답글보기
                </p>
                <p>
                  ${li.reply_count}개
                </p>
              </button>
            </div>

          </div>

        </div>

        <div hidden id="reply_box${li.idx}"></div>

      </div>
    `);
  });
  $('.pagination').html(links);
}

// 게시글 답글 보기
$(document).on('click', '#post_reply_show_btn', function(e) {
  e.preventDefault();
  var postId = $(this).val();

  if($('#post_reply_text' + $(this).val() ).text() == '답글접기') {
    $('#post_reply_text' + $(this).val() ).text('답글보기');

    $('#reply_icon' + $(this).val()).removeClass('-rotate-90');
    $('#reply_icon' + $(this).val()).addClass('-rotate-180');
  } else {
    $('#reply_icon' + $(this).val()).removeClass('-rotate-180');
    $('#reply_icon' + $(this).val()).addClass('-rotate-90');

    $('#post_reply_text' + $(this).val() ).text('답글접기');
  }

  if($('#reply_box' + $(this).val() ).hasClass('hidden')) {
    $('#reply_box' + $(this).val() ).removeClass('hidden');
    $('#reply_box' + $(this).val() ).hide();
  } else {
    $('#reply_box' + $(this).val() ).addClass('hidden');
    $('#reply_box' + $(this).val() ).show();

    // 서버에 답글 데이터 요청
    $.ajax({
      url: '/Free_Board_View_C/post_reply_show',
      type: 'POST',
      data: { idx: postId },
      dataType: 'json',
      success: function(response) {
        if (response.state) {
          // 답글 데이터로 UI 업데이트
          var replyBox = $('#reply_box' + postId);
          replyBox.empty();
          $.each(response.replies, function(i, reply) {
            var dateToShow = (new Date(reply.regdate).toDateString() === new Date().toDateString()) 
                      ? reply.regdate.substr(11, 5)
                      : reply.regdate.substr(0, 10);
            // 답글 데이터를 HTML로 변환하여 추가
            replyBox.append(`
            <div class="border-b border-gray-500 p-5 flex justify-center place-items-center bg-[#0f0f0f] md:bg-[#0f0f0f] duration-200 rounded shadow-md">

              <div class="flex flex-col md:flex-row justify-center place-items-center gap-3 md:w-full duration-200">
              
                <span class="material-symbols-outlined rotate-180 text-[#9f9f9f] hidden md:block">
                  reply
                </span>

                <div class="h-30 gap-3 flex place-items-center w-full duration-200 hover:translate-y-1 hover:text-white">

                  <div class="flex gap-2 place-items-center">

                    <div class="wrap ${reply.board_state == true && 'hidden'}">
                      <span class="material-symbols-outlined duration-200 hover:opacity-80 text-[#9f9f9f]">
                        preview_off
                      </span>
                      <div class="tooltip text-sm shadow-2xl">게시글 비공개</div>
                    </div>

                    <div class="wrap ${reply.board_comment == true && 'hidden'}">
                      <span class="material-symbols-outlined duration-200 hover:opacity-80 text-[#9f9f9f]">
                        speaker_notes_off
                      </span>
                      <div class="tooltip text-sm shadow-2xl">댓글 작성 비허용</div>
                    </div>

                    <div class="wrap ${reply.board_delete == false && 'hidden'}">
                      <span class="material-symbols-outlined duration-200 hover:opacity-80 text-[#9f9f9f]">
                        delete
                      </span>
                      <div class="tooltip text-sm shadow-2xl">게시글 삭제된 상태</div>
                    </div>

                  </div>

                  <div class="flex gap-2 place-items-center place-content-center whitespace-nowrap">
                    <a href="/${reply.board_type}/${reply.idx}">
                      ${$("<div>").text(reply.title).html()}
                    </a>
                    <a href="/${reply.board_type}/${reply.idx}/#comments" class="flex place-items-center duration-200 text-[#9f9f9f] hover:text-white">
                      <div class="flex gap-2 place-items-center">
                        <p class="material-symbols-outlined text-[20px]">
                          chat_bubble
                        </p>
                        <p>${reply.comment_count}</p>
                      </div>
                    </a>
                  </div>
                  
                  <div class="text-[#9f9f9f] mt-1">
                    <span class="material-symbols-outlined">
                      ${reply.content.indexOf('<img') != -1 ? 'image' : ''}
                    </span>
                    <span class="material-symbols-outlined">
                      ${reply.file > 0 ? 'attachment' : ''}
                    </span>
                  </div>

              </div>

              <div class="flex text-xs text-[#9f9f9f] duration-200 place-items-center">

                <div class="p-2 flex gap-2 place-items-center">

                  <span class="material-symbols-outlined text-[20px]">
                    person
                  </span>
                  <p class="text-[14px] tracking-wider">
                    ${reply.user_id}
                  </p>
                </div>

                <div class="p-2 flex gap-2 place-items-center">
                  <span class="material-symbols-outlined text-[20px]">
                    visibility
                  </span>
                  <p class="text-md font-[s-core6]">
                    ${reply.hit}
                  </p>
                </div>

                <div class="p-2 flex gap-2 place-items-center">
                  <span class="material-symbols-outlined text-[20px]">
                    thumbs_up_down
                  </span>
                  <p class="text-md font-[s-core6] ${reply.like_count - reply.dislike_count < 0 ? 'text-red-400' : ''}">
                    ${reply.like_count - reply.dislike_count}
                  </p>
                </div>

                <div class="p-2 flex gap-2 place-items-center">
                  <span class="material-symbols-outlined text-[20px]">
                    schedule
                  </span>
                  <p class="min-w-[70px] text-md font-[s-core6] whitespace-nowrap">
                    ${dateToShow}
                  </p>
                </div>

              </div>

            </div>
            `);
          });
        } else {
          // alert('답글을 불러오는 데 실패했습니다.');
          alert('답글이 존재하지 않습니다.');
        }
      },
      error: function() {
        alert('답글을 불러오는 중 오류가 발생했습니다.');
      }
    });

  }

});

// 게시판 목록을 가져오는 AJAX 호출
function fetchBoardList(type, page) {
  $.ajax({
    // url: '/Free_Board_View_C/list_freeboard,
    url: '/Free_Board_View_C/list_' + type + '/'+ page,
    type: 'GET',
    dataType: 'json',
    data: {
      type: $('#list_type').val(),
      limit: $('#list_limit').val(),
    },
    success: function(response) {
      if (response.state) {
        // 게시판 목록을 DOM에 업데이트하는 함수 호출
        $('#total_value').text(response.total);
        updateTableWithFetchedData(response.list, response.links);
      } else {
        alert('게시글을 불러오는 데 실패했습니다.');
      }
    },
    error: function() {
      alert('게시글을 불러오는 중 오류가 발생했습니다.');
    }
  });
}

  fetchBoardList($('#seg').val());

  $(document).on('click', '.pagination a', function(e) {
    e.preventDefault();
    var page = $(this).attr('href').split('list/')[1];
    fetchBoardList($('#seg').val(), page); // 페이지 번호를 인자로 넘겨 해당 페이지 데이터를 불러오는 함수
  });

  $('#search_btn').click(function(e) {
    // function search_click() {
    e.preventDefault();

  // 변수 지정
  let searchType = $('#search_type').val();
  let searchText = $('#search_text').val();

  if(searchText == '') {
    alert('검색어를 입력해주세요');
    return;
  }

  // 날짜
  var today = new Date();
  var year = today.getFullYear();
  var month = ('0' + (today.getMonth() + 1)).slice(-2);
  var day = ('0' + today.getDate()).slice(-2);
  var dateString = `${year}-${month}-${day}`;
  
  // AJAX 요청
  $.ajax({
    url: "/Free_Board_View_C/search", // AJAX를 처리할 컨트롤러 메소드
    type: "GET", // 데이터를 가져오므로 GET 사용
    data: { 
      type: searchType,
      list_type: $('#list_type').val(),
      limit: $('#list_limit').val(),
      text: searchText,
      segment: $('#seg').val()
    },
    dataType: "json",
    success: function(response) {
      if(response.state) {
        // $('.pagination').show();
        $('.pagination').hide();
        // 테이블 초기화
        $('#table').empty();
        // 검색 결과를 테이블에 추가
        updateTableWithFetchedData(response.data, response.links);
      } else {
        $('#table').empty();
        $('.pagination').hide();
        $('#table').append(`
          <div class="absolute flex flex-col justify-center items-center w-full mt-52 text-center">
            <p class="bg-[#1f1f1f] p-5 rounded duration-200 animate-pulse">데이터가 없습니다</p>
          </div>
        `);
        // 검색 결과가 없음을 사용자에게 알리는 코드를 작성합니다.
      }
    },
    error: function(xhr, status, error) {
      console.error('AJAX 오류:', status, error);
    }
    });
  });

  // 리스트 정렬
  document.getElementById('list_type').addEventListener('change', function(e) {
    // 테이블의 tbody 요소를 선택
    var tableBody = $('#table');
    // 기존의 내용을 비움
    // tableBody.empty();

    fetchBoardList($('#seg').val());
  });

  // 리스트 리밋
  document.getElementById('list_limit').addEventListener('change', function(e) {
    // 테이블의 tbody 요소를 선택
    var tableBody = $('#table');
    // 기존의 내용을 비움
    // tableBody.empty();

    // console.log(parseInt($('#list_limit').val()));

    fetchBoardList($('#seg').val());
  });

  // 새로고침 버튼
  $('#refresh_btn').click(function(e) {
    location.reload();
  });

  
});
</script>