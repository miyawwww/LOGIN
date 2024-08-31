<?php include "service/database.php";

    session_start();

    $register_message = "";
    
    if(isset($_SESSION["is_login"])){
    header("location: dashboard.php");
    }

    if(isset($_POST["register"])){
        $username = $_POST["username"];
        $password = $_POST["password"];
        $hash_password = hash("sha256", $password);


        try{
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hash_password')";

        if($db->query($sql)){
            $register_message = "Daftar akun berhasil, silahkan login!";
        }else{
            $register_message = "Daftar akun gagal, silahkan coba lagi!";
        }
    } 
    catch (mysqli_sql_exception){
        $register_message = "username sudah digunakan";
    }

    $db->close();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php include "layout/header.html" ?>
<header>
    <h1>Daftar Akun</h1>
</header>
    
    <form action="register.php" method="POST">
        <input type="text" placeholder="username" name="username">
        <input type="password" placeholder="password" name="password">
        <button type="submit" name="register">Daftar Sekarang</button>
        <br><i><?= $register_message ?></i>
    </form>
    
    <footer>
    <hr/>
    <i>dibuat oleh tiravgns09@gmail.com</i>
    </footer>

    
</body>
</html>