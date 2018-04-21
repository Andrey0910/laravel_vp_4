@if($errors)
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif

<form action="/admin/orders/update/{{$orders->id}}" method="POST">
    {{csrf_field()}}
    <input type="text" name="email" value="{{$orders->email}}" style="width: 20%"> <br>
    <input type="submit">
</form>