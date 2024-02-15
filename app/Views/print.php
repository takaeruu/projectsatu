<?php

require_once FCPATH. 'tcpdf/tcpdf.php';
$imagePath = 'https://i.postimg.cc/bYTDFsYg/kop.jpg';
$imageWidth = 50;
$imageHeight = 50;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            font-family: Arial, sans-serif;
            color: #232323;
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
           
            padding: 8px 20px;
            text-align: center;
           
        }
        .th1, .td1 {
            border-bottom: 1px solid #ddd;
        }

        .center {
            display: block;
            margin-left: auto;
            margin-right: auto;
            width: 65%;
        }
        img {
            display: block;
            margin-left: auto;
            margin-right: auto;
        }
        hr{
            height: 1px;
            background-color: black;
        }
        .atas {
            margin-top: 5px;
        }
        .kanan {
            margin-left: 1400px;
            margin-top: -75px;
        }
   </style>
</head>
<body>

<img src="https://i.postimg.cc/bYTDFsYg/kop.jpg"  alt="" style="margin-top: -5px;" width="1550" height="270">

<table style="font-size: 10px;">
<tr>
    <td style="text-align: left;">
      <p>NAMA PERUSAHAAN : Pt. Inspirasi Meta Jaya</p>
      <p>ALAMAT PERUSAHAAN : JL. METASARI 170 B, SIDAKARYA</p>
      <p>NOMOR PERUSAHAAN : 0361-308-6044</p>
      <p></p>
      <p></p>
      <p></p>
    </td>
    
    <td style="text-align: right;">
      <p style="margin-bottom: 10px;">Batam, <?php echo date("D-d-M-Y"); ?></p>
      <p></p>
      <p></p>
      <p></p>
      <p></p>
      <p></p>
      <p style="height: 60px;"></p>
    </td>
  </tr>
</table>
    <table class="datatable" style="font-size: 10px; margin-top: 25px;">
        <thead>
            <tr style="background-color: #f2f2f2">
                <th scope="col" class="th1">No</th>
                <th scope="col" class="th1">Nama Barang</th>
                <th scope="col" class="th1">Kode Barang</th>
                <th scope="col" class="th1">Stok</th>                
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($darren as $key) {
            ?>
            <tr>
                <td class="td1" style="text-align: left;"><?= $no++ ?></td>
                <td class="td1" style="text-align: left;"><?= $key->nama_barang ?></td>
                <td class="td1" style="text-align: left;"><?= $key->kode_barang ?></td>
                <td class="td1" style="text-align: left;"><?= $key->stok ?></td>		
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <!-- <script type="text/javascript">
        window.print();
    </script> -->
</body>
</html>