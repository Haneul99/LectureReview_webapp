<!DOCTYPE html>
<html>
<head>
	<title> membership</title>
</head>

<body>
<?php
	$userid = $_POST['userid'];
	$userpsw =$_POST['userpsw'];
	$username = $_POST['username'];
	$email=$_POST['email'];

	 @$db = new mysqli('localhost', 'rereview', 'Team6', 'lecture');

	 if (mysqli_connect_errno()) {
		echo "<p>데이터베이스 연결 오류<br />
   		다음에 다시 시도하세요</p>";
		exit;
   	}

   	if($userid==""||$userpsw==""||$username==""||$email==""){
   		echo "<script>
		alert(\"모든 정보를 다 채워주세요.\");
		window.history.back();
		</script>";
		exit;
   	}

 
	$query = "INSERT INTO User VALUES(?,?,?,?)";
	$stmt = $db->prepare($query);
	$stmt->bind_param('ssss',$userid, $userpsw, $username,$email);
	$stmt->execute();


	if ($stmt->affected_rows > 0) {
		echo "<script>
		alert(\"회원가입이 완료되었습니다.\");
		location.replace('http://localhost/index.php');
		</script>";
	 } 
	else {
		echo "<script>
		alert(\"문제로 인해 회원가입에 실패했습니다.\");
		 location.replace('http://localhost/pages/style_demo.html');
		</script>";
	}

	$db->close();
 	?>

</body>
</html>