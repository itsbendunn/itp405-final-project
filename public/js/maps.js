//var map;
//function initMap() {
//    map = new google.maps.Map(document.getElementById('map'), {
//        center: {lat: -34.397, lng: 150.644},
//        zoom: 8
//    });
//}


//var center;
//var map;
//var infoWindow;
//var infoWindowHolder;
//var geocoder;
//var directionsDisplay;
//var directionsService;
//
//
//
//function initMap(){
//    styles=[
//        {
//            "featureType": "water",
//            "elementType": "geometry",
//            "stylers": [
//                {
//                    "color": "#193341"
//                }
//            ]
//        },
//        {
//            "featureType": "landscape",
//            "elementType": "geometry",
//            "stylers": [
//                {
//                    "color": "#2c5a71"
//                }
//            ]
//        },
//        {
//            "featureType": "road",
//            "elementType": "geometry",
//            "stylers": [
//                {
//                    "color": "#29768a"
//                },
//                {
//                    "lightness": -37
//                }
//            ]
//        },
//        {
//            "featureType": "poi",
//            "elementType": "geometry",
//            "stylers": [
//                {
//                    "color": "#406d80"
//                }
//            ]
//        },
//        {
//            "featureType": "transit",
//            "elementType": "geometry",
//            "stylers": [
//                {
//                    "color": "#406d80"
//                }
//            ]
//        },
//        {
//            "elementType": "labels.text.stroke",
//            "stylers": [
//                {
//                    "visibility": "on"
//                },
//                {
//                    "color": "#3e606f"
//                },
//                {
//                    "weight": 2
//                },
//                {
//                    "gamma": 0.84
//                }
//            ]
//        },
//        {
//            "elementType": "labels.text.fill",
//            "stylers": [
//                {
//                    "color": "#ffffff"
//                }
//            ]
//        },
//        {
//            "featureType": "administrative",
//            "elementType": "geometry",
//            "stylers": [
//                {
//                    "weight": 0.6
//                },
//                {
//                    "color": "#1a3541"
//                }
//            ]
//        },
//        {
//            "elementType": "labels.icon",
//            "stylers": [
//                {
//                    "visibility": "off"
//                }
//            ]
//        },
//        {
//            "featureType": "poi.park",
//            "elementType": "geometry",
//            "stylers": [
//                {
//                    "color": "#2c5a71"
//                }
//            ]
//        }
//    ];
//
//    show("loader", false);
//    center = new google.maps.LatLng(34.0500, -118.2500);
//    map = new google.maps.Map(document.getElementById('map'),{
//        center: center,
//        zoom:11
//    });
//    map.setOptions({styles: styles});
//    infoWindowHolder = [];
//    geocoder = new google.maps.Geocoder;
//    directionsDisplay = new google.maps.DirectionsRenderer;
//    directionsService = new google.maps.DirectionsService;
//    directionsDisplay.setMap(map);
//    map.setCenter(pos);
//}
