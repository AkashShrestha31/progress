<?php
   session_start();
    
    
if(!(isset($_SESSION["user"]))){
          echo "<script type='text/javascript'>alert('Login first..........');</script>";
          echo "<script type='text/javascript'>location.href = 'login.html';</script>";
        }
if($_SESSION["user"]=="admin"){
          //echo "<script type='text/javascript'>alert('Login first..........');</script>";
          echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";
        }

$productID=$_POST['tempId'];
$customername=$_SESSION["user"];
$host="localhost";
$uname="root";
$pass="";
$dbname="thimi";
$conn=new mysqli($host,$uname,$pass,$dbname);
if($conn->connect_error){
	die("connect error");
}

$sql="select * from product where product_id='".$productID."'";
$result=$conn->query($sql);
if($result->num_rows>0){
while($rowdata=$result->fetch_assoc()){
			$productprice=$rowdata['price'];
			$productname=$rowdata['name'];
      $productquantity=$rowdata['quantity'];
}
}
// echo "$productID";
// echo "$customername";
// echo "$productprice";
$productquantity=$productquantity-1;
$sql2="update product set quantity='".$productquantity."' where product_id='".$productID."'";
$result2=$conn->query($sql2);

$sql1="insert into sales(customer_name, product_name, total_price) values ('".$customername."','".$productname."',".$productprice.")";

$result1=$conn->query($sql1);
		// echo "<script type='text/javascript'>alert('Added to cart..');</script>";
		         echo "<script type='text/javascript'>location.href = 'pageuser.php';</script>";

?>