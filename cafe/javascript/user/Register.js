// ajax 회원가입
$(document).ready( function () {
  
  $('#registerButton').click( function(e) {

    e.preventDefault();
    $('#error_txt').empty(); // 에러 메시지 초기화
    $('#error_form').removeClass('hidden');
    
    if($('#user_nickname').val().length < 2 || $('#user_nickname').val().length > 8) { // 닉네임 검사
      $('#error_txt').text('닉네임은 2~8 글자로 입력해주세요.');
      return;
    }

    if($('#user_id').val().length < 4 || $('#user_id').val().length > 10) { // 아이디 검사
      $('#error_txt').text('아이디는 4~10 글자로 입력해주세요.');
      return;
    }

    if($('#user_name').val().length < 2 || $('#user_name').val().length > 20) { // 성함 검사
      $('#error_txt').text('성함은 2~20 글자로 입력해주세요.');
      return;
    }

    if($('#user_password_1').val().length < 6 || $('#user_password_1').val().length > 20) { // 비밀번호 검사
      $('#error_txt').text('비밀번호는 6~20 글자로 입력해주세요.');
      return;
    }

    if($('#user_password_2').val().length < 6 || $('#user_password_2').val().length > 20) { // 비밀번호 검사
      $('#error_txt').text('비밀번호 확인은 6~20 글자로 입력해주세요.');
      return;
    }

    if($('#user_password_1').val() !== $('#user_password_2').val()){ // 비밀번호 일치 검사
      $('#error_txt').text('비밀번호가 서로 일치하지 않습니다.');
      return;
    }

    if($('#user_phone_2').val().length < 3 || $('#user_phone_3').val().length > 4){ // 휴대폰 검사
      $('#error_txt').text('휴대폰 번호는 3~4자 입력해주세요.');
      return;
    }

    if($('#user_email').val()){ // 이메일 정규식 검사
      var regEmail = /^[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*\.[a-zA-Z]{2,3}$/;
      if (!regEmail.test($('#user_email').val())) {
        $('#error_txt').text('이메일 형식이 맞지 않습니다.');
        return false;
      } else {
        $('#error_form').addClass('hidden');
      }
    }

    $.ajax({
      url: '/Register_C/register',
      type: 'post',
      dataType: 'json',
      data: { 
        nName: $('#user_nickname').val(),
        id: $('#user_id').val(),
        name: $('#user_name').val(),
        password_1: $('#user_password_1').val(),
        password_2: $('#user_password_2').val(),
        phone_1: $('#user_phone_1').val(),
        phone_2: $('#user_phone_2').val(),
        phone_3: $('#user_phone_3').val(),
        email: $('#user_email').val(),
        memo: $('#user_memo').val(),
      },
      success: response => {
        const name = $('#user_nickname').val();
        $('#error_form').removeClass('hidden');
        if(response.state) {
          alert(name + '님 환영합니다! 회원가입이 완료되었습니다.');
          location.href = '/login';
        } else {
          $('#error_txt').text(response.detail);
        }
      },
      error: ( response, s, e ) => {
        $('#error_form').removeClass('hidden');
        console.log('에러', response, s, e);
      }
    });

  });
});