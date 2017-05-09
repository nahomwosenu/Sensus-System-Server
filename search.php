<?php
 $searchTerm=''; 
 $firstname=$lastname=$middlename='';
 if($_SERVER['REQUEST_METHOD']=='POST'){
	 if(!empty($_POST['term']))
		 $searchTerm=verify($_POST['term']);
	 else die('error');
	 if(!empty($_POST['firstname']))
		 $firstname=verify($_POST['firstname']);
	 else $firstname='';
	 if(!empty($_POST['lastname']))
		 $lastname=verify($_POST['lastname']);
	 else $lastname='';
	 if(!empty($_POST['middlename']))
		 $middlename=verify($_POST['middlename']);
	 else $middlename='';
	 if(!empty($firstname) && !empty($lastname) && !empty($middlename))
		 searchPerson($firstname,$lastname,$middlename);
	 else if(!empty($firstname) && !empty($lastname))
		 dualSearch($firstname,$lastname);
	 else 
	 search($searchTerm);
	 
 }
  function dualSearch($firstname,$lastname){
	  $query="select firstname,lastname,middlename from person where firstname='$firstname' and lastname='$lastname'";
	  $connect=mysqli_connect('localhost','root','','census') or die(mysqli_error());
	  $result=mysqli_query($connect,$query) or die(mysqli_error());
	  $data='';
	  while($row=mysqli_fetch_array($result)){
		  $data=$row['firstname'].','.$row['lastname'].','.$row['middlename'].';'.$data;
	  }
	  die($data);
  }
  function verify($term){
	  $term=stripslashes($term);
	  $term=htmlspecialchars($term);
	  $term=trim($term);
	  return $term;
  }
  function search($term){
	  $connect=mysqli_connect("localhost","root","","census");
	  $query="select * from person where firstname='$term' or lastname='$term' or middlename='$term'";
	  $result=mysqli_query($connect,$query) or die(mysqli_error());
	  $data="";
	  while($row=mysqli_fetch_array($result)){
		  $data=$row['firstname'].','.$row['lastname'].','.$row['middlename'].';'.$data;
	  }
	  die($data);
  }
  function searchPerson($firstName,$lastName,$middleName){
	  $query="select * from person where firstname='$firstName' and lastname='$lastName' and middlename='$middleName'";
      $connect=mysqli_connect("localhost","root","","census");
	  $result=mysqli_query($connect,$query) or die(mysqli_error());
	  $data="";
	  if($row=mysqli_fetch_array($result)){
		  $data=$row['firstname'].','.$row['lastname'].','.$row['middlename'].','.$row['age'].','.$row['sex'].','.$row['religion'].','.$row['place_of_birth'].','.$row['id'].','.$row['martial_status'].','.$row['town'];
		  die($data);
	  }
  }
?>