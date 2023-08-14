<?php 
    $productList = [];
    if (isset($_GET['search'])) {
        $q = $_GET['search_query'];
        $productList = getProductByQuery($q , 5);
        // header('Location: index.php?search_query='.$q);
    }
    
    $search_html = '';
    foreach ($productList as $item) {
        extract($item);
        $path = "./views/layout/assets/images/$img";
        $search_html .= '
            <!-- single product start -->
            <a href="index.php?pg=viewProductDetail&productId='.$id.'" class="search__product">
                <div class="search-product__banner" style="background: url("'.$path.'") no-repeat center center / cover;"></div>
                <div class="search-product__detail flex">
                    <h2 class="search-product__name">Product name</h2>
                    <span class="search-product__price">$12</span>
                </div>                              
            </a>
            <!-- single product end -->
        ';
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ - TYPISTIAL</title>
    <link rel="stylesheet" href="./views/layout/assets/css/main.css">
    <link rel="stylesheet" href="./views/layout/assets/css/responsive.css">
    <link rel="icon" type="image/x-icon" href="./views/layout/assets/images/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/gh/hung1001/font-awesome-pro@4cac1a6/css/all.css" rel="stylesheet" type="text/css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<script src="./views/layout/assets/js/validator.js"></script>
</head>
<?php 
    $catalogs = getCatalog();
    $keyboards = getProductByCatalogId(1 , 5);
    $keycaps = getProductByCatalogId(2, 5);
    $switches = getProductByCatalogId(3 , 5);
    $kits = getProductByCatalogId(4 , 5);
    function renderItem ($arr) {
        foreach ($arr as $item) {
            extract($item);
            echo '
                <li class="nav__item"><a class="nav__link" href="index.php?pg=viewProductDetail&productId='.$id.'">'.$name.'</a></li>
            ';
        }
    }
    $userHtml = '';
    $homeLink = '';
    if (isset($_GET['user'])){
        $userId = $_GET['user'];
        $homeLink = "index.php?user=$userId";
        if (isset($_SESSION['user'])) {
            $userHtml = '<li class="nav__item" style="position: relative;">
                            <a href="index.php?pg=userAccount" class="nav__link user"></a>
                            <ul class="user-header__nav">
                                <li class="nav__item"><a href="index.php?pg=general&user='.$userId.'" class="nav__link"><i class="fal fa-user"></i> Your Account</a></li>
                                <li class="nav__item"><a href="index.php?pg=userLogout" class="nav__link"><i class="fal fa-sign-out"></i> Log Out</a></li>
                            </ul>
                        </li>';
        }
    } else {
        $homeLink = 'index.php';
        $userHtml = '<li class="nav__item" style="position: relative">
                        <a href="index.php?pg=login" class="nav__link">
                            <i class="fa-solid fa-user"></i>
                        </a>
                        <ul class="user-header__nav" style="top: 60px">
                            <li class="nav__item"><a href="index.php?pg=login" class="nav__link" style="width: 100%"><i class="fal fa-user"></i> Log In</a></li>
                            <li class="nav__item"><a href="index.php?pg=createAccount" class="nav__link" style="line-height: normal; width: 100%"><i class="fal fa-user-plus"></i> Create account</a></li>
                        </ul>
                    </li>';
    }
    if (isset($_SESSION['user'])) {
        extract($_SESSION['user']);
        $homeLink = "index.php?user=$id";
        $userHtml = '<li class="nav__item" style="position: relative;">
                        <a href="index.php?pg=userAccount" class="nav__link user"></a>
                        <ul class="user-header__nav">
                            <li class="nav__item"><a href="index.php?pg=general&user='.$id.'" class="nav__link"><i class="fal fa-user"></i> Your Account</a></li>
                            <li class="nav__item"><a href="index.php?pg=userLogout" class="nav__link"><i class="fal fa-sign-out"></i> Log Out</a></li>
                        </ul>
                    </li>';
    } else {
        $homeLink = "index.php";
        $userHtml = '<li class="nav__item" style="position: relative">
                        <a href="index.php?pg=login" class="nav__link">
                            <i class="fa-solid fa-user"></i>
                        </a>
                        <ul class="user-header__nav" style="top: 60px">
                            <li class="nav__item"><a href="index.php?pg=login" class="nav__link" style="width: 100%"><i class="fal fa-user"></i> Log In</a></li>
                            <li class="nav__item"><a href="index.php?pg=createAccount" class="nav__link" style="line-height: normal; width: 100%"><i class="fal fa-user-plus"></i> Create account</a></li>
                        </ul>
                    </li>';
    }
?>
<body>
    <div class="container">
        <header class="header">
            <div class="header__inner">
                <a href="<?= $homeLink?>" class="logo flex"><img src="./views/layout/assets/images/logo.svg"
                        alt=""><span>TYPISTIAL</span></a>
                <nav class="header-nav center-nav">
                    <ul class="flex" style="gap: 30px">
                        <li class="nav__item">
                            <a href="<?=$homeLink?>" class="nav__link">TRANG CHỦ
                                <span class="header__line"></span>
                            </a>
                        </li>
                        <li class="nav__item ">
                            <a href="index.php?pg=viewProduct" class="nav__link toggle__subnav">SẢN PHẨM</a>
                            <nav class="subnav__wrapper">
                                <ul class="subnav">
                                    <li class="nav__item">
                                        <a href="" class="nav__link">CATEGORIES</a>
                                        <ul>
                                            <?= renderItem($catalogs)?>
                                        </ul>
                                    </li>
                                    <li class="nav__item">
                                        <a href="" class="nav__link">KEYCAPS</a>
                                        <ul>    
                                            <?= renderItem($keycaps) ?>
                                        </ul>
                                    </li>
                                    <li class="nav__item"><a href="/html/kits.html" class="nav__link">KITS</a>
                                        <ul>
                                            <?= renderItem($kits) ?>
                                        </ul>
                                    </li>
                                    <li class="nav__item"><a href="/html/switches.html" class="nav__link">SWITCHES</a>
                                        <ul>
                                            <?= renderItem($switches) ?>
                                        </ul>
                                    </li>
                                    <li class="nav__item"><a href="/html/pre-built.html" class="nav__link">PRE-BUILT
                                            KEYBOARDS</a>
                                        <ul>
                                            <?=renderItem($keyboards)?>
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </li>
                        <li class="nav__item"><a href="index.php?pg=contact" class="nav__link">LIÊN HỆ</a></li>
                        <li class="nav__item"><a href="index.php?pg=aboutUs" class="nav__link">VỀ CHÚNG TÔI</a></li>
                    </ul>
                </nav>
                <nav class="header-nav right__nav">
                    <ul class="flex">
                        <li class="nav__item" style="position: relative;">
                            <!-- expand search-bar -->
                            <form action="<?=$_SERVER['PHP_SELF']?>" method="get" class="search-bar">
                                <input type="text" name="search_query" placeholder="Search..." class="bar">
                                <button type="submit" name="search" style="position: relative; z-index: 100;">
                                    <i class="fa-solid fa-magnifying-glass magni-icon" style="cursor: pointer;"></i>
                                </button>
                            </form>
                            <div class="search-product__list">
                                <?=$search_html?>
                            </div>
                        </li>
                        <li class="nav__item">
                            <a href="index.php?pg=viewCart" class="nav__link"><i class="fa-solid fa-cart-shopping"></i></a>
                        </li>
                        <!-- render user start -->
                        <?=$userHtml?>
                        <!-- render user end -->
                    </ul>
                </nav>
                <ul class="header-nav respon-bar-icon flex">
                    <li class="nav__item">
                        <!-- expand search-bar -->
                        <div class="search-bar">
                            <input type="text" name="searchbar" placeholder="Search..." class="bar">
                            <i class="fa-solid fa-magnifying-glass magni-icon" style="cursor: pointer;"></i>
                        </div>
                    </li>
                    <li class="nav__item">
                        <i class="fa-solid fa-bars open-btn"></i>
                    </li>
                </ul>
            </div>
        </header>
        <!-- respon nav bar -->
        <div class="respon-nav">
            <div class="respon-nav__icons">
                <ul class="respon-left-nav flex">
                    <li class="nav__item">
                        <a href="index.php" class="nav__link"><i class="fa-solid fa-home"></i></a>
                    </li>
                    <li class="nav__item">
                        <a href="/html/cart.html" class="nav__link"><i class="fa-solid fa-cart-shopping"></i></a>
                    </li>
                    <li class="nav__item">
                        <a href="index.php?pg=login" class="nav__link"><i class="fa-solid fa-user"></i></a>
                    </li>
                </ul>
                <i class="fa-solid fa-bars respon-bar-icon close-btn"></i>
            </div>
            <ul class="respon-nav__content">
                <li class="nav__item">
                    <a href="/html/pre-built.html" class="nav__link">Keyboards</a>
                </li>
                <li class="nav__item">
                    <a href="/html/switches.html" class="nav__link">Switches</a>
                </li>
                <li class="nav__item">
                    <a href="/html/keycaps.html" class="nav__link">Keycaps</a>
                </li>
                <li class="nav__item">
                    <a href="/html/kits.html" class="nav__link">Kits</a>
                </li>
                <li class="nav__item">
                    <a href="" class="nav__link">Deskpads</a>
                </li>
            </ul>
        </div>
        <div class="respon-overlay"></div>