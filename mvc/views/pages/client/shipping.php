<main>
    <style>
        .container-sm {
            font-family: 'Roboto', sans-serif !important;
        }
    </style>
    <div class="index-header">
    </div>
    <div class="container-sm mb-5">
        <div class="row">
            <div class="col-sm-6">
                <div class="w-full">
                    <a href="<?php echo _WEB_ROOT ?>">
                        <img src="https://cdn.shopify.com/s/files/1/0461/9036/2778/files/logo_41be5bb0-ee12-4cb7-8ae7-3267b91b49e3_300x300.png?v=1598248765" class="w-[160px]" alt="">
                    </a>
                    <div class="flex items-center gap-2 my-3"><a class="text-slate-900 no-underline text-base hover:text-[#eb6420] transition-all duration-300" href="<?php echo _WEB_ROOT . '/cart' ?>">Cart</a><span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3 leading-none">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5">
                                </path>
                            </svg></span><a href="<?php echo _WEB_ROOT . '/information' ?>" class="text-slate-900 no-underline text-base hover:text-[#eb6420] transition-all duration-300">Information</a><span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3 leading-none">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5">
                                </path>
                            </svg></span><span class="font-bold text-base">Shiping</span><span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3 leading-none">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5">
                                </path>
                            </svg></span><span class="text-base">Payment</span></div>

                    <form action="" method="post">
                        <div class="border border-2 rounded-lg p-3 mt-4 text-base">
                            <p class="flex gap-5 border-b pb-3 align-items-center"><span class="text-gray-500">Contact</span><span class="font-semibold phone"></span></p>
                            <hr>
                            <p class="flex gap-5 pt-3 align-items-center"><span class="text-gray-500">Ship
                                    to</span><span class="font-semibold p-1 address"></span></p>
                        </div>

                        <div class="method pb-4">
                            <p class="mt-5 text-xl">Shipping method</p>
                            <div class="border border-2 rounded-lg p-3 flex justify-between items-center w-full mt-3">
                                <p class="m-0 flex gap-3 items-center"><span class="p-[10px] flex justify-center items-center block w-[5px] h-[5px] max-w-[5px] max-h-[5px] bg-blue-600 rounded-full"><span class="p-[3px] block w-[3px] h-[3px] max-w-[3px] max-h-[3px] rounded-full leading-none bg-white"></span></span><span class="pt-[3px]">
                                        Standard Shipping</span></p><span class="font-semibold pt-[3px]">$2.00</span>
                            </div>
                        </div>
                                <div id="paypal-button-container"></div>
                        <div class="step-footer d-flex justify-content-sm-between mt-3 align-items-center">
                            <div class="product-wishlist-cart">
                                <a href="<?php echo _WEB_ROOT . '/information' ?>">
                                    <button class="dt-sc-btn text-slate-900 hover:text-[#eb6420] transition-all duration-300">
                                        Return to information
                                    </button>
                                </a>
                            </div>
                            <?php
                            $sum = 0;
                            if(isset($_SESSION['cart'])) {
                                foreach($_SESSION['cart'] as $item) {
                                    $sum += $item['total'];
                                }
                            }
                            ?>
                            <div class="product-wishlist-cart">
                                <a href="<?php echo _WEB_ROOT . '/payment' ?>">
                                    <button data-total="<?php echo $sum + 2 ?>" data-url="<?php echo _WEB_ROOT . '/shipping/createBill' ?>" data-redirect="<?php echo _WEB_ROOT . '/payment/detail/' ?>" data-userid="<?php echo $_SESSION['user']['id'] ?>" class="dt-sc-btn text-white bg-[#000] py-[10px] px-4 transition-all duration-300 hover:bg-[#eb6420] go-to-payment">
                                        Countinue to payment
                                    </button>
                                </a>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
            <?php
            $sum = 0;
            if (isset($_SESSION['cart'])) {
            ?>
                <div class="col-sm-6">
                    <div class="bg-gray-50 p-5 h-full">
                        <?php
                        foreach ($_SESSION['cart'] as $item) {
                            $sum += $item['total'];
                        ?>
                            <div class="listItem flex flex-col gap-3 pb-5">
                                <div class="flex items-center justify-between ">
                                    <div class="flex gap-3 items-center">
                                        <div class="image w-fit relative "><img src="<?php echo _PATH_IMG_PRODUCT . $item['image'] ?>" class="w-[80px] border rounded-2xl" alt=""><span class="absolute top-[-8px] p-2 bg-gray-500 rounded-full leading-none  text-white right-[-8px] min-w-[20px] min-h-[20px] max-w-[20px] max-h-[20px] flex justify-center items-center"><?php echo $item['number'] ?></span>
                                        </div>
                                        <p class="font-bold"><?php echo $item['name'] ?></p>
                                    </div>
                                    <p class="flex-end font-bold">$ <?php echo $item['price'] ?></p>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <hr>
                        <div class="subtotal py-3 my-2">
                            <p class="flex justify-between mb-3"><span class="text-gray-500">Subtotal</span><span class="font-bold text-2xl">$ <?php echo number_format($sum, 2) ?></span></p>
                            <p class="flex justify-between items-center"><span class="text-gray-500">Shipping</span><span class="text-gray-500">$ 2.00</span>
                            </p>
                        </div>
                        <hr>
                        <div class="total py-4">
                            <p class="flex justify-between align-items-center"><span class="text-xl font-bold">Total</span><span class="font-bold text-2xl">$ <?php echo number_format($sum + 2, 2) ?></span>
                            </p>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>

    </div>
</main>

<script>

    paypal
                .Buttons({
                    // Set up the transaction
                    createOrder: function(data, actions) {
                        console.log(data);
                        return actions.order.create({
                            purchase_units: [{
                                amount: {
                                    current_code:"CAD",
                                    value:  +JSON.parse(localStorage.getItem('infopayment')).sum + 2,
                                },
                            }, ],
                        });
                    },

                    // Finalize the transaction
                    onApprove: async function(data, actions) {
                        Swal.fire({
                            icon: "success",
                            text: "Payment success!",
                        });
                        // const order = await actions.order.capture();
                        // console.log(order);
                    
                          let info = JSON.parse(localStorage.getItem('infopayment'));

                        setTimeout(() => {
                            $.ajax({
                                type: "POST",
                                url: 'http://localhost/kling/shipping/createBill',
                                data: {  address:info.address, phone:info.phone, total:JSON.parse(localStorage.getItem('infopayment')).sum + 2, method:'Paypal' },
                                dataType: "text",

                                success: function(data) {
                                  
                                    location.href = 'http://localhost/kling/payment/detail/' + data;
                                },
                                error: function(e) {
                                    console.log(e);
                                    loading.classList.add("hidden");
                                    Swal.fire({
                                        icon: "error",
                                        text: "Please choose a payment method",
                                        footer: '<a href="">Why do I have this issue?</a>',
                                    });
                                },
                            });
                        }, 2000);
                    },
                    onError: (err) => {
                        console.log(err);
                        Swal.fire({
                            icon: "error",
                            text: "Please choose a payment method!",
                            footer: '<a href="">Why do I have this issue?</a>',
                        });
                    },
                })
                .render("#paypal-button-container");
</script>