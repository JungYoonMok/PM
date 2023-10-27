<?
  defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>자유게시판</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

  <!-- <div style="margin : 0 auto; width : 500px; height : 500px;"> -->
  <div class="grid place-items-center mt-[200px]">
    
    <!-- 펄스 에니메이션 -->
    <div class="border border-blue-200 shadow rounded-md p-4 max-w-sm w-full mx-auto hover:animate-spin">
      <div class="animate-pulse flex space-x-4">
        <div class="rounded-full bg-slate-700 h-10 w-10"></div>
        <div class="flex-1 space-y-6 py-1">
          <div class="h-2 bg-slate-700 rounded"></div>
          <div class="space-y-3">
            <div class="grid grid-cols-3 gap-4">
              <div class="h-2 bg-slate-700 rounded col-span-2"></div>
              <div class="h-2 bg-slate-700 rounded col-span-1"></div>
            </div>
            <div class="h-2 bg-slate-700 rounded"></div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="text-center mt-20">
      <!-- <h2 class="text-xl animate-bounce mb-20">어서오세요</h2> -->
      <a class="bg-blue-200 py-5 px-10 rounded" href="/crud/Board">게시판</a>
    </div>

  </div>
  
</body>
</html>