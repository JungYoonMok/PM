<!-- 메인 틀 -->
<div id="base" class="flex duration-200 bg-[#3f3f3f] text-gray-50 w-full relative">

    <!-- 메인 -->
    <div class="md:mb-20 w-full p-5 flex flex-col gap-5">

      <!-- 계정 정보가 일치하지 않을시 -->
      <div id='error_form' class="duration-200 hidden flex p-5 animate-pulse gap-3 border bg-red-500 w-full opacity-80 rounded">
        <span class="material-symbols-outlined">error</span>
        <p id='error_txt' class=""><?= validation_errors(); ?></p>
      </div>

      <div class="bg-[#2f2f2f] p-5 flex flex-col gap-5 border border-gray-500 rounded">
        
        <div class="">
          <p>글쓰기</p>
        </div>

        <!-- 구분선 -->
        <div class="border-b border-gray-500"></div>
        
        <div class="flex flex-col gap-5">

          <!-- <form class="flex flex-col gap-5" action="/free_board_create/create" method="post"> -->
          <form class="flex flex-col gap-5" action="" method="post">
            
            <!-- 게시판 선택 및 제목 -->
            <div class="bg-[#2f2f2f] flex gap-5">
    
              <!-- 셀렉터 -->
              <div class="w-[30%]">
                <!-- <label for="lang">Language</label> -->
                <select id='post_type' name='post_type' name="board_type" id="lang" required class="outline-none w-full text-whith rounded bg-[#4f4f4f] p-3">
                  <option class="hidden" value="" disabled selected>게시판 선택</option>
                  <option value="공지사항">공지사항</option>
                  <option value="자유게시판">자유게시판</option>
                  <option value="가입인사">가입인사</option>
                </select>
                <!-- <input type="submit" value="Submit" /> -->
              </div>
    
              <!-- 제목입력 -->
              <div class="w-[70%]">
                <input id='post_title' name='post_title' class="w-full outline-none text-whith rounded bg-[#4f4f4f] p-3" required name="title" type="text" placeholder="제목을 입력해주세요"/>
              </div>
    
            </div>

            <!-- 게시글 내용 작성 -->
            <textarea id='post_value' name='post_value' class="outline-none bg-[#4f4f4f] w-full p-3" required name="contents" id="" cols="30" rows="10"></textarea>

            <!-- 공개/비공개 -->
            <div class="flex gap-3">
              <div class="flex flex-col gap-2 w-full">
                <h2>게시글 공개</h2>
                <div class="flex gap-2 w-full">
                  <div class="p-3 w-full rounded bg-[#4f4f4f]">
                    <input id="1_a" name='post_open' checked value='1' type="radio">
                    <label for="1_a">공개</label>
                  </div>
                  <div class="p-3 w-full rounded bg-[#4f4f4f]">
                    <input id="2_a" name='post_open' value='0' type="radio">
                    <label for="2_a">비공개</label>
                  </div>
                </div>
              </div>
              <div class="flex flex-col gap-2 w-full">
              <h2>댓글 작성</h2>
              <div class="flex gap-2 w-full">
                <div class="p-3 w-full rounded bg-[#4f4f4f]">
                  <input id="1_b" name='comment_open' value="1" checked type="radio">
                  <label for="1_b">허용</label>
                </div>
                <div class="p-3 w-full rounded bg-[#4f4f4f]">
                  <input id="2_b" name='comment_open' value="0" type="radio">
                  <label for="2_b">비허용</label>
                </div>
              </div>
            </div>
            </div>

            <!-- 첨부파일 -->
            <form action="/free_board_create_c/upload_file2" method="post" enctype="multipart/form-data">
              <input type="file" name="userfile" />
              <input type="submit" value="업로드" />
            </form>
            
            <!-- 구분선 -->
            <div class="border-b border-gray-500"></div>

            <!-- 게시글 등록 -->
            <div class="w-full text-right">
              <button id='create_btn' name='create_btn' class="p-3 w-[400px] rounded bg-blue-500 duration-200 hover:opacity-80">
                게시글 등록
              </button>
              <!-- <input type="submit" class="p-3 w-[400px] rounded bg-blue-500 duration-200 hover:opacity-80" value="게시글 등록"></input> -->
            </div>

          </form>

        </div>

      </div>
      
    </div>
    <!-- 메인끝 -->

</div>

<script src="/javascript/board/board_create.js"></script>