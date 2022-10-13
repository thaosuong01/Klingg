<?php
if (!empty($data['msg'])) {
  echo '<div class="alert alert-' . $data['type'] . '">' . $data['msg'] . '</div>';
}
?>
<form method="POST" action="" enctype="multipart/form-data">
  <div class="grid-cols-12 grid gap-4">
    <div class="mb-3 col-span-6">
      <label for="exampleInputEmail1" class="form-label">Name product</label>
      <input type="text" class="form-control" name="productname" placeholder="Name product" value="<?php echo $data['product']['name'] ?>">
    </div>
    <div class="mb-3 col-span-6 h-[70px]">
      <label for="image" class="form-label flex flex-col justify-center">
        <span>Image</span>
        <div class="flex items-center gap-3 bg-[#fff] mt-2 px-2 py-1 rounded border border-[#99a1a8] w-[483px]">
          <img src="<?php echo _PUBLIC . '/client/assets/image/image_upload.png' ?>" alt="" class="w-7">
          <span>
            Upload file
          </span>
        </div>
        <?php
        if (!empty($data['product'])) {
        ?>
          <img src="<?php echo _PATH_IMG_PRODUCT . $data['product']['image'] ?>" alt="" class="w-10">
        <?php
        }
        ?>
      </label>
      <input type="file" id="image" class="form-control hidden" name="image"><br>
    </div>
    <?php
    $mb = 'mb-3';
    if ($data['productImg'] != '') {
      $mb = 'mb-5';
    }
    ?>
    <div class="<?php echo $mb ?> col-span-6 h-[70px]">
      <label for="image" class="form-label flex flex-col justify-center">
        <span>Images</span>
        <div class="flex items-center gap-3 bg-[#fff] mt-2 px-2 py-1 rounded border border-[#99a1a8] w-[483px]">
          <img src="<?php echo _PUBLIC . '/client/assets/image/image_upload.png' ?>" alt="" class="w-7">
          <span>
            Upload file
          </span>
        </div>

        <?php
        if (!empty($data['productImg'])) {
        ?>
          <div class="flex gap-2">
            <?php
            foreach ($data['productImg'] as $productImg) {
            ?>
              <img src="<?php echo _PATH_IMG_PRODUCT . $productImg['image'] ?>" alt="" class="w-10">
            <?php
            }
            ?>
          </div>
        <?php
        }
        ?>
      </label>
      <input type="file" id="image" multiple class="form-control hidden" name="detail_image[]"><br>
    </div>
    <div class="mb-3 col-span-6">
      <label for="exampleInputEmail1" class="form-label">Category</label><br>
      <select name="category" id="category" class="custom-select" required>
        <option>Select....</option>
        <?php
        foreach ($data['categories'] as $category) {
        ?>
          <option <?php echo $category['id'] == $data['product']['cate_id'] ? 'selected' : ''
                  ?> value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
        <?php
        }
        ?>
      </select>
    </div>
    <div class="mb-3 col-span-6">
      <label for="exampleInputEmail1" class="form-label">Price</label>
      <input type="text" class="form-control" name="price" placeholder="Example: 205" value="<?php echo $data['product']['price'] ?>">
    </div>
    <div class="mb-3 col-span-6">
      <label for="exampleInputEmail1" class="form-label">Description</label>
      <textarea rows="4" type="text" class="form-control" name="description" placeholder="Description"><?php echo $data['product']['name'] ?></textarea>
    </div>
  </div>
  <input type="hidden" name="update_product" value="update_product">
  <button type="submit" class="btn bg-[#000] text-slate-50 mb-3 ml-2 rounded-lg inline-block hover:bg-[#eb6420] hover:text-slate-50 transition-all duration-300">Update</button>
</form>