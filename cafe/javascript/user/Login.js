// 로그인
$(document).ready( () => {

  $('.remove-btn').on('click', e => {
    e.preventDefault();
    $('#error_txt').empty();
    $('#error_form').addClass('hidden');
  });

  $('#loginForm').on('submit', e => {
    e.preventDefault();
    
    $.ajax({
      url: '/Login_C/login',
      type: 'post',
      dataType: 'json',
      data: { 
        username: $('#user_id').val(),
        password: $('#user_pw').val(),
      },
      success: response => {

        if (response.state) { // 로그인 성공시 메인페이지로 이동
          // 클래스 추가
          $('#error_form').addClass('hidden');
          location.href = '/';
        } else {
          // 클래스 제거
          $('#error_txt').empty();
          $('#error_form').removeClass('hidden');

          $('#error_txt').append(response.detail);
        }

      },
      error: ( response, s, e ) => {
        console.log('오류', response, s, e);
      }
    });
  });
});