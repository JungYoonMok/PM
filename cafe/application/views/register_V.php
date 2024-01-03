<div class="bg-[#3f3f3f] flex justify-center place-content-center h-full duration-200 text-gray-50">

  <div class="md:py-10 p-1 md:p-5 md:grid md:place-items-center">

    <form id="registerForm" action="/register_C/register" method="post"
      class="bg-[#2f2f2f] py-10 border border-[#4f4f4f] w-full md:w-[600px] p-5 rounded flex flex-col gap-5 relative drop-shadow-2xl">

      <!-- 계정 정보가 일치하지 않을시 -->
      <div id='error_form' class="relative duration-200 animate-bounce shadow-xl hidden flex p-5 gap-3 border border-[#4f4f4f] bg-[#1f1f1f] w-full rounded">
        <span class="material-symbols-outlined duration-200 animate-pulse text-red-400">
          error
        </span>
        <p id='error_txt'>
          <?= validation_errors(); ?>
        </p>
        <button class="remove-btn hover:scale-125 rounded-[50%] absolute top-2 duration-200 w-5 h-5 flex justify-center place-items-center right-2 p-1 bg-[#1f1f1f] hover:bg-red-500">
          <span class="material-symbols-outlined text-[20px]">
            close
          </span>
        </button>
      </div>
      
      <!-- 프로필사진 별명 -->
      <div class="flex gap-5 place-items-center justify-center p-3 bg-[#4f4f4f] rounded">

        <!-- <div
          class="relative drop-shadow-2xl flex rounded-[50%] place-content-center border border-gray-500 h-20 w-20  bg-[#3f3f3f]">
          <img width="100%" src="https://pds.saramin.co.kr/workenv-bg/202303/09/rr8njw_y8e6-w09k06_workenv-bg.png"
            class="material-symbols-outlined rounded-[50%] text-5xl w-full h-full border border-gray-500">
          </img>
          <div class="absolute right-[0px] bottom-[-8px] w-8 h-8">
            <a href="#"
              class="bg-[#2f2f2f] rounded-[50%] p-1 cursor-pointer material-symbols-outlined hover:animate-spin duration-200">
              settings
            </a>
          </div>
        </div> -->

        <!-- 별명 -->
        <div class="flex flex-col gap-2 w-full">
          <h2>별명(닉네임)</h2>
          <input name='user_nickname' id='user_nickname' placeholder="김아무개"
            class="duration-200 border border-gray-500 hover:bg-[#4f4f4f] focus:bg-[#2f2f2f] bg-[#3f3f3f] p-3 h-[50px] rounded outline-none"
            type="text" />
        </div>

      </div>

      <!-- 구분선 -->
      <div class="border-b border-gray-400"></div>

      <!-- 아이디 -->
      <div class="flex gap-2 w-full">
        <div class="w-full flex flex-col gap-2">
          <h2>아이디</h2>
          <input name='user_id' id='user_id' placeholder="abc123"
            class="w-full font-black duration-200 border border-gray-500 hover:bg-[#4f4f4f] focus:bg-[#2f2f2f] bg-[#3f3f3f] p-3 h-[50px] rounded outline-none"
            type="text" />
        </div>
        <div class="w-full flex flex-col gap-2">
          <h2>성함</h2>
          <input name='user_name' id='user_name' placeholder="홍길동"
            class="w-full font-black duration-200 border border-gray-500 hover:bg-[#4f4f4f] focus:bg-[#2f2f2f] bg-[#3f3f3f] p-3 h-[50px] rounded outline-none"
            type="text" />
        </div>
      </div>

      <!-- 비밀번호 변경 -->
      <div class="flex justify-between gap-5">
        
        <!-- 비밀번호 -->
        <div class="flex flex-col gap-3 w-full">
          <p class="px-1 hover:text-white hover:-translate-y-1 duration-200 cursor-default whitespace-nowrap max-w-min">
            비밀번호
          </p>
          <div class="relative">
            <input type="password" id="user_password_1" placeholder="비밀번호 입력" 
            class="pr-12 w-full px-5 py-3 hover:bg-opacity-80 rounded bg-[#4f4f4f] focus:bg-[#3f3f3f] border border-[#5f5f5f] focus:rounded-none outline-none duration-200">
            <p id="eye_on" class="cursor-pointer hover:-translate-x-1 hover:text-white hover:opacity-80 text-[#9f9f9f] duration-200 absolute right-3 top-4 material-symbols-outlined">
              visibility
            </p>
          </div>
        </div>

        <!-- 비밀번호 확인 -->
        <div class="flex flex-col gap-3 w-full">
          <p class="px-1 hover:text-white hover:-translate-y-1 duration-200 cursor-default whitespace-nowrap max-w-min">
            비밀번호 확인
          </p>
          <div class="relative">
            <input type="password" id="user_password_2" placeholder="비밀번호 입력 확인" 
            class="pr-12 w-full px-5 py-3 hover:bg-opacity-80 rounded bg-[#4f4f4f] focus:bg-[#3f3f3f] border border-[#5f5f5f] focus:rounded-none outline-none duration-200">
            <p id="eye_on2" class="cursor-pointer hover:-translate-x-1 hover:text-white hover:opacity-80 text-[#9f9f9f] duration-200 absolute right-3 top-4 material-symbols-outlined">
              visibility
            </p>
          </div>
        </div>
        
      </div>

      <!-- 휴대폰 -->
      <div class="flex flex-col gap-2">
        <h2>휴대폰</h2>
        <div class="flex gap-3">
          <div class="flex w-full flex-col gap-2">
            <input name="user_phone_1" id='user_phone_1' value="010" disabled
              class="w-full text-gray-400 font-black text-center duration-100 border border-[#3f3f3f] bg-[#2f2f2f] p-3 h-[50px] rounded outline-none"
              type="number" />
          </div>
          <div class="flex w-full flex-col gap-2">
            <input name="user_phone_2" id='user_phone_2' placeholder="1234"
              class="w-full font-black duration-100 border text-center border-gray-500 hover:bg-[#4f4f4f] focus:bg-[#2f2f2f] bg-[#3f3f3f] p-3 h-[50px] rounded outline-none"
              type="number" />
          </div>
          <div class="flex w-full flex-col gap-2">
            <input name="user_phone_3" id='user_phone_3' placeholder="5678"
              class="w-full font-black duration-100 border text-center border-gray-500 hover:bg-[#4f4f4f] focus:bg-[#2f2f2f] bg-[#3f3f3f] p-3 h-[50px] rounded outline-none"
              type="number" />
          </div>
        </div>
      </div>

      <!-- 이메일 -->
      <div class="flex w-full flex-col gap-2">
        <h2>이메일</h2>
        <input name="user_email" id='user_email' placeholder="abc@naver.com"
          class="w-full font-black duration-100 border border-gray-500 hover:bg-[#4f4f4f] focus:bg-[#2f2f2f] bg-[#3f3f3f] p-3 h-[50px] rounded outline-none"
          type="email" />
      </div>

      <!-- 소개 -->
      <div class="flex w-full flex-col gap-2">
        <h2>소개 - 간단하게 자기를 소개해보세요 : )</h2>
        <textarea name="user_memo" id='user_memo' rows="3" placeholder="안녕하세요? 저는 홍길동입니다"
          class="w-full font-black duration-100 border border-gray-500 hover:bg-[#4f4f4f] focus:bg-[#2f2f2f] bg-[#3f3f3f] p-3 rounded outline-none"></textarea>
      </div>

      <!-- 회원가입 버튼 -->
      <div class="text-center">
        <button id="registerButton" name="registerButton"
          class="bg-[#1f1f1f] border border-gray-500 hover:border-[#1f1f1f] duration-200 hover:opacity-80 p-4 rounded w-full outline-none">
          회원가입
        </button>
      </div>

    </form>

  </div>

