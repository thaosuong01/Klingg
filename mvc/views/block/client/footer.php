<div class="modal-cart">
    <div class="cart-container">
        <div class="cart-header h-1/10">
            <span class="cart-close">
                <i class="fa-solid fa-xmark cart-close--icon"></i>
            </span>
            <h3 class="cart-title">
                YOUR CART
            </h3>
        </div>

        <div class="cart-content h-2/5">

            <div class="cart-product h-full flex flex-col-reverse">
                <div class="cart-product-list h-full overflow-auto">
                    <?php
                    $empty = '';
                    $sum = 0;
                    if (!empty($_SESSION['cart'])) {
                        $empty = 'hidden';
                        foreach ($_SESSION['cart'] as $item) {
                            $sum += $item['total'];
                    ?>
                            <div class="cart-product-item mb-4" data-id="<?php echo $item['id'] ?>">
                                <div class="cart-product--img">
                                    <img src="<?php echo _PATH_IMG_PRODUCT . $item['image'] ?>" alt="">
                                    <span class="cart-product--remove" data-url="<?php echo _WEB_ROOT . '/ajax' ?>" data-id="<?php echo $item['id'] ?>">
                                        <i class="fa-solid fa-xmark"></i>
                                    </span>
                                </div>
                                <div class="cart-product--info">
                                    <a href="#">
                                        <h6 class="cart-product--title">
                                            <?php echo $item['name'] ?>
                                        </h6>
                                    </a>
                                    <div class="cart-product--desc">
                                        <div class="cart-product--price">
                                            <span class="cart-product--money">$ <?php echo $item['price'] ?></span>
                                        </div>
                                        <div class="cart-product--quantity">
                                            <button type="button" class="cart-product--sub">
                                                <span class="decrease" data-url="<?php echo _WEB_ROOT . '/ajax' ?>" data-id="<?php echo $item['id'] ?>" data-pathimg="<?php echo _PATH_IMG_PRODUCT ?>">−</span>
                                            </button>
                                            <span class="cart-quanlity--num"><?php echo $item['number'] ?></span>
                                            <button type="button" class="cart-product--sum">
                                                <span class="increase" data-url="<?php echo _WEB_ROOT . '/ajax' ?>" data-id="<?php echo $item['id'] ?>" data-pathimg="<?php echo _PATH_IMG_PRODUCT ?>">+</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        }
                    } else {
                        $empty = '';
                    }
                    ?>
                </div>
                <div class="cart-empty <?php echo $empty ?>">
                    <p> Your cart is currently empty. </p>
                    <a href="<?php echo _WEB_ROOT . '/product' ?>">Continue Shopping</a>
                </div>

            </div>
        </div>

        <?php
        $hidden = 'hidden';
        if (!empty($_SESSION['cart'])) {
            $hidden = '';
        }
        ?>
        <div class="cart-footer h-1/2 <?php echo $hidden ?>">
            <div class="sub-total">
                <p class="sub-total--title">Total</p>
                <p class="sub-total--price">$ <?php echo number_format($sum, 2) ?></p>
            </div>

            <div class="cart-bottom">
                <div class="total-text">
                    <p>Shipping, taxes, and discounts will be calculated at checkout.</p>
                </div>

                <a class="cart-checkout text-center py-4" type="submit" href="<?php echo _WEB_ROOT . '/information' ?>">
                    Proceed to Checkout
                </a>

                <a href="<?php echo _WEB_ROOT . '/cart' ?>" class="cart-view">View Cart</a>
            </div>
        </div>
    </div>
</div>

<footer>
    <div class="footer-top">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 ">
            <div class="footer-item col">
                <div class="footer-logo">
                    <a href="<?php echo _WEB_ROOT ?>">
                        <img src="https://cdn.shopify.com/s/files/1/0461/9036/2778/files/light-logo_2x_5a4ab4f7-24bb-4dbe-aa42-0a05e7b9848f_x44@2x.png?v=1612265256" alt="" class="footer-img-logo mx-auto">
                    </a>
                    <p>support@example.com</p>
                    <div class="footer-social">
                        <ul class="social-list">
                            <li class="social-item">
                                <i class="fa-brands fa-facebook-f"></i>
                            </li>
                            <li class="social-item">
                                <i class="fa-brands fa-pinterest"></i>
                            </li>
                            <li class="social-item">
                                <i class="fa-brands fa-instagram"></i>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="footer-item col">
                <div class="footer-container">
                    <h6 class="footer-title"> INFORMATION </h6>
                    <ul class="footer-menu">
                        <li class="footer-menu--item">
                            Search Terms
                        </li>
                        <li class="footer-menu--item">
                            Holidays
                        </li>
                        <li class="footer-menu--item">
                            Refund & Return
                        </li>
                        <li class="footer-menu--item">
                            Faq & Help
                        </li>
                        <li class="footer-menu--item">
                            Delivery Information
                        </li>
                    </ul>
                </div>
            </div>
            <div class="footer-item col">
                <div class="footer-container">
                    <h6 class="footer-title"> CUSTOMER SERVICE </h6>
                    <ul class="footer-menu">
                        <li class="footer-menu--item">
                            <a href="<?php echo _WEB_ROOT . '/account' ?>">My Account</a>
                        </li>
                        <li class="footer-menu--item">
                            <a href="<?php echo _WEB_ROOT . '/contact' ?>">Contact Us</a>
                        </li>
                        <li class="footer-menu--item">
                            Shipping & Returns
                        </li>
                        <li class="footer-menu--item">
                            <a href="<?php echo _WEB_ROOT . '/contact' ?>">Store Locator</a>
                        </li>
                        <li class="footer-menu--item">
                            <a href="<?php echo _WEB_ROOT . '/contact' ?>">Site Map</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="footer-item col">
                <div class="footer-container">
                    <h6 class="footer-title"> OUR HISTORY </h6>
                    <ul class="footer-menu">
                        <li class="footer-menu--item">
                            <a href="<?php echo _WEB_ROOT . '/blog' ?>">Our Story</a>
                        </li>
                        <li class="footer-menu--item">
                            <a href="<?php echo _WEB_ROOT . '/blog' ?>">Our Blog</a>
                        </li>
                        <li class="footer-menu--item">
                            Awards
                        </li>
                        <li class="footer-menu--item">
                            Ambassadors & Affiliates
                        </li>
                        <li class="footer-menu--item">
                            Clients
                        </li>
                    </ul>
                </div>
            </div>
            <div class="footer-item col ">
                <div class="footer-container">
                    <h6 class="footer-title">SIGN UP FOR NEWSLETTER</h6>
                    <div class="footer-newsletter">
                        <input type="text" class="footer-newsletter-input" placeholder="Your email address">
                        <button class="footer-newsletter-btn">
                            <i class="fa-solid fa-envelope"></i>
                        </button>
                    </div>
                    <p>Subscribe to get special offers, free giveaways, and once-in-a-lifetime deals.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="footer-contact">
            <p>© 2022 KLing Design</p>
            <a href="#">Thao Suong</a>
        </div>
    </div>

    <div class="end-of-page">
        <a href="#">
            <i class="fa-solid fa-angles-up icon-top"></i>
        </a>
    </div>
</footer>