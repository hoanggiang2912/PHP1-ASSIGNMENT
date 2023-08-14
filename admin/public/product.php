<?php 
    // load filter
    $catalog = getCatalog();
    $filterList = '';
    $i = 1;
    foreach ($catalog as $item) {
        $filterList .= '
            <a href="index.php?pg=product&sortId='.$i.'" class="type__item" style="text-decoration: none;">
                <div class="type__item__right">
                    <h5 class="type__item__name">'.$catalog[$i-1]['name'].'</h5>
                </div>
                <p class="type__item__qty">'.count(getProductByCatalogId($i)).'</p>
            </a>
        ';
        $i++;
    }

    // load products 
    $productsHtml = '';
    foreach ($productList as $item) {
        extract($item);
        $imageFile = "../".PATH_IMG_PRODUCTS.$img;
        if (file_exists($imageFile)) {
            $linkImage = $imageFile;
        } else {
            $linkImage = '';
        }
        $productsHtml .= '
            <div class="admin__product">
                <div class="flex">
                    <div class="product__banner"
                        style="background: url('.$linkImage.') no-repeat center center / cover">
                    </div>
                    <div class="product-detail__box">
                        <h2 class="product__name">'.$name.'</h2>
                        <div class="product-icon__box flex" style="gap: 60px;">
                            <div class="icon-box__item view__box">
                                <i class="fal fa-eye"></i>
                                <div class="icon-box__label">x</div>
                            </div>
                            <div class="icon-box__item view__box">
                                <i class="fal fa-message"></i>
                                <div class="icon-box__label">x</div>
                            </div>
                            <div class="icon-box__item view__box">
                                <i class="fal fa-box"></i>
                                <div class="icon-box__label">x</div>
                            </div>
                            <div class="icon-box__item view__box">
                                <a href="index.php?pg=updateProductForm&Id='.$id.'" class="edit__btn"><i class="fal fa-pen"></i></a> 
                            </div>
                            <div class="icon-box__item view__box">
                                <i class="fas fa-ellipsis"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="product-detail__box" style="text-align: center;">
                    <div class="sub__title">Update date</div>
                    <div class="sub__text">--/--/--</div>
                    <div class="sub__text">00:00:</div>
                </div>
                <div class="product-detail__box" style="align-items: end;">
                    <a href="index.php?pg=delete&delId='.$id.'" class="delete__btn">
                        <i class="fal fa-times"></i>
                    </a>
                    <p class="normal__text">Unit price: $'.$price.'</p>
                    <p class="normal__text">Updatting</p>
                </div>
            </div>
        ';
    }
?>

<div class="container admin-page">
    <?php 
        require_once 'sidebar.php';
    ?>
    <div class="admin-page__body">
        <div class="dashboard__header">
            <div class="toggle__sidebar">
                <i class="fa-solid fa-sliders"></i>
            </div>
            <form action="index.php?pg=productSearch" method="post" class="searchbar">
                <input type="text" name="query" placeholder="Search...">
                <button class="search__icon magni-icon" name="search" type="submit">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
            </form>
            <div class="admin flex">
                <div class="notification">
                    <i class="fa-solid fa-bell"></i>
                </div>
                <a href="">
                    <img src="./dist/img/TYPISTIAL-CANVA-LOGO.png" alt="Typistial customer" class="admin__avt">
                </a>
            </div>
        </div>
        <main class="admin-main__panel">
            <div class="add-product__bar">
                <h2 class="add__product__title title">Add new product</h2>
                <a href="index.php?pg=addNewProduct" class="add-product__btn">
                    <i class="fas fa-plus"></i>
                </a>
            </div>
            <div class="panel__content">
                <div class="order-content__top ua-content__top">
                    <h2 class="top__title">All products</h2>
                    <div class="billing-type__filter toggle-filter">
                        <i class="fa-solid fa-filter"></i> Filter
                        <ul class="billing-type__list">
                            <!-- filter list render start -->
                            <?=$filterList?>
                            <!-- filter list render end -->
                        </ul>
                    </div>
                </div>
                <div class="admin__product__wrapper">
                    <!-- <div class="admin__product">
                        <div class="flex">
                            <div class="product__banner"
                                style="background: url('../views/layout/assets/images/banner3.webp') no-repeat center center / cover">
                            </div>
                            <div class="product-detail__box">
                                <h2 class="product__name">PRODUCT NAME</h2>
                                <div class="product-icon__box flex" style="gap: 60px;">
                                    <div class="icon-box__item view__box">
                                        <i class="fal fa-eye"></i>
                                        <div class="icon-box__label">200</div>
                                    </div>
                                    <div class="icon-box__item view__box">
                                        <i class="fal fa-message"></i>
                                        <div class="icon-box__label">120</div>
                                    </div>
                                    <div class="icon-box__item view__box">
                                        <i class="fal fa-box"></i>
                                        <div class="icon-box__label">100</div>
                                    </div>
                                    <div class="icon-box__item view__box">
                                        <i class="fal fa-pen"></i>
                                    </div>
                                    <div class="icon-box__item view__box">
                                        <i class="fas fa-ellipsis"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-detail__box" style="text-align: center;">
                            <div class="sub__title">Update date</div>
                            <div class="sub__text">08/03/2023</div>
                            <div class="sub__text">21:19:53</div>
                        </div>
                        <div class="product-detail__box" style="align-items: end;">
                            <a href="" class="delete__btn">
                                <i class="fal fa-times"></i>
                            </a>
                            <p class="normal__text">Unit price: $45</p>
                            <p class="normal__text">55 products left</p>
                        </div>
                    </div>
                    <div class="admin__product">
                        <div class="flex">
                            <div class="product__banner"
                                style="background: url('../views/layout/assets/images/banner3.webp') no-repeat center center / cover">
                            </div>
                            <div class="product-detail__box">
                                <h2 class="product__name">PRODUCT NAME</h2>
                                <div class="product-icon__box flex" style="gap: 60px;">
                                    <div class="icon-box__item view__box">
                                        <i class="fal fa-eye"></i>
                                        <div class="icon-box__label">200</div>
                                    </div>
                                    <div class="icon-box__item view__box">
                                        <i class="fal fa-message"></i>
                                        <div class="icon-box__label">120</div>
                                    </div>
                                    <div class="icon-box__item view__box">
                                        <i class="fal fa-box"></i>
                                        <div class="icon-box__label">100</div>
                                    </div>
                                    <div class="icon-box__item view__box">
                                        <i class="fal fa-pen"></i>
                                    </div>
                                    <div class="icon-box__item view__box">
                                        <i class="fas fa-ellipsis"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-detail__box" style="text-align: center;">
                            <div class="sub__title">Update date</div>
                            <div class="sub__text">08/03/2023</div>
                            <div class="sub__text">21:19:53</div>
                        </div>
                        <div class="product-detail__box" style="align-items: end;">
                            <a href="" class="delete__btn">
                                <i class="fal fa-times"></i>
                            </a>
                            <p class="normal__text">Unit price: $45</p>
                            <p class="normal__text">55 products left</p>
                        </div>
                    </div> -->
                    <!-- admin product render start -->
                    <?=$productsHtml?>
                    <!-- admin product render end -->
                </div>
            </div>
        </main>
    </div>
</div>