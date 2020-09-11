<!DOCTYPE html>

<html>

<head>

</head>

<body>

   <?php


   // create short variable names

   $title = $_POST['title'];

   $lecture_name = $_POST['lecture_name'];

   $teacher = $_POST['teacher'];

   $score = $_POST['score'];

   $score = doubleval($score);

   $comment = $_POST['comment'];

   if (
      !isset($_POST['title']) || !isset($_POST['lecture_name'])
      || !isset($_POST['teacher']) || !isset($_POST['score']) || !isset($_POST['comment'])
   ) {
      echo "<script>
            alert(\"필요한 모든 정보를 입력해주세요.\");
         window.history.back();
         </script>";
         exit;
   }

   if($title==""||$lecture_name==""||$teacher==""||$score==""||$comment==""){
      echo "<script>
            alert(\"필요한 모든 정보를 입력해주세요.\");
         window.history.back();
         </script>";
         exit;
   }

   if($score<0||$score>5){
       echo "<script>
            alert(\"점수 범위는 0.0~5.0 입니다.\");
         window.history.back();
         </script>";
         exit;
   }

   @$db = new mysqli('localhost', 'rereview', 'Team6', 'lecture');


   if (mysqli_connect_errno()) {

      echo "<p>Error: Could not connect to database.<br />
   
      Please try again later.</p>";

      exit;
   }

   $query = "SELECT LectureNo FROM lectures WHERE Teacher=? and LectureName=?";

   $stmt = $db->prepare($query);

   $stmt->bind_param('ss', $teacher, $lecture_name);

   $stmt->execute();

   $stmt->store_result();

   $stmt->bind_result($lectureNo);

   while($stmt->fetch()){}

   $query = "INSERT INTO review VALUE (null, ? , 'TEPS', ?, ?, ?)";

   $stmt = $db->prepare($query);

   $stmt->bind_param('sdds', $title, $lectureNo, $score, $comment);

   $stmt->execute();

   while($stmt->fetch()){}

   if ($stmt->affected_rows > 0) {

      echo "<script>alert('리뷰가 작성되었습니다..');</script>";
   }
   else {

      echo "<script>alert('리뷰 작성에 실패하였습니다. 다시 시도해주세요.');history.back();</script>";
   }


   $db->close();


   ?>
   <meta http-equiv='refresh' content='0;url=../index.php'>
</body>

</html>