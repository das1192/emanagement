<?php require_once("../includes/pdf/fpdf.php"); ?>
<?php require_once("../includes/require_once.php"); ?>

<?php   if(isset($_POST['submit'])){

		 $date =$_SESSION['date'] ;
		 unset($_SESSION['date']) ;
		 $ename = $_SESSION['name'] ;
		 unset($_SESSION['name'] );
		 $eaddress =$_SESSION['address'] ;
		 unset($_SESSION['address']);
		 $eid = $_SESSION['eid'];
		 unset($_SESSION['eid']);
		 $ecno = $_SESSION['ecno'];
		 unset($_SESSION['ecno']);
		 $cname = $_SESSION['cname'];
		 unset($_SESSION['cname']);
		 $worked = $_SESSION['worked'];
		 unset($_SESSION['worked']);
		 $cost = $_SESSION['cost'];
		 unset($_SESSION['cost']);
		 $total = $_SESSION['total'];
		 unset($_SESSION['total']);

		 	

			 $query  = "INSERT INTO bill ";
			 $query .= "(date,ename,address,eid,ecno,cname,worked,cost,total) ";
			 $query .= "VALUES ";
			 $query .= "('{$date}','{$ename}','{$eaddress}',{$eid},{$ecno},'{$cname}',{$worked},{$cost},{$total}) ; ";
			 $update_result = $db->query($query);
			if($update_result){
			
						
				}			 
				else{}
			 $query2  = "UPDATE employee ";
			 $query2 .= "SET ";
			 $query2 .= "lpaid = '{$date}' ";
			 $query2 .= "WHERE id = {$eid}  ";
			 $query2 .= "LIMIT 1 " ;
			 $update_result2 = $db->query($query2);
			if(!$update_result2){

					$_SESSION["message"]  = "SOMTHING WENT WORNG !!";
						redirect_to("admin.php");
						
				}
				else{}		


					$billid = bill_rows();
					$billid = $billid;

	}


else if (isset($_GET['bill'])){

		$row = bill_rows();
		$billid = $_GET['bill'];
		if($billid>$row){
			
			redirect_to("admin.php");

		}	
		$result = find_bill_by_id($billid);

		$bill = mysqli_fetch_assoc($result);

		$id =['id'];
		$date = $bill['date'];
		$ename=$bill['ename'];
		$eaddress = $bill['address'];
		$eid = $bill['eid'];
		$ecno = $bill['ecno'];
		$cname = $bill['cname'];
		$worked = $bill['worked'];
		$cost = $bill['cost'];
		$total = $bill['total']; 




}


else{


redirect_to("admin.php");

}




	 ?>

<?php

$pdf = new FPDF ('p','mm','A4');
$pdf->AddPage();

//set font arial bold 14pt

$pdf->SetFont('Arial','B','14');


$pdf->Cell('0','10',"PAY-ROLL SLIP DETAILS",0,1,'C'); 
$pdf->Cell('189',10,"",0,1); // end line

//cell
$pdf->Cell('130',5,'Company Name',0,0);
$pdf->Cell('59',5,'PAY-ROLL',0,1); // end line
 //regular font
$pdf->SetFont('Arial','','12');

$pdf->Cell('130',5,'[Street Address]',0,0);
$pdf->Cell('59',5,'',0,1); // end line

$pdf->Cell('130',5,'[City,Country,Zip]',0,0);
$pdf->Cell('25',5,'Date',0,0);
$pdf->Cell('34',5,": [ {$date} ] ",0,1); // end line


$pdf->Cell('130',5,'Phone[+8801767039396]',0,0);
$pdf->Cell('25',5,'Invoice ID',0,0);
$pdf->Cell('34',5,": [ {$billid} ]",0,1); // end line



$pdf->Cell('130',5,"",0,0);
$pdf->Cell('25',5,"Employee ID",0,0);
$pdf->Cell('34',5,": [ {$eid} ]",0,1); // end line


// Dummy empty cell for space


$pdf->Cell('189',10,"",0,1); // end line

// Pay to
$pdf->Cell('100',5,"Pay To :",0,1); // end line

$pdf->Cell('10',5,"",0,0);
$pdf->Cell('90',5,"[Name]             :  {$ename}",0,1);

$pdf->Cell('10',5,"",0,0);
$pdf->Cell('90',5,"[Address]         :  {$eaddress}",0,1);

$pdf->Cell('10',5,"",0,0);
$pdf->Cell('90',5,"[Cateygory]      :  {$cname}",0,1);

$pdf->Cell('10',5,"",0,0);
$pdf->Cell('90',5,"[CategoryNo]   :  {$ecno}",0,1);


// Dummy empty cell for space


$pdf->Cell('189',10,"",0,1); // end line

$pdf->Cell('189',10,"",0,1); // end line


// Invoice Details

$pdf->SetFont('Arial','B','12');

$pdf->Cell('130',5,"Description",1,0); 
$pdf->Cell('25',5,"Work Data",1,0); 
$pdf->Cell('34',5,"Costing",1,1); 

$pdf->SetFont('Arial','','12');

$pdf->Cell('130',5,"Base cost of {$cname} ",1,0); 
$pdf->Cell('25',5,"-",1,0,'C'); 
$pdf->Cell('34',5,"{$cost}",1,1,'R'); 

$pdf->Cell('130',5,"Number of {$cname} workdata ",1,0); 
$pdf->Cell('25',5,"{$worked}",1,0,'C'); 
$pdf->Cell('34',5,"",1,1,'R'); 

$pdf->Cell('130',5,"",0,0); 
$pdf->Cell('25',5,"-",1,0,'C'); 
$pdf->Cell('34',5,"{$worked} * {$cost}",1,1,'R'); 

// Summry

$pdf->Cell('130',5,"",0,0); 
$pdf->Cell('25',5,"Subtotal",1,0); 
$pdf->Cell('10',5,"BDT",1,0); 
$pdf->Cell('24',5,"{$total}",1,1,'R'); 

$pdf->Cell('130',5,"",0,0); 
$pdf->Cell('25',5,"Others",1,0); 
$pdf->Cell('10',5,"BDT",1,0); 
$pdf->Cell('24',5,"-",1,1,'L'); 


$pdf->Cell('130',5,"",0,0); 
$pdf->Cell('25',5,"Total",1,0); 
$pdf->Cell('10',5,"BDT",1,0); 
$pdf->Cell('24',5,"{$total}",1,1,'R'); 




$pdf->Output();
 ?>