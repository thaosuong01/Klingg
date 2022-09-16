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
    <link rel="preconnect" href="https://monorail-edge.shopifysvc.com">
    <link rel="canonical" href="https://kling-theme.myshopify.com/">
    <link rel="shortcut icon" href="//cdn.shopify.com/s/files/1/0461/9036/2778/files/favicon_1_16x16.png?v=1630996498" type="image/png" />
    <title>Kling</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo _PUBLIC . '/client/assets/css/main.css' ?>">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="app">
        <?php require_once './mvc/views/block/client/header.php' ?>
        <?php require_once './mvc/views/pages/client/' . $data['page'] . '.php' ?>

        <?php require_once './mvc/views/block/client/footer.php' ?>


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
            });
        </script>
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
            AOS.init();
        </script>
</body>

</html>