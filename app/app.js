$(document).ready(function(){
	$.ajax({
		url: "data.php",
		method: "GET",
		dataType: 'json',
		success: function(data) {
			console.log(data);
			var player = [], score = [];

			for(var i in data) {;
		      score.push(data[i].Sample_19);
			}
			for(var x in data) {
					player.push(data[x].Month);
			}
			var chartdata = {
				labels: player,
				datasets : [
					{
						label: 'Yearly Income ('+new Date().getFullYear()+')',
						// backgroundColor: 'rgba(200, 200, 200, 0.75)',
						// borderColor: 'rgba(200, 200, 200, 0.75)',
						// hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
						// hoverBorderColor: 'rgba(200, 200, 200, 1)',
						backgroundColor: 'blue',
						borderColor: 'rgba(200, 200, 200, 0.75)',
						hoverBackgroundColor: 'red',
						hoverBorderColor: 'rgba(200, 200, 200, 1)',
						data: score
					}
				]
			};

			var ctx = $("#myChart");

			var barGraph = new Chart(ctx, {
				type: 'line',
				data: chartdata,
				options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        },
         tooltips: {
        mode: 'label',
        callbacks: {
            label: function (tooltipItems, data) {
                return '₦' + tooltipItems.yLabel;
            }
        }
    }
    }
			});
		},
		error: function(data) {
			console.log(data);
		},

	});
});