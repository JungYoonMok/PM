<!-- 베이스 틀 -->
<div class="text-gray-50 p-1 md:p-5 flex place-content-center">

  <!-- 메인 틀 -->
  <div class="flex flex-col gap-5 max-w-[1200px]">

    <!-- 제목 -->
    <div class="bg-[#2f2f2f] rounded p-5">
      <p>내 계정 정보 찾기</p>
    </div>

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

    <!-- 아이디 찾기 -->
    <div class="border flex flex-col gap-5 border-[#4f4f4f] shadow-2xl p-5 bg-[#2f2f2f] rounded">

      <!-- 부제목 -->
      <p class="">
        아이디 찾기
      </p>
      
      <div id="form_id" class="flex flex-col md:flex-row gap-5">

        <!-- 이름 -->
        <div class="flex flex-col gap-3 w-full">
          <p class="px-1 hover:text-white hover:-translate-y-1 duration-200 cursor-default whitespace-nowrap max-w-min text-base">
            성함
          </p>
          <div class="relative">
            <input type="text" id="user_name" placeholder="성함 입력"
              class="pr-12 w-full px-5 py-3 hover:bg-opacity-80 rounded bg-[#4f4f4f] focus:bg-[#3f3f3f] border border-[#5f5f5f] focus:rounded-none outline-none duration-200">
          </div>
        </div>

        <!-- 휴대폰 -->
        <div class="flex flex-col gap-3 w-full">
          <p class="px-1 hover:text-white hover:-translate-y-1 duration-200 cursor-default whitespace-nowrap max-w-min text-base">
            휴대폰
          </p>
          <div class="flex gap-3">
            <input id="phone_1" type="number" placeholder="010" disabled
              class="cursor-not-allowed text-center font-bold pr-12 w-full px-5 py-3 hover:bg-opacity-80 rounded bg-[#2f2f2f] focus:bg-[#3f3f3f] border border-[#5f5f5f] focus:rounded-none outline-none duration-200">
            <input id="phone_2" type="number" placeholder="1234" maxlength="4"
              class="text-center pr-12 w-full px-5 font-bold py-3 hover:bg-opacity-80 rounded bg-[#4f4f4f] focus:bg-[#3f3f3f] border border-[#5f5f5f] focus:rounded-none outline-none duration-200">
            <input id="phone_3" type="number" placeholder="5678" maxlength="4"
              class="text-center pr-12 w-full px-5 font-bold py-3 hover:bg-opacity-80 rounded bg-[#4f4f4f] focus:bg-[#3f3f3f] border border-[#5f5f5f] focus:rounded-none outline-none duration-200">
          </div>
          <!-- 휴대폰 수정 버튼 -->
          <div class="text-right">
            <button id="fine_id_btn"
              class="bg-[#3f3f3f] w-[50%] md:w-[40%] py-2 border border-[#5f5f5f] hover:border-yellow-500 duration-200 rounded">
              아이디 찾기
            </button>
          </div>
        </div>

      </div>

      <!-- 찾은 아이디 -->
      <div hidden id="id_group" class="bg-[#3f3f3f] p-5 border border-[#5f5f5f] shadow-inner duration-200">
        <!-- 찾았을 때 -->
        <div hidden id="id_ok" class="flex flex-col gap-3">
          <p hidden id="id_ok_1" class="tracking-widest">계정을 찾았습니다!</p>
          <p hidden id="id_ok_2" class="text-center font-bold tracking-widest text-xl duration-200 shadow-2xl"></p>
        </div>
      </div>

    </div>

    <!-- 비밀번호 찾기 -->
    <div class="flex flex-col gap-5 border border-[#4f4f4f] shadow-2xl p-5 bg-[#2f2f2f] rounded">

      <!-- 부제목 -->
      <p class="">
        비밀번호 찾기
      </p>

      <!-- 아이디 -->
      <div class="flex flex-col gap-3 w-full">
        <p class="px-1 hover:text-white hover:-translate-y-1 duration-200 cursor-default whitespace-nowrap max-w-min text-base">
          아이디
        </p>
        <div class="relative">
          <input type="text" id="user_id" placeholder="아이디 입력"
            class="pr-12 w-full px-5 py-3 hover:bg-opacity-80 rounded bg-[#4f4f4f] focus:bg-[#3f3f3f] border border-[#5f5f5f] focus:rounded-none outline-none duration-200">
        </div>
      </div>

      <!-- 이름, 연락처 -->
      <div class="flex flex-col md:flex-row gap-5">
        <div class="flex flex-col gap-3 w-full">
          <p class="px-1 hover:text-white hover:-translate-y-1 duration-200 cursor-default whitespace-nowrap max-w-min text-base">
            성함
          </p>
          <div class="relative">
            <input type="text" id="user_name_pw" placeholder="성함 입력"
              class="pr-12 w-full px-5 py-3 hover:bg-opacity-80 rounded bg-[#4f4f4f] focus:bg-[#3f3f3f] border border-[#5f5f5f] focus:rounded-none outline-none duration-200">
          </div>
        </div>

        <!-- 휴대폰 -->
        <div class="flex flex-col gap-3 w-full">
          <p class="px-1 hover:text-white hover:-translate-y-1 duration-200 cursor-default whitespace-nowrap max-w-min text-base">
            휴대폰
          </p>
          <div class="flex gap-3">
            <input id="phone_1_pw" type="number" placeholder="010" disabled
              class="cursor-not-allowed text-center font-bold pr-12 w-full px-5 py-3 hover:bg-opacity-80 rounded bg-[#2f2f2f] focus:bg-[#3f3f3f] border border-[#5f5f5f] focus:rounded-none outline-none duration-200">
            <input id="phone_2_pw" type="number" placeholder="1234" maxlength="4"
              class="text-center pr-12 w-full px-5 font-bold py-3 hover:bg-opacity-80 rounded bg-[#4f4f4f] focus:bg-[#3f3f3f] border border-[#5f5f5f] focus:rounded-none outline-none duration-200">
            <input id="phone_3_pw" type="number" placeholder="5678" maxlength="4"
              class="text-center pr-12 w-full px-5 font-bold py-3 hover:bg-opacity-80 rounded bg-[#4f4f4f] focus:bg-[#3f3f3f] border border-[#5f5f5f] focus:rounded-none outline-none duration-200">
          </div>

          <!-- 비밀번호 찾기 버튼 -->
          <div class="text-right">
            <button id="find_password_btn"
              class="bg-[#3f3f3f] w-[50%] md:w-[40%] py-2 border border-[#5f5f5f] hover:border-yellow-500 duration-200 rounded">
              비밀번호 찾기
            </button>
          </div>

        </div>

      </div>

      <!-- 비밀번호 변경 -->
      <div id="password_chege_group" class="flex flex-col gap-5 hidden">

      <!-- 구분선 -->
      <div class="border-b mt-2 border-gray-500"></div>

      <p>입력하신 정보가 일치합니다, 해당 계정의 새로운 비밀번호를 입력해 주세요</p>

        <div class="flex gap-5">
          <!-- 비밀번호 -->
          <div class="flex flex-col gap-3 w-full">
            <p class="px-1 hover:text-white hover:-translate-y-1 duration-200 cursor-default whitespace-nowrap max-w-min text-base">
              비밀번호
            </p>
            <div class="relative">
              <input type="password" id="password_1" placeholder="비밀번호 입력"
                class="pr-12 w-full px-5 py-3 hover:bg-opacity-80 rounded bg-[#4f4f4f] focus:bg-[#3f3f3f] border border-[#5f5f5f] focus:rounded-none outline-none duration-200">
              <button id="eye_on"
                class="hover:-translate-x-1 hover:text-white hover:opacity-80 text-[#9f9f9f] duration-200 absolute right-3 top-4 material-symbols-outlined">
                visibility
              </button>
            </div>
          </div>

          <!-- 비밀번호 확인 -->
          <div class="flex flex-col gap-3 w-full">
            <p class="px-1 hover:text-white hover:-translate-y-1 duration-200 cursor-default whitespace-nowrap max-w-min text-base">
              비밀번호 확인
            </p>
            <div class="relative">
              <input type="password" id="password_2" placeholder="비밀번호 입력 확인"
                class="pr-12 w-full px-5 py-3 hover:bg-opacity-80 rounded bg-[#4f4f4f] focus:bg-[#3f3f3f] border border-[#5f5f5f] focus:rounded-none outline-none duration-200">
              <button id="eye_on2"
                class="hover:-translate-x-1 hover:text-white hover:opacity-80 text-[#9f9f9f] duration-200 absolute right-3 top-4 material-symbols-outlined">
                visibility
              </button>
            </div>

            <!-- 비밀번호 변경 버튼 -->
            <div class="text-right">
              <button id="password_update_btn"
                class="bg-[#3f3f3f] px-5 py-2 border border-[#5f5f5f] hover:border-yellow-500 duration-200 rounded">
                비밀번호 변경하기
              </button>
            </div>

          </div>
        </div>

      </div>

    </div>

  </div>

