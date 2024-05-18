<?php
    if (isset($_POST["register"])) {
        $servername = "localhost";
        $username = "root"; 
        $password = ""; 
        $dbname = "alena"; 
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        else {
            $user_login = filter_var(($_POST['login']), FILTER_SANITIZE_STRING);
            $user_pwd = filter_var(($_POST['password']), FILTER_SANITIZE_STRING);

            $sql = "INSERT INTO `auth_clients` (`id`, `login`, `password`) VALUES ('', '$user_login', '$user_pwd')";
            if (mysqli_query($conn, $sql)) {
                setcookie('role', 'client');
                header('Location: catalog.php');
            } else {
                echo "Ошибка: " . $sql . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
        }
    }
    if (isset($_POST["client_login"])) {
        $servername = "localhost";
        $username = "root"; 
        $password = ""; 
        $dbname = "alena"; 
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        else {
            $user_login = filter_var(($_POST['login']), FILTER_SANITIZE_STRING);
            $user_pwd = filter_var(($_POST['password']), FILTER_SANITIZE_STRING);

            $sql = "SELECT `login`, `password` FROM `auth_clients` WHERE `login` = '$user_login' AND `password` = '$user_pwd'";
            $result = mysqli_query($conn, $sql);
            $user = $result->fetch_assoc();
            if ($result->num_rows == 1) {
                setcookie('role', 'client');
                header('Location: catalog.php');
            } else {
                header('Location: not_found.html');
                exit();
            }
            mysqli_close($conn);
        }
    }
    if (isset($_POST["guest_login"])) {
        $servername = "localhost";
        $username = "root"; 
        $password = ""; 
        $dbname = "alena"; 
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        else {
            setcookie('role', 'guest');
            header('Location: catalog.php');
            mysqli_close($conn);
        }
    }
    if (isset($_POST["btn_login"])) {
        $servername = "localhost";
        $username = "root"; 
        $password = ""; 
        $dbname = "alena"; 
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        else {
            $user_login = filter_var(($_POST['login']), FILTER_SANITIZE_STRING);
            $user_pwd = filter_var(($_POST['password']), FILTER_SANITIZE_STRING);
    
            $sql = "SELECT `login`, `password` FROM `auth_personnel` WHERE `login` = '$user_login' AND `password` = '$user_pwd'";
            $result = $conn->query($sql);
            if ($result->num_rows == 1) {
                setcookie('role', 'auth');
                header('Location: catalog.php');
            } else {
                header('Location: not_found.html');
                exit();
            }
            mysqli_close($conn);
        }
    }
?>