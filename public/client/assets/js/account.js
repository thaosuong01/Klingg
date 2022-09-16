window.addEventListener('load', function () {
    const formLogin = document.querySelector('.form-login');
    const errorEmail = document.querySelector('.error-email');
    const errorPassword = document.querySelector('.error-password');
    
    
    formLogin.addEventListener('submit', function (e) {
        e.preventDefault();
        let valueEmail = this.querySelector('#email').value;
        let valuePass = this.querySelector('#password').value;

        let isLogin = false;

        const testEmail = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        // email
        if (valueEmail == '') {
            errorEmail.textContent = 'Email cannot be blank';
            isLogin = false;
        }
        else if (!testEmail.test(valueEmail)) {
            errorEmail.textContent = 'Invalid email address';
            isLogin = false;
        }
        else {
            errorEmail.textContent = '';
            isLogin = true;
        }

        // Pass
        if (valuePass == '') {
            errorPassword.textContent = 'Please enter password';
            isLogin = false;
        }
        else if(valuePass.length < 8) {
            errorPassword.textContent = 'Password must be more than 8 characters';
            isLogin = false;
        }
        else {
            errorPassword.textContent = '';
            isLogin = true;
        }

        if (isLogin) {
            this.submit();
        }
    })
})
