<?php
 $username=$password=$type=''; 
 if($_SERVER['REQUEST_METHOD']=='POST'){
	 if(!empty($_POST['username'])){
		 $username=check($_POST['username']);
	 }
	 else $username='-1';
	 if(!empty($_POST['password'])){
		 $password=check($_POST['password']);
	 }
	 else $password='-1';
	 if($username=='-1' or $password=='-1')
		 return '-1';
	 else return login($username,$password);
 }
 function check($param){
	 $param=htmlspecialchars($param);
	 $param=stripslashes($param);
	 $param=trim($param);
	 return $param;
 }
 function login($username,$password){
	 $connect=mysqli_connect('localhost','root','','census') 
	  or die("-1");
	 $query="select type,password from users where username='$username'";
	 $result=mysqli_query($connect,$query) or die('error');
	 if($row=mysqli_fetch_array($result)){
		 $hash=$row['password'];
		 if(password_verify($password,$hash)==true)
			 die($row['type']);
		 else die('false');
	 }
	 else die('false');
 }
?>	