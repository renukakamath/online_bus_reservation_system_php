<?php include 'userheader.php';
	$uid=$_SESSION['user_id'];
extract($_GET);

if (isset($_POST['payment'])) {
	extract($_POST);


		echo $exp_date=$mon;
	echo $cd=date("Y-m");

if ($exp_date < $cd) {


alert('expired'); 
			

}else{



	$q="insert into payment values(null,'$bid','$uid','booking',now(),'paid')";
	insert($q);
$q2="update booking_master set status='paid' where booking_master_id='$omid'";
update($q2);


	$q3="SELECT * FROM booking_child INNER JOIN `seats` USING (bus_id) where booking_master_id='$omid'";
$res=select($q3);



foreach ($res as $key) {

  $pid= $key['bus_id'] ;

 $qty=$key['no_of_seat'];

echo$q6="update seats set seat_number=seat_number-'$qty' where bus_id='$pid'";
update($q6);

alert('Successfully');
	return redirect('user_viewmybookings.php');
}





}
}

 ?>
<!-- Carousel Start -->
    <div class="container-fluid p-0 wow fadeIn" data-wow-delay="0.1s" >
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel" >
            <div class="carousel-inner" 
                <div class="carousel-item active" >
                    <img class="w-100" src="img/carousel-5.jpg" alt="Image" style="height: 700px"> >
                    <div class="carousel-caption" >
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
<center>
	<h1 style="color: white">Make Payment</h1>
	<form method="post">
		<table class="table" style="width: 500px;color: white">
			<tr>
				<th>card Nunber</th>
				<td style="color: black"><input type="text" required="" maxlength="16" class="form-control" name="card"></td>
			</tr>
			<tr>
				<th>Cvv</th>
				<td style="color: black"><input type="text" required="" maxlength="3" class="form-control" name="cv"></td>
			</tr>
			<tr>
				<th>Expire date</th>
				<td style="color: black"><input type="month"  name="mon" required="" class="form-control"></td>
			</tr>
			<tr>
				<th>Amount</th>
				<td style="color: black"><input type="text" required="" value="<?php echo $amt ?>" class="form-control" name="am"></td>
			</tr>
			<th align="center" colspan="2"><input type="submit" name="payment" value="submit" class="btn btn-success"></th>
		</table>
	</form>
</center>

 </div></div></div></div></div></div></div></div>
<?php include 'footer.php' ?>