<form method="post" action=" {{ route('cities.store') }} ">
    @csrf
    <input type="text" name = "id" placeholder="nhap id" >
    <input type="text" name = "name" placeholder="nhap name" >
    <input type="submit" value="submit">
</form>