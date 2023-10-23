<?php
    require 'admin/function.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="style2.css">
    <title>At The Ticket</title>
</head>

<body>
    <header>
        <nav class="fixed-top bg-light">
            <div class="container">
                <ol>
                    <li><a href="index.html"></a><img src="images/at the ticket.png"></a></li>
                    <li><a href="index.html">Home</a></a></li>
                    <li><a href="crud_menupesawat.php">Jadwal Pesawat</a></a></li>
                    <li><a href="crud_menukereta.php" class="active">Jadwal Kereta Api</a></a></li>
                    <li><a href="register.php">Daftar</a></a></li>
                    <li><a href="login.php">Masuk</a></a></li>
                    <li><a href="about.html">About Us</a></a></li>
                </ol>
            </div>
        </nav>
    </header><br>
    <div class="container">
        <div class="card mt-4">
            <div class="card-header bg-primary text-white">
                Kereta
            </div>
            <div class="card-body">
                <form action="cari_tiket.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label" for="asal">Kota Asal</label>
                        <select class="form-select" name="asal" id="asal" required>
                            <option>Pilih Stasiun</option>
                            <?php 
                                $sql = "SELECT *, tempat.nama_tempat FROM kota JOIN tempat ON kota.id_kota = tempat.id_kota
                                        WHERE tempat.id_transportasi_tipe = 2";
                                $cekkota = query($sql);
                                foreach($cekkota as $row) :
                            ?>
                            <option value="<?= $row['nama_tempat']; ?>">
                                <?= $row['nama_kota']; ?>-<?= $row['nama_tempat']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="tujuan">Kota Tujuan</label>
                        <select class="form-select" name="tujuan" id="tujuan" required>
                            <option>Pilih Stasiun</option>
                            <?php 
                                $sql = "SELECT *, tempat.nama_tempat FROM kota JOIN tempat ON kota.id_kota = tempat.id_kota
                                        WHERE tempat.id_transportasi_tipe = 2";
                                $cekkota = query($sql);
                                foreach($cekkota as $row) :
                            ?>
                            <option value="<?= $row['nama_tempat']; ?>">
                                <?= $row['nama_kota']; ?>-<?= $row['nama_tempat']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="kelas">Kelas</label>
                        <select class="form-select" name="kelas" id="kelas" required>
                            <option value="0" selected>Semua Kelas</option>
                            <?php 
                                $sql = "SELECT * FROM transportasi_kelas WHERE id_transportasi_tipe = 2";
                                $cekkelas = query($sql);
                                foreach($cekkelas as $row) :
                            ?>
                            <option value=" <?= $row['id_transportasi_kelas']; ?>"><?= $row['nama_kelas']; ?>
                            </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="penumpang">Jumlah Penumpang</label>
                        <input class="form-control" type="number" name="penumpang" id="penumpang" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="tglb">Tanggal Berangkat</label>
                        <input class="form-control" type="date" name="tglb" id="tglb" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="tgls">Tanggal Sampai</label>
                        <input class="form-control" type="date" name="tgls" id="tgls" required>
                    </div>
                    <button class="btn btn-primary" type="submit" name="cari-tiket">Cari Tiket</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>