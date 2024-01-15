<?php
$act = "dangky";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'dangky':
        include_once "./Views/dangky.php";
        break;
    case 'dangky_action':
        // gui du lieu thong tin nguoi dung vua nhap qua dangky_action
        // nhan

        $tenkh = '';
        $dc = '';
        $sdt = '';
        $email = '';
        $pass = '';
        if (isset($_POST['dangky'])) {
            // echo "hello";
            $tenkh = $_POST['Name']; //minhanh
            // echo $tenkh;
            $dc = $_POST['Address']; //hcm
            //echo $dc;
            $sdt = $_POST['Phone']; //123456
            //echo $sdt;
            $email = $_POST['Email']; //anh1@itc.edu.vn
            //echo $email;
            $pass = $_POST['Password']; //123
            //echo $pass;
            $repeatPass = $_POST['Repeatpassword'];
            $saltF = "G433H#";
            $saltL = "Td23$%";
            $matkhau = md5($saltF . $pass . $saltL); // da duoc ma hoa
            //echo $matkhau;
            //controller y/c phai dem thong tin nay insert vao db?Model
            //trc khi insert can kiem tra xem user va email da ton tai chua  
            $kh = new user();
            $check = $kh->checkUser($tenkh, $email)->rowCount();
            if ($pass !== $repeatPass) {
                echo '<script> alert("Mật khẩu và Nhập lại mật khẩu không khớp");</script>';
                echo '<meta http-equiv="refresh" content="0;url=./index.php?action=dangky"/>';
            } else {
                if ($check >= 1) {
                    echo '<script> alert("Username hoặc email đã tổn tại");</script>';
                    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=dangky"/>';
                    // include_once "./View/registration.php";
                } else {
                    // insert vao db
                    $inskh = $kh->insertKH($tenkh, $matkhau, $email, $dc, $sdt);
                    if ($inskh !== false) {
                        echo '<script> alert("Đăng ký thành công");</script>';
                        echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home"/>';
                    } else {
                        echo '<script> alert("Đăng ký không thành công");</script>';
                        echo '<meta http-equiv="refresh" content="0;url=./index.php?action=dangky"/>';
                    }
                }
            }
        }
        break;
}
?>