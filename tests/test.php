


<form id="example" name="example">
         
          <input type="number"  step = "0.01" id="inumber" name="number" value="5">


        
        <br />

        <input  type="number"  step = "0.01" id="calculate" name="total" value="">
    
    </form>


<script type="text/javascript">


var number = document.getElementById('inumber'),
calculate = document.getElementById('calculate');
calculate.value = number.value;

number.onchange = function() {


    calculate.value = number.value;

};

</script>

<script type="text/javascript">
    

function change(value){
   $('#calculate').val(value);
   $('#calculate').trigger('change');
}

</script>





    <script type="text/javascript">
       

        function myFunction() {
         var x  = document.getElementById("myNumber").value;
         x = x*<?php echo $t_cost;?>;
          document.bill.calculate.value = x;
    }
    </script>





    <script type="text/javascript">
       

        function myFunction() {
         var x  = document.getElementById("myNumber").value;
         x = x*<?php echo $t_cost;?>;
          document.example.calculate.value = x;
    }
    </script>





    <script>
function myFunction() {
    var x  = document.getElementById("myNumber").value;
    x = x*<?php echo $t_cost;?>;
    document.getElementById("demo").innerHTML = x;
}
</script>

<script>
function myFunction() {
    var x  = document.getElementById("myNumber").value;
    x = x*<?php echo $t_cost;?>;
    var y = document.createElement("INPUT");
    y.setAttribute("readonly");
    y.setAttribute("type", "number");
    y.setAttribute("name", "total");
    y.setAttribute("value", x);
    document.body.appendChild(y);
}
</script>

