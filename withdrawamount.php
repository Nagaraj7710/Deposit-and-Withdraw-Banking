<?php 
	include_once("config.php");
	include_once("style.php");
	include_once("header1.php");
?>	

<?php
error_reporting(0);

$query2 = "select * from user where id='".$_SESSION['id']."'";
			//echo $query2;
			$result = mysql_query($query2);
			if(mysql_num_rows($result)){
			$row = mysql_fetch_assoc($result);
			}
?>


<style>
  /* Add this style for horizontal lines in the table */
  table {
    border-collapse: collapse;
    width: 100%;
  }

  /* Add this style for vertical lines in the table */
  table, th, td {
    border: 1px solid white;
  }
</style>

<style>
  /* Add this style to increase the width of cells with the specified class */
  .increase-width {
    width: 500px; /* Adjust the width as needed */
  }

  input[type="text"] {
    border: none;
    outline: 1px;
    background: white;
  }
</style>



<style>
  @media print {
    /* Add styles for printing */
    body {
      background: white;
    }

    table, th, td {
      border: 1px solid black; /* Set border color for printing */
    }
  }
</style>


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


@media print {
  /* Hide the buttons in the print view */
  input[name="print"], input[name="submit"], input[name="add"] {
    display: none;
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
<font color="white" size="5">Withdraw Amount </font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<font color="white" size="5">Date: <?php echo date("d-m-Y"); ?></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<?php
// Generate a unique challan number
$fullChallanNumber = 'CH' . date('YmdHis') . mt_rand(1000, 9999);

// Extract the last 6 characters
$challanNumber = substr($fullChallanNumber, -6);

echo '<font color="white" size="5">Ch No: ' . $challanNumber . '</font>';
?>

<br>
<br>
<table>
<tr><td class="increase-width">Customer Name </td><td></td><td>Branch</td></tr>
<tr><td><input name="name" type="text" value="<?php  echo $row['name']; ?>" readonly /></td><td></td><td><input name="branch" type="text"  value="<?php  echo $row['branch']; ?>" readonly /></td></tr>
<tr><td>Account Number</td><td></td><td>Available Balance</td></tr>
<tr><td><input name="acno" type="text"  value="<?php  echo $row['acno']; ?>" readonly /></td><td></td><td><input name="balance" id="balance" type="text"  value="<?php  echo $row['balance']; ?>" readonly /></td></tr>
<tr><td>Mobile Number</td><td></td><td>Withdraw Amount</td></tr>
<tr><td><input name="mob" type="text"  value="<?php  echo $row['mobile']; ?>" readonly /></td><td></td><td><input name="amt" id="amt" type="text" required></td></tr>
<tr><td colspan="3">Total Amount in Words &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input readonly name="aword" id="aword" type="text" value="" size="54"> </td><td> <input type="submit" name="submit" value="Print" onclick="f3()"> </td></tr>
<tr><td align="right" style="height: 80px;" colspan="3" rowspan="6">Customer &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>Name & Signature:<br><br><br><br><br></td></tr>

</table>

<script language="javascript" type="text/javascript">
            function f3() {
                var balance = document.getElementById('balance').value;
                var amt = document.getElementById('amt').value;
				var amountInWords = convertToWords(amt);
                document.getElementById('aword').value = amountInWords;

                if (parseInt(balance) >= parseInt(amt)) {
                    window.print();
                } else {
                    alert("You don't have enough balance");
                }
            }

function convertToWords(num) {
    if (num === 0) {
        return "Zero";
    }

    var units = ["", "One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine"];
    var teens = ["", "Eleven", "Twelve", "Thirteen", "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eighteen", "Nineteen"];
    var tens = ["", "Ten", "Twenty", "Thirty", "Forty", "Fifty", "Sixty", "Seventy", "Eighty", "Ninety"];

    function convertLessThanOneThousand(number) {
        var words;

        if (number % 100 < 10) {
            words = units[number % 100];
        } else if (number % 100 < 20) {
            words = teens[number % 10];
        } else {
            words = tens[Math.floor(number % 100 / 10)] + " " + units[number % 10];
        }

        if (number >= 100) {
            words = units[Math.floor(number / 100)] + " Hundred " + words;
        }

        return words;
    }

    function convert(number) {
        if (number < 50) {
            return units[number];
        } else if (number < 100) {
            return tens[Math.floor(number / 10)] + " " + units[number % 10];
        } else if (number < 1000) {
            return convertLessThanOneThousand(number);
        } else if (number < 1000000) {
            return convertLessThanOneThousand(Math.floor(number / 1000)) + " Thousand " + convertLessThanOneThousand(number % 1000);
        }

        // Add more ranges as needed

        return "Number out of range";
    }

    var words = convert(num);

    return words;
}
        </script>



 </form>

</div>




<?php 
	include_once("footer1.php");
	?>