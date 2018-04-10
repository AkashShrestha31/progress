<?php
$id=$_POST['tempId'];
echo "$id";
echo "<form name=f>";
for($i=1;$i<10;$i++)
	echo "<br>Num".$i."<input type=text name= txt".$i."/>";;
echo "</form>";
?>