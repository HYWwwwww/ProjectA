<?php

define("DefaultDBServer","localhost");
define("MyDBUser","scs");
define("MyDBPasswd","1234");  
define("DefaultDBName","scs");

class MyDB {
	
	var $DbResult;
	var $CurRow;
    var $connect;
  
	function MyDB() {
		
	}
	function Connect($mydbdomain, $mydbuser, $mydbpasswd, $mydbname) {

		$this->connect=mysqli_connect( $mydbdomain, $mydbuser, $mydbpasswd) or  die( "Connection Failed"); 
		if(!$this->connect){
			echo "DB Connect Error";
		    exit;
		}
		mysqli_select_db($this->connect,$mydbname);

	}
	
	function Query($query) {
		$start_time = (int)time() + (int)microtime();
		if(!$result = mysqli_query($this->connect, $query)) {
			echo "DB";
			return false;
		}
		else {

			$this->DbResult = $result;
			return true;
		}
	}

	function NextRow()
	{
		$this->CurRow = @mysqli_fetch_array($this->DbResult);

		if (!$this->CurRow)
			return false;
		else
			return $this->CurRow;
	}
	
	function NextRowAssoc()
	{
		$this->CurRow = @mysqli_fetch_assoc($this->DbResult);
		
		if (!$this->CurRow)
			return false;
		else
			return $this->CurRow;
	}
	function NextRowIndex()
	{
		$this->CurRow = @mysql_fetch_row($this->DbResult);
		
		if (!$this->CurRow)
			return false;
		else
			return $this->CurRow;
	}

	function TotalRows()
	{
		$total_rows = @mysqli_affected_rows($this->connect);
		
		if(!$total_rows) return false;
		else return $total_rows;
	}
	
	function close() {
		mysqli_close();
	}
}

?>