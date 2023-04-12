<!DOCTYPE html>
<html>
<head>
	<?php ini_set('error_reporting','E_ALL ^ E_NOTICE'); ?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>HYW</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>

  <!-- 부트스트랩 -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link href="css/blog-home.css" rel="stylesheet">

</head>
  <?php include "db.php"; ?> 
  <?php include "dbopen.php"; ?>
  <?php include "header.php"; ?>  
  
  <div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
     <!-- 모달 헤더 -->
      <div class="modal-header">
        <h4 class="modal-title">메시지</h4>
        <button type="button" class="close" data-dismiss="modal" onclick="modalclose()">&times;</button>
      </div>
      <!-- 모달 중간 -->
      <div class="modal-body" id="message" onclick="modalclose()">
        <h5>성공적으로 저장되었습니다. 이벤트 목록페이지로 이동합니다.</h5>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="modalclose()">Close</button>
      </div>
    </div>
  </div>
</div>
  <div class="modal" id="myDelete">
  <div class="modal-dialog">
    <div class="modal-content">
     <!-- 모달 헤더 -->
      <div class="modal-header">
        <h4 class="modal-title">메시지</h4>
        <button type="button" class="close" data-dismiss="modal" onclick="modalclose()">&times;</button>
      </div>
      <!-- 모델 중간 -->
      <div class="modal-body" id="message" onclick="modalclose()">
        <h5>성공적으로 삭제되었습니다. 이벤트 목록페이지로 이동합니다.</h5>
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="modalclose()">Close</button>
      </div>
    </div>
  </div>
</div>
  <!-- 페이지부분 -->
  <div class="container pt-4">
    <div class="row">
      <div class="col-md-12">
        <h1 class="my-4">이벤트
          <small>작성</small>
        </h1>
        <h5>모든 멤버에게 해당되는 이벤트를 작성합니다.</h5>
        <?php
        	$title="";
        	$idx="";
        	$name="";
        	$contents="";
        	$filename="";
        	$writedate="";
        	if ($_SERVER["REQUEST_METHOD"] == "POST") {
        		$button = $_POST["button"];
        		if($button=="delete"){
        			$idx = $_POST['idx'];
        			$query = "delete from wp_bbs where idx = ".$idx;

        			$result = $Mydb->Query($query);
        			?>
						   			<script> 
					  					var modaldlete = document.getElementById('myDelete');
											modaldlete.style.display = 'block';
									</script>
						<?php
						}
        		else {   // 새파일
        		
	        		$title = $_POST['title'];
	        		$name = $_POST['name'];
	        		$contents = $_POST['contents'];
	        		$filename = $_FILES['filename'];
	        		$writedate = $_POST['writedate'];
							// 파일업로드
							if(isset($_FILES['filename']) && $_FILES['filename']['name'] != "") {
							    $file = $_FILES['filename'];
							    $upload_directory = 'upload/';
							    $ext_str = "jpg,gif,png";
							    $allowed_extensions = explode(',', $ext_str);
							    $max_file_size = 5242880;
							    $ext = substr($file['name'], strrpos($file['name'], '.') + 1);
							    if(!in_array($ext, $allowed_extensions)) {
							        echo "Only JPG, GIF, PNG";
							    }
							    if($file['size'] >= $max_file_size) {
							        echo "Limit 5MB ";
							    }
							    $path = md5(microtime()) . '.' . $ext;
							    move_uploaded_file($file['tmp_name'], $upload_directory.$path);
							    // 파일이름 echo $path;
							    $filename = $path;
									$query = "insert into wp_bbs(bbstype,title,contents,id,filename,writedate) values ('event','$title','$contents','$name','$path','$writedate' )";
									$result = $Mydb->Query($query);
		   			
		   						if($result==1){
					   			?>
							   			<script> 
						  					var modal = document.getElementById('myModal');
												modal.style.display = 'block';
											</script>
									<?php
									}
							
								}					
						}
        	}
        	if ($_SERVER["REQUEST_METHOD"] == "GET") { // 보기
        		$idx = $_GET["idx"];
        		$view = $_GET["view"];
        		if($view=="modify"){
        			$query = "select idx,title,id,writedate, filename, contents from wp_bbs where idx = '".$idx."' limit 1";
        			$result = $Mydb->Query($query);
        			while ($row=$Mydb->NextRow()) {
	 							$title= $row['title'];
	 							$name= $row['id'];
	 							$writedate= $row['writedate'];        				
	 							$filename= $row['filename'];
	 							$contents= $row['contents'];
        			}
        		}
       		}
       	
        ?>
        <div class="card mb-4">
           <div class="card-body">
           	 <form id = "" method="post" action="eventwrite.php" enctype="multipart/form-data"  onsubmit="return validate()">
				<div class="form-controll">
				    <label for="exampleInputPassword1">날짜</label>
				    <input type="date" class="form-control" id="writedate" placeholder="" name = "writedate" value=<?php echo $writedate?>>
				</div>
	           	<div class="form-controll">
				    <label for="exampleInputPassword1">제목</label>
					    <div class="input-group">
						    <input type="text" class="form-control" id="title" name="title" placeholder="" value=<?php echo $title?>>
						    <input type="hidden" class="form-control" name="bbs" value="event">
						    <input type="hidden" class="form-control" name="idx" value=<?php echo $idx?>>
					 	</div>
				</div>
				</br>
				<div class="form-controll">
				    <label for="exampleInputPassword1">이름</label>
				    <input type="text" class="form-control" id="name" placeholder="" name = "name" value=<?php echo $name?>>
				</div>	
				</br>
				<div class="form-controll">
				    <label for="exampleInputPassword1">내용</label>
				    <textarea class="md-textarea form-control" rows="8" name="contents"><?php echo $contents?></textarea>
				</div>	
				</br>	
				<div class="form-controll">
				 		<?php
				 			if($filename!=""){ ?>
				 				<img class="img-rounded" width="500" height="436" src="upload/<?php echo $filename?>">
				 		<?php	}
				 		?>
				    <label for="exampleInputPassword1">이미지</label>	
				    <input type="file" class="form-control" id="filename" placeholder="" name = "filename" >
				    
				</div>	
				</br>		
				</br>				 				 			 	
				<?php if($idx==""){ ?>
				<button type="submit" class="btn btn-primary" name="button" value="new" >저장</button>
				<?php } ?>
				<?php if($idx!=""){ ?>
						<button type="submit" class="btn btn-primary" name="button" value="delete" >삭제</button>
					<?php } 
				?>
				<a href="index.php"><button type="button" class="btn btn-danger" name="button" >홈</button></a>
			 </form>
           </div>
        </div>
       </div>
    </div>
  </div>
  <!-- 바텀 -->
  <?php include "footer.php"; ?> 
 
  <!-- 부트스트랩 자바스크립트 -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script>
  document.getElementById('writedate').value = new Date().toISOString().substring(0, 10);
   function validate() { 
		var result = ""
   		var id = document.getElementById("title");
   		if(id.value == ""){
   			alert("Please enter your title");
       		return false;
       		
   		}
    	var pw = document.getElementById("contents");
		if(pw.value == ""){
			alert("Please enter your contents");
			return false;
		}
   	}
	
	window.onclick = function(event){
		if(event.target == modal){
			modal.style.display = "none";
		}
	}
	function modalclose() { 
		   var modal = document.getElementById('myModal');
		   modal.style.display = "none";
		   location.href="eventlist.php";
	}
	   
   </script>
</body>
</html>