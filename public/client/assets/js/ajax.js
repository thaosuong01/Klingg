window.addEventListener('load', function () {
    const productList = document.querySelector('.product-list-col');
    const cartFooter = document.querySelector('.cart-footer');
    const cartEmpty = document.querySelector('.cart-empty');

    productList?.addEventListener('click', function (e) {
        if (e.target.matches('.add-to-cart i')) {
            const number = 1;
            const id = e.target.parentElement.dataset.id;
            const url = e.target.parentElement.dataset.url;
            const path_img = e.target.parentElement.dataset.pathimg;
            const user = e.target.parentElement.dataset.user;
            if (user == 'not logged in') {
                Swal.fire('You need to login to make a purchase')
            }
            else {
                if (id) {
                    addToCart(id, url, path_img, number);
                }
                else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href="">Why do I have this issue?</a>'
                    })
                }
            }
        }
    })

    const trendProduct = document.querySelector('.trending-list');
    trendProduct?.addEventListener('click', function (e) {
        if (e.target.matches('.add-to-cart i')) {
            const number = 1;
            const id = e.target.parentElement.dataset.id;
            const url = e.target.parentElement.dataset.url;
            const path_img = e.target.parentElement.dataset.pathimg;
            const user = e.target.parentElement.dataset.user;
            if (user == 'not logged in') {
                Swal.fire('You need to login to make a purchase')
            }
            else {
                if (id) {
                    addToCart(id, url, path_img, number);
                }
                else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href="">Why do I have this issue?</a>'
                    })
                }
            }
        }
    })

    // FORMAT PRICE
    var formatter = new Intl.NumberFormat("en-US", {
        style: "currency",
        currency: "USD",
    });

    const cartCount = document.querySelectorAll('.cart-count');
    const sumMoney = document.querySelector('.sub-total--price');
    const cartTotalPrice = document.querySelector('.cart-total-price span:last-child')
    const cartItemRow = document.querySelectorAll('.cart-item.row');
    function addToCart(id, url, path_img, number, msg = true) {
        $.ajax({
            type: "POST",
            url: url + "/addCart",
            data: { id, number },
            dataType: "text",
            success: function (data) {
                let response = JSON.parse(data);
                console.log(response)
                cartContent.innerHTML = "";
                cartFooter.classList.remove('hidden');
                cartEmpty.classList.add('hidden');
                let sum = 0;
                let totalLength = 0;
                response.forEach((item) => {
                    sum += +item.total;
                    totalLength += +item.number;
                    renderItemCart(item, path_img, url);
                    cartItemRow.forEach((item2, key) => {
                        if (+item2.dataset.id == +item.id) {
                            console.log(item2.dataset.id)
                            console.log(id)
                            console.log(item2)

                            item2.querySelector('.sum').textContent = formatter.format(+item.total);

                        }
                    })
                });

                cartCount.forEach(item => {
                    item.textContent = totalLength;

                })
                sumMoney.textContent = formatter.format(sum);

                if (cartTotalPrice) {

                    cartTotalPrice.textContent = formatter.format(sum);
                }
                if (msg) {
                    Swal.fire({
                        position: "center-center",
                        icon: "success",
                        title: "More successful products",
                        showConfirmButton: false,
                        timer: 1500,
                    });
                }
            },
            error: function (e) {
                console.log(e);
            },
        });
    }

    const cartContent = document.querySelector('.cart-product-list');

    cartContent?.addEventListener('click', function (e) {
        if (e.target.matches('.cart-product--remove i')) {
            const id = e.target.parentElement.dataset.id;
            const url = e.target.parentElement.dataset.url;
            removeCart(e, id, url);
        }

        if (e.target.matches('.increase')) {
            const quanlity = e.target.parentElement.previousElementSibling;

            const id = e.target.dataset.id;
            const number = 1;
            const url = e.target.dataset.url;
            const path_img = e.target.dataset.pathimg;


            let currentNum = +quanlity.textContent;

            currentNum++;

            quanlity.textContent = currentNum;

            if (id) {
                addToCart(id, url, path_img, number, false);
            }
            else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                    footer: '<a href="">Why do I have this issue?</a>'
                })
            }
        }

        if (e.target.matches('.decrease')) {
            const quanlity = e.target.parentElement.nextElementSibling;

            const id = e.target.dataset.id;
            const number = -1;
            const url = e.target.dataset.url;
            const path_img = e.target.dataset.pathimg;

            let currentNum = +quanlity.textContent;

            if (currentNum > 1) {
                currentNum--;

                quanlity.textContent = currentNum;

                if (id) {
                    addToCart(id, url, path_img, number, false);
                }
                else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href="">Why do I have this issue?</a>'
                    })
                }
            }
        }

    })

    const cartItems = document.querySelectorAll('.cart-product-item');
    function removeCart(e, id, url, page = "cart") {
        $.ajax({
            type: "POST",
            url: url + "/removeCart",
            data: { id },
            dataType: "text",
            success: function (data) {
                let response = JSON.parse(data);
                if (page == 'cart') {

                    e.target.parentElement.parentElement.parentElement.remove();
                } else {
                    e.target.parentElement.parentElement.remove();

                }
                if (response.length <= 0) {
                    cartFooter.classList.add('hidden');
                    cartEmpty.classList.remove('hidden');
                }
                else {
                    cartFooter.classList.remove('hidden');
                    cartEmpty.classList.add('hidden');
                }
                let sum = 0;
                let totalLength = 0;
                response.forEach((item) => {
                    sum += +item.total;
                    totalLength += +item.number;
                });
                cartItems.forEach(item => {
                    if (+item.dataset.id == id) {
                        item.remove()
                    }
                })
                sumMoney.textContent = formatter.format(sum);
                if (cartTotalPrice) {

                    cartTotalPrice.textContent = formatter.format(sum);
                }
                cartCount.forEach(item => {
                    item.textContent = totalLength;
                })
            },
            error: function (e) {
                console.log(e);
            },
        });
    }

    function renderItemCart(item, path_img, url) {
        let template = `
        <div class="cart-product-item my-4">
            <div class="cart-product--img">
                <img src="${path_img}${item.image}" alt="">
                <span class="cart-product--remove" data-url="${url}" data-id="${item.id}">
                    <i class="fa-solid fa-xmark"></i>
                </span>
            </div>
            <div class="cart-product--info">
                <a href="#">
                    <h6 class="cart-product--title">
                        ${item.name}
                    </h6>
                </a>
                <div class="cart-product--desc">
                    <div class="cart-product--price">
                        <span class="cart-product--money">$ ${item.price}</span>
                    </div>
                    <div class="cart-product--quantity">
                        <button type="button" class="cart-product--sub">
                            <span data-url="${url}" data-id="${item.id}" data-pathimg="${path_img}" class="decrease">−</span>
                        </button>
                        <span class="cart-quanlity--num">${item.number}</span>
                        <button type="button" class="cart-product--sum">
                            <span data-url="${url}" data-id="${item.id}" data-pathimg="${path_img}" class="increase">+</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>`;
        cartContent.insertAdjacentHTML("beforeend", template);
    }

    const addCartInDetail = document.querySelector('.details-container');
    const quanlity = document.querySelector('.quanlity-num');

    addCartInDetail?.addEventListener('click', function (e) {
        if (e.target.matches('.detail_add-cart')) {
            const number = +quanlity.textContent;

            const id = e.target.dataset.id;
            const url = e.target.dataset.url;
            const path_img = e.target.dataset.pathimg;
            if (id) {
                addToCart(id, url, path_img, number);
            }
            else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                    footer: '<a href="">Why do I have this issue?</a>'
                })
            }
        }

        if (e.target.matches('.increase-detail')) {
            const quanlity = e.target.parentElement.previousElementSibling;

            console.log(quanlity);
            const id = e.target.dataset.id;
            const number = 1;
            const url = e.target.dataset.url;
            const path_img = e.target.dataset.pathimg;


            let currentNum = +quanlity.textContent;

            currentNum++;

            quanlity.textContent = currentNum;
        }

        if (e.target.matches('.decrease-detail')) {
            const quanlity = e.target.parentElement.nextElementSibling;

            const id = e.target.dataset.id;
            const number = -1;
            const url = e.target.dataset.url;
            const path_img = e.target.dataset.pathimg;

            let currentNum = +quanlity.textContent;

            if (currentNum > 1) {
                currentNum--;

                quanlity.textContent = currentNum;

            }
        }
    })


    const category = document.querySelectorAll('.category');

    category?.forEach(item => {
        item.addEventListener('click', filterCate)
    })

    function filterCate(e) {
        e.preventDefault();
        const id = +e.target.dataset.id;
        const url = e.target.dataset.url;
        const user = e.target.dataset.user;
        const path_img = e.target.dataset.pathimg;
        const cateName = e.target.textContent;
        const linkdetail = e.target.dataset.linkdetail;


        $.ajax({
            type: "POST",
            url: url + "/filterCatePro",
            data: { id },
            dataType: "text",
            success: function (data) {
                productList.innerHTML = '';
                let response = JSON.parse(data);
                response.forEach(item => { renderItemPro(item, path_img, url, user, cateName, linkdetail) })
            },
            error: function (e) {
                console.log(e);
            },
        });

    }

    function renderItemPro(item, path_img, url, user, cateName, linkdetail) {
        let template = `
        <div class="product-item col-xs-12 col-sm-6 col-lg-4 col col-4" data-id="${item.id}">
            <div class="product-info">
                <div class="product-img">
                    <img src="${path_img}${item.image}" alt="" class="first-img">
                    <img src="${path_img}${item.detail_img}" alt="" class="last-img">
                    <div class="product-icon">
                        <div class="product-button row">
                            <div data-url="${url}" data-pathimg="${path_img}" data-id="${item.id}"  data-user="${user}" class="add-to-cart product-button__icon col col-3">
                                <i class="fa fa fa-shopping-bag"></i>
                            </div>
                            <div class="product-button__icon col col-3">
                                <i class="fa-regular fa-clone"></i>
                            </div>
                            <div class="product-button__icon col col-3">
                                <i class="fa-regular fa-heart"></i>
                            </div>
                            <div class="product-button__icon col col-3">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="product-detail">
                    <p class="product-vendor">
                        ${cateName}
                    </p>

                    <div class="product-link__title">
                        <a href="${linkdetail}${item.id}"> ${item.name}
                        </a>
                    </div>

                    <div class="product-link__price">
                        <span class="money">$ ${item.price}</span>
                    </div>
                </div>
            </div>
        </div>
        `;
        productList.insertAdjacentHTML("beforeend", template);
    }

    const cartList = document.querySelector('.cart-list');



    cartList?.addEventListener('click', function (e) {
        if (e.target.matches('.cart-product--in span')) {
            const quanlity = e.target.parentElement.previousElementSibling;

            const id = e.target.parentElement.dataset.id;
            const number = 1;
            const url = e.target.parentElement.dataset.url;
            const path_img = e.target.parentElement.dataset.pathimg;

            let currentNum = +quanlity.textContent;

            currentNum++;

            quanlity.textContent = currentNum;

            if (id) {
                addToCart(id, url, path_img, number, false);
            }
            else {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!',
                    footer: '<a href="">Why do I have this issue?</a>'
                })
            }
        }

        if (e.target.matches('.cart-product--de span')) {
            const quanlity = e.target.parentElement.nextElementSibling;

            const id = e.target.parentElement.dataset.id;
            const number = -1;
            const url = e.target.parentElement.dataset.url;
            const path_img = e.target.parentElement.dataset.pathimg;

            let currentNum = +quanlity.textContent;

            if (currentNum > 1) {
                currentNum--;

                quanlity.textContent = currentNum;

                if (id) {
                    addToCart(id, url, path_img, number, false);
                }
                else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!',
                        footer: '<a href="">Why do I have this issue?</a>'
                    })
                }
            }
        }

        if (e.target.matches('.product-img i')) {
            const id = e.target.dataset.id;
            const url = e.target.dataset.url;
            removeCart(e, id, url, 'pagecart');
        }
    })
})