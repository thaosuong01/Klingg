window.addEventListener('load', function () {
    const formLogin = document.querySelector('.form-register');
    const errorEmail = document.querySelector('.error-email');
    const errorFirstName = document.querySelector('.error-firstname');
    const errorLastName = document.querySelector('.error-lastname');
    const errorPassword = document.querySelector('.error-password');
    
    
    formLogin.addEventListener('submit', function (e) {
        e.preventDefault();
        let valueFirstName = this.querySelector('#firstname').value;
        let valueLastName = this.querySelector('#lastname').value;
        let valueEmail = this.querySelector('#email').value;
        let valuePass = this.querySelector('#password').value;

        let isLogin = false;

        const testEmail = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        //name
        
        if (valueFirstName == '') {
            errorFirstName.textContent = 'First name cannot be blank';
            isSubmit = false;
        }
        else {
            errorFirstName.textContent = '';
            isSubmit = true;
        }

        if (valueLastName == '') {
            errorLastName.textContent = 'Last name cannot be blank';
            isSubmit = false;
        }
        else {
            errorLastName.textContent = '';
            isSubmit = true;
        }
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
            errorPassword.textContent = 'Please enter at least 8 characters';
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