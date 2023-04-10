<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="kor">
<?php ini_set('error_reporting','E_ALL ^ E_NOTICE'); ?>
<head>

  	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>홍영우의 웹페이지</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
  <!-- 부트스트랩 -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- CSS -->
  <link href="css/blog-home.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <style>
  .carousel-inner img {
    width: 100%;
    height: 100%;
  	}
  </style>
</head>

<body>
	<?php include "header.php"; ?>
  <?php include "db.php"; ?> 
  <?php include "dbopen.php"; ?>  
  <div class="container pb-2">
      <div class="row">

	  <img src='https://media.giphy.com/media/v1.Y2lkPTc5MGI3NjExZTM0NmZkMDg2N2I1Mjc1N2FiNjk5NzBjOGJjODIxYzI0MjE2MzdmMCZjdD1n/eljCVpMrhepUSgZaVP/giphy-downsized-large.gif' style='position: absolute; right: 2px; bottom: 4px;'/>
	  

  </div>
    <div class="row">
      <div class="col-md-9">
        <h1 class="my-4 mt-2">
          <small>정보보안 최신 뉴스</small>
        </h1>
        <div class="card mb-4 mt-3">
			<div id="mynews" class="carousel slide" data-ride="carousel">
			  <!-- Indicators -->
			  <ul class="carousel-indicators">
			    <li data-target="#mynews" data-slide-to="1" class="active"></li>
			    <li data-target="#mynews" data-slide-to="2"></li>
			    <li data-target="#mynews" data-slide-to="3"></li>
			  </ul>
			  
			  <!-- 슬라이드쇼 -->
			  <div class="carousel-inner">
			    <div class="carousel-item active">
			      <img src="images/pic1.jpg" alt="1" width="1100" height="500">
			    </div>
			    <div class="carousel-item">
			      <img src="images/pic2.jpg" alt="2" width="1100" height="500">
			    </div>
			    <div class="carousel-item">
			      <img src="images/pic3.jpg" alt="3" width="1100" height="500">
			    </div>
			  </div>
			  
			  <!-- 좌 우 컨트롤러 -->
			  <a class="carousel-control-prev" href="#mynews" data-slide="prev">
			    <span class="carousel-control-prev-icon"></span>
			  </a>
			  <a class="carousel-control-next" href="#mynews" data-slide="next">
			    <span class="carousel-control-next-icon"></span>
			  </a>
			</div>
		
			
          <div class="card-body">
            <a href="eventlist.php"><h2 class="card-title">3CX DesktopApp에서 공급망 공격 발생</h2></a>
            <p class="card-text">3CX DesktopApp을 통해 공급망 공격이 감행된 것으로 드러났다. 해당 소프트웨어는 통화, 화상 회의 등 사용자에게 여러 통신 기능을 제공하며 마이크로소프트 윈도(Windows), 애플 맥(MAC) 운영체제 환경에서 구동이 가능하다. 
				현재 3CX에서는 새로운 인증서를 발급하기 위해 준비 중이며, 새 인증서가 나오기 전까지는 다른 소프트웨어로 대체해 사용할 것을 안내하고 있다.
			    <br>출처 : 보안뉴스</p>
          </div>
          
          <div class="card-footer text-muted">
            날짜:<a href="eventlist.php">2023-04-04 17:58</a>
          </div>
        </div>

		<h2 class="card-title">사진 갤러리</h2>
        <div class="card mb-4">
        <div class="card mb-4">
			
			<div style="width:100%;">
			<canvas id="canvas" height="200"></canvas>
			<img src="required pic/pic2.jpg" alt="Your Image1" width="406.5" height="400" style="margin-left: 110px;">
			<img src="required pic/pic1.jpg" alt="Your Image" width="412" height="400">

			</div>
			<script>
	
			</script>
			</div>        
          <div class="card-body">
            
            <p class="card-text">공유를 원하는 사진을 요청해주세요. </p>
			<p> *모든 사진은 검토 후 3일이내에 게시됩니다. </p>
			<p> *게시는 접수 순서대로 하루 총 2장 1일간 게시됩니다. </p>
		<!-- 모달 버튼 -->
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  		메일 보내기
		</button>

		<!-- 모달 -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  		<div class="modal-dialog" role="document">
    		<div class="modal-content">
      		<div class="modal-header">
        		<h4 class="modal-title" id="myModalLabel">메일 보내기</h4>
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      		</div>
      		<div class="modal-body">
        		<form action="mailto:grimm5@naver.com" method="POST" enctype="multipart/form-data">
            <div class="form-group">
            	<label for="recipient-name" class="control-label">수신자 (운영자의 메일주소입니다.) </label>
            	<input type="email" class="form-control" id="recipient-name" name="to" value="grimm5@naver.com">
            </div>
            <div class="form-group">
            	<label for="subject" class="control-label">제목:</label>
            	<input type="text" class="form-control" id="subject" name="subject">
          	</div>
          	<div class="form-group">
            	<label for="body" class="control-label">내용:</label>
            	<textarea class="form-control" id="body" name="body"></textarea>
         	</div>
            <div class="form-group">
            	<label for="attachment" class="control-label">첨부 파일:</label>
            	<input type="file" class="form-control" id="attachment" name="attachment">
           	</div>
          		<button type="submit" class="btn btn-primary">보내기</button>
        		</form>
      		</div>
    	</div>
  		</div>
		</div>
        </div>
        </div>
      	</div>
  <?php include "side.php"; ?>  
  <?php include "footer.php"; ?>  
  <?php include "modal.php"; ?>  
 
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
