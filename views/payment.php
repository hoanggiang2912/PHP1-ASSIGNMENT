<?php
// showing cart
    $product_html = '';
    $cart = $_SESSION['cart'];  
    $total = 0;
    foreach ($cart as $item) {
        extract($item);
        $subTotal = $price * $qty;
        $total += $subTotal;
        $path = "./views/layout/assets/images/$img";
        $product_html .= '
            <div class="summary__product flex">
                <div class="flex" style="gap: 8px">
                    <div class="summary__product__banner" style="background: url(' . $path . ') no-repeat center center / cover;">
                    </div>
                    <div>
                        <div class="summary__product__name">
                            ' . $name . '
                        </div>
                        <div class="product__option flex">
                            <span></span>
                            <span><span>
                        </div>
                    </div>
                </div>
                <div style="display: flex; flex-direction: column; align-self: stretch; justify-content: space-between; align-items: end">
                    <div class="product__price">$
                        ' . $price . '
                    </div>
                    <div class="qty">x ' . $qty . '</div>
                </div>
            </div>
        ';
    }

    
?>

<section class="section checkout-main-section">
    <?php 
        require_once 'paymentNav.php';
    ?>
    <form action="index.php?pg=payment&billId=<?= $billId ?>" method="post">
        <h4 class="cart__form__title" style="margin-bottom: 18px;">Địa chỉ đơn hàng</h4>
        <div class="form__group">
            <i class="fa-regular fa-circle-check option-btn"></i>
            <input type="submit" hidden name="shippingAddress" id="shippingAddress">
            <label for="shippingAddress">Địa chỉ giống với địa chỉ vận chuyển</label>
        </div>
    </form>
    <form action="index.php?pg=confirm&billId=<?=$billId?>" method="post" class="checkout__form">
    <div class="checkout__wrapper flex" style="flex-wrap: wrap-reverse">
        <div class="checkout__form__wrapper">
            <div class="payment__methods">
                <h5 class="payment__methods__title">Chọn phương thức thanh toán</h5>
                <lable for="cash" class="payment__method">
                    <div class="flex" style="gap: 12px">
                        <i class="fa-regular fa-circle-check option-btn"></i>
                        <i class="fa-regular fa-circle option-btn"></i>
                        <h5 class="method__name">Tiền mặt</h5>
                    </div>
                </lable>
                <lable for="creditCard" class="payment__method active">
                    <div class="flex" style="gap: 12px">
                        <i class="fa-regular fa-circle-check option-btn"></i>
                        <i class="fa-regular fa-circle option-btn"></i>
                        <h5 class="method__name">Thẻ tín dụng</h5>
                    </div>
                    <form action="" class="payment-method-info__form" method="post">
                        <div class="form__group">
                            <input type="text" class="form__input" placeholder="Số thẻ">
                            <p class="form__message"></p>
                        </div>
                        <div class="form__group">
                            <input type="text" class="form__input" placeholder="Tên thẻ">
                            <p class="form__message"></p>
                        </div>
                        <div class="flex" style="gap: 20px">
                            <div class="form__group">
                                <input type="text" class="form__input" placeholder="Ngày hết hạn">
                                <p class="form__message"></p>
                            </div>
                            <div class="form__group">
                                <input type="text" class="form__input" placeholder="CVV">
                                <p class="form__message"></p>
                            </div>
                        </div>
                        <div class="form__group">
                            <input type="checkbox" name="paymentInfo" id="paymentInfo">
                            <label for="paymentInfo">Ghi nhớ thông tin thẻ</label>
                        </div>
                    </form>
                </lable>
                <lable for="paypal" class="payment__method">
                    <div class="flex" style="gap: 12px">
                        <i class="fa-regular fa-circle-check option-btn"></i>
                        <i class="fa-regular fa-circle option-btn"></i>
                        <h5 class="method__name">Paypal</h5>
                    </div>
                    <form action="" class="payment-method-info__form" method="post">
                        <div class="form__group">
                            <input type="text" class="form__input" placeholder="Số thẻ">
                            <p class="form__message"></p>
                        </div>
                        <div class="form__group">
                            <input type="text" class="form__input" placeholder="Tên thẻ">
                            <p class="form__message"></p>
                        </div>
                        <div class="flex" style="gap: 20px">
                            <div class="form__group">
                                <input type="text" class="form__input" placeholder="Ngày hết hạn">
                                <p class="form__message"></p>
                            </div>
                            <div class="form__group">
                                <input type="text" class="form__input" placeholder="CVV">
                                <p class="form__message"></p>
                            </div>
                        </div>
                        <div class="form__group">
                            <input type="checkbox" name="paymentInfo-paypal" id="paymentInfo-paypal">
                            <label for="paymentInfo-paypal">Ghi nhớ thông tin thẻ</label>
                        </div>
                    </form>
                </lable>
                <lable for="momo" class="payment__method">
                    <div class="flex" style="gap: 12px">
                        <i class="fa-regular fa-circle-check option-btn"></i>
                        <i class="fa-regular fa-circle option-btn"></i>
                        <h5 class="method__name">Momo</h5>
                    </div>
                    <form action="" class="payment-method-info__form" method="post">
                        <div class="form__group">
                            <input type="text" class="form__input" placeholder="Số thẻ">
                            <p class="form__message"></p>
                        </div>
                        <div class="form__group">
                            <input type="text" class="form__input" placeholder="Tên thẻ">
                            <p class="form__message"></p>
                        </div>
                        <div class="flex" style="gap: 20px">
                            <div class="form__group">
                                <input type="text" class="form__input" placeholder="Ngày hết hạn">
                                <p class="form__message"></p>
                            </div>
                            <div class="form__group">
                                <input type="text" class="form__input" placeholder="CVV">
                                <p class="form__message"></p>
                            </div>
                        </div>
                        <div class="form__group">
                            <input type="checkbox" name="paymentInfo-momo" id="paymentInfo-momo">
                            <label for="paymentInfo-momo">Ghi nhớ thông tin thẻ</label>
                        </div>
                    </form>
                </lable>
                <input type="hidden" name="paymentMethod" value="0" id="cash">
                <input type="hidden" name="paymentMethod" value="1" id="creditCard">
                <input type="hidden" name="paymentMethod" value="2" id="paypal">
                <input type="hidden" name="paymentMethod" value="3" id="momo">
            </div>
                <hr style="margin-block: 30px">
                <h4 class="cart__form__title" style="margin-bottom: 18px;">Địa chỉ giao dịch</h4>
                <div class="form__group">
                    <label for="" class="cart__form__label">Địa chỉ<span class="required">*</span></label>
                    <input type="text" class="form__input" value="<?= $addressView?>">
                    <p class="form__message"></p>
                </div>
                <div class="form__group">
                    <label for="" class="cart__form__label">Email<span class="required">*</span></label>
                    <input type="text" class="form__input" value="<?= $emailView ?>">
                    <p class="form__message"></p>
                </div>
                <div class="form__group">
                    <label for="" class="cart__form__label">Số điện thoại<span class="required">*</span></label>
                    <input type="text" class="form__input" value="<?= $telView ?>">
                    <p class="form__message"></p>
                </div>
                <div class="form__group">
                    <label for="" class="cart__form__label">Nhập tên đường và số nhà</label>
                    <input type="text" class="form__input" name="road-home">
                    <p class="form__message"></p>
                </div>
                <div class="flex" style="flex-wrap: wrap">
                    <div class="form__group">
                        <label for="" class="cart__form__label">Chọn thành phố / tỉnh<span class="required">*</span></label>
                        <select name="city" id="" class="form__select">
                            <option value="hcm" selected>TP.HCM</option>
                        </select>
                    </div>
                    <div class="form__group">
                        <label for="" class="cart__form__label">Chọn quận / huyện<span class="required">*</span></label>
                        <select name="ward" id="" class="form__select">
                            <option value="tanbinh" selected>Tân Bình</option>
                        </select>
                    </div>
                </div>
                <h4 class="cart__form__title" style="margin-bottom: 18px;">Lưu thông tin</h4>
                <div class="form__group">
                    <input type="checkbox" name="saveInfo" id="saveInfo">
                    <label for="saveInfo">Lưu lại thông tin giao hàng cho những đơn hàng tiếp theo</label>
                </div>
            </form>
        </div>
        <div class="checkout__summary">
            <div class="summary__product__wrapper">
                <!-- single product start -->
                <?= $product_html ?>
                <!-- single product end -->
            </div>
            <div class="summary__coupon">
                <h4 class="coupon__title">Mã giảm giá</h4>
                <div class="form__group">
                    <input class="form__input" type="text" placeholder="Nhập mã giảm giá ">
                    <button class="form__btn">Áp dụng</button>
                </div>
                <!-- <p class="call-to-action">Bạn là khác hàng mới ? <a class="hightlight__text">Đăng ký</a> ngay để nhận
                    giá
                    tốt hơn</p> -->
            </div>
            <span class="toggle__detail">See more detail</span>
            <div class="summary__detail">
                <div class="detail__item">
                    <h5 class="detail__title">Tiền sản phẩm</h5>
                    <p class="detail__cost" style="color: #050728; font-weight: 800;">$<?= $total?></p>
                </div>
                <div class="detail__item">
                    <h5 class="detail__title">Giảm giá</h5>
                    <p class="detail__cost">$0</p>
                </div>
                <div class="detail__item">
                    <h5 class="detail__title">Phí vận chuyển</h5>
                    <p class="detail__cost">$<?= $shippingFee?></p>
                </div>
            </div>
            <hr style="margin-block: 12px;">
            <div class="checkout__summary__total detail__item">
                <h4 class="detail__title" style="font-size: 18px;">Tổng tiền</h4>
                <p class="detail__cost" style="color: #050728; font-weight: 800; font-size: 18px">$<?= $total + $shippingFee ?></p>
            </div>
            <button type="submit" name="paymentDone" class="form__btn">Tiếp tục</butt>
        </div>
    </div>
</form>
</section>