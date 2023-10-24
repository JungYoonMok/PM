<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>도서 확인</title>
</head>
<body>
    
<h2>도서 추가하기</h2>
  <h3>등록할 책 정보를 입력해주세요</h3><hr>
  <form action="check.php" method="post" accept-charset="UTF-8">
    <table>
        <tr>
          <td>책 이름을 입력해주세요</td>
          <td><input type="text" name="title"></td>
        </tr>
        <tr>
          <td>작가명을 입력해주세요</td>
          <td><input type="text" name="author"></td>
        </tr>
        <tr>
          <td>출판된 날짜 입력해주세요</td>
          <td><input type="date" name="date"></td>
        </tr>
      </table>
      <input type="submit" value="도서 등록">
      <input type="reset" value="다시 입력하기">
  </form>

</body>
</html>