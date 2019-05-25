<?php 
     
   function field_name_as_text($field_value){

   		$field_value = ucfirst($field_value);
   		$field_value = str_replace("_", " ", $field_value);

   		return $field_value;

   }
	$empty = array();
     //* For Presence 
	
	function has_presence($value){
		
		
		return isset($value) && $value !=="";
		
	}


		  //* Validating array of  presence
				
		function validate_presence($has_presence){
				
		  Global $errors;
				
				foreach($has_presence as $field ){
					$value = trim($_POST[$field]);
					if(!has_presence($value)){
						
						$errors[$field] = field_name_as_text($field)." can not be Blank ";
						
					};
					
				}
		}
	
	//* For Max Length  
	function max_length($string,$max){
		
		return strlen($string)<=$max;
	
		
	}
	  //* Validating Max Lengths
				
		function validate_max_length($field_with_max_length){
				
		  Global $errors;
				
				foreach($field_with_max_length as $field => $max){
					$value = trim($_POST[$field]);
					if(!max_length($value,$max)){
						
						$errors[$field] = field_name_as_text($field)." is Too Long ";
						
					};
					
				}
		}
	
	//* For Inclusion 
	function has_inclusion_in($value,$set){
		
		return in_array($value,$set);
		
	}

	
	//* Displaying Errors
	
	function form_errors($errors=array()){
		
		$output ="";
		
		if(!empty($errors))
		{    $output .= "<center><div class= \"error\">";
			 $output .= "Please Fix Following Errors ";
			 $output .="<ul>";
			foreach($errors as $key => $error){
				
				$output .= "<li>{$error}</li>";
				
			} 
			$output .="</ul>";
			
			$output .="</div></center>";
		}
		
		
		
		return $output;
		
		
	}
	










?>