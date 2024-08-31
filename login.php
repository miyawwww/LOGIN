<?php include "service/database.php";

    session_start();

    $login_message = "";

    if(isset($_SESSION["is_login"])){
        header("location: dashboard.php");
    }

    if(isset($_POST["login"])){
        $username = $_POST["username"];
        $password = $_POST["password"];
        $hash_password = hash("sha256", $password);

        $sql = "SELECT * FROM users WHERE 
        username='$username' AND 
        password='$hash_password'";
        $result = $db->query($sql);

        if($result->num_rows > 0){
            $data = $result->fetch_assoc();
            $_SESSION["username"] = $data["username"];
            $_SESSION["is_login"] = true;
            header("location: dashboard.php");
    }else{
            $register_message = "Login akun gagal, silahkan coba lagi!";
    }
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
    <h1>Masuk Akun</h1>
</header>

    <form action="login.php" method="POST">
        <input type="text" placeholder="username" name="username">
        <input type="password" placeholder="password" name="password">
        <button type="submit" name="login">Masuk Sekarang</button>
        <br><i><?= $login_message ?> </i>
    </form>
    <?php include "layout/footer.html" ?>


</body>
</html>