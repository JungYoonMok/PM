<title>카페 | 내 정보</title>

<div class="">

  <div class="flex flex-col gap-5 m-5 rounded text-gray-50">

    <!-- 메인 틀 -->
    <div class="flex flex-col rounded-tl-md rounded-tr-md gap-5 shadow-2xl border border-[#4f4f4f] bg-[#2f2f2f] p-5">

      <!-- 내 정보 -->
      <div class="py-5">

        <!-- 프로필 -->
        <div class="relative drop-shadow-2xl flex rounded-[50%] place-content-center border border-gray-500 h-20 w-20  bg-[#3f3f3f]">
          <!-- <p class="material-symbols-outlined text-5xl text-gray-400 cursor-help hover:animate-bounce">
            person
          </p> -->
          <img width="100%" src="https://pds.saramin.co.kr/workenv-bg/202303/09/rr8njw_y8e6-w09k06_workenv-bg.png"
            class="material-symbols-outlined rounded-[50%] text-5xl w-full h-full text-gray-400 cursor-help hover:animate-bounce">
          </img>
          <div class="absolute right-[0px] bottom-[-8px] w-8 h-8">
            <a href="#" class="bg-[#2f2f2f] rounded-[50%] p-1 cursor-pointer material-symbols-outlined hover:animate-spin">
              settings
            </a>
          </div>
        </div>

      </div>

    </div>
      
    <!-- 구분선 -->
    <div class="border-b border-gray-500"></div>

    <!-- 정보 수정 -->
    <div class="rounded-b-md flex flex-col gap-5 shadow-2xl border border-[#4f4f4f] bg-[#2f2f2f] px-5 py-10">
      
      <!-- 별명 -->
      <div class="flex flex-col gap-3">
        <p class="px-1 hover:text-white hover:-translate-y-1 duration-200 cursor-default whitespace-nowrap max-w-min text-base">
          별명 (닉네임) - <span class="hover:text-white text-sm text-gray-300">카페에서 주로 보이는 활동 이름</span>
        </p>
        <input id="nickname" required type="text" placeholder="<?= $user->user_nickname ?>" 
        class="w-full px-5 py-3 hover:bg-opacity-80 rounded bg-[#3f3f3f] focus:bg-[#3f3f3f] border border-[#5f5f5f] focus:rounded-none outline-none duration-200">
        <!-- 별명 수정 버튼 -->
        <div class="text-right">
          <button id="nickname_update_btn" class="bg-[#3f3f3f] px-5 py-2 border border-[#5f5f5f] hover:border-yellow-500 duration-200 rounded">
            별명 수정하기
          </button>
        </div>
      </div>
      
      <!-- 구분선 -->
      <div class="border-b mt-2 border-gray-500"></div>
      
      <!-- 비밀번호 변경 -->
      <div class="flex justify-between gap-5">
        
        <!-- 비밀번호 -->
        <div class="flex flex-col gap-3 w-full">
          <p class="px-1 hover:text-white hover:-translate-y-1 duration-200 cursor-default whitespace-nowrap max-w-min text-base">
            비밀번호
          </p>
          <div class="relative">
            <input type="password" id="password_1" placeholder="비밀번호 입력" 
            class="pr-12 w-full px-5 py-3 hover:bg-opacity-80 rounded bg-[#4f4f4f] focus:bg-[#3f3f3f] border border-[#5f5f5f] focus:rounded-none outline-none duration-200">
            <button id="eye_on" class="hover:-translate-x-1 hover:text-white hover:opacity-80 text-[#9f9f9f] duration-200 absolute right-3 top-4 material-symbols-outlined">
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
            <button id="eye_on2" class="hover:-translate-x-1 hover:text-white hover:opacity-80 text-[#9f9f9f] duration-200 absolute right-3 top-4 material-symbols-outlined">
              visibility
            </button>
          </div>
        </div>
        
      </div>

      <!-- 비밀번호 수정 버튼 -->
      <div class="text-right">
        <button id="password_update_btn" class="bg-[#3f3f3f] px-5 py-2 border border-[#5f5f5f] hover:border-yellow-500 duration-200 rounded">
          비밀번호 수정하기
        </button>
      </div>
      
      <!-- 구분선 -->
      <div class="border-b mt-2 border-gray-500"></div>

      <!-- 이메일, 연락처 변경 -->
      <div class="flex justify-between gap-5">

        <!-- 이메일 -->
        <div class="flex flex-col gap-3 w-full">
          <p class="px-1 hover:text-white hover:-translate-y-1 duration-200 cursor-default whitespace-nowrap max-w-min text-base">
            이메일
          </p>
          <input id="email" type="email" placeholder="이메일 입력" value="<?= $user->user_email ?>"
          class="pr-12 w-full px-5 py-3 hover:bg-opacity-80 rounded bg-[#4f4f4f] focus:bg-[#3f3f3f] border border-[#5f5f5f] focus:rounded-none outline-none duration-200">
          <!-- 이메일 수정 버튼 -->
          <div class="text-right">
            <button id="email_update_btn" class="bg-[#3f3f3f] px-5 py-2 border border-[#5f5f5f] hover:border-yellow-500 duration-200 rounded">
              이메일 수정하기
            </button>
          </div>
        </div>

        <!-- 연락처 -->
        <div class="flex flex-col gap-3 w-full">
          <p class="px-1 hover:text-white hover:-translate-y-1 duration-200 cursor-default whitespace-nowrap max-w-min text-base">
            연락처
          </p>
          <div class="flex gap-3">
            <input id="phone_1" type="number" placeholder="010" disabled
            class="cursor-not-allowed text-center font-bold pr-12 w-full px-5 py-3 hover:bg-opacity-80 rounded bg-[#2f2f2f] focus:bg-[#3f3f3f] border border-[#5f5f5f] focus:rounded-none outline-none duration-200">
            <input id="phone_2" type="number" placeholder="123" maxlength="4" value="<?= substr($user->user_phone, 4, 4) ?>"
            class="text-center pr-12 w-full px-5 font-bold py-3 hover:bg-opacity-80 rounded bg-[#4f4f4f] focus:bg-[#3f3f3f] border border-[#5f5f5f] focus:rounded-none outline-none duration-200">
            <input id="phone_3" type="number" placeholder="456" maxlength="4" value="<?= substr($user->user_phone, 9, 4) ?>"
            class="text-center pr-12 w-full px-5 font-bold py-3 hover:bg-opacity-80 rounded bg-[#4f4f4f] focus:bg-[#3f3f3f] border border-[#5f5f5f] focus:rounded-none outline-none duration-200">
          </div>
          <!-- 연락처 수정 버튼 -->
          <div class="text-right">
            <button id="phone_update_btn" class="bg-[#3f3f3f] px-5 py-2 border border-[#5f5f5f] hover:border-yellow-500 duration-200 rounded">
            연락처 수정하기
            </button>
          </div>
        </div>

      </div>

      <!-- 소개 -->
      <div class="flex flex-col gap-3">
        <p class="px-1 hover:text-white hover:-translate-y-1 duration-200 cursor-default whitespace-nowrap max-w-min text-base">
          소개 - <span class="hover:text-white text-sm text-gray-300">다른 회원이 <?= $user->user_nickname ?>님의 소개글을 볼 수 있습니다</span>
        </p>
        <textarea id="memo" rows="5" type="text" class="w-full px-5 py-3 hover:bg-opacity-80 rounded bg-[#3f3f3f] focus:bg-[#3f3f3f] border border-[#5f5f5f] focus:rounded-none outline-none duration-200"><?= $user->user_memo ?></textarea>
        <!-- 소개 수정 버튼 -->
        <div class="text-right flex justify-end gap-5 hover:bg-[#3f3f3f] duration-200">
          <button id="memo_update_btn" class="bg-[#3f3f3f] px-5 py-2 border border-[#5f5f5f] hover:border-yellow-500 duration-200 rounded">
          소개 수정하기
          </button>
        </div>
      </div>

      <!-- 모달 -->
      <!-- <div>
        <button id="modal_btn" class="bg-blue-500 px-5 py-3 rounded">
          show modal
        </button>
        <dialog id="modal" class="min-w-[30%] min-h-[50%] p-5 duration-200 shadow-2xl bg-[#3f3f3f] border border-[#4f4f4f] text-gray-50 rounded">
          Hellow I'm a modal!
            <button value="close">Close</button>
            <button value="confirm">Confirm</button>
        </dialog>
      </div> -->

    </div>

  </div>

