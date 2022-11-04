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
                            </svg></span><span class="font-bold  text-base">Information</span><span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3 leading-none">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5">
                                </path>
                            </svg></span><span class="text-base">Shiping</span><span><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-3 h-3 leading-none">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5">
                                </path>
                            </svg></span><span class="text-base">Payment</span></div>

                    <form id="form" action="" method="post" class="form-info" data-urlreturn="<?php echo _WEB_ROOT . '/information' ?>" data-redirect="<?php echo _WEB_ROOT . '/shipping' ?>">
                        <div class="contact-info d-flex justify-content-between pb-3 mt-4">
                            <h5 class="text-xl">Contact information</h5>
                            <span class="text-slate-500 mt-1">Already have an account? <a href="<?php echo _WEB_ROOT . '/user/login' ?>" class="no-underline text-slate-900 hover:text-[#eb6420] transition-all duration-300">Log
                                    in</a></span>
                        </div>
                        <div class="mb-3">
                            <input type="email" class="form-control pt-[10px] pb-[8px] px-3 email" id="exampleFormControlInput1" placeholder="Email" name="email">
                        </div>

                        <div class="address-info pb-4">
                            <h5 class="text-xl pt-3">Shipping address</h5>
                            <div class="pb-sm-3 mt-3">
                                <select class="form-select pt-[10px] pb-[12x] px-3 region" aria-label="Default select example" name="country">
                                    <option selected>Country/Region</option>
                                    <option value="China">China</option>
                                    <option value="Tokyo">Tokyo</option>
                                    <option value="USA">USA</option>
                                    <option value="Viet Nam">Viet Nam</option>

                                </select>
                            </div>
                            <div class="name-info pb-sm-3">
                                <div class="row">
                                    <div class="col">
                                        <input type="text" class="form-control pt-[10px] pb-[8px] px-3 firstname" placeholder="First name" aria-label="First name" name="firstname">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control pt-[10px] pb-[8px] px-3 lastname" placeholder="Last name" aria-label="Last name" name="lastname">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control pt-[10px] pb-[8px] px-3 address" id="exampleFormControlInput1" placeholder="Address" name="address">
                            </div>

                            <div class="name-info pb-sm-3">
                                <div class="row">
                                    <div class="col">
                                        <input type="text" class="form-control pt-[10px] pb-[8px] px-3 city" placeholder="City" aria-label="City" name="city">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control pt-[10px] pb-[8px] px-3 phone" placeholder="Phone number" aria-label="Phone" name="phone">
                                    </div>
                                </div>
                            </div>
                            <?php
                            $sum = 0;
                            if (isset($_SESSION['cart'])) {
                                foreach ($_SESSION['cart'] as $item) {
                                    $sum += $item['total'];
                                }
                            }
                            ?>
                            <input type="hidden" name="sum" value="<?php echo $sum ?>">
                            <div class="form-check pb-sm-4">
                                <input class="form-check-input p-md-2" type="checkbox" value="" id="flexCheckDefault">
                                <label class="form-check-label mt-[2px]" for="flexCheckDefault">
                                    Save this information for next time
                                </label>
                            </div>

                            <div class="step-footer d-flex justify-content-sm-between mt-3 align-items-center">
                                <div class="product-wishlist-cart">
                                    <a href="<?php echo _WEB_ROOT . '/cart' ?>" class="dt-sc-btn text-slate-900 hover:text-[#eb6420] transition-all duration-300">
                                        Return to cart
                                    </a>
                                </div>
                                <div class="product-wishlist-cart">
                                    <a href="<?php echo _WEB_ROOT . '/shipping' ?>">
                                        <button class="dt-sc-btn text-white bg-[#000] py-[10px] px-4 transition-all duration-300 hover:bg-[#eb6420]" type="submit" name="submit">
                                            Countinue to shipping
                                        </button>
                                    </a>
                                </div>
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
                                    <p class="flex-end font-bold">$ <?php echo number_format($item['price'], 2) ?></p>
                                </div>
                            </div>
                        <?php } ?>
                        <hr>
                        <div class="subtotal py-3 my-2">
                            <p class="flex justify-between mb-3"><span class="text-gray-500">Subtotal</span><span class="font-bold text-xl">$ <?php echo number_format($sum, 2) ?></span></p>
                            <p class="flex justify-between items-center"><span class="text-gray-500">Shipping</span><span class="text-gray-500">Calculated at
                                    next step</span></p>
                        </div>
                        <hr>
                        <div class="total py-4">
                            <p class="flex justify-between align-items-center"><span class="text-xl font-bold">Total</span><span class="font-bold text-2xl">$ <?php echo number_format($sum, 2) ?></span>
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
