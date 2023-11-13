// ajax 회원가입
$(document).ready(function() {
  $('#registerButton').click(function (e) {

    // 새로고침 방지
    e.preventDefault();

    // 아이디 입력 검사
    if(!$('#user_id').val()){
      // 클래스 제거
      $('#error_form').removeClass('hidden'); 

      $('#error_txt').text('아이디를 입력해주세요.');
      return; // 함수 실행 중지
    }

    $.ajax({
      url: '/Register_C/register',
      type: 'post',
      dataType: 'json',
      data: { 
        user_id: $('#user_id').val(),
        password_1: $('#user_password_1').val(),
        password_2: $('#user_password_2').val(),
      },
      success: function (response) {
        if(response.state) {
          alert('환영합니다, 회원가입이 완료되었습니다!');
          location.href = '/login';
        } else {
          // 클래스 추가
          // $('#test').addClass('inline');
          // 클래스 제거
          $('#error_form').removeClass('hidden'); 

          $('#error_txt').text(response.message); // 에러 메시지 출력
        }
      },
      error: function (response, s, e) {
        // 클래스 제거
        $('#error_form').removeClass('hidden'); 
        console.log('에러', response, s, e);
      }
    });
  });
});