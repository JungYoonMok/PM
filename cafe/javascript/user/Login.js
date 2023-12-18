// 로그인
$(document).ready( () => {

  $('.remove-btn').on('click', e => {
    e.preventDefault();
    $('#error_txt').empty();
    $('#error_form').addClass('hidden');
  });

  $('#loginForm').on('submit', e => {
    e.preventDefault();
    $('#error_txt').empty();
    $('#error_form').removeClass('hidden');

    if($('#user_id').val() === '') {
      $('#error_txt').text('아이디를 입력해주세요.');
      return;
    }

    if($('#user_id').val().length < 4 || $('#user_id').val().length > 10) {
      $('#error_txt').text('아이디는 4~10글자로 입력해주세요.');
      return;
    }

    if($('#user_pw').val() === '') {
      $('#error_txt').text('비밀번호를 입력해주세요.');
      return;
    }

    if($('#user_pw').val().length < 6 || $('#user_pw').val().length > 20) {
      $('#error_txt').text('비밀번호는 6~20자 입력해주세요.');
      return;
    }
    
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