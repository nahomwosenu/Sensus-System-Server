<form action='<?php echo $_SERVER['PHP_SELF'] ?>' method='POST'>
 Password: <input type='text' name='password'><br/>
 <input type='submit' value='Genarate'><br/>
</form>
<?php 
 if($_SERVER['REQUEST_METHOD']=='POST'){
   $password=$_POST['password'];
   $hash=password_hash($password,PASSWORD_DEFAULT);
   echo "<h1>$hash</h1>";
 }
?>