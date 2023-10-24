<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>비드코칭연구소</title>
</head>
<body>

<?

include_once("connection.php");

// booklist에 있는 모든 데이터를 가져옴
$sql = "SELECT * FROM booklist";

// 쿼리 실행결과로 레코드 셋 반환
$result = $conn->query($sql);

if(isset($result) && $result -> num_rows > 0){
  while($row = $result->fetch_assoc()){
    echo $row['id']."번 데이터입니다.";
    echo "<br>";
    echo "제목 : ".$row['title']."<br>";
    echo "이름 : ".$row['author']."<br>";
    echo "날짜 : ".$row['date']."<hr>";
  }
} else echo "검색된 데이터가 없습니다.";

?>

<!-- 목록불러오기 -->
<form action="select.php" method="post">
  <input type="submit" value="작품 목록 조회">
</form>

</body>
</html>