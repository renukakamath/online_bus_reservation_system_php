<?php include 'adminheader.php' ;
extract($_GET);
if (isset($_POST['stop'])) {
	extract($_POST);
	echo$q="insert into stops values(null,'$pla','$rid','$arriving','$departure')";
	insert($q);
	alert('  Successfully');
  return redirect("admin_managestops.php?rid=$rid");
}
if (isset($_GET['did'])) {
	extract($_GET);
	$q="delete from stops where stop_id='$did'";
	delete($q);
	alert('  Successfully');
  return redirect("admin_managestops.php?rid=$rid");
}
if (isset($_GET['uid'])) {
	extract($_GET);
	$q="select * from stops inner join place using (place_id) where stop_id='$uid'";
	$res=select($q);
}
if (isset($_POST['update'])) {
	extract($_POST);
    $q="update stops set place_id='$pla',arriving_date_time='$arriving',departure_date_time='$departure' where stop_id='$uid' and route_id='$rid'";
	update($q);
	alert('  Successfully');
  return redirect("admin_managestops.php?rid=$rid");

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
	<h1 style="color: white">Manage Stops</h1>
	<form  method="post">
		<?php if (isset($_GET['uid'])) { ?>
		<table class="table" style="width: 500px;color: white">
			<tr>
			    <th>Place</th>
			    <td  style="color: black">
			    	<select name="pla" class="form-control" required="">
			    		<option value="<?php echo $res[0]['place_id'] ?>"><?php echo $res[0]['place_name'] ?></option>
			    	<option>select</option>
			    	<?php 

                     $q="select * from place";
                     $r=select($q);
                     foreach ($r as $row) {
                     	?>
                     	<option value="<?php echo $row['place_id'] ?>"><?php echo $row['place_name'] ?></option>
                    <?php 
                     }


			    	 ?>
			    </select>
			</td>
			</tr>
			<tr>
				<th>Arriving date&time</th>
				<td style="color: black"><input type="datetime-local" required="" name="arriving" class="form-control" value="<?php echo $res[0]['arriving_date_time'] ?>"></td>
			</tr>
			<tr>
				<th>Departure date&time</th>
				<td style="color: black"><input type="datetime-local" required="" name="departure" class="form-control" value="<?php echo $res[0]['departure_date_time'] ?>"></td>
			</tr>


			<tr>
				<th align="center" colspan="2"><input type="submit" name="update" value="submit" class="btn btn-success"></th>
			</tr>
		</table>
	<?php }else{ ?>
		<table class="table" style="width: 500px;color: white">
			<tr>
			    <th>Place</th>
			    <td  style="color: black">
			    	<select name="pla" class="form-control" required="">
			    	<option>select</option>
			    	<?php 

                     $q="select * from place";
                     $res=select($q);
                     foreach ($res as $row) {
                     	?>
                     	<option value="<?php echo $row['place_id'] ?>"><?php echo $row['place_name'] ?></option>
                    <?php 
                     }


			    	 ?>
			    </select>
			</td>
			</tr>
			<tr>
				<th>Arriving date&time</th>
				<td style="color: black"><input type="datetime-local" required="" class="form-control" name="arriving" ></td>
			</tr>
			<tr>
				<th>Departure date&time</th>
				<td style="color: black"><input type="datetime-local"  required=""class="form-control" name="departure" ></td>
			</tr>
			<tr>
				<th align="center" colspan="2"><input type="submit" name="stop" value="submit" class="btn btn-success"></th>
			</tr>
		</table>
	<?php } ?>
	</form>
</center>
 </div></div></div></div></div></div></div></div>
<center>
	<h1>View Stops</h1>
	<table class="table" style="width: 500px;color: black">
		<tr>
			<th>Sl NO:</th>
			<th>Place</th>
			<th>Route</th>
			<th>Arriving</th>
			<th>Departure</th>
		</tr>
		<?php 
         $q="select * from stops inner join place using(place_id) inner join route using (route_id) where route_id='$rid' ";
         $res=select($q);
         $sino=1;
         foreach ($res as $row) {
         	?>
         	<tr>
         		<td><?php echo $sino++; ?></td>
         		<td><?php echo $row['place_name'] ?></td>
         		<td><?php echo $row['route_name'] ?></td>
         		<td><?php echo $row['arriving_date_time'] ?></td>
         		<td><?php echo $row['departure_date_time'] ?></td>
         		<td><a class="btn btn-success" href="?uid=<?php echo $row['stop_id'] ?>&rid=<?php echo $row['route_id'] ?>">update</a></td>
         		<td><a class="btn btn-success" href="?did=<?php echo $row['stop_id'] ?>&rid=<?php echo $row['route_id'] ?>">delete</a></td>
         	</tr>
         <?php
     }



		 ?>
	</table>
</center>
<?php include 'footer.php' ?>