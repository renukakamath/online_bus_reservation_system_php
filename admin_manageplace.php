<?php include 'adminheader.php' ;

if (isset($_POST['place'])) {
	extract($_POST);
	$r="select * from place where place_name='$pla'";
	$re=select($r);
	if (sizeof($re)>0) {
		alert('already exist');
	}else{
	$q="insert into place values(null,'$pla')";
	insert($q);
	alert('  Successfully');
  return redirect('admin_manageplace.php');
}
}
if (isset($_GET['did'])) {
	extract($_GET);
	$q="delete from place where place_id='$did'";
	delete($q);
	alert('  Successfully');
  return redirect('admin_manageplace.php');
}
if (isset($_GET['uid'])) {
	extract($_GET);
	$q="select * from place where place_id='$uid'";
	$res=select($q);
}
if (isset($_POST['update'])) {
	extract($_POST);
	$q="update place set place_name='$pla' where place_id='$uid'";
	update($q);
	alert('  Successfully');
  return redirect('admin_manageplace.php');

}



?>
<!-- Carousel Start -->
    <div class="container-fluid p-0 wow fadeIn" data-wow-delay="0.1s" >
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel" >
            <div class="carousel-inner" 
                <div class="carousel-item active" >
                    <img class="w-100" src="img/carousel-3.jpg" alt="Image" style="height: 500px"> >
                    <div class="carousel-caption" >
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
<center>
	<h1 style="color: white">Manage Place</h1>
	<form  method="post">
		<?php if (isset($_GET['uid'])) { ?>
		<table class="table" style="width: 500px;color: white">
			<tr>
				<th>Place Name</th>
				<td style="color: black"><input type="text" name="pla" required="" class="form-control" value="<?php echo $res[0]['place_name'] ?>"></td>
			</tr>
			<tr>
				<th align="center"colspan="2"><input type="submit" name="update" value="place" class="btn btn-success"></th>
			</tr>
		</table>
	<?php }else{ ?>
		<table class="table" style="width: 500px;color: white">
			<tr>
				<th>Place Name</th>
				<td style="color: black"><input type="text" required="" class="form-control" name="pla"></td>
			</tr>
			<tr>
				<th align="center" colspan="2"><input type="submit" name="place" value="submit" class="btn btn-success"></th>
			</tr>
		</table>
	<?php } ?>
	</form>
</center>
 </div></div></div></div></div></div></div></div>
<br><br><br>
<center>
	<h1>View Place</h1>
	<table class="table" style="width: 500px;color: black">
		<tr>
			<th>Sl NO:</th>
			<th>Place Name</th>
		</tr>
		<?php 
         $q="select * from place";
         $res=select($q);
         $slno=1;
         foreach ($res as $row) {
         	?>
         	<tr>
         		<td><?php echo $slno++; ?></td>
         		<td><?php echo $row['place_name'] ?></td>
         		<td><a class="btn btn-success" href="?uid=<?php echo $row['place_id'] ?>">update</a></td>
         		<td><a class="btn btn-success" href="?did=<?php echo $row['place_id'] ?>">delete</a></td>
         	</tr>
         <?php
     }



		 ?>
	</table>
</center>
<?php include 'footer.php' ?>