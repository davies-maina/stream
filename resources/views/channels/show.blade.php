@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
            <div class="card-header d-flex justify-content-lg-between">
                
                {{$channel->name}}

                @if ($channel->authU())
                     <a href={{route('channels.upload', $channel->id)}}>Upload videos</a>
                @endif

               
            
            </div>

                <div class="card-body">
                @if ($channel->authU())
                    <form method="POST" id="update-cform" action="{{route('channels.update', $channel->id)}}" enctype="multipart/form-data">
                @csrf

                @method('PATCH')
                @endif

                <div class="form-group row justify-content-center" onclick="document.getElementById('image').click()">
                    <div class="channel-avatar">
                        
                        @if ($channel->authU())
                            <div class="channel-avatar-overlay">

                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512"><defs><linearGradient id="linear-gradient" y1="222.62" x2="445.24" y2="222.62" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#fff"/><stop offset="1" stop-color="#d0d3d4"/></linearGradient><linearGradient id="linear-gradient-2" x1="11.13" y1="222.62" x2="434.11" y2="222.62" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#d0d3d4"/><stop offset="1" stop-color="#fff"/></linearGradient></defs><title>camera-other</title><g style="isolation:isolate"><g id="Layer_1" data-name="Layer 1"><g style="mix-blend-mode:multiply"><path d="M289.38,512C166.63,512,66.76,412.13,66.76,289.38S166.63,66.76,289.38,66.76,512,166.63,512,289.38,412.13,512,289.38,512Z" fill="#fff" opacity="0"/><path d="M286.2,508.69c-122.68,0-222.49-99.81-222.49-222.49S163.52,63.71,286.2,63.71,508.69,163.52,508.69,286.2,408.88,508.69,286.2,508.69Z" fill="#f9f9f9" opacity="0.05"/><path d="M283,505.38C160.41,505.38,60.67,405.63,60.67,283S160.41,60.67,283,60.67,505.38,160.41,505.38,283,405.63,505.38,283,505.38Z" fill="#f3f3f3" opacity="0.1"/><path d="M279.84,502.07c-122.53,0-222.22-99.69-222.22-222.22S157.31,57.62,279.84,57.62s222.22,99.69,222.22,222.22S402.37,502.07,279.84,502.07Z" fill="#ededee" opacity="0.14"/><path d="M276.66,498.75c-122.46,0-222.09-99.63-222.09-222.09S154.2,54.57,276.66,54.57,498.75,154.2,498.75,276.66,399.12,498.75,276.66,498.75Z" fill="#e7e7e8" opacity="0.19"/><path d="M273.48,495.44c-122.39,0-222-99.57-222-222s99.57-222,222-222,222,99.57,222,222S395.87,495.44,273.48,495.44Z" fill="#e1e1e2" opacity="0.24"/><path d="M270.31,492.13C148,492.13,48.48,392.62,48.48,270.31S148,48.48,270.31,48.48,492.13,148,492.13,270.31,392.62,492.13,270.31,492.13Z" fill="#dbdbdc" opacity="0.29"/><path d="M267.13,488.82c-122.24,0-221.69-99.45-221.69-221.69S144.88,45.43,267.13,45.43s221.69,99.45,221.69,221.69S389.37,488.82,267.13,488.82Z" fill="#d5d5d6" opacity="0.33"/><path d="M263.95,485.51c-122.17,0-221.56-99.39-221.56-221.56S141.78,42.39,263.95,42.39s221.56,99.39,221.56,221.56S386.11,485.51,263.95,485.51Z" fill="#cfcfd1" opacity="0.38"/><path d="M260.77,482.2c-122.1,0-221.43-99.33-221.43-221.43S138.67,39.34,260.77,39.34,482.2,138.67,482.2,260.77,382.86,482.2,260.77,482.2Z" fill="#c9c9cb" opacity="0.43"/><path d="M257.59,478.89c-122,0-221.3-99.27-221.3-221.3s99.27-221.3,221.3-221.3,221.3,99.27,221.3,221.3S379.61,478.89,257.59,478.89Z" fill="#c3c3c5" opacity="0.48"/><path d="M254.41,475.57c-122,0-221.16-99.21-221.16-221.16S132.46,33.25,254.41,33.25s221.16,99.21,221.16,221.16S376.36,475.57,254.41,475.57Z" fill="#bcbebf" opacity="0.52"/><path d="M251.23,472.26c-121.88,0-221-99.15-221-221s99.15-221,221-221,221,99.15,221,221S373.11,472.26,251.23,472.26Z" fill="#b6b8b9" opacity="0.57"/><path d="M248.05,469c-121.8,0-220.9-99.09-220.9-220.9s99.09-220.9,220.9-220.9S469,126.25,469,248.05,369.85,469,248.05,469Z" fill="#b0b2b3" opacity="0.62"/><path d="M244.87,465.64c-121.73,0-220.77-99-220.77-220.77s99-220.77,220.77-220.77,220.77,99,220.77,220.77S366.6,465.64,244.87,465.64Z" fill="#aaacae" opacity="0.67"/><path d="M241.69,462.33c-121.66,0-220.63-99-220.63-220.63S120,21.06,241.69,21.06s220.63,99,220.63,220.63S363.35,462.33,241.69,462.33Z" fill="#a4a6a8" opacity="0.71"/><path d="M238.52,459C116.93,459,18,360.1,18,238.52S116.93,18,238.52,18,459,116.93,459,238.52,360.1,459,238.52,459Z" fill="#9ea0a2" opacity="0.76"/><path d="M235.34,455.71C113.82,455.71,15,356.85,15,235.34S113.82,15,235.34,15s220.37,98.86,220.37,220.37S356.85,455.71,235.34,455.71Z" fill="#989a9c" opacity="0.81"/><path d="M232.16,452.39c-121.44,0-220.24-98.8-220.24-220.24S110.72,11.92,232.16,11.92s220.24,98.8,220.24,220.24S353.59,452.39,232.16,452.39Z" fill="#929496" opacity="0.86"/><path d="M229,449.08c-121.37,0-220.1-98.74-220.1-220.1S107.61,8.88,229,8.88s220.1,98.74,220.1,220.1S350.34,449.08,229,449.08Z" fill="#8c8e91" opacity="0.9"/><path d="M225.8,445.77c-121.29,0-220-98.68-220-220s98.68-220,220-220,220,98.68,220,220S347.09,445.77,225.8,445.77Z" fill="#86888b" opacity="0.95"/><path d="M222.62,442.46C101.4,442.46,2.78,343.84,2.78,222.62S101.4,2.78,222.62,2.78,442.46,101.4,442.46,222.62,343.84,442.46,222.62,442.46Z" fill="#808285"/></g><path d="M222.62,445.24C99.87,445.24,0,345.37,0,222.62S99.87,0,222.62,0,445.24,99.87,445.24,222.62,345.37,445.24,222.62,445.24Z" fill="url(#linear-gradient)"/><path d="M222.62,434.11C106,434.11,11.13,339.24,11.13,222.62S106,11.13,222.62,11.13,434.11,106,434.11,222.62,339.24,434.11,222.62,434.11Z" fill="url(#linear-gradient-2)"/><path d="M329.06,295.75c0,6.27-4.3,11.35-9.61,11.35H137.19c-5.31,0-9.61-5.08-9.61-11.35V182.26c0-6.27,4.3-11.35,9.61-11.35H319.45c5.31,0,9.61,5.08,9.61,11.35Zm-93.64-88A43.26,43.26,0,1,0,278.68,251,43.26,43.26,0,0,0,235.42,207.76Zm-40.05-21.23c0-4.65-2.88-8.41-6.44-8.41H168.69c-3.56,0-6.44,3.77-6.44,8.41h0c0,4.65,2.88,8.41,6.44,8.41h20.24c3.56,0,6.44-3.77,6.44-8.41Z" fill="#fff"/><rect x="151.04" y="157.03" width="28.3" height="13.89" fill="#fff"/><rect x="204.45" y="149.55" width="63.02" height="24.03" fill="#fff"/><circle cx="234.84" cy="250.8" r="34.05" fill="#fff"/><path d="M323.36,290c0,6.27-4.3,11.35-9.61,11.35H131.49c-5.31,0-9.61-5.08-9.61-11.35V176.56c0-6.27,4.3-11.35,9.61-11.35H313.75c5.31,0,9.61,5.08,9.61,11.35Zm-93.64-88A43.26,43.26,0,1,0,273,245.32,43.26,43.26,0,0,0,229.72,202.06Zm-40.05-21.23c0-4.65-2.88-8.41-6.44-8.41H163c-3.56,0-6.44,3.77-6.44,8.41h0c0,4.65,2.88,8.41,6.44,8.41h20.24c3.56,0,6.44-3.77,6.44-8.41Z" fill="#88868a"/><rect x="145.34" y="151.32" width="28.3" height="13.89" fill="#88868a"/><rect x="198.74" y="143.85" width="63.02" height="24.03" fill="#88868a"/><circle cx="229.14" cy="245.1" r="34.05" fill="#88868a"/></g></g></svg>
                        </div>
                        @endif

                        
                    <img src="{{$channel->image()}}" alt="channel image">
                    </div>
                </div>

                <div class="form-group">
                    <h4 class="text-center">

                        {{$channel->name}}
                    </h4>

                    <p class="text-center">
                        {{$channel->description}}
                    </p>

                    <div id="app">

                    <subscription-button :initialsubscriptions="{{$channel->subscriptions}}" :channel="{{$channel}}"></subscription-button>
                    </div>
                </div>
               @if ($channel->authU())
                    <input id="image" type="file" name="image" style="display: none;" onchange="document.getElementById('update-cform').submit()">
                <div class="form-group">
                    <label for="name" class="form-control-label"> Name </label>
                <input id="name" name="name" value="{{$channel->name}}" type="text" class="form-control">
                </div>

                <div class="form-group">
                    <label for="description" class="form-control-label">Description</label>
                <textarea id="description" name="description" value="{{$channel->description}}"  rows="3" class="form-control">{{$channel->description}}</textarea>
               
                    
                

                
                </div>
                @if($errors->any())
                <ul class="list-group mb-5">
                    @foreach ($errors->all() as $error)
                    <li class="text-danger list-group-item">
                        {{$error}}
                    </li>
                        
                    @endforeach
                </ul>

                @endif
                
                <button type="submit" class="btn btn-outline-primary">Update channel</button>
                
                @endif
                @if ($channel->authU())
                   </form> 
                @endif
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
