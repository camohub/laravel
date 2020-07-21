
<form action="{{ route('book.index') }}" method="post" class="searchForm col-sm-12 col-md-8">

    @csrf

    <div class="form-row">
        <div class="form-group col-sm-6">
            <input type="text" name="title" value="{{old('title')}}" class="form-control" placeholder="Vyhľadať názov">
        </div>
        <div class="form-group col-sm-2">
            <input type="submit" class="btn btn-info" value="Hľadať">
        </div>
    </div>
</form>