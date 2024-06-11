<?php include 'adminheader.php' ?>
<!-- Carousel Start -->
    <div class="container-fluid p-0 wow fadeIn" data-wow-delay="0.1s" >
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel" >
            <div class="carousel-inner" 
                <div class="carousel-item active" >
                    <img class="w-100" src="img/carousel-1.jpg" alt="Image" style="height: 200px"> >
                    <div class="carousel-caption" >
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
 </div></div></div></div></div></div></div></div>
<center>
	<h1>View Users</h1>
	<table class="table" style="width: 500px;color: black">
		<tr>
			<th>Sl NO:</th>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Gender</th>
		    <th>Date Of Birth </th>
          <th>Address</th>
          <th>Place</th>
          <th>Pincode </th>
          <th>Phone</th>
          <th>Email</th>
			
		</tr>
		<?php 
         $q="select * from users ";
         $res=select($q);
         $sino=1;
         foreach ($res as $row) {
         	?>
         	<tr>
         		<td><?php echo $sino++; ?></td>
         		<td><?php echo $row['first_name'] ?></td>
         		<td><?php echo $row['last_name'] ?></td>
               <td><?php echo $row['gender'] ?></td>
               <td><?php echo $row['dob'] ?></td>
               <td><?php echo $row['house_name'] ?></td>
               <td><?php echo $row['place'] ?></td>
               <td><?php echo $row['pincode'] ?></td>
         		<td><?php echo $row['phone'] ?></td>
         		<td><?php echo $row['email'] ?></td>

         		
         		
         	</tr>
         <?php
     }



		 ?>
	</table>
</center>
<?php include 'footer.php' ?>