<h1>edit page</h1>
<form action="{{route('employees.update',[$employee])}}" method="post">
    @csrf
    @method('PATCH')
    <input type="text" name="name" value="{{$employee->name}}"><br>
    <input type="text" name="email" value="{{$employee->email}}"><br>
    <input type="password" name="password" value="{{$employee->password}}"><br>
    <button type="submit">send</button>

</form>

<form action="{{route('employees.destroy',[$employee])}}" method="post">
    @csrf
    @method('delete')
    <button type="submit">delete</button>
</form>
