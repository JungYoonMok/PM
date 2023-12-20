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

      <div class="text-center py-10 rounded">
        <p class="font-[s-core5] text-xl relative">
          <?= $this->uri->segment(1) == 'post_create' ? '<p id="post_title_txt" class="absolute whitespace-nowrap font-[s-core5] text-xl duration-200">글쓰기</p>' : '' ;?>
          <?= $this->uri->segment(1) == 'post_create_reply' ? '"'.$board->title.'" 글에 답글쓰기' : NULL?>
        </p>
      </div>

      <!-- 구분선 -->
      <div class="border-b border-gray-500"></div>

      <div class="flex flex-col gap-5">

        <form class="flex flex-col gap-5" action="<?= $this->uri->segment(1) == 'post_create' ? '/free_board_create_c/create' : '/free_board_create_c/create_reply'?>" method="post" enctype="multipart/form-data">

          <!-- 게시판 선택 및 제목 -->
          <div class="flex flex-col md:flex-row gap-5">

            <!-- 셀렉터 -->
            <div class="w-full md:w-[40%] <?= $this->uri->segment(1) == 'post_create_reply' ? 'hidden' : '' ;?>">
              <select id='post_type' name='post_type' required
                class="outline-none w-full text-whith rounded bg-[#3f3f3f] border border-[#4f4f4f] p-3">
                <option class="" hidden disabled selected>게시판 선택</option>
                <option value="notice" class="<?= $this->session->userdata('user_id') == 'admin' ? '' : 'hidden' ?>">
                  공지사항
                </option>
                <option value="freeboard">자유게시판</option>
                <option value="hellow">가입인사</option>
              </select>
            </div>

            <!-- 제목입력 -->
            <div class="w-full">
              <input id='post_title' name='post_title' required type="text" placeholder="제목을 입력해주세요"
                class="w-full outline-none text-whith rounded bg-[#3f3f3f] border border-[#4f4f4f] p-3" />
            </div>

          </div>

          <!-- 게시글 내용 작성 -->
          <div id="editor" class="dark-editor"></div>

          <div class="flex flex-col md:flex-row gap-3">
            <div class="flex flex-col gap-2 w-full">
              <h2>게시글 공개 여부</h2>
              
              <div class="flex gap-3">
                <div class="w-full flex">
                  <input id="1_a" type="radio" value="1" checked name="post_open" class="hidden peer">
                  <label for="1_a" class="duration-200 w-full py-4 font-medium border-2 rounded border-[#4f4f4f] ps-5 peer-checked:text-white peer-checked:border-[#4f4f4f] peer-checked:bg-[#1f1f1f]">
                    <div class="flex gap-1 place-items-center">
                      <span class="material-symbols-outlined text-[#4f4f4f]">
                        check_small
                      </span>
                      <p class="">
                        멤버 공개
                      </p>
                    </div>
                  </label>
                </div>
                <div class="w-full flex">
                  <input id="2_a" type="radio" value="0" name="post_open" class="hidden peer">
                  <label for="2_a" class="duration-200 w-full py-4 font-medium border-2 rounded border-[#4f4f4f] ps-5 peer-checked:text-white peer-checked:border-[#4f4f4f] peer-checked:bg-[#1f1f1f]">
                    <div class="flex gap-1 place-items-center">
                      <span class="material-symbols-outlined text-[#4f4f4f]">
                        check_small
                      </span>
                      <p class="">
                        나만 보기
                      </p>
                    </div>
                  </label>
                </div>
              </div>

            </div>
            <div class="flex flex-col gap-2 w-full">
              <h2>댓글 작성 여부</h2>
              
              <div class="flex gap-3">

                <div class="flex w-full">
                  <input id="1_b" type="radio" value="1" checked name="comment_open" class="hidden peer">
                  <label for="1_b" class="duration-200 w-full py-4 font-medium border-2 rounded border-[#4f4f4f] ps-5 peer-checked:text-white peer-checked:border-[#4f4f4f] peer-checked:bg-[#1f1f1f]">
                    <div class="flex gap-1 place-items-center">
                      <span class="material-symbols-outlined text-[#4f4f4f]">
                        check_small
                      </span>
                      <p class="">
                        작성 가능
                      </p>
                    </div>
                  </label>
                </div>

                <div class="flex w-full">
                  <input id="2_b" type="radio" value="0" name="comment_open" class="hidden peer">
                  <label for="2_b" class="duration-200 w-full py-4 font-medium border-2 rounded border-[#4f4f4f] ps-5 peer-checked:text-white peer-checked:border-[#4f4f4f] peer-checked:bg-[#1f1f1f]">
                    <div class="flex gap-1 place-items-center">
                      <span class="material-symbols-outlined text-[#4f4f4f]">
                        check_small
                      </span>
                      <p class="">
                        작성 불가
                      </p>
                    </div>
                  </label>
                </div>

              </div>

            </div>
          </div>
          
          <!-- 첨부파일 미리보기 -->
          <div id="file_preview" class="flex flex-col gap-2">
            <p>첨부 파일</p>
            <div id="preview" class="shadow-xl w-full grid grid-cols-4 md:grid-cols-2 md:flex md:flex-wrap place-items-center border border-[#4f4f4f] justify-center gap-3 duration-200 min-h-[208px] bg-[#3f3f3f] rounded p-3">
            </div>
          </div>

          <!-- 첨부파일 -->
          <div id="file_control" class="flex place-items-center justify-center w-full">
            <label for="userfile" class="flex flex-col items-center w-full justify-center h-52 border-2 border-gray-500 border-dashed rounded-lg cursor-pointer hover:bg-[#2f2f2f] duration-200 bg-[#3f3f3f]">
              <div class="flex flex-col gap-3 place-items-center justify-center text-sm">
                <div class="flex place-items-center gap-3 duration-200 animate-pulse">
                  <span class="material-symbols-outlined flex gap-2 place-items-center">
                    add_link
                  </span>
                  <p class="">
                    파일을 첨부하려면 클릭하세요 (최대 5개)
                  </p>
                </div>
                <div class="flex gap-2">
                  <? $file_type = array('JPG', 'JPEG', 'PNG', 'GIF', 'TXT', 'ZIP') ?>
                  <? foreach($file_type as $list):?>
                    <p class="bg-[#4f4f4f] px-2 py-0.5 rounded border border-[#5f5f5f]">
                      <?= $list ?>
                    </p>
                  <? endforeach ?>
                </div>
              </div>
              <input name="userfile[]" id="userfile" multiple type="file" class="hidden" />
            </label>
          </div>

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

    // 첨부파일 미리보기
    var selectedFiles = [];

    // 첨부파일 미리보기 div의 가시성 설정
    updateFilePreviewVisibility();

    // 토스트 UI 에디터 인스턴스 생성
    editor = new toastui.Editor({
    el: document.querySelector('#editor'),
    height: '700px',
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
  
  document.getElementById('post_type').addEventListener('change', function(e) {
    $('#post_title_txt').text(
      e.target.value == 'notice' ? '공지사항에 글쓰기' :
      e.target.value == 'freeboard' ? '자유게시판에 글쓰기' :
      e.target.value == 'hellow' ? '가입인사에 글쓰기' : '글쓰기'
    );
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

    // 어드민만 공지사항 사용
    if($('#post_type').val() == 'notice') {
      if('<?= $this->session->userdata('user_id') ?>' != 'admin') {
        alert('관리자만 공지사항을 사용할 수 있습니다.');
        return;
      }
    }

    // 파일 입력 필드 검증
    const fileInput = $('#userfile')[0];
    
    if (fileInput && fileInput.files.length > 0) {
      // 파일 처리 로직
      if (fileInput.files.length > 0) {

        if(selectedFiles.length > 5) {
          alert('파일은 최대 5개까지 업로드 가능합니다.');
          return;
        } else {

          for (const file of selectedFiles) {
            formData.append('userfile[]', file);
          }
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
          location.href =  '/' + $('#post_type').val() + '/' + response.last_id;
          // location.href =  '/' + $('#board_type').val() + '/' + response.last_id;
        } else {
          console.log('실패: ', response);
          alert('게시글 등록 실패: ' + response.message);
        }
      }, error: function(xhr, status, error) {
        // 여기서 xhr는 XMLHttpRequest 객체, status는 문자열 상태, error는 오류
        console.log('오류: ', xhr.responseText);
        console.log('오류: ', status);
        console.log('오류: ', error);
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
      if(selectedFiles.length > 5) {
          alert('파일은 최대 5개까지 업로드 가능합니다.');
          return;
        } else {

          for (const file of selectedFiles) {
            formData.append('userfile[]', file);
          }
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
          location.href =  '/' + $('#board_type').val() + '/' + response.last_id;
        } else {
          alert('게시글 답글 등록 실패: ' + response.message);
        }
      }, error: () => {
        alert('게시글 답글 등록 중 서버 오류가 발생했습니다.');
      }
    });
  });
  
  document.getElementById('userfile').addEventListener('change', function(e) {
  var preview = document.getElementById('preview');
  preview.innerHTML = '';
  selectedFiles = [...e.target.files]; // 파일 목록 갱신

  for (let i = 0; i < e.target.files.length; i++) {
    let file = e.target.files[i];
    let reader = new FileReader();
    reader.onload = function(e) {
      let div = document.createElement('div');
      div.classList.add('preview-item');
      div.setAttribute('data-index', i); // 파일 인덱스 저장
      div.innerHTML = `
        <div class="flex gap-3">
          <div class="relative">
            <img src="${e.target.result}" class="w-20 h-20 md:w-40 md:h-40 border border-gray-500 rounded duration-200 hover:scale-95 hover:rounded-none" />
            <button class="remove-btn rounded-[50%] absolute top-2 duration-200 w-8 h-8 flex justify-center place-items-center right-2 p-2 bg-[#1f1f1f] hover:bg-red-500">
              <span class="material-symbols-outlined">
                close
              </span>
            </button>
          </div>
        </div>
      `;

      div.querySelector('.remove-btn').addEventListener('click', function() {
        let index = parseInt(div.getAttribute('data-index')); // 저장된 인덱스 사용
        selectedFiles.splice(index, 1); // 파일 목록에서 제거

        div.remove(); // 미리보기 제거
        // 인덱스 업데이트
        updateFileIndexes();

        // 첨부파일 미리보기 div의 가시성 설정
        updateFilePreviewVisibility();
      });

      preview.appendChild(div);
    };
    reader.readAsDataURL(file);
  }
  // 첨부파일 미리보기 div의 가시성 설정
  updateFilePreviewVisibility();
});

  // 파일 미리보기 div 가시성 업데이트 함수
  function updateFilePreviewVisibility() {
    if (selectedFiles && selectedFiles.length > 0) {
      $("#file_preview").show(); // 파일이 있으면 보여줌
    } else {
      $("#file_preview").hide(); // 파일이 없으면 숨김
    }
  }

function updateFileIndexes() {
  document.querySelectorAll('.preview-item').forEach((item, index) => {
    item.setAttribute('data-index', index);
  });
}
  
});

</script>