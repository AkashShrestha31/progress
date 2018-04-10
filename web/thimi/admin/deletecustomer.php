<?php
session_start();
    
    
if(!(isset($_SESSION["user"]))){
          echo "<script type='text/javascript'>alert('Login first..........');</script>";
          echo "<script type='text/javascript'>location.href = 'login.html';</script>";
        }
$roll=$_POST['tempId'];
echo "$roll";
$host="localhost";
$uname="root";
$pass="";
$dbname="thimi";
$conn=new mysqli($host,$uname,$pass,$dbname);
if($conn->connect_error){
	die("connect error");
}

$sql="select * from customer where customer_id='".$roll."'";
$result=$conn->query($sql);
if($result->num_rows>0){
	
	$sql1="delete from customer where customer_id='".$roll."'";
	$conn->query($sql1);
	echo "<script type='text/javascript'>alert('customer deleted from database...');</script>";
         echo "<script type='text/javascript'>location.href = 'customerlist.php';</script>";
}else{
		echo "<script type='text/javascript'>alert('No student with inputted roll no exists....');</script>";
		echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";
}

$conn->close();
?>