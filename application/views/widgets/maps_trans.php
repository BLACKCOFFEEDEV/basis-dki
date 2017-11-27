<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApHNWWzhT1JLH4rmcYR9SCjl1LO_yoMm0&libraries=places,drawing,geometry&.js"></script>

<script>
    var optLayer = {
            query: {
                select: 'Jakarta\'',
                where: ""
            },
            options: {
                styleId: 2,
                templateId: 2
            }
        },
        tableId = '1nglRHF_nexiAjSYOqjvSBD6iNQdMAq6i207HsKpR',
        ctaLayer = new google.maps.FusionTablesLayer(tableId, optLayer);

    var map = null;
    var geocoder = null;

    function initMap() {
        geocoder = new google.maps.Geocoder();
        map = new google.maps.Map(document.getElementById('mapid'), {
            center: {
                lat: -6.181908,
                lng: 106.828249
            },
            zoom: 14,
            disableDefaultUI: false,
            mapTypeId: google.maps.MapTypeId.SATELLITE,
            minZoom: 10,
            scaleControl: true,
            fullscreenControl: true,
            mapTypeControlOptions: {
                position: google.maps.ControlPosition.RIGHT_TOP
            },
            fullscreenControlOptions: {
                position: google.maps.ControlPosition.TOP_RIGHT
            }
        });
        ctaLayer.setMap(map);
        codeAddress();

        var fcheckesPanel = document.getElementById('findcheckes');
        map.controls[google.maps.ControlPosition.BOTTOM_CENTER].push(fcheckesPanel);

        var layerPanel = document.getElementById('checkboxes');
        map.controls[google.maps.ControlPosition.BOTTOM_CENTER].push(layerPanel);

        var printPanel = document.getElementById('printboxes');
        map.controls[google.maps.ControlPosition.TOP_RIGHT].push(printPanel);

        var rulerPanel = document.getElementById('rulerboxes');
        map.controls[google.maps.ControlPosition.TOP_RIGHT].push(rulerPanel);

        var findPanel = document.getElementById('findboxes');
        map.controls[google.maps.ControlPosition.LEFT_TOP].push(findPanel);
            
    }

    function codeAddress() {
        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-in');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
            searchBox.setBounds(map.getBounds());
        });

        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
            var places = searchBox.getPlaces();

            if (places.length == 0) {
                return;
            }

            // Clear out the old markers.
            markers.forEach(function(marker) {
                marker.setMap(null);
            });
            markers = [];

            // For each place, get the icon, name and location.
            var bounds = new google.maps.LatLngBounds();
            places.forEach(function(place) {
                if (!place.geometry) {
                    console.log("Returned place contains no geometry");
                    return;
                }
                var icon = {
                    url: 'https://png.icons8.com/marker/color/34/000000',
                    size: new google.maps.Size(71, 71),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(17, 34),
                    scaledSize: new google.maps.Size(25, 25)
                };

                // Create a marker for each place.
                markers.push(new google.maps.Marker({
                    map: map,
                    icon: icon,
                    title: place.name,
                    position: place.geometry.location
                }));

                if (place.geometry.viewport) {
                    // Only geocodes have viewport.
                    bounds.union(place.geometry.viewport);
                } else {
                    bounds.extend(place.geometry.location);
                }
            });
            map.fitBounds(bounds);
        });
    };
    google.maps.event.addDomListener(window, 'load', initMap);

    function resetMap() {
        google.maps.event.addDomListener(document.getElementById("clear_it"), 'click', function() {

        });


    };

    function showhideFindForm() {
        if (document.getElementById('findform').checked == true) {
            document.getElementById('findboxes').style.display = 'block';

        } else {
            document.getElementById('findboxes').style.display = 'none';
        }
    };

    function changeLayer(tableidselections) {

        if (tableidselections == '1nglRHF_nexiAjSYOqjvSBD6iNQdMAq6i207HsKpR') {
            if (document.getElementById("layer").checked == true) {
                if (ctaLayer.getMap() == null) {
                    ctaLayer.setMap(map);
                }
            }

            if (document.getElementById("layer").checked == false) {
                ctaLayer.setMap(null); /*layersetoff*/
            }

        }

    };

</script>
