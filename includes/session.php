<?php session_start(); ?>



<?php // session message

			  function message(){ 
		  			if(isset($_SESSION['message'])){
		  				$output= "<div class =\"message\">";
		  				$output .= htmlentities($_SESSION['message']);
		  				 $output .=" </div>";
		  				 $_SESSION['message']=null;
		  			}
		   				else{
		   					$output=null;
		   				}
		  			return $output;
		   }

?>


  <?php // session error

			  function errors(){ 
		  			if(isset($_SESSION['errors'])){
		  			
		  				$errors = $_SESSION['errors'];
		  				 
		  				 $_SESSION['errors']=null;
		  			}
		   				else{
		   					$errors=null;
		   				}
		  			return $errors;
		   }
		   
?>

