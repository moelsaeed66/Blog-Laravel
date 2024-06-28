<h1>Edit Page</h1>
<form action="{{route('articles.update',[$article])}}" method="post" >
    @csrf
    @method('PATCH')

    <input type="text" name="title" value="{{$article->title}}"><br>
    <input type="text" name="body" value="{{$article->body}}"><br>
    <button type="submit">send</button>
</form>

<form action="{{route('articles.destroy',[$article])}}" method="post">
    @csrf
    @method('DELETE')

    <button type="submit">delete</button>
</form>

