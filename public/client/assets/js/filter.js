$result = $(".js-result");
var from = 0,
    to = 400;
let getvalues = document.querySelector('.get_value');
let min = document.querySelector('input[name="min"]');
let max = document.querySelector('input[name="max"]');

min.value = from;
max.value = to;

// getvalues.addEventListener('click',writeResult)




var saveResult = function (data) {
    from = data.from;
    to = data.to;
    min.value = from;
    max.value = to;
};


$("#demo_1").ionRangeSlider({
    type: "double",
    grid: true,
    min: 0,
    max: 500,
    from: document.querySelector('#demo_1').dataset.from,
    to: document.querySelector('#demo_1').dataset.to,
    prefix: "$",
    onLoad: function (data) {
        saveResult(data);
    },
    onChange: saveResult,
    onFinish: saveResult
});