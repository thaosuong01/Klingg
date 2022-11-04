window.addEventListener('load', function() {
    const formInfo = document.querySelector('.form-info');

    formInfo.addEventListener('submit', function(e) {
        e.preventDefault();
        const email = this.querySelector('.email').value;
        const region = this.querySelector('.region').value;
        const firstName = this.querySelector('.firstname').value;
        const lastName = this.querySelector('.lastname').value;
        const addressDetail = this.querySelector('.address').value;
        const city = this.querySelector('.city').value;
        const name = firstName + ' ' + lastName;
        const address = addressDetail + ' - ' + city + ' - ' + region;
        const phone = this.querySelector('.phone').value;
        const redirect = this.dataset.redirect;
        const urlReturn = this.dataset.urlreturn;
        const sum = this.querySelector('input[name="sum"]').value;

        window.localStorage.setItem('infopayment',JSON.stringify({
            name,
            address,
            phone,
            sum
        }));
        window.localStorage.setItem('redirect',JSON.stringify({
            urlReturn
        }))
        if(email && region && firstName && lastName && name && address && city && phone && urlReturn && sum){

            window.location.href = redirect;
        }
    })

})