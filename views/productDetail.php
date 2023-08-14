<?php 
    extract($detail);
    function galleryRender ($arr) {
        foreach ($arr as $item) {
            extract($item);
            echo '
                <div class="gallery__item">
                    <img src="./views/layout/assets/images/'.$source.'" alt="">
                </div>
            ';
        }
    }
    function renderProductSpect ($specs) {
        // echo var_dump($specs);
        if ($specs) {
            for ($i = 1; $i < count($specs[0]) - 1; $i++) {
                echo '<li class="spec__item">' . $specs[0]["spec$i"] . '</li>';
            }
        }
    }
    function renderProductOptions ($options) {
        if ($options) {
            for ($i = 1; $i < count($options[0]) - 3; $i++) {
                echo '<li class="select__option">' . $options[0]["option$i"] . '</li>';
            }
        }
    }

    $html = '';
    $soldoutLabel = '';
    if ($amount > 0) {
        $html = '
            <form action="index.php?pg=addCart" method = "post" style="width: 100%">
                <button type="submit" class="product__btn" style="width: 100%"><i class="fa-solid fa-cart-plus" style="padding-inline: 10px;"></i>THÊM VÀO GIỎ HÀNG</button>
                <input type="hidden" name="name" value="<?= $name ?>">
                <input type="hidden" name="price" value="<?= $price ?>">
                <input type="hidden" name="img" value="<?= $img ?>">
                <input type="hidden" name="qty" value="1">
            </form>
            <div class="buy-now">
                <button class="product__btn buy-now__btn">MUA NGAY</button>
                <div class="qty__label">
                    <img src="./views/layout/assets/images/qty__instock.svg" alt="">
                    <span>
                        <?= $amount ?>
                    </span>
                </div>
            </div>
        ';
    } else {
        $html = '
            <div class="buy-now">
                <button class="product__btn wishlist__btn"><i class="fal fa-heart"></i> Add to wish list</button>
            </div>
        ';
        $soldoutLabel = '<div class="soldout__label">Sold out</div>';
    }

    // product description render start
    print_r($description);
    // product description render end
?>

<!-- product detail -->
<section class="section product-detail-section" style="margin-top: 80px">
    <div class="detail__wrapper">
        <div class="detail__gallery">
            <div class="gallery__main">
                <img src="./views/layout/assets/images/<?=$img?>" alt="">
            </div>
            <div class="gallery__item__wrapper">
                <div class="gallery__item"><img src="./views/layout/assets/images/<?=$img?>"
                        alt=""></div>
                <?= galleryRender($galleryImages)?>
            </div>
        </div>
        <div class="product-detail">
            <h1 class="product__name"><?=$name?></h1>
            <h2 class="product__price">$<?= $price ?></h2>
            <ul class="product__detail--specs">
                <?=renderProductSpect($productSpect)?>
            </ul>
            <div class="product__detail__content product__qty__oneset">
                <!-- <div class="product__title">Số lượng:</div>
                <div class="product__qty__input">
                    <button class="minus__btn">-</button>
                    <input type="number" value="1" min="0" max="100" class="qty__input">
                    <button class="plus__btn">+</button>
                </div> -->
            </div>
            <div class="product__filter cate__filter">
                    <h4 style="line-height: 22px;">Choose switch</h4>
                    <div class="dropdown-select product__dropdown">
                        <div class="select__option active toggle__select toggle__kind"><span>All</span><i class="fa-solid fa-chevron-down"></i></div>
                        <ul class="select-option__list">
                            <li class="select__option selected">Choose switch</li>
                            <?= renderProductOptions($productOptions)?>
                        </ul>
                    </div>
                </div>
            <!-- amount check start -->
            <?=$html?>
            <!-- amount check end -->
        </div>
    </div>
