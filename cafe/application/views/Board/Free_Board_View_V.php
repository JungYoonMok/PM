<!-- 메인 틀 -->
<div id="base" class="flex duration-200 bg-[#3f3f3f] text-gray-50 w-full relative">

  <!-- 메인 베이스 -->
  <div class="flex flex-col justify-between w-full h-full">

    <!-- 메인 -->
    <div class="md:mb-20 gap-5 w-full p-5 flex flex-col">

      <div class="bg-[#2f2f2f] opacity-90 p-5 flex gap-1">
        <h2>자유게시판 - 등록</h2>
        <h2 id='total_value' class="font-bold animate-pulse"></h2>
        <h2>건</h2>
      </div>
      
      <div class="bg-[#2f2f2f] border border-[#4f4f4f] w-full p-5 rounded flex flex-col gap-5 relative drop-shadow-2xl">

        <div class="min-h-[700px]">
          <table class="text-gray-50 w-full relative">
            <thead class="text-center">
              <tr class="p-3">
                <th class="text-sm pb-5 text-left">글 번호</th>
                <th class="text-sm pb-5 w-[60%]">제목</th>
                <th class="text-sm pb-5">작성자</th>
                <th class="text-sm pb-5">작성날짜</th>
                <th class="text-sm pb-5">조회수</th>
                <th class="text-sm pb-5">추천</th>
                <th class="text-sm pb-5">비추천</th>
              </tr>
            </thead>
              <tbody id="table"></tbody>
          </table>

          <!-- 데이터 없을시 -->
          <div class="<?= empty($list) ? 'inline-block' : 'hidden' ?> text-center">
            <p>데이터가 없습니다</p>
          </div>

        </div>

        <!-- 페이지네이션 -->
        <div>
          <?= $links; ?>
        </div>
        
      </div>

      <!-- 검색 기능 -->
      <div class="flex gap-2">
        <!-- 게시글, 댓글 -->
        <select id='search_type' name='search_type'
          class="outline-none w-full max-w-[20%] text-whith rounded bg-[#4f4f4f] p-3">
          <option value="제목만">제목만</option>
          <option value="글작성자">글작성자</option>
        </select>
        <!-- 검색어 -->
        <input id="search_text"  name="search_text" type="text" class="w-full outline-none text-whith rounded bg-[#4f4f4f] p-3">
        <!-- 검색버튼 -->
        <button id="search_btn" name="search_btn" class="w-full max-w-[10%] rounded bg-[#2f2f2f] p-3">검색</button>
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
      <tr class="text-center text-md">
        <td class="p-2 text-left">${li.idx}</td>
        <td class="p-2 text-left">
          <a href="/freeboard/${li.idx}">${li.title}</a>
        </td>
        <td class="p-2">${li.user_id}</td>
        <td class="p-2">${dateToShow}</td>
        <td class="p-2">${li.hit}</td>
        <td class="p-2">${li.like_count}</td>
        <td class="p-2">${li.dislike_count}</td>
      </tr>
    `);
  });
  $('.pagination').html(links);
}

// 게시판 목록을 가져오는 AJAX 호출
function fetchBoardList(page) {
  $.ajax({
    url: '/Free_Board_View_C/list/'+ page,
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
  e.preventDefault();

  // 변수 지정
  let searchType = $('#search_type').val();
  let searchText = $('#search_text').val();

  // 날짜
  var today = new Date();
  var year = today.getFullYear();
  var month = ('0' + (today.getMonth() + 1)).slice(-2);
  var day = ('0' + today.getDate()).slice(-2);
  var dateString = year + '-' + month  + '-' + day;
  
  // AJAX 요청
  $.ajax({
    url: "/Free_Board_View_C/search", // AJAX를 처리할 컨트롤러 메소드
    type: "GET", // 데이터를 가져오므로 GET 사용
    data: {
      type: searchType,
      text: searchText
    },
    dataType: "json",
    success: function(response) {
      if(response.state) {
        console.log(response);
        // 테이블 초기화
        let tableBody = $('#table');
        tableBody.empty();
        // 검색 결과를 테이블에 추가
        response.data.forEach(function(li) {
          tableBody.append(
          `<tr class="text-center text-md relative">
            <td class="p-2 text-left">${li.idx}</td>
            <td class="p-2 text-left">
              <a href="/freeboard/${li.idx}">
                ${li.title}
              </a>
            </td>
            <td class="p-2">${li.user_id}</td>
            <td class="p-2">
              ${dateString == li.regdate.substr(0, 10) ? li.regdate.substr(10, 18) : li.regdate.substr(0, 10)}
            </td>
            <td class="p-2">${li.hit}</td>
            <td class="p-2">${li.like_count}</td>
            <td class="p-2">${li.dislike_count}</td>
          </tr>`
          );
        });
      } else {
        $('#table').empty();
        // alert('검색 결과가 없습니다.');
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