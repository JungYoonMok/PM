<div class="p-5 flex flex-col gap-3 md:border-r md:border-dashed md:border-[#4f4f4f]">

  <a href="/my_activity/post" class="<?= $this->uri->segment(2) == 'post' ? 'bg-[#1f1f1f] hover:opacity-80' : 'bg-[#3f3f3f] hover:bg-[#2f2f2f] hover:translate-y-[2px]' ?> flex gap-3 whitespace-nowrap px-3 py-4 border border-[#4f4f4f] rounded duration-200">
    <p class="material-symbols-outlined">edit</p>
    <p>작성글</p>
  </a>

  <a href="/my_activity/comment" class="<?= $this->uri->segment(2) == 'comment' ? 'bg-[#1f1f1f] hover:opacity-80' : 'bg-[#3f3f3f] hover:bg-[#2f2f2f] hover:translate-y-[2px]' ?> flex gap-3 whitespace-nowrap px-3 py-4 border border-[#4f4f4f] rounded duration-200">
    <p class="material-symbols-outlined">chat_paste_go</p>
    <p>작성 댓글</p>
  </a>

  <!-- <a href="/my_activity/post_in_comment" class="<?= $this->uri->segment(2) == 'post_in_comment' ? 'bg-[#1f1f1f] hover:opacity-80' : 'bg-[#3f3f3f] hover:bg-[#2f2f2f] hover:translate-y-[2px]' ?> flex gap-3 whitespace-nowrap px-3 py-4 border border-[#4f4f4f] rounded duration-200">
    <p class="material-symbols-outlined">rate_review</p>
    <p>댓글단 글</p>
  </a> -->

  <a href="/my_activity/post_like" class="<?= $this->uri->segment(2) == 'post_like' ? 'bg-[#1f1f1f] hover:opacity-80' : 'bg-[#3f3f3f] hover:bg-[#2f2f2f] hover:translate-y-[2px]' ?> flex gap-3 whitespace-nowrap px-3 py-4 border border-[#4f4f4f] rounded duration-200">
    <p class="material-symbols-outlined">thumb_up</p>
    <p>좋아요 글</p>
  </a>

  <a href="/my_activity/post_notlike" class="<?= $this->uri->segment(2) == 'post_notlike' ? 'bg-[#1f1f1f] hover:opacity-80' : 'bg-[#3f3f3f] hover:bg-[#2f2f2f] hover:translate-y-[2px]' ?> flex gap-3 whitespace-nowrap px-3 py-4 border border-[#4f4f4f] rounded duration-200">
    <p class="material-symbols-outlined">thumb_down</p>
    <p>싫어요 글</p>
  </a>

  <a href="/my_activity/delete_post" class="<?= $this->uri->segment(2) == 'delete_post' ? 'bg-[#1f1f1f] hover:opacity-80' : 'bg-[#3f3f3f] hover:bg-[#2f2f2f] hover:translate-y-[2px]' ?> flex gap-3 whitespace-nowrap px-3 py-4 border border-[#4f4f4f] rounded duration-200">
    <p class="material-symbols-outlined">scan_delete</p>
    <p>삭제한 게시글</p>
  </a>
  
  <!-- 구분선 -->
  <div class="border-b mt-2 border-[#3f3f3f]"></div>
  
  <a href="/my_activity/exp_point" class="<?= $this->uri->segment(2) == 'exp_point' ? 'bg-[#1f1f1f] hover:opacity-80' : 'bg-[#3f3f3f] hover:bg-[#2f2f2f] hover:translate-y-[2px]' ?> flex gap-3 whitespace-nowrap px-3 py-4 border border-[#4f4f4f] rounded duration-200">
    <p class="material-symbols-outlined">expand_all</p>
    <p>경혐치 & 포인트</p>
  </a>

</div>