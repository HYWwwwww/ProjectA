<head>
  <style>
    .card-header {
  	background-color: rgb(255, 204, 0);
    }	
  </style>
</head>

	<?php ini_set('error_reporting','E_ALL ^ E_NOTICE'); ?>
      <div class="col-md-3">
        <h1 class="my-4 mt-2">
          <small>사용자</small>
        </h1>
        <!-- 로그인 -->
        <div class="card my-3">
          <h5 class="card-header">로그인</h5>
		<?php 
					$sessid = $_SESSION['id'];
					$name = $_SESSION['name'];
					$avatar = $_SESSION['avatar'];

					if(!isset($_SESSION['id'])){
						if ($_SERVER["REQUEST_METHOD"] == "POST") {
							$id = $_POST['id'];
							$password = $_POST['password'];
							$query = "select count(*) as cnt, id, gender, name from wp_member where id = '".$id."' and password ='".$password."'";
							$result = $Mydb->Query($query);
							$totalrows = $Mydb->TotalRows();
							while ($row=$Mydb->NextRow()) {
								$id= $row['id'];
								$gender= $row['gender'];
								$name= $row['name'];

								// 세션스타트
								$_SESSION["id"]=$id;
								if($gender=="2")
									$avatar = "avatar2.JPG";
								else						
									$avatar = "avatar1.JPG";			
								$_SESSION['avatar']=$avatar;
								$_SESSION['name']=$name;
								?>
								<script>
									location.href = "index.php";
								</script>
								<?php
							}
					}		
				
		?> <!-- 로그인 기본창 -->
			<form method="post" action="index.php" onsubmit="return logincheck()">
			  <div class="form-group ml-2 mr-2">
			    <label for="exampleInputEmail1">로그인 아이디</label>
			    <input type="text" class="form-control " id="id" name="id" aria-describedby="emailHelp" >
			    <small id="emailHelp" class="form-text text-muted">아이디를 입력해주세요.</small>
			  </div>
			  <div class="form-group  ml-2 mr-2">
			    <label for="exampleInputPassword1">비밀번호</label>
			    <input type="password" class="form-control" id="password" name="password">
			  </div>
			  <button type="submit" class="btn btn-primary ml-2 mb-1">로그인</button>
			<?php } else { 
								if ($_SERVER["REQUEST_METHOD"] == "GET") {
								  $command = $_GET['logout'];
								  if($command =="true"){
											session_unset(); 
											session_destroy(); 
											?>
											<script>
													 location.href = "index.php";
											</script>
											<?php
									}
								}
			
			?> <!-- 로그인 성공 -->
				<form method="get" action="index.php" onsubmit="return logincheck()">
				  <div class="form-group ml-2 mr-2">
				    <img class="img-responsive wt-100" style="width100%;height:150px;" src="images/<?php echo $avatar?>">
				    <label for="exampleInputEmail1">성함: <?php echo $name?></b></label>
				    <small id="emailHelp" class="form-text text-muted">HYW의 웹사이트에 오신것을 환영합니다.</small>
				  </div>
				  <button type="button" class="btn btn-primary ml-2 mb-1" onClick="location.href='index.php?logout=true'">로그아웃</button>
				</form>		
			<?php } ?>
        </div>

        <!-- 카테고리 -->
        <div class="card my-4">
          <h5 class="card-header">카테고리</h5>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li>
				    <a href="noticelist.php">공지사항</a>
                  </li>
                  <li>
				    <a href="member.php">회원가입</a>
                  </li>
                  <li>
                    <a href="https://google.com">빠른검색</a>
                  </li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">
                  <li>
                    <a href="https://music.youtube.com/">음악듣기</a>
                  </li>
                  <li>
                    <a href="https://www.instagram.com/">인스타그램</a>
                  </li>
				  <li>
                    <a href="https://www.boannews.com/default.asp?direct=mobile">보안뉴스</a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>   
      </div>
    </div>
  </div>

