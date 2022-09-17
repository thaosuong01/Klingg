<?php
if(!empty($data['msg'])) {
    echo '<div class="alert alert-'.$data['type'].'">'.$data['msg'].'</div>';
}
?>
<form method="POST">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name group</label>
    <input type="text" class="form-control" name="groupname" placeholder="Name group" value="<?php echo $data['group']['name'] ?>">
  </div>
  <input type="hidden" name="update_group" value="update_group">
  <button type="submit" class="btn bg-neutral-900 text-slate-50 mb-3 rounded-lg inline-block hover:bg-orange-500 hover:text-slate-50 transition-all duration-300">Update</button>
</form>