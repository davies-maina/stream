@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                   <form action="">
                       <div class="form-group">
                     <label for=""></label>
                     <input type="text"
                         class="form-control form-control-sm" name="search" id="" aria-describedby="helpId" placeholder="search videos / channels">
                     <small id="helpId" class="form-text text-muted">Search videos and channels across site</small>
                   </div>
                   </form>
                </div>
            </div>

            <div class="card border-primary mt-4">
              
              @if ($channels->count()===0)
                  <p>No channel results found</p>
              @else
                  <div class="card-body">
                <h4 class="card-title">Channel results</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            
                            <th>Image</th>
                            <th></th>
                            
                        </tr>
                    </thead>
                    <tbody>
                         @foreach ($channels as $channel)
                        <tr>
                           
                                
                                
                            <td>{{$channel->name}}</td>
                            @if ($channel->image())
                                <td>
                                <img src="{{$channel->image()}}" alt="channel image">
                            </td>
                            @else
                                <td>
                               no image set
                            </td>
                            @endif
                            <td>
                            <a href="{{route('channels.show',$channel->id)}}" class="btn btn-sm btn-info">View</a>
                            </td>
                           
                            
                             </tr>
                             @endforeach
                    </tbody>
                </table>
                <div class="row justify-content-center">
                    {{$channels->appends(request()->query())->links()}}
                </div>
              </div>
              @endif
            </div>

            @if ($videos->count()===0)
                <p>No video results</p>
            @else
              <div class="card-body">
                <h4 class="card-title">Video results</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            
                            <th>Image</th>
                            <th></th>
                            
                        </tr>
                    </thead>
                    <tbody>
                         @foreach ($videos as $video)
                        <tr>
                           
                                
                                
                            <td>{{$video->title}}</td>
                            
                                <td>
                                <img src="{{$video->thumbnail}}" width="50px" height="50px" alt="video image">
                            </td>
                            
                            <td>
                            <a href="{{route('showvideo',$video->id)}}" class="btn btn-sm btn-info">View</a>
                            </td>
                           
                            
                             </tr>
                             @endforeach
                    </tbody>
                </table>
                <div class="row justify-content-center">
                    {{$videos->appends(request()->query())->links()}}
                </div>
              </div>  
            @endif
            
        </div>
        
       
   
    
</div>
@endsection





