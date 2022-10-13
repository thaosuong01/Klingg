<?php
if (!empty($data['msg'])) {
    echo '<div class="alert alert-' . $data['type'] . '">' . $data['msg'] . '</div>';
}
?>
<form method="POST" action="<?php echo _WEB_ROOT . '/product/add_product' ?>" enctype="multipart/form-data">
    <div class="grid-cols-12 grid gap-4">
        <div class="mb-3 col-span-6">
            <label for="exampleInputEmail1" class="form-label">Name product</label>
            <input type="text" class="form-control" name="productname" placeholder="Name product">
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
            </label>
            <input type="file" id="image" class="form-control hidden" name="image"><br>
        </div>
        <div class="mb-3 col-span-6 h-[70px]">
            <label for="image" class="form-label flex flex-col justify-center">
                <span>Images</span>
                <div class="flex items-center gap-3 bg-[#fff] mt-2 px-2 py-1 rounded border border-[#99a1a8] w-[483px]">
                    <img src="<?php echo _PUBLIC . '/client/assets/image/image_upload.png' ?>" alt="" class="w-7">
                    <span>
                        Upload file
                    </span>
                </div>
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
                    <option value="<?php echo $category['id'] ?>"><?php echo $category['name'] ?></option>
                <?php
                }
                ?>
            </select>
        </div>
        <div class="mb-3 col-span-6">
            <label for="exampleInputEmail1" class="form-label">Price</label>
            <input type="text" class="form-control" name="price" placeholder="Example: 205">
        </div>
        <div class="mb-3 col-span-6">
            <label for="exampleInputEmail1" class="form-label">Description</label>
            <textarea rows="4" type="text" class="form-control" name="description" placeholder="Description"></textarea>
        </div>
    </div>
    <input type="hidden" name="add_product" value="add_product">
    <button type="submit" class="btn bg-[#000] text-slate-50 mb-3 ml-2 rounded-lg inline-block hover:bg-[#eb6420] hover:text-slate-50 transition-all duration-300">Add</button>
</form>