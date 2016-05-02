@extends('layout')

@section('content')
    <?php if(session('success')) :?>
    <h4 style="color: red">Successfully Logged Out!</h4>
    <?php endif ?>
    @if($errors->any())
        <h4 style="color: red">{{$errors->first()}}</h4>
    @endif

    <input id="pac-input" class="controls" type="text"
           placeholder="Enter a location">
    <div id="map">

    </div>
    <script>
        var map;
        function initMap() {

            styles=[
                {
                    "featureType": "water",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#193341"
                        }
                    ]
                },
                {
                    "featureType": "landscape",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#2c5a71"
                        }
                    ]
                },
                {
                    "featureType": "road",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#29768a"
                        },
                        {
                            "lightness": -37
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#406d80"
                        }
                    ]
                },
                {
                    "featureType": "transit",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#406d80"
                        }
                    ]
                },
                {
                    "elementType": "labels.text.stroke",
                    "stylers": [
                        {
                            "visibility": "on"
                        },
                        {
                            "color": "#3e606f"
                        },
                        {
                            "weight": 2
                        },
                        {
                            "gamma": 0.84
                        }
                    ]
                },
                {
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#ffffff"
                        }
                    ]
                },
                {
                    "featureType": "administrative",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "weight": 0.6
                        },
                        {
                            "color": "#1a3541"
                        }
                    ]
                },
                {
                    "featureType": "poi.park",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#2c5a71"
                        }
                    ]
                }
            ];
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 34.0522, lng: -118.2437},
                zoom: 12
            });
            map.setOptions({styles: styles});
            var input = /** @type {!HTMLInputElement} */(
                    document.getElementById('pac-input'));

            var types = document.getElementById('type-selector');
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(types);

            var autocomplete = new google.maps.places.Autocomplete(input);
            autocomplete.bindTo('bounds', map);

            var infowindow = new google.maps.InfoWindow();
            var marker = new google.maps.Marker({
                map: map,
                anchorPoint: new google.maps.Point(0, -29)
            });



            autocomplete.addListener('place_changed', function() {
                infowindow.close();
                marker.setVisible(false);
                var place = autocomplete.getPlace();

                console.log('error');

                if (!place.geometry) {
                    window.alert("Autocomplete's returned place contains no geometry");
                    return;
                }

                // If the place has a geometry, then present it on a map.
                if (place.geometry.viewport) {
                    map.fitBounds(place.geometry.viewport);
                } else {
                    map.setCenter(place.geometry.location);
                    map.setZoom(17);  // Why 17? Because it looks good.
                }
                marker.setIcon(/** @type {google.maps.Icon} */({
                    url: place.icon,
                    size: new google.maps.Size(71, 71),
                    origin: new google.maps.Point(0, 0),
                    anchor: new google.maps.Point(17, 34),
                    scaledSize: new google.maps.Size(35, 35)
                }));
                marker.setPosition(place.geometry.location);
                marker.setVisible(true);

                var address = '';
                if (place.address_components) {
                    address = [
                        (place.address_components[0] && place.address_components[0].short_name || ''),
                        (place.address_components[1] && place.address_components[1].short_name || ''),
                        (place.address_components[2] && place.address_components[2].short_name || '')
                    ].join(' ');
                }

                var windowText= place.name + '</br>' + address + '<form method="GET" action="/results" accept-charset="UTF-8">' + '<br/>' +
                        '<input type="hidden" name="place_id" id="place_id" type="text">'+
                        '<input class="btn btn-success" type="submit" value="View Reviews!">' +
                        '</form>';
                console.log(place);
                infowindow.setContent(windowText);
                infowindow.open(map, marker);
                document.getElementById('place_id').value = place.place_id;
            });

        }




    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDXZZrMXM1-mzZHx3FjY54FVkyRI4xNk78&callback=initMap&libraries=places"></script>

@endsection

@section('title')
    ITP-405 Final Project
@endsection

@section('meta')
    <meta name="name" content="content">
@endsection

@section('header')
<h2>
    ITP-405 final
</h2>
@endsection