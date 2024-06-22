<?php 
	include_once("config.php");
	include_once("style.php");
	include_once("header1.php");
?>	

<?php
error_reporting(0);

if(isset($_GET['select'])){

$query2 = "select * from user where id='".$_GET['select']."'";
			//echo $query2;
			$result = mysql_query($query2);
			if(mysql_num_rows($result)){
			$row = mysql_fetch_assoc($result);
			}
}
?>


<style>
h2 {
  color: white;
  font-family: verdana;
  font-size: 240%;

}
p  {
  color: white;
  font-family: Georgia, serif;
  font-size: 100%;
   font-weight: bold;
}
</style>

  <!-- Carousel Start -->
  
                       <div class="container">




<form action="" method="post" enctype="multipart/form-data" name="addroom">

 <style>
body  {
  background-image: url("cc.jpg");
   background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
}
</style>

<br>
<br>
<br>
<br>
<font color="white" size="5">Withdraw Amount</font>
<br>
<br>
<table>
<tr><td>Customer ID</td></tr>
<tr><td><input name="id" type="text" value="<?php  echo $row['id']; ?>" readonly /> </td></tr>
<tr><td>Customer Name </td></tr>
<tr><td><input name="name" type="text" value="<?php  echo $row['name']; ?>" readonly /> </td></tr>
<tr><td>Account Number</td></tr>
<tr><td><input name="acno" type="text" value="<?php  echo $row['acno']; ?>" readonly /> </td></tr>
<tr><td>Enter Password</td></tr>
<tr><td><input name="password" type="text" required></td></tr>
<tr><td><input name="submit" type="submit" value="Withdraw"></td></tr>

</table>


 </form>

</div>

<?php
if(isset($_POST['submit']))
{
	$query="select * from user where id='".$_POST['id']."' and pwd='".$_POST['password']."'";
	$result=mysql_query($query);
	if(mysql_num_rows($result)){
		$row = mysql_fetch_assoc($result);
		$_SESSION['uname']=$row['name'];
		$_SESSION['id']=$row['id'];
echo'<script>alert("Access Successfully"); window.location.href="withdrawamount.php"</script>';
	}
		else{
			echo'<script>alert("Invalid Password");</script>';
		}
}

?>



<?php 
	include_once("footer1.php");
	?>