<input id="pac-input" class="controls" type="text" placeholder="Search Box">
<div id=maps_container>
    <div id="map-canvas" style=" box-shadow: 5px 5px 5px #888888;"></div>
</div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApHNWWzhT1JLH4rmcYR9SCjl1LO_yoMm0&libraries=places,drawing,geometry&.js&callback=initMap" async defer></script>
<script>
    var map = null;
    var geocoder = null;
    var mark = [];

    function initMap() {

        //used to store polygon path
        var result;
        var infoWindow;
        var poly;
        var i;
        geocoder = new google.maps.Geocoder();
        //set map to upstate south carolina
        var mapOptions = {
            center: new google.maps.LatLng(-6.181908, 106.828249),
            zoom: 11,
            disableDefaultUI: false,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            minZoom: 11,
            scaleControl: true,
            mapTypeControlOptions: {
                position: google.maps.ControlPosition.LEFT_BOTTOM
            }
        };

        // clear any input text
        sqmeters.value = "";
        /*sqmiles.value = "";
        sqfeet.value = "";*/
        acres.value = "";
        geoMet.value = "";

        //setup map
        map = new google.maps.Map(document.getElementById('map-canvas'),
            mapOptions);

        codeAddress();

        //used to draw polygon on map
        var shapes = [],
            selected_shape = 'POLYGON',
            drawingManager = new google.maps.drawing.DrawingManager({
                //drawingMode: google.maps.drawing.OverlayType.MARKER,
                drawingControl: true,
                drawingControlOptions: {
                    position: google.maps.ControlPosition.LEFT_TOP,
                    drawingModes: [
                        google.maps.drawing.OverlayType.POLYGON
                    ]
                },
                polygonOptions: {
                    fillOpacity: 0.5,
                    strokeWeight: 1,
                    editable: true
                }
            }),
            byId = function(s) {
                return document.getElementById(s)
            },
            setSelection = function(shape) {
                selected_shape = shape;

                selected_shape.set((selected_shape.type ===
                    google.maps.drawing.OverlayType.MARKER
                ) ? 'draggable' : 'editable', true);

            };

        drawingManager.setMap(map);

        //when polygon closes the event grabs the polygon path and calculates the area
        google.maps.event.addListener(drawingManager, 'polygoncomplete', function(polygon) {
            result = google.maps.geometry.spherical.computeArea(polygon.getPath());
            //displays the area in textboxes
            setResults();
            var polygonBounds = [];
            var bounds = new google.maps.LatLngBounds();
            polygonBounds = polygon.getPath();

            //adds event for when editing polygon
            google.maps.event.addListener(polygon.getPath(), 'set_at', function() {
                // complete functions
                result = google.maps.geometry.spherical.computeArea(polygon.getPath());
                setResults();
            });

            //adds event for when inserting a new point when editing
            google.maps.event.addListener(polygon.getPath(), 'insert_at', function() {
                // complete functions
                result = google.maps.geometry.spherical.computeArea(polygon.getPath());
                setResults();
            });

            //adds event for when polygon is clicked
            google.maps.event.addListener(polygon, 'click', function() {
                //clear polygon and blueraw
                this.setMap(null);
                // Construct the polygon

                poly = new google.maps.Polygon({
                    paths: polygonBounds,
                    strokeColor: "#005df4",
                    strokeOpacity: 0.8,
                    strokeWeight: 2,
                    fillColor: "#005df4",
                    fillOpacity: 0.35,
                    editable: false,
                    clickable: true,
                    draggable: false
                });

                poly.setMap(map);

                var data = IO.IN(shapes, false);
                byId('geoMet').value = JSON.stringify(data);


                var marker = new google.maps.Marker({
                    position: bounds.getCenter(),
                    map: map
                });
            });
            google.maps.event.addDomListener(byId('clear_shapes'), 'click', function() {
                for (var i = 0; i < shapes.length; ++i) {
                    shapes[i].setMap(null);
                }
                shapes = [];
                drawingManager.setMap(map);
                poly.setMap(null);

            });
            drawingManager.setMap(null);

        });

        google.maps.event.addListener(drawingManager, 'overlaycomplete', function(event) {
            var shape = event.overlay
            shape.type = event.type
            google.maps.event.addListener(shape, 'click', function() {
                setSelection(this);
            });
            setSelection(shape);
            shapes.push(shape);
        });

        //cconverts area to dimensions and displays
        function setResults() {
            sqmeters.value = formatNumber(result);
            /*sqmiles.value = formatNumber(result * 3.86102e-7);
            sqfeet.value = formatNumber(result * 10.7639);*/
            acres.value = formatNumber(result * 0.000247105);
        }

        function formatNumber(num) {
            var p = num.toFixed(2).split(".");
            return p[0].split("").reverse().reduce(function(acc, num, i, orig) {
                return num + (i && !(i % 3) ? "." : "") + acc;
            }, "") + "," + p[1];
        }

        var IO = {
            //returns array with storable google.maps.Overlay-definitions
            IN: function(arr, //array with google.maps.Overlays
                encoded //boolean indicating whether pathes should be stored encoded
            ) {
                var shapes = [],
                    goo = google.maps,
                    shape, tmp;

                for (var i = 0; i < arr.length; i++) {
                    shape = arr[i];
                    tmp = {
                        type: this.t_(shape.type),
                        id: shape.id || 1
                    };

                    switch (tmp.type) {
                        case 'CIRCLE':
                            tmp.radius = shape.getRadius();
                            tmp.geometry = this.p_(shape.getCenter());
                            break;
                        case 'MARKER':
                            tmp.geometry = this.p_(shape.getPosition());
                            break;
                        case 'RECTANGLE':
                            tmp.geometry = this.b_(shape.getBounds());
                            break;
                        case 'POLYLINE':
                            tmp.geometry = this.l_(shape.getPath(), encoded);
                            break;
                        case 'POLYGON':
                            tmp.geometry = this.m_(shape.getPaths(), encoded);

                            break;
                    }
                    shapes.push(tmp);
                }

                return shapes;
            },
            //returns array with google.maps.Overlays
            OUT: function(arr, //array containg the stored shape-definitions
                map //map where to draw the shapes
            ) {
                var shapes = [],
                    goo = google.maps,
                    map = map || 1,
                    shape, tmp;

                for (var i = 0; i < arr.length; i++) {
                    shape = arr[i];

                    switch (shape.type) {
                        case 'CIRCLE':
                            tmp = new goo.Circle({
                                radius: Number(shape.radius),
                                center: this.pp_.apply(this, shape.geometry)
                            });
                            break;
                        case 'MARKER':
                            tmp = new goo.Marker({
                                position: this.pp_.apply(this, shape.geometry)
                            });
                            break;
                        case 'RECTANGLE':
                            tmp = new goo.Rectangle({
                                bounds: this.bb_.apply(this, shape.geometry)
                            });
                            break;
                        case 'POLYLINE':
                            tmp = new goo.Polyline({
                                path: this.ll_(shape.geometry)
                            });
                            break;
                        case 'POLYGON':
                            tmp = new goo.Polygon({
                                paths: this.mm_(shape.geometry)
                            });

                            break;
                    }
                    tmp.setValues({
                        map: map,
                        id: shape.id
                    })
                    shapes.push(tmp);
                }
                return shapes;
            },
            l_: function(path, e) {
                path = (path.getArray) ? path.getArray() : path;
                if (e) {
                    return google.maps.geometry.encoding.encodePath(path);
                } else {
                    var r = [];
                    for (var i = 0; i < path.length; ++i) {
                        r.push(this.p_(path[i]));
                    }
                    return r;
                }
            },
            ll_: function(path) {
                if (typeof path === 'string') {
                    return google.maps.geometry.encoding.decodePath(path);
                } else {
                    var r = [];
                    for (var i = 0; i < path.length; ++i) {
                        r.push(this.pp_.apply(this, path[i]));
                    }
                    return r;
                }
            },

            m_: function(paths, e) {
                var r = [];
                paths = (paths.getArray) ? paths.getArray() : paths;
                for (var i = 0; i < paths.length; ++i) {
                    r.push(this.l_(paths[i], e));
                }
                return r;
            },
            mm_: function(paths) {
                var r = [];
                for (var i = 0; i < paths.length; ++i) {
                    r.push(this.ll_.call(this, paths[i]));

                }
                return r;
            },
            p_: function(latLng) {
                return ([latLng.lat(), latLng.lng()]);
            },
            pp_: function(lat, lng) {
                return new google.maps.LatLng(lat, lng);
            },
            b_: function(bounds) {
                return ([this.p_(bounds.getSouthWest()),
                    this.p_(bounds.getNorthEast())
                ]);
            },
            bb_: function(sw, ne) {
                return new google.maps.LatLngBounds(this.pp_.apply(this, sw),
                    this.pp_.apply(this, ne));
            },
            t_: function(s) {
                var t = ['CIRCLE', 'MARKER', 'RECTANGLE', 'POLYLINE', 'POLYGON'];
                for (var i = 0; i < t.length; ++i) {
                    if (s === google.maps.drawing.OverlayType[t[i]]) {
                        return t[i];
                    }
                }
            }

        }

    }

    function codeAddress() {
        // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
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
    }

</script>
