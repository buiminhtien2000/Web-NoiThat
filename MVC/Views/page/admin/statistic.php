<div class="container">
    <canvas id="myChart"></canvas>
</div>
<script type="text/javascript">
function float2vnd(value){
  return value.toLocaleString('it-IT', {style : 'currency', currency : 'VND'});
}

function renderChart() {
    var ctx = document.getElementById("myChart").getContext('2d');
    var labels = ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7","Tháng 8","Tháng 9","Tháng 10","Tháng 11","Tháng 12"];
    var data = [[200000000, 140000000, 120000000, 150000000, 180000000, 190000000, 220000000,190000000, 100000000, 140000000, 14000000, 150000000],[190000000, 100000000, 140000000, 140000000, 150000000, 220000000, 240000000,200000000, 140000000, 120000000, 150000000, 180000000]]
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: labels,
            datasets: [
                {
                    label: 'Năm nay',
                    data: data[0],
                    borderColor: 'rgba(75, 192, 192, 1)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                },
                {
                    label: 'Năm ngoái',
                    data: data[1],
                    borderColor: 'rgba(192, 192, 192, 1)',
                    backgroundColor: 'rgba(192, 192, 192, 0.2)',
                }
            ]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                        callback: function (value, index, values) {
                            return float2vnd(value);
                        }
                    }
                }]
            },
        }
    });
}
$(document).ready(function (){
	$(function () {
	        renderChart();
	    }
	);
})
</script>