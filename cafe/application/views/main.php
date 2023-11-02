<? 
  // 글로벌 공유
  $this->load->view('../common');
?>

<!-- 메인 틀 -->
<div id="base" class="flex justify-between bg-[#3f3f3f] text-gray-50 pl-[300px] w-full h-[200%] relative">
<!-- <div class="flex justify-between bg-[#3f3f3f] text-gray-50 pl-[300px] w-full h-[200%] relative"> -->

  <!-- 사이드 -->
  <div id="menu" class="fixed h-full left-0 w-[300px] duration-200">
    <!-- 사이드 여닫기 -->
    <div  class="text-right bg-[#2f2f2f] pr-5 pt-5">
      <button onclick=test() class="material-symbols-outlined">
        menu_open
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

    <!-- 메인 -->
    <div class="h-full w-full">

      <div class="p-5">

        <div class="flex bg-[#1f1f1f] rounded mb-3 drop-shadow-2xl items-center place-content-between">
          <div class="opacity-90 p-3 flex gap-1">
            <h2>전체글보기 - 등록</h2>
            <h2 class="font-bold animate-pulse"><?=$total?></h2>
            <h2>건</h2>
          </div>
          <div class="p-3">
            <a href="#" class="hover:opacity-80 hover:underline">더보기 〉</a>
          </div>
        </div>

        <div class="bg-[#2f2f2f] p-5 border border-[#4f4f4f] rounded flex flex-col gap-5 relative drop-shadow-2xl">

          <table class="text-gray-50 w-full">
            <th class="opacity-70 pb-3 border-b border-[#4f4f4f]">ID</th>
            <th class="opacity-70 pb-3 border-b border-[#4f4f4f]">제목</th>
            <th class="opacity-70 pb-3 border-b border-[#4f4f4f]">작성자</th>
            <th class="opacity-70 pb-3 border-b border-[#4f4f4f]">작성일</th>
            <th class="opacity-70 pb-3 border-b border-[#4f4f4f]">조회</th>
            <?foreach($list as $li):?>
              <tr class="border-b text-center border-[#4f4f4f]">
                <td class="py-2 px-1"><?=$li->idx?></td>
                <td class="py-2 px-1 pl-5 hover:cursor-pointer hover:underline hover:opacity-70 text-start"><?=$li->title?></td>
                <td class="py-2 px-1 hover:cursor-pointer hover:underline hover:opacity-70">정윤목</td>
                <td class="py-2 px-1"><?=$li->regdate?></td>
                <td class="py-2 px-1">100</td>
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

function test() {
  // 활용
  let elm = document.getElementById('menu'); 
  let elm2 = document.getElementById('main'); 

  if(elm.getElementById === 'open'){ 

    elm.getElementById = 'close'; 
    var style = document.createElement('style');
    style.innerHTML="#menu{width:300px;}";
    document.head.appendChild(style);

    elm2.getElementById = 'show'; 
    var style2 = document.createElement('style');
    style2.innerHTML="#main{display: inherit;}";
    document.head.appendChild(style2);

    elm3.getElementById = 'p'; 
    var style3 = document.createElement('style');
    style3.innerHTML="#base{padding-right: -200px;}";
    document.head.appendChild(style3);

    // styleTest.innerHTML="#menu{height:30px;} #menu{display: none;}";
  } else { 

    elm.getElementById = 'open';
    var style = document.createElement('style');
    style.innerHTML="#menu{width:100px;} #menu{hight:100%;}";
    document.head.appendChild(style);

    elm2.getElementById = 'disible'; 
    var style2 = document.createElement('style');
    style2.innerHTML="#main{display: none;} #{hight:100%;}";
    document.head.appendChild(style2);

    elm3.getElementById = 'm'; 
    var style3 = document.createElement('style');
    style3.innerHTML="#base{display: inherit;}";
    document.head.appendChild(style3);
  }
}

</script>