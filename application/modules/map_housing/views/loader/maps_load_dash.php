<?php //echo $map['html']; ?>
    <div id=maps_container>
        <div id="map-canvas" style=" box-shadow: 8px 8px 8px #888888;"></div>
    </div>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyApHNWWzhT1JLH4rmcYR9SCjl1LO_yoMm0"></script>
    <script>
        (function(window, google) {
            var Mapster = (function() {
                function Mapster(element, opts) {
                    this.gMap = new google.maps.Map(element, opts);
                }
                Mapster.prototype = {


                };

                return Mapster;
            }());

            Mapster.create = function(element, opts) {
                return new Mapster(element, opts);
            };

            window.Mapster = Mapster;

        }(window, google));

    </script>

    <script src="<?php echo base_url(); ?>assets/maps/js/map-options.js"></script>
    <script src="<?php echo base_url(); ?>assets/maps/js/script.js"></script>
