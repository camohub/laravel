@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-left">
            <div class="col-sm-12 col-md-6 book-detail">
                <div>
                    @foreach( $book->images as $img )
                            <img src="{{ asset('storage/book/images/' . $img->file) }}" alt="">
                    @endforeach
                </div>

                <h2>{{$book->title}}</h2>

                <div><b>ISBN:</b> {{$book->isbn}}</div>

                <div>{{$book->abstract}}</div>

                <div>
                    {{$book->author_name}} {{$book->email}}
                    @if($book->created_at)
                        <small>{{$book->created_at->format('d.m.Y H:i:s')}}</small>
                    @endif
                </div>

                <div>
                    <small>{{$book->user->name}}</small>
                </div>

                @can('update', $book)
                    <div>
                        <a href="{{ route('book.create', ['id' => $book->id]) }}" class="btn btn-info">Editovať</a>
                    </div>
                @endcan
                {{--<div>
                    <a href="{{ route('book.delete', ['id' => $book->id]) }}" class="btn btn-danger">Vymazať</a>
                </div>--}}
            </div>
        </div>
    </div>
@endsection