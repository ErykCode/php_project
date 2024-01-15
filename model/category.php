<?php
class category {
    function getCategory() {
        //b1: kết nối csdl
        $db = new connect();
        //b2 viết câu truy vấn
        $select = "SELECT * FROM `category` ORDER BY name";
        //b3 thực thi truy vấn
        $result = $db->getList($select);
        return $result;//lấy dữ liệu 
    }
}