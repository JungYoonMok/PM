<!-- 베이스 틀 -->
<div class="text-gray-50 p-1 md:p-5 flex place-content-center">

  <!-- 메인 틀 -->
  <div class="flex flex-col gap-5 max-w-[1200px]">

    <!-- 제목 -->
    <div class="bg-[#2f2f2f] rounded p-5">
      <p>내 계정 정보 찾기</p>
    </div>

    <!-- 아이디 찾기 -->
    <div class="border flex flex-col gap-5 border-[#4f4f4f] shadow-2xl p-5 bg-[#2f2f2f] rounded">

      <!-- 부제목 -->
      <p class="">
        아이디 찾기
      </p>
      
      <div class="flex flex-col md:flex-row gap-5">

        <!-- 이름 -->
        <div class="flex flex-col gap-3 w-full">
          <p
            class="px-1 hover:text-white hover:-translate-y-1 duration-200 cursor-default whitespace-nowrap max-w-min text-base">
            이름
          </p>
          <div class="relative">
            <input type="text" id="user_name" placeholder="이름 입력"
              class="pr-12 w-full px-5 py-3 hover:bg-opacity-80 rounded bg-[#4f4f4f] focus:bg-[#3f3f3f] border border-[#5f5f5f] focus:rounded-none outline-none duration-200">
          </div>
        </div>

        <!-- 연락처 -->
        <div class="flex flex-col gap-3 w-full">
          <p
            class="px-1 hover:text-white hover:-translate-y-1 duration-200 cursor-default whitespace-nowrap max-w-min text-base">
            연락처
          </p>
          <div class="flex gap-3">
            <input id="phone_1" type="number" placeholder="010" disabled
              class="cursor-not-allowed text-center font-bold pr-12 w-full px-5 py-3 hover:bg-opacity-80 rounded bg-[#2f2f2f] focus:bg-[#3f3f3f] border border-[#5f5f5f] focus:rounded-none outline-none duration-200">
            <input id="phone_2" type="number" placeholder="123" maxlength="4"
              class="text-center pr-12 w-full px-5 font-bold py-3 hover:bg-opacity-80 rounded bg-[#4f4f4f] focus:bg-[#3f3f3f] border border-[#5f5f5f] focus:rounded-none outline-none duration-200">
            <input id="phone_3" type="number" placeholder="456" maxlength="4"
              class="text-center pr-12 w-full px-5 font-bold py-3 hover:bg-opacity-80 rounded bg-[#4f4f4f] focus:bg-[#3f3f3f] border border-[#5f5f5f] focus:rounded-none outline-none duration-200">
          </div>
          <!-- 연락처 수정 버튼 -->
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
        <!-- 못 찾았을 때 -->
        <div hidden id="id_no" class="flex flex-col gap-3 text-center">
          <p hidden id="id_no_1" class="">해당하는 계정을 찾지 못했습니다..</p>
        </div>
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
        <p
          class="px-1 hover:text-white hover:-translate-y-1 duration-200 cursor-default whitespace-nowrap max-w-min text-base">
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
          <p
            class="px-1 hover:text-white hover:-translate-y-1 duration-200 cursor-default whitespace-nowrap max-w-min text-base">
            이름
          </p>
          <div class="relative">
            <input type="text" id="user_name_pw" placeholder="이름 입력"
              class="pr-12 w-full px-5 py-3 hover:bg-opacity-80 rounded bg-[#4f4f4f] focus:bg-[#3f3f3f] border border-[#5f5f5f] focus:rounded-none outline-none duration-200">
          </div>
        </div>

        <!-- 연락처 -->
        <div class="flex flex-col gap-3 w-full">
          <p
            class="px-1 hover:text-white hover:-translate-y-1 duration-200 cursor-default whitespace-nowrap max-w-min text-base">
            연락처
          </p>
          <div class="flex gap-3">
            <input id="phone_1_pw" type="number" placeholder="010" disabled
              class="cursor-not-allowed text-center font-bold pr-12 w-full px-5 py-3 hover:bg-opacity-80 rounded bg-[#2f2f2f] focus:bg-[#3f3f3f] border border-[#5f5f5f] focus:rounded-none outline-none duration-200">
            <input id="phone_2_pw" type="number" placeholder="123" maxlength="4"
              class="text-center pr-12 w-full px-5 font-bold py-3 hover:bg-opacity-80 rounded bg-[#4f4f4f] focus:bg-[#3f3f3f] border border-[#5f5f5f] focus:rounded-none outline-none duration-200">
            <input id="phone_3_pw" type="number" placeholder="456" maxlength="4"
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

      <div id="find_password_title" class="text-center flex flex-col gap-5 hidden">
        <!-- 구분선 -->
        <div class="border-b mt-2 border-gray-500"></div>
        <p>입력하신 정보와 일치하는 계정이 없습니다</p>
      </div>

      <!-- 비밀번호 변경 -->
      <div id="password_chege_group" class="flex flex-col gap-5 hidden">

      <!-- 구분선 -->
      <div class="border-b mt-2 border-gray-500"></div>

      <p>입력하신 정보가 일치합니다, 해당 계정의 새로운 비밀번호를 입력해 주세요</p>

        <div class="flex gap-5">
          <!-- 비밀번호 -->
          <div class="flex flex-col gap-3 w-full">
            <p
              class="px-1 hover:text-white hover:-translate-y-1 duration-200 cursor-default whitespace-nowrap max-w-min text-base">
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
            <p
              class="px-1 hover:text-white hover:-translate-y-1 duration-200 cursor-default whitespace-nowrap max-w-min text-base">
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

