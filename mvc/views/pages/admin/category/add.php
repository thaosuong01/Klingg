<?php
if (!empty($data['msg'])) {
    echo '<div class="alert alert-' . $data['type'] . '">' . $data['msg'] . '</div>';
}
?>
<form method="POST">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Name category</label>
        <input type="text" class="form-control" name="categoryname" placeholder="Name category">
    </div>
    <input type="hidden" name="add_category" value="add_category">
    <button type="submit" class="btn bg-[#000] text-slate-50 mb-3 rounded-lg inline-block hover:bg-[#eb6420] hover:text-slate-50 transition-all duration-300">Add</button>
</form>