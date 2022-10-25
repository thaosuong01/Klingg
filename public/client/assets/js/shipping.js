window.addEventListener('load', function () {
    let info = JSON.parse(localStorage.getItem('infopayment'));
    let link = JSON.parse(localStorage.getItem('redirect'));

    let phone = document.querySelector('.phone')
    let address = document.querySelector('.address')
    if (info) {
        phone.textContent = info.phone;
        address.textContent = info.address
    } else {
        window.location.href = link.urlReturn
    }

    const payment = document.querySelector('.go-to-payment');

    payment.addEventListener('click', function (e) {
        e.preventDefault();
        let info = JSON.parse(localStorage.getItem('infopayment'));
        let userId = e.target.dataset.userid;
        let total = e.target.dataset.total;
        let url = e.target.dataset.url;
        let redirect = e.target.dataset.redirect;
        
        
        $.ajax({
            type: "POST",
            url: url,
            data: { userId, address:info.address, phone:info.phone, total, method:'Pay after recieve' },
            dataType: "text",
            success: function (data) {
                window.location.href = redirect + data;
            },
            error: function (e) {
                console.log(e);
            },
        });
    })
})