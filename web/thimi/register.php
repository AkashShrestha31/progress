<?php

    
//     session_start();
    
    
// if(!(isset($_SESSION["user"]))){
//           echo "<script type='text/javascript'>alert('Login first..........');</script>";
//           echo "<script type='text/javascript'>location.href = 'login.html';</script>";
//         }

$username =$_POST['txtname'];
$email=$_POST['txtemail'];
$password =$_POST['txtpass'];
//$cpass=$_POST['txtcpass'];
$sq1=$_POST['txtpet'];
$sq2=$_POST['txtplayer'];
$host="localhost";
$uname="root";
$pass="";
$dbname="thimi";
$conn=new mysqli($host,$uname,$pass,$dbname);
if($conn->connect_error){
	die("connect error");
}
$sql1="select * from customer where username='".$username."'";
$result1=$conn->query($sql1);
if($result1->num_rows!=0){
		
	echo "<script type='text/javascript'>alert('Username already taken.');</script>";	    
	echo "<script type='text/javascript'>location.href = 'register.html';</script>";
}
else{
	$sql="insert into customer(username, password, email, securityq1, securityq2) values('".$username."','".$password."','".$email."','".$sq1."','".$sq2."')";
		echo "$sql";
		$result=$conn->query($sql);
		echo "<script type='text/javascript'>alert('user registered...');</script>";
		         echo "<script type='text/javascript'>location.href = 'login.html';</script>";
	
}
mysqli_close($conn);
?>