<div class="bg-[#3f3f3f] text-gray-50 w-full h-full">
  
  <div class="py-20 grid place-items-center">

    <div class="bg-[#2f2f2f] w-[600px] p-10 rounded flex flex-col gap-5 relative drop-shadow-2xl">

      <div class="absolute top-[0px] left-0 text-left w-full">
        <p class="bg-blue-500 rounded-t font-bold text-sm text-gray-50 w-full pl-10 h-[5px]">
          <!-- 오늘도 방문해 주셔서 감사합니다 :) -->
        </p>
      </div>

      <div class="flex flex-col gap-3">
        <h2>아이디</h2>
        <input class="w-full duration-200 bg-[#3f3f3f] focus:border border-gray-500 hover:bg-[#4f4f4f] focus:bg-[#1f1f1f] p-3 h-[50px] rounded outline-none" type="text" />
      </div>

      <div class="flex flex-col gap-3">
        <h2>비밀번호</h2>
        <input class="w-full font-black duration-200 focus:border border-gray-500 bg-[#3f3f3f] hover:bg-[#4f4f4f] focus:bg-[#1f1f1f] bg-[#3f3f3f] p-3 h-[50px] rounded outline-none" type="password" />
      </div>

      <div class="flex place-content-end gap-3">
        <input class="outline-none" id="check1" type="checkbox"></input>
        <label class="text-md" for="check1">ID 기억하기</label>
      </div>

      <div class="text-center">
        <button class="bg-blue-500 duration-200 hover:opacity-80 p-4 rounded w-full outline-none">
          로그인
        </button>
      </div>

      <div class="flex w-full mt-5 mb-3 gap-3 px-20 text-gray-300">
        <div class="border-t w-full"></div>
        <p class="-mt-3 text-sm font-bold">OR</p>
        <div class="border-t w-full"></div>
      </div>

      <div class="text-center">
        <div class="flex place-content-center gap-3">
          <button onclick=snsBtn() class="cursor-not-allowed hover:scale-95 hover:opacity-90 duration-200 w-16 h-14 bg-green-500 text-4xl font-black rounded">
            N
          </button>
          <button onclick=snsBtn() class="cursor-not-allowed hover:scale-95 hover:opacity-90 duration-200 w-16 h-14 bg-yellow-500 font-black rounded">
            kakao
          </button>
          <button onclick=snsBtn() class="cursor-not-allowed hover:scale-95 hover:opacity-90 duration-200 w-16 h-14 bg-red-500 font-black rounded">
            Google
          </button>
          <button onclick=snsBtn() class="cursor-not-allowed hover:scale-95 hover:opacity-90 duration-200 w-16 h-14 bg-black opacity-80 font-black rounded">
            Apple
          </button>
          <button onclick=snsBtn() class="cursor-not-allowed hover:scale-95 hover:opacity-90 duration-200 w-16 h-14 bg-sky-500 text-4xl font-black rounded">
            t
          </button>
          <button onclick=snsBtn() class="cursor-not-allowed hover:scale-95 hover:opacity-90 duration-200 w-16 h-14 bg-blue-500 text-4xl font-black rounded">
            f
          </button>
        </div>
      </div>

      
      <div class="absolute bottom-[0px] left-0 text-left w-full">
        <p class="bg-blue-500 rounded-b font-bold text-sm text-gray-50 w-full pl-10 h-[5px]">
          <!-- 오늘도 방문해 주셔서 감사합니다 :) -->
        </p>
      </div>
      
    </div>

    <div class="p-5 bg-yellow-500 w-[600px] opacity-80 rounded mt-5">
      <p class="">공개된 장소에서는 개인정보 유출에 유념해주시길 바랍니다</p>
    </div>

  </div>

</div>

<script>
  function snsBtn() {
    alert('SNS 로그인은 예제입니다 :)');
  }
</script>