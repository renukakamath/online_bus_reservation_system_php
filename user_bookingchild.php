<?php include 'userheader.php';
	$uid=$_SESSION['user_id'];
	extract($_GET);

if (isset($_POST['booking'])) {
	extract($_POST);

	echo$data=$noseat;
	echo$stock=$seat;

	if ($stock < $data ) {

		alert('Enter Less Quantity');
	}
else{


   

	echo$q2="select * from booking_master where user_id='$uid' and status='pending'";
	$res=select($q2);
	if (sizeof($res)>0) {
		$bmid=$res[0]['booking_master_id'];
	}else{

	echo$q="insert into booking_master values(null,'$uid','$total',now(),'pending')";
	$bmid=insert($q);


echo$q3="insert into booking_child values(null,'$bmid','$bid','$noseat','$spid','$epid','$total')";
	insert($q3);


	alert('successfuly');
	return redirect('user_cart.php');
}
  $q4="select * from booking_child where bus_id='$bid' and booking_master_id='$bmid' ";
  $res2=select($q4);

  if (sizeof($res2)>0) {
  	$bdid=$res2[0]['booking_child_id'];

  	echo$q5="update booking_child set no_of_seat=no_of_seat+'$noseat', amount=amount+'$total' where booking_child_id='$bdid' ";
  	update($q5);
  	
  }else{

	echo$q3="insert into booking_child values(null,'$bmid','$bid','$noseat','$spid','$epid','$total')";
	insert($q3);
	}

	echo$q6="update booking_master set total=total+'$total' where booking_master_id='$bmid' ";
	update($q6);
	alert('successfuly');
	return redirect('user_cart.php');

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
  <script type="text/javascript">
	function TextOnTextChange()
	{
		var x =document.getElementById("p_amount").value;
		var y =document.getElementById("p_qnty").value;
		
		document.getElementById("t_amount").value = x * y;
	}

</script>

<center>
	<h1 style="color: white">Booking</h1>
	<form method="post">
		<table class="table" style="width: 500px;;color: white">
			
			
			<tr>
				<th>From Place</th>
				<td style="color: black"><input type="text" required="" readonly="" value="<?php echo $sp ?>" name="sp"></td>
					
			</tr>
			<tr>
				<th>To Place</th>
				<td style="color: black"><input type="text" required="" readonly="" value="<?php echo $ep ?>" name="sp"></td>
			</tr>
		<tr>
			<th>amount</th>
			<td style="color: black"><input type="text"  id="p_amount" value="<?php echo $aid ?>"   readonly name="amount" class="form-control"></td>
		</tr>
			<tr>
				<th>Number Of Seats</th>
				<td style="color: black"><input type="text"  id="p_qnty"  name="noseat" onchange="TextOnTextChange()"   class="form-control"></td>
			</tr>
	    <tr>
			<th>Total</th>
			<td style="color: black"><input type="number" required="" id="t_amount" class="form-control" name="total"></td>
		</tr>
		
			<tr>
				<td align="center" colspan="2"><input type="submit" class="btn btn-success" name="booking" value="submit"></td>
			</tr>
		</table>
	</form>
</center>
 </div></div></div></div></div></div></div></div>

<?php include 'footer.php' ?>