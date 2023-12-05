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
                <td>Kode Obat</td>
                <td>Nama Obat</td>
                <td>Harga Beli</td>
                <td>Harga Jual</td>
                <td>Satuan</td>
                <td>Stok</td>
            </tr>
            <?php
            include 'config/koneksi.php';
            $koneksi = mysqli_connect("localhost", "root", "");
            mysqli_select_db($koneksi,"db_apotek");
            $data = mysqli_query($koneksi, "select * from is_obat");
            while($dt = mysqli_fetch_array($data)){ ?>
            <tr>
                <td width="30%"><?php echo $dt['kode_obat']?></td>
                <td><?php echo $dt['nama_obat']?></td>
                <td><?php echo $dt['harga_beli']?></td>
                <td><?php echo $dt['harga_beli']?></td>
                <td><?php echo $dt['harga_beli']?></td>
                <td><?php echo $dt['stok']?></td>
            </tr>
            <?php } ?>
    </table>
    </body>
</html>