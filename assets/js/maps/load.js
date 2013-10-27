$(document).ready(function() {

	$.ajax({
		url: '/map/load_pubs',
		success: function(data) {
			display(data.center, data.macDoList);
		}
	});

	function display(center, macDoList) {
		$('#map').gmap3({
		  map:{
		    options: {
				center		   : center,
				zoom               : 14,
				mapTypeId          : google.maps.MapTypeId.ROADMAP,
				scrollwheel        : true,
				draggable          : true,
				mapTypeControl     : false,
				panControl         : false,
				zoomControl        : true,
				zoomControlOptions : {
					style   : google.maps.ZoomControlStyle.SMALL,
					position: google.maps.ControlPosition.LEFT_BOTTOM
			}
		     }
		  },
		  marker: {
		    values: macDoList,
		    cluster: {
		      radius:100,
		      // This style will be used for clusters with more than 0 markers
		      0: {
		        content: '<div class="cluster cluster-1">CLUSTER_COUNT</div>',
		        width: 53,
		        height: 52
		      },
		      // This style will be used for clusters with more than 20 markers
		      20: {
		        content: '<div class="cluster cluster-2">CLUSTER_COUNT</div>',
		        width: 56,
		        height: 55
		      },
		      // This style will be used for clusters with more than 50 markers
		      50: {
		        content: '<div class="cluster cluster-3">CLUSTER_COUNT</div>',
		        width: 66,
		        height: 65
		      },
		      events: {
		        click: function(cluster) {
		          var map = $(this).gmap3("get");
		          map.setCenter(cluster.main.getPosition());
		          map.setZoom(map.getZoom() + 1);
		        }
		      }
		    },
		    options: {
		      icon: new google.maps.MarkerImage('/assets/images/map-marker.png')
		    },
		    events:{
		      mouseover: function(marker, event, context){
		        $(this).gmap3(
		          {clear:"overlay"},
		          {
		          overlay:{
		            latLng: marker.getPosition(),
		            options:{
		              content:	"<div class=\"map-info top btn btn-lg btn-default\"  data-toggle=\"popover\" data-content=\"\"><div class=\"arrow\"></div><h3 class=\"popover-title\">"+context.data.name+" ("+context.data.rating+")</h3><div class=\"popover-content\"><p><div class=\"star-rating\"><a class=\"rated\" href=\"/rate/pub/"+context.data.id+"/1\"><a class=\"rated\" href=\"/rate/pub/"+context.data.id+"/2\"><a class=\"rated\" href=\"/rate/pub/"+context.data.id+"/3\"><a href=\"/rate/pub/"+context.data.id+"/4\"><a href=\"/rate/pub/"+context.data.id+"/5\"></a></a></a></a></a></div></p></div></div>",
		              offset: {
		                x:-100,
		                y:-175
		              }
		            }
		          }
		        });
		      },
		      mouseout: function(){
		        $(this).gmap3({clear:"overlay"});
		      }
		    }
		  }
		});

      }

});
