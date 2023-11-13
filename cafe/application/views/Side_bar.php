<div class="flex flex-col h-full duration-200 w-full bg-[#2f2f2f] p-5 text-gray-100">

  <div class="flex flex-col gap-3">
    
    <!-- 구분선 -->
    <div class="border-b border-gray-400"></div>

    <div class="flex my-3 gap-3">
      <!-- 프로필 -->
      <div class="relative drop-shadow-2xl flex rounded-[50%] place-content-center border border-gray-500 h-20 w-20  bg-[#3f3f3f]">
        <!-- <p class="material-symbols-outlined text-5xl text-gray-400 cursor-help hover:animate-bounce">
          person
        </p> -->
        <img 
          width="100%"
          src="https://pds.saramin.co.kr/workenv-bg/202303/09/rr8njw_y8e6-w09k06_workenv-bg.png"
          class="material-symbols-outlined rounded-[50%] text-5xl w-full h-full text-gray-400 cursor-help hover:animate-bounce">
        </img>
        <div class="absolute right-[0px] bottom-[-8px] w-8 h-8">
          <a href="#" class="bg-[#2f2f2f] rounded-[50%] p-1 cursor-pointer material-symbols-outlined hover:animate-spin duration-200">
            settings
          </a>
        </div>
      </div>
      <div class="flex flex-col gap-1">
        <!-- 닉네임 및 등급 -->
        <div class="flex gap-3">
          <a class="font-bold hover:underline underline-offset-4 hover:scale-[97%] hover:opacity-90 duration-200 decoration-2 decoration-yellow-500" href="#">
            Duckey
          </a>
          <p class="bg-[#3f3f3f] px-1.5 py-0.5 rounded text-sm">일반</p>
        </div>
        <!-- 가입일자 -->
        <div>
          <p class="text-sm">2023.10.30. 가입</p>
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
        <a href="#" class="hover:underline underline-offset-4 hover:scale-[97%] hover:opacity-90 duration-200 decoration-2 decoration-yellow-500">등급 안내</a>
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
          <p>내가 쓴 게시글</p>
        </div>
        <a href="#" class="hover:underline underline-offset-4 hover:scale-[97%] hover:opacity-90 duration-200 decoration-2 decoration-yellow-500">30 개</a>
      </div>
      <div class="flex place-content-between">
        <div class="flex gap-2">
          <span class="material-symbols-outlined rotate-180">
            reply
          </span>
          <p>내가 쓴 댓글</p>
        </div>
        <a href="#" class="hover:underline underline-offset-4 hover:scale-[97%] hover:opacity-90 duration-200 decoration-2 decoration-yellow-500">99 개</a>
      </div>
    </div>

    <!-- 글쓰기 및 채팅 -->
    <div class="flex flex-col gap-3 text-center">
      <a href="/free_board_create" class="p-2 w-full hover:text-white hover:underline rounded hover:opacity-80 font-bold duration-150 bg-[#3f3f3f]">
        카페 글쓰기
      </a>
    </div>

    <!-- 검색 -->
    <div class="flex w-full">
      <input class="bg-[#5f5f5f] rounded-l hover:bg-[#4f4f4f] border-[#5f5f5f] border focus:bg-[#4f4f4f] focus:border-blue-500 duration-150 outline-none p-2" type="text">
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
      
      <a href="/notice" class="deration-500 hover:last-child:bg-red-500 relative hover:bg-[#4f4f4f] w-full duration-100 p-2 rounded hover:text-gray-100">
        <span class="w-full h-full flex gap-5" >
          <span class="material-symbols-outlined">
            notifications
          </span>
          <div class="flex place-content-around">
            <p class="">공지사항</p>
            <p class="w-8 duration-200 border border-blue-400 opacity-80 drop-shadow-2xl animate-pulse absolute right-2 bg-blue-500 px-2 py-1 rounded text-xs flex place-content-center">
              3
            </p>
          </div>
        </span>
      </a>
      
      <a href="/freeboard" class="deration-500 relative hover:bg-[#4f4f4f] w-full duration-100 p-2 rounded hover:text-gray-100">
        <span class="w-full h-full flex gap-5" >
          <span class="material-symbols-outlined">
            border_color
          </span>
          <div class="flex place-content-around">
            <p class="">자유게시판</p>
            <p class="w-8 duration-200 border border-blue-400 opacity-80 drop-shadow-2xl animate-pulse absolute right-2 bg-blue-500 px-2 py-1 rounded text-xs flex place-content-center">
              23
            </p>
          </div>
        </span>
      </a>

      <a href="/hellow" class="deration-500 relative hover:bg-[#4f4f4f] w-full duration-100 p-2 rounded hover:text-gray-100">
        <span class="w-full h-full flex gap-5" >
          <span class="material-symbols-outlined">
            waving_hand
          </span>
          <div class="flex place-content-around">
            <p class="">가입인사</p>
            <p class="w-8 duration-200 border border-blue-400 opacity-80 drop-shadow-2xl animate-pulse absolute right-2 bg-blue-500 px-2 py-1 rounded text-xs flex place-content-center">
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