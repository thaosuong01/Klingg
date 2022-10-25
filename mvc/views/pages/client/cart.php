<main>
    <div class="index-header">
        <div class="bg-header">
            <h1 class="heading">Your shopping cart</h1>
            <div class="path">
                <a href="<?php echo _WEB_ROOT ?>" class="back-to-home">Home</a>
                <span>/</span>
                <span class="page">Your shopping cart</span>
            </div>
        </div>
    </div>
    <div class="container-sm">
            <?php 
             if (isset($_SESSION['cart']) && empty($_SESSION['cart'])) {?>
                <div class="cart-empty-msg">
                    <img src="https://cdn.shopify.com/s/files/1/0461/9036/2778/t/4/assets/empty-cart.png?v=124674504766911058681630046659" alt="">
                    <h4>NO ITEMS IN CART</h4>
                    <p>Add items you want to shop</p>
                    <p><a href="#">Start Shopping</a></p>
                </div>
            <?php

             }

            ?>
            <?php
            
            if(!empty($_SESSION['cart'])){


?>

                <div class="row">
                    <div class="col col-sm-8">
                        <div class="cart-list">
                            <h4>PRODUCTS</h4>
                            <?php
                            $sum = 0;
                            if (isset($_SESSION['cart'])) {
                                foreach ($_SESSION['cart'] as $item) {
                                    $sum += $item['total'];
                            ?>
                                    <div class="cart-item row" data-id="<?php echo $item['id'] ?>">
                                        <div class="product-img col col-4">
                                            <img src="<?php echo  _PATH_IMG_PRODUCT . $item['image'] ?>" alt="">
                                            <i data-url="<?php echo _WEB_ROOT . '/ajax' ?>" data-id="<?php echo $item['id'] ?>" class="fa-solid fa-xmark"></i>
                                        </div>
                                        <div class="info-product col col-8">
                                            <div class="name"><a href="<?php echo _WEB_ROOT . '/detail/index/' . $item['id'] ?>"><?php echo $item['name'] ?></a></div>
                                            <div class="price">$ <?php echo $item['price'] ?> </div>
                                            <div class="qlty">
                                                <button type="button" class="cart-product--de" data-url="<?php echo _WEB_ROOT . '/ajax' ?>" data-id="<?php echo $item['id'] ?>" data-pathimg="<?php echo _PATH_IMG_PRODUCT ?>">
                                                    <span>−</span>
                                                </button>
                                                <span class="cart-quanlity--num"><?php echo $item['number'] ?></span>
                                                <button type="button" class="cart-product--in" data-url="<?php echo _WEB_ROOT . '/ajax' ?>" data-id="<?php echo $item['id'] ?>" data-pathimg="<?php echo _PATH_IMG_PRODUCT ?>">
                                                    <span>+</span>
                                                </button>
                                            </div>
                                            <div class="cart-total">
                                                <p class="">Total: <span class="sum">$<?php echo number_format($item['total'], 2) ?></span></p>
                                            </div>
                                        </div>
                                    </div>
                            <?php
                                }
                            }
                            ?>
        
                            <a class="btn-action" href="<?php echo _WEB_ROOT . '/product' ?>">Continue Shopping
                            </a>
                        </div>
                    </div>
                    <div class="col col-sm-4">
                        <div class="shipping">
                            <div class="order-summary">
                                <h4>ORDER SUMMARY</h4>
                                <p class="cart-total-price">
                                    <span>SubTotal: </span>
                                    <span>$ <?php echo number_format($sum,2) ?><span>
                                </p>
                                <div class="cart-note">
                                    <p>Special instructions for seller</p>
                                    <textarea name="" id="" cols="44" rows="4"></textarea>
                                </div>
                                <p class="shopping-checkout">Shipping, taxes, and discounts will be calculated at checkout.</p>
                                <a class="cart-btn" href="<?php echo _WEB_ROOT . '/information' ?>">Proceed to Checkout</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
            
            ?>
    </div>
</main>