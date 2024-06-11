<?php include 'adminheader.php';
extract($_GET);
if (isset($_POST['pass'])) {
	extract($_POST);
	
	$q="insert into passes values(null,'$rid','$is','$va')";
	$id=insert($q);
	 $q1="INSERT INTO renewal_request VALUES(NULL,'$id',DATE_ADD(NOW(), INTERVAL 30 DAY),NOW(),'accept')";
       insert($q1);
	alert('  Successfully');
  return redirect('admin_addpasses.php');
}




 ?>
 <section id="pageintro" class="hoc clear">
    <div>
    

	<center>
  <h1>Add Issue Date</h1>
		<form method="post">
			<table class="table" style="width: 500px">
				
				<tr>
					<th>Issue Date</th>
					<td style="color: black"><input type="date" required="" class="form-control" name="is"></td>
				</tr>
				<tr>
					<th>Vallid Till</th>
					<td style="color: black"><input type="text" required="" class="form-control" name="va"></td>
				</tr>
				<tr>
					<th align="center" colspan="2"><input type="submit" name="pass" value="submit" class="btn btn-success"></th>
				</tr>
			</table>
		</form>
	</center>
	</div></section></div></div>
	<center>
		<h1>View pass</h1>
		<table class="table" style="width:500px;color: black">
			<tr>
				<th>Slno</th>
				<th>Issue date</th>
				<th>Valid Till</th>
			</tr>
			<?php 

        $q="select * from passes";
        $res=select($q);
        $slno=1;
        foreach ($res as $row) {
        	?>
        	<tr>
        		<td><?php echo $slno++ ?></td>
        		<td><?php echo $row['issue_date'] ?></td>
        		<td><?php echo $row['valid_till'] ?></td>
        	</tr>
        	<?php 
        }



			 ?>
		</table>
	</center>
<?php include 'footer.php' ?>