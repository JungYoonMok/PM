<!-- 에디터 -->
<!-- Toast UI Editor의 스타일시트 -->
<link rel="stylesheet" href="https://uicdn.toast.com/editor/latest/toastui-editor.min.css" />
<link rel="stylesheet" href="/assets/toast_dark_theme.css">
<!-- Toast UI Editor의 JavaScript -->
<script src="https://uicdn.toast.com/editor/latest/toastui-editor-all.min.js"></script>

<!-- 메인 틀 -->
<div id="base" class="flex duration-200 bg-[#3f3f3f] text-gray-50 w-full relative">

  <!-- 메인 -->
  <div class="md:mb-20 w-full p-1 md:p-5 flex flex-col gap-5">

    <div class="bg-[#2f2f2f] p-5 flex flex-col gap-5 border border-gray-500 rounded">
      
      <div class="">
        <div class="flex gap-3">
          <p>"<?= htmlspecialchars($post->title) ?>"</p>
          <p>수정하기 🪄</p>
        </div>
        <input id="bd_id" name="bd_id" type="number" hidden value="<?= $post->idx ?>">
      </div>

      <!-- 구분선 -->
      <div class="border-b border-gray-500"></div>
      
      <div class="flex flex-col gap-5">

        <!-- <form class="flex flex-col gap-5" action="/free_board_create/create" method="post"> -->
        <form class="flex flex-col gap-5" action="/free_board_create_c/create" method="post">
          
          <!-- 게시판 선택 및 제목 -->
          <div class="bg-[#2f2f2f] flex flex-col md:flex-row gap-5">
  
            <!-- 셀렉터 -->
            <div class="w-full md:w-[30%]">
              <!-- <label for="lang">Language</label> -->
              <input id="board_type" hidden value="<?= $post->board_type ?>" type="text">
              <select id='post_type' name='post_type' required class="outline-none w-full text-whith rounded bg-[#4f4f4f] p-3">
                <option class="hidden">
                  <?= $post->board_type == 'notice' ? '공지사항' : '' ?>
                  <?= $post->board_type == 'freeboard' ? '자유게시판' : '' ?>
                  <?= $post->board_type == 'hellow' ? '가입인사' : '' ?>
                </option>
                <option value="notice" class="<?= $this->session->userdata('user_id') == 'admin' ? '' : 'hidden' ?>">
                  공지사항
                </option>
                <option value="freeboard">자유게시판</option>
                <option value="hellow">가입인사</option>
              </select>
            </div>
  
            <!-- 제목입력 -->
            <div class="w-full md:w-[70%]">
              <input id='post_title' name='post_title' value="<?= htmlspecialchars($post->title) ?>" class="w-full outline-none text-whith rounded bg-[#4f4f4f] p-3" required name="title" type="text" placeholder="제목을 입력해주세요"/>
            </div>
  
          </div>

          <!-- 게시글 내용 작성 -->
          <div id="editor"></div>

          <!-- 공개/비공개 -->
          <div class="flex flex-col md:flex-row gap-3">
            <div class="flex flex-col gap-2 w-full">
              <h2>게시글 공개</h2>
              
              <div class="flex gap-3">
                <div class="w-full flex">
                  <input id="1_a" type="radio" value="1" <?= $post->board_state ? 'checked' : ''?> name="post_open" class="hidden peer">
                  <label for="1_a" class="duration-200 w-full py-4 font-medium border rounded peer-checked:border-yellow-500 ps-5 peer-checked:shadow-2xl peer-checked:text-yellow-500 text-[#9f9f9f] border-[#1f1f1f] bg-[#1f1f1f]">
                    <div class="flex gap-1 place-items-center">
                      <span class="material-symbols-outlined">
                        check_small
                      </span>
                      <p class="">
                        공개
                      </p>
                    </div>
                  </label>
                </div>
                <div class="w-full flex">
                  <input id="2_a" type="radio" value="0" <?= !$post->board_state ? 'checked' : ''?> name="post_open" class="hidden peer">
                  <label for="2_a" class="duration-200 w-full py-4 font-medium border rounded peer-checked:border-yellow-500 ps-5 peer-checked:shadow-2xl peer-checked:text-yellow-500 text-[#9f9f9f] border-[#1f1f1f] bg-[#1f1f1f]">
                    <div class="flex gap-1 place-items-center">
                      <span class="material-symbols-outlined">
                        check_small
                      </span>
                      <p class="">
                        비공개
                      </p>
                    </div>
                  </label>
                </div>
              </div>

            </div>
            <div class="flex flex-col gap-2 w-full">
              <h2>댓글 작성</h2>
              
              <div class="flex gap-3">

                <div class="flex w-full">
                  <input id="1_b" type="radio" value="1" <?= $post->board_comment ? 'checked' : ''?> name="comment_open" class="hidden peer">
                  <label for="1_b" class="duration-200 w-full py-4 font-medium border rounded peer-checked:border-yellow-500 ps-5 peer-checked:shadow-2xl peer-checked:text-yellow-500 text-[#9f9f9f] border-[#1f1f1f] bg-[#1f1f1f]">
                    <div class="flex gap-1 place-items-center">
                      <span class="material-symbols-outlined">
                        check_small
                      </span>
                      <p class="">
                        공개
                      </p>
                    </div>
                  </label>
                </div>

                <div class="flex w-full">
                  <input id="2_b" type="radio" value="0" <?= !$post->board_comment ? 'checked' : ''?> name="comment_open" class="hidden peer">
                  <label for="2_b" class="duration-200 w-full py-4 font-medium border rounded peer-checked:border-yellow-500 ps-5 peer-checked:shadow-2xl peer-checked:text-yellow-500 text-[#9f9f9f] border-[#1f1f1f] bg-[#1f1f1f]">
                    <div class="flex gap-1 place-items-center">
                      <span class="material-symbols-outlined">
                        check_small
                      </span>
                      <p class="">
                        비공개
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
            <div id="preview" class="shadow-xl w-full grid grid-cols-3 md:grid-cols-5 md:flex md:flex-wrap place-items-center border border-[#4f4f4f] justify-center gap-3 duration-200 min-h-[208px] bg-[#3f3f3f] rounded p-3">
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

          <!-- 정보가 일치하지 않을시 -->
          <div id='error_form' class="relative duration-200 animate-bounce shadow-xl hidden flex p-5 gap-3 border border-[#4f4f4f] bg-[#1f1f1f] w-full rounded">
            <span class="material-symbols-outlined duration-200 animate-pulse text-red-400">
              error
            </span>
            <p id='error_txt'>
              <?= validation_errors(); ?>
            </p>
            <button class="remove-btn hover:scale-125 rounded-[50%] absolute top-2 duration-200 w-5 h-5 flex justify-center place-items-center right-2 p-1 bg-[#1f1f1f] hover:bg-red-500">
              <span class="material-symbols-outlined text-[20px]">
                close
              </span>
            </button>
          </div>

          <!-- 게시글 수정 -->
          <div class="w-full text-right">
            <button id='create_btn' name='create_btn' class="p-3 w-full md:w-[400px] rounded bg-blue-500 duration-200 hover:opacity-80">
              게시글 수정
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
  // 첨부파일 미리보기
  let selectedFiles = [];
  let editorInstance;
  let existingFiles = <?= json_encode($file); ?>;

