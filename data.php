<?php 
 $data=$region='';
 if($_SERVER['REQUEST_METHOD']=='POST'){
	 if(!empty($_POST['data']))
		 $data=$_POST['data'];
	 else die('error');
	 if(!empty($_POST['region']))
		 $region=$_POST['region'];
	 else die('error');
	 if($data=='town')
		 getTowns($region,'Ethiopia');
 }
 function getTowns($region,$country){
	 $connect=mysqli_connect('localhost','root','','census');
	 $query="select town from towns where region='$region' and country='$country'";
	 $result=mysqli_query($connect,$query) or die('error');
	 $towns='';
	 while($row=mysqli_fetch_array($result)){
		 $towns=$row['town'].','.$towns;
	 }
	 die ($towns);
 }

?>