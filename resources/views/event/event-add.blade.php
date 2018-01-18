@extends('layout.master')
@section('footer-script')
    <script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector:'textarea',
            plugins: "link"
        });
    </script>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <form action="{{route('event-save')}}" method="post" style="width:100%;">
                {{csrf_field()}}
            <div class="col-md-7">
                <div class="card w-100" style="padding:20px;">
                    <h4 class="card-title">Add New Event</h4>
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" name="title" class="form-control"  aria-describedby="emailHelp" placeholder="Enter title">
                        <small id="emailHelp" class="form-text text-muted">{{$errors->first('title')}}</small>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input type="text" name="address" class="form-control"  aria-describedby="emailHelp" placeholder="Enter address">
                        <small id="emailHelp" class="form-text text-muted">{{$errors->first('address')}}</small>
                    </div>
                    <div class="form-group">
                        <label for="start date">Start Date</label>
                        <input type="date" name="start_date" class="form-control"  aria-describedby="emailHelp" placeholder="Enter start date">
                        <small id="emailHelp" class="form-text text-muted">{{$errors->first('start_date')}}</small>
                    </div>
                    <div class="form-group">
                        <label for="end date">End Date</label>
                        <input type="date" name="end_date" class="form-control"  aria-describedby="emailHelp" placeholder="Enter end date">
                        <small id="emailHelp" class="form-text text-muted">{{$errors->first('end_date')}}</small>
                    </div>
                    <div class="form-group">
                        <label for="description">Event Description</label>
                        <textarea id="description" name="description" class="form-control" cols="30" rows="10"></textarea>
                        <small id="description" class="form-text text-muted">{{$errors->first('description')}}</small>
                    </div>
                    <button type="submit" class="btn btn-info"><i class="fa fa-save"></i>&nbsp;&nbsp;Save</button>
                </div>
            </div>
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">
                        Select the location
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <span class="error">{{$errors->first('lat')}}</span>
                            <span class="error">{{$errors->first('long')}}</span>
                            <event-location></event-location>
                        </div>
                    </div>
                </div>
            </div>
            </form>
        </div>
    </div>
@endsection

