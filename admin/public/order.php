
<div class="container admin-page admin-orders">
    <?php 
        require_once 'sidebar.php';
    ?>
    <div class="admin-page__body">
        <div class="dashboard__header">
            <div class="toggle__sidebar">
                <i class="fa-solid fa-sliders"></i>
            </div>
            <div class="searchbar">
                <i class="fa-solid fa-magnifying-glass magni-icon"></i>
                <input type="text" placeholder="Search...">
            </div>
            <div class="admin flex">
                <div class="notification">
                    <i class="fa-solid fa-bell"></i>
                </div>
                <a href="">
                    <img src="./dist/img/TYPISTIAL-CANVA-LOGO.png" alt="Typistial customer" class="admin__avt"></a>
                <div class="admin__detail">
                    <h4 class="admin__name">Hồ Duy Hoàng Giang</h4>
                    <h5 class="admin__position">Admin</h5>
                </div>
                <i class="fa-solid fa-chevron-down" style="color: white;"></i>
            </div>
        </div>
        <div class="body__content">
            <div class="order-spec__wrapper">
                <div class="box__item order-spec__item">
                    <div class="spect-item__title">
                        <span class="spect-type completed masking-text">Completed</span>
                        <i class="fa-solid fa-ellipsis"></i>
                    </div>
                    <div class="hightlight__content">
                        <h2>55</h2>
                        <p>orders</p>
                    </div>
                    <label class="box__label"><i class="fa-solid fa-arrow-trend-up label__icon"></i> 5% vs last month</label>
                </div>
                <div class="box__item order-spec__item">
                    <div class="spect-item__title">
                        <span class="spect-type completed delivering">Delivering</span>
                        <i class="fa-solid fa-ellipsis"></i>
                    </div>
                    <div class="hightlight__content">
                        <h2>128</h2>
                        <p>orders</p>
                    </div>
                    <label class="box__label"><i class="fa-solid fa-arrow-trend-up label__icon"></i> 5% vs last month</label>
                </div>
                <div class="box__item order-spec__item">
                    <div class="spect-item__title">
                        <span class="spect-type completed return">Return / Refund</span>
                        <i class="fa-solid fa-ellipsis"></i>
                    </div>
                    <div class="hightlight__content">
                        <h2>8</h2>
                        <p>orders</p>
                    </div>
                    <label class="box__label"><i class="fa-solid fa-arrow-trend-down label__icon" style="color: #E65454"></i> 5% vs last month</label>
                </div>
                <div class="box__item order-spec__item">
                    <div class="spect-item__title">
                        <span class="spect-type completed cancelled">Cancelled</span>
                        <i class="fa-solid fa-ellipsis"></i>
                    </div>
                    <div class="hightlight__content">
                        <h2>12</h2>
                        <p>orders</p>
                    </div>
                    <label class="box__label"><i class="fa-solid fa-arrow-trend-up label__icon"></i> 5% vs last month</label>
                </div>
            </div> 
            <div class="order__panel">
                <div class="order-content__top ua-content__top">
                    <h2 class="top__title">All orders</h2>
                    <div class="billing-type__filter toggle-filter">
                        <i class="fa-solid fa-filter"></i> Filter
                        <ul class="billing-type__list">
                            <li class="type__item">
                                <div class="type__item__right">
                                    <img src="../views/layout/assets/images/completed-icon.svg" alt="completed billing">
                                    <h5 class="type__item__name">Complete orders</h5>
                                    
                                </div>
                                <p class="type__item__qty">55</p>
                            </li>
                            <li class="type__item">
                                <div class="type__item__right">
                                    <img src="../views/layout/assets/images/delivering-icon.svg" alt="delivering billing">
                                    <h5 class="type__item__name">Delivering orders</h5>
                                    
                                </div>
                                <p class="type__item__qty">128</p>
                            </li>
                            <li class="type__item">
                                <div class="type__item__right">
                                    <img src="../views/layout/assets/images/return-icon.svg" alt="return billing">
                                    <h5 class="type__item__name">Return orders</h5>
                                    
                                </div>
                                <p class="type__item__qty">8</p>
                            </li>
                            <li class="type__item">
                                <div class="type__item__right">
                                    <img src="../views/layout/assets/images/cancelled-icon.svg" alt="cancelled billing">
                                    <h5 class="type__item__name">Cancelled orders</h5>
                                    
                                </div>
                                <p class="type__item__qty">12</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="order__wrapper">
                    <div class="transaction__item">
                        <div class="flex" style="gap: 12px">
                            <a href="">
                                <svg class="order-banner__type" xmlns="http://www.w3.org/2000/svg" width="30" height="31" viewBox="0 0 30 31" fill="none">
