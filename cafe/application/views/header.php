<div class="relative bg-[#3f3f3f] text-gray-50 w-full duration-200">

  <div class="w-full flex place-items-center h-[70px] bg-[#2f2f2f] rounded-b border-b border-[#4f4f4f] drop-shadow-xl">
  
    <div class="relative w-full flex place-items-center text-gray-50 px-10">
      
      <div class="pt-3 pb-3 hover:scale-110 duration-200">
        <a href="/" class="font-['Nosifer'] flex justify-start place-items-center gap-3 text-xl text-[#fff] drop-shadow-2xl">
          <div class="rounded-[50%] w-[50px] duration-200 hover:animate-spin">
            <img src="/assets/image/world1.gif" alt="logo_img">
          </div>
          <p class="duration-200 text-md md:text-base">
            hellow world !!
          </p>
        </a>
      </div>
      
      <div class="md:hidden fixed right-4 flex gap-3 text-gray-200">
        <button id="mobile_menu_btn">
          <span class="material-symbols-outlined">
            list
          </span>
        </button>
      </div>

      <div class="hidden md:flex fixed right-4 gap-3 text-gray-200">

        <!-- 비회원 -->
        <div class="<?= $this->session->userdata('user_id') ? 'hidden' : 'inline' ?> flex">

          <a href="/login" class="cursor-pointer flex gap-2 place-items-center py-3 px-5 hover:bg-[#3f3f3f] font-bold rounded hover:scale-90 duration-100">
            <span class="material-symbols-outlined">
              login
            </span>
            <p>
              로그인
            </p>
          </a>

          <!-- 구분 -->
          <p class="py-2 text-gray-500 text-lg">|</p>

          <a href="/register" class="cursor-pointer flex gap-2 place-items-center py-3 px-5 hover:bg-[#3f3f3f] font-bold rounded hover:scale-90 duration-100">
            <span class="material-symbols-outlined">
              person_add
            </span>
            <p>
              회원가입
            </p>
          </a>

        </div>

        <!-- 회원 -->
        <div class="<?= $this->session->userdata('user_id') ? 'inline' : 'hidden' ?> flex">
        
          <a href="/user_information_c" class="cursor-pointer flex gap-2 place-items-center py-3 px-5 hover:bg-[#3f3f3f] font-bold rounded hover:scale-90 duration-100">
            <span class="material-symbols-outlined">
              manage_accounts
            </span>
            <p>
              내정보
            </p>
          </a>

          <!-- 구분 -->
          <p class="py-2 text-gray-500 text-lg">|</p>

          <div id="logout_btn" class="cursor-pointer flex gap-2 place-items-center py-3 px-5 hover:bg-[#3f3f3f] font-bold rounded hover:scale-90 duration-100">
            <span class="material-symbols-outlined">
              power_settings_new
            </span>
            <p>
              로그아웃
            </p>
          </div>

        </div>

      </div>

    </div>
    
  </div>
  
  <!-- side bar -->
  <div id="side_bar" class="hidden">
    <p>hi</p>
  </div>

</div>

<script>
  $('#mobile_menu_btn').click(function(e){
    e.preventDefault();
    // $('#mobile_menu').toggleClass('hidden');
    alert('시간 관계상 구현되지 못하였습니다 😂');
  });

  $('#logout_btn').click(function(e){
    e.preventDefault();

    if(!confirm('로그아웃 하시겠습니까?')){
      return;
    };

    $.ajax({
      url: '/Login_C/logout',
      type: 'post',
      dataType: 'json',
      success: function(response) {
        if(response.state){
          location.href = '/login';
        } else {
          console.log('오류: ', response);
        }},
      error: function(response) {
        console.log('오류', response);
      }
    });
  });
</script>