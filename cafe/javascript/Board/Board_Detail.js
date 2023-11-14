// ajax 게시글 등록
$(document).ready( () => {

  $('#like_up').click( e => {
    // 새로고침 방지
    e.preventDefault();
    console.log( '좋아요' );
    $.ajax({
      url: '/free_board_detail_c/board_like',
      type: 'post',
      dataType: 'json',
      data: { 
        boards_idx: $('#bd_id').val(),
        like_type: '1',
      },
      success: response => {
        if(response.state) {
          console.log(response);
          // location.reload();
        } else {
          console.log(response);
          $('#error_txt').text(response.message); // 에러 메시지 출력
        }
      },
      error: ( response, s, e ) => {
        console.log('에러', response, s, e);
      }
    });
  });
  
});

// 댓글 등록시 댓글 화면으로 이동 (구분선쪽)
  // window.location = window.location.href.split('#')[0] + '#comments';

  // 댓글등록 ajax
  // 문서 준비가 끝나면 실행
  // $(document).ready(function() {
  //   // 댓글 폼 제출 이벤트 핸들러
  //   $('#test').on('submit', function(e) {
  //     e.preventDefault(); // 기본 제출 이벤트 방지

  //     // AJAX 요청
  //     $.ajax({
  //       url: '/free_board_detail/comment_create', // 댓글 생성 URL
  //       type: 'POST',
  //       data: $(this).serialize(), // 폼 데이터 직렬화
  //       success: function(response) {
  //         // 성공 시 UI 업데이트
  //         console.log('댓글이 추가되었습니다.');
  //         location.reload();
  //         // 댓글 리스트에 새 댓글을 추가하는 코드
  //         },
  //       error: function(xhr, status, error) {
  //         // 에러 처리
  //         console.error('댓글 추가에 실패했습니다.');
  //       }
  //       });
  //     });
  // });

  function reply_btn(num) {
    let reply = document.getElementById('reply_onoff' + num);
    document.getElementById('reply_onoff' + num).classList.remove('hidden');
    if (reply.getElementById === 'open') {
      reply.getElementById = 'close';
      document.getElementById('reply_onoff' + num).classList.remove('inline');
      document.getElementById('reply_onoff' + num).className += ' hidden';
    } else {
      reply.getElementById = 'open';

      document.getElementById('reply_onoff' + num).className += ' inline';
    }
  }