<?
  defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- 최상단 최하단 이동 -->
<div class="flex flex-col gap-3 drop-shadow-2xl">
  <button onclick=upBtn() class="text-[#9f9f9f] p-5 border border-gray-500 hover:animate-pulse border-2 hover:text-[#6f6f6f] hover:bg-[#2f2f2f] hover:border-yellow-500 hover:opacity-80 duration-100 bg-[#2f2f2f] w-12 flex place-content-center h-12 rounded-[50%]">
    <span class="material-symbols-outlined -mt-[10px] duration-100">
      arrow_upward
    </span>
  </button>
  <button onclick=downBtn() class="text-[#9f9f9f] p-5 border border-gray-500 hover:animate-pulse target:bg-red-500 border-2 hover:text-[#6f6f6f] hover:bg-[#2f2f2f] hover:border-yellow-500 hover:opacity-80 duration-100 bg-[#2f2f2f] w-12 flex place-content-center h-12 rounded-[50%]">
    <span class="material-symbols-outlined -mt-[10px] duration-100">
      arrow_downward
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

</script>