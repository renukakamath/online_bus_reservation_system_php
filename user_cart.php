<?php include 'userheader.php';


$uid=$_SESSION['user_id'];



 $q1="SELECT * FROM `booking_master` INNER JOIN `booking_child` USING(`booking_master_id`)  INNER JOIN `bus` USING(`bus_id`) INNER JOIN route USING (route_id) INNER JOIN place ON route.`starting_place_id`=place.place_id OR route.`ending_place_id`=`place`.place_id   WHERE `user_id`='1' AND `status`='Pending' GROUP BY (booking_master_id) ";
$res1=select($q1);
$qq="SELECT *,COUNT(`booking_child_id`) AS cart_count,SUM(`amount`) AS ttamount FROM `booking_master` INNER JOIN `booking_child` USING(`booking_master_id`)  WHERE `user_id`='$uid' AND `status`='Pending'";
$rr=select($qq);

if(isset($_GET['remove_item'])){
    extract($_GET);
     $qu="UPDATE `booking_master` SET `total`=`total`-'$amount' WHERE `booking_master_id`='$bmid'";
    update($qu);
     $qd="DELETE FROM `booking_child` WHERE `bus_id`='$remove_item' AND `booking_master_id`='$bmid'";
    delete($qd);

     $g="select * from  booking_master where booking_master_id='$bmid' and total='0'";
    $hg=select($g);
    if(sizeof($hg)>0)
    {
       $j="delete from booking_master where booking_master_id='$bmid'";
        delete($j);
        
    }


    alert("Successfully Removed");
   return redirect('user_cart.php');

}


$q="select * from booking_master where status='pending'";
$res=select($q);
if (sizeof($res)>0) {
  

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
  <table class="table" style="width: 500px">
    <tr>

   <th>route name</th>
      <th> No of Seats</th>
      <th>Bus</th>
    <th>amount</th>
    <th></th>
      
    </tr>
    <?php 


            $q="SELECT * FROM `booking_child` INNER JOIN `booking_master` USING (`booking_master_id`) INNER JOIN bus USING (bus_id)INNER JOIN route USING (route_id)  WHERE `user_id`='$uid' AND `status`='Pending'";
            $res=SELECT($q);
            foreach ($res as $row) {
              ?>
              
            <tr>
              <td><?php echo $row['route_name'] ?></td>
              <td><?php echo $row['no_of_seat'] ?></td>
              <td><?php echo $row['bus_registration'] ?></td>
             
              <td><?php echo $row['amount'] ?></td>
              
               <td><a class=" btn btn-danger" type="button" href="?remove_item=<?php echo $row['bus_id']; ?>&bmid=<?php echo $row['booking_master_id']; ?>&amount=<?php echo $row['amount']; ?>"/>cancel Now</td>
              
            
</tr>


               


                   



<?php  
}
}else{?>

<h1 align="center">No Bookings</h1>


<?php }
     ?>
 

      <?php 
    if (sizeof($res)>0) {?>
     <td align="center" colspan="9"><a class=" btn btn-success"  href="user_makepayment3.php?amt=<?php echo $row['amount'] ?>&omid=<?php echo $row['booking_master_id'] ?>&qty=<?php echo $row['no_of_seat'] ?>&amt=<?php echo $row['total'] ?>&bid=<?php echo $row['bus_id'] ?>">Book Now</a>Total:<?php echo $row['total'] ?></td>
   <?php   }




 ?>


      </table>
</center>

            
        
 

<?php include 'footer.php' ?>