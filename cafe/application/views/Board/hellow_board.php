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
        <h2>가입인사 - 등록</h2>
        <h2 class="font-bold animate-pulse"><?=$total?></h2>
        <h2>건</h2>
      </div>

      <div class="bg-[#2f2f2f] border border-gray-500 w-[500px] p-10 rounded flex flex-col gap-5 relative drop-shadow-2xl">

        <div>
          <table class="text-gray-50 w-full">
            <th>ID</th>
            <th>제목</th>
            <th>날짜</th>
            <?foreach($list as $li):?>
              <tr class="border-b border-gray-500">
                <td class="p-2"><?=$li->idx?></td>
                <td class=""><?=$li->title?></td>
                <td class=""><?=$li->regdate?></td>
              </tr>
            <?endforeach?>
          </table>
        </div>

      </div>

    </div>

  </div>

</div>