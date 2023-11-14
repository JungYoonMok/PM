// ajax 게시글 등록
$(document).ready( () => {

  $('#create_btn').click( e => {

    // 새로고침 방지
    e.preventDefault();
    
    // console.log($('input[name=post_open]:checked').val());
    // console.log($('input[name=comment_open]:checked').val());

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

    if(!$('#post_value').val()){ // 게시글 내용 검사
      // 클래스 제거
      $('#error_form').removeClass('hidden'); 

      $('#error_txt').text('게시판의 내용을 입력해주세요.');
      return; // 함수 실행 중지
    }

    $.ajax({
      url: '/free_board_create_C/create',
      type: 'post',
      dataType: 'json',
      data: { 
        post_type: $('#post_type').val(),
        post_title: $('#post_title').val(),
        post_value: $('#post_value').val(),
        post_open: $('input[name=post_open]:checked').val(),
        comment_open: $('input[name=comment_open]:checked').val(),
      },
      success: response => {
        if(response.state) {
          console.log(response);
          // alert('게시글 작성이 완료되었습니다.');
          location.href = '/freeboard';
        } else {
          // 클래스 추가
          // $('#test').addClass('inline');
          // 클래스 제거
          $('#error_form').removeClass('hidden');

          $('#error_txt').text(response.message); // 에러 메시지 출력
        }
      },
      error: ( response, s, e ) => {
        // 클래스 제거
        $('#error_form').removeClass('hidden');
        console.log('에러', response, s, e);
      }
    });
  });
});