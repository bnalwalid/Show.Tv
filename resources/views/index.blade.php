@extends('layouts.app')
@section('title')
Home Page
@endsection
@section('content')
    <div class="row">
            @foreach ($episodes ?? '' as $item)
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
                                    <a href="" class="btn btn-sm btn-outline-secondary"><i class="fas fa-thumbs-up text-success"></i></a>
                                    <a href="" class="btn btn-sm btn-outline-secondary"><i class="fas fa-thumbs-down"></i></a>
                                    @else
                                    <a href="" class="btn btn-sm btn-outline-secondary"><i class="fas fa-thumbs-up"></i></a>
                                    <a href="" class="btn btn-sm btn-outline-secondary"><i class="fas fa-thumbs-down text-success"></i></a>
                                    @endif
                                    @else
                                    <a href="" class="btn btn-sm btn-outline-secondary"><i class="fas fa-thumbs-up"></i></a>
                                    <a href="" class="btn btn-sm btn-outline-secondary"><i class="fas fa-thumbs-down"></i></a>  
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
