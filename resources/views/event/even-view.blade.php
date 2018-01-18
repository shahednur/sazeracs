@extends('layout.master')

@section('content')
    <div class="photo">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="card mb-3">
                    <div id="event-map">
                    </div>
                    <div class="card-body">
                        <h3 class="card-title event-title">{{$event->title}}</h3>
                        <div class="col-md-6">
                            <small class="add">Event will held:&nbsp;&nbsp;&nbsp;<i class="fa fa-map-marker"></i>&nbsp;&nbsp; {{$event->address}}</small><br>
                            <small class="add">Event Start date:&nbsp;&nbsp;&nbsp;<i class="fa fa-calendar-check-o"></i>&nbsp;&nbsp;{{$event->start_date}}</small><br>
                            <small class="add">Event End date:&nbsp;&nbsp;&nbsp;<i class="fa fa-calendar-check-o"></i>&nbsp;&nbsp;{{$event->end_date}}</small><br>
                            <p class="card-text add">Event Created by:&nbsp;&nbsp;&nbsp;<small class="text-muted">{{$event->creator->name}}</small></p>
                            <hr>
                            <div class="col-md-3"><i class="fa fa-facebook fa-2x"></i></div>
                            <div class="col-md-3"><i class="fa fa-twitter fa-2x"></i></div>
                            <div class="col-md-3"><i class="fa fa-youtube fa-2x"></i></div>
                            <div class="col-md-3"><i class="fa fa-google fa-2x"></i></div>
                        </div>
                        <div class="col-md-6">
                            <h4>Event Description</h4>
                            <p class="card-text event-body">{!! $event->description !!}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card" style="width: 40rem;">
                    <div class="card-header">
                        Upcoming Events
                    </div>
                    <ul class="list-group list-group-flush">
                        @foreach($upcomingEvents as $upcoming)
                        <li class="list-group-item"><a href="{{route('event-view',$upcoming->id)}}">{{$upcoming->title}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@section('footer-script')
    <script type="text/javascript" >
        function initMap() {

            // Create a new StyledMapType object, passing it an array of styles,
            // and the name to be displayed on the map type control.
            var styledMapType = new google.maps.StyledMapType(
                [
                    {elementType: 'geometry', stylers: [{color: '#ebe3cd'}]},
                    {elementType: 'labels.text.fill', stylers: [{color: '#523735'}]},
                    {elementType: 'labels.text.stroke', stylers: [{color: '#f5f1e6'}]},
                    {
                        featureType: 'administrative',
                        elementType: 'geometry.stroke',
                        stylers: [{color: '#c9b2a6'}]
                    },
                    {
                        featureType: 'administrative.land_parcel',
                        elementType: 'geometry.stroke',
                        stylers: [{color: '#dcd2be'}]
                    },
                    {
                        featureType: 'administrative.land_parcel',
                        elementType: 'labels.text.fill',
                        stylers: [{color: '#ae9e90'}]
                    },
                    {
                        featureType: 'landscape.natural',
                        elementType: 'geometry',
                        stylers: [{color: '#dfd2ae'}]
                    },
                    {
                        featureType: 'poi',
                        elementType: 'geometry',
                        stylers: [{color: '#dfd2ae'}]
                    },
                    {
                        featureType: 'poi',
                        elementType: 'labels.text.fill',
                        stylers: [{color: '#93817c'}]
                    },
                    {
                        featureType: 'poi.park',
                        elementType: 'geometry.fill',
                        stylers: [{color: '#a5b076'}]
                    },
                    {
                        featureType: 'poi.park',
                        elementType: 'labels.text.fill',
                        stylers: [{color: '#447530'}]
                    },
                    {
                        featureType: 'road',
                        elementType: 'geometry',
                        stylers: [{color: '#f5f1e6'}]
                    },
                    {
                        featureType: 'road.arterial',
                        elementType: 'geometry',
                        stylers: [{color: '#fdfcf8'}]
                    },
                    {
                        featureType: 'road.highway',
                        elementType: 'geometry',
                        stylers: [{color: '#f8c967'}]
                    },
                    {
                        featureType: 'road.highway',
                        elementType: 'geometry.stroke',
                        stylers: [{color: '#e9bc62'}]
                    },
                    {
                        featureType: 'road.highway.controlled_access',
                        elementType: 'geometry',
                        stylers: [{color: '#e98d58'}]
                    },
                    {
                        featureType: 'road.highway.controlled_access',
                        elementType: 'geometry.stroke',
                        stylers: [{color: '#db8555'}]
                    },
                    {
                        featureType: 'road.local',
                        elementType: 'labels.text.fill',
                        stylers: [{color: '#806b63'}]
                    },
                    {
                        featureType: 'transit.line',
                        elementType: 'geometry',
                        stylers: [{color: '#dfd2ae'}]
                    },
                    {
                        featureType: 'transit.line',
                        elementType: 'labels.text.fill',
                        stylers: [{color: '#8f7d77'}]
                    },
                    {
                        featureType: 'transit.line',
                        elementType: 'labels.text.stroke',
                        stylers: [{color: '#ebe3cd'}]
                    },
                    {
                        featureType: 'transit.station',
                        elementType: 'geometry',
                        stylers: [{color: '#dfd2ae'}]
                    },
                    {
                        featureType: 'water',
                        elementType: 'geometry.fill',
                        stylers: [{color: '#b9d3c2'}]
                    },
                    {
                        featureType: 'water',
                        elementType: 'labels.text.fill',
                        stylers: [{color: '#92998d'}]
                    }
                ],
                {name: 'Styled Map'});

            // Create a map object, and include the MapTypeId to add
            // to the map type control.
            var map = new google.maps.Map(document.getElementById('event-map'), {
                center: {lat: {{$event->lat}}, lng: {{$event->long}}},
                zoom: 9,
                mapTypeControlOptions: {
                    mapTypeIds: ['roadmap', 'satellite', 'hybrid', 'terrain',
                        'styled_map']
                }
            });

            //Associate the styled map with the MapTypeId and set it to display.
            map.mapTypes.set('styled_map', styledMapType);
            map.setMapTypeId('styled_map');
        }


    </script>
    <script async defer type="text/javascript"  src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAP_API_KEY')}}&callback=initMap"></script>
@endsection

@section('header-style')
    <style>
        #event-map{
            width:100%;
            height:400px;
        }
    </style>
@endsection