<script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>

<div class="bg-[#3f3f3f] text-gray-50 w-full h-full">
  
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

      <div class="bg-[#2f2f2f] border border-gray-500 p-5 rounded flex flex-col gap-5 relative drop-shadow-2xl">

          <!-- CKEditor 사용시 form에 enctype="multipart/form-data" 작성하지 않아도 된다. -->
          <form class="" action="/board_create/store" method="post"">

            <div class="flex flex-col h-full w-full gap-3">
              <h2>제목</h2>
              <input class="rounded outline-none duration-200 p-3 bg-[#3f3f3f] border border-slate-400 focus:border-slate-500 focus:bg-[#2f2f2f]" type="text" name="title" value="" />
              <div class="">
                <textarea id="editor" name="contents"></textarea>                
              </div>
              <!-- <textarea class="rounded outline-none duration-200 p-3 bg-[#3f3f3f] border border-slate-400 focus:border-slate-500 focus:bg-[#2f2f2f]" name="contents" rows="8" value=""></textarea> -->
              <div class="flex justify-between place-items-center">
                <div>
                  <p class="">CK Editor -</p>
                </div>
                <input class="w-[30%] p-3 bg-blue-500 rounded cursor-pointer hover:opacity-80 duration-200" type="submit" value=" 저장 " />
              </div>
            </div>
          
          </form>
          
        </div>

      </div>

    </div>

  </div>

</div>

<style>
  .ck-editor__editable { height: 40rem; color : black; }
</style>

<script>

  var myEditor;

  ClassicEditor.create(document.querySelector('#editor'),
  {

    ckfinder: {
      uploadUrl: '/board_create/store_file',
      // uploadUrl: './uploads',
      // openerMethod: 'popup'
    }

  })
  .then( editor => {
    console.log( 'Editor was initialized', editor );
    myEditor = editor;
  })
  .catch( err => {
    console.log('에러다', err );
    }
  );

</script>