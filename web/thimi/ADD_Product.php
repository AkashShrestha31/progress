<?php

    
//     session_start();
    
    
// if(!(isset($_SESSION["user"]))){
//           echo "<script type='text/javascript'>alert('Login first..........');</script>";
//           echo "<script type='text/javascript'>location.href = 'login.html';</script>";
//         }

$pname =$_POST['pname'];
$pprice=$_POST['pprice'];
$pdescription =$_POST['pdescription'];
//$cpass=$_POST['txtcpass'];
$pquantity=$_POST['pquantity'];
$pimage=$_POST['pimage'];
$host="localhost";
$uname="root";
$pass="";
$dbname="thimi";
$conn=new mysqli($host,$uname,$pass,$dbname);
if($conn->connect_error){
	die("connect error");
}
$sql1="select * from product where name='".$pname."'";
$result1=$conn->query($sql1);
if($result1->num_rows!=0){
		
	echo "<script type='text/javascript'>alert('Product already exists in the database.');</script>";	    
	echo "<script type='text/javascript'>location.href = 'addproduct.php';</script>";
}
else{
	$sql="insert into product(name, price, description, quantity, image) values('".$pname."',".$pprice.",'".$pdescription."',".$pquantity.",'".$pimage."')";
		//echo "$sql";
		$result=$conn->query($sql);
		echo "<script type='text/javascript'>alert('Product Added...');</script>";
		         echo "<script type='text/javascript'>location.href = 'viewProduct.php';</script>";
	
}
mysqli_close($conn);
?>