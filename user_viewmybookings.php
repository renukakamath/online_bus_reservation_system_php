<?php include 'userheader.php'
 ?>
<!-- Carousel Start -->
    <div class="container-fluid p-0 wow fadeIn" data-wow-delay="0.1s" >
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel" >
            <div class="carousel-inner" 
                <div class="carousel-item active" >
                    <img class="w-100" src="img/carousel-3.jpg" alt="Image" style="height: 200px"> >
                    <div class="carousel-caption" >
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                   </div></div></div></div></div></div></div></div>
<center>
  <h1 class="display-3 text-black mb-4 pb-3 animated slideInDown">View Bookings</h1>
  <table class="table" style="width: 500px;color: black">
    <tr>

    <th>route name</th>
      <th> No of Seats</th>
      <th>Bus</th>
    <th>amount</th>
   
      
    </tr>
    <?php 


            $q="SELECT * FROM `booking_child` INNER JOIN `booking_master` USING (`booking_master_id`) INNER JOIN bus USING (bus_id)INNER JOIN route USING (route_id)  WHERE `user_id`='$uid' AND `status`='paid'";
            $res=SELECT($q);
            foreach ($res as $row) {
              ?>
              
            <tr>
             <td><?php echo $row['route_name'] ?></td>
              <td><?php echo $row['no_of_seat'] ?></td>
              <td><?php echo $row['bus_registration'] ?></td>
             
              <td><?php echo $row['amount'] ?></td>


                     <td><a class="btn btn-success" href="mybookings.php?bid=<?php echo $row['booking_child_id'] ?>&bmid=<?php echo $row['booking_master_id'] ?>">Download</a></td>
    <td><a class="btn btn-success" href="user_cancelticket.php?bid=<?php echo $row['booking_child_id'] ?>&bmid=<?php echo $row['booking_master_id'] ?>">Cancel Ticket</a></td> 
              
            <?php } ?>  
            </tr>
		
	</table>
</center>

<?php include 'footer.php' ?>