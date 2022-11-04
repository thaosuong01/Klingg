<main>
    <div class="index-header">
        <div class="bg-header">
            <h1 class="heading">Products</h1>
            <div class="path">
                <a href="<?php echo _WEB_ROOT ?>" class="back-to-home">Home</a>
                <span>/</span>
                <a href="<?php echo _WEB_ROOT . '/product' ?>" class="page back-to-home">Products</a>
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
                                $page = 1;
                                if (isset($_GET['page'])) {
                                    $page = $_GET['page'];
                                }
                                foreach ($data['categories'] as $category) {
                                ?>
                                    <li>
                                        <a class="category" href="<?php echo _WEB_ROOT . '/product?cate_id=' . $category['id'] . '&page=' . $page ?>" data-id="<?php echo $category['id'] ?>" data-url="<?php echo _WEB_ROOT  . '/ajax' ?>" data-linkdetail="<?php echo _WEB_ROOT . '/detail/index/' ?>" data-user="<?php echo isset($_SESSION['user']) ? $_SESSION['user']['id'] : 'not logged in' ?>" data-pathimg="<?php echo _PATH_IMG_PRODUCT ?>">
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
                        <?php
                        $cate_id = 0;
                        $page = 1;

                        if (isset($_GET['cate_id'])) {
                            $cate_id = $_GET['cate_id'];
                        }
                        if (isset($_GET['page'])) {
                            $page = $_GET['page'];
                        }
                        ?>
                        <form action="<?php echo  _WEB_ROOT . '/product?cate_id=' . $cate_id . '&page=' . $page . '' ?>" class="p-[10px]">
                            <div data-from="<?php echo $data['min'] ?>" data-to="<?php echo $data['max'] ?>" id="demo_1">
                            </div>
                            <input type="hidden" name="min" value="">
                            <input type="hidden" name="max" value="">

                            <input type="submit" value="Filter" class="text-xl mt-3 text-slate-50 cusor:pointer bg-[#000] transition-all duration-300 items-center flex justify-center w-full block pt-2 pb-1 py-2 hover:bg-[#eb6420] get_value" data-url="<?php echo _WEB_ROOT . '/product/filterPrice' ?>" />
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

    <?php

    if (!empty($data['products']) &&   $data['flag'] == 1) {
    ?>
        <ul class="product-footer flex justify-center list-none mb-5">
            <?php
            $cate_id = 0;
            if (isset($_GET['cate_id'])) {
                $cate_id = $_GET['cate_id'];
            }
            $page = $data['pageNum'];
            $maxPage = $data['maxPage'];
            $min = $data['min'];
            $max = $data['max'];

            if ($page > 1) {
                $prevPage = $page - 1;
                echo '<li class="w-[40px] h-[40px] px-1 mx-1"><a class="rounded-full w-full bg-[#fff] border pt-[5px] pb-[4px] px-[19px] leading-none text-center text-black hover:bg-[#eb6420] hover:text-[#fff] text-xl" href="' . _WEB_ROOT . '/product?page=' . $prevPage . '&cate_id=' . $cate_id . '&min=' . $min . '&max=' . $max . '"><i class="fas fa-angle-double-left"></i></a></li>';
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
                $bg = 'bg-[#fff]';
                $text = 'text-[#000]';
                if($i == $page) {
                    $bg = 'bg-[#000]';
                    $text = 'text-[#fff]';
                }
            ?>
                <li class="w-[40px] h-[40px] px-1 mx-1"><a class="rounded-full w-full <?php echo $bg ?> border pt-[10px] pb-[4px] px-[19px] leading-none text-center <?php echo $text ?> hover:bg-[#eb6420] hover:text-[#fff] text-xl " href="<?php echo _WEB_ROOT . '/product?page=' . $i . '&cate_id=' . $cate_id . '&min=' . $min . '&max=' . $max ?>"><?php echo $i ?></a></li>
            <?php } ?>

            <?php
            if ($page < $maxPage) {
                $nextPage = $page + 1;
                echo '<li class="w-[40px] h-[40px] px-1 mx-1"><a class="rounded-full w-full bg-[#fff] border pt-[5px] pb-[4px] px-[19px] leading-none text-center text-black hover:bg-[#eb6420] hover:text-[#fff] text-xl" href="' . _WEB_ROOT . '/product?page=' . $nextPage . '&cate_id=' . $cate_id . '&min=' . $min . '&max=' . $max . '"><i class="fas fa-angle-double-right"></i></a></li>';
            }
            ?>
        </ul>
    <?php
    }
    ?>
    </div>
</main>