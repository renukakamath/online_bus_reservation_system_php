<?php include 'adminheader.php';



if (isset($_POST['bus'])) {
	extract($_POST);
	$r="select * from bus where bus_registration='$breg'";
	$re=select($r);
	if (sizeof($re)>0) {
		alert('already exist');
	}else{
	$q="insert into bus values(null,'$breg','$driver','$phone','$year','$model','$latitude','$route')";
	insert($q);
	alert(' Successfully');
  return redirect('admin_managebus.php');
}
}
if (isset($_GET['did'])) {
	extract($_GET);
	$q="delete from bus where bus_id='$did'";
	delete($q);
	alert('  Successfully');
  return redirect('admin_managebus.php');
}
if (isset($_GET['uid'])) {
	extract($_GET);
	$q="select * from bus inner join route using(route_id) where bus_id='$uid'";
	$res=select($q);
}
if (isset($_POST['update'])) {
	extract($_POST);
	$q="update bus set bus_registration='$breg',drive_name='$driver',phone_no='$phone',manufacturing_year='$year',model='$model',route_id='$route' where bus_id='$uid'";
	update($q);
	alert('  Successfully');
  return redirect('admin_managebus.php');

}

 ?>
<!-- Carousel Start -->
    <div class="container-fluid p-0 wow fadeIn" data-wow-delay="0.1s" >
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel" >
            <div class="carousel-inner" 
                <div class="carousel-item active" >
                    <img class="w-100" src="img/carousel-1.jpg" alt="Image" style="height: 700px"> >
                    <div class="carousel-caption" >
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
<center>
	<h1 style="color: white">Manage Bus Details</h1>
	<form method="post">
		<?php if (isset($_GET['uid'])) { ?>
		<table class="table" style="width: 500px;color: white">
			<tr>
				<th>Route</th>
				<td  style="color: black">
					<select name="route" required="" class="form-control">
						<option value="<?php echo $res[0]['route_id'] ?>"><?php echo $res[0]['route_name'] ?></option>
						<option>select</option>
						<?php 

                       $q="select * from route";
                       $r=select($q);
                       foreach ($r as $row) {
                       	?>
                       <option value="<?php echo $row['route_id'] ?>"><?php echo $row['route_name'] ?></option>
                       <?php
                   }


						 ?>
					</select>
				</td>
			</tr>
			<tr>
				<th>Bus Registration</th>
				<td style="color: black"><input type="text" required=""value="<?php echo $res[0]['bus_registration'] ?>" class="form-control" name="breg"></td>
			</tr>
			<tr>
				<th>Driver Name</th>
				<td style="color: black"><input type="text" required="" value="<?php echo $res[0]['drive_name'] ?>" class="form-control" name="driver"></td>
			</tr>
			<tr>
				<th>Phone No:</th>
				<td style="color: black"><input type="text" required="" pattern="[0-9]{10}" value="<?php echo $res[0]['phone_no'] ?>" class="form-control" name="phone"></td>
			</tr>
			<tr>
				<th>Manufacturing Year</th>
				<td style="color: black"><input type="text" required=""  value="<?php echo $res[0]['manufacturing_year'] ?>" class="form-control" name="year"></td>
			</tr>
			
			<tr>
				<th>Model</th>
				<td style="color: black"><input type="text" required="" value="<?php echo $res[0]['model'] ?>" class="form-control" name="model"></td>
			</tr>
			<tr>
				<th align="center" colspan="2"><input type="submit" name="update" value="submit" class="btn btn-success"></th>
			</tr>
		</table>
	<?php }else{ ?>
		<table class="table" style="width: 500px;color: white">
			<tr>
				<th>Route</th>
				<td  style="color: black"> 
					<select name="route" class="form-control" required="">
						<option>select</option>
						<?php 

                       $q="select * from route";
                       $res=select($q);
                       foreach ($res as $row) {
                       	?>
                       <option value="<?php echo $row['route_id'] ?>"><?php echo $row['route_name'] ?></option>
                       <?php
                   }


						 ?>
					</select>
				</td>
			</tr>
			<tr>
				<th>Bus Registration</th>
				<td style="color: black"><input type="text" required="" class="form-control" name="breg"></td>
			</tr>
			<tr>
				<th>Driver Name</th>
				<td style="color: black"><input type="text" required="" class="form-control" name="driver"></td>
			</tr>
			<tr>
				<th>Phone No:</th>
				<td style="color: black"><input type="text" required="" pattern="[0-9]{10}" class="form-control" name="phone"></td>
			</tr>
			<tr>
				<th>Manufacturing Year</th>
				<td style="color: black"><input type="text" required="" class="form-control" name="year"></td>
			</tr>
			<tr>
				<th>latitude</th>
				<td style="color: black"><input type="text" required="" class="form-control" name="latitude"></td>
			</tr>
			<tr>
				<th>Model</th>
				<td style="color: black"><input type="text" required="" class="form-control" name="model"></td>
			</tr>
			<tr>
				<th align="center" colspan="2"><input type="submit" name="bus" value="submit" class="btn btn-success"></th>
			</tr>
		</table>
	<?php } ?>
	</form>
</center>
 </div></div></div></div></div></div></div></div>
<center>
	<h1>View Bus</h1>
	<table class="table" style="width: 500px;color: black">
		<tr>
			<th>Sl No:</th>
			<th>route</th>
			<th>Bus Registration</th>
			<th>Driver Name</th>
			<th>Phone No</th>
			<th>Manufacturing Year</th>
			<th>latitude</th>
			<th>Model</th>
		</tr>
		<?php 

        $q="select * from bus inner join route using (route_id)";
        $res=select($q);
        $slno=1;
        foreach ($res as $row) {
        	?>
        	<tr>
        		<td><?php echo $slno++; ?></td>
        		<td><?php echo $row['route_name'] ?></td>
        		<td><?php echo $row['bus_registration'] ?></td>
        		<td><?php echo $row['drive_name'] ?></td>
        		<td><?php echo $row['phone_no'] ?></td>
        		<td><?php echo $row['manufacturing_year'] ?></td>
        		<td><?php echo $row['latitude'] ?></td>
        		<td><?php echo $row['model'] ?></td>
        		<td><a class="btn btn-success" href="?did=<?php echo $row['bus_id'] ?>">delete</a></td>
        		<td><a  class="btn btn-success"href="?uid=<?php echo $row['bus_id'] ?>">update</a></td>
        		<td><a  class="btn btn-success"href="admin_manageseats.php?bid=<?php echo $row['bus_id'] ?>">Manage Seats</a></td>
        	</tr>
       <?php
   }

		 ?>
	</table>
</center>
<?php include 'footer.php' ?>