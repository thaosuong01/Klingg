<div class="mb-3 flex gap-3">
    <div class="flex-1 flex justify-end">
        <form class="input flex form_bill" action="" method="GET">
            <div class="flex gap-3">
                <select name="status" id="status" class="custom-select w-[160px] select-status" required>
                    <option value="0">Proccessing</option>
                    <option value="1">In transit</option>
                    <option value="2">Delivered</option>
                </select>
                <div class="flex justify-end">
                    <input type="text" class="input_bill inline-block py-2 text-sm form-control transition-all w-80 mr-2" id="exampleFormControlInput1" placeholder="Search" name="keyword_bill">
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
<table class="table table-striped table_bill">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Information</th>
            <th scope="col">Total</th>
            <th scope="col">Status</th>
            <th scope="col">Created at</th>
            <th class="text-center" scope="col">View</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (!empty($data['bills'])) {
            foreach ($data['bills'] as $bill) {
        ?>
                <tr>
                    <td class="h-[50px] leading-[50px]" scope="row"><?php echo $bill['id'] ?></td>
                    <td class="h-[50px] ">
                        <p class="text-slate-500 m-0">Name: <span class="text-black"><?php echo $bill['name'] ?></span></p>
                        <p class="text-slate-500 m-0">Email: <span class="text-black"><?php echo $bill['email'] ?></span></p>
                        <p class="text-slate-500 m-0">Phone: <span class="text-black"><?php echo $bill['phone'] ?></span></p>
                        <p class="text-slate-500 m-0">Address: <span class="text-black"><?php echo $bill['address'] ?></span></p>
                    </td>

                    <td class="h-[50px] leading-[50px] text-orange-500 font-bold">$ <?php echo $bill['total'] ?></td>
                    <?php
                    $status = '';
                    $color = '';
                    if ($bill['status'] == 0) {
                        $status = 'Proccessing';
                        $color = 'text-yellow-500';
                    } else if ($bill['status'] == 1) {
                        $status = 'In transit';
                        $color = 'text-blue-500';
                    } else {
                        $status = 'Delivered';
                        $color = 'text-green-500';
                    }
                    ?>
                    <td class="h-[50px] leading-[50px] <?php echo $color ?>"><?php echo $status ?></td>
                    <td class="h-[50px] leading-[50px]"><?php echo $bill['created_at'] ?></td>

                    <td class="h-[50px] leading-[50px] text-center"><a class="text-slate-900 hover:scale-125 hover:text-yellow-500 transition-all duration-300 " href="<?php echo _WEB_ROOT . '/bill/detailbill/' . $bill['id'] ?>"><i class="hover:scale-125 hover:text-blue-600 transition-all duration-300 fas fa-eye"></i></a></td>
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
<ul class="bill-footer flex justify-end list-none px-3 mt-4">
    <?php
    $search = '';
    $status = -1;
    $keyword = '';

    // print_r($_GET);
    // die;
    if(!empty($_GET['keyword_bill'])){
        $keyword = $_GET['keyword_bill'];
    }
    if(!empty($_GET['search'])){
        $search = $_GET['search'];
    }

    if(isset($_GET['status']) && $_GET['status'] > -1){
        $status = $_GET['status'];
    }

    $page = $data['pageNum'];
    $maxPage = $data['maxPage'];
    if ($page > 1) {
        $prevPage = $page - 1;
        echo '<li class="w-[40px] h-[40px] px-1 mx-1"><a class="rounded-full w-full border pt-[6px] pb-[5px] pl-[8px] pr-[10px] leading-none text-center text-black hover:bg-[#eb6420] hover:text-[#fff] text-[1.2rem]" href="' . _WEB_ROOT . '/bill/list_bill?page=' . $prevPage . '&status='.$status.'&search='.$search.'&keyword_bill='.$keyword.'"><i class="fas fa-angle-double-left"></i></a></li>';
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
        <li class="w-[40px] h-[40px] px-1"><a class="rounded-full w-full border pt-[6px] pb-[4px] px-[11px] leading-none text-center text-black hover:bg-[#eb6420] hover:text-[#fff] text-[1.2rem] <?php echo ($i == $page) ? 'bg-[#000] text-[#fff]' : false ?>" href="<?php echo _WEB_ROOT . '/bill/list_bill?page=' . $i .'&search='.$search.'&keyword_bill='.$keyword.'&status='.$status?>"><?php echo $i ?></a></li>
    <?php } ?>

    <?php
    if ($page < $maxPage) {
        $nextPage = $page + 1;
        echo '<li class="w-[40px] h-[40px] px-1 mx-1"><a class="rounded-full w-full border pt-[6px] pb-[5px] pl-[10px] pr-[8px] leading-none text-center text-black hover:bg-[#eb6420] hover:text-[#fff] text-[1.2rem]" href="' . _WEB_ROOT . '/bill/list_bill?page=' . $nextPage . '&status='.$status.'&search='.$search.'&keyword_bill='.$keyword.'"><i class="fas fa-angle-double-right"></i></a></li>';
    }
    ?>
</ul>