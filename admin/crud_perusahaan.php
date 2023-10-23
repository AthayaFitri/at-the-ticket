<?php
    require 'function.php';
    error_reporting(0);
    session_start();
    if(!isset($_SESSION['admin'])){
        header("Location: login_admin.php");
    }
    $sql = "SELECT *, transportasi_tipe.nama_tipe FROM transportasi_perusahaan JOIN transportasi_tipe ON transportasi_perusahaan.id_transportasi_tipe = transportasi_tipe.id_transportasi_tipe";
    $perusahaan = query($sql);

    if(isset($_POST['simpan-perusahaan'])){
        if($_GET['page-perusahaan'] == 'edit'){
            $id = $_GET['id-tp'];
            if(ubah_perusahaan($_POST) > 0){
                echo "<script> alert('Edit Data Berhasil!'); document.location.href = 'crud_perusahaan.php'; </script>";
            }else{
                echo "<script> alert('Data Gagal Diedit!'); document.location.href = 'crud_perusahaan.php'; </script>";
            }
        }else 
        if(tambah_perusahaan($_POST) > 0){
            echo "<script> alert('Simpan Data Berhasil!'); document.location.href = 'crud_perusahaan.php'; </script>";
        }else{
            echo "<script> alert('Data Gagal Ditambahkan!'); document.location.href = 'crud_perusahaan.php'; </script>";
        }
    }

    if(isset($_GET['page-perusahaan'])){
        $id = $_GET['id-tp'];
        if($_GET['page-perusahaan'] == 'hapus'){
            if(hapus_perusahaan($id) > 0){
                echo "<script> alert('Hapus Data Berhasil!'); document.location.href = 'crud_perusahaan.php'; </script>";
            }else{
                echo "<script> alert('Data Gagal Dihapus!'); document.location.href = 'crud_perusahaan.php'; </script>";
            }
        }
        if($_GET['page-perusahaan'] == 'edit'){
            $cekperusahaan = mysqli_query($conn, "SELECT *, transportasi_tipe.nama_tipe FROM transportasi_perusahaan JOIN transportasi_tipe ON transportasi_perusahaan.id_transportasi_tipe = transportasi_tipe.id_transportasi_tipe WHERE id_transportasi_perusahaan = $id");
            $data = mysqli_fetch_assoc($cekperusahaan);
            if($data){
                $vidtp = $data['id_transportasi_perusahaan'];
                $vnama = $data['nama_perusahaan'];
                $vlogo = $data['logo_perusahaan'];
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
    <title>At The Ticket || Perusahaan</title>
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
                        <a class="nav-link collapsed" href="#" data-bs-toggle="collapse"
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
                                <a class="nav-link" href="crud_rute.php">Rute</a>
                                <a class="nav-link" href="crud_transportasi.php">Transportasi</a>
                            </nav>
                        </div>
                        <a class="nav-link" href="crud_kelas.php">
                            <div class="sb-nav-link-icon">
                                <i class="fas fa-tachometer-alt"></i>
                            </div>
                            Kelas
                        </a>
                        <a class="nav-link active" href="crud_perusahaan.php">
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
                    <h1 class="mt-4 mb-5">Data Perusahaan</h1>

                    <div class="card mt-3">
                        <div class="card-header bg-primary text-white">
                            Input Data Perusahaan Transportasi
                        </div>
                        <div class="card-body">
                            <form action="" method="POST">
                                <input type="hidden" name="id-tp" id="id-tp" value="<?= @$vidtp; ?>">
                                <div class="mb-3">
                                    <label class="form-label" for="nama">Nama Perusahaan</label>
                                    <input class="form-control" type="text" name="nama" id="nama"
                                        placeholder="Input Nama Perusahaan" value="<?= @$vnama; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label" for="logo">Logo Perusahaan</label>
                                    <input class="form-control" type="text" name="logo" id="logo"
                                        value="<?= @$vlogo; ?>" required>
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
                                <button class="btn btn-success" type="submit" name="simpan-perusahaan">Simpan</button>
                                <button class="btn btn-danger" type="reset">Kosongkan</button>
                            </form>
                        </div>
                    </div>
                    <div class="card mt-3">
                        <div class="card-header bg-success text-white">
                            Data Perusahaan Transportasi
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-striped">
                                <tr>
                                    <th>Nama Perusahaan</th>
                                    <th>Logo Perusahaan</th>
                                    <th>Tipe</th>
                                    <th>Aksi</th>
                                </tr>
                                <?php foreach($perusahaan as $row) : ?>
                                <tr>
                                    <td><?= $row["nama_perusahaan"]; ?></td>
                                    <td><?= $row["logo_perusahaan"]; ?></td>
                                    <td><?= $row["nama_tipe"]; ?></td>
                                    <td>
                                        <a class="btn btn-warning"
                                            href="crud_perusahaan.php?page-perusahaan=edit&id-tp=<?= $row['id_transportasi_perusahaan']; ?>">Edit</a>
                                        <a class="btn btn-danger"
                                            href="crud_perusahaan.php?page-perusahaan=hapus&id-tp=<?= $row['id_transportasi_perusahaan']; ?>">Hapus</a>
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