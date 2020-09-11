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
        echo "<a href=\"../login.php\" class=\"loginButton\">LOGIN</a>";
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

          echo "<a href=\"logout.php\" class=\"loginButton\">LOGOUT</a><p class=\"welcommessage\"><strong>$username</strong>님 환영합니다.</p>";
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
  <h1>리뷰 보기-TEPS</h1>
 <form action="review_TOEIC.php?Order=ReviewNo desc" method="post">
    <input type="submit" name="submit" class ="button-small2" value="필터링">
    <p style="float:right">&nbsp;&nbsp;</p>
    <select name="filter" style="width:200px;padding:5px;float:right;font-family: 'Cafe24Oneprettynight';">
      <option value="" class="please">필터 적용 없애기</option>
      <option value="greaterequal">별점 4점 이상</option>
      <option value="lessequal">별점 2점 이하</option>
      <option value="Grammar">Grammar</option>
      <option value="Reading">Reading</option>
      <option value="Vocabulary">Vocabulary</option>
      <option value="Listening">Listening</option>
      <option value="Speaking">Speaking</option>
      <option value="Writing">Writing</option>
    </select> </p>
  </form>
  <br><br><br><br>

  <a href="review_TEPS.php?Order=ReviewNo desc" class="button-small3">최신순<a href="review_TEPS.php?Order=Star desc" class="button-small3">별점높은순<a href="review_TEPS.php?Order=Star" class="button-small3">별점낮은순</a></a></a>

  <?php

   $Order=$_GET['Order'];


   @$db = new mysqli('localhost', 'rereview', 'Team6', 'lecture');
   if (mysqli_connect_errno()) {

      echo "<p>Error: Could not connect to database.<br />
   
      Please try again later.</p>";

      exit;
   }

   $result = $db -> query("SELECT l.LectureName, l.Teacher, r.ReviewNo, r.Title, r.Subject, l.LectureNo, r.Star, r.Review, r.reviewNo FROM Review As r join lectures as l on l.lectureno=r.lectureno WHERE Subject='TEPS' Order by $Order");

    echo "<br><br>
          <div class=\"wrap-table100\">
              <div class=\"table\">

             <div class=\"row header\">
              <div class=\"cell\">
                강좌이름
              </div>
              <div class=\"cell\">
                강사명
              </div>
              <div class=\"cell\">
                제목
              </div>
              <div class=\"cell\">
                점수
              </div>
            </div>";

    if($result->num_rows > 0){
         while($row = $result->fetch_assoc()) {
            $Noreview=$row["reviewNo"];
            echo "<div class=\"row\"> <div class=\"cell\" data-title=\"LectureName\">". $row["LectureName"]."</div><div class=\"cell\" data-title=\"Teacher\">". $row["Teacher"] ."</div><div class=\"cell\" data-title=\"Title\"><a class=\"reviewtitle\" href=\"showreview.php?Noreview=$Noreview\">". $row["Title"] ."</a></div><div class=\"cell\" data-title=\"Star\">".$row["Star"] ."</div></div>";
        }
    }
    else{
      echo "0 result";
    }

      echo "</div></div>"; 


    $db->close();
  ?>    
  </div>
</div>

    </div>
    
  </div>
</div>


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

<?php

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
        echo "<a href=\"../login.php\" class=\"loginButton\">LOGIN</a>";
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

          echo "<a href=\"logout.php\" class=\"loginButton\">LOGOUT</a><p class=\"welcommessage\"><strong>$username</strong>님 환영합니다.</p>";
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

<?php  

  if(isset($_POST['filter'])){
    $filter=$_POST['filter'];
  }
  elseif(isset($_GET['filter'])){
    $filter=$_GET['filter'];
  }
  else{
    $filter="";
  }
  ?>

