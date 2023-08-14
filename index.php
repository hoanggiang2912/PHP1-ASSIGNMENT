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
require_once "./models/bill.php";
require_once "./models/shipping.php";
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
        case 'createAccount':
            $message = '';
            if (isset($_POST['createAccount']) && $_POST['createAccount']) {
                $name = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];

                $errors = validateUserData($name, $password, $email);
                if (empty($errors)) {
                    addUser ($name , $email , $password);
                    $user = [
                        "name" => $name,
                        "email" => $email,
                        "password" => $password
                    ];
                    $_SESSION['user'] = $user;
                    if (isset($_SESSION['user'])) {
                        header('Location: index.php?pg=login');
                    }
                } else {
                    extract($errors);
                }
            }
            require_once "./views/createAccount.php";
            break;
        case 'login':
            if (isset($_POST['login']) && $_POST['login']) {
                $name = $_POST['name'];
                $password = $_POST['password'];
                if ($name !== '' && $password !== '') {
                    $user = checkAdmin($name, $password);
                    if (!$user) {
                        $errorMessage = '<span class="form__message">Username or password is incorrect , please try again!</span>';
                    } else {
                        extract($user);
                        $userSaved = [
                            "name" => $name ,
                            "password" => $password ,
                            "id" => $id_user
                        ];
                        if ($role == 0) {
                            $_SESSION['role'] = $role;
                            $_SESSION['user'] = $userSaved;
                            header('Location: index.php?user=' . $id_user);
                        } else if ($role == 1) {
                            $_SESSION['admin'] = $userSaved;
                            header('Location: ./admin/index.php');
                        }
                    }
                } else {
                    $errorMessage = '<span class="form__message">Username or password is invalid</span>';
                }
            }
            require_once './views/login.php';
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
            // if (isset($_GET['min']) && isset($_GET['max'])) {
            //     $min = $_GET['min'];
            //     $max = $_GET['max'];
            //     $products = getProductByPriceFilter($min, $max);
            // }
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
                $getDescription = getDescById ($productId) ;
                $description = array_slice($getDescription , 2 );
                $productSpect = getProductSpectById ($productId);
                $productOptions = getProductOptionsById ($productId);
                $galleryImages = getProductImageById ($productId);
                require_once "./views/productDetail.php";
            }
            break;
        case 'general':
            // user profile view
            if (isset($_SESSION['user']) && $_SESSION['user']) {
                $user = $_SESSION['user'];
                // user profile general update
                if (isset($_POST['updateGeneral'])) {
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    updateUserGeneral ($username , $email , $user['id']);  
                }
            }
            require_once './views/general.php';
            break;
        case 'editProfile':
            // user profile view
            if (isset($_SESSION['user']) && $_SESSION['user']) {
                $userSaved = $_SESSION['user'];
                // user profile update
                $user = getUserById($userSaved['id']);
                if (isset($_POST['updateProfile'])) {
                    $fullName = $_POST['fullName'];
                    $bio = $_POST['bio'];
                    updateUserProfile ($fullname , $bio , $userId);
                    header('Location: index.php?pg=editProfile&user='.$userSaved['id'].'');
                }
            }
            require_once './views/userEditProfile.php';
            break;
        case 'password':
            // user profile view
            if (isset($_SESSION['user']) && $_SESSION['user']) {
                $userSaved = $_SESSION['user'];
                // user profile general update
                $user = getUserById($userSaved['id']);
                $message = '';
                if (isset($_POST['updatePassword'])) {
                    $newPassword = $_POST['newPassword'];
                    $oldPassword = $_POST['oldPassword'];
                    // Validate password
                    if (empty($oldPassword)) {
                        $message = "Please enter your old password";
                    } else if ($oldPassword !== $user['password']) {
                        $message = "Password is incorrect";
                    } else if (strlen($newPassword) < 6) {
                        $message = "Password must be at least 6 characters long.";
                    } else if ($newPassword === $oldPassword)  {
                        $message = "Please consider another one, it looks like your old password";
                    } else {
                        updateUserPassword ($newPassword , $userId);
                        $message = "Password update successfully";
                    }
                } else {
                    $message = '';
                }
            }
            require_once './views/userPassword.php';
            break;
        case 'order':
            // get information from form to create an order
            $message = '';
            $cart = $_SESSION['cart'];

            if (isset($_POST['userOrder'])) {
                $country = $_POST['country'];
                $address = $_POST['address'];
                $email = $_POST['email'];
                $tel = $_POST['tel'];
                $roadHome = $_POST['road-home'];
                $city = $_POST['city'];
                $ward = $_POST['ward'];
                $shipping = $_POST['shipping'];
                $totalBill = totalBill ($cart);
                $billId = createBill($address, $email, $tel, $shipping, $totalBill);
                // validate form information
                // if (!empty($address) && !empty($email) && !empty($tel) && !empty($roadHome) && !empty($city) && !empty($ward) && !empty($shipping)){
                    // $_SESSION['bill'] = [
                    //     "country" => $country ,
                    //     "address" => $address , 
                    //     "email" => $email , 
                    //     "tel" => $tel , 
                    //     "roadHome" => $roadHome , 
                    //     "city" => $city , 
                    //     "ward" => $ward , 
                    //     "shipping" => $shipping ,
                    //     "billId" => $billId ,
                    //     "totalBill" => $totalBill ,
                    //     "total" => $total
                    // ];
                    // then get cart information from session and id of the order just created
                    // insert order information into cart table
                // } else {
                    // $message = '<span class="error__message">Please enter the required information</span>';
                // }
                foreach ($cart as $item) {
                    extract($item);
                    $product_name = $name;
                    $product_img = $img;
                    $unit_price = $price;
                    $product_qty = $qty;
                    $total_cost = $unit_price * $product_qty;
                    createCart ($billId , $product_name , $product_img , $unit_price , $product_qty , $total_cost);
                }
                header("Location: index.php?pg=payment&billId=$billId");
                exit;
            }
            // confirm showing

            // unset cart session
            require_once './views/order.php';
            break;
        case 'payment':
            if (isset($_GET['billId'])) {
                $billId = $_GET['billId'];
                $shippingId = getShippingMethodByBillId ($billId);
                extract($shippingId);
                $shippingFee = getShippingFee($shipping)['price'];
                $billInfo = getBillInfoById ($billId);
            }
            // show bill information 
            $addressView = '';
            $emailView = '';
            $telView = '';
            if (isset($_POST['shippingAddress'])) {
                extract($billInfo);
                if ($address != '') {
                    $addressView = $address;
                } else {
                    $addressView = '';
                }
                if ($email != '') {
                    $emailView = $email;
                } else {
                    $emailView = '';
                }
                if ($tel != '') {
                    $telView = $tel;
                } else {
                    $telView = '';
                }
            }
            require_once './views/payment.php';
            break;
        case 'confirm':
            $cart = $_SESSION['cart'];
            if (isset($_GET['billId'])) {
                // get bill id
                $billId = $_GET['billId'];
                $shippingId = getShippingMethodByBillId ($billId);
                extract($shippingId);
                $shippingFee = getShippingFee($shipping)['price'];
                $billInfo = getBillInfoById ($billId);
                extract($billInfo);
                $shippingName = getShippingMethodNameById ($shipping);
                $totalBill = totalBill($cart);
                if (isset($_POST['paymentDone'])) {
                    $payment = $_POST['paymentMethod'];
                    updatePaymentMethodByBillId ($billId , $payment);
                    header('Location: index.php?pg=confirm&billId='.$billId);
                }
            }
            require_once './views/confirm.php';
            break;
        case 'deleteAccount':
            if (isset($_SESSION['user']) && $_SESSION['user']) {
                // get user need to be deleted
                $userSaved = $_SESSION['user'];
                $user = getUserById($userSaved['id']);
                // then check the comfirm password
                // get password and checkbox firstly
                $message = '';
                if (isset($_POST['deleteAccount'])) {
                    if (isset($_POST['delete-account'])) {
                        $password = $_POST['password'];
                        if ($password !== $user['password']) {
                            $message = 'Password is incorrect';
                        } else {
                            deleteAccountById ($userId);
                            unset($_SESSION['user']);
                            header('Location: index.php');
                        }
                    } else {
                        $message = 'Please ensure that you want to delete the account';
                    }
                }
            }
            require_once './views/userDeleteAccount.php';
            break;
        case 'socialAccount':
            require_once './views/userSocialAccount.php';
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