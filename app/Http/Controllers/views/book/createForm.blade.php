
<form action="{{ $id ? route('book.update', ['id' => $id]) : route('book.store') }}" method="post" class="createForm col-sm-12 col-md-8" enctype="multipart/form-data">

    {{--@include('validationErrors')--}}

    @csrf
    @if( $id ){!! method_field('PUT') !!}@endif

    <div class="form-group">
        <label for="title">Názov</label>
        <input type="text" class="form-control" name="title" value="{{old('title') ?? $book->title ?? ''}}">
        @error('title')<div class="text-danger">@lang($message)</div>@enderror
    </div>

    <div class="form-group">
        <label for="isbn">ISBN</label>
        <input type="text" class="form-control" name="isbn"  value="{{old('isbn') ?? $book->isbn ?? ''}}">
        @error('isbn')<div class="text-danger">@lang($message)</div>@enderror
    </div>

    <div class="form-group">
        <label for="author_name">Meno autora</label>
        <input type="text" class="form-control" name="author_name" value="{{old('author_name') ?? $book->author_name ?? ''}}">
        @error('author_name')<div class="text-danger">@lang($message)</div>@enderror
    </div>

    <div class="form-group">
        <label for="email">Email autora</label>
        <input type="text" class="form-control" name="email" value="{{old('email') ?? $book->email ?? ''}}">
        @error('email')<div class="text-danger">@lang($message)</div>@enderror
    </div>

    <div class="form-group">
        <label for="genre">Žáner</label>
        <input type="text" class="form-control" name="genre" value="{{old('genre') ?? $book->genre ?? ''}}">
        @error('genre')<div class="text-danger">@lang($message)</div>@enderror
    </div>

    <div class="form-group">
        <label for="pages">Počet strán</label>
        <input type="text" class="form-control" name="pages" value="{{old('pages') ?? $book->pages ?? ''}}">
        @error('pages')<div class="text-danger">@lang($message)</div>@enderror
    </div>

    <div class="form-group">
        <label for="abstract">Stručný popis</label>
        <textarea name="abstract" class="form-control" rows="5">{{old('abstract') ?? $book->abstract ?? ''}}</textarea>
        @error('abstract')<div class="text-danger">@lang($message)</div>@enderror
    </div>

    <div class="form-group">
        <label for="abstract">Titulný obrázok</label>
        <input multiple type="file" name="images[]" class="form-control">
        {{-- The problem with next is that Laravel creates keys like images.0 and images.1 ... --}}
        {{--@error('images')<div class="text-danger one">@lang($message)</div>@enderror--}}
        @if( $errors->all() )
            <?php $imgsErrors = [] ?>
                @foreach( $errors->all() as $e )
                    @if( strpos( $e, 'image' ) !== FALSE )<?php $imgsErrors[$e] = __($e); ?>@endif
                @endforeach
            <div class="text-danger">{!! join('<br>', $imgsErrors) !!}</div>
        @endIf
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-info" value="Uložiť">
    </div>
</form>