<?php
session_start();
ob_start();


require_once "./models/connect.php";
// connect models
require_once "./models/product.php";
require_once "./models/catalog.php";
require_once "./models/image.php";
require_once "./models/banner.php";
require_once "./models/user.php";
//Require header
require_once "./views/header.php";



if (isset($_GET['pg']) && ($_GET['pg'] != '')) {
    switch ($_GET['pg']) {
        case 'aboutUs':
            require_once "./views/aboutUs.php";
            break;
        case 'userLogout':
            if (isset($_SESSION['user'])) {
                unset($_SESSION['user']);
                header('Location: index.php');
            }
            require_once "./views/aboutUs.php";
            break;
        case 'login':
            if (isset($_POST['login']) && $_POST['login']) {
                $name = $_POST['name'];
                $password = $_POST['password'];
                $user = checkAdmin($name , $password);
                $userSaved = [
                    "name" => $name , 
                    "password" => $password
                ];
                extract($user);
                if ($role == 0) {
                    $_SESSION['$role'] = $role;
                    header('Location: index.php?user='.$id_user);
                } else if ($role == 1) {
                    header('Location: ./admin/index.php');
                }
            }
            require_once './views/login.php';
            break;
        case 'admin':
            require_once './views/admin.php';
            break;
        case 'contact':
            require_once "./views/contact.php";
            break;
        case 'viewProduct':
            $catalogs = getCatalogs(5);
            $product = [];
            $catalogName = 'products';
            if (isset($_GET['idcatalog']) && ($_GET['idcatalog'] > 0)) {
                $idcatalog = $_GET['idcatalog'];
                $catalogName = getCatalogNameById ($idcatalog)['name'];
                $recommendCatalog = getRelatedCatalog($idcatalog , 3);
            } else {
                $idcatalog = 0;
                $catalogName = 'products';
            }
            if ($idcatalog > 0) {
                if (isset($_GET['pageLimit']) && ($_GET['pageLimit'] > 0)) {
                    $products = getProductsByCatalogId($idcatalog, $_GET['pageLimit']);
                } else {
                    $products = getProductsByCatalogId($idcatalog, 9);
                }
            } else {
                if (isset($_GET['pageLimit']) && ($_GET['pageLimit'] > 0)) {
                    $products = getAllProduct($_GET['pageLimit']);
                } else {
                    $products = getAllProduct(9);
                }
            }
            require_once "./views/viewProduct.php";
            break;
        case 'viewCart': 
            require_once './views/viewCart.php';
            break;
        case 'clearCart':
            unset($_SESSION['cart']); 
            header('location: index.php?pg=viewCart');
            break;
        case 'delCart': 
            if (isset($_GET['delProduct']) && $_GET['delProduct'] >= 0) {
                array_splice($_SESSION['cart'] , $_GET['delProduct'] , 1);
                header('location: index.php?pg=viewCart');
            }
            break;
        case 'addCart':
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $name = $_POST['name'];
                $price = $_POST['price'];
                $img = $_POST['img'];
                $qty = $_POST['qty'];

                $product = [
                    "name" => $name ,
                    "price" => $price , 
                    "img" => $img ,
                    "qty" => $qty
                ];
                if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart'])) $_SESSION['cart'] = [];
                // check product appeared
                $isAvailable = false;
                for ($i = 0 ; $i < count($_SESSION['cart']); $i++) {
                    if ($name === $_SESSION['cart'][$i]['name']) {
                        $isAvailable = true;
                        $newQty = $qty + $_SESSION['cart'][$i]['qty'];
                        $_SESSION['cart'][$i]['qty'] = $newQty;
                        break;
                    }
                } 
                if (!$isAvailable) {
                    array_push($_SESSION['cart'], $product);
                }
                header('location: index.php?pg=viewCart');
            }
            break;
        case 'viewProductDetail':
            if (isset($_GET['productId']) && $_GET['productId']) {
                $productId = $_GET['productId'];
                $detail = getProductDetail($productId);
                $productSpect = getProductSpectById ($productId);
                $productOptions = getProductOptionsById ($productId);
                $galleryImages = getProductImageById ($productId);
                require_once "./views/productDetail.php";
            }
            break;
        case 'general':
            require_once './views/general.php';
            break;
        default:
            require_once "./views/home.php";
            break;
    }
} else {
    //Require home
    $heroBanner = getBanner(6);
    require_once "./views/home.php";
}
//Require footer
require_once "./views/footer.php";

?>