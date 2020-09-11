<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!--
Design by TEMPLATED
http://templated.co
Released for free under the Creative Commons Attribution License

Name       : Embellished 
Description: A two-column, fixed-width design with dark color scheme.
Version    : 1.0
Released   : 20140207

-->
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
<link href="../layout/styles/default.css?after?after" rel="stylesheet" type="text/css" media="all" />
<link href="../layout/styles/fonts.css?after" rel="stylesheet" type="text/css" media="all" />
</head>

<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->

</head>

<body>

<div class="wrapper_2">
  <div id="writing">
  <h2>조회된 강좌</h2>
  <br><br><br>	


<?php
	$Teacher = $_POST['teacher'];

	 @$db = new mysqli('localhost', 'rereview', 'Team6', 'lecture');

   if (mysqli_connect_errno()) {

      echo "<p>Error: Could not connect to database.<br />
   
      Please try again later.</p>";

      exit;
   }

   $result = $db->query("select lecturename, teacher from lectures where teacher like '%$Teacher%'");

   if($result->num_rows > 0){
         while($row = $result->fetch_assoc()) {
         	$Lecname=$row["lecturename"];
          $teacher=$row["teacher"];
   			echo "<tr><td><a href =\"full-width_TEPS2.php?Lecturename=$Lecname&Teacher=$teacher\">".$row['lecturename']."</td></tr><br>";
   		}
   	}

   	else{
   	 echo "<script>alert('조회된 강사명이 없습니다.');
   	 	history.back();
   	 </script>";
   }


?>

</div>
</div>
</body>