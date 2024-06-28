<h1>hello user </h1>

<form action="{{route('articles.store')}}" method="post">
    @csrf
    <input type="text" name="title"><br>
    <input type="text" name="body"><br>

    {{$categories}}
    <div>
        <label >
            Tags:<select multiple name="tags[]" >
                @foreach($tags as $tag)
                    <option value="{{$tag->id}}">{{$tag->name}}</option>
                @endforeach
            </select>
        </label>
    </div>
    <div>
        <label >
            Categories:<select multiple name="categories[]" >
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </label>
    </div>


    <button type="submit">send</button>

</form>
