<?php require("includes/pdf/fpdf.php"); ?>
<?php require_once("includes/require_once.php"); ?>

<?php

$date = "2017-7-17"; 
$billid = "1";
$eid ="01";
$ename ="Shiba Das";
$ecno ="5";
$cname ="MOnthly"; 
$eaddress ="Rangpur"; 
$cost = 40;
$worked = 1;
$total = 40 ;


 ?>

 <?php

$pdf = new FPDF ('p','mm','A4');
$pdf->AddPage();

//set font arial bold 14pt

$pdf->SetFont('Arial','B','14');


$pdf->Cell('0','10',"SALLARY INVOICE DETAILS",0,1,'C'); 
$pdf->Cell('189',10,"",0,1); // end line

//cell
$pdf->Cell('130',5,'Company Name',0,0);
$pdf->Cell('59',5,'Invoice',0,1); // end line
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