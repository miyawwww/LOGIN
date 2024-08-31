<?php 
    session_start();
    if(isset($_POST['logout'])){
        session_unset();
        session_destroy();
        header('location: index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include "layout/header.html" ?>
    <h1>Selamat Datang <?= $_SESSION ["username"] ?> </h1>

    <form action="dashboard.php" method="POST">
    <button type="submit" name="logout">Logout</button>
    </form>

    <?php include "layout/footer.html" ?>

    <form action="input-data.php" method="POST">
    <div class="header">
        <h1 class="title">DAFTAR PESERTA PELATIHAN</h1>

        <?php
        
        include "service/database.php";
        
        //CEk apakah ada kiriman form dari method post
        if (isset($_GET['id_peserta'])) {
            $id_peserta=htmlspecialchars($_GET["id_peserta"]);

            $sql="DELETE FROM peserta WHERE id_peserta='$id_peserta' ";
            $hasil=mysqli_query($db,$sql);

            //Kondisi apakah berhasil atau tidak
            if ($hasil) {
                header("Location:index.php");
            }
            else {
                echo "<div class='alert alert-danger'> Data gagal dihapus.</div>";
            }
        }
        
        ?>
        <table>
            <tr>
                <td>No.</td>
                <td>Nama</td>
                <td>Sekolah</td>
                <td>Jurusan</td>
                <td>No Hp</td>
                <td>Alamat</td>
                <td>Aksi</td>
            </tr>

            <?php
                include "service/database.php";

                // Query untuk mengambil data dari tabel peserta
                $sql = "SELECT * FROM peserta";
                $hasil = mysqli_query($db,$sql);
                $no = 0; // Nomor urut

                // Loop untuk menampilkan data
                while($data = mysqli_fetch_assoc($hasil)) {
                    $no++;
                
            ?>
            <tr>
                <td><?php echo $no;?> </td>
                <td><?php echo $data["nama"]; ?></td>
                <td><?php echo $data["sekolah"]; ?></td>
                <td><?php echo $data["jurusan"]; ?></td>
                <td><?php echo $data["no_hp"]; ?></td>
                <td><?php echo $data["alamat"]; ?></td>
                <td>
                    <a href="update.php?id_peserta=<?php echo htmlspecialchars($data['id_peserta']); ?>" class="btn btn-update" role="button">UPDATE</a>
                    <a href="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>?id_peserta=<?php echo $data['id_peserta']; ?>" class="btn btn-delete" role="button">DELETE</a>
                </td>
            </tr>
            <?php
            }

            ?>
        </table>
        <br>
            <input type="submit" value="TAMBAH DATA"></>
    </div>
    </form>

    
</body>
</html>