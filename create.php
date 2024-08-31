
<?php
    // update file koneksi, untuk koneksikan ke database
    include "service/database.php";

    // 
    function input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    //cek apkah ada kiriman form dari meth
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $nama=input($_POST["nama"]);
        $sekolah=input($_POST["sekolah"]);
        $jurusan=input($_POST["jurusan"]);
        $no_hp=input($_POST["no_hp"]);
        $alamat=input($_POST["alamat"]);
    }

    //Query input menginput data kedalam tabel anggota
    $sql="INSERT INTO peserta (nama,sekolah,jurusan,no_hp,alamat) VALUES
    ('$nama','$sekolah','$jurusan','$no_hp','$alamat')";
    
    //Mengeksekusi/menjalankan query diatas
    $hasil=mysqli_query($db,$sql);

    //Kondisi apakah berhasil atau tidak dalam mengeksekusi query diatas
    if ($hasil) {
        header("Location:dashboard.php");
    }
    else {
        echo "div class='alert alert-danger'> Data Gagal disimpan.</div>";
    }

?>