<main>
    <div class="index-header">
        <div class="bg-header">
            <h1 class="heading">Product Details</h1>
            <div class="path">
                <a href="<?php echo _WEB_ROOT ?>" class="back-to-home">Home</a>
                <span>/</span>
                <span class="page">Product Details</span>
            </div>
        </div>
    </div>

    <div class="product-details container-sm">
        <div class="row details-container">
            <div class="product-img col col-8">

                <div class="img-center">
                    <?php
                    if (!empty($data['productImg'])) {
                        foreach ($data['productImg'] as $image) {
                    ?>
                            <div style="height: 500px;" data-dot-img="<?php echo _PATH_IMG_PRODUCT . $image['image'] ?>">
                                    <img class="img-item-center" src="<?php echo _PATH_IMG_PRODUCT . $image['image'] ?>" alt="" />
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
            <?php

            ?>
            <div class="product-info col col-4">
                <h6 class="product-title">
                    <?php echo $data['product']['name'] ?>
                </h6>

                <div class="product-desc">
                    <div class="product-price">
                        <span class="price"><b>Price:</b></span>
                        <span class="money">$ <?php echo number_format($data['product']['price'], 2) ?>
                        </span>
                    </div>

                    <div class="product-description">
                        <p> <?php echo $data['product']['description'] ?></p>
                    </div>
                    <div class="product-vendor">
                        <span class="vendor"><b>Category:</b></span>
                        <span class="name-vendor"><?php echo $data['category']['name'] ?></span>
                    </div>

                    <div class="product-quantity">
                        <button type="button" class="product-sub">
                            <span class="decrease-detail" data-url="<?php echo _WEB_ROOT . '/ajax' ?>" data-id="<?php echo $item['id'] ?>" data-pathimg="<?php echo _PATH_IMG_PRODUCT ?>">−</span>
                        </button>
                        <span class="quanlity-num">1</span>
                        <button type="button" class="product-sum">
                            <span class="increase-detail" data-url="<?php echo _WEB_ROOT . '/ajax' ?>" data-id="<?php echo $item['id'] ?>" data-pathimg="<?php echo _PATH_IMG_PRODUCT ?>">+</span>
                        </button>
                    </div>
                </div>
                <div class="product-button">
                    <button class="btn detail_add-cart" data-url="<?php echo _WEB_ROOT . '/ajax' ?>" data-pathimg="<?php echo _PATH_IMG_PRODUCT ?>" data-id="<?php echo $data['product']['id'] ?>">Add to cart</button>
                    <button class="btn">Buy it now</button>
                </div>

            </div>
        </div>

        <div class="also-product">
            <h4 class="also-product-title">YOU MAY ALSO LIKE</h4>
            <ul class="also-product-list row row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5 ">
                <?php
                if (!empty($data['productSame'])) {
                    foreach ($data['productSame'] as $productSame) {
                ?>
                        <li class="also-product-item col">
                            <div class="also-product-img">
                                <img src="<?php echo _PATH_IMG_PRODUCT . $productSame['image'] ?>" alt="">
                            </div>
                            <div class="also-product-info">
                                <p class="also-product-name lowercase">
                                    <a href="<?php echo _WEB_ROOT . '/detail/index/' . $productSame['id'] ?>">
                                        <?php echo $productSame['name'] ?>
                                    </a>
                                </p>
                                <p><?php echo $productSame['price'] ?></p>
                            </div>
                        </li>
                <?php
                    }
                }
                ?>
            </ul>
        </div>

        <div class="product-review">
            <div class="review-title">
                <h4>Customer review</h4>
            </div>
            <div class="write-to-button">
                <span class="review-star">
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-solid fa-star"></i>
                    <i class="fa-regular fa-star-half-stroke"></i>
                    <i class="fa-regular fa-star"></i>
                </span>
                <span class="write-review">Write a review</span>
            </div>
            <div class="review-container">

                <div class="review-form">
                    <h4 class="review-title">
                        Write a review
                    </h4>
                    <form class="review-form-input" action="#" method="post">
                        <div class="review-input">
                            <input type="text" id="name" class="name" placeholder="Enter your name" value>
                            <p class="error error-name"></p>
                        </div>
                        <div class="review-input">
                            <input type="text" id="email" class="email" placeholder="john.@example.com" value>
                            <p class="error error-email"></p>
                        </div>
                        <span class="rating">
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                            <i class="fa-regular fa-star"></i>
                        </span>
                        <div class="review-input">
                            <input type="text" id="title" class="title" placeholder="Give your review a title" value>
                            <p class="error error-title"></p>
                        </div>
                        <div class="review-comment">
                            <textarea name="comment" id="form-comment" rows="10" placeholder="Write your comments here (500)"></textarea>
                            <p class="error error-comment"></p>
                        </div>
                        <div class="button-submit">
                            <button type="submit" class="btn">Submit review</button>
                        </div>
                    </form>
                </div>
                <div class="review-post">
                    <span class="review-star">
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-solid fa-star"></i>
                        <i class="fa-regular fa-star-half-stroke"></i>
                        <i class="fa-regular fa-star"></i>
                    </span>
                    <div class="review-header">
                        <div class="review-name">
                            <h6> Sed elementum tempus egestas</h6>
                        </div>
                        <div class="review-date">
                            <p><b>Brinley</b> on <b>Mar 27, 2022</b></p>
                        </div>
                    </div>
                    <div class="review-content">
                        <p>Ultricies lacus sed turpis tincidunt id aliquet risus. Felis donec et odio
                            pellentesque
                            diam.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
