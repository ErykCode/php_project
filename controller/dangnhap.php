<?php
$act = 'dangnhap';
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'dangnhap':
        include_once "./Views/dangnhap.php";
        break;
    case 'dangnhap_action':
        $tenkh = '';
        $pass = '';
        if (isset($_POST['dangnhap'])) {
            $tenkh = $_POST['Name'];
            $pass = $_POST['Password'];
            $saltF = "G433H#";
            $saltL = "Td23$%";
            $matkhau = md5($saltF . $pass . $saltL);
            $kh = new user();
            $logUser = $kh->loginUser($tenkh, $matkhau);
            // $count = $logUser->rowCount();                                  
            // $uslg = $logUser->fetch();     
            if ($logUser !== false) {
                $_SESSION['tenkh'] = $tenkh;
                // echo $_SESSION['id'];
                echo '<script> alert("Đăng nhập thành công");</script>';
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home" />';
            } else {
                echo '<script> alert("Đăng nhập không thành công");</script>';
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=dangnhap"/>';
            }
        }
        break;
    case 'dangxuat':
        unset($_SESSION['tenkh']);
        echo '<meta http-equiv="refresh" content="0; url=./index.php?action=home"/>';
        break;
}
?>