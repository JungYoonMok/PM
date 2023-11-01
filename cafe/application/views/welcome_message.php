<?
  defined('BASEPATH') OR exit('No direct script access allowed');
?>

<script src="https://cdn.tailwindcss.com"></script>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Nosifer&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

<!-- 메인 틀 -->
<div class="flex justify-between bg-[#3f3f3f] text-gray-50 pl-[300px] w-full h-[200%] relative">

  <!-- 사이드 -->
  <div class="fixed h-full left-0">
    <?$this->load->view('sidebar');?>
  </div>

  <!-- 메인 베이스 -->
  <div class="flex flex-col gap-5 w-full">
    <!-- 헤더 -->
    <div>
      <?$this->load->view('header');?>
    </div>

    <!-- 컨텐츠 -->
    <div class="h-full w-full">

      <div class="p-10">

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

    <!-- 푸터 -->
    <div>
      <?$this->load->view('footer');?>
    </div>

    <!-- 최상단 최하단 버튼 -->
    <div class="fixed right-5 bottom-10">
      <?$this->load->view('tb_btn');?>
    </div>
  </div>

</div>