<div class="bg-[#3f3f3f] flex justify-center place-content-center h-full text-gray-50">

  <div class="md:py-10 p-1 md:p-5 md:flex md:place-items-center w-full md:w-[600px]">

    <div class="bg-[#2f2f2f] border border-[#4f4f4f] px-5 py-10 rounded flex flex-col gap-5 relative drop-shadow-2xl">

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

      <form id="loginForm" class="flex flex-col gap-5">

        <div class="flex flex-col gap-2 relative">
          <h2>아이디</h2>
          <input name="user_id" id="user_id" value="<?= set_value('user_id') ?>"
            class="w-full duration-100 pr-10 bg-[#3f3f3f] focus:border border-blue-400 hover:bg-[#4f4f4f] focus:bg-[#2f2f2f] p-3 h-[50px] rounded outline-none"
            type="text" />
          <span id="auto_icon" title="📌 아이디 기억하기 기능이 켜져있습니다" class="hidden cursor-help material-symbols-outlined absolute top-11 right-2 text-yellow-500 shadow-2xl">
            motion_photos_auto
          </span>
        </div>

        <div class="flex flex-col gap-2">
          <h2>비밀번호</h2>
          <input name="user_pw" id="user_pw" value="<?= set_value('user_pw') ?>"
            class="w-full font-black duration-100 focus:border border-blue-400 hover:bg-[#4f4f4f] focus:bg-[#2f2f2f] bg-[#3f3f3f] p-3 h-[50px] rounded outline-none"
            type="password" />
          <div class="flex place-content-end gap-1">
            <input class="outline-none cursor-pointer hover:opacity-70" id="check1" type="checkbox" />
            <label class="text-md cursor-pointer hover:opacity-70" for="check1">
              아이디 기억하기
            </label>
          </div>
        </div>

        <div class="text-center">
          <button type="submit"
            class="bg-[#4f4f4f] font-bold duration-200 my-5 hover:opacity-80 p-4 rounded w-full outline-none">
            로그인
          </button>
        </div>
        <div class="text-right flex flex-col gap-2">
          <a class="duration-200 hover:-translate-x-2 focus:translate-y-1 hover:text-[#9f9f9f]" href="/find_account_c">계정 정보 찾기</a>
          <a class="duration-200 hover:-translate-x-2 focus:translate-y-1 hover:text-[#9f9f9f]" href="/register">회원가입</a>
        </div>
      </form>

      <div class="flex w-full my-8 gap-3 px-20 text-gray-300">
        <div class="border-t border-dashed border-slate-300 w-full"></div>
        <p class="-mt-6 text-sm text-slate-600 font-bold bg-slate-200 p-3 rounded-[50%] line-through decoration-4 decoration-red-400">
          OR
        </p>
        <div class="border-t border-dashed border-slate-300 w-full"></div>
      </div>

      <div class="text-center opacity-90 flex flex-col gap-3 md:bg-[#2f2f2f] py-3 rounded md:border border-[#3f3f3f] md:shadow-lg">
        
        <div class="flex place-content-center gap-3 overflow-x-auto overflow-y-hidden">
          <button
            class="cursor-not-allowed  hover:border hover:border-slate-500 hover:scale-95 hover:opacity-90 duration-100 w-14 h-12 bg-green-500 text-2xl font-black rounded">
            N
          </button>
          <button
            class="cursor-not-allowed  hover:border hover:border-slate-500 hover:scale-95 hover:opacity-90 duration-100 w-14 h-12 bg-yellow-500 font-black rounded">
            kakao
          </button>
          <button
            class="cursor-not-allowed  hover:border hover:border-slate-500 hover:scale-95 hover:opacity-90 duration-100 w-14 h-12 bg-red-500 font-black rounded">
            Google
          </button>
          <button
            class="cursor-not-allowed  hover:border hover:border-slate-500 hover:scale-95 hover:opacity-90 duration-100 w-14 h-12 bg-black opacity-80 font-black rounded">
            Apple
          </button>
          <button
            class="cursor-not-allowed  hover:border hover:border-slate-500 hover:scale-95 hover:opacity-90 duration-100 w-14 h-12 bg-sky-500 text-2xl font-black rounded">
            t
          </button>
          <button
            class="cursor-not-allowed  hover:border hover:border-slate-500 hover:scale-95 hover:opacity-90 duration-100 w-14 h-12 bg-blue-500 text-2xl font-black rounded">
            f
          </button>
        </div>

        <div class="whitespace-normal shadow-xl md:shadow-none flex flex-col md:flex-row gap-2 place-items-center justify-center rounded bg-[#1f1f1f] md:bg-[#2f2f2f] border md:border-none border-[#3f3f3f] p-3">
          <span class="material-symbols-outlined text-3xl text-red-400 duration-200 animate-pulse">
            emergency_home
          </span>
          <p class="text-center md:text-left text-sm tracking-wide">
            현재 해당 기능은 점검중입니다, 이용에 불편을드려 대단히 죄송합니다.
          </p>
        </div>

      </div>

    </div>

  </div>

</div>

<!-- <script src="/javascript/user/login.js"></script> -->

<script>

  // 로그인
$(document).ready( () => {

$('#loginForm').on('submit', e => {
  e.preventDefault();
  $('#error_txt').empty();
  $('#error_form').removeClass('hidden');

  if($('#user_id').val().length < 4 || $('#user_id').val().length > 10) {
    $('#error_txt').text('아이디는 4~10글자로 입력해주세요.');
    return;
  }

  if($('#user_pw').val().length < 6 || $('#user_pw').val().length > 20) {
    $('#error_txt').text('비밀번호는 6~20자 입력해주세요.');
    return;
  }

  $('#error_txt').empty();
  $('#error_form').addClass('hidden');
  
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

        if(localStorage.getItem('auto_id') === 'true') {
          localStorage.setItem('user_id', $('#user_id').val());
        } else {
          localStorage.removeItem('user_id');
        }

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

$('.remove-btn').on('click', e => {
  e.preventDefault();
  $('#error_txt').empty();
  $('#error_form').addClass('hidden');
});

if(localStorage.getItem('auto_id') === 'true') {
  $('#check1').prop('checked', true);
  $('#user_id').val(localStorage.getItem('user_id'));
} else {
  $('#check1').prop('checked', false);
  $('#user_id').val('');
}

if($('#check1').prop('checked')) {
  $('#auto_icon').removeClass('hidden');
  if(localStorage.getItem('user_id')) $('#user_id').val(localStorage.getItem('user_id'));
  } else {
    $('#user_id').val('');
  $('#auto_icon').addClass('hidden');
}

// 아이디 기억하기
$('#check1').on('click', (e) => {
  if($('#check1').prop('checked')) {
    $('#auto_icon').removeClass('hidden');
    if(localStorage.getItem('user_id')) $('#user_id').val(localStorage.getItem('user_id'));
    if(!confirm('🔔 보안상의 이유로 공공장소에서는 사용을 자제해주세요\n📌 그래도 아이디를 기억하시겠습니까?')) {
      $('#auto_icon').addClass('hidden');
      $('#check1').prop('checked', false);
      return;
    }
  } else {
    $('#auto_icon').addClass('hidden');
    $('#user_id').val('');
  }
  localStorage.setItem('auto_id', $('#check1').prop('checked'));
});

});


</script>