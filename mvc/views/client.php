<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,500;0,700;1,300&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://monorail-edge.shopifysvc.com">
    <link rel="canonical" href="https://kling-theme.myshopify.com/">
    <link rel="shortcut icon" href="//cdn.shopify.com/s/files/1/0461/9036/2778/files/favicon_1_16x16.png?v=1630996498" type="image/png" />
    <title>Kling</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-minimal@4/minimal.css" rel="stylesheet">
    <script src="https://www.paypal.com/sdk/js?client-id=AR2LFb_WAB8Dd8teBILiQViFoA2c8-5hoEjAGwOms6wWloqrrlPbeQxgquc-uPvYATvFY77YRPiTnZiJ&currency=CAD"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/css/ion.rangeSlider.min.css" />
    <?php
    if (isset($data['css'])) {
        foreach ($data['css'] as $item) {
    ?>
            <link rel="stylesheet" href="<?php echo _PUBLIC . '/client/assets/css/' . $item . '.css' ?>">
    <?php
        }
    }

    ?>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
    <div class="app">
        <?php if (isset($data['header']) && $data['header'] == 0) {
        } else {
            require_once './mvc/views/block/client/header.php';
        }
        ?>
        <?php require_once './mvc/views/pages/client/' . $data['page'] . '.php' ?>
        <?php if (isset($data['header']) && $data['header'] == 0) {
        } else {
            require_once './mvc/views/block/client/footer.php';
        }
        ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>
    <script src="<?php echo _PUBLIC . '/client/assets/js/main.js' ?>"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            if ($('.banner-slider')) {

                $('.banner-slider').slick({
                    speed: 300,
                    slidesToShow: 1,
                    arrows: true,
                    prevArrow: "<button type='button' class='slick-prev pull-left'><i class='fa-solid fa-angles-left behavior-prev'></i></button>",
                    nextArrow: "<button type='button' class='slick-next pull-right'><i class='fa-solid fa-angles-right behavior-next'></i></button>",
                });
            }
            AOS.init();
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            const options = {
                slidesToShow: 1,
                slidesToScroll: 1,
                dots: true,
                arrows: false,
                autoplay: true,
                autoplaySpeed: 3000,
            };

            // my slick slider as const object
            const mySlider = $('.img-center').on('init', function(slick) {

                // set this slider as const for use in set time out
                const slider = this;

                // slight delay so init completes render
                setTimeout(function() {

                    // dot buttons
                    let dots = $('.slick-dots > LI > BUTTON', slider);

                    // each dot button function
                    $.each(dots, function(i, e) {

                        // slide id
                        let slide_id = $(this).attr('aria-controls');

                        // custom dot image
                        let dot_img = $('#' + slide_id).data('dot-img');

                        $(this).html('<img src="' + dot_img + '" alt="" />');

                    });

                }, 100);


            }).slick(options);
        });
    </script>
    <!--jQuery-->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->

    <!--Plugin JavaScript file-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/js/ion.rangeSlider.min.js"></script>
    <?php
    if (isset($data['js'])) {

        foreach ($data['js'] as $item) {
    ?>
            <script src="<?php echo _PUBLIC . '/client/assets/js/' . $item . '.js' ?>"></script>
    <?php
        }
    }

    ?>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.refresh();
    </script>
</body>

</html>