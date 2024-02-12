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
$html = '
    <div class="card-header bg-white border-0 pb-0 pt-4">
        <h5 class="card-title mb-0 text-center"><b align="center">NOTA</b></h5>
        <div class="row text-center">
            <div class="col-6 col-sm-7 pr-0">
                <ul class="pl-0 small" style="list-style: none;text-transform: uppercase;">
                    <li>KASIR : ' . session()->get('nama') . '</li>
                    <li align="right">TGL : ' . date("j-m-Y") . '</li>
                    <li align="right">JAM : ' . date("G:i:s") . '</li>
                </ul>
            </div>
            <div class="col-4 col-sm-3 pl-0">
                <ul class="pl-0 small" style="list-style: none;" align="right">
                    
                </ul>
            </div>
        </div>
    </div>
    <div class="card-body small pt-0">
        <hr class="mt-0">
        <table class="table">
            <thead>
                <tr align="center">
                    <th scope="col">Nama Pasien</th>
                    <th scope="col">Resep</th>
                    <th scope="col">Harga</th>
                </tr>
            </thead>
            <tbody>';

// Loop through $nota array to generate table rows
foreach ($nel as $kat ) {
    $html .= '
        <tr align="center">
            <td>' . $kat->nama_pasien . '</td>
            <td>' . $kat->resep . '</td>
            <td>' . $kat->harga . '</td>
        </tr>';
        
}

$html .= '</tbody></table>';


// Additional table for Total, Bayar, and Kembalian
$html .= '

    <table class="table">
        <div class="col-12">
            <ul class="list-group border-0">
                <li class="list-group-item p-0 border-0 d-flex justify-content-between align-items-center">
                    <b>Total</b>
                    <span><b>' . $tot_bayar . '</b></span>
                </li>
                <li class="list-group-item p-0 border-0 d-flex justify-content-between align-items-center">
                    <b>Bayar</b>
                    <span><b>' . $kat->bayar . '</b></span>
                </li>
                <li class="list-group-item p-0 border-0 d-flex justify-content-between align-items-center">
                    <b>Kembalian</b>
                    <span><b>' . $kat->kembalian . '</b></span>
                </li>
            </ul>
        </div>
    </table>
</div>';

// Output the HTML content to the PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Output PDF to the browser
$pdf->Output('Nota.pdf', 'I');

// Save the PDF file
$pdf->Output('output.pdf', 'I'); // 'D' for download, 'F' for save to file

exit;