<?php
if(!empty($data['msg'])) {
    echo '<div class="alert alert-'.$data['type'].'">'.$data['msg'].'</div>';
}
?>

<form method="POST" action="" enctype="multipart/form-data">
  <div class="grid-cols-12 grid gap-4">
    <div class="mb-3 col-span-6">
      <label for="exampleInputEmail1" class="form-label">Name user</label>
      <input type="text" class="form-control" name="username" placeholder="Name user" value="<?php echo $data['user']['name'] ?>">
    </div>
    <?php
    $mb = 'mb-3';
    if ($data['user']['avatar'] != '') {
      $mb = 'mb-5';
    }
    ?>
    <div class="<?php echo $mb ?> col-span-6 h-[70px]">
      <label for="image" class="form-label flex flex-col justify-center">
        <span>Avatar</span>
        <div class="flex items-center gap-3 bg-[#fff] mt-2 px-2 py-1 rounded border border-[#99a1a8] w-[483px]">
          <img src="<?php echo _PUBLIC . '/client/assets/image/image_upload.png' ?>" alt="" class="w-7">
          <span>
            Upload file
          </span>
        </div>
      </label>
      <input type="file" id="image" class="form-control hidden" name="avatar">
      <?php
      if ($data['user']['avatar'] != '') {
      ?>
        <img class="w-10 h-10 my-2" src="<?php echo _PATH_AVATAR . $data['user']['avatar'] ?>" alt="">
      <?php
      }
      ?>
    </div>
    <div class="mb-3 col-span-6">
      <label for="exampleInputEmail1" class="form-label">User group</label><br>
      <select name="group" id="groupuser" class="custom-select" required>
        <option>Select....</option>
        <?php
        foreach ($data['groups'] as $group) {
        ?>
          <option <?php 
            echo $group['id'] == $data['user']['gr_id'] ? 'selected' : ''
          ?> value="<?php echo $group['id'] ?>"><?php echo $group['name'] ?></option>
        <?php
        }
        ?>
      </select>
    </div>
    <div class="mb-3 col-span-6">
      <label for="exampleInputEmail1" class="form-label">Email</label>
      <input type="email" class="form-control" name="email" placeholder="example@gmail.com" value="<?php echo $data['user']['email'] ?>">
    </div>
    <div class="mb-3 col-span-6">
      <label for="exampleInputEmail1" class="form-label">Password</label>
      <input type="password" class="form-control" name="password" placeholder="Password">
    </div>
    <div class="mb-3 col-span-6">
      <label for="exampleInputEmail1" class="form-label">Phone</label>
      <input type="text" class="form-control" name="phone" placeholder="Phone" value="<?php echo $data['user']['phone'] ?>">
    </div>
    <div class="mb-3 col-span-6">
      <label for="exampleInputEmail1" class="form-label">Address</label>
      <textarea rows="4" type="text" class="form-control" name="address" placeholder="Address"><?php echo $data['user']['address'] ?></textarea>
    </div>
    <div class="mb-3 col-span-6">
      <label for="exampleInputEmail1" class="form-label">Description</label>
      <textarea rows="4" type="text" class="form-control" name="description" placeholder="Description"><?php echo $data['user']['description'] ?></textarea>
    </div>
  </div>
  <input type="hidden" name="update_user" value="update_user">
  <button type="submit" class="btn bg-[#000] text-slate-50 mb-3 ml-2 rounded-lg inline-block hover:bg-[#eb6420] hover:text-slate-50 transition-all duration-300">Update</button>
</form>