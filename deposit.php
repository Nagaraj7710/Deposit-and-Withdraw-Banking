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


@media print {
  /* Hide the buttons in the print view */
  input[name="print"], input[name="reset"], input[name="add"] {
    display: none;
  }
}

</style>








<br>
<br>
<br>
<br>
<font color="white" size="5">Amount Deposit</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<font color="white" size="5">Date: <?php echo date("d-m-Y"); ?></font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
<tr><td class="increase-width">Customer Name </td> <td>Denomination</td><td></td></tr>
<tr><td><input name="name" type="text" value="<?php  echo $row['name']; ?>" readonly /></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;2000 X</td> <td><input name="tt" id="tt" type="text" value="" required /></td></tr>
<tr><td>Account Number</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;500 X</td> <td><input name="fh" id="fh" type="text" value="" required /></td></tr>
<tr><td><input name="acno" type="text"  value="<?php  echo $row['acno']; ?>" readonly /></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;200 X</td> <td><input name="th" id="th" type="text" value="" required /></td></tr>
<tr><td>Bracnch</td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;100 X</td> <td><input name="oh" id="oh" type="text" value="" required /></td></tr>
<tr><td><input name="branch" type="text" readonly value="<?php  echo $row['branch']; ?>" /></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;50 X</td> <td><input name="ft" id="ft" type="text" value="" required /></td></tr>
<tr><td>Mobile</td><td></td><td></td><td><input name="add" type="button" value="Calculate" onclick="sum();"></td> </tr>
<tr><td><input name="mobile" type="text" class="ed" readonly value="<?php  echo $row['mobile']; ?>" /></td><td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Total:&nbsp;&nbsp;&nbsp; &#8377;</td><td><input name="amt" id="amt" type="text" value="" required /></td><td><input type="reset" name="reset" value="Reset"></td> </tr>
<tr><td colspan="3">Total Amount in Words &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input readonly name="aword" id="aword" type="text" value="" size="70"> </td><td><input name="print" type="submit" value="Print" onClick="return f3();" style="cursor: pointer;"> </td></tr>
<tr><td style="height: 80px;" colspan="3" rowspan="5" align="top">Depositor <br>Name & Signature:<br><br><br><br>
</td></tr>


</table>

<script language="javascript" type="text/javascript">

function sum() {
        var tt = document.getElementById('tt').value;
 var fh = document.getElementById('fh').value;
 var th = document.getElementById('th').value;
  var oh = document.getElementById('oh').value;
    var ft = document.getElementById('ft').value;
//    var selectedClsValue = 0;
    
    var result1 = 2000 * tt;
	var result2 = 500 * fh;
	var result3 = 200 * th;
	var result4 = 100 * oh;
	var result5 = 50 * ft;
	var total = result5+result4+result3+result2+result1;
    document.getElementById('amt').value = isNaN(total) ? '' : total;

	var amountInWords = convertToWords(total);
                document.getElementById('aword').value = amountInWords;
}

function f3()
{
window.print(); 
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

// Examples
console.log(convertToWords(50));       // Fifty
console.log(convertToWords(123));      // One Hundred Twenty Three
console.log(convertToWords(5678));     // Five Thousand Six Hundred Seventy Eight
console.log(convertToWords(123456));   // One Lakh Twenty Three Thousand Four Hundred Fifty Six
console.log(convertToWords(987654));   // Nine Lakh Eighty Seven Thousand Six Hundred Fifty Four



</script>



 </form>

</div>




<?php 
	include_once("footer1.php");
	?>

