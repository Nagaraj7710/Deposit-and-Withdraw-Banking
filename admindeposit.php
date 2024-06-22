<?php 
	include_once("config.php");
	include_once("style.php");
	include_once("adminheader.php");
	 include_once('phpmailer/class.smtp.php');
include_once('phpmailer/class.pop3.php');
include_once('email.class.inc.php');
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




<form action="" method="post"  name="addroom">
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
<center><font color="white" size="5">Deposit Amount to Customer Account</font></center>
Customer ID<br />
 <input name="id" type="text" value="<?php  echo $row['id']; ?>" readonly />
 <br />

Customer Name<br />
 <input name="name" type="text" value="<?php  echo $row['name']; ?>" readonly />
 <br />
Mail<br />
 <input name="emailid" type="text" value="<?php  echo $row['mail']; ?>" readonly />
 <br />
Account Number<br />
 <input name="acno" type="text"  value="<?php  echo $row['acno']; ?>" readonly />
 <br />
 Bracnch <br/>
 <input name="branch" type="text" readonly value="<?php  echo $row['branch']; ?>" />
 <br />
  Mobile<br />
 <input name="mobile" type="text" class="ed" readonly value="<?php  echo $row['mobile']; ?>" />
<br>
Balance<br />
 <input name="balance" id="balance" type="text" class="ed" readonly value="<?php  echo $row['balance']; ?>" />
<br>
 Deposit Amount<br />
 <input type="text" name="amt" id="amt" required value="" class="ed"><br />
 <input type="button" name="add" onclick="sum()" value="Add" id="button" />
 <br>
  Total Amount<br />
  <input type="text" name="ttamt" id="ttamt" required value="" class="ed"><br />
  <input type="submit" name="submit" value="Deposit" id="button1" />
  <br>

 </center>
 </form>

</div>

<script language="javascript" type="text/javascript">
            function sum() {
                var balance = document.getElementById('balance').value;
                var amt = document.getElementById('amt').value;

var tamt = parseInt(balance) + parseInt(amt)
	document.getElementById('ttamt').value = isNaN(tamt) ? '' : tamt;
            }
        </script>


<?php
 
 
 if(isset($_POST['submit']))
	 {
	 	         		
	$query = "INSERT INTO `trans` VALUES (null, '".$_POST['id']."', '".$_POST['name']."', '".$_POST['emailid']."', '".$_POST['acno']."','".$_POST['amt']."','".$_POST['ttamt']."' , curdate(),'Credited')";
	$query1 = "update user set balance='".$_POST['ttamt']."' where id='".$_POST['id']."'";
          
	if(mysql_query($query) && mysql_query($query1)){
		echo ' SUCCESSFULLY';
	  echo '<script> alert("DEPOSITED SUCCESSFULLY");</script>';
	}
	else{
		echo 'NOT REGISTERD';
	}

	$amt=$_POST['amt'];
			$name=$_POST['name'];
			$ttamt=$_POST['ttamt'];
			$emailid=$_GET['emailid'];

			$html="";
			//$html .= 'Your Result Upload In our Website Pls check Our Website</b><br />';
			
			$email = new Email();
			$email->set_from($configVars['my_email']);
			$email->set_from_name('Your Bank Transaction');		
			$email->set_subject("Amount Credited");
			//$email->set_message(html_entity_decode($html.'<br /><br />'));
			$email->set_message("Hi $name! Your Account was Credited with the amount of &#8377; $amt today, and your available balance now is &#8377; $ttamt. Thank You. Have a Great Day");
			$email->add_to($_POST['emailid']);

			//$email->add_to($emailid);
			 $sent_flag = $email->send();
	header("location:handling.php");
	exit;
//}
 }

?>

