window.addEventListener('load', function () {
    const productList = document.querySelector('.product-list-col');

    productList.addEventListener('click', function (e) {
        if (e.target.matches('.add-to-cart i')) {
            const number = 1;
            const id = e.target.parentElement.dataset.id;
            const url = e.target.parentElement.dataset.url;
            const path_img = e.target.parentElement.dataset.pathimg;
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


    })

    const cartCount = document.querySelectorAll('.cart-count')
    function addToCart(id, url, path_img, number) {
        $.ajax({
            type: "POST",
            url: url + "/addCart",
            data: { id, number },
            dataType: "text",
            success: function (data) {
                let response = JSON.parse(data);
                cartContent.innerHTML = "";
                // let sum = 0;
                let totalLength = 0;
                response.forEach((item) => {
                    // sum += +item.total;
                    totalLength += +item.number;
                    renderItemCart(item, path_img, url);
                });
                // sumMoney.textContent = formatter.format(sum);
                cartCount.forEach(item => {
                    item.textContent = totalLength;
                })

                Swal.fire({
                    position: "center-center",
                    icon: "success",
                    title: "More successful products",
                    showConfirmButton: false,
                    timer: 1500,
                });
            },
            error: function (e) {
                console.log(e);
            },
        });
    }

    const cartContent = document.querySelector('.cart-product-list');

    cartContent.addEventListener('click', function (e) {
        if (e.target.matches('.cart-product--remove i')) {
            const id = e.target.parentElement.dataset.id;
            const url = e.target.parentElement.dataset.url;
            removeCart(e, id, url);
        }
    })

    function removeCart(e, id, url) {
        $.ajax({
            type: "POST",
            url: url + "/removeCart",
            data: { id },
            dataType: "text",
            success: function (data) {
                let response = JSON.parse(data);
                e.target.parentElement.parentElement.parentElement.remove();
                // let sum = 0;
                let totalLength = 0;
                response.forEach((item) => {
                    // sum += +item.total;
                    totalLength += +item.number;
                });
                // sumMoney.textContent = formatter.format(sum);
                cartCount.forEach(item => {
                    item.textContent = totalLength;
                })

                Swal.fire({
                    position: "center-center",
                    icon: "success",
                    title: "Delete successful products",
                    showConfirmButton: false,
                    timer: 1500,
                });
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
                            <span>−</span>
                        </button>
                        <span class="cart-quanlity--num">${item.number}</span>
                        <button type="button" class="cart-product--sum">
                            <span>+</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>`;
        cartContent.insertAdjacentHTML("beforeend", template);
    }
})