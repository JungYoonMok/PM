<!DOCTYPE text/html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <style>
    @font-face {
      font-family: 's-core';
      src: url('../assets/S-Core_Dream_OTF/SCDream4.otf') format('truetype');
    }
    body {
      background : #3f3f3f;
    	font-family: 's-core';
    }

    /* input number */
    input::-webkit-inner-spin-button {
    appearance: none;
    -moz-appearance: none;
    -webkit-appearance: none;
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
    *::selection {
      background: #9f9f9f;
      color: #3f3f3f;
    }

    /* snow */
    .snowflake {
      width: 8px;
      height: 8px;
      background-color: white;
      border-radius: 50%;
      position: fixed;
      top: -8px;
      /* 레이아웃 깨짐 방지 */
      margin-left: -10%;
      margin-right: -10%;
      /* animation: fall 10s linear; */
    }
    @keyframes fall {
      from {}
      to {
        transform: translateY(100vh);
        opacity: 0;
      }
    }

  </style>

  <!-- tailwind -->
  <!-- <link rel="stylesheet" href="/output.css"> -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- jquery -->
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

  <!-- font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nosifer&display=swap" rel="stylesheet">

  <!-- icon -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

  <!-- 에디터 -->
  <!-- Toast UI Editor의 스타일시트 -->
  <!-- <link rel="stylesheet" href="https://uicdn.toast.com/editor/latest/toastui-editor.min.css" /> -->
  <link rel="stylesheet" href="https://uicdn.toast.com/editor/latest/toastui-editor.css" />
  <!-- Toast UI Editor의 JavaScript -->
  <script src="https://uicdn.toast.com/editor/latest/toastui-editor-all.min.js"></script>
  
</head>
<body>

    <!-- 베이스 -->
    <div id="base" class="w-full h-full flex relative duration-200 pl-[300px]">
      
      <!-- 사이드 -->
      <div id="menu" class="fixed left-0 w-[300px] h-full">
        <!-- 여닫기 -->
        <div class="bg-[#2f2f2f] pr-5 pt-5 text-right border-r border-[#5f5f5f]">
          <button id="munu_name" onclick=SideBarTab() 
          class="material-symbols-outlined text-gray-200 hover:scale-[98%] duration-200 hover:opacity-80">
            menu
          </button>
        </div>
        <!-- 메뉴 -->
        <div class="bg-[#2f2f2f] h-full border-r border-[#5f5f5f]">
          <div id="main" class="">
            <? $this->load->view('side_bar'); ?>
          </div>
        </div>
      </div>
      
      <!-- 메인 -->
      <div class="flex flex-col w-full h-full">

        <!-- 헤더 -->
        <div class="w-full">
          <?= $header ?>
        </div>
          
        <!-- 컨텐츠 -->
        <div>
          <?= $contents ?>
        </div>
        
        <!-- 웨이브 -->
        <div class="">
          <!-- <? $this->load->view('wave')?> -->
        </div>

        <!-- 최상단 최하단 버튼 -->
        <div hidden id="side_btn" class="fixed right-5 bottom-5 mb-[1%]">
          <? $this->load->view('side_btn'); ?>
        </div>
        
      </div>

    </div>

  </body>
</html>

<script> 

  // snow
  const MIN_DURATION = 10;
  const body = document.querySelector('body');
  function makeSnowflake() {
    const snowflake = document.createElement('div');
    const delay = Math.random() * 10;
    const initialOpacity = Math.random();
    const duration = Math.random() * 20 + MIN_DURATION;
    snowflake.classList.add('snowflake');
    snowflake.style.left = Math.random() * window.innerWidth + 'px';
    snowflake.style.animationDelay = delay + 's';
    snowflake.style.opacity = initialOpacity;
    snowflake.style.animation = `fall ${duration}s linear`;
    body.appendChild(snowflake);
    setTimeout(() => {
      body.removeChild(snowflake);
      makeSnowflake();
    }, (duration + delay) * 1000);
  }
  // for(let index = 0; index < 50; index++) {
  //   setTimeout(makeSnowflake, 500 * index);
  // }
  // snow end

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

// 스크롤바 존재 여부
$(document).ready(function() {

  var hasScrollbar = function() {
    return $(document).height() > $(window).height();
  };

  setInterval(() => {
    if (hasScrollbar()) {
      $('#side_btn').show();
    } else {
      $('#side_btn').hide();
    }
  }, 300);

});


</script>