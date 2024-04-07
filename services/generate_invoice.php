<?php

require_once __DIR__ . '/../vendor/tecnickcom/tcpdf/tcpdf.php';

$userName = $_POST['userName'] ?? 'Unknown';
$userAddress = $_POST['userAddress'] ?? 'Unknown Address';
$pizzaName = $_POST['pizzaName'] ?? 'Unknown Pizza';
$pizzaSize = $_POST['pizzaSize'] ?? 'Unknown Size';
$pizzaPrice = $_POST['pizzaPrice'] ?? '0';
$specialWishes = $_POST['specialWishes'] ?? 'None';

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

$pdf->SetCreator("Pizza Latino");
$pdf->SetAuthor('Pizza Latino');
$pdf->SetTitle('Invoice');
$pdf->SetSubject('Invoice for Pizza Order');

$pdf->AddPage();

$html = <<<EOD
<h1>Rechnung</h1>
<p><strong>Name:</strong> $userName</p>
<p><strong>Adresse:</strong> $userAddress</p>
<p><strong>Bestellte Pizza:</strong> $pizzaName ($pizzaSize)</p>
<p><strong>Preis:</strong> $pizzaPrice €</p>
<p><strong>Sonderwünsche:</strong> $specialWishes</p>
EOD;

$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

$pdf->Output('invoice.pdf', 'I');
