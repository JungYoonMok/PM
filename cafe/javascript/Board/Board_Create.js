// ajax 게시글 등록
$(document).ready( () => {

  $('#create_btn').click( e => {

    // 새로고침 방지
    e.preventDefault();

    if(!$('#post_type').val()){ // 게시판 분류 검사
      // 클래스 제거
      $('#error_form').removeClass('hidden'); 

      $('#error_txt').text('게시판의 분류를 선택해주세요.');
      return; // 함수 실행 중지
    }

    if(!$('#post_title').val()){ // 글 제목 검사
      // 클래스 제거
      $('#error_form').removeClass('hidden'); 

      $('#error_txt').text('게시판의 제목을 입력해주세요.');
      return; // 함수 실행 중지
    }

    // if(!$('#post_value').val()){ // 게시글 내용 검사
    //   // 클래스 제거
    //   $('#error_form').removeClass('hidden'); 

    //   $('#error_txt').text('게시판의 내용을 입력해주세요.');
    //   return; // 함수 실행 중지
    // }

    let editorInstance;

    ClassicEditor
      .create(document.querySelector('#editor'))
      .then(editor => {
          editorInstance = editor; // 에디터 인스턴스 저장
      })
      .catch(error => {
          console.error(error);
      });

    $('#create_btn').click(function() {
      const editorData = editorInstance.getData(); // 에디터 데이터 가져오기
      console.log(editorData);

      $.ajax({
        url: '/free_board_create_c/create', // 컨트롤러 메소드 URL
        type: 'POST',
        data: {
          post_type: $('#post_type').val(),
          post_title: $('#post_title').val(),
          post_value: editorData,
          post_open: $('input[name=post_open]:checked').val(),
          comment_open: $('input[name=comment_open]:checked').val(),
          // 기타 폼 데이터
        },
        success: function(response) {
          // 성공 처리
        },
        error: function() {
          // 오류 처리
        }
      });
    });

  });
  
});