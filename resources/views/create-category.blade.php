<form action="/admin/category/store" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    <input type="text" name="section_name" style="width: 50%"> <br>
    <input type="text" name="description" style="width: 50%"> <br>
    <input type="submit">
</form>