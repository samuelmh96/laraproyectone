@csrf
<div style="display: flex; flex-direction: column; align-items: baseline">
    <label for="">Title</label>
    <input type="text" name="title" value="{{old("title", $category->title)}}">
    <br>
    <label for="">Slug</label>
    <input type="text" name="slug" value="{{old("slug", $category->slug)}}">
    <br>
    <button type="submit">Enviar</button>
</div>