</section>
<hr>
<!-- product description -->
<section class="section product-description-section">
    <div class="title__wrapper">
        <h1 class="section-title">THÔNG TIN MÔ TẢ</h1>
    </div>
    <div class="description__item__container">
        <div class="description__content__wrapper">
            <h2 class="description__title">Chân tiếp xúc chéo bằng hợp kim vàng</h2>
            <p class="description__content__detail">Gateron Milky Pro được thiết kế với phần chân tiếp xúc bằng hợp kim
                vàng thay vì phần tiếp xúc mạ vàng chi phí thấp hơn được sử dụng trong phiên bản cũ. Bằng cách đó, chúng
                có chất lượng chống oxy hóa tốt hơn và bảo vệ chống ăn mòn toàn diện hơn.</p>
        </div>
    </div>
</section>
<!-- product gallery -->
<section class="section product__gallery__section">
    <h2 class="section-title">PRODUCT GALLERY</h2>
    <div class="product__gallery__wrapper">
        <div class="gallery__item"><img src="./views/layout/assets/images/gateron-ks3-milky-yellow-pro-switch2-1659327257718.webp"
                alt=""></div>
        <div class="gallery__item"><img src="./views/layout/assets/images/gateron-ks3-milky-yellow-pro-switches-1659327297587.webp"
                alt=""></div>
        <div class="gallery__item"><img src="./views/layout/assets/images/gateron-ks3-milky-yellow-pro-switches-1659327297587.webp"
                alt=""></div>
        <div class="gallery__item"><img src="./views/layout/assets/images/gateron-ks3-milky-yellow-pro-switches2-1659327317219.jpg"
                alt=""></div>
    </div>
</section>
<!-- product rating -->
<section class="section customer__review__section">
    <h2 class="section-title">PHẢN HỒI TỪ KHÁCH HÀNG</h2>
    <div class="rating__box flex">
        <div class="rating__by__stars flex">
            <div class="avg__stars">
                <div class="stars">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                </div>
                <p class="avg__stars__status">Dựa trên 11 đánh giá</p>
            </div>
            <div class="total__stars">
                <div class="stars">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <span>100% (11)</span>
                </div>
                <div class="stars">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <span>0 (0)</span>
                </div>
                <div class="stars">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <span>0 (0)</span>
                </div>
                <div class="stars">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <span>0 (0)</span>
                </div>
                <div class="stars">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <i class="fa-regular fa-star"></i>
                    <span>0 (0)</span>
                </div>
            </div>
        </div>
        <div class="write__cmt__btn product__btn">Viết phản hồi</div>
    </div>
    <div class="customer__reviews">
        <div class="customer__review__item flex">
            <div class="customer__review__content">
                <div class="review__content__top flex">
                    <div class="avt"><img src="./views/layout/assets/images/customer4.png" alt=""></div>
                    <div class="customer__info">
                        <div class="stars">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <span class="date">14/5/2023</span>
                        </div>
                        <div class="customer__detail flex">
                            <h4 class="customer__name">Wade Warren</h4>
                            <span for="" class="verified__label">Verified</span>
                        </div>
                    </div>
                </div>
                <h4 class="review__content review__product__name">Milky Yellow Pro Switch Set</h4>
                <p class="customer__review__detail">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quibusdam
                    non sequi modi labore quo omnis ad temporibus? Tenetur ipsa illo libero. Id impedit sunt sint
                    numquam dolores odio fuga accusantium!</p>
            </div>
            <div class="customer__review__pictures">
                <div class="product__gallery__wrapper">
                    <div class="gallery__item"><img
                            src="./views/layout/assets/images/gateron-ks3-milky-yellow-pro-switch2-1659327257718.webp" alt="">
                    </div>
                    <div class="gallery__item"><img
                            src="./views/layout/assets/images/gateron-ks3-milky-yellow-pro-switches-1659327297587.webp" alt=""></div>
                    <div class="gallery__item"><img
                            src="/assets//images/gateron-ks3-milky-yellow-pro-switches-1659327297587.webp" alt=""></div>
                </div>
            </div>
        </div>
    </div>
</section>