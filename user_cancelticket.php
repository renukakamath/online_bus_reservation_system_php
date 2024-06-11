<?php include 'userheader.php';
extract($_GET);
if (isset($_POST['cancel'])) {
	extract($_POST);
	echo$q="insert into cancellation values(null,'$bid','$re',curdate(),'canceled')";
	insert($q);
	echo$q1="delete from booking_child where booking_child_id='$bid'";
	delete($q1);
	echo$q2="update booking_master set status='canceled' where booking_master_id='$bmid'";
	update($q2);
	alert('Successfully');
  return redirect("user_cancelticket.php?bid=$bid");
}




 ?>

<!-- Carousel Start -->
    <div class="container-fluid p-0 wow fadeIn" data-wow-delay="0.1s" >
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel" >
            <div class="carousel-inner" 
                <div class="carousel-item active" >
                    <img class="w-100" src="img/carousel-2.jpg" alt="Image" style="height: 700px"> >
                    <div class="carousel-caption" >
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
	<center>
  <h1 style="color: white">Cancellation</h1>
		<form method="post">
			<table class="table" style="width: 500px;color: white">
				
				<tr>
					<th>Reason For Cancel</th>
					<td style="color: black"><input type="text" required="" class="form-control" name="re"></td>
				</tr>
				
				<tr>
					<th align="center" colspan="2"><input type="submit" name="cancel" value="submit" class="btn btn-success"></th>
				</tr>
			</table>
		</form>
	</center>
 </div></div></div></div></div></div></div></div>
	
	<center>
		<h1>View Cancel Ticket</h1>
		<table class="table" style="width: 500px;color: black">
			<tr>
				<th>Sino</th>
				<th>Reason For Cancellaion</th>
				<th>Date & Time</th>
				<th>Status</th>
			</tr>
			<?php 

            $q="select * from cancellation inner join booking_child using(booking_child_id) where booking_child_id='$bid'";
            $res=select($q);
            $sino=1;
            foreach ($res as $row) {
            	?>
            	<tr>
            		<td><?php echo $sino++; ?></td>
            		<td><?php echo $row['reason_for_cancellation'] ?></td>
            		<td><?php echo $row['cancel_datetime'] ?></td>
            		<td><?php echo $row['cancellation_status'] ?></td>
            	</tr>
           <?php 
            }





			 ?>
		</table>
	</center>

<?php include 'footer.php' ?>