<?
  defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- 최상단 최하단 이동 -->
<div class="flex flex-col gap-2 drop-shadow-2xl">
  <button onclick=upBtn() class="hover:-translate-x-1 hover:scale-110 text-white p-5 border-gray-500 shadow-xl border-2 hover:bg-[#3f3f3f] hover:border-[#4f4f4f] duration-150 bg-[#2f2f2f] flex place-content-center w-10 h-10 rounded-[50%]">
    <span class="material-symbols-outlined -mt-[12px] duration-150">
      arrow_upward
    </span>
  </button>
  <button onclick=downBtn() class="hover:-translate-x-1 hover:scale-110 text-white p-5 border-gray-500 shadow-xl border-2 hover:bg-[#3f3f3f] hover:border-[#4f4f4f] duration-150 bg-[#2f2f2f] flex place-content-center w-10 h-10 rounded-[50%]">
    <span class="material-symbols-outlined -mt-[12px] duration-100">
      arrow_downward
    </span>
  </button>
  <button onclick=effectBtn() class="hover:-translate-x-1 hover:scale-110 flex flex-col justify-center place-items-center text-white p-5 border-gray-500 shadow-xl border-2 hover:bg-[#3f3f3f] hover:border-[#4f4f4f] duration-100 bg-[#2f2f2f] w-10 h-10 rounded-[50%]">
    <span id="effect_icon" class="material-symbols-outlined duration-150">
      smart_display
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
    if(localStorage.getItem('effect') == 'on'){
      localStorage.setItem('effect', 'off');
      location.reload();
    } else {
      localStorage.setItem('effect', 'on');
      location.reload();
    }
  }

</script>