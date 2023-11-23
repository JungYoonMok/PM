<?
  defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- 최상단 최하단 이동 -->
<div class="flex flex-col gap-3 drop-shadow-2xl">
  <button onclick=upBtn() class="text-white p-5 border-gray-500 shadow-xl hover:animate-pulse border-2 hover:text-[#6f6f6f] hover:bg-[#2f2f2f] hover:border-gray-100 hover:opacity-80 duration-100 bg-[#2f2f2f] w-12 flex place-content-center h-12 rounded-[50%]">
    <span class="material-symbols-outlined -mt-[10px] duration-100">
      arrow_upward
    </span>
  </button>
  <button onclick=downBtn() class="text-white p-5 border-gray-500 shadow-xl hover:animate-pulse target:bg-red-500 border-2 hover:text-[#6f6f6f] hover:bg-[#2f2f2f] hover:border-gray-100 hover:opacity-80 duration-100 bg-[#2f2f2f] w-12 flex place-content-center h-12 rounded-[50%]">
    <span class="material-symbols-outlined -mt-[10px] duration-100">
      arrow_downward
    </span>
  </button>
  <button onclick=effectBtn() class="text-yellow-500 p-5 border-gray-500 shadow-xl hover:animate-pulse target:bg-red-500 border-2 hover:text-[#6f6f6f] hover:bg-[#2f2f2f] hover:border-gray-100 hover:opacity-80 duration-100 bg-[#2f2f2f] w-12 flex place-content-center h-12 rounded-[50%]">
    <span class="material-symbols-outlined -mt-[10px] duration-100">
      gif
    </span>
  </button>
</div>

<script>

  function upBtn(){
    window.scrollTo({ top: 0, behavior: "smooth" }); 
  }

  function downBtn() {
    window.scrollTo({ top: document.body.scrollHeight, behavior: "smooth" });
  }

  function effectBtn() {
    console.log('effectBtn');
  }

</script>