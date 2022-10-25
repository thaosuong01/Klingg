<div class="mb-3 flex gap-3">
    <a class="px-4 py-2 bg-[#000] text-sm text-slate-50 rounded-lg inline-block hover:bg-[#eb6420] hover:text-slate-50 transition-all duration-300" href="<?php echo _WEB_ROOT . '/category/add_category' ?>">Add category</a>
    <div class="flex-1">
        <form class="input flex-1 form_category" action="" method="POST">
            <div class="flex justify-end">
                <input type="text" class="input_category inline-block py-2 text-sm form-control transition-all w-80 mr-2" id="exampleFormControlInput1" placeholder="Search" name="keyword_category">
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
<table class="table table-striped table_category">
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
        if (!empty($data['categories'])) {
            foreach ($data['categories'] as $category) {
        ?>
                <tr>
                    <th scope="row"><?php echo $category['id'] ?></th>
                    <td><?php echo $category['name'] ?></td>
                    <td><?php echo $category['created_at'] ?></td>
                    <td><?php echo $category['updated_at'] ?></td>
                    <td class="text-center"><a class="text-slate-900" href="<?php echo _WEB_ROOT . '/category/update_category/' . $category['id'] ?>"><i class="far hover:scale-125 hover:text-yellow-500 transition-all duration-300 fa-edit"></i></a></td>
                    <td class="text-center"><a class="text-slate-900 delete_category" href="<?php echo _WEB_ROOT . '/category/delete_category/' . $category['id'] ?>"><i class="fas hover:scale-125 hover:text-red-600 transition-all duration-300 fa-trash-alt"></i></a></td>
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