<h1 class="big-text">billing</h1>
<main class="user-account__section user-account__general">
    <div class="user-account__main">
        <div class="main__top">
            <div class="user__overview">
                <div class="user__avt"><img src="/assets/images/user__avt.png" alt=""></div>
                <div>
                    <div class="flex">
                        <h4 class="user__name">Hồ Duy Hoàng Giang</h4>/<span class="user__control-panel">Billing</span>
                    </div>
                    <p class="control-panel__detail">Manage billing information and view receipts.</p>
                </div>
            </div>
        </div>
        <div class="main__bottom">
            <!-- user sidebar render start -->
            <?php
            require_once 'userSidebar.php';
            ?>
            <!-- user sidebar render end -->
            <div class="user-account-content__wrapper">
                <div class="user-account__content">
                    <div class="ua-content__top">
                        <h2 class="top__title">All orders</h2>
                        <div class="billing-type__filter toggle-filter">
                            <i class="fa-solid fa-filter"></i> Filter
                            <ul class="billing-type__list">
                                <li class="type__item">
                                    <div class="type__item__right">
                                        <img src="/assets/images/completed-icon.svg" alt="completed billing">
                                        <h5 class="type__item__name">Complete orders</h5>

                                    </div>
                                    <p class="type__item__qty">5</p>
                                </li>
                                <li class="type__item">
                                    <div class="type__item__right">
                                        <img src="/assets/images/delivering-icon.svg" alt="delivering billing">
                                        <h5 class="type__item__name">Delivering orders</h5>

                                    </div>
                                    <p class="type__item__qty">8</p>
                                </li>
                                <li class="type__item">
                                    <div class="type__item__right">
                                        <img src="/assets/images/return-icon.svg" alt="return billing">
                                        <h5 class="type__item__name">Return orders</h5>

                                    </div>
                                    <p class="type__item__qty">2</p>
                                </li>
                                <li class="type__item">
                                    <div class="type__item__right">
                                        <img src="/assets/images/cancelled-icon.svg" alt="cancelled billing">
                                        <h5 class="type__item__name">Cancelled orders</h5>

                                    </div>
                                    <p class="type__item__qty">5</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="billing-product__wrapper">
                        <!-- single billing product start-->
                        <div class="billing-product">
                            <div class="billing-product__right">
                                <div class="billing-product__banner"></div>
                                <div class="billing-product__detail">
                                    <div class="detail__top">
                                        <h4 class="billing-product__name">Gateron KS-3 Milky Pro </h4>
                                        <p class="billing-product__kind">Yellow - 110 switches</p>
                                    </div>
                                    <p class="billing-product__status masking-text">Complete</p>
                                </div>
                            </div>
                            <div class="billing-product__left">
                                <h4 class="billing-product__price">$165.00</h4>
                                <div class="buttons-set">
                                    <button class="button repurchase__btn">Repurchase</button>
                                    <button class="button get-help__btn"><i class="fa-regular fa-message"></i> Get
                                        help</button>
                                </div>
                            </div>
                        </div>
                        <!-- single billing product end-->
                        <div class="billing-product">
                            <div class="billing-product__right">
                                <div class="billing-product__banner"></div>
                                <div class="billing-product__detail">
                                    <div class="detail__top">
                                        <h4 class="billing-product__name">Gateron KS-3 Milky Pro </h4>
                                        <p class="billing-product__kind">Yellow - 110 switches</p>
                                    </div>
                                    <p class="billing-product__status delivering">Delivering</p>
                                </div>
                            </div>
                            <div class="billing-product__left">
                                <h4 class="billing-product__price">$165.00</h4>
                                <div class="buttons-set">
                                    <button class="button repurchase__btn">Detail</button>
                                    <button class="button get-help__btn"><i class="fa-regular fa-message"></i> Get
                                        help</button>
                                </div>
                            </div>
                        </div>
                        <div class="billing-product">
                            <div class="billing-product__right">
                                <div class="billing-product__banner"></div>
                                <div class="billing-product__detail">
                                    <div class="detail__top">
                                        <h4 class="billing-product__name">Gateron KS-3 Milky Pro </h4>
                                        <p class="billing-product__kind">Yellow - 110 switches</p>
                                    </div>
                                    <p class="billing-product__status return">Return</p>
                                </div>
                            </div>
                            <div class="billing-product__left">
                                <h4 class="billing-product__price">$165.00</h4>
                                <div class="buttons-set">
                                    <button class="button repurchase__btn">Repurchase</button>
                                    <button class="button get-help__btn"><i class="fa-regular fa-message"></i> Get
                                        help</button>
                                </div>
                            </div>
                        </div>
                        <div class="billing-product">
                            <div class="billing-product__right">
                                <div class="billing-product__banner"></div>
                                <div class="billing-product__detail">
                                    <div class="detail__top">
                                        <h4 class="billing-product__name">Gateron KS-3 Milky Pro </h4>
                                        <p class="billing-product__kind">Yellow - 110 switches</p>
                                    </div>
                                    <p class="billing-product__status cancelled">Cancelled</p>
                                </div>
                            </div>
                            <div class="billing-product__left">
                                <h4 class="billing-product__price">$165.00</h4>
                                <div class="buttons-set">
                                    <button class="button repurchase__btn">Repurchase</button>
                                    <button class="button get-help__btn"><i class="fa-regular fa-message"></i> Get
                                        help</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="user-content__save-changes">
                    <div class="flex">
                        <input type="checkbox" name="clear-billing-history" id="clear-billing-history">
                        <label for="clear-billing-history" class="save__note">Want to clear all your billing
                            history?</label>
                    </div>
                    <button class="content-save__btn delete__btn">Clear billing history</button>
                </div>
            </div>
        </div>
    </div>
</main>