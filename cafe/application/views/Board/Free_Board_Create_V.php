<!-- Toast UI Editor의 스타일시트 -->
<link rel="stylesheet" href="https://uicdn.toast.com/editor/latest/toastui-editor.min.css" />
<link rel="stylesheet" href="/assets/toast_dark_theme.css">
<!-- Toast UI Editor의 JavaScript -->
<script src="https://uicdn.toast.com/editor/latest/toastui-editor-all.min.js"></script>

<!-- 메인 틀 -->
<div id="base" class="flex duration-200 bg-[#3f3f3f] text-gray-50 w-full relative">

  <!-- 메인 -->
  <div class="md:mb-20 w-full p-1 md:p-5 flex flex-col gap-5">

    <!-- 계정 정보가 일치하지 않을시 -->
    <div id='error_form'
      class="duration-200 hidden flex p-5 animate-pulse gap-3 border bg-red-500 w-full opacity-80 rounded">
      <span class="material-symbols-outlined">error</span>
      <p id='error_txt' class="">
        <?= validation_errors(); ?>
      </p>
    </div>

    <div class="bg-[#2f2f2f] p-5 flex flex-col gap-5 border border-[#4f4f4f] shadow-2xl rounded">

      <div class="">
        <p>
          <?= $this->uri->segment(1) == 'post_create' ? '글쓰기' : '' ;?>
          <?= $this->uri->segment(1) == 'post_create_reply' ? '"'.$board->title.'" 글에 답글쓰기' : NULL?>
        </p>
      </div>

      <!-- 구분선 -->
      <div class="border-b border-gray-500"></div>

      <div class="flex flex-col gap-5">

        <form class="flex flex-col gap-5" action="<?= $this->uri->segment(1) == 'post_create' ? '/free_board_create_c/create' : '/free_board_create_c/create_reply'?>" method="post" enctype="multipart/form-data">

          <!-- 게시판 선택 및 제목 -->
          <div class="bg-[#2f2f2f] flex flex-col md:flex-row gap-5">

            <!-- 셀렉터 -->
            <div class="w-full md:w-[40%] <?= $this->uri->segment(1) == 'post_create_reply' ? 'hidden' : '' ;?>">
              <select id='post_type' name='post_type' required value="안녕"
                class="outline-none w-full text-whith rounded bg-[#4f4f4f] p-3">
                <option class="" hidden value="안녕2" disabled selected>게시판 선택</option>
                <option value="공지사항">공지사항</option>
                <option value="자유게시판">자유게시판</option>
                <option value="가입인사">가입인사</option>
              </select>
            </div>

            <!-- 제목입력 -->
            <div class="w-full">
              <input id='post_title' name='post_title' required type="text" placeholder="제목을 입력해주세요"
                class="w-full outline-none text-whith rounded bg-[#4f4f4f] p-3" />
            </div>

          </div>

          <!-- 게시글 내용 작성 -->
          <div id="editor" class="dark-editor"></div>

          <!-- 공개/비공개 -->
          <div class="flex flex-col md:flex-row gap-3">
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
          <input type="file" name="userfile[]" id="userfile" multiple
          class="
            file:mr-4 file:py-2 file:px-4
            file:rounded-full file:border-0
            file:text-sm file:font-semibold
          file:bg-[#3f3f3f] file:text-white
          hover:file:bg-[#4f4f4f] duration-200"
          "/>

          <!-- 구분선 -->
          <div class="border-b border-gray-500"></div>

          <!-- 게시글 등록 -->
          <div class="w-full text-right">
            <button id='create_btn' name='create_btn'
              class="p-3 w-full md:w-[400px] rounded bg-blue-500 duration-200 hover:opacity-80 <?= $this->uri->segment(1) == 'post_create_reply' ? 'hidden' : ''?>">
              게시글 등록
            </button>
            <button id='create_reply_btn' name='create_reply_btn'
              class="p-3 w-full md:w-[400px] rounded bg-blue-500 duration-200 hover:opacity-80 <?= $this->uri->segment(1) == 'post_create_reply' ? '' : 'hidden'?>">
              답글 등록
            </button>

            <div class="hidden">
              <input id="board_id" name="board_id" type="number" hidden value="<?= empty($board) ? NULL : $board->idx ?>">
              <input id="board_type" name="board_type" type="text" hidden value="<?= empty($board) ? NULL : $board->board_type ?>">
              <input id="group_idx" name="group_idx" type="number" hidden value="<?= empty($board) ? NULL : $board->group_idx ?>">
              <input id="depth" name="depth" type="number" hidden value="<?= empty($board) ? NULL : $board->depth ?>">
            </div>

          </div>

        </form>

      </div>

    </div>

  </div>
  <!-- 메인끝 -->

</div>
<!-- <script src="/javascript/board/board_create.js"></script> -->

<script>
  
  let editor;

  $(document).ready(() => {
    

    // 토스트 UI 에디터 인스턴스 생성
    editor = new toastui.Editor({
    el: document.querySelector('#editor'),
    height: '500px',
    // initialEditType: 'markdown',
    initialEditType: 'wysiwyg',
    previewStyle: 'vertical',
    usageStatistics: false,
    theme: 'dark',
    language: 'ko',
    initialValue: '',
    hooks: {
      addImageBlobHook: (blob, callback) => {
        const formData = new FormData();
        formData.append('image', blob);
        $.ajax({
          url: '/free_board_create_c/upload_image', // 이미지를 업로드할 서버의 URL
          data: formData,
          type: 'POST',
          processData: false,
          contentType: false,
          success: (response) => {
            const result = JSON.parse(response);
            if(result.state) {
              console.log('성공', response);
              callback(result.url, result.blob ?? '이미지 설명 없음'); // 성공 시 에디터에 이미지 URL 삽입
            } else {
              alert('이미지 업로드 실패: ' + result.message);
            }
          }, error: () => {
            alert('이미지 업로드 중 서버 오류가 발생했습니다.');
          }
        });
      }
    }
  });

  $('#create_btn').click((e) => { // 게시글 등록
    e.preventDefault();

    const formData = new FormData();
    formData.append('post_type', $('#post_type').val());
    formData.append('post_title', $('#post_title').val());
    formData.append('post_value', editor.getHTML());
    // formData.append('post_value', editor.getMarkdown());
    formData.append('post_open', $('input[name="post_open"]:checked').val());
    formData.append('comment_open', $('input[name="comment_open"]:checked').val());

    // 파일 입력 필드 검증
    const fileInput = $('#userfile')[0];
    console.log('디버깅: ', fileInput); // 디버깅을 위한 로그
    
    if (fileInput && fileInput.files.length > 0) {
      // 파일 처리 로직
      if (fileInput.files.length > 0) {
        for (const file of fileInput.files) {
          formData.append('userfile[]', file);
        }
      }
    } else {
      console.log("파일 입력 필드를 찾을 수 없습니다.");
    }
    
    // AJAX 요청으로 게시글 생성 및 이미지 업로드 처리
    $.ajax({
      url: '/free_board_create_c/create',
      type: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      dataType: 'json',
      success: (response) => {
        if (response.state) {
          // location.href = '/freeboard/' + response.last_id;
          location.href = '/freeboard/list';
          console.log('성공: ', response);
        } else {
          alert('게시글 등록 실패: ' + response.message);
          console.log('실패: ', response);
        }
      }, error: () => {
        alert('게시글 등록 중 서버 오류가 발생했습니다.');
        console.log('오류: ', response);
      }
    });
  });

  $('#create_reply_btn').click((e) => { // 답글 등록
    e.preventDefault();

    const formData = new FormData();
    formData.append('board_id', $('#board_id').val());
    formData.append('group_idx', $('#group_idx').val());
    formData.append('group_order', $('#group_order').val());
    formData.append('depth', $('#depth').val());
    formData.append('post_type_reply', $('#board_type').val());
    formData.append('post_title', $('#post_title').val());
    formData.append('post_value', editor.getHTML());
    // formData.append('post_value', editor.getMarkdown());
    formData.append('post_open', $('input[name="post_open"]:checked').val());
    formData.append('comment_open', $('input[name="comment_open"]:checked').val());

    const fileInput = $('#userfile')[0];
    if (fileInput.files.length > 0) {
      for (const file of fileInput.files) {
        formData.append('userfile[]', file);
      }
    }

    // AJAX 요청으로 게시글 생성 및 이미지 업로드 처리
    $.ajax({
      url: '/free_board_create_c/create_reply',
      type: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      dataType: 'json',
      success: (response) => {
        if (response.state) {
          // location.href = '/freeboard/' + response.last_id;
          location.href = '/freeboard/list';
          console.log('성공: ', response);
        } else {
          alert('게시글 답글 등록 실패: ' + response.message);
        }
      }, error: () => {
        alert('게시글 답글 등록 중 서버 오류가 발생했습니다.');
      }
    });
  });
  
});

</script>