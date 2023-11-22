<!-- 메인 틀 -->
<div id="base" class="flex duration-200 bg-[#3f3f3f] text-gray-50 w-full relative">

  <!-- 메인 베이스 -->
  <div class="flex flex-col justify-between w-full h-full">

    <!-- 메인 -->
    <div class="md:mb-20 gap-5 w-full p-5 flex flex-col">

      <div class="bg-[#2f2f2f] opacity-90 p-5 flex gap-1">
        <h2>자유게시판 - 등록</h2>
        <h2 class="font-bold animate-pulse"><?= empty($total) ? '0' : $total ?></h2>
        <h2>건</h2>
      </div>
      
      <div class="bg-[#2f2f2f] border border-[#4f4f4f] w-full p-5 rounded flex flex-col gap-5 relative drop-shadow-2xl">

        <div class="min-h-[700px]">
          <table class="text-gray-50 w-full">
            <thead class="text-center">
              <tr class="p-3">
                <!-- <th class="text-xs pt-3">No.</th> -->
                <th class="text-sm pb-5 text-left">글 번호</th>
                <th class="text-sm pb-5 w-[60%]">제목</th>
                <th class="text-sm pb-5">작성자</th>
                <th class="text-sm pb-5">작성날짜</th>
                <th class="text-sm pb-5">조회수</th>
                <th class="text-sm pb-5">추천</th>
                <th class="text-sm pb-5">비추천</th>
              </tr>
            </thead>
            <tbody>

            <? $board_count = 0; ?>
            <? if (!empty($list)) { foreach($list as $li) : ?>
              <tr class="text-center text-md">
                <!-- <td class="p-2"><?= $board_count += 1; ?></td> -->
                <td class="p-2 text-left"><?= $li->idx ?></td>
                <td class="p-2 text-left">
                  <a href="/freeboard/<?= $li->idx ?>">
                    <?= $li -> title ?>
                  </a>
                </td>
                <td class="p-2"><?= $li -> user_id ?></td>
                <td class="p-2">
                  <?= (empty($li->regdate) ? '-' : date("Y-m-d") == substr($li->regdate, 0, 10)) ? substr($li->regdate, 10, 18) : substr($li->regdate, 0, 10); ?>
                </td>
                <td class="p-2"><?= $li->hit ?></td>
                <td class="p-2"><?= '0' ?></td>
                <td class="p-2"><?= '0' ?></td>
              </tr>
              <? endforeach; } else { ?>
                <!-- <p>데이터가 없습니다</p> -->
              <? } ?>
                
              </tbody>
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
        <!-- 기간 -->
        <!-- <select id='search_date' name='search_date'
          class="outline-none w-full max-w-[20%] text-whith rounded bg-[#4f4f4f] p-3">
          <option value="전체기간" selected>전체기간</option>
          <option value="1일">1일</option>
          <option value="1주">1주</option>
          <option value="1개월">1개월</option>
          <option value="6개월">6개월</option>
          <option value="1년">1년</option>
        </select> -->
        <!-- 게시글, 댓글 -->
        <select id='search_type' name='search_type'
          class="outline-none w-full max-w-[20%] text-whith rounded bg-[#4f4f4f] p-3">
          <!-- <option value="게시글+댓글" selected>게시글 + 댓글</option> -->
          <option value="제목만">제목만</option>
          <option value="글작성자">글작성자</option>
          <option value="댓글내용">댓글내용</option>
          <option value="댓글작성자">댓글작성자</option>
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
  $(document).ready( () => {

    // 게시글 삭제
    $('#search_btn').click( e => {
      e.preventDefault();

      // console.log($('#search_type').val(), $('#search_text').val());
      // return;

      $.ajax({
        type: "POST",
        url: "/Free_Board_View_C/search",
        data: {
          // 'date': $('#search_date').val(),
          'type': $('#search_type').val(),
          'search_text': $('#search_text').val(),
        },
        dataType: "json",
        success: (response) => {
          console.log('성공', response);
        },
        error: (request, status, error) => {
          console.log('오류', request);
          console.log('오류', status);
          console.log('오류', error);
        }
      });
    })

  });

</script>