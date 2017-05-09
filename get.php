<?php 
  if($_SERVER['REQUEST_METHOD']=='POST'){
    $request=$_POST['request'];
    
    if($request=='table'){
    	$name=$_POST['name'];
    	getTable($name);
    }
    else if($request=='update'){
    	$table=$_POST['table'];
    	$key=$_POST['key'];
    	$keyValue=$_POST['keyValue'];
    	$column=$_POST['column'];
    	$value=$_POST['value'];
    	$query="update $table set $column='$value' where $key='$keyValue'";
    	update($query);
    }
    else if($request=='delete'){
    	$data=explode(',',$_POST['ids']);
    	$length=$_POST['length'];
    	delete($data,$length);
    }
    else if($request=='search'){
    	$mode=$_POST['mode'];
    	if($mode=='2'){
    		$firstname=$_POST['firstname'];
    		$lastname=$_POST['lastname'];
    		dualSearch($firstname,$lastname);
    	}
    	else if($mode=='1'){
    		$term=$_POST['term'];
    		search($term);
    	}
    	else if($mode=='3'){
    		$firstname=$_POST['firstname'];
    		$lastname=$_POST['lastname'];
    		$middlename=$_POST['middlename'];
    		searchPerson($firstname,$lastname,$middlename);
    	}
    	else if($mode=='4'){
    		$id=$_POST['id'];
    		searchById($id);
    	}
    }
  }
  function delete($data,$length){
  	$connect=mysqli_connect('localhost','root','','census');
  	$i=0;
  	while($i<$length){
  	 $id=$data[$i];
  	 $query="delete from person where id='$id'";
  	 $result=mysqli_query($connect,$query) or die('error');
  	 $i++;
  	}
  }
  function update($query){
  	$connect=mysqli_connect('localhost','root','','census');
  	$result=mysqli_query($connect,$query) or die('error');
  	if($result)
  		die('true');
  	else die('false');
  }
  function getTable(){
    $connect=mysqli_connect('localhost','root','','census');
    $query="select firstname,lastname,middlename from person";
    $result=mysqli_query($connect,$query) or die('error');
    $data='';
    $count=0;
    while($row=mysqli_fetch_array($result)){
    	$data=$row['firstname'].','.$row['lastname'].','.$row['middlename'].';'.$data;
    	$count++;
    }
    $data=$count.':'.$data;
    die($data);
  }
 function dualSearch($firstname,$lastname){
	  $query="select id,firstname,lastname,middlename from person where firstname='$firstname' and lastname='$lastname'";
	  $connect=mysqli_connect('localhost','root','','census') or die(mysqli_error());
	  $result=mysqli_query($connect,$query) or die('error');
	  $data='';
	  while($row=mysqli_fetch_array($result)){
		  $data=$row['firstname'].','.$row['lastname'].','.$row['middlename'].','.$row['id'].';'.$data;
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
	  $query="select * from person where firstname='$term' or lastname='$term' or middlename='$term' or id='$term' or age='$term' or town='$term' or religion='$term'";
	  $result=mysqli_query($connect,$query) or die(mysqli_error($connect));
	  $data="";
	  while($row=mysqli_fetch_array($result)){
		  $data=$row['firstname'].','.$row['lastname'].','.$row['middlename'].','.$row['id'].';'.$data;
	  }
	  die($data);
  }
  function searchPerson($firstName,$lastName,$middleName){
	  $query="select * from person where firstname='$firstName' and lastname='$lastName' and middlename='$middleName'";
      $connect=mysqli_connect("localhost","root","","census");
	  $result=mysqli_query($connect,$query) or die('error');
	  $data="";
	  if($row=mysqli_fetch_array($result)){
		  $data=$row['firstname'].','.$row['lastname'].','.$row['middlename'].','.$row['id'].','.$row['age'].','.$row['sex'].','.$row['religion'].','.$row['place_of_birth'].','.$row['martial_status'].','.$row['town'];
		  die($data);
	  }
  }
  function searchById($id){
    $query="select * from person where id='$id'";
      $connect=mysqli_connect("localhost","root","","census");
	  $result=mysqli_query($connect,$query) or die('error');
	  $data="";
	  if($row=mysqli_fetch_array($result)){
		  $data=$row['firstname'].','.$row['lastname'].','.$row['middlename'].','.$row['id'].','.$row['age'].','.$row['sex'].','.$row['religion'].','.$row['place_of_birth'].','.$row['martial_status'].','.$row['town'];
		  die($data);
	  }	
  }
?>