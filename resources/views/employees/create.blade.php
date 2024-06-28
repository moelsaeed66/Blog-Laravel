<h1>create page</h1>
<form action="{{route('employees.store')}}" method="post">
    @csrf
    <input type="text" name="name" placeholder="name"><br>
    <input type="text" name="email" placeholder="email"><br>
    <input type="password" name="password" placeholder="password"><br>
    <button type="submit">send</button>
</form>
