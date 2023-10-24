<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>비드코칭연구소</title>
</head>
<body>

<?php

// 데이터베이스 정보
$server = "localhost";
$user = "root";
$password = "";
$dbname = "test";

$conn = new mysqli($server, $user, $password, $dbname);

// 데이터베이스 연결 확인
if($conn->connect_error) echo "<h2>접속에 실패하였습니다.</h2>";
else echo "<h2>접속에 성공하였습니다.</h2>";


?>

</body>
</html>