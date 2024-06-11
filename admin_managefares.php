<?php include 'adminheader.php' ;
extract($_GET);
if (isset($_POST['amount'])) {
	extract($_POST);
	echo$q="insert into fares values(null,'$sid','$eid','$amo','$pamo','$rid')";
	insert($q);
	alert('  Successfully');
  return redirect("admin_managefares.php?rid=$rid");
}
if (isset($_GET['did'])) {
	extract($_GET);
	$q="delete from fares where fare_id='$did'";
	delete($q);
	alert('  Successfully');
  return redirect("admin_managefares.php?rid=$rid");
}
if (isset($_GET['uid'])) {
	extract($_GET);
	$q="SELECT * FROM fares INNER JOIN stops ON fares.starting_stop_id=stops.stop_id AND fares.ending_stop_id=stops.stop_id WHERE fare_id='$uid'";
	$res=select($q);
}
if (isset($_POST['update'])) {
	extract($_POST);
    $q="update fares set starting_stop_id='$sid',ending_stop_id='$eid',  amount_per_seat='$amo',pass_amount='$pamo' where fare_id='$uid'";
	update($q);
	alert('  Successfully');
  return redirect("admin_managefares.php?rid=$rid");

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
	<h1 style="color: white">Manage Fares</h1>
	<form  method="post">
		<?php if (isset($_GET['uid'])) { ?>
		<table class="table" style="width: 500px;color: white">
			<tr>
				<th>Starting Stop</th>
				<td  style="color: black">
					<select name="sid" class="form-control" required="">
						<option value="<?php echo $res[0]['stop_id'] ?>"><?php echo $res[0]['arriving_date_time'] ?></option>
					<option>select</option>
					<?php 
                   $q="select * from stops";
                   $r=select($q);
                   foreach ($r as $row) {?>
                  <option value="<?php echo $row['stop_id'] ?>"> <?php echo $row['arriving_date_time'] ?></option>
                   <?php }

					 ?>
				</select>
			</td>
			</tr>
			<tr>
				<th>Ending Stop</th>
				<td style="color: black" >
					<select name="eid" class="form-control" required="">
						<option value="<?php echo $res[0]['stop_id'] ?>"><?php echo $res[0]['departure_date_time'] ?></option>
					<option>select</option>
					<?php 
                   $q="select * from stops";
                   $m=select($q);
                   foreach ($m as $row) {?>
                  <option value="<?php echo $row['stop_id'] ?>"> <?php echo $row['departure_date_time'] ?></option>
                   <?php }

					 ?>
				</select>
			</td>
			</tr>
			<tr>
				<th>Amount Per seats</th>
				<td style="color: black"><input type="text" name="amo" required="" class="form-control" value="<?php echo $res[0]['amount_per_seat'] ?>"></td>
			</tr>
		    <tr>
				<th> fare Amount</th>
				<td style="color: black"><input type="text" name="pamo" required="" class="form-control" value="<?php echo $res[0]['pass_amount'] ?>"></td>
			</tr>
		

			<tr>
				<th align="center" colspan="2"><input type="submit" name="update" value="submit" class="btn btn-success"></th>
			</tr>
		</table>
	<?php }else{ ?>
		<table class="table" style="width: 500px;color: white">
			<tr>
				<th>Starting Stop</th>
				<td  style="color: black">
					<select name="sid" class="form-control" required="">
					<option>select</option>
					<?php 
                   $q="select * from stops";
                   $r=select($q);
                   foreach ($r as $row) {?>
                  <option value="<?php echo $row['stop_id'] ?>"> <?php echo $row['arriving_date_time'] ?></option>
                   <?php }

					 ?>
				</select>
			</td>
			</tr>
			<tr>
				<th>Ending Stop</th>
				<td  style="color: black">
					<select name="eid" class="form-control" required="">
					<option>select</option>
					<?php 
                   $q="select * from stops";
                   $m=select($q);
                   foreach ($m as $row) {?>
                  <option value="<?php echo $row['stop_id'] ?>"> <?php echo $row['departure_date_time'] ?></option>
                   <?php }

					 ?>
				</select>
			</td>
			</tr>
			<tr>
				<th>Amount Per seats</th>
				<td style="color: black"><input type="text" required="" name="amo" class="form-control" ></td>
			</tr>
		    <tr>
				<th> Fare Amount</th>
				<td style="color: black"><input type="text" required="" name="pamo" class="form-control" ></td>
			</tr>
			<tr>
				<th align="center" colspan="2"><input type="submit" name="amount" value="submit" class="btn btn-success"></th>
			</tr>
		</table>
	<?php } ?>
	</form>
</center>
 </div></div></div></div></div></div></div></div>
<center>
	<h1>View Fares</h1>
	<table class="table" style="width: 500px;color: black">
		<tr>
			<th>Sl NO:</th>
			<th>Starting Stop</th>
			<th>Ending Stop</th>
			<th>Amount Per Seat</th>
		    <th>fare Amount </th>
			
		</tr>
		<?php 
        $q="SELECT * FROM `fares` f,`stops` s WHERE f.`starting_stop_id`=s.`stop_id` or f.`ending_stop_id`=s.`stop_id` And s.`route_id`='$rid'";
         $res=select($q);
         $slno=1;
         foreach ($res as $row) {
         	?>
         	<tr>
         		<td><?php echo $slno++; ?></td>
         		<td><?php echo $row['arriving_date_time'] ?></td>
         		<td><?php echo $row['departure_date_time'] ?></td>
         		<td><?php echo $row['amount_per_seat'] ?></td>
         		<td><?php echo $row['pass_amount'] ?></td>

         		<td><a class="btn btn-success" href="?uid=<?php echo $row['fare_id'] ?>">update</a></td>
         		<td><a class="btn btn-success" href="?did=<?php echo $row['fare_id'] ?>">delete</a></td>
         		
         	</tr>
         <?php
     }



		 ?>
	</table>
</center>
<?php include 'footer.php' ?>