</div>

<script>

$(document).ready( () => {

  // 새로고침시 안내문구
  // window.addEventListener('beforeunload', (event)=>{
  //   event.preventDefault();
  //   event.returnValue = '';
  // });

  $('.remove-btn').on('click', e => {
    e.preventDefault();
    $('#error_txt').empty();
    $('#error_form').addClass('hidden');
  });

  $(document).on('click', '#fine_id_btn', e => { // 유저 아이디 찾기
    e.preventDefault();

    $('#error_txt').empty(); // 에러 메시지 초기화
    $('#error_form').removeClass('hidden');

    if($('#user_name').val().length < 2 || $('#user_name').val().length > 20) { // 성함 검사
      $('#error_txt').text('성함은 2~20 글자로 입력해주세요.');
      return;
    }

    if(($('#phone_2').val().length < 3 || $('#phone_2').val().length > 4) || ($('#phone_3').val().length < 3 || $('#phone_3').val().length > 4)){ // 휴대폰 검사
      $('#error_txt').text('휴대폰 번호는 3~4자 입력해주세요.');
      return;
    }

    $.ajax({
      url: '/Find_Account_C/find_id',
      type: 'POST',
      dataType: 'json',
      data: {
        name: $('#user_name').val(),
        phone: '010-' + $('#phone_2').val() + '-' + $('#phone_3').val()
      },
      success: response => {
        if(response.state) {
          $('#id_group').show();
          $('#form_id').addClass('hidden');
          
          $('#id_ok').show();
          $('#id_ok_1').show();
          $('#id_ok_2').show();

          $('#error_txt').empty(); // 에러 메시지 초기화
          $('#error_form').addClass('hidden');

          $('#id_ok_2').html(response.data);
        } else {
          
          $('#id_ok').hide();
          $('#id_ok_1').hide();
          $('#id_ok_2').hide();
          
          $('#error_txt').empty(); // 에러 메시지 초기화
          $('#error_form').removeClass('hidden');
          $('#error_txt').append(response.detail);
        }
      },
      error: () => {
        return alert('서버와의 통신에 실패하였습니다.');
      }
    });
  });

  $(document).on('click', '#find_password_btn', e => { // 유저 비밀번호 찾기
    e.preventDefault();

    $('#error_txt').empty(); // 에러 메시지 초기화
    $('#error_form').removeClass('hidden');

    if($('#user_id').val().length < 4 || $('#user_id').val().length > 10) { // 아이디 검사
      $('#error_txt').text('아이디는 4~10 글자로 입력해주세요.');
      return;
    }

    if($('#user_name_pw').val().length < 2 || $('#user_name_pw').val().length > 20) { // 성함 검사
      $('#error_txt').text('성함은 2~20 글자로 입력해주세요.');
      return;
    }

    if($('#phone_2_pw').val().length != 4 || $('#phone_3_pw').val().length != 4){ // 휴대폰 검사
      $('#error_txt').text('휴대폰 번호는 4자 입력해주세요.');
      return;
    }

    $.ajax({
      url: '/Find_Account_C/find_password',
      type: 'POST',
      dataType: 'json',
      data: {
        id: $('#user_id').val(),
        name: $('#user_name_pw').val(),
        phone: '010-' + $('#phone_2_pw').val() + '-' + $('#phone_3_pw').val()
      },
      success: response => {
        if(response.state) {
          $('#password_chege_group').removeClass("hidden");
          $('#find_password_title').addClass("hidden");

          $('#error_txt').empty(); // 에러 메시지 초기화
          $('#error_form').addClass('hidden');
        } else {
          $('#password_chege_group').addClass("hidden");

          $('#error_txt').empty(); // 에러 메시지 초기화
          $('#error_form').removeClass('hidden');

          $('#error_txt').append(response.detail);
        }
      },
      error: () => {
        return alert('서버와의 통신에 실패하였습니다.');
      }
    });
  });

  $(document).on('click', '#password_update_btn', e => { // 비밀번호 변경
    e.preventDefault();

    $('#error_txt').empty(); // 에러 메시지 초기화
    $('#error_form').removeClass('hidden');
    
    if($('#password_1').val().length < 6 || $('#password_1').val().length > 20) { // 비밀번호 검사
      $('#error_txt').text('비밀번호는 6~20 글자로 입력해주세요.');
      return;
    }

    if($('#password_2').val().length < 6 || $('#password_2').val().length > 20) { // 비밀번호 검사
      $('#error_txt').text('비밀번호 확인은 6~20 글자로 입력해주세요.');
      return;
    }

    if($('#password_1').val() !== $('#password_2').val()){ // 비밀번호 일치 검사
      $('#error_txt').text('비밀번호가 서로 일치하지 않습니다.');
      return;
    }

    if(!confirm('비밀번호를 변경하시겠습니까?')) {
      $('#error_txt').empty(); // 에러 메시지 초기화
      $('#error_form').addClass('hidden');
      return;
    }

    $('#error_txt').empty(); // 에러 메시지 초기화
    $('#error_form').addClass('hidden');
    
    $.ajax({
      url: '/Find_Account_C/update_password',
      type: 'POST',
      dataType: 'json',
      data: {
        id: $('#user_id').val(),
        name: $('#user_name_pw').val(),
        phone: '010-' + $('#phone_2_pw').val() + '-' + $('#phone_3_pw').val(),
        password: $('#password_1').val(),
      },
      success: response => {
        if(response.state) {
          alert('비밀번호가 성공적으로 변경되었습니다');
          return location.href = '/login';
        } else {
          $('#error_txt').empty(); // 에러 메시지 초기화
          $('#error_txt').append(response.detail);
        }
      },
      error: () => {
        return alert('서버와의 통신에 실패하였습니다.');
      }
    });
  });

  // 비밀번호 표시 토글 버튼에 대한 이벤트
  $(document).on('click', '#eye_on', function () {
    $('#password_1').attr('type', 'text');
    $(this).html('visibility_off');
    $(this).attr('id', 'eye_off');
  });
  $(document).on('click', '#eye_off', function () {
    $('#password_1').attr('type', 'password');
    $(this).html('visibility');
    $(this).attr('id', 'eye_on');
  });
  $(document).on('click', '#eye_on2', function () {
    $('#password_2').attr('type', 'text');
    $(this).html('visibility_off');
    $(this).attr('id', 'eye_off2');
  });

  $(document).on('click', '#eye_off2', function () {
    $('#password_2').attr('type', 'password');
    $(this).html('visibility');
    $(this).attr('id', 'eye_on2');
  });

});

</script>