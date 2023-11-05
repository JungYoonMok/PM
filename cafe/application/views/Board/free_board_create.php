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

      <div class="bg-[#2f2f2f] p-5 flex flex-col gap-5 border border-gray-500 rounded">
        
        <div class="">
          <p>글쓰기</p>
        </div>

        <!-- 구분선 -->
        <div class="border-b border-gray-500"></div>
        
        <div class="flex flex-col gap-5">

          <form class="flex flex-col gap-5" action="/free_board_create/create" method="post">
            
            <!-- 게시판 선택 및 제목 -->
            <div class="bg-[#2f2f2f] flex gap-5">
    
              <!-- 셀렉터 -->
              <div class="w-[30%]">
                <!-- <label for="lang">Language</label> -->
                <select name="board_type" id="lang" required class="outline-none w-full text-whith rounded bg-[#4f4f4f] p-3">
                  <option class="hidden" value="" disabled selected>게시판 선택</option>
                  <option value="공지사항">공지사항</option>
                  <option value="자유게시판">자유게시판</option>
                  <option value="가입인사">가입인사</option>
                </select>
                <!-- <input type="submit" value="Submit" /> -->
              </div>
    
              <!-- 제목입력 -->
              <div class="w-[70%]">
                <input class="w-full outline-none text-whith rounded bg-[#4f4f4f] p-3" required name="title" type="text" placeholder="제목을 입력해주세요"/>
              </div>
    
            </div>

            <!-- 게시글 내용 작성 -->
            <textarea class="outline-none bg-[#4f4f4f] w-full p-3" required name="contents" id="" cols="30" rows="10"></textarea>

            <!-- 공개/비공개 -->
            <div class="flex flex-col gap-2 w-full">
              <h2>게시글 공개 설정</h2>
              <div class="flex gap-2 w-full">
                <div class="p-3 w-full rounded bg-[#4f4f4f]">
                  <input id="1_c" type="radio">
                  <label for="1_c">공개</label>
                </div>
                <div class="p-3 w-full rounded bg-[#4f4f4f]">
                  <input id="2_c" type="radio">
                  <label for="2_c">비공개</label>
                </div>
              </div>
            </div>

            <!-- 첨부파일 -->
            <div class="flex p-3 gap-5 bg-[#4f4f4f]">
              <p>첨부파일</p>
              <input type="file">
            </div>
            
            <!-- 구분선 -->
            <div class="border-b border-gray-500"></div>

            <!-- 게시글 등록 -->
            <div class="w-full text-right">
              <input type="submit" class="p-3 w-[400px] rounded bg-blue-500 duration-200 hover:opacity-80" value="게시글 등록"></input>
            </div>

          </form>

        </div>

      </div>
      
    </div>
    <!-- 메인끝 -->

  </div>
  <!-- 메인 베이스 끝 -->

  <!-- 최상단 최하단 버튼 -->
  <div class="fixed right-5 bottom-5 mb-[1%]">
    <?$this->load->view('tb_btn');?>
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