<?php

require_once ROOTPATH . 'vendor/autoload.php';



// Load the Excel file or use your existing data source
// ...

// Create a new PDF instance
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator('Your Name');
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Table to PDF');
$pdf->SetSubject('Table to PDF');

// Set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetAutoPageBreak(true, PDF_MARGIN_BOTTOM);

// Add a page
$pdf->AddPage();

// Set font
$pdf->SetFont('helvetica', '', 12);

// Output HTML table content to PDF

// Output the HTML content to the PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Output PDF to the browser
$pdf->Output('Nota.pdf', 'I');

// Save the PDF file
$pdf->Output('output.pdf', 'I'); // 'D' for download, 'F' for save to file

exit;