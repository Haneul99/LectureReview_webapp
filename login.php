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
<link href="layout/styles/default.css?after" rel="stylesheet" type="text/css" media="all" />
<link href="layout/styles/fonts.css?after" rel="stylesheet" type="text/css" media="all" />
</head>

<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->

</head>
<body>
<div id="wrapper1">
  <div id="header-wrapper">
    <div id="header" class="container">
      <?php

      session_start();
      if(!isset($_SESSION['user_id'])){
        echo "<a href=\"login.php\" class=\"loginButton\">LOGIN</a>";
      }
      else{
        $user_id = $_SESSION['user_id'];
          echo "<a href=\"logout.php\" class=\"loginButton\">LOGOUT</a><p class=\"welcommessage\"><strong>$user_id</strong>님 환영합니다.</p>";
      }

      ?>
      <p><br><br><br> </p>
      <div id="logo"> <span class="icon icon-cogs"></span>
        <h1><a href="index.php">Rereview</a></h1>
        <span>Help your study</span> </div>

        <div class="navbar">
          <div class="dropdown">
              <a href="index.php">Home</a>
            </div>  
            <div class="dropdown">
            <a class="dropbtn">Write Review</a>
              <div class="dropdown-content">
                <a href="pages/full-width_TOEIC.php">TOEIC</a>
                <a href="pages/full-width_TOEFL.php">TOEFL</a>
                <a href="pages/full-width_TEPS.php">TEPS</a>
              </div>
          </div>
          <div class="dropdown">
            <a class="dropbtn">Read Review</a>
              <div class="dropdown-content">
                <a href="pages/review_TOEIC.php?Order='ReviewNo'">TOEIC</a>
                <a href="pages/review_TOEFL.php?Order='ReviewNo'">TOEFL</a>
                <a href="pages/review_TEPS.php?Order='ReviewNo'">TEPS</a>
              </div>
          </div> 
          <div class="dropdown">
            <a href="pages/userinfo.php">Member Information</a>
          </div> 
        </div>
    </div>
  </div>
</div>
<div class="login-page">
  <div class="for_login">
    <form action = "login_ok.php" method ="post" class="login-form">
      <input id = "user_id" name ="user_id" type="text" placeholder="username"/>
      <input id = "user_pw" name ="user_pw" type="password" placeholder="password"/>
      <button type="submit" >login</button>
      <p class="message">Not registered? <a href="pages/style_demo.html">Create an account</a></p>
    </form>
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