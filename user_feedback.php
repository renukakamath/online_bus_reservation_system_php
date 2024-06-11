<?php include 'userheader.php';
$uid=$_SESSION['user_id'];
extract($_GET);
if (isset($_POST['feedback'])) {
	extract($_POST);

	$q="insert into feedback values(null,'$uid','$fee',curdate())";
	insert($q);
	alert('  Successfully');
  return redirect('user_feedback.php');
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
	<h1 style="color: white">Send Feedbacks</h1>
	<form method="post">
		
		<table class="table" style="width: 500px;color: white">
			<tr>
				<th>Feedback</th>
				<td style="color: black"><input type="text" required="" class="form-control" name="fee" ></td>
			</tr>
		

			<tr>
				<th align="center" colspan="2"><input type="submit" name="feedback" value="submit" class="btn btn-success"></th>
			</tr>
		</table>
	</form>
</center>
 </div></div></div></div></div></div></div></div>
<center>
	<h1>View reply</h1>
	<table class="table" style="width: 500px;color: black">
		<tr>
			<th>Slno</th>
			
			<th>Feedback</th>
			<th>Date Time</th>
		</tr>
		<?php 
		$q="select * from feedback inner join users using (user_id) where user_id='$uid'";
		$res=select($q);
		$slno=1;
		foreach ($res as $row) {
			?>
			<tr>
				<td><?php echo $slno++ ?></td>
				<td><?php echo $row['feedback_desc'] ?></td>
				<td><?php echo $row['date_time'] ?></td>

			</tr>
		<?php 
	}

		 ?>
	</table>
</center>

<?php include 'footer.php' ?>