
<form action="{{ route('book.index') }}" method="post" class="searchForm col-sm-12">

    @csrf

    <div class="form-row">
        <div class="form-group col-sm-4">
            <input type="text" name="title" value="{{old('title')}}" class="form-control" placeholder="Vyhľadať názov">
        </div>
        <div class="form-group col-sm-2 date" id="date1" data-target-input="nearest">
            <input type="text" name="from" class="form-control datetimepicker-input" data-target="#date1" data-toggle="datetimepicker"/>
        </div>
        <div class="form-group col-sm-2 date" id="date2" data-target-input="nearest">
            <input type="text" name="to" class="form-control datetimepicker-input" data-target="#date2" data-toggle="datetimepicker"/>
        </div>
        <div class="form-group col-sm-4">
            <input type="submit" class="btn btn-info" value="Hľadať">
            <input type="submit" name="reset" class="btn btn-danger" value="Reset">
        </div>
    </div>
</form>

@section('scripts')
    {{--<link rel="stylesheet" href="{{ asset('css/tempusdominus.css') }}">
    <script type="javascript" src="{{ asset('js/tempusdominus.js') }}" defer></script>--}}

    <script type="text/javascript" defer>
        $(function () {
            $('#date1').datetimepicker({
                locale: 'sk'
            });
            $('#date2').datetimepicker({
                locale: 'sk'
            });
        });
    </script>
@endsection