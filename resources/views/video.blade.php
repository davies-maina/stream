@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            @if ($video->canedit())
            <form action="{{route('updatevideodetails',$video->id)}}" method="POST"> 
                   @csrf
                   @method('put')
            @endif
                <div class="card-header">{{$video->title}}</div>

                <div class="card-body">
                <video-data videodata="{{asset(Storage::url('videos/'.$video->id.'/'.$video->id.'.m3u8'))}}"
                videoid="{{$video->id}}"></video-data>
                 <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h4 class="mt-3">
                                @if ($video->canedit())
                                    <input type="text" class="form-control" value="{{ $video->title }}" name="title">
                                @else
                                    {{ $video->title }}
                                @endif
                            </h4>
                            {{ $video->views }} {{ str_plural('view', $video->views) }}
                        </div>
                 </div>
                <votes :initialvotes="{{$video->votes}}" entityowner="{{$video->channel->user_id}}"
                entityid="{{$video->id}}"></votes>

                        <div>
                           @if ($video->canedit())
                               <div class="form-group">
                              
                            <textarea class="form-control" name="description" id="" rows="3">{{$video->description}}</textarea>
                            </div>
                            <div>
                                <button type="submit"  class="btn btn-primary">Update video details</button>
                            </div>
                           @else
                              {{$video->description}} 
                           @endif
                        </div>

           

                        
            @if ($video->canedit())
                </form>
            @endif
                    </div>

                    <hr>

                    <div class="d-flex justify-content-between align-items-center mt-5">
                        <div class="media">
                            <img class="rounded-circle" src="https://picsum.photos/id/42/200/200" width="50" height="50" class="mr-3" alt="...">
                            <div class="media-body ml-2">
                                <h5 class="mt-0 mb-0">
                                    {{ $video->channel->name }}
                                </h5>
                                <span class="small">Published on {{ $video->created_at->toFormattedDateString() }}</span>
                            </div>
                        </div>

                        <subscription-button :initialsubscriptions="{{$video->channel->subscriptions}}" :channel="{{$video->channel}}"></subscription-button>
                    </div>
                <comments :video="{{$video}}"></comments>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    .vjs-default-skin {
            width: 100%;
        }
        .thumbs-up, .thumbs-down {
            width: 20px;
            height: 20px;
            cursor: pointer;
            fill: currentColor;
        }
        .thumbs-down-active, .thumbs-up-active {
            color: #3EA6FF;
        }
        .thumbs-down {
            margin-left: 1rem;
        }
         .w-full {
            width: 100% !important;
        }
        .w-80 {
            width: 80% !important;
        }
        .w-full {
            width: 100% !important;
        }
        .w-80 {
            width: 80% !important;
        }
</style>
    <script>
        window.currentvideo='{{$video->id}}';
    </script>

