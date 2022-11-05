<div class="mb-3 flex gap-3">
    <div class="flex-1 flex justify-end">
        <form class="input flex form_comment" action="" method="GET">
            <div class="flex gap-3">
                <div class="flex justify-end">
                    <input type="text" class="input_comment inline-block py-2 text-sm form-control transition-all w-80 mr-2" id="exampleFormControlInput1" placeholder="Search" name="keyword_comment">
                    <input type="hidden" name="search" value="search">
                    <button type="submit" class="bg-[#000] neutral-900 text-slate-50 rounded inline-block hover:bg-[#eb6420] hover:text-slate-50 transition-all duration-300">
                        <i class="fas fa-search px-3 py-2"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
<style>
    .loader {
        border: 16px solid #f3f3f3;
        border-radius: 50%;
        border-top: 16px solid #3498db;
        width: 50px;
        height: 50px;
        -webkit-animation: spin 2s linear infinite;
        /* Safari */
        animation: spin 0.7s linear infinite;
        display: none;
    }

    /* Safari */
    @-webkit-keyframes spin {
        0% {
            -webkit-transform: rotate(0deg);
        }

        100% {
            -webkit-transform: rotate(360deg);
        }
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>
<?php
if (!empty($_SESSION['msg'])) {
    echo '<div class="alert alert-success" id="toast-success">' . $_SESSION['msg'] . '</div>';
    $_SESSION['msg'] = '';
}
?>
<div class="text-center d-flex justify-content-center">
    <div class="loader"></div>
</div>
<table class="table table-striped table_comment">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">User</th>
            <th scope="col">Product</th>
            <th scope="col">Rating</th>
            <th scope="col">Comment</th>
            <th class="text-center" scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (!empty($data['comments'])) {
            foreach ($data['comments'] as $comment) {
        ?>
                <tr>
                    <td class="h-[50px] leading-[50px]" scope="row"><?php echo $comment['id'] ?></td>
                    <td class="h-[50px]">
                        <p class="text-slate-500 m-0">Name: <span class="text-black"><?php echo $comment['name_user'] ?></span></p>
                        <p class="text-slate-500 m-0">Email: <span class="text-black"><?php echo $comment['email'] ?></span></p>
                    </td>
                    <td class="h-[50px]">
                        <img width="50px" src="<?php echo _PATH_IMG_PRODUCT . $comment['image'] ?>" alt="">
                        <p class="text-slate-500 mt-2"><a href="<?php echo _WEB_ROOT . '/detail/index/' . $comment['product_id']?>" class="text-black hover:text-[#eb6420]"><?php echo $comment['name'] ?></a></p>
                    </td>
                    <td class="h-[50px]">
                        <div class="rateyo_admin" data-rateyo-rating="<?php echo $comment['rating'] ?>" data-rateyo-read-only="true">
                    </td>
                    <td class="h-[50px] leading-[50px]"><?php echo $comment['comments'] ?></td>

                    <td class="h-[50px] leading-[50px] text-center"><a class="text-slate-900 delete_comment hover:scale-125 hover:text-red-600 transition-all duration-300_comment" href="<?php echo _WEB_ROOT . '/comment/delete_comment/' . $comment['id'] ?>"><i class="fas hover:scale-125 hover:text-red-600 transition-all duration-300 fa-trash-alt"></i></a></td>
                </tr>
        <?php
            }
        } else {
            echo '<tr>
            <td colspan="8" class="text-center text-[#000] text-lg font-bold">
                No data
            </td>
        </tr>';
        }
        ?>
    </tbody>
</table>
<ul class="comment-footer flex justify-end list-none px-3 mt-4">
    <?php
    $search = '';

    if (!empty($_GET['keyword_comment'])) {
        $search = $_GET['keyword_comment'];
    }
    $page = $data['pageNum'];
    $maxPage = $data['maxPage'];
    if ($page > 1) {
        $prevPage = $page - 1;
        echo '<li class="w-[40px] h-[40px] px-1 mx-1"><a class="rounded-full w-full border pt-[6px] pb-[5px] pl-[8px] pr-[10px] leading-none text-center text-black hover:bg-[#eb6420] hover:text-[#fff] text-[1.2rem]" href="' . _WEB_ROOT . '/comment/list_comment?page=' . $prevPage . '&keyword_comment=' . $search . '"><i class="fas fa-angle-double-left"></i></a></li>';
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
        <li class="w-[40px] h-[40px] px-1"><a class="rounded-full w-full border pt-[6px] pb-[4px] px-[11px] leading-none text-center text-black hover:bg-[#eb6420] hover:text-[#fff] text-[1.2rem] <?php echo ($i == $page) ? 'bg-[#000] text-[#fff]' : false ?>" href="<?php echo _WEB_ROOT . '/comment/list_comment?page=' . $i . '&keyword_comment=' . $search ?>"><?php echo $i ?></a></li>
    <?php } ?>

    <?php
    if ($page < $maxPage) {
        $nextPage = $page + 1;
        echo '<li class="w-[40px] h-[40px] px-1 mx-1"><a class="rounded-full w-full border pt-[6px] pb-[5px] pl-[10px] pr-[8px] leading-none text-center text-black hover:bg-[#eb6420] hover:text-[#fff] text-[1.2rem]" href="' . _WEB_ROOT . '/comment/list_comment?page=' . $nextPage . '&keyword_comment=' . $search . '"><i class="fas fa-angle-double-right"></i></a></li>';
    }
    ?>
</ul>