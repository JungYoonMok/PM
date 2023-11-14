// 로그인
$(document).ready( () => {
  $('#loginForm').on('submit', e => {
    e.preventDefault();
    
    if(!$('#user_id').val()){ // 아이디 검사
      // 클래스 제거
      $('#error_form').removeClass('hidden'); 

      $('#error_txt').text('아이디를 입력해주세요.');
      return; // 함수 실행 중지
    }

    if(!$('#user_pw').val()){ // 비밀번호 검사
      // 클래스 제거
      $('#error_form').removeClass('hidden'); 

      $('#error_txt').text('비밀번호를 입력해주세요.');
      return; // 함수 실행 중지
    }
    
    $.ajax({
      url: '/Login_C/login',
      type: 'post',
      dataType: 'json',
      data: { username: $('#user_id').val(), password: $('#user_pw').val() },
      success: response => {

        if (response.state) { // 로그인 성공시 메인페이지로 이동
          // 클래스 추가
          $('#error_form').addClass('hidden');
          location.href = '/';
        } else {
          // 클래스 제거
          $('#error_form').removeClass('hidden'); 
          $('#error_txt').text(response.message);
        }

      },
      error: ( response, s, e ) => {
        console.log('오류', response, s, e);
      }
    });
  });
});