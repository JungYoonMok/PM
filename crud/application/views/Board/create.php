<script src="https://cdn.tailwindcss.com"></script>

<div class="grid place-items-center mt-[200px]">
  <div class="bg-[#1f1f1f] p-10 rounded">
    <form name="bfpm" action="/crud/board/store" method="post" enctype="multipart/form-data">
      <table class="">
        <tr>
          <td>
            <p class="text-gray-100 mb-1 text-lg">
              제목
            </p>
            <input class="bg-[#3f3f3f] w-[400px] h-[50px] rounded outline-none text-gray-50 p-5" type="text" name="title" value="">
          </td>
        </tr>
        <tr>
          <td>
            <p class="text-gray-100 mt-5 mb-1 text-lg">
              내용
            </p>
            <textarea class="bg-[#3f3f3f] w-[400px] min-h-[100px] rounded outline-none text-gray-50 p-5" name="contens" rows="8"></textarea>
          </td>
        </tr>
        <tr>
          <td>
            <p class="text-gray-100 mt-5 mb-1 text-lg">
              파일
            </p>
            <input type="file" class="bg-[#3f3f3f] w-[400px] min-h-[50px] rounded outline-none text-gray-50 p-5" name="file_1" value=""/>
          </td>
        </tr>
        <tr>
          <th class="flex gap-3" colspan="2">
            <a class="mt-5 bg-[#1f1f1f] hover:bg-[#2f2f2f] hover:animate-pulse text-gray-50 px-10 py-5 rounded w-full cursor-pointer" href="/crud/board">
              취소
            </a>
            <input class="mt-5 bg-blue-400 text-gray-50 px-10 py-5 rounded w-full cursor-pointer hover:animate-pulse" type="submit" value=" 저장 ">
          </th>
        </tr>
      </table>
    </form>
  </div>
</div>