<div class="wrapper_2">
  <div id="reading">
  <h1>리뷰 보기-TEPS</h1>
   <form action="review_TOEIC.php?Order=ReviewNo desc" method="post">
    <input type="submit" name="submit" class ="button-small2" value="필터링">
    <p style="float:right">&nbsp;&nbsp;</p>
    <select name="filter" style="width:200px;padding:5px;float:right;font-family: 'Cafe24Oneprettynight';">
      <option value="" class="please">필터 적용 없애기</option>
      <option value="greaterequal">별점 4점 이상</option>
      <option value="lessequal">별점 2점 이하</option>
      <option value="Grammar">Grammar</option>
      <option value="Reading">Reading</option>
      <option value="Vocabulary">Vocabulary</option>
      <option value="Listening">Listening</option>
      <option value="Speaking">Speaking</option>
      <option value="Writing">Writing</option>
    </select> </p>
  </form>
  <br><br><br><br>

  <a href="review_TEPS.php?Order=ReviewNo desc&filter=<?php echo $filter ?>" class="loginButton">최신순<a href="review_TEPS.php?Order=Star desc&filter=<?php echo $filter ?>" class="loginButton">별점높은순<a href="review_TEPS.php?Order=Star&filter=<?php echo $filter ?>" class="loginButton">별점낮은순</a></a></a><br>

 <form action="review_TEPS.php?Order=ReviewNo desc" method="post">
    <p><strong>필터 조건:</strong>
    <select name="filter" class="filtering" id="filtering" style="width:200px;height:30px;padding:0; font-size:15px;">
      <option value="" class="please">필터 적용 없애기</option>
      <option value="greaterequal">별점 4점 이상</option>
      <option value="lessequal">별점 2점 이하</option>
      <option value="Grammar">Grammar</option>
      <option value="Reading">Reading</option>
      <option value="Vocabulary">Vocabulary</option>
      <option value="Listening">Listening</option>
      <option value="Speaking">Speaking</option>
      <option value="Writing">Writing</option>
    </select> </p>

      <p><input type="submit" name="submit" class ="button-small3" value="필터링"></p>
  </form>

  <?php

   $Order=$_GET['Order'];


   @$db = new mysqli('localhost', 'rereview', 'Team6', 'lecture');
   if (mysqli_connect_errno()) {

      echo "<p>Error: Could not connect to database.<br />
   
      Please try again later.</p>";

      exit;
   }

   $result = $db -> query("SELECT l.LectureName, l.Teacher, r.ReviewNo, r.Title, r.Subject, l.LectureNo, r.Star, r.Review, r.reviewNo FROM Review As r join lectures as l on l.lectureno=r.lectureno WHERE Subject='TEPS' Order by $Order");
  

  @$db = new mysqli('localhost', 'rereview', 'Team6', 'lecture');

   if (mysqli_connect_errno()) {

      echo "<p>Error: Could not connect to database.<br />
   
      Please try again later.</p>";

      exit;
   }



    echo "<br><br>
          <div class=\"wrap-table100\">
              <div class=\"table\">

             <div class=\"row header\">
              <div class=\"cell\">
                강좌이름
              </div>
              <div class=\"cell\">
                강사명
              </div>
              <div class=\"cell\">
                제목
              </div>
              <div class=\"cell\">
                점수
              </div>
            </div>";
            


    if($filter==''){
        $result =mysqli_query($db,"SELECT l.LectureName, l.Teacher, r.ReviewNo, r.Title, r.Subject, l.LectureNo, r.Star, r.Review, r.reviewNo FROM Review As r join lectures as l on l.lectureno=r.lectureno WHERE r.subject='TEPS' Order by $Order");
    }
    elseif($filter=='greaterequal'||$filter=='lessequal'){
        if($filter=='greaterequal'){
              $starval=4;
              $result =mysqli_query($db,"SELECT l.LectureName, l.Teacher, r.ReviewNo, r.Title, r.Subject, l.LectureNo, r.Star, r.Review, r.reviewNo FROM Review As r join lectures as l on l.lectureno=r.lectureno WHERE r.subject='TEPS' and r.star>=$starval Order by $Order");
        }
        else{
              $starval=2;
              $result =mysqli_query($db,"SELECT l.LectureName, l.Teacher, r.ReviewNo, r.Title, r.Subject, l.LectureNo, r.Star, r.Review, r.reviewNo FROM Review As r join lectures as l on l.lectureno=r.lectureno WHERE r.subject='TEPS' and r.star<=$starval Order by $Order");
        }
    }
    elseif($filter=='Grammar'||$filter=='Reading'||$filter=='Vocabulary'||$filter=='Listening'||$filter=='Speaking'||$filter=='Writing'){
        $result =mysqli_query($db,"SELECT l.LectureName, l.Teacher, r.ReviewNo, r.Title, r.Subject, l.LectureNo, r.Star, r.Review, r.reviewNo FROM Review As r join lectures as l on l.lectureno=r.lectureno WHERE r.subject='TEPS' and l.lecturename like '%$filter%' Order by $Order");
    }

    if($result){
        if($result->num_rows > 0){
          while($row = $result->fetch_assoc()) {
              $Noreview=$row["reviewNo"];
              echo "<div class=\"row\"> <div class=\"cell\" data-title=\"LectureName\">". $row["LectureName"]."</div><div class=\"cell\" data-title=\"Teacher\">". $row["Teacher"] ."</div><div class=\"cell\" data-title=\"Title\"><a class=\"reviewtitle\" href=\"showreview.php?Noreview=$Noreview\">". $row["Title"] ."</a></div><div class=\"cell\" data-title=\"Star\">".$row["Star"] ."</div></div>";
          }
        }
    }


      echo "</div></div>"; 


    $db->close();
  ?> 

  </div>
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



