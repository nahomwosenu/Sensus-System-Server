<?php
 $connect=mysqli_connect('localhost','root','','census') or return -1;
 function getData($column,$id){
	 $query="select $column from person where id='$id'";
	 $result=mysqli_query($query);
	 if($row=mysqli_fetch_array($result))
		 return $row['$column'];
	 return '-1';
 }
 function setData($column,$id,$value){
	 $query="update person set $column='$value' where id='$id'";
	 $result=mysqli_query($query);
	 return $result;
 }
 function deleteRow($id,$table){
	 $query="delete from $table where id='$id'";
	 $result=mysqli_query($connect,$result) 
	  or die("Error(371): connection_aborted");
	  return $result;
 }
?>