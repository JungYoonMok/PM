<!-- 베이스 틀 -->
<div class="text-gray-50 p-5">

  <!-- 메인 틀 -->
  <div class="flex flex-col gap-5">

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
      
      <div class="flex gap-5">
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
              class="bg-[#3f3f3f] px-5 py-2 border border-[#5f5f5f] hover:border-yellow-500 duration-200 rounded">
              아이디 찾기
            </button>
          </div>
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
      <div class="flex gap-5">
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
            <button id="password_find_btn"
              class="bg-[#3f3f3f] px-5 py-2 border border-[#5f5f5f] hover:border-yellow-500 duration-200 rounded">
              비밀번호 찾기
            </button>
          </div>

        </div>

      </div>

      <!-- 비밀번호 변경 -->
      <div class="flex justify-between gap-5">

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

<script>

$(document).ready( function () {

  // 새로고침시 안내문구
  // window.addEventListener('beforeunload', (event)=>{
  //   event.preventDefault();
  //   event.returnValue = '';
  // });

  $(document).on('click', '#fine_id_btn', (e) => { // 유저 아이디 찾기
    e.preventDefault();

    // console.log('아이디 찾기 버튼 클릭');

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
          console.log('성공: ', response.data);
          return;
        } else {
          console.log('입력하신 정보와 일치하는 아이디가 없습니다.');
          return;
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