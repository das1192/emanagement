<?php require_once("../includes/require_once.php"); ?>
<?php  include("../includes/layout/aheader.php"); ?>
<?php   logged_in();  ?>
<?php

			$allno = mysqli_num_rows(select_all_from_employee());
			$allactiveno = mysqli_num_rows(select_all_active_employee());
			$allinactiveno = mysqli_num_rows(select_all_inactive_employee());

			$edetails= "";
			$bdetails="";
			if(isset($_POST['submit'])){


		   $requierd_fields = array("userid");
	 	   validate_presence($requierd_fields);
		

	 	   if(empty($errors)){

	 	   	$id = $_POST['userid'];
			$edetails = search_employee_by_id($id);
			$bdetails = find_bill_by_e_id($id);

				if(!$edetails && !$bdetails){

					$_SESSION["message"]  = "NO EMPLOYEE FOUND TRY AGAIN !!";
						redirect_to("mainadmin.php");
						
				}	
				


				}

					else{

					$error_message = $errors;

				}


		}
	
?>






<?php  echo message();  ?>


<center>
	
		<?php  if(isset($error_message)){
		   		echo form_errors($error_message);
		   		}  ?>

				
  <form action="mainadmin.php" method="post">
  

   <fieldset>
   <legend>Search Employee informations:</legend>


<p>Total Employees : <strong><?php echo " {$allno} " ; ?></strong>   || Active Employees : <strong><?php echo " ". $allactiveno ; ?></strong> || Inactive Employees : <strong><?php echo " ". $allinactiveno ; ?></strong> </p>
<p>
 EMPLOYEE ID : <input type="number" min = "1" name="userid" value="">

</p>




  

<p>
	<input type="submit" name="submit" value="Search !!">			
</p>

  </fieldset>
  </form>

</center>
</br>

<?php

if(!empty($edetails)&& !empty($bdetails)){

$output1="<center><h4>EMPLOYEE DETAILS</h4></center>";

$output1.="<table>";

$output1.="<tr>";
$output1.="<th>EMPLOYEE-ID</th>";
$output1.="<th>NAME</th>";
$output1.="<th>ADDRESS</th>";
$output1.="<th>TYPE</th>";
$output1.="<th>STATUS</th>";
$output1.="<th>JOIN-DATE</th>";
$output1.="<th>LAST-PAID</th>";
echo $output1;



 while ($row=$db->fetch_array($edetails)) {
	echo "<tr>";
	echo "<td>{$row['id']}</td>";
	echo "<td>{$row['name']}</td>";
	echo "<td>{$row['address']}</td>";

	$type = find_type_by_id($row['type']);
	echo "<td>{$type['type_name']}</td>";
	


	 $status = $row['status'] ==1 ? "Active" : "Inactive"; 
	echo "<td>{$status}</td>";

	
	echo "<td>{$row['jdate']}</td>";
	echo "<td>{$row['lpaid']}</td>";
    echo "</tr>";
 } 

echo "</table>";

echo "</br>";


$output2 ="<center><h4>PAY-ROLL DETAILS</h4></center>";

$output2 .="<table>";
$output2 .="<tr>";
$output2.="<th>PAYROLL-ID</th>";

$output2.="<th>GENERATED DATES</th>";
$output2.="<th>CATEYGORY</th>";
$output2.="<th>WORKED</th>";
$output2.="<th>RATE</th>";
$output2.="<th>TOTAL</th>";
$output2.="<th>DOWNLOAD</th>";
$output2.="</tr>";
   echo  $output2;

 while ($row2=$db->fetch_array($bdetails)) {
	echo "<tr>";
	echo "<td>{$row2['id']}</td>";
	echo "<td>{$row2['date']}</td>";
	echo "<td>{$row2['cname']}</td>";
	echo "<td>{$row2['worked']} times</td>";
	echo "<td>{$row2['cost']} per term</td>";
	echo "<td>{$row2['total']}</td>";
	echo "<td><a href=\"pdfbill.php?bill={$row2['id']}\">Download</a></td>";
    echo "</tr>";

 }
echo "</table>";

}

?>



<?php   include("../includes/layout/afotter.php"); ?>