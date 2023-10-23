<?php
    $conn = mysqli_connect("localhost","root","Athaya192*#","travel");
    // Check connection
    if(!$conn){
        die("<script>alert('Gagal tersambung dengan database.')</script>");
    }

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function tambah_kelas($data){
    global $conn;
    $id = $data['id-tk'];
    $nama = htmlspecialchars($data['nama']);
    $tipe = $data['id-tt'];

    $sql = "INSERT INTO transportasi_kelas VALUES ('','$tipe','$nama')";
    $result = mysqli_query($conn, $sql);

    return mysqli_affected_rows($conn);
}

function hapus_kelas($id){
    global $conn;
    $sql = "DELETE FROM transportasi_kelas WHERE id_transportasi_kelas = $id"; 
    $result = mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
}

function ubah_kelas($data){
    global $conn;
    $id = $data['id-tk'];
    $nama = htmlspecialchars($data['nama']);
    $tipe = $data['id-tt'];

    $sql = "UPDATE transportasi_kelas SET id_transportasi_kelas = $id,
            nama_kelas = '$nama',
            id_transportasi_tipe = $tipe WHERE id_transportasi_kelas = $id";
    $result = mysqli_query($conn, $sql);

    return mysqli_affected_rows($conn);
}

function tambah_perusahaan($data){
    global $conn;
    $id = $data['id-tp'];
    $tipe = $data['id-tt'];
    $nama = htmlspecialchars($data['nama']);
    $logo = htmlspecialchars($data['logo']);

    $sql = "INSERT INTO transportasi_perusahaan VALUES ('','$tipe','$nama','$logo')";
    $result = mysqli_query($conn, $sql);

    return mysqli_affected_rows($conn);
}

function ubah_perusahaan($data){
    global $conn;
    $id = $data['id-tp'];
    $tipe = $data['id-tt'];
    $nama = htmlspecialchars($data['nama']);
    $logo = htmlspecialchars($data['logo']);

    $sql = "UPDATE transportasi_perusahaan SET id_transportasi_perusahaan = $id,
            nama_perusahaan = '$nama', logo_perusahaan = '$logo',
            id_transportasi_tipe = $tipe WHERE id_transportasi_perusahaan = $id";
    $result = mysqli_query($conn, $sql);

    return mysqli_affected_rows($conn);
}

function hapus_perusahaan($id){
    global $conn;
    $sql = "DELETE FROM transportasi_perusahaan WHERE id_transportasi_perusahaan = $id"; 
    $result = mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
}

function tambah_transportasi($data){
    global $conn;
    $id = $data['id-tr'];
    $kode = htmlspecialchars($data['kode']);
    $nama = htmlspecialchars($data['nama']);
    $kelas = $data['id-tk'];
    $tipe = $data['id-tt'];
    $qty = $data['qty'];
    $perusahaan = $data['id-tp'];

    $sql = "INSERT INTO transportasi VALUES ('','$kode','$nama','$kelas','$tipe','$qty','$perusahaan')";
    $result = mysqli_query($conn, $sql);

    return mysqli_affected_rows($conn);
}

function ubah_transportasi($data){
    global $conn;
    $id = $data['id-tr'];
    $kode = htmlspecialchars($data['kode']);
    $nama = htmlspecialchars($data['nama']);
    $kelas = $data['id-tk'];
    $tipe = $data['id-tt'];
    $qty = $data['qty'];
    $perusahaan = $data['id-tp'];

    $sql = "UPDATE transportasi SET id_transportasi = $id,
            kode_transportasi = '$kode',
            nama_transportasi = '$nama',
            id_transportasi_kelas = $kelas,
            id_transportasi_tipe = $tipe,
            jumlah_kursi = $qty,
            id_transportasi_perusahaan = $perusahaan
            WHERE id_transportasi = $id";
    $result = mysqli_query($conn, $sql);

    return mysqli_affected_rows($conn);
}

function hapus_transportasi($id){
    global $conn;
    $sql = "DELETE FROM transportasi WHERE id_transportasi = $id"; 
    $result = mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
}


function tambah_tempat($data){
    global $conn;
    $nama = htmlspecialchars($data['nama']);
    $kode = htmlspecialchars($data['kode']);
    $kota = $data['id-kt'];
    $tipe = $data['id-tt'];

    $sql = "INSERT INTO tempat VALUES ('$nama','$kode','$kota','$tipe')";
    $result = mysqli_query($conn, $sql);

    return mysqli_affected_rows($conn);
}

function hapus_tempat($nama){
    global $conn;
    $sql = "DELETE FROM tempat WHERE nama_tempat = '$nama'"; 
    $result = mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
}

function ubah_tempat($data){
    global $conn;
    $nama = htmlspecialchars($data['nama']);
    $kode = htmlspecialchars($data['kode']);
    $kota = $data['id-kt'];
    $tipe = $data['id-tt'];

    // var_dump($data);
    // die;

    $sql = "UPDATE tempat SET nama_tempat = '$nama',
            kode_tempat = '$kode',
            id_kota = '$kota',
            id_transportasi_tipe = '$tipe' 
            WHERE nama_tempat = '$nama'";
    $result = mysqli_query($conn, $sql);

    

    return mysqli_affected_rows($conn);
}

function tambah_rute($data){
    global $conn;
    $id = $data['id-rt'];
    $tglb = $data['tglb'];
    $tgls = $data['tgls'];
    $wktb = $data['wktb'];
    $wkts = $data['wkts'];
    $natb = $data['natb'];
    $nats = $data['nats'];
    $harga = $data['harga'];
    $transportasi = $data['id-tr'];
    $tipe = $data['id-tt'];

    $sql = "INSERT INTO rute VALUES ('','$tglb','$tgls','$wktb','$wkts','$natb','$nats','$harga',
            '$transportasi','$tipe')";
    $result = mysqli_query($conn, $sql);

    return mysqli_affected_rows($conn);
}

function hapus_rute($id){
    global $conn;
    $sql = "DELETE FROM rute WHERE id_rute = $id"; 
    $result = mysqli_query($conn, $sql);
    return mysqli_affected_rows($conn);
}

function ubah_rute($data){
    global $conn;
    $id = $data['id-rt'];
    $tglb = $data['tglb'];
    $tgls = $data['tgls'];
    $wktb = $data['wktb'];
    $wkts = $data['wkts'];
    $natb = $data['natb'];
    $nats = $data['nats'];
    $harga = $data['harga'];
    $transportasi = $data['id-tr'];
    $tipe = $data['id-tt'];

    $sql = "UPDATE rute SET 
            id_rute = $id,
            tanggal_berangkat = '$tglb',
            tanggal_sampai = '$tgls',
            waktu_berangkat = '$wktb',
            waktu_sampai = '$wkts',
            nama_tempat_berangkat = '$natb',
            nama_tempat_sampai = '$nats',
            harga = $harga,
            id_transportasi = $transportasi,
            id_transportasi_tipe = $tipe WHERE id_rute = $id";
    $result = mysqli_query($conn, $sql);

    return mysqli_affected_rows($conn);
}

?>