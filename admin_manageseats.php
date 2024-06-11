<?php include 'adminheader.php' ;
extract($_GET);
if (isset($_POST['mseat'])) {
	extract($_POST);
	$q1="select * from seats where bus_id='$bid'";
	$res1=select($q1);
 if (sizeof($res1)>0) {
 	alert('already exist');
 }else{
	echo$q="insert into seats values(null,'$seat','$bid','pending')";
	insert($q);
	alert('  Successfully');
  return redirect("admin_manageseats.php?bid=$bid");
}
}
if (isset($_GET['did'])) {
	extract($_GET);
	$q="delete from seats where seat_id='$did'";
	delete($q);
	alert('  Successfully');
  return redirect("admin_manageseats.php?bid=$bid");
}
if (isset($_GET['uid'])) {
	extract($_GET);
	$q="select * from seats where seat_id='$uid'";
	$res=select($q);
}
if (isset($_POST['update'])) {
	extract($_POST);
    $q="update seats set seat_number='$seat' where seat_id='$uid'";
	update($q);
	alert('  Successfully');
  return redirect("admin_manageseats.php?bid=$bid");

}



?>
<!-- Carousel Start -->
    <div class="container-fluid p-0 wow fadeIn" data-wow-delay="0.1s" >
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel" >
            <div class="carousel-inner" 
                <div class="carousel-item active" >
                    <img class="w-100" src="img/carousel-5.jpg" alt="Image" style="height: 500px"> >
                    <div class="carousel-caption" >
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
<center>
	<h1 style="color: white">Manage Seats</h1>
	<form  method="post">
		<?php if (isset($_GET['uid'])) { ?>
		<table class="table" style="width: 500px;color: white">
			<tr>
				<th>Seat Number</th>
				<td style="color: black"><input type="text" class="form-control" required="" name="seat" value="<?php echo $res[0]['seat_number'] ?>"></td>
			</tr>

			<tr>
				<th align="center" colspan="2"><input type="submit" name="update" value="submit" class="btn btn-success"></th>
			</tr>
		</table>
	<?php }else{ ?>
		<table class="table" style="width: 500px;color: white">
			<tr>
				<th>Seat Number</th>
				<td style="color: black"><input type="text" class="form-control" required="" name="seat"></td>
			</tr>
			<tr>
				<th align="center" colspan="2"><input type="submit" name="mseat" value="submit" class="btn btn-success"></th>
			</tr>
		</table>
	<?php } ?>
	</form>
</center>
 </div></div></div></div></div></div></div></div>
<center>
	<h1>View Seats</h1>
	<table class="table" style="width: 500px;color: black">
		<tr>
			<th>Si NO:</th>
			<th>Bus</th>
			<th>Seats</th>
			<th>Seat Status</th>
		</tr>
		<?php 
         $q="select * from seats inner join bus using(bus_id) where bus_id='$bid'";
         $res=select($q);
         $sino=1;
         foreach ($res as $row) {
         	?>
         	<tr>
         		<td><?php echo $sino++; ?></td>
         		<td><?php echo $row['bus_registration'] ?></td>
         		<td><?php echo $row['seat_number'] ?></td>
         		<td><?php echo $row['seat_status'] ?></td>
         		<td><a class="btn btn-success" href="?uid=<?php echo $row['seat_id'] ?>&bid=<?php echo $row['bus_id'] ?>">update</a></td>
         		<td><a class="btn btn-success" href="?did=<?php echo $row['seat_id'] ?>&bid=<?php echo $row['bus_id'] ?>">delete</a></td>
         	</tr>
         <?php
     }



		 ?>
	</table>
</center>
<?php include 'footer.php' ?>