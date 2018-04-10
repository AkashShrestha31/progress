<?php

    $id=$_POST['PID'];
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

    $sql="update product set name='".$username."', price=".$password.", description='".$email."', quantity='".$quest1."', image='".$quest2."' where product_id='".$id."'";
    $result=$conn->query($sql);
      echo "<script type='text/javascript'>alert('Updated..');</script>";
		         echo "<script type='text/javascript'>location.href = 'viewProduct.php';</script>";
    mysqli_close($conn);
    ?>