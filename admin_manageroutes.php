<?php include 'adminheader.php' ;
extract($_GET);
if (isset($_POST['route'])) {
	extract($_POST);
	echo$q="insert into route values(null,'$rname','$sid','$eid')";
	insert($q);
	alert('  Successfully');
  return redirect('admin_manageroutes.php');
}
if (isset($_GET['did'])) {
	extract($_GET);
	$q="delete from route where route_id='$did'";
	delete($q);
	alert('  Successfully');
  return redirect('admin_manageroutes.php');
}
if (isset($_GET['uid'])) {
	extract($_GET);
	$q="SELECT *,p1.place_name AS sp,p2.place_name AS ep FROM route r,`place` p1,place p2 WHERE r.`starting_place_id`=p1.`place_id` AND r.`ending_place_id`=p2.`place_id` AND route_id='$uid';
";
	$res=select($q);
}
if (isset($_POST['update'])) {
	extract($_POST);
    $q="update route set  route_name='$rname',starting_place_id='$sid',ending_place_id='$eid' where route_id='$uid'";
	update($q);
	alert('  Successfully');
  return redirect('admin_manageroutes.php');

}



?>
<!-- Carousel Start -->
    <div class="container-fluid p-0 wow fadeIn" data-wow-delay="0.1s" >
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel" >
            <div class="carousel-inner" 
                <div class="carousel-item active" >
                    <img class="w-100" src="img/carousel-4.jpg" alt="Image" style="height: 700px"> >
                    <div class="carousel-caption" >
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
<center>
	<h1 style="color: white">Manage Routes</h1>
	<form  method="post">
		<?php if (isset($_GET['uid'])) { ?>
		<table class="table" style="width: 500px;color: white">
			<tr>
				<th>Starting Place</th>
				<td  style="color: black">
					<select name="sid" class="form-control" required="">
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
				<th>Ending Place</th>
				<td  style="color: black">
					<select name="eid" class="form-control" required="">
						<option value="<?php echo $res[0]['place_id'] ?>"><?php echo $res[0]['place_name'] ?></option>
					<option>select</option>
					<?php 

                     $q="select * from place";
                     $m=select($q);
                     foreach ($m as $row) {
                     	?>
                     <option value="<?php echo $row['place_id'] ?>"><?php echo $row['place_name'] ?></option>
                   <?php
                    }

					 ?>
				</select>
			</td>
			</tr>
              
			<tr>
				<th>Route Name</th>
				<td style="color: black"><input type="text" name="rname" required="" class="form-control" value="<?php echo $res[0]['route_name'] ?>"></td>
			</tr>
		

			<tr>
				<th align="center" colspan="2"><input type="submit" name="update" value="submit" class="btn btn-success"></th>
			</tr>
		</table>
	<?php }else{ ?>
		<table class="table" style="width: 500px;color: white">
			<tr>
				<th>Starting Place</th>
				<td  style="color: black">
					<select name="sid" class="form-control" required="">
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
				<th>Ending Place</th>
				<td  style="color: black">
					<select name="eid" class="form-control" required="">
					<option>select</option>
					<?php 

                     $q="select * from place";
                     $m=select($q);
                     foreach ($m as $row) {
                     	?>
                     <option value="<?php echo $row['place_id'] ?>"><?php echo $row['place_name'] ?></option>
                   <?php 
               }

					 ?>
				</select>
			</td>
			</tr>
			<tr>
				<th>Route Name</th>
				<td style="color: black"><input type="text" class="form-control" required="" name="rname" ></td>
			</tr>
			
			<tr>
				<th align="center" colspan="2"><input type="submit" name="route" value="submit" class="btn btn-success"></th>
			</tr>
		</table>
	<?php } ?>
	</form>
</center>
 </div></div></div></div></div></div></div></div>
<center>
	<h1>View Routes</h1>
	<table class="table" style="width: 500px;color: black">
		<tr>
			<th>Sl NO:</th>
			<th>Starting Place</th>
			<th>Ending Place</th>
			<th>Route Name</th>
			
		</tr>
		<?php 
         $q="SELECT *,p1.place_name as sp,p2.place_name as ep FROM route r,`place` p1,place p2 WHERE r.`starting_place_id`=p1.`place_id` AND r.`ending_place_id`=p2.`place_id`";
         $res=select($q); 
         $slno=1;
         foreach ($res as $row) {
         	?>
         	<tr>
         		<td><?php echo $slno++; ?></td>
         		<td><?php echo $row['sp'] ?></td>
         		<td><?php echo $row['ep'] ?></td>
         		<td><?php echo $row['route_name'] ?></td>
         		<td><a class="btn btn-success" href="?uid=<?php echo $row['route_id'] ?>">update</a></td>
         		<td><a class="btn btn-success" href="?did=<?php echo $row['route_id'] ?>">delete</a></td>
         		<td><a class="btn btn-success" href="admin_managestops.php?rid=<?php echo $row['route_id'] ?>">Manage Stop</a></td>
         		<td><a class="btn btn-success" href="admin_managefares.php?rid=<?php echo $row['route_id'] ?>">Manage Fares</a></td>
         	</tr>
         <?php
     }



		 ?>
	</table>
</center>
<?php include 'footer.php' ?>