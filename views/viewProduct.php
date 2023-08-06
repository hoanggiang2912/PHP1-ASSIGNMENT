<?php
    $pagelimit = [
        9,
        15,
        30,
        50,
        100
    ];
    $displayPageLimit = '';
    if (isset($_GET['pageLimit']) && $_GET['pageLimit'] != 0) {
        $number = $_GET['pageLimit'];
        $displayPageLimit = '<span>'.$number.'</span>';
    } else {
        $displayPageLimit = '<span>9</span>';
    }
    function filterRender ($filterOptions) {
        foreach ($filterOptions as $key => $value) {
            $link = '';
            if (isset($_GET['idcatalog']) && $_GET['idcatalog'] != 0) {
                $link = 'idcatalog='.$_GET['idcatalog'];
            }
            echo '
                <li><a  class="select__option" href="index.php?pg=viewProduct&'.$link.'&pageLimit=' . $value . '">'.$value.'</a></li>
            ';
        }
    }
    function renderSidebar ($arr) {
        foreach ($arr as $item) {
            extract($item);
            $limit = '';
            if (isset($_GET['pageLimit']) && $_GET['pageLimit'] > 0) {
                $limit = '&pageLimit=' . $_GET['pageLimit'];
            }
            $sidebarLink = 'index.php?pg=viewProduct&idcatalog='.$id.$limit;
            echo '
                <li class="sidebar-nav__item">
                    <a href="'.$sidebarLink.'" class="sidebar-nav__link">'.$name.'</a>
                    <span class="item__qty"></span>
                </li>
            ';
        }
    }
?>

<h1 class="big-text"><?=$catalogName?></h1>
<main class="section all-product">
    <div class="product__main__wrapper" style="padding: 0; padding-top: 200px">
        <div class="main__inner">
            <div class="filter__nav flex">
                <!-- product filter start -->
                <div class="product__filter cate__filter flex">
                    <span><i class="fa-solid fa-filter"></i> Filter</span>
                    <div class="dropdown-select product__dropdown">
                        <div class="select__option active toggle__select toggle__kind"><span>All</span><i
                                class="fa-solid fa-chevron-down"></i></div>
                        <ul class="select-option__list">
                            <li class="select__option selected">All</li>
                            <li class="select__option">Product name A - Z</li>
                            <li class="select__option">Product name Z - A</li>
                            <li class="select__option">Price highest - lowest</li>
                            <li class="select__option">Price lowest - highest</li>
                        </ul>
                    </div>
                </div>
                <!-- product filter end -->
                <!-- product per page select box start -->
                <div class="product__filter amount__select flex">
                    <span>Show</span>
                    <div class="dropdown-select amount__dropdown">
                        <div class="select__option active toggle__select toggle__amount">
                            <?=$displayPageLimit?>
                            <i class="fa-solid fa-chevron-down"></i>
                        </div>
                        <ul class="select-option__list">
                            <?php filterRender($pagelimit)?>
                        </ul>
                    </div>
                    <span>per page</span>
                </div>
                <!-- product per page select box end -->
            </div>
            <section class="product__section flex">
                <div class="product__sidebar">
                    <nav>
                        <h4 class="sidebar-nav__title">Category</h4>
                        <ul class="product-sidebar__nav">
                            <?= renderSidebar($catalogs)?>
                        </ul>
                    </nav>
                    <nav>
                        <h4 class="sidebar-nav__title">Price</h4>
                        <ul class="product-sidebar__nav">
                            <li class="sidebar-nav__item">
                                <a href="" class="sidebar-nav__link">$5 - $99</a>
                                <span class="item__qty">321</span>
                            </li>
                            <li class="sidebar-nav__item">
                                <a href="" class="sidebar-nav__link">$100 - $199</a>
                                <span class="item__qty">192</span>
                            </li>
                            <li class="sidebar-nav__item">
                                <a href="" class="sidebar-nav__link">$200 - $399</a>
                                <span class="item__qty">80</span>
                            </li>
                            <li class="sidebar-nav__item">
                                <a href="" class="sidebar-nav__link">$400 - $500</a>
                                <span class="item__qty">141</span>
                            </li>
                            <li class="sidebar-nav__item">
                                <a href="" class="sidebar-nav__link">Upper $500</a>
                                <span class="item__qty">57</span>
                            </li>
                        </ul>
                    </nav>
                    <div class="sidebar__banner">
                        <div class="text__center">
                            <h4 class="text__label">COMING SUMMER 2023</h4>
                            <h2 class="text-spotlight">BAUER™ LITE
                                KEYBOARD</h2>
                            <div class="banner__btn">EXPLORE NOW</div>
                        </div>
                    </div>
                </div>
                <div class="product-wrapper" style="max-width: 960px">
                    <?=renderGeneralProduct($products)?>
                </div>
            </section>
            <div class="page__nav flex">
                <a href="" class="page__nav__btn pre__btn"><i class="fa-solid fa-chevron-left"></i></a>
                <div class="page__num flex" style="gap: 16px">
                    <a href="" class="page__num__item active">1</a>
                    <a href="" class="page__num__item">2</a>
                    <a href="" class="page__num__item">3</a>
                    <a href="" class="page__num__item"><i class="fa-solid fa-ellipsis"></i></a>
                </div>
                <a href="" class="page__nav__btn next__btn"><i class="fa-solid fa-chevron-right"></i></a>
            </div>
        </div>
    </div>
</main>
<!-- see our others products -->
<section class="section all-products-section" style="padding-top: 0;">
    <h2 class="section-title">CÓ THỂ BẠN SẼ THÍCH</h2>
    <div class="product-selection__wrapper flex">
        <?=renderCollectionItem($recommendCatalog)?>
    </div>
</section>