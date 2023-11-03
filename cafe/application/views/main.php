<? 
  // 글로벌 공유
  $this->load->view('../common');
?>

<!-- 메인 틀 -->
<div id="base" class="flex duration-200 justify-between bg-[#3f3f3f] text-gray-50 pl-[300px] w-full h-[200%] relative">

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
  <div class="flex flex-col w-full">

    <!-- 헤더 -->
    <div class="">
      <?$this->load->view('header');?>
    </div>

    <!-- 이미지 배너 및 스와이프 -->
    <div class="border border-[#5f5f5f] bg-[#2f2f2f] shadow p-10 mx-5 mt-5 rounded-md ">
      <div class="animate-pulse flex space-x-4">
        <div class="rounded-full bg-[#5f5f5f] h-14 w-14"></div>
        <div class="flex-1 space-y-6 py-1">
          <div class="h-2 bg-[#5f5f5f] rounded"></div>
          <div class="space-y-3">
            <div class="grid grid-cols-3 gap-4">
              <div class="h-2 bg-[#5f5f5f] rounded col-span-2"></div>
              <div class="h-2 bg-[#5f5f5f] rounded col-span-1"></div>
            </div>
            <div class="h-2 bg-[#5f5f5f] rounded"></div>
          </div>
        </div>
      </div>
    </div>

    <!-- 최근 게시글, 최근 댓글, 자유게시판, -->
    <div class="h-full w-full p-5 flex gap-5">

      <!-- 최근 게시물 -->
      <div>
        <div class="flex bg-[#1f1f1f] rounded mb-3 drop-shadow-2xl items-center place-content-between">
          <div class="opacity-90 p-3 flex gap-1">
            <h2>최근 게시글 - 등록</h2>
            <h2 class="font-bold animate-pulse"><?=$total?></h2>
            <h2>건</h2>
          </div>
          <div class="p-3">
            <a href="#" class="hover:opacity-80 hover:underline">더보기 〉</a>
          </div>
        </div>

        <div class="bg-[#2f2f2f] p-5 border border-[#4f4f4f] rounded flex gap-5 relative drop-shadow-2xl">

          <table class="text-gray-50 w-full">
            <th class="opacity-70 pb-3 border-b border-[#4f4f4f]">ID</th>
            <th class="opacity-70 pb-3 border-b border-[#4f4f4f]">제목</th>
            <th class="opacity-70 pb-3 border-b border-[#4f4f4f]">작성자</th>
            <th class="opacity-70 pb-3 border-b border-[#4f4f4f]">작성일</th>
            <th class="opacity-70 pb-3 border-b border-[#4f4f4f]">조회</th>

            <!-- php 삼항연산자 -->
            <!-- <td class="<?= $li->idx === '1' ? "bg-red-500" : "py-2 px-1" ?>"><?=$li->idx?></td> -->

            <?foreach($list as $li):?>
              <tr class="border-b text-center border-[#4f4f4f]">
                <td class="py-2 px-1"><?=$li->idx?></td>
                <td class="py-2 px-1 pl-5 hover:cursor-pointer hover:underline hover:opacity-70 text-start">
                  <div class="flex flex-col gap-1">
                    <?=$li->title?>
                  </div>
                </td>
                <td class="w-52 py-2 px-1 hover:cursor-pointer hover:underline hover:opacity-70">정윤목</td>
                <td class="w-52 py-2 px-1"><?=$li->regdate?></td>
                <td class="w-52 py-2 px-1">100</td>
              </tr>
            <?endforeach?>
          </table>

        </div>
      </div>

      <!-- 최근 댓글 -->
      <div>
        <div class="flex bg-[#1f1f1f] rounded mb-3 drop-shadow-2xl items-center place-content-between">
          <div class="opacity-90 p-3 flex gap-1">
            <h2>최근 댓글  - 등록</h2>
            <h2 class="font-bold animate-pulse"><?=$total?></h2>
            <h2>건</h2>
          </div>
          <div class="p-3">
            <a href="#" class="hover:opacity-80 hover:underline">더보기 〉</a>
          </div>
        </div>

        <div class="bg-[#2f2f2f] p-5 border border-[#4f4f4f] rounded flex gap-5 relative drop-shadow-2xl">

          <table class="text-gray-50 w-full">
            <th class="opacity-70 pb-3 border-b border-[#4f4f4f]">ID</th>
            <th class="opacity-70 pb-3 border-b border-[#4f4f4f]">제목</th>
            <th class="opacity-70 pb-3 border-b border-[#4f4f4f]">작성자</th>
            <th class="opacity-70 pb-3 border-b border-[#4f4f4f]">작성일</th>
            <th class="opacity-70 pb-3 border-b border-[#4f4f4f]">조회</th>

            <!-- php 삼항연산자 -->
            <!-- <td class="<?= $li->idx === '1' ? "bg-red-500" : "py-2 px-1" ?>"><?=$li->idx?></td> -->

            <?foreach($list as $li):?>
              <tr class="border-b text-center border-[#4f4f4f]">
                <td class="py-2 px-1"><?=$li->idx?></td>
                <td class="py-2 px-1 pl-5 hover:cursor-pointer hover:underline hover:opacity-70 text-start">
                  <div class="flex flex-col gap-1">
                    <?=$li->title?>
                  </div>
                </td>
                <td class="w-52 py-2 px-1 hover:cursor-pointer hover:underline hover:opacity-70">정윤목</td>
                <td class="w-52 py-2 px-1"><?=$li->regdate?></td>
                <td class="w-52 py-2 px-1">100</td>
              </tr>
            <?endforeach?>
          </table>

        </div>
      </div>

    </div>

    <!-- 푸터 -->
    <div>
      <?$this->load->view('footer');?>
    </div>

    <!-- 최상단 최하단 버튼 -->
    <div class="fixed right-5 bottom-5 mb-20">
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