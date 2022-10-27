<main>
    <div class="index-header">
        <div class="bg-header">
            <h1 class="heading">Products</h1>
            <div class="path">
                <a href="<?php echo _WEB_ROOT ?>" class="back-to-home">Home</a>
                <span>/</span>
                <span class="page">Products</span>
            </div>
        </div>
    </div>

    <div class="product-main">
        <div class="product-container container">
            <div class="row w-full">
                <div class="product-menu col-3 w-[300px]">
                    <div class="product-menu-col mb-3">
                        <h5 class="sidebar-title">
                            Category
                        </h5>
                        <div class="filter-panel">
                            <ul>
                                <?php
                                foreach ($data['categories'] as $category) {
                                ?>
                                    <li>
                                        <a class="category" href="#" data-id="<?php echo $category['id'] ?>" data-url="<?php echo _WEB_ROOT  . '/ajax' ?>" data-linkdetail="<?php echo _WEB_ROOT . '/detail/index/' ?>" data-user="<?php echo isset($_SESSION['user']) ? $_SESSION['user']['id'] : 'not logged in' ?>" data-pathimg="<?php echo _PATH_IMG_PRODUCT ?>">
                                            <?php echo $category['name'] ?>
                                        </a>
                                        <span>(</span>
                                        <span class="num"><?php echo $category['count_cate'] ?></span>
                                        <span>)</span>
                                    </li>
                                <?php
                                }
                                ?>

                            </ul>
                        </div>
                    </div>

                    <div class="product-menu-col">
                        <h5 class="sidebar-title">
                            Price
                        </h5>
                        <div class="filter-price">
                            <ul>
                                <li class="price-about">
                                    <a href="#">
                                        $ 50 to $ 100
                                    </a>
                                </li>
                                <li class="price-about">
                                    <a href="#">
                                        $ 100 to $ 200
                                    </a>
                                </li>
                                <li class="price-about">
                                    <a href="#">
                                        $ 200 to $ 300
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="product-col col-9 ">

                    <div class="product-list">
                        <div class="product-list-col row">

                            <?php
                            if (!empty($data['products'])) {
                                foreach ($data['products'] as $product) {
                            ?>
                                    <div class="product-item col-xs-12 col-sm-6 col-lg-4 col col-4" data-id="<?php echo $product['id'] ?>">
                                        <div class="product-info" data-aos="zoom-in" data-aos-easing="linear">
                                            <div class="product-img">
                                                <img src="<?php echo _PATH_IMG_PRODUCT . $product['image'] ?>?>" alt="" class="first-img">
                                                <img src="<?php echo _PATH_IMG_PRODUCT . $product['detail_img'] ?>" alt="" class="last-img">
                                                <div class="product-icon">
                                                    <div class="product-button row">
                                                        <div data-url="<?php echo _WEB_ROOT . '/ajax' ?>" data-pathimg="<?php echo _PATH_IMG_PRODUCT ?>" data-id="<?php echo $product['id'] ?>" data-user="<?php echo isset($_SESSION['user']) ? $_SESSION['user']['id'] : 'not logged in' ?>" class="add-to-cart product-button__icon col col-3">
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
                                                    <?php getNameCate($product['cate_id']) ?>
                                                </p>

                                                <div class="product-link__title">
                                                    <a href="<?php echo _WEB_ROOT . '/detail/index/' . $product['id'] ?>"> <?php echo $product['name'] ?>
                                                    </a>
                                                </div>

                                                <div class="product-link__price">
                                                    <span class="money">$ <?php echo $product['price'] ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                            } else {
                                ?>
                                <div class="w-full text-center bg-[#fff]">
                                    <p class="font-bold text-2xl">NOT FOUND</p>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>


                </div>
            </div>
        </div>

        <ul class="product-footer flex justify-center list-none">
            <?php
            $page = $data['pageNum'];
            $maxPage = $data['maxPage'];
            if ($page > 1) {
                $prevPage = $page - 1;
                echo '<li class="border w-[40px] h-[40px]"><a class="leading-none text-black hover:bg-[#eb6420] hover:text-[#fff] text-xl" href="' . _WEB_ROOT . '/product?page=' . $prevPage . '"><i class="fas fa-angle-double-left"></i></a></li>';
            }
            ?>

            <?php
            $begin = $page - 2;
            if ($begin < 1) {
                $begin = 1;
            }
            $end  = $page + 2;
            if ($end > $maxPage) {
                $end = $maxPage;
            }


            for ($i = $begin; $i <= $end; $i++) {
            ?>
                <li class="w-[40px] h-[40px]"><a class="w-full bg-[#fff] border pt-2 leading-none text-center text-black hover:bg-[#eb6420] hover:text-[#fff] text-xl <?php echo ($i == $page) ? 'bg-[#000] text-[#fff]' : false ?>" href="<?php echo _WEB_ROOT . '/product?page=' . $i ?>"><?php echo $i ?></a></li>
            <?php } ?>

            <?php
            if ($page < $maxPage) {
                $nextPage = $page + 1;
                echo '<li class="page-item"><a class="page-link pt-3 leading-none text-black hover:bg-[#eb6420] hover:text-[#fff] text-xl" href="' . _WEB_ROOT . '/product?page=' . $nextPage . '">Next</a></li>';
            }
            ?>
        </ul>
    </div>
</main>