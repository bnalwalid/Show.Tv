@extends('layouts.app')
@section('title')
Random 5 episodes
@endsection

@section('content')


<div class="container">

    <div class="row" id="bodyepisode">
        @foreach ($episodes as $episode)
            <div class="col-md-3">
                    <div class="card mb-4 shadow-sm">
                        <img src="{{ $episode->imgSeries }}" alt="">
                        <div class="card-body">
                          
                                <h4 class="card-text">{{ $episode->title }}</h4>
                        <div class="d-flex justify-content-between align-items-center">
                             <div class="btn-group">
                                <a href="episodes/{{ $episode->id }}" class="btn btn-sm btn-outline-secondary">View</a>
                                @if (session()->get('infouser'))
                                @if($follows->count()>=1)
                                @php $showornot=true @endphp
                                @foreach ($follows as $follow)
                                  @if ($follow->idseriestvs == $episode->id)
                                  <button class="btn btn-sm btn-outline-secondary" id="follow_{{$follow->id}}"><i class="fas fa-minus-circle"></i> Unfollow </button>
                                  @php $showornot=false @endphp
                                  @endif 
                                @endforeach
                                @if($showornot)
                                <button class="btn btn-sm btn-outline-secondary" id="follow_{{$episode->id}}"><i class="fas fa-plus-circle"></i> Follow </button>
                                @endif 
                                @else
                                <button class="btn btn-sm btn-outline-secondary" id="follow_{{$episode->id}}"><i class="fas fa-plus-circle"></i> Follow </button>
                                @endif
                                @endif
                            </div>
                          
                          <small class="text-muted"><i class="far fa-clock"></i> {{ date('h:i A',  strtotime($episode->showtime)) }}</small>
                        </div>
                      </div>
                    </div>
                  </div>
        @endforeach
      
      
    </div>
  </div>
@endsection('content')
