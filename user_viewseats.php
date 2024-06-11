
<?php include 'userheader.php' ?>
<!-- Carousel Start -->
    <div class="container-fluid p-0 wow fadeIn" data-wow-delay="0.1s" >
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel" >
            <div class="carousel-inner" 
                <div class="carousel-item active" >
                    <img class="w-100" src="img/carousel-5.jpg" alt="Image" style="height: 200px"> >
                    <div class="carousel-caption" >
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                     </div></div></div></div></div></div></div></div>
<center>
	<h1>View Seats</h1>
	<table class="table" style="width: 500px;color: black">
		<tr>
			<th>Sl NO:</th>
            <th>Starting Place</th>
            <th>Ending Place</th>
			<th>Bus</th>
			<th>Seats</th>
			
		</tr>
		<?php 
         $q="SELECT *,p1.place_name AS sp,p2.place_name AS ep FROM `seats` INNER JOIN bus USING (bus_id) INNER JOIN route r USING (route_id) INNER JOIN `fares` ON `fares`.route_id=r.route_id  ,`place` p1,place p2  WHERE bus_id='$bid' AND r.`starting_place_id`=p1.`place_id` AND r.`ending_place_id`=p2.`place_id` GROUP BY (bus_id)";
         $res=select($q);
         $sino=1;
         foreach ($res as $row) {
         	?>
         	<tr>
         		<td><?php echo $sino++; ?></td>
                <td><?php echo $row['sp'] ?></td>
                <td><?php echo $row['ep'] ?></td>
         		<td><?php echo $row['bus_registration'] ?></td>
         		<td><?php echo $row['seat_number'] ?></td>
         		
               <?php 
                  if ($row['seat_number']>0) {
                    ?>
                     
                 <td><a class="btn btn-success" href="user_bookingchild.php?bid=<?php echo $row['bus_id'] ?>&seat=<?php echo $row['seat_id'] ?>&aid=<?php echo $row['amount_per_seat'] ?>&sp=<?php echo $row['sp'] ?>&ep=<?php echo $row['ep'] ?>&spid=<?php echo $row['starting_place_id'] ?>&epid=<?php echo $row['ending_place_id'] ?>&seat=<?php echo $row['seat_number'] ?>">Booking Seat</a></td>
                 <?php  }


                ?>
             
      
               
         	</tr>
         <?php
     }



		 ?>
	</table>
</center>
<?php include 'footer.php' ?>