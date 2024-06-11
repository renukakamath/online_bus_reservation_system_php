
<?php include 'adminheader.php';


if (isset($_POST['staffreg'])) {
	extract($_POST);
	$q1="select * from login where username='$uname' and password='$pwd'";
 		$res1=select($q1);
 		if (sizeof($res1)>0) {
 			alert('already exist');
 		}else{
    echo$q="insert into login values(null,'$uname','$pwd','Staff')";
     $id=insert($q);
  echo$q1="insert into staff values(null,'$id','$fname','$lname','$gen','$date','$hno','$place','$pin','$num','$email') ";
   insert($q1);
   alert('sucessfully');
   return redirect('admin_managestaff.php');
}
}

 if (isset($_GET['uid'])) {
 	extract($_GET);

 	 $q="select * from staff where staff_id='$uid'";
 	$res=select($q);

 }

 if (isset($_POST['update'])) {
 	extract($_POST);

 	$q="update staff set first_name='$fname' ,last_name='$lname',gender='$gen',dob='$date',house_name='$hno',place='$place',pincode='$pin',phone='$num',email='$email' where staff_id='$uid'";
 	update($q);
 	 alert('sucessfully');
   return redirect('admin_managestaff.php');

 }
if (isset($_GET['did'])) {
	extract($_GET);

	$q="delete from staff where staff_id='$did'";
	delete($q);
}



 ?>
<!-- Carousel Start -->
    <div class="container-fluid p-0 wow fadeIn" data-wow-delay="0.1s" >
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel" >
            <div class="carousel-inner" 
                <div class="carousel-item active" >
                    <img class="w-100" src="img/carousel-5.jpg" alt="Image" style="height: 900px"> >
                    <div class="carousel-caption" >
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
<center>
<h1 style="color: white">Manage Staff</h1>
<form method="post">
	<?php  if (isset($_GET['uid'])) { ?>
	<table class="table" style="width:500px;color: white">
		<tr>
			<th>First Name</th>
			<td><input type="text" required="" class="form-control" value="<?php echo $res[0]['first_name'] ?>" name="fname"></td>
		</tr>
		<tr>
			<th>Last Name</th>
			<td><input type="text" required="" class="form-control" value="<?php echo $res[0]['last_name'] ?>" name="lname"></td>
		</tr>
		<tr>
			<th>Gender</th>
			<td style="color: black"><input type="radio" required=""  class="btn btn-success" name="gen" value="female">Female
			<input type="radio" required="" class="btn btn-success" name="gen" value="male">male
			<input type="radio" required=""  class="btn btn-success" name="gen" value="other">Others</td>
		</tr>

			<tr>
			<th>Date</th>
			<td><input type="date" required="" class="form-control" value="<?php echo $res[0]['dob'] ?>" name="date"></td>
		</tr>
		
		<tr>
			<th>House Name</th>
			<td><textarea name="hno" required="" class="form-control"><?php echo $res[0]['house_name'] ?></textarea></td>
		</tr>


		<tr>
			<th>Place</th>
			<td><input type="text" required="" class="form-control" value="<?php echo $res[0]['place'] ?>" name="place"></td>
		</tr>

		
		<tr>
			<th>Pincode</th>
			<td><input type="text" required="" pattern="[0-9]{6}" class="form-control" value="<?php echo $res[0]['pincode'] ?>" name="pin"></td>
		<tr>
			<th>Phone</th>
			<td><input type="text" required="" pattern="[0-9]{10}" value="<?php echo $res[0]['phone'] ?>" class="form-control" name="num"></td>
		</tr>
		<tr>
			<th>Email</th>
			<td><input type="text" required="" value="<?php echo $res[0]['email'] ?>" class="form-control" name="email"></td>
		</tr>
		
		

		<td align="center" colspan="2"><input type="submit" name="update" value="submit" class="btn btn-success"></td>
	</table>
<?php }else{ ?>
	<table class="table" style="width:500px;color: white">
		<tr>
			<th>First Name</th>
			<td><input type="text" required="" class="form-control" name="fname"></td>
		</tr>
		<tr>
			<th>Last Name</th>
			<td><input type="text" required="" class="form-control" name="lname"></td>
		</tr>
		<tr>
			<th>Gender</th>
			<td style="color: black"><input type="radio" required=""  class="btn btn-success" name="gen" value="female">Female
			<input type="radio" required="" class="btn btn-success" name="gen" value="male">male
			<input type="radio" required=""  class="btn btn-success" name="gen" value="other">Others</td>
		</tr>

			<tr>
			<th>Date</th>
			<td><input type="date" required="" class="form-control" name="date"></td>
		</tr>
		
	<tr>
			<th>House Name</th>
			<td><textarea name="hno" required="" class="form-control"></textarea></td>
		</tr>


		<tr>
			<th>Place</th>
			<td><input type="text" required="" class="form-control"  name="place"></td>
		</tr>

		
		<tr>
			<th>Pincode</th>
			<td><input type="text" required="" pattern="[0-9]{6}" class="form-control"  name="pin"></td>
		<tr>
			<th>Phone</th>
			<td><input type="text" required="" pattern="[0-9]{10}"  class="form-control" name="num"></td>
		</tr>
		<tr>
			<th>Email</th>
			<td><input type="email" required=""  class="form-control" name="email"></td>
		</tr>
		
		<tr>
			<th>User Name</th>
			<td><input type="text" required="" class="form-control"  name="uname"></td>
		</tr>
		<tr>
			<th>Password</th>
			<td><input type="password" required="" class="form-control" name="pwd"></td>
		</tr>
		<td align="center" colspan="2"><input type="submit" name="staffreg" value="submit" class="btn btn-success"></td>
	</table>
<?php } ?>
</form>
</center>
 </div></div></div></div></div></div></div></div>
<center>
	<h1>view Staff</h1>
	<form>
		<table class="table" style="width: 500px">
			<tr>
				<th>sino</th>
			   <th>First Name</th>
				<th>Last Name</th>
				<th>Gender</th>
			    <th>Date</th>
			   <th>House Name</th>
				<th>Place</th>
				<th>Pincode</th>
				<th>Phone</th>
					<th>Email</th>
			
			

				
			</tr>
			<?php 

     $q="select * from staff inner join login using (login_id) ";
     $res=select($q);
     $sino=1;

    foreach ($res as $row) {?>
    	<tr>
    		<td><?php echo $sino++; ?></td>
    		<td><?php echo $row['first_name'] ?></td>
    		<td><?php echo $row['last_name'] ?></td>
    		<td><?php echo $row['dob'] ?></td>
    		<td><?php echo $row['gender'] ?></td>
    		<td><?php echo $row['house_name'] ?></td>
    	
    		<td><?php echo $row['place'] ?></td>
    		<td><?php echo $row['pincode'] ?></td>
    		<td><?php echo $row['phone'] ?></td>
    			<td><?php echo $row['email'] ?></td>
                    <td><a class="btn btn-success" href="?did=<?php echo $row['staff_id'] ?>">Delete</a></td>
    		   <td><a class="btn btn-success" href="?uid=<?php echo $row['staff_id'] ?>">Update</a></td>

    
    	</tr>
    <?php }




			 ?>
		</table>
	</form>
</center>

<?php include 'footer.php' ?>