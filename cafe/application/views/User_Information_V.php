<title>카페 | 내 정보</title>

<div class="">

  <!-- 메인 틀 -->
  <div class="flex flex-col gap-5 mt-5 m-1 lg:m-5 rounded text-gray-50">

    <!-- 내정보, 프사 -->
    <div class="flex flex-col md:flex-row w-full gap-3">
      <div class="flex flex-col w-full gap-3 rounded-tl-md rounded-tr-md shadow-2xl border border-[#4f4f4f] bg-[#2f2f2f]">
        <div class="p-5">
          <p>내 정보</p>
        </div>
      </div>
        
      <!-- 프로필 사진 -->
      <div class="flex flex-col w-full gap-3 rounded-tl-md rounded-tr-md shadow-2xl border border-[#4f4f4f] bg-[#2f2f2f]">
  
        <div class="p-5 w-full flex flex-col gap-10">
  
          <div class="flex justify-around place-items-center">
  
            <!-- 현재 프로필 -->
            <div class="relative drop-shadow-2xl flex rounded-[50%] place-content-center border-2 border-gray-500 h-20 w-20 bg-[#3f3f3f]">
              <? if ($this->session->userdata('user_profile') == '' || null) : ?>
                <p class="material-symbols-outlined text-5xl text-gray-400 flex place-items-center justify-center">
                  person
                </p>
              <? else : ?>
                <img src="/uploads/<?= $this->session->userdata('user_profile') ?>"
                  class="material-symbols-outlined rounded-[50%] text-5xl w-full h-full text-gray-400 duration-200">
                </img>
                <div class="absolute -bottom-3 w-full">
                  <p class="text-xs text-center bg-[#3f3f3f] rounded px-1">
                    현재
                  </p>
                </div>
              <? endif ?>
            </div>

            <div>
              <span class="material-symbols-outlined cursor-default rotate-[270deg] duration-200 animate-pulse text-[#9f9f9f] text-4xl">
                stat_minus_2
              </span>
            </div>
  
            <!-- 변경할 프로필 -->
            <div class="relative drop-shadow-2xl flex rounded-[50%] place-content-center border-2 border-blue-500 h-20 w-20 bg-[#3f3f3f]">
              <p id="basic_profile" class="material-symbols-outlined text-5xl text-gray-400 flex place-items-center justify-center">
                person
              </p>
              <div class="absolute -bottom-3 w-full">
                <p class="text-xs text-center bg-blue-500 rounded px-1">
                  변경
                </p>
              </div>
              <div id="on_profile" class="hidden">
                <img class="material-symbols-outlined rounded-[50%] text-5xl w-full h-full text-gray-400 duration-200"></img>
                <div class="absolute -bottom-3 w-full">
                  <p class="text-xs text-center bg-blue-500 rounded px-1">
                    변경
                  </p>
                </div>
              </div>
            </div>
            <!-- <div id="on_profile" class="relative drop-shadow-2xl flex rounded-[50%] place-content-center border-2 border-blue-500 h-20 w-20 bg-[#3f3f3f]">
              <? if (!$this->session->userdata('user_profile') == '' || null) : ?>
                <p class="material-symbols-outlined text-5xl text-gray-400 flex place-items-center justify-center">
                  person
                </p>
              <? else : ?>
                <img src="/uploads/<?= $this->session->userdata('user_profile') ?>"
                  class="material-symbols-outlined rounded-[50%] text-5xl w-full h-full text-gray-400 duration-200">
                </img>
                <div class="absolute -bottom-3 w-full">
                  <p class="text-xs text-center bg-blue-500 rounded px-1">
                    변경
                  </p>
                </div>
              <? endif ?>
            </div> -->
  
          </div>
  
          <!-- 파일 업로드 -->
          <form id="upload_form" enctype="multipart/form-data" class="flex flex-col gap-3 place-items-center place-content-center justify-center">
            <input type="file" name="userfile" 
            class="cursor-pointer
              file:mr-4 file:py-2 file:px-4
              file:rounded-full file:border-0
              file:text-sm file:font-semibold
            file:bg-[#3f3f3f] file:text-white
            hover:file:bg-[#4f4f4f] duration-200" />
            <button id="upload_button" class="px-3 py-2 w-full bg-blue-500 rounded hover:translate-y-1 duration-200">
              적용하기
            </button>
          </form>
  
        </div>
  
        <div class="p-5 w-full flex flex-col gap-3">
  
          <p>과거 프로필 사진</p>
          <!-- 동적 생성 -->
          <div id="profile_old" class="grid w-full border border-[#4f4f4f] justify-center place-items-center grid-cols-3 md:grid-cols-4 max-h-48 p-3 rounded overflow-y-scroll gap-1"></div>
  
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
          <button id="nickname_update_btn" class="bg-[#3f3f3f] w-[50%] lg:w-[40%] py-2 border border-[#5f5f5f] hover:border-yellow-500 duration-200 rounded">
            별명 수정하기
          </button>
        </div>
      </div>
      
      <!-- 구분선 -->
      <div class="border-b mt-2 border-gray-500"></div>
      
      <!-- 비밀번호 변경 -->
      <div class="grid lg:flex lg:justify-between gap-5">
        
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
        <button id="password_update_btn" class="bg-[#3f3f3f] w-[50%] lg:w-[40%] py-2 border border-[#5f5f5f] hover:border-yellow-500 duration-200 rounded">
          비밀번호 수정하기
        </button>
      </div>
      
      <!-- 구분선 -->
      <div class="border-b mt-2 border-gray-500"></div>

      <!-- 이메일, 연락처 변경 -->
      <div class="grid lg:flex lg:justify-between gap-5">

        <!-- 이메일 -->
        <div class="flex flex-col gap-3 w-full">
          <p class="px-1 hover:text-white hover:-translate-y-1 duration-200 cursor-default whitespace-nowrap max-w-min text-base">
            이메일
          </p>
          <input id="email" type="email" placeholder="이메일 입력" value="<?= $user->user_email ?>"
          class="pr-12 w-full px-5 py-3 hover:bg-opacity-80 rounded bg-[#4f4f4f] focus:bg-[#3f3f3f] border border-[#5f5f5f] focus:rounded-none outline-none duration-200">
          <!-- 이메일 수정 버튼 -->
          <div class="text-right">
            <button id="email_update_btn" class="bg-[#3f3f3f] w-[50%] lg:w-[40%] py-2 border border-[#5f5f5f] hover:border-yellow-500 duration-200 rounded">
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
            class="cursor-not-allowed text-center font-bold w-full px-5 py-3 hover:bg-opacity-80 rounded bg-[#2f2f2f] focus:bg-[#3f3f3f] border border-[#5f5f5f] focus:rounded-none outline-none duration-200">
            <input id="phone_2" type="number" placeholder="123" maxlength="4" value="<?= substr($user->user_phone, 4, 4) ?>"
            class="text-center w-full px-5 font-bold py-3 hover:bg-opacity-80 rounded bg-[#4f4f4f] focus:bg-[#3f3f3f] border border-[#5f5f5f] focus:rounded-none outline-none duration-200">
            <input id="phone_3" type="number" placeholder="456" maxlength="4" value="<?= substr($user->user_phone, 9, 4) ?>"
            class="text-center w-full px-5 font-bold py-3 hover:bg-opacity-80 rounded bg-[#4f4f4f] focus:bg-[#3f3f3f] border border-[#5f5f5f] focus:rounded-none outline-none duration-200">
          </div>
          <!-- 연락처 수정 버튼 -->
          <div class="text-right">
            <button id="phone_update_btn" class="bg-[#3f3f3f] w-[50%] lg:w-[40%] py-2 border border-[#5f5f5f] hover:border-yellow-500 duration-200 rounded">
            연락처 수정하기
            </button>
          </div>
        </div>

      </div>

      <!-- 소개 -->
      <div class="flex flex-col gap-3 w-full">
        <p class="px-1 hover:text-white hover:-translate-y-1 duration-200 cursor-default whitespace-nowrap max-w-min text-base">
          소개 - <span class="hover:text-white text-sm text-gray-300 whitespace-nowrap">다른 회원이 <?= $user->user_nickname ?>님의 소개글을 볼 수 있습니다</span>
        </p>
        <textarea id="memo" rows="5" type="text" class="w-full px-5 py-3 hover:bg-opacity-80 rounded bg-[#3f3f3f] focus:bg-[#3f3f3f] border border-[#5f5f5f] focus:rounded-none outline-none duration-200"><?= $user->user_memo ?></textarea>
        <!-- 소개 수정 버튼 -->
        <div class="text-right flex justify-end gap-5 duration-200">
          <button id="memo_update_btn" class="bg-[#3f3f3f] w-[50%] lg:w-[40%] py-2 border border-[#5f5f5f] hover:border-yellow-500 duration-200 rounded">
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

  // 파일 입력 필드의 변경을 감지
  $('input[type="file"]').on('change', function(e) {
    var file = e.target.files[0];

    if (file) {
      // FileReader 객체 생성
      var reader = new FileReader();

      // 파일 읽기가 완료되었을 때 실행될 함수 정의
      reader.onload = function(e) {
        // 미리보기 이미지의 src 속성을 변경
        $('#on_profile').removeClass('hidden');
        $('#basic_profile').addClass('hidden');

        $('#on_profile img').attr('src', e.target.result);
      };

      // 파일 읽기 시작
      reader.readAsDataURL(file);
    }
  });

  // 파일 업로드
  $(document).ready(function(){
    $('#upload_button').click(function(e){
      e.preventDefault();

      var formData = new FormData($('#upload_form')[0]);

      if($('#upload_form input[name=userfile]').val() == ''){
        alert('업로드하실 이미지를 선택해 주세요');
        return false;
      }

      $.ajax({
        url: '/user_information_c/profile_upload',
        type: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function(data) {
          // console.log('성공: ', data);
          location.reload();
        },
        error: function(data) {
          // console.log('실패: ', data);
        }
      });
    });
  });

  // 서버에 비동기 데이터 요청
  $.ajax({
    url: '/User_Information_C/user_profile_show',
    type: 'POST',
    // data: { idx: postId },
    dataType: 'json',
    success: function(response) {
      // 답글 데이터로 UI 업데이트
      var profileBox = $('#profile_old');
      profileBox.empty();
      if (response.state) {
        $.each(response.data, function(i, profile) {
          // 답글 데이터를 HTML로 변환하여 추가
          profileBox.append(`
          <div class="profile-container relative flex justify-center place-items-center rounded">
            <img src="/uploads/${profile.file_name}" title="업로드 - ${profile.regdate}" class="w-20 h-20 rounded duration-200 border-2 border-[#4f4f4f] border-dashed"></img>
            <button title="해당 프로필 삭제" data-profileid="${profile.file_name}" class="remove-btn hover:scale-125 rounded-[50%] absolute top-1 duration-200 w-5 h-5 flex justify-center place-items-center right-1 p-1 bg-[#1f1f1f] hover:bg-red-500">
              <span class="material-symbols-outlined text-[20px]">
                close
              </span>
            </button>
            <button title="해당 프로필 적용" data-profileid="${profile.file_name}" class="update-btn hover:scale-125 rounded-[50%] absolute top-1 duration-200 w-5 h-5 flex justify-center place-items-center left-1 p-1 bg-[#1f1f1f] hover:bg-red-500">
              <span class="material-symbols-outlined text-[20px]">
                check
              </span>
            </button>
          </div>
          `);
        });
      } else {
        $('#profile_old').removeClass('grid');
        $('#profile_old').removeClass('grid-cols-3');
        $('#profile_old').removeClass('md:grid-cols-4');
        profileBox.append(`
        <div class="w-full h-full">
          <p class="duration-200 text-[#9f9f9f] py-16 border border-[#4f4f4f] shadow-xl bg-[#3f3f3f] rounded text-center">
            데이터가 없습니다.
          </p>
        </div>
        `);
      }
    },
    error: function() {
      alert('프로필 사진을 불러오는 중 오류가 발생했습니다.');
    }
  });

  // 프로필 삭제
  $(document).on('click', '.remove-btn', function(e) {
    e.preventDefault();
    var profileId = $(this).data('profileid'); // 프로필 ID를 가져옵니다.
    var button = $(this); // 현재 클릭된 버튼을 저장

    $.ajax({
      url: '/user_information_c/delete_profile',
      type: 'POST',
      data: { profileId: profileId },
      success: function(response) {
        // 성공적으로 처리됐을 때의 로직
        console.log('성공: ', response);
        button.closest('.profile-container').remove(); // 예를 들어, 각 프로필 요소가 .profile-container 클래스를 가지고 있다고 가정
      },
      error: function(error) {
        // 오류 처리
        console.log('실패: ', error);
      }
    });
  });

  // 프로필 업데이트
  $(document).on('click', '.update-btn', function(e) {
    e.preventDefault();
    var profileId = $(this).data('profileid'); // 프로필 ID를 가져옵니다.

    if(!confirm('해당 프로필을 적용하시겠습니까?')) {
      return;
    }

    $.ajax({
      url: '/user_information_c/update_profile',
      type: 'POST',
      data: { profileId: profileId },
      success: function(response) {
        // 성공적으로 처리됐을 때의 로직
        console.log('성공: ', response);
        location.reload();
      },
      error: function(error) {
        // 오류 처리
        console.log('실패: ', error);
      }
    });
  });
  
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