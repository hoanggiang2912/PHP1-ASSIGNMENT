<?php 
    // showing cart
    $product_html = '';
    $total = 0;
    foreach ($cart as $item) {
        extract($item);
        $subTotal = $price * $qty;
        $total += $subTotal;  
        $path = "./views/layout/assets/images/$img";
        $product_html .= '
            <div class="summary__product flex">
                <div class="flex" style="gap: 8px">
                    <div class="summary__product__banner" style="background: url('.$path.') no-repeat center center / cover;">
                    </div>
                    <div>
                        <div class="summary__product__name">
                            '.$name.'
                        </div>
                        <div class="product__option flex">
                            <span></span>
                            <span><span>
                        </div>
                    </div>
                </div>
                <div style="display: flex; flex-direction: column; align-self: stretch; justify-content: space-between; align-items: end">
                    <div class="product__price">$
                        '.$price.'
                    </div>
                    <div class="qty">x '.$qty.'</div>
                </div>
            </div>
        ';
    }

    
?>

<!-- main section -->
<main class="section checkout-main-section">
    <!-- payment nav start -->
    <?php
    require_once 'paymentNav.php';
    ?>
    <!-- payment nav end -->
    <form action="index.php?pg=order" method="post" id="checkout__form">
        <div class="checkout__wrapper flex" style="flex-wrap: wrap-reverse">
            <div class="checkout__form__wrapper">
                <div class="checkout__form">
                    <h4 for="" class="cart__form__title">Chọn quốc gia<span class="required">*</span></h4>
                    <div class="form__group country__options">
                        <select name="country" id="country" class="form__select">
                            <option value="vn" selected>Việt Nam</option>
                            <option value="china" disabled>Trung Quốc</option>
                            <option value="canada" disabled>Canada</option>
                            <option value="us" disabled>Mỹ</option>
                            <option value="kor" disabled>Hàn Quốc</option>
                        </select>
                    </div>
                    <hr style="margin-block: 30px">
                    <h4 class="cart__form__title" style="margin-bottom: 18px;">Địa chỉ giao dịch</h4>
                    <div class="form__group">
                        <label for="" class="cart__form__label">Địa chỉ<span class="required">*</span></label>
                        <input type="text" name="address" id="address" class="form__input" placeholder="Nhập địa chỉ giao hàng">
                        <p class="form__message"></p>
                    </div>
                    <div class="form__group">
                        <label for="" class="cart__form__label">Email<span class="required">*</span></label>
                        <input type="text" id="email" name="email" class="form__input" placeholder="Nhập email của bạn">
                        <p class="form__message"></p>
                    </div>
                    <div class="form__group">
                        <label for="" class="cart__form__label">Số điện thoại<span class="required">*</span></label>
                        <input type="text" name="tel" id="tel" class="form__input" placeholder="Nhập số điện thoại của bạn">
                        <p class="form__message"></p>
                    </div>
                    <div class="form__group">
                        <label for="" class="cart__form__label">Nhập tên đường và số nhà<span class="required">*</span></label>
                        <input type="text" name="road-home" id="road" class="form__input" placeholder="Nhập tên đường / số nhà">
                        <p class="form__message"></p>
                    </div>
                    <div class="flex" style="flex-wrap: wrap">
                        <div class="form__group">
                            <label for="" class="cart__form__label">Chọn thành phố / tỉnh<span class="required">*</span></label>
                            <select name="city" id="" class="form__select">
                                <option value="tphcm" selected>TP.HCM</option>
                            </select>
                        </div>
                        <div class="form__group">
                            <label for="" class="cart__form__label">Chọn quận / huyện<span class="required">*</span></label>
                            <select name="ward" id="" class="form__select">
                                <option value="tanbinh" selected>Tân Bình</option>
                            </select>
                        </div>
                    </div>
                    <div class="form__group">
                        <h2 class="cart__form__label">Phương thức vận chuyển</h2>
                        <div class="shipping__options">
                            <label for="0" class="shipping__option">
                                <div class="flex" style="gap: 12px">
                                    <i class="fa-regular fa-circle option-btn"></i>
                                    <i class="fa-regular fa-circle-check option-btn"></i>
                                    <div>
                                        <h5 class="option__name">Miễn phí</h5>
                                        <p>7 - 30 ngày (tùy quốc gia)</p>
                                    </div>
                                </div>
                                <p class="shipping__price">$0</p>
                            </label>
                            <label for="1" class="shipping__option active">
                                <div class="flex" style="gap: 12px">
                                    <i class="fa-regular fa-circle-check option-btn"></i>
                                    <i class="fa-regular fa-circle option-btn"></i>
                                    <div>
                                        <h5 class="option__name">Thông thường</h5>
                                        <p>3 - 14 ngày (tùy quốc gia)</p>
                                    </div>
                                </div>
                                <p class="shipping__price">$11</p>
                            </label>
                            <label for="2" class="shipping__option">
                                <div class="flex" style="gap: 12px">
                                    <i class="fa-regular fa-circle option-btn"></i>
                                    <i class="fa-regular fa-circle-check option-btn"></i>
                                    <div>
                                        <h5 class="option__name">Hỏa tốc</h5>
                                        <p>1 - 3 ngày (tùy quốc gia)</p>
                                    </div>
                                </div>
                                <p class="shipping__price">$19</p>
                            </label>
                            <input type="radio" name="shipping" id="1" value="1" hidden>
                            <input type="radio" name="shipping" id="2" value="2" hidden checked>
                            <input type="radio" name="shipping" id="3" value="0" hidden>
                        </div>
                    </div>
                </div>
            </div>
            <div class="checkout__summary">
                <div class="summary__product__wrapper">
                    <!-- single product start -->
                    <?= $product_html?>
                    <!-- single product end -->
                </div>
                <div class="summary__coupon">
                    <h4 class="coupon__title">Mã giảm giá</h4>
                    <div class="form__group">
                        <input class="form__input" type="text" placeholder="Nhập mã giảm giá ">
                        <button class="form__btn">Áp dụng</button>
                    </div>
                    <!-- <p class="call-to-action">Bạn là khác hàng mới ? <a class="hightlight__text">Đăng ký</a> ngay để nhận
                        giá tốt hơn</p> -->
                </div>
                <span class="toggle__detail">See more detail</span>
                <div class="summary__detail">
                    <div class="detail__item">
                        <h5 class="detail__title">Tiền sản phẩm</h5>
                        <p class="detail__cost" style="color: #050728; font-weight: 800;">$165.00</p>
                    </div>
                    <div class="detail__item">
                        <h5 class="detail__title">Giảm giá</h5>
                        <p class="detail__cost">$0</p>
                    </div>
                </div>
                <hr style="margin-block: 12px; border: none; height: 1px; background: rgba(0, 0, 0, 0.1)">
                <div class="checkout__summary__total detail__item">
                    <h4 class="detail__title" style="font-size: 18px;">Tổng tiền</h4>
                    <p class="detail__cost" style="color: #050728; font-weight: 800; font-size: 18px">$<?= $total?></p>
                </div>
                <?= $message ?>
                <button type="submit" name="userOrder" class="form__btn">Tiếp tục</button>
            </div>
        </div>
    </form>
</main>
<script>
    Validator({
        formSelector: '#checkout__form',
        formGroupSelector: '.form__group',
        formMessage: '.form__message',
        rules: [
            Validator.isRequired('#email') , 
            Validator.isRequired('#road') , 
            Validator.isRequired('#address') , 
            Validator.isRequired('#tel') , 
            Validator.isEmail('#email') , 
        ]
    })
</script>