<!-- 메인 틀 -->
<div id="base" class="flex duration-200 bg-[#3f3f3f] text-gray-50 w-full relative">

  <!-- 메인 베이스 -->
  <div class="flex flex-col justify-between w-full">

    <!-- 메인 -->
    <div class="gap-3 w-full p-1 md:p-5 flex flex-col">

      <!-- 상단 공용 -->
      <div>
        <? $this->load->view('/Board/Board_Top_V');?>
      </div>
      
      <div class="bg-[#2f2f2f] border border-[#4f4f4f] w-full p-5 rounded flex flex-col gap-5 relative drop-shadow-2xl">
        <!-- 검색 기능 -->
        <div class="flex flex-col md:flex-row gap-2">
          <!-- 게시글, 댓글 -->
          <select id='search_type' name='search_type'
            class="outline-none w-full md:max-w-[20%] text-whith rounded bg-[#3f3f3f] p-3">
            <option value="제목만">제목만</option>
            <option value="글작성자">글작성자</option>
          </select>
          <!-- 검색어 -->
          <div class="flex w-full gap-1 md:gap-3">
            <div class="relative w-full">
              <p class="material-symbols-outlined absolute top-3 left-3 text-gray-500">
                search
              </p>
              <input id="search_text" name="search_text" type="text" class="focus:bg-[#2f2f2f] duration-200 pl-12 w-full outline-none text-whith rounded bg-[#3f3f3f] p-3">
            </div>
            <!-- 검색버튼 -->
            <button id="search_btn" name="search_btn" class="border outline-none border-[#4f4f4f] py-3 w-[30%] rounded hover:bg-[#2f2f2f] duration-200 bg-[#1f1f1f]">
              검색
            </button>
          </div>
        </div>

        <!-- 구분선 -->
        <div class="border-b border-gray-500"></div>

        <div class="min-h-[700px]">
          <div class="text-gray-50 w-full relative">
            <div id="table" class="flex flex-col gap-5"></div>
          </div>

          <!-- 데이터 없을시 -->
          <div class="<?= empty($list) ? 'inline-block' : 'hidden' ?> text-center">
            <p>데이터가 없습니다</p>
          </div>

        </div>

        <!-- 페이지네이션 -->
        <div class="">
          <?= $links; ?>
        </div>
        
      </div>

    </div>
    <!-- 메인끝 -->

  </div>

</div>

<script src="/javascript/board/board_view.js"></script>

<script>

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
              <span class="bg-[#4f4f4f] px-10 py-0 rounded-b-2xl duration-200 animate-pulse border border-[#5f5f5f] border-t-0">
                new
              </span>
            </p>
          </div>
          
          <div class="flex justify-between place-items-center">

            <div class="flex gap-1 place-items-center py-2 px-5 bg-[#1f1f1f] border border-[#5f5f5f] rounded rounded-r-2xl">

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

          <a href="${(li.board_state == true && li.board_delete == false) ? `/${li.board_type}/${li.idx}` : '#' }" 
          class="
          ${(li.board_state == true && li.board_delete == false) ? 'hover:translate-y-1' : '' }
          w-full flex gap-1 duration-200 hover:text-white
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
              ${li.title}
            </p>

            <div class="text-[#9f9f9f]">
              <span class="material-symbols-outlined">
                ${li.content.indexOf('<img') != -1 ? 'image' : ''}
              </span>
              <span class="material-symbols-outlined">
                ${li.file > 0? 'attachment' : ''}
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
              <span class="material-symbols-outlined rotate-180 text-[#9f9f9f]">
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
  } else {
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
      url: '/Notice_Board_View_C/post_reply_show',
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
            <div class="border-b border-gray-500 justify-center flex flex-col md:flex-row md:justify-between place-items-center p-5 bg-[#3f3f3f] md:bg-[#0f0f0f] duration-200 rounded shadow-md">

              <div class="flex place-items-center gap-3 md:w-full duration-200">
              
                <span class="material-symbols-outlined rotate-180 text-[#9f9f9f] ">
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

                  <div class="flex gap-2 place-items-center place-content-center">
                    <a href="/${reply.board_type}/${reply.idx}">
                      ${reply.title}
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

                </a>

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
function fetchBoardList(page) {
  $.ajax({
    url: '/Notice_Board_View_C/list/'+ page,
    type: 'GET',
    dataType: 'json',
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

$(document).ready(function() {

  fetchBoardList();

  $(document).on('click', '.pagination a', function(e) {
    e.preventDefault();
    var page = $(this).attr('href').split('list/')[1];
    fetchBoardList(page); // 페이지 번호를 인자로 넘겨 해당 페이지 데이터를 불러오는 함수
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
    url: "/Notice_Board_View_C/search", // AJAX를 처리할 컨트롤러 메소드
    type: "GET", // 데이터를 가져오므로 GET 사용
    data: { type: searchType, text: searchText },
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
});
</script>