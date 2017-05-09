<?php 
 $firstname=$lastname=$middlename=$sex=$age=$username=$password=$id='';
 if($_SERVER['REQUEST_METHOD']=='POST'){
	 if(!empty($_POST['firstname']))
		 $firstname=valid($_POST['firstname']);
	 else die('-1');
	 if(!empty($_POST['lastname']))
		 $lastname=valid($_POST['lastname']);
	 else die('-1');
	 if(!empty($_POST['middlename']))
		 $middlename=valid($_POST['middlename']);
	 else die('-1');
	 if(!empty($_POST['sex']))
		 $sex=valid($_POST['sex']);
	 else die('-1');
	 if(!empty($_POST['age']))
		 $age=valid($_POST['age']);
	 else die('-1');
	 if(!empty($_POST['username']))
		 $username=valid($_POST['username']);
	 else die('-1');
	 if(!empty($_POST['password']))
		 $password=valid($_POST['password']);
	 else die('-1');
	 if(!empty($_POST['id']))
		 $id=valid($_POST['id']);
	 else die('error');
	 register($firstname,$lastname,$middlename,$sex,$age,$username,$password,$id);
 }
 function valid($input){
	 $input=trim($input);
	 $input=htmlspecialchars($input);
	 $input=stripslashes($input);
	 return $input;
 }
 function userExist($username){
	 $connect=mysqli_connect('localhost','root','','census') or die('error');
	 $query="select username from users where username='$username'";
	 $result=mysqli_query($connect,$query) or die('error');
	 if($row=mysqli_fetch_array($result))
		 die("true");
	 die("false");
 }
 function register($fn,$ln,$mn,$sex,$age,$user,$pass,$id){
	 $connect=mysqli_connect('localhost','root','','census') or die('error');
	 $query="insert into enumerator(firstname,lastname,middlename,sex,age,username,id) values ('$fn','$ln','$mn','$sex','$age','$user','$id')";
	 $query2="insert into users(id,username,password,type) values ('$id','$user','$pass','enum')";
	 $result1=mysqli_query($connect,$query) or die(mysqli_error($connect));
	 $result2=mysqli_query($connect,$query2) or die(mysqli_error($connect));
	 die('true');
 }
?>