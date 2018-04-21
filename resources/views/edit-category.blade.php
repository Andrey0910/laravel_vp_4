<form action="/admin/category/update/{{$category->id}}" method="POST">
    {{csrf_field()}}
    <input type="text" name="section_name" value="{{$category->section_name}}" style="width: 50%"> <br>
    <input type="text" name="description" value="{{$category->description}}" style="width: 50%"> <br>
    <input type="submit">
</form>