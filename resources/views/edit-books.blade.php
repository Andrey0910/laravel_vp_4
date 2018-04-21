<form action="/admin/books/update/{{$books->id}}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    <input type="text" name="book_name" value="{{$books->book_name}}" style="width: 50%"> <br>
    <input type="text" name="section_books_id" value="{{$books->section_books_id}}"> <br>
    <input type="number" name="price" value="{{$books->price}}"> <br>
    <input type="file" name="photo" value="{{$books->photo}}"> <br>
    <input type="text" name="description" value="{{$books->description}}" style="width: 50%"> <br>
    <input type="submit">
</form>