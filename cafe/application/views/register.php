<div class="bg-[#3f3f3f] text-gray-50 w-full h-full pt-[140px] mt-[-140px]">
  
  <div class="py-10 grid place-items-center">
    
    <div class="bg-[#2f2f2f] border border-gray-500 w-[500px] p-10 rounded flex flex-col gap-5 relative drop-shadow-2xl">

      <!-- 바 -->
      <!-- <div class="absolute top-[0px] left-0 text-left w-full">
        <p class="bg-blue-500 rounded-t font-bold text-sm text-gray-50 w-full pl-10 h-[5px]">
        </p>
      </div> -->

      <div class="flex flex-col gap-2">
        <h2>아이디</h2>
        <input class="w-full duration-100 bg-[#3f3f3f] focus:border border-blue-400 hover:bg-[#4f4f4f] focus:bg-[#2f2f2f] p-3 h-[50px] rounded outline-none" type="text" />
      </div>
      
      <div class="flex flex-col gap-2">
        <h2>아이디 확인</h2>
        <input class="w-full duration-100 bg-[#3f3f3f] focus:border border-blue-400 hover:bg-[#4f4f4f] focus:bg-[#2f2f2f] p-3 h-[50px] rounded outline-none" type="text" />
      </div>

      <div class="flex flex-col gap-2">
        <h2>비밀번호</h2>
        <input class="w-full font-black duration-100 focus:border border-blue-400 bg-[#3f3f3f] hover:bg-[#4f4f4f] focus:bg-[#2f2f2f] bg-[#3f3f3f] p-3 h-[50px] rounded outline-none" type="password" />
      </div>
      
      <div class="flex flex-col gap-2">
        <h2>비밀번호 확인</h2>
        <input class="w-full font-black duration-100 focus:border border-blue-400 bg-[#3f3f3f] hover:bg-[#4f4f4f] focus:bg-[#2f2f2f] bg-[#3f3f3f] p-3 h-[50px] rounded outline-none" type="password" />
      </div>
      
      <div class="text-center">
        <button class="bg-blue-500 duration-200 hover:opacity-80 my-5 p-4 rounded w-full outline-none">
          회원가입
        </button>
      </div>

      <!-- 바 -->
      <!-- <div class="absolute bottom-[0px] left-0 text-left w-full">
        <p class="bg-blue-500 rounded-b font-bold text-sm text-gray-50 w-full pl-10 h-[5px]">
        </p>
      </div> -->
      
    </div>

    <div class="p-5 flex gap-3 bg-gray-500 w-[500px] opacity-80 rounded mt-5">
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