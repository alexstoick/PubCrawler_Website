$(document).ready(function(){

	$("#generate_random_crawl").click(function(event) {
		event.preventDefault();
		$.ajax({
			url: '/map/generate',
			success:function(data){

				var output = new Array();
				for (var i=0; i<data.length; i++) {
					output[i] = new Array(data[i][1], data[i][2]);
				}

				$('#map').gmap3({
					polyline:{
						options:{
							strokeColor: "#d9534f",
							strokeOpacity: 0.5,
							strokeWeight: 15,
							path: output
						}
					}
				});
			}
		});				
	});
});
