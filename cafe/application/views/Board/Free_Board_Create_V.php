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
        <form class="flex flex-col gap-5" action="/free_board_create_c/create" method="post" enctype="multipart/form-data">
          
          <!-- 게시판 선택 및 제목 -->
          <div class="bg-[#2f2f2f] flex gap-5">
  
            <!-- 셀렉터 -->
            <div class="w-[30%]">
              <!-- <label for="lang">Language</label> -->
              <select id='post_type' name='post_type' id="lang" required class="outline-none w-full text-whith rounded bg-[#4f4f4f] p-3">
                <option class="hidden" value="" disabled selected>게시판 선택</option>
                <option value="공지사항">공지사항</option>
                <option value="자유게시판">자유게시판</option>
                <option value="가입인사">가입인사</option>
              </select>
              <!-- <input type="submit" value="Submit" /> -->
            </div>
  
            <!-- 제목입력 -->
            <div class="w-[70%]">
              <input id='post_title' name='post_title' required type="text" placeholder="제목을 입력해주세요" class="w-full outline-none text-whith rounded bg-[#4f4f4f] p-3"/>
            </div>
  
          </div>

          <!-- 게시글 내용 작성 -->
          <!-- <textarea id='post_value' name='post_value' class="outline-none bg-[#4f4f4f] w-full p-3" required name="contents" id="" cols="30" rows="10"></textarea> -->
          <div id="editor"></div>

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
          <input type="file" name="userfile" />
          
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
<!-- <script src="/javascript/board/board_create.js"></script> -->

<script>
// ajax 게시글 등록
$(document).ready( () => {

  // 토스트 UI 에디터 인스턴스 생성
  const editor = new toastui.Editor({
    el: document.querySelector('#editor'),
    height: '500px',
    initialEditType: 'wysiwyg',
    previewStyle: 'vertical',
    theme: "dark",
    hooks: {
      addImageBlobHook: (blob, callback) => {
        const formData = new FormData();
        formData.append('userfile', blob);
        $.ajax({
          url: '/free_board_create_c/upload', // 이미지를 업로드할 서버의 URL
          data: formData,
          type: 'POST',
          // dataType: 'json',
          processData: false,
          contentType: false,
          success: (data) => {
            const result = JSON.parse(data);
            if(result.state) {
              callback(result.url, '이미지 설명'); // 성공 시 에디터에 이미지 URL 삽입
            } else {
              alert('이미지 업로드 실패: ' + result.message);
            }
          },
          error: () => {
            alert('이미지 업로드 중 서버 오류가 발생했습니다.');
          }
        });
      }
    }
  });

  // 게시글 등록 버튼 클릭 이벤트
  $('#create_btn').click((e) => {
    e.preventDefault();

    const formData = new FormData();
    formData.append('post_type', $('#post_type').val());
    formData.append('post_title', $('#post_title').val());
    formData.append('post_value', editor.getMarkdown()); // 에디터의 내용을 Markdown 형식으로
    formData.append('post_open', $('input[name=post_open]:checked').val());
    formData.append('comment_open', $('input[name=comment_open]:checked').val());

    // 선택된 파일이 있으면 formData에 추가
    const fileInput = $('input[type=file]')[0];
    if (fileInput.files.length > 0) {
      formData.append('userfile', fileInput.files[0]);
    }

    // 게시글 생성 요청
    $.ajax({
      url: '/free_board_create_c/create',
      type: 'POST',
      dataType: 'json',
      data: formData,
      processData: false,
      contentType: false,
      success: (response) => {
        if (response.state) {
          alert('게시글이 성공적으로 등록되었습니다.');
          window.location.href = '/freeboard/' + response.last_id; // 성공 시 리다이렉트할 URL
        } else {
          alert('게시글 등록 실패: ' + response.message);
        }
      },
      error: () => {
        alert('게시글 등록 중 서버 오류가 발생했습니다.');
      }
    });

  });

  });

</script>