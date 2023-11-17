// ajax 게시글 등록
  function like_up($idx){
    if(!confirm('좋아요를 누르시겠습니까? (변경은 불가능합니다)')) {
      return;
    }
    $.ajax({
      url: '/free_board_detail_c/board_like',
      type: 'post',
      dataType: 'json',
      data: { 
        boards_idx: $idx,
        like_type: '1',
      },
      success: response => {
        if(response.state) {
          alert(response.message);
          location.reload();
        } else {
          alert(response.message);
          $('#error_txt').text(response.message); // 에러 메시지 출력
        }
      },
      error: ( response, s, e ) => {
        console.log('에러', response, s, e);
      }
    });
  };

  function like_down($idx){
    if(!confirm('싫어요를 누르시겠습니까? (변경은 불가능합니다)')) {
      return;
    }
    $.ajax({
      url: '/free_board_detail_c/board_like',
      type: 'post',
      dataType: 'json',
      data: { 
        boards_idx: $idx,
        like_type: '0',
      },
      success: response => {
        if(response.state) {
          alert(response.message);
          location.reload();
        } else {
          alert(response.message);
          $('#error_txt').text(response.message); // 에러 메시지 출력
        }
      },
      error: ( response, s, e ) => {
        console.log('에러', response, s, e);
      }
    });
  };
  
function post_delete($idx){
  if(!confirm('게시글을 삭제 하시겠습니까?')){
    return;
  }
  $.ajax({
    url: '/free_board_detail_c/post_delete',
    type: 'post',
    dataType: 'json',
    data: { 
      idx: $idx,
    },
    success: response => {
      if(response.state) {
        location.href = '/freeboard';
      } else {
        console.log(response);
        $('#error_txt').text(response.message); // 에러 메시지 출력
      }
    },
    error: ( response, s, e ) => {
      console.log('에러', response);
      console.log('에러', s);
      console.log('에러', e);
    }
  });

};

// 댓글 수정
function comment_update($idx){
  $.ajax({
    url: '/free_board_detail_c/reply_update',
    type: 'post',
    dataType: 'json',
    data: { 
      idx: $idx,
      content: $('#comment_update_value' + $idx).val(),
    },
    success: response => {
      if(response.state) {
        location.reload();
      } else {
        console.log(response);
        $('#error_txt').text(response.message); // 에러 메시지 출력
      }
    },
    error: ( response, s, e ) => {
      console.log('에러', response, s, e);
    }
  });
};

// 댓글 삭제
function comment_delete($idx){
  if(!confirm('댓글을 삭제 하시겠습니까?')) {
    return;
  }
  $.ajax({
    url: '/free_board_detail_c/reply_delete',
    type: 'post',
    dataType: 'json',
    data: { 
      idx: $idx,
    },
    success: response => {
      if(response.state) {
        location.reload();
      } else {
        console.log(response);
        $('#error_txt').text(response.message); // 에러 메시지 출력
      }
    },
    error: ( response, s, e ) => {
      console.log('에러', response, s, e);
    }
  });
};

// 댓글 신고
function comment_problem($idx){
  return alert('신고 기능은 구현 중입니다');
  $.ajax({
    url: '/free_board_detail_c/reply_problem',
    type: 'post',
    dataType: 'json',
    data: { 
      idx: $idx,
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
};

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

      $("#reply_btn" + num).html('답변 달기');
    } else {
      reply.getElementById = 'open';
      document.getElementById('reply_onoff' + num).className += ' inline';

      $("#reply_btn" + num).html('답변 취소');
    }
  }

  function reply_update(num) {
    let reply = document.getElementById('reply_update' + num);
    document.getElementById('reply_update' + num).classList.remove('hidden');
    if (reply.getElementById === 'open') {
      reply.getElementById = 'close';
      document.getElementById('reply_update' + num).classList.remove('inline');
      document.getElementById('reply_update' + num).className += ' hidden';

      // 수정 버튼 클릭시
      document.getElementById('reply_value' + num).classList.remove('hidden');
      document.getElementById('reply_btn' + num).classList.remove('hidden');
      // document.getElementById('reply_arrow' + num).classList.remove('hidden');
      document.getElementById('reply_arrow' + num).classList.remove('mt-[-248px]');
      
      $("#btn-update" + num).html('수정');

    } else {
      reply.getElementById = 'open';
      document.getElementById('reply_update' + num).className += ' inline';
      
      // 수정 버튼 클릭시
      document.getElementById('reply_value' + num).className += ' hidden';
      document.getElementById('reply_btn' + num).className += ' hidden';
      // document.getElementById('reply_arrow' + num).className += ' hidden';
      document.getElementById('reply_arrow' + num).className += ' mt-[-248px]';
      $("#btn-update" + num).html('수정 취소');

      // 수정 버튼 클릭시 답글 창 닫기
      let reply2 = document.getElementById('reply_onoff' + num);
      reply2.getElementById = 'close';
      $("#reply_btn" + num).html('답변 달기');
      document.getElementById('reply_onoff' + num).className += ' hidden';
    }
  }

// 주소복사
function CopyUrlToClipboard(){
  var dummy   = document.createElement("input");
  var text    = location.href;
  // var text    = location.href;
  
  document.body.appendChild(dummy);
  dummy.value = text;
  dummy.select();
  document.execCommand("copy");
  document.body.removeChild(dummy);
  alert('url이 복사 되었습니다.');
}