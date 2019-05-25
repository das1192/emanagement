<?php require_once("../includes/require_once.php"); ?>
<?php   logged_in();  ?>
<?php   include("../includes/layout/header.php"); ?>
<?php   if(!isset($_GET['employee'])){

			redirect_to("admin.php");
	} ?>
<?php  

$employee=employee_and_type_req();
 $edata = find_employee_by_id($employee_id['id']) ;
 $e_name = $edata['name'];
 $e_type = $edata['type'];
 $e_address = $edata['address'];
 $e_id = $employee_id['id'];
 $type = find_type_by_id($employee_id['type']);
 $t_no = $type['id'];
 $t_cost = $type['cost'];
 $t_name = $type['type_name'];
 $lastpaid = $edata['lpaid'];


 ?>




<?php  echo message();  ?>

<center><h2> BILL GENERATOR </h2></center>



		     	<?php  if(isset($error_message)){
		   		echo form_errors($error_message);
		   		}  ?>



<form id="bill" name ="bill" action="prebill.php?employee=<?php echo $employee_id["id"] ;?>" method="post">
  

   <fieldset>
   <legend>BILL GENERATOR FORM:</legend>

  <script>
  $( function() {

    $( "#datepicker" ).datepicker({  dateFormat: 'yy-mm-dd' });

  } );
  </script>



<p>LAST PAID DATE : <?php if(empty($lastpaid)){echo "<strong> None </strong>";} else{ echo $lastpaid ;}   ?></p>




<p>INVOICE DATE : <input type="text" id="datepicker" name="date" value="<?php echo date('Y-m-d');?>"></p>
<p>

	EMPLOYEE NAME : <strong><?php echo $e_name;  ?></strong>    <input readonly  type="hidden" name="name" value="<?php echo "{$e_name}";?>">

</p>

<p>

	ADDRESS : <strong><?php echo $e_address;  ?></strong>  <input readonly type="hidden" name="address" value="<?php echo "{$e_address}";?>">
</p>


<p>

	EMPLOYEE ID :   <strong><?php echo $e_id ; ?></strong>     <input readonly type="hidden" name="eid" value="<?php echo "{$e_id}";?>">

</p>


<?php echo "</br>"; ?>
<p>

	EMPLOYEE CATEGORY :   <strong><?php echo $t_no ; ?></strong>
	<input readonly type="hidden" name="ecategory" value="<?php echo "{$t_no}";?>">
</p>

<p>

	CATEGORY NAME :   <strong><?php echo $t_name ; ?></strong>

	<input readonly type="hidden" name="cname" value="<?php echo "{$t_name}";?>">
</p>


<p>
	<?php  
			echo "</br>";

			if($t_no==5){

				echo "TYPE : Contractual ";
			}
			
			else{

				
				echo "WORKED  {$t_name} : <input type=\"number\"  min=\"1\" id=\"inumber\"  name=\"workdata\" value=\"1\"> ";
				echo "</br>";
				echo "</br>";
				echo "TYPE :  {$t_name} & COST : {$t_cost}" ; 
				echo "<input readonly type=\"hidden\" name=\"cost\" value=\"{$t_cost}\"> /per term";

			}

	   ?>  

</p>
<p>
		<?php if($t_no==5) {

		


				 echo "ENTER TOTAL : <input  type=\"number\" min =\"1\" step = \"0.01\" id=\"calculate\" name=\"total\" value=\"{$t_cost}\"> BDT";
				 echo "<br/>";
      			  echo "<br/>";




		}

		else{

        echo "<br/>";

        echo "TOTAL : <input readonly min= \"1\" type=\"number\"  step = \"0.01\" id=\"calculate\" name=\"total\" value=\"{$t_cost}\"> BDT";


		}

		?>


</p>
 
<p>
	<input type="submit" name="submit" value="CHECK DETAILS !!">			
</p>


  </fieldset>
  </form>
  <script type="text/javascript">


var number = document.getElementById('inumber'),
calculate = document.getElementById('calculate');

number.onchange = function() {


    calculate.value = number.value * <?php echo $t_cost; ?> ;

};

</script>



  





<?php   include("../includes/layout/fotter.php"); ?>