<div class="bg-[#3f3f3f] text-gray-50 w-full relative">
  
  <div class="w-full w-full h-[80px] border-t border-gray-500 flex place-content-center bg-[#4f4f4f] rounded-t drop-shadow-2xl">
  
    <div class="max-w-[1400px] grid place-items-center">
      
      <div class="mt-3 flex gap-5 w-full text-gray-50">

        <!-- 최상단 최하단 이동 -->
        <div class="flex flex-col gap-3 absolute right-5 bottom-[100px] drop-shadow-2xl">
          <button onclick=upBtn() class="p-5 border border-gray-400 hover:animate-pulse hover:border-4 border-2 hover:text-blue-500 hover:bg-[#2f2f2f] hover:border-blue-500 hover:opacity-80 duration-100 bg-blue-500 w-12 flex place-content-center h-12 rounded-[50%]">
            <span class="material-symbols-outlined -mt-[8px] duration-100">
              arrow_upward
            </span>
          </button>
          <button onclick=downBtn() class="p-5 border border-gray-400 hover:animate-pulse hover:border-4 border-2 hover:text-blue-500 hover:bg-[#2f2f2f] hover:border-blue-500 hover:opacity-80 duration-100 bg-blue-500 w-12 flex place-content-center h-12 rounded-[50%]">
            <span class="material-symbols-outlined -mt-[8px] duration-100">
              arrow_downward
            </span>
          </button>
        </div>
  
        <!-- <div class="flex gap-3">
          <img 
            class="mt-[-8px] hover:scale-[2] duration-200 hover:rounded hover:-rotate-6" 
            src="https://pds.saramin.co.kr/workenv-bg/202303/09/rr8njw_y8e6-w09k06_workenv-bg.png" 
            width="70px" 
            alt="로고" />
          <p>비드코칭연구소(주)</p>
        </div>

        <div>
          <p>
            Copyright okEMS. All Right Reserved
          </p>
        </div>
  
        <div class="flex gap-3">
          <p>나만의 카페 만들기</p>
          <p> | </p>
          <a href="#">http://localhost/index.php</a>
        </div> -->
  
      </div>
  
    </div>
  
  </div>

</div>

<script>

  function upBtn(){
    window.scrollTo({ top: 0, behavior: "smooth" }); 
  }

  function downBtn() {
    window.scrollTo({ top: document.body.scrollHeight, behavior: "smooth" });
  }

</script>