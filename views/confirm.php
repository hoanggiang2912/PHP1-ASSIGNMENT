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

<!-- confirm transaction -->
<h1 class="big-text">CONFIRM</h1>
<main class="section confirm__transaction" style="padding-top: 250px">
    <div class="transaction__detail">
        <div class="detail__top">
            <div class="success__icon">
                <svg width="100" height="100" viewBox="0 0 100 100" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M91.6664 46.1668V50.0001C91.6612 58.9852 88.7518 67.7279 83.3719 74.9244C77.992 82.1208 70.43 87.3854 61.8137 89.933C53.1973 92.4806 43.9883 92.1747 35.56 89.0609C27.1317 85.947 19.9357 80.1922 15.0453 72.6545C10.155 65.1169 7.83214 56.2004 8.42333 47.2347C9.01452 38.2691 12.488 29.7348 18.3258 22.9046C24.1636 16.0743 32.0529 11.3142 40.8171 9.33403C49.5813 7.35388 58.7508 8.25982 66.958 11.9168"
                        stroke="#00C2FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M91.6667 16.6667L50 58.3751L37.5 45.8751" stroke="#00C2FF" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" />
                </svg>

            </div>
            <h4 class="success__title">Đặt hàng thành công!</h4>
            <p class="email__note">Email xác nhận đơn hàng đã được gửi tới <?=$email?></p>
        </div>
        <div class="detail__body">
            <div class="detail__item">
                <h5 class="detail__item__name">Địa chỉ</h5>
                <p class="detail__item__description"><?= $address ?></p>
            </div>
            <div class="detail__item">
                <h5 class="detail__item__name">Phương thức thanh toán</h5>
                <p class="detail__item__description">Tiền mặt</p>
            </div>
            <div class="detail__item">
                <h5 class="detail__item__name">Phương thức vận chuyển</h5>
                <p class="detail__item__description"><?=$shippingName['name']?></p>
            </div>
        </div>
        <div class="detail__bottom">
            <h5 class="detail__item__name">Đơn hàng của bạn</h5>
            <div class="summary__product__wrapper">
                    <!-- single product start -->
                    <?= $product_html ?>
                <!-- single product end -->
            </div>
            <span class="toggle__detail">Xem chi tiết</span>
            <div class="summary__detail">
                <div class="detail__item">
                    <h5 class="detail__title">Tiền sản phẩm</h5>
                    <p class="detail__cost" style="color: #050728; font-weight: 800;">$<?= $totalBill?></p>
                </div>
                <div class="detail__item">
                    <h5 class="detail__title">Giảm giá</h5>
                    <p class="detail__cost">$0</p>
                </div>
                <div class="detail__item">
                    <h5 class="detail__title">Phí vận chuyển</h5>
                    <p class="detail__cost">$<?= $shippingFee ?></p>
                </div>
            </div>
            <hr style="margin-block: 12px;">
            <div class="checkout__summary__total detail__item">
                <h4 class="detail__title" style="font-size: 18px;">Tổng tiền</h4>
                <p class="detail__cost" style="color: #050728; font-weight: 800; font-size: 18px">$<?=$totalBill + $shippingFee?></p>
            </div>
        </div>
        <a href="index.php" class="form__btn">Tiếp tục mua sắm</a>
    </div>
</main>