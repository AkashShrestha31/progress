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

$roll=$_POST['tempId'];
$host="localhost";
$uname="root";
$pass="";
$dbname="thimi";
$conn=new mysqli($host,$uname,$pass,$dbname);
if($conn->connect_error){
	die("connect error");
}

$sql="select * from sales where sales_id='".$roll."'";
$result=$conn->query($sql);
if($result->num_rows>0){
while($rowdata=$result->fetch_assoc()){
      
      $productname=$rowdata['product_name'];

}
	
	$sql1="delete from sales where sales_id='".$roll."'";
	$conn->query($sql1);
//	echo "<script type='text/javascript'>alert('Item removed...');</script>";
         echo "<script type='text/javascript'>location.href = 'CART.php';</script>";
}
$sql2="select * from product where name='".$productname."'";
$result2=$conn->query($sql2);
if($result2->num_rows>0){
while($rowdata2=$result2->fetch_assoc()){
      
      $productqty=$rowdata2['quantity'];

}
  $productqty=$productqty+1;
$sql6="update product set quantity='".$productqty."' where name='".$productname."'";
$conn->query($sql6);


}

$conn->close();

?>