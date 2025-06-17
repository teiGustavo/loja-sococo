( function( $ ) {
	var isReveal = false;
	var WidgetElements_RevealHandler = function( $scope, $ ) {
		var elementSettings = getElementSettings( $scope );
		var rev1;
		var revealAction = function(){
			rev1 = new RevealFx(revealistance, {
				revealSettings : {
					bgcolor: elementSettings.reveal_bgcolor,
					direction: elementSettings.reveal_direction,
					duration: Number(elementSettings.reveal_speed.size)*100,
					delay: Number(elementSettings.reveal_delay.size)*100,
					onCover: function(contentEl, revealerEl) {
						contentEl.style.opacity = 1;
					}
				}

			});
			//alert(revealistance);

		}
		var runReveal = function(){
			rev1.reveal();
		}
		if(elementSettings.enabled_reveal){

			var revealId = '#reveal-'+$scope.data('id');
			var revealistance = document.querySelector(revealId);
			

			revealAction();

			/*var waypoint = new Waypoint({
			  element: revealistance,
			  offset: '100%',
			  handler: function(direction) {
			    runReveal();

			  }
			});*/
			var waypointOptions = {
				offset: '100%',
				triggerOnce: true
			};
			elementorFrontend.waypoint($(revealistance), runReveal, waypointOptions);

			/*var waypoint = new Waypoint({
			  element: document.getElementById('element-waypoint'),
			  handler: function(direction) {
			    notify(this.element.id + ' triggers at ' + this.triggerPoint)
			  },
			  offset: '75%'
			})*/

		}
	};

	// Make sure you run this code under Elementor..
	$( window ).on( 'elementor/frontend/init', function() {
		elementorFrontend.hooks.addAction( 'frontend/element_ready/global', WidgetElements_RevealHandler );
	} );
} )( jQuery );
