<div class="bg-[#3f3f3f] text-gray-50 w-full h-full pt-[140px] mt-[-140px]">
  
  <!-- 메인 틀 -->
  <div class="flex h-full w-full">

    <!-- 사이드 로드 -->
    <div class="">
      <?$this->load->view('sidebar');?>
    </div>

    <!-- 컨텐츠 -->
    <div class="p-10">

      <div class="bg-[#2f2f2f] mb-5 opacity-90 p-5 w-[500px] flex gap-1">
        <h2>자유게시판 - 게시글 등록</h2>
      </div>

      <div class="bg-[#2f2f2f] border border-gray-500 w-[500px] p-10 rounded flex flex-col gap-5 relative drop-shadow-2xl">

        <div>

          <form action="/board_create/store" method="post">
            <table>
              <tr>
                <th>제목</th>
                <td>
                  <input type="text" name="title" value="" />
                </td>
              </tr>
              <tr>
                <th></th>
                <td>
                  <textarea name="contents" rows="8"></textarea>
                </td>
              </tr>
              <tr>
                <th colspan="2">
                  <input type="submit" value=" 저장 " />
                </th>
              </tr>
            </table>
          </form>
          
        </div>

      </div>

    </div>

  </div>

</div>