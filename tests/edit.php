<?php require_once("/includes/require_once.php");
?>
<?php employee_and_type_req();
?>

<?php 

		if(isset($_POST['submit'])){

			$e_id = $employee_id['id'] ;
			$e_name = $_POST["name"];
			$type   = (int) $_POST["type"];
			$e_status = (int) $_POST["status"];

			 $query  = "UPDATE employee ";
			 $query .= "SET ";
			 $query .= "e_name = '{$e_name}', ";
			 $query .= "type = {$type}, ";
			 $query .= "status = {$e_status} ";
			 $query .= "WHERE id = {$e_id}    ";
			 $query .= "LIMIT 1 " ;
			 $update_result = $db->query($query);


		}



?>




 <?php

 //employee manipulation

 	 $id = $employee_id['id'] ;
 	 $employee = find_employee_by_id($id) ;
 	 $name = $employee['e_name'];
 	 $type_id = $employee['type'];
 	 $status = $employee['status'];
 	// type data
 	
 	$result2 = select_all_from_type();
 	$type = $db->fetch_array($result2); 
 	$type_rows = mysqli_num_rows($result2);
  ?>


  <form action="edit.php?employee=<?php echo $employee_id["id"] ;?>" method="post">

	<p>EMPLOYEE NAME : <input type="text" name="name" value="<?php echo $name;?>"></p>
	<p>EMPLOYEE TYPE : <select name ="type" ><?php
	for($i=1;$i<=$type_rows;$i++){ 
	echo "<option value=\" {$id} \" "; 
	if($id==$type_id){
		echo "selected";
	}
	echo "> {$i} </option> "; 

}
	?></select>
	</p>

	<p>EMPLOYEE WORKING STATUS : <input type="radio" name="status" value="1" <?php if($status==1){echo "checked";} ?> > YES &nbsp; <input type="radio" name="status" value="0" <?php if($status==0){echo "checked";} ?> > NO
	</p>

	<p>
		  		<input type="submit" name="submit" value="Update Data">			
		  		</p>


  </form>