<div class="mb-3 flex gap-3">
    <a class="px-4 py-2 bg-[#000] text-sm text-slate-50 rounded-lg inline-block hover:bg-[#eb6420] hover:text-slate-50 transition-all duration-300" href="<?php echo _WEB_ROOT . '/user/add_user' ?>">Add user</a>
    <div class="flex-1 flex justify-end">
        <form class="input flex form_user" action="" method="POST">
            <div class="flex gap-3">
                <select name="group" id="groupuser" class="custom-select w-[160px] select-group" required>
                    <option>Select....</option>
                    <?php
                    foreach ($data['groups'] as $group) {
                    ?>
                        <option value="<?php echo $group['id'] ?>"><?php echo $group['name'] ?></option>
                    <?php
                    }
                    ?>
                </select>
                <div class="flex justify-end">
                    <input type="text" class="input_user inline-block py-2 text-sm form-control transition-all w-80 mr-2" id="exampleFormControlInput1" placeholder="Search" name="keyword_user">
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
<table class="table table-striped table_user">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Avatar</th>
            <th scope="col">User Group</th>
            <th scope="col">Communications</th>
            <th scope="col">Created at</th>
            <th class="text-center" scope="col">Edit</th>
            <th class="text-center" scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (!empty($data['users'])) {
            foreach ($data['users'] as $user) {
        ?>
                <tr>
                    <td class="h-[50px] leading-[50px]" scope="row"><?php echo $user['id'] ?></td>
                    <td class="h-[50px] leading-[50px]"><?php echo $user['name'] ?></td>
                    <td class="h-[50px] leading-[50px]"><img src="<?php echo _PATH_AVATAR . $user['avatar'] ?>" class="w-10"></td>
                    <td class="h-[50px] leading-[50px] text-green-600"><?php echo getNameUserGroup($user['gr_id']) ?></td>
                    <td class="h-[50px] leading-[50px]"><?php echo $user['email'] ?></td>
                    <td class="h-[50px] leading-[50px]"><?php echo $user['created_at'] ?></td>
                    <td class="h-[50px] leading-[50px] text-center"><a class="text-slate-900" href="<?php echo _WEB_ROOT . '/user/update_user/' . $user['id'] ?>"><i class="far hover:scale-125 hover:text-yellow-500 transition-all duration-300 fa-edit"></i></a></td>
                    <td class="h-[50px] leading-[50px] text-center"><a class="text-slate-900 delete_user" href="<?php echo _WEB_ROOT . '/user/delete_user/' . $user['id'] ?>"><i class="fas hover:scale-125 hover:text-red-600 transition-all duration-300 fa-trash-alt"></i></a></td>
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