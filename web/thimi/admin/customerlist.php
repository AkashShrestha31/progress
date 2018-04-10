<?php

    session_start();
    
    
if(!(isset($_SESSION["user"]))){
          echo "<script type='text/javascript'>alert('Login first..........');</script>";
          echo "<script type='text/javascript'>location.href = '../login.html';</script>";
        }



?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
 <title>View Product</title> 
  <meta name="viewport" content="initial-scale=1.0; maximum-scale=1.0; width=device-width;">
  <link rel="stylesheet" type="text/css" href="../css/table.css">


<script type='text/javascript'>
  function del(){
   var txt;
  
var r = confirm("Delete this customer?");
if (r == true) {
    return true;
} else {
    return false;
} 
}


    </script>


</head>
    



  
  
  <form class="loginform">
    <input type="button" class="joinbtn1" onclick="location.href='../dashboard.php';" style="background-color: white; color: black; text-align: center;" value="Go Back" />
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

$sql="select customer_id,username from customer";
$result=$conn->query($sql);

echo "<div class='table-title'>";
echo "<h3>Products Detail</h3>";
echo "</div>";
echo "<table class='table-fill'>";
echo "<thead>";
echo "<tr>";
echo "
<th class='text-left'>ID</th>
<th class='text-left'>Customer Username</th>
<th class='text-left'>Operation</th>
</tr>
</thead>
<tbody class='table-hover'>";
if($result->num_rows>0){
while($rowdata=$result->fetch_assoc()){
  echo"<tr><td class='text-left'>".$rowdata['customer_id']."</td>";
echo "<td class='text-left'>".$rowdata['username']."</td>";
echo "<td class='text-left'><form action='deletecustomer.php' method='POST'><input type='hidden' name='tempId' value='".$rowdata["customer_id"]."'/><input type='submit' name='submit-btn' value='Delete' style='



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
// echo "
// <td class='text-left'><button onclick='redirect()' style='



//     background-color: #ae0f0f;
//     color: white;
//     font-size: 16px !important ;
//     border-radius: 9px;
//     cursor: pointer;
//     border: none;
//     width: 70px !important;
//     text-align: center;
//     height: 30px;
// '>".$rowdata['customer_id']."</button><button type='submit' style='

//     background-color: #1425a7;
//     margin-left: 5px;
//     color: white;
//     font-size: 16px !important ;
//     border-radius: 9px;
//     cursor: pointer;
//     border: none;
//     width: 70px !important;
//     text-align: center;
//     height: 30px;
// '>Edit</button></td></tr>";
}
}else{
    
            echo "<script type='text/javascript'>alert('No data found');</script>";
}
echo "</tbody></table>";
$conn->close();
?>

  </body>
  </html>