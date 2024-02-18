$(document).ready(function() {
	
	$("tr:even").css("background-color","#f0f0f0");
	
	$.ajax({
		url: "http://localhost/emr/data.php",
		type: "GET",
		success: function(data) {
			console.log(data);
			var player = [];
			var score = [];
			
			for(var i in data) {
				player.push("Player " + data[i].player_id);
				score.push(data[i].score);
			}
			
			var chartdata = {
				labels: player,
				datasets: [
					{
						label: 'Player Score',
						backgroundColor: 'rgba(100, 200, 200, 0.15)',
						hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
						borderColor: 'rgba(100, 150, 200, 0.75)',
						hoverBorderColor: 'rgba(200, 200, 200, 1)',
						data: score
					}
				]
			};
			
			var ctx = $("#mycanvas");
			
			var Graph = new Chart(ctx, {
				type: 'line',
				data: chartdata
			});
			
			
		},
		error: function(data) {
			console.log(data);
		}
	});
	
});