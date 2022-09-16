window.addEventListener('load', function () {
    const productList = document.querySelector('.product-list-col');


    const product = [
        {
            id: 1,
            vendor: 'Crossbody',
            title: 'Valentina Saddle Crossbody',
            price: '$ 99',
            firstImg: 'https://cdn.shopify.com/s/files/1/1933/0009/products/22S2279-HPMSH_valentina-small-hobo_marshmallow_A_250x250@2x.jpg?v=1650574940',
            lastImg: 'https://cdn.shopify.com/s/files/1/1933/0009/products/22S2279-HPMSH_valentina-small-hobo_marshmallow_D_1024x1024.jpg?v=1652800579',
        },
        {
            id: 2,
            vendor: 'Hobo',
            title: 'CHELSEA BUCKET',
            price: '$ 105',
            firstImg: 'https://cdn.shopify.com/s/files/1/1933/0009/products/botkier-handbags_22S2883-ALRSS_chelsea-bucket_rossa_A_1024x1024.jpg?v=1645551441',
            lastImg: 'https://cdn.shopify.com/s/files/1/1933/0009/products/botkier-handbags_22S2883-ALRSS_chelsea-bucket_rossa_C_1024x1024.jpg?v=1645551441',
        },
        {
            id: 3,
            vendor: 'Hobo',
            title: 'CROSSTOWN HOBO',
            price: '$ 283',
            firstImg: 'https://cdn.shopify.com/s/files/1/1933/0009/products/21F2852-ALMAL_crosstown-hobo_malbec_A_1024x1024.jpg?v=1628270706',
            lastImg: 'https://cdn.shopify.com/s/files/1/1933/0009/products/21F2852-ALMAL_crosstown-hobo_malbec_E_1024x1024.jpg?v=1628270711',
        },
        {
            id: 4,
            vendor: 'Satchel',
            title: 'SOHO BITE SIZE TOTE',
            price: '$ 72',
            firstImg: 'https://cdn.shopify.com/s/files/1/1933/0009/products/botkier-handbags_15F0707-PBBSS_soho-bite-size-tote_black_b_1024x1024.jpg?v=1621275632',
            lastImg: 'https://cdn.shopify.com/s/files/1/1933/0009/products/botkier-handbags_15F0707-PBBSS_soho-bite-size-tote_black_e.jpg?v=1621275632',
        },
        {
            id: 5,
            vendor: 'Crossbody',
            title: 'CHELSEA TRAVEL CROSSBODY',
            price: '$ 205',
            firstImg: 'https://cdn.shopify.com/s/files/1/1933/0009/products/botkier-handbags_22S2882-ALRSS_chelsea-crossbody_rossa_A_1024x1024.jpg?v=1645552693',
            lastImg: 'https://cdn.shopify.com/s/files/1/1933/0009/products/botkier-handbags_22S2882-ALRSS_chelsea-crossbody_rossa_C_1024x1024.jpg?v=1645552693',
        },
        {
            id: 6,
            vendor: 'Crossbody',
            title: 'VALENTINA MINI CAMERA CROSSBODY',
            price: '$ 172',
            firstImg: 'https://cdn.shopify.com/s/files/1/1933/0009/products/22S2277-HPAZU_valentina-mini-crossbody_azzurro_A_250x250@2x.jpg?v=1645560172',
            lastImg: 'https://cdn.shopify.com/s/files/1/1933/0009/products/22S2277-HPAZU_valentina-mini-crossbody_azzurro_D_250x250@2x.jpg?v=1645824323',
        },
        {
            id: 7,
            vendor: 'Crossbody',
            title: 'Cobble Hill Crossbody (Solid)',
            price: '$ 96',
            firstImg: 'https://cdn.shopify.com/s/files/1/1933/0009/products/21F2083-SFMAL_cobble-hill-crossbody_malbec_A_250x250@2x.jpg?v=1628270055',
            lastImg: 'https://cdn.shopify.com/s/files/1/1933/0009/products/21F2083-SFMAL_cobble-hill-crossbody_malbec_F_250x250@2x.jpg?v=1628270056',
        },
        {
            id: 8,
            vendor: 'Hobo',
            title: 'CHELSEA CONVERTIBLE HOBO',
            price: '$ 129',
            firstImg: 'https://cdn.shopify.com/s/files/1/1933/0009/products/21F2881-ALBLK_chelsea-convertible-hobo_black_A_250x250@2x.jpg?v=1628268814',
            lastImg: 'https://cdn.shopify.com/s/files/1/1933/0009/products/21F2881-ALBLK_chelsea-convertible-hobo_black_E_250x250@2x.jpg?v=1628268817',
        },
        {
            id: 9,
            vendor: 'Hobo',
            title: 'HUDSON HOBO',
            price: '$ 206',
            firstImg: 'https://cdn.shopify.com/s/files/1/1933/0009/products/22S2782-HPLEM_hudson-hobo_lemonade_A_1024x1024.jpg?v=1650401466',
            lastImg: 'https://cdn.shopify.com/s/files/1/1933/0009/products/22S2782-HPLEM_hudson-hobo_lemonade_D_1024x1024.jpg?v=1650401465',
        },
        {
            id: 10,
            vendor: 'Satchel',
            title: 'VALENTINA FLAP SATCHEL',
            price: '$ 105',
            firstImg: 'https://cdn.shopify.com/s/files/1/1933/0009/products/22S1902-HPGRE_valentina-flap-satchel_greige_A_1024x1024.jpg?v=1648157946',
            lastImg: 'https://cdn.shopify.com/s/files/1/1933/0009/products/22S1902-HPGRE_valentina-flap-satchel_greige_C_1024x1024.jpg?v=1648157946',
        },
        {
            id: 11,
            vendor: 'Crossbody',
            title: 'CROSSTOWN CROSSBODY',
            price: '$ 178',
            firstImg: 'https://cdn.shopify.com/s/files/1/1933/0009/products/21F2851-CBMAL_crosstown-crossbody_malbec-combo_A_250x250@2x.jpg?v=1628270431',
            lastImg: 'https://cdn.shopify.com/s/files/1/1933/0009/products/21F2851-CBMAL_crosstown-crossbody_malbec-combo_F_250x250@2x.jpg?v=1628270432',
        },
        {
            id: 12,
            vendor: 'Satchel',
            title: 'SOHO BITE SIZE TOTE',
            price: '$ 230',
            firstImg: 'https://cdn.shopify.com/s/files/1/1933/0009/products/22S0707-HPROS_soho-bite-size_rossa_A_250x250@2x.jpg?v=1649882747',
            lastImg: 'https://cdn.shopify.com/s/files/1/1933/0009/products/22S0707-HPROS_soho-bite-size_rossa_D_250x250@2x.jpg?v=1652117861',
        },
    ];

    function createItem(item) {
        let template =
            `
                <div class="product-item col-xs-12 col-sm-6 col-lg-4 col col-4" data-id="${item.id}">
                    <div class="product-info">
                        <div class="product-img">
                            <img src="${item.firstImg}"
                                alt="" class="first-img">
                            <img src="${item.lastImg}"
                                alt="" class="last-img">
                            <div class="product-icon">
                                <div class="product-button row">
                                    <div class="product-button__icon col col-3">
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
                                ${item.vendor}
                            </p>

                            <div class="product-link__title">
                                <a href="#">${item.title}</a>
                            </div>

                            <div class="product-link__price">
                                <span class="money">${item.price}</span>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        return template;
    }
    function loadItem(arrayItem, itemCart){
        let array=0;
       
        for( let i =0; i<arrayItem.length; i++){
            let item= arrayItem[i];
            itemCart.insertAdjacentHTML('beforeend',createItem(item));
        }
    }
    loadItem(product,productList);
})