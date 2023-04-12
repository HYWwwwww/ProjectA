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
	<?php include "header.php"; ?>
  	<?php include "db.php"; ?> 
  	<?php include "dbopen.php"; ?>  

  <!-- 페이지 부분 -->
  <div class="container pt-4">
    <div class="row">
      <div class="col-md-12">
        <h1 class="my-4">이벤트
          <small>목록</small>
        </h1>
        <h5>모든 맴버들의 이벤트 목록입니다.</h5>
	    <div class="row">
	      <div class="col-md-8">
	      </div>
	      <div class="col-md-4 mb-3">
	       	 <form action="eventlist.php?bbstype=event" method="get">
	         <div class="input-group">
			 		
					<label>제목 : </label>
					<input type="text" class="form-control ml-2" name = "search" >
					<button type="submit" class="btn btn-primary ml-2">Search</button>
			 </div>
			 </form>
		   </div>
		 </div>
		  <table class="table table-striped">
		    <thead>
		      <tr>
		        <th>번호</th>
		        <th>이벤트</th>
		        <th>사진</th>
		        <th>설명</th>
		      </tr>
		    </thead>
		    <tbody>
					<?php
					// 검색
					$search="%";
					if ($_SERVER["REQUEST_METHOD"] == "GET") {
							$search = $_GET["search"];
							if($search=="") $search="%";
					}
					
					$count=0;
					$query = "select idx,title,id,writedate,contents, filename from wp_bbs where title like '%".$search."%' and bbstype = 'event' limit 10";
					$result = $Mydb->Query($query);
					$totalrows = $Mydb->TotalRows();
					while ($row=$Mydb->NextRow()) {
							$idx= $row['idx'];
 							$title= $row['title'];
 							$contents= $row['contents'];
 							$filename= $row['filename'];
 							$name= $row['id'];
 							$writedate= $row['writedate'];
 							$count = $count +1;
		   		?>	
			      <tr>
			        <th><?php echo $count?></th>
			        <th><a href="eventwrite.php?idx=<?php echo $idx?>&view=modify" data-toggle="tooltip" title=<?php echo $name ?>><?php echo $title?></a></th>
			        <th><a href="eventwrite.php?idx=<?php echo $idx?>&view=modify" data-toggle="tooltip" title=<?php echo $name ?>><img class="img-rounded" width="200" height="150" src=upload/<?php echo $filename ?>></a></th>
			        <th><?php echo $contents?></th>
			        <th><?php echo $writedate?></th>
			      </tr>
			    
			     <?php } ?>
		    </tbody>
		  </table>		 
       </div>
    </div>
  </div>

 <?php include "footer.php"; ?>  
 <!-- 부트스트랩 자바스크립트 툴팁 -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
	$(document).ready(function(){
	  $('[data-toggle="tooltip"]').tooltip();   
	});
</script>
</body>
</html>