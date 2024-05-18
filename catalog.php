<?php 
  $servername = "localhost";
  $username = "root"; 
  $password = ""; 
  $dbname = "alena"; 
  $conn = mysqli_connect($servername, $username, $password, $dbname);
echo"<!DOCTYPE html>
<html lang=en>
<head>
  <title>Каталог товаров</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #cea5c9;
      background-repeat: repeat repeat;
      background-image: url(bg_item.png);
    }
    .container {
      max-width: 800px;
      margin: 20px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h1 {
      text-align: center;
    }
    .product {
      border: 1px solid #ccc;
      border-radius: 5px;
      padding: 10px;
      margin-bottom: 20px;
      overflow: hidden;
      position: relative;
    }
    .product img {
      width: 100%;
      max-width: 200px;
      height: auto;
      display: block;
      margin: 0 auto 10px;
      border-radius: 5px;
    }
    .product h2 {
      text-align: center;
      margin-bottom: 5px;
    }
    .product p {
      text-align: center;
      font-weight: bold;
      margin-bottom: 10px;
    }
    .add-product-btn {
      position: fixed;
      top: 10px;
      right: 10px;
      padding: 10px;
      background-color: #9b0089;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      text-decoration: none;
    }
    .add-product-btn:hover {
      background-color: #5a0650;
    }
    .buy-btn {
      display: block;
      width: 100px;
      padding: 8px;
      text-align: center;
      background-color: #a728a6;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      text-decoration: none;
      margin: 0 auto;
    }
    .buy-btn:hover {
      background-color: #60185f;
    }
    .logout-btn {
      position: fixed;
      top: 10px; /* Отступ сверху */
      left: 10px; /* Отступ слева */
      padding: 10px;
      background-color: #dc3545;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      text-decoration: none;
    }
    .logout-btn:hover {
      background-color: #c82333;
    }
  </style>

</head>
<body>

<div class=container>
  <h1>Каталог товаров</h1>";
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }
  else {
      $sql = "SELECT * FROM `items`";
      $role = $_COOKIE['role'];
      $result = $conn->query($sql);
      $user = $result->fetch_assoc();
      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {

            if ($row['image_url'] == '') {
              echo"<div class=product>
              <img src=https://placehold.co/200x200/png alt=Product>
              <h2>" . $row['title'] . "</h2>
              <p> " . $row['description'] . "</p>
              <p>Цена: " . $row['price'] . "Руб.</p>";
            }
            else
            {
              echo"<div class=product>
              <img src=" . $row['image_url'] . " alt=Product>
              <h2>" . $row['title'] . "</h2>
              <p> " . $row['description'] . "</p>
              <p>Цена: " . $row['price'] . " руб.</p>";
            }


            if ($role == 'client') {
              echo "<a href=# class=buy-btn>Купить</a></div>";
            }
            if ($role == 'auth') {
              echo "<a href=# class=buy-btn>Купить</a></div>";
            }
            if ($role == 'guest') {
              echo "</div>";
            }
          }
      } 
      else {
        echo'Not loaded';
        exit();
      }
      mysqli_close($conn);
  }
debug_to_console(isset($_COOKIE['role']));

echo "
<a href=index.html class=logout-btn>Выйти</a>";
if (isset($_COOKIE['role'])) {
  $role = $_COOKIE['role'];
  if ($role == 'auth') {
    echo"<a href=add_product.html class=add-product-btn>Добавить товар</a>
    </body>
    </html>";
  }
}

function debug_to_console($data) {
  $output = $data;
  if (is_array($output))
      $output = implode(',', $output);
  echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}

?>