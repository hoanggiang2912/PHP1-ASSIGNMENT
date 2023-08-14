<?php 
    session_start();
    ob_start();
    if (!isset($_SESSION['admin']) ) {
        header('Location: login.php');
    } else {
        $user = $_SESSION['admin'];
        extract($user);
    
        // connect database 
        require_once '../models/connect.php';
        require_once '../models/product.php';
        require_once '../models/catalog.php';
        require_once '../models/global.php';
        require_once './public/head.php';
        
        if (isset($_GET['pg']) && $_GET['pg']) {
            switch ($_GET['pg']) {
                case 'logout':
                    unset($_SESSION['admin']);
                    header('Location: login.php');
                    break;
                case 'user':
                    
                    break;
                case 'productSearch':
                    $categories = [];
                    $productList = [];
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
                    // get product id
                    if (isset($_GET['delId']) && $_GET['delId'] > 0) {
                        $productId = $_GET['delId'];
                        // delete image of product 
                        $productImageFile = getImageById($productId);
                        $img = "../".PATH_IMG_PRODUCTS.$productImageFile;
                        if (file_exists($img)) {
                            unlink($img);
                        }
                        // then delete product by id
                        deleteProductById ($productId);
                        header('Location: index.php?pg=product');
                    }
                    break;
                case 'addNewProduct':
                    // get all catalog
                    $catalogs = getCatalogs();
                    if (isset($_POST['addProduct'])) {
                        $name = $_POST['name'];
                        $price = $_POST['price'];
                        $image = $_POST['image'];
                        $amount = $_POST['amount'];
                        $promotion = $_POST['promotion'];
                        $description = $_POST['description'];  
                        $detail = $_POST['detail'];
                        $idCata = $_POST['categoriesOption'];
                        insertProductById ($name , $price , $idCata , $amount , $promotion , $description , $detail);
                        header('Location: index.php?pg=product');
                    }
                    require_once './public/addNewProduct.php';
                    break;
                case 'updateProductForm':
                    // get all catalog
                    $catalogs = getCatalogs();
                    // get product by id to show
                    if (isset($_GET['Id']) && $_GET['Id'] > 0) {
                        $productId = $_GET['Id'];
                        $product = getProductById($productId);
                        $productCatalog = getCatalogIdByProductId ($productId);
                        $productOptions = getProductOptionsById($productId);

                        if (isset($_POST['updateProduct'])) {
                            $name = $_POST['name'];
                            $categoryOption = $_POST['categoryOption'];
                            $price = $_POST['price'];
                            $amount = $_POST['amount'];
                            $promotion = $_POST['promotion'];
                            $description = $_POST['desc'];
                            $detail = $_POST['detail'];
                            
                            updateProductById ($productId , $name , $categoryOption , $price , $amount , $promotion , $description , $detail);
                            header("Location: index.php?pg=product");
                        }
                    }
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