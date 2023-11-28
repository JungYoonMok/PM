<div class="bg-[#3f3f3f] text-gray-50 w-full duration-200">

  <div class="w-full flex place-items-center h-[70px] bg-[#2f2f2f] rounded-b border-b border-[#4f4f4f] drop-shadow-xl">
  
    <div class="relative w-full flex place-items-center text-gray-50 px-10">
      
      <div class="pt-3 focus:translate-y-1 pb-3 hover:scale-[98%] duration-200">
        <a href="/" class="font-['Nosifer'] flex justify-start place-items-center gap-3 text-xl text-[#fff] drop-shadow-2xl">
          <div class="rounded-[50%] w-[50px] duration-200 hover:animate-spin">
            <img src="/assets/image/world1.gif" alt="logo_img">
          </div>
          <p class="duration-200 hover:-translate-y-1 text-md md:text-base">
            hellow world !!
          </p>
        </a>
      </div>
      
      <div class="md:hidden fixed right-4 flex gap-3 text-gray-200">
        <button>
          <span class="material-symbols-outlined">
            list
          </span>
        </button>
      </div>

      <div class="hidden md:flex fixed right-4 gap-3 text-gray-200">

        <!-- 비회원 -->
        <div class="<?= $this->session->userdata('user_id') ? 'hidden' : 'inline' ?> flex">

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
        <div class="<?= $this->session->userdata('user_id') ? 'inline' : 'hidden' ?> flex">
          <a class="hover:bg-[#3f3f3f] font-bold py-3 px-5 rounded hover:scale-90 duration-100" href="/user_information_c">
            내정보
          </a>

          <!-- 구분 -->
          <p class="py-2 text-gray-500 text-lg">|</p>

          <a id="logout_btn" class="hover:bg-[#3f3f3f] font-bold py-3 px-5 rounded hover:scale-90 duration-100" href="/#">
            로그아웃
          </a>
        </div>

      </div>

    </div>
    
  </div>

</div>

<script>
  $('#logout_btn').click(function(e){
    e.preventDefault();
    if(confirm('로그아웃 하시겠습니까?')){

    $.ajax({
        url: '/Login_C/logout',
        type: 'post',
        dataType: 'json',
        success: function(response) {
          console.log(response);
          if(response.state){
            location.href = '/login';
          } else {
            console.log(response.error);
          }},
        error: function(response) {
          console.log('오류', response);
        }
      });
    }
  });
</script>