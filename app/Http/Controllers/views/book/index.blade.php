@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-left">
            <h1 class="col-sm-12">{{$title}}</h1>

            @foreach($books as $b)
                <div class="col-sm-12 col-md-6">
                    <div class="book-preview">
                        <h2>
                            <a href="{{ route('book.detail', ['id' => $b->id]) }}">{{$b->title}}</a>
                        </h2>
                        <div>{{$b->abstract}}</div>
                        <div>{{$b->author_name}}</div>
                        <div>ISBN: {{$b->isbn}}</div>
                        @if($b->created_at)
                            <div><small>{{$b->created_at->format('d.m.Y H:i:s')}}</small></div>
                        @endif
                    </div>
                </div>
            @endforeach

            <div class="col-sm-12">{{ $books->render() }}</div>
            {{--<div class="col-sm-12">{{ $books->links() }}</div>--}}
        </div>
    </div>
@endsection