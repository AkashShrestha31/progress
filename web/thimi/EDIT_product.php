

<?php

    
    session_start();
    
    
if(!(isset($_SESSION["user"]))){
          echo "<script type='text/javascript'>alert('Login first..........');</script>";
          echo "<script type='text/javascript'>location.href = 'login.html';</script>";
        }


$id=$_POST['tempId'];
$conn = mysqli_connect("localhost","root","","thimi");

    if(mysqli_connect_errno()){
        echo "Couldn't connect ".mysqli_connect_error();
    }else{
        //echo "connection successful <br />";
    }
            
        $sql ="select * from product where product_id=".$id."";
        //echo "$sql";
        $result=$conn->query($sql);
        //echo "/n$result->num_rows";
        

        if($result->num_rows>0){
      while($rowdata=$result->fetch_assoc()){
          $pname=$rowdata['name'];
          $price=$rowdata['price'];
          $pdescription=$rowdata['description'];
          $pquantity=$rowdata['quantity'];
          $pimage=$rowdata['image'];
          $productid=$rowdata['product_id'];

        }
      }else{
        echo "<script type='text/javascript'>alert('Product does not exists.');</script>";
        echo "<script type='text/javascript'>location.href = 'editproduct.php';</script>";
      }
$conn->close();







?>




<!DOCTYPE html>
<html>
<head>
  <title>Edit Product</title>
  <link rel="stylesheet" href="login.css">

<link rel="stylesheet" type="text/css" href="page.css">
<link rel="stylesheet" type="text/css" href="fonts/stylesheet.css">
<link rel="stylesheet" type="text/css" href="fonts/stylesheet1.css">

  <script type="text/javascript">
    function validateForm() {
      var uname = document.forms["edit"]["txtname"].value;
      var email=document.forms["edit"]["txtemail"].value;
      var pass = document.forms["edit"]["txtpass"].value;
      // var cpass=document.forms["edit"]["txtcpass"].value;
      var sq1=document.forms["edit"]["txtpet"].value;
      var sq2=document.forms["edit"]["txtplayer"].value;
      var atIndex,dotIndex,msg="";
      if(uname == "" || pass == "" || email == "" || sq1 == "" || sq2 == "" )
      {
        msg=msg+"Please enter all the data."; 
      }else{
              // if(pass.length<6)
              // {
              //    msg=msg+"\nPassword must have at least six characters";
              // }

              // atIndex=email.indexOf("@");
              // dotIndex=email.indexOf(".");
              // if(atIndex<0 || dotIndex<0)
              // {
              //     msg=msg+"\nEmail must have @ and . character";
              // }
              // if((dotIndex-atIndex)<5)
              // {
              //   msg=msg+"\nThere should be at least 5 chracters between @ and . character";
              // }
              // if(pass!=cpass){
              //   msg=msg+"\nPassword not matching"
              // }  
      }
        
      if(msg=="")
          return true;
      else
      {
          alert(msg);
          return false;
      }

    }     
  </script>


</head>
<body>


<div class="login" style="margin-top: 0px;">
  <form class="loginform" name="edit" action="EDIT_productSave.php" method="POST">
    <input type="text" name="PID" readonly value='<?php echo $productid;  ?>' /><br>
    <input type="text" name="txtname"  value='<?php echo $pname; ?>' /><br>
    <input type="text" name="txtpass" value='<?php echo $price; ?>' /><br>
    
    <input type="text" value='<?php echo $pdescription; ?>' name="txtemail"><br>
    <input type="text" value='<?php echo $pquantity; ?>' name="txtpet"><br>
    <input type="text" value='<?php echo $pimage; ?>' name="txtplayer"><br>
    
    <button type="submit" class="joinbtn" onclick="return validateForm()">Save</button>
      
  </form>
  
  
  
</div>

</body>
</html>

