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



$host="localhost";
$uname="root";
$pass="";
$dbname="thimi";
$conn=new mysqli($host,$uname,$pass,$dbname);
if($conn->connect_error){
	die("connect error");
}
if(isset($_SESSION["sales_table"])){
$sql1="insert into bill(customer, products, price, date) values ('".$_SESSION["customer"]."','".$_SESSION["items"]."',".$_SESSION["money"].",'".$_SESSION["date"]."')";

$result1=$conn->query($sql1);
$sql9="delete from sales";
$conn->query($sql9);
    echo "<script type='text/javascript'>alert('Thanks for purchasing..');</script>";
             echo "<script type='text/javascript'>location.href = 'pageuser.php';</script>";
}else{
  echo "<script type='text/javascript'>alert('No product added in the cart');</script>";
             echo "<script type='text/javascript'>location.href = 'CART.php';</script>";
}
?>