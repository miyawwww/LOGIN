<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<form action="create.php" method="POST">
        <h1>INPUT DATA</h1>

        <div class="form">
    
    <label for="nama">Nama:</label><br>
    <input type="text" id="nama" name="nama" size="50" placeholder="Masukkan nama lengkap" required><br>
    
    <label for="text">Sekolah :</label><br>
    <input type="text" id="fname" name="sekolah" size="50" placeholder="Masukkan asal sekolah" required><br>
    
    <label for="text">Jurusan :</label><br>
    <input type="text" id="jurusan" name="jurusan" size="50" placeholder="Masukkan nama jurusan" required><br>

    <label for="number">No Hp :</label><br>
    <input type="tel" id="telepon" name="no_hp" size="50" placeholder="Masukkan nomor hp" required><br>

    <label for="text">Alamat :</label><br>
    <input type="text" id="alamat" name="alamat" size="50" placeholder="Masukkan alamat" required><br>


    <br>
    <input type="submit" value="UPDATE">
    <input type="reset" value="RESET">

    </div>
    </form>
</body>
</html>