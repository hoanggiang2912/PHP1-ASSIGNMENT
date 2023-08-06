<?php 
    session_start();
    ob_start();
    require_once '../models/connect.php';
    require_once '../models/catalog.php';
    require_once '../models/user.php';
    require_once '../views/header.php';

    if (isset($_POST['login']) && $_POST['login']) {
        $username = $_POST['name'];
        $password = $_POST['password'];
        $userOne = checkAdmin ($username , $password);
        $user = [
            "username" => $username , 
            "password" => $password
        ];
        
        if(is_array($userOne)) {
            extract($userOne);
            if ($role == 1) {
                $_SESSION['admin'] = 1;
                $_SESSION['userAdmin'] = $user;
                header('location: index.php');
            } else if ($username == $userOne['username'] && $password == $userOne['password']) {
                $_SESSION['normalUser'] = $user;
                header('Location: ../index.php');
            } else {
                $errorMessage = 'Invalid username or password';
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ - TYPISTIAL</title>
    <link rel="stylesheet" href="../views/layout/assets/css/main.css">
    <link rel="icon" type="image/x-icon" href="/assets/images/favicon.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="section log-in__body" style="margin-top: 80px;">
            <div class="form__container">
                <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" class="log-in-form">
                    <h1 class="form__title">ĐĂNG NHẬP</h1>
                    <div class="form__group">
                        <input type="text" class="form__input fullname" name="name" placeholder=" ">
                        <label for="">Tên đăng nhâp</label>
                        <span class="form__message"></span>
                    </div>
                    <div class="form__group">
                        <input type="text" class="form__input password" name="password" placeholder=" ">
                        <label for="">Mật khẩu</label>
                        <span class="form__message"></span>
                    </div>
                    <input type="submit" class="form__btn" name="login">Đăng nhập</input>
                </form>
                <a href="" class="forgot">Quên mật khẩu?</a>
                <h5>Bạn cũng có thể đăng nhập bằng các cách sau</h5>
                <ul class="social__icon__list flex">
                    <li class="nav__item"><i class="fa-brands fa-google"></i></li>
                    <li class="nav__item"><i class="fa-brands fa-facebook"></i></li>
                    <li class="nav__item"><i class="fa-brands fa-github"></i></li>
                    <li class="nav__item"><i class="fa-brands fa-instagram"></i></li>
                    <li class="nav__item"><i class="fa-brands fa-twitter"></i></li>
                </ul>
                <h5>Không có tài khoản ? <a href="/html/create-account.html">Tạo ngay</a></h5>
            </div>
            <?php 
                if (isset($errorMessage) && $errorMessage != '') {
                    echo $errorMessage;
                }
            ?>
        </div>
        <!-- footer -->
        <footer class="footer flex">
            <div class="logo">
                <a href="#">
                    <img src="./views/layout/assets/images/logo.svg" alt="">
                    <h1>TYPISTIAL</h1>
                </a>
            </div>
            <div class="footer__top flex">
                <div class="follow-us">
                    <p class="follow-us-content">Đăng ký danh sách email của chúng tôi để trở thành một trong những người đầu
                        tiên biết về các sản phẩm mới, giảm giá, giảm giá và giảm giá, v.v.! Là người đăng ký mới, bạn sẽ nhận
                        được mã cá nhân để sử dụng cho đơn hàng đầu tiên của mình.
                    </p>
                    <form action="" class="follow-us-form">
                        <div class="form-group"><input type="text" placeholder="Email"></div>
                        <a href="#" class="form__btn btn">ĐĂNG KÝ NGAY</a>
                    </form>
                </div>
                <nav class="footer__nav">
                    <h2 class="nav__title">TYPISTIAL</h2>
                    <ul class="about-us">
                        <li class="nav__item"><a href="/html/about-us.html" class="nav__link">VỀ TÁC GIẢ</a></li>
                        <li class="nav__item"><a href="" class="nav__link">LIÊN HỆ</a></li>
                        <li class="nav__item"><a href="" class="nav__link">BÁN SỈ</a></li>
                        <li class="nav__item"><a href="" class="nav__link">PHẢN HỒI</a></li>
                        <li class="nav__item"><a href="" class="nav__link">CHÍNH SÁCH HOÀN TRẢ</a></li>
                        <li class="nav__item"><a href="" class="nav__link">DỊCH VỤ KHÁCH HÀNG</a></li>
                    </ul>
                </nav>
                <nav class="footer__nav">
                    <h2 class="nav__title">SHOP</h2>
                    <ul class="shop">
                        <li class="nav__item"><a href="" class="nav__link">TẤT CẢ SẢN PHẨM</a></li>
                        <li class="nav__item"><a href="/html/log-in.html" class="nav__link">TÀI KHOẢN</a></li>
                        <li class="nav__item"><a href="/html/keycaps.html" class="nav__link">KEYCAPS</a></li>
                        <li class="nav__item"><a href="/html/switches.html" class="nav__link">SWITCHES</a></li>
                        <li class="nav__item"><a href="/html/pre-built.html" class="nav__link">KEYBOARDS</a></li>
                    </ul>
                </nav>
                <nav class="footer__nav">
                    <h2 class="nav__title">FOLLOW US</h2>
                    <ul class="social__icons flex">
                        <li class="nav__item"><a href="" class="nav__link"><i class="fa-brands fa-facebook"></i></a></li>
                        <li class="nav__item"><a href="" class="nav__link"><i class="fa-brands fa-twitter"></i></a></li>
                        <li class="nav__item"><a href="https://github.com/hoanggiang2912/Giang_Profile" class="nav__link"><i
                                    class="fa-brands fa-github"></i></a></li>
                        <li class="nav__item"><a href="" class="nav__link"><i class="fa-brands fa-youtube"></i></a></li>
                    </ul>
                </nav>
            </div>
        </footer>
        <hr style="margin: 0">
        <footer class="right-reserved">
            <h4>© 2023 TYPISTIAL ™</h4>
            <h4>ALL RIGHT RESERVED</h4>
        </footer>
    </div>
</body>
</html>