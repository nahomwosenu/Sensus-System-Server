<form action='login_check.php' method='POST'>
 Username: <input type='text' name='user'><br/>
 Password: <input type='password' name='password'><br/>
 <input type='submit' value='Login' >
</form>
<?php 
 if($_SERVER['REQUEST_METHOD']=='POST'){
	 $username=$_POST['user'];
	 $password=$_POST['password'];
	 login($username,$password);
 }
 function login($username,$password){
	 $connect=mysqli_connect('localhost','root','','census') or die('error');
	 $query="select password from users where username='$username'";
	 $result=mysqli_query($connect,$query) or die("Error");
	 if($row=mysqli_fetch_array($result)){
		 $hash=$row['password'];
		 if(password_verify($password,$hash)==true)
			 echo "<h1>Success</h1>";
		 else echo "<h1>Password not match!</h1>";
	 }
	 else die("Wrong Username");
 }
?>