<?php
 $pass1=$_POST['p1'];
  $pass2=$_POST['p2'];
  $mainname=$_POST['mainname'];
  $conn=mysqli_connect("localhost","root","","thimi");
  if(mysqli_connect_error()){
    echo "Couldn't connect ".mysqli_connect_error();
  }
  $sql="update customer set password='".$pass1."' where username='".$mainname."'";
  $result=$conn->query($sql);
  
  echo "<script type='text/javascript'>alert('Password Updated');</script>";  
  echo "<script type='text/javascript'>location.href = 'login.html';</script>";
mysqli_close($conn);





 ?>
