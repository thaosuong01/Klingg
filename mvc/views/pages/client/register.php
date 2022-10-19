<main>
    <div class="index-header">
        <div class="bg-header">
            <h1 class="heading" data-aos="fade-right" data-aos-duration="1000">Create Account</h1>
            <div class="path" data-aos="fade-left" data-aos-duration="2000">
                <a href="<?php echo _WEB_ROOT ?>" class="back-to-home">Home</a>
                <span>/</span>
                <span class="page">Create Account</span>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="register d-flex flex-column">
            <form action="<?php echo _WEB_ROOT.'/user/handleRegister' ?>" class="form-register" method="post" data-aos="fade-up" data-aos-duration="1500">
            <?php
                if(isset($data['msg']) && $data['msg'] != ""){
                    echo '<div class="alert mt-5 alert-danger">'.$data['msg'].'</div>';
                }
            ?>
                <div class="form-input">
                    <input type="text" id="firstname" class="firstname" placeholder="First Name" name="firstname">
                    <p class="error error-firstname"></p>
                </div>
                <div class="form-input">
                    <input type="text" id="lastname" class="lastname" placeholder="Last Name" name="lastname">
                    <p class="error error-lastname"></p>
                </div>
                <div class="form-input">
                    <input type="text" id="email" class="email" placeholder="Email" name="email">
                    <p class="error error-email"></p>
                </div>
                <div class="form-input">
                    <input type="password" id="password" class="password" placeholder="Password" name="password">
                    <p class="error error-password"></p>
                </div>
                <input type="hidden" value="register" name="register">
                <div class="button-submit">
                    <button type="submit" class="btn">CREATE ACCOUNT</button>
                </div>
                <div class="link-wrapper">
                    <div class="login">
                        <a href="<?php echo _WEB_ROOT . '/user/login' ?>">
                            Sign In</a>
                    </div>
                    <div data-aos="fade-right" data-aos-duration="1000">
                        <p class="return-home">
                            <a href="<?php echo _WEB_ROOT ?>">
                                Return to store</a>
                        </p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>