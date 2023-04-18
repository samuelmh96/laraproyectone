@extends('dashboard.layout')

@section('content')
<h1>Update Category: {{ $category->title}}</h1>
@include('dashboard.fragment._errors-form')
<br>
<form action="{{ route('category.update', $category->id) }}" method="post">
    @method('PATCH')
    @include('dashboard.category._form')
</form>
@endsection
