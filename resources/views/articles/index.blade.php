@foreach($articles as $article)
    <div>
        Title:{{$article->title}}
    </div>
    <div>
        Body:{{$article->body}}
    </div>

@endforeach
