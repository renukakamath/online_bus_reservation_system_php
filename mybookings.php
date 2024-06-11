<?php include 'connection.php' ;
$uid=$_SESSION['user_id'];
extract($_GET);

?>

<script> 
		function printDiv() { 
			var divContents = document.getElementById("div_print").innerHTML; 
			var a = window.open('', '', 'height=500, width=500'); 
			a.document.write(divContents); 
			a.document.close(); 
			a.print(); 
		} 
	</script> 
<body onload="printDiv()">
	<div id="div_print" >
<center>
	
<h1 style="padding-top: 30px;font-size: 60px">Ticket</h1>

<table class="table" style="width: 1000px;color: black;font-style: italic;font-family: monospace;font-size: 22px" border="5">
	
		<tr>


    <th>route name</th>
      
      <th> No of Seats</th>
      <th>Bus</th>
    <th>amount</th>
   
      
    </tr>
    <?php 


            $q="SELECT * FROM `booking_child` INNER JOIN `booking_master` USING (`booking_master_id`) INNER JOIN bus USING (bus_id)INNER JOIN route USING (route_id)  WHERE `user_id`='$uid' AND `status`='paid' and booking_master_id='$bmid'";
            $res=SELECT($q);
            foreach ($res as $row) {
              ?>
              
            <tr>
               <td><?php echo $row['route_name'] ?></td>
              <td><?php echo $row['no_of_seat'] ?></td>
              <td><?php echo $row['bus_registration'] ?></td>
             
              <td><?php echo $row['amount'] ?></td>
         
         </tr>
      <?php 
         }



		 ?>
		
	</table>
</center>