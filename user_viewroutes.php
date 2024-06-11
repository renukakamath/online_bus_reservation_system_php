<?php include 'userheader.php' ?>
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
	<h1>View Routes</h1>
	<table class="table" style="width: 500px;color: black">
		<tr>
			<th>Sl NO:</th>
			<th>Starting Place</th>
			<th>Ending Place</th>
			<th>Route Name</th>
			
		</tr>
		<?php 
         $q="SELECT *,p1.place_name as sp,p2.place_name as ep FROM route r,`place` p1,place p2 WHERE r.`starting_place_id`=p1.`place_id` AND r.`ending_place_id`=p2.`place_id` ";
         $res=select($q);
         $sino=1;
         foreach ($res as $row) {
         	?>
         	<tr>
         		<td><?php echo $sino++; ?></td>
         		<td><?php echo $row['sp'] ?></td>
         		<td><?php echo $row['ep'] ?></td>
         		<td><?php echo $row['route_name'] ?></td>
          </tr>
         <?php
     }



		 ?>
	</table>
</center>
<?php include 'footer.php' ?>