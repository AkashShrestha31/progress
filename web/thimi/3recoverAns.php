<?php
  $s1=$_POST['sq1'];
  $s2=$_POST['sq2'];
  $mainname=$_POST['mainname'];

  $conn=mysqli_connect("localhost","root","","thimi");
  if(mysqli_connect_error()){
    echo "Couldn't connect ".mysqli_connect_error();
  }
  $sql="select * from customer where securityq1='".$s1."' and securityq2='".$s2."'";
  $result=$conn->query($sql);
  if($result->num_rows!=0){
      //echo "user exists";echo

   // echo "<script type='text/javascript'>alert('Answers matched....');</script>";
        }else{
            //echo "You are not in our database".mysqli_connect_error();
            
            echo "<script type='text/javascript'>alert('Answers did not match....');</script>";
                echo "<script type='text/javascript'>location.href = '1recoverPass.html';</script>";
            }
    
    
?>




<!DOCTYPE html>
<html>
<head>
  <title>Change Password</title>
  <link rel="stylesheet" href="login.css">

<link rel="stylesheet" type="text/css" href="page.css">
<link rel="stylesheet" type="text/css" href="fonts/stylesheet.css">
<link rel="stylesheet" type="text/css" href="fonts/stylesheet1.css">

<script type="text/javascript">
  function validateForm() {
    var pass1 = document.forms["final"]["p1"].value;
    var pass2 = document.forms["final"]["p2"].value;
    var msg="";
    if(pass1 == "" || pass2 == "")
      {
        msg=msg+"Please fill the form completely."; 
      }else{
              if(pass1.length<6)
              {
                 msg=msg+"\nPassword must have at least six characters";
              }
              if(pass1!=pass2){
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



<div class="login">
  <!-- <img src="assets/images/apple_logo.png" alt="Logo of Apple" width="60px"> -->
  <!-- <h2>Good Morning!</h2>
  <h4>This day will be great.</h4> -->
  <form class="loginform" name="final" action="4recover.php" method="POST">
    <input type="text" value='<?php echo $mainname; ?>' readonly name="mainname"><br>
    <input type="password" placeholder= "New Password" name="p1"><br>
    <input type="password" placeholder= "Confirm Password" name="p2"><br>
    <button type="submit" class="joinbtn" onclick="return validateForm()">Go</button>
    
      
  </form>
  
  
  
</div>


</body>
</html>