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
<link href="../layout/styles/default.css?after?after?after" rel="stylesheet" type="text/css" media="all" />
<link href="../layout/styles/fonts.css?after" rel="stylesheet" type="text/css" media="all" />
</head>

<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->

</head>

<?php

      session_start();
      if(!isset($_SESSION['user_id'])){
        echo "<script>alert('로그인 해주세요.');history.back();</script>";
    exit;
      }
?>

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
            <a href="userinfo.php">User Information</a>
          </div> 
        </div>
    </div>
  </div>
</div>

<div class="wrapper_2">
  <div id="writing">
  <h2>리뷰 작성-TOEFL</h2>
      <div id="respond">
        <form method="post">
          <br>

          <div style="float:left; width:43%">
            <input type="submit" class="button-small2" value="강사명으로 강의 조회하기" onclick="javascript: form.action='findlecture_TOEFL.php';"/>

            <input type="text"  name="teacher" id="teacher" value="" size="30" style="float:right;" />

           <p><label for="teacher" style="float:right;"><strong>강사명</strong> &nbsp;&nbsp;
           
        </label></p>
        
      </div>
          <p>
            <textarea name="comment" id="comment" cols="100%" rows="30"></textarea>
            <label for="comment" style="display:none;"><small>Comment (required)</small></label>
          </p>
          <p>
            <input class="button-small" name="submit" type="submit" id="submit" value="등록" onclick="javascript: form.action='review_write_TOEFL.php';" />
            &nbsp; &nbsp;
            <input class="button-small" name="reset" type="reset" id="reset" tabindex="5" value="다시작성" />
          </p>
        </form>
      </div>
    </div>
    
  </div>
</div>

<div id="footer" class="container">
  <div class="title">
    <span class="byline">오픈 소프트웨어 플랫폼 6팀 <br>
    Rereview Company</span> </div>
  <ul class="contact">
    <li><a href="#" class="icon icon-twitter"><span>Twitter</span></a></li>
    <li><a href="#" class="icon icon-facebook"><span></span></a></li>
    <li><a href="#" class="icon icon-dribbble"><span>Pinterest</span></a></li>
    <li><a href="#" class="icon icon-tumblr"><span>Google+</span></a></li>
    <li><a href="#" class="icon icon-rss"><span>Pinterest</span></a></li>
  </ul>
</div>



