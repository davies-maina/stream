@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header">{{$video->title}}</div>

                <div class="card-body">
                <video-data videodata="{{asset(Storage::url('videos/'.$video->id.'/'.$video->id.'.m3u8'))}}"></video-data>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
