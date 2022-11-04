const cate = JSON.parse(document.querySelector('.chart_cate').dataset.chart);
const data_cate = JSON.parse(document.querySelector('.chart_cate').dataset.number);
var ctx = document.getElementById("myChart").getContext('2d');
var myChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: cate,
    datasets: [{
      label: '',
      data: data_cate,
      backgroundColor: [
        'rgba(34, 197, 94, 0.9)',
        'rgba(59,130,246, 0.9)',
        'rgba(239,78,94,0.9)',
        'rgba(249,115,22, 0.9)',
      ],
      borderColor: [
        'rgba(34,197,97,1)',
        'rgba(59,130,246,1)',
        'rgba(239,78,94,1)',
        'rgba(249,115,22,1)',
      ],
      borderWidth: 1
    }]
  },
  options: {
    scales: {
      yAxes: [{
        ticks: {
          beginAtZero: true
        }
      }]
    }
  }
});