<!DOCTYPE html>
<html>
<head>
  <title>Add Product</title>
  <link rel="stylesheet" href="login.css">

<link rel="stylesheet" type="text/css" href="page.css">
<link rel="stylesheet" type="text/css" href="fonts/stylesheet.css">
<link rel="stylesheet" type="text/css" href="fonts/stylesheet1.css">

    <script type="text/javascript">
    function validateForm() {
      var uname = document.forms["registerform"]["pname"].value;
      var email=document.forms["registerform"]["pprice"].value;
      var pass = document.forms["registerform"]["pdescription"].value;
      var cpass=document.forms["registerform"]["pquantity"].value;
      var sq1=document.forms["registerform"]["pimage"].value;
      
      var msg="";
      if(uname == "" || pass == "" || cpass == "" || email == "" || sq1 == "")
      {
        msg=msg+"Please fill the form completely."; 
      }else{
			      // if(typeof pprice!='number'){
			      // 	                msg=msg+"\nInvalid data for price.";
			      // }
			      // if(typeof pquantity!='number'){
			      // 	                msg=msg+"\nInvalid data for price.";
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
  <form class="loginform" name="registerform" action="ADD_Product.php" method="POST">
    <input type="text" placeholder= "Product Name" name="pname"><br>
    <input type="number" placeholder= "Price" name="pprice"><br>
    <input type="text" placeholder= "Description" name="pdescription"><br>
    <input type="number" placeholder= "Quantity" name="pquantity"><br>
    <input type="text" placeholder= "Image Path" name="pimage"><br>
    
    <button type="submit" class="joinbtn" onclick="return validateForm()">ADD</button>
      
  </form>
  
  
  
</div>

</body>
</html>
