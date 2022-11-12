<main>
    <style>
        .form-control:focus {
            outline: 0 none;
        }
    </style>
    <div class="index-header">

    </div>

    <div class="edit-user w-[90%] mx-[auto] mb-[100px] text-[18px]">
        <div class="px-5 py-3 rounded">
            <form action="<?php echo _WEB_ROOT . '/account/edit_profile' ?>" class="row g-3" method="post" id="formEditUser" enctype="multipart/form-data">
                <div class="col-md-6 mx-[auto] pb-2">
                    <div class="">
                        <img src="<?php
                                    if (empty($_SESSION['user']['avatar'])) {
                                        echo _PATH_AVATAR . '/avatarDefault.jpg';
                                    } else {
                                        echo _PATH_AVATAR . '/' . $_SESSION['user']['avatar'];
                                    }
                                    ?>" alt="Avatar" class="avatar img-fluid my-5 mx-[auto] border-2 border-[#eb6420] rounded-full" style="width: 200px; height:200px; object-fit:cover;" />
                    </div>
                    <div class="mx-auto w-[50%]">
                        <input type="file" name="avatar" id="" class="file-upload form-control outline-none w-[100%] ml-5">
                    </div>
                </div>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <input type="text" class="form-control outline-none" placeholder="Name" name='name' id="name" value="<?php echo $_SESSION['user']['name_user'] ?>">
                    </div>

                    <div class="col-md-6">
                        <input type="email" class="form-control outline-none" placeholder="Email" id="email" name="email" value="<?php echo $_SESSION['user']['email'] ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="address" class="form-label"></label>
                        <input type="text" class="form-control outline-none" placeholder="Phone number" id="phone" name="phone" value="<?php echo $_SESSION['user']['phone'] ?>">
                    </div>
                    <div class="col-md-6">
                        <label for="address" class="form-label"></label>
                        <input type="text" class="form-control outline-none" placeholder="Address" id="address" name="address" aria-describedby="addressFeedback" value="<?php echo $_SESSION['user']['address'] ?>">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <label for="description" class="form-label"></label>
                        <textarea type="text" class="form-control outline-none" placeholder="Description" id="description" name="description" aria-describedby="descriptionFeedback" value=""><?php echo $_SESSION['user']['description'] ?></textarea>
                    </div>
                </div>

                <div class="col-12">
                    <input type="hidden" name="update" value="update">
                    <button class="hover:bg-[#eb6420] bg-[#000] text-[#fff] hover:text-[#fff] w-[200px] h-[50px] pt-[12px] pb-[8px] tracking-[4px] text-center text-[21px]" type="submit">Update</button>
                </div>
            </form>
        </div>
    </div>
</main>
