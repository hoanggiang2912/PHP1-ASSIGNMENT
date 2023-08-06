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
<script src="./views/layout/assets/js/main.js"></script>
<script src="./views/layout/assets/js/validator.js"></script>
<script>
    Validator({
        formSelector: '.wait-list-form',
        formMessage: '.form__message',
        rules: [
            Validator.isRequired('.fullname'),
            Validator.isEmail('.email')
        ]
    })
</script>
</html>