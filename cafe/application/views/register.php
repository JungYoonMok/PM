<? 
  // 글로벌 공유
  $this->load->view('../common');
?>

<div class="bg-[#3f3f3f] duration-200 text-gray-50 w-full h-full pt-[140px] mt-[-140px] mb-10">
  
  <div class="py-10 grid place-items-center">
    
    <div class="bg-[#2f2f2f] border border-gray-500 w-[600px] p-10 rounded flex flex-col gap-5 relative drop-shadow-2xl">

      <!-- 바 -->
      <!-- <div class="absolute top-[0px] left-0 text-left w-full">
        <p class="bg-blue-500 rounded-t font-bold text-sm text-gray-50 w-full pl-10 h-[5px]">
        </p>
      </div> -->

      <!-- 프로필사진 -->
      <div class="w-full flex place-content-center">
        <div class="relative drop-shadow-2xl flex rounded-[50%] place-content-center border border-gray-500 h-20 w-20  bg-[#3f3f3f]">
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
      </div>

      <!-- 구분선 -->
      <div class="border-b border-gray-400"></div>

      <!-- 생년월일 및 성별 -->
      <div class="flex gap-2">
        <div class="flex flex-col gap-2 w-full">
          <h2>생년월일</h2>
          <input class="w-full font-black duration-100 focus:border border-blue-400 bg-[#3f3f3f] hover:bg-[#4f4f4f] focus:bg-[#2f2f2f] bg-[#3f3f3f] p-3 h-[50px] rounded outline-none" type="date" />
        </div>
        <div class="flex flex-col gap-2 w-full">
          <h2>성별</h2>
          <div class="flex gap-2 w-full">
            <div class="p-3 w-full rounded bg-[#3f3f3f]">
              <input id="1_c" type="radio">
              <label for="1_c">남성</label>
            </div>
            <div class="p-3 w-full rounded bg-[#3f3f3f]">
              <input id="2_c" type="radio">
              <label for="2_c">여성</label>
            </div>
          </div>
        </div>
      </div>

      <!-- 아이디 및 별명(닉네임) -->
      <div class="flex gap-2 w-full">
        <div class="w-full flex flex-col gap-2">
          <h2>아이디</h2>
          <input class="w-full font-black duration-100 focus:border border-blue-400 bg-[#3f3f3f] hover:bg-[#4f4f4f] focus:bg-[#2f2f2f] bg-[#3f3f3f] p-3 h-[50px] rounded outline-none" type="password" />
        </div>
        <div class="w-full flex flex-col gap-2">
          <h2>별명(닉네임)</h2>
          <input class="w-full font-black duration-100 focus:border border-blue-400 bg-[#3f3f3f] hover:bg-[#4f4f4f] focus:bg-[#2f2f2f] bg-[#3f3f3f] p-3 h-[50px] rounded outline-none" type="password" />
        </div>
      </div>
      
      <!-- 비밀번호 및 확인 -->
      <div class="flex gap-2">
        <div class="w-full flex flex-col gap-2">
          <h2>비밀번호</h2>
          <input class="w-full font-black duration-100 focus:border border-blue-400 bg-[#3f3f3f] hover:bg-[#4f4f4f] focus:bg-[#2f2f2f] bg-[#3f3f3f] p-3 h-[50px] rounded outline-none" type="password" />
        </div>
        <div class="w-full flex flex-col gap-2">
          <h2>비밀번호 확인</h2>
          <input class="w-full font-black duration-100 focus:border border-blue-400 bg-[#3f3f3f] hover:bg-[#4f4f4f] focus:bg-[#2f2f2f] bg-[#3f3f3f] p-3 h-[50px] rounded outline-none" type="password" />
        </div>
      </div>

      <div class="flex w-full flex-col gap-2">
        <h2>연락처</h2>
        <input class="w-full font-black duration-100 focus:border border-blue-400 bg-[#3f3f3f] hover:bg-[#4f4f4f] focus:bg-[#2f2f2f] bg-[#3f3f3f] p-3 h-[50px] rounded outline-none" type="password" />
      </div>

      <div class="flex w-full flex-col gap-2">
        <h2>이메일</h2>
        <input class="w-full font-black duration-100 focus:border border-blue-400 bg-[#3f3f3f] hover:bg-[#4f4f4f] focus:bg-[#2f2f2f] bg-[#3f3f3f] p-3 h-[50px] rounded outline-none" type="password" />
      </div>
      
      <div class="flex w-full flex-col gap-2">
        <h2>소게(간단하게 자기를 소개해보세요)</h2>
        <textarea class="w-full font-black duration-100 focus:border border-blue-400 bg-[#3f3f3f] hover:bg-[#4f4f4f] focus:bg-[#2f2f2f] bg-[#3f3f3f] p-3 h-[150px] rounded outline-none"></textarea>
      </div>

      <!-- 회원가입 버튼 -->
      <div>
        <div class="text-center">
          <button class="bg-blue-500 duration-200 hover:opacity-80 my-5 p-4 rounded w-full outline-none">
            회원가입
          </button>
        </div>
      </div>

      <!-- 바 -->
      <!-- <div class="absolute bottom-[0px] left-0 text-left w-full">
        <p class="bg-blue-500 rounded-b font-bold text-sm text-gray-50 w-full pl-10 h-[5px]">
        </p>
      </div> -->
      
    </div>

    <div class="p-5 flex gap-3 bg-gray-500 w-[600px] opacity-80 rounded mt-5">
      <span class="material-symbols-outlined animate-pulse text-yellow-500">error</span>
      <p class="font-bold">타인이 알아도 상관없는 정보로 가입해 주시길 바랍니다</p>
    </div>
    
  </div>

</div>

<script>
  function snsBtn() {
    alert('SNS 로그인은 예제입니다 :)');
  }
</script>