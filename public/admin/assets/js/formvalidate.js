$.validator.setDefaults({
    submitHandler: function () {
        document.querySelector('#form').submit();
    }
});
// document.querySelector('#form').addEventListener('submit', function (e) {
//     e.preventDefault();
// })
$(document).ready(function () {
    $('#form').validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            username: "required",
            group: {
                required: true,
            },
            password: {
                required: true,
                minlength: 8
            },
            groupname: "required",
            categoryname: "required",
            productname: "required",
            category: {
                required: true,
            },
            price: {
                required: true,
            }

        },
        messages: {
            username: "You must entered user name.",
            email: "Email address is not valid.",
            group: "You must choose a user group.",
            password: {
                required: "You have not entered your password.",
                minlength: "Password must be at least 8 characters",
            },
            groupname: "You must entered name user group.",
            categoryname: "You must enter a category name.",
            productname: "You must enter a product name.",
            category: "You must choose a product category.",
            price: "You must enter a product price.",
            
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