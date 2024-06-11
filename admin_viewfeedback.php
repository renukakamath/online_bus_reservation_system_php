<?php include 'adminheader.php' ?>
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
	<h1>View Feedbacks </h1>
	<table class="table" style="width: 500px;color: black">
		<tr>
			<th>Sl NO:</th>
			<th>Users</th>
			<th>Feedbacks</th>
			<th>Date & Time</th>
		   
         
			
		</tr>
		<?php 
         $q="select * from feedback inner join users using (user_id)";
         $res=select($q);
         $sino=1;
         foreach ($res as $row) {
         	?>
         	<tr>
         		<td><?php echo $sino++; ?></td>
         		<td><?php echo $row['first_name'] ?></td>
         		<td><?php echo $row['feedback_desc'] ?></td>
               <td><?php echo $row['date_time'] ?></td>
               
             
         		
         		
         	</tr>
         <?php
     }



		 ?>
	</table>
</center>

<?php include 'footer.php' ?>