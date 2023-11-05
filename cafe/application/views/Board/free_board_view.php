<? 
  // 글로벌 공유
  $this->load->view('../common');
?>

<!-- 메인 틀 -->
<div id="base" class="flex duration-200 bg-[#3f3f3f] text-gray-50 pl-[300px] w-full relative">

  <!-- 사이드 -->
  <div id="menu" class="fixed h-full left-0 w-[301px] duration-200">
    <!-- 사이드 여닫기 -->
    <div class="text-right bg-[#2f2f2f] pr-5 pt-5 text-center">
      <button id="munu_name" onclick=SideBarTab() 
      class="material-symbols-outlined hover:scale-[98%] duration-200 hover:opacity-80">
        menu
      </button>
    </div>
    <div class="h-full bg-[#2f2f2f]">
      <div id="main" class="">
        <?$this->load->view('sidebar');?>
      </div>
    </div>
  </div>

  <!-- 메인 베이스 -->
  <div class="flex flex-col justify-between w-full h-full">

    <!-- 헤더 -->
    <div class="">
      <?$this->load->view('header');?>
    </div>

    <!-- 메인 -->
    <div class="md:mb-20 w-full p-5 flex flex-col gap-5">

    <div class="bg-[#2f2f2f] mb-5 opacity-90 p-5 w-[500px] flex gap-1">
      <h2>자유게시판 - 등록</h2>
      <h2 class="font-bold animate-pulse"><?=$total?></h2>
      <h2>건</h2>
    </div>

    <div class="bg-[#2f2f2f] border border-gray-500 w-[500px] p-10 rounded flex flex-col gap-5 relative drop-shadow-2xl">

      <div>
        <table class="text-gray-50 w-full">
          <th>ID</th>
          <th>제목</th>
          <th>날짜</th>
          <?foreach($list as $li):?>
            <tr class="border-b border-gray-500">
              <td class="p-2"><?=$li->idx?></td>
              <td class="">
                <a href="/freeboard/<?=$li->idx?>">
                  <?=$li->title?>
                </a>
              </td>
              <td class=""><?=$li->regdate?></td>
            </tr>
          <?endforeach?>
        </table>
      </div>

    </div>
      
    </div>
    <!-- 메인끝 -->

    <!-- 최상단 최하단 버튼 -->
    <div class="fixed right-5 bottom-5 mb-[1%]">
      <?$this->load->view('tb_btn');?>
    </div>
    
  </div>

</div>

<script>

function SideBarTab() {
  let elm = document.getElementById('main'); 
  if(elm.getElementById === 'open'){
    elm.getElementById = 'close';
    document.getElementById('main').className += ' duration-200 delay-100';

    document.getElementById('menu').classList.remove('w-[65px]');
    document.getElementById('menu').className += ' w-[301px]';
    
    document.getElementById('main').classList.remove('hidden');
    document.getElementById('main').className += ' inline';
    
    document.getElementById('base').classList.remove('pl-[65px]');
    document.getElementById('base').className += ' pl-[300px]';
  } else {
    elm.getElementById = 'open';
    document.getElementById('menu').classList.remove('w-[301px]');
    document.getElementById('menu').className += ' w-[65px]';
    
    document.getElementById('main').className += ' hidden';
    document.getElementById('main').classList.remove('inline');
    
    document.getElementById('base').classList.remove('pl-[300px]');
    document.getElementById('base').className += ' pl-[65px]';
  }
}

</script>