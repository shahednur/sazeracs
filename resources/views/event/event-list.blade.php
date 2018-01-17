@extends('layout.master')

@section('content')
    <div class="abc">
<div class="container">
    <!-- Example row of columns -->
    <div class="row">
        <div class="col-md-4">
            <div class="cal">
                <div class="cal-heading">Upcoming Events</div>
                @foreach($upcomingEvents as $upcoming)
                    <div class="cal-event">
                        <div class="cal-event-tile">
                            <div class="cal-event-tile-date">5</div>
                            <div class="cal-event-tile-month">Mar</div>
                        </div>
                        <div class="cal-event-desc">
                            <div class="cal-event-title">
                                <a href="{{route('event-view',$upcoming->id)}}"> {{$upcoming->title}}</a>
                            </div>
                            <div class="cal-event-time">
                                <icon><i class="fa fa-clock-o"></i></icon>12.15pm
                            </div>
                            <div class="cal-event-location">
                                <icon><i class="fa fa-map-marker"></i></icon>
                                <div class="cal-event-location-content">
                                    {{$upcoming->address}}
                                </div>
                            </div>
                            <a class="cal-event-map" href="{{route('event-view',$upcoming->id)}}"> View Map</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="col-md-4">
            <div class="cal">
                <div class="cal-heading">Past Events</div>
                @if(count($pastEvents) == 0)
                    <h4>No past event found</h4>
                    @else
                    @foreach($pastEvents as $past)
                        <div class="cal-event">
                            <div class="cal-event-tile">
                                <div class="cal-event-tile-date">5</div>
                                <div class="cal-event-tile-month">Mar</div>
                            </div>
                            <div class="cal-event-desc">
                                <div class="cal-event-title">
                                    <a href="{{route('event-view',$past->id)}}">{{$past->title}}</a>
                                </div>
                                <div class="cal-event-time">
                                    <icon><i class="fa fa-clock-o"></i></icon>10.5am
                                </div>
                                <div class="cal-event-location">
                                    <icon><i class="fa fa-map-marker"></i></icon>
                                    <div class="cal-event-location-content">
                                        {{$past->address}}
                                    </div>
                                </div>
                                <a class="cal-event-map" href="{{route('event-view',$past->id)}}"> View Map</a>
                            </div>
                        </div>
                    @endforeach
                    @endif
            </div>
        </div>
        <div class="col-md-4">
            <h3>Events</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi cum cumque, delectus dicta ea, explicabo iusto minus, neque nostrum porro tempore totam velit voluptatum. Exercitationem impedit ipsam magni praesentium voluptas.</p>
        </div>
    </div>

    <hr>

</div> <!-- /container -->
    </div>
@endsection