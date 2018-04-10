<?php

    
    session_start();
    
    
if(!(isset($_SESSION["user"]))){
          echo "<script type='text/javascript'>alert('Login first..........');</script>";
          echo "<script type='text/javascript'>location.href = 'login.html';</script>";
        }

?>
<html>

<head>
<link rel="stylesheet" type="text/css" href="page.css">
<link rel="stylesheet" type="text/css" href="fonts/stylesheet.css">
<link rel="stylesheet" type="text/css" href="fonts/stylesheet1.css">
<script type="text/javascript">
	function del(){
   var txt;
  
var r = confirm("Add item to cart?");
if (r == true) {
    return true;
} else {
    return false;
} 
}
function tt(){
   var txat;
  
var ra = confirm("Log out?");
if (ra == true) {
    return true;
} else {
    return false;
} 
}
</script>
</head>
<body>

<!-- 
<div class="nav">
	<ul>
		<li><a href="#"><img src="./images/logo.png" alt="Site Logo" style="width: 16px;
    margin: 0px 40px 0px 40px;"></a></li>
		<li><a href="#">Home</a></li>
		<li><a href="#about">About</a></li>
		<li><a href="#pricing">Pricing</a></li>
		<li><a href="#join">Join Us</a></li>
		<li><a href="register.html"><img src="./assets/images/user.png" style="width: 24px;padding: 12px;"></a></li>

	</ul>
</div>

		<div id="main">
		
		</div>
	 -->



		<div id="header1">

		<div id="menu">
			<ul>
			<li><a href="pageUser.php"><img src="img/logo1.png" alt="Site Logo" style="width: 55px;
    margin: -24px -8px 0px 25px;" /></a></li>
				
				<li><a href="edituserinfo.php"><form name="user" method="POST" style="width: 65px;margin: -5px 0px 0px -50px;">
    <input type="text" value='<?php echo $_SESSION["user"]; ?>' readonly name="mainname" style="text-align: center; 
    background-color: #6276bd; 
    color: white;
    font-size: 20px !important ;
    border-radius: 10px;
    cursor: pointer;
    border: none;
    width: 120px !important;
    text-align: center;
    height: 35px;
" ><br>
    
      
  </form></a></li>
				<li><a href="CART.php"><img src="./img/cart.png" style="width: 48px;margin: -13px 0px 0px 22px;"></a></li>
				<li><a href="logout.php" onclick="return tt();"><img src="./img/logout.png" style="width: 42px;margin: -10px 0px 0px -25px;"></a></li>

	</ul>
			
			</ul>
		</div>
		
		</div>
		


		
		<div id="main">
		
		</div>
	











<div class="wrapper">
	
<?php

    



$conn = mysqli_connect("localhost","root","","thimi");

    if(mysqli_connect_errno()){
        echo "Couldn't connect ".mysqli_connect_error();
    }else{
        //echo "connection successful <br />";
    }
            
        $sql ="select * from product";
        $result=$conn->query($sql);
        echo "<br><h3>products</h3>";
	    $num=1;
        if($result->num_rows>0){
      while($rowdata=$result->fetch_assoc()){

        echo "<section class='work'>";
        if($num % 2==1)
        	echo "<div class='image-area left'><img alt='Website' src=".$rowdata['image']."></div>";
        else
        	echo "<div class='image-area right'><img alt='Website' src=".$rowdata['image']."></div>";
        
        echo "<div class='text-box'>";
        echo "<div class='text-box-content'>";


          	echo"<h3>".$rowdata['name'].' $'.$rowdata['price']."</h3>";
          	echo"<p>".$rowdata['description']."</p>";
          $quantity=$rowdata['quantity'];

  if($quantity!=0)
echo "<form action='ADD_to_cart.php' method='POST'><input type='hidden' name='tempId' value='".$rowdata["product_id"]."'/><input type='submit' name='submit-btn' value='Add to cart' onclick='return del()' class='button' /></form>";
          	else
          		echo "<a class='button' >Out of stock</a>";
          		


          		         	echo "</div>";
          	echo "</div>";
          	echo "</section>";
         	$num=$num+1;
          	// if($num>4)
          	// 	break;
        }
      }
$conn->close();







?>

</div>
<br>
<br>
<!-- <h3><a href='AllProducts.html' target="_blank" style="text-align: center; margin-left: 606px; color: black">View All Products</a></h3>
 -->

<div id="contact">
<section class="contact">
	<div class="contact-content">
		<h4>Contact<br> Email us:<a class="email" href="sagunshrestha9841@gmail.com"> sagunshrestha9841@gmail.com</a></h4>
	</div>
</section>
<div class="image-divider">
</div>
</div>

<div id="about">
<footer>
	<div class="footer-content">
		<p class="credit">&copy; Copyright 2016 Sagun Shrestha.<br>
		Designed and Developed by Sagun Shrestha.</p>
		<ul class="social">
			<li>
				<a href="#" target="_blank">facebook.</a>
			</li>
			<li>
				<a href="#" target="_blank">twitter.</a>
			</li>
			<li>
				<a href="#" target="_blank">youtube.</a>
			</li>
			<li>
				<a href="#" target="_blank">instagram.</a>
			</li>
		</ul>
	</div>
</footer>
</div>







	</body>
	</html>
