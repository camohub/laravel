@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-left">
            <h1 class="col-sm-12">Vložiť nový zázam o knihe</h1>

            {{--@if ($errors->any())
                <div class="col-sm-12 col-md-8">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif--}}

            @include('book.createForm')
        </div>
    </div>
@endsection