<div class="bg-[#3f3f3f] text-gray-50 w-full duration-200">

  <div class="w-full flex place-items-center h-[70px] bg-[#2f2f2f] rounded-b border-b border-[#4f4f4f] drop-shadow-xl">
  
    <div class="relative w-full flex place-items-center text-gray-50 px-10">

      <div class="pt-3 focus:translate-y-1 pb-3 hover:scale-[95%] duration-200">
        <a href="/" class="font-['Nosifer'] text-xl text-[#fff] drop-shadow-2xl">
          hellow world !!
        </a>
      </div>

      <!-- 비회원 -->
      <div class="<?= $this->session->userdata('user_id') ? 'hidden' : 'inline' ?> fixed right-4 flex gap-3 text-gray-200">
        <a class="hover:bg-[#3f3f3f] font-bold py-3 px-5 rounded hover:scale-90 duration-100" href="/login">
          로그인
        </a>

        <!-- 구분 -->
        <p class="py-2 text-gray-500 text-lg">|</p>

        <a class="hover:bg-[#3f3f3f] font-bold py-3 px-5 rounded hover:scale-90 duration-100" href="/register">
          회원가입
        </a>
      </div>

      <!-- 회원 -->
      <div class="<?= $this->session->userdata('user_id') ? 'inline' : 'hidden' ?> fixed right-4 flex gap-3 text-gray-200">
        <a class="hover:bg-[#3f3f3f] font-bold py-3 px-5 rounded hover:scale-90 duration-100" href="/#">
          내정보
        </a>

        <!-- 구분 -->
        <p class="py-2 text-gray-500 text-lg">|</p>

        <a class="hover:bg-[#3f3f3f] font-bold py-3 px-5 rounded hover:scale-90 duration-100" href="/#">
          로그아웃
        </a>
      </div>

    </div>
    
  </div>

</div>