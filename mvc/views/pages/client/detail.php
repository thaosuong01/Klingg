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

                <div class="flex items-center gap-3">
                    <div class="rateyo" data-rateyo-rating="<?php echo $data['avgStar'] ?>" data-rateyo-read-only="true">
                    </div>
                    <span class="mt-2 text-xl"><?php echo $data['avgStar'] ?></span>
                </div>
                <span class="write-review">Write a review</span>
            </div>
            <div class="review-container">

                <div class="review-form">
                    <h4 class="review-title">
                        Write a review
                    </h4>
                    <form class="review-form-input" action="<?php echo _WEB_ROOT . '/detail/add_comment' ?>" method="post" data-userid="<?php echo $_SESSION['user']['id'] ?>" data-proid="<?php echo $data['product']['id'] ?>">

                        <div class="flex items-center gap-3">
                            <div id="rateYo" class="my-3"></div>
                            <span class="num_start mt-2">0</span>
                        </div>
                        <div class="review-comment">
                            <textarea class="comment" name="comment" id="form-comment" rows="10" placeholder="Write your comments here (500)"></textarea>
                            <p class="error error-comment"></p>
                        </div>
                        <div class="button-submit">
                            <button type="submit" class="btn">Submit review</button>
                        </div>
                    </form>
                </div>
                <div class="list_comment">
                    <?php
                    if (!empty($data['comments'])) {
                        foreach ($data['comments'] as $item) {
                    ?>
                            <div class="review-post">
                                <div class="rateyo" data-rateyo-rating="<?php echo $item['rating'] ?>" data-rateyo-read-only="true"></div>
                                <div class="review-header">

                                    <div class="review-date">
                                        <p><b><?php echo $item['name_user'] ?></b> on <b><?php echo $item['created_at'] ?></b></p>
                                    </div>
                                </div>
                                <div class="review-content">
                                    <p><?php echo $item['comments'] ?></p>
                                </div>
                            </div>
                    <?php
                        }
                    } else {
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</main>