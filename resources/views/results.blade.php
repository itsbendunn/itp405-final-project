@extends('layout')

@section('content')


<div class="col-md-6">
    <h4>
        Result
    </h4>
    <p>
        Name: {{$result->result->name}}
    </p>
    <p>
        Location: {{$result->result->formatted_address}}
    </p>
    @if($counter > 0)
        <p>
            Oh no! Looks like there were {{$counter}} instances
        </p>
    @endif
    @if($counter == 0)
        <p>
            Yay! There are {{$counter}} incidents reported
        </p>
    @endif



    {!! Form::open(['url' => "/create/{$result->result->place_id}", 'method' => 'get']) !!}
    {!!  Form::hidden('name', "{$result->result->name}") !!}
    <br/>
    {!! Form::submit('Create Review', array('class'=>'btn btn-success')) !!}

    {!! Form::close() !!}

    <hr/>
    @foreach($result->result->reviews as $review)
        <p>
            Author: {{$review->author_name}}
        </p>
        <p>
            Rating: @if($review->rating == 1)
                    Definitely not
                    @endif
            @if($review->rating == 2)
                    I've had better
            @endif
            @if($review->rating == 3)
                    Meh. It's okay
            @endif
            @if($review->rating == 4)
                    Pretty good!
            @endif
            @if($review->rating == 5)
                    My new favorite place!
            @endif

        </p>
        <p>
            Review: {{$review->text}}
        </p>
        <hr>
    @endforeach
</div>
<div class="col-md-6">
        <div id="map">
    </div>
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
                map = new google.maps.Map(document.getElementById('map'), {
                    center: {lat: {{$result->result->geometry->location->lat}}, lng: {{$result->result->geometry->location->lng}}},
                    zoom: 18
                });
                map.setOptions({styles: styles});

                var infowindow = new google.maps.InfoWindow();
                var service = new google.maps.places.PlacesService(map);

                service.getDetails({
                    placeId: '{{$result->result->place_id}}'
                }, function(place, status) {
                    if (status === google.maps.places.PlacesServiceStatus.OK) {
                        var marker = new google.maps.Marker({
                            map: map,
                            position: place.geometry.location
                        });
                        google.maps.event.addListener(marker, 'click', function() {
                            infowindow.setContent('<div><strong>' + place.name + '</strong><br>' +
                                    'Place ID: ' + place.place_id + '<br>' +
                                    place.rating + '</div><br><input type="submit"> ' );
                            infowindow.open(map, this);
                        });
                    }
                });
            }
        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDXZZrMXM1-mzZHx3FjY54FVkyRI4xNk78&callback=initMap&libraries=places"></script>
@endsection