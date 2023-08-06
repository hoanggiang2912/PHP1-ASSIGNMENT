<?php 
    session_start();
    ob_start();
    if (!isset($_SESSION['admin']) ) {
        header('Location: login.php');
    } else {
        $user = $_SESSION['userAdmin'];
        extract($user);
    
        // connect database 
        require_once '../models/connect.php';
        require_once '../models/product.php';
        require_once '../models/catalog.php';
        require_once './public/head.php';
        
        if (isset($_GET['pg']) && $_GET['pg']) {
            switch ($_GET['pg']) {
                case 'logout':
                    unset($_SESSION['admin']);
                    unset($_SESSION['userAdmin']);
                    header('Location: login.php');
                    break;
                case 'user':
                    
                    break;
                case 'productSearch':
                    $categories = [];
                    if(isset($_POST['search'])) {
                        $query = $_POST['query'];
                        $productList = getProductByQuery($query);
                    }
                    require_once './public/product.php';
                    break;
                case 'cateSearch':
                    $tb = "";
                    $categories = [];
                    if(isset($_POST['search'])) {
                        $query = $_POST['query'];
                        $categories = getCatalogByQuery($query);
                    }
                    require_once './public/category.php';
                    break;
                case 'category':
                    $tb = "";
                    $categories = getCatalog();
                    require_once './public/category.php';
                    break;
                case 'addCategory':
                    // add new category from form
                    if (isset($_POST['insert__btn'])) {
                        $name = $_POST['name'];
                        insertCategory($name);
                    }
                    // reload category
                    $tb = "";
                    $categories = getCatalogs();
                    require_once './public/category.php';
                    break;
                case 'updateCategoryForm':
                    // add new category from form
                    if (isset($_GET['cateId'])) {
                        $cateId = $_GET['cateId'];
                        $catalog = getCatalogById($cateId);
                        if (isset($_POST['update__btn'])) {
                            $name = $_POST['name'];
                            updateCatalog($name , $cateId);
                            header('Location: index.php?pg=category');
                        }
                    }
                    require_once './public/updateCategoryForm.php';
                    break;
                case 'delCategory':
                    // get id
                    if (isset($_GET['cateId']) && $_GET['cateId'] != 0) {
                        $cateId = $_GET['cateId'];
                        $tb = deleteCategoryById($cateId);
                    } else {
                        $tb = "";
                    }
                    // delete category by category id

                    // reload category
                    $categories = getCatalogs();
                    require_once './public/category.php';
                    break;
                case 'product':
                    $productList = getAllProduct();
                    if (isset($_GET['sortId']) && $_GET['sortId'] > 0) {
                        $idCata = $_GET['sortId'];
                        $productList = getProductByCatalogId($idCata);
                    }
                    require_once './public/product.php';
                    break;
                case 'delete':
                    if (isset($_GET['delId']) && $_GET['delId'] > 0) {
                        $productId = $_GET['delId'];
                        deleteProductById ($productId);
                        header('Location: index.php?pg=product');
                    }
                    break;
                case 'addNewProduct':
                    require_once './public/addNewProduct.php';
                    break;
                case 'updateProductForm':
                    require_once './public/updateProductForm.php';
                    break;
                case 'order':
                    require_once './public/order.php';
                    break;
                default:
                    require_once './public/dashboard.php';    
                    break;
            }
        } else {
            require_once './public/dashboard.php';    
        }
        require_once './public/foot.php';
    }
?>