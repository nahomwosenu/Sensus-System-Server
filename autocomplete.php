<?php 
 $request='';
 if($_SERVER['REQUEST_METHOD']=='POST'){
	 if(!empty($_POST['type']))
		 $request=$_POST['type'];
	 else die("error");
	 if($request=="region")
		 return region();
	 else if($request=="town"){
		 $wereda=$_POST['wereda'];
		 town($wereda);
	 }
	 else if($request=="zone"){
         $region=$_POST['region'];
         zone($region);		 
	 }
	 else if($request=="wereda"){
		 $zone=$_POST['zone'];
		 wereda($zone);
	 }
	 else if($request=="all")
		 getAll();
	 else if($request=="type")
		 getTypes();
	 
 }
 function region(){
	 $connect=mysqli_connect('localhost','root','','census') or die('error');
	 $query="select name from region";
	 $result=mysqli_query($connect,$query) or die('error');
	 $data='';
	 while($row=mysqli_fetch_array($result)){
		 $data=$row['name'].",".$data;
	 }
	 die($data);
 }
 function getTypes(){
	 $types="Resident,Hotel";
	 die($types);
 }
 function getAll(){
	 $connect=mysqli_connect('localhost','root','','census') or die('error');
	 
	 $query="select zone from zone";
	 $query1="select name from region";
	 $query2="select wereda from wereda";
	 $query3="select town from town";
	 
	 $result0=mysqli_query($connect,$query1);
	 $result1=mysqli_query($connect,$query);
	 $result2=mysqli_query($connect,$query2);
	 $result3=mysqli_query($connect,$query3);
	 $data=$data1=$data2=$data3='';
	 while($row0=mysqli_fetch_array($result0)){
		 $data=$row0['name'].",".$data;
	 }
	 while($row1=mysqli_fetch_array($result1)){
		 $data1=$row1['zone'].",".$data1;
	 }
	 while($row2=mysqli_fetch_array($result2)){
		 $data2=$row2['wereda'].",".$data2;
	 }
	 while($row3=mysqli_fetch_array($result3)){
		 $data3=$row3['town'];
	 }
	 die($data.";".$data1.";".$data2.";".$data3);
 }
 function zone($region){
	 $connect=mysqli_connect('localhost','root','','census');
	 $query="select zone from zone where region='$region'";
	 if(empty($region))
		 $query="select zone from zone";
	 $result=mysqli_query($connect,$query);
	 $data='';
	 while($row=mysqli_fetch_array($result)){
		 $data=$row['zone'].",".$data;
	 }
	 die($data);
 }
 function wereda($zone){
	 $connect=mysqli_connect('localhost','root','','census');
	 $query="select wereda from wereda";
	 if(!empty($zone))
		 $query="select wereda from wereda where zone='$zone'";
	 $result=mysqli_query($connect,$query);
	 $data='';
	 while($row=mysqli_fetch_array($result)){
		 $data=$row['wereda'].",".$data;
	 }
	 die($data);
 }
 function town($wereda){
	 $connect=mysqli_connect('localhost','root','','census');
	 $query="select town from town";
	 if(!empty($wereda))
		 $query="select town from town where wereda='$wereda'";
	 $result=mysqli_query($connect,$query);
	 $data='';
	 while($row=mysqli_fetch_array($result)){
		 $data=$row['town'].",".$data;
	 }
	 die($data);
 }
 
?>