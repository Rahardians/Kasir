<?php 
   
    header("Content-Type:   application/vnd.ms-excel; charset=utf-8");
    header("Content-Disposition: attachment; filename=data-laporan-".date('Y-m-d').".xls");  //File name extension was wrong
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Cache-Control: private",false); 

    require 'config.php';
    include $view;
    $lihat = new view($config);

    $bulan_tes =array(
        '01'=>"Januari",
        '02'=>"Februari",
        '03'=>"Maret",
        '04'=>"April",
        '05'=>"Mei",
        '06'=>"Juni",
        '07'=>"Juli",
        '08'=>"Agustus",
        '09'=>"September",
        '10'=>"Oktober",
        '11'=>"November",
        '12'=>"Desember"
    );
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
	<!-- view barang -->	
    <!-- view barang -->	
    <div class="modal-view">
        <h3 style="text-align:center;"> 
                <?php if(!empty($_GET['cari'])){ ?>
                    Data Laporan Penjualan <?= $bulan_tes[$_GET['bln']];?> <?= $_GET['thn'];?>
                <?php }elseif(!empty($_GET['hari'])){?>
                    Data Laporan Penjualan <?= $_GET['tgl'];?>
                <?php }else{?>
                    Data Laporan Penjualan <?= $bulan_tes[date('m')];?> <?= date('Y');?>
                <?php }?>
        </h3>
        <table border="1" width="100%" cellpadding="3" cellspacing="4">
            <thead>
                <tr bgcolor="yellow">
                    <th> No</th>
                    <th> ID Barang</th>
                    <th> Nama Barang</th>
                    <th style="width:10%;"> Jumlah</th>
                    <th style="width:10%;"> Modal</th>
                    <th style="width:10%;"> Total</th>
                    <th> Kasir</th>
                    <th> Pelanggan</th>
                    <th> Tanggal Input</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $no=1; 
                    $koneksi = mysqli_connect("localhost","root","","db_toko");
                    if(!empty($_GET['cari'])){
                        $periode = $_GET['bln'].'-'.$_GET['thn'];
                        $no=1; 
                        $jumlah = 0;
                        $bayar = 0;
                        if ($_GET['bln']=='kosong') {
                        $sqltahun = mysqli_query($koneksi,"SELECT nota.* , barang.id_barang, barang.nama_barang, barang.harga_beli, kasir.id_kasir,
                            kasir.nama from nota 
                           left join barang on barang.id_barang=nota.id_barang 
                           left join kasir on kasir.id_kasir=nota.id_kasir WHERE nota.tanggal_input LIKE '%".$_GET['thn']."%' 
                           ORDER BY id_nota ASC");
                        $hasil = $sqltahun;
                        }else{
                        $sql1 = mysqli_query($koneksi,"SELECT nota.* , barang.id_barang, barang.nama_barang, barang.harga_beli, kasir.id_kasir,
                            kasir.nama from nota 
                           left join barang on barang.id_barang=nota.id_barang 
                           left join kasir on kasir.id_kasir=nota.id_kasir WHERE nota.periode = '".$periode."' 
                           ORDER BY id_nota ASC");
                        $hasil = $sql1;
                        }
                    }elseif(!empty($_GET['hari'])){
                        $hari = $_GET['tgl'];
                        $no=1; 
                        $jumlah = 0;
                        $bayar = 0;
                        $hasil = $lihat -> hari_jual($hari);
                    }else{
                        $hasil = $lihat -> jual();
                    }
                ?>
                <?php 
                    $bayar = 0;
                    $jumlah = 0;
                    $modal = 0;
                    foreach($hasil as $isi){ 
                        $bayar += $isi['total'];
                        $modal += $isi['harga_beli'] * $isi['jumlah'];
                        $jumlah += $isi['jumlah'];
                ?>
                <tr>
                    <td><?php echo $no;?></td>
                    <td><?php echo $isi['id_barang'];?></td>
                    <td><?php echo $isi['nama_barang'];?></td>
                    <td><?php echo $isi['jumlah'];?> </td>
                    <td>Rp.<?php echo number_format($isi['harga_beli']* $isi['jumlah']);?>,-</td>
                    <td>Rp.<?php echo number_format($isi['total']);?>,-</td>
                    <td><?php echo $isi['nama'];?></td>
                    <td><?php echo $isi['nama_pelanggan'];?></td>
                    <td><?php echo $isi['tanggal_input'];?></td>
                </tr>
                <?php $no++; }?>
                <tr>
                    <td>-</td>
                    <td>-</td>
                    <td><b>Total Terjual</b></td>
                    <td><b><?php echo $jumlah;?></b></td>
                    <td><b>Rp.<?php echo number_format($modal);?>,-</b></td>
                    <td><b>Rp.<?php echo number_format($bayar);?>,-</b></td>
                    <td><b>Keuntungan</b></td>
                    <td><b>
                        Rp.<?php echo number_format($bayar-$modal);?>,-</b></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>
</html>