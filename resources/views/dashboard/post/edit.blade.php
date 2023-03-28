@extends('dashboard.layout')

@section('content')
<h1>Update Post: {{ $post->title}}</h1>
@include('dashboard.fragment._errors-form')
<br>
<form action="{{ route('post.update', $post->id) }}" method="post" enctype="multipart/form-data">
    @method('PATCH')
    @include('dashboard.post._form', ["task" => "edit"])
</form>
@endsection
