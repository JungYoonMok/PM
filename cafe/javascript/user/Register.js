// ajax 회원가입
$(document).ready( (e) => {
  e.preventDefault();
  
  $('#registerButton').click( e => {

    // 새로고침 방지
    e.preventDefault();
    
    if(!$('#user_nickname').val()){ // 닉네임 검사
      // 클래스 제거
      $('#error_form').removeClass('hidden'); 

      $('#error_txt').text('닉네임을 입력해주세요.');
      return; // 함수 실행 중지
    }

    if(!$('#user_id').val()){ // 아이디 검사
      // 클래스 제거
      $('#error_form').removeClass('hidden'); 

      $('#error_txt').text('아이디를 입력해주세요.');
      return; // 함수 실행 중지
    }

    if(!$('#user_name').val()){ // 이름 검사
      // 클래스 제거
      $('#error_form').removeClass('hidden'); 

      $('#error_txt').text('성함을 입력해주세요.');
      return; // 함수 실행 중지
    }

    if(!$('#user_password_1').val()){ // 비밀번호 검사
      // 클래스 제거
      $('#error_form').removeClass('hidden'); 

      $('#error_txt').text('비밀번호를 입력해주세요.');
      return; // 함수 실행 중지
    }

    if(!$('#user_password_2').val()){ // 비밀번호 확인 검사
      // 클래스 제거
      $('#error_form').removeClass('hidden'); 

      $('#error_txt').text('비밀번호 확인을 입력해주세요.');
      return; // 함수 실행 중지
    }

    if($('#user_password_1').val() !== $('#user_password_2').val()){ // 비밀번호 일치 검사
      // 클래스 제거
      $('#error_form').removeClass('hidden'); 

      $('#error_txt').text('비밀번호가 서로 일치하지 않습니다.');
      return; // 함수 실행 중지
    }

    if(!$('#user_phone_2').val() || !$('#user_phone_3').val()){ // 휴대폰 검사
      // 클래스 제거
      $('#error_form').removeClass('hidden'); 

      $('#error_txt').text('휴대폰 번호를 입력해주세요.');
      return; // 함수 실행 중지
    }

    if(!$('#user_email').val()){ // 이메일 검사
      // 클래스 제거
      $('#error_form').removeClass('hidden'); 

      $('#error_txt').text('이메일을 입력해주세요.');
      return; // 함수 실행 중지
    }

    if($('#user_email').val()){ // 이메일 정규식 검사
      // 클래스 제거
      $('#error_form').removeClass('hidden'); 

      var regEmail = /^[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*\.[a-zA-Z]{2,3}$/;
      if (!regEmail.test($('#user_email').val())) {
        // alert('이메일 형식에 맞춰주세요.');
        $('#error_txt').text('이메일 형식이 맞지 않습니다.');
        return false;
      } else {
        // 클래스 추가
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
        if(response.state) {
          alert(name + '님 환영합니다! 회원가입이 완료되었습니다.');
          location.href = '/login';
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