<path d="M26.25 20.3285V10.3285C26.2496 9.89008 26.1338 9.4595 25.9144 9.07994C25.695 8.70038 25.3797 8.38519 25 8.16599L16.25 3.16599C15.87 2.94657 15.4388 2.83105 15 2.83105C14.5612 2.83105 14.13 2.94657 13.75 3.16599L5 8.16599C4.62033 8.38519 4.30498 8.70038 4.08558 9.07994C3.86618 9.4595 3.75045 9.89008 3.75 10.3285V20.3285C3.75045 20.7669 3.86618 21.1975 4.08558 21.577C4.30498 21.9566 4.62033 22.2718 5 22.491L13.75 27.491C14.13 27.7104 14.5612 27.8259 15 27.8259C15.4388 27.8259 15.87 27.7104 16.25 27.491L25 22.491C25.3797 22.2718 25.695 21.9566 25.9144 21.577C26.1338 21.1975 26.2496 20.7669 26.25 20.3285Z" stroke="url(#paint0_linear_928_4880)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M4.08789 9.02856L15.0004 15.3411L25.9129 9.02856" stroke="url(#paint1_linear_928_4880)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M15 27.9286V15.3286" stroke="url(#paint2_linear_928_4880)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
<defs>
<linearGradient id="paint0_linear_928_4880" x1="3.75" y1="27.8259" x2="27.1372" y2="17.2995" gradientUnits="userSpaceOnUse">
    <stop stop-color="#0054F6"/>
    <stop offset="1" stop-color="#3FBAFF"/>
</linearGradient>
<linearGradient id="paint1_linear_928_4880" x1="4.08789" y1="15.3411" x2="10.928" y2="3.51655" gradientUnits="userSpaceOnUse">
    <stop stop-color="#0054F6"/>
    <stop offset="1" stop-color="#3FBAFF"/>
</linearGradient>
<linearGradient id="paint2_linear_928_4880" x1="15" y1="27.9286" x2="16.248" y2="27.8791" gradientUnits="userSpaceOnUse">
    <stop stop-color="#0054F6"/>
    <stop offset="1" stop-color="#3FBAFF"/>
</linearGradient>
</defs>
</svg>
                            </a>
                            <div class="item__detail">
                                <h5 class="item__name">AKKO 5075B Cyan & Black</h5>
                                <label for="" class="item__label">July 21th 2023 - 09:45</label>
                            </div>
                        </div>
                        <div class="item__detail" style="text-align: right;">
                            <h6 class="item__status masking-text">Completed</h6>
                            <div class="icon-set">
                                <a href="" class="order-del__btn">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                                <div class="order-more__btn">
                                    <i class="far fa-ellipsis-h"></i>
                                    <ul class="order-options__list">
                                        <li class="type__item">
                                            <i class="far fa-eye"></i>
                                            <a href="" class="type__item__name"> See order details</a>
                                        </li>
                                        <li class="type__item">
                                            <i class="far fa-comment-alt"></i>
                                            <a href="" class="type__item__name"> Chat with customer</a>
                                        </li>
                                        <li class="type__item">
                                            <i class="far fa-pen"></i>
                                            <a href="" class="type__item__name"> Take not about this order</a>
                                        </li>
                                        <li class="type__item">
                                            <i class="far fa-trash-alt"></i>
                                            <a href="" class="type__item__name"> Move to trash</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="transaction__item">
                        <div class="flex" style="gap: 12px">
                            <a href="">
                                <svg class="order-banner__type" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
<path d="M16 3.32861H1V16.3286H16V3.32861Z" stroke="#00C2FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M16 8.32861H20L23 11.3286V16.3286H16V8.32861Z" stroke="#00C2FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M5.5 21.3286C6.88071 21.3286 8 20.2093 8 18.8286C8 17.4479 6.88071 16.3286 5.5 16.3286C4.11929 16.3286 3 17.4479 3 18.8286C3 20.2093 4.11929 21.3286 5.5 21.3286Z" stroke="#00C2FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M18.5 21.3286C19.8807 21.3286 21 20.2093 21 18.8286C21 17.4479 19.8807 16.3286 18.5 16.3286C17.1193 16.3286 16 17.4479 16 18.8286C16 20.2093 17.1193 21.3286 18.5 21.3286Z" stroke="#00C2FF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
                            </a>
                            <div class="item__detail">
                                <h5 class="item__name">AKKO 5075B Cyan & Black</h5>
                                <label for="" class="item__label">July 21th 2023 - 09:45</label>
                            </div>
                        </div>
                        <div class="item__detail" style="text-align: right;">
                            <h6 class="item__status delivering">Delivering</h6>
                            <div class="icon-set">
                                <a href="" class="order-del__btn">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                                <div class="order-more__btn">
                                    <i class="far fa-ellipsis-h"></i>
                                    <ul class="order-options__list">
                                        <li class="type__item">
                                            <i class="far fa-eye"></i>
                                            <a href="" class="type__item__name"> See order details</a>
                                        </li>
                                        <li class="type__item">
                                            <i class="far fa-comment-alt"></i>
                                            <a href="" class="type__item__name"> Chat with customer</a>
                                        </li>
                                        <li class="type__item">
                                            <i class="far fa-pen"></i>
                                            <a href="" class="type__item__name"> Take not about this order</a>
                                        </li>
                                        <li class="type__item">
                                            <i class="far fa-trash-alt"></i>
                                            <a href="" class="type__item__name"> Move to trash</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="transaction__item">
                        <div class="flex" style="gap: 12px">
                            <a href="">
                                <svg class="order-banner__type" xmlns="http://www.w3.org/2000/svg" width="30" height="31" viewBox="0 0 30 31" fill="none">
