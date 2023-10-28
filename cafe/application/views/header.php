<?
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<script src="https://cdn.tailwindcss.com"></script>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nosifer&display=swap" rel="stylesheet">

<div class="bg-[#3f3f3f] text-gray-50">
  <div class="w-full h-[60px] bg-[#4f4f4f] rounded-b-xl drop-shadow-xl">
  
    <div class="text-center place-items-center pt-1.5">
      
      <div class="flex justify-around w-full text-gray-50">

        <div class="w-[220px] pt-3">
          <button 
          onclick="window.location.reload();" 
          class="font-['Nosifer'] text-xl text-yellow-500 hover:scale-90 duration-200">
            YoonMok Cafe
          </button>
        </div>

        <p class="py-2 text-gray-500 text-lg">|</p>

        <div class="flex gap-6 text-gray-200">
          <a class="hover:bg-[#3f3f3f] py-3 px-5 rounded hover:scale-90 duration-100" href="#">홈</a>
          <a class="hover:bg-[#3f3f3f] py-3 px-5 rounded hover:scale-90 duration-100" href="#">공지사항</a>
          <a class="hover:bg-[#3f3f3f] py-3 px-5 rounded hover:scale-90 duration-100" href="#">게시판</a>
          <a class="hover:bg-[#3f3f3f] py-3 px-5 rounded hover:scale-90 duration-100" href="#">문의하기</a>
          <a class="hover:bg-[#3f3f3f] py-3 px-5 rounded hover:scale-90 duration-100" href="#">개인정보</a>
        </div>
        
        <p class="py-2 text-gray-500 text-lg">|</p>
        
        <div class="flex gap-6">
          <a class="hover:bg-[#3f3f3f] py-3 px-5 rounded hover:scale-90 duration-100" href="#">로그인</a>
          <a class="hover:bg-[#3f3f3f] py-3 px-5 rounded hover:scale-90 duration-100" href="#">회원가입</a>
        </div>

      </div>
  
    </div>
  
  </div>
</div>