

// searchbar
const searchBar = $$('.bar')
const searchIcon = $$('.magni-icon')
// tab
// const tabItems = $$('.tab__item')
const tabLines = $$('.tab__line')
const renderActiveTabs = $$('.tab__item.active')
// const panelItem = $$('.panel__item')
// respon nav
const responOverlay = $('.respon-overlay')
const responNav = $('.respon-nav')
const openNavBtn = $('.open-btn')
const closeNavBtn = $('.close-btn')
// slider
const prevBtn = $('.prev-btn')
const nextBtn = $('.next-btn')
const sliderItem = $$('.slider__item')
const sliderMain = $('.slider-main')
// product detail
// gallery
const galleryMain = $('.gallery__main > img')
const galleryItems = $$('.gallery__item > img')
// product options
const optionBtns = $$('.product__option__item')
const qtyOptions = $$('.product__qty__item')
// summary 
const summaryPrice = $('.summary__price')
const summaryTotal = $('.summary__total__price')


for (let i = 0; i < renderActiveTabs.length ; i++) {
    tabLines[i].style.width = `${renderActiveTabs[i].offsetWidth}px`
    tabLines[i].style.left = `${renderActiveTabs[i].offsetLeft}px`
    tabLines[i].style.top = `${renderActiveTabs[i].offsetTop + renderActiveTabs[i].offsetHeight}px`
}

