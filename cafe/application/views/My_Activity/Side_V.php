<div class="p-5 flex flex-col gap-3 border-r border-dashed border-[#4f4f4f]">

  <div class="flex gap-3 whitespace-nowrap px-3 py-4 border border-[#4f4f4f] bg-[#3f3f3f] rounded hover:bg-[#4f4f4f] duration-200">
    <span class="material-symbols-outlined">
      edit
    </span>
    <a href="/my_activity/post">작성글</a>
  </div>
  <div class="flex gap-3 whitespace-nowrap px-3 py-4 border border-[#4f4f4f] bg-[#3f3f3f] rounded hover:bg-[#4f4f4f] duration-200">
    <span class="material-symbols-outlined">
      chat_paste_go
    </span>
    <a href="/my_activity/comment">작성 댓글</a>
  </div>
  <div class="flex gap-3 whitespace-nowrap px-3 py-4 border border-[#4f4f4f] bg-[#3f3f3f] rounded hover:bg-[#4f4f4f] duration-200">
    <span class="material-symbols-outlined">
      rate_review
    </span>
    <a href="/my_activity/post_in_comment">댓글단 글</a>
  </div>
  <div class="flex gap-3 whitespace-nowrap px-3 py-4 border border-[#4f4f4f] bg-[#3f3f3f] rounded hover:bg-[#4f4f4f] duration-200">
    <span class="material-symbols-outlined">
      thumb_up
    </span>
    <a href="/my_activity/post_like">좋아요한 글</a>
  </div>
  <div class="flex gap-3 whitespace-nowrap px-3 py-4 border border-[#4f4f4f] bg-[#3f3f3f] rounded hover:bg-[#4f4f4f] duration-200">
    <span class="material-symbols-outlined">
      thumb_down
    </span>
    <a href="/my_activity/post_notlike">싫요한 글</a>
  </div>
  <div class="flex gap-3 whitespace-nowrap px-3 py-4 border border-[#4f4f4f] bg-[#3f3f3f] rounded hover:bg-[#4f4f4f] duration-200">
    <span class="material-symbols-outlined">
      scan_delete
    </span>
    <a href="/my_activity/delete_post">삭제한 게시글</a>
  </div>

  <!-- 구분선 -->
  <div class="border-b mt-2 border-[#3f3f3f]"></div>

  <p><?= $this->uri->segment(2); ?></p>

</div>