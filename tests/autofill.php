
<form id="bill" name ="bill" action="prebill.php" method="post">
  

   <fieldset>
   <legend>BILL GENERATOR FORM:</legend>




<?php 
				echo "WORKED  : <input type=\"number\"  min=\"1\" id=\"inumber\"  name=\"workdata\" value=\"1\"> ";



				  echo "TOTAL : <input readonly min= \"1\" type=\"number\"  step = \"0.01\" id=\"calculate\" name=\"total\" value=\"1\"> BDT";




?>
<p>
	<input type="submit" name="submit" value="CHECK DETAILS !!">			
</p>


  </fieldset>
  </form>

   <script type="text/javascript">


var number = document.getElementById('inumber'),
calculate = document.getElementById('calculate');
calculate.value = number.value;

   inumber.onchange = function() {


    calculate.value = number.value;

};

</script>
