<?php

    session_start();
    
    
if(!(isset($_SESSION["user"]))){
          echo "<script type='text/javascript'>alert('Login first..........');</script>";
          echo "<script type='text/javascript'>location.href = 'login.html';</script>";
        }



?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
 <title>View Product</title> 
  <meta name="viewport" content="initial-scale=1.0; maximum-scale=1.0; width=device-width;">
  <link rel="stylesheet" type="text/css" href="css/table.css">


</head>
    
<script type='text/javascript'>
  function del(){
   var txt;
  
var r = confirm("Delete this product?");
if (r == true) {
    return true;
} else {
    return false;
} 
}

</script>


  
  
  <form class="loginform">
    <input type="button" class="joinbtn1" onclick="location.href='dashboard.php';" style="background-color: white; color: black; text-align: center; display: inline;" value="Go Back" />
    <input type="button" class="joinbtn1" onclick="location.href='addProduct.php';" style="display: inline; text-align: center;" value="Add Product" />
      </form>

<?php

$host="localhost";
$uname="root";
$pass="";
$dbname="thimi";
$conn=new mysqli($host,$uname,$pass,$dbname);
if($conn->connect_error){
  die("connect error");
}

$sql="select product_id,name,price,quantity from product";
$result=$conn->query($sql);

echo "<div class='table-title'>";
echo "<h3>Products Detail</h3>";
echo "</div>";
echo "<table class='table-fill'>";
echo "<thead>";
echo "<tr>";
echo "
<th class='text-left'>ID</th>
<th class='text-left'>Product Name</th>

<th class='text-left'>Price</th>
<th class='text-left'>Quantity</th>
<th class='text-left'>AdminOperation</th>
</tr>
</thead>
<tbody class='table-hover'>";
if($result->num_rows>0){
while($rowdata=$result->fetch_assoc()){
  echo"<tr><td class='text-left'>".$rowdata['product_id']."</td>
<td class='text-left'>".$rowdata['name']."</td>
<td class='text-left'>".$rowdata['price']."</td>
<td class='text-left'>".$rowdata['quantity']."</td>
<td class='text-left'><form action='DELETE_product.php' method='POST'><input type='hidden' name='tempId' value='".$rowdata["product_id"]."'/><input type='submit' name='submit-btn' value='Delete' style='



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
<form action='EDIT_product.php' method='POST'><input type='hidden' name='tempId' value='".$rowdata["product_id"]."'/><input type='submit' name='submit-btn' value='Edit' style='



    background-color: #1425a7;
    color: white;
    font-size: 16px !important ;
    border-radius: 9px;
    cursor: pointer;
    border: none;
    width: 70px !important;
    text-align: center;
    height: 30px;
    margin-top: 7px
' /></form>


</td></tr>";
}
}else{
    
            echo "<script type='text/javascript'>alert('No data found');</script>";
}
echo "</tbody></table>";
$conn->close();
?>

  </body>
  </html>