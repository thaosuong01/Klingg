let loader = document.querySelectorAll(".loader");
let keyword = JSON.parse(localStorage.getItem("kyw")) || "";

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

// Select
let selectGroupUser = document.querySelector('.select-group');
console.log(selectGroupUser);

selectGroupUser?.addEventListener("change", function (e) {
    localStorage.setItem("idSelect", JSON.stringify(e.target.value));
    setLoading(table_user);
    setTimeout(() => {
        form_user.submit();
    }, 1500);
});