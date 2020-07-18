
<form action="{{route('book.store')}}" method="post" class="createForm col-sm-12 col-md-8">
    @include('validationErrors')

    @csrf
    <div class="form-group">
        <label for="title">Názov</label>
        <input type="text" class="form-control" name="title" value="{{old('title')}}">
    </div>
    <div class="form-group">
        <label for="isbn">ISBN</label>
        <input type="text" class="form-control" name="isbn"  value="{{old('isbn')}}">
    </div>
    <div class="form-group">
        <label for="author_name">Meno autora</label>
        <input type="text" class="form-control" name="author_name" value="{{old('author_name')}}">
    </div>
    <div class="form-group">
        <label for="email">Email autora</label>
        <input type="text" class="form-control" name="email" value="{{old('email')}}">
    </div>
    <div class="form-group">
        <label for="pages">Počet strán</label>
        <input type="text" class="form-control" name="pages" value="{{old('pages')}}">
    </div>
    <div class="form-group">
        <label for="genre">Žáner</label>
        <input type="text" class="form-control" name="genre" value="{{old('genre')}}">
    </div>
    <div class="form-group">
        <label for="abstract">Stručný popis</label>
        <textarea name="abstract" class="form-control" value="{{old('abstract')}}"></textarea>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-info" value="Uložiť">
    </div>
</form>