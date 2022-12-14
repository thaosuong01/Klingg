<?php
if (!empty($data['msg'])) {
    echo '<div class="alert alert-' . $data['type'] . '">' . $data['msg'] . '</div>';
}
?>

<form id="form" method="POST" action="<?php echo _WEB_ROOT . '/product/add_product' ?>" enctype="multipart/form-data">
    <div class="grid-cols-12 grid gap-4">
        <div class="mb-3 col-span-6">
            <label for="exampleInputEmail1" class="form-label">Product name</label>
            <input type="text" class="form-control" name="productname" placeholder="Product name">
        </div>
        <div class="mb-3 col-span-6 h-[70px]" id="image-upload">
            <label for="image" class="form-label flex flex-col justify-center" id="upload-img">
                <span>Product image</span>
                <div class="flex items-center gap-3 bg-[#fff] mt-2 px-2 py-1 rounded border border-[#99a1a8] w-[483px]">
                    <img src="<?php echo _PUBLIC . '/client/assets/image/image_upload.png' ?>" alt="" class="w-7">
                    <span>
                        Upload file
                    </span>
                </div>
            </label>
            <input type="file" id="image" class="form-control hidden" name="productimage" onchange="readURL(this);"><br>
        </div>
        <div class="mb-3 col-span-6 h-[70px]" id="images-upload">
            <label for="images" class="form-label flex flex-col justify-center">
                <span>Product images</span>
                <div class="flex items-center gap-3 bg-[#fff] mt-2 px-2 py-1 rounded border border-[#99a1a8] w-[483px]">
                    <img src="<?php echo _PUBLIC . '/client/assets/image/image_upload.png' ?>" alt="" class="w-7">
                    <span>
                        Upload file
                    </span>
                </div>
                <div id="frames" class="flex gap-2"></div>
            </label>
            <input type="file" id="images" class="hidden" name="image[]" multiple /><br />
        </div>
        <div class="mb-3 col-span-6">
            <label for="exampleInputEmail1" class="form-label">Category</label><br>
            <select name="category" id="category" class="custom-select" required>
                <option value="">---Select---</option>
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
    <button type="submit" class="btn bg-[#000] text-slate-50 mb-3 ml-2 rounded-lg inline-block hover:bg-[#eb6420] hover:text-slate-50 transition-all duration-300">Create</button>
</form>