const app = {
    cartProduct : JSON.parse(localStorage.getItem('cartProduct')),
    eventHandler () {
        // expand search bar
        searchIcon.forEach((icon , index) => {
            icon.addEventListener('mouseenter', () => {
                const iconParent = icon.parentElement.parentElement
                iconParent.classList.toggle('active')
                iconParent.querySelector('.magni-icon').style.color = 'black';
            })
            // icon.addEventListener('mouseleave', () => {
            //     const iconParent = icon.parentElement.parentElement
            //     iconParent.classList.toggle('active')
            //     iconParent.querySelector('.magni-icon').style.color = 'black';
            // })
        });
        // product tabs
        const tabContainers = $$('.tab-container')
        tabContainers.forEach(item => {
            item.addEventListener('mouseenter' , () => {
                item.classList.add('active')       
                const activeContainer = $('.tab-container.active')
                if (activeContainer) {
                    const activeTabItems = $$('.tab-container.active > .tabs > .tab__item')
                    const activeTabLine = activeContainer.querySelector('.tab__line')
                    const activePanels = activeContainer.querySelectorAll('.panel__item')
                    activeTabItems.forEach((tab , index) => {
                        tab.onclick = () => {
                            activeContainer.querySelector('.panel__item.active').classList.remove('active')
                            
                            tab.classList.add('active')
                            activePanels[index].classList.add('active')
                            activeTabLine.style.top = `${tab.offsetTop + tab.offsetHeight}px`
                            activeTabLine.style.left = `${tab.offsetLeft}px`
                            activeTabLine.style.width = `${tab.offsetWidth}px`
                        }
                    });
                }         
            })
            item.addEventListener('mouseleave' , () => {
                item.classList.remove('active')
            })
        });
        // handle on scroll header
        const container = $('.container') 
        const heroBanner = $('.hero-banner')
        if (heroBanner) container.classList.add('home-page')
        if (container) {
            container.onmouseenter = () => {
                container.classList.add('active')
                if (container.getAttribute('class').includes('active')) {
                    const header = $('.container.active > .header')
                    if (heroBanner) {
                        document.onscroll = () => {
                            const scrollY = document.scrollY || document.documentElement.scrollTop
                            if (scrollY != 0) {
                                header.style.transform = 'translateY(-100%)'
                            } else {
                                header.style.transform = 'translateY(0)'
                            }
                            if (scrollY >= heroBanner.offsetHeight - header.offsetHeight) {
                                header.style.transform = 'translateY(0)'
                                header.style.background = 'rgba(255, 255, 255, 0)'
                                header.style.backdropFilter = 'blur(10px)'
                                header.classList.add('scrolled')
                            } else {
                                header.style.background = 'none'
                                header.style.backdropFilter = 'none'
                                header.classList.remove('scrolled')
                            }
                        }
                    }
                }
            }
        }
        // open respon nav
        if (openNavBtn) {
            openNavBtn.onclick = () => {
                responNav.style.transform = 'translateX(0)'
                responNav.style.opacity = 1
                responOverlay.style.opacity = 1
                responOverlay.style.visibility = 'visible'
            }
        }
        if (closeNavBtn) {
            closeNavBtn.onclick = () => {
                this.closeResponThings()
            }
        }
        if (responOverlay) {
            responOverlay.onclick = () => {
                this.closeResponThings()
            }
        }
        if (responNav) {
            responNav.onclick = (e) => {
                this.closeResponThings()
            }
        } 
        // slider
        if (sliderMain) {
            let itemWidth = sliderMain.offsetWidth
            var firstItem = sliderMain.firstElementChild.cloneNode(true);
            var lastItem = sliderMain.lastElementChild.cloneNode(true);

            // Append the cloned items to the beginning and end of the carousel
            sliderMain.appendChild(firstItem);
            sliderMain.insertBefore(lastItem, sliderMain.firstElementChild);

            // Initialize the current position of the carousel
            var currentPosition = -itemWidth;
            sliderMain.style.transform = `translateX(${currentPosition}px)`;
            nextBtn.onclick = () => {
                // Move to the next item
                currentPosition -= itemWidth;
                // Restrict the position to prevent scrolling beyond the last item
                currentPosition = Math.max(currentPosition, -itemWidth * (sliderMain.children.length - 1));
                // Apply the new position to the items container
                sliderMain.style.transform = `translateX(${currentPosition}px)`;
                // Check if we've reached the cloned last item
                if (currentPosition === -(itemWidth * (sliderMain.children.length - 1))) {
                    // Move to the actual first item
                    currentPosition = -itemWidth;
                    // Apply the new position instantly without animation
                    sliderMain.style.transition = 'none';
                    sliderMain.style.transform = `translateX(${currentPosition}px)`;

                    // After a short delay, reset the transition to re-enable animation
                    setTimeout(function () {
                        sliderMain.style.transition = '';
                    }, 10);
                }
            }
            prevBtn.addEventListener('click', () => {
                // Move to the previous item
                currentPosition += itemWidth;
                // Restrict the position to prevent scrolling beyond the first item
                currentPosition = Math.min(currentPosition, 0);
                // Apply the new position to the items container
                sliderMain.style.transform = `translateX(${currentPosition}px)`;

                // Check if we've reached the cloned first item
                if (currentPosition === 0) {
                    // Move to the actual last item
                    currentPosition = -itemWidth * (sliderMain.children.length - 2);
                    // Apply the new position instantly without animation
                    sliderMain.style.transition = 'none';
                    sliderMain.style.transform = `translateX(${currentPosition}px)`;

                    // After a short delay, reset the transition to re-enable animation
                    setTimeout(function () {
                        sliderMain.style.transition = '';
                    }, 10);
                }
            });
        }
        // product gallery
        if (galleryMain) {
            galleryItems.forEach(item => {
                item.onclick = () => {
                    galleryMain.style.animation = 'galleryEffect 2s cubic-bezier(0.19, 1, 0.22, 1) 1'
                    const itemSrc = item.getAttribute('src')
                    galleryMain.src = itemSrc
                    setTimeout (() => {
                        galleryMain.style.animation = ''
                    } , 500)
                }
            });
        }
        // product options
        this.productOptions(optionBtns, 'product__option__item')
        this.productOptions(qtyOptions, 'product__qty__item')
        // render cart
        const cartProductWrapper = $('.cart__product__wrapper')
        // this.cartRender(cartProductWrapper)
        // quantity input 
        const [...qtyInput] = $$('.qty__input')
        if (qtyInput) {
            qtyInput.forEach((input , index) => {
                const minusBtn = input.parentElement.querySelector('.minus__btn')
                const plusBtn = input.parentElement.querySelector('.plus__btn')
                const subTotal = minusBtn.parentElement.parentElement.querySelector('.cart__product__subtotal')
                const [...cartProduct] = $$('.cart__product')
                minusBtn.onclick = () => {
                    input.value < 1 ? input.value = 0 : input.value--
                    subTotal.innerText = `$${input.value * Number(subTotal.parentElement.parentElement.querySelector('.cart__product__price').innerText.split('').slice(1).join(''))}`
                    this.calculatorCheck(cartProduct , input , index)
                }
                plusBtn.onclick = () => {
                    input.value++
                    subTotal.innerText = `$${input.value * Number(subTotal.parentElement.parentElement.querySelector('.cart__product__price').innerText.split('').slice(1).join(''))}`
                    this.calculatorCheck(cartProduct , input , index)
                }
                input.oninput = () => {
                    this.calculatorCheck(cartProduct , input , index)
                }
            });
        }
        // add to cart
        const addBtn = $('.add__btn')
        const addBtns = $$('.btn.label > i')
        // if(addBtn) {
        //     addBtn.onclick = () => {
        //         const productInfo = {
        //             productName: $('.product__name').innerText,
        //             productPrice: $('.product__price').innerText,
        //             productOption: $('.product__option__item.active').innerText,
        //             productSetQty: $('.product__qty__item.active').innerText,
        //             productQty: $('.qty__input').value,
        //             productImageSrc: galleryMain.src
        //         }
        //         localStorage.setItem('cartProduct' , JSON.stringify(productInfo))
        //         addBtn.innerHTML = '<i class = "fa-solid fa-check" style="padding-inline: 10px"></i>ĐÃ THÊM THÀNH CÔNG'
        //     }
        // }
        // delete cart product
        // const buyBtn = $('.buy__now__btn')
        // const summaryBuyBtn = $('.respon__summary__btn')
        // const cartProductItem = $('.cart__product')
        // const delBtns = $$('.del__btn')
        // delBtns.forEach(btn => {
        //     btn.onclick = () => {
        //         btn.parentElement.remove()
        //         localStorage.removeItem('cartProduct')
        //         this.summaryHandler(btn.parentElement)

        //         this.buyBtnHandler(cartProductItem, buyBtn, summaryBuyBtn)
        //     }
        // });
        // handle active/disable buy btn
        // this.buyBtnHandler(cartProductItem, buyBtn, summaryBuyBtn)
        // confirm overlay
        const confirmOverlay = $('.confirm__overlay')
        const buyNowBtn = $$('.buy__now__btn')
        const confirmBtn = $('.confirm__btn')
        if(this.cartProduct){
            if (confirmOverlay) {
                buyNowBtn.forEach(btn => {
                    btn.onclick = () => {
                        confirmOverlay.style.opacity = 1;
                        confirmOverlay.style.transform = "translateY(0)"
                    }
                });
                confirmBtn.onclick = () => {
                    confirmOverlay.style.opacity = 0;
                    confirmOverlay.style.transform = "translateY(-100%)"
                }
            }
        }
        // cart respon nav handler 
        const toggleDropdown = $('.toggle-dropdown')
        const dropdown = $('.payment__respon__nav')
        const cartNav = $('.payment__nav')
        if(toggleDropdown) {
            toggleDropdown.onclick = () => {
                cartNav.style.marginBottom = '8px'
                
                dropdown.classList.toggle('active')
                dropdown.style.animation = 'navActive .1s cubic-bezier(0.19, 1, 0.22, 1)'
                
                setTimeout(() => {
                    dropdown.style.animation = ''
                }, 1000);
            }
        }
        //payment method choosing handler
        const paymentMethods = $$('.payment__method')
        this.choosingOption(paymentMethods , '.payment__method')
        //shipping options choosing handler
        const shippingOptions = $$('.shipping__option')
        this.choosingOption(shippingOptions , '.shipping__option')

        // header hover effect
        const navLinks = $$('.center-nav > .flex > .nav__item > .nav__link');
        const headerLine = $('.header__line')
        const centerNav = $('.center-nav');
        navLinks.forEach(item => {
            item.onmouseenter = () => {
                const width = item.offsetWidth
                const left = item.offsetLeft
                const top = item.offsetTop

                headerLine.style.width = width + 'px'
                headerLine.style.left = left + 'px'
                headerLine.style.top = (top*2) + 'px'
            }
            centerNav.onmouseleave = () => {
                headerLine.style.width = 0
            }
        });

        // summary detail show / hide
        const toggleDetail = $('.toggle__detail')
        const summaryDetail = $('.summary__detail')
        
        if (summaryDetail) {
            summaryDetail.style.display = 'none'
            this.eventSlideHandler('click', toggleDetail, summaryDetail, 500);
        }

        // toggle billing product filter 
        const toggleFilter = $('.toggle-filter')
        const filterList = $('.billing-type__list')
        if(filterList) {
            filterList.style.display = 'none';
            this.eventSlideHandler('click', toggleFilter, filterList, 500);
        }

        // toggle product option 
        const togglesProductOption = $$('.order-more__btn')
        const productOptionLists = $$('.order-options__list')
        if (togglesProductOption) { 
            for (let i = 0; i < togglesProductOption.length; i++) {
                productOptionLists[i].style.display = 'none';
                this.eventSlideHandler('click', togglesProductOption[i], productOptionLists[i], 500);
            }
        }

        // select box handler
        const toggleSelect = $$('.toggle__select')
        const optionList = $$('.select-option__list')
        const selectOption = $$('.select__option:is(:not(.select__option.toggle__select))')
        
        // khi bấm vào toggle__select , optionList sẽ sổ xuống 
        // khi bấm vào option nào , thì option đó trở thành active , innerText của option đó chuyển lên toggleSelect
        // Khi bấm ra ngoài , optionList thu lại
        if (toggleSelect) {
            for(let i = 0 ; i < toggleSelect.length ; i++) {
                optionList[i].style.display = 'none';
                this.eventSlideHandler('click', toggleSelect[i], optionList[i], 500);
            } 
        }
        

        selectOption.forEach(item => {
            item.onclick = () => {
                // remove the option which selected before
                item.parentElement.querySelector('.select__option.selected').classList.remove('selected');
                // add the selected class to the select option
                item.classList.add('selected');
                // khi bấm vào select option , phải nhận biết được thẻ cha của option
                item.parentElement.parentElement.querySelector('.toggle__select').querySelector('span').innerText = item.innerText;
                const dropdown = item.parentElement
                this.slideToggle(dropdown , 500);
            }
        });

        // add product option - admin page 
        const addOptionBtn = $('.add-option__btn')
        const adminProductOptionList = $('.option__list')
        if (addOptionBtn) {
            addOptionBtn.addEventListener('click', e => {
                e.preventDefault();
                const length = adminProductOptionList.children.length
                const li = document.createElement('li');
                li.classList.add('list__item');
                li.innerHTML = `<input type="text" placeholder="Lựa chọn ${length + 1}">`;
                adminProductOptionList.appendChild(li);
            })
        }
    },
    formatCurrency(amount) {
        // Convert the amount to a string and remove any non-digit characters
        const numericString = amount.toString().replace(/[^\d.-]/g, '');

        // Separate the whole number and decimal parts
        const parts = numericString.split('.');
        let wholePart = parts[0];
        let decimalPart = parts[1] || '';

        // Add commas to the whole part (e.g., 10000 -> 10,000)
        wholePart = wholePart.replace(/\B(?=(\d{3})+(?!\d))/g, ',');

        // Limit the decimal part to two digits
        decimalPart = decimalPart.slice(0, 2);

        // Combine the whole and decimal parts
        const formattedAmount = wholePart + (decimalPart.length > 0 ? '.' + decimalPart : '');

        // Add the currency symbol or any other formatting you desire
        return '$' + formattedAmount;
    },
    eventSlideHandler(event , toggle , element , duration) {
        if (toggle) {
            toggle.addEventListener(event, (e) => {
                // e.preventDefault();
                this.slideToggle(element, duration)
            })
        }
    },
    slideToggle(element, duration = 500) {
        if (window.getComputedStyle(element).display === 'none') {
            element.style.removeProperty('display');
            let height = element.scrollHeight;
            element.style.overflow = 'hidden';
            element.style.height = 0;
            element.style.transitionProperty = 'height';
            element.style.transitionDuration = duration + 'ms';
            element.offsetHeight; // Trigger reflow
            element.style.height = height + 'px';

            setTimeout(function () {
                element.style.removeProperty('height');
                element.style.removeProperty('overflow');
                element.style.removeProperty('transition-duration');
                element.style.removeProperty('transition-property');
            }, duration - 100);
        } else {
            element.style.overflow = 'hidden';
            element.style.height = element.offsetHeight + 'px';
            element.style.transitionProperty = 'height';
            element.style.transitionDuration = duration + 'ms';
            element.offsetHeight; // Trigger reflow
            element.style.height = 0;

            setTimeout(function () {
                element.style.display = 'none';
                element.style.removeProperty('height');
                element.style.removeProperty('overflow');
                element.style.removeProperty('transition-duration');
                element.style.removeProperty('transition-property');
            }, duration - 200);
        }
    },
    slideUp(element, duration = 500) {
        element.style.overflow = 'hidden';
        element.style.height = element.offsetHeight + 'px';
        element.style.transitionProperty = 'height, margin, padding';
        element.style.transitionDuration = duration + 'ms';
        element.offsetHeight; // Trigger reflow
        element.style.height = 0;
        element.style.marginTop = 0;
        element.style.marginBottom = 0;
        element.style.paddingTop = 0;
        element.style.paddingBottom = 0;
        element.style.opacity = 0;

        setTimeout(function () {
            element.style.display = 'none';
        }, duration);
    },
    slideDown(element, duration = 500) {
        element.style.removeProperty('display');
        let display = window.getComputedStyle(element).display;
        if (display === 'none') display = 'block';
        element.style.display = display;

        let height = element.offsetHeight;
        element.style.overflow = 'hidden';
        element.style.height = 0;
        element.style.transitionProperty = 'height, margin, padding';
        element.style.transitionDuration = duration + 'ms';
        element.offsetHeight; // Trigger reflow
        element.style.height = height + 'px';
        element.style.marginTop = '';
        element.style.marginBottom = '';
        element.style.paddingTop = '';
        element.style.paddingBottom = '';
        element.style.opacity = 1;

        setTimeout(function () {
            element.style.removeProperty('height');
            element.style.removeProperty('overflow');
            element.style.removeProperty('transition-duration');
            element.style.removeProperty('transition-property');
        }, duration);
    },      
    choosingOption (options , optionSelector) {
        options.forEach(item => {
            item.onclick = () => {
                $(`${optionSelector}.active`).classList.remove('active')

                item.classList.toggle('active')
            }
        })
    },
    closeResponThings () {
        responNav.style.transform = 'translateX(100%)'
        this.closeOverlay()
    },
    closeOverlay () {
        responOverlay.style.opacity = 0
        responOverlay.style.visibility = 'hidden'
    },
    // product option
    productOptions (optionBtns , btnSeletor) {
        optionBtns.forEach(btn => {
            btn.onclick = () => {
                $(`.${btnSeletor}.active`).classList.remove('active')
                btn.classList.add('active')
            }
        });
    },
    // cart render
    // cartRender (cartBody) {
    //     if (cartBody) {
    //         if (this.cartProduct) {
    //             const product = `
    //                 <div class="cart__product">
    //                     <div class="flex">
    //                         <div class="flex" style="gap: 8px">
    //                             <input type="checkbox" checked="checked" name="productChoosed" id="productChoosed">
    //                             <label for="productChoosed" class="cart__product__banner"><img src="${this.cartProduct.productImageSrc}" alt=""></label>
    //                             <div class="cart__product__detail">
    //                                 <div class="cart__product__name">${this.cartProduct.productName}</div>
    //                                 <div class="cart__product__options">
    //                                     <span>${this.cartProduct.productOption}</span>
    //                                     <span>${this.cartProduct.productSetQty}</span>
    //                                 </div>
    //                             </div>
    //                         </div>
    //                         <div class="flex">
    //                             <div class="cart__product__price">${this.cartProduct.productPrice}</div>
    //                             <div class="cart__product__qty product__qty__input">
    //                                 <button class="minus__btn">-</button>
    //                                 <input type="number" value="${this.cartProduct.productQty}" min="0" max="100" class="qty__input">
    //                                 <button class="plus__btn">+</button>
    //                             </div>
    //                         </div>
    //                     </div>
    //                     <div class="del__btn"><i class="fa-solid fa-circle-xmark"></i></div>
    //                 </div>
    //             `
    //             cartBody.innerHTML = product
    //             this.summaryHandler(this.cartProduct)
    //         }
    //     }
    // },
    // summary data handler
    summaryHandler (cartProduct) {
        // summary data handler
        summaryPrice.innerText = cartProduct.productPrice || 0
        summaryTotal.innerText = cartProduct.productPrice || 0
    },
    calculatorCheck (cartProduct , input , index) {
        let totalPrice = 0
        cartProduct.forEach(product => {
            const cartProductPrice = product.querySelector('.cart__product__subtotal').innerText
            const price = Number(cartProductPrice.split('').slice(1).join(''))
            totalPrice += price
            totalPrice = this.formatCurrency(totalPrice);
            summaryTotal.innerText = `${totalPrice}`
        });
    },
    // handle active/disable buy btn
    buyBtnHandler (cartProductItem , buyBtn , summaryBuyBtn) {
        if (cartProductItem) {
            if(!buyBtn || !summaryBuyBtn) {
                return
            } else {
                buyBtn.classList.remove('disable')
                summaryBuyBtn.classList.remove('disable')
            }
        } else {
            if(!buyBtn || !summaryBuyBtn) {
                return
            } else {
                buyBtn.classList.add('disable')
                summaryBuyBtn.classList.add('disable')
            }
        }
    },
    start () {
        this.eventHandler()
    }
}
window.onload = () => {
    app.start()
}

