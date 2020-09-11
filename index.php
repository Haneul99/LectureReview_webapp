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
<link href="layout/styles/default.css?after?after" rel="stylesheet" type="text/css" media="all" />
<link href="layout/styles/fonts.css?after?after" rel="stylesheet" type="text/css" media="all" />
</head>

<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->

</head>
<body>
<div id="wrapper1">
	<div id="header-wrapper">
		<div id="header" class="container">
			<div id="search">
				<form action = "pages/search.php?Order='reviewNo'" method="post" id="searchform">
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

    		 	echo "<a href=\"logout.php\" class=\"loginButton\">LOGOUT</a><p class=\"welcommessage\"><strong>$username</strong>님 환영합니다.</p>";
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

	<div id="wrapper2">
		<div id="welcome" class="container">
			<div class="title">
				<h2>TOEIC / TOEFL / TEPS </h2>
			</div>
			<p id = script>어떻게 영어 공부를 해야할지, 어떤 강의가 내게 딱 맞을지<br> 
				이제 Rereview에서 찾아보세요!!<br>
				REreview와 함께라면 목표 점수까지 더 쉽게 갈 수 있을거에요
			</p>
		</div>
	</div>
	<div id="wrapper3">
		<div id="portfolio" class="container">
			<div class="title">
				<h2>관련 사이트 바로 가기</h2>
				<span class="byline">인강 제공 사이트 목록</span> </div>
			<div class="column1">
				<div class="box">
					<span class="icon icon-wrench"></span>
					<h3>HACKERS</h3>
					<p>해커스 인강 사이트 바로 가기</p>
					<a href="https://champ.hackers.com/?c=event&evt_id=19032102&panel=N&lnb=Y&top=Y&_AT=0002106200C3026E1FDC&gclid=Cj0KCQiArdLvBRCrARIsAGhB_sxajETZRetRkIyK0bx1gwT-IN1J5PuXvm1R3LecMGrDKbmM5N3ebZoaAlMKEALw_wcB" class="button button-small">HACKERS</a> </div>
			</div>
			<div class="column2">
				<div class="box">
					<span class="icon icon-trophy"></span>
					<h3>영단기</h3>
					<p>영단기 인강 사이트 바로 가기</p>
					<a href="https://eng.conects.com/?utm_source=search&utm_medium=google&utm_campaign=online_toeic&utm_term=%EC%98%81%EC%96%B4%ED%86%A0%EC%9D%B5%EC%9D%B8%EA%B0%95#" class="button button-small">영단기</a> </div>
			</div>
			<div class="column3">
				<div class="box">
					<span class="icon icon-key"></span>
					<h3>PAGODA</h3>
					<p>파고다 인강 사이트 바로 가기</p>
					<a href="http://www.pagodastar.com/" class="button button-small">PAGODA</a> </div>
			</div>
			<div class="column4">
				<div class="box">
					<span class="icon icon-lock"></span>
					<h3>YBM</h3>
					<p>YBM 인강 사이트 바로 가기</p>
					<a href="http://eng.ybmclass.com/eng/eng_main.asp" class="button button-small">YBM</a> </div>
			</div>
		</div>
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
