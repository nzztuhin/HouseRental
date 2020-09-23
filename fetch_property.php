<?php
	
	include 'db_con.php';
	 $que="SELECT * FROM `property_table` WHERE `Status`='Active'";

	 echo $que;
            $query=mysqli_query($mysqli,$que);
             
			
            
        $output='
        <table class="table table-striped table-table-bordered">
        	<tr>
        	<th>id</th>
            <th>Property Name</th>
            <th>Property Owner Name</th>
            <th>Property Type</th>
            <th>Floor</th>
            <th>Area</th>
            <th>Rooms</th>
            <th>Location</th>
            <th>Price</th>
            <th>Rent</th>
            </tr>
        ';
         while( $row=mysqli_fetch_array($query) > 0)
		{
			
				$output.='
				<tr>
					<td>'.$row["PropertyID"].'</td>
					<td>'.$row["Property_name"].'</td>
					<td>'.$row["PropertyOwnerName"].'</td>
					<td>'.$row["Property_Type"].'</td>
					<td>'.$row["Floor"].'</td>
					<td>'.$row["Area"].'</td>
					<td>'.$row["Rooms"].'</td>
					<td>'.$row["Location"].'</td>
					<td>'.$row["Price"].'</td>
					<td><button class="btn-primary btn"><a href="update_user.php?id="'.$row["PropertyID"].'">" class="text-white">Rent</a></button></td>

				</tr>
				';
			
		}
			$output.='</table>';
			echo $output;


?>