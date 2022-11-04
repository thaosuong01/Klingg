<div class="mb-3 flex gap-3">
    <a class="px-4 py-2 bg-[#000] text-sm text-slate-50 rounded-lg inline-block hover:bg-[#eb6420] hover:text-slate-50 transition-all duration-300" href="<?php echo _WEB_ROOT . '/admin/add_group' ?>">Create user group</a>
    <div class="flex-1">
        <form class="input flex-1 form_group" action="" method="POST">
            <div class="flex justify-end">
                <input type="text" class="input_group inline-block py-2 text-sm form-control transition-all w-80 mr-2" id="exampleFormControlInput1" placeholder="Search" name="keyword_group">
                <input type="hidden" name="search" value="search">
                <button type="submit" class="bg-[#000] neutral-900 text-slate-50 rounded inline-block hover:bg-[#eb6420] hover:text-slate-50 transition-all duration-300">
                    <i class="fas fa-search px-3 py-2"></i>
                </button>
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
<table class="table table-striped table_group">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Created at</th>
            <th scope="col">Updated at</th>
            <th class="text-center" scope="col">Edit</th>
            <th class="text-center" scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (!empty($data['groups'])) {
            foreach ($data['groups'] as $group) {
        ?>
                <tr>
                    <th scope="row"><?php echo $group['id'] ?></th>
                    <td><?php echo $group['name'] ?></td>
                    <td><?php echo $group['created_at'] ?></td>
                    <td><?php echo $group['updated_at'] ?></td>
                    <td class="text-center"><a class="text-slate-900 hover:scale-125 hover:text-yellow-500 transition-all duration-300 " href="<?php echo _WEB_ROOT . '/admin/update_group/' . $group['id'] ?>"><i class="far hover:scale-125 hover:text-yellow-500 transition-all duration-300 fa-edit"></i></a></td>
                    <td class="text-center"><a class="text-slate-900 delete hover:scale-125 hover:text-red-600 transition-all duration-300_group" href="<?php echo _WEB_ROOT . '/admin/delete_group/' . $group['id'] ?>"><i class="fas hover:scale-125 hover:text-red-600 transition-all duration-300 fa-trash-alt"></i></a></td>
                </tr>
        <?php
            }
        } else {
            echo '<tr>
            <td colspan="5" class="text-center text-[#000] text-lg">
                No data
            </td>
        </tr>';
        }
        ?>
    </tbody>
</table>
<ul class="product-footer flex justify-end list-none px-3 mt-4">
    <?php
    $page = $data['pageNum'];
    $maxPage = $data['maxPage'];
    if ($page > 1) {
        $prevPage = $page - 1;
        echo '<li class="w-[40px] h-[40px] px-1 mx-1"><a class="rounded-full w-full border pt-[6px] pb-[5px] pl-[8px] pr-[10px] leading-none text-center text-black hover:bg-[#eb6420] hover:text-[#fff] text-[1.2rem]" href="' . _WEB_ROOT . '/product/list_product?page=' . $prevPage . '"><i class="fas fa-angle-double-left"></i></a></li>';
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
        <li class="w-[40px] h-[40px] px-1"><a class="rounded-full w-full border pt-[6px] pb-[4px] px-[11px] leading-none text-center text-black hover:bg-[#eb6420] hover:text-[#fff] text-[1.2rem] <?php echo ($i == $page) ? 'bg-[#000] text-[#fff]' : false ?>" href="<?php echo _WEB_ROOT . '/product/list_product?page=' . $i ?>"><?php echo $i ?></a></li>
    <?php } ?>

    <?php
    if ($page < $maxPage) {
        $nextPage = $page + 1;
        echo '<li class="w-[40px] h-[40px] px-1 mx-1"><a class="rounded-full w-full border pt-[6px] pb-[5px] pl-[10px] pr-[8px] leading-none text-center text-black hover:bg-[#eb6420] hover:text-[#fff] text-[1.2rem]" href="' . _WEB_ROOT . '/product/list_product?page=' . $nextPage . '"><i class="fas fa-angle-double-right"></i></a></li>';
    }
    ?>
</ul>