<?php

    session_start();

    $uname = $_POST['loginUsername'];
    $pass = $_POST['loginPass'];



$conn = mysqli_connect("localhost","root","","thimi");

    if(mysqli_connect_errno()){
        echo "Couldn't connect ".mysqli_connect_error();
    }else{
        //echo "connection successful <br />";
    }
    if($uname=="admin"){
            
        $sql ="select * from admin where username='".$uname."' and password='".$pass."'";
        $result=$conn->query($sql);
        if($result->num_rows>0){

            echo "<script type='text/javascript'>alert('Welcome to Admin Pannel');</script>";
                $_SESSION["user"]=$uname;
                $_SESSION["pass"]=$pass;

            //header('Location: studentform.html');
            echo "<script type='text/javascript'>location.href = 'dashboard.php';</script>";
            exit();
        }else{
            //echo "You are not in our database".mysqli_connect_error();
            
            echo "<script type='text/javascript'>alert('Invalid username password....');</script>";
                echo "<script type='text/javascript'>location.href = 'login.html';</script>";
            }
    }else{
    $sql ="select * from customer where username='".$uname."' and password='".$pass."'";
    $result=$conn->query($sql);
        if($result->num_rows>0){

            echo "<script type='text/javascript'>alert('login successful....session started.');</script>";
                $_SESSION["user"]=$uname;
                $_SESSION["pass"]=$pass;

            //header('Location: studentform.html');
            echo "<script type='text/javascript'>location.href = 'pageUser.php';</script>";
            exit();
        }else{
            //echo "You are not in our database".mysqli_connect_error();
            
            echo "<script type='text/javascript'>alert('Invalid username password....');</script>";
                echo "<script type='text/javascript'>location.href = 'login.html';</script>";
            }
    }
    mysqli_close($conn);
?>