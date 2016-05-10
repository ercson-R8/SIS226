<?php
if (!session_start()){
    session_start();
    }
    
require('bower_components/fpdf/fpdf.php');
require('mysqli_connect.php');
class PDF extends FPDF{
    // Page header
    function Header()
    {
        // Logo
        $this->Image('images/logo.png',10,11,30);
        // Arial bold 15
        $this->SetFont('Arial','B',24);
        // Move to the right
        $this->Cell(80);
        $this->Ln(0);
        // Title
        $title = "ABC Technical College";
        $this->Cell(0,24,$title,0,0,'C'); 
        $this->Ln(20);
        $this->SetFont('Arial','I',10);
        $title ="Stocks Report as of ".date("Y-m-d G:i:s");
        $this->Cell(0,0,$title,0,0,'C');
        // Line break
        $this->Ln(20);
    }

    // Page footer
    function Footer()
    {
        // Position at 1.5 cm from bottom
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Page number
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }
    
    // Load data
    function LoadData($file)
    {
        // Read file lines
        $lines = file($file);
        $data = array();
        foreach($lines as $line)
            $data[] = explode(';',trim($line));
        return $data;
    }

    // Colored table
    function FancyTable($header, $data)
    {
        // Colors, line width and bold font
        $this->SetFillColor(51,122,183);
        $this->SetTextColor(255);
        $this->SetDrawColor(0,0,20);
        $this->SetLineWidth(.1);
        $this->SetFont('','B');
        // Header
        $w = array(100, 40, 25, 25);
        for($i=0;$i<count($header);$i++)
            $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
        $this->Ln();
        // Color and font restoration
        $this->SetFillColor(224,235,255);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Data
        $fill = false;
        foreach($data as $row)
        {
            $this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
            $this->Cell($w[1],6,$row[1],'LR',0,'C',$fill);
            $this->Cell($w[2],6,number_format($row[2]),'LR',0,'C',$fill);
            $this->Cell($w[3],6,number_format($row[3]),'LR',0,'C',$fill);
            $this->Ln();
            $fill = !$fill;
        }
        // Closing line
        $this->Cell(array_sum($w),0,'','T');
    }
}

function queryDb( $table, $field, $key, $extra=""){
    require('mysqli_connect.php');
    $query ="SELECT * FROM ".$table." WHERE ".$field."=\"$key\" ".$extra;
    $response = @mysqli_query($dbc, $query);
    return (mysqli_fetch_array($response));
    
}



 
if(true) {
    $q = "SELECT * FROM item";
    $r = @mysqli_query($dbc, $q);
    $items = [];    // where the all item numbers and item names will be stored 
    $i = 0;         // current total number of items
    if ($r){
        while( $data = mysqli_fetch_array($r) ){
            $items[$i] = [$data['item_number'], $data['name']];
            $i += 1;
        }
    }
    $tblData = "";
    if(true){
        $j = 0;
        while($j < $i){
            // [i][0] is the item number [i][1] is the item name
            $row = queryDb( 'stock', 'item_number',$items[$j][0], 'ORDER BY stock_id DESC LIMIT 1');
            $tblData .= $items[$j][1].";".
                        $row['item_number'].";".
                        $row['balance_available'].";".
                        $row['balance_stock']."".
                        "\r\n";
            $j += 1;
        }  
    }
    mysqli_close($dbc);
}


// create a text file
$file = 'stocks.txt';
// Append a new person to the file
$current = $tblData;
// Write the contents back to the file
file_put_contents($file, $current);

$pdf = new PDF();
$pdf->AliasNbPages();
// Column headings
$header = array('Item Name', 'Item No.', 'Avail. Bal', 'Stock Bal');
$data1 = $pdf->LoadData('stocks.txt'); 
$pdf->SetFont('Arial','',12);

$pdf->AddPage();
$pdf->FancyTable($header, $data1);
$pdf->Output();

fclose ($file);
?>