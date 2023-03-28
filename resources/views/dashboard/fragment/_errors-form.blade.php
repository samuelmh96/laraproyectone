@if ($errors->any())
@foreach ($errors->all() as $e)
    <div class="error" style="color: red">
        {{$e}}
    </div>
@endforeach
@endif
