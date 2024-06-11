<?php include 'staff_header.php';
   $sid=$_SESSION['staff_id'];



   if(isset($_POST['btn'])){
    extract($_POST);

    $q="update staff set first_name='$f', last_name='$l', house_name='$pl', place='$p', pincode='$e',phone='$p',email='$e' where staff_id='$profid'  ";
    update($q);
    $q="update login set username='$u' where login_id='$logid'";
    update($q);
    return redirect("staffviewprofile.php");
   }
?>
<!-- Carousel Start -->
    <div class="container-fluid p-0 wow fadeIn" data-wow-delay="0.1s" >
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel" >
            <div class="carousel-inner" 
                <div class="carousel-item active" >
                    <img class="w-100" src="img/carousel-3.jpg" alt="Image" style="height: 700px"> >
                    <div class="carousel-caption" >
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">

<center>
<?php 
if(isset($_GET['profid'])){
?>



<h3 style="color: white">Update Profile</h3>
<?php 
            $q="select * from staff inner join login using (login_id) where staff_id='$sid'";
            $res=select($q);

            $i=1;
            foreach($res as $row){
            ?>
            <form action="" method="post">
<table class="table" style="width: 500px;color: white">
    <tr>
        <th align="right">First Name :</th>
        <td><input type="text" value="<?php echo $row['first_name']?> " name="f" id=""></td>
        </tr>
        <tr>

            <th align="right">Last Name :</th>
            <td><input type="text" value="<?php echo $row['last_name']?> " name="l" id=""></td>
</tr>
        <tr>

            <th align="right">house name :</th>
            <td><input type="text" value="<?php echo $row['house_name']?> " name="pl" id=""></td>
</tr>
        <tr>

            <th align="right">place :</th>
            <td><input type="text" value="<?php echo $row['place']?> " name="p" id=""></td>
</tr>
        <tr>

            <th align="right">pincode :</th>
            <td><input type="text" value="<?php echo $row['pincode']?> " name="e" id=""></td>
</tr>
        <tr>

            <th align="right">phone :</th>
            <td><input type="text" value="<?php echo $row['phone']?> " name="u" id=""></td>
</tr>
    
    </tr>
   <th align="right">email :</th>
            <td><input type="text" value="<?php echo $row['email']?> " name="u" id=""></td>
    <tr>
               
               
            
               
              
               
    </tr>
    <tr>
        <td><input type="submit" class="btn btn-success" value="update" name="btn" id=""></td>
    </tr>
</table>
</form>
<?php }?>


<?php }else{?>

<h3 style="color: white">My Profile</h3>
<?php 
            $q="select * from staff inner join login using (login_id) where staff_id='$sid'";
            $res=select($q);

            $i=1;
            foreach($res as $row){
            ?>
<table class="table" style="width: 500px;color: white">
    <tr>
        <th align="right">First Name :</th>
        <td><?php echo $row['first_name']?> </td>
        </tr>
        <tr>

            <th align="right">Last Name :</th>
            <td><?php echo $row['last_name']?></td>
</tr>
        <tr>

            <th align="right">house name :</th>
            <td><?php echo $row['house_name']?></td>
</tr>
        <tr>

            <th align="right">place :</th>
            <td><?php echo $row['place']?></td>
</tr>
        <tr>

            <th align="right">pincode :</th>
            <td><?php echo $row['pincode']?></td>
</tr>
        <tr>

            <th align="right">phone :</th>
            <td><?php echo $row['phone']?></td>
</tr>
    
    </tr>
          <th align="right">email :</th>
            <td><?php echo $row['email']?></td>
    <tr>
               
               
              <td><a class="btn btn-success" href="?profid=<?php echo $row['staff_id']?>&logid=<?php echo $row['login_id']?>">Update profile</a></td>
               
              
               
    </tr>
</table>
<?php }?>
<?php }?>

</center>

 </div></div></div></div></div></div></div></div>
<?php include 'footer.php'?>