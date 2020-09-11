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
<link href="../layout/styles/default.css?after" rel="stylesheet" type="text/css" media="all" />
<link href="../layout/styles/fonts.css?after" rel="stylesheet" type="text/css" media="all" />
</head>

<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->

</head>

<body>
<div id="wrapper1">
  <div id="header-wrapper">
    <div id="header" class="container">
      <div id="search">
        <form action = "search.php?Order='reviewNo'" method="post" id="searchform">
        <input type="text" name ="search" size="20" value="" class="searchtext"/>&nbsp;&nbsp;
        <input type="submit" class="button-small2" value="검색"/>
        </form>
      </div>
        <br>
        <br>
      <?php

      session_start();
      if(!isset($_SESSION['user_id'])){
        echo "<a href=\"login.php\" class=\"loginButton\">LOGIN</a>";
      }
      else{
        $user_id = $_SESSION['user_id'];

        @$db = new mysqli('localhost', 'rereview', 'Team6', 'lecture');
        if (mysqli_connect_errno()) {
          echo "<p>데이터베이스 연결 오류<br />
            다음에 다시 시도하세요</p>";
          exit;
         }

          $username;

        $query= "SELECT username from user where userid=?";
        $stmt=$db->prepare($query);
        $stmt->bind_param('s',$user_id);
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($username);
        
        while($stmt->fetch()){};

          echo "<a href=\"../logout.php\" class=\"loginButton\">LOGOUT</a><p class=\"welcommessage\"><strong>$username</strong>님 환영합니다.</p>";
      }

      ?>
      <p><br><br><br> </p>
      <div id="logo"> <span class="icon icon-cogs"></span>
        <h1><a href="../index.php">Rereview</a></h1>
        <span>Help your study</span> </div>

        <div class="navbar">
          <div class="dropdown">
              <a href="../index.php">Home</a>
            </div>  
            <div class="dropdown">
            <a class="dropbtn">Write Review</a>
              <div class="dropdown-content">
                <a href="full-width_TOEIC.php">TOEIC</a>
                <a href="full-width_TOEFL.php">TOEFL</a>
                <a href="full-width_TEPS.php">TEPS</a>
              </div>
          </div>
          <div class="dropdown">
            <a class="dropbtn">Read Review</a>
              <div class="dropdown-content">
                <a href="review_TOEIC.php?Order='ReviewNo'">TOEIC</a>
                <a href="review_TOEFL.php?Order='ReviewNo'">TOEFL</a>
                <a href="review_TEPS.php?Order='ReviewNo'">TEPS</a>
              </div>
          </div> 
          <div class="dropdown">
            <a href="userinfo.php">Member Information</a>
          </div> 
        </div>
    </div>
  </div>
</div>

<div class="wrapper_2">
  <div id="reading">
  <?php
  $reviewNo=$_GET['Noreview'];
  
   @$db = new mysqli('localhost', 'rereview', 'Team6', 'lecture');

   if (mysqli_connect_errno()) {

      echo "<p>Error: Could not connect to database.<br />
   
      Please try again later.</p>";

      exit;
   }

   $result = $db -> query("SELECT l.LectureName, l.Teacher, r.Title, l.LectureNo, r.Star, r.Review From Review As r join lectures as l on l.lectureno=r.lectureno where reviewNo =$reviewNo");


  echo "<table border ='1'>";

  if($result->num_rows>0){
    while($row = $result->fetch_assoc()){
      $text=nl2br($row["Review"]);
      echo "<div class=\"show\"> <div class=\"read\"><strong>제목&nbsp;&nbsp;&nbsp;</strong>". $row["Title"]."</div><div class=\"read\"><strong>강좌명&nbsp;&nbsp&nbsp;</strong>". $row["LectureName"] ."<strong>&nbsp;&nbsp;&nbsp;강사명&nbsp;&nbsp;&nbsp;</strong>". $row["Teacher"] ."<strong>&nbsp;&nbsp;&nbsp;점수&nbsp;&nbsp&nbsp;</strong>".$row["Star"] ."</div>
        -------------------------------------------------------------------------------<div class=\"readingcontents\" ><br><strong>리뷰 내용</strong><br>".$text."</td></tr>";
    }
  }
 

  else{
      echo "0 result";
    }

      echo "</table></div>"; 
  

    $db->close();
  ?>
</div>
</div>

<div id="footer" class="container">
  <div class="title">
    <span class="byline">오픈 소프트웨어 플랫폼 6팀 <br>
    Rereview Company</span> 
  </div>
  <ul class="contact">
    <li><a href="#" class="icon icon-twitter"><span>Twitter</span></a></li>
    <li><a href="#" class="icon icon-facebook"><span></span></a></li>
    <li><a href="#" class="icon icon-dribbble"><span>Pinterest</span></a></li>
    <li><a href="#" class="icon icon-tumblr"><span>Google+</span></a></li>
    <li><a href="#" class="icon icon-rss"><span>Pinterest</span></a></li>
  </ul>
</div>
<div id="copyright" class="container">
  <p>&copy; Untitled. All rights reserved. | Photos by <a href="http://fotogrph.com/">Fotogrph</a> | Design by <a href="http://templated.co" rel="nofollow">TEMPLATED</a>.</p>
</div>
</body>
</html>
