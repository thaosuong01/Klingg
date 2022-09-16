window.addEventListener('load', function () {
    const formMess = document.querySelector('.contact-form-input');
    const errorName = document.querySelector('.error-name');
    const errorEmail = document.querySelector('.error-email');
    const errorPhone = document.querySelector('.error-phone');
    const errorMessage = document.querySelector('.error-message');
    const success = document.querySelector('.success');


    formMess.addEventListener('submit', function (e) {
        e.preventDefault();
        let valueName = this.querySelector('#name').value;
        let valueEmail = this.querySelector('#email').value;
        let valuePhone = this.querySelector('#phone').value;
        let valueMessage = this.querySelector('#form-message').value;

        let isSubmit = false;

        const testEmail = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        // name 
        if (valueName == '') {
            errorName.textContent = 'Name cannot be blank';
            isSubmit = false;
        }
        else {
            errorName.textContent = '';
            isSubmit = true;
        }
        // email
        if (valueEmail == '') {
            errorEmail.textContent = 'Email cannot be blank';
            isSubmit = false;
        }
        else if (!testEmail.test(valueEmail)) {
            errorEmail.textContent = 'Invalid email address';
            isSubmit = false;
        }
        else {
            errorEmail.textContent = '';
            isSubmit = true;
        }

        // phone
        if (valuePhone == '') {
            errorPhone.textContent = 'Phone number cannot be blank';
            isSubmit = false;
        }
        else if (valuePhone.length != 10) {
            errorPhone.textContent = 'Invalid phone number';
            isSubmit = false;
        }
        else {
            errorPhone.textContent = '';
            isSubmit = true;
        }

        // message
        if (valueMessage == '') {
            errorMessage.textContent = 'Please enter message';
            isSubmit = false;
        }
        else {
            errorMessage.textContent = '';
            isSubmit = true;
        }

        if (isSubmit) {
            success.textContent = 'Submitted successfully';
            success.style.color = '#eb6420';
            this.reset();
        }
    })
})