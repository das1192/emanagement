<?php require_once("/includes/require_once.php");
?>



<?php

		$result = select_all_from_employee();
		
?>		
<?php
	
		while ($row=$db->fetch_array($result)) {
	
?>	<ul>		
			<li>
			<?php echo "id = " . $row['id'] . ", "; 
				echo   "Name = " .$row['e_name']; ?>

			<?php   $result2 = find_all_by_type($row['type']);

				while ($row2 =$db->fetch_array($result2)) {
					

					echo "Type = " . $row2['type_name'] . "Cost = " . $row2['cost'] ;

			}
			
			     ?>	
			     <a href="edit.php?employee=<?php echo $row['id']; ?>">edit</a>
			</li>

 </ul>


<?php		}  ?>
		


<h1>hello</h1>