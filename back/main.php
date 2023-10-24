<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>비드코칭연구소</title>
</head>
<body>

<h2>작품 추가하기</h2>
  <h3>등록할 작품 정보를 입력해주세요</h3><hr>
  <form action="check.php" method="post"">
    <table>
      <tr>
        <td>이름을 입력해주세요</td>
        <td><input type="text" name="title"></td>
      </tr>
      <tr>
        <td>작가명을 입력해주세요</td>
        <td><input type="text" name="author"></td>
      </tr>
      <tr>
        <td>등록된 날짜 입력해주세요</td>
        <td><input type="date" name="date"></td>
      </tr>
    </table>
      <input type="submit" value="작품 등록">
      <input type="reset" value="다시 입력하기">
  </form>

  <!-- 목록불러오기 -->
  <form action="select.php" method="post">
    <input type="submit" value="작품 목록 조회">
  </form>

</body>
</html>