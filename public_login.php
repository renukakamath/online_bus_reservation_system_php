<?php include 'publicheader.php' ;
if (isset($_POST['login'])) {
	extract($_POST);
	$q="select * from login where username='$uname' and password='$pwd'";
	$res=select($q);
	if (sizeof($res)>0) 
	{
		$_SESSION['login_id']=$res[0]['login_id'];
		$lid=$_SESSION['login_id'];

		if ($res[0]['usertype']=="admin")
		 {
			return redirect('admin_home.php');
		}
		elseif($res[0]['usertype']=="Users")
		{
             $q="select * from users where login_id='$lid'";
             $res=select($q);
             if ($res>0)
              {
             	$_SESSION['user_id']=$res[0]['user_id'];
             	$uid=$_SESSION['user_id'];
             }

			return redirect('user_home.php');

		}elseif($res[0]['usertype']=="Staff")
		{
             $q="select * from staff where login_id='$lid'";
             $res1=select($q);
             if ($res1>0)
              {
             	$_SESSION['staff_id']=$res1[0]['staff_id'];
             	$sid=$_SESSION['staff_id'];
             }

			return redirect('staff_home.php');
		}
	}
	
else{
			alert('incorrect username and password');
		}
}

?>
   <!-- Carousel Start -->
    <div class="container-fluid p-0 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel" >
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-3.jpg" alt="Image" style="height: 700px">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
   <center>
	<h1 style="color: white">Login</h1>
	<form method="post">
		<table class="table" style="width: 500px;color: white">
			<tr>
				<th>User Name</th>
				<td style="color: black"><input type="text" required=""  class="form-control" name="uname"></td>
			</tr>
			<tr>
				<th>Password</th> 
				<td style="color: black"><input type="Password" required="" class="form-control" name="pwd"></td>
			</tr>
			<tr>
				<td align="center" colspan="2"><input type="submit" name="login" value="submit" class="btn btn-success"></td>
			</tr>
		</table>
	</form>
</center> 
   
   </div></div></div></div></div></div></div></div>

<?php include 'footer.php' ?>