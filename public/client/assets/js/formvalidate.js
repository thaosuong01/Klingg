$.validator.setDefaults({
    submitHandler: function () {
        // document.querySelector('#form').submit();
    }
});
document.querySelector('#form').addEventListener('submit', function (e) {
    e.preventDefault();
})
$(document).ready(function () {
    $('#form').validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            firstname: "required",
            lastname: "required",
            country: {
                required: true,
            },
            address: {
                required: true,
            },
            city: {
                required: true,
            },
            phone: {
                required: true,
                minlength: 10
            },


        },
        messages: {
            firstname: "You must entered your first name.",
            lastname: "You must entered your last name.",
            email: "Email address is not valid.",
            country: "You must choose a shipping address.",
            address: {
                required: "You must fill in the shipping address."
            },
            city: {
                required: "You must fill in the shipping address."
            },
            phone: {
                required: "You must enter your phone number.",
                minlength: "Invalid phone number.",
            },
        },
        errorElement: "div",
        errorPlacement: function (error, element) {
            error.addClass("invalid-feedback");
            if (element.prop("type") === "checkbox") {
                error.insertAfter(element.siblings("label"));
            } else {
                error.insertAfter(element);
            }
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass("is-invalid").removeClass("is-valid");
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).addClass("is-valid").removeClass("is-invalid");
        }
    });
});