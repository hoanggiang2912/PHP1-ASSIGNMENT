<?php 
    if (isset($_SESSION['user']) && $_SESSION['user'] != '') {
        $username = $_SESSION['user']['name'];
        $password = $_SESSION['user']['password'];
    } else {
        $username = '';
        $password = '';
    }
?>
<h1 class="big-text">LOG IN</h1>
<div class="section log-in__body" style="margin-top: 80px;">
    <div class="form__container">
        <form action="index.php?pg=login" method="post" class="log-in-form">
            <h1 class="form__title">ĐĂNG NHẬP</h1>
            <div class="form__group">
                <input type="text" class="form__input fullname" name="name" placeholder=" " value="<?= $username?>">
                <label for="">Tên đăng nhâp</label>
                <span class="form__message"></span>
            </div>
            <div class="form__group">
                <input type="text" class="form__input password" name="password" placeholder=" " value="<?= $password ?>">
                <label for="">Mật khẩu</label>
                <span class="form__message"></span>
            </div>
            <?php
            if (isset($errorMessage) && $errorMessage != '') {
                echo $errorMessage;
            }
            ?>
            <input type="submit" class="form__btn" name="login" value="Đăng nhập">
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
        <h5>Không có tài khoản ? <a href="index.php?pg=createAccount">Tạo ngay</a></h5>
    </div>
</div>
<script>
    Validator({
        formSelector: '.log-in-form',
        formGroupSelector: '.form__group',
        formMessage: '.form__message',
        rules: [
            Validator.isRequired('.fullname'),
            Validator.isRequired('.password'),
            Validator.isPassword('.password'),
        ]
    })
</script>