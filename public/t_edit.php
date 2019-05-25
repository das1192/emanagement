<?php   include("../includes/layout/header.php"); ?>
<?php require_once("../includes/require_once.php"); ?>
<?php   logged_in();  ?>

<?php   $type = employee_and_type_req() ;?>






<?php 

		if(isset($_POST['submit'])){


			  // form validation
	  $requierd_fields = array("category_name","cateygory_cost");
	  validate_presence($requierd_fields);
	  $max_field_length = array("category_name" => 15);
	  validate_max_length($max_field_length);

	  
			  if(empty($errors)){


			$t_id = $type_id['id'] ;
			$t_name = $_POST["category_name"];
			$t_cost   = (int) $_POST["cateygory_cost"];

			 $query  = "UPDATE type ";
			 $query .= "SET ";
			 $query .= "type_name = '{$t_name}', ";
			 $query .= "cost = {$t_cost} ";
			 $query .= "WHERE id = {$t_id}    ";
			 $query .= "LIMIT 1 " ;
			 $update_result = $db->query($query);
			if($update_result){

					$_SESSION["message"]  = "CATEGORY UPDATED SUCCESSFULLY !!";
						redirect_to("admin.php");
						
				}			 

			}

			else{

					$error_message = $errors;

				}

		}

?>



 <?php
 	// type data
 	
 	$c_type = find_type_by_id($type_id['id']);
 	$name = $c_type['type_name'];
 	$cost = $c_type['cost'];
 	
 	
  ?>

<?php  echo message();  
		    ?>


<center><h2>Manage Cateygory & Cost </h2></center>



		     	<?php  if(isset($error_message)){
		   		echo form_errors($error_message);
		   		}  ?>



  <form action="t_edit.php?type=<?php echo $type_id["id"] ;?>" method="post">
  

   <fieldset>
   <legend>Category information:</legend>
<p>

	Category NAME : <strong><?php echo $name; ?> </strong>


	<input readonly type="hidden" name="category_name" value="<?php echo $name;?>">

</p>

<p>

	Category COST  : <input type="number"  min="1" name="cateygory_cost" value="<?php echo $cost;?>">

</p>


<p>
	<input type="submit" name="submit" value="Update Data">			
</p>

  </fieldset>
  </form>


<?php   include("../includes/layout/fotter.php"); ?>