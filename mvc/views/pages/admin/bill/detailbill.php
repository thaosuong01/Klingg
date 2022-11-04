<main>
    <style>
        .container-sm {
            font-family: 'Roboto', sans-serif !important;
        }
    </style>
    <div class="index-header">
    </div>
    <?php
    if (!empty($data['msg'])) {
        echo '<div class="alert alert-' . $data['type'] . '">' . $data['msg'] . '</div>';
    }
    ?>
    <div class="container-sm mb-5">
        <div class="grid grid-cols-12 mx-auto w-85">
            <div class="col-span-6 px-4">
                <form method="POST" class="w-full">
                    <div class="border border-2 rounded-lg p-3">
                        <p class="flex gap-5 border-b py-2 m-0"><span class="text-gray-500">Contact:</span><span class="font-semibold"><?php echo $data['bill']['phone'] ?></span></p>
                        <p class="flex gap-5 m-0 border-b py-2"><span class="text-gray-500">Ship to:</span><span class="font-semibold"><?php echo $data['bill']['address'] ?></span></p>
                        <p class="flex  gap-5 py-2 m-0 border-b py-2"><span class="text-gray-500">Method:</span><span class="font-semibold">Standard
                                Shipping</span></p>
                        <p class="flex gap-5 py-2 m-0"><span class="text-gray-500">Payment Method:</span><span class="font-semibold"><?php echo $data['bill']['method'] ?></span></p>
                    </div>
                    <div class="border border-2 rounded-lg p-3 mt-4">
                        <p class="flex gap-5 py-2 border-b m-0"><span class="text-gray-500">Code order:</span><span class="font-semibold"><?php echo $data['bill']['id'] ?></span></p>
                        <p class="flex gap-5 py-2 border-b m-0"><span class="text-gray-500">Order Date:</span><span class="font-semibold"><?php echo $data['bill']['created_at'] ?></span></p>
                        <p class="flex gap-5 py-2 m-0"><span class="text-gray-500">Estimated delivery date: </span><span class="font-semibold">3 - 7 days</span></p>
                    </div>

                    <div class="status pb-4">
                        <p class="mt-5 mb-3 text-xl">Status</p>
                        <select name="status" id="status" class="custom-select w-full select-status" required>
                            <option <?php echo $data['bill']['status'] == 0 ?'selected':'' ?> value="0">Proccessing</option>
                            <option <?php echo $data['bill']['status'] == 1 ?'selected':'' ?> value="1">In transit</option>
                            <option <?php echo $data['bill']['status'] == 2 ?'selected':'' ?> value="2">Delivered</option>
                        </select>
                    </div>
                    <input type="hidden" name="update_status" value="update_status">
                    <button type="submit" class="btn bg-[#000] text-slate-50 mb-3 rounded-lg inline-block hover:bg-[#eb6420] hover:text-slate-50 transition-all duration-300">Update</button>
                </form>
            </div>
            <?php
            if (isset($data['detailBill'])) {
            ?>
                <div class="col-span-6">
                    <div class="bg-gray-50 p-4 h-full">
                        <?php
                        foreach ($data['detailBill'] as $item) {
                        ?>
                            <div class="listItem flex flex-col gap-3 pb-3">
                                <div class="flex items-center justify-between ">
                                    <div class="flex gap-3 items-center">
                                        <div class="image w-fit relative "><img src="<?php echo _PATH_IMG_PRODUCT . $item['image'] ?>" class="w-[80px] border rounded-2xl" alt=""><span class="absolute top-[-8px] p-1 bg-gray-500 rounded-full leading-none  text-white right-[-8px] min-w-[20px] min-h-[20px] max-w-[20px] max-h-[20px] flex justify-center items-center"><?php echo $item['number'] ?></span>
                                        </div>
                                        <p class="font-semibold"><?php echo $item['name_pro'] ?></p>
                                    </div>
                                    <span class="flex-end font-semibold">$ <?php echo number_format($item['price'], 2) ?></span>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                        <div class="subtotal py-3 border-b m-0">
                            <p class="flex justify-between my-2"><span class="text-gray-600">Subtotal</span><span class="font-semibold">$ <?php echo number_format($data['bill']['total'] - 2, 2) ?></span></p>
                            <p class="flex mb-3 justify-between items-center m-0"><span class="text-gray-600">Shipping</span><span class="font-semibold text-gray-600">$ 2.00</span>
                            </p>
                        </div>
                        <div class="total py-3">
                            <p class="flex justify-between items-center"><span class="text-xl font-bold">Total</span><span class="font-semibold text-3xl">$ <?php echo number_format($data['bill']['total'], 2) ?></span></p>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</main>