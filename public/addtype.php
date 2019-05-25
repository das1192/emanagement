<?php   include("../includes/layout/aheader.php"); ?>

<?php require_once("../includes/require_once.php"); ?>
<?php   alogged_in();  ?>


 <?php 

		if(isset($_POST['submit'])){


			  // form validation
	  $requierd_fields = array("name","cost");
	  validate_presence($requierd_fields);
	  $max_field_length = array("name" => 15);
	  validate_max_length($max_field_length);


	  
			  if(empty($errors)){

			$t_name    = $_POST["name"];
			$t_cost      = (int) $_POST["cost"];

			 $query  = "INSERT INTO type ";
			 $query .= "(type_name,cost) ";
			 $query .= "VALUES ";
			 $query .= "('{$t_name}',{$t_cost}) ; ";
			 $update_result = $db->query($query);
			if($update_result){

					$_SESSION["message"]  = "CATEGORY ADDED SUCCESSFULLY !!";
						redirect_to("mainadmin.php");
						
				}			 

			}

			else{

					$error_message = $errors;

				}

		}

?>



<?php  echo message();  ?>

<center><h2> + CATEYGORY </h2></center>



		     	<?php  if(isset($error_message)){
		   		echo form_errors($error_message);
		   		}  ?>



  <form action="addtype.php" method="post">
  

   <fieldset>
   <legend>Category information:</legend>
<p>

	CATEGORY NAME : <input type="text" name="name" value="">

</p>

<p>

	CATEGORY COST : <input type="number" name="cost" value="">

</p>



  

<p>
	<input type="submit" name="submit" value="ADD CATEGORY">			
</p>

  </fieldset>
  </form>



<?php   include("../includes/layout/afotter.php"); ?>