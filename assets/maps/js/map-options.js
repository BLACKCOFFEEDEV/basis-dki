(function(window, google, mapster){
    mapster.MAP_OPTIONS =  {
      center: {
        lat: -6.181908,
        lng: 106.828249
      },
        zoom: 11,
        disableDefaultUI:false,
        mapTypeId: google.maps.MapTypeId.ROADMAP,
        minZoom:10,
        mapTypeControlOptions:{
          position: google.maps.ControlPosition.TOP_CENTER  
        },
        zoomControlOptions:{
          position: google.maps.ControlPosition.LEFT_TOP  
        },
        streetViewControlOptions:{
            position: google.maps.ControlPosition.TOP_LEFT
        }
    };
   
}(window, google, window.Mapster || (window.Mapster = {})));