<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>

<div class="bg-[#3f3f3f] text-gray-50 w-full h-full pt-[140px] mt-[-140px]">
  
  <!-- 메인 틀 -->
  <div class="flex h-full w-full">

    <!-- 사이드 로드 -->
    <div class="">
      <?$this->load->view('sidebar');?>
    </div>

    <!-- 컨텐츠 -->
    <div class="p-10 w-full">

      <div class="bg-[#2f2f2f] mb-5 opacity-90 p-5 flex gap-1">
        <h2>자유게시판 - 게시글 등록</h2>
      </div>

      <div class="bg-[#2f2f2f] border border-gray-500 p-10 rounded flex flex-col gap-5 relative drop-shadow-2xl">

        <div>

          <form class="h-full" action="/board_create/store" method="post">

            <div class="flex flex-col h-full gap-3">
              <h2>제목</h2>
              <input class="rounded outline-none duration-200 p-3 bg-[#3f3f3f] border border-slate-400 focus:border-slate-500 focus:bg-[#2f2f2f]" type="text" name="title" value="" />
              <div class="text-black h-[300px]">
                <textarea id="editor" name="contents"></textarea>                
              </div>
              <!-- <textarea class="rounded outline-none duration-200 p-3 bg-[#3f3f3f] border border-slate-400 focus:border-slate-500 focus:bg-[#2f2f2f]" name="contents" rows="8" value=""></textarea> -->
              <input class="p-3 bg-blue-500 rounded cursor-pointer hover:opacity-80 duration-200" type="submit" value=" 저장 " />
            </div>
            
          </form>
          
        </div>

      </div>

    </div>

  </div>

</div>

<style>
  .ck-editor__editable { height: 300px; }
</style>

<script>

  ClassicEditor
    .create( document.querySelector( '#editor' ) )
    .catch( error => {
        console.error( error );
    } );

</script>