// ajax 게시글 등록
$(document).ready( () => {

  // 게시판 타입 변경 체크
  // document.getElementById('post_type').addEventListener('change', function(e) {
  //   console.log(e.target.value);
  //   $('#post_type').val() == e.target.value;
  // });

  // 첨부파일 미리보기 div의 가시성 설정
  updateFilePreviewVisibility();

  // 토스트 UI 에디터 인스턴스 생성
  editor = new toastui.Editor({
    el: document.querySelector('#editor'),
    height: '700px',
    initialEditType: 'wysiwyg',
    previewStyle: 'vertical',
    usageStatistics: false,
    theme: 'dark',
    initialValue: '<?= $post->content ?>',
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
            console.log('에디터', response);
            const result = JSON.parse(response);
            if(result.state) {
              callback(result.url, result.blob ?? '이미지 설명 없음'); // 성공 시 에디터에 이미지 URL 삽입
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

  function updateFileIndexes() {
    document.querySelectorAll('.preview-item').forEach((item, index) => {
      item.setAttribute('data-index', index); // 미리보기 아이템 인덱스 업데이트
    });
  }

  $('#create_btn').click( e => {
    
    e.preventDefault();

    $('#error_txt').empty(); // 에러 메시지 초기화
    $('#error_form').removeClass('hidden');
    
    if($('#post_type').val() == null) { // 게시글 타입
      $('#error_txt').text('게시판을 선택해주세요.');
      return;
    }

    if($('#post_title').val().length < 2 || $('#post_title').val().length > 50 ) { // 게시글 제목
      $('#error_txt').text('게시판 제목은 2~50자 이내로 입력해주세요.');
      return;
    }

    if(editor.getHTML().length < 20) { // 게시글 내용
      $('#error_txt').text('게시판 내용은 10자 이상 작성해주세요.');
      return;
    }

    if(editor.getHTML().length > 10000 ) { // 게시글 내용
      $('#error_txt').text('게시판 내용은 10000자 이상 입력할 수 없습니다.');
      return;
    }

    const formData = new FormData();
    formData.append('idx', $('#bd_id').val());
    formData.append('post_type', $('#post_type').val());
    formData.append('post_title', $('#post_title').val());
    formData.append('post_value', editor.getHTML());
    // formData.append('post_value', editor.getMarkdown());
    formData.append('post_open', $('input[name="post_open"]:checked').val());
    formData.append('comment_open', $('input[name="comment_open"]:checked').val());

    formData.append('old_file', existingFiles.length);

    // 어드민만 공지사항 사용
    if($('#post_type').val() == 'notice') {
      if('<?= $this->session->userdata('user_id') ?>' != 'admin') {
        $('#error_txt').text('관리자만 공지사항을 사용할 수 있습니다.');
        return;
      }
    }

    const fileInput = $('input[type="file"]')[0];
    // 이미지 파일이 있으면 formData에 추가

    // console.log('추가 ', 'selectedFiles', selectedFiles.length);
    // console.log('기존 ', 'existingFiles', existingFiles.length);
    // console.log('크리에이트 버튼', 'fileInput', fileInput.files.length);

    if(selectedFiles.length + existingFiles.length > 5) {
      alert('파일은 최대 5개까지 업로드 가능합니다.');
      return;
    }

    if (fileInput.files.length > 0) {
      for (const file of selectedFiles) {
        formData.append('userfile[]', file);
      }
    }

    // AJAX 요청으로 게시글 생성 및 이미지 업로드 처리
    $.ajax({
      url: '/free_board_update_c/post_update',
      type: 'POST',
      data: formData,
      processData: false,
      contentType: false,
      dataType: 'json',
      success: (response) => {
        if (response.state) {
          $('#error_form').addClass('hidden');
          location.href = '/' + $('#board_type').val() +'/' + $('#bd_id').val();
        } else {
          $('#error_txt').append(response.message);
        }
      },
      error: () => {
        alert('게시글 수정 중 서버 오류가 발생했습니다.');
      }
    });
  });

  function createFilePreview(file, index, isExistingFile) {
    var previewContainer = document.getElementById('preview');
    var div = document.createElement('div');
    div.classList.add('preview-item');
    div.setAttribute('data-index', index);

    // 파일 미리보기 HTML 구성 (기존 파일과 새 파일에 따라 다를 수 있음)
    if (isExistingFile) {
    // 기존 파일 미리보기
    
    div.innerHTML = `
      <div class="gap-3">
        <div class="relative">
          <img src="/uploads/${file.file_name}" class="w-32 h-32 lg:w-40 lg:h-40 border border-gray-500 rounded duration-200 hover:scale-95 hover:rounded-none" />
          <button class="remove-btn existing-file-btn rounded-[50%] absolute top-2 duration-200 w-8 h-8 flex justify-center place-items-center right-2 p-2 bg-[#1f1f1f] hover:bg-red-500" data-file-id="${file.id}" data-file-name="${file.file_name}">
            <span class="material-symbols-outlined">
              close
            </span>
          </button>
        </div>
      </div>
    `;

    // if(e.target.result.match(/image/g)) {
    //       div.innerHTML = `
    //         <div class="flex gap-3">
    //           <div class="relative">
    //             <img src="${e.target.result}" class="w-20 h-20 md:w-32 md:h-32 lg:w-40 lg:h-40 border border-gray-500 rounded duration-200 hover:scale-95 hover:rounded-none" />
    //             <button class="remove-btn rounded-[50%] absolute top-2 duration-200 w-8 h-8 flex justify-center place-items-center right-2 p-2 bg-[#1f1f1f] hover:bg-red-500">
    //               <span class="material-symbols-outlined">
    //                 close
    //               </span>
    //             </button>
    //           </div>
    //         </div>
    //       `;
    //     } else {
    //       div.innerHTML = `
    //         <div class="flex gap-3">
    //           <div class="relative">
    //             <span class="material-symbols-outlined flex place-items-center justify-center text-6xl w-20 h-20 md:w-32 md:h-32 lg:w-40 lg:h-40 border border-gray-500 rounded duration-200 hover:scale-95 hover:rounded-none"">
    //               description
    //             </span>
    //             <button class="remove-btn rounded-[50%] absolute top-2 duration-200 w-8 h-8 flex justify-center place-items-center right-2 p-2 bg-[#1f1f1f] hover:bg-red-500">
    //               <span class="material-symbols-outlined">
    //                 close
    //               </span>
    //             </button>
    //           </div>
    //         </div>
    //       `;
    //     }

  } else {
    // 새 파일 미리보기
    var reader = new FileReader();
    reader.onload = function(e) {

      div.innerHTML = `
        <div class="gap-3">
          <div class="relative">
            <img src="${e.target.result}" class="w-32 h-32 lg:w-40 lg:h-40 border border-gray-500 rounded duration-200 hover:scale-95 hover:rounded-none" />
            <button class="remove-btn rounded-[50%] absolute top-2 duration-200 w-8 h-8 flex justify-center place-items-center right-2 p-2 bg-[#1f1f1f] hover:bg-red-500">
              <span class="material-symbols-outlined">
                close
              </span>
            </button>
          </div>
        </div>
      `;

      // if(e.target.result.match(/image/g)) {
      //     div.innerHTML = `
      //       <div class="flex gap-3">
      //         <div class="relative">
      //           <img src="${e.target.result}" class="w-20 h-20 md:w-32 md:h-32 lg:w-40 lg:h-40 border border-gray-500 rounded duration-200 hover:scale-95 hover:rounded-none" />
      //           <button class="remove-btn rounded-[50%] absolute top-2 duration-200 w-8 h-8 flex justify-center place-items-center right-2 p-2 bg-[#1f1f1f] hover:bg-red-500">
      //             <span class="material-symbols-outlined">
      //               close
      //             </span>
      //           </button>
      //         </div>
      //       </div>
      //     `;
      //   } else {
      //     div.innerHTML = `
      //       <div class="flex gap-3">
      //         <div class="relative">
      //           <span class="material-symbols-outlined flex place-items-center justify-center text-6xl w-20 h-20 md:w-32 md:h-32 lg:w-40 lg:h-40 border border-gray-500 rounded duration-200 hover:scale-95 hover:rounded-none"">
      //             description
      //           </span>
      //           <button class="remove-btn rounded-[50%] absolute top-2 duration-200 w-8 h-8 flex justify-center place-items-center right-2 p-2 bg-[#1f1f1f] hover:bg-red-500">
      //             <span class="material-symbols-outlined">
      //               close
      //             </span>
      //           </button>
      //         </div>
      //       </div>
      //     `;
      //   }

    };
    reader.readAsDataURL(file);
  }

  // 삭제 버튼 이벤트 리스너
  div.querySelector('.remove-btn').addEventListener('click', function() {
    if (isExistingFile) {
      // 서버에 파일 삭제 요청
      // 성공 시 selectedFiles에서 제거 및 미리보기 아이템 제거
      div.remove();
    } else {
      // 새 파일의 경우 단순히 selectedFiles에서 제거 및 미리보기 아이템 제거
      selectedFiles.splice(index, 1);
      div.remove();
      updateFileIndexes();
    }
    // 첨부파일 미리보기 div의 가시성 설정
    updateFilePreviewVisibility();
  });

  previewContainer.appendChild(div);
}
  
  // 기존 파일 미리보기 생성
  existingFiles.forEach(function(fileItem, index) {
    createFilePreview(fileItem, index, true); // true는 기존 파일임을 나타냅니다.
  });

  // 이벤트 리스너 추가: 서버에서 파일 삭제
  $(document).on('click', '.existing-file-btn', function(e) {
    e.preventDefault();

    var fileId = $(this).data('file-id');
    var fileName = $(this).data('file-name');
    var div = this.parentElement.parentElement;
    var index = parseInt(div.getAttribute('data-index'));

    // AJAX를 통해 서버에 파일 삭제 요청
    $.ajax({
      url: '/free_board_update_c/file_delete',
      type: 'POST',
      data: { id: fileId, name: fileName },
      dataType: 'json',
      success: function(response) {
        if (response.state) {
          console.log('파일 삭제 성공: ', response);
          existingFiles.splice(index, 1);
          // div.remove();
          // updateFileIndexes();
          // 첨부파일 미리보기 div의 가시성 설정
          updateFilePreviewVisibility();
        } else {
          alert('파일 삭제 실패: ' + response.message);
        }
      },
      error: function() {
        alert('파일 삭제 중 오류 발생');
      }
    });
    // 첨부파일 미리보기 div의 가시성 설정
    updateFilePreviewVisibility();
  });

  document.getElementById('userfile').addEventListener('change', function(e) {
    var preview = document.getElementById('preview');
    // preview.innerHTML = '';
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
              <img src="${e.target.result}" class="w-20 h-20 md:w-32 md:h-32 lg:w-40 lg:h-40 border border-gray-500 rounded duration-200 hover:scale-95 hover:rounded-none" />
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
          div.remove(); // 미리보기 제거
          selectedFiles.splice(index, 1); // selectedFiles 배열에서 제거
          updateFileIndexes(); // 인덱스 업데이트
          
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
    if (existingFiles.length + selectedFiles.length > 0) {
      $("#file_preview").show(); // 파일이 있으면 보여줌
    } else {
      $("#file_preview").hide(); // 파일이 없으면 숨김
    }
  }

});

</script>