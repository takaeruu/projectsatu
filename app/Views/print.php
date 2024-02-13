<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

  

    <title>Gudang</title>

    <style>
            .table{
                font-family: arial;
                color: #232323;
                border-collapse: collapse;
                width: 100%;
            }
            .table, th, td{
                border: 1px solid #999;
                padding: 8px 20 px;
            }
            .center {
                 display: block;
                 margin-left: auto;
                margin-right: auto;
                width: 65%;
            }
        </style>
</head>
<body>
<script type="text/javascript">
                window.print();
            </script>

       
      
		

        <h1 align="center">Gudang</h1>
        <img src="Elvan/Gambar/logoph.png" class="center" width="200px" height="auto">
     <table class="table datatable">
     <thead>

			  <tr>
				<th scope="col">No</th>
				<th scope="col">Nama Barang</th>
				<th scope="col">Kode Barang</th>
				<th scope="col">Stok</th>
				<th scope="col">Aksi</th>

			  </tr>
			</thead>

			
	
                <tbody>
				<?php
			
			$no=1;

	foreach ($darren as $key) {
		
	?>
	<tr>
	<td><?= $no++ ?></td>
	<td><?= $key->nama_barang ?></td>
	<td><?= $key->kode_barang ?></td>
	<td><?= $key->stok ?></td>
	
	<td>
     
			</tr>
			<?php } ?>
                </tbody>
     </table>
</body>
</html> -->

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
            width: 100%;
        }
        hr{
            height: 1px;
            background-color: black;
        }
        .atas {
            margin-top: 5px;
            }
        .tgl {
            margin-left: 80%;
        }
   </style>
</head>
<body>
    <img src=/Elvan/Web_PKL/public/img/kop.jpeg alt="" style="margin-top: -5px;">
    <br><br><br><br><br><br>
    <h6 class="atas" style="display: flex; justify-content: space-between;">
    <div>
        <p>NAMA PERUSAHAAN : Pt. Inspirasi Meta Jaya</p>
        <p>ALAMAT PERUSAHAAN : JL. METASARI 170 B, SIDAKARYA</p>
        <p>NOMOR PERUSAHAAN : 0361-308-6044</p>
    </div>
    <div>
        <p class="tgl">Batam, <?php echo date("D-d-M-Y"); ?></p>
    </div>
</h6>
    <table class="datatable" style="font-size: 10px; margin-top: -10px;">
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
                <td class="td1"><?= $no++ ?></td>
                <td class="td1"><?= $key->nama_barang ?></td>
                <td class="td1"><?= $key->kode_barang ?></td>
                <td class="td1"><?= $key->stok ?></td>	
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>