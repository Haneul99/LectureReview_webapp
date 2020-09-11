<?php
   			$user_id=$_POST['user_id']; 
        $newusername=$_POST['newusername'];

   			 @$db = new mysqli('localhost', 'rereview', 'Team6', 'lecture');


  			 if (mysqli_connect_errno()) {

     			 echo "<p>Error: Could not connect to database.<br />
   
    			  Please try again later.</p>";

     			 exit;
  			 }
         $newusername=$_POST['newusername'];

  			 $query="update user set username=? where userid=?";
         $stmt = $db->prepare($query);
         $stmt->bind_param('ss',$newusername, $user_id);
          $stmt->execute();

          while($stmt->fetch()){}

          if ($stmt->affected_rows > 0) {

              echo "<script>alert('회원 정보가 변경되었습니다.');</script>";
           }
         else {

              echo "<script>alert('변경 실패하였습니다. 다시 시도해주세요.');history.back();</script>";
         }


           $db->close();
   			
   			
   		?>
      <meta http-equiv='refresh' content='0;url=../index.php'>