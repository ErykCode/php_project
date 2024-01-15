<?php
include_once 'model/page.php';
class laysanpham
{
    function getSanpham()
    {
        //b1: kết nối csdl
        $db = new connect();
        //b2 viết câu truy vấn
        $select = "select product.name as pname, thundar, price, product.id,
        category.slug as cslug from product, category where product.category_id=category.id AND product.sale=0";
        //b3 thực thi truy vấn
        $result = $db->getList($select);
        return $result; //lấy dữ liệu 
    }

    function getSanphamhot()
    {
        //b1: kết nối csdl
        $db = new connect();
        //b2 viết câu truy vấn
        $select = "select product.name as pname, thundar, price, product.id,
        category.slug as cslug from product, category where product.category_id=category.id AND product.hot=1";
        //b3 thực thi truy vấn
        $result = $db->getList($select);
        return $result; //lấy dữ liệu 
    }

    function getSanphamAllPage($start, $limit)
    {
        //b1: kết nối csdl
        $db = new connect();
        //b2 viết câu truy vấn
        $select = "select product.name as pname, thundar, price, product.id,
        category.slug as cslug from product, category where product.category_id=category.id LIMIT " . $start . "," . $limit;
        //b3 thực thi truy vấn
        $result = $db->getList($select);
        return $result; //lấy dữ liệu 
    }
    function getSanphamAll()
    {
        //b1: kết nối csdl
        $db = new connect();
        //b2 viết câu truy vấn
        $select = "select product.name as pname, thundar, price, product.id,
        category.slug as cslug from product, category where product.category_id=category.id";
        //b3 thực thi truy vấn
        $result = $db->getList($select);
        return $result; //lấy dữ liệu 
    }

    function getHangHoaId($id)
    {
        $db = new connect();
        $select = "select product.name as pname, content, thundar,price,product.id from product where product.id=$id";
        $result = $db->getInstance($select);
        return $result; // array chỉ chứa 1 sản phẩm
    }

    function getSanPhamOther()
    {
        //b1: kết nối csdl
        $db = new connect();
        //b2 viết câu truy vấn
        $select = "select product.name as pname, thundar, price, product.id,
        category.slug as cslug from product, category where product.category_id=category.id ORDER BY RAND() LIMIT 4";
        //b3 thực thi truy vấn
        $result = $db->getList($select);
        return $result; //lấy dữ liệu 
    }
}