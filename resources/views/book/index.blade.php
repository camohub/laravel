@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-left">
            <h1 class="col-sm-12">{{$title}}</h1>
            <div class="col-sm-12">{{$content}}</div>
            @foreach($books as $b)
                <div class="col-sm-12 col-md-6">
                    <h2>
                        <a href="{{ route('book.detail', ['id' => $b->id]) }}">{{$b->title}}</a>
                    </h2>
                    <div>{{$b->abstract}}</div>
                    <div>{{$b->author_name}} @if($b->created_at)<small>{{$b->created_at->format('d.m.Y H:i:s')}}</small>@endif</div>
                </div>
            @endforeach
        </div>
    </div>
@endsection