<?php
	$name=$_POST['txtname'];
	$conn=mysqli_connect("localhost","root","","thimi");
	if(mysqli_connect_error()){
		echo "Couldn't connect ".mysqli_connect_error();
	}
	$sql="select * from customer where username='".$name."'";
	$result=$conn->query($sql);
	if($result->num_rows!=0){
			//echo "user exists";
        }else{
            //echo "You are not in our database".mysqli_connect_error();
            
            echo "<script type='text/javascript'>alert('User does not exists....');</script>";
                echo "<script type='text/javascript'>location.href = '1recoverPass.html';</script>";
            }
    
?>


<!DOCTYPE html>
<html>
<head>
  <title>Security Questions</title>
  <link rel="stylesheet" href="login.css">

<link rel="stylesheet" type="text/css" href="page.css">
<link rel="stylesheet" type="text/css" href="fonts/stylesheet.css">
<link rel="stylesheet" type="text/css" href="fonts/stylesheet1.css">

<script type="text/javascript">
  function validateForm() {
    var q2 = document.forms["answer"]["sq1"].value;
    var q1 = document.forms["answer"]["sq2"].value;
    if(q1 == "" || q2=="")
    {
      alert("Please answer both the questions."); 
      return false;
    }

    else
      return true;
  }
</script>

</head>
<body>
    
<div class="login">
  <!-- <img src="assets/images/apple_logo.png" alt="Logo of Apple" width="60px"> -->
  <!-- <h2>Good Morning!</h2>
  <h4>This day will be great.</h4> -->
  <form class="loginform" name="answer" action="3recoverAns.php" method="POST">
    <input type="text" value='<?php echo $_POST["txtname"]; ?>' readonly name="mainname"><br>
    <input type="text" placeholder= "What is your pet name?" name="sq1"><br>
    <input type="text" placeholder= "Who is your favourite football player?" name="sq2"><br>
    <button type="submit" class="joinbtn" onclick="return validateForm()">Go</button>
    
      
  </form>
  
  
  
</div>


</body>
</html>