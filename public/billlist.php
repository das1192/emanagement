<?php   include("../includes/layout/header.php"); ?>
<?php require_once("../includes/require_once.php"); ?>
<?php   logged_in();  ?>
<?php

	$result = select_all_from_bill();


 ?>


<center><h2>INVOICE LIST</h2></center>

<table>
  <tr>
    <th>Invoice Id</th>
    <th>Generated Date</th>
      <th>To</th>
   
     <th>Employee Id</th>
   
       <th>Cateygory name</th>
        <th>Worked</th>
        <th>Rate</th>
        <th>Total</th>
        <th>Download</th>
  </tr>
  
<?php while ($row=$db->fetch_array($result)) {
	echo "<tr>";
	echo "<td>{$row['id']}</td>";
	echo "<td>{$row['date']}</td>";
	echo "<td>{$row['ename']}</td>";

	echo "<td>{$row['eid']}</td>";
	echo "<td>{$row['cname']}</td>";
	echo "<td>{$row['worked']} times</td>";
	echo "<td>{$row['cost']} per term</td>";

	echo "<td>{$row['total']}</td>";

	echo "<td><a href=\"pdfbill.php?bill={$row['id']}\">Download</a></td>";
    echo "</tr>";
?>
<?php } ?>
</table>



<?php   include("../includes/layout/fotter.php"); ?>