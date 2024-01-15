<!-- Phân trang -->
<?php
// b1 Xác định số sản phẩm
$sp = new laysanpham();
$result = $sp->getSanphamAll();
$count = $result->rowCount();
// b2 Cho giới hạn mỗi trang bao nhiêu sản phẩm
$limit = 12;
// b3 tính ra có bao nhiêu pages
$trang = new Page();
// lấy trang
$page = $trang->findPage($count, $limit);
// lấy start
$start = $trang->findStart($limit);
// khởi gán current hiện tại
$current_page = isset($_GET['page']) ? $_GET['page'] : 1 ;
?>




<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section set-bg" data-setbg="../img/breadcrumb.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Organi Shop</h2>
                    <div class="breadcrumb__option">
                        <a href="./index.html">Home</a>
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Product Section Begin -->
<section class="product spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-5">
                <div class="sidebar">
                    <div class="sidebar__item">
                        <h4>Category</h4>
                        <ul>
                            <?php
                            $catrgory = new category();
                            $result = $catrgory->getCategory(); // 1 bảng chứa các danh mục
                            while ($set = $result->fetch()):
                                ?>
                                <li><a href="danh-muc.php?id=<?php echo $set['id'] ?>">
                                        <?php echo $set['name'] ?>
                                    </a></li>
                            <?php endwhile; ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-7">
                <div class="row">
                    <div class="row featured__filter">
                        <?php
                        $catrgory = new laysanpham();
                        $result = $catrgory->getSanphamAllPage($start,$limit); // 1 bảng chứa các danh mục
                        while ($set = $result->fetch()):
                            ?>
                            <div class="col-lg-3 col-md-4 col-sm-6 mix <?= $set['cslug'] ?>">
                                <div class="featured__item">
                                    <div class="featured__item__pic set-bg"
                                        data-setbg="./img/product/<?= $set['thundar'] ?>">
                                        <ul class="featured__item__pic__hover">
                                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                            <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                            <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="featured__item__text">
                                        <h6><a href="index.php?action=product&id=<?php echo $set['id'];?>">
                                                <?= $set['pname'] ?>
                                            </a></h6>
                                        <h5>
                                            <?= number_format($set['price']) ?>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Product Section End -->

<div class="product__pagination " style="text-align: center;">
<?php
    // lay duoc trang hien tai
    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

    if ($current_page > 1 && $page > 1) {
        echo '<a href="index.php?action=shop&page=' . ($current_page - 1) . '">Prev</a>';
    }

    for ($i = 1; $i <= $page; $i++) {
        $class = ($i == $current_page) ? 'style="background-color: aqua"' : '';
        echo '<a ' . $class . ' href="index.php?action=shop&page=' . $i . '">' . $i . '</a>';
    }

    // nut next
    if ($current_page < $page && $page > 1) {
        echo ' <a href="index.php?action=shop&page=' . ($current_page + 1) . '">Next</a>';
    }
?>

    
</div>