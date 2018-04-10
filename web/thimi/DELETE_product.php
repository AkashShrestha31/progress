<?php
session_start();
    
    
if(!(isset($_SESSION["user"]))){
          echo "<script type='text/javascript'>alert('Login first..........');</script>";
          echo "<script type='text/javascript'>location.href = 'login.html';</script>";
        }
$roll=$_POST['tempId'];
$host="localhost";
$uname="root";
$pass="";
$dbname="thimi";
$conn=new mysqli($host,$uname,$pass,$dbname);
if($conn->connect_error){
	die("connect error");
}

$sql="select * from product where product_id='".$roll."'";
$result=$conn->query($sql);
if($result->num_rows>0){
	
	$sql1="delete from product where product_id='".$roll."'";
	$conn->query($sql1);
	echo "<script type='text/javascript'>alert('Product deleted from database...');</script>";
         echo "<script type='text/javascript'>location.href = 'viewProduct.php';</script>";
}else{
		echo "<script type='text/javascript'>alert('No student with inputted roll no exists....');</script>";
		echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";
}

$conn->close();
?>