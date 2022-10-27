<main>
    <div class="index-header" data-aos="fade-in" data-aos-easing="linear">
        <div class="banner-slider">
            <div class="header-slideshow">
                <div class="header-slider">
                    <img class="slide-img" src="https://cdn.shopify.com/s/files/1/0461/9036/2778/files/slide1.jpg?v=1597842864" alt="slide1">
                    <div class="slider-content">
                        <p class="slide-sub-heading">
                            Clean & Elegant!
                        </p>
                        <h1 class="slide-heading">
                            Modern Handbag
                        </h1>
                        <div class="slide-text">
                            Sale Upto 20% Off
                        </div>
                        <div class="multiple-button">
                            <a class="multiple-btn" href="<?php echo _WEB_ROOT . '/product' ?>"><span>Shop now</span></a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="header-slideshow ">
                <div class="header-slider">
                    <img class="slide-img" src="https://cdn.shopify.com/s/files/1/0461/9036/2778/files/slider2-mobile_768x940.jpg?v=1598251126" alt="slide2">
                    <div class="slider-content text-center-content">
                        <p class="slide-sub-heading">
                            Style Perfectionist!
                        </p>
                        <h1 class="slide-heading">
                            Cherishing Designs
                        </h1>
                        <div class="slide-text">
                            Sale Upto 30% Off
                        </div>
                        <div class="multiple-button">
                            <a class="multiple-btn" href="<?php echo _WEB_ROOT . '/product' ?>"><span>Shop now</span></a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="header-slideshow">
                <div class="header-slider">
                    <img class="slide-img" src="https://cdn.shopify.com/s/files/1/0461/9036/2778/files/slider3.jpg?v=1598251231" alt="slide3">
                    <div class="slider-content">
                        <p class="slide-sub-heading">
                            Be Stylish!
                        </p>
                        <h1 class="slide-heading">
                            Look Stylish
                        </h1>
                        <div class="slide-text">
                            Sale Upto 40% Off
                        </div>
                        <div class="multiple-button">
                            <a class="multiple-btn" href="<?php echo _WEB_ROOT . '/product' ?>"><span>Shop now</span></a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="header-support ">
            <div class="row">
                <div class="support-item col col-3">
                    <img src="https://cdn.shopify.com/s/files/1/0461/9036/2778/files/icon-2_200x200.png?v=1598010673" alt="" class="support-icon">
                    <div class="support-content">
                        <h4 class="support-heading">
                            World Wide
                            <br>
                            Free Shipping
                        </h4>
                    </div>
                </div>

                <div class="support-item col col-3">
                    <img src="https://cdn.shopify.com/s/files/1/0461/9036/2778/files/icon-4_200x200.png?v=1598010699" alt="" class="support-icon">
                    <div class="support-content">
                        <h4 class="support-heading">
                            Free Returns
                            <br>
                            Assured Reimbursement
                        </h4>
                    </div>
                </div>

                <div class="support-item col col-3">
                    <img src="https://cdn.shopify.com/s/files/1/0461/9036/2778/files/icon-1_200x200.png?v=1598010730" alt="" class="support-icon">
                    <div class="support-content">
                        <h4 class="support-heading">
                            24 Months Waranty
                            <br>
                            For Leather
                        </h4>
                    </div>
                </div>

                <div class="support-item col col-3">
                    <img src="https://cdn.shopify.com/s/files/1/0461/9036/2778/files/icon-3_200x200.png?v=1598010756" alt="" class="support-img">
                    <div class="support-content">
                        <h4 class="support-heading">
                            100% Safe & Secure
                            <br>
                            Checkout
                        </h4>
                    </div>
                </div>
            </div>


        </div>
    </div>

    <div class="index-container">
        <div class="product-trending container">
            <h2 class="trending-title">Trending Now</h2>
            <ul class="trending-list row">
                <?php
                foreach ($data['trendpro'] as $trendpro) {
                ?>
                    <li class="trending-item col col-4">
                        <div class="trending-info">
                            <div class="trending-img">
                                <img src="<?php echo _PATH_IMG_PRODUCT . $trendpro['image'] ?>" alt="" class="first-img">
                                <img src="<?php echo _PATH_IMG_PRODUCT . $trendpro['detail_img'] ?>" alt="" class="last-img">
                                <div class="trending-icon">
                                    <div class="trending-button row">
                                        <div data-url="<?php echo _WEB_ROOT . '/ajax' ?>" data-id="<?php echo $trendpro['id'] ?>" data-pathimg="<?php echo _PATH_IMG_PRODUCT ?>" data-user="<?php echo isset($_SESSION['user']) ? $_SESSION['user']['id'] : 'not logged in' ?>" class="add-to-cart trending-button__icon col col-3">
                                            <i class="fa fa fa-shopping-bag"></i>
                                        </div>
                                        <div class="trending-button__icon col col-3">
                                            <i class="fa-regular fa-clone"></i>
                                        </div>
                                        <div class="trending-button__icon col col-3">
                                            <i class="fa-regular fa-heart"></i>
                                        </div>
                                        <div class="trending-button__icon col col-3">
                                            <i class="fa-solid fa-magnifying-glass"></i>
                                        </div>

                                    </div>
                                </div>
                            </div>

                            <div class="trending-detail">
                                <p class="trending-vendor">
                                    <?php getNameCate($trendpro['cate_id']) ?>
                                </p>

                                <div class="trending-link__title">
                                    <a href="<?php echo _WEB_ROOT . '/detail/index/' . $trendpro['id'] ?>">
                                        <?php echo $trendpro['name'] ?>
                                    </a>
                                </div>

                                <div class="trending-link__price">
                                    <span class="money">$ <?php echo $trendpro['price'] ?></span>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>

        <div class="product-slider">
            <div class="slider-image">
                <img src="https://cdn.shopify.com/s/files/1/0461/9036/2778/files/cont-section-image1.jpg?v=1597991036" alt="" class="slide-img">
                <div class="slider-content">
                    <div class="slide1">
                        <h2 class="slide-heading">New Handbags</h2>
                        <div class="multiple-buttons">
                            <a class="slide-button"><span>Shop Men</span></a>
                            <a class="slide-button"><span>Shop Women</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="home-category">
            <div class="shop-category">
                <div class="category-heading">
                    <h2 class="category-main-heading">Shop By Category</h2>
                </div>
                <div class="category-list">
                    <div class="category-item">
                        <div class="category-content">
                            <div class="category-image">
                                <img src="https://cdn.shopify.com/s/files/1/0461/9036/2778/files/cont-section-image4_600x.jpg?v=1597996546" alt="">
                            </div>
                            <h5 class="category-heading">
                                <a href="#">Saddle Bags</a>
                            </h5>
                        </div>
                    </div>

                    <div class="category-item">
                        <div class="category-content">
                            <div class="category-image">
                                <img src="https://cdn.shopify.com/s/files/1/0461/9036/2778/files/cont-section-image5_600x.jpg?v=1597996556" alt="">
                            </div>
                            <h5 class="category-heading">
                                <a href="#">Paper Bags</a>
                            </h5>
                        </div>
                    </div>

                    <div class="category-item">
                        <div class="category-content">
                            <div class="category-image">
                                <img src="https://cdn.shopify.com/s/files/1/0461/9036/2778/files/cont-section-image6_600x.jpg?v=1597996639" alt="">
                            </div>
                            <h5 class="category-heading">
                                <a href="#">Satchel Bags</a>
                            </h5>
                        </div>
                    </div>

                    <div class="category-item">
                        <div class="category-content">
                            <div class="category-image">
                                <img src="https://cdn.shopify.com/s/files/1/0461/9036/2778/files/cont-section-image7_600x.jpg?v=1597996759" alt="">
                            </div>
                            <h5 class="category-heading">
                                <a href="#">Bowling Bags</a>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="index-ins">
            <h2 class="ins-heading">#Your instagram</h2>
            <p class="ins-desc">
                Dress with intent, live with purpose. Check out our latest collections below.
            </p>
        </div>
    </div>

</main>