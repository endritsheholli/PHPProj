<?php
require('../fpdf.php');
$d=date('d_m_Y');

class PDF extends FPDF
{

function Header()
{
    $this->SetFont('Helvetica','',25);
	$this->SetFontSize(40);
    $this->Cell(80);
    $this->Ln();
}

function Footer()
{
   
}

function LoadData($file)
{
	$lines=file($file);
	$data=array();
	foreach($lines as $line)
		$data[]=explode(';',chop($line));
	return $data;
}

function BasicTable($header,$data)
{ 

$this->SetFillColor(200,255,255);
$w=array(20,40,20,27,34,33,20,27,18,15,15,15,15);
	
	
	$this->SetFont('Arial','B',12);
	for($i=0;$i<count($header);$i++)
		$this->Cell($w[$i],8,$header[$i],1,0,'L',true);
	$this->Ln();
	
	$this->SetFont('Arial','',12);
	foreach ($data as $eachResult) 
	{ 
		$this->Cell(20,6,$eachResult["Product_ID"],1);
		$this->Cell(40,6,$eachResult["productName"],1);
		$this->Cell(20,6,$eachResult["Category_ID"],1);
		$this->Cell(27,6,$eachResult["Model"],1);
        $this->Cell(34,6,$eachResult["Type"],1);
		$this->Cell(33,6,$eachResult["Warehouse_ID"],1);
		$this->Cell(20,6,$eachResult["Price"],1);
		
		$this->Ln();
		 	 	 	 	
	}
}

}



$pdf=new PDF();

	

$header=array('Product ID','Product Name','Category ID','Model','Type','Warehouse_ID','Price');

$db_username = 'root';
$db_password = '';
$db_name = 'somstore';
$db_host = 'localhost';
$mysqli = new mysqli($db_host, $db_username, $db_password,$db_name);

$currDate = date('Y-m-d');
$strSQL = "Select* from product";
$objQuery = mysqli_query($mysqli,$strSQL);
$resultData = array();
for ($i=0;$i<mysqli_num_rows($objQuery);$i++) {
	$result = mysqli_fetch_array($objQuery);
	array_push($resultData,$result);
}
$pdf->AddPage();
	
	$pdf->SetFont('Helvetica','b',14);
	$pdf->Cell(55);
	$pdf->Write(5, ' SOMSTORE PRODUCT DATA REPORT ');
	$pdf->Ln();
	
	$pdf->SetFont('Helvetica','b',12);
	$pdf->Cell(75);
	$pdf->Write(5, 'PRODUCT REPORT');
	$pdf->Ln();
	
	$pdf->Cell(22);
	$pdf->SetFontSize(7);
	$pdf->Cell(57);
	$result=mysqli_query($mysqli,"select date_format(now(), '%W, %M %d, %Y') as date");
	while( $row=mysqli_fetch_array($result) )
	{
		$pdf->Write(5,$row['date']);
	}
	$pdf->Ln();
	
	$pdf->Cell(0);
	$pdf->SetFontSize(10);
	$pdf->Cell(54);
	$pdf->Ln(-1);
	
	$result=mysqli_query($mysqli,"Select * from product") or die ("Database query failed: $query" . mysqli_error());
	
	$count = mysqli_num_rows($result);
	$pdf->Cell(0);
	$pdf->Write(5, ' Product Record Report: '.$count.'');
	$pdf->Ln();

	$pdf->Ln(5);

$pdf->Ln(0);
$pdf->BasicTable($header,$resultData);
$pdf->Output();

?>