<?php
	$username=$_POST['txtname'];
	$password=$_POST['txtpass'];
	$email=$_POST['txtemail'];
	$quest1=$_POST['txtpet'];
	$quest2=$_POST['txtplayer'];
	$conn = mysqli_connect("localhost","root","","thimi");

    if(mysqli_connect_errno()){
        echo "Couldn't connect ".mysqli_connect_error();
    }else{
        //echo "connection successful <br />";
    }

    $sql="update customer set password='".$password."', email='".$email."', securityq1='".$quest1."', securityq2='".$quest2."' where username='".$username."'";
    $result=$conn->query($sql);
      echo "<script type='text/javascript'>alert('Info Updated..');</script>";
		         echo "<script type='text/javascript'>location.href = 'pageUser.php';</script>";
    mysqli_close($conn);
    ?>