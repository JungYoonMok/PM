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
    <div class="md:mb-20 w-full p-5 flex flex-col gap-5 drop-shadow-2xl">

      <!-- 이전, 다음, 목록 -->
      <div class="flex place-content-end gap-3 opacity-80">
        <a href="" class="bg-blue-500 px-3 py-2 rounded">이전글</a>
        <a href="" class="bg-blue-500 px-3 py-2 rounded">다음글</a>
        <a href="/freeboard" class="bg-blue-500 px-3 py-2 rounded">목록</a>
      </div>

      <div class="bg-[#2f2f2f] p-5 flex flex-col gap-5 border border-gray-500 rounded">
        
        <!-- 게시글 타입, 제목, 작성날짜-->
        <div class="flex justify-between">          
          <div class="flex gap-5">
            <span class="material-symbols-outlined">
              location_on
            </span>
            <a class="hover:underline duration-200" href="/freeboard">
              <?=$post->board_type?>
            </a>
            <p>〉</p>
            <p><?=$post->title?></p>
          </div>
          <div class="flex place-items-center gap-3 opacity-80 text-sm">
            <span class="material-symbols-outlined">
              edit_calendar
            </span>
            <p class=""><?=substr($post->regdate, 0, 16);?></p>
          </div>
        </div>

        <!-- 구분선 -->
        <div class="border-b border-gray-500"></div>
        
        <div class="flex flex-col gap-5">

          <!-- 데이터 전송 폼 -->
          <form class="flex flex-col gap-5" action="" method="post">
            
            <!-- 작성자 -->
            <div class="flex justify-between place-items-center opacity-80">
              <div class="w-full flex gap-3 place-content-start">
                <div class="relative drop-shadow-2xl flex rounded-[50%] place-content-center border border-gray-500 h-14 w-14 bg-[#3f3f3f]">
                  <img 
                    width="100%"
                    src="https://pds.saramin.co.kr/workenv-bg/202303/09/rr8njw_y8e6-w09k06_workenv-bg.png"
                    class="material-symbols-outlined rounded-[50%] text-5xl w-full h-full text-gray-400">
                  </img>
                </div>
                <div>
                  <a href="#" class="font-bold hover:underline hover:opacity-80 duration-200">
                    <?=$post->user_id;?>(등급)
                  </a>
                  <div>
                    hi
                  </div>
                </div>
              </div>
              <div class="flex gap-7 text-sm whitespace-nowrap">
                <div class="flex gap-2">
                  <span class="material-symbols-outlined">
                    visibility
                  </span>
                  <p>139</p>
                </div>
                <div class="flex gap-2">
                  <span class="material-symbols-outlined">
                    chat_bubble
                  </span>
                  <p>8</p>
                </div>
                <input type="text" id="link" value="http://localhost/freeboard/<?=$post->idx;?>" class="hidden"/>
                <button onclick=urlCopy() class="flex gap-2 hover:opacity-80 duration-200">
                  <span class="material-symbols-outlined">
                    link
                  </span>
                  <p class="">URL 복사</p>
                </button>
              </div>
            </div>

            <!-- 게시글 내용 작성 -->
            <div class="outline-none rounded w-full p-3" required name="contents" cols="30" rows="10">
              <p class="min-h-[500px]">
                <?=$post->contents;?>
              </p>
            </div>

            <!-- 좋아요 및 싫어요 -->
            <div class="flex justify-center gap-5 py-5">
              <div>
                <button class="material-symbols-outlined text-3xl hover:text-yellow-500 duration-200">
                  thumb_up
                </button>
              </div>
              <div>
                <button class="material-symbols-outlined text-3xl hover:text-yellow-500 duration-200">
                  thumb_down
                </button>
              </div>
            </div>

            <!-- 첨부파일 -->
            <div class="flex duration-200 place-items-center p-3 gap-5 <?= $post->files == '' || null ? 'hidden' : $post->files ?>">
              <p>첨부파일</p>
              <div class="">
                <?= $post->files ?>
              </div>
            </div>
            
            <!-- 구분선 -->
            <div class="border-b border-gray-500"></div>

          <!-- 댓글 목록 및 작성 -->
            <div class="flex gap-3 text-sm">
              <!-- 작성자 -->
              <div class="flex gap-3 place-content-start">
                <div class="relative drop-shadow-2xl flex rounded-[50%] place-content-center border border-gray-500 h-14 w-14 bg-[#3f3f3f]">
                  <img 
                    width="100%"
                    src="https://pds.saramin.co.kr/workenv-bg/202303/09/rr8njw_y8e6-w09k06_workenv-bg.png"
                    class="material-symbols-outlined rounded-[50%] text-5xl w-full h-full text-gray-400">
                  </img>
                </div>
                <div>
                  <a href="#" class="font-bold hover:underline hover:opacity-80 duration-200">
                    <?=$comment->user_id;?>(등급)
                  </a>
                  <div>
                    hi
                  </div>
                </div>
              </div>
              <!-- 내용 -->
              <div class="flex flex-col shadow-xl bg-[#4f4f4f] p-3 rounded-tl-none rounded rounded-bl-xl ">

                <p><?= $comment->contents; ?></p>

                <!-- 하단, 작성시간 및 답글쓰기 -->
                <div class="text-sm flex mt-5 justify-end gap-3 opacity-80 text-gray-300 whitespace-nowrap">
                  <p class="-mr-3"><?=substr($comment->regdate, 0, 16);?></p></p>
                  <p>|</p>
                  <button class="hover:underline hover:opacity-80 duration-200" onclick='#'>답글쓰기</button>
                </div>

              </div>

            </div>

            <!-- 비회원 알림 -->
            <div class="flex justify-center bg-[#1f1f1f] p-5 border border-gray-500">
              <a href="/login" class="hover:underline hover:opacity-80 hover:animate-pulse duration-200">
                로그인한 회원만 댓글 등록이 가능합니다.
              </a>
            </div>

            <!-- 댓글 작성 -->
            <div class="text-sm p-5">
              <p>댓글</p>
            </div>

          </form>

        </div>

      </div>
      
    </div>
    <!-- 메인끝 -->

    <!-- 최상단 최하단 버튼 -->
    <div class="fixed right-5 bottom-5 mb-20">
      <?$this->load->view('tb_btn');?>
    </div>
    
  </div>

</div>

<script>

  function urlCopy()
  {
    var url = document.getElementById('link');
    url.style.display='block';    // 숨겨둔 input 태그 block처리
    url.select();    // 복사할 text 블럭
    document.execCommand('copy');    // 드레그된 text 클립보드에 복사
    url.style.display='none';    // 다시 숨기기
    alert('URL이 복사 되었습니다 : )');
  }

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