<a class="px-4 py-2 bg-neutral-900 text-slate-50 mb-3 rounded-lg inline-block hover:bg-orange-500 hover:text-slate-50 transition-all duration-300" href="<?php echo _WEB_ROOT . '/admin/add_group' ?>">Add</a>

<?php
if (!empty($_SESSION['msg'])) {
    echo '<div class="alert alert-success">' . $_SESSION['msg'] . '</div>';
    $_SESSION['msg'] = '';
}
?>
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Created at</th>
            <th class="text-center" scope="col">Edit</th>
            <th class="text-center" scope="col">Delete</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($data['groups'] as $group) {
        ?>
            <tr>
                <th scope="row"><?php echo $group['id'] ?></th>
                <td><?php echo $group['name'] ?></td>
                <td><?php echo $group['created_at'] ?></< /td>
                <td class="text-center"><a class="text-slate-900" href="<?php echo _WEB_ROOT . '/admin/update_group/' . $group['id'] ?>"><i class="far hover:scale-125 hover:text-yellow-500 transition-all duration-300 fa-edit"></i></a></td>
                <td class="text-center"><a class="text-slate-900 delete_group" href="<?php echo _WEB_ROOT. '/admin/delete_group/'.$group['id'] ?>"><i class="fas hover:scale-125 hover:text-red-600 transition-all duration-300 fa-trash-alt"></i></a></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
