<?php   include("../includes/layout/aheader.php"); ?>
<?php require_once("../includes/require_once.php"); ?>
<?php  alogged_in();  ?>
<?php 

$result2 = select_all_from_type();
 	$type = $db->fetch_array($result2); 
 	$type_rows = mysqli_num_rows($result2);

?>




 <?php 

		if(isset($_POST['submit'])){


			  // form validation
	  $requierd_fields = array("name","address","date");
	  validate_presence($requierd_fields);
	  $max_field_length = array("name" => 30,"address" => 50);
	  validate_max_length($max_field_length);


	  
			  if(empty($errors)){

			$e_name    = $_POST["name"];
			$e_address = trim($_POST["address"]);
			$type      = (int) $_POST["type"];
			$e_status  = (int) $_POST["status"];
			$jdate     = $_POST["date"]; 

			 $query  = "INSERT INTO employee ";
			 $query .= "(name,address,type,status,jdate) ";
			 $query .= "VALUES ";
			 $query .= "('{$e_name}','{$e_address}',{$type},{$e_status},'{$jdate}') ; ";
			 $update_result = $db->query($query);
			if($update_result){

					$_SESSION["message"]  = "EMPLOYEE ADDED SUCCESSFULLY !!";
						redirect_to("mainadmin.php");
						
				}			 

			}

			else{

					$error_message = $errors;

				}

		}

?>



<?php  echo message();  ?>

<center><h2> + Add Employee </h2></center>



		     	<?php  if(isset($error_message)){
		   		echo form_errors($error_message);
		   		}  ?>



  <form action="addemployee.php" method="post">
  

   <fieldset>
   <legend>Personal information:</legend>
<p>

	*EMPLOYEE NAME : <input type="text" name="name" value="">

</p>

<p>

		EMPLOYEE TYPE : <select name ="type" ><?php
		for($i=1;$i<=$type_rows;$i++){ 
		echo "<option value=\" {$i} \" "; 
		if($i==1){
		echo "selected";
		}
		$typename = find_type_by_id($i);
		echo "> {$typename['type_name']}  </option> "; 

	}
		?></select>

</p>



<p>
	EMPLOYEE WORKING ? :  <input type="radio" name="status" value="1" checked> YES &nbsp; <input type="radio" name="status" value="0" > NO
</p>

  <script>
  $( function() {

    $( "#datepicker" ).datepicker({  dateFormat: 'yy-mm-dd' });

  } );
  </script>
<p>JOIN DATE : <input type="text" id="datepicker" name="date" value="<?php echo date('Y-m-d');?>"></p>


<p>
	*ADDRESS : </br>
	  <textarea name="address" rows="10" cols="50" > </textarea>

</p>
		  

<p>
	<input type="submit" name="submit" value="ADD EMPLOYEE">			
</p>

  </fieldset>
  </form>



<?php   include("../includes/layout/afotter.php"); ?>