<?php
require('fpdf/fpdf.php');
class PDF extends FPDF {
    public $hPosX;
    public $hPosY;
    function FancyTable() {
        $this->SetFillColor(255,255,255);
        $this->SetTextColor(0,0,0);
        $this->SetDrawColor(128,0,0);
        $this->SetLineWidth(.3);
        $this->SetFont('','B');
        $this->headerTable();
     }

public function headerTable(){
$this->hPosX = 13;
$this->hPosY = 3;
$this->SetFillColor(255,255,255);
$this->SetTextColor(0);
$this->SetDrawColor(0,0,0);
$this->SetLineWidth(.3);
$this->SetFont( 'Arial', '', 10 );

		for($i=1; $i<=90;$i++){
			if($this->GetX() > 160){
			$this->hPosX  = 13;
			$this->hPosY  += 75; 
			}

				$this->Image("images/tut.jpg", 10, 5, 15 );		
				$this->SetXY($this->hPosX,$this->hPosY);
				$this->Cell(90,5,'Kartu Peserta Ujian'.$i,1,0,'L',true); 
				$this->hPosX += 95;
		
				//if($this->GetY() > 240 && $this->GetX() > 160){
				if($this->GetY() > 220 && $this->GetX() > 160){
				$this->SetAutoPageBreak(false);
				$this->AddPage();
				$this->hPosX = 15;
				$this->hPosY = 3;
				}
		}

}
}

$pdf = new PDF();
$pdf->SetTopMargin(10);
$pdf->SetFont('Arial','',14);
$pdf->AddPage();
$pdf->FancyTable();
$pdf->Output();
?>