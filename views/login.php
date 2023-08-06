
<div class="section log-in__body" style="margin-top: 80px;">
    <div class="form__container">
        <form action="index.php?pg=login" method="post" class="log-in-form">
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