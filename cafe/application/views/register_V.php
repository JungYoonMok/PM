<div class="bg-[#3f3f3f] duration-200 text-gray-50 w-full h-full my-5 mb-10">

  <div class="py-10 grid place-items-center">

    <form id="registerForm" action="/register_C/register" method="post"
      class="bg-[#2f2f2f] border border-[#4f4f4f] w-[600px] p-5 rounded flex flex-col gap-5 relative drop-shadow-2xl">

      <!-- 프로필사진 -->
      <div class="flex gap-5 place-items-center justify-center p-3 bg-[#4f4f4f] rounded">
        <div
          class="relative drop-shadow-2xl flex rounded-[50%] place-content-center border border-gray-500 h-20 w-20  bg-[#3f3f3f]">
          <img width="100%" src="https://pds.saramin.co.kr/workenv-bg/202303/09/rr8njw_y8e6-w09k06_workenv-bg.png"
            class="material-symbols-outlined rounded-[50%] text-5xl w-full h-full border border-gray-500">
          </img>
          <div class="absolute right-[0px] bottom-[-8px] w-8 h-8">
            <a href="#"
              class="bg-[#2f2f2f] rounded-[50%] p-1 cursor-pointer material-symbols-outlined hover:animate-spin duration-200">
              settings
            </a>
          </div>
        </div>
        <div class="flex flex-col gap-2">
          <h2>별명(닉네임)</h2>
          <div>
            <input name='nickname' id='nickname' placeholder="김아무개"
              class="duration-200 border border-gray-500 hover:bg-[#4f4f4f] focus:bg-[#2f2f2f] bg-[#3f3f3f] p-3 h-[50px] rounded outline-none"
              type="text" />
            <button class="p-3 rounded bg-blue-500">사용</button>
          </div>
        </div>
      </div>

      <!-- 구분선 -->
      <div class="border-b border-gray-400"></div>

      <!-- 아이디 -->
      <div class="flex gap-2 w-full">
        <div class="w-full flex flex-col gap-2">
          <h2>아이디</h2>
          <!-- <input name='user_id' placeholder="abc123" class="w-full font-black duration-200 border border-gray-500 hover:bg-[#4f4f4f] focus:bg-[#2f2f2f] bg-[#3f3f3f] p-3 h-[50px] rounded outline-none" type="text" /> -->
          <input name='user_id' id='user_id' placeholder="abc123"
            class="w-full font-black duration-200 border border-gray-500 hover:bg-[#4f4f4f] focus:bg-[#2f2f2f] bg-[#3f3f3f] p-3 h-[50px] rounded outline-none"
            type="text" />
        </div>
        <div class="w-full flex flex-col gap-2">
          <h2>성함</h2>
          <input name='user_name' name='user_name' placeholder="홍길동"
            class="w-full font-black duration-200 border border-gray-500 hover:bg-[#4f4f4f] focus:bg-[#2f2f2f] bg-[#3f3f3f] p-3 h-[50px] rounded outline-none"
            type="text" />
        </div>
      </div>

      <!-- 비밀번호 및 확인 -->
      <div class="flex gap-2">
        <div class="w-full flex flex-col gap-2">
          <h2>비밀번호</h2>
          <input name="user_password_1" id='user_password_1' id="user_password_1" placeholder="비밀번호 입력"
            class="w-full font-black duration-200 border border-gray-500 hover:bg-[#4f4f4f] focus:bg-[#2f2f2f] bg-[#3f3f3f] p-3 h-[50px] rounded outline-none"
            type="password" />
        </div>
        <div class="w-full flex flex-col gap-2">
          <h2>비밀번호 확인</h2>
          <input name="user_password_2" id='user_password_2' id="user_password_2" placeholder="비밀번호 입력"
            class="w-full font-black duration-200 border border-gray-500 hover:bg-[#4f4f4f] focus:bg-[#2f2f2f] bg-[#3f3f3f] p-3 h-[50px] rounded outline-none"
            type="password" />
        </div>
      </div>

      <div class="flex flex-col gap-2">
        <h2>휴대폰</h2>
        <div class="flex gap-3">
          <div class="flex w-full flex-col gap-2">
            <input name="user_phone_1" id='user_phone_1' value="010" disabled
              class="w-full text-gray-400 font-black text-center duration-100 border border-[#3f3f3f] bg-[#2f2f2f] p-3 h-[50px] rounded outline-none"
              type="number" />
          </div>
          <div class="flex w-full flex-col gap-2">
            <input name="user_phone_2" id='user_phone_2' placeholder="1234"
              class="w-full font-black duration-100 border text-center border-gray-500 hover:bg-[#4f4f4f] focus:bg-[#2f2f2f] bg-[#3f3f3f] p-3 h-[50px] rounded outline-none"
              type="number" />
          </div>
          <div class="flex w-full flex-col gap-2">
            <input name="user_phone_3" id='user_phone_3' placeholder="5678"
              class="w-full font-black duration-100 border text-center border-gray-500 hover:bg-[#4f4f4f] focus:bg-[#2f2f2f] bg-[#3f3f3f] p-3 h-[50px] rounded outline-none"
              type="number" />
          </div>
        </div>
      </div>

      <div class="flex w-full flex-col gap-2">
        <h2>이메일</h2>
        <input name="user_email" id='user_email' placeholder="abc@naver.com"
          class="w-full font-black duration-100 border border-gray-500 hover:bg-[#4f4f4f] focus:bg-[#2f2f2f] bg-[#3f3f3f] p-3 h-[50px] rounded outline-none"
          type="email" />
      </div>

      <div class="flex w-full flex-col gap-2">
        <h2>소개 - 간단하게 자기를 소개해보세요 : )</h2>
        <textarea name="user_memo" id='user_memo' rows="3" placeholder="안녕하세요? 저는 홍길동입니다"
          class="w-full font-black duration-100 border border-gray-500 hover:bg-[#4f4f4f] focus:bg-[#2f2f2f] bg-[#3f3f3f] p-3 rounded outline-none"></textarea>
      </div>

      <!-- 에러 메시지 -->
      <div class="border border-red-500 p-3 rounded">
        <p>Error Message</p>
        <p id="">-
          <?= validation_errors(); ?>
        </p>
        <p id="error_message"></p>
      </div>

      <!-- 회원가입 버튼 -->
      <div>
        <div class="text-center">
          <button id="registerButton" name="registerButton"
            class="bg-[#1f1f1f] border border-gray-500 hover:border-[#1f1f1f] duration-200 hover:opacity-80 p-4 rounded w-full outline-none">
            회원가입
          </button>
        </div>
      </div>

    </form>

  </div>

</div>

<script>
  // ajax 회원가입
    $('#registerButton').click(function (e) {
      e.preventDefault();
      $.ajax({
        url: '/Register_C/register',
        type: 'post',
        dataType: 'json',
        data: { 
          username: $('#user_id').val(),
          password_1: $('#user_password_1').val(),
          password_2: $('#user_password_2').val() ,
        },
        success: function (response) {
          if(response.state) {
            alert('환영합니다, 회원가입이 완료되었습니다!');
            location.href = '/login';
          } else {
            $('#error_message').text(response.message); // 에러 메시지 출력
          }
        },
        error: function (response, s, e) {
          console.log('에러', response, s, e);
        }
      });
    });
</script>