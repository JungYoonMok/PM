<div class="fixed md:static top-0 z-50 w-full">

  <div class="relative bg-[#3f3f3f] text-gray-50 w-full duration-200">
  
    <div class="w-full flex place-items-center h-[70px] bg-[#2f2f2f] rounded-b border-b border-[#4f4f4f] drop-shadow-xl">
    
      <div class="relative w-full flex justify-between place-items-center text-gray-50">
        
        <div class="py-3 pl-3 md:pl-5 hover:scale-110 duration-200">
          <a href="/" class="font-['Nosifer'] flex justify-start place-items-center gap-3 text-xl text-[#fff] drop-shadow-2xl">
            <div class="rounded-[50%] w-[50px] duration-200 hover:animate-spin">
              <img src="/assets/image/world1.gif" alt="logo_img">
            </div>
            <p class="duration-200 text-md md:text-base">
              hellow world !!
            </p>
          </a>
        </div>
        
        <div id="list_btn" class="md:hidden fixed right-4 flex gap-3 text-gray-200 duration-200 active:bg-[#2f2f2f] p-2 rounded active:translate-y-1">
          <button id="mobile_menu_btn">
            <span class="material-symbols-outlined <?= $this->uri->segment(1) == 'login' || $this->uri->segment(1) == 'register' || $this->uri->segment(1) == 'find_account_c' ? 'hidden' : '' ?>">
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
    <div id="side_bar" class="flex flex-col justify-center h-auto place-items-center gap-3 hidden md:hidden z-50 w-full absolute">
  
      <div class="px-3 py-5 flex flex-col gap-3 bg-[#1f1f1f] duration-200 shadow-2xl rounded w-full boder-x border-b border-[#4f4f4f]">
  
        <!-- 사용자 정보 -->
        <div class="flex justify-between place-items-center duration-200">
  
          <a href="/user_information_c" class="flex gap-3 place-items-center hover:underline underline-offset-4 hover:scale-[97%] hover:opacity-90 duration-200 decoration-2 decoration-white">
            <div class="relative drop-shadow-2xl flex rounded-xl place-content-center border border-[#4f4f4f] h-14 w-14 bg-[#2f2f2f]">
              <? if (empty($this->session->userdata('user_profile'))) : ?>
                <p class="material-symbols-outlined text-5xl text-gray-400 flex place-items-center justify-center">
                  person
                </p>
              <? else : ?>
                <img width="100%" src="/uploads/<?= $this->session->userdata('user_profile') ?>"
                  class="material-symbols-outlined rounded-xl text-5xl w-full h-full text-gray-400 duration-200">
                </img>
              <? endif ?>
            </div>
            <div class="flex gap-3 place-items-center">
              <p class="bg-[#3f3f3f] px-1.5 py-0.5 rounded text-sm border border-[#5f5f5f]">
                Lv.<?= $level_converter['level'] ?>
              </p>
              <p>
                <?= $this->session->userdata('user_nickname') ?>
                ( <?= $this->session->userdata('user_id') ?> )
              </p>
            </div>
          </a>
  
          <div id="logout_btn2" class="cursor-pointer text-gray-300 flex gap-2 px-5 py-3 place-items-center hover:bg-[#3f3f3f] font-bold rounded hover:scale-90 duration-100">
            <span class="material-symbols-outlined">
              power_settings_new
            </span>
            <p>
              로그아웃
            </p>
          </div>
  
        </div>
  
          <!-- 경험치, 포인트 -->
          <?
            // 토탈 경험치 변수
            $exp_per = substr((($level_converter['exp'] - $level_converter['previous_level_end_exp']) / ($level_converter['end_exp'] - $level_converter['previous_level_end_exp']) * 100), 0, 4);
          ?>
          <div class="flex flex-col gap-3 p-3 duration-200 rounded border border-[#4f4f4f] bg-[#2f2f2f] text-sm font-[s-core5]">
            <a href="/my_activity/exp_point" class="flex justify-between hover:underline underline-offset-4 hover:opacity-90 duration-200 decoration-2 decoration-white">
              <p>경험치 <?= $level_converter['exp'] ?> / <?= $level_converter['end_exp'] ?></p>
              <p class="text-right">
                <?= $exp_per ?>%
              </p>
            </a>
            <div class="w-full h-4 mb-7 rounded-full bg-gray-600 duration-200">
              <div 
                class="h-4 mb-3 rounded-full duration-200 hover:scale-105
                <?= ($exp_per > 90 ? 'bg-red-500' : 'bg-blue-500') ?>
                <?= ($exp_per > 95 ? 'animate-pulse' : 'bg-blue-500') ?>
                " 
                style="width: <?= $exp_per ?>%">
              </div>
              <a href="/my_activity/exp_point" class="hover:underline underline-offset-4 hover:opacity-90 duration-200 decoration-2 decoration-white">
                포인트 <?= $point_total ?>
              </a>
            </div>
          </div>
  
        <!-- 구분선 댓글 달릴시 이동되는 구간 -->
        <div class="border-b border-[#4f4f4f]"></div>
  
        <!-- 메뉴 -->
        <div class="flex flex-col gap-3">
  
          <div class="flex flex-col p-1 gap-1 bg-[#2f2f2f] rounded border border-[#4f4f4f]">
  
            <a href="/" id="home"
              class="deration-500 relative w-full duration-100 p-3 rounded hover:text-gray-100 <?= empty($this->uri->segment(1)) ? 'bg-[#4f4f4f] hover:translate-x-1' : 'hover:bg-[#4f4f4f]' ?>">
              <span class="w-full h-full flex gap-5">
                <span class="material-symbols-outlined">
                  home
                </span>
                <div class="flex place-content-around">
                  <p class="">홈</p>
  
                </div>
              </span>
            </a>
  
            <a href="/notice/list" id="notice"
              class="deration-500 relative w-full duration-100 p-3 rounded hover:text-gray-100 <?= $this->uri->segment(1) == 'notice' ? 'bg-[#4f4f4f] hover:translate-x-1' : 'hover:bg-[#4f4f4f]' ?>">
              <span class="w-full h-full flex gap-5">
                <span class="material-symbols-outlined">
                  notifications
                </span>
                <div class="flex place-content-around">
                  <p class="">공지사항</p>
                  <p class="
                    whitespace-nowrap w-8 duration-200 border border-blue-400 opacity-80 drop-shadow-2xl animate-pulse absolute right-2 bg-blue-500 px-2 py-1 rounded text-xs flex place-content-center
                  <?= $notice_total == 0 ? "hidden" : "" ?>
                  ">
                    <?= $notice_total ?>
                  </p>
                </div>
              </span>
            </a>
  
            <a href="/freeboard/list" id="freeboard"
              class="deration-500 relative w-full duration-100 p-3 rounded hover:text-gray-100 <?= $this->uri->segment(1) == 'freeboard' ? 'bg-[#4f4f4f] hover:translate-x-1' : 'hover:bg-[#4f4f4f]' ?>">
              <span class="w-full h-full flex gap-5">
                <span class="material-symbols-outlined">
                  border_color
                </span>
                <div class="flex place-content-around">
                  <p class="">자유게시판</p>
                  <p class="
                    whitespace-nowrap w-8 duration-200 border border-blue-400 opacity-80 drop-shadow-2xl animate-pulse absolute right-2 bg-blue-500 px-2 py-1 rounded text-xs flex place-content-center
                  <?= $freeboard_total == 0 ? "hidden" : "" ?>
                  ">
                    <?= $freeboard_total ?>
                  </p>
                </div>
              </span>
            </a>
  
            <a href="/hellow/list" id="hellow"
              class="deration-500 relative w-full duration-100 p-3 rounded hover:text-gray-100 <?= $this->uri->segment(1) == 'hellow' ? 'bg-[#4f4f4f] hover:translate-x-1' : 'hover:bg-[#4f4f4f]' ?>">
              <span class="w-full h-full flex gap-5">
                <span class="material-symbols-outlined">
                  waving_hand
                </span>
                <div class="flex place-content-around">
                  <p class="">가입인사</p>
                    <p class="
                    whitespace-nowrap w-8 duration-200 border border-blue-400 opacity-80 drop-shadow-2xl animate-pulse absolute right-2 bg-blue-500 px-2 py-1 rounded text-xs flex place-content-center
                  <?= $hellow_total == 0 ? "hidden" : "" ?>
                  ">
                    <?= $hellow_total ?>
                  </p>
                </div>
              </span>
            </a>
  
          </div>
  
        </div>
  
      </div>
  
      <button id="mobile_menu_btn2" class="flex justify-center shadow-2xl place-items-center rounded-[50%] w-16 h-16 p-5 border-2 border-[#7f7f7f] bg-[#4f4f4f]">
        <span class="material-symbols-outlined duration-200 animate-pulse active:animate-none">
          close
        </span>
      </button>
  
    </div>
  
  </div>

</div>

<script>
  $('#mobile_menu_btn').click(function(e){
    e.preventDefault();
    if($('#side_bar').hasClass('hidden')) {
      $('#side_bar').removeClass('hidden');
      $('#list_btn').addClass('bg-[#1f1f1f]');
    } else {
      $('#list_btn').removeClass('bg-[#1f1f1f]');
      $('#side_bar').addClass('hidden');
    }
  });

  $('#mobile_menu_btn2').click(function(e){
    e.preventDefault();
    $('#list_btn').removeClass('bg-[#1f1f1f]');
    $('#side_bar').addClass('hidden');
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

  $('#logout_btn2').click(function(e){
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