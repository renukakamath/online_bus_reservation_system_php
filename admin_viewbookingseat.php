<?php include 'adminheader.php';

if (isset($_GET['uid'])) {
  extract($_GET);
 $q="update seats set seat_status='accept' where seat_id='$uid'";
  update($q);
}
if (isset($_GET['did'])) {
 extract($_GET);
 $q="update seats set seat_status='reject' where seat_id='$did'";
 update($q);
}




 ?>

<!-- Carousel Start -->
    <div class="container-fluid p-0 wow fadeIn" data-wow-delay="0.1s" >
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel" >
            <div class="carousel-inner" 
                <div class="carousel-item active" >
                    <img class="w-100" src="img/carousel-4.jpg" alt="Image" style="height: 200px"> >
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
      <th>Bus</th>
      <th>Seats</th>
      <th>Seat Status</th>
    </tr>
    <?php 
         $q="select * from seats inner join bus using(bus_id)";
         $res=select($q);
         $sino=1;
         foreach ($res as $row) {
          ?>
          <tr>
            <td><?php echo $sino++; ?></td>
            <td><?php echo $row['bus_registration'] ?></td>
            <td><?php echo $row['seat_number'] ?></td>
            
                <?php 

                if ($row['seat_status']=="pending") {
                    ?>
               <td><a class="btn btn-success" href="?uid=<?php echo $row['seat_id'] ?>">Accept</a></td>
               <td><a class="btn btn-success" href="?did=<?php echo $row['seat_id'] ?>">Reject</a></td>
              <?php 
               }else{

                 ?>
               <td><?php echo $row['seat_status'] ?></td>
          </tr>
         <?php
     }

}

     ?>
  </table>
</center>

<?php include 'footer.php' ?>