</div>

<!-- <script src="/javascript/user/register.js"></script> -->

<script>

  // ajax 회원가입
$(document).ready( function () {

$('#registerButton').click( function(e) {

  e.preventDefault();
  $('#error_txt').empty(); // 에러 메시지 초기화
  $('#error_form').removeClass('hidden');
  
  if($('#user_nickname').val().length < 2 || $('#user_nickname').val().length > 8) { // 닉네임 검사
    window.scrollTo({ top: 0, behavior: "smooth" }); 
    $('#error_txt').text('닉네임은 2~8 글자로 입력해주세요.');
    return;
  }

  if($('#user_id').val().length < 4 || $('#user_id').val().length > 10) { // 아이디 검사
    window.scrollTo({ top: 0, behavior: "smooth" }); 
    $('#error_txt').text('아이디는 4~10 글자로 입력해주세요.');
    return;
  }

  if($('#user_name').val().length < 2 || $('#user_name').val().length > 20) { // 성함 검사
    window.scrollTo({ top: 0, behavior: "smooth" }); 
    $('#error_txt').text('성함은 2~20 글자로 입력해주세요.');
    return;
  }

  if($('#user_password_1').val().length < 6 || $('#user_password_1').val().length > 20) { // 비밀번호 검사
    window.scrollTo({ top: 0, behavior: "smooth" }); 
    $('#error_txt').text('비밀번호는 6~20 글자로 입력해주세요.');
    return;
  }

  if($('#user_password_2').val().length < 6 || $('#user_password_2').val().length > 20) { // 비밀번호 검사
    window.scrollTo({ top: 0, behavior: "smooth" }); 
    $('#error_txt').text('비밀번호 확인은 6~20 글자로 입력해주세요.');
    return;
  }

  if($('#user_password_1').val() !== $('#user_password_2').val()){ // 비밀번호 일치 검사
    window.scrollTo({ top: 0, behavior: "smooth" }); 
    $('#error_txt').text('비밀번호가 서로 일치하지 않습니다.');
    return;
  }

  if($('#user_phone_2').val().length != 4 || $('#user_phone_3').val().length != 4){ // 휴대폰 검사
    window.scrollTo({ top: 0, behavior: "smooth" }); 
    $('#error_txt').text('휴대폰 번호는 4자 입력해주세요.');
    return;
  }

  if($('#user_email').val().length < 1){ // 이메일 정규식 검사
    window.scrollTo({ top: 0, behavior: "smooth" }); 
    $('#error_txt').text('이메일을 입력해 주세요.');
    return;
  }

  if($('#user_email').val()){ // 이메일 정규식 검사
    var regEmail = /^[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*\.[a-zA-Z]{2,3}$/;
    if (!regEmail.test($('#user_email').val())) {
      window.scrollTo({ top: 0, behavior: "smooth" }); 
      $('#error_txt').text('이메일 형식이 맞지 않습니다.');
      return false;
    } else {
      $('#error_form').addClass('hidden');
    }
  }

  if($('#user_memo').val().length > 0) { // 메모 유효성 검사
    if($('#user_memo').val().length > 100) {
      $('#error_txt').text('메모는 100자 이내로 입력해주세요.');
      return;
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
        $('#error_form').addClass('hidden');
        alert(name + '님 환영합니다! 회원가입이 완료되었습니다.');
        location.href = '/login';
      } else {
        $('#error_txt').append(response.detail);
      }
    },
    error: ( response, s, e ) => {
      $('#error_form').removeClass('hidden');
      console.log('에러', response, s, e);
    }
  });

});
});

  $('.remove-btn').on('click', e => {
    e.preventDefault();
    $('#error_txt').empty();
    $('#error_form').addClass('hidden');
  });

  // 비밀번호 표시 토글 버튼에 대한 이벤트
  $(document).on('click', '#eye_on', function() {
    $('#user_password_1').attr('type', 'text');
    $(this).html('visibility_off');
    $(this).attr('id', 'eye_off');
  });
  $(document).on('click', '#eye_off', function() {
    $('#user_password_1').attr('type', 'password');
    $(this).html('visibility');
    $(this).attr('id', 'eye_on');
  });
  $(document).on('click', '#eye_on2', function() {
    $('#user_password_2').attr('type', 'text');
    $(this).html('visibility_off');
    $(this).attr('id', 'eye_off2');
  });

  $(document).on('click', '#eye_off2', function() {
    $('#user_password_2').attr('type', 'password');
    $(this).html('visibility');
    $(this).attr('id', 'eye_on2');
  });
</script>