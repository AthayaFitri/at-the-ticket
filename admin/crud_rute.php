<?php
    require 'function.php';
    error_reporting(0);
    session_start();
    if(!isset($_SESSION['admin'])){
        header("Location: login_admin.php");
    }
    $sql = "SELECT *, transportasi.nama_transportasi, tempat.nama_tempat, transportasi_tipe.nama_tipe FROM rute 
            INNER JOIN tempat ON rute.nama_tempat_berangkat = tempat.nama_tempat
            INNER JOIN transportasi_tipe ON rute.id_transportasi_tipe = transportasi_tipe.id_transportasi_tipe
            INNER JOIN transportasi ON rute.id_transportasi = transportasi.id_transportasi order by tanggal_berangkat ASC";
    $rute = query($sql);

    if(isset($_POST['simpan-rute'])){
        if($_GET['page-rute'] == 'edit'){
            $id = $_GET['id-rt'];
            if(ubah_rute($_POST) > 0){
                echo "<script> alert('Edit Data Berhasil!'); document.location.href = 'crud_rute.php'; </script>";
            }else{
                echo "<script> alert('Data Gagal Diedit!'); document.location.href = 'crud_rute.php'; </script>";
            }
        }else 
        if(tambah_rute($_POST) > 0){
            echo "<script> alert('Simpan Data Berhasil!'); document.location.href = 'crud_rute.php'; </script>";
        }else{
            echo "<script> alert('Data Gagal Ditambahkan!'); document.location.href = 'crud_rute.php'; </script>";
        }
    }

    if(isset($_GET['page-rute'])){
        $id = $_GET['id-rt'];
        if($_GET['page-rute'] == 'hapus'){
            if(hapus_rute($id) > 0){
                echo "<script> alert('Hapus Data Berhasil!'); document.location.href = 'crud_rute.php'; </script>";
            }else{
                echo "<script> alert('Data Gagal Dihapus!'); document.location.href = 'crud_rute.php'; </script>";
            }
        }
        if($_GET['page-rute'] == 'edit'){
            $cekrute = mysqli_query($conn, "SELECT *, transportasi.nama_transportasi, tempat.nama_tempat, transportasi_tipe.nama_tipe FROM rute INNER JOIN tempat ON rute.nama_tempat_berangkat = tempat.nama_tempat
            INNER JOIN transportasi_tipe ON rute.id_transportasi_tipe = transportasi_tipe.id_transportasi_tipe
            INNER JOIN transportasi ON rute.id_transportasi = transportasi.id_transportasi 
            WHERE id_rute = $id");
            $data = mysqli_fetch_assoc($cekrute);
            if($data){
                $vidrt = $data['id_rute'];
                $vtglb = $data['tanggal_berangkat'];
                $vtgls = $data['tanggal_sampai'];
                $vwktb = $data['waktu_berangkat'];
                $vwkts = $data['waktu_sampai'];
                $vnatb = $data['nama_tempat_berangkat'];
                $vnats = $data['nama_tempat_sampai'];
                $vharga = $data['harga'];
                $vidtr = $data['id_transportasi'];
                $vnamat = $data['nama_transportasi'];
                $vidtt = $data['id_transportasi_tipe'];
                $vtipe = $data['nama_tipe'];
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>At The Ticket || Tempat</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="templates/css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3" href="dashboard.php">Menu Admin</a>
        <!-- Sidebar Toggle-->
        <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!">
            <i class="fas fa-bars"></i>
        </button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">

            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <!-- <li><a class="dropdown-item" href="#!">Settings</a></li>
            <li><a class="dropdown-item" href="#!">Activity Log</a></li>
            <li><hr class="dropdown-divider" /></li> -->
                    <li><a class="dropdown-item" href="logout_admin.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <div class="sb-sidenav-menu-heading">Core</div>
                        <a class="nav-link" href="dashboard.php">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-tachometer-alt"></i>
                            </div>
                            Data Transportasi
                        </a>
                        <div class="sb-sidenav-menu-heading">Edit</div>
                        <a class="nav-link collapsed active" href="#" data-bs-toggle="collapse"
                            data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-columns"></i>
                            </div>
                            Transportasi
                            <div class="sb-sidenav-collapse-arrow">
                                <i class="fas fa-angle-down"></i>
                            </div>
                        </a>
                        <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne"
                            data-bs-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link active" href="crud_rute.php">Rute</a>
                                <a class="nav-link" href="crud_transportasi.php">Transportasi</a>
                            </nav>
                        </div>
                        <a class="nav-link" href="crud_kelas.php">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-tachometer-alt"></i>
                            </div>
                            Kelas
                        </a>
                        <a class="nav-link" href="crud_perusahaan.php">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-tachometer-alt"></i>
                            </div>
                            Perusahaan
                        </a>
                        <a class="nav-link" href="crud_tempat.php">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-tachometer-alt"></i>
                            </div>
                            Bandara/Stasiun
                        </a>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4 mb-5">Data Rute</h1>

                    <div class="card mt-3">
                        <div class="card-header bg-primary text-white">
                            Input Data Rute Transportasi
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">
                                <input type="hidden" name="id-rt" id="id-rt" value="<?= @$vidrt; ?>">
                                <div class="mb-3">
                                    <label class="form-label" for="tglb">Tanggal Berangkat</label>
                                    <input class="form-control" type="date" name="tglb" id="tglb"
                                        value="<?= @$vtglb; ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="tgls">Tanggal Sampai</label>
                                    <input class="form-control" type="date" name="tgls" id="tgls"
                                        value="<?= @$vtgls; ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="wktb">Waktu Berangkat</label>
                                    <input class="form-control" type="time" name="wktb" id="wktb"
                                        value="<?= @$vwktb; ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="wkts">Waktu Sampai</label>
                                    <input class="form-control" type="time" name="wkts" id="wkts"
                                        value="<?= @$vwkts; ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="natb">Tempat Berangkat</label>
                                    <select class="form-select" name="natb" id="natb">
                                        <option value="<?= @$vnatb; ?>" selected><?= @$vnatb; ?></option>
                                        <?php 
                                $sql = "SELECT * FROM tempat";
                                $cektempat = query($sql);
                                foreach($cektempat as $row) :
                            ?>
                                        <option value="<?= $row["nama_tempat"]; ?>"><?= $row['nama_tempat']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="nats">Tempat Sampai</label>
                                    <select class="form-select" name="nats" id="nats">
                                        <option value="<?= @$vnats; ?>" selected><?= @$vnats; ?></option>
                                        <?php 
                                $sql = "SELECT * FROM tempat";
                                $cektempat = query($sql);
                                foreach($cektempat as $row) :
                            ?>
                                        <option value="<?= $row["nama_tempat"]; ?>"><?= $row['nama_tempat']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="harga">Harga</label>
                                    <input class="form-control" type="number" name="harga" id="harga"
                                        value="<?= @$vharga; ?>">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="id-tr">Nama Transportasi</label>
                                    <select class="form-select" name="id-tr" id="id-tr">
                                        <option value="<?= @$vidtr; ?>" selected><?= @$vnamat; ?></option>
                                        <?php 
                                $sql = "SELECT * FROM transportasi";
                                $cektransportasi = query($sql);
                                foreach($cektransportasi as $row) :
                            ?>
                                        <option value="<?= $row["id_transportasi"]; ?>">
                                            <?= $row['nama_transportasi']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="id-tt">Tipe Transportasi</label>
                                    <select class="form-select" name="id-tt" id="id-tt">
                                        <option value="<?= @$vidtt; ?>" selected><?= @$vtipe; ?></option>
                                        <?php 
                                $sql = "SELECT * FROM transportasi_tipe";
                                $cektipe = query($sql);
                                foreach($cektipe as $row) :
                            ?>
                                        <option value="<?= $row["id_transportasi_tipe"]; ?>"><?= $row['nama_tipe']; ?>
                                        </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <button class="btn btn-success" type="submit" name="simpan-rute">Simpan</button>
                                <button class="btn btn-danger" type="reset">Kosongkan</button>
                            </form>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-header bg-success text-white">
                            Data Rute Transportasi
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>Tanggal Berangkat</th>
                                    <th>Tanggal Sampai</th>
                                    <th>Waktu Berangkat</th>
                                    <th>Waktu Sampai</th>
                                    <th>Asal</th>
                                    <th>Tujuan</th>
                                    <th>Tipe</th>
                                    <th>Transportasi</th>
                                    <th>Harga</th>
                                    <th>Aksi</th>
                                </tr>
                                <?php foreach($rute as $row) : ?>
                                <tr>
                                    <td><?= $row["tanggal_berangkat"]; ?></td>
                                    <td><?= $row["tanggal_sampai"]; ?></td>
                                    <td><?= $row["waktu_berangkat"]; ?></td>
                                    <td><?= $row["waktu_sampai"]; ?></td>
                                    <td><?= $row["nama_tempat_berangkat"]; ?></td>
                                    <td><?= $row["nama_tempat_sampai"]; ?></td>
                                    <td><?= $row["nama_tipe"]; ?></td>
                                    <td><?= $row["nama_transportasi"]; ?></td>
                                    <td><?= $row["harga"]; ?></td>
                                    <td>
                                        <a class="btn btn-warning"
                                            href="crud_rute.php?page-rute=edit&id-rt=<?= $row['id_rute']; ?>">Edit</a>
                                        <a class="btn btn-danger"
                                            href="crud_rute.php?page-rute=hapus&id-rt=<?= $row['id_rute']; ?>">Hapus</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Your Website 2022</div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="templates/js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="templates/assets/demo/chart-area-demo.js"></script>
    <script src="templates/assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="templates/js/datatables-simple-demo.js"></script>
</body>

</html>