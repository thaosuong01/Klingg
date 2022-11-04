let loader = document.querySelectorAll(".loader");
let keyword = JSON.parse(localStorage.getItem("kyw")) || "";
let path = window.location.pathname;
if(localStorage.getItem('path') != path){
    console
    localStorage.setItem('path',window.location.pathname);

    localStorage.removeItem("idSelect");
}
function setLoading(selector) {
    setTimeout(() => {
        loader.forEach((item) => {
            console.log(item);
            selector.style.visibility = "hidden";

            item.style.display = "block";
        });
    }, 500);
}
function searchInput(input, table, form) {
    input?.addEventListener("keyup", function (e) {
        localStorage.setItem("kyw", JSON.stringify(e.target.value));
        setLoading(table);
        setTimeout(() => {
            form.submit();
        }, 1500);
    });
}
function formSunbmit(form, table) {
    form?.addEventListener("submit", function (e) {
        e.preventDefault();
        loader.forEach((item) => {
            console.log(item);
            table.style.visibility = "hidden";

            item.style.display = "block";
        });
        setTimeout(() => {
            loader.forEach((item) => {
                console.log(item);
                table.style.visibility = "visible";

                item.style.display = "none";
            });
        }, 1000);
    });
}

// search User Group
let input_group = document.querySelector('.input_group');
let table_group = document.querySelector('.table_group');
let form_group = document.querySelector('.form_group');
searchInput(input_group, table_group, form_group);
formSunbmit(form_group, table_group);

// search User
let input_user = document.querySelector('.input_user');
let table_user = document.querySelector('.table_user');
let form_user = document.querySelector('.form_user');
searchInput(input_user, table_user, form_user);
formSunbmit(form_user, table_user);

// Select user group
let selectGroupUser = document.querySelector('.select-group');
if(selectGroupUser){
    selectGroupUser.value = JSON.parse(localStorage.getItem('idSelect'));

}
selectGroupUser?.addEventListener("change", function (e) {
    localStorage.setItem("idSelect", JSON.stringify(e.target.value));
    setLoading(table_user);
    setTimeout(() => {
        form_user.submit();
    }, 1500);
});

// category
let input_category = document.querySelector('.input_category');
let table_category = document.querySelector('.table_category');
let form_category = document.querySelector('.form_category');
searchInput(input_category, table_category, form_category);
formSunbmit(form_category, table_category);

// product
let input_product = document.querySelector('.input_product');
let table_product = document.querySelector('.table_product');
let form_product = document.querySelector('.form_product');
searchInput(input_product, table_product, form_product);
formSunbmit(form_product, table_product);

// select category
let selectCategory = document.querySelector('.select-category');
if(selectCategory){
    selectCategory.value = JSON.parse(localStorage.getItem('idSelect'));
}
selectCategory?.addEventListener("change", function (e) {
    localStorage.setItem("idSelect", JSON.stringify(e.target.value));
    setLoading(table_product);
    setTimeout(() => {
        form_product.submit();
    }, 1500);
});

// bill
let input_bill = document.querySelector('.input_bill');
let table_bill = document.querySelector('.table_bill');
let form_bill = document.querySelector('.form_bill');
searchInput(input_bill, table_bill, form_bill);
formSunbmit(form_bill, table_bill);

// select status
let selectStatus = document.querySelector('.select-status');
if(selectStatus){
    selectStatus.value = JSON.parse(localStorage.getItem('idSelect'));
}
    selectStatus?.addEventListener("change", function (e) {
    localStorage.setItem("idSelect", JSON.stringify(e.target.value));
    setLoading(table_bill);
    setTimeout(() => {
        form_bill.submit();
    }, 1500);
});

// comment
let input_comment = document.querySelector('.input_comment');
let table_comment = document.querySelector('.table_comment');
let form_comment = document.querySelector('.form_comment');
searchInput(input_comment, table_comment, form_comment);
formSunbmit(form_comment, table_comment);