@if($errors)
    <ul>
        @foreach($errors->all() as $error)
            <li>{{$error}}</li>
        @endforeach
    </ul>
@endif

<form action="/admin/books/store" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    <input type="text" name="book_name" style="width: 50%"> <br>
    <input type="text" name="section_books_id" > <br>
    <input type="number" name="price" > <br>
    <input type="file" name="photo"> <br>
    <input type="text" name="description" style="width: 50%"> <br>
    <input type="submit">
</form>