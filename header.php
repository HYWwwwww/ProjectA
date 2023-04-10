  <!-- 상단 바 -->
  <head>
  <style>
    .navbar-dark .navbar-nav .nav-link {
      color: black;
    }
  </style>
</head>
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-warning fixed-top">
    <div class="container">
      <a class="navbar-brand" href="index.php">홍영우의 웹페이지</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.php">홈</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownPortfolio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              회원가입
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownPortfolio">
              <a class="dropdown-item" href="member.php">회원가입</a>
              <a class="dropdown-item" href="index.php?logout=true">로그아웃</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              안내 게시판
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
              <a class="dropdown-item" href="noticewrite.php">안내 게시글 작성</a>
              <a class="dropdown-item" href="noticelist.php">안내 게시판 게시글 목록</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownBlog" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              이벤트 게시판
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownBlog">
              <a class="dropdown-item" href="eventwrite.php?view=event">이벤트 게시판 게시글 작성</a>
              <a class="dropdown-item" href="eventlist.php">이벤트 게시판 게시글 목록</a>
            </div>
          </li>          
          <li class="nav-item">
            <a class="nav-link" data-toggle="modal" data-target="#about">소개글</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
 			<!-- 소개글 -->
			<div class="modal fade" id="about" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			  <div class="modal-dialog">
			    <div class="modal-content">
			      <div class="modal-header">
			        <h4 class="modal-title" id="myModalLabel">HYW</h4>
			      </div>
			      <div class="modal-body">
			        <div class="card my-4">
			          <h5 class="card-header">HYW의 정보보안 웹페이지</h5>
						  <div class="form-group">
						    <img class="card-img-top" src="images/me.jpg" alt="Card image cap">
                <br>
						    <label> 메일주소 : grimm5@naver.com</label>
                <br>
						    <label> 핸드폰 번호 : 010-3604-XXXX</label>
						  </div>
			        </div>
			      </div>
			    </div>
			  </div>
			</div>

  <!-- 페이지 -->
  <div class="container pb-9">
    <div class="row">
    .
    </div>
  </div>