</div>

<script>
  
  $(document).ready( () => {
    const user_email = $('#email').val();
    const user_phone = '010-' + $('#phone_2').val() + '-' + $('#phone_3').val();

  $('#nickname_update_btn').on('click', (e) => { // 닉네임 수정
    e.preventDefault();

    if ($('#nickname').val() == '') {
      alert('별명을 입력해주세요');
      return false;
    }

    if(!confirm($('#nickname').val() + '으로 별명을 변경하시겠습니까?')) {
      return;
    }

    $.ajax({
      url: '/user_information_c/update_nickname',
      type: 'post',
      dataType: 'json',
      data: {
        nickname: $('#nickname').val(),
      },
      success: (response) => {
        if (response.state) {
          alert('별명이 변경되었습니다');
          location.reload();
        } else {
          alert('별명 변경에 실패했습니다');
        }
      },
      error: (response, s, e) => {
        console.log(response);
        console.log(s);
        console.log(e);
      }
    });
  });

  $('#password_update_btn').on('click', (e) => { // 비밀번호 수정
    e.preventDefault();

    if (!$('#password_1').val()) {
      alert('비밀번호를 입력해주세요');
      return false;
    }

    if (!$('#password_2').val()) {
      alert('비밀번호 확인을 입력해주세요');
      return false;
    }

    if($('#password_1').val() !== $('#password_2').val()) {
      alert('비밀번호가 일치하지 않습니다');
      return false;
    }

    if(!confirm('비밀번호를 변경하시겠습니까?')) {
      return;
    }

    $.ajax({
      url: '/user_information_c/update_password',
      type: 'post',
      dataType: 'json',
      data: {
        password: $('#password_1').val(),
      },
      success: (response) => {
        if (response.state) {
          alert('비밀번호가 변경되었습니다');
          location.reload();
        } else {
          alert('비밀번호 변경에 실패했습니다');
        }
      },
      error: (response, s, e) => {
        console.log(response);
        console.log(s);
        console.log(e);
      }
    });
  });

  $('#email_update_btn').on('click', (e) => { // 이메일 수정
    e.preventDefault();

    if (!$('#email').val()) {
      alert('이메일을 입력해주세요');
      return false;
    }

    if(user_email == $('#email').val()) {
      alert('현재 이메일과 동일합니다');
      return false;
    }

    if(!confirm('이메일을 변경하시겠습니까?')) {
      return;
    }

    $.ajax({
      url: '/user_information_c/update_email',
      type: 'post',
      dataType: 'json',
      data: {
        email: $('#email').val(),
      },
      success: (response) => {
        if (response.state) {
          alert('이메일이 변경되었습니다');
          location.reload();
        } else {
          alert('이메일 변경에 실패했습니다');
        }
      },
      error: (response, s, e) => {
        console.log(response);
        console.log(s);
        console.log(e);
      }
    });
  });

  $('#phone_update_btn').on('click', (e) => { // 연락처 수정
    e.preventDefault();

    if (!$('#phone_2').val() || !$('#phone_3').val()) {
      alert('연락처를 입력해주세요');
      return false;
    }

    if(($('#phone_2').val().length < 4) || ($('#phone_3').val().length < 4)) {
      alert('연락처는 4 글자씩 입력해주세요');
      return false;
    }

    if(($('#phone_2').val().length > 4) || ($('#phone_3').val().length > 4)) {
      alert('연락처는 4 글자씩 입력해주세요');
      return false;
    }

    if(user_phone == '010-' + $('#phone_2').val() + '-' + $('#phone_3').val()) {
      alert('현재 연락처와 동일합니다');
      return false;
    }

    if(!confirm('연락처를 변경하시겠습니까?')) {
      return;
    }

    $.ajax({
      url: '/user_information_c/update_phone',
      type: 'post',
      dataType: 'json',
      data: {
        phone: '010-' + $('#phone_2').val() + '-' + $('#phone_3').val(),
      },
      success: (response) => {
        if (response.state) {
          alert('연락처가 변경되었습니다');
          location.reload();
        } else {
          alert('연락처 변경에 실패했습니다');
        }
      },
      error: (response, s, e) => {
        console.log(response);
        console.log(s);
        console.log(e);
      }
    });
  });

  $('#memo_update_btn').on('click', (e) => { // 소개 수정
    e.preventDefault();

    if (!$('#memo').val()) {
      alert('소개를 입력해주세요');
      return false;
    }

    if(!confirm('소개를 변경하시겠습니까?')) {
      return;
    }

    $.ajax({
      url: '/user_information_c/update_memo',
      type: 'post',
      dataType: 'json',
      data: {
        memo: $('#memo').val(),
      },
      success: (response) => {
        if (response.state) {
          alert('메모가 변경되었습니다');
          location.reload();
        } else {
          alert('메모 변경에 실패했습니다');
        }
      },
      error: (response, s, e) => {
        console.log(response);
        console.log(s);
        console.log(e);
      }
    });
  });

  // 모달 버튼에 대한 이벤트
  // const button = document.querySelector('button');
  // const dialog = document.querySelector('dialog');
  // $(document).on('click', button, function() {
  //   dialog.showModal();
  // });
  // $(document).on('click', dialog, function() {
  //   console.log(dialog.returnValue);
  // });
  // $(document).on('click', 'button[value="close"]', function() {
  //   dialog.close();
  // });
  
  // 비밀번호 표시 토글 버튼에 대한 이벤트
  $(document).on('click', '#eye_on', function() {
    $('#password_1').attr('type', 'text');
    $(this).html('visibility_off');
    $(this).attr('id', 'eye_off');
  });
  $(document).on('click', '#eye_off', function() {
    $('#password_1').attr('type', 'password');
    $(this).html('visibility');
    $(this).attr('id', 'eye_on');
  });
  $(document).on('click', '#eye_on2', function() {
    $('#password_2').attr('type', 'text');
    $(this).html('visibility_off');
    $(this).attr('id', 'eye_off2');
  });

  $(document).on('click', '#eye_off2', function() {
    $('#password_2').attr('type', 'password');
    $(this).html('visibility');
    $(this).attr('id', 'eye_on2');
  });

});
</script>