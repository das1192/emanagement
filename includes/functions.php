
<?php // Redirect to

		function redirect_to($new_location){

			header("Location: ".$new_location);
			exit;
		}
?>


<?php // FETCHING ALL DATA

	 function all_fetched_data($result){
	 	global $db ;
	 	while ($row=$db->fetch_array($result)){
	 		// nothing needed
	 	}

	 	return $row ;
	 }

?>


<?php // QUERY FUNCTION TO SELECT ALL FROM BILL

		function  select_all_from_bill(){
		
	    global $db;          
		$query = "SELECT * FROM ";
		$query .= " bill ";
		$query .= "ORDER BY id DESC ;";
		$bill = $db->query($query);
		 
	     return $bill;
			
		}

?>



<?php // QUERY FUNCTION TO SELECT BILL BY ID

		function  find_bill_by_id($id){
		
	    global $db;          
		$query = "SELECT * FROM ";
		$query .= " bill ";
		$query .= "WHERE id = {$id} ";
		$query .= "LIMIT 1" ;
		$bill = $db->query($query);
		 
	     return $bill;
			
		}

?>

<?php // QUERY FUNCTION TO FIND BILL BY E ID

		function  find_bill_by_e_id($id){
		
	    global $db;          
		$query = "SELECT * FROM ";
		$query .= " bill ";
		$query .= "WHERE eid = {$id} ";
		
		$bill = $db->query($query);
		 
	     return $bill;
			
		}

?>


<?php // QUERY FUNCTION TO FIND BILL ROWS

		function  bill_rows(){
		
	    $result = select_all_from_bill();
		 $row  =  mysqli_num_rows($result);
	     return $row;
			
		}

?>









<?php // QUERY FUNCTION TO SELECT ALL FROM EMPLOYEE

		function  select_all_from_employee(){
		
	    global $db;          
		$query = "SELECT * FROM ";
		$query .= " employee ;";
		$employee = $db->query($query);
		 
	     return $employee;
			
		}

?>





<?php // QUERY FUNCTION TO SELECT ALL ACTIVE EMPLOYEE BY STATUS

		function  select_all_active_employee(){
		
	    global $db;          
		$query = "SELECT * FROM ";
		$query .= " employee ";
		$query .= "WHERE status = 1 ;" ;
		$employee = $db->query($query);
		 
	     return $employee;
		}
?>


<?php // QUERY FUNCTION TO SELECT ALL INACTIVE EMPLOYEE BY STATUS

		function  select_all_inactive_employee(){
		
	    global $db;          
		$query = "SELECT * FROM ";
		$query .= " employee ";
		$query .= "WHERE status = 0 ;";
		$employee = $db->query($query);
		 
	     return $employee;
		}

?>


<?php // QUERY FUNCTION TO SELECT ALL FROM EMPLOYEE BY ID

		function  find_employee_by_id($id){
		
	    global $db;          
		$query = "SELECT * FROM ";
		$query .= " employee ";
		$query .= "WHERE id = {$id} ";
		
		$result = $db->query($query);
		$employee = $db->fetch_array($result);
		 
	     
		if($employee){
	     return $employee;
		}
			else{
				return null;
			}
		}

?>







<?php //

		function  find_type_by_id($id){
		
	    global $db;          
		$query = "SELECT * FROM ";
		$query .= "type ";
		$query .= "WHERE id = {$id} ";
		
		$result = $db->query($query);
		$type = $db->fetch_array($result);
		 
	     
		if($type){
	     return $type;
		}
			else{
				return null;
			}
		}

?>


<?php // QUERY FUNCTION TO SELECT ALL FROM TYPE

		function  select_all_from_type(){
		
	    global $db;          
		$query = "SELECT * FROM ";
		$query .= " type ;";
		$employee = $db->query($query);
		 
	     return $employee;
			
		}

?>




<?php // QUERY FUNCTION TO SELECT ALL FROM TYPE BY EMOLOYEE TYPE ID

		function  find_all_by_type($type){
			
	              global $db;
				  
					$query    = "SELECT * FROM type ";
					$query    .= "WHERE id = {$type} ;";
				
				    $employee = $db->query($query);
	                check_query($employee);
		 
	                return $employee;
			
		}

?>


	
<?php  // Cheacking Successful Query
			
			function check_query($result_set){
			
			if(!$result_set){
				
				die("DATA BASE QUERY FAILD");
			}

			}
			
?>


<?php // EMPLOYEE AND TYPE REQUESTS
	    		function employee_and_type_req(){
	    			
	    			global $employee;
	    			global $employee_id;
	    			global $type;
	    			global $type_id;
	    		if (isset($_GET['employee'])) {

	    			$employee = $_GET['employee'];
	    			$type_id = null;
	    			$type = null;
	    			$employee_id = find_employee_by_id($employee);
	    		}
	    		
	    		else if (isset($_GET['type'])) {

	    			$type = $_GET['type'];
	    			$employee_id = null;
	    			$employee = null;
	    			$type_id = find_type_by_id($type);
	    			
	    		}
	    		else  {
	    			$employee_id = null;
	    			$type_id = null;
	    			$employee =null;
	    			$type = null;
	    	          }
	    	      }



 ?>




 <?php

 			function find_admin($username,$password){



 		global $db;          
		$query = "SELECT * FROM ";
		$query .= " admin ";
		$query .= "WHERE username = '{$username}' AND password = '{$password}'  ;";
		
		$result = $db->query($query);
		if($admin=$db->fetch_array($result)){
			return $admin;
		}
		 else{
	     return null;
	 }

 			}


 			function logged_in(){

 				if(!isset($_SESSION['username'] )){

 					redirect_to("index.php");
 				}
 				


 			}


 			function alogged_in(){

 					$mainadmin = $_SESSION['username'];

 				if($mainadmin ==='mainadmin'){
				
                
                }
                else{


                	redirect_to('index.php');
                }


 			}


  ?>








<?php // QUERY FUNCTION TO SELECT ALL FROM EMPLOYEE BY ID

		function  search_employee_by_id($id){
		
	    global $db;          
		$query = "SELECT * FROM ";
		$query .= " employee ";
		$query .= "WHERE id = {$id} ";
		
		$result = $db->query($query);
	
		 
	    return $result; 
		
		}

?>


<?php // QUERY FUNCTION TO SELECT ALL ADMIN

		function  select_all_admin(){
		
	    global $db;          
		$query = "SELECT * FROM ";
		$query .= " admin ";
		$admin = $db->query($query);
		 
	     return $admin;
		}

?>



<?php // QUERY FUNCTION TO SELECT ALL ADMIN

		function  find_admin_by_id($id){
		
	    global $db;          
		$query = "SELECT * FROM ";
		$query .= " admin ";
		$query .= "WHERE id = {$id} ";
		$admin = $db->query($query);
		 
	     return $admin;
		}

?>



