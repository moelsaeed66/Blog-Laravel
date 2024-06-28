<h1>employees page</h1>
@foreach($employees as $emp)
    <div>
        name:{{$emp->name}}
    </div>

    <div>
        name:{{$emp->email}}
    </div>
@endforeach


