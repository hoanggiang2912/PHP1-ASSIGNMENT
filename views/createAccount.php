<?php 
    // $usernameMessage = $passwordMessage = $emailMessage = '';
    // if ($errors) {
    //     $usernameMessage = '<span class="form__message">' . $usernameError . '</span>';
    //     $passwordMessage = '<span class="form__message">' . $passwordError . '</span>';
    //     $emailMessage = '<span class="form__message">' . $emailError . '</span>';
    // }
?>
<h1 class="big-text">sign up</h1>
<div class="section log-in__body" style="margin-top: 80px;">
    <div class="form__container">
        <form action="index.php?pg=createAccount" method="post" class="log-in-form">
            <h1 class="form__title">TẠO TÀI KHOẢN</h1>
            <div class="form__group">
                <input type="text" name="username" class="form__input fullname" placeholder=" ">
                <label for="">Tên đăng nhập</label>
                <span class="form__message"></span>
            </div>
            <div class="form__group">
                <input type="text" name="email" class="form__input email" placeholder=" ">
                <label for="">Email</label>
                <span class="form__message"></span>
            </div>
            <div class="form__group">
                <input type="text" name="password" class="form__input password" placeholder=" ">
                <label for="">Mật khẩu</label>
                <span class="form__message"></span>
            </div>
            <?=$message?>
            <input type="submit" name="createAccount" class="form__btn" value="Tạo tài khoản">
        </form>
        <h5>Bạn cũng có thể đăng nhập bằng các cách sau</h5>
        <ul class="social__icon__list flex">
            <li class="nav__item"><i class="fa-brands fa-google"></i></li>
            <li class="nav__item"><i class="fa-brands fa-facebook"></i></li>
            <li class="nav__item"><i class="fa-brands fa-github"></i></li>
            <li class="nav__item"><i class="fa-brands fa-instagram"></i></li>
            <li class="nav__item"><i class="fa-brands fa-twitter"></i></li>
        </ul>
        <h5>Bạn đã có tài khoản ? <a href="index.php?pg=login">Đăng nhập ngay</a></h5>
    </div>
</div>
<script>
    Validator({
        formSelector: '.log-in-form',
        formGroupSelector: '.form__group',
        formMessage: '.form__message',
        rules: [
            Validator.isRequired('.fullname'),
            Validator.isRequired('.email'),
            Validator.isEmail('.email'),
            Validator.isRequired('.password'),
            Validator.isPassword('.password' , 8),
        ]
    })
</script>