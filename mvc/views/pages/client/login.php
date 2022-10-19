<main>
    <div class="index-header">
        <div class="bg-header">
            <h1 class="heading" data-aos="fade-right" data-aos-duration="1000">Account</h1>
            <div class="path" data-aos="fade-left" data-aos-duration="2000">
                <a href="<?php echo _WEB_ROOT ?>" class="back-to-home">Home</a>
                <span>/</span>
                <span class="page">Account</span>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="account">
            <form action="<?php echo _WEB_ROOT.'/user/handleLogin' ?>" class="form-login" method="post" data-aos="fade-up" data-aos-duration="1500">
        <?php
                if(isset($_SESSION['msg']) && $_SESSION['msg'] != ""){
                    echo '<div class="alert alert-success">'.$_SESSION['msg'].'</div>';
                    $_SESSION['msg'] = '';
                }
            ?>
            <?php
                if(isset($_SESSION['msglg']) && $_SESSION['msglg'] != "" ){
                    echo '<div class="alert alert-'.$_SESSION['typelg'].'">'.$_SESSION['msglg'].'</div>';
                    $_SESSION['msglg'] = '';
                    $_SESSION['typelg'] = '';
                }
            ?>
                <div class="form-input">
                    <input type="text" id="email" class="email" placeholder="Email" name="email">
                    <p class="error error-email"></p>
                </div>
                <div class="form-input">
                    <input type="password" id="password" class="password" placeholder="Password" name="password">
                    <p class="error error-password"></p>
                </div>
                <input type="hidden" value="login" name="login">
                <div class="button-submit">
                    <button type="submit" class="btn">SIGN IN</button>
                </div>
                <div class="link-wrapper">
                    <div class="create-account">
                        <a href="<?php echo _WEB_ROOT . '/user/register' ?>">
                            Create account</a>
                    </div>
                    <div data-aos="fade-right" data-aos-duration="1000">
                        <p class="forgot"><a href="#">Forgot your password?</a></p>
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