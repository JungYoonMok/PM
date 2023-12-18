<div class="bg-[#3f3f3f] flex justify-center place-content-center h-full text-gray-50">

  <div class="py-10 p-1 md:p-5 grid place-items-center">

    <div class="bg-[#2f2f2f] border border-[#4f4f4f] w-[400px] md:w-[500px] px-5 py-10 rounded flex flex-col gap-5 relative drop-shadow-2xl">

      <!-- 계정 정보가 일치하지 않을시 -->
      <div id='error_form' class="relative duration-200 shadow-xl hidden flex p-5 gap-3 border border-[#4f4f4f] bg-[#1f1f1f] w-full rounded">
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

        <div class="flex flex-col gap-2">
          <h2>아이디</h2>
          <input name="user_id" id="user_id" value="<?= set_value('user_id') ?>"
            class="w-full duration-100 bg-[#3f3f3f] focus:border border-blue-400 hover:bg-[#4f4f4f] focus:bg-[#2f2f2f] p-3 h-[50px] rounded outline-none"
            type="text" />
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
          <a href="/find_account_c">계정 정보 찾기</a>
          <a href="/register">회원가입</a>
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
        <div class="flex place-content-center gap-3 overflow-x-auto overflow-y-hidden">
          <button onclick=snsBtn()
            class="cursor-not-allowed hover:border hover:border-slate-500 hover:scale-95 hover:opacity-90 duration-100 w-14 h-12 bg-green-500 text-4xl font-black rounded">
            N
          </button>
          <button onclick=snsBtn()
            class="cursor-not-allowed hover:border hover:border-slate-500 hover:scale-95 hover:opacity-90 duration-100 w-14 h-12 bg-yellow-500 font-black rounded">
            kakao
          </button>
          <button onclick=snsBtn()
            class="cursor-not-allowed hover:border hover:border-slate-500 hover:scale-95 hover:opacity-90 duration-100 w-14 h-12 bg-red-500 font-black rounded">
            Google
          </button>
          <button onclick=snsBtn()
            class="cursor-not-allowed hover:border hover:border-slate-500 hover:scale-95 hover:opacity-90 duration-100 w-14 h-12 bg-black opacity-80 font-black rounded">
            Apple
          </button>
          <button onclick=snsBtn()
            class="cursor-not-allowed hover:border hover:border-slate-500 hover:scale-95 hover:opacity-90 duration-100 w-14 h-12 bg-sky-500 text-4xl font-black rounded">
            t
          </button>
          <button onclick=snsBtn()
            class="cursor-not-allowed hover:border hover:border-slate-500 hover:scale-95 hover:opacity-90 duration-100 w-14 h-12 bg-blue-500 text-4xl font-black rounded">
            f
          </button>
        </div>
      </div>

    </div>

  </div>

</div>

<script src="/javascript/user/login.js"></script>