<path d="M26.25 20.3285V10.3285C26.2496 9.89008 26.1338 9.4595 25.9144 9.07994C25.695 8.70038 25.3797 8.38519 25 8.16599L16.25 3.16599C15.87 2.94657 15.4388 2.83105 15 2.83105C14.5612 2.83105 14.13 2.94657 13.75 3.16599L5 8.16599C4.62033 8.38519 4.30498 8.70038 4.08558 9.07994C3.86618 9.4595 3.75045 9.89008 3.75 10.3285V20.3285C3.75045 20.7669 3.86618 21.1975 4.08558 21.577C4.30498 21.9566 4.62033 22.2718 5 22.491L13.75 27.491C14.13 27.7104 14.5612 27.8259 15 27.8259C15.4388 27.8259 15.87 27.7104 16.25 27.491L25 22.491C25.3797 22.2718 25.695 21.9566 25.9144 21.577C26.1338 21.1975 26.2496 20.7669 26.25 20.3285Z" stroke="#FF9900" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M4.08789 9.02856L15.0004 15.3411L25.9129 9.02856" stroke="#FF9900" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M15 27.9286V15.3286" stroke="#FF9900" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
                            </a>
                            <div class="item__detail">
                                <h5 class="item__name">AKKO 5075B Cyan & Black</h5>
                                <label for="" class="item__label">July 21th 2023 - 09:45</label>
                            </div>
                        </div>
                        <div class="item__detail" style="text-align: right;">
                            <h6 class="item__status return">Return</h6>
                            <div class="icon-set">
                                <a href="" class="order-del__btn">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                                <div class="order-more__btn">
                                    <i class="far fa-ellipsis-h"></i>
                                    <ul class="order-options__list">
                                        <li class="type__item">
                                            <i class="far fa-eye"></i>
                                            <a href="" class="type__item__name"> See order details</a>
                                        </li>
                                        <li class="type__item">
                                            <i class="far fa-comment-alt"></i>
                                            <a href="" class="type__item__name"> Chat with customer</a>
                                        </li>
                                        <li class="type__item">
                                            <i class="far fa-pen"></i>
                                            <a href="" class="type__item__name"> Take not about this order</a>
                                        </li>
                                        <li class="type__item">
                                            <i class="far fa-trash-alt"></i>
                                            <a href="" class="type__item__name"> Move to trash</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="transaction__item">
                        <div class="flex" style="gap: 12px">
                            <a href="">
                                <svg class="order-banner__type" xmlns="http://www.w3.org/2000/svg" width="30" height="31" viewBox="0 0 30 31" fill="none">
<path d="M26.25 20.3285V10.3285C26.2496 9.89008 26.1338 9.4595 25.9144 9.07994C25.695 8.70038 25.3797 8.38519 25 8.16599L16.25 3.16599C15.87 2.94657 15.4388 2.83105 15 2.83105C14.5612 2.83105 14.13 2.94657 13.75 3.16599L5 8.16599C4.62033 8.38519 4.30498 8.70038 4.08558 9.07994C3.86618 9.4595 3.75045 9.89008 3.75 10.3285V20.3285C3.75045 20.7669 3.86618 21.1975 4.08558 21.577C4.30498 21.9566 4.62033 22.2718 5 22.491L13.75 27.491C14.13 27.7104 14.5612 27.8259 15 27.8259C15.4388 27.8259 15.87 27.7104 16.25 27.491L25 22.491C25.3797 22.2718 25.695 21.9566 25.9144 21.577C26.1338 21.1975 26.2496 20.7669 26.25 20.3285Z" stroke="#E65454" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M4.08789 9.02856L15.0004 15.3411L25.9129 9.02856" stroke="#E65454" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
<path d="M15 27.9286V15.3286" stroke="#E65454" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
                            </a>
                            <div class="item__detail">
                                <h5 class="item__name">AKKO 5075B Cyan & Black</h5>
                                <label for="" class="item__label">July 21th 2023 - 09:45</label>
                            </div>
                        </div>
                        <div class="item__detail" style="text-align: right;">
                            <h6 class="item__status cancelled">Cancelled</h6>
                            <div class="icon-set">
                                <a href="" class="order-del__btn">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                                <div class="order-more__btn">
                                    <i class="far fa-ellipsis-h"></i>
                                    <ul class="order-options__list">
                                        <li class="type__item">
                                            <i class="far fa-eye"></i>
                                            <a href="" class="type__item__name"> See order details</a>
                                        </li>
                                        <li class="type__item">
                                            <i class="far fa-comment-alt"></i>
                                            <a href="" class="type__item__name"> Chat with customer</a>
                                        </li>
                                        <li class="type__item">
                                            <i class="far fa-pen"></i>
                                            <a href="" class="type__item__name"> Take not about this order</a>
                                        </li>
                                        <li class="type__item">
                                            <i class="far fa-trash-alt"></i>
                                            <a href="" class="type__item__name"> Move to trash</a>
                                        </li>
                                    </ul>
                                </d>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
