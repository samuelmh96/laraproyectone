@extends('dashboard.layout')

@section('content')
<h1>Create Category</h1>
@include('dashboard.fragment._errors-form')
<br>
<form action="{{ route('category.store') }}" method="post">
@include('dashboard.category._form')

</form>
@endsection
