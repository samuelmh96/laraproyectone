@csrf
<div style="display: flex; flex-direction: column; align-items: baseline">
    <label for="">Title</label>
    <input type="text" name="title" value="{{old("title", $post->title)}}">
    <br>
    <label for="">Slug</label>
    <input type="text" name="slug" value="{{old("slug", $post->slug)}}">
    <br>
    <label for="">Categories</label>
    <select name="category_id">
        <option value=""></option>
        @foreach ($categories as $title => $id)
            <option {{old("category_id", $post->category_id) == $id ? "selected" : ""}} value="{{ $id }}">{{ $title }}</option>
        @endforeach
    </select>
    <br>
    <label for="">Posted</label>
    <select name="posted">
        <option {{old("posted", $post->posted) == "not" ? "selected" : ""}} value="not">No</option>
        <option {{old("posted", $post->posted) == "yes" ? "selected" : ""}} value="yes">Si</option>
    </select>
    <br>
    <label for="">Content</label>
    <textarea name="content" cols="30" rows="2" >{{old("content", $post->content)}}</textarea>
    <br>
    <label for="">Description</label>
    <textarea name="description" cols="30" rows="2">{{old("description", $post->description)}}</textarea>
    <br>
    @if (isset($task) && $task == 'edit')
        <label for="">Imagen</label>
        <input type="file" name="image" id="">
    @endif
    <br>
    <button type="submit">Enviar</button>
</div>
