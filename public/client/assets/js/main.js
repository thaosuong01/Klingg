window.addEventListener('load', function () {
    // header
    let headerCurrent = document.querySelector('.current');
    let headerActive = document.querySelector('.nav-header.active');
    // menu
    const menu = document.querySelectorAll('.nav-menu');
    const menuList = document.querySelector('.header-menu');
    const navList = document.querySelector('.nav-list')
    const closeMenu = document.querySelector('.close-menu');



    [...menu].forEach(item => item.addEventListener('click', function () {
        menuList.classList.add('open-menu');
        navList.style.transform = "translateX(0)";
    })
    )
    closeMenu.addEventListener('click', function () {
        menuList.classList.remove('open-menu');
        navList.style.transform = "translateX(-100%)";
    })

    menuList.addEventListener('click', function (e) {
        if (e.target.contains(navList)) {
            menuList.classList.remove('open-menu');
            navList.style.transform = "translateX(-100%)";
        }
        e.stopPropagation();
    })
    // cart
    const cart = document.querySelectorAll('.nav-cart');
    const closeCart = document.querySelector('.cart-close');

    const modalCart = document.querySelector('.modal-cart');
    const cartContent = document.querySelector('.cart-container');


    [...cart].forEach(item => item.addEventListener('click', function (e) {
        e.preventDefault()
        modalCart.classList.add('open-cart');
        cartContent.style.transform = "translateX(0)";
    }))

    closeCart.addEventListener('click', function () {
        modalCart.classList.remove('open-cart');
        cartContent.style.transform = "translateX(100%)";
    })

    modalCart.addEventListener('click', function (e) {
        if (e.target.contains(cartContent)) {
            modalCart.classList.remove('open-cart');
            cartContent.style.transform = "translateX(100%)";
        }
        e.stopPropagation();
    });

    // search 
    const searchBox = document.querySelector('.search-header');
    const search = document.querySelectorAll('.nav-search');
    const searchClose = document.querySelector('.search-box-close-icon');
    const searchHeight = searchBox.offsetHeight;
    const header = document.querySelector('.header');
    [...search].forEach(item => item.addEventListener('click', function (e) {
        e.stopImmediatePropagation();
        let positionSeachBox = searchBox.getBoundingClientRect();
        if(positionSeachBox.top < 0){
            headerCurrent.style.top = `${-1 * positionSeachBox.top}px`;
            searchBox.classList.add('open-search');
            searchBox.style.transform = "translateY(0)";
            header.style.paddingTop = `${searchHeight}px`;
        }
    }))

    searchClose.addEventListener('click', function () {
        searchBox.classList.remove('open-search');
        searchBox.style.transform = "translateY(-100%)";
        header.style.paddingTop = `${0}px`;
        headerCurrent.style.top = `${0}px`;

    });

    // const searchBox = document.querySelector('.search-header');
    // const search = document.querySelectorAll('.nav-search');
    // const searchClose = document.querySelector('.search-box-close-icon');
    // const searchHeight = searchBox.offsetHeight;
    // const header = document.querySelector('.header');
    // const padding = document.querySelector('.index-header');
    // [...search].forEach(item => item.addEventListener('click', function (e) {
    //     e.stopImmediatePropagation();
    //     let positionSeachBox = searchBox.getBoundingClientRect();
    //     headerCurrent.style.top = `${-1 * positionSeachBox.top}px`;
    //     searchBox.classList.add('open-search');
    //     searchBox.style.transform = "translateY(0)";
    //     header.style.paddingTop = `${searchHeight}px`;
    //     padding.style.paddingTop = '46px';
    //     let elem = document.querySelector(".open-search");
    //     let hasClass = elem.classList.contains('open-search');
    //     if(hasClass) {
    //         console.log("duoc roi");
    //         header.style.height = 0;
    //         padding.style.paddingTop = 0;
    //     }else {
    //         console.log("khong duoc roi");
    //     }
    // }));

    // searchClose.addEventListener('click', function () {
    //     searchBox.classList.remove('open-search');
    //     searchBox.style.transform = "translateY(-100%)";
    //     header.style.paddingTop = `${0}px`;
    //     headerCurrent.style.top = `${0}px`;
    // });


    //fixed
    window.addEventListener('scroll', function (e) {
        e.stopImmediatePropagation();
        let srcollWindow = window.pageYOffset;
        if (srcollWindow >= 10) {
            headerActive.style.visibility = "visible";
            headerActive.style.position = "fixed";

            headerActive.style.transform = 'translateY(0)';
            headerActive.style.opacity = '1';


            headerCurrent.style.transform = 'translateY(-150%)';

            headerCurrent.style.position = "static";



        } else {
            headerActive.style.opacity = '0';
            headerActive.style.visibility = "hidden";
            headerActive.style.position = "static";
            this.document.querySelector('.index-header').style.paddingTop = "unset";
            headerActive.style.transform = 'translateY(-40px)';

            headerCurrent.style.position = "fixed";

            headerCurrent.style.transform = 'translateY(0px)';


        }

        // icon Top
        // const  productTrending =document.querySelector('.product-trending');
        // let positionCurrent = productTrending.getBoundingClientRect();
        const iconTop = document.querySelector('.icon-top');
        if (srcollWindow >= 400) {
            iconTop.classList.add('show-icon-top');
        }
        else {
            iconTop.classList.remove('show-icon-top');
        }
    })


    // menu list

    const showList = document.querySelectorAll('.menu-item-list');

    [...showList].forEach(item => item.addEventListener('click', function (e) {
        if (this.contains(e.target)) {
            let menuList = this.querySelector('.list');

            menuList.classList.toggle('openList');
            let name = menuList.className;
            let hoverMenu = this.querySelector('.hover-menu');
            let icon = this.querySelector('.icon-right')
            if (name.includes('openList')) {
                hoverMenu.classList.add('bg');
                icon.style.transform = 'rotate(90deg)'

            }
            else {
                hoverMenu.classList.remove('bg');
                icon.style.transform = 'rotate(0deg)'

            }

            if (menuList.classList.contains('openList')) {
                menuList.style.opacity = `1`;
                this.style.height = `${menuList.offsetHeight + this.offsetHeight}px`;


            } else {
                setTimeout(() => {
                    this.style.height = `auto`;
                    menuList.style.opacity = `0`;
                }, 200)

            }
        }

    }));


})