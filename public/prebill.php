<?php require_once("../includes/pdf/fpdf.php"); ?>
<?php require_once("../includes/require_once.php"); ?>
<?php   logged_in();  ?>


<?php



		if(isset($_POST['submit'])){

		 $_SESSION['date'] =	$date = $_POST['date'];
		 $_SESSION['name'] =	$e_name = $_POST['name'];
		 $_SESSION['eid'] =	$e_id = $_POST['eid'];
		 $_SESSION['address'] =	$e_address = $_POST['address'];
		 $_SESSION['ecno'] =	$e_category = $_POST['ecategory'];
		 $_SESSION['cname'] =	$c_name  = $_POST['cname'];


			


		if(isset($_POST['workdata']))
			{

		$_SESSION['worked'] =		$worked = $_POST['workdata'];

			}

			else{

		$_SESSION['worked']  =	$worked = 1;
			}






			
			if(isset($_POST['cost']))
			{

			$_SESSION['cost'] =	$cost = $_POST['cost'];

			}

			else{

			$_SESSION['cost'] =	$cost = $_POST['total'];
			}

			
            if(isset($_SESSION['total']) )
            { $_SESSION['total']= $total = $_POST['total'];
             
             }

             else{
                $_SESSION['total'] = $total = $_SESSION['cost'] * $_SESSION['worked'];
             }

		}

			else{



				$_SESSION["message"]  = " SOMETHING WENT WORNG :( !!";
						redirect_to("admin.php");
			}


?>

              <!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Pay Roll Pre GENERATOR</title>
    
    <style>
    .invoice-box{
        max-width:800px;
        margin:auto;
        padding:30px;
        border:1px solid #eee;
        box-shadow:0 0 10px rgba(0, 0, 0, .15);
        font-size:16px;
        line-height:24px;
        font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color:#555;
    }
    
    .invoice-box table{
        width:100%;
        line-height:inherit;
        text-align:left;
    }
    
    .invoice-box table td{
        padding:5px;
        vertical-align:top;
    }
    
    .invoice-box table tr td:nth-child(2){
        text-align:right;
    }
    
    .invoice-box table tr.top table td{
        padding-bottom:20px;
    }
    
    .invoice-box table tr.top table td.title{
        font-size:45px;
        line-height:45px;
        color:#333;
    }
    
    .invoice-box table tr.information table td{
        padding-bottom:40px;
    }
    
    .invoice-box table tr.heading td{
        background:#eee;
        border-bottom:1px solid #ddd;
        font-weight:bold;
    }
    
    .invoice-box table tr.details td{
        padding-bottom:20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom:1px solid #eee;
    }
    
    .invoice-box table tr.item.last td{
        border-bottom:none;
    }
    
    .invoice-box table tr.total td:nth-child(2){
        border-top:2px solid #eee;
        font-weight:bold;
    }
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td{
            width:100%;
            display:block;
            text-align:center;
        }
        
        .invoice-box table tr.information table td{
            width:100%;
            display:block;
            text-align:center;
        }
    }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="images/bill.png" style="width:100%; max-width:300px;">
                            </td>
                            
                            <td>
                                
                                Created: <?php echo $date; ?><br>
                                
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                EMPLOYEE NAME :<?php echo $e_name; ?><br>
                                 EMPLOYEE ID :<?php echo $e_id; ?><br>
                                  ADDRESS :<?php echo $e_address; ?><br>
                            </td>
                            
                            <td>
                                COMPANY ADDRESS
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                    CATEGORY NAME  
                </td>
                
                <td>
                    CATEGORY ID 
                </td>
            </tr>
            
            <tr class="details">
                <td>
                    <?php echo $c_name; ?>
                </td>
                
                <td>
                    <?php echo $e_category; ?>
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                    DETAILS
                </td>
                
                <td>
                    COSTING
                </td>
            </tr>
            
            <tr class="item">
                <td>
                    BASE COST OF <?php echo $c_name; ?>
                </td>
                
                <td>
                   <?php echo $cost; ?>
                </td>
            </tr>
            
            <tr class="item">
                <td>
                    NUMBER OF <?php echo $c_name; ?> WORKDATA :
                </td>
                
                <td>
                    <?php echo $worked; ?>
                </td>
            </tr>
            
            <tr class="item last">
                <td>
                    
                </td>
                
                <td>
                    <?php echo   "{$worked} * {$cost} " ;  ?>
                </td>
            </tr>
            
            <tr class="total">
                <td></td>
                
                <td>
                   Total: <?php echo $total; ?>
                </td>
            </tr>
                       <tr class="total">
                <td><strong>ALL DATA CORRECT ??</strong></td>
                
                <td>
               <form action="pdfbill.php" method="post">
    			<input type="submit" name="submit" value="GENERATE" onclick="return confirm('Are You Sure ?');" />
				</form>
                </td>
            </tr>
        </table>
    </div>

</body>
</html>





