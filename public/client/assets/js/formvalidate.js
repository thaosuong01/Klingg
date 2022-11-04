$.validator.setDefaults({
    submitHandler: function () {
        // document.querySelector('#form').submit();
    }
});
document.querySelector('#form').addEventListener('submit',function(e){
    e.preventDefault();
})
$(document).ready(function () {
    $('#form').validate({
        rules: {
            firstname: "required",
            lastname: "required",
            address: {
                required: true,
                minlength: 2
            },
            city: {
                required: true,
                minlength: 2
            },
            phone: {
                required: true,
                minlength: 10
            },
            email: {
                required: true,
                email: true
            },
            country: "required"
        },
        messages: {
            firstname: "Bạn chưa nhập vào tên của bạn",
            lastname: "Bạn chưa nhập vào họ của bạn",
            address: {
                required: "Bạn chưa nhập vào tên đăng nhập",
                minlength: "Tên đăng nhập phải có ít nhất 2 ký tự"
            },
            city: {
                required: "Bạn chưa nhập mật khẩu",
                minlength: "Mật khẩu phải có ít nhất 5 ký tự"
            },
            phone: {
                required: "Bạn chưa nhập mật khẩu",
                minlength: "Mật khẩu phải có ít nhất 10 ký tự",
            },
            email: "Hộp thư điện tử không hợp lệ",
            country: "Bạn phải đồng ý với các quy định của chúng tôi"
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