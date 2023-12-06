<!-- 에디터 -->
<!-- Toast UI Editor의 스타일시트 -->
<link rel="stylesheet" href="https://uicdn.toast.com/editor/latest/toastui-editor.min.css" />
<link rel="stylesheet" href="/assets/toast_dark_theme.css">
<!-- Toast UI Editor의 JavaScript -->
<script src="https://uicdn.toast.com/editor/latest/toastui-editor-all.min.js"></script>

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
        <p>게시글 수정하기</p>
        <input id="bd_id" name="bd_id" type="number" hidden value="<?= $post->idx ?>">
      </div>

      <!-- 구분선 -->
      <div class="border-b border-gray-500"></div>
      
      <div class="flex flex-col gap-5">

        <!-- <form class="flex flex-col gap-5" action="/free_board_create/create" method="post"> -->
        <form class="flex flex-col gap-5" action="/free_board_create_c/create" method="post">
          
          <!-- 게시판 선택 및 제목 -->
          <div class="bg-[#2f2f2f] flex gap-5">
  
            <!-- 셀렉터 -->
            <div class="w-[30%]">
              <!-- <label for="lang">Language</label> -->
              <select id='post_type' name='post_type' id="lang" required class="outline-none w-full text-whith rounded bg-[#4f4f4f] p-3">
                <option class="hidden" selected><?= ($post->board_type == 'freeboard' ? '자유게시판' : '') ?></option>
                <option value="notice">공지사항</option>
                <option value="freeboard">자유게시판</option>
                <option value="hellow">가입인사</option>
              </select>
            </div>
  
            <!-- 제목입력 -->
            <div class="w-[70%]">
              <input id='post_title' name='post_title' value="<?= $post->title ?>" class="w-full outline-none text-whith rounded bg-[#4f4f4f] p-3" required name="title" type="text" placeholder="제목을 입력해주세요"/>
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
                  <input id="1_a" type="radio" value="1" checked name="post_open" class="hidden peer">
                  <label for="1_a" class="duration-200 w-full py-4 font-medium border-2 rounded border-[#4f4f4f] ps-5 peer-checked:text-white peer-checked:border-[#4f4f4f] peer-checked:bg-[#1f1f1f]">
                    <div class="flex gap-1 place-items-center">
                      <span class="material-symbols-outlined text-[#4f4f4f]">
                        check_small
                      </span>
                      <p class="">
                        공개
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
                  <input id="1_b" type="radio" value="1" checked name="comment_open" class="hidden peer">
                  <label for="1_b" class="duration-200 w-full py-4 font-medium border-2 rounded border-[#4f4f4f] ps-5 peer-checked:text-white peer-checked:border-[#4f4f4f] peer-checked:bg-[#1f1f1f]">
                    <div class="flex gap-1 place-items-center">
                      <span class="material-symbols-outlined text-[#4f4f4f]">
                        check_small
                      </span>
                      <p class="">
                        공개
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
                        비공개
                      </p>
                    </div>
                  </label>
                </div>

              </div>

            </div>
          </div>

          <!-- 첨부파일 미리보기 -->
          <div id="preview" class="w-full grid grid-cols-5 place-items-center border border-[#4f4f4f] justify-center gap-3 duration-200 min-h-[208px] bg-[#3f3f3f] rounded p-3">
          </div>

          <!-- 첨부파일 -->
          <div id="file_control" class="flex place-items-center justify-center w-full">
            <label for="userfile" class="flex flex-col items-center w-full justify-center h-52 border-2 border-gray-500 border-dashed rounded-lg cursor-pointer hover:bg-[#2f2f2f] duration-200 bg-[#3f3f3f]">
              <div class="flex gap-3 place-items-center justify-center">
                <span class="material-symbols-outlined flex gap-2 place-items-center">
                  add_link
                </span>
                <p class="text-sm text-gray-500 dark:text-gray-300">파일을 첨부하려면 클릭하세요</p>
                <!-- <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p> -->
              </div>
              <input name="userfile[]" id="userfile" multiple type="file" class="hidden" />
            </label>
          </div>

          <!-- 구분선 -->
          <div class="border-b border-gray-500"></div>

          <!-- 게시글 수정 -->
          <div class="w-full text-right">
            <button id='create_btn' name='create_btn' class="p-3 w-[400px] rounded bg-blue-500 duration-200 hover:opacity-80">
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
var existingFiles = <?= json_encode($file); ?>;
</script>

