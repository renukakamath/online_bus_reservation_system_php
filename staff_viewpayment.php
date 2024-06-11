<?php include 'staff_header.php';
extract($_GET);


 ?>
<!-- Carousel Start -->
    <div class="container-fluid p-0 wow fadeIn" data-wow-delay="0.1s" >
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel" >
            <div class="carousel-inner" 
                <div class="carousel-item active" >
                    <img class="w-100" src="img/carousel-2.jpg" alt="Image" style="height: 200px"> >
                    <div class="carousel-caption" >
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                     </div></div></div></div></div></div></div></div>
<center>
    <h1>View Payment</h1>
    <table class="table" style="width: 500px;color: black">
        <tr>
            <th>Sl NO:</th>
            <th>User</th>
            <th>Type</th>
            <th>date & time</th>
            <th>Status</th>
        
            
        </tr>
        <?php 
         $q="SELECT * FROM payment inner join users using (user_id) INNER JOIN booking_master ON `booking_master`.`booking_master_id`=`payment`.`booking_id`   WHERE `payment`.user_id='$uid'";
         $res=select($q);
         $sino=1;
         foreach ($res as $row) {
            ?>
            <tr>
                <td><?php echo $sino++; ?></td>
                <td><?php echo $row['first_name'] ?></td>
                <td><?php echo $row['type'] ?></td>
               <td><?php echo $row['date_time'] ?></td>
               
               <td><?php echo $row['status'] ?></td>
              

                
                
            </tr>
         <?php
     }



         ?>
    </table>
</center>

<?php include 'footer.php' ?>