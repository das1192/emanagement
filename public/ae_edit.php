<?php require_once("../includes/require_once.php"); ?>
<?php   include("../includes/layout/aheader.php"); ?>

<?php   alogged_in();  ?>

<?php   $employee = employee_and_type_req() ?>


<?php 

		if(isset($_POST['submit'])){


			  // form validation
	  $requierd_fields = array("name","address","ctype");
	  validate_presence($requierd_fields);
	  $max_field_length = array("name" => 30,"address" => 50);
	  validate_max_length($max_field_length);

	  
			  if(empty($errors)){


			$e_id = $employee_id['id'] ;
			$e_name = $_POST["name"];
			$e_address = trim($_POST["address"]);
			$e_type   = (int) $_POST["ctype"];
			$e_status = (int) $_POST["status"];

			 $query  = "UPDATE employee ";
			 $query .= "SET ";
			 $query .= "name = '{$e_name}', ";
			 $query .= "address = '{$e_address}', ";
			 $query .= "type = {$e_type}, ";
			 $query .= "status = {$e_status} ";
			 $query .= "WHERE id = {$e_id}    ";
			 $query .= "LIMIT 1 " ;
			 $update_result = $db->query($query);
			if($update_result){

					$_SESSION["message"]  = "EMPLOYEE WAS UPDATED SUCCESSFULLY !!";
					redirect_to("mainadmin.php");
						
				}			 

			}

			else{

					$error_message = $errors;

				}

		}

?>




 <?php

 //employee manipulation

 	 
 	 $edata = find_employee_by_id($employee_id['id']) ;
 	 $name = $edata['name'];
 	 $address = $edata['address'];
 	 
 	 $status = $edata['status'];
 	// type data
 	
 	$result2 = select_all_from_type();
 	$type = $db->fetch_array($result2); 
 	$type_rows = mysqli_num_rows($result2);
  ?>

<?php  echo message();  
		    ?>


<center><h2>Edit Employee </h2></center>



		     	<?php  if(isset($error_message)){
		   		echo form_errors($error_message);
		   		}  ?>



  <form action="ae_edit.php?employee=<?php echo $employee_id["id"] ;?>" method="post">
  

   <fieldset>
   <legend>Personal information:</legend>
<p>

	EMPLOYEE NAME : <input type="text" name="name" value="<?php echo $name;?>">

</p>



		EMPLOYEE TYPE :<select name ="ctype" ><?php
		for($i=1;$i<=$type_rows;$i++){ 
		echo "<option value=\" {$i} \" "; 

		$typename = find_type_by_id($i);
		echo "> {$typename['type_name']} </option> "; 

	}
		?></select>





<p>
	EMPLOYEE WORKING ? :  <input type="radio" name="status" value="1" <?php if($status==1){echo "checked";} ?> > YES &nbsp; <input type="radio" name="status" value="0" <?php if($status==0){echo "checked";} ?> > NO
</p>

<p>
	ADDRESS : </br>
	  <textarea name="address" rows="10" cols="50" > <?php echo htmlentities($address); ?></textarea>

</p>
		  

<p>
	<input type="submit" name="submit" value="Update Data">			
</p>

  </fieldset>
  </form>


<?php   include("../includes/layout/afotter.php"); ?>