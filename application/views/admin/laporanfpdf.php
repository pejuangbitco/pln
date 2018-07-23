
<?php

// require('assets/phpfpdf/fpdf.php');
require("<?= base_url('assets/phpfpdf/fpdf.php') ?>");
class PDF extends FPDF
{
function Header()
{
    $this->SetFont('Arial','B',12);
    // $this->image('assets/images/watermark.jpg',0,0,230);
    $this->Cell(0,7,'BERITA ACARA PELAKSANAAN VERIFIKASI FISIK',0,1,'C');
    $this->Cell(0,7,'(PDP IV.II - 001)',0,1,'C');
    $this->SetFont('Arial','B',12);
    $this->Cell(35);
    $this->SetLineWidth(1);

}

function Footer()
{

    $this->SetY(-15);
    $this->SetFont('Arial','I',8);
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$pdf = new PDF;


$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetTitle('PT. PLN (PERSERO)');

$pdf->Cell(10,2,'',0,1);
$pdf->SetFont('Arial','',10);
$pdf->Cell(95,5,'Nama Program',1,0,'L');
$pdf->Cell(95,5,'Verifikasi Fisik',1,0,'L');
$pdf->Cell(10,5,'',0,1);
$pdf->SetFont('Arial','',10);
$pdf->Cell(95,5,'Kantor Disribusi',1,0,'L');
$pdf->Cell(95,5,'WS2JB',1,0,'L');
$pdf->Cell(10,5,'',0,1);
$pdf->SetFont('Arial','',10);
$pdf->Cell(95,5,'Area / Rayon',1,0,'L');
$pdf->Cell(95,5,'Area Palembang',1,0,'L');
$pdf->Cell(10,7,'',0,1);


$pdf->SetFont('Arial','',10);
$pdf->Cell(110,5,'Pada hari ini (                      ) Tanggal (                                             )',0,0,'L');
$pdf->Cell(80,5,'telah dilaksanakan verifikasi fisik atas pelanggan :',0,0,'L');
$pdf->Cell(10,5,'',0,1);
$pdf->Cell(40,5,'Nama',0,0);
$pdf->Cell(70,5,': ',0,0);
$pdf->Cell(30,5,'Tarif / Daya',0,0,'L');
$pdf->Cell(50,5,':',0,0,'L');
$pdf->Cell(10,5,'',0,1);
$pdf->Cell(40,5,'ID Pelanggan',0,0);
$pdf->Cell(70,5,':',0,0);
$pdf->Cell(30,5,'No Gardu',0,0,'L');
$pdf->Cell(50,5,':',0,0,'L');
$pdf->Cell(10,5,'',0,1);
$pdf->Cell(40,5,'Alamat',0,0);
$pdf->Cell(70,5,':',0,0);
$pdf->Cell(30,5,'Cluster',0,0,'L');
$pdf->Cell(50,5,':',0,0,'L');
$pdf->Cell(10,4,'',0,1);


$pdf->Cell(10,2,'',0,1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(56,5,'A. PEMERIKSAAN APP',1,0,'L');
$pdf->Cell(67,5,'DATA ASET LAMA',1,0,'C');
$pdf->Cell(67,5,'DATA ASET BARU',1,0,'C');
$pdf->Cell(10,5,'',0,1);
$pdf->SetFont('Arial','',10);
$pdf->Cell(56,5,'Nomor Meter',1,0,'L');
$pdf->Cell(67,5,$this->meter_m->get_row(['idpel' => $data->idpel])->id_meter,1,0,'L');
$pdf->Cell(67,5,'',1,0,'L');
$pdf->Cell(10,5,'',0,1);
$pdf->Cell(56,5,'Merk / Type Meter',1,0,'L');
$pdf->Cell(67,5,'',1,0,'L');
$pdf->Cell(67,5,'',1,0,'L');
$pdf->Cell(10,5,'',0,1);
$pdf->Cell(56,5,'Tahun Pembuatan',1,0,'L');
$pdf->Cell(67,5,'',1,0,'L');
$pdf->Cell(67,5,'',1,0,'L');
$pdf->Cell(10,5,'',0,1);
$pdf->Cell(56,5,'Kelas',1,0,'L');
$pdf->Cell(67,5,'',1,0,'L');
$pdf->Cell(67,5,'',1,0,'L');
$pdf->Cell(10,5,'',0,1);
$pdf->Cell(56,5,'Stand   H (LWBP)',1,0,'L');
$pdf->Cell(67,5,'',1,0,'L');
$pdf->Cell(67,5,'',1,0,'L');
$pdf->Cell(10,5,'',0,1);
$pdf->Cell(56,5,'             L (WBP)',1,0,'L');
$pdf->Cell(67,5,'',1,0,'L');
$pdf->Cell(67,5,'',1,0,'L');
$pdf->Cell(10,5,'',0,1);
$pdf->Cell(56,5,'             Total',1,0,'L');
$pdf->Cell(67,5,'',1,0,'L');
$pdf->Cell(67,5,'',1,0,'L');
$pdf->Cell(10,5,'',0,1);
$pdf->Cell(56,5,'Type Pembatas Arus',1,0,'L');
$pdf->Cell(67,5,'',1,0,'L');
$pdf->Cell(67,5,'',1,0,'L');
$pdf->Cell(10,5,'',0,1);
$pdf->Cell(56,5,'Merk Pembatas Arus',1,0,'L');
$pdf->Cell(67,5,'',1,0,'L');
$pdf->Cell(67,5,'',1,0,'L');
$pdf->Cell(10,5,'',0,1);
$pdf->Cell(56,5,'Arus',1,0,'L');
$pdf->Cell(67,5,'',1,0,'L');
$pdf->Cell(67,5,'',1,0,'L');
$pdf->Cell(10,5,'',0,1);
$pdf->Cell(56,5,'Trafo Arus (CT)',1,0,'L');
$pdf->Cell(67,5,'',1,0,'L');
$pdf->Cell(67,5,'',1,0,'L');
$pdf->Cell(10,5,'',0,1);
$pdf->Cell(56,5,'Trafo Tegangan (PT)',1,0,'L');
$pdf->Cell(67,5,'',1,0,'L');
$pdf->Cell(67,5,'',1,0,'L');
$pdf->Cell(10,5,'',0,1);
$pdf->Cell(56,5,'Faktor Kali',1,0,'L');
$pdf->Cell(67,5,'',1,0,'L');
$pdf->Cell(67,5,'',1,0,'L');
$pdf->Cell(10,5,'',0,1);
$pdf->Cell(56,5,'Box App',1,0,'L');
$pdf->Cell(67,5,'',1,0,'L');
$pdf->Cell(67,5,'',1,0,'L');
$pdf->Cell(10,12,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(56,5,'B. PERALATAN AMR',1,0,'L');
$pdf->Cell(67,5,'DATA ASET LAMA',1,0,'C');
$pdf->Cell(67,5,'DATA ASET BARU',1,0,'C');
$pdf->Cell(10,5,'',0,1);
$pdf->SetFont('Arial','',10);
$pdf->Cell(56,5,'Merk / Type Modem',1,0,'L');
$pdf->Cell(67,5,'',1,0,'L');
$pdf->Cell(67,5,'',1,0,'L');
$pdf->Cell(10,5,'',0,1);
$pdf->Cell(56,5,'No IMEI Modem',1,0,'L');
$pdf->Cell(67,5,'',1,0,'L');
$pdf->Cell(67,5,'',1,0,'L');
$pdf->Cell(10,5,'',0,1);
$pdf->Cell(56,5,'No SIM Card / Provider',1,0,'L');
$pdf->Cell(67,5,'',1,0,'L');
$pdf->Cell(67,5,'',1,0,'L');
$pdf->Cell(10,10,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(56,5,'C. PENGUKURAN DATA',0,0,'L');
$pdf->SetFont('Arial','',10);
$pdf->Cell(67,5,'Pengukuran Arus Primer',0,0,'L');
$pdf->Cell(67,5,'Pengukuran Tegangan Rendah',0,0,'L');
$pdf->Cell(10,5,'',0,1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(56,5,'    TERPASANG',0,0,'L');
$pdf->SetFont('Arial','',10);
$pdf->Cell(10,5,'IR',0,0,'L');
$pdf->Cell(35,5,'= ',0,0,'L');
$pdf->Cell(22,5,'Amp',0,0,'L');
$pdf->Cell(10,5,'R-N',0,0,'L');
$pdf->Cell(37,5,'= ',0,0,'L');
$pdf->Cell(20,5,'Volt',0,0,'L');
$pdf->Cell(10,5,'',0,1);

$pdf->Cell(56,5,' ',0,0,'L');
$pdf->Cell(10,5,'IS',0,0,'L');
$pdf->Cell(35,5,'= ',0,0,'L');
$pdf->Cell(22,5,'Amp',0,0,'L');
$pdf->Cell(10,5,'S-N',0,0,'L');
$pdf->Cell(37,5,'= ',0,0,'L');
$pdf->Cell(20,5,'Volt',0,0,'L');
$pdf->Cell(10,5,'',0,1);

$pdf->Cell(56,5,' ',0,0,'L');
$pdf->Cell(10,5,'IT',0,0,'L');
$pdf->Cell(35,5,'= ',0,0,'L');
$pdf->Cell(22,5,'Amp',0,0,'L');
$pdf->Cell(10,5,'T-N',0,0,'L');
$pdf->Cell(37,5,'= ',0,0,'L');
$pdf->Cell(20,5,'Volt',0,0,'L');
$pdf->Cell(10,5,'',0,1);

$pdf->Cell(56,5,'',0,0,'L');
$pdf->Cell(67,5,'Pengukuran Arus Sekunder',0,0,'L');
$pdf->Cell(67,5,'',0,0,'L');
$pdf->Cell(10,5,'',0,1);

$pdf->Cell(56,5,'',0,0,'L');
$pdf->Cell(10,5,'IR',0,0,'L');
$pdf->Cell(35,5,'= ',0,0,'L');
$pdf->Cell(22,5,'Amp',0,0,'L');
$pdf->Cell(10,5,'',0,0,'L');
$pdf->Cell(37,5,'',0,0,'L');
$pdf->Cell(20,5,'',0,0,'L');
$pdf->Cell(10,5,'',0,1);

$pdf->Cell(56,5,' ',0,0,'L');
$pdf->Cell(10,5,'IS',0,0,'L');
$pdf->Cell(35,5,'= ',0,0,'L');
$pdf->Cell(22,5,'Amp',0,0,'L');
$pdf->Cell(10,5,'',0,0,'L');
$pdf->Cell(37,5,'',0,0,'L');
$pdf->Cell(20,5,'',0,0,'L');
$pdf->Cell(10,5,'',0,1);

$pdf->Cell(56,5,' ',0,0,'L');
$pdf->Cell(10,5,'IT',0,0,'L');
$pdf->Cell(35,5,'= ',0,0,'L');
$pdf->Cell(22,5,'Amp',0,0,'L');
$pdf->Cell(10,5,'',0,0,'L');
$pdf->Cell(37,5,'',0,0,'L');
$pdf->Cell(20,5,'',0,0,'L');
$pdf->Cell(10,10,'',0,1);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(190,5,'D. KETERANGAN',1,1,'L');
$pdf->Cell(190,20,'',1,1,'L');

$pdf->Cell(10,7,'',0,1);
$pdf->Cell(56,7,'Pelaksana,',0,0,'C');
$pdf->Cell(34,7,'',0,0);
$pdf->Cell(60,7,'Operator AMR',0,0,'L');
$pdf->Cell(30,7,'Disaksikan Oleh,',0,0,'L');
$pdf->Cell(10,7,'',0,1);

$pdf->Cell(45,7,'1.',0,0,'L');
$pdf->Cell(45,7,'4.',0,0);
$pdf->Cell(60,7,'1.',0,0,'L');
$pdf->Cell(30,7,'',0,0,'L');
$pdf->Cell(10,7,'',0,1);

$pdf->Cell(45,7,'2.',0,0,'L');
$pdf->Cell(45,7,'5.',0,0);
$pdf->Cell(60,7,'',0,0,'L');
$pdf->Cell(30,7,'',0,0,'L');
$pdf->Cell(10,7,'',0,1);

$pdf->Cell(45,7,'3.',0,0,'L');
$pdf->Cell(45,7,'',0,0);
$pdf->Cell(55,7,'',0,0,'L');
$pdf->Cell(35,7,'.........................................',0,0,'L');
$pdf->Cell(10,7,'',0,1);
$pdf->Output(); 

?>