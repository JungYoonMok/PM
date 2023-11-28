<div class="flex flex-col h-full duration-200 w-full bg-[#2f2f2f] p-5 text-gray-100">

  <div class="relative">
    <!-- 비회원 전용 -->
    <div class="<?= $this->session->userdata('user_id') ? 'hidden' : 'inline' ?> flex flex-col justify-center place-items-center h-full w-full">
      <div class="">
        <span class="material-symbols-outlined">
          account_circle_off
        </span>
      </div>
      <div class="bg-[#4f4f4f] rounded px-2 py-3 text-sm w-full">
        <p>계정이 있으시다면 로그인을 해주세요 비회원은 카페를 한정적으로 이용할 수 있습니다.</p>
      </div>
    </div>

    <!-- 회원 전용 -->
    <div class="<?= $this->session->userdata('user_id') ? 'inline' : 'hidden' ?> flex flex-col gap-3">

      <!-- 구분선 -->
      <div class="border-b border-gray-400"></div>

      <div class="flex my-3 gap-3">
        <!-- 프로필 -->
        <div
          class="relative drop-shadow-2xl flex rounded-[50%] place-content-center border border-gray-500 h-20 w-20  bg-[#3f3f3f]">

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
          <div class="flex gap-3">
            <a class="font-bold hover:underline underline-offset-4 hover:scale-[97%] hover:opacity-90 duration-200 decoration-2 decoration-yellow-500"
              href="/user_information_c">
              <?= $this->session->userdata('user_nickname') ?>
            </a>
            <p class="bg-[#3f3f3f] px-1.5 py-0.5 rounded text-sm">
              <!-- 등급은 미구현 -->
              일반
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

      <!-- 구분선 -->
      <div class="border-b mb-3 border-gray-400"></div>

      <!-- 기타 -->
      <div class="flex gap-2 flex-col text-sm">
        <div class="flex place-content-between">
          <div class="flex gap-2">
            <span class="material-symbols-outlined text-green-500">
              nature
            </span>
            <p>소나무</p>
          </div>
          <a href="#"
            class="hover:underline underline-offset-4 hover:scale-[97%] hover:opacity-90 duration-200 decoration-2 decoration-yellow-500">
            등급 안내
          </a>
        </div>
        <div class="flex place-content-between">
          <div class="flex gap-2">
            <span class="material-symbols-outlined">
              person_book
            </span>
            <p>방문</p>
          </div>
          <p>477 회</p>
        </div>
        <div class="flex place-content-between">
          <div class="flex gap-2">
            <span class="material-symbols-outlined">
              post
            </span>
            <a href="/my_activity/post" class="hover:underline underline-offset-4 hover:opacity-90 duration-200 decoration-2 decoration-yellow-500">
              내가 쓴 게시글
            </a>
          </div>
          <a href="/my_activity/post"
            class="hover:underline underline-offset-4 hover:opacity-90 duration-200 decoration-2 decoration-yellow-500">30
            개</a>
        </div>
        <div class="flex place-content-between">
          <div class="flex gap-2">
            <span class="material-symbols-outlined rotate-180">
              reply
            </span>
            <a href="/my_activity/comment" class="hover:underline underline-offset-4 hover:opacity-90 duration-200 decoration-2 decoration-yellow-500">
              내가 쓴 댓글
            </a>
          </div>
          <a href="/my_activity/comment"
            class="hover:underline underline-offset-4 hover:opacity-90 duration-200 decoration-2 decoration-yellow-500">99
            개</a>
        </div>
      </div>

      <!-- 글쓰기 및 채팅 -->
      <div class="flex flex-col gap-3 text-center">
        <a href="/post_create"
          class="p-2 w-full hover:text-white hover:underline rounded hover:opacity-80 font-bold duration-150 bg-[#3f3f3f]">
          카페 글쓰기
        </a>
      </div>

      <!-- 검색 -->
      <div class="flex w-full">
        <input
          class="bg-[#5f5f5f] rounded-l hover:bg-[#4f4f4f] border-[#5f5f5f] border focus:bg-[#4f4f4f] focus:border-blue-500 duration-150 outline-none p-2"
          type="text">
        <button class="bg-blue-500 w-full p-2 rounded-r font-bold hover:opacity-80 duration-200">
          검색
        </button>
      </div>

      <!-- 구분선 -->
      <div class="border-b my-3 border-gray-400"></div>

      <!-- 메뉴 -->
      <div class="flex flex-col gap-1 bg-[#3f3f3f] p-2 rounded">

        <!-- 커뮤니티 -->
        <div class="text-left p-3">
          <p class="font-bold">커뮤니티</p>
        </div>

        <!-- 구분선 -->
        <div class="border-b border-gray-400"></div>

        <a href="/notice"
          class="deration-500 hover:last-child:bg-red-500 relative hover:bg-[#4f4f4f] w-full duration-100 p-2 rounded hover:text-gray-100">
          <span class="w-full h-full flex gap-5">
            <span class="material-symbols-outlined">
              notifications
            </span>
            <div class="flex place-content-around">
              <p class="">공지사항</p>
              <p
                class="w-8 duration-200 border border-blue-400 opacity-80 drop-shadow-2xl animate-pulse absolute right-2 bg-blue-500 px-2 py-1 rounded text-xs flex place-content-center">
                3
              </p>
            </div>
          </span>
        </a>

        <a href="/freeboard/list"
          class="deration-500 relative hover:bg-[#4f4f4f] w-full duration-100 p-2 rounded hover:text-gray-100">
          <span class="w-full h-full flex gap-5">
            <span class="material-symbols-outlined">
              border_color
            </span>
            <div class="flex place-content-around">
              <p class="">자유게시판</p>
              <p
                class="w-8 duration-200 border border-blue-400 opacity-80 drop-shadow-2xl animate-pulse absolute right-2 bg-blue-500 px-2 py-1 rounded text-xs flex place-content-center">
                23
              </p>
            </div>
          </span>
        </a>

        <a href="/hellow"
          class="deration-500 relative hover:bg-[#4f4f4f] w-full duration-100 p-2 rounded hover:text-gray-100">
          <span class="w-full h-full flex gap-5">
            <span class="material-symbols-outlined">
              waving_hand
            </span>
            <div class="flex place-content-around">
              <p class="">가입인사</p>
              <p
                class="w-8 duration-200 border border-blue-400 opacity-80 drop-shadow-2xl animate-pulse absolute right-2 bg-blue-500 px-2 py-1 rounded text-xs flex place-content-center">
                17
              </p>
            </div>
          </span>
        </a>

      </div>

      <!-- 구분선 -->
      <div class="border-b my-3 border-gray-400"></div>

    </div>
  </div>

</div>