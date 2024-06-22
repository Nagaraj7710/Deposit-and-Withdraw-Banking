<?php 
	include_once("config.php");
	include_once("style.php");
	include_once("adminheader.php");
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
<center>

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
<center><font color="white" size="5">Update Customer Details </font></center>

Customer Name<br />
 <input name="name" type="text" value="<?php  echo $row['name']; ?>" required />
 <br />
Customer Mail<br />
 <input name="mail" type="text" value="<?php  echo $row['mail']; ?>" required />
 <br />
Account Number<br />
 <input name="acno" type="text"  value="<?php  echo $row['acno']; ?>" required />
 <br />
 Bracnch <br/>
 <input name="branch" type="text" required value="<?php  echo $row['branch']; ?>" />
 <br />
  Date of Birth<br />
 <input name="dob" type="text" value="<?php  echo $row['dob']; ?>" required class="ed" />
<br>
 Mobile<br />
 <input name="mobile" type="text" class="ed" required value="<?php  echo $row['mobile']; ?>" />
<br>
Balance<br />
 <input name="balance" type="text" class="ed" required value="<?php  echo $row['balance']; ?>" />
<br>
 Address<br />
 <input type="text" name="address" required value="<?php  echo $row['address']; ?>" class="ed"><br />
 <br>
  <input type="submit" name="submit" value="Update" id="button1" />
  <br>

 </center>
 </form>

</div>


<?php
 
 
if(isset($_POST['submit'])){

	$query = "update user set name='".$_POST['name']."', acno='".$_POST['acno']."', dob='".$_POST['dob']."', mobile='".$_POST['mobile']."', branch='".$_POST['branch']."',mail='".$_POST['mail']."', address='".$_POST['address']."', balance='".$_POST['balance']."' where id= '".$_GET['select']."'";
	echo $query;
      
	   
	if(mysql_query($query)){
		echo 'UPDATE SUCCESSFULLY';

	}
	else{
		echo 'NOT UPDATE';
	}
	header("location:viewuser.php");
	exit;
//}
 }

?>


<?php 
	include_once("footer1.php");
	?>