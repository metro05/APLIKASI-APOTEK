<?php 
    // include 'authentikasi.php';
    // fungsi header dengan mengirimkan raw data excel
    header("Content-type: application/vnd-ms-excel");      
    // membuat nama file ekspor "data-anggota.xls"
    header("Content-Disposition: attachment; filename=Laporan Obat.xls"); 
?>
<html>
    <head>
        <title>Laporan Obat</title>
    </head>
    <body>
        <table border ="1" width="100%">
            <tr style="background: yellow   ;">
			<th> ID Obat</th>
			<th> Nama Obat</th>
			<th> Jumlah</th>
			<th> Modal</th>
			<th> Total</th>
			<th> Tanggal Input</th>
            </tr>
            <?php
            include 'config/koneksi.php';
            $koneksi = mysqli_connect("localhost", "root", "");
            mysqli_select_db($koneksi,"db_apotek");
            $query = mysqli_query($koneksi, "SELECT jual.kode_obat, is_obat.nama_obat, jual.jumlah, is_obat.harga_beli, jual.total, jual.tanggal_input FROM jual JOIN is_obat ON jual.kode_obat=is_obat.kode_obat");
            while ($hasil = mysqli_fetch_assoc($query)){ ?>
           <tr>
			<td><?php echo $hasil['kode_obat']?></td>
			<td><?php echo $hasil['nama_obat']?></td>
			<td><?php echo $hasil['jumlah']?></td>
			<td><?php echo "Rp. " . number_format($hasil['harga_beli'], 0, ",", "."); ?></td>
			<td><?php echo "Rp. " . number_format($hasil['total'], 0, ",", "."); ?></td>
			<td><?php echo $hasil['tanggal_input']?></td>
		    </tr>
            <?php } ?>
        <tfoot>
				<?php
				$sql_jumlah = mysqli_query($koneksi, "SELECT SUM(jual.jumlah) as jumlah, SUM(is_obat.harga_beli) AS modal, SUM(jual.total) AS total FROM jual JOIN is_obat ON jual.kode_obat = is_obat.kode_obat");
				$resutl = mysqli_fetch_assoc($sql_jumlah);
				$untung =  $resutl['total'] - $resutl['modal'];
				?>
				<tr style="background: blue; class="bg-primary text-center text-bold">
				<td colspan="2">Total Terjual</td>
				<td><?php echo $resutl['jumlah'] ?></td>
				<td><?php echo "Rp. " . number_format($resutl['modal'], 0, ",", "."); ?></td>
				<td><?php echo "Rp. " . number_format($resutl['total'],  0,",", "."); ?></td>
				<td><span class="bg-warning text-black">Keuntungan </span><br><?php echo "Rp. " . number_format($untung, 0, ",", "."); ?></td>
			</tr>
		</tfoot>
    </table>
    </body>
</html>