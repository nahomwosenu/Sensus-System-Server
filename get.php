<?php 
  if($_SERVER['REQUEST_METHOD']=='POST'){
    $request=$_POST['request'];
    $name=$_POST['name'];
    if($request=='table'){
    	getTable($name);
    }
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

?>