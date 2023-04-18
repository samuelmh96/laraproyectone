@extends('dashboard.layout')

@section('content')

<a href="{{ route("category.create")}}">Crear</a>
<br>
<br>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>{{$category->title}}</td>
                <td style="display: flex; flex-direction: row">
                    <a style="margin-right: 10px" href="{{ route("category.edit", $category )}}">Edit</a>
                    <a style="margin-right: 10px" href="{{ route("category.show", $category)}}">Show</a>
                    <form action="{{ route("category.destroy", $category)}}" method="post">
                     @method("DELETE")
                   @csrf
                   <button type="submit">Delete</button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <br>
    <div style="display: flex; justify-content: center">
        {{$categories->links()}}
    </div>
@endsection
