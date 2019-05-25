<?php
require_once("config.php");
?>

<?php 

		/**
		*  DATA-BASE CLASS
		*/
		class DataBase
		{
			
			private $connection;
			
			public $last_query;

			function __construct()
			{
					$this->open_connection();
			
			} // END OF construct
			

			// FOR CHECKING LAST EXECUTED QUERY  
			public function last_query ($query){
				$this->last_query = $query;
			}//END OF last_query


			//FOR PERFORMING DATA-BASE QUERYS
			public function query ($query){
				$this->last_query($query);
				$this->prep_query($query);
				$result =  mysqli_query($this->connection,$query);
				$this->check_query($result);

				return $result;
			} //END OF query 


			//FOR CHECKING EXECUTED QUERY WAS SUCCESSFUL OR NOT 
			public function check_query($result){
			
			if(!$result){

 	 die("DATA BASE QUERY FAILD WITH =". mysqli_errno($this->connection) . " : " . 
  										 mysqli_error($this->connection));
				}

			}// END OF check_query


			// FOR ESCAPING REAL ESCAPE VALUE FOR QUERY
			public function prep_query($query){
				mysqli_real_escape_string($this->connection,$query);
				
				return $query;
			}//END OF prep_query


			//FOR FETCHING SQL DATA
			public function fetch_array($result){

				$value = mysqli_fetch_assoc($result);

				return $value;
			} // END OF fetch_array


			//FOR OPENING DATA BASE CONNECTION
			public function open_connection () {

					$this-> connection = mysqli_connect(DBHOST,DBUSER,DBPASS,DBNAME);

					if(!$this->connection){

						die("there is a connection error");

					}


			} // END OF open_connection


			// FOR CLOSING DATA-BASE CONNECTION
			public function close_connection () {

					if(isset($this->connection)){

						mysqli_close($this->connection);
						unset($this->connection);
					}

			} // END OF close_connection





} // END OF DATA-BASE CLASS


$database = new DataBase();

$db =& $database;

?>
