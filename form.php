<?php 
 $id=$fn=$ln=$mn=$age=$sex=$pob=$region=$religion=$zone=$town=$dur=$mstatus='';
 $orphood=$prvres='';
 $kebele=$wereda=$subcity=$SA=$EA=$houseSN=$houseHoldSN=$houseType='';
 $connect=mysqli_connect('localhost','root','','census') or die('error');
 if($_SERVER['REQUEST_METHOD']=='POST'){
	 if(!empty($_POST['kebele']))
		 $kebele=valid($_POST['kebele']);
	 else die('error empty firstname');
	 if(!empty($_POST['wereda']))
		 $wereda=valid($_POST['wereda']);
	 else die('error empty wereda');
	 if(!empty($_POST['subcity']))
		 $subcity=valid($_POST['subcity']);
	 else die('error empty subcity');
	 if(!empty($_POST['sa']))
		 $SA=valid($_POST['sa']);
	 else die('error empty station area');
	 if(!empty($_POST['ea']))
		 $EA=valid($_POST['ea']);
	 else die('error empty enum area');
	 if(!empty($_POST['housesn']))
		 $houseSN=valid($_POST['housesn']);
	 else die('error empty house serial number');
	 if(!empty($_POST['householdsn']))
		 $houseHoldSN=valid($_POST['householdsn']);
	 else die('error empty house hold sn');
	 if(!empty($_POST['housetype']))
		 $houseType=valid($_POST['housetype']);
	 else die('error empty house type');
	 if(!empty($_POST['id']))
		 $id=valid($_POST['id']);
	 else die('error empty id');
	 if(!empty($_POST['firstname']))
		 $fn=valid($_POST['firstname']);
	 else die('error empty firstname');
	 if(!empty($_POST['lastname']))
		 $ln=valid($_POST['lastname']);
	 else die('error empty lastname');
	 if(!empty($_POST['middlename']))
		 $mn=valid($_POST['middlename']);
	 else die('error empty middle name');
	 if(!empty($_POST['age']))
		 $age=valid($_POST['age']);
	 else die('error empty age');
	 if(!empty($_POST['sex']))
		 $sex=valid($_POST['sex']);
	 else die('error empty sex');
	 if(!empty($_POST['pob']))
		 $pob=valid($_POST['pob']);
	 else die('error empty place of birth');
	 if(!empty($_POST['region']))
		 $region=valid($_POST['region']);
	 else die('error empty region');
	 if(!empty($_POST['religion']))
		 $religion=valid($_POST['religion']);
	 else die('error empty religion');
	 if(!empty($_POST['zone']))
		 $zone=valid($_POST['zone']);
	 else die('error empty zone');
	 if(!empty($_POST['town']))
		 $town=valid($_POST['town']);
	 else die('error empty town');
	 if(!empty($_POST['mstatus']))
		 $mstatus=valid($_POST['mstatus']);
	 else die('error empty martial status');
	 if(!empty($_POST['orphood']))
		 $orphood=valid($_POST['orphood']);
	 else die('error empty orphan hood');
	 if(!empty($_POST['prevres']))
		 $prevres=valid($_POST['prevres']);
	 else die('error empty previous_residence');
	 if(!empty($_POST['duration_of_residence']))
		 $dur=valid($_POST['duration_of_residence']);
	 else die('error empty duration_of_residence');
	 submit($id,$fn,$ln,$mn,$age,
                 $sex,$pob,$region,$religion,
				 $zone,$town,$dur,$mstatus,
				 $orphood,$prevres,$kebele,$wereda,$subcity,$houseSN,$houseType);
 }
 function valid($input){
	 $input=htmlspecialchars($input);
	 $input=stripslashes($input);
	 $input=trim($input);
	 return $input;
 }
 function submit($id,$fn,$ln,$mn,$age,
                 $sex,$pob,$region,$religion,
				 $zone,$town,$dur,$mstatus,
				 $orphood,$prevres,$kebele,$wereda,$subcity,$houseSN,$houseType){
		$connect=mysqli_connect('localhost','root','','census') or die(mysqli_error($connect));
		$query="insert into person(id,firstname,lastname,middlename,age,sex,place_of_birth,region,
	        religion,zone,town,duration_of_residence,martial_status,orphan_hood,previous_residence)
            values ('$id','$fn','$ln','$mn','$age','$sex','$pob','$region','$religion','$zone','$town','$dur','$mstatus','$orphood','$prevres')";
		$query2="insert into area(region,zone,wereda,kebele,town,subcity) values(
		        '$region','$zone','$wereda','$kebele','$town','$subcity'
				)";
		$query3="insert into house(house_number,type) values('$houseSN','$houseType')";
    $result=mysqli_query($connect,$query) or die(mysqli_error($connect));
	$result2=mysqli_query($connect,$query2) or die(mysqli_error($connect));
	$result3=mysqli_query($connect,$query3) or die(mysqli_error($connect));
    if($result==true && $result2==true && $result3==true)
      die('true');
    else die('false');  
    }
 function getData($item,$key,$value){
	 $query="select $item from person where $key='$value'";
	 $result=mysqli_query($connect,$query) or die('error');
	 if($row=mysqli_fetch_array($result))
		 die($row["$item"]);
	 else die("empty");
 }
 function setData($item,$data,$key,$value){
	 $query="update person set $item='$data' where $key='$value'";
	 $result=mysqli_query($connect,$query);
	 if($result==true)
		 die("true");
	 else die("false");
 }
 function getTotalCount($key){
	 $query="select $key from person";
	 $result=mysqli_query($connect,$query) or die('error');
	 $count=0;
	 while($row=mysqli_fetch_array($result)){
		 $count=$count+1;
	 }
	 die($count);
 }
?>