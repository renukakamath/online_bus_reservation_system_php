<?php include 'userheader.php' ?>

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
<h1 style="color: white">Search Bus</h1>
<form method="post">
	<table class="table" style="width: 500px;color: white">
		<tr>
			<th>Route</th>
			<td style="color: black"><input type="text"  required="" name="fn" class="form-control"></td>
		</tr>
		<tr ><th align="center" colspan="2"><input type="submit" name="bus" value="submit" class="btn btn-success"></th></tr>
	</table>
</form>
</center>
<center>

     </div></div></div></div></div></div></div></div>
    <br><br>
    <center>
<h1>View Bus</h1>
<form method="post">
	<table class="table" style="width: 500px;color: black">
		  <tr>
            <th>Sl No:</th>
            <th>route</th>
            <th>Bus Registration</th>
            <th>Driver Name</th>
            <th>Phone No</th>
            
            <th>Model</th>
        </tr>
		<?php 
    if (isset($_POST['bus'])) {
        extract($_POST);


  $q="SELECT * FROM bus inner join route using(route_id) WHERE route_name  LIKE '$fn%'";
}
    else{
    $q="select * from bus inner join route using(route_id)";}
    $res=select($q);
     $sino=1;
    foreach ($res as $row) {
    	?>
    	<tr>
                <td><?php echo $sino++; ?></td>
                <td><?php echo $row['route_name'] ?></td>
                <td><?php echo $row['bus_registration'] ?></td>
                <td><?php echo $row['drive_name'] ?></td>
                <td><?php echo $row['phone_no'] ?></td>
                
                <td><?php echo $row['model'] ?></td>
               <td><a class="btn btn-success" href="user_viewseats.php?bid=<?php echo $row['bus_id'] ?>&rid=<?php echo $row['route_id'] ?>">View Seats</a></td>
            </tr>
    	
   <?php
}


		 ?>
	</table>
</form>
</center>
<?php include 'footer.php' ?>