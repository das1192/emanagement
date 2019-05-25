<?php   include("../includes/layout/aheader.php"); ?>
<?php require_once("../includes/require_once.php"); ?>
<?php   logged_in();  ?>
<?php

	$result = select_all_from_type();


 ?>


<center><h2>EMPLOYEE CATEGORY LIST</h2></center>

<table>
  <tr>
    <th>Id</th>
    <th>Category Name</th>
      <th>Cateygory Cost</th>
       <th>Currency</th>
        <th>Edit</th>
  </tr>
  
<?php while ($row=$db->fetch_array($result)) {
	echo "<tr>";
	echo "<td>{$row['id']}</td>";
	echo "<td>{$row['type_name']}</td>";
	echo "<td>{$row['cost']}</td>";
	echo "<td>BDT</td>";
	echo "<td><a href=\"at_edit.php?type={$row['id']}\">Edit</a></td>";
    echo "</tr>";
?>
<?php } ?>
</table>



<?php   include("../includes/layout/afotter.php"); ?>