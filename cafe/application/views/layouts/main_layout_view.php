<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>카페 | 메인</title>

  <style>
    body {
      background : #3f3f3f;
    }

    /* scrollbar */
    *::-webkit-scrollbar {
      width: 15px;
      background-color: #3f3f3f;
    }
    *::-webkit-scrollbar-thumb {
      background-color: #8f8f8f;
      border-radius: 15px;
      background-clip: padding-box;
      border: 3px solid transparent;
    }
    *::-webkit-scrollbar-track {
      background-color: #3f3f3f;
      /* margin : 0px 0px; */
      /* border-radius: 10px; */
      /* box-shadow: inset 0px 0px 5px gray; */
    }
  </style>

  <!-- jquery -->
  <script src="https://code.jquery.com/jquery.min.js"></script>

  <!-- font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nosifer&display=swap" rel="stylesheet">

  <!-- icon -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

  <!-- tailwind -->
  <script src="https://cdn.tailwindcss.com"></script>

</head>
  <body>

    <!-- 베이스 -->
    <div id="base" class="w-full h-full flex relative duration-200 pl-[300px]">

      <!-- 사이드 -->
      <div id="menu" class="fixed left-0 w-[300px] h-full">
        <div class="w-full duration-200 h-full">
          <!-- 사이드 여닫기 -->
          <div class="text-right bg-[#2f2f2f] pr-5 pt-5 text-center">
            <button id="munu_name" onclick=SideBarTab() 
            class="material-symbols-outlined text-gray-300 hover:scale-[98%] duration-200 hover:opacity-80">
              menu
            </button>
          </div>
          <div class="bg-[#2f2f2f] h-full">
            <div id="main" class="">
              <?$this->load->view('sidebar');?>
            </div>
          </div>
        </div>
      </div>
      
      <!-- 메인 -->
      <div class="flex flex-col w-full h-full">

        <!-- 헤더 -->
        <div class="w-full">
          <?$this->load->view('header');?>
        </div>
          
        <!-- 컨텐츠 -->
        <div>
          <?= $contents ?>
        </div>

        <!-- 최상단 최하단 버튼 -->
        <div class="fixed right-5 bottom-5 mb-[1%]">
          <?$this->load->view('tb_btn');?>
        </div>
        
      </div>

    </div>

  </body>
</html>

<script>

function SideBarTab() {
  let elm = document.getElementById('main'); 
  if(elm.getElementById === 'open'){
    elm.getElementById = 'close';
    document.getElementById('main').className += ' duration-200 delay-100';

    document.getElementById('menu').classList.remove('w-[65px]');
    document.getElementById('menu').className += ' w-[300px]';
    
    document.getElementById('main').classList.remove('hidden');
    document.getElementById('main').className += ' inline';
    
    document.getElementById('base').classList.remove('pl-[65px]');
    document.getElementById('base').className += ' pl-[300px]';
  } else {
    elm.getElementById = 'open';
    document.getElementById('menu').classList.remove('w-[300px]');
    document.getElementById('menu').className += ' w-[65px]';
    
    document.getElementById('main').className += ' hidden';
    document.getElementById('main').classList.remove('inline');
    
    document.getElementById('base').classList.remove('pl-[300px]');
    document.getElementById('base').className += ' pl-[65px]';
  }
}

</script>