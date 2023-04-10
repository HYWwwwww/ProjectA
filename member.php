
<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>HYW</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>

  <!-- 부트스트랩 -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- CSS -->
  <link href="css/blog-home.css" rel="stylesheet">
</head>
  <?php include "header.php"; ?>  
  <?php include "db.php"; ?> 
  <?php include "dbopen.php"; ?> 

  <div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
     <!-- 모달 헤더 -->
      <div class="modal-header">
        <h4 class="modal-title">메시지</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <!-- 모달 바디 -->
      <div class="modal-body" id="message" onclick="modalclose()">
        <h5>축하합니다. 회원가입이 완료되었습니다. 로그인 해주시길 바랍니다.</h5>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="modalclose()">Close</button>
      </div>
    </div>
  </div>
</div>
  <?php
  $modal="none";
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
	   $command = $_POST['command'];
	   $id = $_POST['id'];
	   $password = $_POST['password'];
	   $name = $_POST['name'];
	   $mail = $_POST['mail'];
	   $gender = $_POST['gender'];
	   $description = $_POST['description'];
	   if ($command=="new"){ // 새 계정
	   		$query = "insert into wp_member values ('$id','$name', '$password','$mail','$gender','$description', '0' )";
	   		$result = $Mydb->Query($query);
	   		echo $result;
	   		if($result==1){
	   			$modal="'block'";
	   			?>
	   			<script> 
  					var modal = document.getElementById('myModal');
						modal.style.display = 'block';
					</script>
				<?php
	   		}
	   		else{
	   			$modal="none";
	   		}
	   }
  }
  ?>
  <!-- 페이지 컨텐츠 -->
  <div class="container pt-4">
    <div class="row">
      <div class="col-md-12">
        <h1 class="my-4">회원가입
        </h1>
        <h5>홍영우의 개인 웹사이트에 오신것을 환영합니다. 아래의 절차에 따라 회원가입을 진행해주세요.</h5>
        <div class="card mb-4">
           <div class="card-body">
           	 <form  method="post" action="member.php" onsubmit="return validate()">
	           	 <div class="form-controll">
				    <label for="exampleInputPassword1">회원아이디</label>
					    <div class="input-group">
						    <input type="text" class="form-control" id="id" name="id" placeholder="아이디는 반드시 8자이내로 입력해주세요.">
						 	<button type="button" class="btn btn-success" onclick="openidcheck()">아이디 중복체크</button>
						 	<input type="hidden" class="form-control" name="command" value="new">
					 	</div>

				 </div>
				 </br>
	           	 <div class="form-controll">
				    <label for="exampleInputPassword1">패스워드</label>
				    <input type="password" class="form-control" id="password"  name="password" placeholder="패스워드는 8자 이상으로 적어주세요.">
				 </div>	
				 </br>
				 <div class="form-controll">
				    <label for="exampleInputPassword1">이름</label>
				    <input type="text" class="form-control" id="name" placeholder="이름" name = "name" >
				 </div>	
				 </br>
				 <div class="form-controll">
				    <label for="exampleInputPassword1">메일 주소</label>
				    <input type="text" class="form-control" id="mail" placeholder="메일주소" name = "mail" >
				 </div>	
				 </br>				 
				 <div class="form-controll">
					<label for="gender">성별</label>
					<select class="form-control" name="gender" >
					  <option value="1">남자</option>
					  <option value="2">여자</option>
					</select>
				 </div>
				 </br>	
				 <div class="form-controll">
				    <label for="exampleInputPassword1">자기소개</label>
				    <textarea class="form-control" name="description"></textarea>
				 </div>	
				 </br>				 	
				<button type="submit" class="btn btn-primary" name="button" value="new" >저장</button>
				<a href="index.php"><button type="button" class="btn btn-danger" name="button" >홈</button></a>
			 </form>
           </div>
        </div>
       </div>
    </div>
  </div>
  <!-- 푸터 -->
  <?php include "footer.php"; ?>  
 
 <!-- 부트스트랩 자바스크립트 -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script>
   function validate() { 
		var result = ""
   		var id = document.getElementById("id");
   		if(id.value == ""){
   			alert("아이디를 입력해주세요");
       		return false;
       		
   		}
    	var pw = document.getElementById("password");
		if(pw.value == ""){
			alert("패스워드를 입력해주세요");
			return false;
		}
   	}
   function openidcheck() { 
	    var id = document.getElementById("id");
   		if(id.value == ""){
   			alert("아이디 ?");
       		return false;
   		}
	    var xhr = new XMLHttpRequest();
	    xhr.onreadystatechange = function() {
	        if (xhr.readyState == 4) {
	            var data = xhr.responseText;

	        }
	    }
	    xhr.open('GET', 'idcheck?idcheck='+id.value, true);
	    xhr.send(null);
  	}   

	window.onclick = function(event){
		if(event.target == modal){
			modal.style.display = "none";
		}
	}
	function modalclose() { 
		   var modal = document.getElementById('myModal');
		   modal.style.display = "none";
		   location.href="index.php";
	}
	   
   </script>
</body>
</html>