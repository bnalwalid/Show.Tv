@extends('layouts.app')
@section('title')
{{$episode->title}}
@endsection

@section('content')

<h2>{{$episode->title}}</h2>
<p>{{$episode->description}}</p>
<video
    id="my-video"
    class="video-js"
    controls
    preload="auto"
    width="1000"
    height="500"
    poster="{{$episode->thumbnail}}"
    data-setup="{}"
  >
    <source src="http://{{$_SERVER['SERVER_NAME'].'/'.$episode->video_content}}" type="video/mp4" />
  
  </video>
@endsection('content')