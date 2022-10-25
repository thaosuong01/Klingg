<div class="mb-3 flex gap-3">
    <div class="flex-1 flex justify-end">
        <form class="input flex form_bill" action="" method="POST">
            <div class="flex gap-3">
                <select name="status" id="status" class="custom-select w-[160px] select-status" required>
                    <option>Select....</option>
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
                        <p class="text-slate-500 m-0">Name: <span class="text-black"><?php echo $data['users']['name'] ?></span></p>
                        <p class="text-slate-500 m-0">Email: <span class="text-black"><?php echo $data['users']['email'] ?></span></p>
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

                    <td class="h-[50px] leading-[50px] text-center"><a class="text-slate-900" href="<?php echo _WEB_ROOT . '/bill/detailbill/' . $bill['id'] ?>"><i class="hover:scale-125 hover:text-blue-600 transition-all duration-300 fas fa-eye"></i></a></td>
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