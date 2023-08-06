<?php 
    // connect product model
    require_once './models/product.php';
    $keyboards = getProductsByCatalogId(1);
    $keycaps = getProductsByCatalogId(2);
    $switches = getProductsByCatalogId(3);
    $kits = getProductsByCatalogId(4);

    $catalogs = getCatalogs();

    function bannerRender ($bannerArr) {
        foreach ($bannerArr as $item) {
            extract($item);
            $background = "./views/layout/assets/images/$source";
            echo '
                <div class="slider__item" style="background-image: url('.$background.');">
                    <div class="text__center">
                        <h4 class="text__label">' . $banner_subtext . '</h4>
                        <h2 class="text-spotlight">'.$banner_name.'</h2>
                        <h5 class="text-product__origin">'.$banner_description.'</h5>
                        <button class="banner__btn">MUA NGAY</button>
                    </div>
                </div>
            ';
        }
    }
?>
<!-- slider -->
        <div class="slider-container hero-banner">
            <div class="slider-main">
                <?= bannerRender($heroBanner)?>
            </div>
            <i class="fa-solid fa-chevron-right prev-btn slider-btn"></i>
            <i class="fa-solid fa-chevron-right next-btn slider-btn"></i>   
        </div>
        <!-- product sections -->
        <section id="product" class="section product-section">
            <h2 class="section-title">NHỮNG SẢN PHẨM CỦA CHÚNG TÔI</h2>
            <div class="tab-container">
                <div class="flex tabs">
                    <div class="tab__item active">KITS</div>
                    <div class="tab__item">KEYCAPS</div>
                    <div class="tab__line"></div>
                </div>
                <div class="panels">
                    <!-- kits panel -->
                    <div class="panel panel__item active">
                        <div class="product-wrapper">
                            <?=renderGeneralProduct($kits)?>
                        </div>
                        <a href="index.php?pg=viewProduct&idcatalog=4" class="btn more-btn">Xem thêm</a>
                    </div>
                    <!-- keycaps panel -->
                    <div class="panel panel__item">
                        <div class="product-wrapper">
                            <?= renderGeneralProduct($keycaps) ?>
                        </div>
                        <div class="more-btn-wrapper">
                            <a href="index.php?pg=viewProduct&idcatalog=2" class="btn more-btn">Xem thêm</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="more-product" class="section product-section">
            <h2 class="section-title">CÁC SẢN PHẨM KHÁC</h2>
            <div class="tab-container">
                <div class="flex tabs">
                    <div class="tab__item active">SWITCHES</div>
                    <div class="tab__item">PRE-BUILT</div>
                    <div class="tab__line"></div>   
                </div>  
                <div class="panels">
                    <!-- switches panel -->
                    <div class="panel panel__item active">
                        <div class="product-wrapper">
                            <?= renderGeneralProduct($switches) ?>
                        </div>
                        <a href="index.php?pg=viewProduct&idcatalog=3" class="btn more-btn">Xem thêm</a>
                    </div>
                    <!-- pre-built panel -->
                    <div id="pre-built" class="panel panel__item">
                        <div class="product-wrapper">
                            <?= renderGeneralProduct($keyboards)?>
                        </div>    
                        <div class="more-products">
                            <div class="product-wrapper">
                                <div class="product">
                                    <a href="" class="product__banner">
                                        <img src="./views/layout/assets/images/pc75-B-X-768x768.jpg" alt="">
                                        <div class="overlay">
                                        <div class="buttons-set">
                                            <a href="" class="btn add__btn"><i class="fa-solid fa-plus"></i> Xem sau</a>
                                            <a href="" class="btn buy__btn">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
  <path d="M13.25 7.25V4.95C13.25 3.8299 13.25 3.26984 13.032 2.84202C12.8403 2.46569 12.5343 2.15973 12.158 1.96799C11.7301 1.75 11.1701 1.75 10.05 1.75H9.94999C8.82988 1.75 8.26983 1.75 7.842 1.96799C7.46568 2.15973 7.15972 2.46569 6.96797 2.84202C6.74998 3.26984 6.74998 3.8299 6.74998 4.95V7.25M6.19579 18.25H13.8042C15.0014 18.25 15.6 18.25 16.0436 18.0114C16.4334 17.8018 16.7427 17.4688 16.923 17.0646C17.1281 16.6046 17.0839 16.0076 16.9954 14.8136L16.4695 7.71361C16.3921 6.66903 16.3534 6.14675 16.1253 5.75104C15.9244 5.40263 15.6232 5.12288 15.2609 4.94829C14.8494 4.75 14.3257 4.75 13.2783 4.75H6.72171C5.67428 4.75 5.15056 4.75 4.73908 4.94829C4.37679 5.12288 4.07554 5.40263 3.87466 5.75104C3.64652 6.14675 3.60783 6.66903 3.53046 7.71361L3.00453 14.8136C2.91609 16.0076 2.87187 16.6046 3.07701 17.0646C3.25728 17.4688 3.56653 17.8018 3.95633 18.0114C4.39993 18.25 4.99855 18.25 6.19579 18.25Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
                                                Mua ngay
                                            </a>
                                        </div>
                                    </div>
                                    </a>
                                    <a class="product__detail">
                                        <h2 class="product__name">Black&Gold PC75B Plus v2</h2>
                                        <div class="flex" style="width: 100%">
                                            <h4 class="product__price"> $749.25 </h4>
                                            <div class="product__info">
                                                <div>(124 đã bán)</div>
                                                <div>4.3 <i class="fa-solid fa-star"></i></div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="product">
                                    <a href="" class="product__banner">
                                        <img src="./views/layout/assets/images/BlackGold-3068B-768x768.jpg" alt="">
                                        <div class="overlay">
                                        <div class="buttons-set">
                                            <a href="" class="btn add__btn"><i class="fa-solid fa-plus"></i> Xem sau</a>
                                            <a href="" class="btn buy__btn">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
  <path d="M13.25 7.25V4.95C13.25 3.8299 13.25 3.26984 13.032 2.84202C12.8403 2.46569 12.5343 2.15973 12.158 1.96799C11.7301 1.75 11.1701 1.75 10.05 1.75H9.94999C8.82988 1.75 8.26983 1.75 7.842 1.96799C7.46568 2.15973 7.15972 2.46569 6.96797 2.84202C6.74998 3.26984 6.74998 3.8299 6.74998 4.95V7.25M6.19579 18.25H13.8042C15.0014 18.25 15.6 18.25 16.0436 18.0114C16.4334 17.8018 16.7427 17.4688 16.923 17.0646C17.1281 16.6046 17.0839 16.0076 16.9954 14.8136L16.4695 7.71361C16.3921 6.66903 16.3534 6.14675 16.1253 5.75104C15.9244 5.40263 15.6232 5.12288 15.2609 4.94829C14.8494 4.75 14.3257 4.75 13.2783 4.75H6.72171C5.67428 4.75 5.15056 4.75 4.73908 4.94829C4.37679 5.12288 4.07554 5.40263 3.87466 5.75104C3.64652 6.14675 3.60783 6.66903 3.53046 7.71361L3.00453 14.8136C2.91609 16.0076 2.87187 16.6046 3.07701 17.0646C3.25728 17.4688 3.56653 17.8018 3.95633 18.0114C4.39993 18.25 4.99855 18.25 6.19579 18.25Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
                                                Mua ngay
                                            </a>
                                        </div>
                                    </div>
                                    </a>
                                    <a class="product__detail">
                                        <h2 class="product__name">Black&Gold 3068B Plus</h2>
                                        <div class="flex" style="width: 100%">
                                            <h4 class="product__price"> $749.25 </h4>
                                            <div class="product__info">
                                                <div>(124 đã bán)</div>
                                                <div>4.3 <i class="fa-solid fa-star"></i></div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="product">
                                    <a href="" class="product__banner">
                                        <img src="./views/layout/assets/images/ACR-75-PRO-XG1-768x768.jpg" alt="">
                                        <div class="overlay">
                                        <div class="buttons-set">
                                            <a href="" class="btn add__btn"><i class="fa-solid fa-plus"></i> Xem sau</a>
                                            <a href="" class="btn buy__btn">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
  <path d="M13.25 7.25V4.95C13.25 3.8299 13.25 3.26984 13.032 2.84202C12.8403 2.46569 12.5343 2.15973 12.158 1.96799C11.7301 1.75 11.1701 1.75 10.05 1.75H9.94999C8.82988 1.75 8.26983 1.75 7.842 1.96799C7.46568 2.15973 7.15972 2.46569 6.96797 2.84202C6.74998 3.26984 6.74998 3.8299 6.74998 4.95V7.25M6.19579 18.25H13.8042C15.0014 18.25 15.6 18.25 16.0436 18.0114C16.4334 17.8018 16.7427 17.4688 16.923 17.0646C17.1281 16.6046 17.0839 16.0076 16.9954 14.8136L16.4695 7.71361C16.3921 6.66903 16.3534 6.14675 16.1253 5.75104C15.9244 5.40263 15.6232 5.12288 15.2609 4.94829C14.8494 4.75 14.3257 4.75 13.2783 4.75H6.72171C5.67428 4.75 5.15056 4.75 4.73908 4.94829C4.37679 5.12288 4.07554 5.40263 3.87466 5.75104C3.64652 6.14675 3.60783 6.66903 3.53046 7.71361L3.00453 14.8136C2.91609 16.0076 2.87187 16.6046 3.07701 17.0646C3.25728 17.4688 3.56653 17.8018 3.95633 18.0114C4.39993 18.25 4.99855 18.25 6.19579 18.25Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
                                                Mua ngay
                                            </a>
                                        </div>
                                    </div>
                                    </a>
                                    <a class="product__detail">
                                        <h2 class="product__name">ACR Pro 75</h2>
                                        <div class="flex" style="width: 100%">
                                            <h4 class="product__price"> $749.25 </h4>
                                            <div class="product__info">
                                                <div>(124 đã bán)</div>
                                                <div>4.3 <i class="fa-solid fa-star"></i></div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="product">
                                    <a href="" class="product__banner">
                                        <img src="./views/layout/assets/images/BlackGold-3084B-Plus-768x768.jpg" alt="">
                                        <div class="overlay">
                                        <div class="buttons-set">
                                            <a href="" class="btn add__btn"><i class="fa-solid fa-plus"></i> Xem sau</a>
                                            <a href="" class="btn buy__btn">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
  <path d="M13.25 7.25V4.95C13.25 3.8299 13.25 3.26984 13.032 2.84202C12.8403 2.46569 12.5343 2.15973 12.158 1.96799C11.7301 1.75 11.1701 1.75 10.05 1.75H9.94999C8.82988 1.75 8.26983 1.75 7.842 1.96799C7.46568 2.15973 7.15972 2.46569 6.96797 2.84202C6.74998 3.26984 6.74998 3.8299 6.74998 4.95V7.25M6.19579 18.25H13.8042C15.0014 18.25 15.6 18.25 16.0436 18.0114C16.4334 17.8018 16.7427 17.4688 16.923 17.0646C17.1281 16.6046 17.0839 16.0076 16.9954 14.8136L16.4695 7.71361C16.3921 6.66903 16.3534 6.14675 16.1253 5.75104C15.9244 5.40263 15.6232 5.12288 15.2609 4.94829C14.8494 4.75 14.3257 4.75 13.2783 4.75H6.72171C5.67428 4.75 5.15056 4.75 4.73908 4.94829C4.37679 5.12288 4.07554 5.40263 3.87466 5.75104C3.64652 6.14675 3.60783 6.66903 3.53046 7.71361L3.00453 14.8136C2.91609 16.0076 2.87187 16.6046 3.07701 17.0646C3.25728 17.4688 3.56653 17.8018 3.95633 18.0114C4.39993 18.25 4.99855 18.25 6.19579 18.25Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
                                                Mua ngay
                                            </a>
                                        </div>
                                    </div>
                                    </a>
                                    <a class="product__detail">
                                        <h2 class="product__name">Black&Gold 3084B Plus</h2>
                                        <div class="flex" style="width: 100%">
                                            <h4 class="product__price"> $749.25 </h4>
                                            <div class="product__info">
                                                <div>(124 đã bán)</div>
                                                <div>4.3 <i class="fa-solid fa-star"></i></div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="product">
                                    <a href="" class="product__banner">
                                        <img src="./views/layout/assets/images/ACR-59-W2-768x768.jpg" alt="">
                                        <div class="overlay">
                                        <div class="buttons-set">
                                            <a href="" class="btn add__btn"><i class="fa-solid fa-plus"></i> Xem sau</a>
                                            <a href="" class="btn buy__btn">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
  <path d="M13.25 7.25V4.95C13.25 3.8299 13.25 3.26984 13.032 2.84202C12.8403 2.46569 12.5343 2.15973 12.158 1.96799C11.7301 1.75 11.1701 1.75 10.05 1.75H9.94999C8.82988 1.75 8.26983 1.75 7.842 1.96799C7.46568 2.15973 7.15972 2.46569 6.96797 2.84202C6.74998 3.26984 6.74998 3.8299 6.74998 4.95V7.25M6.19579 18.25H13.8042C15.0014 18.25 15.6 18.25 16.0436 18.0114C16.4334 17.8018 16.7427 17.4688 16.923 17.0646C17.1281 16.6046 17.0839 16.0076 16.9954 14.8136L16.4695 7.71361C16.3921 6.66903 16.3534 6.14675 16.1253 5.75104C15.9244 5.40263 15.6232 5.12288 15.2609 4.94829C14.8494 4.75 14.3257 4.75 13.2783 4.75H6.72171C5.67428 4.75 5.15056 4.75 4.73908 4.94829C4.37679 5.12288 4.07554 5.40263 3.87466 5.75104C3.64652 6.14675 3.60783 6.66903 3.53046 7.71361L3.00453 14.8136C2.91609 16.0076 2.87187 16.6046 3.07701 17.0646C3.25728 17.4688 3.56653 17.8018 3.95633 18.0114C4.39993 18.25 4.99855 18.25 6.19579 18.25Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
                                                Mua ngay
                                            </a>
                                        </div>
                                    </div>
                                    </a>
                                    <a class="product__detail">
                                        <h2 class="product__name">ACR59 BOW Bundle</h2>
                                        <div class="flex" style="width: 100%">
                                            <h4 class="product__price"> $749.25 </h4>
                                            <div class="product__info">
                                                <div>(124 đã bán)</div>
                                                <div>4.3 <i class="fa-solid fa-star"></i></div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="product">
                                    <a href="" class="product__banner">
                                        <img src="./views/layout/assets/images/PC75B-Plus-Blue-on-White-768x768.jpg" alt="">
                                        <div class="overlay">
                                        <div class="buttons-set">
                                            <a href="" class="btn add__btn"><i class="fa-solid fa-plus"></i> Xem sau</a>
                                            <a href="" class="btn buy__btn">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
  <path d="M13.25 7.25V4.95C13.25 3.8299 13.25 3.26984 13.032 2.84202C12.8403 2.46569 12.5343 2.15973 12.158 1.96799C11.7301 1.75 11.1701 1.75 10.05 1.75H9.94999C8.82988 1.75 8.26983 1.75 7.842 1.96799C7.46568 2.15973 7.15972 2.46569 6.96797 2.84202C6.74998 3.26984 6.74998 3.8299 6.74998 4.95V7.25M6.19579 18.25H13.8042C15.0014 18.25 15.6 18.25 16.0436 18.0114C16.4334 17.8018 16.7427 17.4688 16.923 17.0646C17.1281 16.6046 17.0839 16.0076 16.9954 14.8136L16.4695 7.71361C16.3921 6.66903 16.3534 6.14675 16.1253 5.75104C15.9244 5.40263 15.6232 5.12288 15.2609 4.94829C14.8494 4.75 14.3257 4.75 13.2783 4.75H6.72171C5.67428 4.75 5.15056 4.75 4.73908 4.94829C4.37679 5.12288 4.07554 5.40263 3.87466 5.75104C3.64652 6.14675 3.60783 6.66903 3.53046 7.71361L3.00453 14.8136C2.91609 16.0076 2.87187 16.6046 3.07701 17.0646C3.25728 17.4688 3.56653 17.8018 3.95633 18.0114C4.39993 18.25 4.99855 18.25 6.19579 18.25Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
                                                Mua ngay
                                            </a>
                                        </div>
                                    </div>
                                    </a>
                                    <a class="product__detail">
                                        <h2 class="product__name">PC75B Plus Blue on White</h2>
                                        <div class="flex" style="width: 100%">
                                            <h4 class="product__price"> $749.25 </h4>
                                            <div class="product__info">
                                                <div>(124 đã bán)</div>
                                                <div>4.3 <i class="fa-solid fa-star"></i></div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="product">
                                    <a href="" class="product__banner">
                                        <img src="./views/layout/assets/images/PC75B-Plus-Black-Silver-768x768.jpg" alt="">
                                        <div class="overlay">
                                        <div class="buttons-set">
                                            <a href="" class="btn add__btn"><i class="fa-solid fa-plus"></i> Xem sau</a>
                                            <a href="" class="btn buy__btn">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
  <path d="M13.25 7.25V4.95C13.25 3.8299 13.25 3.26984 13.032 2.84202C12.8403 2.46569 12.5343 2.15973 12.158 1.96799C11.7301 1.75 11.1701 1.75 10.05 1.75H9.94999C8.82988 1.75 8.26983 1.75 7.842 1.96799C7.46568 2.15973 7.15972 2.46569 6.96797 2.84202C6.74998 3.26984 6.74998 3.8299 6.74998 4.95V7.25M6.19579 18.25H13.8042C15.0014 18.25 15.6 18.25 16.0436 18.0114C16.4334 17.8018 16.7427 17.4688 16.923 17.0646C17.1281 16.6046 17.0839 16.0076 16.9954 14.8136L16.4695 7.71361C16.3921 6.66903 16.3534 6.14675 16.1253 5.75104C15.9244 5.40263 15.6232 5.12288 15.2609 4.94829C14.8494 4.75 14.3257 4.75 13.2783 4.75H6.72171C5.67428 4.75 5.15056 4.75 4.73908 4.94829C4.37679 5.12288 4.07554 5.40263 3.87466 5.75104C3.64652 6.14675 3.60783 6.66903 3.53046 7.71361L3.00453 14.8136C2.91609 16.0076 2.87187 16.6046 3.07701 17.0646C3.25728 17.4688 3.56653 17.8018 3.95633 18.0114C4.39993 18.25 4.99855 18.25 6.19579 18.25Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
                                                Mua ngay
                                            </a>
                                        </div>
                                    </div>
                                    </a>
                                    <a class="product__detail">
                                        <h2 class="product__name">PC75B Plus Black&Silver</h2>
                                        <div class="flex" style="width: 100%">
                                            <h4 class="product__price"> $749.25 </h4>
                                            <div class="product__info">
                                                <div>(124 đã bán)</div>
                                                <div>4.3 <i class="fa-solid fa-star"></i></div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                                <div class="product">
                                    <a href="" class="product__banner">
                                        <img src="./views/layout/assets/images/Cinnamoroll-20th-TOP-75-X-768x768.jpg" alt="">
                                        <div class="overlay">
                                        <div class="buttons-set">
                                            <a href="" class="btn add__btn"><i class="fa-solid fa-plus"></i> Xem sau</a>
                                            <a href="" class="btn buy__btn">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
  <path d="M13.25 7.25V4.95C13.25 3.8299 13.25 3.26984 13.032 2.84202C12.8403 2.46569 12.5343 2.15973 12.158 1.96799C11.7301 1.75 11.1701 1.75 10.05 1.75H9.94999C8.82988 1.75 8.26983 1.75 7.842 1.96799C7.46568 2.15973 7.15972 2.46569 6.96797 2.84202C6.74998 3.26984 6.74998 3.8299 6.74998 4.95V7.25M6.19579 18.25H13.8042C15.0014 18.25 15.6 18.25 16.0436 18.0114C16.4334 17.8018 16.7427 17.4688 16.923 17.0646C17.1281 16.6046 17.0839 16.0076 16.9954 14.8136L16.4695 7.71361C16.3921 6.66903 16.3534 6.14675 16.1253 5.75104C15.9244 5.40263 15.6232 5.12288 15.2609 4.94829C14.8494 4.75 14.3257 4.75 13.2783 4.75H6.72171C5.67428 4.75 5.15056 4.75 4.73908 4.94829C4.37679 5.12288 4.07554 5.40263 3.87466 5.75104C3.64652 6.14675 3.60783 6.66903 3.53046 7.71361L3.00453 14.8136C2.91609 16.0076 2.87187 16.6046 3.07701 17.0646C3.25728 17.4688 3.56653 17.8018 3.95633 18.0114C4.39993 18.25 4.99855 18.25 6.19579 18.25Z" stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
                                                Mua ngay
                                            </a>
                                        </div>
                                    </div>
                                    </a>
                                    <a class="product__detail">
                                        <h2 class="product__name">Cinnamoroll 20th Anniversary ACR TOP 75</h2>
                                        <div class="flex" style="width: 100%">
                                            <h4 class="product__price"> $749.25 </h4>
                                            <div class="product__info">
                                                <div>(124 đã bán)</div>
                                                <div>4.3 <i class="fa-solid fa-star"></i></div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <a href="index.php?pg=viewProduct&idcatalog=1" class="btn more-btn">Xem thêm</a>
                    </div>
                </div>
            </div>
        </section>
        <!-- help banner  -->
        <div class="help__banner" style="background-image: url('./views/layout/assets/images/typing-up-close_1950x.webp') ;">
            <div class="text__center">
                <h5 class="text__lable">ĐỪNG CHẦN CHỪ</h5>
                <h2 class="text-spotlight">CHÚNG TÔI Ở ĐÂY ĐỂ GIÚP BẠN</h2>
                <div class="flex">
                    <button class="help__btn">LIÊN HỆ NGAY</button>
                    <button class="help__btn order__btn">ĐẶT CHỖ TRỢ GIÚP</button>
                </div>
            </div>
        </div>
        <!-- pre-built keyboard section -->
        <section class="section prebuilt-keyboard-section">
            <h2 class="section-title">BÀN PHÍM PRE-BUILT</h2>
            <h4 class="section-slogan">“Save time ! Let’s us build your keyboard</h4>
            <div class="section-product pre-built-product flex">
                <div class="product__banner" style="background: url('./views/layout/assets/images/odin-75-sparklight-keycaps.jpg') no-repeat center center / cover;">
                    <div class="product__overlay">
                        <a href="" class="overlay-btn btn">XEM SẢN PHẨM</a>
                    </div>
                </div>
                <div class="product__detail">
                    <h2 class="product__detail--name">ODIN 75 HOT-SWAP KEYBOARD</h2>
                    <h2 class="product__detail--price">$407.5</h2>
                    <div class="product__detail--title">THÔNG TIN:</div>
                    <ul class="product__detail--specs">
                        <li class="spec__item">Case: Top aluminum, bottom aluminum</li>
                        <li class="spec__item">Wired version PCB: Hot-swap version, Flex cut, without RGB effect, 1.2mm thickness</li>
                        <li class="spec__item">Notes: Support VIA and VIAL(It is recommended to use VIA). VIAL's firmware is not official</li>
                        <li class="spec__item">Plate: Polycarbonate and FR4</li>
                        <li class="spec__item">Structure: Leaf spring mount; 75% layout</li>
                        <li class="spec__item">Interface: USB-C</li>
                        <li class="spec__item">Translucent OLED Screen</li>
                        <li class="spec__item">Foam: Case foam and PCB foam (PORON material)</li>
                        <li class="spec__item">Weight Bar: PVD coating silver aluminum</li>
                        <li class="spec__item">Rubber feet: Round rubber feet</li>
                        <li class="spec__item">Typing angle: 7°</li>
                        <li class="spec__item">Keycaps: PBTfans Spark Light - Base kit (SKU:PT19-1)</li>
                        <li class="spec__item"><a href="" class="spec__item__link">MORE...</a></li>
                    </ul>
                    <a href="#" class="btn explore-btn">KHÁM PHÁ NGAY</a>
                </div>
            </div>
        </section>
        <!-- wait list -->
        <section class="section wait-list">
            <h2 class="section-title">THAM GIA DANH SÁCH CHỜ</h1>
            <main class="wait-list-detail flex">
                <div class="wait-list__banner" style="background-image: url('./views/layout/assets/images/odin-75-sparklight-keycaps.jpg');">
                    <a href=""></a>
                </div>
                <div class="wait-list__content">
                    <div class="content__top">
                        <h2 class="content__title">DANH SÁCH CHỜ BAUER LITE</h2>
                        <p class="content-detail">
                            Chúng tôi đã phát triển và tiết lộ đôi chút về Bauer Lite trong thời gian dài và đang trong quá trình biến nó trở thành hiện thực. Những thông tin bạn sắp điền dưới đây này là cách giúp chúng tôi biết bạn có cảm thấy hứng thú với sản phẩm này hay không để chúng tôi có được sự chuẩn bị tốt hơn co sự ra mắt của sản phẩm. Bạn cũng sẽ nhận được những cập nhật về sản phẩm như thời điểm ra mắt. Điều này hoàn toàn khác với việc đăng nhập email thông thường. Chúng tôi đang cố gắng gắng hết sức để đem đến cho bạn một sản phẩm chất lượng nhất chúng tôi từng sản xuất từ trước đến nay và chúng tôi thật sự biết ơn với những người dã ủng hộ và hỗ trợ chúng tôi.
                        </p>
                    </div>
                    <form action="" class="wait-list-form">
                        <div class="form-group">
                            <input type="text" placeholder="Họ và tên" class="form__input fullname">
                            <span class="form__message"></span>
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Email" class="form__input email">
                            <span class="form__message"></span>
                        </div>
                        <a href="" class="form-btn btn">THAM GIA NGAY</a>
                    </form>
                </div>
            </main>
        </section>
        <!-- partners -->
        <section class="section partners">
            <h2 class="section-title">NHỮNG ĐỐI TÁC CỦA CHÚNG TÔI</h2>
            <div class="partners__wrapper">
                <a href="#" class="partner">
                    <img src="./views/layout/assets/images/partner-1.webp" alt="">
                </a>
                <a href="#" class="partner">
                    <img src="./views/layout/assets/images/partner-2.webp" alt="">
                </a>
                <a href="#" class="partner">
                    <img src="./views/layout/assets/images/partner-3.webp" alt="">
                </a>
                <a href="#" class="partner">
                    <img src="./views/layout/assets/images/partner-4.webp" alt="">
                </a>
                <a href="#" class="partner">
                    <img src="./views/layout/assets/images/partner-5.png" alt="">
                </a>
            </div>
        </section>
        <!-- all products -->
        <section class="section all-products-section">
            <h2 class="section-title">TÁT CẢ SẢN PHẨM CỦA CHÚNG TÔI</h2>
            <div class="product-selection__wrapper flex">
                <?= renderCollectionItem($catalogs)?>
            </div>
        </section>
        <!-- feedbacks -->
        <section class="section customer-feedbacks">
            <h2 class="section-title">PHẢN HỒI TỪ KHÁCH HÀNG</h2>
            <div class="feedbacks-wrapper flex">
                <!-- Single comment start
                <div class="feedback__item">
                    <div class="feedback__item__avt" style="background-image: url('./views/layout/assets/images/customer1.png');"></div>
                    <div class="feedback__item__content">
                        <h4 class="content__name">Floyd Miles</h4>
                        <h5 class="content__product__name">ASA Clear Keycap Set(155-Key)</h5>
                        <p class="content__feedback__detail">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Incidunt id deleniti vero blanditiis tenetur iure, debitis hic culpa harum, rem autem sapiente, veritatis quae. Voluptatum, accusantium recusandae? Rerum, aliquid vitae!</p>
                    </div>
                </div> 
                Single comment end-->
            </div>
        </section>