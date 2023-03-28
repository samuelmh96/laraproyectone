@extends('dashboard.layout')

@section('content')

<a href="{{ route("post.create")}}">Crear</a>
<br>
<br>
    <table>
        <thead>
            <tr>
                <th>Title</th>
                <th>Category</th>
                <th>Post</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <td>{{$post->title}}</td>
                <td>{{$post->category->title}}</td>
                <td>{{$post->posted}}</td>
                <td style="display: flex; flex-direction: row">
                    <a style="margin-right: 10px" href="{{ route("post.edit", $post )}}">Edit</a>
                    <a style="margin-right: 10px" href="{{ route("post.show", $post)}}">Show</a>
                    <form action="{{ route("post.destroy", $post)}}" method="post">
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
        {{$posts->links()}}
    </div>
@endsection
