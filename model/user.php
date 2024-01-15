<?php
class user {
    //phuongt thuc kiem tra user va email co ton tai chua
    function checkUser($tenkh,$email)
    {
        $db=new connect();
        $select="SELECT * from users  WHERE name='$tenkh' or email='$email'";
        echo $select;
        $result=$db->getList($select);
        return $result;
    }
    //phuong thuc insert vao db
    function insertKH($tenkh,$matkhau,$email,$dc,$sdt)
    {
        $db=new connect();
        $query="INSERT INTO users ( name, email, phone, address, password)
        VALUES ('$tenkh', '$email', '$sdt','$dc','$matkhau')";
        echo $query;
        $result=$db->exec($query);
        return $result;
    }
    function loginUser($user,$pass){
        $db=new connect();
        $select="SELECT * from users WHERE name='$user' AND password='$pass'";
        echo $select;
        $result=$db->getInstance($select);
        return $result;
    }

    
}
?>