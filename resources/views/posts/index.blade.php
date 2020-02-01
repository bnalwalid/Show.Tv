@extends('layouts.app')
@section('title')
{{$nameepisode->title}}
@endsection
@section('content')
<div class="alert alert-primary" role="alert">
        <h2>
                {{$nameepisode->title}}
        </h2>
        <p>
                {{$nameepisode->description}}
        </p>
        <small><i class="far fa-clock"></i> {{ date('h:i A',  strtotime($nameepisode->showtime)) }}</small>
      </div>
        <div class="row" id="bodyepisode">
            @foreach ($episode as $item)
                <div class="col-md-3">
                        <div class="card mb-4 shadow-sm">
                            <img src="{{ $item->thumbnail }}" alt="">
                            <div class="card-body">
                                    <h4 class="card-text">{{ $item->title }}</h4>
                               <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="/view/{{ $item->id }}" class="btn btn-sm btn-outline-secondary">View</a>
                                    @if (session()->get('infouser'))
                                    @foreach ($likes as $like)
                                    @if ($like->idpepisode == $item->id)
                                    @if ($like->likeorunlike == 1)
                                    <button class="btn btn-sm btn-outline-secondary"><i class="fas fa-thumbs-up text-success"></i></button>
                                    <button href="" class="btn btn-sm btn-outline-secondary"><i class="fas fa-thumbs-down"></i></button>
                                    @else
                                    <button href="" class="btn btn-sm btn-outline-secondary"><i class="fas fa-thumbs-up"></i></button>
                                    <button href="" class="btn btn-sm btn-outline-secondary"><i class="fas fa-thumbs-down text-success"></i></button>
                                    @endif
                                    @else
                                    <button href="" class="btn btn-sm btn-outline-secondary"><i class="fas fa-thumbs-up"></i></button>
                                    <button href="" class="btn btn-sm btn-outline-secondary"><i class="fas fa-thumbs-down"></i></button>  
                                    @endif
                                    @endforeach
                                    @endif
                                </div>
                              <small class="text-muted"><i class="far fa-clock"></i>{{ $item->duration }}</small>
                            </div>
                          </div>
                        </div>
                      </div>
            @endforeach
        </div>
@endsection('content')
