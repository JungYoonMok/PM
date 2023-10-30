<?
  defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="bg-[#3f3f3f] text-gray-50 w-full h-full pt-[140px] mt-[-140px]">
  
  <!-- 메인 틀 -->
  <div class="flex h-full w-full">

    <!-- 사이드 로드 -->
    <div class="">
      <?$this->load->view('sidebar');?>
    </div>

    <!-- 컨텐츠 -->
    <div class="p-10 w-full">

      <div class="flex bg-[#2f2f2f] rounded mb-3 items-center place-content-between">
        <div class="opacity-90 p-3 flex gap-1">
          <h2>전체글보기 - 등록</h2>
          <h2 class="font-bold animate-pulse"><?=$total?></h2>
          <h2>건</h2>
        </div>
        <div class="p-3">
          <a href="#" class="hover:opacity-80 hover:underline">더보기 〉</a>
        </div>
      </div>

      <div class="bg-[#2f2f2f] border border-gray-500 p-5 rounded flex flex-col gap-5 relative drop-shadow-2xl">

        <div>
          <table class="text-gray-50 w-full">
            <th class="opacity-60 pb-3 border-r border-gray-500">ID</th>
            <th class="opacity-60 pb-3 border-r border-gray-500">제목</th>
            <th class="opacity-60 pb-3 border-r border-gray-500">작성자</th>
            <th class="opacity-60 pb-3 border-r border-gray-500">작성일</th>
            <th class="opacity-60 pb-3">조회</th>
            <?foreach($list as $li):?>
              <tr class="border-b text-center border-gray-500">
                <td class="py-2 px-1"><?=$li->idx?></td>
                <td class="py-2 px-1 pl-5 hover:cursor-pointer hover:underline hover:opacity-70 text-start"><?=$li->title?></td>
                <td class="py-2 px-1 hover:cursor-pointer hover:underline hover:opacity-70">정윤목</td>
                <td class="py-2 px-1"><?=$li->regdate?></td>
                <td class="py-2 px-1">100</td>
              </tr>
            <?endforeach?>
          </table>
        </div>

      </div>

    </div>

  </div>

</div>