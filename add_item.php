<?php
    if (isset($_POST["add_item"])) {
        $servername = "localhost";
        $username = "root"; 
        $password = ""; 
        $dbname = "alena"; 
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        else {
            $item_title = filter_var(($_POST['title']), FILTER_SANITIZE_STRING);
            $item_description = filter_var(($_POST['description']), FILTER_SANITIZE_STRING);
            $item_image_url = filter_var(($_POST['image_url']), FILTER_SANITIZE_STRING);
            $item_price = filter_var(($_POST['item_price']), FILTER_SANITIZE_STRING);

            $sql = "INSERT INTO `items` (`id`, `title`, `description`, `price`, `image_url`) VALUES ('', '$item_title', '$item_description', '$item_price', '$item_image_url')";
            if (mysqli_query($conn, $sql)) {
                header('Location: catalog.php');
            } else {
                echo "Ошибка: " . $sql . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
        }
    }
?>