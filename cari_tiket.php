<?php
    require 'admin/function.php';
    error_reporting(0);
    session_start();
    if(!isset($_SESSION['username'])){
        header("Location: login.php");
    }
    $datanull = false;
    if(isset($_POST["cari-tiket"])){
        $asal = $_POST['asal'];
        $tujuan = $_POST['tujuan'];
        $kelas = $_POST['kelas'];
        $jumlah = $_POST['penumpang'];
        $tglb = $_POST['tglb'];
        $tgls = $_POST['tgls'];

        if($kelas == 0){
            $sql = "SELECT *, SUBTIME(rute.waktu_sampai, rute.waktu_berangkat) AS durasi, $jumlah*rute.harga AS total, transportasi.nama_transportasi FROM rute 
                    INNER JOIN transportasi ON rute.id_transportasi = transportasi.id_transportasi
                    INNER JOIN tempat ON rute.nama_tempat_berangkat = tempat.nama_tempat
                    INNER JOIN transportasi_tipe ON rute.id_transportasi_tipe = transportasi_tipe.id_transportasi_tipe
                    WHERE rute.nama_tempat_berangkat = '$asal' AND rute.nama_tempat_sampai= '$tujuan'
                    AND rute.tanggal_berangkat = '$tglb' AND rute.tanggal_sampai = '$tgls'";
        }else{
            $sql = "SELECT *, SUBTIME(rute.waktu_sampai, rute.waktu_berangkat) AS durasi, $jumlah*rute.harga AS total, 
                    transportasi.nama_transportasi FROM rute 
                    INNER JOIN transportasi ON rute.id_transportasi = transportasi.id_transportasi
                    INNER JOIN tempat ON rute.nama_tempat_berangkat = tempat.nama_tempat
                    INNER JOIN transportasi_tipe ON rute.id_transportasi_tipe = transportasi_tipe.id_transportasi_tipe
                    INNER JOIN transportasi_kelas ON transportasi.id_transportasi_kelas = transportasi_kelas.id_transportasi_kelas
                    WHERE rute.nama_tempat_berangkat = '$asal' AND rute.nama_tempat_sampai= '$tujuan'
                    AND rute.tanggal_berangkat = '$tglb' AND rute.tanggal_sampai = '$tgls'
                    AND transportasi.id_transportasi_kelas = $kelas";
        }
        $pesawat = query($sql);
        if(($pesawat) == NULL ){
            $datanull = true;
        }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <title>At The Ticket</title>
</head>

<body>
    <div class="">

    </div>
    <div class="container">
        <div class="card mt-3">
            <div class="card-header bg-primary text-white">
                <h4>Daftar Tiket</h4>
                <?php
                    $sql = "SELECT * FROM tempat JOIN kota ON tempat.id_kota = kota.id_kota
                            WHERE tempat.nama_tempat = '$asal'";
                    $cekdata = query($sql);
                    foreach($cekdata AS $row) :
                ?>
                <h3><?= $row['nama_kota']; ?>(<?= $row['kode_tempat']; ?>)-<?= $asal; ?><?php break; ?> -->
                    <?php
                    endforeach;
                    $sql = "SELECT * FROM tempat JOIN kota ON tempat.id_kota = kota.id_kota
                            WHERE tempat.nama_tempat = '$tujuan'";
                    $cekdata = query($sql);
                    foreach($cekdata AS $row) :
                ?>
                    <?= $row['nama_kota']; ?>(<?= $row['kode_tempat']; ?>)-<?= $tujuan; ?><?php break; ?></h3>
                <?php 
                    endforeach; 
                    $sql = "SELECT DAYNAME('$tglb') AS hari, DAYOFMONTH('$tglb') AS tanggal,  
                    MONTHNAME('$tglb') AS bulan, YEAR('$tglb') AS tahun
                    FROM rute WHERE tanggal_berangkat = '$tglb'";
                    $cekdata = query($sql);
                    foreach($cekdata AS $row) :
                ?>
                <h5><?= $row['hari']; ?>, <?= $row['tanggal']; ?> <?= $row['bulan']; ?>
                    <?= $row['tahun']; ?><?php break; ?></h5>
                <?php endforeach; ?>
                <h5><?= $jumlah; ?> Penumpang</h5>
                <?php
                    $sql = "SELECT * FROM transportasi_kelas WHERE id_transportasi_kelas = $kelas";
                    $cekdata = query($sql);
                    foreach($cekdata AS $row) :
                ?>
                <h5><?= $row['nama_kelas']; ?><?php break; ?><?php endforeach; ?></h5>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <table class="table table-bordered table-striped">
                        <tr>
                            <th>Nama Maskapai</th>
                            <th>Berangkat</th>
                            <th>Tiba</th>
                            <th>Durasi</th>
                            <th>Total Harga</th>
                        </tr><?php
                        if($datanull){ ?>
                        <tr>
                            <td colspan="5" class="text-center">
                                <h3>Rute tidak tersedia.</h3>
                            </td>
                        </tr>
                        <?php } ?>
                        <?php foreach($pesawat AS $row) : ?>
                        <tr>
                            <td><?= $row["nama_transportasi"]; ?></td>
                            <td><?= $row["waktu_berangkat"]; ?></td>
                            <td><?= $row["waktu_sampai"]; ?></td>
                            <td><?= $row["durasi"]; ?></td>
                            <td>
                                <p>Rp.<?= $row["total"]; ?></p>
                            </td>
                        </tr>
                        <?php endforeach; } ?>
                    </table>
                </form>
                <div class="text-center mt-5">
                    <a href="logout.php" class="btn btn-danger">Logout</a>
                    <b>OR</b>
                    <a href="index.html" class="btn btn-warning">Back to Home</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>