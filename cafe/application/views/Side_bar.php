<div class="flex relative flex-col p-5 duration-200 bg-[#2f2f2f] text-gray-100">

  <div class="">

    <div class="absolute top-0 duration-200 cursor-default w-full bg-[#1f1f1f] rounded-b-2xl border-b-2 border-[#4f4f4f] shadow-2xl py-2 gap-3 -ml-5 -mr-5 flex justify-center place-items-center">
      <span class="material-symbols-outlined text-green-500 duration-200 hover:-rotate-45">
        local_cafe
      </span>
      <p>나만의 카페</p>
    </div>

    <!-- 회원 전용 -->
    <div class="<?= $this->session->userdata('user_id') ? 'inline' : 'hidden' ?> flex flex-col gap-3">

      <div class="flex my-3 gap-3 mt-12">
        <!-- 프로필 -->
        <div
          class="relative drop-shadow-2xl flex rounded-[50%] place-content-center border-2 border-gray-500 h-20 w-20  bg-[#3f3f3f]">

          <? if ($this->session->userdata('user_profile') == '' || null) : ?>
            <p class="material-symbols-outlined text-5xl text-gray-400 flex place-items-center justify-center">
              person
            </p>
          <? else : ?>
            <img width="100%" src="/uploads/<?= $this->session->userdata('user_profile') ?>"
              class="material-symbols-outlined rounded-[50%] text-5xl w-full h-full text-gray-400 duration-200">
            </img>
          <? endif ?>

          <div class="absolute right-[0px] bottom-[-8px] w-8 h-8">
            <a href="/user_information_c"
              class="bg-[#2f2f2f] rounded-[50%] p-1 cursor-pointer material-symbols-outlined hover:animate-spin duration-200">
              settings
            </a>
          </div>

        </div>

        <div class="flex flex-col gap-1">
          
          <!-- 닉네임 및 등급 -->
          <div class="flex gap-3 place-items-center">
            <a class="hover:underline underline-offset-4 hover:scale-[97%] hover:opacity-90 duration-200 decoration-2 decoration-white"
              href="/user_information_c">
              <?= $this->session->userdata('user_nickname') ?>
            </a>
            <p class="bg-[#3f3f3f] px-1.5 py-0.5 rounded text-sm border border-[#5f5f5f]">
              Lv.<?= $level_converter['level'] ?>
            </p>
          </div>

          <!-- 가입일자 -->
          <div>
            <p class="text-sm"><?= substr($this->session->userdata('regdate'), 0, 10) ?>. 가입</p>
          </div>

          <!-- 안내 -->
          <div>
            <p class="text-sm">방문을 환영합니다</p>
          </div>

        </div>
        
      </div>

      <?
        // 토탈 경험치 변수
        $exp_per = substr((($level_converter['exp'] - $level_converter['previous_level_end_exp']) / ($level_converter['end_exp'] - $level_converter['previous_level_end_exp']) * 100), 0, 4);
      ?>
      
      <!-- 경험치, 포인트 -->
      <div class="flex flex-col gap-3 p-3 duration-200 rounded border border-[#4f4f4f] bg-[#3f3f3f] text-sm font-[s-core5]">
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

      <!-- 구분선 -->
      <div class="border-b mb-3 border-gray-400"></div>

      <!-- 기타 -->
      <div class="flex gap-2 flex-col text-sm">
        <!-- <div class="flex place-content-between">
          <div class="flex gap-2">
            <span class="material-symbols-outlined text-green-500">
              nature
            </span>
            <p>소나무</p>
          </div>
          <a href="#"
            class="hover:underline underline-offset-4 hover:scale-[97%] hover:opacity-90 duration-200 decoration-2 decoration-white">
            등급 안내
          </a>
        </div> -->
        <div class="flex place-content-between">
          <div class="flex gap-2">
            <span class="material-symbols-outlined">
              person_book
            </span>
            <p>방문</p>
          </div>
          <p><?= $login_total ?> 회</p>
        </div>
        <div class="flex place-content-between">
          <div class="flex gap-2">
            <span class="material-symbols-outlined">
              post
            </span>
            <a href="/my_activity/post" class="hover:underline underline-offset-4 hover:opacity-90 duration-200 decoration-2 decoration-white">
              내가 쓴 게시글
            </a>
          </div>
          <a href="/my_activity/post"
            class="hover:underline underline-offset-4 hover:opacity-90 duration-200 decoration-2 decoration-white">
            <?= $post_total ?> 개
          </a>
        </div>
        <div class="flex place-content-between">
          <div class="flex gap-2">
            <span class="material-symbols-outlined rotate-180">
              reply
            </span>
            <a href="/my_activity/comment" class="hover:underline underline-offset-4 hover:opacity-90 duration-200 decoration-2 decoration-white">
              내가 쓴 댓글
            </a>
          </div>
          <a href="/my_activity/comment"
            class="hover:underline underline-offset-4 hover:opacity-90 duration-200 decoration-2 decoration-white">
            <?= $comment_total ?> 개
          </a>
        </div>
      </div>

      <!-- 글쓰기 및 채팅 -->
      <div class="flex flex-col gap-3 text-center">
        <a href="/post_create"
          class="px-3 py-2 w-full rounded bg-blue-500 duration-200 hover:opacity-80">
          카페 글쓰기
        </a>
      </div>

      <!-- 검색 -->
      <!-- <div class="flex">
        <input
          class="bg-[#5f5f5f] w-full rounded-l hover:bg-[#4f4f4f] border-[#5f5f5f] border focus:bg-[#4f4f4f] focus:border-blue-500 duration-150 outline-none p-2"
          type="text">
        <button class="bg-blue-500 w-[30%] p-2 rounded-r hover:opacity-80 duration-200 whitespace-nowrap">
          검색
        </button>
      </div> -->

      <!-- 구분선 -->
      <div class="border-b my-3 border-gray-400"></div>

      <!-- 메뉴 -->
      <div class="flex flex-col gap-1 bg-[#3f3f3f] p-2 rounded shadow-lg border border-[#4f4f4f] duration-200 hover:scale-[103%]">

        <!-- 커뮤니티 -->
        <div class="flex justify-between p-3">
          <div class="flex gap-3 place-items-center">
            <p class="font-bold">커뮤니티</p>
            <div id="new_post" >
              <p class="
              <?= ($notice_total + $freeboard_total + $hellow_total) == 0 ? "hidden" : '' ?> 
              h-5 w-5 rounded-[50%] bg-blue-500 border border-[#5f5f5f] text-xs pl-[4.5px] pt-[1px] duration-200 animate-pulse">
                N
              </p>
            </div>
          </div>
          <button id="board_list_btn" class="duration-200">
            <span class="material-symbols-outlined">
              expand_more
            </span>
          </button>
        </div>

        <!-- 구분선 -->
        <div id="line" class="border-b border-gray-400"></div>

        <a href="/notice/list" id="notice"
          class="deration-500 relative w-full duration-100 p-2 rounded hover:text-gray-100 <?= $this->uri->segment(1) == 'notice' ? 'bg-[#2f2f2f] hover:translate-x-1' : 'hover:bg-[#4f4f4f]' ?>">
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
          class="deration-500 relative w-full duration-100 p-2 rounded hover:text-gray-100 <?= $this->uri->segment(1) == 'freeboard' ? 'bg-[#2f2f2f] hover:translate-x-1' : 'hover:bg-[#4f4f4f]' ?>">
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
          class="deration-500 relative w-full duration-100 p-2 rounded hover:text-gray-100 <?= $this->uri->segment(1) == 'hellow' ? 'bg-[#2f2f2f] hover:translate-x-1' : 'hover:bg-[#4f4f4f]' ?>">
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

      <!-- 구분선 -->
      <div class="border-b my-3 border-gray-400"></div>

      <!-- 방문자 및 회원수 -->
      <div class="relative bg-[#3f3f3f] p-3 rounded text-sm flex flex-col gap-3 border border-[#4f4f4f] shadow-lg duration-200 hover:scale-[103%]">

        <!-- 라벨 -->
        <!-- <div class="bg-blue-500 absolute -top-0 -left-3 -rotate-45 rounded-sm shadow-2xl font-[s-core2]">
          <p class="w-10 text-center font-bold">No.1</p>
        </div> -->
        
        <div class="flex flex-col gap-3">
          <div class="flex justify-between">
            <div class="flex gap-2 place-items-center">
              <span class="material-symbols-outlined">
                person
              </span>
              <p>방문자</p>
            </div>
            <div class="flex place-items-center px-3 py-1 bg-[#4f4f4f] rounded">
              <span class="
              material-symbols-outlined
              <?= ($site_visit_today - $site_visit_yesterday) == 0 ? 'hidden' : '' ?>
              <?= ($site_visit_today - $site_visit_yesterday) < 0 ? 'text-red-400 rotate-180' : 'text-green-500' ?>">
                arrow_drop_up
              </span>
              <p>
                <?= ($site_visit_today - $site_visit_yesterday == 0 ? '-' : $site_visit_today - $site_visit_yesterday )?>
              </p>
            </div>
          </div>
          <div class="bg-[#2f2f2f] rounded p-3 flex justify-around">
            <div class="flex flex-col gap-2 justify-center place-items-center">
              <p class="">오늘</p>
              <p class="text-base font-[s-core6]">
                <?= $site_visit_today == 0 ? '-' : $site_visit_today ?>
              </p>
            </div>
            <div class="flex flex-col gap-2 justify-center place-items-center">
              <p class="">어제</p>
              <p class="text-base font-[s-core6]">
                <?= $site_visit_yesterday == 0 ? '-' : $site_visit_yesterday ?>
              </p>
            </div>
          </div>
        </div>

        <!-- 총 방문 -->
        <div class="flex justify-around bg-[#3f3f3f] rounded py-2">
          <p>총 방문</p>
          <p><?= $visit_total ?> 회</p>
        </div>
        
        <p class="text-xs text-center text-[#9f9f9f]">
          방문자 수는 로그인기록 기준입니다
        </p>

        <!-- 구분선 -->
        <div class="border-b border-gray-400"></div>        

        <div class="flex flex-col gap-3">
          <div class="flex justify-between">
            <div class="flex gap-2 place-items-center">
              <span class="material-symbols-outlined">
                <!-- account_circle -->
                badge
              </span>
              <p>회원수</p>
            </div>
            <div class="flex place-items-center px-3 py-1 bg-[#4f4f4f] rounded">
              <span class="
              material-symbols-outlined
              <?= ($user_register_today - $user_register_yesterday) == 0 ? 'hidden' : '' ?>
              <?= ($user_register_today - $user_register_yesterday) < 0 ? 'text-red-400 rotate-180' : 'text-green-500' ?>">
                arrow_drop_up
              </span>
              <p>
                <?= ($user_register_today - $user_register_yesterday == 0 ? '-' : $user_register_today - $user_register_yesterday )?>
              </p>
            </div>
          </div>
          <div class="bg-[#2f2f2f] rounded p-3 flex justify-around">
            <div class="flex flex-col gap-2 justify-center place-items-center">
              <p class="">오늘</p>
              <p class="text-base font-[s-core6]">
                <?= $user_register_today == 0 ? '-' : $user_register_today ?>
              </p>
            </div>
            <div class="flex flex-col gap-2 justify-center place-items-center">
              <p class="">어제</p>
              <p class="text-base font-[s-core6]">
                <?= $user_register_yesterday == 0 ? '-' : $user_register_yesterday ?>
              </p>
            </div>
          </div>
        </div>

        <!-- 총 회원수 -->
        <div class="flex justify-around bg-[#3f3f3f] rounded py-2">
          <p>총 회원수</p>
          <p><?= $member_total ?> 명</p>
        </div>

      </div>

      <div class="fixed bottom-0 hover:text-white text-sm text-[#9f9f9f] tracking-wider duration-200 cursor-default w-[299px] bg-[#3f3f3f] border-t border-[#4f4f4f] shadow-2xl py-2 gap-3 -ml-5 -mr-5 flex justify-center place-items-center">
        <span id="sky_icon" class="material-symbols-outlined duration-200 animate-pulse">
          weather_snowy
        </span>
        <p>
          Light House
        </p>
      </div>

    </div>
  </div>

</div>

<script>

  if(localStorage.getItem('effect') == 'on') {
    $('#sky_icon').addClass('animate-pulse');
  } else {
    $('#sky_icon').removeClass('animate-pulse');
  }

  if(!localStorage.getItem('board_list_btn')) {
    localStorage.setItem('board_list_btn', 'on');
  } else {
    if(localStorage.getItem('board_list_btn') == 'on') {
      $('#board_list_btn').removeClass('rotate-180');
      $('#notice').removeClass('hidden');
      $('#freeboard').removeClass('hidden');
      $('#hellow').removeClass('hidden');
      $('#line').removeClass('hidden');
      $('#new_post').addClass('hidden');
    } else {
      $('#board_list_btn').addClass('rotate-180');
      $('#notice').addClass('hidden');
      $('#freeboard').addClass('hidden');
      $('#hellow').addClass('hidden');
      $('#line').addClass('hidden');
      $('#new_post').removeClass('hidden');
    }
  }

  $('#board_list_btn').click(function(e) {
    e.preventDefault();
    
    if(localStorage.getItem('board_list_btn') == 'on') {
      $('#board_list_btn').addClass('rotate-180');
      $('#notice').addClass('hidden');
      $('#freeboard').addClass('hidden');
      $('#hellow').addClass('hidden');
      $('#line').addClass('hidden');
      $('#new_post').removeClass('hidden');
      localStorage.setItem('board_list_btn', 'off');
    } else {
      $('#board_list_btn').removeClass('rotate-180');
      $('#notice').removeClass('hidden');
      $('#freeboard').removeClass('hidden');
      $('#hellow').removeClass('hidden');
      $('#line').removeClass('hidden');
      $('#new_post').addClass('hidden');
      localStorage.setItem('board_list_btn', 'on');
    }
  })

  // $.ajax({ // 게시글 총 개수
  //   url: '/Free_Board_View_C/list/'+ page,
  //   type: 'GET',
  //   dataType: 'json',
  //   success: function(response) {
  //     if (response.state) {
  //       // 게시판 목록을 DOM에 업데이트하는 함수 호출
  //       $('#total_value').text(response.total);
  //       updateTableWithFetchedData(response.list, response.links);
  //     } else {
  //       alert('게시글을 불러오는 데 실패했습니다.');
  //     }
  //   },
  //   error: function() {
  //     alert('게시글을 불러오는 중 오류가 발생했습니다.');
  //   }
  // });

</script>