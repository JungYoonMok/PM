<title>카페 | 내 정보</title>

<!-- 메인 틀 -->
<div class="flex flex-col gap-5 mt-5 m-1 lg:m-5 rounded text-gray-50">

  <!-- 내정보, 프사 -->
  <div class="flex flex-col md:flex-row w-full gap-3">

    <div class="relative flex flex-col w-full gap-3 rounded-tl-md rounded-tr-md shadow-2xl border border-[#4f4f4f] bg-[#2f2f2f]">

      <div class="absolute top-0 bg-[#3f3f3f] shadow-2xl p-3 rounded-b-2xl border-[#4f4f4f] border-b w-full flex gap-3 place-items-center justify-center">
        <span class="material-symbols-outlined">
          person
        </span>
        <p>내 정보</p>
      </div>

      <div class="p-5 flex flex-col gap-3 text-sm">

        <div class="flex flex-col gap-3 mt-12 bg-[#3f3f3f] px-3 py-5 rounded rounded-t-3xl">

          <div class="flex gap-3 justify-around">
            <div class="flex gap-3">
              <p class="text-[#9f9f9f]">아이디</p>
              <p class="tracking-wider">
                <?= $this->session->userdata('user_id') ?>
              </p>
            </div>

            <p class="text-[#9f9f9f]">|</p>

            <div class="flex gap-3">
              <p class="text-[#9f9f9f]">닉네임</p>
              <p class="tracking-wider">
                <?= $this->session->userdata('user_nickname') ?>
              </p>
            </div>

          </div>

        </div>

        <div class="flex flex-col gap-3 bg-[#3f3f3f] px-3 py-5 rounded">

          <div class="flex justify-between place-items-center">
            <div class="flex gap-5">
              <p class="w-14 text-[#9f9f9f]">이름</p>
              <p class="tracking-wider">
                <?= $this->session->userdata('user_name') ?>
              </p>
            </div>
            <span class="material-symbols-outlined text-[#9f9f9f]">
              face
            </span>
          </div>

          <div class="flex justify-between place-items-center">
            <div class="flex gap-5">
              <p class="w-14 text-[#9f9f9f]">이메일</p>
              <p class="tracking-wider">
                <?= $this->session->userdata('user_email') ?>
              </p>
            </div>
            <span class="material-symbols-outlined text-[#9f9f9f]">
              mail
            </span>
          </div>

          <div class="flex justify-between place-items-center">
            <div class="flex gap-5">
              <p class="w-14 text-[#9f9f9f]">휴대폰</p>
              <p class="tracking-wider">
                <?= $this->session->userdata('user_phone') ?>
              </p>
            </div>
            <span class="material-symbols-outlined text-[#9f9f9f]">
              phone_iphone
            </span>
          </div>

          <div class="flex justify-between place-items-center">
            <div class="flex gap-5">
              <p class="text-[#9f9f9f]">가입날짜</p>
              <p class="tracking-wider">
                <?= $this->session->userdata('regdate') ?>
              </p>
            </div>
            <span class="material-symbols-outlined text-[#9f9f9f]">
              calendar_month
            </span>
          </div>

        </div>

        <!-- 마지막 로그인 및 로그아웃 -->
        <div class="bg-[#4f4f4f] rounded p-3 flex flex-col gap-3">
          <div class="flex gap-2 justify-center place-items-center bg-[#3f3f3f] rounded p-3">
            <span class="material-symbols-outlined text-yellow-500">
              shield
            </span>
            <p>본인이 로그인 및 로그아웃 한 사실이 없다면, 비밀번호 변경 후 고객센터로 문의바랍니다.</p>
          </div>
          <div class="flex gap-5 justify-around">
            <div class="flex flex-col justify-center place-items-center gap-3 bg-[#2f2f2f] w-full p-3">
              <p>마지막 로그인</p>
              <p class="text-[#9f9f9f] tracking-wider">
                <?= $last_login_logout->last_login ?>
              </p>
            </div>
            <div class="flex flex-col justify-center place-items-center gap-3 bg-[#2f2f2f] w-full p-3">
              <p>마지막 로그아웃</p>
              <p class="text-[#9f9f9f] tracking-wider">
                <?= substr($last_login_logout->last_logout, 0, 4) == '0000' ? '-' : $last_login_logout->last_logout ?>
              </p>
            </div>
          </div>

          <div class="flex gap-5 justify-around">
            <div class="flex flex-col justify-center place-items-center gap-3 bg-[#2f2f2f] w-full p-3">
              <p>접속 국가</p>
              <p class="text-[#9f9f9f] tracking-wider">
                대한민국(ko-kr)
              </p>
            </div>
            <div class="flex flex-col justify-center place-items-center gap-3 bg-[#2f2f2f] w-full p-3">
              <p>접속 브라우저</p>
              <p class="text-[#9f9f9f] tracking-wider">
                chrome(beta)
              </p>
            </div>
          </div>

        </div>

      </div>
    </div>
      
    <!-- 프로필 사진 -->
    <div class="flex flex-col w-full rounded-tl-md rounded-tr-md shadow-2xl border border-[#4f4f4f] bg-[#2f2f2f]">

      <div class="relative  w-full flex flex-col gap-10">

        <div class="absolute top-0 bg-[#3f3f3f] shadow-2xl p-3 rounded-b-2xl border-[#4f4f4f] border-b w-full flex gap-3 place-items-center justify-center">
          <span class="material-symbols-outlined">
            party_mode
          </span>
          <p>내 프로필 사진</p>
        </div>

        <div class="flex mt-20 justify-around place-items-center">

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
            <span id="arrow_profile" class="material-symbols-outlined cursor-default rotate-[270deg] duration-200 animate-pulse text-[#9f9f9f] text-4xl">
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

        </div>

        <!-- 파일 업로드 -->
        <form id="upload_form" accept=".jpg, .jpeg, .png, .gif" enctype="multipart/form-data" class="flex px-5 flex-col gap-3 place-items-center place-content-center justify-center">
          <div id="file_control" class="flex place-items-center justify-center w-full">
            <label for="userfile" class="flex flex-col items-center w-full justify-center h-24 border-2 border-gray-500 border-dashed rounded-lg cursor-pointer hover:bg-[#2f2f2f] duration-200 bg-[#3f3f3f]">
              <div class="flex flex-col gap-3 place-items-center justify-center text-sm">
                <div class="flex place-items-center gap-3 duration-200 animate-pulse">
                  <span class="material-symbols-outlined flex gap-2 place-items-center">
                    add_link
                  </span>
                  <p class="">
                    사진을 첨부하려면 클릭하세요
                  </p>
                </div>
              </div>
              <input name="userfile" id="userfile" type="file" class="hidden" />
            </label>
          </div>
          <button id="upload_button" class="hidden border border-blue-500 hover:border-[#3f3f3f] px-3 py-2 w-full bg-blue-500 rounded hover:translate-y-1 duration-200">
            적용하기
          </button>
          <div id="upload_file_type" class="flex gap-2 text-sm">
            <? $file_type = ['JPG', 'JPEG', 'PNG', 'GIF'] ?>
            <? foreach($file_type as $list):?>
              <p class="bg-[#4f4f4f] px-2 py-0.5 rounded border border-[#5f5f5f]">
                <?= $list ?>
              </p>
            <? endforeach ?>
          </div>
        </form>

      </div>

      <div class="p-5 w-full flex flex-col gap-3">

        <div class="flex justify-between">
          <p>과거 프로필 사진</p>
          <div class="flex gap-1 text-[#9f9f9f] text-sm">
            <p id="file_count">0</p>
            <p>/ 50개</p>
          </div>
        </div>

        <!-- 동적 생성 -->
        <div 
          id="profile_old" 
          class="
          flex flex-wrap gap-3 w-full border min-h-44 bg-[#1f1f1f] shadow-md border-[#3f3f3f] justify-center place-items-center h-full max-h-52 p-3 rounded overflow-y-auto
          ">
        </div>

      </div>

    </div>
  </div>
    
  <!-- 구분선 -->
  <div class="border-b border-gray-500"></div>

  <!-- 계정 정보가 일치하지 않을시 -->
  <div id='error_form' class="relative duration-200 animate-bounce shadow-xl hidden flex p-5 gap-3 border border-[#4f4f4f] bg-[#1f1f1f] w-full rounded">
    <span class="material-symbols-outlined duration-200 animate-pulse text-red-400">
      error
    </span>
    <p id='error_txt'>
      <?= validation_errors(); ?>
    </p>
    <button class="alert_remove-btn hover:scale-125 rounded-[50%] absolute top-2 duration-200 w-5 h-5 flex justify-center place-items-center right-2 p-1 bg-[#1f1f1f] hover:bg-red-500">
      <span class="material-symbols-outlined text-[20px]">
        close
      </span>
    </button>
  </div>

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
        <input id="email" type="email" placeholder="<?= $user->user_email ?>"
        class="pr-12 w-full px-5 py-3 hover:bg-opacity-80 rounded bg-[#4f4f4f] focus:bg-[#3f3f3f] border border-[#5f5f5f] focus:rounded-none outline-none duration-200">
        <!-- 이메일 수정 버튼 -->
        <div class="text-right">
          <button id="email_update_btn" class="bg-[#3f3f3f] w-[50%] lg:w-[40%] py-2 border border-[#5f5f5f] hover:border-yellow-500 duration-200 rounded">
            이메일 수정하기
          </button>
        </div>
      </div>

      <!-- 휴대폰 -->
      <div class="flex flex-col gap-3 w-full">
        <p class="px-1 hover:text-white hover:-translate-y-1 duration-200 cursor-default whitespace-nowrap max-w-min text-base">
          휴대폰
        </p>
        <div class="flex gap-3">
          <input id="phone_1" type="number" placeholder="010" disabled
          class="cursor-not-allowed text-center font-bold w-full px-5 py-3 hover:bg-opacity-80 rounded bg-[#2f2f2f] focus:bg-[#3f3f3f] border border-[#5f5f5f] focus:rounded-none outline-none duration-200">
          <input id="phone_2" type="number" placeholder="<?= substr($user->user_phone, 4, 4) ?>" maxlength="4"
          class="text-center w-full px-5 font-bold py-3 hover:bg-opacity-80 rounded bg-[#4f4f4f] focus:bg-[#3f3f3f] border border-[#5f5f5f] focus:rounded-none outline-none duration-200">
          <input id="phone_3" type="number" placeholder="<?= substr($user->user_phone, 9, 4) ?>" maxlength="4"
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
      <textarea id="memo" rows="5" type="text" placeholder="자신을 다른 사람에게 소개해 보세요~!" class="w-full px-5 py-3 hover:bg-opacity-80 rounded bg-[#3f3f3f] focus:bg-[#3f3f3f] border border-[#5f5f5f] focus:rounded-none outline-none duration-200"><?= htmlspecialchars($user->user_memo) ?></textarea>
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

<script>
  
  $(document).ready( () => {
    const user_email = $('#email').val();
    const user_phone = '010-' + $('#phone_2').val() + '-' + $('#phone_3').val();

  $('.alert_remove-btn').on('click', e => {
    e.preventDefault();
    $('#error_txt').empty();
    $('#error_form').addClass('hidden');
  });

  $('#nickname_update_btn').on('click', (e) => { // 닉네임 수정
    e.preventDefault();

    $('#error_txt').empty(); // 에러 메시지 초기화
    $('#error_form').removeClass('hidden');

    if($('#nickname').val().length < 2 || $('#nickname').val().length > 8) { // 닉네임 검사
      $('#error_txt').text('닉네임은 2~8 글자로 입력해주세요.');
      return;
    }

    if('<?= $this->session->userdata('user_nickname') ?>' == $('#nickname').val()) {
      $('#error_form').removeClass('hidden');
      $('#error_txt').text('현재 닉네임과 동일합니다.');
      return false;
    }

    if(!confirm($('#nickname').val() + '으로 닉네임을 변경하시겠습니까?')) {
      $('#error_txt').empty();
      $('#error_form').addClass('hidden');
      return;
    }
    
    $('#error_txt').empty();
    $('#error_form').addClass('hidden');

    $.ajax({
      url: '/user_information_c/update_nickname',
      type: 'post',
      dataType: 'json',
      data: {
        nickname: $('#nickname').val(),
      },
      success: (response) => {
        if (response.state) {
          // alert('닉네임이 변경되었습니다');
          location.reload();
        } else {
          $('#error_txt').append(response.detail);
          // alert('닉네임 변경에 실패했습니다');
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
      url: '/user_information_c/update_password',
      type: 'post',
      dataType: 'json',
      data: {
        password: $('#password_1').val(),
        password_check: $('#password_2').val(),
      },
      success: response => {
        if (response.state) {
          // alert('비밀번호가 변경되었습니다');
          location.reload();
        } else {
          $('#error_txt').append(response.detail);
          // alert('비밀번호 변경에 실패했습니다');
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

    $('#error_txt').empty(); // 에러 메시지 초기화
    $('#error_form').removeClass('hidden');

    if($('#email').val().length < 1){ // 이메일 정규식 검사
      $('#error_txt').text('이메일을 입력해 주세요.');
      return;
    }

    if($('#email').val()){ // 이메일 정규식 검사
      var regEmail = /^[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_\.]?[0-9a-zA-Z])*\.[a-zA-Z]{2,3}$/;
      if (!regEmail.test($('#email').val())) {
        $('#error_txt').text('이메일 형식이 맞지 않습니다.');
        return false;
      } else {
        $('#error_form').addClass('hidden');
      }
    }
    
    if(user_email == $('#email').val()) {
      $('#error_form').removeClass('hidden');
      $('#error_txt').text('현재 이메일과 동일합니다.');
      return false;
    }

    if('<?= $this->session->userdata('user_email') ?>' == $('#email').val()) {
      $('#error_form').removeClass('hidden');
      $('#error_txt').text('현재 이메일과 동일합니다.');
      return false;
    }

    if(!confirm($('#email').val() + ' 로 이메일을 변경하시겠습니까?')) {
      $('#error_txt').empty(); // 에러 메시지 초기화
      $('#error_form').addClass('hidden');
      return;
    }

    $('#error_txt').empty(); // 에러 메시지 초기화
    $('#error_form').addClass('hidden');

    $.ajax({
      url: '/user_information_c/update_email',
      type: 'post',
      dataType: 'json',
      data: {
        email: $('#email').val(),
      },
      success: response => {
        if (response.state) {
          // alert('이메일이 변경되었습니다');
          location.reload();
        } else {
          // alert('이메일 변경에 실패했습니다');
          $('#error_txt').append(response.detail); // 에러 메시지 초기화
        }
      },
      error: (response, s, e) => {
        console.log(response);
        console.log(s);
        console.log(e);
      }
    });
  });

  $('#phone_update_btn').on('click', e => { // 연락처 수정

    e.preventDefault();

    $('#error_txt').empty(); // 에러 메시지 초기화
    $('#error_form').removeClass('hidden');

    if($('#phone_2').val().length != 4 || $('#phone_3').val().length != 4){ // 휴대폰 검사
      $('#error_txt').text('휴대폰 번호는 4자 입력해주세요.');
      return;
    }

    if('<?= $this->session->userdata('user_phone') ?>' == '010-' + $('#phone_2').val() + '-' + $('#phone_3').val()) {
      $('#error_form').removeClass('hidden');
      $('#error_txt').text('현재 휴대폰 번호와 동일합니다.');
      return false;
    }

    if( ! confirm('연락처를 변경하시겠습니까?') ) {
      $('#error_txt').empty(); // 에러 메시지 초기화
      $('#error_form').addClass('hidden');
      return;
    }

    $('#error_txt').empty(); // 에러 메시지 초기화
    $('#error_form').addClass('hidden');

    $.ajax({
      url: '/user_information_c/update_phone',
      type: 'post',
      dataType: 'json',
      data: {
        phone: '010-' + $('#phone_2').val() + '-' + $('#phone_3').val(),
      },
      success: (response) => {
        if (response.state) {
          // alert('연락처가 변경되었습니다');
          location.reload();
        } else {
          // alert('연락처 변경에 실패했습니다');
          $('#error_txt').append(response.detail); // 에러 메시지 초기화
        }
      },
      error: (response, s, e) => {
        console.log(response);
        console.log(s);
        console.log(e);
      }
    });
  });

  $('#memo_update_btn').on('click', function(e) { // 소개 수정

    e.preventDefault();

    $('#error_txt').empty(); // 에러 메시지 초기화
    $('#error_form').removeClass('hidden');

    if($('#memo').val().length === 0) { // 메모 유효성 검사
      // $('#error_txt').text('메모는 10자 이상 입력해주세요.');
      // return;
    } else {
      if($('#memo').val().length > 100) {
        $('#error_txt').text('메모는 100자 이내로 입력해주세요.');
        return;
      }
    }

    if('<?= $this->session->userdata('user_memo') ?>' == $('#memo').val()) {
      $('#error_form').removeClass('hidden');
      $('#error_txt').text('현재 소개와 동일합니다.');
      return false;
    }

    if(!confirm('소개를 변경하시겠습니까?')) {
      $('#error_txt').empty(); // 에러 메시지 초기화
      $('#error_form').addClass('hidden');
      return;
    }

    $('#error_txt').empty(); // 에러 메시지 초기화
    $('#error_form').addClass('hidden');

    $.ajax({
      url: '/user_information_c/update_memo',
      type: 'post',
      dataType: 'json',
      data: {
        memo: $('#memo').val(),
      },
      success: (response) => {
        if (response.state) {
          // alert('메모가 변경되었습니다');
          location.reload();
        } else {
          // alert('메모 변경에 실패했습니다');
          $('#error_txt').append(response.detail); // 에러 메시지 초기화
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
      var fileName = file.name;
      var fileExtension = fileName.split('.').pop().toLowerCase();

      // 확장자가 jpg인지 확인
      if (['jpg', 'jpeg', 'png', 'gif'].indexOf(fileExtension) === -1) {
        alert('JPG, JPEG, GIF 파일만 업로드 가능합니다.');
        this.value = ''; // 입력 필드 초기화
        return false;
      }

      // 파일 읽기가 완료되었을 때 실행될 함수 정의
      reader.onload = e => {
        // 미리보기 이미지의 src 속성을 변경
        $('#on_profile').removeClass('hidden');
        $('#basic_profile').addClass('hidden');

        $('#arrow_profile').removeClass('text-[#9f9f9f]');
        // $('#arrow_profile').removeClass('anumate-pulse');
        $('#arrow_profile').addClass('text-green-500');
        // $('#arrow_profile').addClass('animate-bounce');
        
        $('#upload_button').addClass('bg-green-500');
        $('#upload_button').addClass('border-green-500');
        $('#upload_button').removeClass('bg-blue-500');
        $('#upload_button').removeClass('border-blue-500');

        $('#on_profile img').attr('src', e.target.result);

        $('#upload_button').removeClass('hidden');
        
        $('#file_control').addClass('hidden');
        $('#upload_file_type').addClass('hidden');
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
      var file_count = 0;  // 파일 카운트를 초기화
      if (response.state) {
        $.each(response.data, function(i, profile) {
          file_count++;  // 각 프로필을 순회할 때마다 카운트 증가
          // 답글 데이터를 HTML로 변환하여 추가
          profileBox.append(`
          <div class="profile-container relative flex justify-center place-items-center rounded">
            <img src="/uploads/${profile.file_name}" title="업로드 - ${profile.regdate}" class="w-20 h-20 rounded duration-200"></img>
            <button title="${profile.file_name} 프로필 삭제" data-profileid="${profile.file_name}" class="remove-btn hover:scale-125 rounded-[50%] absolute top-1 duration-200 w-5 h-5 flex justify-center place-items-center right-1 p-1 bg-[#1f1f1f] hover:bg-red-500">
              <span class="material-symbols-outlined text-[20px]">
                close
              </span>
            </button>
            <button title="${profile.file_name} 프로필로 적용하기" data-profileid="${profile.file_name}" class="update-btn hover:scale-125 rounded-[50%] absolute top-1 duration-200 w-5 h-5 flex justify-center place-items-center left-1 p-1 bg-[#1f1f1f] hover:bg-green-500">
              <span class="material-symbols-outlined text-[20px]">
                check
              </span>
            </button>
          </div>
          `);
        });
        $('#file_count').html(file_count);  // 프로필 개수 업데이트
      } else {
        // 데이터가 없는 경우의 처리...
        $('#file_count').html(0);  // 파일 개수를 0으로 설정

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
      $('#file_count').html('Error');  // 오류 발생시 표시 변경
      alert('프로필 사진을 불러오는 중 오류가 발생했습니다.');
    }
  });

  // 프로필 삭제
  $(document).on('click', '.remove-btn', function(e) {
    e.preventDefault();
    var profileId = $(this).data('profileid'); // 프로필 ID를 가져옵니다.
    var button = $(this); // 현재 클릭된 버튼을 저장

    if(!confirm(profileId + ' 프로필로 삭제하시겠습니까?')) {
      return;
    }
    
    $.ajax({
      url: '/user_information_c/delete_profile',
      type: 'POST',
      data: { profileId: profileId },
      success: function(response) {
        // 성공적으로 처리됐을 때의 로직
        $('#file_count').html($('#file_count').html() - 1);  // 프로필 개수 업데이트(감소)
        // console.log('성공: ', response);
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

    if(!confirm(profileId + ' 프로필로 적용하시겠습니까?')) {
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