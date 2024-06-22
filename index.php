<?php
session_start();
error_reporting(0);
include('header.php');
include('style.php');
?>



  <!-- ======= Hero Section ======= -->
  <section class="hero-section" id="hero">

    <div class="wave">

      <svg width="100%" height="355px" viewBox="0 0 1920 355" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
          <g id="Apple-TV" transform="translate(0.000000, -402.000000)" fill="#FFFFFF">
            <path d="M0,439.134243 C175.04074,464.89273 327.944386,477.771974 458.710937,477.771974 C654.860765,477.771974 870.645295,442.632362 1205.9828,410.192501 C1429.54114,388.565926 1667.54687,411.092417 1920,477.771974 L1920,757 L1017.15166,757 L0,757 L0,439.134243 Z" id="Path"></path>
          </g>
        </g>
      </svg>

    </div>

    <div class="container">
      <div class="row align-items-center">
        <div class="col-12 hero-text-image">
          <div class="row">
            <div class="col-lg-8 text-center text-lg-start">
              <h1 data-aos="fade-right">Deposit and Withdraw Your Amount by using this </h1>
              <p data-aos="fade-right" data-aos-delay="200" data-aos-offset="-500"><a href="#" class="btn btn-outline-white">Welcome</a></p>
            </div>
            <div class="col-lg-4 iphone-wrap">
              <img src="ac.jpg" alt="Image" class="phone-1" data-aos="fade-right">
              <img src="ab.jpg" alt="Image" class="phone-2" data-aos="fade-right" data-aos-delay="200">
            </div>
          </div>
        </div>
  

  </section><!-- End Hero -->

  <div class="row footer-newsletter justify-content-center">
          <div class="col-lg-6">
            <form action="" method="post">
              <input type="search" name="search" placeholder="Search Customer Details Here"><input type="submit" value="Search">
            


<?php


$connect = mysqli_connect("localhost", "root", "", "bank");
$output = '';
if(isset($_POST["search"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["search"]);
	$query = "
	SELECT * FROM user 
	WHERE acno LIKE '".$search."'
	";
}

$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)

{
	$output .= '<div class="table-responsive">
					<table class="table table bordered" style="border:10px solid #800000;">
						<tr>
						<th bgcolor=Black><font color=red size=2>ID</font></th>
							<th bgcolor=Black><font color=red size=2>Name</font></th>
							<th bgcolor=Black><font color=red size=2>Account No</font></th>
							<th bgcolor=Black><font color=red size=2>Branch</font></th>
							<th bgcolor=Black><font color=red size=2>Address</font></th>
							<th bgcolor=Black><font color=red size=2>Mobile</font></th>
							<th bgcolor=Black><font color=red size=2>Deposit</font></th>
							<th bgcolor=Black><font color=red size=2>Withdraw</font></th>

							
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
			<th bgcolor=Black><font color=Black size=2>'.$row["id"].'</th>
				<th bgcolor=Black><font color=Black size=2>'.$row["name"].'</th>
				<th bgcolor=Black><font color=Black size=2>'.$row["acno"].'</th>
				<th bgcolor=Black><font color=Black size=2>'.$row["branch"].'</th>
				<th bgcolor=Black><font color=Black size=2>'.$row["address"].'</th>
				<th bgcolor=Black><font color=Black size=2>'.$row["mobile"].'</th>
				<td bgcolor=transparent><font color=white size=2><a href="deposit.php?select= '. $row["id"].'">Deposit</a></font></td>
				<td bgcolor=transparent><font color=white size=2><a href="withdraw.php?select= '. $row["id"].'">Withdraw</a></font></td>

			</tr>
		';
	}
	echo $output;
}
else
{
	echo 'Search Here!';
}
?>
</form>
          </div>
        </div>


<?php
include('footer.php');
?>