$(document).ready( function () {

  // 새로고침시 안내문구
  // window.addEventListener('beforeunload', (event)=>{
  //   event.preventDefault();
  //   event.returnValue = '';
  // });

  $(document).on('click', '#fine_id_btn', (e) => { // 유저 아이디 찾기
    e.preventDefault();

    if($('#user_name').val() == '') {
      alert('이름을 입력해주세요.');
      return;
    }

    if($('#phone_2').val() == '' || $('#phone_3').val() == '') {
      alert('연락처를 입력해주세요.');
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
      success: function (response) {
        if(response.state) {
          $('#id_group').show();

          $('#id_no').hide();
          $('#id_no_1').hide();

          $('#id_ok').show();
          $('#id_ok_1').show();
          $('#id_ok_2').show();
          $('#id_ok_2').html(response.data);
        } else {
          $('#id_group').show();

          $('#id_no').show();
          $('#id_no_1').show();

          $('#id_ok').hide();
          $('#id_ok_1').hide();
          $('#id_ok_2').hide();
        }
      },
      error: () => {
        return alert('서버와의 통신에 실패하였습니다.');
      }
    });
  });

  $(document).on('click', '#find_password_btn', (e) => { // 유저 비밀번호 찾기
    e.preventDefault();

    if($('#user_id').val() == '') {
      alert('아이디를 입력해주세요.');
      return;
    }

    if($('#user_name_pw').val() == '') {
      alert('이름을 입력해주세요.');
      return;
    }

    if($('#phone_2_pw').val() == '' || $('#phone_3_pw').val() == '') {
      alert('연락처를 입력해주세요.');
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
      success: function (response) {
        if(response.state) {
          $('#password_chege_group').removeClass("hidden");
          $('#find_password_title').addClass("hidden");
        } else {
          $('#password_chege_group').addClass("hidden");
          
          if($('#password_chege_group').hasClass("hidden")) {
            console.log('hasClass ????');
          }

          $('#find_password_title').removeClass("hidden");
        }
      },
      error: () => {
        return alert('서버와의 통신에 실패하였습니다.');
      }
    });
  });

  $(document).on('click', '#password_update_btn', (e) => { // 비밀번호 변경
    e.preventDefault();

    if($('#password_1').val() == '' || $('#password_2').val() == '') {
      alert('변경하실 비밀번호를 입력해주세요');
      return;
    }

    if($('#password_1').val() != $('#password_2').val()) {
      alert('비밀번호가 서로 일치하지 않습니다');
      return;
    }

    if(!confirm('비밀번호를 변경하시겠습니까?')) {
      return;
    }
    
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
      success: function (response) {
        if(response.state) {
          alert('비밀번호가 성공적으로 변경되었습니다');
          return location.href = '/Login_c';
        } else {
          alert('비밀번호 변경 실패');
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