<?php 

?>

<!-- main section  -->
<section class="section cart__main">
    <nav>
        <ul class="payment__nav">
            <div class="toggle-dropdown" style="display: none;"><i class="fa-solid fa-sliders"></i> Giỏ hàng</div>
            <li class="nav__item active"><i class="fa-solid fa-box"></i><a href="/html/cart.html" class="nav__link">Giỏ
                    hàng</a></li>
            <li class="nav__item"><a href="" class="nav__link"><i class="fa-solid fa-chevron-right"></i></a></li>
            <li class="nav__item"><i class="fa-solid fa-wallet"></i><a href="/html/checkout.html"
                    class="nav__link">Thanh toán</a></li>
            <li class="nav__item"><a href="" class="nav__link"><i class="fa-solid fa-chevron-right"></i></a></li>
            <li class="nav__item">
                <i class="fa-solid fa-credit-card"></i><a href="/html/payment.html" class="nav__link">Phương thức thanh
                    toán</a>
            </li>
        </ul>
        <ul class="payment__respon__nav">
            <li class="nav__item active"><i class="fa-solid fa-box"></i><a href="/html/cart.html" class="nav__link">Giỏ
                    hàng</a></li>
            <li class="nav__item"><i class="fa-solid fa-wallet"></i><a href="/html/checkout.html"
                    class="nav__link">Thanh toán</a></li>
            <li class="nav__item">
                <i class="fa-solid fa-credit-card"></i><a href="/html/payment.html" class="nav__link">Phương thức thanh
                    toán</a>
            </li>
        </ul>
    </nav>
    <div class="cart__body">
        <div class="cart__product__wrapper">
            <?php 
                if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])){
                    $i = 0;
                    foreach($_SESSION['cart'] as $item) {
                        extract($item);
                        $background = 'background: url(./views/layout/assets/image/'.$img.') no-repeat center center / cover';
                        $subTotal = $qty * $price;
                        $delProduct = 'index.php?pg=delCart&delProduct=' .$i;
                        echo '
                            <div class="cart__product">
                                <div class="flex">
                                    <input type="checkbox" name="productchecked" id="productchecked">
                                    <div class="cart__product__banner">
                                        <img src="./views/layout/assets/images/'.$img.'" alt="">
                                    </div>
                                    <div class="cart__product__detail">
                                        <h2 class="cart__product__name">'.$name.'</h2>
                                        <p class="cart__product__price">$'.$price.'</p>
                                    </div>
                                </div>
                                <div class="cart__product__detail">
                                    <a href="'.$delProduct.'"><i class="fa-solid fa-xmark del__btn"></i></a>
                                    <div class="qty__input__wrapper flex">
                                        <span class="qty__btn minus__btn">-</span>
                                        <input type="number" min="0" max="" value="'.$qty.'" class="qty__input">
                                        <span class="qty__btn plus__btn">+</span>
                                    </div>
                                    <p class="cart__product__subtotal">$'.$subTotal.'</p>
                                </div>
                            </div>
                        ';
                        $i++;
                    }
                } 
                if (empty($_SESSION['cart'])) {
                    echo '
                        <div class="empty-cart__block">
                            <h2 class="empty__noti">YOUR CART IS EMPTY</h2>
                            <a href="index.php" class="product__btn empty-cart__btn">Continue to shopping</a>
                        </div>
                    ';
                } else {
                    echo '
                        <a href="index.php?pg=clearCart" class="clear-cart__btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" viewBox="0 0 21 20" fill="none">
  <path d="M3.25 4.75H17.75M7.25 4.75V3.75C7.25 2.64543 8.14543 1.75 9.25 1.75H11.75C12.8546 1.75 13.75 2.64543 13.75 3.75V4.75M12.75 8.75V14.25M8.25 8.75V14.25M4.25 4.75H16.75L16.1049 16.3609C16.0461 17.4208 15.1695 18.25 14.108 18.25H6.89197C5.8305 18.25 4.95393 17.4208 4.89505 16.3609L4.25 4.75Z" stroke="#5D5D5D" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
                        Clear cart</a>
                    ';
                }
            ?>
            
        </div>
        <?php 
            $total = 0;
            if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $item) {
                    extract($item);
                    $subtotal = $price * $qty;
                    $total += $subtotal;
                }
            }
        ?>
        <div class="cart__summary">
            <div class="summary__wrapper">
                <div class="flex">
                    <div class="summary__title">Tổng hóa đơn</div>
                    <span class="toggle__detail">Chi tiết</span>
                </div>
                <div class="summary__detail">
                    <div class="flex">
                        <span>Tổng tiền sản phẩm</span>
                        <span class="summary__price">$0</span>
                    </div>
                    <div class="flex">
                        <span>Phí giao hàng</span>
                        <span>miễn phí</span>
                    </div>
                    <h5 class="coupon">Thêm mã giảm giá <i class="fa-solid fa-arrow-right"></i></h5>
                </div>
                <div class="summary__total flex">
                    <span>Thực chi</span>
                    <span class="summary__total__price">$<?=$total?></span>
                </div>
            </div>
            <a href="/html/checkout.html" class="buy__now__btn">Mua ngay</a>
        </div>
    </div>
</section>