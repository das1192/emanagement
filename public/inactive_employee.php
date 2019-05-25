<?php   include("../includes/layout/header.php"); ?>
<?php require_once("../includes/require_once.php"); ?>
<?php   logged_in();  ?>
<?php

	$result = select_all_inactive_employee();


 ?>


<center><h2>INACTIVE EMPLOYEE LIST</h2></center>

<table>
  <tr>
    <th>Id</th>
    <th>Name</th>
      <th>Address</th>
    <th>Type</th>
     <th>Status</th>
      <th>Join Date</th>
       <th>Last Paid</th>
        <th>Edit</th>
  </tr>
  
<?php while ($row=$db->fetch_array($result)) {
	echo "<tr>";
	echo "<td>{$row['id']}</td>";
	echo "<td>{$row['name']}</td>";
	echo "<td>{$row['address']}</td>";
?>
<?php
	$type = find_type_by_id($row['type']);
	echo "<td>{$type['type_name']}</td>";
?>	


<?php
	 $status = $row['status'] ==1 ? "Active" : "Inactive"; 
	echo "<td>{$status}</td>";

?>
<?php	
	echo "<td>{$row['jdate']}</td>";
	echo "<td>{$row['lpaid']}</td>";
	echo "<td><a href=\"e_edit.php?employee={$row['id']}\">Edit</a></td>";
    echo "</tr>";
?>
<?php } ?>
</table>



<?php   include("../includes/layout/fotter.php"); ?>