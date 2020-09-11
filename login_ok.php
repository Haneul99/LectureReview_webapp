<?php
if(!isset($_POST['user_id']) || !isset($_POST['user_pw'])) exit;
$user_id = $_POST['user_id'];
$user_pw = $_POST['user_pw'];


 @$db = new mysqli('localhost', 'rereview', 'Team6', 'lecture');
if (mysqli_connect_errno()) {
		echo "<p>데이터베이스 연결 오류<br />
   		다음에 다시 시도하세요</p>";
		exit;
   }

$query= "SELECT password from user where userid=?";
$stmt=$db->prepare($query);
$stmt->bind_param('s',$user_id);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($real_pw);
while($stmt->fetch()){};


if (empty($real_pw)){
		echo "<script>alert('존재하지 않는 회원정보 입니다.');history.back();</script>";
		exit;
   }


if($real_pw != $user_pw) {
        echo "<script>alert('패스워드가 잘못되었습니다.');history.back();</script>";
        exit;
}

session_start();
$_SESSION['user_id'] = $user_id;
$_SESSION['user_pw'] = $user_pw;
?>
<meta http-equiv='refresh' content='0;url=index.php'>