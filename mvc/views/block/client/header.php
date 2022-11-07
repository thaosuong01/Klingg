<div class="search-header">
    <form action="<?php echo _WEB_ROOT . '/product' ?>" method="GET" class="search-box">
        <input type="text" class="search-box-input" placeholder="Search Our Store" name="search">
        <button type="submit" class="search-box-icon">
            <i class="fa-solid fa-magnifying-glass text-xl"></i>
        </button>
        <div class="search-box-close">
            <i class="fa-solid fa-xmark search-box-close-icon"></i>
        </div>
    </form>
</div>

<header class="header">
    <nav class="nav-header active nav-header-scroll nav-header-scroll--active">
        <div class="nav-menu">
            <div class="icon-menu">
                <span class="bar-1"></span>
                <span class="bar-2"></span>
                <span class="bar-3"></span>
            </div>

            <p class="menu">Menu</p>
        </div>

        <div class="nav-logo">
            <a href="<?php echo _WEB_ROOT ?>">
                <img src="https://cdn.shopify.com/s/files/1/0461/9036/2778/files/logo_41be5bb0-ee12-4cb7-8ae7-3267b91b49e3_300x300.png?v=1598248765" alt="logo">
            </a>
        </div>

        <div class="nav-item">
            <div class="nav-account">
                <?php
                if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
                    if (!empty($_SESSION['user']['avatar'])) {
                ?>
                        <img class="header-account-icon w-[30px] h-[30px] object-cover rounded-full" src="<?php echo _PATH_AVATAR . $_SESSION['user']['avatar'] ?>" alt="">
                    <?php
                    }
                    ?>
                <?php
                } else {
                ?>
                    <img class="header-account-icon w-[30px] h-[30px] object-cover rounded-full" src="<?php echo _PATH_AVATAR . '/avatarDefault.jpg' ?>" alt="">
                <?php
                }
                ?>
                <ul class="user-list">
                    <?php
                    if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
                    ?>
                        <?php
                        if ($_SESSION['user']['gr_id'] == 1) {
                        ?>
                            <li class="user-item user-logout"><a href="<?php echo _WEB_ROOT . '/admin' ?>">Admin</a></li>
                        <?php
                        }
                        ?>
                        <li class="user-item"><a href="<?php echo _WEB_ROOT . '/account/' . $_SESSION['user']['id'] ?>"><?php echo $_SESSION['user']['name_user'] ?></a></li>

                        <li class="user-item user-logout"><a href="<?php echo _WEB_ROOT . '/bill' ?>">My orders</a></li>
                        <li class="user-item user-logout"><a href="<?php echo _WEB_ROOT . '/user/logout' ?>">Log out</a></li>
                    <?php
                    } else {
                    ?>
                        <li class="user-item user-login"><a href="<?php echo _WEB_ROOT . '/user/login' ?>">Log in</a></li>
                        <li class="user-item user-register"><a href="<?php echo _WEB_ROOT . '/user/register' ?>">Register</a></li>
                    <?php
                    }
                    ?>
                </ul>
            </div>

            <?php
            $number = 0;
            if (!empty($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $item) {
                    $number += $item['number'];
                }
            }
            ?>
            <div class="nav-cart">
                <a href="#">
                    <i class="fa fa fa-shopping-bag header-cart-icon"></i>
                    <span class="number cart-count"><?php echo $number ?></span>
                </a>
            </div>

            <div class="nav-search">
                <i class="fa-solid fa-magnifying-glass header-search-icon"></i>
            </div>
        </div>

    </nav>
    <nav class="nav-header current nav-header-scroll nav-header-scroll--active">
        <div class="nav-menu">
            <div class="icon-menu">
                <span class="bar-1"></span>
                <span class="bar-2"></span>
                <span class="bar-3"></span>
            </div>

            <p class="menu">Menu</p>
        </div>

        <div class="nav-logo">
            <a href="<?php echo _WEB_ROOT ?>">
                <img src="https://cdn.shopify.com/s/files/1/0461/9036/2778/files/logo_41be5bb0-ee12-4cb7-8ae7-3267b91b49e3_300x300.png?v=1598248765" alt="logo">
            </a>
        </div>

        <div class="nav-item">
            <div class="nav-account">
                <?php
                if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
                    if (!empty($_SESSION['user']['avatar'])) {
                ?>
                        <img class="header-account-icon w-[30px] h-[30px] object-cover rounded-full" src="<?php echo _PATH_AVATAR . $_SESSION['user']['avatar'] ?>" alt="">
                    <?php
                    } else {
                    ?>
                        <img class="header-account-icon w-[30px] h-[30px] object-cover rounded-full" src="https://ss-images.saostar.vn/wp700/pc/1613810558698/Facebook-Avatar_3.png" alt="">
                    <?php
                    }
                } else {
                    ?>
                    <img class="header-account-icon w-[30px] h-[30px] object-cover rounded-full" src="https://ss-images.saostar.vn/wp700/pc/1613810558698/Facebook-Avatar_3.png" alt="">
                <?php
                }
                ?>
                <ul class="user-list">
                    <?php
                    if (isset($_SESSION['user']) && !empty($_SESSION['user'])) {
                    ?>
                        <?php
                        if ($_SESSION['user']['gr_id'] == 1) {
                        ?>
                            <li class="user-item user-logout"><a href="<?php echo _WEB_ROOT . '/admin' ?>">Admin</a></li>
                        <?php
                        }
                        ?>
                        <li class="user-item"><a href="<?php echo _WEB_ROOT . '/account/' . $_SESSION['user']['id'] ?>"><?php echo $_SESSION['user']['name_user'] ?></a></li>

                        <li class="user-item user-logout"><a href="<?php echo _WEB_ROOT . '/bill' ?>">My orders</a></li>
                        <li class="user-item user-logout"><a href="<?php echo _WEB_ROOT . '/user/logout' ?>">Log out</a></li>
                    <?php
                    } else {
                    ?>
                        <li class="user-item user-login"><a href="<?php echo _WEB_ROOT . '/user/login' ?>">Log in</a></li>
                        <li class="user-item user-register"><a href="<?php echo _WEB_ROOT . '/user/register' ?>">Register</a></li>
                    <?php
                    }
                    ?>
                </ul>
            </div>

            <div class="nav-cart">
                <a href="#">
                    <i class="fa fa fa-shopping-bag header-cart-icon"></i>
                    <span class="number cart-count"><?php echo $number ?></span>
                </a>
            </div>

            <div class="nav-search">
                <i class="fa-solid fa-magnifying-glass header-search-icon"></i>
            </div>
        </div>

    </nav>

    <div class="header-menu">
        <div class="nav-list">
            <ul class="menu-list">
                <li class="icon-close">
                    <i class="fa-solid fa-xmark close-menu"></i>
                </li>
                <li class="menu-item">
                    <div class="hover-menu">
                        <a href="<?php echo _WEB_ROOT ?>">Home</a>
                    </div>
                </li>
                <li class="menu-item menu-item-list">
                    <div class="hover-menu">
                        <a href="<?php echo _WEB_ROOT . '/product' ?>">Catalog
                        </a>
                        <i class="fa-solid fa-angle-right icon-right"></i>
                    </div>
                    <ul class="list">
                        <?php
                        foreach ($data['categories'] as $category) {
                        ?>
                            <li class="item">
                                <a href="<?php echo _WEB_ROOT . '/product?cate_id=' . $category['id'] ?>">
                                    <?php echo $category['name'] ?>
                                </a>
                            </li>
                        <?php
                        }
                        ?>
                    </ul>
                </li>
                <li class="menu-item menu-item-list">
                    <div class="hover-menu">
                        <a href="<?php echo _WEB_ROOT . '/about' ?>">Pages</a>
                        <i class="fa-solid fa-angle-right icon-right"></i>
                    </div>
                    <ul class="list">
                        <li class="item"><a href="<?php echo _WEB_ROOT . '/about' ?>">About</a></li>
                        <li class="item"><a href="<?php echo _WEB_ROOT . '/contact' ?>">Contact</a></li>
                        <li class="item"><a href="<?php echo _WEB_ROOT . '/blog' ?>">Blog</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</header>