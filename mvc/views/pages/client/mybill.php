<main>
    <div class="index-header">
        <div class="bg-header">
            <h1 class="heading">My Orders</h1>
            <div class="path">
                <a href="<?php echo _WEB_ROOT ?>" class="back-to-home">Home</a>
                <span>/</span>
                <span class="page">My Orders</span>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-5">

        <div class="row">
            <div class="col-3 fs-4 pb-4">
                <div class="w-240px shadow-lg">
                    <h5 class="bg-[#000] text-[#fff] pt-[12px] pb-[7px] pl-[15px] w-[100%]">
                        Status
                    </h5>
                    <div class="pl-[15px]">
                        <ul>
                            <?php
                            if (isset($data['getBill'])) {
                            ?>
                                <li><a class="hover:text-[#eb6420]" href="<?php echo _WEB_ROOT . '/bill?status=0' ?>">
                                        Proccessing
                                    </a>
                                </li>
                                <li><a class="hover:text-[#eb6420]" href="<?php echo _WEB_ROOT . '/bill?status=1'?>">
                                        In transit
                                    </a>
                                </li>
                                <li><a class="hover:text-[#eb6420]" href="<?php echo _WEB_ROOT . '/bill?status=2'?>">
                                        Delivered
                                    </a>
                                </li>
                            <?php
                            }
                            ?>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-9 px-4">
                <div class="intro-heading pt-0">
                    <span class="font-weight-bold flex justify-flex-end"></span>
                </div>

                <?php
                if (isset($data['billsNew']) && !empty($data['billsNew'])) {
                    foreach ($data['billsNew'] as $bill) {
                ?>
                        <div class="bill-section mb-5 border">
                            <div class="d-flex justify-content-end border-bottom-main p-3">
                                <?php
                                $status = '';
                                if ($bill['status'] == 0) {
                                    $status = 'Proccessing';
                                } else if ($bill['status'] == 1) {
                                    $status = 'In transit';
                                } else {
                                    $status = 'Delivered';
                                }
                                ?>
                                <span class="fs-4 "><?php echo $status ?></span>
                            </div>
                            <ul class="fs-5 bill-list-pro">
                                <?php
                                foreach ($bill['detail'] as $item) {
                                ?>
                                    <li class="row mx-3 p-3 bill-item-pro">
                                        <div class="col-2">
                                            <img width="60px" class="border-main" src="<?php echo _PATH_IMG_PRODUCT . $item['image'] ?>" alt="">
                                        </div>
                                        <div class="col-8">
                                            <a href="<?= _WEB_ROOT . '/detail/index/' . $item['id_pro']  ?>" title="" class="name-product font-bold hover:text-[#eb6420]"><?php echo $item['name_pro'] ?></a>
                                            <span class="d-block">x <?= $item['number'] ?></span>
                                        </div>
                                        <div class="text-color-primary col-2 d-flex justify-content-end align-items-md-center">$ <?= number_format($item['price'], 2) ?></div>
                                        <div>
                                        </div>
                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                            <div class="d-flex justify-content-end p-3 pe-5 bill-total">
                                <div>
                                    <span>Total: </span>
                                    <span class="text-color-main fw-bold fs-4">$ <?php echo number_format($bill['total'], 2) ?></span>
                                </div>
                            </div>
                        </div>
                    <?php

                    }
                } else {
                    ?>
                    <p class="fs-2 ps-5">NO ORDERS YET</p>
                <?php
                }
                ?>
            </div>

        </div>


    </div>
</main>