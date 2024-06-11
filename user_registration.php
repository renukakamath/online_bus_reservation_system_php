<?php include 'publicheader.php' ;

if (isset($_POST['registration'])) {
	extract($_POST);
	$r="select * from login where username='$uname' and password='$pwd'";
	$re=select($r);
     if (sizeof($re)>0) {
     	alert('already exist');
     }else{
	echo $q1="insert into login values(null,'$uname','$pwd','Users')";
	$id=insert($q1);
	echo$q2="insert into users values(null,'$id','$fname','$lname','$gender','$date','$address','$place','$pincode','$number','$email')";
	insert($q2);
  alert('  Successfully');
  return redirect('user_registration.php');

}

}

?>
<!-- Carousel Start -->
    <div class="container-fluid p-0 wow fadeIn" data-wow-delay="0.1s" >
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel" >
            <div class="carousel-inner" 
                <div class="carousel-item active" >
                    <img class="w-100" src="img/carousel-4.jpg" alt="Image" style="height: 900px"> >
                    <div class="carousel-caption" >
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
<center>
<h1 style="color: white">User Registration</h1>
	<form method="post">
		<table class="table" style="width: 400px;color: white" >
			<tr>
				<th>First Name</th>
				<td style="color: black"><input type="text"  required="" class="form-control" name="fname"></td>
			</tr>
			<tr>
				<th>Last Name</th>
				<td style="color: black"><input type="text" required="" class="form-control" name="lname"></td>
			</tr>
			<tr>
				<th>Gender</th>
				<td style="color: black"><input type="radio" required="" name="gender" value="male">Male
			    <input type="radio" name="gender" value="female">Female</td>
			</tr>
			<tr>
				<th>Date Of Birth</th>
				<td style="color: black"><input type="date" required="" class="form-control" name="date"></td>
			</tr>
			<tr>
				<th>Address</th>
				<td style="color: black"><textarea name="address" required="" class="form-control"></textarea></td>
			</tr>
			<tr>
				<th>Place</th>
				<td style="color: black"><input type="place" required="" class="form-control" name="place"></td>
			</tr>
			<tr>
				<th>Pincode</th>
				<td style="color: black"><input type="text" required="" pattern="[0-9]{6}" class="form-control" name="pincode"></td>
			</tr>
			<tr>
				<th>Phone No:</th>
				<td style="color: black"><input type="text" required="" pattern="[0-9]{10}" class="form-control" name="number"></td>
			</tr>
			<tr>
				<th>Email</th>
				<td  style="color: black"><input type="email"  class="form-control" required="" name="email"></td>
			</tr>
			<tr>
				<th>User Name</th>
				<td style="color: black"><input type="text" required="" class="form-control" name="uname"></td>
			</tr>
			<tr>
				<th>Password</th>
				<td style="color: black"><input type="Password" required="" class="form-control" name="pwd"></td>
			</tr>
			
			<tr>
				<td align="center" colspan="2"><input type="submit" name="registration" value="submit" class="btn btn-success" class="btn btn-success"></td>
			</tr>
		</table>
	</form>
</center>
</div></div></div></div></div></div></div></div>

<?php include 'footer.php' ?>