<script>
// ajax 게시글 등록
$(document).ready( () => {

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

  // 첨부파일 미리보기
  var selectedFiles = [];
  let editorInstance;
  
  $('#create_btn').click( e => {
    
    e.preventDefault();

    const formData = new FormData();
    formData.append('idx', $('#bd_id').val());
    formData.append('post_type', $('#post_type').val());
    formData.append('post_title', $('#post_title').val());
    formData.append('post_value', editor.getHTML());
    // formData.append('post_value', editor.getMarkdown());
    formData.append('post_open', $('input[name="post_open"]:checked').val());
    formData.append('comment_open', $('input[name="comment_open"]:checked').val());

    // 이미지 파일이 있으면 formData에 추가
    const fileInput = $('input[type="file"]')[0];
    if (fileInput.files.length > 0) {
      if(fileInput.length > 5) {
          alert('파일은 최대 5개까지 업로드 가능합니다.');
          return;
        } else {
          for (const file of selectedFiles) {
            formData.append('userfile[]', file);
          }
        }
    } else {
      console.log("파일 입력 필드를 찾을 수 없습니다.");
    }
    // console.log(fileInput.length);
    // return alert(fileInput.files.length);

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
          return console.log('게시글 수정 성공: ', response);
          location.href = '/freeboard/' + $('#bd_id').val();
        } else {
          alert('게시글 수정 실패: ' + response.message);
        }
      },
      error: () => {
        alert('게시글 수정 중 서버 오류가 발생했습니다.');
      }
    });
  });

  existingFiles.forEach(function(fileItem, index) {
    // 미리보기 생성 로직
    createFilePreview(fileItem, index);
  });

  function createFilePreview(fileItem, index) {
    var previewContainer = document.getElementById('preview');
    var div = document.createElement('div');
    div.classList.add('preview-item');
    div.setAttribute('data-index', index);
    div.innerHTML = `
      <div class="flex gap-3">
        <div class="relative">
          <img src="/uploads/${fileItem.file_name}" class="w-40 h-40 border border-gray-500 rounded duration-200 hover:scale-95 hover:rounded-none" />
          <button class="remove-btn existing-file-btn rounded-[50%] absolute top-2 duration-200 w-8 h-8 flex justify-center place-items-center right-2 p-2 bg-[#1f1f1f] hover:bg-red-500" data-file-id="${fileItem.id}">
            <span class="material-symbols-outlined">
              close
            </span>
          </button>
        </div>
      </div>
    `;

    previewContainer.appendChild(div);

    // 이벤트 리스너 추가: 서버에서 파일 삭제
    div.querySelector('.remove-btn').addEventListener('click', function() {
      // 여기에 파일 삭제 로직 추가
    });

    // selectedFiles 배열에 파일 추가
    selectedFiles.push(fileItem);
  }

  $(document).on('click', '.existing-file-btn', function(e) {
    e.preventDefault();

  var fileId = $(this).data('file-id');
  var div = this.parentElement.parentElement;
  var index = parseInt(div.getAttribute('data-index'));

  // AJAX를 통해 서버에 파일 삭제 요청
  $.ajax({
    // url: '/free_board_update_c/file_delete/' + fileId,
    url: '/free_board_update_c/file_delete',
    type: 'POST',
    data: { id: fileId },
    dataType: 'json',
    success: function(response) {
      // 파일 삭제 성공 시
      if (response.state) {
        div.remove();
        selectedFiles.splice(index, 1); // selectedFiles 배열에서 제거
        updateFileIndexes(); // 인덱스 업데이트
        console.log(fileId);
        return console.log('파일 삭제 성공: ', response);
      } else {
        alert('파일 삭제 실패: ' + response.message);
      }
    },
    error: function() {
      alert('파일 삭제 중 오류 발생');
    }
  });

});

function updateFileIndexes() {
  document.querySelectorAll('.preview-item').forEach((item, index) => {
    item.setAttribute('data-index', index);
  });
}


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
            <img src="${e.target.result}" class="w-40 h-40 border border-gray-500 rounded duration-200 hover:scale-95 hover:rounded-none" />
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

      });

      preview.appendChild(div);
    };
    reader.readAsDataURL(file);
  }
});

function updateFileIndexes() {
  document.querySelectorAll('.preview-item').forEach((item, index) => {
    item.setAttribute('data-index', index);
  });
}

});

</script>