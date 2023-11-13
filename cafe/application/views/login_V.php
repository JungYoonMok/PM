<div class="bg-[#3f3f3f] text-gray-50 w-full h-full my-5">

  <div class="py-10 grid place-items-center">

    <div class="bg-[#2f2f2f] border border-[#4f4f4f] w-[500px] px-5 py-10 rounded flex flex-col gap-5 relative drop-shadow-2xl">

      <!-- 계정 정보가 일치하지 않을시 -->
      <!-- <div class="p-5 animate-pulse flex gap-3 border bg-red-500 w-full opacity-80 rounded -mt-2 mb-5">
        <span class="material-symbols-outlined">error</span>
        <p class="">계정 정보를 다시 확인해 주세요</p>
      </div> -->

      <form id="loginForm" class="flex flex-col gap-5">

        <div class="flex flex-col gap-2">
          <h2>아이디</h2>
          <input name="user_id" id="user_id"
            class="w-full duration-100 bg-[#3f3f3f] focus:border border-blue-400 hover:bg-[#4f4f4f] focus:bg-[#2f2f2f] p-3 h-[50px] rounded outline-none"
            type="text" />
        </div>

        <div class="flex flex-col gap-2">
          <h2>비밀번호</h2>
          <input name="user_pw" id="user_pw"
            class="w-full font-black duration-100 focus:border border-blue-400 hover:bg-[#4f4f4f] focus:bg-[#2f2f2f] bg-[#3f3f3f] p-3 h-[50px] rounded outline-none"
            type="password" />
          <div class="flex place-content-end gap-1">
            <input class="outline-none cursor-pointer hover:opacity-70" id="check1" type="checkbox" />
            <label class="text-md cursor-pointer hover:opacity-70" for="check1">
              아이디 기억하기
            </label>
          </div>
        </div>

        <!-- 폼 벨리데이션 에러 -->
        <div>
          <p>
            <?= validation_errors() ?>
          </p>
        </div>

        <div class="text-center">
          <button type="submit"
            class="bg-[#4f4f4f] font-bold duration-200 my-5 hover:opacity-80 p-4 rounded w-full outline-none">
            로그인
          </button>
        </div>
      </form>

      <div class="flex w-full my-8 gap-3 px-20 text-gray-300">
        <div class="border-t border-dashed border-slate-300 w-full"></div>
        <p class="-mt-6 text-sm text-slate-600 font-bold bg-slate-200 p-3 rounded-[50%]">
          OR
        </p>
        <div class="border-t border-dashed border-slate-300 w-full"></div>
      </div>

      <div class="text-center opacity-80">
        <div class="flex place-content-center gap-3">
          <button onclick=snsBtn()
            class="cursor-not-allowed hover:border hover:border-slate-500 hover:scale-95 hover:opacity-90 duration-100 w-16 h-14 bg-green-500 text-4xl font-black rounded">
            N
          </button>
          <button onclick=snsBtn()
            class="cursor-not-allowed hover:border hover:border-slate-500 hover:scale-95 hover:opacity-90 duration-100 w-16 h-14 bg-yellow-500 font-black rounded">
            kakao
          </button>
          <button onclick=snsBtn()
            class="cursor-not-allowed hover:border hover:border-slate-500 hover:scale-95 hover:opacity-90 duration-100 w-16 h-14 bg-red-500 font-black rounded">
            Google
          </button>
          <button onclick=snsBtn()
            class="cursor-not-allowed hover:border hover:border-slate-500 hover:scale-95 hover:opacity-90 duration-100 w-16 h-14 bg-black opacity-80 font-black rounded">
            Apple
          </button>
          <button onclick=snsBtn()
            class="cursor-not-allowed hover:border hover:border-slate-500 hover:scale-95 hover:opacity-90 duration-100 w-16 h-14 bg-sky-500 text-4xl font-black rounded">
            t
          </button>
          <button onclick=snsBtn()
            class="cursor-not-allowed hover:border hover:border-slate-500 hover:scale-95 hover:opacity-90 duration-100 w-16 h-14 bg-blue-500 text-4xl font-black rounded">
            f
          </button>
        </div>
      </div>

    </div>

  </div>

</div>

<script>

  // 로그인
  $(document).ready(() => {
    $('#loginForm').on('submit', e => {
      e.preventDefault();
      const id = $('#user_id').val();
      const pw = $('#user_pw').val();
      $.ajax({
        url: '/Login_C/login',
        type: 'post',
        dataType: 'json',
        data: { username: id, password: pw },
        success: response => {
          if (id < 1) {
            alert('아이디를 입력해 주세요');
          } else if (pw < 1) {
            alert('비밀번호를 입력해 주세요');
          } else {

            if (response.state) { // 로그인 성공시 메인페이지로 이동
              location.href = '/';
            } else {
              alert(response.message);
            }

          }
        },
        error: (response, s, e) => {
          console.log('실패', response, s, e);
        }
      });
    });
  });

</script>