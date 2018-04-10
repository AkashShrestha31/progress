
<?php
session_start();

$host="localhost";
$uname="root";
$pass="";
$dbname="thimi";
$conn=new mysqli($host,$uname,$pass,$dbname);
if($conn->connect_error){
	die("connect error");
}


$sql="select * from sales";
$result=$conn->query($sql);
if($result->num_rows==0){
	session_destroy();
	echo "<script type='text/javascript'>alert('you logged out..');</script>";
	echo "<script type='text/javascript'>location.href = 'page.php';</script>";
}else{
	echo "<script type='text/javascript'>alert('Please clear your cart first before logging out.');</script>";
	echo "<script type='text/javascript'>location.href = 'CART.php';</script>";
}
?>