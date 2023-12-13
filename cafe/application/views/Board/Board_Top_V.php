<div class="bg-[#2f2f2f] border shadow-2xl border-[#4f4f4f] opacity-90 p-5 flex flex-col gap-5">
  <div class="flex gap-1">
    <p>
      <?= 
      ($this->uri->segment(1) == 'notice' ? '공지사항' : 
      ($this->uri->segment(1) == 'freeboard' ? '자유게시판' : 
      ($this->uri->segment(1) == 'hellow' ? '가입인사' :
      '어디지' ) ) );
      ?>
      - 전체 게시물</p>
    <p id='total_value' class="font-bold animate-pulse"></p>
    <p>개</p>
  </div>
  <div class="border border-[#4f4f4f] p-3 rounded bg-[#1f1f1f]">
    <p>자유로운 소통의 공간입니다, 악의적인 글은 삼가해 주세요 😉</p>
  </div>
</div>