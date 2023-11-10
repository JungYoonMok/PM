<div class="bg-[#3f3f3f] duration-200 text-gray-50 w-full h-full my-5 mb-10">
  
  <div class="py-10 grid place-items-center">
    
    <form action="/register_C/register" method="post" class="bg-[#2f2f2f] border border-gray-500 w-[600px] p-5 rounded flex flex-col gap-5 relative drop-shadow-2xl">

      <!-- 프로필사진 -->
      <div class="flex gap-5 place-items-center justify-center p-3 bg-[#4f4f4f] rounded">
        <div class="relative drop-shadow-2xl flex rounded-[50%] place-content-center border border-gray-500 h-20 w-20  bg-[#3f3f3f]">
          <img 
            width="100%"
            src="https://pds.saramin.co.kr/workenv-bg/202303/09/rr8njw_y8e6-w09k06_workenv-bg.png"
            class="material-symbols-outlined rounded-[50%] text-5xl w-full h-full border border-gray-500">
          </img>
          <div class="absolute right-[0px] bottom-[-8px] w-8 h-8">
            <a href="#" class="bg-[#2f2f2f] rounded-[50%] p-1 cursor-pointer material-symbols-outlined hover:animate-spin duration-200">
              settings
            </a>
          </div>
        </div>
        <div class="flex flex-col gap-2">
          <h2>별명(닉네임)</h2>
          <input name='nickname' class="duration-200 border border-gray-500 bg-[#3f3f3f] hover:bg-[#4f4f4f] focus:bg-[#2f2f2f] bg-[#3f3f3f] p-3 h-[50px] rounded outline-none" type="password" />
        </div>
      </div>

      <!-- 구분선 -->
      <div class="border-b border-gray-400"></div>

      <!-- 아이디 -->
      <div class="flex gap-2 w-full">
        <div class="w-full flex flex-col gap-2">
          <h2>아이디</h2>
          <input name='user_id' class="w-full font-black duration-200 border border-gray-500 bg-[#3f3f3f] hover:bg-[#4f4f4f] focus:bg-[#2f2f2f] bg-[#3f3f3f] p-3 h-[50px] rounded outline-none" type="text" />
        </div>
      </div>
      
      <!-- 비밀번호 및 확인 -->
      <div class="flex gap-2">
        <div class="w-full flex flex-col gap-2">
          <h2>비밀번호</h2>
          <input name="user_password_1" class="w-full font-black duration-200 border border-gray-500 bg-[#3f3f3f] hover:bg-[#4f4f4f] focus:bg-[#2f2f2f] bg-[#3f3f3f] p-3 h-[50px] rounded outline-none" type="password" />
        </div>
        <div class="w-full flex flex-col gap-2">
          <h2>비밀번호 확인</h2>
          <input name="user_password_2" class="w-full font-black duration-200 border border-gray-500 bg-[#3f3f3f] hover:bg-[#4f4f4f] focus:bg-[#2f2f2f] bg-[#3f3f3f] p-3 h-[50px] rounded outline-none" type="password" />
        </div>
      </div>

      <div class="flex w-full flex-col gap-2">
        <h2>연락처</h2>
        <input name="user_phone" class="w-full font-black duration-100 border border-gray-500 bg-[#3f3f3f] hover:bg-[#4f4f4f] focus:bg-[#2f2f2f] bg-[#3f3f3f] p-3 h-[50px] rounded outline-none" type="password" />
      </div>

      <div class="flex w-full flex-col gap-2">
        <h2>이메일</h2>
        <input name="user_email" class="w-full font-black duration-100 border border-gray-500 bg-[#3f3f3f] hover:bg-[#4f4f4f] focus:bg-[#2f2f2f] bg-[#3f3f3f] p-3 h-[50px] rounded outline-none" type="password" />
      </div>
      
      <div class="flex w-full flex-col gap-2">
        <h2>소게(간단하게 자기를 소개해보세요)</h2>
        <textarea name="user_memo" rows="3" class="w-full font-black duration-100 border border-gray-500 bg-[#3f3f3f] hover:bg-[#4f4f4f] focus:bg-[#2f2f2f] bg-[#3f3f3f] p-3 rounded outline-none"></textarea>
      </div>

      <!-- 회원가입 버튼 -->
      <div>
        <div class="text-center">
          <button class="bg-blue-500 duration-200 hover:opacity-80 my-5 p-4 rounded w-full outline-none">
            회원가입
          </button>
        </div>
      </div>
      
    </form>
    
  </div>

</div>

<script>
  function snsBtn() {
    alert('SNS');
  }
</script>