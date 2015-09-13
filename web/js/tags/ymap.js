riot.tag('ymap', '<div id="ymap"></div> <script src="https://api-maps.yandex.ru/2.0-stable/?load=package.full&lang=en-US" type="text/javascript"></script>', 'ymap div, [riot-tag="ymap"] div{ width: 640px; height: 480px; }', function(opts) {
		var mapReady = false;
		var containerId = 'ymap';
		var center = [lat,lon];
		var zoom = 14;
		
		if(typeof opts.mapid != 'undefined') {
			containerId += opts.mapid;
		}

		if(typeof opts.center != 'undefined') {
			center = opts.center.split(',');
		}

		if(typeof opts.zoom != 'undefined') {
			zoom = opts.zoom;
		}

		this.on('mount', function() {

			if(typeof opts.width != 'undefined') {
				foo = document.getElementById(containerId).style.width=opts.width;
			}

			if(typeof opts.height != 'undefined') {
				foo = document.getElementById(containerId).style.height=opts.height;
			}

			if (typeof ymaps !== 'undefined') {
				ymaps.ready(initMap);
			}
		})

		function initMap(){

		    myMap = new ymaps.Map (containerId, {
		        center: center, 
		        zoom: zoom
		    });

		}

	
});