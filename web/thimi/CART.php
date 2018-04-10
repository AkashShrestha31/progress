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



?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
 <title>users cart</title> 
  <meta name="viewport" content="initial-scale=1.0; maximum-scale=1.0; width=device-width;">
  <link rel="stylesheet" type="text/css" href="css/table.css">


</head>
    
<script type='text/javascript'>
  function del(){
   var txt;
  
var r = confirm("remove from the cart?");
if (r == true) {
    return true;
} else {
    return false;
} 
}
function conform(){
   var txt1;
  
var r1 = confirm("Confirm making the purchase?");
if (r1 == true) {
    return true;
} else {
    return false;
} 
}

</script>


  
  
  <form class="loginform">
    <!-- <input type="button" class="joinbtn1" onclick="location.href='dashboard.php';" style="background-color: white; color: black; text-align: center; display: inline;" value="Go Back" /> -->
    <input type="button" class="joinbtn1" onclick="location.href='AllProducts_login.php';" style="display: inline; text-align: center;" value="Add More" />
      </form>

<?php
$name=$_SESSION["user"];
$today=date("d/m/Y");
$host="localhost";
$uname="root";
$pass="";
$dbname="thimi";
$conn=new mysqli($host,$uname,$pass,$dbname);
if($conn->connect_error){
  die("connect error");
}

$sql="select sales_id,product_name,total_price from sales";
$result=$conn->query($sql);
$money=0;
$items="Products: ";
echo "<div class='table-title'>";
echo "<h3>Cart detail</h3>";
echo "</div>";
echo "<table class='table-fill'>";
echo "<thead>";
echo "<tr>";
echo "

<th class='text-left'>Product Name</th>
<th class='text-left'>quantity</th>
<th class='text-left'>Price</th>
<th class='text-left'>Remove</th>
</tr>
</thead>
<tbody class='table-hover'>";
if($result->num_rows>0){
while($rowdata=$result->fetch_assoc()){
  $_SESSION['sales_table']="asym";

  echo"<tr>
  <td class='text-left'>".$rowdata['product_name']."</td>
<td class='text-left'>1</td>
<td class='text-left'>".$rowdata['total_price']."</td>
<td class='text-left'><form action='REMOVE_from_cart.php' method='POST'><input type='hidden' name='tempId' value='".$rowdata["sales_id"]."'/><input type='submit' name='submit-btn' value='Remove' style='



    background-color: #ae0f0f;
    color: white;
    font-size: 16px !important ;
    border-radius: 9px;
    cursor: pointer;
    border: none;
    width: 70px !important;
    text-align: center;
    height: 30px;
' onclick='return del()' /></form>
</td></tr>";
$money=$money+$rowdata['total_price'];
$items=$items.' '.$rowdata['product_name'].',';

$_SESSION["customer"]=$name;
$_SESSION["items"]=$items;
$_SESSION["money"]=$money;
$_SESSION["date"]=$today;
}
}else{
    
      //      echo "<script type='text/javascript'>alert('No data found');</script>";
}

// echo $_SESSION["customer"];
// echo $_SESSION["date"];
// echo "</tbody></table>";
// echo "$money";
// echo "\n$items";
// echo "\n$name";
// echo "$today";
// print_r($today);

// $sql1="insert into bill(customer, products, price, date) values ('".$name."','".$items."',".$money.",'".$today."')";

// $result1=$conn->query($sql1);
//     echo "<script type='text/javascript'>alert('Added to cart..');</script>";
//              echo "<script type='text/javascript'>location.href = 'pageuser.php';</script>";



$conn->close();
?>

<form action='PURCHASE.php' method='POST'>
  <input type='submit' name='submit-btn' value='Purchase' style='



    background-color: #ae0f0f;
    color: white;
    font-size: 20px !important ;
    border-radius: 9px;
    cursor: pointer;
    border: none;
    width: 100px !important;
    text-align: center;
    height: 35px;
    margin-top: -121px;
    margin-right: 98px;
    float: right;
' onclick='return conform()' />
</form>
<!-- <form class="loginform">
    <input type="button" class="joinbtn1" onclick="location.href='dashboard.php';" style="background-color: white; color: black; text-align: center; display: inline;" value="Go Back" />
    <input type="button" class="joinbtn1" onclick="location.href='PURCHASE.php';" style="display: inline; text-align: center;" value="PURCHASE" />
      </form>
 -->
  </body>
  </html>