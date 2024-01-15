<?php
// include_once "model/connect.php";
// include_once "model/category.php";
// include_once "model/laysanpham.php";
// include_once "model"
session_Start();
set_include_path(get_include_path().PATH_SEPARATOR . "Model/");
spl_autoload_extensions('.php');
spl_autoload_register();
?>

<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Css Styles -->
    <link rel="stylesheet" href="./css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="./css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="./css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="./css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="./css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="./css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="./css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="./css/style.css" type="text/css">
</head>

<body>
    <!-- header -->
    <?php include_once "views/header.php" ?>
    <!-- end header -->
    <!-- Categories Section Begin -->
    <!--Hiển thị nội dung ở đây-->
    <?php
      //khởi tạo trang chủ
      $ctrl="home";
      //index điều hướng đến những controller khác nhau thông qua url,đc đặt tên biến =gtri
      if(isset($_GET['action'])){
        $ctrl=$_GET['action'];
      }
      //index gọi controller
      include_once "Controller/$ctrl.php";
      ?>
    <!-- Blog Section End -->

    <!-- footer -->
    <?php include_once "views/footer.php"; ?>
    
</body>

</html>