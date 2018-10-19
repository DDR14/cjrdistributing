<?php
session_start();

$GLOBALS['output'] = true;
if (!$_GET) {
    # code...
    $GLOBALS['output'] = false;
}
require_once 'dist/fpdf/fpdf.php';
class PDF extends FPDF
{


// Page header    
    function Header()
    {
    // Logo - left - top - width
        $this->Image('images/customer-invoice-header.jpg',0,0,210);
    //(left, left-height, width, right-height)
        $this->Line(20,45,190,45);   
    }



    function content(){

        $none1 = $none2 = $none3 = "";

        require 'inc/inc.connection.php';



        if (isset($_SESSION['id']) && isset($_GET['id']) && isset($_GET['invoice']) ) {
    # code...

            $machine_id = preg_replace('/\D/', '', $_GET['id']);
            $invoice_id = preg_replace('/\D/', '', $_GET['invoice']);


            $sql = "SELECT a.*,b.*,c.* 
            FROM registers AS a
            INNER JOIN customer_invoice AS b
            ON 
            a.id = b.user_id
            INNER JOIN machines AS c
            ON 
            b.machine_id = c.new_machine_id
            WHERE 
            a.id='$_SESSION[id]' AND b.machine_id= '$machine_id' AND b.id = '$invoice_id' AND c.new_machine_id = '$machine_id' ";
        }else if (isset($_GET['user']) && isset($_GET['id']) && isset($_GET['invoice'])) {
    # code...

            $machine_id = preg_replace('/\D/', '', $_GET['id']);
            $invoice_id = preg_replace('/\D/', '', $_GET['invoice']);
            $user_id = preg_replace('/\D/', '', $_GET['user']);

            $sql = "SELECT a.*,b.*,c.* 
            FROM registers AS a
            INNER JOIN customer_invoice AS b
            ON 
            a.id = b.user_id
            INNER JOIN machines AS c
            ON 
            b.machine_id = c.new_machine_id
            WHERE 
            a.id='$user_id' AND b.machine_id= '$machine_id' AND b.id = '$invoice_id' AND c.new_machine_id = '$machine_id' ";

        }else{




            $GLOBALS['output'] = false;
            echo "<body style='background-color: #2c3e50; padding-top: 100px;'>
            <h1 style='text-align:center; color: #FFF; font-size: 75;'>404</h1>
            <h3 style='text-align:center; color: #FFF;'>PAGE NOT FOUND</h3>
            <p style='text-align:center; color: #FFF;'>The page you were looking for doesn't exist!</p>
        </body>";
        die();


    }


    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
        while($row = $result->fetch_assoc()) {



            $this -> SetY(50);
            $this -> SetX(30);
            $this ->SetTextColor(243,156,18);
            $this->SetFont('Arial','',12); 
            $this->Cell(250, 1, $row['name']);

            $this->Ln(8);
            $this -> SetX(30);
            $this->SetTextColor(0,0,0);
            $this->SetFont('Arial','',10); 
            $this->Cell(250, 1, $row['email']);

            $this->Ln(5);
            $this -> SetX(30);
            $this->SetTextColor(0,0,0);
            $this->SetFont('Arial','',10); 
            $this->Cell(250, 1, $row['phone']);

            $this->Ln(5);
            $this -> SetX(30);
            $this->SetTextColor(0,0,0);
            $this->SetFont('Arial','',10); 
            $this->Cell(250, 1, $row['country'].", ".$row['state']);


            $this -> SetY(57);
            $this -> SetX(125);
            $this->SetTextColor(0,0,0);
            $this->SetFont('Arial','U',20); 
            $this->Cell(250, 1, $row['invoice_code']);

            $this->Ln(5);
            $this -> SetY(63);
            $this -> SetX(136);
            $this->SetTextColor(0,0,0);
            $this->SetFont('Arial','',8); 
            $this->Cell(250, 1, "INVOICE CODE");



//(left, left-height, width, right-height)
            $this->Line(20,73,190,73);  


            $this -> SetY(200);
// Logo - left - top - width
            $this->Image('images/uploads/'.$row['img_main'],25,80,80);


            $this -> SetY(85);
            $this -> SetX(120);
            $this->SetTextColor(0,0,0);
            $this->SetFont('Arial','',10); 
            $this->Cell(250, 1, "Model Number: ".$row['machine_tonnage']."-".$row['type_abbr']."-".$row['cnc']."-".$row['factory']."-".$row['customized']);

            $this -> SetY(90);
            $this -> SetX(120);
            $this->SetTextColor(0,0,0);
            $this->SetFont('Arial','',10); 
            $this->Cell(250, 1, "Machine Type: ".$row['machine_type']);

            $this -> SetY(95);
            $this -> SetX(120);
            $this->SetTextColor(0,0,0);
            $this->SetFont('Arial','',10); 
            $this->Cell(250, 1, "Tonnage: ". $row['machine_tonnage'] ." Ton");

            $this -> SetY(105);
            $this -> SetX(120);
            $this->SetTextColor(243,156,18);
            $this->SetFont('Arial','',17); 
            $this->Cell(250, 1, "$".number_format($row['availability_final_price'], 2, '.', ','));

            $this -> SetY(110);
            $this -> SetX(120);
            $this->SetTextColor(0,0,0);
            $this->SetFont('Arial','',9); 

            if ($row['availability'] == "60 day Delivery") {
                # code...
                $this->Cell(250, 1, "ORDERED PRICE");
            }else{
                $this->Cell(250, 1, "IN-STOCK PRICE");
            }

            $this->SetTextColor(255,255,255);
            $this -> SetFillColor(243, 156, 18);
            $this->SetFont('Arial','',10); 


            $this -> SetY(140);
            $this -> SetX(20);

    //width, padding , color

            $this->Cell(55,10,'OFFERING',0,0,'L',TRUE);
            $this->Cell(65,10,'OPTION',0,0,'L',TRUE);
            $this->Cell(45,10,'PRICE',0,0,'R',TRUE);

            $this->SetTextColor(34,34,34);
            $this->SetFont('Arial','',10); 
            $this -> SetFillColor(239, 239, 239);

            $this->Ln(11);
            $this -> SetX(20);
            $this->Cell(55,8,'Availability',0,0,'L',0);
            $this->Cell(65,8,$row['availability'],0,0,'L',TRUE);
            $this->Cell(45,8,number_format($row['availability_final_price'], 2, '.', ','),0,0,'R',TRUE);

            $this->Ln(9);

            $this -> SetX(20);
            $this->Cell(55,8,'Requested Options',0,0,'L',0);
            $this->Cell(65,8,$row['requested_options'],0,0,'L',TRUE);
            $this->Cell(45,8,number_format($row['requested_options_final_price'], 2, '.', ','),0,0,'R',TRUE);

            $this->Ln(9);

            $this -> SetX(20);
            $this->Cell(55,8,'Power Requirement',0,0,'L',0);
            $this->Cell(65,8,$row['power_requirement'],0,0,'L',TRUE);
            $this->Cell(45,8,number_format($row['power_requirement_final_price'], 2, '.', ','),0,0,'R',TRUE);

            $this->Ln(9);

            $this -> SetX(20);
            $this->Cell(55,8,'Setup',0,0,'L',0);
            $this->Cell(65,8,$row['setup'],0,0,'L',TRUE);
            $this->Cell(45,8,number_format($row['setup_final_price'], 2, '.', ','),0,0,'R',TRUE);

            $this->Ln(9);

            $this -> SetX(20);
            $this->Cell(55,8,'Warranty',0,0,'L',0);
            $this->Cell(65,8,$row['warranty'],0,0,'L',TRUE);
            $this->Cell(45,8,number_format($row['warranty_final_price'], 2, '.', ','),0,0,'R',TRUE);

            $this->Ln(9);

            $this -> SetX(20);
            $this->Cell(55,8,'Post Cutting Automation',0,0,'L',0);
            $this->Cell(65,8,$row['post_cutting'],0,0,'L',TRUE);
            $this->Cell(45,8,number_format($row['post_cutting_final_price'], 2, '.', ','),0,0,'R',TRUE);

            $this->Ln(9);

            $this -> SetX(20);
            $this->Cell(55,8,'Shipping',0,0,'L',0);
            $this->Cell(65,8,$row['shipping'],0,0,'L',TRUE);
            $this->Cell(45,8,number_format($row['shipping_final_price'], 2, '.', ','),0,0,'R',TRUE);

            $this->Ln(9);

            $this -> SetX(20);
            $this->Cell(55,8,'Shipping Liability',0,0,'L',0);
            $this->Cell(65,8,$row['shipping_liability'],0,0,'L',TRUE);
            $this->Cell(45,8,number_format($row['shipping_liability_final_price'], 2, '.', ','),0,0,'R',TRUE);

            $this->Ln(15);





            $this -> SetX(20);
            $this->SetTextColor(231, 76, 60);
            $this->Cell(35,8,'The expenses for the following are excluded',0,0,'L',0);
            $this->Ln(5);
            $this -> SetX(20);
            $this->Cell(35,8,'from the grand total. Call us for pricing.',0,0,'L',0);

            $this -> SetX(105);
            $this->SetTextColor(0, 0, 0);
            $this->Cell(35,8,'TOTAL',0,0,'L',TRUE);
            $this->Cell(45,8,"$".number_format($row['invoice_total_price'], 2, '.', ','),0,0,'L',TRUE);

            $this -> Ln(5);

            if ($row['requested_options'] == "Roll Stand" || $row['requested_options'] == "Waste Recovery Roller" || $row['requested_options'] == "Waste Chipper") {
    # code...
                $this->Ln(5);
                $this -> SetX(20);
                $this->SetTextColor(231, 76, 60);
                $this->Cell(35,8,"- ".$row['requested_options'],0,0,'L',0);
            }else{
                $none1 = "ok";
            }
            if ($row['setup'] == "Onsite setup and Training") {
    # code...
                $this->Ln(5);
                $this -> SetX(20);
                $this->SetTextColor(231, 76, 60);
                $this->Cell(35,8,"- Airline Tickets (setup and Training)",0,0,'L',0);
            }else{
                $none2 = "ok";
            }

            if ($row['shipping'] == "Seller Handles Shipping") {
    # code...
                $this->Ln(5);
                $this -> SetX(20);
                $this->SetTextColor(231, 76, 60);
                $this->Cell(35,8,"- Shipping Cost",0,0,'L',0);
            }else{
                $none3 = "ok";
            }

            if ($none1 == "ok" && $none2 == "ok" && $none3 == "ok") {
    # code...
                $this->Ln(5);
                $this -> SetX(20);
                $this->Cell(35,8,"- NONE",0,0,'L',0);
            }


            $this->AddPage();

            $this -> SetY(30);
            $this -> SetX(100);
            $this -> Ln(30);
            $this -> SetX(40);
            $this->SetTextColor(0,0,0);
            $this->SetFont('Arial','',11); 
            $this->Cell(60, 1, "SPECIFICATIONS");

            $this->Ln(10);
            $fields = explode(';', $row['fields']);
            $values = explode(';', $row['values']);
            $count = count($fields);

            for ($i=0; $i < $count; $i++){
                if (strcasecmp($fields[$i],'Video') == 0){
                    $this->Cell(95,5,$fields[$i],0,0,'R');
                    $this -> SetX(105);
                    $this->Multicell(50,5,str_replace(';',"\n",$values[$i]),0,'L',false);
                }else{
                    $this->Cell(95,5,$fields[$i],0,0,'R');
                    $this->Cell(95,5,$values[$i],0,0,'L');
                    $this->Ln(5);
                }                                        
            }
//              $this -> SetY(30);
//            $this -> SetX(100);
//            $this -> Ln(30);
//            $this -> SetX(40);
//            $this->SetTextColor(0,0,0);
//            $this->SetFont('Arial','',11); 
//            $this->Cell(60, 1, "SPECIFICATIONS");
//
//            $this->Ln(10);
//            $this -> SetX(10);
//            $this->SetTextColor(0, 0, 0);
//            $this->SetFont('Arial','',10);
//            $this->Multicell(50,6,str_replace(';',"\n",$row['fields']),0,'R',false);
//
//            $this -> SetY(70);
//            $this -> SetX(60);
//            $this->SetTextColor(0,0,0);
//            $this->SetFont('Arial','',10);
//            $this->Multicell(140,6,str_replace(';',"\n",$row['values']),0,'L',false);
            
            
        }
    } else {
        echo "

        <body style='background-color: #2c3e50; padding-top: 100px;'>
            <h1 style='text-align:center; color: #FFF; font-size: 75;'>404</h1>
            <h3 style='text-align:center; color: #FFF;'>FILE NOT FOUND</h3>
            <p style='text-align:center; color: #FFF;'>The file you were looking for doesn't exist!</p>
        </body>

        ";
        $GLOBALS['output'] = false;
    }



} // content function


function Footer()
{

    require 'inc/inc.connection.php';

    $invoice_id = preg_replace('/\D/', '', $_GET['invoice']);

    $sql = "SELECT site, invoice_date FROM customer_invoice WHERE id = '$invoice_id'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
        while($row = $result->fetch_assoc()) {



$createDate = new DateTime($row['invoice_date']);

$strip = $createDate->format('M-d-Y');


            // Go to 1.5 cm from bottom
    $this->SetY( -15 ); 

    $this->SetFont( 'Arial', '', 10 ); 
    $this->SetTextColor(231, 76, 60);
    $this->Cell(0,10,$row['site'],0,0,'L');
    $this->SetX($this->lMargin);
    $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
    $this->SetX($this->lMargin);
    $this->Cell( 0, 10, $strip, 0, 0, 'R' );

        }
    }
}


} // fpdf class




// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->content();
if ($GLOBALS['output'] == true) {
    # code...
    $pdf->Output();
}







