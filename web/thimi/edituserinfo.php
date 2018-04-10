

<?php

    
    session_start();
    
    
if(!(isset($_SESSION["user"]))){
          echo "<script type='text/javascript'>alert('Login first..........');</script>";
          echo "<script type='text/javascript'>location.href = 'login.html';</script>";
        }



$conn = mysqli_connect("localhost","root","","thimi");

    if(mysqli_connect_errno()){
        echo "Couldn't connect ".mysqli_connect_error();
    }else{
        //echo "connection successful <br />";
    }
            
        $sql ="select * from customer where username='".$_SESSION["user"]."'";
        $result=$conn->query($sql);
        if($result->num_rows>0){
      while($rowdata=$result->fetch_assoc()){
          $email=$rowdata['email'];
          $securityq1=$rowdata['securityq1'];
          $securityq2=$rowdata['securityq2'];

        }
      }
$conn->close();







?>




<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
  <link rel="stylesheet" href="login.css">

<link rel="stylesheet" type="text/css" href="page.css">
<link rel="stylesheet" type="text/css" href="fonts/stylesheet.css">
<link rel="stylesheet" type="text/css" href="fonts/stylesheet1.css">

  <script type="text/javascript">
    function validateForm() {
      var uname = document.forms["edit"]["txtname"].value;
      var email=document.forms["edit"]["txtemail"].value;
      var pass = document.forms["edit"]["txtpass"].value;
      var cpass=document.forms["edit"]["txtcpass"].value;
      var sq1=document.forms["edit"]["txtpet"].value;
      var sq2=document.forms["edit"]["txtplayer"].value;
      var atIndex,dotIndex,msg="";
      if(uname == "" || pass == "" || cpass == "" || email == "" || sq1 == "" || sq2 == "" )
      {
        msg=msg+"Please fill the form completely."; 
      }else{
              if(pass.length<6)
              {
                 msg=msg+"\nPassword must have at least six characters";
              }

              atIndex=email.indexOf("@");
              dotIndex=email.indexOf(".");
              if(atIndex<0 || dotIndex<0)
              {
                  msg=msg+"\nEmail must have @ and . character";
              }
              if((dotIndex-atIndex)<5)
              {
                msg=msg+"\nThere should be at least 5 chracters between @ and . character";
              }
              if(pass!=cpass){
                msg=msg+"\nPassword not matching"
              }  
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

    <div style="background: #ddbebf;" id="header1">
      <div id="menu">
        <ul>
          <li><a href="pageUser.php" style="color: white; width: -1px; margin: 0px -42px 12px 549px;" />Thimi Ceramics</a></li>
        </ul>
      </div>
    </div>
    
    <div id="main">
    </div>





<div class="login" style="margin-top: 0px;">
  <form class="loginform" name="edit" action="updateuserinfo.php" method="POST">
    <input type="text" name="txtname" readonly value='<?php echo $_SESSION["user"]; ?>' /><br>
    <input type="password" name="txtpass" value='<?php echo $_SESSION["pass"]; ?>' /><br>
    <input type="password" value='<?php echo $_SESSION["pass"]; ?>' name="txtcpass"><br>
    <input type="text" value='<?php echo $email; ?>' name="txtemail"><br>
    <input type="text" value='<?php echo $securityq1; ?>' name="txtpet"><br>
    <input type="text" value='<?php echo $securityq2; ?>' name="txtplayer"><br>
    
    <button type="submit" class="joinbtn" onclick="return validateForm()">Update</button>
      
  </form>
  
  
  
</div>

</body>
</html>
